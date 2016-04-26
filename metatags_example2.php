<?php
require_once 'simple_seo/meta_tag.class.php';
$test2 = new meta_tag;

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

echo "Clic Ctrl+U or View Page Source";