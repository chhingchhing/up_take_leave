<?php 

class Remap {

	function _remap( $method )
    {
        /// $method contains the second segment of your URI
        switch( $method )           
        {
            case 'about-me':
                $this->about_me();
                break;

            case 'successful':
                $this->display_successful_message();
                break;

            default:
                $this->page_not_found();
                break;
        }
    }
    
}