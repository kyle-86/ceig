<div class="footer">
	<div class="wrap">
		<div class="footerArea">
			<div class="grid">
				<div class="grid__item grid__item--seventy">
					<div class="mobileFooterLogo">
						<?php $footer_logo = get_field('footer_logo','options'); ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="View the home page">
							<img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />
						</a>
					</div>
					<div class="footerMenuCols">
						<div class="eachFooterMenu">
							<?php $menu = wp_get_nav_menu_object('3'); ?>
							<?php $args = array(
								'container'      => 'false',
								'menu_class'     => 'nav nav--footer',
								'theme_location' => 'menu-footer-left'
							); ?>
							<?php wp_nav_menu( $args ); ?>
						</div>
						<div class="eachFooterMenu">
							<?php $menu = wp_get_nav_menu_object('4'); ?>
							<?php $args = array(
								'container'      => 'false',
								'menu_class'     => 'nav nav--footer',
								'theme_location' => 'menu-footer-middle'
							); ?>
							<?php wp_nav_menu( $args ); ?>
						</div>
						<div class="eachFooterMenu footerRight">
							<?php $menu = wp_get_nav_menu_object('5'); ?>
							<?php $args = array(
								'container'      => 'false',
								'menu_class'     => 'nav nav--footer',
								'theme_location' => 'menu-footer-right'
							); ?>
							<?php wp_nav_menu( $args ); ?>
						</div>
					</div>
					<div class="footerButton">
						<?php
					$download_button = get_field( 'download_button', 'options' );
					if ( $download_button ) : ?>
						<a class="button" href="<?php echo esc_url( $download_button['url'] ); ?>">

							<?php if ( $download_button_text = get_field( 'download_button_text', 'options' ) ) : ?>
							<?php echo esc_html( $download_button_text ); ?>
							<?php endif; ?>

						</a>
						<?php endif; ?>
					</div>
				</div>
				<div class="grid__item grid__item--thirty">
					<div class="footerLogo">
						<?php $footer_logo = get_field('footer_logo','options'); ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="View the home page">
							<img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />
						</a>
					</div>
					<div class="footerSocials">
						<?php if ( have_rows( 'td_social_media', 'options' ) ) : ?>
						<?php while ( have_rows( 'td_social_media', 'options' ) ) :
										the_row(); ?>
						<?php $icon = get_sub_field('icon'); ?>
						<?php $title = get_sub_field('title'); ?>
						<?php $url = get_sub_field('url'); ?>
						<a href="<?php echo esc_url( $url ); ?>" target="_blank"
							title="<?php echo esc_html( $title ); ?>">
							<i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
						</a>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footerCopy">
		<div class="wrap">
			<div class="footerCredits">
				<div class="custom-grid">
					<div class="grid-8">
						<div class="footer__copyright body--small">
							Copyright &copy; <?php echo date('Y');?>
							<span class="footerspacing"><?php echo (get_field('td_business_name','options')) ? get_field('td_business_name','options') : get_bloginfo('name'); ?>.&nbsp All Rights Reserved.</span> <a href="<?php bloginfo('url') ?>/privacy-policy"> Privacy Policy </a>
						</div>
					</div>
					<div class="grid-4">
						<div class="footer_td body--small">
							<a class="footer__credit" href="https://thirteendigital.com.au/" target="_blank">Website by
								Thirteen Digital</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /wrap -->
</div><!-- /footer -->

<?php get_template_part('inc/offscreen'); ?>

<?php wp_footer(); ?>

</body>

</html>