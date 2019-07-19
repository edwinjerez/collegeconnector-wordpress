<?php 

// widgets
// blog feed widget
class Blog_Feed_Widget extends WP_Widget {
	// init
	function __construct() {
		$options = array(
			'classname'=>'blogfeed_widget',
			'description'=>'A feed of blog posts',
		);
		parent::__construct('blogfeed_widget','FasterSolutions Blog Feed Widget',$options);
	}
	
	function widget($args,$inst) { 
		$wtitle = !empty($inst['title'])?$inst['title']:'Blog';
		$wposts = !empty($inst['posts'])?$inst['posts']:3;
		$page_url = !empty($inst['page_url'])?$inst['page_url']:'/blog/'; ?>

		<div class="widget feedWidget">
			<?php // fetch articles 
			global $post;
			$feed_args = array('post_type'=>'post','post_status'=>'publish','posts_per_page'=>$wposts);
			$feed_result = new WP_Query($feed_args);
			if ($feed_result->have_posts()) { ?>
				<h4 class="widgetTitle"><a href="<?=esc_attr($page_url);?>"><?=esc_attr($wtitle);?> <span><i class="fa fa-newspaper-o"></i></span></a></h4>
				<?php while ($feed_result->have_posts()) {
					$feed_result->the_post(); ?>
					<article>
						<h3 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
						<div class="date"><?=get_the_date();?></div>
						<div class="feedContent">
							<?php // trim feed for excerpt
							$feed_excerpt = $post->post_content;
							if (strlen($feed_excerpt) > 60) {
								$feed_excerpt = substr($feed_excerpt,0,60);
								$feed_lastspace = strrpos($feed_excerpt," ");
								$feed_excerpt = substr($feed_excerpt,0,$feed_lastspace);
								$feed_excerpt .= "...";
							} ?>
							<?=$feed_excerpt;?>
						</div>
					</article>
					
				<?php }
			} ?>
		</div>
		<?php wp_reset_postdata();
	}
	
	function form($inst) {
		$wtitle = !empty($inst['title'])?$inst['title']:'Blog'; 
		$wposts = !empty($inst['posts'])?$inst['posts']:3;
		$page_url = !empty($inst['page_url'])?$inst['page_url']:'/blog/'; ?>
	
		<p>
			<label for="<?=$this->get_field_id('title');?>">Title</label><br>
			<input id="<?=$this->get_field_id('title');?>" name="<?=$this->get_field_name('title');?>" type="text" value="<?=esc_attr($wtitle);?>">
		</p>
		<p>
			<label for="<?=$this->get_field_id('posts');?>">Number of posts to display</label><br>
			<input id="<?=$this->get_field_id('posts');?>" name="<?=$this->get_field_name('posts');?>" type="text" value="<?=esc_attr($wposts);?>">
		</p>
		<p>
			<label for="<?=$this->get_field_id('page_url');?>">Blog page URL</label><br>
			<input class="widefat" id="<?=$this->get_field_id('page_url');?>" name="<?=$this->get_field_name('page_url');?>" type="text" value="<?=esc_attr($page_url);?>">
		</p>
	
	<?php }
	
	function update($n_inst,$o_inst) {
		$inst = array();
		$inst['title'] = (!empty($n_inst['title']))?strip_tags($n_inst['title']):'Blog';
		$inst['posts'] = (!empty($n_inst['posts']))?intval(strip_tags($n_inst['posts'])):3;
		$inst['page_url'] = (!empty($n_inst['page_url']))?strip_tags($n_inst['page_url']):'/blog/';
		return $inst;
	}
};


// facebook feed widget
class Facebook_Feed_Widget extends WP_Widget {
	function __construct() {
		$options = array(
			'classname'=>'facebook_widget',
			'description'=>'A feed of Facebook posts',
		);
		parent::__construct('facebook_widget','FasterSolutions Facebook Feed Widget',$options);
	}
	
