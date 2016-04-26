<?php

require_once 'simple_seo/xml_sitemap.class.php';

$xml = new xml_sitemap;

$domain = 'http://example.com';

$xml->add_index($domain . '/posts_sitemap.xml');
$xml->add_index($domain . '/cats_sitemap.xml');
$xml->add_index($domain . '/videos_sitemap.xml');

###############
// example : 
// foreach ($variable as $value) {
//	$xml->add_index($domain . $value);
// }
##############


$xml->header();
echo $xml->sitemap_index();