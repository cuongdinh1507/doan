@extends("index")
@section('content')
<div class="col-lg-10 mx-auto">hihi</div>
<script>
  $(function(){
    var checkAuthor = {!! $checkAuthor !!},
        fileData = {!! $fileData !!},
        postInfo = {!! $postInfo !!},
        postDescription = {!! $postDescription !!},
        author = {!! $author !!};
    console.log(author);
  });
</script>
@endsection
