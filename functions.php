<?php
// Admin Functions
	// Load /functions/ folder
		include('functions/loader.php');
	// Add title tag support
		add_theme_support( 'title-tag' );
	// Add support for custom styles in WordPress editor
		add_editor_style('/css/admin/editor-style.css');
	// Add default content width
		if ( !empty( $content_width ) ) $content_width = 1200;
	// Add support for WordPress custom menus
		add_action( 'init', 'register_my_menu' );
	// Register areas for custom menus
		function register_my_menu() {
			register_nav_menu( 'menu-header', __( 'Header Menu' ) );
			register_nav_menu( 'menu-footer-left', __( 'Footer Menu Left' ) );
			register_nav_menu( 'menu-footer-middle', __( 'Footer Menu Middle' ) );
			register_nav_menu( 'menu-footer-right', __( 'Footer Menu Right' ) );
			register_nav_menu( 'menu-mobile', __( 'Mobile Menu' ) );
		}
	// Enable post thumbnails
		add_theme_support('post-thumbnails');
	// Remove inline gallery styling
		add_filter( 'use_default_gallery_style', '__return_false' );
	// Remove inline caption style
		add_filter( 'img_caption_shortcode_width', '__return_false' );
// Scripts
	// Load custom javascript files
		add_action( 'wp_enqueue_scripts', 'td_load_javascript_files' );
		function td_load_javascript_files() {
			$rand = rand( 1, 9999 );
			wp_register_script( 'theme-vendor', get_template_directory_uri() . '/js/min/vendor.min.js', array('jquery'), $rand, true );
			wp_enqueue_script( 'theme-vendor' );
			wp_register_script( 'theme-functions', get_template_directory_uri() . '/js/min/custom.min.js', array('jquery'), $rand, true );
			wp_enqueue_script( 'theme-functions' );
		}

		add_action( 'admin_enqueue_scripts', 'load_custom_script' );
			function load_custom_script() {
				wp_enqueue_script('custom_js_script', get_template_directory_uri() .'/js/admin_scripts.js', array('jquery'));
			}

// Styles
	// Load Stylesheet
		function td_load_styles () {
			$rand = rand( 1, 9999 );
			wp_enqueue_style( 'td-style', get_stylesheet_uri(), '', $rand );
		}
		add_action( 'wp_enqueue_scripts', 'td_load_styles' );
	// Gutenberg CSS removal
	function wps_deregister_styles() {
		wp_dequeue_style( 'wp-block-library' );
	}
	add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
// Miscellaneous
	// Remove related YouTube videos
		add_filter('oembed_dataparse','td_strip_related_videos', 10, 3);
		function td_strip_related_videos($return, $data, $url) {
			if ($data->provider_name == 'YouTube') {
				$data->html = str_replace('feature=oembed', 'feature=oembed&#038;rel=0&#038;showinfo=0', $data->html);
				return $data->html;
			} else return $return;
		}
		function td_custom_youtube_settings($code){
			if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false){
				$return = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&showinfo=0&rel=0&autohide=1", $code);
				return $return;
			}
			return $code;
		}
		add_filter('embed_handler_html', 'td_custom_youtube_settings');
		add_filter('embed_oembed_html', 'td_custom_youtube_settings');
	// Conditional statement for blog pages
		function is_blog_page(){
			global $wp_query;
			if (is_home() || is_category() || is_tag() || is_singular('post')) return true;
			return false;
		}
	// Custom body class
		add_filter( 'body_class', 'td_body_class' );
		function td_body_class( $classes ) {
			if (is_blog_page())
			$classes[] = 'page--blog';
			if (!is_front_page())
			$classes[] = 'not-home';
			return $classes;
		}
	// Apple Icons
		add_action('wp_head', 'td_favicon_header');
		function td_favicon_header() {
			?>
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/images/favicon/favicon.png" sizes="32x32" type="image/x-icon" />
<link rel="icon" sizes="192x192" href="<?php echo get_stylesheet_directory_uri();?>/images/favicon/icon.png">
<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri();?>/images/favicon/icon.png">
<meta name="msapplication-square310x310logo"
	content="<?php echo get_stylesheet_directory_uri();?>/images/favicon/icon_largetile.png">
<?php
		}
