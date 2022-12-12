$(document).ready(function(){
    $("#saveBTN").click(function(e){
        
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "functions/productscrud.php",
            data: $("#productsForm").serialize(),
            success: function(datas){
                // console.log(datas);
                // location.reload();
            },
          });
        
    }); 
});