 <?php  
   
extract($_REQUEST);
$pageTitle = 'Delete Customer';

include 'init.php'; 
   
$do = isset($_GET['do']) ? $_GET['do'] : 0;

if(!isset($_SESSION['admin']))
{
	header("location:login.php");
	
}   
else
{
    if($do == 'Delete')
    {
        // Delete Customer
        
      echo '<h1 class="text-center"> Delete Order </h1>';
      echo '<div class="container">';
      
             	// check If Get Request custid Is Numeric & Get Integer Value Of It
																											
				$orderid = isset($_GET['orderid']) && is_numeric($_GET['orderid']) ? intval($_GET['orderid']) : 0;
              
             	// Select All Data Depend On This ID
				$stmt = $conn->prepare("SELECT * FROM tbl_order WHERE order_id = ? LIMIT 1");
				$stmt->execute(array($orderid));
																								
			 $count = $stmt->rowCount();
           
           
             // If There Is Such ID Show Form
             if($count > 0) 
             {
                	$stmt = $conn->prepare("DELETE FROM tbl_order WHERE order_id = :zoid AND status_admin='Delivered'");
                 $stmt->bindParam(":zoid" , $orderid); 
                 $stmt->execute();
                             
                             // Echo Success Message
                 echo "<div class='container' style='margin:150px auto;'>";
                            
                 echo '<div class="alert alert-success">'.$stmt->rowCount(). ' Order Is Deleted </div>';
                                     
                 header("refresh: 3; url = dashboard.php");
                 exit();
                     
                 echo "</div>";

             }
            else
			{
				echo "<div class='container'>";
				echo "<div class='alert alert-danger'> This ID Is Not Exist </div>";			
				echo "</div>";
			}
      echo '</div>';
    }
    
}    
    
    


include $tpl .'footer.php';  
    
 ?>   