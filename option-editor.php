<?php
/*
Plugin Name: Option Editor
Plugin URI: http://github.com/icambridge/option-editor
Description: Allows you to manaually edito internal WordPress options without access MySQL manually.
Author: Iain Cambridge
Author URI: http://backie.org
Version: 1.0
*/
define("OPT_DIR",dirname(__FILE__));

	/**
	 * Option editor plugin for WordPress, allows
	 * to manually edit internal options of WordPress
	 * useful if you're developing a new upgrade system.
	 * 
	 * @author Iain Cambridge
	 * @license New BSD License
	 * @copyright All rights reserved Iain Cambridge 2011 
	 */

class OptionEditorPlugin {
	
	public function __construct(){
		
		add_action("admin_menu", array($this,"admin_menu"));
		add_action("admin_init", array($this,"admin_init"));
		
	}
	
	public function admin_init(){
		
		wp_enqueue_script("option-editor",plugins_url('/js/option-editor.js',__FILE__));
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
				} else {
					
					switch($_POST['type']){
						case 'boolean':
							$optionValue = (bool)$_POST['value'];
						case 'integer':
							$optionValue = (int)$_POST['value'];
						default:
							$optionValue = $_POST['value'];
					}
				}
				
				update_option($_POST['option_name'],$optionValue);
				$message = "Option updated!";
			
			}
		} 
		ksort($optionList);
		
		require_once OPT_DIR.$pageFile;
	}
	
}

$optionEditorPlugin = new OptionEditorPlugin();