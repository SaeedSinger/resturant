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
        
      echo '<h1 class="text-center"> Delete Customer </h1>';
      echo '<div class="container">';
      
             	// check If Get Request custid Is Numeric & Get Integer Value Of It
																											
														$customid = isset($_GET['customid']) && is_numeric($_GET['customid']) ? intval($_GET['customid']) : 0;
              
             	// Select All Data Depend On This ID
														$stmt = $conn->prepare("SELECT * FROM customers WHERE id = ? LIMIT 1");
														$stmt->execute(array($customid));
																								
														$count = $stmt->rowCount();
           
           
             // If There Is Such ID Show Form
             if($count > 0) 
             {
                	$stmt = $conn->prepare("DELETE FROM customers WHERE id = :zid");
																 $stmt->bindParam(":zid" , $customid); // To Related Between Parameter (:zid) With Variable $custid
																	$stmt->execute();
                 
               		// Echo Success Message
																	echo "<div class='container' style='margin:150px auto;'>";
                
																				  echo '<div class="alert alert-success">'.$stmt->rowCount(). ' Customer Is Deleted </div>';
																									
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