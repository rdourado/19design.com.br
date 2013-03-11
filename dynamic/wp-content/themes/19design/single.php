<?php get_header(); ?>

<?php 			while( have_posts() ) : the_post(); ?>
				<div class="hentry sidebar cf">
					<h1 class="entry-title hide"><?php the_title(); ?></h1>
					<div class="entry-content">
						<h2>Projeto</h2>
						<p><?php the_field( 'post_content' ); ?></p>
						<h2>Cliente</h2>
						<p><?php 
						$arr = array();
						$terms = get_the_terms( get_the_ID(), 'clientes' ); 
						if ( $terms ) foreach( $terms as $term ) $arr[] = $term->name;
						echo implode( ', ', $arr );
						?></p>
						<p class="tags"><small># <?php the_category( '<br># ' ); ?></small></p>
					</div>
				</div>
				<div class="screenshots cf">
<?php 				$images = get_field( 'gallery' );
					if ( $images ) : ?>
					<ul class="shot-list">
<?php 					foreach( $images as $img ) : ?>
						<li class="shot-item"><?php echo wp_get_attachment_image( $img['id'], 'medium' ); ?></li>
<?php 					endforeach; ?>
					</ul>
<?php 				endif; ?>
				</div>
<?php 			endwhile; ?>

<?php get_footer(); ?>