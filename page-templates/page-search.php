<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>
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
<div id="page" class="row">
    <div class="visible-xs-block">
        <?php get_template_part( 'section', 'logo' ); ?>
    </div>
    
    <div class="col-xs-12 col-sm-9 col-sm-push-3"> <!-- col RIGHT -->
        <div id="page-header" class="row">
            <div class="col-xs-12 col-sm-8"> 
                <h1>Search</h1>
            </div>
            <div class="col-xs-12 col-sm-4"> 
                <div class="col-sm-12 tt-feature-image"><img src="<?php echo $attachment_url; ?>" alt="Construction Software" class="img-responsive"/></div>
            </div>
        </div>
    
      
<div class="row"> <!--row-->
    <div class="section clearfix">
        
        <div class="col-md-10 col-md-offset-1">
            
            <?php get_search_form(); ?>
            
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
