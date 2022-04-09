@extends("layouts.app")
@section("content")
<main class="col-md-8 ms-sm-auto col-lg-10 m-auto">
   
<div class="row mb-3">
    <div class="col-md-10">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Filter
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
    </div>
    </div>
    <div class="col-md-2">
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