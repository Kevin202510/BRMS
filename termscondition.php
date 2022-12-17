<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>terms and condition</title>

    <style>

body{
    margin: 0;
    padding: 0;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.bg{
    background: url(elcarito-MHNjEBeLTgw-unsplash.jpg);
    height: 100vh;
    width: 100%;
    position: absolute;
    background-size: cover;
    filter: blur(5px);
    z-index: -1;
    opacity: 0.7;
    filter: brightness(75%);
}
.terms-box{
    max-width: 460px;
    background-color: rgb(83, 83, 83,0.1);
    color: #fff;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    padding: 0 20px;
    height: 400px;
    overflow-y: auto;
    font-size: 14px;
}
.terms-text{
    padding: 0 20px;
    height: 400px;
    overflow-y: auto;
    font-size: 14;
    font-weight: 500;
    color: #111;
}
.terms-text::-webkit-scrollbar{
    width: 2px;
    background-color: #282828;
}
.terms-text::-webkit-scrollbar-thumb{
    background-color: #f1f1f1;
}
.terms-text h2{
    text-transform: uppercase;
}
.terms-text h4{
    font-size: 13px;
    text-align: center;
    padding: 0 40px;
}
.terms-box h4 span{
    color: rgb(245, 68, 68);
    text-transform: uppercase;
}
.buttons{
    display: flex;
    padding: 0 20px;
    justify-content: space-between;
    padding-bottom: 50px;
}
.btn{
    height: 50px;
    width: calc(50% - 6px);
    border: 0;
    border-radius: 6px;
    font-size: 19px;
    font-weight: 500;
    color: #fff;
    transition: .3s linear;
    cursor: pointer;
}
.red-btn{
    background-color: rgb(245, 68, 68);
}
.gray-btn{
    background-color: #282828;
}
.btn:hover{
    opacity: .6;
}
        </style>
</head>

<body>
    <div class="bg"></div>
    <div class="terms-box">
        <div class="terms-text">
            <h2>Terms And Conditions</h2>
          
            <p>Greetings User</p>
            <p>A rental period is for a duration of 2 days, It means the rented item is due to be returned during the last day of the renting. Once a rental item has been collected in store, there are no returns or refunds for change of mind if the item is returned unworn within the rental peri-od or on the renting end date. If the item has been damaged or ripped it will charge or have a penalty to your rented stuff.</p>

           
       
       <h4>I Agree To The <span> Terms And Conditions</span> And I Read The Privacy Notice</h4>
       <div class="buttons">
           <button class="btn red-btn"><a href="checkout.php">Accept</button></a>
           
       </div>

            </div>
    </div>
</body>

</html>