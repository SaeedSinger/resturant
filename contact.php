<?php

extract($_REQUEST);
$pageTitle = 'Contact Us';

include 'init.php';

if(isset($_SESSION['cust_id']))
{
	 $cust_id=$_SESSION['cust_id'];
     $stmt = $conn->prepare("SELECT * FROM customers WHERE id=?");
     $stmt->execute(array($cust_id));
	 $row   = $stmt->fetch();
	 $count = $stmt->rowCount();
	 if($count > 0)
	 {
		$cust_id    = $row['id'];
		$cust_email = $row['email'];
		$cust_name  = $row['name'];
	 
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
		   $name     = $_POST['name'];
		   $email    = $_POST['email'];
		   $message  = $_POST['message'];
		
		while($name === $cust_name  AND $email === $cust_email)
		{
		   $stmt = $conn->prepare("INSERT INTO messages (cust_name, cust_email, message) VALUES(:zname, :zemail, :zmsg)");
		   $stmt->execute(array(
				   
				   'zname'  => $name,
				   'zemail' => $email,
				   'zmsg'   => $message
								
			));
		   
		   
		   //echo "<script> alert('We will be Connecting You shortly')</script>";
		   	echo "<div class='container' style='margin:150px auto;'>";
                
                echo '<div class="alert alert-success">We will be Connecting You shortly</div>';
                    
                    header("refresh: 3; url = index.php");
                    exit();
                     
            echo "</div>"; 
		}
		echo "<div class='container' style='margin:150px auto;'>";
                
                echo '<div class="alert alert-danger">This E-mail Does Not Match With The E-mail Registered</div>';
                    
                    header("refresh: 3; url = index.php");
                    exit();
                     
        echo "</div>"; 
		
		
	   }
    }
}
else
{
	$cust_id="";
}

?>