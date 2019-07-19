<?php
	// Template Name: Schedule Consultant
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
                            <div class="DnnModule DnnModule-DNN_HTML DnnModule-434">
                                <a name="434"></a>
                                <div id="dnn_ctr434_ContentPane" class="Default-Cont spd-container-text">
                                    <!-- Start_Module_434 -->
                                    <div id="dnn_ctr434_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                        <div id="dnn_ctr434_HtmlModule_lblContent" class="Normal">
                                            <div class="normalcontent fullwidth">
                                                <div id="wufoo-s1dnps500cx1k6k"> Fill out my <a href="https://tritoncommerce.wufoo.com/forms/s1dnps500cx1k6k">online form</a>. </div>
                                                <script type="text/javascript">
                                                    var s1dnps500cx1k6k;
                                                    (function(d, t) {
                                                        var s = d.createElement(t),
                                                            options = {
                                                                'userName': 'tritoncommerce',
                                                                'formHash': 's1dnps500cx1k6k',
                                                                'autoResize': true,
                                                                'height': '602',
                                                                'async': true,
                                                                'host': 'wufoo.com',
                                                                'header': 'show',
                                                                'ssl': true
                                                            };
                                                        s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'www.wufoo.com/scripts/embed/form.js';
                                                        s.onload = s.onreadystatechange = function() {
                                                            var rs = this.readyState;
                                                            if (rs)
                                                                if (rs != 'complete')
                                                                    if (rs != 'loaded') return;
                                                            try {
                                                                s1dnps500cx1k6k = new WufooForm();
                                                                s1dnps500cx1k6k.initialize(options);
                                                                s1dnps500cx1k6k.display();
                                                            } catch (e) {}
                                                        };
                                                        var scr = d.getElementsByTagName(t)[0],
                                                            par = scr.parentNode;
                                                        par.insertBefore(s, scr);
                                                    })(document, 'script');
                                                </script>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End_Module_434 -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php include_once('footer-top.php'); ?>
                </main>


<?php get_footer(); ?>