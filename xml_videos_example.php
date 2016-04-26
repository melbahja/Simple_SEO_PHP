<?php
require_once 'simple_seo/xml_sitemap.class.php';

$xml = new xml_sitemap;

$domain = 'http://example.com';

/**
 *  add_video(video url, viodeoembedurl, thumbnail, title, description, tags, category, $changefreq = 'monthly', $priority = '0.7')
 * 
 * 
 * 
 * xml_sitemap and mysql
 * 
 * $exmpledb = new mysqli(.. Example :D ..);
 * 
 * $query = $exmpledb->query("SELECT * ....");
 * 
 * while($row = $query->fecth_assoc()) {
 * $xml->add_video($domain.'/video/'.$row['id'], $domain.'/embed/'.$row['id'], $row['thumbnail'], $row['title'], $row['description'], $row['tags'], $row['category']);
 * }
 * 
 *  
 **/

$xml->add_video($domain.'video_url1', $domain.'/embed/url1', $domain. '/thumbnail.png', 'title', 'description', 'tags, haha','category');
$xml->add_video($domain.'video_url2', $domain.'/embed/url2', $domain. '/thumbnail.png', 'title', 'description', 'tags, haha','category');
$xml->add_video($domain.'video_url3', $domain.'/embed/url3', $domain. '/thumbnail.png', 'title', 'description', 'tags, haha','category');
$xml->add_video($domain.'video_url4', $domain.'/embed/url4', $domain. '/thumbnail.png', 'title', 'description', 'tags, haha','category');
$xml->add_video($domain.'video_url5', $domain.'/embed/url5', $domain. '/thumbnail.png', 'title', 'description', 'tags, haha','category');


$xml->header();
echo $xml->sitemap_video();