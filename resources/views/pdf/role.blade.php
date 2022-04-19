<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
  <table class="w3-table w3-striped w3-bordered">
    <tr>
      <th>Id</th>
      <th>Role</th>
      <th>Comments</th>
    </tr>
    @foreach($role as $item)
    <tr>
    
      <td>{{$item->id}}</td>
      <td>{{$item->role}}</td>
      <td>{{$item->comments}}</td>
    </tr>
    @endforeach
  
  </table>
</div>

</body>
</html>
