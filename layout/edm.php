<div class="full-width edm-block">
	<div class="wrap">
		<div class="custom-grid no-margin">
			<div class="grid-12 no-padding">

				<?php $access_link = get_sub_field( 'access_link' ); ?>

				<?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?> 

				<?php if (strpos($url,$access_link) !== false) { ?>

					<?php if ( get_sub_field('embed_code') ) : ?>
						<div class="wysiwyg">
							<?php echo get_sub_field('embed_code'); ?>
						</div>
					<?php endif; ?>

				<?php } else { ?>

					
					<div class="wysiwyg text--center">
						<h1>Error 404</h1>
						<p>Page not found.</p>
					</div>

				<?php } ?>

			</div>
		</div>
	</div>
</div>