<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByName = $db_handle->runQuery("SELECT * FROM tblproduct WHERE name='" . $_GET["name"] . "'");
			$itemArray = array($productByName[0]["name"]=>(array('name'=>$productByName[0]["name"], 
			'quantity'=>$_POST["quantity"], 
			'price'=>$productByName[0]["price"],
			 'image'=>$productByName[0]["image"])));	

			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByName[0]["name"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByName[0]["name"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["name"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<!DOCTYPE html>
<HTML>
<HEAD>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link
      rel="stylesheet"
      type="text/css"
      href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    />
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div class="row">
<img src="../resources/img/logo transparent.png" alt="food logo" class="logo" />
	<ul class="main-nav">
	<?php 
              echo "<li><h6>".$_SESSION['email']."</h6></li>",
              "<li><a name='logout' type='submit' href='../login-system/logout.php'>Logout </a></li>";
            
            ?>
	</ul>
</div>
<div id="shopping-cart">
<div class="txt-heading">Food Cart</div>
<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
<form method="post" action="Ordercontroller.php" >
      <div id="id01" class="modal">
         <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <div class="guess"><i class="fas fa-map-marked-alt"></i></div>
        <div class="container">
          <label class="address"for="address">Adress:</label>
          <textarea
            type="address"
            name="address"
            id="address"
            placeholder="assign your address"
			required style="width:70%"
		  ></textarea>
		  <div class="mobilephone">
		  <label class="tel" for="tel">Mobile phone:</label>
		  <input 
			  type="tel"
			  name="tel"
			  id="tel"
			  placeholder="your mobile no."
			  required
		  />
		</div>
          <button type="submit" name="address-ok">Ok</button>
        </div>
      </div>
    </form>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1" >
<tbody>
<tr>
<th>Name</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="10%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td name="name"><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td name="quantity" style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td name="price" style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&name=<?php echo $item["name"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
	}
		?>

<tr>
<td colspan="1" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>

<?php
	} else {
	?>
	<div class="no-records">No Food</div>
<?php 
}
?>
 			<script>
              function address(){
                document.getElementById('id01').style.display='block'
              }
			</script>
<a id="btnEmpty" onclick="address()" href="#">Confirm Order</a>

</div>

<div id="product-grid">
	<div class="txt-heading">Our Food</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="index.php?action=add&name=<?php echo $product_array[$key]["name"]; ?>" method="post">
				<div class="product-image">
					<img src=" <?php echo $product_array[$key]["image"]; ?>" alt="images">
				</div>
				<div class="product-title-footer">
					<div class="product-title">
						<?php echo $product_array[$key]["name"]; ?>
					</div>
					<div class="product-price">
						<?php echo "$".$product_array[$key]["price"]; ?>
					</div>
					<div class="cart-action">
						<input type="text" class="product-quantity" name="quantity" value="1" size="2" />
						<input type="submit" value="Add to Cart" class="btnAddAction" />
					</div>
				</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
</BODY>
</HTML>
