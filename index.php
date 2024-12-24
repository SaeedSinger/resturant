<?php

//session_start();
//$noNavbar = '';
$pageTitle = 'Resturant';

include 'init.php';


?>


 <!-- Start Carousel -->
        
    <div id="myslide" class="carousel slide" data-interval="3000" data-ride="carousel">
        <ol class="carousel-indicators">
              <li data-target="#myslide" data-slide-to="0" class="active"></li>
              <li data-target="#myslide" data-slide-to="1"></li>
              <li data-target="#myslide" data-slide-to="2"></li>
              
        </ol>
            
        <div class="carousel-inner">
          <div class="bg-overlay"></div>
            <div class="carousel-item active">
                <img src="images/11.jpg" class="d-block w-100 mx-auto d-block" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Enjoy Our Delicious Meal</h3>
                    <p>Delicious Food has received numerous awards including: best lunch from the readers of eye magazine; best food from now magazine's critic's pick; best late night munchies from dineto, and has been recommended in toronto life's restaurant guide for best food.</p>
                    <a href="menu.php" class="button home-btn">Order Online</a>
                </div>
            </div>
              
            <div class="carousel-item">
                <img src="images/22.jpg" class="d-block w-100 mx-auto d-block" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Enjoy Our Delicious Meal</h3>
                    <p>Delicious Food has received numerous awards including: best lunch from the readers of eye magazine; best food from now magazine's critic's pick; best late night munchies from dineto, and has been recommended in toronto life's restaurant guide for best food.</p>
                    <a href="menu.php" class="button home-btn">Order Online</a>
                </div>
            </div>
              
            <div class="carousel-item">
                <img src="images/33.jpg" class="d-block w-100 mx-auto d-block" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Enjoy Our Delicious Meal</h3>
                    <p>Delicious Food has received numerous awards including: best lunch from the readers of eye magazine; best food from now magazine's critic's pick; best late night munchies from dineto, and has been recommended in toronto life's restaurant guide for best food.</p>
                    <a href="menu.php" class="button home-btn">Order Online</a>
                </div>
            </div>
              
           
        </div>
            
        <a class="carousel-control-prev" href="#myslide" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myslide" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- End Carousel -->
    
    <!--Start Section Popular Menu -->
    
    <section class="popular-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title">
                    <span> Tasty & Spicy Food</span>
                    <h2>Popular Menu</h2>    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    
                        <figure class="box single-box">  
                           <a href="menu.php" class="overlay-bg" style="background-image:url('images/2.jpg')"></a>
                           <figcaption>
                            <div class="content-info">
                                <h3 class="title">Pizza</h3>
                                <p>starting from 5$</p>   
                            </div>
                           </figcaption>    
                        </figure>
                    
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6">
                            
                            <figure class="box">  
                                <a href="menu.php" class="overlay-bg" style="background-image:url('images/1.jpg')"></a>
                                <figcaption>
                                 <div class="content-info">
                                     <h3 class="title">Vegan Spaghetti</h3>
                                     <p>starting from 4$</p>   
                                 </div>
                                </figcaption>    
                            </figure>
                            
                        </div>
                        <div class="col-lg-6">
                            
                            <figure class="box">  
                                <a href="menu.php" class="overlay-bg" style="background-image:url('images/4.jpg')"></a>
                                <figcaption>
                                 <div class="content-info">
                                     <h3 class="title">Chicken</h3>
                                     <p>starting from 6$</p>   
                                 </div>
                                </figcaption>    
                            </figure>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <figure class="box">  
                                <a href="menu.php" class="overlay-bg" style="background-image:url('images/3x.jpg')"></a>
                                <figcaption>
                                 <div class="content-info">
                                     <h3 class="title">Donuts</h3>
                                     <p>starting from 3.70$</p>   
                                 </div>
                                </figcaption>    
                            </figure>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!--End Popular Menu -->
    
    <!--Start Section About -->
    
    <section class="about">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div classs="about-img">
                        <img class="img-fluid wow flipInX" data-wow-duration="3s" data-wow-iteration="10" src="images/about-img.png" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="about-content">
                        <span class="wow flipInX" data-wow-duration="3s" data-wow-iteration="10">About Us</span>
                        <h2 class="wow slideInRight" data-wow-duration="2s">Delicious Food</h2>
                        <p class="lead wow bounceInRight" data-wow-duration="2s"> Delicious Food opened its first location in downtown Cairo. Focussed entirely on serving the perfect food, the tiny take-out restaurant located in the city's busy Entertainment District created a sensation in the area winning praise from food critics and numerous people's choice awards. Over the years and then opened a select number of additional Delicious Food restaurants.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--End Section About -->
    
    <!-- Start Testimonials Section -->
        <section class="testimonials text-center">
            <div class="overlay">
                <div class="container wow fadeInUp" data-wow-duration="2s" data-wow-offset="300">
                    <h2> Testimonials</h2>
                    
                    <!-- Start Testimonials Carousel -->
                    <div id="myslide-testimonials" class="carousel slide" data-interval="2000" data-ride="carousel">
                        
                        
                        <div class="carousel-inner">
                            
                          <div class="carousel-item active">
                            <p class="lead">Just a note to let you know how fabulous your chicken was. The Donuts was beautiful...the sugar flowers heavenly, and the food was delicious. Thank you!
                            </p>
                            <span>Selia Clony</span>
                          </div>
                          
                          <div class="carousel-item">
                            <p class="lead">Your team was great to work with, The prices are as good as the menu! Each time I spend less money, than anywhere else and get a fresh, tasty, homemade dinner!
                            </p>
                            <span>Jan Yaman</span>
                          </div>
                          
                          <div class="carousel-item">
                              <p class="lead">Thanks for making the ONLY snack that’s totally pure and tastes great too. Just fell in love with the classic pizza! Can’t wait to try more Awesome Foods!! Thank you!!
                              </p>
                              <span>Dania Cooper</span>
                          </div>
                          
                          <div class="carousel-item">
                              <p class="lead">Thank you for your food. It’s so fresh and delicious and it takes the work and guess-work out of my busy life when it comes to eating. Awesome Foods is AWESOME! You have a customer for life!
                              </p>
                              <span>Joly Wilson</span>
                          </div>
                          
                        </div>
                        
                        <ol class="carousel-indicators wow bounceInDown" data-wow-duration="2s">
                          <li data-target="#myslide-testimonials" data-slide-to="0" class="active"> <img src="images/client1.jpg" alt="client1" /> </li>
                          <li data-target="#myslide-testimonials" data-slide-to="1"> <img src="images/client2.jpg" alt="client2" /> </li>
                          <li data-target="#myslide-testimonials" data-slide-to="2"> <img src="images/client3.jpg" alt="client3" /> </li>
                          <li data-target="#myslide-testimonials" data-slide-to="3"> <img src="images/client4.jpg" alt="client4" /> </li>
                        </ol>
                    </div>
                    <!-- End Testimonials Carousel -->
                </div> 
            </div>
        </section>
        
     <!-- End Testimonials Section -->
     <!-- Start Contact Section -->
       <section class="contact-us text-center">
            
                <div class="container">
                   <div class="wow bounceInDown" data-wow-duration="3s">
                        <i class="fa fa-headphones fa-3x" style="color: #e89e00;"></i>
                        <h2> contact form </h2>
                    </div>      
                         
                    <!-- Start Contact Form -->
                    <form data-form-output="form-output-global" data-form-type="forms" method="POST" action="contact.php" class="rd-mailform">
                        <div class="row">
                                <div class="col-sm-4">
                                   <div class="form-wrap wow bounceInLeft" data-wow-duration="2s"><input id="forms-name" type="text" name="name" placeholder="Your name" data-constraints="@Required" class="form-input form-control-has-validation form-control-last-child"></div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="form-wrap wow bounceInDown" data-wow-duration="2s"><input id="forms-email" type="email" name="email" placeholder="Your E-mail" data-constraints="@Email @Required" class="form-input form-control-has-validation form-control-last-child"></div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="form-wrap wow bounceInRight" data-wow-duration="2s"><textarea id="forms-message" name="message" placeholder="Message" data-constraints="@Required" class="form-input form-control-has-validation form-control-last-child"></textarea></div>
                                </div>
                        </div>
                        <div class="button-wrap">
                          <button class="btn btn-md btn-primary btn-send wow bounceInUp" data-wow-duration="2s">Send</button>
                        </div>
                    </form>
                   <!-- End Contact Form -->
                    
                </div> 
            
        </section>
     <!-- End Contact Section -->
     
     
	<!-- Start Footer -->
		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-8">
						<span class="box">Copyright &copy; 2023 All Right Reserved</span>
						<div class="social-icons">
								<i class="fa fa-facebook fa-lg"></i>
								<i class="fa fa-twitter fa-lg"></i>
								<i class="fa fa-google-plus fa-lg"></i>
						</div>
					</div>
					<div class="col-xs-4">
						<span class="design">Designed By Saeed Singer</span>
					</div>	
				</div>			
			</div>
		</div>
    <!-- End Footer -->


<?php

include $tpl .'footer.php';

?>