# Simple_SEO_PHP
Meta Tags &amp; Social Mata and XML Sitemaps PHP Generator for Search Engines

## Meta Tags Generator PHP
###Examples
```php

require_once 'meta_tag.class.php';

$test = New meta_tag;

// Social Meta config
/**
 * Facebook
 * This setting meta tags  Facebook
 * true : generate Facebook Meta tags, and 
 * False : Not generate Meta tags Facebook
 * fb:app_id, fb:page_id: (optional)
 * fb:admins : author facebook id  (optional)
 * article:publisher : website page facebook Url  (optional)
 *article:author : author profile url (optional)
 * * *
 * twitter
 * This setting meta tags  twitter
 * true : generate twitter Meta tags, and 
 * False : Not generate Meta tags twitter
 * twitter:card : summary_large_image or summary  (required)
 * twitter:site : Website Twitter Username Example : @google  (required)
 * twitter:creator : author Twitter Username ex: @Mohamed_Elbahja (required)
 * * *
 * gplus (google plus)
 * This setting meta tags  gplus
 * true : generate gplus Meta tags, and 
 * False : Not generate Meta tags gplus
 * author : author google + profile Url   (optional)
 * publisher : Website page Url   (optional)
 */ 
$test->set_social([

	    'facebook' => [ 
	       true, 
          'fb:app_id'    => '', 
          'fb:admins'    => '', 
          'fb:page_id'   => '',
          'article:publisher' => '', 
          'article:author'    => ''
	    ], 
	    
		'twitter'  => [
			true,
			'twitter:card'    => 'hhh twitter',
			'twitter:site'    => 'jjj twitter',
			'twitter:creator' => 'jjj twitter',
			],
			
    'gplus' => [
       true,
      'author'    => '',
      'publisher' => '' 
    ]	
]); 

/***
* Add a Other meta tags
* example :
*
* $test->add_meta('facebook', array('og:title' => 'Content title here')); // Output : <meta property='og:title' content='Content title here' />
* $test->add_meta('twitter',  array('twitter:title' => 'Content title here')); //Output :  <meta name='twitter:title' content='Content title here ' />
* $test->add_meta('gplus',  array('name' => 'Content here')); // Output : <meta itemprop='name' content='Content here' />
* $test->add_meta('http',  array('Content-Type' => 'text/html; charset=UTF-8')); // Output : <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>
* $test->add_meta('default',  array('generator' => 'php Script')); // Output : <meta name='generator' content='php Script'/>
*/

/**
 * type : your page type 'website' or 'Article' , 'video'
 *****************
 * name : your website Name
 * description : page description
 * image : image src 
 * canonical : canonical url more at : https://support.google.com/webmasters/answer/139066
 * author : Author name
 ******************
 * robots 
 * noindex: prevents the page from being indexed
 * nofollow: prevents the Googlebot from following links from this page
 * nosnippet: prevents a snippet from being shown in the search results
 * noodp: prevents the alternative description from the ODP/DMOZ from being used
 * noarchive: prevents Google from showing the Cached link for a page.
 * unavailable_after:[date]: lets you specify the exact time and date you want to stop crawling and indexing of this page
 * noimageindex: lets you specify that you do not want your page to appear as the referring page for an image that appears in Google search results.
 * none: is equivalent to noindex, nofollow.
 *
 * More info : https://support.google.com/webmasters/answer/79812
 * 
 */ 
$test->meta_tags([
	'type' => 'website',
	'title' => ' Your Page Title',
	'name' => 'Your Website name',
	'description' => 'Your Page Description Here',
	'keywords' => 'keyw, red, s',
	'canonical' => 'http://example.com/....',
	'image' => 'http://example.com/image.png',
	'author' => 'Author Name',
	'robots' => 'index, follow, noodp',
]);

echo $test->get_meta();

```

###Emaple 2

