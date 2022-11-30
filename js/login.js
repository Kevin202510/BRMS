$(document).ready(function(){
    $("#loginBTN").click(function(e){
        
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "userFunctions/logincrud.php",
            data: $("#loginForm").serialize(),
            success: function(datas){
                alert("Work Saved Successfully");
                location.reload();
            },
          });
        
    });
    
});