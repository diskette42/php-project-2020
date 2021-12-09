<?php
    session_start();
    include('server.php');
    $errors = array();
    $_SESSION['login']=false;
        session_destroy();
       echo "<script>
       window.location.href = '../index.php';
       </script>" 















?>