@extends("admin.admindb")
@section("content")
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Users</li>
</ol>
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Users</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-responsive-lg" id="dataTable" width="100%" cellspacing="0">
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
              $("<button>", { class: "btn btn-danger", text: "Delete"}),
            ),
          );
        }),
      );
      $("#dataTable").DataTable();
    });
  });
</script>
@endsection