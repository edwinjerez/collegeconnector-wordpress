<?php
/**
 * @package WordPress
 * @subpackage FSOL
 * @category PHP Functions
 * @author Shane Smith - Faster Solutions
 * @copyright 1997-2012 Faster Solutions
 * Primary FSOL Admin Panel functions
 */



/**************************************************************************************
 * ^FSOL_[admin_css]
 * 
 * fsol_admin_css() function
 * Allows you to include your own admin panel stylesheet.
 *
 **************************************************************************************/
function fsol_admin_css() { // No override allowed, create separate function for children
    $url = get_template_directory_uri();
    $myurl = $url . '/admin/style.css';
    echo '<link rel="stylesheet" type="text/css" href="' . $myurl . '" />';
}
add_action('admin_head', 'fsol_admin_css');

/**************************************************************************************
 * ^FSOL_[admin_colors]
 * 
 * fsol_admin_colors() function
 * Includes the "default" FasterSolutions admin color scheme
 *
 **************************************************************************************/
function fsol_admin_colors() {
	$url = get_template_directory_uri();
	$suffix = is_rtl() ? '-rtl' : '';
	
	wp_admin_css_color(
		'fastersolutions','Faster Solutions',
		$url."/admin/colors/fastersolutions/colors$suffix.css",
		array( '#202020', '#606060', '#77a024', '#96ca2d', )
	);
}
add_action('admin_init', 'fsol_admin_colors');

/**************************************************************************************
 * ^FSOL_[admin_colors]
 * 
 * fsol_admin_colors() function
 * Includes the "default" FasterSolutions admin color scheme
 *
 **************************************************************************************/
function fsol_set_default_admin_color($user_id) {
	$args = array(
		'ID'=>$user_id,
		'admin_color'=>'fastersolutions',
	);
	wp_update_user($args);
}
add_action('user_register','fsol_set_default_admin_color');




 /**************************************************************************************
 * ^FSOL_[hide_welcome]
 * 
 * fsol_customize_meta_boxes() function
 * Allows you to add/remove meta boxes from the 'Post' and 'Page' Wordpress Types 
 * 
 * Remove: http://codex.wordpress.org/Function_Reference/remove_post_type_support
 * Add: http://codex.wordpress.org/Function_Reference/add_post_type_support
 *
 **************************************************************************************/
if(!function_exists('fsol_layout_dashboard')){
    function fsol_hide_welcome() {
        $user_id = get_current_user_id();
        if ( get_user_meta( $user_id, 'show_welcome_panel', true ) == 1 )
            update_user_meta( $user_id, 'show_welcome_panel', 0 );
    }
}
add_action( 'load-index.php', 'fsol_hide_welcome' );




/**************************************************************************************
 * ^FSOL_[client_panel]
 * 
 * fsol_client_panel() function
 * Creates a "Client Setup" page under the "Settings" tab in the admin menu.  This
 * allows for client detail information to be placed in the back-end.  This is
 * generally useful for accessing data on the fly that can be changed.
 *
 * @use: echo get_option('fsol_client_company_name');
 *
 * @options:
 *     fsol_client_company_name     (Company Name)
 *     fsol_client_client_name      (Client Name)
 *     fsol_client_street_address   (Street Address)
 *     fsol_client_street_address_2 (Street Address 2)
 *     fsol_client_po_box           (P.O. Box)
 *     fsol_client_city             (City)
 *     fsol_client_state            (State)
 *     fsol_client_zip              (Zip/Postal Code)
 *     fsol_client_email            (E-Mail)
 *     fsol_client_email_2          (Secondary E-Mail)
 *     fsol_client_facebook         (Facebook Link)
 *     fsol_client_twitter          (Twitter ID)
 *     fsol_client_linkedin         (LinkedIN)
 *     fsol_client_pinterest        (Pinterest)
 *     fsolt_clinet_youtube         (YouTube)
 *     
 **************************************************************************************/
