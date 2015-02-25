<?php

class MySmarty extends Smarty {
	var $compile_check		=  true;
	var $caching				=  0;
	var $plugins_dir			=  array('smarty_plugins');
	var $compiler_file		= 'class.Smarty_Compiler.php';
	
	function fetch($resource_name, $cache_id = null, $compile_id = null, $display = false) {
		$urls = new FriendlyHttpRequestParameter();
		$this->assign("urls",$urls);
		/*
		$this->assign_by_ref("conf",CFGHandler::singleton()->conf);
		
		if (isset(CFGHandler::singleton()->conf["trans"])) {
			$this->assign_by_ref("trans",CFGHandler::singleton()->conf["trans"]);
		}
		
		if (isset($_SESSION[APP]["lang"])) {
			$this->assign_by_ref("curr_lang",$_SESSION[APP]["lang"]);
		}
		else {
			$this->assign("curr_lang","");
		}
		*/
		return parent::fetch($resource_name, $cache_id, $compile_id, $display);
	}
}

class ForcedSmarty extends MySmarty {
	var $compile_check		= true;
	var $caching				= 0;
}

?>