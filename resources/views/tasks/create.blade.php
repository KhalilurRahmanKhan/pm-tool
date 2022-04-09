@extends("layouts.app")
@section("content")
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tasks</h1>
      </div> 

    <div class="row">
        <div class="col-md-6 mx-auto">
        <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <textarea  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"></textarea>
        </div>
        <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Start date</label>
                <input type="date" class="form-control" id="firstName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">End date</label>
                <input type="date" class="form-control" id="lastName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>
    
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>

  

</main>

@endsection