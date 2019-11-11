@extends("admin.admindb")
@section("content")
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Users</li>
</ol>
<div class="alert alert-success text-center col-md-8 mx-auto d-none" role="alert">
</div>
<div class="modal fade" id="delUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-body-user">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="delUser()">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Users</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-responsive-lg table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Country</th>
            <th>Institution</th>
            <th>Position</th>
            <th>Phone</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tbody-user"></tbody>
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
    $.get("{!! route('admin.tu') !!}", function(data){
      $("#tbody-user").append(
        $.map(data, function(v,i){
          return $("<tr>").append(
            $("<td>", { text: i+1 }),
            $("<td>", { text: v.name }),
            $("<td>", { text: v.email }),
            $("<td>", { text: v.address }),
            $("<td>", { text: v.country }),
            $("<td>", { text: v.institution }),
            $("<td>", { text: v.position }),
            $("<td>", { text: v.phone }),
            $("<td>").append(
              $("<button>", { class: "btn btn-danger", "data-toggle":"modal", "data-target":"#delUser"}).append(
                $("<i>", { class: "fas fa-trash-alt"}),
              ).on("click", function(){
                $(".modal-body-user").text("Do you want to delete user "+ v.name + " (" + v.email + ") ?").attr("userid",v.id);
              }),
            ),
          );
        }),
      );
      $("#dataTable").DataTable();
    });
    delUser = function(){
      var id = $(".modal-body-user").attr("userid");
      console.log(id);
      $.get('{!! route('admin.delUser') !!}', { id: id }, function(data){
        if ( data == "ok" ){
          $(".alert").removeClass('d-none').append(
            $("<strong>", { text: "User ID:"+ id +" has been deleted!"}),
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