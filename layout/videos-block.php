<div class="videosBlock">

    <?php 
        $count = count(get_sub_field('videos'));
        if ($count == 1) {
            $gridWidth = 'grid-10';
        } else {
            $gridWidth = 'grid-6';
        }
    ?>

    <div class="wrap">
        <div class="custom-grid <?php if ($count == 1 ) { echo 'vertCenter'; } ?>">

            <?php if ( have_rows( 'videos' ) ) : ?>

            <?php while ( have_rows( 'videos' ) ) :
            the_row(); ?>

            <?php 
            $video_type = get_sub_field( 'video_type' );

            if ( $video_type == 'youtube' ) {
                $youtube_id = get_sub_field( 'youtube_id' );
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
            <?php $vimeo_id = get_sub_field( 'vimeo_id' ); ?>

            <div class="<?php echo $gridWidth; ?> eachVideo">
                <div class="sliderImg">
                    <div class="afterSquare">
                        <div class="embed-container">
                            <iframe src="https://player.vimeo.com/video/<?php echo $vimeo_id; ?>?autoplay=0&loop=1"
                                width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>

            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</div>