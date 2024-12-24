<?php

$noSearch = '';
$pageTitle = 'Search Food';

include 'init.php';

$output = '';
if($_SERVER['REQUEST_METHOD'] =='POST')
{
   // $search = $_POST['search_text'];
    $search = ucfirst(trim($_POST['search_text']));
    
    $min_length = 3;
    if(strlen($search) >= $min_length){
        
        $search = htmlspecialchars($search);
        
        $stmt = $conn->prepare("SELECT * FROM menu WHERE food_name LIKE '%".$search."%'");
        $stmt->execute();
        $row = $stmt->fetch();
        $count = $stmt->rowCount();
        
        if($count > 0)
        {
                
                
                $food_id= $row['food_id'];
                $food_img = $row['food_img'];
                $food_name = $row['food_name'];
                $food_desc = $row['description'];
                $food_price = $row['cost'];
             /*
                $output .= '
                <tr style="width:100%;background:white; border:1px solid black;">
                    <td style="border-bottom:solid 1px black;padding:10px;"><a href="menu.php?do=Search&food_id='.$food_id.'" style="text-decoration:none;font-weight:bold; color:black;padding:100px;">'.$row["food_name"].'</a></td>
                    
                </tr>
            ';
            */
           ?>
              <section class="our-menu" style="padding: 0; height: 100vh;">
                <div class="container food" id="burger">    
                    <div class="row">
                            
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="container">
                                <div class="mix burger scale-img">
                                
                                    <figure>
                                             <img src="images/menu/<?php echo $food_img; ?>" alt="burger1" />
                                    </figure>
                                    <div class="caption" style="padding-bottom: 5px;">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                                
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                                <a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                              
                                            else
                                            { ?>
                                                <a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>                     
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div classs="about-img" style="margin-left: 30%; line-height: 30;">
                                <img class="img-fluid wow slideInRight" data-wow-duration="2s" data-wow-iteration="10" src="images/uber-eats.png" />
                            </div>
                        </div>
                    </div>
                </div>
              </section>       
                
            <?php
           // echo $output;
            
        }
        else
        {
             echo "<div class='container' style='margin:150px auto;'>";
                
                    echo '<div class="alert alert-danger"> This Food Is Not Found </div>';
            
                     header("refresh: 3; url = index.php");
                     exit();
                     
                echo "</div>"; 
          
        }
    }
}



include $tpl .'footer.php';


?>