```php

require_once 'meta_tag.class.php';
$test2 = New meta_tag;

$test2->set_social([
	    'facebook' => [ 
	       true, 
          'fb:app_id'    => '175467242654492', 
          'fb:admins'    => '100004496076071', 
          'article:publisher' => 'https://www.facebook.com/arateknet', 
          'article:author'    => 'https://www.facebook.com/elbahja.me'
	    ], 
		'twitter'  => [
			true,
			'twitter:card'    => 'summary_large_image',
			'twitter:site'    => '@Mohamed_Elbahja',
			'twitter:creator' => '@Aratek_net',
			],
    'gplus' => [false] // false Not Generate this 	
]); 
$test2->add_meta('http',  array('Content-Type' => 'text/html; charset=UTF-8'));
$test2->meta_tags([
	'type' => 'article',
	'title' => 'page Articel  Title',
	'name' => 'Website name',
	'description' => ' <script> no xss :)</script> Your Page Description Here',
	'keywords' => 'keyw, php, programming',
	'canonical' => 'http://example.com/blog/Simple_SEO_PHP.html',
	'image' => 'http://example.com/image.jpg',
	'author' => 'Mohamed Elbahja',
	'robots' => 'index, follow, noodp'
]);

echo $test2->get_meta();
```
#### Output
```html
<!-- Meta Tags Start -->
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>
<meta name="description" content=" &lt;script&gt; no xss :)&lt;/script&gt; Your Page Description Here" />
<meta name="keywords" content="keyw, php, programming" />
<meta name="image" content="http://example.com/image.jpg" />
<meta name="author" content="Mohamed Elbahja" />
<meta name="robots" content="index, follow, noodp" />
<!-- Faebook Meta Tags -->
<meta property="fb:app_id" content="175467242654492" />
<meta property="fb:admins" content="100004496076071" />
<meta property="article:publisher" content="https://www.facebook.com/arateknet" />
<meta property="article:author" content="https://www.facebook.com/elbahja.me" />
<meta property="og:type" content="article" />
<meta property="og:title" content="page Articel  Title" />
<meta property="og:site_name" content="Website name" />
<meta property="og:description" content=" &lt;script&gt; no xss :)&lt;/script&gt; Your Page Description Here" />
<meta property="og:url" content="http://example.com/blog/Simple_SEO_PHP.html" />
<meta property="og:image" content="http://example.com/image.jpg" />
<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@Mohamed_Elbahja" />
<meta name="twitter:creator" content="@Aratek_net" />
<meta name="twitter:title" content="page Articel  Title" />
<meta name="twitter:description" content=" &lt;script&gt; no xss :)&lt;/script&gt; Your Page Description Here" />
<meta name="twitter:url" content="http://example.com/blog/Simple_SEO_PHP.html" />
<meta name="twitter:image" content="http://example.com/image.jpg" />
<link href="http://example.com/blog/Simple_SEO_PHP.html" rel="canonical" />
```

## XML Generator

### Examples

```php
require_once 'xml_sitemap.class.php';

$xml = new xml_sitemap;

```

### Generate xml Sitemap Index

```php 

$domain = 'http://example.com';

$xml->add_index($domain . 'posts_sitemap.xml');
$xml->add_index($domain . 'cats_sitemap.xml');
$xml->add_index($domain . 'videos_sitemap.xml');

$xml->header();
echo $xml->sitemap_index();

```

### Example xml sitemap posts

```php 

$domain = 'http://example.com';

/** add_sitemap($url, $lastmod = null, $changefreq = 'weekly', $priority = '0.6') **/

$exmpledb = new mysqli(.. Example :D ..);

$query = $exmpledb->query("SELECT * ....");

while($row = $query->fecth_assoc()) {
$xml->add_sitemap($domain.'/posts/'.$row['id'], $row['date']);
}

$xml->header();
echo $xml->sitemap();
```

### Example xml sitemap categories

```php 
$domain = 'http://example.com';

/** add_sitemap($url, $lastmod = null, $changefreq = 'weekly', $priority = '0.6') **/

$exmpledb = new mysqli(.. Example :D ..);

$query = $exmpledb->query("SELECT * ....");

while($row = $query->fecth_assoc()) {
$xml->add_sitemap($domain.'/category/'.$row['id'], $row['date']);
}

$xml->header();
echo $xml->sitemap();
```

### Example xml sitemap videos

```php 
$domain = 'http://example.com';

/** add_video(video url, viodeoembedurl, thumbnail, title, description, tags, category, $changefreq = 'monthly', $priority = '0.7') **/

$exmpledb = new mysqli(.. Example :D ..);

$query = $exmpledb->query("SELECT * ....");

while($row = $query->fecth_assoc()) {
$xml->add_sitemap($domain.'/video/'.$row['id'], $domain.'/embed/'.$row['id'], $row['thumbnail'], $row['title'], $row['description'], $row['tags'], $row['category']);
}

$xml->header();
echo $xml->sitemap_video();
```

RewriteRule Your Files In .htaccess

####example 
```php
<IfModule mod_rewrite.c>
RewriteEngine on
RewriteRule posts_sitemap.xml$  posts_sitemap.php [L]
</IfModule>
```
#### Example 2
Rewrite http://example.com/test.php?sitemap=videos 
TO :  http://example.com/sitemap_videos.xml

```php
<IfModule mod_rewrite.c>
RewriteEngine on
RewriteRule sitemap_([0-9a-zA-Z]+)_.xml$  test.php?sitemap=$1 [L]
</IfModule>
```

Submit Your Sitemap Index to Search Engines
