<?php 

class Assets {

	function get_css_files()
	{
		return array(
			array('path' =>'assets/layout/css/bootstrap.min.css', 'media' => 'all'),
			array('path' =>'assets/layout/css/bootstrap-theme.min.css', 'media' => 'all'),
			array('path' =>'assets/stylesheets/login.css', 'media' => 'all'),
			array('path' =>'assets/stylesheets/layout.css', 'media' => 'all'),
		);
	}

	function get_js_files()
	{
		return array(
			array('path' =>'assets/javascripts/jquery.1.11.1.js'),
			array('path' =>'assets/layout/js/bootstrap.min.js'),
			array('path' =>'assets/javascripts/overall.js'),
		);
	}

}