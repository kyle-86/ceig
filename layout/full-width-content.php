<div class="full-width">
	<div class="wrap">
		<div class="custom-grid no-margin">
			<div class="grid-11 no-padding">
		<?php if ( $sub_title = get_sub_field( 'sub_title' ) ) : ?>
			<?php $subtitle_line_color = get_sub_field( 'subtitle_line_color'); ?>
			<div class="flexDiv">
				<div class="ctaSubtitle body--small">
						<?php echo esc_html( $sub_title ); ?>
					<div class="postSubTitleLine" style="background-color:<?php echo $subtitle_line_color; ?>"></div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( $title = get_sub_field( 'title' ) ) : ?>
			<?php $titleType = get_sub_field( 'title_type' );?>
			<<?php echo $titleType; ?> class='title'> <?php echo $title; ?> </<?php echo $titleType; ?>>
		<?php endif; ?>

		<?php if ( get_sub_field('content') ) : ?>
			<div class="wysiwyg">
				<?php echo get_sub_field('content'); ?>
			</div>
		<?php endif; ?>

		<?php
		$link = get_sub_field( 'button' );
		if ( $link ) :
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
			?>
			<div class="buttonFullWidth">
				<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
			</div>
		<?php endif; ?>

		</div>
		</div>
	</div>
</div>