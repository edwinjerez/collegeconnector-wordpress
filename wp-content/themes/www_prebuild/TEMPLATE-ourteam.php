<?php
	// Template Name: Our team
	get_header();
?>

<!-- CLOSECUSTOMHEADER -->
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
                            <div class="DnnModule DnnModule-DNN_HTML DnnModule-380">
                                <a name="380"></a>
                                <div id="dnn_ctr380_ContentPane" class="Default-Cont spd-container-text">
                                    <!-- Start_Module_380 -->
                                    <div id="dnn_ctr380_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                        <div id="dnn_ctr380_HtmlModule_lblContent" class="Normal">
                                            <div class="normalcontent fullwidth">
                                                <h2>Our Team</h2>
                                                <?php 
                                                $num = 0;
                                                // Getting Variable for Admission Section
                                                if( have_rows('team_members') ):
                                                    while( have_rows('team_members') ) : the_row();
                                                ?>
                                                    <div class="staff-member spd-col-sm-6">
                                                        <a href="<?php echo get_sub_field('link'); ?>"><img alt="<?php echo get_sub_field('photo_description'); ?>" title="<?php echo get_sub_field('photo_description'); ?>" onmouseover="this.src='<?php echo get_sub_field('mouseover_photo'); ?>'" onmouseout="this.src='<?php echo get_sub_field('photo'); ?>'" src="<?php echo get_sub_field('photo'); ?>" /></a>
                                                        <p class="staff-name"> <strong><?php echo get_sub_field('member_name'); ?></strong>
                                                            <br> <i><?php echo get_sub_field('member_description'); ?></i> </p>
                                                    </div>
                                                <?php
                                                    endwhile;
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
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