if(!function_exists('fsol_client_panel')){
    function fsol_client_panel(){ 
	if(isset($_POST['Submit'])) {
		if(check_admin_referer('client-update-options')) { // check nonce field
			$n_company_name = $_POST['fsol_client_company_name'];
			update_option('fsol_client_company_name',$n_company_name);
		
			/*
			$n_addresses = count($_POST['fsol_client_client_name']);
		
			$c_names =    $_POST['fsol_client_client_name'];
			$c_saddr =    $_POST['fsol_client_street_address'];
			$c_saddr2 =   $_POST['fsol_client_street_address_2'];
			$c_pobox =    $_POST['fsol_client_po_box'];
			$c_city =     $_POST['fsol_client_city'];
			$c_state =    $_POST['fsol_client_state'];
			$c_zip =      $_POST['fsol_client_zip'];
			$c_phone =    $_POST['fsol_client_phone'];
			$c_tollfree = $_POST['fsol_client_toll_free'];
			$c_fax =      $_POST['fsol_client_fax'];
			$c_email =    $_POST['fsol_client_email'];
			$c_email2 =   $_POST['fsol_client_email_2'];
			
			for($ct=0;$ct<$n_addresses;$ct++) { // store addresses
				if($ct === 0) {
					$ctstr = "";
				} else {
					$ctstr = "__".$ct;
				}
				update_option('fsol_client_client_name'.$ctstr,mysql_real_escape_string($c_names[$ct]));
				update_option('fsol_client_street_address'.$ctstr,mysql_real_escape_string($c_saddr[$ct]));
				update_option('fsol_client_street_address_2'.$ctstr,mysql_real_escape_string($c_saddr2[$ct]));
				update_option('fsol_client_po_box'.$ctstr,mysql_real_escape_string($c_pobox[$ct]));
				update_option('fsol_client_city'.$ctstr,mysql_real_escape_string($c_city[$ct]));
				update_option('fsol_client_state'.$ctstr,mysql_real_escape_string($c_state[$ct]));
				update_option('fsol_client_zip'.$ctstr,mysql_real_escape_string($c_zip[$ct]));
				update_option('fsol_client_phone'.$ctstr,mysql_real_escape_string($c_phone[$ct]));
				update_option('fsol_client_toll_free'.$ctstr,mysql_real_escape_string($c_tollfree[$ct]));
				update_option('fsol_client_fax'.$ctstr,mysql_real_escape_string($c_fax[$ct]));
				update_option('fsol_client_email'.$ctstr,mysql_real_escape_string($c_email[$ct]));
				update_option('fsol_client_email_2'.$ctstr,mysql_real_escape_string($c_email2[$ct]));
			}
			
			update_option('fsol_client_address_count',$n_addresses);
			*/
			
			$c_facebook =   $_POST['fsol_client_facebook']; // mysql_real_escape_string($_POST['fsol_client_facebook']);
			$c_twitter =    $_POST['fsol_client_twitter']; // mysql_real_escape_string($_POST['fsol_client_twitter']);
			$c_linkedin =   $_POST['fsol_client_linkedin']; // mysql_real_escape_string($_POST['fsol_client_linkedin']);
			$c_pinterest =  $_POST['fsol_client_pinterest']; // mysql_real_escape_string($_POST['fsol_client_pinterest']);
			$c_youtube =    $_POST['fsol_client_youtube']; // mysql_real_escape_string($_POST['fsol_client_youtube']);
			$c_googleplus = $_POST['fsol_client_googleplus']; // mysql_real_escape_string($_POST['fsol_client_googleplus']);
			$c_instagram =  $_POST['fsol_client_instagram']; // mysql_real_escape_string($_POST['fsol_client_instagram']);
			$c_ga =         $_POST['fsol_client_googleanalytics']; // mysql_real_escape_string($_POST['fsol_client_googleanalytics']);
			$c_headscript = $_POST['fsol_head_script']; // mysql_real_escape_string($_POST['fsol_head_script']);
			
			// store other data
			update_option('fsol_head_script',$c_headscript);
			update_option('fsol_client_facebook',$c_facebook);
			update_option('fsol_client_twitter',$c_twitter);
			update_option('fsol_client_linkedin',$c_linkedin);
			update_option('fsol_client_pinterest',$c_pinterest);
			update_option('fsol_client_youtube',$c_youtube);
			update_option('fsol_client_googleplus',$c_googleplus);
			update_option('fsol_client_instagram',$c_instagram);
			update_option('fsol_client_googleanalytics',$c_ga);
		}
	}
	
    ?>
        <div class="wrap">
            <h2>Client Setup</h2>
			<div id="blank-address" style="display:none;">
				<table class="client-address">
					<tr>
						<td>
							<p><input type="text" name="fsol_client_client_name[]" size="45" value="" placeholder="Client/Location Name..." /></p>
							<p><input type="text" name="fsol_client_street_address[]" size="45" value="" placeholder="Street Address..." /></p>
							<p><input type="text" name="fsol_client_street_address_2[]" size="45" value="" placeholder="..." /></p>
							<p><input type="text" name="fsol_client_po_box[]" size="45" value="" placeholder="P.O. Box..." /></p>
							<p><input type="text" name="fsol_client_city[]" size="20" value="" placeholder="City..." /><input type="text" name="fsol_client_state[]" size="5" value="" placeholder="State..." /><input type="text" name="fsol_client_zip[]" size="10" value="" placeholder="Postal Code..." /></p>
							<hr>
						</td>
						<td>
							<p><input type="text" name="fsol_client_phone[]" size="45" value="" placeholder="Phone..." /></p>
							<p><input type="text" name="fsol_client_toll_free[]" size="45" value="" placeholder="Toll Free Phone..." /></p>
							<p><input type="text" name="fsol_client_fax[]" size="45" value="" placeholder="Fax..." /></p>
							<p><input type="text" name="fsol_client_email[]" size="45" value="" placeholder="Email..." /></p>
							<p><input type="text" name="fsol_client_email_2[]" size="45" value="" placeholder="Secondary E-Mail..." /></p>
							<hr>
						</td>
						<td>
							<a href="#" class="remove-this-address button">Remove this address...</a><br>
						</td>
					</tr>
				</table>
			</div>
            <form method="post" action="options-general.php?page=client_setup">
                <?php wp_nonce_field('client-update-options') ?>
                <p><strong>Company Name:</strong><br />
                    <input type="text" name="fsol_client_company_name" size="45" value="<?php echo get_option('fsol_client_company_name'); ?>" />
                </p>
				<?/*
				<br>
				<h3>Address</h3>
				*/?>
				<div class="client-address-list">
					<? // display addresses 
						/*
						$n_addresses = get_option('fsol_client_address_count');

						if($n_addresses < 1) {
							$n_addresses = 1;
						}
						
						for($ct=0;$ct<$n_addresses;$ct++) {
							if ($ct===0) {
								$ct_str = "";
							} else {
								$ct_str = "__".$ct;
							} ?>

							<table class="client-address">
								<tr>
									<td>
										<p><input type="text" name="fsol_client_client_name[]" size="45" value="<?php echo get_option('fsol_client_client_name'.$ct_str); ?>" placeholder="Client/Location Name..." /></p>
										<p><input type="text" name="fsol_client_street_address[]" size="45" value="<?php echo get_option('fsol_client_street_address'.$ct_str); ?>" placeholder="Street Address..." /></p>
										<p><input type="text" name="fsol_client_street_address_2[]" size="45" value="<?php echo get_option('fsol_client_street_address_2'.$ct_str); ?>" placeholder="..." /></p>
										<p><input type="text" name="fsol_client_po_box[]" size="45" value="<?php echo get_option('fsol_client_po_box'.$ct_str); ?>" placeholder="P.O. Box..." /></p>
										<p><input type="text" name="fsol_client_city[]" size="20" value="<?php echo get_option('fsol_client_city'.$ct_str); ?>" placeholder="City..." /><input type="text" name="fsol_client_state[]" size="5" value="<?php echo get_option('fsol_client_state'.$ct_str); ?>" placeholder="State..." /><input type="text" name="fsol_client_zip[]" size="10" value="<?php echo get_option('fsol_client_zip'.$ct_str); ?>" placeholder="Postal Code..." /></p>
										<hr>
									</td>
									<td>
										<p><input type="text" name="fsol_client_phone[]" size="45" value="<?php echo get_option('fsol_client_phone'.$ct_str); ?>" placeholder="Phone..." /></p>
										<p><input type="text" name="fsol_client_toll_free[]" size="45" value="<?php echo get_option('fsol_client_toll_free'.$ct_str); ?>" placeholder="Toll Free Phone..." /></p>
										<p><input type="text" name="fsol_client_fax[]" size="45" value="<?php echo get_option('fsol_client_fax'.$ct_str); ?>" placeholder="Fax..." /></p>
										<p><input type="text" name="fsol_client_email[]" size="45" value="<?php echo get_option('fsol_client_email'.$ct_str); ?>" placeholder="Email..." /></p>
										<p><input type="text" name="fsol_client_email_2[]" size="45" value="<?php echo get_option('fsol_client_email_2'.$ct_str); ?>" placeholder="Secondary E-Mail..." /></p>
										<hr>
									</td>
									<td>
										<a href="#" class="remove-this-address button">Remove this address...</a><br>
									</td>
								</tr>
							</table>
							
						<? }
						*/
					?>
				</div>
				<br>
				<?/*
				<a href="#" id="add-another-address" class="button">Add another address...</a>
				<script>
					jQuery(document).ready(function(){
						jQuery("#add-another-address").on("click",function(e){
							e.preventDefault();
							jQuery(".client-address-list").append(jQuery("#blank-address").html());
						});
						jQuery(".client-address-list").on("click",".remove-this-address",function(e){
							e.preventDefault();
							jQuery(this).parent().parent().parent().remove();
						});
					});
				</script>

				<br><br><br>
				*/?>
				
				<h3>Social Media</h3>
                <p><strong>Facebook Link:</strong><br />
                    <input type="text" name="fsol_client_facebook" size="45" value="<?php echo get_option('fsol_client_facebook'); ?>" />
                </p>
                <p><strong>Twitter ID:</strong><br />
                    <input type="text" name="fsol_client_twitter" size="45" value="<?php echo get_option('fsol_client_twitter'); ?>" />
                </p>
                <p><strong>LinkedIN:</strong><br />
                    <input type="text" name="fsol_client_linkedin" size="45" value="<?php echo get_option('fsol_client_linkedin'); ?>" />
                </p>
                <p><strong>Pinterest:</strong><br />
                    <input type="text" name="fsol_client_pinterest" size="45" value="<?php echo get_option('fsol_client_pinterest'); ?>" />
                </p>
                <p><strong>YouTube:</strong><br />
                    <input type="text" name="fsol_client_youtube" size="45" value="<?php echo get_option('fsol_client_youtube'); ?>" />
                </p>                                                        
                <p><strong>Google+:</strong><br />
                    <input type="text" name="fsol_client_googleplus" size="45" value="<?php echo get_option('fsol_client_googleplus'); ?>" />
                </p>                                                        
                <p><strong>Instagram ID:</strong><br />
                    <input type="text" name="fsol_client_instagram" size="45" value="<?php echo get_option('fsol_client_instagram'); ?>" />
                </p>
				<br>
				
				<h3>Tracking</h3>
                <p><strong>Google Analytics:</strong><br />
                    <input type="text" name="fsol_client_googleanalytics" size="45" value="<?php echo get_option('fsol_client_googleanalytics'); ?>" />
                </p>                                                        
				<br>
				
				<h3>Extra Scripts</h3>
				<p><strong>Header:</strong><br />
					<textarea name="fsol_head_script" cols="80" rows="10"><?php echo get_option('fsol_head_script');?></textarea>
				</p>
				<br>
				
                <p><input class="button" type="submit" name="Submit" value="Save" /></p>
            </form>
        </div>
    <?php
    }
}
//Adds client panel to menu.
function fsol_add_client_panel()
{
  add_options_page('Client Setup', 'Client Setup', 'edit_theme_options', 'client_setup','fsol_client_panel');
}
add_action('admin_menu', 'fsol_add_client_panel'); 


