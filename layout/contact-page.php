<div class="contactForm">
    <div class="wrap">
        <div class="custom-grid">

            <div class="grid-6">
                <?php if ( $sub_title = get_sub_field( 'subtitle' ) ) : ?>
                <?php $subtitle_line_color = get_sub_field( 'subtitle_line_colour'); ?>
                <div class="flexDiv">
                    <div class="ctaSubtitle body--small">
                        <?php echo esc_html( $sub_title ); ?>
                        <div class="postSubTitleLine" style="background-color:<?php echo $subtitle_line_color; ?>">
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( $title = get_sub_field( 'title' ) ) : ?>
                <?php $titleType = get_sub_field( 'title_type' );?>
                <<?php echo $titleType; ?> class='title'> <?php echo $title; ?> </<?php echo $titleType; ?>>
                <?php endif; ?>
                <?php if ( get_sub_field('content') ) : ?>
                <div class="wysiwyg">
                    <?php echo get_sub_field('content'); ?>
                </div>
                <?php endif; ?>

                <div class="contactDetails">
                    <?php $email = get_field('td_email_address','options') ?>

                    <?php if ($email != '') { ?>
                    <div class="emailDets">
                        <h2> Email us </h2>
                        <h5><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></h5>
                    </div>
                    <?php } ?>

                    <?php $media_enquiries = get_field('media_enquiries','options') ?>

                    <?php if ($media_enquiries != '') { ?>
                    <div class="mediaDets">
                        <h2> Media Enquiries </h2>
                        <h5> <?php echo $media_enquiries; ?> </h5>
                    </div>
                    <?php } ?>

                    <?php $address = get_field('td_address','options') ?>

                    <?php if ($address != '') { ?>
                    <div class="addressDets">
                        <h2> Address </h2>
                        <h5><?php echo $address; ?></h5>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="grid-6">

                <div class="text_form">
                    <?php 
                        $form_object = get_sub_field( 'form' );
                        echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="true" ajax="true"]');
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>