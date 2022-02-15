<?php $imageSide = get_sub_field( 'image_side' ); ?>

<div class="image_text_block">
    <div class="wrap">
        <div class="custom-grid no-margin">


            <div
                class="grid-5 <?php if ($imageSide == 'left') { echo 'order-1 imageLeftBlock'; } else { echo 'order-2 imageRightBlock'; } ?> order-md-2 <?php if ($imageSide == 'left') { echo 'no-padding-left'; } else { echo ''; } ?>  vertCenter">
                <?php
            $image = get_sub_field( 'image' );
            if ( $image ) : ?>
                <div class="subscribeImage">
                    <div class="afterSquare">
                        <div class="spinner"></div>
                        <img class="b-lazy" data-src="<?php echo esc_url( $image['url'] ); ?>"
                        src="<?php echo get_stylesheet_directory_uri() ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
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
                class="grid-6 order-md-1 <?php if ($imageSide == 'left') { echo 'order-2 rightSideText'; } else { echo 'order-1 leftSideText'; } ?> <?php if ($imageSide == 'left') { echo 'no-padding-right'; } else { echo ''; } ?> vertCenter">

                <div class="text_form textSide">
                    <?php if ( $title = get_sub_field( 'title' ) ) : ?>
                    <h2 class="h2"><?php echo $title; ?></h2>
                    <?php endif; ?>

                    <?php if ( $content = get_sub_field( 'content' ) ) : ?>
                    <div class="wysiwyg">
                        <?php echo $content; ?>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>