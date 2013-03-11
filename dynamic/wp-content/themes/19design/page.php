<?php get_header(); ?>

				<nav class="sidebar cf">
					<ul class="pages-menu">
						<?php 
						wp_list_pages( array(
							'title_li' => false,
							'child_of' => $post->post_parent ? $post->post_parent : $post->ID,
							'depth' => 1,
						) );
						?>
					</ul>
				</nav>
<?php 			while( have_posts() ) : the_post(); ?>
				<article class="hentry cf">
					<h1 class="entry-title hide"><?php the_title(); ?></h1>
					<div class="entry-content">
						<div class="columnize">
							<?php the_content(); ?>
						</div>
					</div>
				</article>
<?php 			endwhile; ?>

<?php get_footer(); ?>