<?php

////////////////////////////////////////////////////// TT Theme Customizer

add_action( 'customize_register' , 'tt_theme_options' );

function tt_theme_options( $wp_customize ) {
	// Sections, settings and controls will be added here
}
    ///////////////////////
    // define sections
    ///////////////////////
    $theme = 'tt_theme';
    $capability = 'edit_theme_options';
    $tt_customizer = array(
        // name, priority, capability, description
        array( 'Header Settings', 100, $capability, 'Change header options', ),
        array( 'Color Settings', 90, $capability, 'Change color options', ),
        array( 'Footer Settings', 80, $capability, 'Change color options', ),
        );

    ///////////////////////
    // add section
    ///////////////////////
    $wp_customize->add_section( 'tt_theme_header_options',
        array(
            'title'       => __( $tt_customizer[0][0], $theme ),
            'priority'    => $tt_customizer[0][1],
            'capability'  => $tt_customizer[0][2],
            'description' => __($tt_customizer[0][3], $theme), 
        ) 
    );
            ///////////////////////
            // add setting
            ///////////////////////

                $wp_customize->add_setting( 'header_bg_color',
                    array(
                        'default' => '#000000'
                    ));
                    // setting -> control
                    $wp_customize->add_control( new WP_Customize_Color_Control( 
                        $wp_customize, 
                        'header_bg_color_control',
                        array(
                            'label'    => __( 'Header Background Color', $theme ), 
                            'section'  => 'tt_theme_header_options',
                            'settings' => 'header_bg_color',
                            'priority' => 10,
                        )));

            ///////////////////////
            // add setting
            ///////////////////////
                $wp_customize->add_setting( 'header_phone',
                    array(
                        'default' => '123-456-7890'
                    ));  
                    // setting -> control
                    $wp_customize->add_control( new WP_Customize_Control(
                        $wp_customize,
                        'header_phone',
                        array(
                            'label'          => __( 'Phone Number', $theme ),
                            'section'        => 'tt_theme_header_options',
                            'settings'       => 'header_phone',
                            'type'           => 'text',

                        )));

    ///////////////////////
    // add section
    ///////////////////////
    $wp_customize->add_section( 'tt_theme_color_options',
        array(
            'title'       => __( $tt_customizer[1][0], $theme ),
            'priority'    => $tt_customizer[1][1],
            'capability'  => $tt_customizer[1][2],
            'description' => __($tt_customizer[1][3], $theme), 
        ) 
    );
            ///////////////////////
            // add setting
            ///////////////////////

                $wp_customize->add_setting( 'body_bg_color',
                    array(
                        'default' => '#000000'
                    ));
                    // setting -> control
                    $wp_customize->add_control( new WP_Customize_Color_Control( 
                        $wp_customize, 
                        'body_bg_color_control',
                        array(
                            'label'    => __( 'Body Background Color', $theme ), 
                            'section'  => 'tt_theme_color_options',
                            'settings' => 'body_bg_color',
                            'priority' => 10,
                        )));

            ///////////////////////
            // add setting
            ///////////////////////
                $wp_customize->add_setting( 'color_name',
                    array(
                        'default' => 'blue'
                    ));  
                    // setting -> control
                    $wp_customize->add_control( new WP_Customize_Control(
                        $wp_customize,
                        'color_name',
                        array(
                            'label'          => __( 'Color Name', $theme ),
                            'section'        => 'tt_theme_color_options',
                            'settings'       => 'color_name',
                            'type'           => 'text',

                        )));


///////////////////////
// dynamic       css //
///////////////////////

add_action( 'wp_head' , 'tt_dynamic_css' );

function tt_dynamic_css() {
	?>
	<style type='text/css'>
	body {
		background-color:<?php echo get_theme_mod('body_bg_color') ?> ;
	}
    #top {
		background-color:<?php echo get_theme_mod('header_bg_color') ?> ;
	}    
	</style>
	<?php
}
// end css
