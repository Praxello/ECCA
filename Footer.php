<!-- Footer -->
<div class="py-3">	
					<center>
					<a href="#" class="template-component-google-map-button">
					<div id='showmap'>
								<span class="template-icon-meta-marker"></span><br>
								<span class="template-component-google-map-button-label-show" >Show Map</span><br>
					</div>
					<div id='hidemap' style="display:none;">
								<span class="template-icon-meta-marker"></span><br>
								<span class="template-component-google-map-button-label-hide"  >Hide Map</span>
								</div>
								<div id="mapShow" style="display:none;">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.450961768211!2d73.9474833509725!3d18.553696972939694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c3c4ecef620d%3A0x2bcf427dd5b58b7b!2sGlobal%20Business%20Hub!5e0!3m2!1sen!2sin!4v1569668566833!5m2!1sen!2sin" width="100%" height="400px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
								</div>
							
					</a>
					</center>
					</div>
				<div class="template-footer">
					
					
						
						<!-- Footer bottom -->
						<div class="template-footer-bottom">
							
							<!-- Social icon list -->
							<center><a href="#">Privacy Policy</a> | <a href="#">Disclaimer Policy</a></center>
							<!-- Copyright -->
							<div class="template-footer-bottom-copyright">
								Developed By <a href="https://praxello.com" target="_blank">Praxello Solutions Pvt. Ltd.</a> &copy; 2019 <a href="index.html" target="_blank">ECCA</a>
							</div>
							
						</div>
						
					</div>

				
				
				<!-- Go to top button -->
				<a href="#go-to-top" class="template-component-go-to-top template-icon-meta-arrow-large-tb"></a>
				
				<!-- Wrapper for date picker -->
             
              
                    <script type="text/javascript">


jQuery(document).ready(function()
{
	
	$('#showmap').on('click',function(e){
		e.preventDefault();
		$('#mapShow').show();
		$('#showmap').hide();
		$('#hidemap').show();
	});
	$('#hidemap').on('click',function(e){
		e.preventDefault();
		$('#hidemap').hide();
		$('#mapShow').hide();
		$('#showmap').show();
	});
	
});


                
	$(function(){
     var path = window.location.pathname.split("/").pop();
  if ( path == '' ) {
    path = 'index.php';
  } 
  var target = $('.sf-menu li a[href="'+path+'"]');
  $('.sf-menu li a').removeClass('template-state-selected');
  target.addClass('template-state-selected');
});
                </script>