<?php
$background_image = get_field( 'background_image' );
?>



<?php if ( have_rows( 'slider' ) ) : ?>

<div class="hero hero--slider" style="background-image:url(<?php echo $background_image['url']; ?>)">
	<div class="wrap js-slick-single">

		<?php while ( have_rows( 'slider' ) ) :
				the_row(); ?>
		<div class="eachSlide">
			<div class="grid">

				<div class="grid__item grid__item--half order-phone-2">
					<div class="sliderContent">
						<?php if ( $title = get_sub_field( 'title' ) ) : ?>
						<h1><?php echo esc_html( $title ); ?></h1>
						<?php endif; ?>

						<?php if ( $text = get_sub_field( 'text' ) ) : ?>
						<div class="sliderText">
							<h4> <?php echo $text; ?> </h4>
						</div>
						<?php endif; ?>

						<?php
							$link = get_sub_field( 'button' );
							if ( $link ) :
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
						<div class="sliderButton">
							<a class="button" href="<?php echo esc_url( $link_url ); ?>"
								target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="grid__item grid__item--half order-phone-1 vertCenter">

					<?php if ( get_sub_field( 'type_of_slider' ) == 'image' ) { ?>
					<?php
							$image = get_sub_field( 'image' );
							if ( $image ) : ?>
					<div class="sliderImg">
						<div class="afterSquare">
							<img src="<?php echo esc_url( $image['url'] ); ?>"
								alt="<?php echo esc_attr( $image['alt'] ); ?>" />
						</div>

						<?php if ( $image_caption = $image['caption'] ) : ?>
						<div class="imgCaption">
							<div class="sliderImgCaption body--small">
								<?php echo esc_html( $image_caption ); ?>
							</div>
						</div>
						<?php endif; ?>

					</div>
					<?php endif; ?>


					<?php } else { ?>

					<?php 
							$video_type = get_sub_field( 'video_type' );

							if ( $video_type == 'youtube' ) {
								$youtube_id = get_sub_field( 'youtube_id' );
							?>

					<div class="sliderImg">
						<div class="afterSquare">
							<div class="embed-container">
								<iframe id="ytplayer" type="text/html" width="640" height="360"
									src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>?autoplay=0&mute=1&controls=0&rel=0"
									frameborder="0"></iframe>
							</div>
						</div>
					</div>
					<?php } else { ?>
					<?php $vimeo_id = get_sub_field( 'vimeo_id' ); ?>

					<div class="sliderImg">
						<div class="afterSquare">
							<div class="embed-container">
								<iframe src="https://player.vimeo.com/video/<?php echo $vimeo_id; ?>?autoplay=0&loop=1"
									width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
									allowfullscreen></iframe>
							</div>
						</div>
					</div>
					<?php } ?>

					<?php } ?>

				</div>
			</div>
		</div>
		<?php endwhile; ?>


	</div>
</div>
<?php endif; ?>