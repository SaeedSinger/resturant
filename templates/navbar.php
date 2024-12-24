<?php

session_start();

include("connection.php");
extract($_REQUEST);

if(isset($_SESSION['cust_id']))
{
	 $cust_id=$_SESSION['cust_id'];
	 $cquery=$conn->prepare("select * from customers where id='$cust_id'");
	 $cquery->execute();
	 $cresult=$cquery->fetch();
}
else
{
	$cust_id="";
}

if(isset($logout))
{
	 header('Location: logout.php'); // To Move To dashboard Page
   exit();
}

if(isset($login))
{
	 header('Location: login.php'); // To Move To dashboard Page
   exit();
}

 $stmt =$conn->prepare("SELECT cart.*, menu.food_img, menu.food_name, menu.cost, customers.email 
                        FROM cart
												
                        INNER JOIN menu
												
                        ON
                          menu.food_id = cart.fk_food_id
													
											             INNER JOIN customers
												
											            ON
												             customers.id = cart.fk_customer_id
											          	WHERE
												              cart.fk_customer_id=?");
 $stmt->execute(array($cust_id));
 $rows  = $stmt->fetchAll();
 $count = $stmt->rowCount();
?>





<nav class="navbar navbar-b  navbar-expand-lg fixed-top navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Delicious Food</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ournavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="ournavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
        
      <li class="nav-item">
        <a class="nav-link about-us" href="#">About</a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link" href="menu.php">Menu</a>
      </li>
       
      <li class="nav-item">
        <a class="nav-link con" href="#">Contact</a>
      </li>
      
      
    <li class="nav-item">
        <form method="post">
            <?php
        if(empty($cust_id))
        {
        ?>
        <a href="login.php"><span style="color: #ffc107; font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color: #ffc107; background-color:transparent;" id="cart"  class="badge badge-light">0</span></i></span></a>
        
        &nbsp;&nbsp;&nbsp;
        <button class="btn btn-outline-warning my-2 my-sm-0" name="login" type="submit">Log In</button>&nbsp;&nbsp;&nbsp;
              <?php
        }
        else
        {
        ?>
        <a href="cart.php"><span style=" color:green; font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:green; background-color:transparent;" id="cart"  class="badge badge-light"><?php if(isset($count)) { echo $count; }?></span></i></span></a>
        <button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Log Out</button>&nbsp;&nbsp;&nbsp;
        <?php
        }
        ?>
        </form>
    </li>
    <?php
		if(!isset($noSearch))
		{
			?>
			<li class="nav-item">
				<a href="#" class="nav-link"><form action="search.php" method="Post"><input type="text" name="search_text" id="search_text" placeholder="Search by Food Name " class="form-control " /></form></a>
			</li>
    <?php
		}
		?>
    </ul>
      
   <!--
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  -->
  </div>
</nav>