<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package momoyo
 */

get_header(); ?>


<div class="row">
<div class="col-sm-9">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

<?php
   if ( have_posts() ) :

      if ( is_home() && ! is_front_page() ) : ?>
        <header>
            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        </header>

		<?php
        endif;

        /* Start the Loop */
        while ( have_posts() ) : the_post();

                if ( is_home() || is_front_page() ) : 
                    get_template_part( 'template-parts/content', 'front' ); /* Blog landing page with carousel */
                else: 
                    get_template_part( 'template-parts/content', 'get_post_format() ');
                endif;

        endwhile;
        
                if ( is_page() ||  is_home() || is_front_page()) : 
                    // no post navigation
                else: 
                    the_posts_navigation();
                endif;
    
		else :

		   get_template_part( 'template-parts/content', 'none' );

		endif; ?>

    <?php if ( is_home() || is_front_page() ) :
      the_posts_pagination(); 
    endif; ?>

    </main>
  </div><!-- #primary -->
  </div><!--- col-sm-9-->

  <div class="col-sm-3">
    <?php get_sidebar(); ?>
  </div>

</div><!-- row -->
   <?php get_footer(); ?>