/**************************************************************************************
 * ^FSOL_[admin_menu]
 * 
 * fsol_admin_menu() function
 * Sets up the menu bar of the admin panel.  Take sublinks and make them primary.
 *
 *************************************************************************************/
//Creates a custom menu order
function custom_menu_order($menu_ord) {  
    if (!$menu_ord) return true;  
      
    return array(  
        'index.php', //Dashboard
		'edit.php?post_type=page', // Pages
		'nav-menus.php', // Navigation
		'upload.php', // Media 
        'separator1', // First separator  
        'edit.php', // Posts
		'edit-comments.php', // Comments 
        'separator2', // Second separator
		'widgets.php', //Widgets
		'admin.php?page=client_setup', //Client Setup
		'profile.php', //Profile
		'plugins.php', //Plugins
		'users.php', // Users 
		'options-general.php',  //Settings
        'separator-last', // Last separator  
    );  
}  
//if (!current_user_can('add_users')) {
	add_filter('custom_menu_order', 'custom_menu_order');
	add_filter('menu_order', 'custom_menu_order');
//}
function edit_admin_menus() {  
    global $menu;  
    global $submenu;  
	remove_submenu_page('themes.php','theme-editor.php');  // Remove Appearance 
	if (current_user_can('editor')) {
		remove_menu_page('plugins.php'); // Remove the Plugins Menu
		remove_menu_page('options-general.php'); // Remove the Tools Menu
		remove_menu_page('edit.php?post_type=acf'); // Remove the ACF
	}
	//add_menu_page('Client Setup', 'Client Setup', 'edit_theme_options', 'admin.php?page=client_setup');
}
add_action( 'admin_menu', 'edit_admin_menus' );

