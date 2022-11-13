<?php 

session_start(); 

include "connection.php";

if (isset($_POST['email']) && isset($_POST['pswd'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $email = validate($_POST['email']);

    $pswd = validate($_POST['pswd']);

    if (empty($email)) {

        header("Location: index.html?error=User Name is required");

        exit();

    }else if(empty($pswd)){

        header("Location: index.html?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM registration WHERE email='$email' AND pswd='$pswd'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && $row['pswd'] === $pswd) {

                echo "Logged in!";

                $_SESSION['email'] = $row['email'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['id'] = $row['id'];

                header("Location: home.html
                ");

                exit();

            }else{

                header("Location: index.html?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.html?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: index.html");

    exit();

}