// Add Current Class When On Single
	function td_menu_item_classes( $classes, $item, $args ) {
		$posts_page = get_option('page_for_posts');
		if( ( is_singular( 'post' ) || is_category() || is_tag() ) && $posts_page == $item->object_id )
		    $classes[] = 'current-menu-item';
		return array_unique( $classes );
	}
	add_filter( 'nav_menu_css_class', 'td_menu_item_classes', 10, 3 );
// Display Hamburger
	function td_display_hamburger() {
		echo '
		<div class="hamburger js-nav-toggle">
			<div class="hamburger__line hamburger__line--top"></div>
			<div class="hamburger__line hamburger__line--middle"></div>
			<div class="hamburger__line hamburger__line--bottom"></div>
		</div>';
	}
// Yoast SEO - Use ACF Field to set og:image on post
	// function td_set_og_image_from_field($presentation) {
	//     global $post;
	//     if (isset($post) && is_singular('post')) {
	//         if (get_field('td_post_hero_image', $post->ID)) {
	//             $image = get_field('td_post_hero_image', $post->ID);
	//             $url = $image['url'];
	//         }
	//         $presentation->open_graph_images = [
	//             [
	//                 'url' => $url,
	//                 'width' => 1024,
	//                 'height' => 512
	//             ]
	//         ];
	//     }
	//     return $presentation;
	// }
	// add_filter('wpseo_frontend_presentation', 'td_set_og_image_from_field', 30);
// WooCommerce
	add_theme_support( 'woocommerce' );
// Disable WooCommerce styles
	add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
	//Stop all themes from updating.
	add_filter( 'site_transient_update_themes', 'remove_update_themes' );
	function remove_update_themes( $value ) {
	    return null;
	}
	/* Add TypeKit Fonts */
