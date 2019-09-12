@extends("index")
@section('content')
<div class="text-center h1 mt-5">News</div>
<div class="col-md-8 mx-auto mt-5">
  <table class="table" id="mytable">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">Species</th>
        <th scope="col">Subject</th>
        <th scope="col">Language</th>
      </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>
</div>
<script>
  $(function(){
    var data = {!!$data!!};
    $("tbody").append(
      $.map(data, function(v,i){
        return $("<tr>").append(
          $("<th>", { scope: "row", text: i+1}),
          $("<th>").append(
              $("<a>", { href: "post/postid="+v.id, text: v.title}),
          ),
          $("<th>", { text: v.name }),
          $("<th>", { text: v.species }),
          $("<th>", { text: v.subject }),
          $("<th>", { text: v.language }), 
        );
      })
    );
    $("#mytable").DataTable();
  });
</script>
@endsection
