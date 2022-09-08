<?php

function fiocruz_customizer( $wp_customize ){
            
    // 1 Hero
    $wp_customize->add_section(
        'sec_hero',
        array(
            'title' => __( 'Hero Section', 'wp-fiocruz' )
        )
    );

            // Title
            $wp_customize->add_setting(
                'set_hero_title',
                array(
                    'type' => 'theme_mod',
                    'default' => __( 'Please, add some title', 'wp-fiocruz' ),
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_hero_title',
                array(
                    'label' => __( 'Hero Title', 'wp-fiocruz' ),
                    'description' => __( 'Please, type your here title here', 'wp-fiocruz' ),
                    'section' => 'sec_hero',
                    'type' => 'text'
                )
            );  

            // Button Text
            $wp_customize->add_setting(
                'set_hero_button_text',
                array(
                    'type' => 'theme_mod',
                    'default' => __( 'Learn More', 'wp-fiocruz' ),
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_hero_button_text',
                array(
                    'label' => __( 'Hero button text', 'wp-fiocruz' ),
                    'description' => __( 'Please, type your hero button text here', 'wp-fiocruz' ),
                    'section' => 'sec_hero',
                    'type' => 'text'
                )
            );

            // Button link
          $wp_customize->add_setting(
              'set_hero_button_link',
              array(
                  'type' => 'theme_mod',
                  'default' => '#',
                  'sanitize_callback' => 'esc_url_raw'
              )
          );

          $wp_customize->add_control(
              'set_hero_button_link',
              array(
                  'label' => __( 'Hero button link', 'wp-fiocruz' ),
                  'description' => __( 'Please, type your hero button link here', 'wp-fiocruz' ),
                  'section' => 'sec_hero',
                  'type' => 'url'
              )
          ); 

          // Hero Background
        $wp_customize->add_setting(
            'set_hero_background',
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'absint'
            )
        );

        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize,
            'set_hero_background',
            array(
                'label' => __( 'Hero Image', 'wp-fiocruz' ),
                'section'   => 'sec_hero',
                'mime_type' => 'image'
            )));

    // 3. Blog
    $wp_customize->add_section( 
        'sec_blog', 
        array(
            'title' => __( 'Blog Section', 'wp-fiocruz' )
    ) );

        // Posts per page
        $wp_customize->add_setting( 
            'set_per_page', 
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'absint'
        ) );

        $wp_customize->add_control( 
            'set_per_page', 
            array(
                'label' => __( 'Posts per page', 'wp-fiocruz' ),
                'description' => __( 'How many items to display in the post list?', 'wp-fiocruz' ),			
                'section' => 'sec_blog',
                'type' => 'number'
        ) );

        // Post categories to include
        $wp_customize->add_setting( 
            'set_category_include', 
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 
            'set_category_include', 
            array(
                'label' => __( 'Post categories to include', 'wp-fiocruz' ),
                'description' => __( 'Comma separated values or single category ID', 'wp-fiocruz' ),
                'section' => 'sec_blog',
                'type' => 'text'
        ) );	

        // Post categories to exclude
        $wp_customize->add_setting( 
            'set_category_exclude', 
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 
            'set_category_exclude', 
            array(
                'label' => __( 'Post categories to exclude', 'wp-fiocruz' ),
                'description' => __( 'Comma separated values or single category ID', 'wp-fiocruz' ),			
                'section' => 'sec_blog',
                'type' => 'text'
        ) );            
}
add_action( 'customize_register', 'fiocruz_customizer' );