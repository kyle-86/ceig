<?php get_header(); ?>

<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>

<?php 

$post_type = get_field( 'td_post_type' );

	if ( $post_type == 'link' )  { ?>
		<?php
		$link = get_field( 'link' );
		$link_url = $link['url'];
		$link_title = $link['title'];
		$link_target = $link['target'] ? $link['target'] : '_self';
		?>
    <?php $post_url = $link_url; ?>
 		<?php } elseif ($post_type == 'pdf') { ?>
		<?php
			$pdf = get_field( 'pdf' );
			$post_url = $pdf['url'];
		?>
	<?php } ?>
	<?php if ($post_type != 'post') { ?>
		<?php
			header("Location:".$post_url);
			exit();
		?>
	<?php } ?>

<div class="article">
	<div class="wrap">
		<div class="custom-grid">
			<div class="grid-11">
				<?php
				$category = get_the_category(); 
				$categoryName = $category[0]->cat_name;
				?>
				<?php if ( $categoryName ) : ?>
				<div class="flexDiv">
					<div class="ctaSubtitle body--small">
						<?php echo esc_html( $categoryName ); ?>
						<div class="postSubTitleLine">
						</div>
					</div>
				</div>
				<?php endif; ?>
				<div class="article__header">
					<h1 class="article__heading"><?php the_title(); ?></h1>
				</div>
				<div class="article__media">
					<?php if ( get_field('td_post_image') ) : $image = get_field('td_post_image'); ?>
					<div class="article__image has-spinner">
						<div class="spinner"></div>
						<img class="b-lazy" data-src="<?php echo $image['url']; ?>"
							alt="<?php echo $image['alt']; ?>" />
					</div>
					<?php endif; ?>
				</div>
				<div class="article__main">
					<?php if ( get_field('td_page_post') && !post_password_required() ) : ?>
					<?php echo get_field('td_post_content'); ?>
					<?php else: ?>
					<div class="wysiwyg">
						<?php the_content(); ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="article__footer">
					<?php
							$posts_page = get_option('page_for_posts');
						?>
				</div>
			</div>
		</div>
	</div>
	<?php $author_block = get_field( 'show_author_block' ); ?>
	<?php if ( $author_block[0] == 'yes' ) : ?>
	<div class="postDetails">
		<div class="wrap">
			<div class="custom-grid centerContnet">
				<div class="grid-5 order-md-2 flexColumn vertCenter">
					<div class="titleBlock">
						<?php if ( $title = get_field( 'title' ) ) : ?>
						<h2> <?php echo $title; ?> </h2>
						<?php endif; ?>
						<?php if ( $content = get_field( 'content' ) ) : ?>
						<div class="wysiwyg">
							<?php echo $content; ?>
						</div>
						<?php endif; ?>
					</div>
					<div class="authorBlock">
						<?php if ( $author_title = get_field( 'author_title' ) ) : ?>
						<div class="authorTitle">
							<strong> <?php echo esc_html( $author_title ); ?> </strong>
						</div>
						<?php endif; ?>
						<div class="authorNameRole">
							<?php if ( $author_name = get_field( 'author_name' ) ) : ?>
							<?php echo esc_html( $author_name ); ?>
							<?php if ( $author_role = get_field( 'author_role' ) ) : ?>
							| <?php echo esc_html( $author_role ); ?>
							<?php endif; ?>
						</div>

						<?php if ( $author_email = get_field( 'author_email' ) ) : ?>
						<div class="authorEmail">
							<?php echo esc_html( $author_email ); ?>
						</div>
						<?php endif; ?>
						<?php if ( $author_phone = get_field( 'author_phone' ) ) : ?>
						<div class="authorPhone">
							<?php echo esc_html( $author_phone ); ?>
						</div>
						<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="grid-5 order-md-1">
					<?php
            $image = get_field( 'image' );
            if ( $image ) : ?>
					<div class="subscribeImage">
						<div class="afterSquare">
							<img src="<?php echo esc_url( $image['url'] ); ?>"
								alt="<?php echo esc_attr( $image['alt'] ); ?>" />
							<?php if ( $image_caption = $image['caption'] ) : ?>
							<div class="sliderImgCaption body--small">
								<?php echo esc_html( $image_caption ); ?>
							</div>
							<?php endif; ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>