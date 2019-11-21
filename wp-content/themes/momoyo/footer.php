<?php
/**
 * Footer
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package momoyo
 */
?>

		</div><!-- #content -->
	</div><!-- #page -->
</div><!-- container -->

	<footer id="colophon" class="site-footer">
	<div class="container">

         <div class="site-info">
            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'momoyo' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'momoyo' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'momoyo' ), 'Momoyo', 'Benachi' );
			?>
         </div><!-- .site-info -->

		</div>
	</footer><!-- #colophon -->



<?php wp_footer(); ?>

</body>
</html>
