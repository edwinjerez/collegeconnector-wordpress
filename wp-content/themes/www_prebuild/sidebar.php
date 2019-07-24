<div id="dnn_Row_2_Col_4" class="spd-col-md-4 spd-col-sm-4 spmodule">
    <?php if ( get_field('side_photo') ) { ?>
    <div class="DnnModule DnnModule-DNN_HTML DnnModule-461" style="">
        <a name="461"></a>
        <div id="dnn_ctr461_ContentPane" class="Default-Cont spd-container-text">
            <!-- Start_Module_461 -->
            <div id="dnn_ctr461_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                <div id="dnn_ctr461_HtmlModule_lblContent" class="Normal">
                    <div id="sidebar" class="teamfeature"><img width="100%" src="<?php the_field('side_photo'); ?>"></div>
                </div>

            </div>
            <!-- End_Module_461 -->
        </div>
    </div>
    <?php } ?>
    <div class="DnnModule DnnModule-DNN_HTML DnnModule-392">
        <a name="392"></a>
        <div id="dnn_ctr392_ContentPane" class="Default-Cont spd-container-text">
            <!-- Start_Module_392 -->
            <div id="dnn_ctr392_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                <div id="dnn_ctr392_HtmlModule_lblContent" class="Normal">
                    <div id="sidebar">
                        <iframe frameborder="0" height="460px" scrolling="no" seamless="seamless" src="<?php echo get_site_url(); ?>/wp-content/themes/www_prebuild/contactform/index.html" width="100%"></iframe>
                        <a href="<?php echo get_permalink( get_page_by_title( 'Contact Us' ) ); ?>" onclick="_gaq.push(['_trackEvent', 'Phone Calls', 'Clicked', 'Phone Number']);" class="contactlink">
                            <div class="cta-btn">Let's Get Started!</div>
                        </a>
                        <div class="sidequote">
                            <p>College Connectors helped us look at choices from different perspectives than we might have otherwise had. They helped keep the emotions under control - to think logically but with enthusiasm!</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End_Module_392 -->
        </div>

    </div>
    <?php 
        global $template;
        if ( basename($template) == 'single.php' || basename($template) == 'TEMPLATE-blog.php' ) {
    ?>
    <div class="DnnModule DnnModule-SunBlog DnnModule-431">
        <a name="431"></a>
        <div id="dnn_ctr431_ContentPane" class="Default-Cont spd-container-text">
            <!-- Start_Module_431 -->
            <div id="dnn_ctr431_ModuleContent" class="DNNModuleContent ModSunBlogC">

                <ul class="list-group widget widget-meta">
                    <li class="list-group-item Home"><a href="<?php echo home_url(); ?>" rel="nofollow">Home</a></li>
                    <li class="list-group-item Rss"><a href="<?php echo home_url()."/feed"; ?>" rel="nofollow">Rss Feed</a></li>
                </ul>
            </div>
            <!-- End_Module_431 -->
        </div>

    </div>
    <div class="DnnModule DnnModule-SunBlog DnnModule-433" style="margin-top: 20px;">
        <a name="433"></a>
        <div id="dnn_ctr433_ContentPane" class="Default-Cont spd-container-text">
            <!-- Start_Module_433 -->
            <div id="dnn_ctr433_ModuleContent" class="DNNModuleContent ModSunBlogC">
                <div id="dnn_ctr433_Widget_ulArchiveMonths" class="widget widget-archives">
                    <?php wp_custom_archive(); ?>
                    <script type="text/javascript">
                        (function() {
                            // monthly widget - initialize archiveMonth toggle
                            jQuery('.widget-accordion-toggle').click(function(e) {
                                var group = jQuery(this).closest('.widget-accordion-group');
                                group.find('.widget-accordion-body ul').toggleClass('open');

                                e.preventDefault();
                            });

                            jQuery('.widget-accordion-body').each(function(i) {
                                var $this = jQuery(this);
                                var $toggle = $this.closest('.widget-accordion-group').find('.widget-accordion-toggle');
                                var icon = '<i class="icon-white icon-plus"></i>';
                                if ($this.find('ul').hasClass('open')) {
                                    icon = '<i class="icon-white icon-minus"></i>';
                                }
                                $toggle.html(icon + ' ' + $toggle.html());
                            });
                        })(jQuery);
                    </script>

                </div>
            </div>
            <!-- End_Module_433 -->
        </div>

    </div>
    <?php
        } else {
    ?>
    <div class="DnnModule DnnModule-DNN_HTML DnnModule-472">
        <a name="472"></a>
        <div id="dnn_ctr472_ContentPane" class="Default-Cont spd-container-text">
            <!-- Start_Module_472 -->
            <div id="dnn_ctr472_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                <div id="dnn_ctr472_HtmlModule_lblContent" class="Normal">
                    <div class="videofeature">
                        <?php if ( get_field('sidebar_youtube_link') ) { ?>
                        <div class="iframe-container">
                            <iframe src="<?php the_field('sidebar_youtube_link'); ?>" frameborder="0" allowfullscreen="" width="100%"></iframe>
                        </div>
                        <a href="http://collegeconnectors.fasterproductions.com/our-successes/videos/">
                            <div class="cta-btn">See More of Our Success Videos &gt;&gt;</div>
                        </a>
                        <?php } ?>
                    </div>
                </div>

            </div>
            <!-- End_Module_472 -->
        </div>

    </div>
    <?php } ?>
</div>