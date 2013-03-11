<?php 
/*
Template name: Contato
*/
if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
	wpcf7_enqueue_scripts();
	//wpcf7_enqueue_styles();
}
?>
<?php get_header(); ?>

<?php 			while( have_posts() ) : the_post(); ?>
				<article class="hentry cf">
					<h1 class="entry-title hide"><?php the_title(); ?></h1>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
				<address id="hcard" class="vcard cf">
					<strong class="fn org hide">19 Design | Editora</strong>
					<span class="adr">
						<span class="street-address"><?php the_field( 'street-address' ); ?></span><br>
						<?php the_field( 'district' ); ?> &nbsp;CEP&nbsp; <?php the_field( 'cep' ); ?><br>
						<span class="locality"><?php the_field( 'locality' ); ?></span>&nbsp;
						<span class="region"><?php the_field( 'region' ); ?></span>&nbsp;
						<span class="country-name"><?php the_field( 'country-name' ); ?></span>
					</span>
					<br>
					T. <span class="tel"><?php the_field( 'tel' ); ?></span><br>
					T. <span class="tel"><?php the_field( 'tel-2' ); ?></span><br>
					<a href="mailto:<?php admin_email(); ?>" class="email"><?php admin_email(); ?></a>&nbsp;
				</address>
<?php 			endwhile; ?>

<?php get_footer(); ?>