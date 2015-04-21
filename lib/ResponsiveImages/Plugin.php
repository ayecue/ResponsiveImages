<?php

namespace ResponsiveImages;

use Pimcore\Tool as PimcoreTool;
use ResponsiveImages\Config as Config;
use ResponsiveImages\Controller\Plugin\Parser as Parser;

class Plugin extends Config {
    const PLUGIN_STACK_INDEX = 1000;

    public static function install(){
		parent::install();
	}
	
	public static function uninstall(){
		// nothing to do
	}

	public static function isInstalled(){
		return parent::isInstalled();
	}

	public function preDispatch() {
		$configuration = $this->getConfiguration();

	 	// Pimcore CDN is not enabled by default in Pimcore.php                  
		if(!isset($_SERVER['HTTP_SECURE']) && PimcoreTool::isFrontend() && ! PimcoreTool::isFrontentRequestByAdmin()){
			$parser = new Parser();

			$parser->setScriptSource($configuration->responsiveImageScript);
			$parser->setAttrSelector($configuration->responsiveImageAttrSelector);
			$parser->setParseAttr($configuration->responsiveImageParseAttr);

            // 805 means trigger this plugin later than other plugins (with lower numbers)
			$instance = \Zend_Controller_Front::getInstance();

			$instance->registerPlugin($parser,self::PLUGIN_STACK_INDEX);
		}
	}
}

