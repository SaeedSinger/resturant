<?php

//session_start();
//$noNavbar = '';
extract($_REQUEST);
$pageTitle = 'Update Food';

include 'init.php';

$do = isset($_GET['do']) ? $_GET['do'] : header("location: dashboard.php");

if(!isset($_SESSION['admin']))
{
	header("location:login.php");
	
}
else
{
 
        $foodid = isset($_GET['foodid']) && is_numeric($_GET['foodid']) ? intval($_GET['foodid']) : 0;
         
         // Select All Data Depend On This ID
         $stmt = $conn->prepare("SELECT * FROM menu WHERE food_id = ? LIMIT 1");
         $stmt->execute(array($foodid));
         $row = $stmt->fetch();
         $count = $stmt->rowCount();
         
    if($count > 0)
    {
        
        if(isset($edit))
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
           
             // Update Database With This Info
               
             $stmt = $conn->prepare("UPDATE menu SET food_img=?, food_name=?, description=?, cost=?, cat_id=? WHERE food_id=?");
             $stmt->execute(array($avatarName,$food_name,$food_desc,$food_price,$food_cat,$foodid));
             
                echo "<div class='container' style='margin:150px auto;'>";
                
                    echo '<div class="alert alert-success">'.$food_name. ' => This Food Is Updated </div>';
            
                     header("refresh: 3; url = dashboard.php");
                     exit();
                     
                echo "</div>";    
        }
        else
        {
            
        }
        
    ?>
            
         
    <?php  
    if($do == 'Edit')
    { ?>
        
   
        <h1 class="text-center"> Edit Food </h1>
            <div class="container">
                <form class="form-horizontal addfood" action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="foodid" value="<?php echo $foodid ?>">   
                    <!-- Start Name Field --> 
                        <div class="form-group">
                             <div class="row">
                                <label class="col-sm-2 control-label">Food Name</label>
                                <div class="col-sm-10">
                                  <input type="text" name="food_name" class="form-control" value="<?php echo $row['food_name'];?>" required="required"/>
                                </div>
                             </div>   
                        </div>
                    <!-- End Name Field -->
                             
                    <!-- Start Description Field --> 
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" name="description" class="form-control" value="<?php echo $row['description'];?>" required="required"/>
                                </div>
                            </div>   
                        </div>
                    <!-- End Description Field -->
                             
                    <!-- Start Price Field --> 
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="text" name="price" class="form-control" value="<?php echo $row['cost'];?>" required="required"/>
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
                                      
                                        
                                        <?php
                                             
                                             $stmt2 = $conn->prepare("SELECT * FROM categories");
                                             $stmt2->execute();
                                             $cats = $stmt2->fetchAll();
                                             
                                             foreach($cats as  $cat)
                                             {
                                                echo "<option value='". $cat['Cat_ID'] ."'";
                                                 
                                                                     if($row['cat_id'] == $cat['Cat_ID']) {echo 'selected';}
                                                
                                                echo ">". $cat['Cat_Name'] ."</option>" ;
                                             }
                                        
                                        ?>
                                        
                                    </select>
                                </div>
                            </div>   
                        </div>                              
                    <!-- End Categories Field -->
                             
                    <!-- Start Image Food Field --> 
                        <div class="form-group">
                            <div class="row"> 
                                <label class="col-sm-2 control-label">Food Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="food_img" value="<?php echo "<img src='images/menu/" . $row['food_img'] ."' alt=''/>"; ?>" required="required"/>
                                </div>
                            </div>    
                        </div>
                    <!-- End Image Food Field -->
                                                                             
                    <!-- Start Submit --> 
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-offset-6 col-sm-6">
                                    <input type="submit" name="edit" value="Edit Food" class="btn btn-warning" />
                                </div>
                            </div>   
                        </div>
                    <!-- End Submit -->
                </form>
            </div>
  <?php
    }
    elseif($do == 'Delete')
    { 
          
                // Delete Food
        
            echo '<h1 class="text-center"> Delete Food </h1>';
            echo '<div class="container">';
                
                       $stmt = $conn->prepare("DELETE FROM menu WHERE food_id = :zid");
                       $stmt->bindParam(":zid" , $foodid); // To Related Between Parameter (:zid) With Variable $foodid
                       $stmt->execute();
                       
                        echo "<div class='container' style='margin:150px auto;'>";
                
                            echo '<div class="alert alert-success">'.$stmt->rowCount(). ' Food Is Deleted </div>';
                    
                             header("refresh: 3; url = dashboard.php");
                             exit();
                     
                        echo "</div>"; 
                
            echo '</div>';
    }
    else
    {
        
    }
    ?>
 <?php
    }
    else
    {        
        echo "<div class='container'>";
        
            echo"<div class='alert alert-danger'> There Is No Such ID</div>";

        echo "</div>";
    }
 
}

?>