<?php
/**
 * The template for displaying the footer.
 */
?>
		</div>
		
		<footer class="protocol_money_border_color">
			<div class="container footer-in">
				<div class="col-md-6">
					<div class="widget">
						<h5 class="subtitle">An Equal Housing Lender</h5>

<!-- Start of wp_nav_menu -->
<?php wp_nav_menu( array( 'theme_location' => 'footer-links', 'container_class' => 'menu-footer-menu-container' ) ); ?>
<!-- End of wp_nav_menu -->

					</div>
				</div>
				<div class="col-md-6">
					<div class="widget">
						<h5 class="subtitle">Contact Info</h5>
						<div class="textwidget">
							<div class="contact-inf">
								<span><img src="<?=get_bloginfo('stylesheet_directory')?>/images/icons-footer/location.png" /> <?=theme_address()?></span>
								<span><img src="<?=get_bloginfo('stylesheet_directory')?>/images/icons-footer/mobile.png" /> <?=theme_phone_number()?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end-footer-in -->
			<div class="footbot">
				<div class="container">
					<div class="col-md-12">
						<!-- footer-navigation /end -->
						<div class="footer-navi">
							<span>&copy; <?= date('Y') ?> <?=theme_company_name()?>.</span>
							<span>All Rights Reserved.</span>
						</div>
					</div>
				</div>
			</div>    <!-- end-footbot -->
		</footer>

		<?php wp_footer(); ?>
	</body>
</html>