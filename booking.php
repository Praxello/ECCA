<!DOCTYPE html>
<html>
<?php include 'config.php';?>
<head>

    <title>ECCA - Waterless Car Wash in Pune</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="media/image/titleicon.png">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,700,900&amp;subset=latin,latin-ext">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=PT+Serif:700italic,700,400italic&amp;subset=latin,cyrillic-ext,latin-ext,cyrillic">

    <link rel="stylesheet" type="text/css" href="style/jquery.qtip.css" />
    <link rel="stylesheet" type="text/css" href="style/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="style/superfish.css" />
    <link rel="stylesheet" type="text/css" href="style/flexnav.css" />
    <link rel="stylesheet" type="text/css" href="style/DateTimePicker.min.css" />
    <link rel="stylesheet" type="text/css" href="style/fancybox/jquery.fancybox.css" />
    <link rel="stylesheet" type="text/css" href="style/fancybox/helpers/jquery.fancybox-buttons.css" />
    <link rel="stylesheet" type="text/css" href="style/revolution/layers.css" />
    <link rel="stylesheet" type="text/css" href="style/revolution/settings.css" />
    <link rel="stylesheet" type="text/css" href="style/revolution/navigation.css" />
    <link rel="stylesheet" type="text/css" href="style/base.css" />
    <link rel="stylesheet" type="text/css" href="style/responsive.css" />

	<script type="text/javascript" src="script/jquery.min.js"></script>
	<script>
		window.onload = function() {
				var d = new Date().getTime();
				document.getElementById("tid").value = d;
			};
	</script>
    <style type="text/css">
    @media only screen and (max-device-width: 480px) {
        .template-padding-reset {
            margin-top: -10%
        }
    }

    .template-header-bottom {
        margin-top: 7%;

    }

    .logo {
        margin-top: 14%;
    }

    @media only screen and (max-device-width: 480px) {
        .template-header-bottom {
            margin-top: 33%;
        }

        .feature {
            margin-top: -50%;
        }

        .logo {
            margin-top: 4%;
        }

        .template-component-tab {
            margin-top: -65%;
        }
      .template-component-booking .template-component-booking-summary>li
      {
        width:100%;
      }
    }
    </style>

</head>

<body class="template-page-book-your-wash">

    <!-- Header -->
    <div class="template-header">

        <!-- Top header -->
        <?php include 'header.php'?>

        <div class="template-header-bottom">

        </div>

    </div>

    <!-- Content -->
    <div class="template-content">
    <div id="wait" style="display:none;width:69px;height:89px;border:0px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src="media/image/spinner.gif" width="64" height="64" /><br>Loading..</div>
        <!-- Section -->
        <div class="template-component-booking template-section template-main" id="template-booking">
       
            <!-- Booking form -->
            <form id="formvalidate" role="form">

                <ul>

                    <!-- Vehcile list -->

                    <li>

                        <!-- Step -->
                        <div class="template-component-booking-item-header template-clear-fix">
                            <span>
                                <span>1</span>
                                <span>/</span>
                                <span>3</span>
                            </span>
                            <h3>Package type</h3>
                            <h5>Select package type below:</h5>
                        </div>

                        <!-- Content -->
                        <div class="template-component-booking-item-content">

                            <!-- Vehicle list -->
                            <ul class="template-component-booking-vehicle-list" id="packageList">

                                <!-- Vehicle -->

                                <!-- Vehicle -->



                            </ul>

                        </div>

                    </li>
                    <!-- Package list -->


                    <!-- Service list -->


                    <li>

                        <!-- Step -->
                        <div class="template-component-booking-item-header template-clear-fix">
                            <span>
                                <span>2</span>
                                <span>/</span>
                                <span>3</span>
                            </span>
                            <h3>Services menu</h3>
                            <h5>Following services are provided:</h5>
                        </div>

                        <!-- Content -->
                        <div class="template-component-booking-item-content">

                            <!-- Service list -->
                            <ul class="template-component-booking-service-list" id="serviceList">

                                <!-- Service -->


                            </ul>

                        </div>

                    </li>
                    <!-- Summary -->
                    <li>



                        <!-- Step -->
                        <div class="template-component-booking-item-header template-clear-fix">
                            <span>
                                <span>3</span>
                                <span>/</span>
                                <span>3</span>
                            </span>
                            <h3>Booking summary</h3>
                            <h5>Please provide us with your contact information.</h5>
                        </div>
                        
                        <div id="offersText"></div>
                        <div class="template-component-booking-item-content" id="bikeDiv" style="display:none;">

