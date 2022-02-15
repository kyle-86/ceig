<div class="cta-split-blocks">
	<div class="wrap">
		<div class="grid">
			<?php if ( have_rows( 'each_block' ) ) : ?>
			<?php while ( have_rows( 'each_block' ) ) :
				the_row(); ?>

			<div class="grid__item grid__item--half">
				<div class="eachSplitBlock">
					<?php if ( $subtitle = get_sub_field( 'subtitle' ) ) : ?>
						<div class="flexDiv">
							<div class="ctaSubtitle body--small">
								<?php echo esc_html( $subtitle ); ?>
								<?php if ( $subtitle_line_color = get_sub_field( 'subtitle_line_color' ) ) : ?>
									<div class="postSubTitleLine" style="background-color:<?php echo $subtitle_line_color; ?>"> </div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>

						<?php if ( $title = get_sub_field( 'title' ) ) : ?>
						<h2> <?php echo esc_html( $title ); ?> </h2>
						<?php endif; ?>

						<?php if ( $content = get_sub_field( 'content' ) ) : ?>
						<div class="wysiwyg ctaWysiwyg">
							<?php echo $content; ?>
						</div>
					<?php endif; ?>

					<?php
						$link = get_sub_field( 'button' );
						if ( $link ) :
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
						<div class="ctaButton">
							<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>