<?php
/**
 *	properties
 *	
 *	@percent
 *	@minWidth
 *	@maxWidth
 *	@width
 */
namespace ResponsiveImages;

use ResponsiveImages\Polyfill\Config as PolyfillConfig;

class Polyfill {
	private $items;

	public function setItems($items){
        $this->items = $items;
        return $this;
    }

    public function getItems(){
        return $this->items;
    } 

    public function parseItems($items){
    	$var = array();

		foreach ($items as $item) {
			$config = new PolyfillConfig();
			$config->insertItem($item);
			$var[] = $config;
		}

		$this->setItems($var);
    }

    public function toJSON(){
    	$items = $this->getItems();
    	$var = array();

    	foreach ($items as $item) {
    		$var[] = $item->toArray();
    	}

    	return \Zend_Json::encode($var);
    }

	static public function getByConfig($items){
		$polyfill = new self();
		$polyfill->parseItems($items);

		return $polyfill;
	}

	static public function getByString($str){
		$polyfill = new self();
		$data = \Zend_Json::decode($str);
		$polyfill->parseItems($data);

		return $polyfill;
	}
}