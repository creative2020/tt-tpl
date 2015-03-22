<?php get_header(); ?>

<div class="row"> <!-- main -->
    
    <?php get_template_part( 'sidebar', 'main' ); ?>
    
    </div> <!-- LEFT -->

<?php
$post_id = get_the_ID();
$post_thumbnail_id = get_post_thumbnail_id( $post_id );
$attachment_url = wp_get_attachment_url( $post_thumbnail_id );

if (empty($attachment_url)) {
    $attachment_url = get_template_directory_uri().'/images/icon-image-pm.png';
} else {
    //nothing
}


?>
   
<div class="col-sm-9" style=""> <!-- RIGHT -->
        <div id="page-header" class="row">
            <div class="col-sm-8"> 
                <h1><?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?></h1>
            </div>
            <div class="col-sm-4"> 
                <div class="col-sm-12 tt-feature-image"><img src="<?php echo $attachment_url; ?>" alt="Construction Software" class="img-responsive"/></div>
            </div>
        </div>
    
      
<div class="row"> <!--row-->
    <div class="section clearfix">
        
        <div class="col-md-10 col-md-offset-1">
            <?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', '' ),
				'next_text'          => __( 'Next page', '' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', '' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>
        </div>
    </div>
</div> <!--row-->




</div> <!-- RIGHT -->

  



</div> <!-- main -->




  <?php get_footer() ?>
