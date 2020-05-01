<?php

namespace uptimizt\DPOcean;

class ShortcodeSquare
{

    public static function init()
    {
        add_shortcode('lop-square', [__CLASS__, 'render_shortcode']);

        add_filter('display_posts_shortcode_args', [__CLASS__, 'chg_qp_query_args'], 11, 2);

        add_filter('lp_square_meta_text', [__CLASS__, 'add_meta_text'], 11, 2);
    }


    public static function add_meta_text($text, $post)
    {

        if ('post' == $post->post_type) {

            if ($cats = wp_get_object_terms($post->ID, 'category')) {
                $cats = wp_list_pluck($cats, 'name');
                $cats = implode(', ', $cats);
                $text = $cats;
            }
        }

        if ('product' == $post->post_type) {

            if ($cats = wp_get_object_terms($post->ID, 'product_cat')) {
                $cats = wp_list_pluck($cats, 'name');
                $cats = implode(', ', $cats);
                $text = $cats;
            }
        }
        return $text;
    }

    /**
     * filters posts - only with thumbnails 
     *
     * use apply_filters( 'display_posts_shortcode_args', $args, $original_atts )
     */
    public static function chg_qp_query_args($args, $original_atts)
    {
        if ($original_atts['tmpl'] != 'lop-square.php') {
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
            'wrapper_class' => "nicePostList",
            'tmpl' => 'lop-square.php',
        ];

        $atts = shortcode_atts($atts_default, $atts);

        $atts = array_merge($atts, $atts_source);

        $args_for_dp = '';
        foreach ($atts as $key => $value) {
            $args_for_dp .= sprintf(' %s="%s"', $key, $value);
        }
        $shortcode = sprintf('[display-posts %s]', $args_for_dp);


        ob_start();
        // echo '<section class="nicePostList">';

        echo do_shortcode($shortcode);

        // echo '</section>';

        return ob_get_clean();
    }
}

ShortcodeSquare::init();
