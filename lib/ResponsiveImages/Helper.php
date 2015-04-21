<?php

namespace ResponsiveImages;

use ResponsiveImages\Controller\Plugin\Parser as Parser;

class Helper {
	static public function createConfig($config){
        return Parser::createConfig($config);
    }

    static public function createConfigJson($config){
        return urlencode(Parser::createConfigJson($config));
    }

    static public function parseConfig($str){
        return Parser::parseConfig(urldecode($str));
    }
}