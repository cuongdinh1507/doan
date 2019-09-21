@extends("index")
@section('content')
@if (@session()->has(uploaded))
    <div class="alert alert-success text-center col-md-8 mx-auto mt-5" role="alert">
      <strong>{{session()->get("uploaded")}}</strong> 
    </div>
@endif
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
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">NEW UPLOAD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
                                      <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                      <input id="tod" type="tod" class="form-control @error('tod') is-invalid @enderror" name="tod" value="{{ old('tod') }}" required autocomplete="tod" autofocus>

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
                                      <input id="toa" type="toa" class="form-control @error('toa') is-invalid @enderror" name="toa" required autocomplete="toa">

                                      @error('toa')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="lang" class="col-md-4 col-form-label text-md-right">When</label>

                                  <div class="col-md-6">
                                      <input id="when" type="when" class="form-control @error('when') is-invalid @enderror" name="when" required autocomplete="when">

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
                                        <input id="where" type="where" class="form-control @error('where') is-invalid @enderror" name="where" required autocomplete="where">
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
                                        <input id="file" type="file" class="form-control-file @error('file') is-invalid @enderror" name="file" required autocomplete="file">

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
        <button type="submit" class="btn btn-primary" form="form1">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row justify-content-center mt-5">
              <div class="col-md-12">
                  <div class="card">

                      <div class="card-body">
                          <form method="POST" action="{{ route('post.updateFile') }}" id="formEdit" enctype="multipart/form-data">
                              @csrf
                              <input type="text" value="{{$id}}" name="titleid" style="display:none">
                              <div class="form-group row">
                                  <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                  <div class="col-md-6">
                                      <input id="nameEdit" type="nameEdit" class="form-control @error('nameEdit') is-invalid @enderror" name="nameEdit" value="{{ old('nameEdit') }}" required autocomplete="name" autofocus>

                                      @error('nameEdit')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="todEdit" class="col-md-4 col-form-label text-md-right">Type of data</label>

                                  <div class="col-md-6">
                                      <input id="todEdit" type="todEdit" class="form-control @error('todEdit') is-invalid @enderror" name="todEdit" value="{{ old('todEdit') }}" required autocomplete="tod" autofocus>

                                      @error('todEdit')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>


                              <div class="form-group row">
                                  <label for="descriptionEdit" class="col-md-4 col-form-label text-md-right">Description</label>

                                  <div class="col-md-6">
                                      <textarea id="descriptionEdit" type="description" class="form-control @error('descriptionEdit') is-invalid @enderror" name="descriptionEdit" required autocomplete="descriptionEdit" cols="30" rows="10"></textarea>

                                      @error('descriptionEdit')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="toaEdit" class="col-md-4 col-form-label text-md-right">Type of analysis</label>

                                  <div class="col-md-6">
                                      <input id="toaEdit" type="toa" class="form-control @error('toaEdit') is-invalid @enderror" name="toaEdit" required autocomplete="toaEdit">

                                      @error('toaEdit')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="whenEdit" class="col-md-4 col-form-label text-md-right">When</label>

                                  <div class="col-md-6">
                                      <input id="whenEdit" type="whenEdit" class="form-control @error('whenEdit') is-invalid @enderror" name="whenEdit" required autocomplete="whenEdit">

                                      @error('whenEdit')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                    <label for="whereEdit" class="col-md-4 col-form-label text-md-right">Where</label>

                                    <div class="col-md-6">
                                        {{-- <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus> --}}
                                        <input id="whereEdit" type="where" class="form-control @error('whereEdit') is-invalid @enderror" name="whereEdit" required autocomplete="whereEdit">
                                        @error('whereEdit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row divEdit">
                                    <label for="file" class="col-md-4 col-form-label text-md-right">Upload File</label>

                                    
                                </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" form="formEdit">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid col-md-12">
  <div class="row justify-content-center mt-5">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header text-center">PROJECT DATA DESCRIPTION</div>

              <div class="card-body">
                <table class="table table-bordered" id="tableDD">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Tyfe of data</th>
                      <th scope="col">Data description</th>
                      <th scope="col">Type of analysis</th>
                      <th scope="col">When</th>
                      <th scope="col">Where</th>
                      <th scope="col">Link</th>
                      <th scope="col">Type of file</th>
                      <th scope="col" class="text-center" >Actions</th>
                    </tr>
                  </thead>
                  <tbody id="tbody-dd">
                  </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
</div>
<button type="button" class="btn btn-primary mt-2 mb-2 ml-3 addnew" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus"></i> New Upload</button>
<script>
  $(function(){
    $("#file").on("change", function(){
      console.log($("#file")[0]);
      $("#tof").val($("#file").val().split(".").reverse()[0]);
    });
    refresh = function(){
      $("#tbody-dd").children().remove();
      $.get("{!! route('post.getAllFile', ['id'=>$id]) !!}", function(data){
        $("#tbody-dd").append(
          $.map(data, function(v){
            return $("<tr>").append(
              $("<td>", { text: v.name, class: "put-dot" }),
              $("<td>", { text: v.typeOfData, class: "put-dot" }),
              $("<td>").append(
                $("<textarea>", { class: "w-100", text: v.description , disabled: true}),
              ),
              $("<td>", { text: v.typeOfAnalysis, class: "put-dot" }),
              $("<td>", { text: v.when, class: "put-dot" }),
              $("<td>", { text: v.where, class: "put-dot" }),
              $("<td>").append(
                $("<a>",  { text: v.link.slice(32).split(".")[0], href: "getDownloadFileid=" + v.id }),
              ),
              $("<td>", { text: v.typeOfFile }),
              $("<td>", ).css({"width":"8%"}).append(
                $("<div>", { class:"btn btn-success cp pt-1 pb-1 pr-3 pl-3 mr-2 align-middle " + ( ((v.user_id == "{!! Auth::user()->id; !!}")||({!! count($role) !!} == 1)  ) ? "d-inline-block" : "d-none"),"data-toggle":"modal", "data-target":"#modalEdit"  }).append(
                  $("<i>", { class: "fas fa-edit" }),
                ).on("click", function(){
                  $("#nameEdit").val(v.name);
                  $("#descriptionEdit").val(v.description);
                  $("#todEdit").val(v.typeOfData);
                  $("#toaEdit").val(v.typeOfAnalysis);
                  $("#whenEdit").val(v.when);
                  $("#whereEdit").val(v.where);
                  $(".ifUpdateFile").remove();
                  $(".divEdit").append(
                    $("<input>", { class: "d-none", value: v.id, name: "fileid"}),
                    $("<div>", { class: "col-md-6 ifUpdateFile"}).append(
                      $("<a>", { href: v.link.slice(32).split(".")[0], text: v.link.slice(32).split(".")[0], href: "getDownloadFileid=" + v.id }),
                      $("<div>", { class: "btn btn-danger cp ml-2"}).append(
                        $("<i>", { class: "fas fa-times"}),
                      ).on("click", function(){
                        $(this).parent().remove();
                        $(".divEdit").append(
                          $("<input>", { class: "d-none ifUpdateFile", id: "tofEdit", name: "tofEdit"}),
                          $("<div>", { class: "col-md-6 ifUpdateFile" }).append(
                            $("<input>", { id: "fileEdit", type:"file", class:"form-control-file @error('file') is-invalid @enderror", name:"fileEdit", required: true}).on("change", function(){
                              $("#tofEdit").val($("#fileEdit").val().split(".").reverse()[0]);
                            }),
                          ),
                        );
                      }),
                    ),
                  );
                }),
                $("<div>", { class:"btn btn-danger cp pt-1 pb-1 pr-3 pl-3 mr-2 align-middle " + ( ((v.user_id == "{!! Auth::user()->id; !!}")||({!! count($role) !!} == 1)  ) ? "d-inline-block" : "d-none"), "data-toggle":"modal", "data-target":"#delFile" }).append(
                  $("<i>", { class: "fas fa-trash-alt" }),
                ).on("click", function(){
                  $("#bodyDel").text("Delete "+ v.name + " ?").attr("fileid", v.id);
                }),
              ),
            );
          }),
        );
        $("#tableDD").DataTable();
      });
    };
    refresh();
    delFile = function(){
      var id = $("#bodyDel").attr("fileid");
      $.get("{!! route("post.delFile",['id'=>$id]) !!}", {idfile: id}, function(data){
        if ( data = "oke"){
          $(".alert").remove();
          refresh();
        }
      });
    };
  });
</script>
@endsection
