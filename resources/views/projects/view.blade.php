@extends("layouts.app")

@section("content")
<main class="col-md-8 ms-sm-auto col-lg-10 m-auto">
<div class="container">
    <iframe src="/uploads/projects/{{$file}}" frameborder="0" width="100%" height="500px"></iframe>
</div>
</main>
@endsection