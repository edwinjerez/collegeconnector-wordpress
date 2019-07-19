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
                    <?php include_once('footer-top.php'); ?>
                </main>


<?php get_footer(); ?>