<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_titan_option($id){
        $titan = TitanFramework::getInstance( '_s' );
        return $titan->getOption( $id );      

}

function get_upload_file_src ($id) {
          
        $imageID = get_titan_option($id);
        // The value may be a URL to the image (for the default parameter)
        // or an attachment ID to the selected image.
        $imageSrc = $imageID; // For the default value
        if ( is_numeric( $imageID ) ) {
            $imageAttachment = wp_get_attachment_image_src( $imageID, 'full' );
            $imageSrc = $imageAttachment[0];
        }
    return $imageSrc;
    
}