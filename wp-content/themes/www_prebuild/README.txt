Easy mode on changing html to WordPress PHP files:

You don't need to mimic the HTML comments' methods while setting up your HTML and CSS. Those are designed to be comments when you're working on flat HTML building your styles, and then be replaced/removed during the procedure below.
Once you add in all of the relevant HMTL and ids/classes in the normal way to the .html file, copy the file into a new scratch document.

Your editor will need Find/Replace with regular expressions. Run these on the scratch document and they will clean up the comments and set up the basic WordPress pieces.

Find: <!-- php:([\s\S]*?)-->
Replace with: <?php $1?>

Find: <!-- e:([\s\S]*?)-->
Replace with: <?$1?>

Find: <!-- c:[\s\S]*?-->
Replace with: 

Find: <!-- f:remove([\s\S]*?)f:endremove -->
Replace with: 

Find: images\/
Replace with: <?=IMAGES;?>/

Find: scripts\/
Replace with: <?=SCRIPTS;?>/

Find: <body[\s\S]*?>
Replace with: <body <?php body_class();?>>


The remaining comments denote the pieces that need to be chopped apart into header.php, front-page.php, page.php, and footer.php.

You'll have to take the header and footer from the index.html file to use on your interior files to build them, once the index.html is built. For drastically different alternate headers and footers, you'll want to create separate header-x.php and footer-x.php files for each different one then make sure the interior templates pull the correct one for their needs.
USAGE:
header-x.php: get_header('x');
footer-x.php: get_footer('x');




CSS:
Classes:
Navigation:
"search-trigger"		: makes the nav item toggle/submit the search box.
USAGE: 
<a href="#" class="search-trigger">



Structure:
"clearfix"				: clears floaters in this container.
USAGE:
<div class="container clearfix">



Content:
"hideSPAN"				: responsively hides a SPAN that holds an inline divider.
"showBR"				: responsively shows a BR to break a line on an inline divider.
USAGE: 
Faster Solutions<span class="hideSPAN">&nbsp;|&nbsp;</span><br class="showBR" />10 E Superior St Suite #201<span class="hideSPAN">&nbsp;|&nbsp;</span><br class="showBR" />Duluth, MN 55802<span class="hideSPAN">&nbsp;|&nbsp;</span><br class="showBR" /><a href="tel:2187333936">(218) 733-3936</a>

"count-up"				: ticking counter
USAGE:
<span class="count-up" data-count-id="0" data-count="450" data-count-by="2">0</span>



IDs:
"s"						: always the ID of the WordPress search input field.
USAGE: 
<input type="text" name="s" id="s" />





// Smooth-scrolling anchor links!
// add one of these data attributes to a link:
// smoothscroll-to			- scrolls to the location of {href}
// smoothscroll-y="{#}"		- scrolls to {#}
//
// Examples of use:
// <a href="#main" smoothscroll-to>Scroll to Main Container</a>
// <a href="#" smoothscroll-to="#main">Scroll to Main Container</a>
// <a href="0" smoothscroll-y>Scroll to Top</a>
// <a href="#" smoothscroll-y="0">Scroll to Top</a>
//
// Script options:
// smoothscroll.offset = 0   - sets up an offset for all scrolling, in the case that the site has a fixed header or some similar construct
// smoothscroll.duration = 300   - scroll duration

