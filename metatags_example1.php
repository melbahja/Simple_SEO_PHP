<?php

// Meta Tags Generator Example 1

require_once 'simple_seo/meta_tag.class.php';

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
$test->add_meta('http',  array('Content-Type' => 'text/html; charset=UTF-8'));

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

echo "Clic Ctrl+U or View Page Source";