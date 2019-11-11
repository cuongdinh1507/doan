@extends("admin.admindb")
@section("content")
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Project Data Description</li>
</ol>
<div class="alert alert-success text-center col-md-8 mx-auto d-none" role="alert">
</div>
<div class="modal fade" id="delPdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-body-pdd">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="delPdd()">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Project Data Description</div>
  <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-responsive-lg table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Type Of data</th>
            <th>Description</th>
            <th>Type of Analysis</th>
            <th>When</th>
            <th>Where</th>
            <th>Link</th>
            <th>Uploaded by</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tbody-pdd"></tbody>
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
    $.get("{!! route('admin.tfu') !!}", function(data){
      $("#tbody-pdd").append(
        $.map(data, function(v,i){
          return $("<tr>").append(
            $("<td>", { text: i+1 }),
            $("<td>", { text: v.name }),
            $("<td>", { text: v.typeOfData }),
            $("<td>", { text: v.description }),
            $("<td>", { text: v.typeOfAnalysis }),
            $("<td>", { text: v.when }),
            $("<td>", { text: v.where }),
            $("<td>").append(
              $("<a>",  { text: v.link.slice(32).split(".")[0], href: "post/getDownloadFileid=" + v.id }),
            ),
            $("<td>", { text: v.email }),
            $("<td>", { class: "text-center"}).append(
              $("<button>", { class: "btn btn-danger", "data-toggle":"modal", "data-target":"#delPdd"}).append(
                $("<i>", { class: "fas fa-trash-alt"}),
              ).on("click", function(){
                $(".modal-body-pdd").text("Do you want to delete user "+ v.name + " (" + v.email + ") ?").attr("file",v.id);
              }),
            ),
          );
        }),
      );
      $("#dataTable").DataTable();
    });
    delPdd = function(){
      var id = $(".modal-body-pdd").attr("file");
      console.log(id);
      $.get('{!! route('admin.delPdd') !!}', { id: id }, function(data){
        if ( data == "ok" ){
          $(".alert").removeClass('d-none').append(
            $("<strong>", { text: "File ID:"+ id +" has been deleted!"}),
          );
          setTimeout(function(){
            location.reload();
          },1000);
        }
      });
    };
  });
</script>
@endsection