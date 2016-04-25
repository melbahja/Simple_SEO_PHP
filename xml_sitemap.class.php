class xml_sitemap
{
	public $encoding   = 'UTF-8';
	protected $indexs   = array();
	protected $sitemaps = array();
	protected $videos   = array();
    
    /**
     * header Content type
     */ 
	public function header() {
		header('Content-Type: application/xml');
        header('Connection: Close');
	} 

    /**
     * Sitemap Index generator
     * @return Str
     */  
	public function sitemap_index() {
		$str = '<?xml version="1.0" encoding="'.$this->encoding.'"?>
<sitemapindex xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/siteindex.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
		foreach ($this->indexs as $value) {
			$str .= '<sitemap><loc>'.$value.'</loc></sitemap>';
		}
		return $str . '</sitemapindex>';
	}
    
    /**
     * Add Index
     * @param str $liunk : sitemap urls
     */ 
    public function add_index($link) {
    		$this->indexs[] = $link;
    }

    /**
     * Sitemap Generator
     * @return Str
     */ 
	public function sitemap() {
		$str = '<?xml version="1.0" encoding="'.$this->encoding.'"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
	      foreach ($this->sitemaps as $key => $value) {
			$str .= '<url><loc>' . $key . '</loc>';
			$str .= '<changefreq>'.$value[0].'</changefreq>';
			$str .= '<priority>'.$value[1].'</priority>';
			if ($value[2] !== null) $str .= '<lastmod>'.$value[2].'</lastmod>';
			$str .= '</url>';
	      }		
       return  $str . '</urlset>';
	}

    /**
     * add Sitemap
     * @param string : $url, $lastmod, $changefreq, $priority
     */ 
	public function add_sitemap($url, $lastmod = null, $changefreq = 'weekly', $priority = '0.6') {
		$this->sitemaps[$url] = [$changefreq, $priority, $lastmod]; 
	}

   /**
    * Sitemap Videos Generator
    * @return Str
    */ 
	public function sitemap_video() {
		$str = '<?xml version="1.0" encoding="'.$this->encoding.'"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">';
		 foreach ($this->videos as $key => $value) {
		 	$str .= '<url><loc>'.$key.'</loc>';
		 	$str .= '<changefreq>'.$value[0].'</changefreq>';
		 	$str .= '<priority>'.$value[1].'</priority>';
		 	$str .= '<video:video>';
		 	$str .= '<video:player_loc allow_embed="yes">'.$value[2].'</video:player_loc>';
		 	$str .= '<video:thumbnail_loc>'.$value[3].'</video:thumbnail_loc>';
		 	$str .= '<video:title>'.$value[4].'</video:title>';
		 	$str .= '<video:description>'.$value[5].'</video:description>';
		 	$str .= '<video:tag>'.$value[6].'</video:tag>';
		 	$str .= '<video:category>'.$value[7].'</video:category>';
		 	$str .= '</video:video></url>';
		 }
	   return $str . '</urlset>';
	}

    /**
     * add Video 
     * @param String : $url, $embedurl, $thumbnail, $title, $desc, $tags, $cat, $changefreq, $priority 
     */ 
	public function add_video($url, $embedurl, $thumbnail, $title, $desc, $tags, $cat, $changefreq = 'monthly', $priority = '0.7') {
		$this->videos[$url] = [$changefreq, $priority, $embedurl, $thumbnail, $title, $desc, $tags, $cat];
	}

}
