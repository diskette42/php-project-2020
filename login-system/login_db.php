<?php
    session_start();
    include('server.php');
    $errors = array();


    if (isset($_POST['login'])) {
       $email = $_POST['email'];
    //     $password = $_POST['password'];
        $password=md5($_POST['password']);

        $sql= "select email,password from user where email = '$email' AND password = '$password'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            echo "<script>
            alert('Welcome to clean food');
            window.location.href = '../index.php';
            </script>";
            $_SESSION['email']=$email;
            $_SESSION['login']=true;
        }  else {
           echo "<script>
           alert('Fail');
           window.location.href = '../index.php';
           </script>";
        }
        
        
        // if (count($errors) == 0) {
        //     $password = md5($password);
        //     $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        //     $result = mysqli_query($conn, $query);

        //     if (mysqli_num_rows($result) == 1) {
        //         $_SESSION['username'] = $username;
        //         $_SESSION['success'] = "You are now login";
        //         header("location: index.php");
        //     } else {
        //         array_push($errors, "Wrong username/password combination");
        //         $_SESSION['error'] = "Wrong username or password try again!";
        //         header("location: login.php");
        //     }
        // }
        }
?>