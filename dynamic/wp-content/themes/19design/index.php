<?php
/*
Template name: Início
*/
?>
<?php get_header(); ?>

				<div class="slides-list">
<?php 	while ( have_rows('slides') ) : the_row(); ?>
					<div class="slide-item">
						<a href="<?php the_sub_field('link'); ?>" style="background-image: url('<?php
						$image = get_sub_field('imagem');
						echo $image['url'];
						?>'); background-size: <?php
						the_sub_field('estilo')
						?>; -webkit-background-size: <?php
						the_sub_field('estilo')
						?>;"><img src="<?php echo $image['url']; ?>" alt=""></a>
					</div>
<?php 	endwhile; ?>
				</div>

<?php get_footer(); ?>