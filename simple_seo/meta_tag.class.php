<?php

/**
 * MetaTags Generator Class
 */ 
class MeaTag
{
	protected $meta_tags, $fb_meta, $tw_meta, $gp_meta, $add_meta;

	protected $attr = array(
		'default'  => ['name', 'content'], 
		'http'     => ['http-equiv', 'content'],
		'facebook' => ['property', 'content'], 
		'twitter'  => ['name', 'content'], 
		'gplus'    => ['property', 'itemprop']
	);

	protected $prefix = [
		'facebook' => array(
			'type'        => 'og:type',
			'title'       => 'og:title',
			'name'        => 'og:site_name',
			'description' => 'og:description',
			'canonical'   => 'og:url',
			'image'       => 'og:image'
		    ),
		'twitter' => array(
			'title'       => 'twitter:title',
			'description' => 'twitter:description',
			'canonical'   => 'twitter:url',
			'image'       => 'twitter:image'
		    ),
		'gplus' => array(
			'title'       => 'name',
			'description' => 'description',
			'image'       => 'image',
			'canonical'   => 'url'
	)];

    /**
     * Add meta.
     
     * @param string $type
     */ 
    public function addMeta($type, $array = FALSE) {
    	if (in_array($type, array_keys($this->attr)) && $array !== FALSE) {
    		foreach ($array as $key => $value) {
     			$this->add_meta .= '<meta '.$this->attr[$type][0].'="'.$key.'" '.$this->attr[$type][1].'="'.htmlspecialchars($value).'" />' . PHP_EOL;
    		}
    	}	  
    } 
	
    /**
     * Set Social.
     *
     * @param array
     */
    public function setSocial($array) {
    	$this->fb_meta = $this->tw_meta = $this->gp_meta = FALSE;
    	
	if (!empty($array['facebook']) && $array['facebook'][0] === true) {
    		unset($array['facebook'][0]);
    		$this->fb_meta = $array['facebook'];
    	}
	    
    	if (!empty($array['twitter']) && $array['twitter'][0] === true) {
    		unset($array['twitter'][0]);
    		$this->tw_meta = $array['twitter'];
    	}
     	
	if (!empty($array['gplus']) && $array['gplus'][0] === true) {
    		unset($array['gplus'][0]);
    		$this->gp_meta = $array['gplus'];
    	}   	    	
    }

  	public function metaTags($array) {
  		$this->meta_tags = '<!-- Meta Tags Start -->' . PHP_EOL;
  		if ($this->add_meta !== null) {
           $this->meta_tags .= $this->add_meta;
  		}
  		$this->meta_tags .= $this->_meta_generate('default', $array);
  		if ($this->fb_meta !== FALSE) {
  			$this->meta_tags .= '<!-- Faebook Meta Tags -->' . PHP_EOL;
  			$this->meta_tags .= $this->_social_meta('facebook', $this->fb_meta);
  			$this->meta_tags .= $this->_meta_generate('facebook', $array);
  		}
  		if ($this->tw_meta !== FALSE) {
  			$this->meta_tags .= '<!-- Twitter Meta Tags -->' . PHP_EOL;
  			$this->meta_tags .= $this->_social_meta('twitter', $this->tw_meta);
  			$this->meta_tags .= $this->_meta_generate('twitter', $array);
  		}
        if ($this->gp_meta !== FALSE) {
  			$this->meta_tags .= '<!-- Google Plus Meta Tags -->' . PHP_EOL;
  				if (isset($this->gp_meta['author']) && !empty($this->gp_meta['author'])) {
  					$this->meta_tags .= '<link href="'.$this->gp_meta['author'].'" rel="author" />' . PHP_EOL ;
  				}
  				if (isset($this->gp_meta['publisher']) && !empty($this->gp_meta['publisher'])) {
  					$this->meta_tags .= '<link href="'.$this->gp_meta['publisher'].'" rel="publisher" />' . PHP_EOL;
  				}
  			
  			$this->meta_tags .= $this->_meta_generate('gplus', $array);
  	    }

  		if (isset($array['canonical'])) {
  		   $this->meta_tags .= '<link href="'.$array['canonical'].'" rel="canonical" />';
  		}
  	}
	
    /**
     * @return String
     */  
  	public function getMeta()	{
  		return $this->meta_tags;
  	}

/*** Protected Functions ***/
    /**
     * @param string $type
     * @return String
     */ 
    protected function _social_meta($type, $array) {
    	$meta = '';
	   if (is_array($array)) {	
		  foreach ($array as $key => $value) {
	 			$meta .= '<meta '.$this->attr[$type][0].'="'.$key.'" '.$this->attr[$type][1].'="'.htmlspecialchars($value).'" />' . PHP_EOL;
			}
	    }	
	  return $meta;	
    } 
    /**
     * _meta_generate
     * @param String $type
     * @return string
     */  
     protected function _meta_generate($type, $array) {
     	$string = '';
     	if ($type == 'default') {
     		$prefix = array('description', 'keywords', 'image', 'author', 'robots');
	     	foreach ($array as $key => $value) {
	     		if ( in_array($key, $prefix) ) {
	     			$string .= '<meta '.$this->attr[$type][0].'="'.$key.'" '.$this->attr[$type][1].'="'.htmlspecialchars($value).'" />' . PHP_EOL;
	     		}
	     	}
     	} else {
	     	foreach ($array as $key => $value) {
	     		if ( in_array($key, array_keys($this->prefix[$type])) ) {
	     			$string .= '<meta '.$this->attr[$type][0].'="'.$this->prefix[$type][$key].'" '.$this->attr[$type][1].'="'.htmlspecialchars($value).'" />' . PHP_EOL;
	     		}
	     	}
        }
     	return $string;
     }
}
