<?php get_header(); ?>

				<ul class="jobs-list">
<?php 				query_posts( "{$query_string}&posts_per_page=-1" );
					while( have_posts() ) : the_post(); 
					if ( has_post_thumbnail() ) : ?>
					<li class="job-item">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'job-image' ) ); ?>
	
							<h2 class="job-name"><?php the_title(); ?></h2>
							<ul class="job-terms">
								<li class="job-term"><?php 
								$arr = array();
								$terms = get_the_terms( get_the_ID(), 'category' ); 
								foreach( $terms as $term ) $arr[] = $term->name;
								echo implode( "</li>\n\t\t\t\t\t\t\t<li class=\"job-term\">", $arr ) . "\n";
								?></li>
							</ul>
						</a>
					</li>
<?php 				endif;
					endwhile; ?>
				</ul>

<?php get_footer(); ?>