function add_typekit() {
        
	echo '<script type="text/javascript" src="//use.typekit.net/ycq3gde.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>';
}
add_filter( 'wp_head', 'add_typekit' ); 
?>
<?php
function textBlock($side) { ?>
<?php if ( $subtitle = get_sub_field( $side.'_side_subtitle' ) ) : ?>
<div class="flexDiv">
	<div class="ctaSubtitle body--small">
		<?php echo esc_html( $subtitle ); ?>
		<?php if ( $subtitle_line_color = get_sub_field( $side.'_subtitle_line_color' ) ) : ?>
		<div class="postSubTitleLine" style="background-color:<?php echo $subtitle_line_color; ?>">
		</div>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>
<?php if ( $textBlock_title = get_sub_field( $side.'_title' ) ) : ?>
<?php $titleType = get_sub_field( $side.'_title_type' ); ?>
<<?php echo $titleType; ?>>
	<?php echo $textBlock_title; ?>
</<?php echo $titleType; ?>>
<?php endif; ?>
<?php if ( $textBlock_content = get_sub_field( $side.'_side_content' ) ) : ?>
<div class="wysiwyg">
	<?php echo $textBlock_content; ?>
</div>
<?php endif; ?>
<?php
    $link = get_sub_field( $side.'_side_button_link' );
    if ( $link ) {
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
<div class="textBlockButton textBlockSpacing">
	<a class="button button--green" href="<?php echo esc_url( $link_url ); ?>"
		target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
</div>
<?php } else { ?>
<?php if ( $textBlock_button_text = get_sub_field( $side.'_side_button_text' ) ) : ?>
<div class="textBlockSpacing">
	<h5 style="color:<?php echo $subtitle_line_color; ?>">
		<?php echo esc_html( $textBlock_button_text ); ?>
	</h5>
</div>
<?php endif; ?>
<?php } ?>
<?php } ?>
<?php
function imageBlock($side) { ?>
<div
	class="imageBlock vertLeftCenter <?php if ($side == 'left') { echo 'vertLeftCenter'; } else { echo 'vertRightCenter'; } ?>">
	<?php
    $image = get_sub_field( $side.'_side_image' );
    if ( $image ) : ?>
	<div class="sliderImg">
		<div class="afterSquare">
			<div class="spinner"></div>
			<img class="b-lazy" src="https://place-hold.it/584x390/003333/003333/003333.jpg&text=003333"
				data-src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
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
</div>
<?php } ?>
<?php
function galleryBlock($side) { ?>
<div class="galleryBlock">
	<?php if ( $gallery_title = get_sub_field( $side.'_side_gallery_title' ) ) : ?>
	<h2> <?php echo esc_html( $gallery_title ); ?> </h2>
	<?php endif; ?>
	<?php if ( have_rows( $side.'_side_gallery' ) ) : ?>
	<div class="galleryItems">
		<?php while ( have_rows( $side.'_side_gallery' ) ) :
            the_row(); ?>
		<div class="eachGalleryItem">
			<?php
            $image = get_sub_field( 'image' );
            if ( $image ) : ?>
			<?php
            $link = get_sub_field( 'image_url' );
            if ( $link ) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?> <a class="button" href="<?php echo esc_url( $link_url ); ?>"
				target="<?php echo esc_attr( $link_target ); ?>"><?php endif; ?>
				<?php echo wp_get_attachment_image( $image, 'full'); ?>
				<?php
            $link = get_sub_field( 'image_url' );
            if ( $link ) :?></a><?php endif; ?>
			<?php endif; ?>
		</div>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>
</div>
<?php } ?>
<?php
function videoBlock($side) { ?>
<div class="videoBlock">
	<?php 
	$video_type = get_sub_field( $side.'_side_video_type' );
	if ( $video_type == 'youtube' ) {
		$youtube_id = get_sub_field( $side.'_side_youtube_id' );
	?>
	<div class="<?php echo $gridWidth; ?> eachVideo">
		<div class="sliderImg">
			<div class="afterSquare">
				<div class="embed-container">
					<iframe id="ytplayer" type="text/html" width="640" height="360"
						src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>?autoplay=0&mute=1&controls=0&rel=0"
						frameborder="0"></iframe>
				</div>
			</div>
		</div>
	</div>
	<?php } else { ?>
	<?php $vimeo_id = get_sub_field( $side.'_side_vimeo_id' ); ?>
	<div class="<?php echo $gridWidth; ?> eachVideo">
		<div class="sliderImg">
			<div class="afterSquare">
				<div class="embed-container">
					<iframe src="https://player.vimeo.com/video/<?php echo $vimeo_id; ?>?autoplay=0&loop=1" width="640"
						height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
<?php } ?>
<?php 
function first_sentence($content) {
    $pos = strpos($content, '.');
    return substr($content, 0, $pos+1);  
}
add_filter( 'nav_menu_link_attributes', 'add_data_atts_to_nav', 10, 4 );
    function add_data_atts_to_nav( $atts, $item, $args ) {
		$menuID = get_field('mega_menu_id', $item);
		if ($menuID != '') {
			$atts['data-menuid'] = $menuID;
		}
	return $atts;
}  
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function td_redirect_logged_out_users(){
	$link = get_field( 'logged_out_user_redirect', 'options' );
	wp_redirect($link['url']);
	exit();
 }
 add_action('wp_logout', 'td_redirect_logged_out_users');
 add_action('check_admin_referer', 'logout_without_confirm', 10, 2);
function logout_without_confirm($action, $result)
{
    /**
     * Allow logout without confirmation
     */
    if ($action == "log-out" && !isset($_GET['_wpnonce'])) {
		$link = get_field( 'logged_out_user_redirect', 'options' );
        $location = str_replace('&amp;', '&', wp_logout_url($link));
        header("Location: $location");
        die;
    }
}
?>