	function widget($args,$inst) {
		$title = !empty($inst['title'])?$inst['title']:"Facebook";
		$wposts = !empty($inst['posts'])?intval($inst['posts']):3;
		$appid = !empty($inst['app_id'])?$inst['app_id']:"";
		$appsec = !empty($inst['app_sec'])?$inst['app_sec']:"";
		$appurl = !empty($inst['app_url'])?$inst['app_url']:""; ?>
		
		<div class="widget feedWidget">
			<h4 class="widgetTitle"><a href="<?=get_option('fsol_client_facebook');?>" target="_blank"><?=esc_attr($title);?> <span><i class="fa fa-facebook"></i></span></a></h4>
			<?php	// facebook feed
			if (function_exists("curl_init") && ( $appid != "")) {

				// authorize - OAuth
				$url = "https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id=".$appid."&client_secret=".$appsec;
				$curl = curl_init($url);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
				$curl_out = curl_exec($curl);
				curl_close($curl);
				$token = json_decode($curl_out);

				// pull facebook feed
				$fbf_url = "https://graph.facebook.com/".$appurl."/posts?access_token=".$token->access_token;
				$curl_fbf = curl_init($fbf_url);
				curl_setopt($curl_fbf, CURLOPT_RETURNTRANSFER, 1); 
				$curl_fbfout = curl_exec($curl_fbf);
				curl_close($curl_fbf);

				// get posts from result
				$posts_chunk = json_decode($curl_fbfout);
				$posts = $posts_chunk->data;
				
				$pcount = 0;
				foreach($posts as $fpost) {
					if ($pcount < $wposts) {
						// get stuff from post
						if (isset($fpost->message))  {
							$fb_post_msg = $fpost->message;
						} else {
							$fb_post_msg = $fpost->story;
						}
						$fb_post_date = $fpost->updated_time;
						$date_chunk = new DateTime($fb_post_date);
						$pdate = date_format($date_chunk, 'F d, Y');
						$pcount++; 
						$fb_post_msg = preg_replace('/(http[^\s]*)/','<a href="$1" target="_blank">$1</a>',$fb_post_msg); ?>
						
						<article>
							<div class="date"><?=$pdate;?></div>
							<div class="feedContent"><?=apply_filters('the_content',$fb_post_msg);?></div>
						</article>
					<?php }

				}
			} else { ?>
				<article>
					<div class="feedContent">
						Sorry, we had a problem accessing Facebook. Try reloading the page and we'll see if we can reach them this time.
					</div>
				</article>
			<?php } ?>		
		</div>
	<?php }
	
	function form($inst) {
		$title = !empty($inst['title'])?$inst['title']:"Facebook"; 
		$wposts = !empty($inst['posts'])?$inst['posts']:3; 
		$appid = !empty($inst['app_id'])?$inst['app_id']:"";
		$appsec = !empty($inst['app_sec'])?$inst['app_sec']:"";
		$appurl = !empty($inst['app_url'])?$inst['app_url']:"";
		
		?>
	
		<p>
			<label for="<?=$this->get_field_id('title');?>">Title</label><br>
			<input id="<?=$this->get_field_id('title');?>" name="<?=$this->get_field_name('title');?>" type="text" value="<?=esc_attr($title);?>">
		</p>
		<p>
			<label for="<?=$this->get_field_id('posts');?>">Number of posts to display</label><br>
			<input id="<?=$this->get_field_id('posts');?>" name="<?=$this->get_field_name('posts');?>" type="text" value="<?=esc_attr($wposts);?>">
		</p>
		<p>
			<label for="<?=$this->get_field_id('app_id');?>">Client/App ID</label><br>
			<input class="widefat" id="<?=$this->get_field_id('app_id');?>" name="<?=$this->get_field_name('app_id');?>" type="text" value="<?=esc_attr($appid);?>">
		</p>
		<p>
			<label for="<?=$this->get_field_id('app_sec');?>">Client/App Secret</label><br>
			<input class="widefat" id="<?=$this->get_field_id('app_sec');?>" name="<?=$this->get_field_name('app_sec');?>" type="text" value="<?=esc_attr($appsec);?>">
		</p>
		<p>
			<label for="<?=$this->get_field_id('app_url');?>">Client URL</label><br>
			<input class="widefat" id="<?=$this->get_field_id('app_url');?>" name="<?=$this->get_field_name('app_url');?>" type="text" value="<?=esc_attr($appurl);?>">
		</p>
		
	<?php }
	
	function update($n_inst,$o_inst) {
		$inst = array();
		$inst['title'] = (!empty($n_inst['title']))?strip_tags($n_inst['title']):"Facebook";
		$inst['posts'] = (!empty($n_inst['posts']))?intval(strip_tags($n_inst['posts'])):3;
		$inst['app_id'] = (!empty($n_inst['app_id']))?strip_tags($n_inst['app_id']):"";
		$inst['app_sec'] = (!empty($n_inst['app_sec']))?strip_tags($n_inst['app_sec']):"";
		$inst['app_url'] = (!empty($n_inst['app_url']))?strip_tags($n_inst['app_url']):"";
		
		return $inst;
	}
};



