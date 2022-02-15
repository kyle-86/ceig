<a id="our-team" class="onPageAnchor"></a>
<div class="news-posts our-board">
	<div class="wrap">
		<h2> Our Team </h2>
		<div class="custom-grid">
			<?php 

			$args = array(  
				'post_type' => 'our_team',
				'post_status' => 'publish',
				'posts_per_page' => -1, 
			);

			$loop = new WP_Query( $args ); 
			
			while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<?php
			$image = get_field( 'image' );
			?>

			<div class="grid-4">
				<div class="eachPost eachPerson js-match-height">
					<div class="imageBound">
						<div class="spinner"></div>
						<div class="postFeaturedImage b-lazy" data-src="<?php echo $image['url']; ?>">
						</div>
					</div>
					<div class="postTitle">
						<h3><?php the_title(); ?> </h3>
					</div>
					<div class="postCat body--small">
						<?php if ( $role = get_field( 'role' ) ) : ?>
						<?php echo esc_html( $role ); ?>
						<?php endif; ?>
					</div>
					<div class="postExcerpt ">
						<?php echo get_the_content(); ?>
					</div>
				</div>
			</div>
			<?php
				endwhile; 
				wp_reset_postdata();
			?>

		</div>
	</div>
</div>