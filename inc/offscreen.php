<div class="offscreen">
	<div class="offscreen__body">
		<div class="offscreen__content">
			<?php if ( get_field('td_mobile_logo','options') ) : $image = get_field('td_mobile_logo','options'); ?>
			<div class="offscreen__logo">
				<img src="<?php echo $image['url']; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />
			</div>
			<?php endif; ?>
			<div class="offscreen__nav">
				<?php $args = array(
					'container'      => 'false',
					'menu_class'     => 'nav nav--mobile',
					'theme_location' => 'menu-mobile'
				); ?>
				<?php wp_nav_menu( $args ); ?>
			</div>
			<?php
				$link = get_field( 'mobile_menu_button', 'options' );
				if ( $link ) :
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
			<div class="mobileButton">
				<a class="button button--alt" href="<?php echo esc_url( $link_url ); ?>"
					target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
			</div>
			<?php endif; ?>
			<?php if ( have_rows( 'top_menu', 'options' ) ) : ?>
			<div class="top__nav">
				<?php
						global $current_user; wp_get_current_user();
						$userID = $current_user->ID;
						$user_info = get_userdata($userID);
						$userFirstName = $user_info->first_name
					?>
				<?php while ( have_rows( 'top_menu', 'options' ) ) :
						the_row(); ?>


				<?php
							if ( is_user_logged_in() ) { 
								$link = get_sub_field( 'logged_in_menu_item', 'options' );
							} else {
								$link = get_sub_field( 'menu_item', 'options' );
							}


							if ( $link ) :
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';

								$link_title = str_replace("{name}", $userFirstName, $link_title);
							?>
				<div class="each__link">
					<a class="" href="<?php echo esc_url( $link_url ); ?>"
						target="<?php echo esc_attr( $link_target ); ?>">
						<?php if ( $icon = get_sub_field( 'icon', 'options' ) ) : ?>
						<i class="<?php echo $icon; ?>"></i>
						<?php endif; ?>
						<h5>
							<?php echo esc_html( $link_title ); ?>
						</h5>
					</a>
				</div>
				<?php endif; ?>




				<?php endwhile; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>