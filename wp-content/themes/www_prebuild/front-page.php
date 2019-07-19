<?php
    get_header();
?>
                <main id="MpageBody">
                    <div id="SliderBg">
                        <div id="dnn_SliderFullPane" class="slider SliderFullPane spmodule">
                            <div class="DnnModule DnnModule-DNN_HTML DnnModule-354">
                                <a name="354"></a>
                                <div id="dnn_ctr354_ContentPane">
                                    <!-- Start_Module_354 -->
                                    <div id="dnn_ctr354_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                        <div id="dnn_ctr354_HtmlModule_lblContent" class="Normal">
                                            <div id="homebanner" class="fullwidth fullbg" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>);">
                                                <div class="whitewrap">
                                                    <h1><?php the_field('homepage_title'); ?></h1> 
                                                </div>
                                                <a href="<?php echo get_permalink( get_page_by_title('Contact Us')); ?>" class="contactlink">
                                                    <div class="cta-btn">Let's Get Started!</div>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End_Module_354 -->
                                </div>
                            </div>
                        </div>                      
                        <div id="dnn_SliderBannerPane" class="SliderBannerPane spmodule DNNEmptyPane"></div>
                        <div class="spd-row">
                            <div id="dnn_SliderPane" class="spd-col-md-12 spd-col-sm-12 slider spmodule DNNEmptyPane"></div>
                        </div>
                    </div>
                    <div id="dnn_FullPaneA" class="FullPaneA spmodule DNNEmptyPane"></div>
                    <?php 
                    // Getting Variable for Admission Section
                    if( have_rows('admission_section') ):
                        while( have_rows('admission_section') ) : the_row(); 
                            $ad_image = get_sub_field('admission_image');
                            $ad_title = get_sub_field('admission_title');
                            $ad_content = get_sub_field('admission_content');
                        endwhile;
                    endif;
                    ?>
                    <div class="spd-row">
                        <div id="dnn_ContentPane" class="spd-col-md-12 spmodule">
                            <div class="DnnModule DnnModule-DNN_HTML DnnModule-355">
                                <a name="355"></a>
                                <div id="dnn_ctr355_ContentPane">
                                    <!-- Start_Module_355 -->
                                    <div id="dnn_ctr355_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                        <div id="dnn_ctr355_HtmlModule_lblContent" class="Normal">
                                            <div class="fullwidth" id="introtxt">
                                                <p><img src="<?= $ad_image ?>" alt="The Student, The Fit, The College. Our Process, Your Success." title="The Student, The Fit, The College. Our Process, Your Success."></p>
                                                <h3><?= $ad_title ?></h3>
                                                <p><?= $ad_content ?></p>
                                                <a href="<?php echo get_permalink( get_page_by_title('Contact Us')); ?>">
                                                    <div class="cta-btn">Let's Get Started!</div>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End_Module_355 -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="dnn_FullPaneB" class="FullPaneB spmodule">
                        <div class="DnnModule DnnModule-DNN_HTML DnnModule-386">
                            <a name="386"></a>
                            <div id="dnn_ctr386_ContentPane" class="Default-Cont spd-container-text">
                                <!-- Start_Module_386 -->
                                <div id="dnn_ctr386_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                    <div id="dnn_ctr386_HtmlModule_lblContent" class="Normal">
                                        <div id="servgrid" class="fullwidth">
                                            <div class="spd-row">
                                            <?php 
                                            if( have_rows('h_service_section') ):
                                                while( have_rows('h_service_section') ) : the_row(); 
                                                    $img      = get_sub_field('background_image');
                                                    $title    = get_sub_field('title');
                                                    $content  = get_sub_field('content');
                                                    $link     = get_sub_field('link');
                                                    $btn_text = get_sub_field('button_text');
                                                    echo '<div class="spd-col-sm-3">';
                                                    echo '<div class="grid">';
                                                    echo '<div class="imgwrap fullbg" style="background: url('.$img.');">';
                                                    echo '<div class="titlewrap">';
                                                    echo '<h4>'.$title.'</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                    echo $content;
                                                    echo '<a href="'.$link.'">';
                                                    echo '<div class="cta-btn">'.$btn_text.'</div>';
                                                    echo '</a>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                endwhile;
                                            endif;
                                            ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- End_Module_386 -->
                            </div>

                        </div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_ContentPane_A" class="spd-col-md-12 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_1_Col_3" class="spd-col-md-3 spd-col-sm-3 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_1_Col_9" class="spd-col-md-9 spd-col-sm-9 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_2_Col_8" class="spd-col-md-8 spd-col-sm-8 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_2_Col_4" class="spd-col-md-4 spd-col-sm-4 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_3_Col_5" class="spd-col-md-5 spd-col-sm-5 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_3_Col_7" class="spd-col-md-7 spd-col-sm-7 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_4_Col_6_A" class="spd-col-md-6 spd-col-sm-6 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_4_Col_6_B" class="spd-col-md-6 spd-col-sm-6 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_5_Col_7" class="spd-col-md-7 spd-col-sm-7 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_5_Col_5" class="spd-col-md-5 spd-col-sm-5 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_6_Col_8" class="spd-col-md-8 spd-col-sm-8 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_6_Col_4" class="spd-col-md-4 spd-col-sm-4 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_7_Col_9" class="spd-col-md-9 spd-col-sm-9 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_7_Col_3" class="spd-col-md-3 spd-col-sm-3 spmodule DNNEmptyPane"></div>
                    </div>
                    <div id="dnn_FullPane_C" class="FullPaneC spmodule">
                        <div class="DnnModule DnnModule-DNN_HTML DnnModule-387">
                            <a name="387"></a>
                            <div id="dnn_ctr387_ContentPane" class="Default-Cont spd-container-text">
                                <!-- Start_Module_387 -->
                                <div id="dnn_ctr387_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                    <div id="dnn_ctr387_HtmlModule_lblContent" class="Normal">
                                    <?php 
                                    if( have_rows('planning_section') ):
                                        while( have_rows('planning_section') ) : the_row(); 
                                            $planning_title = get_sub_field('planning_title');
                                            $planning_content = get_sub_field('planning_content');
                                    ?>

                                    
                                        <div class="fullwidth" id="introtxt">
                                            <div class="spd-row">
                                                <h3><?= $planning_title ?></h3>
                                                <?= $planning_content ?>
                                            </div>
                                        </div>
                                        <div id="imgblock">
                                            <div class="spd-col-sm-9">
                                                <?php
                                                    if( have_rows('gallery_group_left') ):
                                                        while( have_rows('gallery_group_left') ) : the_row(); 
                                                            echo '<div class="spd-col-sm-4">';
                                                            echo '<a href="'.get_sub_field('planning_gallery_link').'"><img src="'.get_sub_field('p_gallery_image').'" class="imgHover">';
                                                            echo '<h4>'.get_sub_field('p_gallery_title').'</h4></a>';
                                                            echo '</div>';
                                                        endwhile;
                                                    endif;
                                                ?>
                                            </div>
                                            <div class="spd-col-sm-3 fullimg">
                                                <?php
                                                    if( have_rows('gallery_right') ):
                                                        while( have_rows('gallery_right') ) : the_row(); 
                                                            echo '<a href="'.get_sub_field('gallery_right_link').'"><img src="'.get_sub_field('g_r_image').'" class="imgHover">';
                                                            echo '<h4>'.get_sub_field('g_r_title').'</h4></a>';
                                                        endwhile;
                                                    endif;
                                                ?>
                                            </div>
                                        </div>
                                    <?
                                        endwhile;
                                    endif;
                                    ?>
                                    </div>

                                </div>
                                <!-- End_Module_387 -->
                            </div>

                        </div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_ContentPane_B" class="spd-col-md-12 spmodule DNNEmptyPane"></div>
                    </div>
                    <div id="dnn_FullPane_D" class="FullPaneD spmodule DNNEmptyPane"></div>
                    <div class="spd-row">
                        <div id="dnn_ContentPane_C" class="spd-col-md-12 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_8_Col_4_A" class="spd-col-md-4 spd-col-sm-4 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_8_Col_4_B" class="spd-col-md-4 spd-col-sm-4 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_8_Col_4_C" class="spd-col-md-4 spd-col-sm-4 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_9_Col_3_A" class="spd-col-md-3 spd-col-sm-3 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_9_Col_6_B" class="spd-col-md-6 spd-col-sm-6 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_9_Col_3_C" class="spd-col-md-3 spd-col-sm-3 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_10_Col_3_A" class="spd-col-md-3 spd-col-sm-3 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_10_Col_3_B" class="spd-col-md-3 spd-col-sm-3 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_10_Col_3_C" class="spd-col-md-3 spd-col-sm-3 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_10_Col_3_D" class="spd-col-md-3 spd-col-sm-3 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_ContentPane_D" class="spd-col-md-12 spmodule DNNEmptyPane"></div>
                    </div>
                    <div id="dnn_FullPane_E" class="FullPaneE spmodule DNNEmptyPane"></div>
                    <div class="spd-row">
                        <div id="dnn_ContentPane_E" class="spd-col-md-12 spmodule DNNEmptyPane"></div>
                    </div>
                    <div id="dnn_FullPane_F" class="FullPaneF spmodule DNNEmptyPane"></div>
                    <div class="spd-row">
                        <div id="dnn_Row_11_Col_4_A" class="spd-col-md-4 spd-col-sm-4 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_11_Col_4_B" class="spd-col-md-4 spd-col-sm-4 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_11_Col_4_C" class="spd-col-md-4 spd-col-sm-4 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_12_Col_3_A" class="spd-col-md-3 spd-col-sm-3 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_12_Col_6_B" class="spd-col-md-6 spd-col-sm-6 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_12_Col_3_C" class="spd-col-md-3 spd-col-sm-3 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_13_Col_3_A" class="spd-col-md-3 spd-col-sm-3 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_13_Col_3_B" class="spd-col-md-3 spd-col-sm-3 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_13_Col_3_C" class="spd-col-md-3 spd-col-sm-3 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_13_Col_3_D" class="spd-col-md-3 spd-col-sm-3 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_ContentPane_F" class="spd-col-md-12 spmodule DNNEmptyPane"></div>
                    </div>
                    <div id="dnn_FullPane_G" class="FullPaneG spmodule DNNEmptyPane"></div>
                    <div class="spd-row">
                        <div id="dnn_ContentPane_G" class="spd-col-md-12 spmodule DNNEmptyPane"></div>
                    </div>
                    <div id="dnn_FullPane_H" class="FullPaneH spmodule">
                        <div class="DnnModule DnnModule-DNN_HTML DnnModule-388">
                            <a name="388"></a>
                            <div id="dnn_ctr388_ContentPane" class="Default-Cont spd-container-text">
                                <!-- Start_Module_388 -->
                                <div id="dnn_ctr388_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                    <div id="dnn_ctr388_HtmlModule_lblContent" class="Normal">
                                        <div id="footertoppane" class="fullwidth fullbg" style="background: url('http://collegeconnectors.fasterproductions.com/wp-lib/wp-content/uploads/2019/07/footertop-bg.jpg');">
                                            <div class="spd-row">
                                            <?php
                                            if( have_rows('team_section') ):
                                                while( have_rows('team_section') ) : the_row(); 
                                                    $ad_image = get_sub_field('admission_image');
                                                    $ad_title = get_sub_field('admission_title');
                                                    $ad_content = get_sub_field('admission_content');
                                                    echo '<h3>'.get_sub_field('team_title').'</h3>';
                                                    echo get_sub_field('team_content');
                                                endwhile;
                                            endif;
                                            ?>                                                
                                                <a href="<?php echo get_permalink( get_page_by_title('Contact Us')); ?>" class="contactlink">
                                                    <div class="cta-btn">Let's Get Started!</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- End_Module_388 -->
                            </div>

                        </div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_14_Col_9" class="spd-col-md-9 spd-col-sm-9 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_14_Col_3" class="spd-col-md-3 spd-col-sm-3 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_15_Col_8" class="spd-col-md-8 spd-col-sm-8 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_15_Col_4" class="spd-col-md-4 spd-col-sm-4 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_16_Col_7" class="spd-col-md-7 spd-col-sm-7 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_16_Col_5" class="spd-col-md-5 spd-col-sm-5 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_17_Col_6_A" class="spd-col-md-6 spd-col-sm-6 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_17_Col_6_B" class="spd-col-md-6 spd-col-sm-6 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_18_Col_5" class="spd-col-md-5 spd-col-sm-5 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_18_Col_7" class="spd-col-md-7 spd-col-sm-7 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_19_Col_4" class="spd-col-md-4 spd-col-sm-4 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_19_Col_8" class="spd-col-md-8 spd-col-sm-8 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_Row_20_Col_3" class="spd-col-md-3 spd-col-sm-3 spmodule DNNEmptyPane"></div>
                        <div id="dnn_Row_20_Col_9" class="spd-col-md-9 spd-col-sm-9 spmodule DNNEmptyPane"></div>
                    </div>
                    <div class="spd-row">
                        <div id="dnn_ContentPane_H" class="spd-col-md-12 spmodule DNNEmptyPane"></div>
                    </div>
                    <div id="dnn_FullPane_I" class="FullPaneI spmodule DNNEmptyPane"></div>
                    <div class="spd-row">
                        <div id="dnn_ContentPane_I" class="spd-col-md-12 spmodule DNNEmptyPane"></div>
                    </div>
                    <div id="dnn_FullPane_J" class="FullPaneJ spmodule DNNEmptyPane"></div>
                </main>

<?php
    get_footer();
?>