<?php
    require_once('server.php');

    $error = array();

    if(isset($_POST['submit'])) {
        $firstname = $_POST['first_name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password_1 = $_POST['password'];
        

        $user_check_query = "SELECT * FROM user WHERE email = '$email' ";
       $result= $conn->query($user_check_query);

            if ($result->num_rows > 0) {
              echo  "<script>
                alert('You already register');
                window.location.href = '../index.php';
                </script>";
            }
        else{

            $password = md5($password_1);

            $sql = "INSERT INTO user (firstname,lastname, email, password) VALUES ('$firstname','$lastname', '$email', '$password')";

            if($conn->query($sql)){
          /*  $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";  */
            echo "<script>
            alert('Sign up success');
            window.location.href = '../index.php';
            </script>";
            }
        else {
           echo $conn->error;
        }
        }
    }
?>