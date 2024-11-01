<?php
/*
Plugin Name: YM Twitter Feed
Description: Add Twitter Feed to your widget bar
Plugin URI: http://www.youngminds.com.np/wordpress/ym-twitter-feed/
Version: 1.0
Author: Young Minds
Author URI: http://www.youngminds.com.np
License: none
*/

class ym_twitter_feed extends WP_Widget{
    function __construct(){
        parent::__construct(false,$name=__('YM Twitter Feed'));
    }
    function form($instance){
        if(isset($instance['ym_tw_user']))
            $ym_tw_user = $instance['ym_tw_user'];
        else
            $ym_tw_user = 'webdesignnepal';
        if(isset($instance['ym_tw_theme']))
            $ym_tw_theme = $instance['ym_tw_theme'];
        else
            $ym_tw_theme = 'dark';
        if(isset($instance['ym_tw_bdr_radius']))
            $ym_tw_bdr_radius = $instance['ym_tw_bdr_radius'];
        else
            $ym_tw_bdr_radius = 'none';
        if(isset($instance['ym_tw_bg']))
            $ym_tw_bg = $instance['ym_tw_bg'];
        else
            $ym_tw_bg = '#333';
        if(isset($instance['ym_tw_dlcolor']))
            $ym_tw_dlcolor = $instance['ym_tw_dlcolor'];
        else
            $ym_tw_dlcolor = '#ccc';
        if(isset($instance['ym_tw_width']))
            $ym_tw_width = $instance['ym_tw_width'];
        else
            $ym_tw_width = '500';
        if(isset($instance['ym_tw_feed']))
            $ym_tw_feed = $instance['ym_tw_feed'];
        else
            $ym_tw_feed = '2';

        ?>

        <table border="0" width="100%" style="padding:10px 0;">
            <tr>
                <td>Twitter User Name</td>
                <td><input id="<?php echo $this->get_field_id( 'ym_tw_user' ); ?>" name="<?php echo $this->get_field_name( 'ym_tw_user' ); ?>" type="text" value="<?php echo esc_attr( $ym_tw_user ); ?>"></td>
            </tr>
            <tr>
                <td>Twitter Theme</td>
                <td><input id="<?php echo $this->get_field_id( 'ym_tw_theme' ); ?>" name="<?php echo $this->get_field_name( 'ym_tw_theme' ); ?>" type="text" value="<?php echo esc_attr( $ym_tw_theme ); ?>"></td>
            </tr>
            <tr>
                <td>Border Radius</td>
                <td><input id="<?php echo $this->get_field_id( 'ym_tw_bdr_radius' ); ?>" name="<?php echo $this->get_field_name( 'ym_tw_bdr_radius' ); ?>" type="text" value="<?php echo esc_attr( $ym_tw_bdr_radius ); ?>"></td>
            </tr>
            <tr>
                <td>BG Color</td>
                <td><input id="<?php echo $this->get_field_id( 'ym_tw_bg' ); ?>" name="<?php echo $this->get_field_name( 'ym_tw_bg' ); ?>" type="text" value="<?php echo esc_attr( $ym_tw_bg ); ?>"></td>
            </tr>
            <tr>
                <td>Data Link Color</td>
                <td><input id="<?php echo $this->get_field_id( 'ym_tw_dlcolor' ); ?>" name="<?php echo $this->get_field_name( 'ym_tw_dlcolor' ); ?>" type="text" value="<?php echo esc_attr( $ym_tw_dlcolor ); ?>"></td>
            </tr>
            <tr>
                <td>Width</td>
                <td><input id="<?php echo $this->get_field_id( 'ym_tw_width' ); ?>" name="<?php echo $this->get_field_name( 'ym_tw_width' ); ?>" type="text" value="<?php echo esc_attr( $ym_tw_width ); ?>"></td>
            </tr>
            <tr>
                <td>No. of Feeds</td>
                <td><input id="<?php echo $this->get_field_id( 'ym_tw_feed' ); ?>" name="<?php echo $this->get_field_name( 'ym_tw_feed' ); ?>" type="text" value="<?php echo esc_attr( $ym_tw_feed ); ?>"></td>
            </tr>

        </table>

        <?php
    }//function form()
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['ym_tw_user'] = ( ! empty( $new_instance['ym_tw_user'] ) ) ? strip_tags( $new_instance['ym_tw_user'] ) : '';
        $instance['ym_tw_theme'] = ( ! empty( $new_instance['ym_tw_theme'] ) ) ? strip_tags( $new_instance['ym_tw_theme'] ) : '';
        $instance['ym_tw_bdr_radius'] = ( ! empty( $new_instance['ym_tw_bdr_radius'] ) ) ? strip_tags( $new_instance['ym_tw_bdr_radius'] ) : '';
        $instance['ym_tw_bg'] = ( ! empty( $new_instance['ym_tw_bg'] ) ) ? strip_tags( $new_instance['ym_tw_bg'] ) : '';
        $instance['ym_tw_dlcolor'] = ( ! empty( $new_instance['ym_tw_dlcolor'] ) ) ? strip_tags( $new_instance['ym_tw_dlcolor'] ) : '';
        $instance['ym_tw_width'] = ( ! empty( $new_instance['ym_tw_width'] ) ) ? strip_tags( $new_instance['ym_tw_width'] ) : '';
        $instance['ym_tw_feed'] = ( ! empty( $new_instance['ym_tw_feed'] ) ) ? strip_tags( $new_instance['ym_tw_feed'] ) : '';

        return $instance;
    }

    function widget($args, $instance){
        ?>

        <script>
            //Twitter
            !function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = p + "://platform.twitter.com/widgets.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, "script", "twitter-wjs");
        </script>

<?php

        extract( $args );
        echo $before_widget;
        $user = $instance['ym_tw_user'];
        $theme = $instance['ym_tw_theme'];
        $bdr_radius = $instance['ym_tw_bdr_radius'];
        $bg = $instance['ym_tw_bg'];
        $dlcolor = $instance['ym_tw_dlcolor'];
        $width = $instance['ym_tw_width'];
        $feed = $instance['ym_tw_feed'];


        $text = '
                <div class="tw-feed">
                    <a class="twitter-timeline" href="http://www.twitter.com/'.$user.'"
                       data-theme="'.$theme.'"
                       data-link-color="'.$dlcolor.'"
                       background="'.$bg.'"
                       border-radius="'.$bdr_radius.'"
                       data-chrome="nofooter noborders"
                       data-widget-id="413723523169787904"
                       data-screen-name="'.$user.'"
                       data-show-replies="false"
                       data-tweet-limit="'.$feed.'"
                       width="'.$width.'"
                           >YM Twitter Feed</a>
                </div>
                ';

        echo $text . $after_widget;


    }
}
//widget hook
add_action('widgets_init',
    create_function('', 'return register_widget("ym_twitter_feed");')
);
?>