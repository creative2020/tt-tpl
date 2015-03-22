<!--Special content item-->

<?php
    $tt_pre_title = '';
    $tt_icon_name = get_post_meta( $post_id, 'tt_icon' );
        if ( $tt_icon_name[0] != null ) {
            $tt_icon = $tt_icon_name[0];
        } else {
            $tt_icon = 'rocket';
        }
    $icon_size = '6.0em';
    $font_color = '#F6B02E';
    $bg_color = '#e3e3e2';
    $more_btn_text = 'Explore more features';
    $more_btn_link = '/our-features';
    $image = '<i class="fa fa-'.$tt_icon.'" style="color:'.$font_color.';font-size:4.0em;"></i>';
    $size = 'thumbnail';
    $post_thumbnail_id = get_post_thumbnail_id( $post_id );
    $image_info = wp_get_attachment_image_src( $post_thumbnail_id, $size, $icon );
?> 

<!--Single-->
    <?php if ( is_single() ) { ?> 
        <div id="page-header" class="row" style="background:<?php echo $bg_color; ?>">
            <div class="col-sm-8"> 
                <h1 style="color:<?php echo $font_color; ?>;"><?php echo $tt_pre_title; ?> <?php echo $post->post_title; ?></h1>
            </div>
            <div class="col-sm-4"> 
                <div class="col-sm-12 tt-feature-image"><?php echo $image; ?></div>
            </div>
        </div>

<div class="row"> <!--row-->
    <div class="section clearfix">
        
        <div class="col-md-10 col-md-offset-1">
            
            <?php echo do_shortcode('[tt_rule]'); ?>
            
               <div class=""><p><?php echo get_the_category_list(); ?></p></div>
            
            <?php echo do_shortcode('[tt_rule]'); ?>
            
                <?php the_content(); ?> 
            
            <?php echo do_shortcode('[tt_rule]'); ?>
            
            <div class="col-sm-12">
                <a class="btn btn-primary btn-md pull-right" href="<?php echo $more_btn_link; ?>"><i class="fa fa-arrow-circle-right"></i> <?php echo $more_btn_text; ?></a>
            </div>
            
        </div>
    </div>
</div> <!--row-->

        
    </div>

        <?php } else { ?>
            
<!--Single-->            

            
<!--post-->
<a href="<?php echo get_the_permalink() ?>">
                    
    <div class="row tt-search excerpt-<?php echo $cat_name ?>" style="background:<?php echo $bg_color; ?>;">
        <div class="col-sm-2">
            <?php if ( has_post_thumbnail() ) { ?>
            
                <img src="<?php echo $image_info[0]; ?>" class="img-responsive">
            
            <?php } else { ?>
            
                <i class="fa fa-<?php echo $tt_icon; ?>" style="color:<?php echo $font_color; ?>;font-size:<?php echo $icon_size; ?>;"></i>
            
            
            <?php } ?>
        </div>

        <div class="col-sm-10">
            <h2><?php echo $tt_pre_title; ?> <?php the_title(); ?></h2>
            <div class="clearfix"><p><?php echo get_the_category_list(); ?></p></div>
            
                <p><?php the_excerpt(); ?></p>
            
        </div>
        <div class="col-sm-12">
                <a class="btn btn-primary btn-md pull-right" href="<?php echo $more_btn_link; ?>"><i class="fa fa-arrow-circle-right"></i> <?php echo $more_btn_text; ?></a>
            </div>
    </div>
</a>

<?php } ?> <!--post-->