@extends("admin.admindb")
@section("content")
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Project Description</li>
</ol>
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Project Description</div>
  <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-responsive-lg table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Abstract</th>
            <th>Keyword</th>
            <th>Funding</th>
            <th>Year start</th>
            <th>Year end</th>
            <th>Publication</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tbody-pd"></tbody>
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
    $.get("{!! route('admin.getProjectDescription') !!}", function(data){
      $("#tbody-pd").append(
        $.map(data, function(v,i){
          return $("<tr>").append(
            $("<td>", { text: i+1 }),
            $("<td>", { text: v.title }),
            $("<td>", { text: v.abstract }),
            $("<td>", { text: v.keyword }),
            $("<td>", { text: v.funding }),
            $("<td>", { text: v.yearStart }),
            $("<td>", { text: v.yearEnd }),
            $("<td>", { text: v.publication }),
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