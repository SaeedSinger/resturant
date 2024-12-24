<?php

//session_start();
//$noNavbar = '';
extract($_REQUEST);
$pageTitle = 'Login / Signup';

include 'init.php';

if(isset($_GET['food_id']))
{
	$food_id= $_GET['food_id'];
}
else
{
	$food_id= "";
}
/*
if(isset($_SESSION['username']))
{
   header('Location: index.php');
}
*/
//if($_SERVER['REQUEST_METHOD'] == 'POST')
if(isset($btnlogin))
{
  $email = $_POST['email'];
//   $pass  = $_POST['pass'];
  
   $hashpass = sha1($_POST['pass']);
  
  // Check If User Exist In Database
  $stmt  = $conn->prepare("SELECT * FROM customers WHERE email=? AND password=?");
  $stmt->execute(array( $email,$hashpass));
//   $stmt->execute(array( $email,$pass));


  $row   = $stmt->fetch();
  $count = $stmt->rowCount();
  //echo  $row ;
  if($count > 0)
  {
   
				$_SESSION['adminID'] = $row['adminID'];
				
		
			
			if($_SESSION['adminID'] == 1)
			{
			      $_SESSION['cust_id']      = $row['id'];
				//echo $_SESSION['cust_id']   = $_SESSION['id'];
									$_SESSION['email']       = $email;
							  $_SESSION['admin']       = $row['name'];
									
	       header('location:dashboard.php');			
			}
			else
			{
			
			      $_SESSION['id']          = $row['id'];
									$_SESSION['username']    = $row['name'];
									$_SESSION['email']       = $email;
			
			
   if(!empty($email))
		{
			 //$_SESSION['product']=$product_id;
			echo $_SESSION['cust_id'] = $_SESSION['id'];
			
			header("location:index.php");
			// header("location:cart.php?food_id=$food_id");
			
		}
		else
		{
		header("location: index.php");
		 $_SESSION['food_id']=$food_id;
		 $_SESSION['cust_id'];
		}
  
  // header('Location: index.php'); // To Move To dashboard Page
  // exit();
		 }	
  }
  else
  { 
				echo "<div class='alert alert-danger' style='margin-bottom: 0;'> You Must Be Register First</div>";
  }
}
if(isset($btnregister))
{
   $username = $_POST['user'];
   $email    = $_POST['email'];
   $phone    = $_POST['phone'];
			$addr     = $_POST['address'];
//    $pass     = $_POST['pass'];
   
   $hashpass      = sha1($_POST['pass']);
   
   $stmt = $conn->prepare("SELECT * FROM customers WHERE email=?");
   $stmt->execute(array( $email));
   $row = $stmt->rowCount();
   
   if($row > 0)
   {
    echo "<div class='alert alert-danger' style='margin-bottom: 0;'> Sorry This Email Already Registered With Us</div>";
   }
   
   
   else
   { 
               
                    // Insert CustomerInfo In Database 
    $stmt = $conn->prepare("INSERT INTO customers(name, email, phone, address, password ,Date)
                                                       VALUES(:zname, :zmail, :zphone, :zaddr, :zpass,now()) "); // VALUES(?, ?, ?, ?)
    $stmt->execute(array(
    
        'zname'   => $username,
        'zmail'   => $email,
        'zphone'  => $phone,
								'zaddr'   => $addr,
        // 'zpass'   => $pass,
		'zpass'   => $hashpass

                                      
     ));
                  
       // Echo Success Message
   
    echo "<div class='container' style='margin:150px auto;'>";
                
							echo "<div class='alert alert-success'>You Are Registered Login Now</div>";                   
										header("refresh: 3; url = login.php");
										exit();
                     
    echo "</div>";               
   }
   
}
?>


 <div class="middle-bg">
			
				<div class="overlay"></div>
						<div class="middle" style=" margin:0px auto;width:400px;">
										<div class="container">
													<div class="row">
														  <div class="col-lg-12 col-xs-12">
																	   <div class="xnav">
																						<ul class="nav nav-tabs nabbar_inverse" id="myTab" style="background:#ffc107;border-radius:50px 50px 50px 50px;" role="tablist">
																									<li class="nav-item">
																												<a class="nav-link active" style="color:#BDDEFD;" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Log In</a>
																									</li>
																									<li class="nav-item">
																													<a class="nav-link" id="signup-tab" style="color:#BDDEFD;" data-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="false">Create New Account</a>
																									</li>
																						</ul>
																				</div>		
																</div>
									    <div class="col-lg-12 col-xs-12">
														<div class="card" id="login">
															<div class="container">
																	<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
																					<h2 class="text-center">Login</h2>
																					
																					<div class="input-group">
																										<input type="email" name="email" required/>
																										<label for="#{label}">Email</label>
																										<div class="bar"></div>
																					</div>
																					
																					<div class="input-group">
																										<input type="password" name="pass" required/>
																										<label for="#{label}">Password</label>
																										<div class="bar"></div>
																				</div>
																					
																					<input class="btn btn-warning btn-block " name="btnlogin" style="width:80%;" type="submit" value="Login" />
																					
																	</form>
															</div> 
														</div>
													</div>
										
										
														
												<div class="col-lg-12 col-xs-12">
														<div class="card reg" id="signup">
																<div class="container"> 
																	<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
																					<h2 class="text-center title">Register
																													
																					</h2>
																					
																					<div class="input-group">
																										<input type="text" name="user" required/>
																										<label for="#{label}">Username</label>
																										<div class="bar"></div>
																					</div>
																					
																					<div class="input-group">
																										<input type="email" name="email" required/>
																										<label for="#{label}">Email</label>
																										<div class="bar"></div>
																				</div>
																					
																			<div class="input-group">
																										<input type="text" name="phone" pattern="[0]{1}[1]{2}[0-2]{3}[0-9]{4-8}" required/>
																										<label for="#{label}">Phone</label>
																										<div class="bar"></div>
																				</div>
																			
																			<div class="input-group">
																										<input type="text" name="address" required/>
																										<label for="#{label}">Address</label>
																										<div class="bar"></div>
																					</div>
																					
																				<div class="input-group">
																										<input type="password" name="pass" required/>
																										<label for="#{label}">Password</label>
																										<div class="bar"></div>
																				</div>
																					<input class="btn btn-warning btn-block " name="btnregister" style="width:80%;" type="submit" value="Signup" />
																					
																	</form>
															</div> 
														</div>
												</div>	
													</div>		
									</div>	
					</div>
		
	</div>


<?php

include $tpl .'footer.php';

?>