@extends("index")
@section('content')
<div class="col-md-4 mx-auto mt-5">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
      </div>
      <input id="search_txt" type="text" class="form-control" placeholder="Search All Public and Discoverable Resources" aria-label="Search All Public and Discoverable Resources" aria-describedby="basic-addon1">
      <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i></button>
    </div>
</div>
<div id="tableR" class="col-md-8 mx-auto mt-5">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Type</th>
          <th scope="col">Title</th>
          <th scope="col">First Author</th>
          <th scope="col">Date Created</th>
          <th scope="col">Last Modified</th>
        </tr>
      </thead>
      <tbody id="tbody"></tbody>
    </table>
    <div id="notFound" class="mx-auto text-center col-md-4 h1 mt-5" style="display:none">No results found!</div>
</div>
<div class="col-md-4 mx-auto mt-5 text-center paginate">
    <div class="list-inline-item cp arrow-left"><i class="fas fa-arrow-left"></i></div>
    <input type="number" class="col-md-2 col-2 text-center" min="1" id="currentPage">
    <div class="list-inline-item totalPage"></div>
    <div class="list-inline-item cp arrow-right"><i class="fas fa-arrow-right"></i></div>
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
            pageURL;
        dateTime = function(dateTime){
            date = dateTime.split("T")[0];
            time = dateTime.split("T")[1].split("Z")[0];
            return time + " (" + date + ")";
        };
        createTable = function(data){
            $("#tbody").hide().append(
                $("<tr>", {class:"tr"}).append(
                    $("<th>", { scope: "row", text: data.resource_type }),
                    $("<th>").append(
                        $("<a>", { text: data.text.split("\n")[3].trim(), href: "https://www.hydroshare.org/resource/" + data.text.split("\n")[1].trim(), target: "_blank" }),
                    ),
                    $("<th>", { text: data.author }),
                    $("<th>", { text: dateTime(data.created)}).css({"width":"15%"}),
                    $("<th>", { text: dateTime(data.modified)}).css({"width":"15%"}),
                )
            ).fadeIn();
        };
        getResources = function(pUrl){
            $("#notFound").hide();
            $.get(pUrl, function(data){
                if (data.count != 0){
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
        $("#search_txt").on("keypress", function(e){
            if (e.which == 13){
                pageURL = "https://www.hydroshare.org/hsapi/resource/search?count=10&text=" + $(this).val();
                $(".tr").remove();
                getResources(pageURL);
                $("#currentPage").val(1);
            }
        });
        getFullResources = function(){
            pageURL = "https://www.hydroshare.org/hsapi/resource/search?count=10";
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
                var newUrl = pageURL.split("&text=")[0] + "&page=" + (currentPage+1)+ (pageURL.split("&text=")[1] == null ? "" : "&text=" + pageURL.split("&text=")[1]);
                $(".tr").remove();
                getResources(newUrl);
            }
        });
        $(".arrow-left").on("click", function(){
            var currentPage = $("#currentPage").val()*1,
                totalPage = $(".totalPage").text().split("/")[1].trim() * 1;
            if (currentPage > 1){
                $("#currentPage").val(currentPage-1);
                var newUrl = pageURL.split("&text=")[0] + "&page=" + (currentPage-1)+ (pageURL.split("&text=")[1] == null ? "" : "&text=" + pageURL.split("&text=")[1]);
                $(".tr").remove();
                getResources(newUrl);
            }
        });
        $("#currentPage").on("keypress", function(e){
            if (e.which == 13){
                var currentPage = $("#currentPage").val()*1,
                    totalPage = $(".totalPage").text().split("/")[1].trim() * 1;
                if (currentPage == 1)
                    getResources(pageURL);
                else if (currentPage <= totalPage){
                    var newUrl = pageURL.split("&text=")[0] + "&page=" + currentPage+ (pageURL.split("&text=")[1] == null ? "" : "&text=" + pageURL.split("&text=")[1]);
                    $(".tr").remove();
                    getResources(newUrl);
                }
            }
        });
    });
</script>
@endsection