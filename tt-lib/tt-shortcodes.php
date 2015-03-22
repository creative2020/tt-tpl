<?php
/*
Author: 2020 Creative
URL: htp://2020creative.com
*/
//////////////////////////////////////////////////////////////////////////////////////////////////////////////// 2020 Shortcodes


//////////////////////////////////////////////////////// TT Post Content

add_shortcode( 'post_info', 'post_info' );
function post_info ( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => '',
            'id' => '',
		), $atts )
	);
    
    $tt_post_content = get_post_field( 'post_content', $id );
    
// code
return $tt_post_content;    
}

////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// TT Button

// [hsr_btn size="lg" link="#" color="#003764" fcolor="#ffffff" float="none" target="" class=""]Button Name[/hsr_btn], homes_for_sale_btn

add_shortcode( 'tt_btn', 'tt_btn' );
function tt_btn($atts, $content = null) {
    extract(shortcode_atts(array(
        'size'   => '',
        'color'  => '#003764', //#003764
        'fcolor'  => '#ffffff', //#ffffff
        'link'    => '#',
        'float'    => 'none',
        'target'    => '_blank',
        'class' => '',
        'block' => 'n',
    ), $atts ) );
    
    $classes = 'btn btn-default ' . $class . ' btn-' . $size;
    
    if ($block == 'y') {
    	$classes .= ' btn-block';
    }

    return '<a type="button" class="' . $classes . '" href="' . $link . '" style="background:' . $color . ';color:'. $fcolor . ';float:' . $float . ';" target="' . $target . '">' . $content . '</a>';
}

//////////////////////////////////////////////////////// TT rule

add_shortcode( 'tt_rule', 'tt_rule' ); //line
function tt_rule($atts, $content = null) {
    extract(shortcode_atts(array(
        'size'   => '1px',
        'color'  => '#ccc',
        'classes'  => 'col-sm-12 rule',
    ), $atts ) );

    return '<div class="' . $classes . '" style="border-top:' . $size . ' solid ' . $color .';padding:1.0em 0;"></div>';
}

////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// TT Post Feed

add_shortcode( 'tt_posts', 'tt_posts' ); // echo do_shortcode('[tt_posts limit="-1" cat_name="home"]');
function tt_posts ( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => 'post',
            'cat' => '-1',
            'cat_name' => '',
            'limit' => '10',
            'type' => 'post',
		), $atts )
	);
    
/////////////////////////////////////// Variables
$user_ID = get_current_user_id();
$user_data = get_user_meta( $user_ID );
$user_photo_id = $user_data[photo][0];
$user_photo_url = wp_get_attachment_url( $user_photo_id );
$user_photo_img = '<img src="' . $user_photo_url . '">';

/////////////////////////////////////// All Query    
if ($name == 'post') {
	// The Query
$args = array(
	'post_type' => $type,
	'post_status' => 'publish',
	'order' => 'ASC',
	'posts_per_page' => $limit,
    'cat' => $cat,
    //'category_name' => $cat_name,
);
$the_query = new WP_Query( $args );
} else { 
	//nothing
	}
    
global $post;

// pre loop
//$output = '<ul>';    

// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		// pull meta for each post
		$post_id = get_the_ID();
		$permalink = get_permalink( $id );
        $post = get_post();
        //$image = the_post_thumbnail( 'thumbnail' );
        $size = '250,125';
        $image = get_the_post_thumbnail( $post_id, $size, $attr );
        if (empty( $image )) {
            $image = '<img src="/wp-content/themes/math/images/img-fpo.png">';
        }
         
		
//HTML
        
    $output .= '<a href="'.$permalink.'"><div class="list-wrap"><div class="list-img col-xs-12 col-sm-4">';  
    $output .= $image .
                '</div>'.
                '<div class="row col-xs-12 col-sm-8">'. 
                    '<h2>'. $post->post_title .'</h2>'.
                    '<p>'. $post->excerpt .'</p>'.
                '</div></div>'.
                '</a>'.
                '<div class="clearfix"></div>';


	}
} else {
	// no posts found
	echo '<h2>No ' . $type . ' found</h2>';
}
    // after loop
    //$output .= '</ul>';
    
/* Restore original Post Data */
wp_reset_postdata();
return $output;
}

////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// html variable conundrum

add_shortcode( 'tt_hvc', 'tt_hvc' );
function tt_hvc ( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => 'normal',
            'id' => '0',
		), $atts )
	);
    
    if ( $name == 'normal' ) {
        $normal_title = 'My Normal Title';
        $output .= '<h1>Normal: '.$normal_title.'</h1>';
    }
    if ( $name == 'test_method_1' ) {
        //contents of file 'content-method-1.php' with vars
        // get_template_part('content', 'method-1');
        // I can call this in a regular template page which is built in Wordpress function
        $id = '8'; //var does not carry through
        get_template_part('content', 'method-1');
    }
    if ( $name == 'test_method_2' ) {
        //contents of file 'content-method-1.php' with vars
        //$output .= <<<EOD
            //include_once(get_template_directory().'/content-method-1.php');
            //EOD;
        //$output .= ''; //?
    }
    if ( $name == 'test_method_3' ) { // I think I just figured this fucker out
        // http://stackoverflow.com/questions/11230280/how-to-assign-the-contents-of-a-file-to-a-variable-in-php
        $id = '8'; //var DOES carry through!!
        ob_start();                                                     // start capturing output
            include(get_template_directory().'/content-method-1.php');      // execute the file
            $output = ob_get_contents();                                   // get the contents from the buffer
        ob_end_clean(); 
    }
// code
return $output;    
}

////////////////////////////////////////////////////////