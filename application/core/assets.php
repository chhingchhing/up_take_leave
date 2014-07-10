<?php 

class Assets {

	function get_css_files()
	{
		return array(
			array('path' =>'assets/layout/css/bootstrap.min.css', 'media' => 'all'),
			array('path' =>'assets/layout/css/bootstrap-theme.min.css', 'media' => 'all'),
		);
	}

	function get_js_files()
	{
		return array(
			array('path' =>'assets/javascripts/jquery.1.11.1.js'),
			array('path' =>'assets/layout/bootstrap.min.js'),
		);
	}

}