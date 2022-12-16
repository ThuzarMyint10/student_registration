<?php

require_once APPROOT . '/views/inc/header.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="card text-center my-5" style="width: 18rem; margin-left: 40%;"> 
        <div class="card-header text-white bg-success">
          <h5>  Resending Token</h5>
</div>
<div class="card-body text-center ">
    
        <p> Dear<?php echo $data['name']?></p>
        <p>Your Token Key is expired!!!!!!</p>
        <p>Please Click Resend Button!</p>  
        <a class= "btn btn-success" href='<?php echo URLROOT; ?>/auth/resendToken/<?php echo $data['token'] ?>'>Resend</a>
        <br><br>
        
        <p> Thanks for visiting to our Website </p>
        <p> Director of ItVision Hub </p>
        <p> <?php echo $data['name'];?> </p>
</div>
</div>
</body>
</html>