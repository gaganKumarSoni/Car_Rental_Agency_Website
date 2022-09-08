<?php 
    include 'load_css.php';
    include 'header.php';
    echo '<div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
          <!-- Item -->
          <div class="item item-1">
            <div class="img-fill">
                <div class="text-content">
                  <h6>Re-inventing car renting</h6>
                  <h4>Your Desire, Our Solution make it possible</h4>
                  <p>Welcome to car rental service, your dream journey is few clicks away.</p>
                  <a href="cars_on_rent.php" class="filled-button">Cars on Rent</a>
                </div>
            </div>
          </div>

          <!-- Item -->
          <div class="item item-2">
            <div class="img-fill">
                <div class="text-content">
                  <h6>New User want to register</h6>
                  <h4>Please click on below button to register</h4>
                  <p>Lower rental prices you have seen ever.</p>
                  <a href="customer_registration.php" class="filled-button">Register</a>
                </div>
            </div>
          </div>

          <!-- Item -->
          <div class="item item-3">
            <div class="img-fill">
                <div class="text-content">
                  <h6>Business/Agency owner want to collaborate</h6>
                  <h4>Your Business our reponsibility to increase Revenue <br> Lets Collaborate!</h4>
                  <p>Register your agency by clicking link below</p>
                  <a href="agency_registration.php" class="filled-button">Register</a>
                </div>
            </div>
          </div>

        </div>
    </div>

    <!-- Banner Ends Here -->
    <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our <em>Offers</em></h2>
              <span>Current Trending offers <br> Low cost car hire has arrived.</span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item">
              <img src="assets/images/offer-1-720x480.jpg" alt="">
              <div class="down-content">
                <h4>Toyota</h4>
                <div style="margin-bottom:10px;">
                  <span>from Rs.120 per weekend</span>
                </div>
                <!--p>Best five seater car with minimal rent is available. Please hurry up, Limited time Offer.</p-->
                <a href="cars_on_rent.php" class="filled-button">Book Now</a>
              </div>
            </div>
            
            <br>
          </div>
          <div class="col-md-4">
            <div class="service-item">
              <img src="assets/images/offer-2-720x480.jpg" alt="">
              <div class="down-content">
                <h4>Fiat Rav4 Prime</h4>
                <div style="margin-bottom:10px;">
                  <span>from Rs.120 per weekend</span>
                </div>
                <p></p>
                <a href="cars_on_rent.php" class="filled-button">Book Now</a>
              </div>
            </div>

            <br>
          </div>
          <div class="col-md-4">
            <div class="service-item">
              <img src="assets/images/offer-3-720x480.jpg" alt="">
              <div class="down-content">
                <h4>Hyundai i10</h4>
                <div style="margin-bottom:10px;">
                  <span>from Rs.120 per weekend</span>
                </div>
                <p></p>
                <a href="cars_on_rent.php" class="filled-button">Book Now</a>
              </div>
            </div>

            <br>
          </div>
        </div>
      </div>
    </div>

    <div class="fun-facts">
      <div class="container">
        <div class="more-info-content">
          <div class="row">
            <div class="col-md-6">
              <div class="left-image">
                <img src="assets/images/about-1-570x350.jpg" class="img-fluid" alt="">
              </div>
            </div>
            <div class="col-md-6 align-self-center">
              <div class="right-content">
                <span>Who we are</span>
                <h2>Get to know about <em>our company</em></h2>
                <p>Our mission is to fill the gap between the customers and their requirements. Our revolutionaised idea helps bussineses to increase their revenue.</p>
                <a href="#review" class="filled-button">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--User reviews-->
    <div class="testimonials" id="review">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>What our Customer say <em>about us</em></h2>
              <span>Some of our user reviews are</span>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-testimonials owl-carousel">
              
              <div class="testimonial-item">
                <div class="inner-content">
                <img src="assets/images/team-image-1-646x680.jpg"/>
                  <h4>George Walker</h4>
                  <span>Business Man</span>
                  <p>I am using Car rental website now from past 5 years and the class of service they are providing its beyond my expectation.</p>
                </div>
              </div>
              
              <div class="testimonial-item">
                <div class="inner-content">
                  <img src="assets/images/team-image-3-646x680.jpg"/>
                  <h4>John Smith</h4>
                  <span>Market Specialist</span>
                  <p>Its wonderful and beyond my imagination. The services are good and customer issues are solves qyuickly.</p>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!--Request callback-->';
    include 'request_callback.php';
    include 'footer.php';
    include 'load_js.php';
?>