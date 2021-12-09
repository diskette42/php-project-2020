<?php
session_start();
$host = "localhost";
 $user = "root";
 $password = "";
 $database = "shopping cart";
 date_default_timezone_set('Asia/Bangkok'); 
        $date = date("Y-m-d H:i:s");
	
	$conn = new mysqli($host,$user,$password,$database);
	
	if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      if (isset($_POST['address-ok'])){
        $address=$_POST['address'];
        $tel =$_POST['tel'];
        $email=$_SESSION['email'];
        $userid;
        
        echo $date;
    
        $sql2= "select userid from user where email='$email'; ";
        $result = $conn->query($sql2);
       while($row=$result->fetch_assoc()){
           $userid = $row['userid'];
        }
        $sql3="insert into `order`(userid,orderdate,address,mobilephone) values ($userid,'$date','$address',$tel)";
        if($conn -> query($sql3)){
            
         
        }
        else{
            echo $conn->error;
        }
    }
    
   
foreach ($_SESSION["cart_item"] as $item){
    $name = $item['name'];
    $quantity = $item['quantity'];
    $price = $item['price'];
    $totalprice = $item['price']*$item['quantity'];
    $sql1 = "select id from tblproduct
    where name='$name' ; ";
    $result = $conn->query($sql1);
   while($row=$result->fetch_assoc()){
       $id = $row['id'];
   }

    $sqll ="select OrderID from `order`
    where orderdate='$date';";
   $result = $conn->query($sqll);
   while($row=$result->fetch_assoc()){
       $OrderID=$row['OrderID'];
   }

  
   
    $sql = "insert into Order_Item (OrderID,id,name,Quantity,price,total_price) values ($OrderID,$id,'$name', $quantity,$price,$totalprice)";
   if( $conn -> query($sql)){
       echo "<script>
       alert('success');
            window.location.href = '../index.php';
            
       </script>";
   } else {
       echo $conn->error;
   }
}




?>
