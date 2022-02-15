<?php
    $background_colour = get_sub_field( 'background_colour' );
    $background_image = get_sub_field( 'background_image' );
?>

<!-- 
Content Types
-- image
-- text
-- gallery 
-->


<div class="splitContent<?php if ($background_colour == '') { ?> splitContentNoBG <?php } ?>"
    style="background-color:<?php echo $background_colour; ?>;background-image:url(<?php echo esc_url( $background_image['url'] ); ?>)">
    <div class="wrap">
        <div class="grid">
            <div class="grid__item grid__item--half">
                <div class="splitContentContent">

                    <?php if ( get_sub_field( 'left_side_type' ) == 'text' ) { ?>
                    <?php textBlock('left'); ?>
                    <?php } elseif (get_sub_field( 'left_side_type' ) == 'image') { ?>
                    <?php imageBlock('left'); ?>
                    <?php } elseif (get_sub_field( 'left_side_type' ) == 'gallery') { ?>
                    <?php galleryBlock('left'); ?>
                    <?php } elseif (get_sub_field( 'left_side_type' ) == 'video') { ?>
                    <?php videoBlock('left'); ?>
                    <?php } ?>
                    

                </div>
            </div>
            <div class="grid__item grid__item--half">
                <div class="splitContentContent">

                    <?php if ( get_sub_field( 'right_side_type' ) == 'text' ) { ?>
                    <?php textBlock('right'); ?>
                    <?php } elseif (get_sub_field( 'right_side_type' ) == 'image') { ?>
                    <?php imageBlock('right'); ?>
                    <?php } elseif (get_sub_field( 'right_side_type' ) == 'gallery') { ?>
                    <?php galleryBlock('right'); ?>
                    <?php } elseif (get_sub_field( 'right_side_type' ) == 'video') { ?>
                    <?php videoBlock('right'); ?>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>

