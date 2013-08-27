<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="distribution" content="global" />
<meta name="robots" content="follow, all" />
<meta name="language" content="en" />

<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<link rel="Shortcut Icon" href="<?php echo bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

<script type="text/javascript"><!--//--><![CDATA[//><!--
sfHover = function() {
	if (!document.getElementsByTagName) return false;
	var sfEls = document.getElementById("nav").getElementsByTagName("li");

	// if you only have one main menu - delete the line below //
	var sfEls1 = document.getElementById("subnav").getElementsByTagName("li");
	//

	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}

	// if you only have one main menu - delete the "for" loop below //
	for (var i=0; i<sfEls1.length; i++) {
		sfEls1[i].onmouseover=function() {
			this.className+=" sfhover1";
		}
		sfEls1[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover1\\b"), "");
		}
	}
	//

}
if (window.attachEvent) window.attachEvent("onload", sfHover);
//--><!]]></script>

</head>

<body>

<div id="wrap">

	<div id="topnavbar">
	
		<div class="topnavbarleft">
			<p><a href="<?php echo get_option('home'); ?>/canada/"> Canada </a><a href="<?php echo get_option('home'); ?>/contact-us/"> Contact Us </a><!--<script src="<?php bloginfo('template_url'); ?>/javascript/date.js" type="text/javascript"></script>---></p>
		</div>

		<div class="topnavbarright">
			<p><a href="<?php bloginfo('rss_url'); ?>"><img style="vertical-align:middle" src="<?php bloginfo('template_url'); ?>/images/rss.gif" alt="Subscribe to <?php echo get_option('blogname'); ?>" /></a><a href="<?php bloginfo('rss_url'); ?>">News Feed</a><a href="<?php bloginfo('comments_rss2_url'); ?>"><img style="vertical-align:middle;margin-left:10px;" src="<?php bloginfo('template_url'); ?>/images/rss.gif" alt="Subscribe to <?php bloginfo('name'); ?>" /></a><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments</a></p>
		</div>

	</div>

<div id="header">

	<div class="headerleft">
		<a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" /></a>
	</div>
	
	<!--To define the 468x60 ad, go to your WP dashboard and go to Appearance > Widgets. Select 468x60 Header Banner and then enter your add code into a text widget-->
		
	

</div>

<div id="navbar">

	<div id="navbarleft">
		<ul id="nav">
			<li><a href="<?php echo get_option('home'); ?>">Home</a></li>
			<?php wp_list_pages('title_li=&depth=4&sort_column=menu_order&exclude=17,1099'); ?>
		</ul>
	</div>
	
	<div id="navbarright">
		<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" value="Search this website..." name="s" id="searchbox" onfocus="if (this.value == 'Search this website...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search this website...';}" />
		<input type="submit" id="searchbutton" value="GO" /></form>
	</div>
	
</div>

<div style="clear:both;"></div>

<div id="subnavbar">

	<ul id="subnav">
		<?php wp_list_categories('orderby=name&title_li=&depth=4&exclude=128,129'); ?>
	</ul>
	
</div>

<div style="clear:both;"></div>