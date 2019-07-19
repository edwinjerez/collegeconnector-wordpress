<?php
	// Template Name: Subpage
	get_header();
?>

<!-- CLOSECUSTOMHEADER -->
<link href="<?php echo STYLES; ?>/css/styles.css" type="text/css" rel="stylesheet">

				<main id="MpageBody">
                    <div id="SliderBg">
                        <div id="dnn_SliderFullPane" class="slider SliderFullPane spmodule DNNEmptyPane"></div>
                        <div id="dnn_SliderBannerPane" class="SliderBannerPane spmodule DNNEmptyPane"></div>
                        <div class="spd-row">
                            <div id="dnn_SliderPane" class="spd-col-md-12 spd-col-sm-12 slider spmodule DNNEmptyPane"></div>
                        </div>
                    </div>
                    <div id="dnn_FullPaneA" class="FullPaneA spmodule">
                        <div class="DnnModule DnnModule-DNN_HTML DnnModule-393">
                            <a name="393"></a>
                            <div id="dnn_ctr393_ContentPane" class="Default-Cont spd-container-text">
                                <!-- Start_Module_393 -->
                                <div id="dnn_ctr393_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                    <div id="dnn_ctr393_HtmlModule_lblContent" class="Normal">
										<div class="fullwidth fullbg" id="innerbanner" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>);">
                                            <div class="whitewrap">
												<h1><?php the_title(); ?></h1> 
											</div>
                                        </div>
                                    </div>

                                </div>
                                <!-- End_Module_393 -->
                            </div>

                        </div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_ContentPane" class="spd-col-md-12 spmodule DNNEmptyPane"></div>
                    </div>
                    <div id="dnn_FullPaneB" class="FullPaneB spmodule DNNEmptyPane"></div>
                    <div class="spd-row">
                        <div id="dnn_ContentPane_A" class="spd-col-md-12 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_1_Col_3" class="spd-col-md-3 spd-col-sm-3 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_1_Col_9" class="spd-col-md-9 spd-col-sm-9 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_2_Col_8" class="spd-col-md-8 spd-col-sm-8 spmodule">
                            <div class="DnnModule DnnModule-SunBlog DnnModule-430">
                                <a name="430"></a>
                                <div id="dnn_ctr430_ContentPane" class="Default-Cont spd-container-text">
                                    <!-- Start_Module_430 -->
                                    <div id="dnn_ctr430_ModuleContent" class="DNNModuleContent ModSunBlogC">

                                        <!-- Common archives views, such as category & monthly. -->
										<?php
											$cat_id = isset($_GET['cat']) ? $_GET['cat'] : 0;
											if ( $cat_id ) {
												$cat_name = get_cat_name($cat_id);
										?>
											<div id="dnn_ctr430_MainView_ctl01_pnlArchives" class="blog-archives-header utils-alert utils-alert-info">
    											<h2><span>From category archives:</span> College Connectors Blog</h2><p><?= $cat_name ?></p>
											</div>
										<?php
											}
										?>
                                        <div class="blog-content">
                                            <a name="Top"></a>
												
												<?php
													$blog_page_link = get_permalink( get_page_by_title('Blog'));
													$post_list = get_posts( array(
														'posts_per_page' => 10,
														'category'		 => $cat_id,
														'order'			 => 'ASC',
														'orderby'		 => 'date',
													));

													if ( $post_list ) {
														foreach( $post_list as $post ):
															setup_postdata( $post );
															$categories = get_the_category();
												?>
												<div class="post">
													<h2 class="post-title">
														<a rel="bookmark" class="tagged link" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</h2>
													<div class="post-meta">
                                                    <i class="blogicon-calendar"></i>&nbsp; <?php the_date('d/m/Y H:i A'); ?> -
													<i class="blogicon-user"></i>&nbsp; <a href="blog/authorid/1/superuser-account.html" rel="author"><?php echo get_the_author(); ?></a> -
													<?php if ( count($categories) ) {
														echo '<i class="blogicon-list"></i>&nbsp;';
														$i = 0;
														foreach($categories as $category) {
															echo '<a href="'.$blog_page_link.'/?cat='.$category->cat_ID.'">'.$category->name.'</a>';
															if ( ++$i < count($categories) ) echo ', ';
														}
														echo ' - ';
													}
													?>
													<i class="blogicon-comment"></i>&nbsp;
                                                    <a href="#" rel="nofollow">
														<?php
															$comments = get_comments();
															if ( $comments )
																echo count($comments);
															else echo 'No';
														?>
														Comments »
													</a>&nbsp;
                                                </div>

                                                <div class="post-content clearfix">

                                                    <div class="catItemImageBlock">
														<a href="<?php the_permalink(); ?>" title="">
                                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" Title="<?php the_title(); ?>" style="max-width: 250px; max-height:250px;" />
                                                        </a>
                                                    </div>

                                                    <div class="catItemBody">
														<?php
															the_excerpt();
														?>
                                                        <p><a class="post-readmore" href="<?php the_permalink(); ?>">Read the rest of entry »</a></p>
                                                    </div>
                                                </div>
												</div>
												<?php
														endforeach;
													}
												?>
                                        </div>
                                    </div>
                                </div>
							</div>
							<div class="DnnModule DnnModule-SunBlog DnnModule-432">
                                <a name="432"></a>
                                <div id="dnn_ctr432_ContentPane" class="Default-Cont spd-container-text">
                                    <!-- Start_Module_432 -->
                                    <div id="dnn_ctr432_ModuleContent" class="DNNModuleContent ModSunBlogC">

                                        <div class="Blog_SearchForm widget-search-form">
											<form role="search" method="get" action="<?php echo home_url('/'); ?>">
												<input name="dnn$ctr432$Widget$widgetSearchBox$txtSearch" type="text" maxlength="500" id="dnn_ctr432_Widget_widgetSearchBox_txtSearch" class="searchInput" placeholder="Search Posts" value="<?php echo get_search_query(); ?>"/>
												<input type="image" name="dnn$ctr432$Widget$widgetSearchBox$cmdSearch" id="dnn_ctr432_Widget_widgetSearchBox_cmdSearch" title="Search Posts" class="searchIcon" src="https://www.collegeconnectors.com/DesktopModules/SunBlog/Themes/_default/images/search.png" alt="Search Posts" style="height:18px;width:18px;" />
											</form>
                                        </div>
                                        <script type="text/javascript">
                                            $(function() {
                                                $('#' + 'dnn_ctr432_Widget_widgetSearchBox_txtSearch').keypress(function(e) {
                                                    if (e.which == 13) {
                                                        e.preventDefault();

                                                        var $widget = $(this).closest('.widget-search-form');
                                                        $widget.find('#' + 'dnn_ctr432_Widget_widgetSearchBox_cmdSearch').trigger('click');
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                    <!-- End_Module_432 -->
                                </div>

                            </div>
						</div>
                        <?php get_sidebar(); ?>						
                    </div>
					<?php include_once('footer-top.php'); ?>
                </main>


<?php get_footer(); ?>