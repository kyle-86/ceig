<?php
    $postType = get_post_type();
    if ($postType == 'post') {
        $postTerm = 'News';
        $terms = 'category';
    } elseif ( $postType == 'member_events' ) {
        $postTerm = 'Events';
        $terms = 'event_categories';
    } elseif ( $postType == 'member_resources' ) {
        $postTerm = 'Resources';
        $terms = 'resource_categories';
    }
?>

<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');  ?>
<?php $categories = get_the_terms( $post->ID, $terms );; ?>

<?php 

// post : Post
// pdf : PDF Download
// link : Link to Resource

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
<?php } else /*must be a post*/ { ?>
<?php $post_url = get_permalink(); ?>
<?php } ?>

<div class="grid-3">
    <div class="eachPost">
        <div class="posRel">
            <div class="spinner"></div>
            <div class="postFeaturedImage b-lazy" data-src="<?php echo $featured_img_url; ?>">
                <a href="<?php echo $post_url; ?>" <?php if ($post_type != 'post') { ?> target="_blank" <?php } ?>
                    class="aBlock"> </a>
            </div>
        </div>
        <div class="postCat body--small">
            <div class="catDate">
                <div class="custom-grid no-margin">
                    <div class="grid-7 no-padding">
                        <?php if ( ! empty( $categories ) ) {
                            echo esc_html( $categories[0]->name );
                        } ?>
                    </div>
                    <div class="grid-5 text-right no-padding">
                        <?php echo get_the_date( 'd M Y', $post->ID ) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="postTitle js-match-height">
            <a href="<?php echo $post_url; ?>" <?php if ($post_type != 'post') { ?> target="_blank" <?php } ?>>
                <h5> <?php the_title(); ?> </h5>
            </a>
        </div>
        <div class="postExcerpt">
            <?php $article_data = substr(get_the_content(), 0, 100);
                    echo strip_tags( $article_data ); ?> </div>
    </div>
</div>