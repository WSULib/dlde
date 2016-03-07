<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn" role="main">

	<!--<p id="introduction">The Teaching and Learning Archive offers strategies for creating Digital Learning Objects (DLOs).  It covers (1) tools for locating credible research materials for learning object content, (2) complementary digital resources, (3) national websites, (4) resources for working with learning objects.</p>-->
	
	
	
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

		<?php endwhile; endif; ?>


	
  <!-- //to display post titles under categories -->
	
    <!--Category Archive Start -->
    
    <ul class="catArchive">
    <?php
    $catQuery = $wpdb->get_results("SELECT * FROM $wpdb->terms AS wterms INNER JOIN $wpdb->term_taxonomy AS wtaxonomy ON ( wterms.term_id = wtaxonomy.term_id ) WHERE wtaxonomy.taxonomy = 'category' AND wtaxonomy.parent = 0 AND wtaxonomy.count > 0");
 
   $catCounter = 0;

   foreach ($catQuery as $category) {

    $catCounter++;

       $catStyle = '';
       if (is_int($catCounter / 2)) $catStyle = ' class="catAlt"';

       $catLink = get_category_link($category->term_id);
 
       echo '<li'.$catStyle.'><h3><a href="'.$catLink.'" title="'.$category->name.'">'.$category->name.'</a></h3>';
            echo '<ul>';
 
          query_posts('cat='.$category->term_id.'&showposts=5');?>

           <?php while (have_posts()) : the_post(); ?>
               <li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>

                <li><a href="<?php echo $catLink; ?>" title="<?php echo $category->name; ?>">More <strong><?php echo $category->name; ?></strong></a></li>
            </ul>
    </li>
.        <?php }  ?>
    </ul>
    
  <!-- Category Archive End -->



	<!--	<div class="navigation">
			<div class="alignleft"><?php // next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php // previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php // else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php // get_search_form(); ?> -->

	<?php //endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php include_once ("/global/pub/trcdrupal/fady/Sandbox/bottom_menu.php"); ?>

</div>

<?php include_once ("/global/pub/trcdrupal/fady/Sandbox/footer.php"); ?>

<?php // get_footer(); ?>
