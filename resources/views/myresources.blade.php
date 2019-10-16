@extends("index")
@section('content')
<div class="text-center h1 mt-5 mb-4">My Resources</div>
@if (@session()->has(message_add))
    <div class="alert alert-success text-center col-md-8 mx-auto" role="alert">
      <strong>Success</strong> {{session()->get("message_add")}}
    </div>
@endif
<div style='display: none' value="{{$data}}" id="dataSave"></div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" titleid="0"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="delPost()">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-10 mx-auto">
    <a href="{{route('addNew.create')}}"><button type="button" class="btn btn-primary mt-2 mb-2 addnew"><i class="fas fa-plus"></i> Add new</button></a>
    <div>
        <table class="table table-responsive-lg table-hover table-bordered" id="mytable">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Role in Project</th>
              <th scope="col">Species</th>
              <th scope="col">Subject</th>
              <th scope="col">Language</th>
              <th scope="col" class="w-20">Actions</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
    </div>
</div>
<script>
    $(function(){
        var data = $.parseJSON($("#dataSave").attr("value"));
        console.log(data);
        $("tbody").append(
            $.map(data, function(v,i){
                return $("<tr>").append(
                    $("<th>", { class:"align-middle", scope: "row", text: i+1}),
                    $("<th>", { class:"align-middle"}).append(
                        $("<a>", { href: "post/postid="+v.id, text: v.title}),
                    ),
                    $("<th>", { class:"align-middle", text: v.nameRole }),
                    $("<th>", { class:"align-middle", text: v.species }),
                    $("<th>", { class:"align-middle", text: v.nameSubject }),
                    $("<th>", { class:"align-middle", text: v.language }),
                    $("<th>").append(
                        $("<a>", { href : "postUpdate/postid=" + v.id}).append(
                            $("<button>", { class:"btn btn-success d-inline-block cp pt-2 pb-2 pr-3 pl-3 mr-2 align-middle"}).append(
                                $("<i>", { class: "far fa-edit" }),
                            ),
                        ),
                        // $("<a>", { href: "post/uploadpostid="+ v.id }).append(
                        //     $("<button>", { class:"btn btn-primary d-inline-block cp pt-2 pb-2 pr-3 pl-3 mr-2 align-middle"}).append(
                        //         $("<i>", { class: "fas fa-upload" }),
                        //     ),
                        // ),
                        $("<button>", { class:"btn btn-danger cp pt-2 pb-2 pr-3 pl-3 mr-2 align-middle " + ((v.role == "Owner") ? "d-inline-block" : "d-none"), "data-toggle": "modal", "data-target": "#modal"}).append(
                            $("<i>", { class: "far fa-trash-alt" }),
                        ).on("click", function(){
                            $(".modal-body").text("Delete " + v.title + " ?").attr("titleid", v.id);
                        }),
                    ),
                );
            }),
        );
        $("#mytable").DataTable();
        delPost = function(){
          var id = $('.modal-body').attr('titleid');
          $.get('{!! route('post.delPost') !!}', { id: id}, function(data){
            if ( data == "ok")
              location.reload();
          });
        };
    });
</script>
@endsection
