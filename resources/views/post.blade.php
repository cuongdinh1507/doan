@extends("index")
@section('content')
@if (@session()->has(updateFail))
    <div class="alert alert-danger text-center col-md-8 mx-auto" role="alert">
      <strong>Failed!</strong> {{session()->get("updateFail")}}
    </div>
@endif
@if (@session()->has(updateSucccess))
    <div class="alert alert-success text-center col-md-8 mx-auto" role="alert">
      <strong>Success</strong> {{session()->get("updateSucccess")}}
    </div>
@endif
<div class="modal fade" id="modalDelUser" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true" style="z-index: 2000000 !important">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bge">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modalDelUser" titleid="0" userid="0"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="deleteUser()" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalDelPost" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bge">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-body-delPost" titleid="0"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="delPost()">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="delFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="bodyDel"></div>
      <div class="modal-footer" id="delFooter">
        <button type="button" class="btn btn-success" onclick="delFile()" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-danger btn-close" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">NEW UPLOAD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-body-upload">
        <div class="container">
          <div class="row justify-content-center mt-5">
              <div class="col-md-12">
                  <div class="card">

                      <div class="card-body">
                          <form method="POST" action="{{ route('post.newUpload') }}" id="form1" enctype="multipart/form-data">
                              @csrf
                              <input type="text" value="{{$id}}" name="titleid" style="display:none">
                              <div class="form-group row">
                                  <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                  <div class="col-md-6">
                                      <input id="name" maxlength="50" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                      @error('name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="tod" class="col-md-4 col-form-label text-md-right">Type of data</label>

                                  <div class="col-md-6">
                                      <input id="tod" maxlength="10" type="tod" class="form-control @error('tod') is-invalid @enderror" name="tod" value="{{ old('tod') }}" required autocomplete="tod" autofocus>

                                      @error('tod')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>


                              <div class="form-group row">
                                  <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                  <div class="col-md-6">
                                      <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" cols="30" rows="10"></textarea>

                                      @error('description')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="toa" class="col-md-4 col-form-label text-md-right">Type of analysis</label>

                                  <div class="col-md-6">
                                      <input id="toa" maxlength="30" type="toa" class="form-control @error('toa') is-invalid @enderror" name="toa" required autocomplete="toa">

                                      @error('toa')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="when" class="col-md-4 col-form-label text-md-right">When</label>

                                  <div class="col-md-6">
                                      <input id="when" maxlength="100" type="when" class="form-control @error('when') is-invalid @enderror" name="when" required autocomplete="when">

                                      @error('when')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                    <label for="where" class="col-md-4 col-form-label text-md-right">Where</label>

                                    <div class="col-md-6">
                                        {{-- <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus> --}}
                                        <input id="where" maxlength="120" type="where" class="form-control @error('where') is-invalid @enderror" name="where" required autocomplete="where">
                                        @error('where')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="file" class="col-md-4 col-form-label text-md-right">Upload File</label>

                                    <div class="col-md-6">
                                        <input id="fileUp" type="file" class="form-control-file @error('file') is-invalid @enderror" name="fileUp" required autocomplete="file">

                                        @error('file')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="text" name="tof" style="display:none" id="tof">
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" form="form1" >Save</button>
        <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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
              <button type="button" class="btn btn-light modalPPClose" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>
<button data-toggle="modal" data-target="#modalAuthor" id="btn-author" class="d-none"></button>
<div class="col-lg-10 mx-auto post-body"></div>
<script>
  $(function(){
    console.log("{!! $_SERVER["DOCUMENT_ROOT"].'/..' !!}");
    var checkAuthor = {!! $checkAuthor !!},
        fileData = {!! $fileData !!},
        postInfo = {!! $postInfo !!},
        postDescription = {!! $postDescription !!},
        id = {!! $id !!},
        author = {!! $author !!},
        check = null,
        dataPPall = {!! $dataPP !!},
        role = {!! $role !!};
    var checkCurrentUser = checkAuthor.length == 0 ? "d-none" : "d-inline-block";
    console.log(postInfo);
    createMetadataList = (data) => {
      $(".metadata").children().remove();
      $(".metadata").append(
        $("<div>", { class: "iDefault"}).append(
          $("<div>", { class: "modal-header", text: "Title: " + data.name}),
          $("<div>", { class: "modal-header", text: "Description: " + data.description}),
          $("<div>", { class: "modal-header", text: "Type of analysis: " + data.typeOfAnalysis}),
          $("<div>", { class: "modal-header", text: "Type of data: " + data.typeOfData}),
          $("<div>", { class: "modal-header", text: "When: " + data.when}),
          $("<div>", { class: "modal-header", text: "Where: " + data.where}),
        ),
      );
    };
    $("#modalPP").on("hide.bs.modal", function(){
      location.reload();
    });
    createFileList = function(data){
      return $("<tbody>", { class: "tbody-file"}).append(
        $.map(data, function(v){
          return $("<tr>", { class: "mb-2 cp"}).append(
            $("<td>", { class: "text-left w-10"}).append(
              files(v.typeOfFile),
            ),
            $("<td>", { class: "w-75", text: v.name}).on("click", function(){
              $(".selectFile").addClass("d-none");
              createMetadataList(v);
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
                      $("<input>", { class: "form-control col-lg-8", name: "nameEdit", value: v.name}),
                    ),
                    $("<div>", { class: "form-group row col-lg-12"}).append(
                      $("<label>", { class: "col-lg-4 col-form-label", text: "Description:"}),
                      $("<textarea>", { class: "form-control col-lg-8", name: "descriptionEdit", value: v.description, text: v.description}),
                    ),
                    $("<div>", { class: "form-group row col-lg-12"}).append(
                      $("<label>", { class: "col-lg-4 col-form-label", text: "Type of Analysis:"}),
                      $("<input>", { class: "form-control col-lg-8", name: "toaEdit", value: v.typeOfAnalysis}),
                    ),
                    $("<div>", { class: "form-group row col-lg-12"}).append(
                      $("<label>", { class: "col-lg-4 col-form-label", text: "Type of data:"}),
                      $("<input>", { class: "form-control col-lg-8", name: "todEdit", value: v.typeOfData}),
                    ),
                    $("<div>", { class: "form-group row col-lg-12"}).append(
                      $("<label>", { class: "col-lg-4 col-form-label", text: "When:"}),
                      $("<input>", { class: "form-control col-lg-8", name: "whenEdit", value: v.when}),
                    ),
                    $("<div>", { class: "form-group row col-lg-12"}).append(
                      $("<label>", { class: "col-lg-4 col-form-label", text: "Where:"}),
                      $("<input>", { class: "form-control col-lg-8", name: "whereEdit", value: v.where}),
                    ),
                    $("<input>", { class: "d-none", name: "titleid", value: {!! $id !!} }),
                    $("<input>", { class: "d-none", name: "fileid", value: v.id }),
                    $("<div>", { class: "col-lg-12 text-right mb-2"}).append(
                      $("<button>", { class: "btn btn-success", text: "Save" }).on("click", function(){
                        var nameEdit = $("input[name='nameEdit']").val(),
                            descriptionEdit = $("textarea[name='descriptionEdit']").val(),
                            toaEdit = $("input[name='toaEdit']").val(),
                            todEdit = $("input[name='todEdit']").val(),
                            whenEdit = $("input[name='whenEdit']").val(),
                            whereEdit = $("input[name='whereEdit']").val(),
                            titleid = $("input[name='titleid']").val(),
                            fileid = $("input[name='fileid']").val();
                        $.getJSON("{!! route('post.updateFile') !!}", { nameEdit : nameEdit, descriptionEdit: descriptionEdit, toaEdit: toaEdit, todEdit: todEdit, whenEdit: whenEdit, whereEdit: whereEdit, titleid: titleid, fileid: fileid}, function(data){
                          $(".table-file").children().remove();
                          $(".table-file").append(
                            createFileList(data),
                          );
                          newData = $.grep(data, function(n,i){
                            return n.id == fileid;
                          });
                          createMetadataList(newData[0]);
                          $(".iEditFile").removeClass("d-none");
                        });
                      }),
                    ),
                  ),
                )
              }),
            ),
            $("<td>", { class: "w-5 iEditFile d-none" }).append(
              $("<button>", { class: "btn btn-danger btn-file-edit d-inline-block mr-2", "data-toggle":"modal", "data-target":"#delFile"}).append(
                $("<i>", { class :"far fa-trash-alt"}),
              ).on("click", function(){
                $("#bodyDel").text("Delete "+ v.name + " ?").attr({"fileid": v.id, "linkFile": v.link});
              }),
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
      );
    };
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
    };
    $(".post-body").append(
      $("<form>", { method:"POST", action: "{!! route('post.updateProjectInfo') !!}"}).append(
        $("<input>", { class: "d-none", name: "_token", value:" {!! csrf_token() !!}"}),
        $("<input>", { class: "d-none", name: "titleid", value:{!! $id !!}}),
        $("<h3>", { class: "modal-header iDefault", id: "title", text: postInfo[0].title }),
        $("<h3>", { class: "modal-header iEdit d-none w-100"}).append(
          $("<input>", { class: "form-control", value: postInfo[0].title, text: postInfo[0].title, name: "title" }).css({"border":"none"}),
        ),
        $("<div>", { class: "col-lg-6 mb-3 " + checkCurrentUser}),
        $("<div>", { class: "col-lg-6 mb-3 " + checkCurrentUser}).append(
          $("<div>", { class: "col-lg-8 mx-auto" }).append(
            $("<button>", { class: "d-inline-block btn mr-2 btn-success", "data-target": "#modalPP", "data-toggle": "modal", type:"button"}).append(
              $("<i>", { class: "fas fa-user-plus" }),
            ),
            $("<button>", { class: "d-inline-block btn mr-2 btn-primary btn-edit", type:"button"}).append(
              $("<i>", { class: "far fa-edit" }),
            ).on("click", function(){
              $(".iEdit").removeClass("d-none").addClass("d-inline-block");
              $(".iDefault").removeClass("d-inline-block").addClass("d-none");
              $(".iEditFile").removeClass("d-none");
              $.getJSON("{!! route('subject.get') !!}", (data)=>{
                console.log(data);
                $("#subjectPost").append(
                  $.map(data,(v)=>{
                    if (postInfo[0].subject_id != v.id)
                      return $("<option>", { text: v.nameSubject, value: v.id, id: v.nameSubject });
                  }),
                );
              });
              $.getJSON("https://gist.githubusercontent.com/piraveen/fafd0d984b2236e809d03a0e306c8a4d/raw/eb8020ec3e50e40d1dbd7005eb6ae68fc24537bf/languages.json", function(data){
                $("#lang").append(
                  $.map(data,function(v){
                    if (postInfo[0].language != v.name )
                      return $("<option>", { value: v.name, text: v.name, id: v.name});
                  }),
                );
                $("#"+postInfo[0].language).attr("selected","true");
              });
            }),
            $("<button>", { class: "d-inline-block btn mr-2 btn-danger", type:"button", "data-toggle": "modal", "data-target": "#modalDelPost"}).append(
              $("<i>", { class: "fas fa-trash" }),
            ).on("click", function(){
                $(".modal-body-delPost").text("Delete " + postInfo[0].title + " ?").attr("titleid", postInfo[0].id);
            }),
          ),
        ),
        $("<div>", { class: "col-lg-6 d-inline-block align-top"}).append(
          $("<div>", { class: "mb-2"}).append(
            $("<strong>", { class: "col-lg-4 d-inline-block text-right", text: "Authors:"}),
            $("<div>", { class: "col-lg-8 d-inline-block text-left author"}).append(
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
            $("<div>", { class: "col-lg-8 d-inline-block text-left iDefault", text: postInfo[0].nameSubject}),
            $("<select>", { class: "col-lg-8 text-left iEdit d-none form-control", text: postInfo[0].nameSubject, value: postInfo[0].subject_id , name: "subject", id:"subjectPost"}).append(
              $("<option>", { value: postInfo[0].subject_id, text: postInfo[0].nameSubject, selected: true  }),
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
            $("<select>", { class: "col-lg-8 text-left iEdit d-none form-control", text: postInfo[0].language, value: postInfo[0].language , name: "lang", id:"lang"  }).append(
              $("<option>", { value: postInfo[0].language, text: postInfo[0].language, selected: true  }),
            ),
          ),
          $("<div>", { class: "mb-2"}).append(
            $("<strong>", { class: "col-lg-4 d-inline-block text-right", text: "Availability:"}),
            $("<div>", { class: "col-lg-8 d-inline-block text-left iDefault", text: postInfo[0].availability}),
            $("<select>", { class: "col-lg-8 text-left iEdit d-none form-control", text: postInfo[0].availability, value: postInfo[0].availability , name: "availability" }).append(
              $("<option>", { value: "Private" , text: "Private", selected: ("Private" == postInfo[0].availability ? true : false) }),
              $("<option>", { value: "Public" , text: "Public", selected: ("Public" == postInfo[0].availability ? true : false) }),
            ),
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
            $("<input>", { class: "col-lg-8 text-left iEdit d-none form-control", text: postDescription[0].yearStart, value: postDescription[0].yearStart , name: "start" }),
          ),
          $("<div>", { class: "mb-2"}).append(
            $("<strong>", { class: "col-lg-4 d-inline-block text-right", text: "Year end:"}),
            $("<div>", { class: "col-lg-8 d-inline-block text-left iDefault", text: postDescription[0].yearEnd}),
            $("<input>", { class: "col-lg-8 text-left iEdit d-none form-control", text: postDescription[0].yearEnd, value: postDescription[0].yearEnd , name: "end" }),
          ),
        ),
        $("<div>", { class: "modal-header text-large h5 mt-4", text: "Abstract"}),
        $("<div>", { class: "iDefault", text: postDescription[0].abstract }),
        $("<textarea>", { class: "col-lg-12 form-control iEdit d-none", text: postDescription[0].abstract, name: "abstract"}),
        $("<div>", { class: "modal-header text-large h5 mt-4", text: "Keywords"}),
        $("<div>", { class: "iDefault", text: postDescription[0].keyword }),
        $("<input>", { class: "col-lg-12 form-control iEdit d-none", value: postDescription[0].keyword, name: "keyword"}),
        $("<div>", { class: "modal-header text-large h5 mt-4", text: "Funding"}),
        $("<div>", { class: "iDefault", text: postDescription[0].funding }),
        $("<input>", { class: "col-lg-12 form-control iEdit d-none", value: postDescription[0].funding, name: "funding"}),
        $("<div>", { class: "modal-header text-large h5 mt-4", text: "Publication"}),
        $("<div>", { class: "iDefault", text: postDescription[0].publication }),
        $("<input>", { class: "col-lg-12 form-control iEdit d-none", value: postDescription[0].publication, name: "publication"}),
        $("<div>", { class: "text-right mt-2 iEditFile d-none"}).append(
          $("<button>", { class: "btn btn-success text-right", text: "Save Changes"}),
        ),
      ),
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
              $("<button>", { class: "btn btn-success", text: "Add File", "data-target":"#modalUpload", "data-toggle":"modal"}).on("click", function(){
                
              }),
            ),
          ),
        ),
        $("<div>", { class: "rounded col-lg-12 py-2"}).append(
          $("<div>", { class: "col-lg-6 d-inline-block fileList rounded align-top"}).append(
            $("<table>", { class: "table table-hover table-responsive-lg table-file"}).append(
              createFileList(fileData),
            ),
          ).css({"overflow":"auto", "max-height":"200px"}),
          $("<div>", { class: "col-lg-6 d-inline-block metadata border border-muted rounded align-top"}).css({"overflow":"auto", "max-height": "200px","height":"193px"}).append(
            $("<div>", { class: "selectFile position-absolute", text: "Select a file to see file type metadata."}).css({"top":"50%","left":"50%","transform":"translate(-50%,-50%)"}),
          ),
        ),
      ),
    );
    createTablePP = function(data){
      console.log(data,2);
      var dataPPemail = [],
          dataPP = [];
      $.get("{!! route('post.getAll',['id'=>$id]) !!}", function(all){
        $.map(all,function(v){
           dataPPemail.push({"value": v.email ,"userid":v.id});
           dataPP.push(v);
        });
      });
      if (data && data.length){
        console.log(data,1);
        $("#tbody-pp").append(
          $.map(data, function(v,i){
            return $("<tr>").append(
              $("<th>", { scope: "row"}).append(
                $("<input>", { id: "input-name", class: "w-100", disabled: "disabled", value: v.email }).css({"border":"0", "outline":"none"}).autocomplete({
                  source: dataPPemail
                }).on("autocompleteclose", function(){
                  console.log("vaof");
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
                    $("<option>", { value: v.role_id, text: v.nameRole }),
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
                  $.get("{!! route('role.get') !!}", (data)=>{
                    $(".disabled-up"+v.id).append(
                      $.map(data,(value)=>{
                        if (value.id != v.role_id)
                          return $("<option>", { text: value.nameRole, value: value.id});
                      }),
                    );
                  });
                  
                  $(".disabled-up"+v.id).attr("disabled", false);
                  $(".check"+v.id+",.iclose"+v.id).removeClass('d-none').addClass('d-inline-block');
                  $(this).addClass('d-none').removeClass('d-inline-block');
                  $(".idelete"+v.id).addClass('d-none').removeClass('d-inline-block');
                }),
                $("<div>", { class:"btn btn-danger d-inline-block cp pt-1 pb-1 pr-3 pl-3 align-middle idelete"+v.id, "data-toggle": "modal", "data-target": "#modalDelUser"}).append(
                    $("<i>", { class: "far fa-trash-alt" }),
                ).on("click",function(){
                  $(".modalDelUser").text("Delete " + v.email + " from this project ?").attr("titleid", v.title_id).attr("userid", v.user_id);
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
                $("<select>", { type: "role", name: "role", id: "roleSelect" }).css({
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
        $.get("{!! route('role.get') !!}", (data)=>{
          $("#roleSelect").append(
            $.map(data,(v)=>{
                return $("<option>", { text: v.nameRole, value: v.id});
            }),
          )
        });
      }
    };
    deleteUser = function(){
      var titleid = $(".modalDelUser").attr("titleid"),
          userid = $(".modalDelUser").attr("userid");
      $.get("{!! route('post.DelUser',['id'=>$id]) !!}", { userid: userid }, function(data){
        $("#tbody-pp").children().fadeOut().remove();
        createTablePP(data);
      });
    };
    createTablePP(dataPPall);
    $("#fileUp").on("change",function(){
      $("#tof").val($("#fileUp").val().split(".").reverse()[0]);
    });
    $("#form1").on("submit", function(event){
      event.preventDefault();
      var formData = new FormData(this);
      var xhr = new XMLHttpRequest();
      xhr.open('POST','{!! route('post.newUpload') !!}', true);
      xhr.send(formData);
      xhr.onload = function(){
        if (xhr.status === 200) {
          $(".table-file").children().remove();
          $(".table-file").append(
            createFileList($.parseJSON(xhr.response)),
          );
          $(".iEditFile").removeClass("d-none");
          $(".btn-close").click();
        } else {
          alert('An error occurred!');
        }
      }
    });
    delFile = function(){
      var id = $("#bodyDel").attr("fileid"),
          link = $("#bodyDel").attr("linkFile");
      $.getJSON("{!! route("post.delFile",['id'=>$id]) !!}", {idfile: id, link: link}, function(data){
        if ( data.length != 0 ){
          $(".alert").remove(); 
          $(".table-file").children().remove();
          $(".table-file").append(
            createFileList(data),
          );
          $(".btn-close,.btn-edit").click();
        }
      });
    };
    delPost = function(){
      var id = $('.modal-body-delPost').attr('titleid');
      $.get('{!! route('post.delPost') !!}', { id: id}, function(data){
        if ( data == "ok")
          location.href = "{!! route('myresources.create') !!}";
      });
    };
  });
</script>
@endsection
