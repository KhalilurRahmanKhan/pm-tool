
@extends("layouts.app")
@section("content")
<form method="post" action="{{url('role/store')}}"  >
    @csrf
<div class="role-form">
           <div class="input-div">
                <label for="">Role</label><br>
                <input autofocus type="text" name="role" id="role" value="{{old('role')}}" placeholder="Type the role" ><br>
                 @error('role')
                <small class="text-danger">{{$message}}</small>
            @enderror
            </div>
           
            <div class="input-div">
                <label for="">Comments</label><br>
                <input type="text" name="comments" id="comments" value="{{old('comments')}}" placeholder="Write the comments"><br>
                     @error('comments')
                <small class="text-danger">{{$message}}</small>
            @enderror
            </div>
            
           </div>
            <div class="button">
            
                <input type="reset" value="Cancel">
                <input type="submit" name="" value="Submit"  class="colored-btn">
    </div>
    
</form>
<!-- 
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
jQuery(document).ready(function(){
  jQuery('#role_submit').submit(function(e){
      e.preventDefault();
      $.ajaxSetup({
          beforeSend: function(xhr, type) {
              if (!type.crossDomain) {
                  xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
              }
          },
      });
      jQuery.ajax({
        url: "{{ url('role/ax') }}",
        method: 'post',
        data: {
            role: jQuery('#role').val(),
            comments: jQuery('#comments').val(),
        },
        success: function(result){
          alert(result.success);
      
        }});

        jQuery('#role').val("");
        jQuery('#comments').val("");
      });
  });
  </script>
   -->
 

@endsection
  