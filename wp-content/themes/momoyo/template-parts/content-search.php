<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package momoyo
 */

?>

<div class="row post-each">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


    	<?php if ( has_post_thumbnail()) : ?>
     
    		<div class="col-md-6 col-sm-12 post-thumb">
       			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
              <?php the_post_thumbnail(); ?></a>
    		</div>
    
    		<div class="col-md-6 col-sm-12">
				<header class="entry-header">

		<?php else :?>
	     
			<div class="col-sm-12">
				<header class="entry-header">
        
    	<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		
		
		<?php endif; ?>
	</header><!-- .entry-header -->

         <div class="entry-summary">
            <?php the_excerpt(); ?>
            <div class="read-more">
               <a href="<?php the_permalink('') ?>"><?php esc_html_e( 'Read More', 'momoyo' ); ?></a>
            </div>
         </div>
      </div>
</article><!-- #post-<?php the_ID(); ?> -->
</div>
