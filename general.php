<?php
/*
* Plugin Name: _DP Ocean by uptimizt
* Description: Display posts for OceanWP
* Author: uptimizt
* Version: 0.2
*/

namespace uptimizt\DPOcean;

/**
 * [General description]
 */
class General {

  public static function init(){
    add_shortcode('dp', [__CLASS__, 'render_shortcode']);

    add_filter( 'display_posts_shortcode_output', [__CLASS__, 'filter_output'], 10, 11 );

  }

  /**
   * Description
   */
  public static function filter_output($output, $original_atts, $image, $title, $date, $excerpt, $inner_wrapper, $content, $class, $author, $category_display_text){
    ob_start();

    $template_filename = $original_atts['tmpl'];
    include(__DIR__ . '/templates/' . $template_filename);
    $output = ob_get_clean();
    return $output;
  }


  /**
   * Description
   */
  public static function render_shortcode($atts_source){
      $args_for_dp = '';
      $shortcode = '[display-posts]';

      $atts_default = [
          'post_type' => 'any',
          'wrapper' =>"div",
          'wrapper_class' => "u7-ocean-layout",
          'html_before' => '',
          'html_after' => '',
          'tmpl' => 'list-post.php',
      ];

      $atts = shortcode_atts( $atts_default, $atts_source );
      $atts = array_merge($atts, $atts_source);

      if(!empty($atts)){
          foreach ($atts as $key => $value) {
              $args_for_dp .= sprintf(' %s="%s"', $key, $value);
          }
          $shortcode = sprintf('[display-posts %s]', $args_for_dp);
      }
      $html = $atts['html_before'] . do_shortcode($shortcode) . $atts['html_after'];
      return $html;
  }



}

General::init();
