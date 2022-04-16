
$(document).ready(function(){
    $("#profile").click(function(){
      $("#profile-menu").slideToggle();
    });
    
  });

document.getElementById('start_date').addEventListener("change",function(){
    let start_date = new Date(document.getElementById('start_date').value);
    var end_date = new Date(document.getElementById('end_date').value);

   
    const diffTime = Math.abs(end_date.getTime() - start_date.getTime());
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
    console.log(diffDays + " days");

    document.getElementById('duration').value=diffDays;

  
});
document.getElementById('end_date').addEventListener("change",function(){
    let start_date = new Date(document.getElementById('start_date').value);
    var end_date = new Date(document.getElementById('end_date').value);

   

    const diffTime = end_date.getTime() - start_date.getTime();
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
    console.log(diffDays + " days");

    document.getElementById('duration').value=diffDays;

});



