<?php
/*
Template Name: Blog
*/
get_header(); ?>

<?php
// Query exclude 7,4
$args = array(
	'posts_per_page'   => -1,
	'offset'           => 0,
    'category__not_in' => array( 1,4,5,7 ),
	'category_name'    => '',
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'post',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'post_status'      => 'publish',
	'suppress_filters' => true 
);
$the_query = new WP_Query( $args );

?>

<div id="page" class="row">
    <div class="visible-xs-block">
        <?php get_template_part( 'section', 'logo' ); ?>
    </div>
    
    <div class="col-xs-12 col-sm-9 col-sm-push-3"> <!-- col RIGHT -->
        <div id="page-header" class="row">
            <div class="col-xs-12 col-sm-8"> 
                <h1>Blog</h1>
            </div>
            <div class="hidden-xs col-sm-4"> 
                <div class="col-sm-12 tt-feature-image"><?php echo $feature_graphic; ?></div>
            </div>
        </div>
    
      
<div class="row"> <!--row-->
    <div class="section clearfix">
        
        <div class="col-md-10 col-md-offset-1">
            
            <?php 
                if ( $the_query->have_posts() ) {
                    
                    while ( $the_query->have_posts() ) {
                        
                        $the_query->the_post();
                        $post_id = get_the_ID();
                        $permalink = get_permalink( $id );
                        $post = get_post();
                        $category = get_the_category();
                        $cat_name = $category[0]->category_nicename;
                        
                    //check for custom content style    
            if ( in_category( 'testimonial' ) ) {
                    get_template_part( 'content', 'testimonial' );
                }
            else if ( in_category( 'features' ) ) {
                    get_template_part( 'content', 'features' );
                }
            else if ( in_category( 'people' ) ) {
                    get_template_part( 'content', 'people' );
                }

            else {
                    get_template_part( 'content', 'norm' );

                    }
            
            ?>
            
            <?php } //loop end ?>
            
      <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

        
            
            <?php } else { // no posts found
    
                    echo '<h2>No ' . $type . ' found</h2>';
                    
            } ?>
            
            
                    
    
<?php //wp_reset_postdata(); ?>

            
        </div>
    </div>
</div> <!--row-->

</div> <!-- col RIGHT -->
    
    
    
    <div id="page-sidebar" class="col-xs-12 col-sm-3 col-sm-pull-9"> <!-- sidebar col left-->
        
    <div class="hidden-xs">
        <?php get_template_part( 'section', 'logo' ); ?>
    </div>
        <?php get_template_part( 'sidebar', 'main' ); ?>
            
    </div> <!-- Sidebar col LEFT -->


   


  



</div> <!-- main -->

</div><!--page row-->


<?php get_footer() ?>
