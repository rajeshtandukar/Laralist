<?php namespace Laralist\Listmeta;

class Meta{


	 /**
     * @var array
     */
    private $metas = [];

    /**
     * @var string
     */
    private $title;


	 /**
     * @param  string $title
     * @return string
     */
    public function title($title = null)
    {
        if ($title === null) {
            return $this->title;
        }
        $this->title = null;
        $this->set('title', $title);
        return $this->title = $this->fix($title);
    }


    /**
     * @param  string $key
     * @param  string $value
     * @return string
     */
    public function meta($key, $value = null)
    {
        if ($value === null) {
            return $this->get($key);
        }
        return $this->set($key, $value);
    }

    /**
     * @param  string $key
     * @return string
     */
    public function get($key)
    {
        if (empty($this->metas[$key])) {
            return null;
        }
        return $this->metas[$key];
    }


    /**
     * @param  string $key
     * @param  string $value
     * @return string
     */
    public function set($key, $value = null)
    {

        $value = $this->fix($value);
        $method = 'set'.$key;
        if (method_exists($this, $method)) {
            return $this->$method($value);
        }

        $this->metas[$key] = $value;

    }

    /**
     * @param  string $key
     * @param  string $value
     * @return string
     */
    public function tag($key, $value = null)
    {       
        $method = 'tag'.ucfirst($key);
        if (method_exists($this, $method)) {
            return $this->$method($value);
        }
        return $this->tagDefault($key, $value);
    }


    /**
     * @param  string $key
     * @param  string $value
     * @return string
     */
    private function tagDefault($key, $value = null)
    {
        $html = $this->tagMetaName($key, $value);       
        return $html;
    }

    /**
     * @param  string $key
     * @param  string $value
     * @return string
     */
    public function tagMetaName($key, $value = null)
    {
        return $this->tagString('name', $key, $value);
    }



     /**
     * @param  string $value
     * @return string
     */
    private function setTitle($value)
    {
        $title = $this->title;       
        return $this->metas['title'] = $value;
    }



      /**
     * @param  string $name
     * @param  string $key
     * @param  string $value
     * @return string
     */
    private function tagString($name, $key, $value = null)
    {    
    	if(isset($this->metas[$key])){
    		return '<meta '.$name.'="'.$key.'" content="'.$this->metas[$key].'" />';	
    	}    

    	return null;
         
    }
    /**
     * @param  string $text
     * @return string
     */

     /**
     * @param  string $text
     * @return string
     */
    private function fix($text)
    {
        $text = preg_replace('/<[^>]+>/', ' ', $text);
        $text = preg_replace('/[\r\n\s]+/', ' ', $text);
        return trim(str_replace('"', '&quot;', $text));
    }

}