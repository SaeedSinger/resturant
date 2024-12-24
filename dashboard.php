<?php

//session_start();
//$noNavbar = '';
extract($_REQUEST);
$pageTitle = 'Admin Control Panel';
$noSearch = '';
include 'init.php';

$do = isset($_GET['do']) ? $_GET['do'] : 0;

if(!isset($_SESSION['admin']))
{
	header("location:login.php");
	
}
else
{
	$admin_username = $_SESSION['admin'];

	$stmt = $conn->prepare("SELECT * FROM customers WHERE name='$admin_username'");
	$stmt->execute();
	$row = $stmt->fetch();
	$count = $stmt->rowCount();
	
	if($count > 0)
	{
		 $admin_username = $row['name'];
			$admin_pass     = $row['password'];
			$admin_id       = $row['id'];
  	
	}
    
    //$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
				// Add New Food
    if(isset($add))
    {
        
        // Get Variables From The Form
           
           $food_name  = $_POST['food_name'];
           $food_desc  = $_POST['description'];
           $food_price = $_POST['price'];
           $food_cat   = $_POST['category'];
        
 
         // Upload Variables  
          $avatarName = $_FILES['food_img']['name'];
          $avatarSize = $_FILES['food_img']['size'];
          $avatarTmp  = $_FILES['food_img']['tmp_name'];
          $avatarType = $_FILES['food_img']['type'];
          
          // List Of Allowed File Typed To Upload
          
          $avatarAllowedExtension = array("jpeg","jpg","png","gif");
          
          // Get Avatar Extension
          //echo $avatarName;
          
          $avatarExtension = explode('.', $avatarName);
          $avatarExtension = end($avatarExtension);
          $avatarExtension = strtolower($avatarExtension);
          
           
           move_uploaded_file($avatarTmp , "images\menu\\".$avatarName);
           
           $stmt = $conn->prepare("INSERT INTO menu(food_img, food_name, description, cost, cat_id)
                                               VALUES(:zimg, :zname, :zdesc, :zcost, :zcat)");
           
           $stmt->execute(array(
            
                'zimg'  => $avatarName,
                'zname' => $food_name,
                'zdesc' => $food_desc,
                'zcost' => $food_price,
                'zcat'  => $food_cat 
                                                   
            ));
           
										            	echo "<div class='container' style='margin:150px auto;'>";
                
                            echo '<div class="alert alert-success">'.$food_name. ' => This Food Is Inserted </div>';
                    
                             header("refresh: 3; url = dashboard.php");
                             exit();
                     
                        echo "</div>"; 
    }
				// Update Admin
				if(isset($update))
				{
					
					 $admin_username = $_POST['username'];
			   $admin_id       = $_POST['admin_id'];
			
					 $admin_pass = empty($_POST['newpassword']) ? $_POST['password'] : sha1($_POST['newpassword']) ;
						
						$stmt = $conn->prepare("UPDATE customers SET name=?, password=? WHERE id=? AND adminID=1 ");
						
						 $stmt->execute(array($admin_username,$admin_pass,$admin_id));
							
							
							echo "<div class='container' style='margin:150px auto;'>";
                
          echo '<div class="alert alert-success">Admin '.$admin_username. ' Is Updated </div><br>';
										
										echo '<div class="alert alert-success">Please login With your New Info</div>';
									  
									
											session_unset();
											session_destroy();
										              
           header("refresh: 3; url = login.php");
           exit();
                     
       echo "</div>"; 
						
						
				}
				//Add New Admin
				if(isset($add_admin))
				{
					     header("location: new_admin.php");
          exit();
				}


?>

 <div class="dash-bg">
    <div class="container">
        
               <!--tab heading-->
	    <ul class="nav nav-tabs navbar_inverse row" id="myTab" style="background:linear-gradient(to right, #ffa713, #ffd200);border-radius:10px 10px 10px 10px;margin-top: 7px;" role="tablist">
                <li class="nav-item">
                   <a class="nav-link active" style="color:#BDDEFD;" id="viewmenu-tab" data-toggle="tab" href="#viewmenu" role="tab" aria-controls="viewmenu" aria-selected="true">View Menu</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link"  style="color:#BDDEFD;" id="addfood-tab" data-toggle="tab" href="#addfood" role="tab" aria-controls="addfood" aria-selected="false">Add Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  style="color:#BDDEFD;" id="manageaccount-tab" data-toggle="tab" href="#manageaccount" role="tab" aria-controls="manageaccount" aria-selected="false">Account Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:#BDDEFD;"  id="managecustomers-tab" data-toggle="tab" href="#managecustomers" role="tab" aria-controls="managecustomers" aria-selected="false">Manage Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:#BDDEFD;" id="orderstatus-tab" data-toggle="tab" href="#orderstatus" role="tab" aria-controls="orderstatus" aria-selected="false">Order status</a>
                </li>
																<li class="nav-item">
                    <a class="nav-link" style="color:#BDDEFD;" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Customers Messages</a>
                </li>
        </ul>
        
        <!------------------------------------------ Start Tab 1 --------------------------------------------->
                <div class="tab-content" id="myTabContent">   
                    <div class="tab-pane fade show active" id="viewmenu" role="tabpanel" aria-labelledby="viewmenu-tab">
                        <div class="container">
                            <div class="table-responsive">
                            		<table class="main-table text-center table table-bordered" border="1" bordercolor="#F0F0F0">
                                        <tr>
                                            <th>Food ID</th>
                                            <th>Food Image</th>
                                            <th>Food Name</th>
                                            <th>Food Price</th>
                                            <th>Food Category </th>
                                            <th>Control</th>
                                        </tr>
                                        <?php
                                            $stmt =$conn->prepare("SELECT menu.*, categories.Cat_Name AS Category_Name
                                                                   FROM menu
                                                                   INNER JOIN categories
                                                                   ON
                                                                      categories.Cat_ID = menu.cat_id");
                                            $stmt->execute();
                                            $rows = $stmt->fetchAll();
                                            
                                            foreach($rows as $row)
                                            {
                                             echo "<tr>";
                                                  echo "<td>" . $row['food_id'] ."</td>";
                                                  echo "<td>";
                                                       echo "<img src='images/menu/" . $row['food_img'] ."' alt=''/>";
                                                  echo "</td>";
                                                  echo "<td>" . $row['food_name'] ."</td>";
                                                  echo "<td>" ."$".$row['cost'] ."</td>";
                                                  echo "<td>" . $row['Category_Name'] . "</td>";
                                                  
                                                  echo "<td>
                                                          <a href='upd_food.php?do=Edit&foodid=". $row['food_id'] . "' class='btn btn-success'> <i class='fa fa-edit'></i> Edite</a>
                                                          <a href='upd_food.php?do=Delete&foodid=". $row['food_id'] . "' class='btn btn-danger confirm'> <i class='fa fa-close'></i> Delete</a>";
                                                 echo "</td>";
                                             
                                             echo "</tr>";
                                            }
                                            
                                        ?>
                                    </table>
                            </div>        
                        </div>
                    </div>
        
        <!------------------------ End Tab 1 --------------------------------------->
        
        <!------------------------ Start Tab 2 ------------------------------------->
         <div class="tab-pane fade" id="addfood" role="tabpanel" aria-labelledby="addfood-tab">
            
             <h1 class="text-center"> Add New Food </h1>
                <div class="container">
                       <form class="form-horizontal addfood" action="" method="POST" enctype="multipart/form-data">
                       
                             <!-- Start Name Field --> 
                             <div class="form-group">
                                <div class="row">
                                   <label class="col-sm-2 control-label">Food Name</label>
                                   <div class="col-sm-10">
                                      <input type="text" name="food_name" class="form-control" placeholder="Name Of The Food" required="required"/>
                                   </div>
                                </div>   
                             </div>
                             <!-- End Name Field -->
                             
                            <!-- Start Description Field --> 
                             <div class="form-group">
                                <div class="row">
                                   <label class="col-sm-2 control-label">Description</label>
                                   <div class="col-sm-10">
                                      <input type="text" name="description" class="form-control" placeholder="Description Of The Food" required="required"/>
                                   </div>
                                </div>   
                             </div>
                             <!-- End Description Field -->
                             
                            <!-- Start Price Field --> 
                             <div class="form-group">
                                <div class="row">
                                   <label class="col-sm-2 control-label">Price</label>
                                   <div class="col-sm-10">
                                      <input type="text" name="price" class="form-control" placeholder="Price Of The Food" required="required"/>
                                   </div>
                                </div>   
                             </div>
                             <!-- End Price Field -->
                                
                              <!-- Start Categories Field --> 
                            <div class="form-group">
                                <div class="row">
                                   <label class="col-sm-2 control-label">Category</label>
                                   <div class="col-sm-10">
                                    <select  name="category">
                                        <option value="0">...</option>
                                        
                                        <?php
                                             
                                             $stmt2 = $conn->prepare("SELECT * FROM categories");
                                             $stmt2->execute();
                                             $cats = $stmt2->fetchAll();
                                             
                                             foreach($cats as  $cat)
                                             {
                                                echo "<option value='". $cat['Cat_ID'] ."'>". $cat['Cat_Name'] ."</option>" ;
                                             }
                                        
                                        ?>
                                        
                                    </select>
                                   </div>
                                </div>   
                             </div>                              
                             <!-- End Categories Field -->
                             
                                <!-- Start Image Profile Field --> 
                                    <div class="form-group">
                                        <div class="row"> 
                                            <label class="col-sm-2 control-label">Food Image</label>
                                            <div class="col-sm-10">
                                               <input type="file" name="food_img" required="required" />
                                            </div>
                                        </div>    
                                    </div>
                             <!-- End Image Profile Field -->
                                                                             
                             <!-- Start Submit --> 
                             <div class="form-group">
                                <div class="row">
                                   <div class="col-sm-offset-6 col-sm-6">
                                      <input type="submit" name="add" value="Add Food" class="btn btn-warning" />
                                   </div>
                                </div>   
                             </div>
                             <!-- End Submit -->
                       </form>
                 </div>
         </div>
        
        <!------------------------ End Tab 2 --------------------------------------->
								
								<!------------------------ Start Tab 3 ------------------------------------->
								
							 <div class="tab-pane fade" id="manageaccount" role="tabpanel" aria-labelledby="manageaccount-tab">
									 <div class="container update_admin">
												<form calss="form-horizontal" method="post" enctype="multipart/form-data">
																						<input type="hidden" name="admin_id" value="<?php echo $admin_id ?>">
																										<!-- Start Name Field --> 
																															<div class="form-group">
																																		<div class="row">
																																					<label class="col-sm-2 control-label">Name</label>
																																					<div class="col-sm-10">
																																								<input type="text" name="username" class="form-control" value="<?php if(isset($admin_username)){ echo $admin_username;}?>" required="required"/>
																																					</div>
																																		</div>   
																															</div>
																										<!-- End Name Field -->
							
																							   <!-- Start Password Field --> 
																															<div class="form-group">
																																		<div class="row">
																																					<label class="col-sm-2 control-label">Password</label>
																																					<div class="col-sm-10">
																																						  <input type="hidden" name="password" class="form-control" value="<?php if(isset($admin_pass)){ echo $admin_pass;}?>"/>
																																								<input type="password" name="newpassword" class="form-control" placeholder="Leave Blank If You Don't Want To Change"/>
																																					</div>
																																		</div>   
																															</div>
																									<!-- End Password Field -->
																									
																									<!-- Start Submit --> 
                             <div class="form-group">
                                <div class="row">
                                   <div class="col-lg-2 col-sm-4">
                                      <input type="submit" name="update" value="Update Admin" class="btn btn-warning update" />
                                   </div>
																																			<div class="col-lg-2 col-sm-4">
																																				  <input type="submit" name="add_admin" value="Add New Admin" class="btn btn-warning add" style="width: 145px;"/>
																																			</div>
                                </div>   
                             </div>
                         <!-- End Submit -->

												</form>
										</div>
								</div>	
								<!------------------------ End Tab 3 --------------------------------------->
								
								<!------------------------ Start Tab 4 --------------------------------------->
								<div class="tab-pane fade" id="managecustomers" role="tabpanel" aria-labelledby="managecustomers-tab">
									
										 <div class="container">
              <div class="table-responsive">
                  <table class="main-table text-center table table-bordered" border="1" bordercolor="#F0F0F0">
                         <tr>
                             <th>Customer ID</th>
                             <th>Customer Name</th>
                             <th>Email</th>
                             <th>Phone</th>
                             <th>Address</th>
																													<th>Date</th>
																													<th>Control</th>
                         </tr>
																									
                         <?php
                               $stmt =$conn->prepare("SELECT * FROM customers");
                              $stmt->execute();
                              $rows = $stmt->fetchAll();
                                            
                              foreach($rows as $row)
                              {
                                             echo "<tr>";
                                                  echo "<td>" . $row['id'] ."</td>";
                                                  echo "<td>" . $row['name'] ."</td>";
                                                  echo "<td>" . $row['email'] ."</td>";
                                                  echo "<td>" . $row['phone'] . "</td>";
																																																		echo "<td>" . $row['address'] . "</td>";
																																																		echo "<td>" . $row['Date'] . "</td>";
                                                  
                                                  echo "<td>
                                                          <a href='del_customer.php?do=Delete&customid=". $row['id'] . "' class='btn btn-danger confirm' name='delete'> <i class='fa fa-close'></i> Delete</a>";
                                                 echo "</td>";
                                             
                                             echo "</tr>";
                              }
                                            
                         ?>
                                    </table>
                            </div>        
                        </div>
                    </div>
								
																
								<!------------------------ End Tab 4 ----------------------------------------->
								
								<!------------------------ Start Tab 5 --------------------------------------->
									<div class="tab-pane fade" id="orderstatus" role="tabpanel" aria-labelledby="orderstatus-tab">
									
										 <div class="container">
              <div class="table-responsive">
                  <table class="main-table text-center table table-bordered" border="1" bordercolor="#F0F0F0">
																			
																			      <tr>
                             <th>Order ID</th>
                             <th>Customer Email</th>
																													<th>Food Name</th>
																													<th>Price</th>
                             <th>Address</th>
																													<th>Date</th>
																													<th>Status</th>
																													<th>Control</th>
                         </tr>
																									
																								<?php
                              $stmt =$conn->prepare("SELECT * FROM tbl_order");
                              $stmt->execute();
                              $rows = $stmt->fetchAll();
                               //$counter=1;
																															
                              foreach($rows as $row)
                              {
                                             echo "<tr>";
                                                  echo "<td>" . $row['order_id'] ."</td>";
                                                  echo "<td>" . $row['customer_email'] ."</td>";
																																																		echo "<td>" . $row['food_name'] ."</td>";
																																																		echo "<td>" . $row['cost'] ."</td>";
																																																		echo "<td>" . $row['address'] . "</td>";
																																																		echo "<td>" . $row['Date'] . "</td>";
																																																		//echo "<td>" . $row['status_admin'] ."</td>";
                                                  echo "<td>
																																																		        
                                                          <a href='upd_status.php?status=".$row['status_admin']."&orderid=". $row['order_id'] . "' class='btn btn-success' name='upd_status'> ".$row['status_admin']."</a>";
																																																										
                                                 echo "</td>";
                                                  echo "<td>
																																																		        
                                                          <a href='del_order.php?do=Delete&orderid=". $row['order_id'] . "' class='btn btn-danger confirm' name='delete'> <i class='fa fa-close'></i> Delete</a>";
																																																										
                                                 echo "</td>";
                                             
                                             echo "</tr>";
																																													//$counter++;
                              }
                                            
                       ?>
																		</table>
														</div>
											</div>
									</div>	
								<!------------------------ End Tab 5 ------------------------------------------>
								
								<!------------------------ Start Tab 6 ---------------------------------------->
								<div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">
									
										 <div class="container">
              <div class="table-responsive">
                  <table class="main-table text-center table table-bordered" border="1" bordercolor="#F0F0F0">
                         <tr>
                             <th>Messages ID</th>
                             <th>Customer Name</th>
                             <th>Email</th>
                             <th>Messages</th>
																													<th>Control</th>
                         </tr>
																									
                         <?php
                               $stmt =$conn->prepare("SELECT * FROM messages");
                              $stmt->execute();
                              $rows = $stmt->fetchAll();
                                            
                              foreach($rows as $row)
                              {
                                             echo "<tr>";
                                                  echo "<td>" . $row['msg_id'] ."</td>";
                                                  echo "<td>" . $row['cust_name'] ."</td>";
                                                  echo "<td>" . $row['cust_email'] ."</td>";
                                                  echo "<td>" . $row['message'] . "</td>";
																																																	 
                                                  echo "<td>
                                                          <a href='del_message.php?do=Delete&msgid=". $row['msg_id'] . "' class='btn btn-danger confirm' name='delete'> <i class='fa fa-close'></i> Delete</a>";
                                                 echo "</td>";
                                             
                                             echo "</tr>";
                              }
                                            
                         ?>
                  </table>
              </div>        
           </div>
        </div>
								
																
								<!------------------------ End Tab 6 ----------------------------------------->
                </div>  
    </div>
	</div>   
    
 <?php
   include $tpl .'footer.php';
 }
 
 ?>