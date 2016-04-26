<?php
require_once 'simple_seo/xml_sitemap.class.php';

$xml = new xml_sitemap;

$domain = 'http://example.com';

/** add_sitemap($url, $lastmod = null, $changefreq = 'weekly', $priority = '0.6') **/



$xml->add_sitemap($domain.'/posts/postid1', date('c', time()) );
$xml->add_sitemap($domain.'/posts/postid2', 'date 2');
$xml->add_sitemap($domain.'/posts/postid3', 'date 3');
$xml->add_sitemap($domain.'/posts/postid4', 'date 4');

##################################
// $exmpledb = new mysqli(.. Example :D ..);
// $query = $exmpledb->query("SELECT * ....");
// while($row = $query->fecth_assoc()) {
// $xml->add_sitemap($domain.'/posts/'.$row['id'], date('c', $row['time']));
// }

##### Example xml sitemap categories Or tags etc...
// $exmpledb = new mysqli(.. Example :D ..);

// $query = $exmpledb->query("SELECT * ....");

// while($row = $query->fecth_assoc()) {
// $xml->add_sitemap($domain.'/category/'.$row['id'], $row['date']);
// }

#### RewriteRule Your Files In .htaccess Example
// Rewrite posts_sitemap.php to posts_sitemap.xml
#
#  <IfModule mod_rewrite.c>
#   RewriteEngine on
#   RewriteRule posts_sitemap.xml$  posts_sitemap.php [L]
#  </IfModule>
###########################


$xml->header();
echo $xml->sitemap();