<ul class="template-component-booking-summary template-clear-fix">

<li class="template-component-booking-summary-duration">
  
 
<div class=""><img src="media/image/bike3.png"></div>
  <h5>
 
  <span class="template-component-booking-summary-price-symbol">INR</span>
  <span id="bikeCost">0.00</span>
  </h5>
  <span>Service Price <span id="servicepriceofbike"></span></span>
</li>
    <li class="template-component-booking-summary-duration">
  
                    
                   
   
                    <h5>
                   
                    <span class="template-component-booking-summary-price-symbol">INR</span>
                    <span id="bikegst">0.00</span>
                    </h5>
                    <span>GST</span>
        </li>

    <!-- Price -->
    <li class="template-component-booking-summary-price ">
        <div class="template-icon-booking-meta-total-price"></div>
        
        <h5>
            <span class="template-component-booking-summary-price-symbol">INR</span>
            <span class="template-component-booking-summary-price-value"
                id="bikeTotal">0.00</span>
        </h5>
        <span>Total Service Price <span id="months"></span></span>
    </li>

</ul>

</div>
                        <!-- Content -->
                        <div class="template-component-booking-item-content">

                            <ul class="template-component-booking-summary template-clear-fix">

                            <li class="template-component-booking-summary-duration">
                              
                             
                            <div class=""><img src="media/image/car.png"></div>
                              <h5>
                             
                              <span class="template-component-booking-summary-price-symbol">INR</span>
                              <span id="packagePrice">0.00</span>
                              </h5>
                              <span>Package Price <span id="packagingprice"></span></span>
                                 </li>
                                <li class="template-component-booking-summary-duration">
                              
                                                
                                               
                               
												<h5>
                                               
												<span class="template-component-booking-summary-price-symbol">INR</span>
												<span id="gstval">0.00</span>
												</h5>
												<span>GST</span>
									</li>

                                <!-- Price -->
                                <li class="template-component-booking-summary-price ">
                                    <div class="template-icon-booking-meta-total-price"></div>
                                    
                                    <h5>
                                        <span class="template-component-booking-summary-price-symbol">INR</span>
                                        <span class="template-component-booking-summary-price-value"
                                            id="price">0.00</span>
                                    </h5>
                                    <span>Total Package Price</span>
                                </li>

                            </ul>

                        </div>
                        <div class="template-component-booking-item-content" >

                            <ul class="template-component-booking-summary template-clear-fix">
                           
                            <li class="template-component-booking-summary-duration" id="offerApplicable" style="display:none;">
                              
                             
                           
                              <h5>
                             
                              <span class="template-component-booking-summary-price-symbol">INR</span>
                              <span id="offerDiscount">0.00</span>
                              </h5>
                              <span>Discount Price<span id="discountPercentage"></span></span>
                                </li>
                                <li class="template-component-booking-summary-duration" id="offerApplicable1" style="display:none;">
                              
                                               
                                               
                               
												<h5>
                                                +
												<span class="template-component-booking-summary-price-symbol">INR</span>
												<span id="addDiscount">0.00</span>
												</h5>
												<span>Additional Discount</span>
									</li>
                                  
                                <!-- Price -->
                                <li class="template-component-booking-summary-price ">
                                    <div class="template-icon-booking-meta-total-price"></div>
                                    
                                    <h5>
                                        <span class="template-component-booking-summary-price-symbol">INR</span>
                                        <span class="template-component-booking-summary-price-value"
                                            id="finalTotal">0.00</span>
                                    </h5>
                                    <span>Order Total</span>
                                </li>

                            </ul>

                        </div>
                        
                        <!-- Content -->
                        <div class="template-component-booking-item-content template-margin-top-reset">

                            <!-- Layout -->
                            <ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix">

                                <!-- First name -->
                                <li class="template-layout-column-left template-margin-bottom-reset">
                                    <div class="template-component-form-field">
                                        <label for="booking-form-first-name">First Name *</label>
                                        <input type="text" name="firstname"
                                            id="booking-form-first-name" />
                                    </div>
                                </li>

                                <!-- Second name -->
                                <li class="template-layout-column-right template-margin-bottom-reset">
                                    <div class="template-component-form-field">
                                        <label for="booking-form-second-name">Last Name *</label>
                                        <input type="text" name="secondname"
                                            id="booking-form-second-name" />
                                    </div>
                                </li>

                            </ul>

                            <!-- Layout -->
                            <ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix">

                                <!-- E-mail address -->
                                <li class="template-layout-column-left template-margin-bottom-reset">
                                    <div class="template-component-form-field">
                                        <label for="booking-form-email">E-mail Address *</label>
                                        <input type="text" name="bookingemail" id="booking-form-email" />
                                    </div>
                                </li>

                                <!-- Phone number -->
                                <li class="template-layout-column-right template-margin-bottom-reset">
                                    <div class="template-component-form-field">
                                        <label for="booking-form-phone">Phone Number *</label>
                                        <input type="text" name="bookingphone" id="booking-form-phone" />
                                    </div>
                                </li>

							</ul>
							<!-- Layout -->
                            <ul class="template-layout-33x33x33 template-layout-margin-reset template-clear-fix">

                                <!-- Vehicle make -->
                                <li class="template-layout-column-left template-margin-bottom-reset">
                                    <div class="template-component-form-field">
                                        <label for="booking-form-vehicle-make">State.*</label>
                                        <input type="text" name="bookingstate"
                                            id="bookingstate" />
                                    </div>
                                </li>

                                <!-- Vehicle model -->
                                <li class="template-layout-column-center template-margin-bottom-reset">
                                    <div class="template-component-form-field">
                                        <label for="booking-form-vehicle-model">City.*</label>
                                        <input type="text" name="bookingCity"
                                            id="bookingCity" />
                                    </div>
                                </li>


                                <!-- Booking date -->
                                <li class="template-layout-column-right template-margin-bottom-reset">
                                    <div class="template-component-form-field">
                                        <label for="booking-form-date">Zipcode.*</label>
                                        <input type="text" name="zipcode" id="zipcode" />
                                    </div>
                                </li>

                            </ul>

                            <!-- Layout -->
                            <ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix">

                                <!-- Vehicle make -->
                                <li class="template-layout-column-left template-margin-bottom-reset">
                                  <div class="template-component-form-field">
                                      <label for="booking-form-message">Address *</label>
                                      <textarea rows="1" cols="1" name="bookingAddress"
                                          id="bookingAddress"></textarea>
                                  </div>
                                </li>




                                <!-- Booking date -->
                                <li class="template-layout-column-right template-margin-bottom-reset">
                                    <div class="template-component-form-field">
                                        <label for="booking-form-date">Vehicle Reg. No.*</label>
                                        <input type="text" name="Vehiclenumber" id="vehicle-number" />
                                    </div>
                                </li>

                            </ul>

                            <!-- Layout -->


                            <!-- Text + submit button -->
                            <div class="template-align-center template-clear-fix template-margin-top-2">
                                <p class="template-padding-reset template-margin-bottom-2">We will confirm your service activation within 3 working days.
                                </p>
                                <a href="#" class="template-component-button" id="book-appointment">Buy Now</a>
                                <input type="hidden" value="" name="booking-form-data" id="booking-form-data" />
                            </div>

                        </div>

                    </li>

                </ul>

			</form>
			<form method="post" name="customerData" action="http://theecca.com/ccavRequestHandler.php" target="_blank">


										<table width="40%" height="100">
											<tr>
												<td><input type="hidden" name="tid" id="tid" readonly/></td>
											</tr>
											<tr>
												<td><input type="hidden" name="merchant_id" value="<?= MERCHANT_ID ?>"/></td>
											</tr>
											<tr>
												<td><input type="hidden" name="order_id" value="<?= substr(hexdec(uniqid()), 6); ?>"/></td>
											</tr>
											<tr>
												<td><input type="hidden" name="amount" id="payment_amount"/></td>
											</tr>
											<tr>
												<td><input type="hidden" name="billing_name" id="billing_name"/></td>
											</tr>
											<tr>
												<td><input type="hidden" name="billing_tel" id="billing_tel"/></td>
											</tr>
											<tr>
												<td><input type="hidden" name="billing_email" id="billing_email"/></td>
											</tr>
											<tr>
												<td><input type="hidden" name="billing_city" id="billing_city"/></td>
											</tr>
											<tr>
												<td><input type="hidden" name="billing_state" id="billing_state"/></td>
											</tr>
											<tr>
												<td><input type="hidden" name="billing_zip" id="billing_zip"/></td>
											</tr>
											<tr>
												<td><input type="hidden" name="billing_address" id="billing_address"/></td>
											</tr>
											<tr>
												<td><input type="hidden" name="currency" value="INR"/></td>
											</tr>
											<tr>
												<td><input type="hidden" name="package_name" id="package_name"/></td>
											</tr>
											<tr>
												<td><input type="hidden" name="package_id" id="package_id" /></td>
											</tr>
											<tr>
												<td><input type="hidden" name="total_months" id="total_months"/></td>
											</tr>
											<tr>
												<td><input type="hidden" name="redirect_url" value="<?= REDIRECT_URL ?>"/></td>
											</tr>
											<tr>
												<td><input type="hidden" name="cancel_url" value="<?= CANCEL_URL ?>"/></td>
											</tr>
											<tr>
												<td><input type="hidden" name="billing_notes"  id="billingNotes"/></td>
											</tr>
                      <tr>
                        <td><input type="hidden" name="billing_country"  id="billing_country" value="India"/></td>
                      </tr>
											<tr>
												<td><!--<input type="submit" value="Buy Now">--></td>
											</tr>
										</table>
									</form>

        </div>

    </div>
    <?php include 'Footer.php';?>
  <script type="text/javascript" src="Book.js"></script>