/**************************************************************************************
 * ^FSOL_[admin_footer]
 * 
 * fsol_admin_footer() function
 * Customize the admin footer text
 **************************************************************************************/
if(!function_exists('fsol_admin_footer')){
    function fsol_admin_footer() {
        echo 'Thank you for choosing <a href="http://fastersolutions.com" target="_blank">Faster Solutions</a>.  For assistance dial <a href="tel:2187333936">(218) 733-3936</a>';
    }
} 
add_filter('admin_footer_text', 'fsol_admin_footer');

/**************************************************************************************
 * ^FSOL_[remove_dashboard_widgets]
 * 
 * fsol_remove_dashboard_widgets() function
 * Allows you to add/remove meta boxes from the 'Post' and 'Page' Wordpress Types 
 * 
 * Remove: http://codex.wordpress.org/Function_Reference/remove_post_type_support
 * Add: http://codex.wordpress.org/Function_Reference/add_post_type_support
 *
**************************************************************************************/
if(!function_exists('fsol_remove_dashboard_widgets')){
    function fsol_remove_dashboard_widgets() {
        global $wp_meta_boxes, $current_user;

        $role = current_user_can('manage_options');

        switch($role){ 
            case true: // Admin user
                unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // Plugins widget
                unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPress Blog widget
                unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // Other WordPress News widget
                //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // Right Now widget
                unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // Quick Press widget
                unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // Incoming Links widget
                unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // Recent Drafts widget
                //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Recent Comments widget
                break;
            case false: // Non-admin user
                unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // Plugins widget
                unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPress Blog widget
                unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // Other WordPress News widget
                //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // Right Now widget
                unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // Quick Press widget
                unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // Incoming Links widget
                unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // Recent Drafts widget
                //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Recent Comments widget   
                break; 
        }    
    }
}
add_action('wp_dashboard_setup', 'fsol_remove_dashboard_widgets'); // Add action to hide dashboard widgets

