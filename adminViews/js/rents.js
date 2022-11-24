$(document).ready(function(){
    $("#saveBTN").click(function(e){
        
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "functions/rentcrud.php",
            data: $("#rentForm").serialize(),
            success: function(datas){
                alert("Work Saved Successfully");
                location.reload();
            },
          });
        
    });
    
});