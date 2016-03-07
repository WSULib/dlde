<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn" role="main">

	<!--<p id="introduction">The Teaching and Learning Archive offers strategies for creating Digital Learning Objects (DLOs).  It covers (1) tools for locating credible research materials for learning object content, (2) complementary digital resources, (3) national websites, (4) resources for working with learning objects.</p>-->

	<?php 
	
	//to display post titles under categories
	
	/* if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<?php if ( in_category('3') ) { ?>
   <div class="post-cat-three">

<?php } endif; ?>
     
     <!-- Display the Title as a link to the Post's permalink. -->
 <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

 </div> <!-- closes the first div box -->

<!-- Stop The Loop (but note the "else:" - see next line). -->
 <?php endwhile; else: ?>

 <!-- The very first "if" tested to see if there were any Posts to -->
 <!-- display.  This "else" part tells what do if there weren't any. -->
 <p>Sorry, no posts matched your criteria.</p>

 <!-- REALLY stop The Loop. -->
 <?php endif;  */?>
	
	<?php  if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php include_once ("/global/pub/trcdrupal/fady/Sandbox/bottom_menu.php"); ?>

</div>

<?php include_once ("/global/pub/trcdrupal/fady/Sandbox/footer.php"); ?>

<?php // get_footer(); ?>
