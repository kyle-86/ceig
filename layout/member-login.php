<div class="login__block">
    <div class="wrap">
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
        <?php if ( $title = get_sub_field( 'title' ) ) : ?>
        <h1> <?php echo esc_html( $title ); ?> </h1>
        <?php endif; ?>
        <div class="form">
            <?php
        $link = get_sub_field( 'redirect_users_once_logged_in' );
        if ( $link ) :
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <?php endif; ?>
            <?php 
            $args = array(
                'echo' => false,
                'label_log_in'   => __( 'Login' ),
                'label_username' => __( '' ),
                'label_password' => __( '' ),
                'remember'       => false,
                'redirect'       => $link_url,
            );
            
            $form = wp_login_form( $args ); 
            
            //add the placeholders
            $form = str_replace('name="log"', 'name="log" placeholder="Email*"', $form);
            $form = str_replace('name="pwd"', 'name="pwd" placeholder="Password*"', $form);
            $form = str_replace('<p', '<div', $form);
            $form = str_replace('</p', '</div', $form);
            
            echo $form;
            ?>
            <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"
                alt="<?php esc_attr_e( 'Forgot Password', 'textdomain' ); ?>">
                <?php esc_html_e( 'Forgot Password?', 'textdomain' ); ?>
            </a>
        </div>
    </div>
</div>