@extends("admin.admindb")
@section("content")
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Project Personnel</li>
</ol>
<div class="alert alert-success text-center col-md-8 mx-auto d-none" role="alert">
</div>
<div class="modal fade" id="delPp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-body-pp">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="delPp()">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Project Personnel</div>
  <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-responsive-lg table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Title</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tbody-pp"></tbody>
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
    $.get("{!! route('admin.getPP') !!}", function(data){
      console.log(data);
      $("#tbody-pp").append(
        $.map(data, function(v){
          return $("<tr>").append(
            $("<td>").append(
              $("<a>", { href: "post/postid="+v.id, text: v.title}),
            ),
            $("<td>", { text: v.name }),
            $("<td>", { text: v.nameRole }),
            $("<td>", { text: v.email }),
            $("<td>", { text: v.phone }),
            $("<td>").append(
              $("<button>", { class: "btn btn-danger", text: "Delete", "data-toggle":"modal", "data-target":"#delPp"}).on("click", function(){
                $(".modal-body-pp").text("Do you want to delete " + v.title + " ( "+ v.name +" ) ?").attr({"title_id":v.title_id, "user_id":v.user_id, "role": v.role});
              }),
            ),
          );
        }),
      );
      $("#dataTable").DataTable();
    });
    delPp = function(){
      var title_id = $(".modal-body-pp").attr("title_id"),
          user_id = $(".modal-body-pp").attr("user_id"),
          role = $(".modal-body-pp").attr("role");
      console.log(title_id, user_id);
      $.get('{!! route('admin.delPp') !!}', { title_id: title_id, user_id:user_id, role: role }, function(data){
        if ( data == "ok" ){
          $(".alert").removeClass('d-none').append(
            $("<strong>", { text:  title_id + " (" + user_id + ") has been deleted!"}),
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