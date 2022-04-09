@extends("layouts.app")
@section("content")
<div class="role-form">
    <div class="" style="width:100%;">
        <label for="">Project Name</label><br>
        <input class="input-div-full" name="" id="" cols="30" rows="5"></input>
    </div>
   
    
</div>
<div class="role-form">
    <div class="input-div">
        <label for="">Code</label><br>
        <input type="text">
    </div>
    <div class="input-div">
        <label for="">Initiated for</label><br>
        <select name="" id="">
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
        </select> 
   </div>
    
</div>
<div class="role-form">
    <div class="" style="width:100%;">
        <label for="">Project description</label><br>
        <textarea class="input-div-full" name="" id="" cols="30" rows="5"></textarea>
    </div>
   
    
</div>
<div class="role-form-3">
    <div class="input-div">
        <label for="">Start date</label><br>
        <input type="text">
    </div>
    <div class="input-div">
        <label for="">End date</label><br>
        <input type="text">
    </div>
    <div class="input-div">
        <label for="">Duration</label><br>
        <select name="" id="">
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
        </select> 
   </div>
    
</div>
<div class="role-form">
<div class="input-div">
        <label for="">Project owner</label><br>
        <select name="" id="">
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
        </select> 
   </div>
    <div class="input-div">
        <label for="">remarks</label><br>
        <input type="text">
    </div>  
</div>

<div class="role-form">
    <div class="" style="width:100%;">
        <label for="">Attachment</label><br>
        <input class="input-div-full" type="file" ></input>
    </div>
   
    
</div>

    <div class="button">
        <input type="submit" value="Cancel">
        <input type="submit" class="colored-btn">
    </div>
@endsection