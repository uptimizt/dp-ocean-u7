<?php
/*
* Plugin Name: DP Ocean by uptimizt
* Description: Display posts for OceanWP by uptimizt [dp]
* Plugin URI: https://github.com/uptimizt/dp-ocean-u7
* Author: uptimizt
* GitHub Plugin URI: uptimizt/dp-ocean-u7
* Version: 0.9
*/

namespace uptimizt\DPOcean;

/**
 * [General description]
 */
class General
{

  public static function init()
  {

    add_action('plugins_loaded', function(){

      require_once __DIR__ . '/src/shortcode-pl-square.php';
    });

    add_shortcode('dp', [__CLASS__, 'render_shortcode']);

    add_filter('display_posts_shortcode_output', [__CLASS__, 'filter_output'], 10, 11);

    add_action('wp_enqueue_scripts', [__CLASS__, 'assets']);
  }

  // add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
  public static function assets()
  {
    wp_enqueue_style(
      'DPOcean',
      plugins_url('docs/base.css', __FILE__),
      [],
      filemtime(plugin_dir_path(__FILE__) . 'docs/base.css')
    );
  }

  /**
   * Description
   */
  public static function filter_output($output, $original_atts, $image, $title, $date, $excerpt, $inner_wrapper, $content, $class, $author, $category_display_text)
  {

    if(empty($original_atts['tmpl'])){
      return $output;
    }

    ob_start();

    $template_filename = $original_atts['tmpl'];
    include(__DIR__ . '/templates/' . $template_filename);
    $output = ob_get_clean();
    return $output;
  }




  /**
   * Description
   */
  public static function render_shortcode($atts)
  {
    if (empty($atts)) {
      $atts_source = [];
    } else {
      $atts_source = $atts;
    }

    $args_for_dp = '';
    $shortcode = '[display-posts]';

    $atts_default = [
      'post_type' => 'any',
      'wrapper' => "div",
      'wrapper_class' => "u7-ocean-layout",
      'html_before' => '',
      'html_after' => '',
      'tmpl' => 'list-post.php',
    ];

    $atts = shortcode_atts($atts_default, $atts);

    $atts = array_merge($atts, $atts_source);

    $atts['wrapper_class'] .= ' ' . $atts['tmpl'];

    if (!empty($atts)) {
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
