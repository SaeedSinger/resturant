<?php

   extract($_REQUEST);
   $pageTitle = 'Add New Admin';

   include 'init.php';

if(isset($_SESSION['admin']))
{
	

    //Add New Admin
	if(isset($add_admin))
	{
        
        $admin_name = $_POST['admin_name'];
        $email      = $_POST['email'];
        $phone      = $_POST['phone'];
        $addr       = $_POST['address'];
        $pass       = $_POST['pass'];
        
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
         $stmt = $conn->prepare("INSERT INTO customers(name, email, phone, address, password ,Date,adminID)
                                             VALUES(:zname, :zmail, :zphone, :zaddr, :zpass,now(),1) "); // VALUES(?, ?, ?, ?)
         $stmt->execute(array(
         
             'zname'   => $admin_name,
             'zmail'   => $email,
             'zphone'  => $phone,
             'zaddr'   => $addr,
             'zpass'   => $pass,
             'zpass'   => $hashpass
                                           
          ));
                       
            // Echo Success Message
        
            echo "<div class='container' style='margin:150px auto;'>";
                     
                echo "<div class='alert alert-success'>".$admin_name." => Has Become A New Admin Login Now</div>";                   
                    header("refresh: 3; url = dashboard.php");
                    exit();
                          
            echo "</div>";               
        }
        
        
		
	}
    

?>
   <section class="dash-bg">
    
       <h1 class="text-center"> Add Admin </h1>
                <div class="container">
                       <form class="form-horizontal addfood" action="" method="POST" enctype="multipart/form-data">
                       
                             <!-- Start Name Field --> 
                             <div class="form-group">
                                <div class="row">
                                   <label class="col-sm-2 control-label">Admin Name</label>
                                   <div class="col-sm-10">
                                      <input type="text" name="admin_name" class="form-control" placeholder="Admin Name" required="required"/>
                                   </div>
                                </div>   
                             </div>
                             <!-- End Name Field -->
                             
                            <!-- Start Email Field --> 
                             <div class="form-group">
                                <div class="row">
                                   <label class="col-sm-2 control-label">Email</label>
                                   <div class="col-sm-10">
                                      <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required="required"/>
                                   </div>
                                </div>   
                             </div>
                             <!-- End Email Field -->
                             
                            <!-- Start Phone Field --> 
                             <div class="form-group">
                                <div class="row">
                                   <label class="col-sm-2 control-label">Phone</label>
                                   <div class="col-sm-10">
                                      <input type="text" name="phone" class="form-control" pattern="[0]{1}[1]{2}[0-2]{3}[0-9]{4-8}" placeholder="01234567891" required="required"/>
                                   </div>
                                </div>   
                             </div>
                             <!-- End Phone Field -->
                                
                            <!-- Start Address Field --> 
                             <div class="form-group">
                                <div class="row">
                                   <label class="col-sm-2 control-label">Address</label>
                                   <div class="col-sm-10">
                                      <input type="text" name="address" class="form-control" placeholder="Enter Your Address" required="required"/>
                                   </div>
                                </div>   
                             </div>
                             <!-- End Address Field -->
                             
                            <!-- Start Password Field --> 
                             <div class="form-group">
                                <div class="row">
                                   <label class="col-sm-2 control-label">Password</label>
                                   <div class="col-sm-10">
                                      <input type="password" name="pass" class="form-control" placeholder="Enter Your Password" required="required"/>
                                   </div>
                                </div>   
                             </div>
                             <!-- End Password Field -->
                              
                                                                             
                             <!-- Start Submit --> 
                             <div class="form-group">
                                <div class="row">
                                   <div class="col-sm-offset-6 col-sm-6">
                                      <input type="submit" name="add_admin" value="Add Admin" class="btn btn-warning" />
                                   </div>
                                </div>   
                             </div>
                             <!-- End Submit -->
                       </form>
                 </div>
    
   </section>

<?php
}
else
{
    header("location:login.php");
    exit();
}
?>