$(document).ready(function(){
    $("#saveBTN").click(function(e){
        
        e.preventDefault();

        // alert("asd");

        $.ajax({
            type: "POST",
            url: "functions/rentcrud.php",
            data: $("#rentForm").serializeArray(),
            success: function(datas){
                //alert("Work Saved Successfully");
                location.reload();
            },
          });
        
    });

    $("#saveBTNs").click(function(e){
        
        e.preventDefault();

        // alert("asd");

        $.ajax({
            type: "POST",
            url: "functions/checkout.php",
            data: $("#rentForms").serializeArray(),
            success: function(datas){
                //alert("Work Saved Successfully");
                location.reload();
            },
          });
        
    });
    
});