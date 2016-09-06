<?php
session_start();
include '../model/user.php';
include '../model/processitems.php';
$userid=0;
if(isset($_SESSION['user']))
{
    $userid = $_SESSION['user'];
    $processitems = new Processitems();
    $u = $processitems->getUsername();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">

    <title>JUSTBITE</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
	
    <!-- Custom styles for this template -->
    <link href="../css/carousel.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/iconmoon.css" rel="stylesheet">
	
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="">JUSTBITE</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="productList.php">Products</a></li>
				<?php
					if($userid==0)
					{
						?>
							<li><a href="login.php">Sign Up</a></li>
							<li><a href="login.php">Login</a></li>
						<?php
					}
					else
					{
						?>
							<li><a href="../admin/account.php">Welcome <?=$u->getUsername()?></a></li>
							<li><a href="logout.php">Logout</a></li>
						<?php		
					}
				?>
                
                <li class="dropdown"><a class="btn btn-lg btn-primary" href="../admin/adminlogin.php" role="button">Become a Chef</a></li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
	  
	  <div class="carousel-buttons">
		<div class="col-xs-12 text-center">
			<div class="row">
			  
			  <div class="col-lg-4 col-centered">
				<div class="btn-group btn-group-justified" role="group" aria-label="...">
				    <form action="productList.php" method="get">
					  <div class="btn-group" role="group">
						<input type="text" id="home-input" name="home_search" class="form-control locinput input-rel searchtag-input has-icon" placeholder="City/Zipcode..." value="" autocomplete="off">
					  </div>
					  <!--<div class="btn-group" role="group">
						<input type="text" name="ads" id="home-input" class="form-control has-icon" placeholder="I'm looking for a ..." value="">
					  </div>
					  <div class="btn-group" role="group">
						<button type="button" class="btn btn-default dropdown-toggle" id="home-input" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  Person
						  <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
						  <li><a href="#">1 Person</a></li>
						  <li><a href="#">2 Person</a></li>
						</ul>
					  </div>-->
					  <div class="btn-group" role="group">
						<button type="submit" class="btn btn-default" id="home-search" >Search</button>
					  </div>
					  </form>
				</div>
                  
			  </div><!-- /.col-lg-6 -->			 
			</div><!-- /.row -->
		  
		</div>

		
	  </div>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="../img/005.jpg" alt="First slide">
          
        </div>
        <div class="item">
          <img class="second-slide" src="../img/slideshow_1.jpg" alt="Second slide">
          
        </div>
        
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Why to Choose Us</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <img src="../img/1.jpg" width="200px" style="margin-top:-20px;">
                    </span>
                    <h4 class="service-heading"></h4>
                    <p class="text-muted">You are just click atway from satisfying that hunger.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <img src="../img/2.png">
                    </span>
                    <h4 class="service-heading"></h4>
                    <p class="text-muted">You Save Time and Money and yet get the value for your money.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <img src="../img/3.png">
                    </span>
                    <h4 class="service-heading"></h4>
                    <p class="text-muted" style="margin-top:20px;">We cover your events and ceremonies for best price.</p>
                </div>
            </div>
        </div>
    </section>


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">
 	
		
	<!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
               
              
                <div class="col-sm-3">
                    <div class="team-member">
                        <img src="../images/team4.jpg"  width="300" height="200" class="img-responsive img-circle" alt="">
                        <h4>Harjot Singh</h4>
                        <p class="text-muted"></p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                 <div class="col-sm-3">
                    <div class="team-member">
                        <img src="../images/team1.jpg" width="200" height="173" class="img-responsive img-circle" alt="">
                        <h4>Simranjot Singh</h4>
                        <p class="text-muted"></p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-sm-3">
                    <div class="team-member">
                        <img src="../images/team2.JPG"  width="200" height="200" class="img-responsive img-circle" alt="">
                        <h4>Karanbir Singh</h4>
                        <p class="text-muted"></p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="team-member">
                        <img src="../images/team3.jpg" width="150" height="200" class="img-responsive img-circle" alt="">
                        <h4>Godson Nwakwue</h4>
                        <p class="text-muted"></p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted"></p>
                </div>
            </div>
        </div>
    </section>
		
      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->
	  

    </div><!-- /.container -->

	
	      <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="" action="send_form_email.php" id="contactForm" novalidate method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" name="first_name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" name="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" name="telephone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" name="comments" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
	
	<div id="container">
	<hr class="featurette-divider">
      <!-- FOOTER -->
      <footer style="text-align:center;">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2015 JUSTBITE Company, Inc. &middot; </p>
      </footer>
	 </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    
  </body>
</html>
