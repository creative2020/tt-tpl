<?php get_header(); ?>

<?php
    $category = get_the_category();
    $cat_name = $category[0]->category_nicename;
?>

<div id="page" class="row">
    <div id="page-sidebar" class="col-sm-3"> <!-- sidebar col left-->
        
        <?php get_template_part( 'section', 'logo' ); ?>
        <?php get_template_part( 'sidebar', 'main' ); ?>
            
</div> <!-- Sidebar col LEFT -->

<div class="col-sm-9" style=""> <!-- RIGHT -->
        

<?php
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
    


</div> <!-- RIGHT -->

  
</div> <!-- main -->

<?php get_footer() ?>