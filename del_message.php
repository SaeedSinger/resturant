 <?php  
   
extract($_REQUEST);
$pageTitle = 'Delete Message';

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
        // Delete Message
        
      echo '<h1 class="text-center"> Delete Message </h1>';
      echo '<div class="container">';
      
            // check If Get Request msgid Is Numeric & Get Integer Value Of It
																											
		    $msgid = isset($_GET['msgid']) && is_numeric($_GET['msgid']) ? intval($_GET['msgid']) : 0;
              
            // Select All Data Depend On This ID
			$stmt = $conn->prepare("SELECT * FROM messages WHERE msg_id = ? LIMIT 1");
			$stmt->execute(array($msgid));
																								
			$count = $stmt->rowCount();
            
            // If There Is Such ID Show Form
            if($count > 0) 
            {
                $stmt = $conn->prepare("DELETE FROM messages WHERE msg_id = :zid");
				$stmt->bindParam(":zid" , $msgid); // To Related Between Parameter (:zid) With Variable $msgid
				$stmt->execute();
                
                // Echo Success Message
				echo "<div class='container' style='margin:150px auto;'>";
                    
                    echo '<div class="alert alert-success">'.$stmt->rowCount(). ' Message Is Deleted </div>';
                         
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
            
            
            
            
            
            