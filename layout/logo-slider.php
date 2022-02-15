<div class="logoSlider">
    <div class="wrap">
    <?php if ( $title = get_sub_field( 'title' ) ) : ?>
        <h2><?php echo esc_html( $title ); ?></h2>
    <?php endif; ?>
        <div class="sliderLogos">
            <?php
        $logos = get_sub_field( 'logos' );
        if ( $logos ) { ?>
            <?php foreach( $logos as $image ) { ?>
                <div class="eachLogo">
                    <img src="<?php echo esc_url( $image['sizes']['large'] ); ?>"
                        alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                </div>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>