// sidebar gallery widget
/*
class Sidebar_Gallery_Widget extends WP_Widget {
	function __construct() {
		$options = array(
			'classname'=>'sidebargallery_widget',
			'description'=>'A small sidebar gallery with pager',
		);
		parent::__construct('sidebargallery_widget','FasterSolutions Sidebar Gallery Widget',$options);
	}
	
	function widget($args,$inst) {
		global $post;
		
		$wtitle = !empty($inst['title'])?$inst['title']:'Sidebar Gallery'; 
		$wnum = !empty($inst['perpage'])?intval($inst['perpage']):4; 
		$d_title = !empty($inst['d_title'])?(bool)$inst['d_title']:false;
		$d_controls = !empty($inst['d_controls'])?(bool)$inst['d_controls']:false;
		$paused = !empty($inst['paused'])?(bool)$inst['paused']:false;
		
		//$selected = isset($_GET['gallery'])?$_GET['gallery']:0;
		$this_album = get_field('photo_gallery',$post->ID);
		//$wid = $this->id;
		//$this_album = get_field('photo_gallery','widget_'.$wid);
		
		if (isset($this_album) && $this_album != "") { ?>

			<div class="widget widget_gallery">
				<script>
					var json_gallery =<?=json_encode($this_album);?>; 
					var sidegallery_perpage =<?=json_encode($wnum);?>; 
				</script>
				<div class="sidebar-gallery-top">
					<?php	if($d_title) { ?>
						<h2 class="widgetTitle"><?=esc_attr($wtitle);?></h2>
					<?php } ?>
					<?php if($d_controls) { ?>
						<div class="controls">
							<div class="prev">&#xf0d9;</div>
							<div class="next">&#xf0da;</div>
						</div>
					<?php } ?>
					<div class="clear"></div>
				</div>
				<div class="sidebar-gallery-wrapper">
					<div id="sidebar-gallery" class="cycle-slideshow" data-cycle-swipe="true" data-cycle-slides="> div" data-cycle-pager="" data-cycle-prev="" data-cycle-next=""<?=(($paused)?' data-cycle-paused="true"':'');?>>
						<div></div>
						<div></div>
					</div>
					<div class="pager-wrapper">

					</div>
				</div>
			</div>
			<div id="sidebar-gallery-modal-overlay" style="display:none;">
				<div id="sidebar-gallery-modal">
					<div id="sidebar-gallery-modal-gallery" class="class-slideshow" data-cycle-swipe="true" data-cycle-slides="> div" data-cycle-pager="" data-cycle-prev="" data-cycle-next=""<?=(($paused)?' data-cycle-paused="true"':'');?>>
						<div></div>
						<div></div>
					</div>
					<div class="controls">
						
					</div>
				</div>
			</div>
			
		<?php }
	}
	
	function form($inst) {
		$wtitle = !empty($inst['title'])?$inst['title']:'Sidebar Gallery';
		$wnum = !empty($inst['perpage'])?intval($inst['perpage']):4;
		$d_title = !empty($inst['d_title'])?(bool)$inst['d_title']:false;
		$d_controls = !empty($inst['d_controls'])?(bool)$inst['d_controls']:false;
		$paused = !empty($inst['paused'])?(bool)$inst['paused']:false; ?>
	
		<p>
			<label for="<?=$this->get_field_id('title');?>">Title</label><br>
			<input id="<?=$this->get_field_id('title');?>" name="<?=$this->get_field_name('title');?>" type="text" value="<?=esc_attr($wtitle);?>">
		</p>
		<p>
			<label for="<?=$this->get_field_id('perpage');?>">Slides per pager page</label><br>
			<input id="<?=$this->get_field_id('perpage');?>" name="<?=$this->get_field_name('perpage');?>" type="text" value="<?=esc_attr($wnum);?>">
		</p>
		<p>
			<input type="checkbox" id="<?=$this->get_field_id('d_title');?>" name="<?=$this->get_field_name('d_title');?>"<?php checked($d_title);?>><label for="<?=$this->get_field_id('d_title');?>">Display title</label>
		</p>
		<p>
			<input type="checkbox" id="<?=$this->get_field_id('d_controls');?>" name="<?=$this->get_field_name('d_controls');?>"<?php checked($d_controls);?>><label for="<?=$this->get_field_id('d_controls');?>">Display controls</label>
		</p>
		<p>
			<input type="checkbox" id="<?=$this->get_field_id('paused');?>" name="<?=$this->get_field_name('paused');?>"<?php checked($paused);?>><label for="<?=$this->get_field_id('paused');?>">Pause rotation</label>
		</p>
	<?php }
	
	function update($n_inst,$o_inst) {
		$inst = array();
		$inst['title'] = (!empty($n_inst['title']))?strip_tags($n_inst['title']):'Sidebar Gallery';
		$inst['perpage'] = (!empty($n_inst['perpage']))?intval(strip_tags($n_inst['perpage'])):4;
		$inst['d_title'] = (!empty($n_inst['d_title']))?(bool)strip_tags($n_inst['d_title']):false;
		$inst['d_controls'] = (!empty($n_inst['d_controls']))?(bool)strip_tags($n_inst['d_controls']):false;
		$inst['paused'] = (!empty($n_inst['paused']))?(bool)strip_tags($n_inst['paused']):false;
		return $inst;
	}
};
*/
// sidebar gallery widget
class Sidebar_Gallery_Widget extends WP_Widget {
	function __construct() {
		$options = array(
			'classname'=>'sidebargallery_widget',
			'description'=>'A small sidebar gallery with pager',
		);
		parent::__construct('sidebargallery_widget','FasterSolutions Sidebar Gallery Widget',$options);
	}
	
