	</div><!-- END #wrap -->
	<footer class="color-bar">
		<?php include( get_stylesheet_directory() . '/images/svg/uf_circle_monogram.svg' ); ?>
		<div class="row">
			<section id="footer-logo" class="three columns">
				<a href="http://www.ufl.edu/"><?php include( get_stylesheet_directory() . '/images/svg/uf_signature-footer.svg' ); ?></a>
			</section>
			<section class="four columns"></section>
			<section id="footer-search-social" class="five columns">
				<section class="row">
					<section class="nine columns" style="padding: 0;">
						<?php echo do_shortcode( "[ufl_searchbar]" ); ?>
					</section>
					<section class="three columns" style="padding: 0;">
						<?php echo do_shortcode( "[ufl_social facebook='http://www.facebook.com/uflaw' twitter='http://www.twitter.com/uflaw' linkedin='http://www.linkedin.com/groups/University-Florida-Levin-College-Law-136081/about']" ); ?>
					</section>
				</section>
			</section>
		</div>
		<div id="footer-columns" class="row">
			<section class="four columns">
				<h3>Learn More</h3>
				<ul>
					<li><a href="#">About UF Law</a></li>
					<li><a href="#">Admissions Information</a></li>
					<li><a href="#">Alumni Affairs</a></li>
					<li><a href="#">Career Services</a></li>
					<li><a href="#">Student Affairs</a></li>
					<li><a href="#">Legal Information Center (Library)</a></li>
					<li><a href="#">Faculty Directory</a></li>
					<li><a href="#">Communication Department</a></li>
				</ul>
			</section>
			<section class="four columns">
				<h3>Quick Links</h3>
				<ul>
					<li><a href="#">Calendar</a></li>
					<li><a href="#">eLearning Portal</a></li>
					<li><a href="#">TWEN</a></li>
					<li><a href="#">LexisNexis</a></li>
					<li><a href="#">Outlook Web Access</a></li>
					<li><a href="#">Gator Webmail</a></li>
					<li><a href="#">ISIS</a></li>
					<li><a href="#">MyUFL</a></li>
				</ul>
			</section>
			<section class="four columns">
				<h3>Contact &amp; Legal</h3>
				<ul>
					<li><a href="#">Contact Information</a></li>
					<li><a href="#">Campus Maps</a></li>
					<li><a href="#">Disability Services</a></li>
					<li><a href="#">Regulations</a></li>
					<li><a href="#">Disclaimer</a></li>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Contact Webmaster</a></li>
				</ul>
			</section>
		</div><!-- end #footer-columns -->
		<div class="row">
			<section class="nine columns">
				<div class="row">
					<span id="footer-address" class="twelve columns">&copy; 2014 University of Florida Levin College of Law, 309 Village Drive Gainesville, FL 32611</span>
					<span id="footer-google" class="twelve columns">This page uses Google Analytics (Google Privacy Policy) | Site Updated December 12, 2013</span>
				</div>
			</section>
			<section id="make-gift" class="three columns">
				<a href="https://www.uff.ufl.edu/OnlineGiving/Law.asp" class="make-gift"><span>Make a gift</span></a>
			</section>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>