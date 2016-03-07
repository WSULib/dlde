<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<div id="content" class="widecolumn">

<h2>Links:</h2>
<ul>
<?php wp_list_bookmarks(); ?>
</ul>

</div>

<?php include_once $_SERVER['DOCUMENT_ROOT']."/dlde/bottom_menu.php"; ?>

</div>

<?php include_once $_SERVER['DOCUMENT_ROOT']."/dlde/footer.php"; ?>

<?php //get_footer(); ?>
