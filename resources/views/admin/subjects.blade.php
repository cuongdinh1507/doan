@extends("admin.admindb")
@section("content")
<div class="modal fade" id="delPi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body modal-body-pi">
            ...
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="delS()">Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Subject</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{!! route('subject.update') !!}" id="formEdit" enctype="multipart/form-data">
                @csrf
                <input type="text" class="d-none" id="subject_id" name="id">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="nameEdit" maxlength="30" type="name" class="form-control @error('name') is-invalid @enderror" name="name" required autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                    <div class="col-md-6">
                        <textarea id="descriptionEdit" type="description" class="form-control @error('description') is-invalid @enderror" name="description" cols="30" rows="10"></textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="file" class="col-md-4 col-form-label text-md-right">Upload File</label>
                    <div class="col-md-6 btnImage">
                        <button class="btn btn-primary" type="button" onclick="newImage()">New Image</button>
                    </div>
                    <div class="col-md-6 d-none" id="fileEdit">
                        
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" form="formEdit" type="submit">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add new Subject</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{!! route('subject.save') !!}" id="form1" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="name" maxlength="30" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                    <div class="col-md-6">
                        <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" cols="30" rows="10"></textarea>

                        @error('description')
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
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" form="form1">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Subjects</li>
</ol>
<div class="alert alert-success text-center col-md-8 mx-auto d-none" role="alert">
</div>
<div class="modal fade" id="delS" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-body-pi">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="delS()">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalCenter">Add new</button>
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Subjects</div>
  <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-responsive-lg table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tbody-subject"></tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted updateDT">Updated yesterday at 11:59 PM</div>
</div>
<script>
    $(function(){
        var dt = new Date();
        var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
        var month = dt.getMonth()+1;
        var day = dt.getDate();
        var date = ((''+day).length<2 ? '0' : '') + day + '/' + ((''+month).length<2 ? '0' : '') + month + '/' + dt.getFullYear();
        $(".updateDT").text("Updated at " + time + " on "+ date);
        $.get("{!! route('subject.get') !!}", function(data){
            console.log(data);
            $("#tbody-subject").append(
                $.map(data, function(v,i){
                return $("<tr>").append(
                    $("<td>", { class: "" , text: i+1 }),
                    $("<td>", { class: "w-10" ,text: v.nameSubject }),
                    $("<td>", { class: "w-50" ,text: v.descriptionSubject }),
                    $("<td>", { class: "w-25 text-center" }).append(
                        $("<img>", { src: v.imageSubject, class: "w-50" }),
                    ),
                    $("<td>", { class: "text-center"}).append(
                        $("<button>", { class: "btn btn-success mt-2 col-lg-8", "data-toggle":"modal", "data-target":"#edit"}).append(
                            $("<i>", { class: "fas fa-pencil-alt"}),
                        ).on("click", function(){
                            $("#subject_id").val(v.id);
                            $("#nameEdit").val(v.nameSubject);
                            $("#descriptionEdit").val(v.descriptionSubject);
                        }),
                        $("<button>", { class: "btn btn-danger mt-2 col-lg-8", "data-toggle":"modal", "data-target":"#delPi"}).append(
                            $("<i>", { class: "fas fa-trash-alt"}),
                        ).on("click", function(){
                            $(".modal-body-pi").text("Do you want to delete " + v.nameSubject + " ?").attr("subjectid", v.id);
                        }),
                    ),
                );
                }),
            );
            $("#dataTable").DataTable();
        });
        delS = () => {
            var id = $(".modal-body-pi").attr("subjectid");
            $.get("{!! route('subject.del') !!}", { id: id}, (data)=> {
                if(data == "ok")
                    location.reload();
            });
        };
        newImage = () => {
            $(".btnImage").addClass('d-none');
            $("#fileEdit").removeClass('d-none').append(
                $("<input>", { type: "file", name : "fileEdit", required: true}),
            );
        }
    });
</script>
@endsection