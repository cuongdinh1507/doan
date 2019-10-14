@extends("index")
@section('content')
<div class="modal fade" id="modalAuthor" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bge">
                <h5 class="modal-title mx-auto" id="exampleModalLongTitle">
                    <div class="brand">
                        <img src="{{asset('img/user.png')}}" alt="logo">
                    </div>
                </h5>
            </div>
            <div class="modal-body modal-body-author" titleid="0" userid="0">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalPP" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="container">
          <div class="row justify-content-center mt-5">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header text-center">PROJECT PERSONNEL</div>
        
                      <div class="card-body">
                        <table class="table table-responsive-lg table-bordered">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">Email</th>
                              <th scope="col">Name</th>
                              <th scope="col">Role in project</th>
                              <th scope="col">Institution</th>
                              <th scope="col">Phone</th>
                              {{-- @if ( count($role) != 0) --}}
                                <th scope="col" class="text-center" >Actions</th>
                              {{-- @endif --}}
                            </tr>
                          </thead>
                          <tbody id="tbody-pp">
                          </tbody>
                        </table>
                      </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>
<button data-toggle="modal" data-target="#modalAuthor" id="btn-author" class="d-none"></button>
<div class="col-lg-10 mx-auto post-body"></div>
<script>
  $(function(){
    var checkAuthor = {!! $checkAuthor !!},
        fileData = {!! $fileData !!},
        postInfo = {!! $postInfo !!},
        postDescription = {!! $postDescription !!},
        id = {!! $id !!},
        author = {!! $author !!},
        role = {!! $role !!};
    var check = checkAuthor.length == 0 ? "d-none" : "d-inline-block";
    console.log(author);
    files = function(icon){
      var fileIcon;
      $.each({
        "csv" : "far fa-file-csv",
        "xlsx" : "far fa-file-excel",
        "doc" : "far fa-file-word",
        "docx" : "far fa-file-word",
        "ppt" : "far fa-file-powerpoint",
        "pptx" : "far fa-file-powerpoint",
        "pptm" : "far fa-file-powerpoint",
        "pdf" : "far fa-file-pdf",
        "jpg" : "far fa-file-image",
        "png" : "far fa-file-image",
      },function(k,v){
        if ( icon == k )
          fileIcon = $("<i>", {class: v + " fa-2x" });
      });
      fileIcon = fileIcon == null ? $("<i>", {class: "far fa-file fa-2x" }) : fileIcon;
      return fileIcon;
    }
    $(".post-body").append(
      $("<h3>", { class: "modal-header iDefault", id: "title", text: postInfo[0].title }),
      $("<h3>", { class: "modal-header iEdit d-none w-100"}).append(
        $("<input>", { class: "form-control", value: postInfo[0].title, text: postInfo[0].title }).css({"border":"none"}),
      ),
      $("<div>", { class: "col-lg-6 mb-3 " + check}),
      $("<div>", { class: "col-lg-6 mb-3 " + check}).append(
        $("<div>", { class: "col-lg-8 mx-auto" }).append(
          $("<button>", { class: "d-inline-block btn mr-2 btn-success", "data-target": "#modalPP", "data-toggle": "modal"}).append(
            $("<i>", { class: "fas fa-user-plus" }),
          ),
          $("<button>", { class: "d-inline-block btn mr-2 btn-primary"}).append(
            $("<i>", { class: "far fa-edit" }),
          ).on("click", function(){
            $(".iEdit").removeClass("d-none").addClass("d-inline-block");
            $(".iDefault").removeClass("d-inline-block").addClass("d-none");
            $(".iEditFile").removeClass("d-none");
          }),
          $("<button>", { class: "d-inline-block btn mr-2 btn-danger"}).append(
            $("<i>", { class: "fas fa-trash" }),
          ),
        ),
      ),
      $("<div>", { class: "col-lg-6 d-inline-block align-top"}).append(
        $("<div>", { class: "mb-2"}).append(
          $("<strong>", { class: "col-lg-4 d-inline-block text-right", text: "Authors:"}),
          $("<div>", { class: "col-lg-8 d-inline-block text-left"}).append(
              $.map(author, function(v,i){
                return $("<a>", { text: v.name + (i+1 != author.length ? ", " : "") , href: "#", numberId: v.user_id }).on("click", function(event){
                  event.preventDefault();
                  $(".modal-body-author").children().remove();
                  $(".modal-body-author").append(
                    $("<div>", { class: "col-md-12 mb-2"}).append(
                        $("<label>", { class: "col-md-4 col-form-label text-right d-inline-block", text:"Name:"}),
                        $("<div>", { class: "col-md-8 d-inline-block", text: v.name}),
                    ),
                    $("<div>", { class: "col-md-12 mb-2"}).append(
                        $("<label>", { class: "col-md-4 col-form-label text-right d-inline-block", text:"Email:"}),
                        $("<div>", { class: "col-md-8 d-inline-block", text: v.email}),
                    ),
                    $("<div>", { class: "col-md-12 mb-2"}).append(
                        $("<label>", { class: "col-md-4 col-form-label text-right d-inline-block", text:"Address:"}),
                        $("<div>", { class: "col-md-8 d-inline-block", text: v.address}),
                    ),
                    $("<div>", { class: "col-md-12 mb-2"}).append(
                        $("<label>", { class: "col-md-4 col-form-label text-right d-inline-block", text:"Country:"}),
                        $("<div>", { class: "col-md-8 d-inline-block", text: v.country}),
                    ),
                    $("<div>", { class: "col-md-12 mb-2"}).append(
                        $("<label>", { class: "col-md-4 col-form-label text-right d-inline-block", text:"Phone:"}),
                        $("<div>", { class: "col-md-8 d-inline-block", text: v.phone}),
                    ),
                    $("<div>", { class: "col-md-12 mb-2"}).append(
                        $("<label>", { class: "col-md-4 col-form-label text-right d-inline-block", text:"Institution:"}),
                        $("<div>", { class: "col-md-8 d-inline-block", text: v.institution}),
                    ),
                    $("<div>", { class: "col-md-12 mb-2"}).append(
                        $("<label>", { class: "col-md-4 col-form-label text-right d-inline-block", text:"Position:"}),
                        $("<div>", { class: "col-md-8 d-inline-block", text: v.position}),
                    ),
                  );
                  $("#btn-author").click();
                });
              }),
          ),
        ),
        $("<div>", { class: "mb-2"}).append(
          $("<strong>", { class: "col-lg-4 d-inline-block text-right", text: "Subject:"}),
          $("<div>", { class: "col-lg-8 d-inline-block text-left iDefault", text: postInfo[0].subject}),
          $("<select>", { class: "col-lg-8 text-left iEdit d-none form-control", text: postInfo[0].subject, value: postInfo[0].subject , name: "subject" }).append(
            $("<option>", { value: postInfo[0].subject, text: postInfo[0].subject, selected: true  }),
          ),
        ),
        $("<div>", { class: "mb-2"}).append(
          $("<strong>", { class: "col-lg-4 d-inline-block text-right", text: "Species:"}),
          $("<div>", { class: "col-lg-8 d-inline-block text-left iDefault", text: postInfo[0].species }),
          $("<input>", { class: "col-lg-8 text-left iEdit d-none form-control", text: postInfo[0].species, value: postInfo[0].species , name: "species" }),
        ),
        $("<div>", { class: "mb-2"}).append(
          $("<strong>", { class: "col-lg-4 d-inline-block text-right", text: "Language:"}),
          $("<div>", { class: "col-lg-8 d-inline-block text-left iDefault", text: postInfo[0].language }),
          $("<input>", { class: "col-lg-8 text-left iEdit d-none form-control", text: postInfo[0].language, value: postInfo[0].language , name: "language" }),
        ),
        $("<div>", { class: "mb-2"}).append(
          $("<strong>", { class: "col-lg-4 d-inline-block text-right", text: "Availability:"}),
          $("<div>", { class: "col-lg-8 d-inline-block text-left iDefault", text: postInfo[0].availability}),
          $("<input>", { class: "col-lg-8 text-left iEdit d-none form-control", text: postInfo[0].availability, value: postInfo[0].availability , name: "availability" }),
        ),
      ),
      $("<div>", { class: "col-lg-6 d-inline-block align-top"}).append(
        $("<div>", { class: "mb-2"}).append(
          $("<strong>", { class: "col-lg-4 d-inline-block text-right", text: "Created:"}),
          $("<div>", { class: "col-lg-8 d-inline-block text-left", text: postInfo[0].created_at}),
        ),
        $("<div>", { class: "mb-2"}).append(
          $("<strong>", { class: "col-lg-4 d-inline-block text-right", text: "Last updated:"}),
          $("<div>", { class: "col-lg-8 d-inline-block text-left", text: postInfo[0].updated_at}),
        ),
        $("<div>", { class: "mb-2"}).append(
          $("<strong>", { class: "col-lg-4 d-inline-block text-right", text: "Year start:"}),
          $("<div>", { class: "col-lg-8 d-inline-block text-left iDefault", text: postDescription[0].yearStart}),
          $("<input>", { class: "col-lg-8 text-left iEdit d-none form-control", text: postInfo[0].start, value: postInfo[0].start , name: "start" }),
        ),
        $("<div>", { class: "mb-2"}).append(
          $("<strong>", { class: "col-lg-4 d-inline-block text-right", text: "Year end:"}),
          $("<div>", { class: "col-lg-8 d-inline-block text-left iDefault", text: postDescription[0].yearEnd}),
          $("<input>", { class: "col-lg-8 text-left iEdit d-none form-control", text: postInfo[0].end, value: postInfo[0].end , name: "end" }),
        ),
      ),
      $("<div>", { class: "modal-header text-large h5 mt-4", text: "Abstract"}),
      $("<div>", { class: "iDefault", text: postDescription[0].abstract }),
      $("<textarea>", { class: "col-lg-12 form-control iEdit d-none", text: postDescription[0].abstract, name: "abstract"}),
      $("<div>", { class: "modal-header text-large h5 mt-4", text: "Keywords"}),
      $("<div>", { class: "iDefault", text: postDescription[0].keyword }),
      $("<input>", { class: "col-lg-12 form-control iEdit d-none", value: postDescription[0].keyword, name: "keyword"}),
      $("<div>", { class: "modal-header text-large h5 mt-4", text: "Content"}),
      $("<div>", { class: "border rounded col-lg-12 py-2"}).append(
        $("<div>", { class: "rounded col-lg-12"}).append(
          $("<div>", { class: "col-lg-12 bge py-2"}).append(
            $("<div>", { class: "searchBar col-lg-4 d-inline-block align-middle mt-2"}).append(
              $("<input>", { class: "form-control", name : "iSearch", placeholder: "Search title of file"}).on("keyup", function(){
                var value = $(this).val().toLowerCase();
                $(".tbody-file tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
              }),
            ),
            $("<div>", { class: "addFile col-lg-8 align-middle iEdit d-none text-left"}).append(
              $("<button>", { class: "btn btn-success", text: "Add File"}),
            ),
          ),
        ),
        $("<div>", { class: "rounded col-lg-12 py-2"}).append(
          $("<div>", { class: "col-lg-6 d-inline-block fileList rounded align-top"}).append(
            $("<table>", { class: "table table-hover table-responsive-lg table-file"}).append(
              $("<tbody>", { class: "tbody-file"}).append(
                $.map(fileData, function(v){
                  return $("<tr>", { class: "mb-2 cp"}).append(
                    $("<td>", { class: "text-left w-10"}).append(
                      files(v.typeOfFile),
                    ),
                    $("<td>", { class: "w-75", text: v.name}).on("click", function(){
                      $(".selectFile").addClass("d-none");
                      $(".metadata").children().remove();
                      $(".metadata").append(
                        $("<div>", { class: "iDefault"}).append(
                          $("<div>", { class: "modal-header", text: "Title: " + v.name}),
                          $("<div>", { class: "modal-header", text: "Description: " + v.description}),
                          $("<div>", { class: "modal-header", text: "Type of analysis: " + v.typeOfAnalysis}),
                            $("<div>", { class: "modal-header", text: "Type of data: " + v.typeOfData}),
                          $("<div>", { class: "modal-header", text: "When: " + v.when}),
                          $("<div>", { class: "modal-header", text: "Where: " + v.where}),
                        ),
                      );
                    }),
                    $("<td>", { class: "w-5 iEditFile d-none" }).append(
                      $("<button>", { class: "btn btn-primary btn-file-edit d-inline-block mr-2"}).append(
                        $("<i>", { class :"far fa-edit"}),
                      ).on("click", function(){
                        $(".metadata").children().remove();
                        $(".metadata").append(
                          $("<div>", { class: "col-lg-12"}).append(
                            $("<div>", { class: "form-group row col-lg-12"}).append(
                              $("<label>", { class: "col-lg-4 col-form-label", text: "Title:"}),
                              $("<input>", { class: "form-control col-lg-8", value: v.name}),
                            ),
                            $("<div>", { class: "form-group row col-lg-12"}).append(
                              $("<label>", { class: "col-lg-4 col-form-label", text: "Description:"}),
                              $("<input>", { class: "form-control col-lg-8", value: v.description}),
                            ),
                            $("<div>", { class: "form-group row col-lg-12"}).append(
                              $("<label>", { class: "col-lg-4 col-form-label", text: "Type of Analysis:"}),
                              $("<input>", { class: "form-control col-lg-8", value: v.typeOfAnalysis}),
                            ),
                            $("<div>", { class: "form-group row col-lg-12"}).append(
                              $("<label>", { class: "col-lg-4 col-form-label", text: "Type of data:"}),
                              $("<input>", { class: "form-control col-lg-8", value: v.typeOfData}),
                            ),
                            $("<div>", { class: "form-group row col-lg-12"}).append(
                              $("<label>", { class: "col-lg-4 col-form-label", text: "When:"}),
                              $("<input>", { class: "form-control col-lg-8", value: v.when}),
                            ),
                            $("<div>", { class: "form-group row col-lg-12"}).append(
                              $("<label>", { class: "col-lg-4 col-form-label", text: "Where:"}),
                              $("<input>", { class: "form-control col-lg-8", value: v.where}),
                            ),
                            $("<div>", { class: "col-lg-12 text-right mb-2"}).append(
                              $("<button>", { class: "btn btn-success", text: "Save" }),
                            ),
                          ),
                        )
                      }),
                    ),
                    $("<td>", { class: "w-5 iEditFile d-none" }).append(
                      $("<button>", { class: "btn btn-danger btn-file-edit d-inline-block mr-2"}).append(
                        $("<i>", { class :"far fa-trash-alt"}),
                      ),
                    ),
                    $("<td>", { class: "w-5"}).append(
                      $("<button>", { class: "btn btn-success"}).append(
                        $("<i>", { class: "fas fa-download"}),
                      ).on("click", function(){
                        location.href = "getDownloadFileid=" + v.id;
                      }),
                    ),
                  );
                }),
              ),
            ),
          ).css({"overflow":"auto"}),
          $("<div>", { class: "col-lg-6 d-inline-block metadata border border-muted rounded align-top"}).css({"overflow":"auto", "max-height": "200px","height":"193px"}).append(
            $("<div>", { class: "selectFile position-absolute", text: "Select a file to see file type metadata."}).css({"top":"50%","left":"50%","transform":"translate(-50%,-50%)"}),
          ),
        ).css({"max-height" : "200px"}),
      ),
    );
    createTablePP = function(data){
      var dataPPemail = [],
          dataPP = [];
      $.get("{!! route('post.getAll',['id'=>$id]) !!}", function(all){
        console.log(all)
        $.map(all,function(v){
           dataPPemail.push({"value": v.email ,"userid":v.id});
           dataPP.push(v);
        });
      });
      if (data && data.length){
        console.log(data,{!!$id!!});
        $("#tbody-pp").append(
          $.map(data, function(v,i){
            return $("<tr>").append(
              $("<th>", { scope: "row"}).append(
                $("<input>", { id: "input-name", class: "w-100", disabled: "disabled", value: v.email }).css({"border":"0", "outline":"none"}).autocomplete({
                  source: dataPPemail
                }).on("autocompleteclose", function(){
                  var email = $(this).val();
                  $.grep(dataPPemail, function(n,i){
                      if (n.value == email)
                        check = i;
                  },true);
                  if ( check != null ){
                    var textChange = $(this).parents().eq(1).children();
                    console.log(textChange.eq(1),check,dataPP);
                    textChange.eq(1).text(dataPP[check].name);
                    textChange.eq(3).text(dataPP[check].institution);
                    textChange.eq(4).text(dataPP[check].phone);
                  }
                }).focus(),
              ).css({"width":"25%","outline":"none"}),  
              $("<td>", { scope: "row", text: v.name }),
              $("<td>", { scope: "row" }).append(
                $("<div>", { class:"input-group", placeholder: "Choose role" }).append(
                  $("<select>", { type: "role", name: "role", disabled: "disabled" , class:"disabled-up"+v.id}).append(
                    $("<option>", { value: "Owner", text: "Owner" }).attr(v.role == "Owner" ? "selected":"vl", "selected").attr(v.role != "Owner" ? "class":"vl","d-none"),
                    $("<option>", { value: "Researcher", text: "Researcher" }).attr(v.role == "Researcher" ? "selected":"vl", "selected"),
                    $("<option>", { value: "Project leader", text: "Project leader" }).attr(v.role == "Project leader" ? "selected":"vl", "selected"),
                  ).css({
                    "border":"0",
                    "outline":"none"
                  }),
                ),
              ).css({"width": "15%"}),
              $("<td>", { scope: "row", text: v.institution }),
              $("<td>", { scope: "row", text: v.phone }),
              $("<td>", { scope: "row", class: ((role.length == 0) || (v.role == "Owner")) ? "d-none" : "text-center"}).append(
                $("<div>", { class:"btn btn-success cp pt-1 pb-1 pr-3 pl-3 mr-2 align-middle d-none check"+v.id}).append(
                    $("<i>", { class: "fas fa-check" }),
                ).on("click", function(){
                  $.get("{!! route('post.updateUser', ['id'=>$id]) !!}", { userid: v.user_id, role: $("select[class='disabled-up"+v.id+"']").val() }, function(c){
                    $("#tbody-pp").children().fadeOut().remove();
                    createTablePP(c);
                  });
                }),
                $("<div>", { class:"btn btn-success d-inline-block cp pt-1 pb-1 pr-3 pl-3 mr-2 align-middle iedit"+v.id}).append(
                    $("<i>", { class: "far fa-edit" }),
                ).on("click", function(){
                  $(".disabled-up"+v.id).attr("disabled", false);
                  $(".check"+v.id+",.iclose"+v.id).removeClass('d-none').addClass('d-inline-block');
                  $(this).addClass('d-none').removeClass('d-inline-block');
                  $(".idelete"+v.id).addClass('d-none').removeClass('d-inline-block');
                }),
                $("<div>", { class:"btn btn-danger d-inline-block cp pt-1 pb-1 pr-3 pl-3 align-middle idelete"+v.id, "data-toggle": "modal", "data-target": "#modal"}).append(
                    $("<i>", { class: "far fa-trash-alt" }),
                ).on("click",function(){
                  $(".modal-body").text("Delete " + v.email + " from this project ?").attr("titleid", v.title_id).attr("userid", v.user_id);
                }),
                $("<div>", { class:"btn btn-danger cp pt-1 pb-1 pr-3 pl-3 mr-2 align-middle d-none iclose"+v.id}).append(
                    $("<i>", { class: "fas fa-times" }),
                ).on("click", function(){
                  console.log("hi")
                  $(".disabled-up"+v.id).attr("disabled", true);
                  $(".check"+v.id).addClass('d-none').removeClass('d-inline-block');
                  $(this).addClass('d-none').removeClass('d-inline-block');
                  $(".idelete"+v.id+",.iedit"+v.id).removeClass('d-none').addClass('d-inline-block');
                }),
              ),         
            );
          }),
        ).fadeIn();
      }
      if ( role.length != 0 ){
        $("#tbody-pp").append(
          $("<tr>").append(
            $("<th>", { scope: "row"}).append(
              $("<input>", { id: "input-name", class: "w-100", name: "email" }).css({"border":"0", "outline":"none"}).autocomplete({
                source: dataPPemail
              }).on("autocompleteclose", function(){
                var email = $(this).val();
                $.grep(dataPPemail, function(n,i){
                    if (n.value == email)
                      check = i;
                },true);
                if ( check != null ){
                  var textChange = $(this).parents().eq(1).children();
                  console.log(dataPP[check])
                  textChange.eq(1).text(dataPP[check].name);
                  textChange.eq(3).text(dataPP[check].institution);
                  textChange.eq(4).text(dataPP[check].phone);
                }
              }).focus(),
            ).css({"width":"25%","outline":"none"}),
            $("<td>", { scope: "row" }),
            $("<td>", { scope: "row" }).append(
              $("<div>", { class:"input-group", placeholder: "Choose role" }).append(
                $("<select>", { type: "role", name: "role" }).append(
                  $("<option>", { value: "Researcher", text: "Researcher", selected: "selected" }),
                  $("<option>", { value: "Project leader", text: "Project leader" }),
                ).css({
                  "border":"0",
                  "outline":"none"
                }),
              ),
            ).css({"width": "15%"}),
            $("<td>", { scope: "row" }),
            $("<td>", { scope: "row" }),
            $("<td>", { scope: "row", class:"text-center" }).append(
              $("<div>", { class:"btn btn-success d-inline-block cp pt-1 pb-1 pr-3 pl-3 align-middle"}).append(
                  $("<i>", { class: "far fa-save" }),
              ).on("click", function(){
                var curEmail = $(this).parents().eq(1).children(":first").children(":first").val();
                var checkCurEmail = $.grep(dataPPemail, function(n,i){
                  return n.value == curEmail;
                });
                console.log(curEmail,checkCurEmail)
                if (checkCurEmail[0].value == curEmail ){
                  var newRole = $(this).parents().eq(1).children().eq(2).children(":first").children(":first").val();
                  $.get("{!! route('post.save',['id'=>$id]) !!}", { userid: checkCurEmail[0].userid, role: newRole } , function(newData){
                    console.log(newData);
                    $("#tbody-pp").children().fadeOut().remove();
                    createTablePP(newData);
                  });
                  // $.get("", function(cc){
                  //   console.log(cc);
                  // })
                }
              }),
            ),
          ),
        ).fadeIn();
      }
    };
    deleteUser = function(){
      var titleid = $(".modal-body").attr("titleid"),
          userid = $(".modal-body").attr("userid");
      $.get("{!! route('post.DelUser',['id'=>$id]) !!}", { userid: userid }, function(data){
        $("#tbody-pp").children().fadeOut().remove();
        createTablePP(data);
      });
    };
    createTablePP(author);
  });
</script>
@endsection
