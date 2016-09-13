<?php
/**
 * Footer
 * 
 * @package WordPress
 * @version 1.0
 */
?>

</main>
<footer id="site-foot">
	<section class="request-info">
		<div class="content-contain">
			<h4>Request information about EB-5 Visas</h4>
			<div class="row">
				<div class="contact-form">
					<!-- <form>
						<div class="input-group full-name">
							<label for="fullName">Full name</label>
							<input type="text" name="fullName">
						</div>
						<div class="input-group">
							<label for="email">Email</label>
							<input type="email">
						</div>
						<div class="input-group">
							<label>Message</label>
							<textarea></textarea>
						</div>
						<a href="#" class="cta-button">Submit</a>
					</form> -->

					<?php echo do_shortcode('[si-contact-form form="2"]'); ?>
				</div>
				<div class="contact-information">
					<h5>ALRC Contact Information</h5>
					<p>Regional Center Management / Investor Relations</p>

					<ul class="contact">
						<li class="address">
							<address>
								<?php if(of_get_option('street_address')): ?>
									<?php echo of_get_option('street_address'); ?>
								<?php endif; ?>
								<?php if(of_get_option('city_state_zip')): ?>
									<?php echo of_get_option('city_state_zip'); ?>
								<?php endif; ?>
							</address>
						</li>
						<li class="number">Tel: <?php echo of_get_option('phone_number'); ?></li>
						<li class="email">e-Mail: info@americanlibertyeb5.com</li>
					</ul>
			

					<div class="social-map">
						<ul class="social-links">
				            <li><a href="<?php echo of_get_option('facebook_link') ?>"><i class="fa fa-facebook fa-2x"></i></a></li>
				            <li><a href="<?php echo of_get_option('twitter_link') ?>"><i class="fa fa-twitter fa-2x"></i></a></li>
				            <li><a href="<?php echo of_get_option('pinterest_link') ?>"><i class="fa fa-pinterest fa-2x"></i></a></li>
				            <li><a href="<?php echo of_get_option('youtube_link') ?>"><i class="fa fa-youtube fa-2x"></i></a></li>                       			
						</ul>
						<div class="map">
							<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:8vw;width:100%;"><div id="gmap_canvas" style="height:8vw;width:100%;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://goertz-gutschein-map.com" id="get-map-data">http://goertz-gutschein-map.com</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(26.647492,-81.867435),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(26.647492, -81.867435)});infowindow = new google.maps.InfoWindow({content:"<b>American Liberty Regional Center</b><br/>2400 First Street<br/>33916 Fort Myers" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="bottom-bar">
		<div class="content-contain">
	        <?php
	          wp_nav_menu( array(
	              'menu'              => 'footer-links',
	              'theme_location'    => 'footer-links',
	              'depth'             => 0,
	              'container'         => 'nav',
	              'container_class'   => 'footer-links',
	              'menu_id'           => '',
	              'menu_class'        => 'links',
	              'fallback_cb'       => 'wp_page_menu',
	              'walker'            => ''
	          ));
	        ?> 


			<ul class="social-links">
	            <li><a href="<?php echo of_get_option('facebook_link') ?>"><i class="fa fa-facebook fa-2x"></i></a></li>
	            <li><a href="<?php echo of_get_option('twitter_link') ?>"><i class="fa fa-twitter fa-2x"></i></a></li>
	            <li><a href="<?php echo of_get_option('pinterest_link') ?>"><i class="fa fa-pinterest fa-2x"></i></a></li>
	            <li><a href="<?php echo of_get_option('youtube_link') ?>"><i class="fa fa-youtube fa-2x"></i></a></li>                       			
			</ul>
		</div>
	</section>
</footer>

<?php wp_footer(); ?>
</body>
</html>
