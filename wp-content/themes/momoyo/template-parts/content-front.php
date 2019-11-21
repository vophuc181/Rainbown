<?php
/**
 * Template part for Front page
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
    
    		<div class="col-md-6 col-sm-12 post-teaser">
				<header class="entry-header">

		<?php else :?>
	     
			<div class="col-sm-12">
				<header class="entry-header">
        
    	<?php endif; ?>

    			<?php /* Show one category only */
    				$category = get_the_category();

					if ( $category[0] ) {
				    echo '<div class="header-category"><a href="' . esc_url(get_category_link( $category[0]->term_id ) ) . '">' . sanitize_html_class($category[0]->cat_name) . '</a></div>';
					}
				?>
	
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) : ?>

				<?php endif; ?>

			</header>

   			<div class="entry-content">
    
		    	<?php the_excerpt(); ?>
		      	<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'momoyo' ),
						'after'  => '</div>',
					) );
		      	?>
		      	<div class="read-more">
		        	<a href="<?php the_permalink('') ?>"><?php esc_html_e( 'continue reading', 'momoyo' ); ?></a>
		      	</div>
   			</div><!-- .entry-content -->

		</div>
	</article>
</div>
