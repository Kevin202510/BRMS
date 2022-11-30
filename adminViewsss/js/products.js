$(document).ready(function(){
    $("#saveBTN").click(function(e){
        
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "functions/productscrud.php",
            data: $("#productsForm").serialize(),
            success: function(datas){
                alert("Work Saved Successfully");
                location.reload();
            },
          });
        
    }); 
});