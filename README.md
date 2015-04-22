# ResponsiveImages

> Compatible with Pimcore 3.x.x

## Description

This plugin add his own implementation of responsive images. (This feature wasn't there in Pimcore < 2.2) Before it's useful you need to install it and configurate these website properties:

* responsiveImageScript - The Javascript library you want to use to enable responsive images. From default it's mobify.
* responsiveImageAttrSelector - To this field you have to add a string which allows the plugin to recognize the image which should be responsive. You could for example use the attribute "data-imgresponsive". Every image with this attribute will get converted to a responsive image.
* responsiveImageParseAttr - To this field you have to a string. Basicly you can use the same string you used in the "responsiveImageAttrSelector" website property. This field is used to get the data from the right attribute field.

Here an example how to use the responsive image plugin in your script:
```
//Json of the responsive images config you need for the plugin to work
$responsiveImageConfigJson = ResponsiveImages_Helper::createConfigJson(array(
	array(
		"percent" => 0.5,
		"minWidth" => "0px",
		"maxWidth" => "320px"
	),
	array(
		"percent" => 0.7,
		"minWidth" => "321px",
		"maxWidth" => "640px"
	),
	array(
		"percent" => 1,
		"minWidth" => "641px"
	)
));
//Attribute field name
$responsiveImageParseAttr = "data-imgresponsive";

//Attribute array
$attributes = array();

//Apply config to attribute array
$attributes[$responsiveImageParseAttr] = $responsiveImageConfigJson;

//Output image
echo $this->image("myImage",array(
	"attributes" => $attributes
));
```

## How to install

* Create folder and drop files in "/plugins/ResponsiveImages"
* Go to extension menu and click enable and install