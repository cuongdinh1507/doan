@extends("admin.admindb")
@section("content")
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Projects Information</li>
</ol>
<div class="alert alert-success text-center col-md-8 mx-auto d-none" role="alert">
</div>
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
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="delPi()">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Projects Information</div>
  <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-responsive-lg table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Owner</th>
            <th>Subject</th>
            <th>Species</th>
            <th>Language</th>
            <th>Availability</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tbody-pi"></tbody>
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
    $.get("{!! route('admin.tp') !!}", function(data){
      console.log(data);
      $("#tbody-pi").append(
        $.map(data, function(v,i){
          return $("<tr>").append(
            $("<td>", { text: i+1 }),
            $("<td>").append(
                $("<a>", { href: "post/postid="+v.id, text: v.title}),
            ),
            $("<td>", { text: v.email }),
            $("<td>", { text: v.nameSubject }),
            $("<td>", { text: v.species }),
            $("<td>", { text: v.language }),
            $("<td>", { text: v.availability }),
            $("<td>", { class: "text-center"}).append(
              $("<button>", { class: "btn btn-danger", "data-toggle":"modal", "data-target":"#delPi"}).append(
                $("<i>", { class: "fas fa-trash-alt"}),
              ).on("click", function(){
                $(".modal-body-pi").text("Do you want to delete " + v.title + " ?").attr("titleid", v.id);
              }),
            ),
          );
        }),
      );
      $("#dataTable").DataTable();
    });
    delPi = function(){
      var id = $(".modal-body-pi").attr("titleid");
      console.log(id);
      $.get('{!! route('admin.delPi') !!}', { id: id }, function(data){
        if ( data == "ok" ){
          $(".alert").removeClass('d-none').append(
            $("<strong>", { text: "Post ID:"+ id +" has been deleted!"}),
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