/**************************************************************************************
 * ^FSOL_[available_dashboard_columns]
 * 
 * fsol_dashboard_columns() function
 * Allows you to specify how many columns a user can choose from in the Dashboard menu
 * 
 **************************************************************************************/
if(!function_exists('fsol_layout_dashboard')){
    function fsol_dashboard_columns( $columns ) {
        $columns['dashboard'] = 3;
        return $columns;
    }
}
add_filter( 'screen_layout_columns', 'fsol_dashboard_columns' );


/**************************************************************************************
 * ^FSOL_[layout_dashboard]
 * 
 * fsol_layout_dashboard() function
 * Allows you to specify the default number of columns that will display on the 
 * Dashboard.
 * 
 **************************************************************************************/
if(!function_exists('fsol_layout_dashboard')){
    function fsol_layout_dashboard() {
        return 3;
    }
}
add_filter( 'get_user_option_screen_layout_dashboard', 'fsol_layout_dashboard' );


/**************************************************************************************
 * ^FSOL_[dashboard_menu_config]
 * 
 * fsol_dashboard_menu_config() function
 * Allows you to customize the dashboard menu based on user type (admin || non-admin).
 * The $menu will list all items from the main menu, $submenu would list there subs.
 * You can utilized the phpconsole utility to view these or echo: phpconsole($menu) 
 * 
 **************************************************************************************/
if(!function_exists('fsol_dashboard_menu_config')) {
    function fsol_dashboard_menu_config() {
        global $menu,$submenu,$current_user;
        get_currentuserinfo();

        $role = current_user_can('manage_options');    
        
        
        switch($role){
            case true: // Admin role
                unset($menu[15]); // Remove Links Menu Items
                //This will produce the same as the line above.  Get page names by inspecting through browser console
                //remove_menu_page('links-manager.php');
                //remove_menu_page('tools.php');
                unset($submenu['themes.php'][11]); // Remove Editor Sub-menu item of Appearance
                break;
            case false: // Non-admin role
                remove_menu_page('tools.php');            
                unset($submenu['themes.php'][11]);
                break;            
        }
    }
}
//add_action('admin_head', 'fsol_dashboard_menu_config'); 


