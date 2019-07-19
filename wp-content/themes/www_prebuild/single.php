<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 */
get_header(); ?>
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
                        <div class="DnnModule DnnModule-DNN_HTML DnnModule-421">
                            <a name="421"></a>
                            <div id="dnn_ctr421_ContentPane" class="Default-Cont spd-container-text">
                                <!-- Start_Module_421 -->
                                <div id="dnn_ctr421_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                    <div id="dnn_ctr421_HtmlModule_lblContent" class="Normal">
                                        <div class="fullwidth fullbg" id="innerbanner" style="background: url(https://www.collegeconnectors.com/Portals/0/Blog.jpg);">
                                            <div class="whitewrap">
                                                <h1>Blog</h1> </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- End_Module_421 -->
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
									<?php
										while( have_posts() ) :
											the_post();
											$categories = get_the_category();
											$blog_page_link = get_permalink( get_page_by_title('Blog'));
									?>
                                        <a name="Top"></a>

                                        <div class="post" style="margin-bottom:50px">
                                            <h2 class="post-title"><?php the_title(); ?></h2>
                                            <div class="post-meta">
                                                <i class="blogicon-calendar"></i>&nbsp; <?php the_date('d/m/Y H:i A'); ?> -
                                                <i class="blogicon-user"></i>&nbsp; <a href="../../authorid/1/superuser-account.html" rel="author"><?php echo get_the_author(); ?></a> -
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
                                                <a href="#Comments" rel="nofollow">0 Comments</a>&nbsp;

                                            </div>
                                            <!-- Added by CK -->
                                            <!-- <a href="https://www.collegeconnectors.com/about-us/blog/entryid/3/what-to-expect-on-your-first-college-visit" title=""> -->
                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" Title="<?php the_title(); ?>" alt="<?php the_title(); ?>" style="float: Right; width: 350px; margin: 15px 0 15px 15px;" />
                                            <!-- </a> -->
                                            <!-- End CK -->
                                            <div class="post-content">

                                                <?php the_content(); ?>

                                            </div>

											<div class="post-tags"><i class="blogicon-tags"></i> TAGS: 
											<?php
												$i = 0;
												foreach($categories as $category) {
													echo '<a href="'.$blog_page_link.'/?cat='.$category->cat_ID.'">'.$category->name.'</a>';
													if ( ++$i < count($categories) ) echo ', ';
												}
											?>
											</div>

                                        </div>

                                        <div class="share-block bookmarks bookmarks-expand bookmarks-bg-enjoy">
                                            <h3>Share this post</h3>
                                            <ul id="dnn_ctr430_MainView_ctl01_ctl00_widgetBookmarks_ulSocialTags" class="share-buttons socials"></ul>

                                            <div style="clear:both"></div>
										</div>
										<style>
										</style>
										<div id="nav-below" class="navigation">
										<?php
										if ( is_singular( 'post' ) ) {
											// Previous/next post navigation.
											the_post_navigation(
												array(
													'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'College' ) . '</span> ' .
														'<span class="screen-reader-text">' . __( 'Next post:', 'College' ) . '</span> <br/>' .
														'<span class="post-title">%title »</span>',
													'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'College' ) . '</span> ' .
														'<span class="screen-reader-text">' . __( 'Previous post:', 'College' ) . '</span> <br/>' .
														'<span class="post-title">« %title</span>',
												)
											);
										}
										?>
										</div>

										<div id="relatedPosts">
											<h3>Possibly related posts:</h3>
											<ul>
											<?php
												$related_posts = wcr_related_posts();
												foreach( $related_posts as $related_post ) {
													// var_dump($related_post);
													echo '<li><a href="'.$related_post->url.'" title="'.$related_post->post_excerpt.'">' . $related_post->post_title.'</a></li>';
												}

											?>
											</ul>
										</div>
                                        <!-- Comments Header Note -->

                                        <a name="Comments"></a>
                                        <!-- Comments List View -->
                                        <ol id="annotations">

                                        </ol>
                                        <!-- New Comment Panel -->

                                        <!-- Comments Footer Note -->
										<div id="dnn_ctr430_MainView_ctl01_ctl01_divCommentFooter" class="utils-alert">Comments are closed for this post, but if you have spotted an error or have additional info that you think should be in this post, feel free to contact us.</div>
									<?php
										endwhile;
									?>
                                    </div>
                                    <!-- End_Module_430 -->
                                </div>

							</div>
							<div class="DnnModule DnnModule-SunBlog DnnModule-432">
                                <a name="432"></a>
                                <div id="dnn_ctr432_ContentPane" class="Default-Cont spd-container-text">
                                    <!-- Start_Module_432 -->
                                    <div id="dnn_ctr432_ModuleContent" class="DNNModuleContent ModSunBlogC">

                                        <div class="Blog_SearchForm widget-search-form">
                                            <input name="dnn$ctr432$Widget$widgetSearchBox$txtSearch" type="text" maxlength="500" id="dnn_ctr432_Widget_widgetSearchBox_txtSearch" class="searchInput" placeholder="Search Posts" />
                                            <input type="image" name="dnn$ctr432$Widget$widgetSearchBox$cmdSearch" id="dnn_ctr432_Widget_widgetSearchBox_cmdSearch" title="Search Posts" class="searchIcon" src="https://www.collegeconnectors.com/DesktopModules/SunBlog/Themes/_default/images/search.png" alt="Search Posts" style="height:18px;width:18px;" />
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
				<div id="dnn_FullPane_J" class="FullPaneJ spmodule">
                        <div class="DnnModule DnnModule-DNN_HTML DnnModule-480">
                            <a name="480"></a>
                            <div id="dnn_ctr480_ContentPane" class="Default-Cont spd-container-text">
                                <!-- Start_Module_480 -->
                                <div id="dnn_ctr480_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                    <div id="dnn_ctr480_HtmlModule_lblContent" class="Normal">
                                        <div class="footer-tagline"><?php the_field('bottom_title'); ?></div>
                                        <div class="footer-counter">
                                            <div class="spd-row">
                                            <?php 
                                                if( get_field('cups_number') ):
                                            ?>
                                                <div class="spd-col-md-3 spd-col-sm-3 spd-xs-padding-bottom-50">
                                                    <div class="counter-box"> <i class="fas fa-coffee fa-3x"></i> <span class="spd-counter mediumcount"><?php the_field('cups_number'); ?></span>
                                                        <h4>cups of coffee consumed by College Connectors this year</h4> </div>
                                                </div>
                                                <div class="spd-col-md-3 spd-col-sm-3 spd-xs-padding-bottom-50">
                                                    <div class="counter-box"> <i class="fas fa-map-marker-alt fa-3x"></i> <span class="spd-counter mediumcount"><?php the_field('full_year_college_number'); ?></span>
                                                        <h4>four-year colleges in the US (degree-granting, nonprofit)</h4> </div>
                                                </div>
                                                <div class="spd-col-md-3 spd-col-sm-3 spd-xs-padding-bottom-50">
                                                    <div class="counter-box"> <i class="fas fa-university fa-3x"></i> <span id="extratext">Over</span> <span class="spd-counter mediumcount"><?php the_field('private_college_number'); ?></span>
                                                        <h4>private colleges charge at least $50,000</h4> </div>
                                                </div>
                                                <div class="spd-col-md-3 spd-col-sm-3 spd-xs-padding-bottom-50">
                                                    <div class="counter-box"> <i class="fas fa-file-alt fa-3x"></i> <span id="extratext">Over</span> <span class="spd-counter mediumcount"><?php the_field('text_optional_colleges_number'); ?></span>
                                                        <h4>colleges are test-optional or test-flexible</h4> </div>
                                                </div>
                                            <?php
                                                endif;
                                            ?>
                                            <?php
                                                if( get_field('states_number') ):
                                            ?>
                                                <div class="spd-col-md-3 spd-col-sm-3 spd-xs-padding-bottom-50">
                                                    <div class="counter-box"> <i class="fas fa-map-marker-alt fa-3x"></i> <span class="spd-counter mediumcount"><?php the_field('states_number'); ?></span><span id="extratext">States</span>
                                                        <h4>our students attend college all across the U.S.</h4> </div>
                                                </div>
                                                <div class="spd-col-md-3 spd-col-sm-3 spd-xs-padding-bottom-50">
                                                    <div class="counter-box"> <i class="fa fa-graduation-cap fa-3x"></i> <span class="spd-counter mediumcount"><?php the_field('student_percentage'); ?></span><span class="counter-ex2">%</span>
                                                        <h4>students put academic programs before cost & prestige</h4> </div>
                                                </div>
                                                <div class="spd-col-md-3 spd-col-sm-3 spd-xs-padding-bottom-50">
                                                    <div class="counter-box"> <i class="fa fa-school fa-3x"></i> <span class="spd-counter mediumcount"><?php the_field('visit_number'); ?></span>
                                                        <h4>college visits each year by our consultants</h4> </div>
                                                </div>
                                                <div class="spd-col-md-3 spd-col-sm-3 spd-xs-padding-bottom-50">
                                                    <div class="counter-box"> <i class="fa fa-calendar-alt fa-3x"></i> <span class="spd-counter mediumcount"><?php the_field('experience_year_number'); ?></span>
                                                        <h4>years of combined college counseling experience</h4> </div>
                                                </div>
                                            <?php
                                                endif;
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</main>
<?php get_footer(); ?>