<script type="text/javascript" src="jquery.validate.js"></script>
    <!-- Footer -->
    
   

    <!-- JS files -->
    <script type="text/javascript" src="script/footer.js"></script>
    <script type="text/javascript" src="script/jquery-ui.min.js"></script>
    <script type="text/javascript" src="script/superfish.min.js"></script>
    <script type="text/javascript" src="script/jquery.easing.js"></script>
    <script type="text/javascript" src="script/jquery.blockUI.js"></script>
    <script type="text/javascript" src="script/jquery.qtip.min.js"></script>
    <script type="text/javascript" src="script/jquery.fancybox.js"></script>
    <script type="text/javascript" src="script/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="script/jquery.actual.min.js"></script>
    <script type="text/javascript" src="script/jquery.flexnav.min.js"></script>
    <script type="text/javascript" src="script/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="script/sticky.min.js"></script>
    <script type="text/javascript" src="script/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="script/jquery.fancybox-media.js"></script>
    <script type="text/javascript" src="script/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="script/jquery.carouFredSel.packed.js"></script>
    <script type="text/javascript" src="script/jquery.responsiveElement.js"></script>
    <script type="text/javascript" src="script/jquery.touchSwipe.min.js"></script>
    <script type="text/javascript" src="script/DateTimePicker.min.js"></script>
    <!-- <script type="text/javascript" src="https://maps.google.com/maps/api/js"></script>   -->

    <!-- Revolution Slider files -->
    <script type="text/javascript" src="script/revolution/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="script/revolution/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="script/revolution/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="script/revolution/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="script/revolution/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="script/revolution/extensions/revolution.extension.layeranimation.min.js">
    </script>
    <script type="text/javascript" src="script/revolution/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="script/revolution/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="script/revolution/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="script/revolution/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="script/revolution/extensions/revolution.extension.video.min.js"></script>

    <!-- Plugins files -->
    <!-- <script type="text/javascript" src="plugin/booking/jquery.booking.js"></script> -->

    <!-- Components files -->
    <script type="text/javascript" src="script/template/jquery.template.tab.js"></script>
    <script type="text/javascript" src="script/template/jquery.template.image.js"></script>
    <script type="text/javascript" src="script/template/jquery.template.helper.js"></script>
    <script type="text/javascript" src="script/template/jquery.template.header.js"></script>
    <script type="text/javascript" src="script/template/jquery.template.counter.js"></script>
    <script type="text/javascript" src="script/template/jquery.template.gallery.js"></script>
    <script type="text/javascript" src="script/template/jquery.template.goToTop.js"></script>
    <script type="text/javascript" src="script/template/jquery.template.fancybox.js"></script>
    <script type="text/javascript" src="script/template/jquery.template.moreLess.js"></script>
    <script type="text/javascript" src="script/template/jquery.template.googleMap.js"></script>
    <script type="text/javascript" src="script/template/jquery.template.accordion.js"></script>
    <script type="text/javascript" src="script/template/jquery.template.searchForm.js"></script>
    <script type="text/javascript" src="script/template/jquery.template.testimonial.js"></script>
    <script type="text/javascript" src="script/public.js"></script>

</body>

</html>
