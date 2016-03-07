<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<meta name="copyright" content="Wayne State University Board of Governers" />
<meta name="robots" content="index, follow" />
<meta name="distribution" content="global" />
<meta name="Description" content="Digital Learning and Development Environment: a digital humanities initiative of the Wayne State University Libraries" />
<link rel="shortcut icon" href="http://dlxs.lib.wayne.edu/dlde/favicon.ico" type="image/x-icon" />
<meta name="Keywords" content="digital sandbox, sandbox, wsu, trc, technology resource center, wayne state university, university libraries, library, digital library initiatives, otl, office for teaching and learning, virtual motor city, digital dress, digital collections" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" media="screen" href="http://dlxs.lib.wayne.edu/dlde/archive/wp-content/themes/sandbox/sandboxstyle.css" />
<link rel="stylesheet" type="text/css" media="screen" href="http://dlxs.lib.wayne.edu/dlde/archive/wp-content/themes/sandbox/current1.css" />
<link rel="stylesheet" type="text/css" media="screen" href="http://dlxs.lib.wayne.edu/dlde/archive/wp-content/themes/sandbox/menu_style.css" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<style type="text/css" media="screen">

<?php
// Checks to see whether it needs a sidebar or not
if ( empty($withcomments) && !is_single() ) {
?>
	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/kubrickbg-<?php bloginfo('text_direction'); ?>.jpg") repeat-y top; border: none; }
<?php } else { // No sidebar ?>
	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/kubrickbgwide.jpg") repeat-y top; border: none; }
<?php } ?>

</style>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<script type="text/javascript" language="javascript" src="/dlde/js/jquery-1.3.1.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$("#test").click(function(){
		$("#showbar").show();
	});
});
</script>


<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!--<div id="page">-->
<div id="wsu_logo"><img src="/dlde/images/sandbox-header.gif" /></div>
<div class="wrap background">
<?php include_once $_SERVER['DOCUMENT_ROOT']."/dlde/top_menu_archive.php"; ?>
	
<!--<div id="header" role="banner">
	<div id="headerimg"> -->
    
    <div id="logoblog">
		<h1><a href="<?php  echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<div class="description"><?php bloginfo('description'); ?></div>
        </div>
	<!-- </div> 
</div> -->
   
<hr />
