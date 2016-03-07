<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn" role="main">

	<p id="introduction">The Teaching and Learning Archive offers strategies for creating Digital Learning Objects (DLOs).  It covers tools for locating credible research materials for learning object content, example Digital Learning Obejcts, links to other digital collections, resources for working with learning objects, and links to organizations and societies.</p>
    	
        
        
        <div id="left-narrow">
        <h3 class="head">Featured Resources</h3>
        <ul>
        <li><a href="/dlde/archive/?p=57">Searchpath</a></li>
        <li><a href="/dlde/archive/?p=62">Library Subject Guides</a></li>
        <li><a href="/dlde/archive/?p=115">MERLOT Digital Library</a></li>
        </ul>
        
        </div>
        
        <div id="right-narrow">
        <h3 class="head">New Resources</h3>
        <ul>
    	<?php wp_get_archives('title_li=&type=postbypost&limit=5'); ?>
        </ul>
        </div>
    
    	
    
    
 


	
  <!-- //to display post titles under categories -->
	
    <!--Category Archive Start -->
    
    <h2 class="head">New Resources by Category</h2>
    
    <ul class="catArchive">
    <?php
    $catQuery = $wpdb->get_results("SELECT * FROM $wpdb->terms AS wterms INNER JOIN $wpdb->term_taxonomy AS wtaxonomy ON ( wterms.term_id = wtaxonomy.term_id ) WHERE wtaxonomy.taxonomy = 'category' AND wtaxonomy.parent = 0 AND wtaxonomy.count > 0");
 
   $catCounter = 0;

   foreach ($catQuery as $category) {

    $catCounter++;

       $catStyle = '';
       if (is_int($catCounter / 2)) $catStyle = ' class="catAlt"';

       $catLink = get_category_link($category->term_id);
 
       echo '<div class="cats"><li'.$catStyle.'><h3><a href="'.$catLink.'" title="'.$category->name.'">'.$category->name.'</a></h3>';
            echo '<ul>';
 
          query_posts('cat='.$category->term_id.'&showposts=4');?>

           <?php while (have_posts()) : the_post(); ?>
               <li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>

                <li><a href="<?php echo $catLink; ?>" title="<?php echo $category->name; ?>">More <strong><?php echo $category->name; ?></strong></a></li>
            </ul>
    </li>
    </div>
        <?php }  ?>
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

<?php include_once $_SERVER['DOCUMENT_ROOT']."/dlde/bottom_menu.php"; ?>

</div>

<?php include_once $_SERVER['DOCUMENT_ROOT']."/dlde/footer.php"; ?>

<?php // get_footer(); ?>
