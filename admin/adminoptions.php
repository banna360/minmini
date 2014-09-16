<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

add_action( 'tf_create_options', 'my_theme_create_options' );
function my_theme_create_options() {
    // Initialize Titan with my special unique namespace
    $titan = TitanFramework::getInstance( '_s' );
 
    // Create my admin panel
    $panel = $titan->createAdminPanel( array(
        'name' => 'Theme Options',
    ) );
    
    $generalTab = $panel->createTab( array(
        'name' => 'General',
       ) );
        
    // Create options for my admin panel

    $generalTab->createOption( array(
        'name' => 'Select Sidebar Location',
        'id' => 'sidebar_layout',
        'type' => 'radio-image',
        'options' => array(
            'content-sidebar' => get_template_directory_uri() . '/images/radio-sidebar-right.png',
            'sidebar-content' => get_template_directory_uri() . '/images/radio-sidebar-left.png',
        ),
        'default' => 'content-sidebar',
    ) );
    
    
    $generalTab->createOption( array(
        'name' => 'Site Layout',
        'id' => 'site_layout',
        'type' => 'select',
        'options' => array(
            'full-width' => 'Fluid 100% with of screen',
            'page-width' => 'Boxed (Fixed Page Width Look',
        ),
        'desc' => 'Choose Your Site Layout',
        'default' => 'page-width',
    ) );

    
    $generalTab->createOption( array(
    'name' => 'Analytics Tracking Code',
    'id' => 'msbt_footer_analytics',
    'type' => 'textarea',
    'desc' => 'Your analytics code will be placed in the footer to track visits and not slow the site down'
) );
    
    $generalTab->createOption( array(
        'type' => 'save'
    ) );
/*
 * -----------------------------------header tab------------------------
 */
    $headerTab = $panel->createTab( array(
        'name' => 'Header',
    ) );
    $headerTab->createOption( array(
    'name' => 'Header Logo To Use In Header',
    'id' => 'header_logo_file',
    'type' => 'upload',
    'desc' => 'Logo to be displayed in the header of your site',
    ) );
    
    $headerTab->createOption( array(
    'name' => 'Show Title and Description In Header',
    'id' => 'show_title_description',
    'options' => array(
        '1' => 'Show Title In Header',
        '2' => 'Hide Title In Header',
        ),
    'type' => 'radio',
    'desc' => 'Select one',
    'default' => '1',
    ) );
    $headerTab->createOption( array(
        'type' => 'save'
    ) );
    $headerTab->createOption( array(
    'name' => 'Body Background Color',
    'id' => 'mstb_body_background_color',
    'type' => 'color',
    //'css' => 'body { background-color: value; }'
) );
    
    $titan->createCSS( "body {background-color: \$mstb_body_background_color !important;}");
    
/*
 * -----------------------------------footer tab------------------------
 */
    $footerpanel = $panel->createTab( array(
        'name' => 'Footer',
    ) );    
    $footerpanel->createOption( array(
        'name' => 'Paste In Copyright Information',
        'id' => 'my_theme_copyright_text',
        'type' => 'text',
        'default' => '@Copryright',
        'desc' => 'Displays Copyright At Bottom Of The Website'
        ) );
    $footerpanel->createOption( array(
        'type' => 'save'
    ) );    
    
}