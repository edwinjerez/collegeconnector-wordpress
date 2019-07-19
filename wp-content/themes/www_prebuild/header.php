<!DOCTYPE html>
<html>

<head>
    <meta id="MetaDescription" name="DESCRIPTION" content="College Connectors is an Independent Educational Consulting Company offering personalized college planning to students of all backgrounds &amp; academic abilities in Minnesota, Iowa, California &amp; Wisconsin &amp; throughout the US. Contact us online or call 952-303-3696!">
    <title>
        <?php the_title(); ?>
    </title>
    <link href="<?php echo STYLES; ?>/css/default.css" type="text/css" rel="stylesheet">
    <link href="<?php echo STYLES; ?>/css/container.css" type="text/css" rel="stylesheet">
    <script src="<?php echo SCRIPTS; ?>/jquery.js" type="text/javascript"></script>
    <script src="<?php echo SCRIPTS; ?>/jquery-ui.js" type="text/javascript"></script>
    <script src="<?php echo SCRIPTS; ?>/jquery-migrate-3.0.1.js"></script>
    <link rel="canonical" href="http://collegeconnectors.com/index.html">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=3, user-scalable=yes">
    <link type="text/css" rel="stylesheet" href="<?php echo STYLES; ?>/css/combined.css">
    <script async src="<?php echo SCRIPTS; ?>/combined.js" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="<?php echo STYLES; ?>/css/font.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>

<body>
    <form method="post" action="./" enctype="multipart/form-data">
        <div id="spd-container">
            <div id="MainWrapper" <?php if ( !is_home()) echo 'class="inner-page"'; ?>>
                <div class="spd-row">
                    <div id="dnn_SpeedyCustomizer" class="spd-col-md-12 Customizer hidden-xs DNNEmptyPane"></div>
                </div>
                <header id="header">
                    <div class="fullwidth" id="headertop">
                        <div class="spd-row">
                            <div class="spd-col-md-12 spd-col-sm-12 spd-col-xs-12 spd-no-padding">
                                <div id="dnn_MenuTopPane" class="MenuTopPane spmodule">
                                    <div class="DnnModule DnnModule-DNN_HTML DnnModule-385">
                                        <a name="385"></a>
                                        <div id="dnn_ctr385_ContentPane" class="Default-Cont spd-container-text">
                                            <div id="dnn_ctr385_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                                <div id="dnn_ctr385_HtmlModule_lblContent" class="Normal">
                                                    <div class="inlineblock">
                                                        <a href="http://collegeconnectors.fasterproductions.com/about-us/contact-us/"><span>Contact Us</span></a></div>
                                                    <a href="https://collegeconnectors.customcollegeplan.com/" target="_new">
                                                        <div class="inlineblock studlogin">STUDENT PORTAL LOG IN</div>
                                                    </a>
                                                    <a href="http://collegeconnectors.fasterproductions.com/schedule-a-consultation/">
                                                        <div class="inlineblock cta-btn">SCHEDULE A CONSULTATION</div>
                                                    </a>
                                                </div>

                                            </div>
                                            <!-- End_Module_385 -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fullwidth" id="menubottom">
                        <div class="spd-row logo-menu">
                            <div id="LogoLeft" class="spd-col-sm-3 spd-col-xs-6 logo">
                                <a id="dnn_dnnLogo_hypLogo" title="College Connectors" href="http://collegeconnectors.com/index.html"><img id="dnn_dnnLogo_imgLogo" src="<?php echo IMAGES; ?>/logo.png" alt="College Connectors"></a>
                            </div>
                            <div class="spd-col-xs-6 visible-xs toggle-btn">
                                <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class=" btn-navbar navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            </div>
                            <div id="MenuRight" class="spd-col-sm-9 spd-col-xs-12 menu">
                                <div class="spd-row">
                                    <div class="spd-col-md-12 spd-col-sm-12 spd-col-xs-12 spd-no-padding">
                                        <div class="menu-wrapper">
                                            <div class="collapse navbar-collapse">
                                                <div id="Mmenu" class="SpeedyDropDown">
                                                    <ul class="nav MegaMenu">
               									 		<?php
														// Main Menu
														$locations = get_nav_menu_locations();
														$main_menu = wp_get_nav_menu_object( $locations[ 'primary' ] );
														$main_menu_items = wp_get_menu_array($main_menu);
														$num = 0;
														foreach ($main_menu_items as $m_item){
													?>
														<li <?php if ( ($num++) == 0) echo 'class="first parent"'; ?>>
															<a class="" href="<?php echo $m_item['url']; ?>"><?php echo $m_item['title']; ?></a>
															<?php
															if ( count($m_item['children']) ) {
                                                            	$num1 = 0;
                                                                echo '<ul class="Dropdown subs" data-animation="fadeIn">';
                                                                foreach($m_item['children'] as $m_sub_item) {
                                                                    if ( ($num1++) == 0 ) echo '<li class="first">';
																		else echo '<li>';
																			echo '<a class="" href="'.$m_sub_item['url'].'">'.$m_sub_item['title'].'</a>';
																		echo '</li>';
                                                                }
                                                                echo '</ul>';
                                                            }
                                                            ?>
														</li>		
													<?php
														}
													?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>