$(document).ready(function(){
    $("#saveBTN").click(function(e){
        
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "functions/categoriescrud.php",
            data: $("#categoriesForm").serialize(),
            success: function(datas){
                alert("Work Saved Successfully");
                location.reload();
            },
          });
        
    }); 
});