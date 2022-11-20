<?php
     $txt =$_POST['txt'];
     $email =$_POST['email'];
     $pswd =$_POST['pswd'];

     $conn= new mysqli('localhost', 'root', '', 'rishwana');
     if($conn->connect_error) {
        die('Connection Failed: '.$conn->connect_error);
    }else{
        $stmt= $conn->prepare("insert into registration (txt, email, pswd) values(?, ?, ?)");
    }
    $stmt->bind_param("sss",$txt, $email, $pswd);
    $stmt->execute();
    $receiver = "$email";
    $subject = "confirmation email-visualizing and predicting heart disease";
    $body = " Dear $txt,
Hey there!!you have successfully registered in our app.Thank you for registering.welcome to our family.
visualize and predict your heart anytime,anywhere without cost!!

with regards
visualiaing and predicting heart disease app
    ";
    $sender = "From: rishsasshinysow@gmail.com";

    if(mail($receiver, $subject, $body, $sender)){
        echo "you have registered successfully.please check your mail.";
        header ("location: home.html");
    }else{
        echo "Sorry, failed while sending mail!";
        header ("location: index.html");
    }
    $stmt->close();
    $conn->close();
    ?>