	function widget($args,$inst) {
		global $post;
		
		$wtitle = !empty($inst['title'])?$inst['title']:'Sidebar Gallery'; 
		$wnum = !empty($inst['perpage'])?intval($inst['perpage']):4; 
		$d_title = !empty($inst['d_title'])?(bool)$inst['d_title']:true;
		$d_controls = !empty($inst['d_controls'])?(bool)$inst['d_controls']:true;
		$paused = !empty($inst['paused'])?(bool)$inst['paused']:false;
		
		//$selected = isset($_GET['gallery'])?$_GET['gallery']:0;
		$photo_gallery = get_field('photo_gallery',$post->ID);
		//$wid = $this->id;
		//$photo_gallery = get_field('photo_gallery','widget_'.$wid);
		
		if (isset($photo_gallery) && $photo_gallery != "") { ?>

			<div class="widget widget_gallery">
				<div class="widget-top-bar">
					<?	if($d_title) { ?>
						<h2 class="widgetTitle"><?=esc_attr($wtitle);?></h2>
					<? } ?>
					<div class="clear"></div>
				</div>
				<?php
				//sorry everyone, this got a little hacky trying to add in the updated features really quickly.
				
				//check for sidebar gallery
				if(!empty($photo_gallery))
				{
					?>
					<script type="text/javascript">
						var json_gallery = <?=json_encode($photo_gallery);?>;
						var sidegallery_perpage = 6;
					</script>
					<div class="sidebar-gallery-wrapper">
						<div data-featherlight-gallery data-featherlight-filter="a" data-featherlight-previous-icon="" data-featherlight-next-icon="" id="sidebar-gallery" class="cycle-slideshow" data-cycle-swipe="true" data-cycle-slides="> div" data-cycle-pager=".cycle-pager" data-cycle-prev="" data-cycle-next="" data-cycle-paused="true" data-cycle-swipe="true" data-cycle-swipe-fx="scrollHorz">
							<div></div>
							<div></div>
						</div>
						<span class="cycle-pager"></span>
						<div class="pager-wrapper">
							<div id="paged-pager"></div>
						</div><!--end pager-wrapper-->
					</div><!--end sidebar-gallery-wrapper-->
					<?php
				}//end if gallery has photos
				?>
			</div>		
			
		<? }
	}
	
