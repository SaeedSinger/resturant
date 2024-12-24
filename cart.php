<?php

extract($_REQUEST);
$pageTitle = 'Cart';

include 'init.php';
$sum=0;
$do = isset($_GET['do']) ? $_GET['do'] :'Delete';
if(isset($_GET['food_id']))
{
	$food_id = $_GET['food_id'];
	/*
	$stmt = $conn->prepare("SELECT cost FROM menu WHERE food_id=$food_id");
	$stmt->execute();
	$row=$stmt->fetch();
	$sum=$sum+$row['cost'];
	echo $sum;
	*/
}
else
{
	$food_id = "";
	/*
	if($food_id==""){
        //echo "Add items to cart first.";
    ?>
        <script>
        window.alert("No items in the cart!!");
        </script>
    <?php
    }
    */
}


if(!isset($_SESSION['cust_id']))
{
	header("location:login.php");
	
}
else
{
	$cust_id=$_SESSION['cust_id'];
	$stmt = $conn->prepare("SELECT * FROM customers WHERE id=$cust_id");
	$stmt->execute();
	$row = $stmt->fetch();
  
}
if(!empty($food_id && $cust_id))
{
	$stmt = $conn->prepare("INSERT INTO cart (fk_food_id, fk_customer_id) VALUES ($food_id, $cust_id)");
	$stmt->execute();
	
	$food_id="";
	header("location:cart.php");
}

if($do == 'Delete')
{
	
	$cartid = isset($_GET['cartid']) && is_numeric($_GET['cartid']) ? intval($_GET['cartid']) : 0;
	
	$stmt = $conn->prepare("DELETE FROM cart WHERE cart_id=$cartid AND fk_customer_id=$cust_id");
	//$stmt->bindParam("ii", $cartid, $cust_id);
	$stmt->execute();
	
}

if($do == 'Update')
{
        $cust_id = isset($_GET['cust_id']) && is_numeric($_GET['cust_id']) ? intval($_GET['cust_id']) : 0;
	
        $stmt1 = $conn->prepare("UPDATE cart SET status='Confirmed' WHERE fk_customer_id=$cust_id");
        $stmt1->execute();
 
       header("location:order.php");
}

?>



<div class="container">
    <div class="table-responsive">
        <table class="main-table text-center table table-bordered" border="1" bordercolor="#F0F0F0">
            <tr>
                <th>Food Number</th>
                <th>Food Image</th>
                <th>Food Name</th>
                <th>Food Price</th>
                <th>Email </th>
                <th> </th>
            </tr>
                <?php
                    $stmt =$conn->prepare("SELECT cart.*, menu.food_img, menu.food_name, menu.cost, customers.email 
                                                FROM cart
												
                                                INNER JOIN menu
												
                                                ON
                                                    menu.food_id = cart.fk_food_id
													
												INNER JOIN customers
												
												ON
												    customers.id = cart.fk_customer_id
												WHERE
												    cart.fk_customer_id=$cust_id");
                    $stmt->execute();
                    $rows  = $stmt->fetchAll();
					$count = $stmt->rowCount();
                    $counter=1;
					if($count > 0)
					{
						foreach($rows as $row)
						{
							echo "<tr>";
								echo "<td>" . $counter ."</td>";
								echo "<td>";
								echo "<img src='images/menu/" . $row['food_img'] ."' alt=''/>";
								echo "</td>";
								echo "<td>" . $row['food_name'] ."</td>";
								echo "<td>" ."$".$row['cost'] ."</td>";
								echo "<td>" . $row['email'] . "</td>";
													  
								echo "<td>
										   <a href='cart.php?do=Delete&cartid=". $row['cart_id'] . "' class='btn btn-danger confirm'> <i class='fa fa-close'></i> Remove</a>";
								echo "</td>";
												 
							echo "</tr>";
							
							$counter++;
							$sum=$sum+$row['cost'];
							
							
						}
						echo "<tr>";
								echo "<td colspan='2'><h3 style='color:red;'>Total</h3></td>"; 
								echo "<td colspan='2'><h3>$" .$sum ."</h3></td>";
								echo "<td colspan='2'>
							
										<a href='cart.php?do=Update&cust_id=$cust_id' class='btn btn-warning' style=' color:white; font-weight:bold; text-transform:uppercase;'>Confirm Order</a>
										
									 </td>";
									 //<a href='confirm_order.php?do=confirm_order&cust_id=$cust_id'><button type='button' style=' color:white; font-weight:bold; text-transform:capitalize;' class='btn btn-warning'>Confirm Order</button></a>
									 //<button type='submit' name='update' style=' color:white; font-weight:bold; text-transform:capitalize;' class='btn btn-warning'>Confirm Order</button>
								//echo "<td> </td>";
						echo "</tr>";
					}
					else
					{
						echo "<tr>";
						      echo "<td colspan='6'><button type='button' class='btn btn-warning btn-lg' style=' margin:100px;'><a href='menu.php' style='color:white; font-weight:bold; text-decoration:none;'>No Food In cart Let's Order Now</a></button></td>";
					    echo "</tr>";
					}
                ?>
        </table>
    </div>        
</div>	


<?php

include $tpl .'footer.php';
?>