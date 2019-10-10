@extends("index")
@section('content')
<div class="col-md-6 mx-auto mt-5">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
      </div>
      <input id="search_txt" type="text" class="form-control" placeholder="Search All Public and Discoverable Resources" aria-label="Search All Public and Discoverable Resources" aria-describedby="basic-addon1">
      <button type="button" class="btn btn-primary btn-c"><i class="fas fa-search"></i></button>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-body col-lg-12"></div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
<div class="col-md-10 mx-auto">
    <div class="col-md-2 mt-5 d-inline-block align-top bge p-0" id="searchToggle" style="border-radius:10px">
        <div class="position-relative cp searchToggle p-2" data-toggle="collapse" data-target="#published">
            <div class="d-inline-block font-weight-bolder">Availability</div>
            <div class="d-inline-block text-right position-absolute mr-2" style="right:0"><i class="fas fa-angle-up"></i></div>
        </div>
        <div id="published" class="collapse cp show pb-2 pl-2">
            <div class="custom-control custom-radio cp w-100">
              <input type="radio" class="custom-control-input availability_input" id="Published" value="true" name="availability">
              <label class="custom-control-label cp" for="Published">Published</label>
            </div>
            <div class="custom-control custom-radio cp w-100">
              <input type="radio" class="custom-control-input availability_input" id="Unpublished" value="false" name="availability">
              <label class="custom-control-label cp" for="Unpublished">Unpublished</label>
            </div>
        </div>
    </div><div class="col-md-10 mt-5 d-inline-block align-top" id="tableR">
        <table class="table table-responsive-lg table-hover table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col" style="width:10%">Type</th>
              <th scope="col" style="width:40%">Title</th>
              <th scope="col" style="width:10%">Creator</th>
              <th scope="col" style="width:25%">Date Created</th>
              <th scope="col" style="width:25%">Last Modified</th>
            </tr>
          </thead>
          <tbody id="tbody"></tbody>
        </table>
        <div id="notFound" class="mx-auto text-center col-md-4 h1 my-5" style="display:none">No results found!</div>
    </div>
    <div class="col-md-4 mx-auto mt-5 text-center paginate">
        <div class="list-inline-item cp arrow-left"><i class="fas fa-arrow-left"></i></div>
        <input type="number" class="col-md-2 col-2 text-center" min="1" id="currentPage">
        <div class="list-inline-item totalPage"></div>
        <div class="list-inline-item cp arrow-right"><i class="fas fa-arrow-right"></i></div>
    </div>
</div>
<style>
    #currentPage::-webkit-inner-spin-button, 
    #currentPage::-webkit-outer-spin-button { 
      -webkit-appearance: none; 
      margin: 0; 
    }
</style>
<script>
    $(function(){
        var count = 0,
            pageURL = "http://data.mekongwater.org/hsapi/resource/?count=10",
            next,
            prev,
            coverage = [],
            availability = [],
            text;
        checkURL = function(){
            newURL = pageURL + (availability == "" ? "" : "&published=" + availability ) + (text == null ? "" : "&full_text_search=" + text);
            console.log(newURL);
            $(".tr").remove();
            getResources(newURL);
            $("#currentPage").val(1);
            
        };
        $(".availability_input").on("click", function(){
            availability = $(this).val();
            checkURL();
        });
        $("#searchToggle").on("click",".searchToggle",function(){
            $(this).find(".fa-angle-up").length == 0 ? $(this).find(".fa-angle-down").removeClass("fa-angle-down").addClass("fa-angle-up") :  $(this).find(".fa-angle-up").removeClass("fa-angle-up").addClass("fa-angle-down") ;
        });
        createTable = function(data){
            $("#tbody").hide().append(
                $("<tr>", {class:"tr"}).append(
                    $("<th>", { scope: "row", text: data.resource_type }),
                    $("<th>").append(
                        $("<a>", { text: data.resource_title, href: data.resource_url, target: "_blank", "data-toggle":"modal", "data-target":"#exampleModal" }).on("click",function(event){
                            event.preventDefault();
                            $(".embedd, .modal-footer>.mx-auto").remove();
                            $(".modal-body").append(
                                $("<embed>", { src : data.resource_url, class:"embedd col-lg-12" }).css({"height":"80vh"}),
                            );
                            $(".modal-footer").prepend(
                                $("<div>", { class: "mx-auto small"}).append(
                                    $("<a>", { text: " " + data.resource_url, href: data.resource_url, target: "_blank"}),
                                ),
                            );
                        }),
                    ),
                    $("<th>", { text: data.creator }),
                    $("<th>", { text: data.date_created}).css({"width":"15%"}),
                    $("<th>", { text: data.date_last_updated}).css({"width":"15%"}),
                )
            ).fadeIn();
        };
        getResources = function(pUrl){
            $("#notFound").hide();
            $.get(pUrl, function(data){
                console.log(data);
                if (data.count != 0){
                    next = data.next;
                    prev = data.previous;
                    $.map(data.results,function(v,i){
                        createTable(v);
                    });
                    $(".totalPage").text( "/ " + (data.count%10 == 0 ? data.count/10 : parseInt(data.count/10) + 1));
                    $("#currentPage").attr("max",$(".totalPage").text().split("/")[1].trim() * 1);
                    $(".paginate").fadeIn();
                }
                else {
                    $("#notFound").fadeIn();
                    $(".paginate").hide();
                }
            });
        };
        $(".btn-c").on("click", function(){
            text = $("#search_txt").val();
            console.log(text);
            checkURL();
        });
        $("#search_txt").on("keypress", function(e){
            if (e.which == 13){
                $(".btn-c").click();
            }
        });
        getFullResources = function(){
            $(".tr").remove();
            getResources(pageURL);
            $("#currentPage").val(1);
        };
        getFullResources();
        $(".arrow-right").on("click", function(){
            var currentPage = $("#currentPage").val()*1,
                totalPage = $(".totalPage").text().split("/")[1].trim() * 1;
            if (currentPage < totalPage){
                $("#currentPage").val(currentPage+1);
                $(".tr").remove();
                getResources(next);
            }
        });
        $(".arrow-left").on("click", function(){
            var currentPage = $("#currentPage").val()*1,
                totalPage = $(".totalPage").text().split("/")[1].trim() * 1;
            if (currentPage > 1){
                $("#currentPage").val(currentPage-1);
                $(".tr").remove();
                getResources(prev);
            }
        });
        $("#currentPage").on("keypress", function(e){
            if (e.which == 13){
                var currentPage = $("#currentPage").val()*1,
                    totalPage = $(".totalPage").text().split("/")[1].trim() * 1;
                if (currentPage == 1)
                    getResources(pageURL);
                else if (currentPage <= totalPage){
                    newURL = pageURL + (availability == "" ? "" : "&published=" + availability ) + ( text == null ? "" : "&full_text_search=" + text) + "&page=" + currentPage;
                    $(".tr").remove();
                    getResources(newURL);
                }
            }
        });
    });
</script>
@endsection