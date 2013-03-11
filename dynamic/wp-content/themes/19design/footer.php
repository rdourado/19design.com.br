			</div>
		</section>
		<hr>
		<footer id="foot">
			<address id="hcard-19-design" class="vcard">
				<strong class="fn org">19 Design | Editora</strong> &nbsp;
<?php 			$pageID = get_page_by_path( 'contato' )->ID; ?>
				<span class="adr">
					<span class="street-address"><?php the_field( 'street-address', $pageID ); ?>&nbsp;&nbsp;<?php 
					the_field( 'district', $pageID ); ?></span>&nbsp;
					<span class="locality"><?php the_field( 'locality', $pageID ); ?></span>&nbsp;
					<span class="region"><?php the_field( 'region', $pageID ); ?></span>&nbsp;
					<span class="country-name"><?php the_field( 'country-name', $pageID ); ?></span>&nbsp;
				</span>
				T. <span class="tel"><?php the_field( 'tel', $pageID ); ?></span>&nbsp;
				<a href="mailto:<?php admin_email(); ?>" class="email"><?php admin_email(); ?></a>&nbsp;
			</address>
			<a href="<?php echo get_permalink( $pageID ); ?>" id="menu-item-contact">Contato</a>
		</footer>
	</div>
	<div id="preloader"></div>
	<!-- WP/ --><?php wp_footer(); ?><!-- /WP -->
</body>
</html>