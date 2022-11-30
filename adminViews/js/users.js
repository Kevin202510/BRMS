$(document).ready(function(){
    $("#saveBTN").click(function(e){
        
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "functions/userscrud.php",
            data: $("#userForm").serialize(),
            success: function(datas){
                //alert("Work Saved Successfully");
                location.reload();
            },
          });
        
    });
    
});