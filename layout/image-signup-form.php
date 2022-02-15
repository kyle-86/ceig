<?php $otherSide = get_sub_field( 'other_side_content' ); ?>
<?php $imageSide = get_sub_field( 'image_side' ); ?>


<div class="imageSubscribe">
    <div class="wrap">
        <div class="custom-grid <?php if ($imageSide == 'left') { echo 'leftContnet'; } elseif ($imageSide == 'right') { echo 'rightContnet'; } else { echo 'centerContnet'; } ?>">
            <div
                class="<?php if ($imageSide == 'left') { echo 'order-1 grid-5'; } else { echo 'order-2 grid-5'; } ?> order-md-2 <?php if ($imageSide == 'left') { echo ''; } else { echo ''; } ?>  vertCenter">
                <?php
            $image = get_sub_field( 'image' );
            if ( $image ) : ?>
                <div class="subscribeImage">
                    <div class="afterSquare">
                        <div class="spinner"></div>
                        <img class="b-lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/images/placeholder.jpg" data-src="<?php echo esc_url( $image['url'] ); ?>"
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

            <div
                class="order-md-1 <?php if ($imageSide == 'left') { echo 'order-2 grid-6'; } else { echo 'order-1 grid-6'; } ?> <?php if ($imageSide == 'left') { echo ''; } else { echo ''; } ?> vertCenter">

                <?php if ( $otherSide == 'form' ) { ?>

                <div class="text_form">
                    <?php if ( $subtitle = get_sub_field( 'subtitle' ) ) : ?>
                    <div class="flexDiv">
                        <div class="ctaSubtitle body--small">
                            <?php echo esc_html( $subtitle ); ?>
                            <?php if ( $subtitle_line_color = get_sub_field( 'subtitle_line_colour' ) ) : ?>
                            <div class="postSubTitleLine" style="background-color:<?php echo $subtitle_line_color; ?>">
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ( $content = get_sub_field( 'content' ) ) : ?>
                    <blockquote>
                        <?php echo $content; ?>
                    </blockquote>
                    <?php endif; ?>

                    <?php 
                        $form_object = get_sub_field( 'form' );
                        echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="true" ajax="true"]');
                    ?>
                </div>

                <?php } ?>

                <?php if ( $otherSide == 'text' ) { ?>
                <div class="text_form">
                    <?php if ( $title = get_sub_field( 'title' ) ) : ?>
                    <h2 class="h2"><?php echo $title; ?></h2>
                    <?php endif; ?>

                    <?php if ( $content = get_sub_field( 'content' ) ) : ?>
                    <div class="wysiwyg">
                        <?php echo $content; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>