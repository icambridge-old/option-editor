<?php
/*
Plugin Name: Option Editor
Plugin URI: github.com/icambridge/option-editor
Description: Allows you to manaually edito internal WordPress options without access MySQL manually.
Author: Iain Cambridge
Author URI: http://backie.org
Version: 1.0
*/
define("OPT_DIR",dirname(__FILE__));

class OptionEditorPlugin {
	
	public function __construct(){
		
		add_action("admin_menu", array($this,"admin_menu"));
		
	}
	
	public function admin_menu(){
		
		add_plugins_page('Option Editor','Option Editor', 'manage_options','option-editor',array($this,"plugin_page"));
	
	}
	
	public function plugin_page(){
			
		$optionList = get_alloptions();	
		$pageFile = '/views/list.php';
		
		if ( $_SERVER['REQUEST_METHOD'] == "POST" ){
			
			if ( $_POST['step'] ==  "1" ){

				$optionValue = get_option($_POST['option_name']);
				$pageFile = '/views/edit.php';
							
			} else {
				if ( is_array($_POST['value']) ){
					$optionValue = array_combine($_POST['key'],$_POST['value']);
					var_dump($optionValue);
				} else {
					$optionValue = $_POST['value'];
				}
				var_dump($_POST['option_name']);
				if ( !update_option($_POST['option_name'],$optionValue) ){
					echo "fail";
				} else {
					echo "win";
				}
			
			}
			
		} 
		
		require_once OPT_DIR.$pageFile;
	}
	
}

$optionEditorPlugin = new OptionEditorPlugin();