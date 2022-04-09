@extends("layouts.app")
@section('title')
Projects
@endsection
@section("content")
<main class="col-md-8 ms-sm-auto col-lg-10 m-auto">
   
<div class="row mb-3">
    <div class="col-md-6">
    <a href="/projects/create"><button type="button" class="btn btn-secondary">Create new project</button></a>

    </div>
</div>

<table class="table table-success table-striped">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Project Name</th>
      <th scope="col">Description</th>
      <th scope="col">Start date</th>
      <th scope="col">End date</th>
      <th scope="col">Duration</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
    
    </tr>
    
  </tbody>
</table>
</main>
@endsection