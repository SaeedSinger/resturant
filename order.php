 <?php  
   
extract($_REQUEST);
$pageTitle = 'Order';

include 'init.php'; 
   
$do = isset($_GET['do']) ? $_GET['do'] : 0;

if(!isset($_SESSION['cust_id']))
{
	header("location:login.php");
	
}

else
{
 
 echo '<h1 class="text-center"> Confirm Order </h1>';
 echo '<div class="container">';
    $stmt =$conn->prepare("SELECT cart.*,customers.*, menu.food_name, menu.cost
																																																				 FROM cart
																																																					INNER JOIN customers
																																																					ON
																																																					   customers.id = fk_customer_id
																																																					INNER JOIN menu
																																																					ON
																																																					   menu.food_id = fk_food_id
																																																					WHERE
																																																					     status='Confirmed' AND cart.fk_customer_id=$cust_id");
        $stmt->execute();
        $rows  = $stmt->fetchAll();
        $count = $stmt->rowCount();
        
        
       
        
        if($count > 0)
        {
          foreach($rows as $row)
						    {
             $cart_id   = $row['cart_id'];
             $email     = $row['email'];
             $food_name = $row['food_name'];
             $price     = $row['cost'];
             $addr      = $row['address'];
            
             $stmt = $conn->prepare("INSERT INTO tbl_order (f_cart_id, customer_email, 	food_name, cost, address)
                                               VALUES(:zcid, :zmail, :zfname, :zprice, :zaddr)");
             $stmt->execute(array(
                                  
                'zcid'   => $cart_id,
                'zmail'  => $email,
                'zfname' => $food_name,
                'zprice' => $price,
                'zaddr'  => $addr
                                                                    
              ));
           
           
          }
          
          
        }
        
         //$cartid = isset($_GET['cartid']) && is_numeric($_GET['cartid']) ? intval($_GET['cartid']) : 0;

	        $stmt = $conn->prepare("DELETE FROM cart WHERE fk_customer_id=$cust_id");
	        $stmt->execute();
	    
     
           		// Echo Success Message
						echo "<div class='container' style='margin:150px auto;'>";
                
							echo "<div class='alert alert-success'> Your Order Is Confirmed <br> If You Want Order Other Food <a href='menu.php' style='color:red; font-weight:bold;text-decoration:none;'>Click Here</a></div>";
																									
      echo "</div>";
echo '</div>';      
}



include $tpl .'footer.php';
?>         