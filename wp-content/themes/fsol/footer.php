<?php
/**
 * @package WordPress
 * @subpackage FSOL
 * @category Page Structure Templates
 * @author Shane Smith - Faster Solutions
 * @copyright 1997-2012 Faster Solutions
 */
?>
    </div><!-- #main  -->
        <footer id="primary_footer" role="contentinfo">
            <div id="copyright">
                &copy; Copyright <?php echo date('Y') . " " . esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
            </div>
            <nav id="footer_nav">      
                <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
            </nav>
            <div id="site_credits">
                Website by <a href="http://www.fastersolutions.com" target="_blank">Faster Solutions</a>
            </div>      
        </footer>
    </div><!-- #page -->
    <?php wp_footer(); ?>
</body>
</html>