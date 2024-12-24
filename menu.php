<?php

extract($_REQUEST);
$pageTitle = 'Menu';

include 'init.php';

$stmt = $conn->prepare("SELECT * FROM menu");
$stmt->execute();
$rows = $stmt->fetchAll();

    foreach($rows as $row)
    {
        $arr[] = $row['food_id'];
        //shuffle($arr);
    }
/* 
 if(isset($addtocart))
 {
    if(isset($_SESSION['cust_id']))
    {
        header("location:cart.php?food_id=$addtocart");
    }
    else
    {
            header("location:login.php");
    }
 }
 */
?>

<!-- Start Section Menu -->

<section class="our-menu">
    <div class="container">
      
        <div class="row">
                <div class="col-md-12 menu-title">
                    <span> Delicious Food</span>
                    <h2>Our Menu</h2>    
                </div>
        </div>
        
        <div class="menu-box">
            <div class="container">
            
               <!--tab heading-->
             <ul class="row nav navbar_inverse" id="myTab" role="tablist">
                     <li class="nav-item col-lg-3 col-sm-3">
                        <a class="nav-link active" id="burger-tab" data-toggle="tab" href="#burger" role="tab" aria-controls="burger" aria-selected="true">Burgers</a>
                     </li>
                     <li class="nav-item col-lg-3 col-sm-3">
                         <a class="nav-link" id="pizza-tab" data-toggle="tab" href="#pizza" role="tab" aria-controls="pizza" aria-selected="false">Pizza</a>
                     </li>
                     <li class="nav-item col-lg-3 col-sm-3">
                         <a class="nav-link" id="chicken-tab" data-toggle="tab" href="#chicken" role="tab" aria-controls="chicken" aria-selected="false">Chicken</a>
                     </li>
                     <li class="nav-item col-lg-3 col-sm-3">
                         <a class="nav-link" id="salad-tab" data-toggle="tab" href="#salad" role="tab" aria-controls="salad" aria-selected="false">Salad</a>
                     </li>
                    <!-- 
                     <li class="nav-item col-lg-2 col-sm-4">
                         <a class="nav-link" id="desserts-tab" data-toggle="tab" href="#desserts" role="tab" aria-controls="desserts" aria-selected="false">Desserts</a>
                     </li>
                    -->
             </ul>
            
            
            
            <div class="gallery tab-content" id="myTabContent">
                
            <!----------------------------------Start Burger ---------------------->
                 
                <div class="food tab-pane fade show active" id="burger" role="tabpanel" aria-labelledby="burger-tab">
                        
                    <div class="row">
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                             <div class="mix burger">
                                
                                <?php
                                    
                                    $food_id = $arr[0];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                
                                        <figure class="figure">
                                                <!--<img src="images/burger/mexican-burger.png" alt="burger1" /> -->
                                                <img src="images/menu/<?php echo $food_img; ?>" alt="burger1" class="figure-img mx-auto"/>
                                            
                                            <div class="caption figure-caption">
                                                <h5><?php echo $food_name; ?></h5>
                                                <p class="text-italic"><?php echo $food_desc; ?></p>
                                                <p class="price">$<?php echo $food_price; ?></p>
                                            </div>
                                        </figure>    
                                        <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        
                                <?php
                                    }
                                ?>    
                               </div>
                            </div> 
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container"> 
                                <div class="mix burger">
                 
                                <?php
                                    
                                    $food_id = $arr[1];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="burger2" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                </figure>
                                <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                </div>
                                    
                                <?php
                                    }
                                ?> 
                               </div>
                            </div>    
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix burger">
                                    
                                <?php
                                    
                                    $food_id = $arr[2];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="burger3" class="figure-img mx-auto d-block" />
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                       
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                    </div>
                    
                    <div class="row" style="margin-top:20px;">
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix burger">
                                    
                                <?php
                                    
                                    $food_id = $arr[3];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                <figure class="figure">  
                                    <img src="images/menu/<?php echo $food_img; ?>" alt="burger4" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                </figure>
                                <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                </div>
                                        
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix burger">
                                <?php
                                    
                                    $food_id = $arr[4];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="burger5" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                        
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix burger">
                                <?php
                                    
                                    $food_id = $arr[5];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="burger6" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                       
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                    </div>
                                    
                        
                </div>
                    
                        <!--------------------------End Burger ---------------------->
                 
                        <!-------------------------Start Pizza ----------------------->
                        
                        
                 <div class="food tab-pane fade" id="pizza" role="tabpanel" aria-labelledby="pizza-tab">
                        
                    <div class="row">
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix pizza">
                                <?php
                                    
                                    $food_id = $arr[6];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="pizza1" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                        
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix pizza">
                                <?php
                                    
                                    $food_id = $arr[7];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="pizza2" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                       
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix pizza">
                                <?php
                                    
                                    $food_id = $arr[8];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="pizza3" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                        
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                    </div>
                    
                    <div class="row" style="margin-top:20px;">
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix pizza">
                                <?php
                                    
                                    $food_id = $arr[9];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="pizza4" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                       
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix pizza">
                                <?php
                                    
                                    $food_id = $arr[10];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="pizza5" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                       
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix pizza">
                                <?php
                                    
                                    $food_id = $arr[11];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="pizza6" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                       
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                    </div>
                                    
                        
                </div>        
                        
                        
             <!---------------------------------- End Pizza --------------------------->
             
             <!----------------------------------Start Chicken ---------------------->
                 
                
                <div class="food tab-pane fade" id="chicken" role="tabpanel" aria-labelledby="chicken-tab">    
                        
                    <div class="row">
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                             <div class="mix chicken">
                                
                                <?php
                                    
                                    $food_id = $arr[12];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">
                                        <!--<img src="images/burger/mexican-burger.png" alt="burger1" /> -->
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="chicken1" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                       
                                <?php
                                    }
                                ?>    
                               </div>
                            </div> 
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container"> 
                                <div class="mix chicken">
                 
                                <?php
                                    
                                    $food_id = $arr[13];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="chicken2" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                    
                                <?php
                                    }
                                ?> 
                               </div>
                            </div>    
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix chicken">
                                    
                                <?php
                                    
                                    $food_id = $arr[14];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="chicken3" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                        
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                    </div>
                    
                    <div class="row" style="margin-top:20px;">
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix chicken">
                                    
                                <?php
                                    
                                    $food_id = $arr[15];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                <figure class="figure">  
                                    <img src="images/menu/<?php echo $food_img; ?>" alt="chicken4" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                </figure>
                                <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                </div>
                                        
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix chicken">
                                <?php
                                    
                                    $food_id = $arr[16];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="chicken5" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                    
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix chicken">
                                <?php
                                    
                                    $food_id = $arr[17];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="chicken6" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                      
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                    </div>
                                    
                        
                </div>
                    
                        <!--------------------------------End Chicken ---------------------------->
                        
                         <!----------------------------------Start Salad ---------------------->
                         
                <div class="food tab-pane fade" id="salad" role="tabpanel" aria-labelledby="salad-tab">    
                        
                    <div class="row">
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                             <div class="mix salad">
                                
                                <?php
                                    
                                    $food_id = $arr[18];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">
                                        <!--<img src="images/burger/mexican-burger.png" alt="burger1" /> -->
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="salad1" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                        
                                <?php
                                    }
                                ?>    
                               </div>
                            </div> 
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container"> 
                                <div class="mix salad">
                 
                                <?php
                                    
                                    $food_id = $arr[19];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="salad2" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                        
                                    
                                <?php
                                    }
                                ?> 
                               </div>
                            </div>    
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix salad">
                                    
                                <?php
                                    
                                    $food_id = $arr[20];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="salad3" class="figure-img mx-auto d-block"/>
                                   
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                        
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                    </div>
                    
                    <div class="row" style="margin-top:20px;">
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix salad">
                                    
                                <?php
                                    
                                    $food_id = $arr[21];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="salad4" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                       
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix salad">
                                <?php
                                    
                                    $food_id = $arr[22];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="salad5" class="figure-img mx-auto d-block"/>
                                    
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                      
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <div class="container">
                                <div class="mix salad">
                                <?php
                                    
                                    $food_id = $arr[23];
                                    $stmt = $conn->prepare("SELECT food_img, food_name, description, cost FROM menu WHERE food_id=$food_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();
                                    //$count = $stmt->rowCount();

                                    foreach($rows as $row)
                                    {
                                        $food_img = $row['food_img'];
                                        $food_name = $row['food_name'];
                                        $food_desc = $row['description'];
                                        $food_price = $row['cost'];
                                    
                                ?>
                                    <figure class="figure">  
                                        <img src="images/menu/<?php echo $food_img; ?>" alt="salad6" class="figure-img mx-auto d-block"/>
                                   
                                        <div class="caption figure-caption">
                                            <h5><?php echo $food_name; ?></h5>
                                            <p class="text-italic"><?php echo $food_desc; ?></p>
                                            <p class="price">$<?php echo $food_price; ?></p>
                                        </div>
                                    </figure>
                                    <div class="text-center">
                                            <?php
                                            if(isset($_SESSION['cust_id']))
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="cart.php?food_id=<?php echo $food_id; ?>" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                          
                                            else
                                            { ?>
                                            <a class="btn btn btn-warning offset-top-15" href="login.php" name="addtocart">Order Online</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                       
                                <?php
                                    }
                                ?>
                                </div>
                            </div>    
                        </div>
                        
                    </div>
                                    
                        
                </div>
                    
                        <!--------------------------End Salad ---------------------->
                   
                 
            </div>
           
            <!---- Start Pagination ---->
        <!--    
            <div class="pagination-wrap">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                    
                      <li class="page-item active"><span class="page-link filter" data-filter=".1">1</span></li>
                      <li class="page-item"><span class="page-link filter" data-filter=".2">2</span></li>
                      <li class="page-item"><span class="page-link filter" data-filter=".3">3</span></li>
                    
                    </ul>
                </nav>
            </div>
                   -->
            <!---- End Pagination ---->
            </div>
        </div>
    </div>
</section>

<!-- End Section Menu -->


<?php

include $tpl .'footer.php';

?>