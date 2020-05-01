<?php

namespace uptimizt\DPOcean;

class ShortcodeSquare
{


    public static function init()
    {
        add_shortcode('pl-square', [__CLASS__, 'render_shortcode']);

        add_filter('display_posts_shortcode_args', [__CLASS__, 'chg_qp_query_args'], 11, 2);
    }


    //apply_filters( 'display_posts_shortcode_args', $args, $original_atts )
    public static function chg_qp_query_args($args, $original_atts)
    {

        if ($original_atts['tmpl'] != 'lp-square.php') {
            return $args;
        }

        $args['meta_query'][] = [
            'key' => '_thumbnail_id'
        ];

        return $args;
    }




    /**
     * render [pl-square]
     */
    public static function render_shortcode($atts)
    {
        if (empty($atts)) {
            $atts_source = [];
        } else {
            $atts_source = $atts;
        }


        $atts_default = [
            'post_type' => 'post',
            'wrapper' => "div",
            'wrapper_class' => "u7-ocean-layout",
            'tmpl' => 'lp-square.php',
        ];

        $atts = shortcode_atts($atts_default, $atts);

        $atts = array_merge($atts, $atts_source);

        $args_for_dp = '';
        foreach ($atts as $key => $value) {
            $args_for_dp .= sprintf(' %s="%s"', $key, $value);
        }
        $shortcode = sprintf('[display-posts %s]', $args_for_dp);


        ob_start();
        echo '<section class="nicePostList">';

        echo do_shortcode($shortcode);

        echo '</section>';

        return ob_get_clean();
    }
}

ShortcodeSquare::init();