	function form($inst) {
		$wtitle = !empty($inst['title'])?$inst['title']:'Sidebar Gallery';
		$wnum = !empty($inst['perpage'])?intval($inst['perpage']):4;
		$d_title = !empty($inst['d_title'])?(bool)$inst['d_title']:true;
		$d_controls = !empty($inst['d_controls'])?(bool)$inst['d_controls']:true;
		$paused = !empty($inst['paused'])?(bool)$inst['paused']:false; ?>
	
		<p>
			<label for="<?=$this->get_field_id('title');?>">Title</label><br>
			<input id="<?=$this->get_field_id('title');?>" name="<?=$this->get_field_name('title');?>" type="text" value="<?=esc_attr($wtitle);?>">
		</p>
		<p>
			<label for="<?=$this->get_field_id('perpage');?>">Slides per pager page</label><br>
			<input id="<?=$this->get_field_id('perpage');?>" name="<?=$this->get_field_name('perpage');?>" type="text" value="<?=esc_attr($wnum);?>">
		</p>
		<p>
			<input type="checkbox" id="<?=$this->get_field_id('d_title');?>" name="<?=$this->get_field_name('d_title');?>"<?checked($d_title);?>><label for="<?=$this->get_field_id('d_title');?>">Display title</label>
		</p>
		<p>
			<input type="checkbox" id="<?=$this->get_field_id('d_controls');?>" name="<?=$this->get_field_name('d_controls');?>"<?checked($d_controls);?>><label for="<?=$this->get_field_id('d_controls');?>">Display controls</label>
		</p>
		<p>
			<input type="checkbox" id="<?=$this->get_field_id('paused');?>" name="<?=$this->get_field_name('paused');?>"<?checked($paused);?>><label for="<?=$this->get_field_id('paused');?>">Pause rotation</label>
		</p>
	<? }
	
	function update($n_inst,$o_inst) {
		$inst = array();
		$inst['title'] = (!empty($n_inst['title']))?strip_tags($n_inst['title']):'Sidebar Gallery';
		$inst['perpage'] = (!empty($n_inst['perpage']))?intval(strip_tags($n_inst['perpage'])):4;
		$inst['d_title'] = (!empty($n_inst['d_title']))?(bool)strip_tags($n_inst['d_title']):true;
		$inst['d_controls'] = (!empty($n_inst['d_controls']))?(bool)strip_tags($n_inst['d_controls']):true;
		$inst['paused'] = (!empty($n_inst['paused']))?(bool)strip_tags($n_inst['paused']):false;
		return $inst;
	}
};



class Twitter_Widget extends WP_Widget {
	function __construct() {
		$options = array(
			'classname'=>'twitter_widget',
			'description'=>'Twitter feed widget',
		);
		parent::__construct('twitter_widget','FasterSolutions Twitter Feed Widget',$options);
	}
	
	function widget($args,$inst) { 
		$title = !empty($inst['title'])?$inst['title']:"Twitter";
		$wposts = !empty($inst['posts'])?intval($inst['posts']):3;
		$c_key = !empty($inst['c_key'])?$inst['c_key']:"";
		$c_sec = !empty($inst['c_sec'])?$inst['c_sec']:"";
		$token = !empty($inst['token'])?$inst['token']:"";
		$token_sec = !empty($inst['token_sec'])?$inst['token_sec']:"";	?>
		
		<div class="widget widget_twitter" id="twitter_div">
			<h4 class="widgetTitle"><a href="<?=get_option('fsol_client_twitter');?>" class="button" target="_blank"><?=$title;?> <span><i class="fa fa-twitter"></i></span></a></h4>
			<!-- Twitter feed -->
			<article>
				<?php	if($c_key != "" && $c_sec != "" && $token != "" && $token_sec != "") {
						require_once('include/twitteroauth/twitteroauth.php');
						$con = new TwitterOAuth($c_key, $c_sec, $token, $token_sec);
						$ctt = $con->get('statuses/user_timeline'); 
						
						if ($ctt) { ?>
						
								<ul id="twitter-posts">
								
									<?php for ($lp=0;$lp<$wposts;$lp++) { 
										$buf = $ctt[$lp]->text; 
										$buf = preg_replace('/(http[^\s]*)/','<a href="$1" target="_blank">$1</a>',$buf); ?>
									
										<li><?=$buf;?></li>
									
									<?php } ?>
									
								</ul>
							
						<?php }
				} else { ?>
				
						<p>Sorry, we had a problem accessing Twitter. Try reloading the page and we'll see if we can reach them this time.</p>
				
				<?php } ?>
			</article>
			
		</div>		
		
	<?php }
	