/**************************************************************************************
 * ^FSOL_[remove_admin_bar]
 * 
 * fsol_remove_admin_bar() function
 * Intended to allow you to remove the admin bar completely from the site.  Adjusts CSS
 * as necessary.
 * 
 * ++ ISSUES ++
 * 
 * Currently does not function as intended.  The bar still shows up on the admin
 * panel page for an admin user. 
 **************************************************************************************/
if (!function_exists('fsol_remove_admin_bar')) { // Not functioning
    function fsol_remove_admin_bar(){
  
        remove_action( 'admin_footer', 'wp_admin_bar_render', 1000 ); // for the admin page
        remove_action( 'wp_footer', 'wp_admin_bar_render', 1000 ); // for the front end
        remove_action( 'init', 'wp_admin_bar_init' ); // Remove init
  
        function fsol_remove_admin_bar_style_backend() {  // css override for the admin page
            echo '<style>body.admin-bar #wpcontent, body.admin-bar #adminmenu { padding-top: 0px !important; }</style>';
        }     
        add_filter('admin_head','fsol_remove_admin_bar_style_backend');
    
        function fsol_remove_admin_bar_style_frontend() { // css override for the frontend
            echo 
                '<style type="text/css" media="screen">
                    html { margin-top: 0px !important; }
                    * html body { margin-top: 0px !important; }
                </style>';
        }
        add_filter('wp_head','fsol_remove_admin_bar_style_frontend', 99);
    }
}
add_action('init','fsol_remove_admin_bar');


/**************************************************************************************
 * ^FSOL_[remove_admin_bar_links]
 * 
 * fsol_remove_admin_bar_links() function
 * Allows to remove items from the admin bar 
 * 
 *************************************************************************************/
if(!function_exists('fsol_remove_admin_bar_links')){
    function fsol_remove_admin_bar_links() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('wp-logo');
        //$wp_admin_bar->remove_menu('updates');    
        //$wp_admin_bar->remove_menu('my-account');
        //$wp_admin_bar->remove_menu('site-name');
        //$wp_admin_bar->remove_menu('my-sites');
        //$wp_admin_bar->remove_menu('get-shortlink');
        //$wp_admin_bar->remove_menu('edit');
        //$wp_admin_bar->remove_menu('new-content');
        //$wp_admin_bar->remove_menu('comments');
        //$wp_admin_bar->remove_menu('search');
    }
}
add_action('wp_before_admin_bar_render', 'fsol_remove_admin_bar_links');


/**************************************************************************************
 * ^FSOL_[admin_bar_replace_howdy]
 * 
 * fsol_admin_bar_replace_howdy() function
 * Replace the "Howdy {User}" message that shows up in the admin bar with something
 * a little more professional.
 * 
 *************************************************************************************/
if(!function_exists('fsol_admin_bar_replace_howdy')){
    function fsol_admin_bar_replace_howdy($wp_admin_bar) {
        $account = $wp_admin_bar->get_node('my-account');
        $replace = str_replace('Howdy,', 'Welcome,', $account->title);            
        $wp_admin_bar->add_node(array('id' => 'my-account', 'title' => $replace));
    }
}
add_filter('admin_bar_menu', 'fsol_admin_bar_replace_howdy', 25);


/**************************************************************************************
 * ^FSOL_[wpfilter]
 *
 * fsol_wpfilter() action
 * When the site is in debug mode, prints a full list of hooked functions that can be
 * used when setting up theme functions.
 *
 * @use: enable WP_DEBUG, show the PRE area, and click the filter name to navigate
 **************************************************************************************/
function fsol_wpfilter() {
	global $wp_filter;
	
	if(WP_DEBUG) {
		if(isset($_GET['wpfilter'])) {
			print("<pre>");
			print_r("[".$_GET['wpfilter']."]\n");
			print_r($wp_filter[$_GET['wpfilter']]);
			print("</pre>");
		} else {
			print("<pre style='display:none;'>");
			print("\$wp_filter information (click for details): \n");
			foreach($wp_filter as $fk=>$fv) {
				printf("<a href='?wpfilter=%s'>[%s]</a>\n",$fk,$fk);
			}
			print("</pre>");
		}
	}
}	
add_action('wp_head','fsol_wpfilter');

?>