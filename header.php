<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
	<?php if ( get_field('td_theme_colour','options') ) : ?>
	<meta name="theme-color" content="<?php echo get_field('td_theme_colour','options'); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php td_display_hamburger(); ?>
	<div class="header">
		<div class="wrap">

		<?php if ( $td_svg_logo = get_field( 'td_svg_logo', 'options' ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php echo $td_svg_logo; ?>
			</a>
		<?php endif; ?>

			<?php if ( $td_svg_logo == '' && get_field('td_logo','options') ) : $image = get_field('td_logo','options'); ?>
			<div class="header__logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="link--cover"
					aria-label="View the home page"></a>
				<img src="<?php echo $image['url']; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />
			</div>
			<?php endif; ?>

			<div class="header__nav">
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
				<?php $args = array(
				'container'      => 'false',
				'menu_class'     => 'nav nav--primary',
				'theme_location' => 'menu-header'
			); ?>
				<?php wp_nav_menu( $args ); ?>
			</div>
		</div>
	</div>

	<?php 

	$args = array(  
		'post_type' => 'mega_menu',
		'post_status' => 'publish',
		'posts_per_page' => -1, 
	);

	$loop = new WP_Query( $args ); 
	
	while ( $loop->have_posts() ) : $loop->the_post(); ?>

	<?php
		$background_image = get_field( 'background_image' );
		$background_colour = get_field( 'background_colour' );
		$menu_id = get_field( 'menu_id' )
	?>

	<div class="megaMenuContent" data-menu="<?php echo $menu_id; ?>"
		style="background: linear-gradient(270deg,  rgba(255,255,255,1) 60%, <?php echo $background_colour; ?> 60%);">
		<div class="megaBgImg" style="background-image:url(<?php echo $background_image['url']; ?>)"></div>
		<div class="crossMenu"><i class="fal fa-times"></i></div>
		<div class="wrap">
			<div class="custom-grid">
				<div class="grid-4 menuTextSide">
					<?php if ( $title = get_field( 'title' ) ) : ?>
					<h2> <?php echo $title; ?> </h2>
					<?php endif; ?>
					<?php if ( $content = get_field( 'content' ) ) : ?>
					<div class="menuContent">
						<?php echo $content; ?>
					</div>
					<?php endif; ?>
					<?php
					$link = get_field( 'button' );
					if ( $link ) :
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
					<div class="menuBtn">
						<a class="button button--green" href="<?php echo esc_url( $link_url ); ?>"
							target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					</div>
					<?php endif; ?>
				</div>
				<div class="grid-8">
					<div class="menuMenuImageSide">
						<div class="selectedMenus">
							<div class="menu1">
								<?php $menuCode1 = get_field( 'menu_1' ); ?>
								<?php $menu = wp_get_nav_menu_object($menuCode1); ?>
								<h3><span><a href="<?php bloginfo('url');?>/about-ceig">About CEIG</a></span></h3>
								<?php $args = array(
									'container'      => 'false',
									'menu_class'     => 'nav childMenu nav--menu1',
									'menu' => $menuCode1
								); ?>
								<?php wp_nav_menu( $args ); ?>
							</div>
							<div class="menu2">
								<?php $menuCode2 = get_field( 'menu_2' ); ?>
								<?php $menu = wp_get_nav_menu_object($menuCode2); ?>
								<h3><span><a href="<?php bloginfo('url');?>/our-people">Our People</a></span></h3>
								<?php $args = array(
									'container'      => 'false',
									'menu_class'     => 'nav childMenu nav--menu2',
									'menu' => $menuCode2
								); ?>
								<?php wp_nav_menu( $args ); ?>
							</div>
						</div>
						<div class="menuImage">
							<?php
							$image = get_field( 'image' );
							if ( $image ) : ?>
							<div class="subscribeImage">
								<div class="afterSquare">
									<img class="b-lazy" data-src="<?php echo esc_url( $image['url'] ); ?>"
										alt="<?php echo esc_attr( $image['alt'] ); ?>" />
									<?php if ( $image_caption = $image['caption'] ) : ?>
									<div class="imgCaption">
										<div class="sliderImgCaption body--small">
											<?php echo esc_html( $image_caption ); ?>
										</div>
									</div>
									<?php endif; ?>
								</div>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
		endwhile; 
		wp_reset_postdata();
	?>
	<?php get_template_part('inc/hero'); ?>
	<a id='facet-top'></a>