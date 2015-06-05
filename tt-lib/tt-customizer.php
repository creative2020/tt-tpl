<?php

////////////////////////////////////////////////////// TT Theme Customizer

add_action( 'customize_register' , 'tt_theme_options' );

function tt_theme_options( $wp_customize ) {
	// Sections, settings and controls will be added here

    ///////////////////////
    // define sections
    ///////////////////////
    $theme = 'tt_theme';
    $capability = 'edit_theme_options';
        
    $tt_customizer = array(
        // name, priority, capability, description
        'header'	=>	array( 
        				'name'	=>	'Header Settings', 
        				'priority'	=>	50,
        				'capability'	=>	$capability, 
        				'desc'	=>	'Change header options',
        				),
        'colors'	=>	array( 
        				'name'	=>	'Color Settings', 
        				'priority'	=>	70,
        				'capability'	=>	$capability, 
        				'desc'	=>	'Change color options',
        				),
        'footer'	=>	array( 
        				'name'	=>	'Footer Settings', 
        				'priority'	=>	100,
        				'capability'	=>	$capability, 
        				'desc'	=>	'Change footer options',
        				),
        );

    ///////////////////////
    // add section
    ///////////////////////
    $wp_customize->add_section( 'tt_theme_header_options',
        array(
            'title'       => __( $tt_customizer['header']['name'], $theme ),
            'priority'    => $tt_customizer['header']['priority'],
            'capability'  => $tt_customizer['header']['capability'],
            'description' => __($tt_customizer['header']['desc'], $theme), 
        ) 
    );
            ///////////////////////
            // add setting
            ///////////////////////

                $wp_customize->add_setting( 'header_bg_color',
                    array(
                        'default' => '#ffffff'
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
            'title'       => __( $tt_customizer['colors']['name'], $theme ),
            'priority'    => $tt_customizer['colors']['priority'],
            'capability'  => $tt_customizer['colors']['capability'],
            'description' => __($tt_customizer['colors']['desc'], $theme), 
        ) 
    );
            ///////////////////////
            // add setting
            ///////////////////////

                $wp_customize->add_setting( 'body_bg_color',
                    array(
                        'default' => 'white'
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
    // add section
    ///////////////////////
    $tt_customizer_section_name = 'tt_theme_footer_options';
    
    $wp_customize->add_section( $tt_customizer_section_name,
        array(
            'title'       => __( $tt_customizer['footer']['name'], $theme ),
            'priority'    => $tt_customizer['footer']['priority'],
            'capability'  => $tt_customizer['footer']['capability'],
            'description' => __($tt_customizer['footer']['desc'], $theme), 
        ) 
    );
            ///////////////////////
            // add setting
            ///////////////////////
				$setting_name = 'footer_bg_color';
                $wp_customize->add_setting( $setting_name,
                    array(
                        'default' => 'blue'
                    ));
                    // setting -> control
                    $wp_customize->add_control( new WP_Customize_Color_Control( 
                        $wp_customize, 
                        'body_bg_color_control',
                        array(
                            'label'    => __( 'Footer Background Color', $theme ), 
                            'section'  => $tt_customizer_section_name,
                            'settings' => $setting_name,
                            'priority' => 10,
                        )));

            ///////////////////////
            // add setting
            ///////////////////////
            	$setting_name = 'footer_color_name';
                $wp_customize->add_setting( $setting_name,
                    array(
                        'default' => 'blue'
                    ));  
                    // setting -> control
                    $wp_customize->add_control( new WP_Customize_Control(
                        $wp_customize,
                        'color_name',
                        array(
                            'label'          => __( 'Color Name', $theme ),
                            'section'        => $tt_customizer_section_name,
                            'settings'       => $setting_name,
                            'type'           => 'text',

                        )));


///////////////////////
// dynamic       css //
///////////////////////

}

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