	function form($inst) {
		$title = !empty($inst['title'])?$inst['title']:"Twitter";
		$wposts = !empty($inst['posts'])?intval($inst['posts']):3;
		$c_key = !empty($inst['c_key'])?$inst['c_key']:"";
		$c_sec = !empty($inst['c_sec'])?$inst['c_sec']:"";
		$token = !empty($inst['token'])?$inst['token']:"";
		$token_sec = !empty($inst['token_sec'])?$inst['token_sec']:""; ?>
		
		<p>
			<label for="<?=$this->get_field_id('title');?>">Title</label><br>
			<input type="text" id="<?=$this->get_field_id('title');?>" name="<?=$this->get_field_name('title');?>" value="<?=esc_attr($title);?>">
		</p>
		<p>
			<label for="<?=$this->get_field_id('posts');?>">Number of posts to display</label><br>
			<input type="text" id="<?=$this->get_field_id('posts');?>" name="<?=$this->get_field_name('posts');?>" value="<?=esc_attr($wposts);?>">
		</p>
		<p>
			<label for="<?=$this->get_field_id('c_key');?>">Consumer Key</label><br>
			<input type="text" class="widefat" id="<?=$this->get_field_id('c_key');?>" name="<?=$this->get_field_name('c_key');?>" value="<?=esc_attr($c_key);?>">
		</p>
		<p>
			<label for="<?=$this->get_field_id('c_sec');?>">Consumer Secret</label><br>
			<input type="text" class="widefat" id="<?=$this->get_field_id('c_sec');?>" name="<?=$this->get_field_name('c_sec');?>" value="<?=esc_attr($c_sec);?>">
		</p>
		<p>
			<label for="<?=$this->get_field_id('token');?>">Token</label><br>
			<input type="text" class="widefat" id="<?=$this->get_field_id('token');?>" name="<?=$this->get_field_name('token');?>" value="<?=esc_attr($token);?>">
		</p>
		<p>
			<label for="<?=$this->get_field_id('token_sec');?>">Token Secret</label><br>
			<input type="text" class="widefat" id="<?=$this->get_field_id('token_sec');?>" name="<?=$this->get_field_name('token_sec');?>" value="<?=esc_attr($token_sec);?>">
		</p>
		
	<?php }
	
	function update($n_inst,$o_inst) {
		$inst = array();
		$inst['title'] = (!empty($n_inst['title']))?strip_tags($n_inst['title']):'Twitter';
		$inst['posts'] = (!empty($n_inst['posts']))?intval(strip_tags($n_inst['posts'])):3;
		$inst['c_key'] = (!empty($n_inst['c_key']))?strip_tags($n_inst['c_key']):'';
		$inst['c_sec'] = (!empty($n_inst['c_sec']))?strip_tags($n_inst['c_sec']):'';
		$inst['token'] = (!empty($n_inst['token']))?strip_tags($n_inst['token']):'';
		$inst['token_sec'] = (!empty($n_inst['token_sec']))?strip_tags($n_inst['token_sec']):'';

		return $inst;
	}
}


class Google_Map_Widget extends WP_Widget {
	function __construct() {
		$options = array(
			'classname'=>'google_map_widget',
			'description'=>'Google Map widget',
		);
		parent::__construct('google_map_widget','FasterSolutions Google Map Widget',$options);
	}
	
	function widget($args,$inst) { 
		$title = !empty($inst['title'])?$inst['title']:"Find Us &raquo;";
		?>
		
		<div class="widget google-map-widget">
			<h4 class="widget-title"><a href="<?=get_option('fsol_client_twitter');?>" class="button" target="_blank"><?=$title;?> <span><i class="fa fa-twitter"></i></span></a></h4>
			<!-- Google map -->
			<article>
			
			
			</article>
			
		</div>		
		
	<?php }
	
	function form($inst) {
		$title = !empty($inst['title'])?$inst['title']:"Find Us &raquo;"; ?>
		
		<p>
			<label for="<?=$this->get_field_id('title');?>">Title</label><br>
			<input type="text" id="<?=$this->get_field_id('title');?>" name="<?=$this->get_field_name('title');?>" value="<?=esc_attr($title);?>">
		</p>
		
	<?php }
	
	function update($n_inst,$o_inst) {
		$inst = array();
		$inst['title'] = (!empty($n_inst['title']))?strip_tags($n_inst['title']):'Find Us &raquo;';

		return $inst;
	}	
}

add_action('widgets_init','fsol_add_widgets');
function fsol_add_widgets(){
	register_widget('Sidebar_Gallery_Widget');
	register_widget('Twitter_Widget');
	register_widget('Facebook_Feed_Widget');
	register_widget('Blog_Feed_Widget');
	register_widget('Google_Map_Widget');
}

?>