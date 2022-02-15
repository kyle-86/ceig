<?php 
	$postType = get_sub_field( 'post_type' );
	$post_per_line = ( $postType == 'member_events' ? 6 : 8 );
?>

<div class="news-posts <?php echo $postType; ?>-post-view">
	<div class="wrap">

		<div class="radio_cats show-md">
			<?php echo do_shortcode( '[facetwp facet='.$postType.']' ); ?>
		</div>

		<div class="dropdown_cats hidden-md">
			<?php echo do_shortcode( '[facetwp facet="'.$postType.'_dropdown"]' ); ?>		
		</div>

		<div class="postsArea">

			<?php 
			$projects = new WP_Query([
				'post_type' => $postType,
				'posts_per_page' => $post_per_line,
				'order_by' => 'date',
				'order' => 'desc',
				'post_status' => 'publish',
				'facetwp' => true,
			]);
			?>

			<?php if($projects->have_posts()) { ?>
			<div class="custom-grid project-tiles <?php echo $postType.'-grid'; ?>">
				<?php
					while($projects->have_posts()) : $projects->the_post();
						if ($postType == 'member_events') {
							get_template_part('layout/post', 'layout3by3');
						} else {
							get_template_part('layout/post', 'layout');
						}
					endwhile;
				?>
			</div>

			<?php wp_reset_postdata(); ?>
			<?php } ?>

			<?php echo do_shortcode( '[facetwp facet="pager_"]' ); ?>

		</div>

	</div>
</div>