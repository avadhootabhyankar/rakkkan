<?php
	/**
	* 
	*/
	/**
	* 
	*/
	/*class bathroom extends AnotherClass
	{
		private bucket_list = array(); // list of buckets
		
	}*/

	class Bathroom
	{
    	private $buckets = array();
    	public function add_bucket($obj, $key = null) 
    	{
    	if ($key == null) 
    	{
        	$this->buckets[] = $obj;
    	}
    	else 
    	{
    		//e
        	if (isset($this->buckets[$key])) 
        	{
        		//here it by defaults filter for the categories
        		//can be used for adding the likes list for a perticular category
            	//throw new KeyHasUseException("Key $key already in use."); -- COMMENTING THE EXCEPTION will let the bucket  expand 
                /*
                    to be used for debug only
                echo 'adding  :';
            	var_export($obj->get_item(1));
                echo ' in '.$key.' at '.$this->get_bucket($key)->length(); 
                */

            	$this->get_bucket($key)->add_item($obj->get_item(1),0); // Pass the second param as 0
       			//echo 'DUPLICATE<br>';
       		}
        	else
        	{
                /*
                echo 'adding  :';
                var_export($obj->get_item(1));
                echo ' in '.$key;//'' at '.$this->get_bucket($key)->length();
                To be used for debugging only
                */
                $this->buckets[$key] = $obj;
        	}
            
    		}
		}
		public function delete_bucket($key) 
		{
    		if (isset($this->buckets[$key])) 
			{
        		unset($this->buckets[$key]);
    		}
    		else 
    		{
        		throw new KeyInvalidException("Invalid key $key.");
    		}
		}
 
		public function get_bucket($key) 
		{
    		if (isset($this->buckets[$key])) 
    		{
    			//echo 'dump'.var_export($this->buckets[$key]); //
        		return $this->buckets[$key];
    		}
    		else 
    		{
        		throw new KeyInvalidException("Invalid key $key.");
    		}
		}
		public function keys() 
		{
    		return array_keys($this->buckets);
		}
		public function length() 
		{
    		return count($this->buckets);
		}
		public function keyExists($key)
		{
    		return isset($this->buckets[$key]);
		}
    }
	class Bucket
	{
		private $category;
    	private $bucket = array();
    	private $index;
    	function Bucket($category_name,$item_name)
    	{
    		$this->index=1;
    		$this->category=$category_name;
			//$this->add_item($item_name,$this->index);
            $this->bucket[$this->index] = $item_name;
            $this->index++;
    	}
    	public function add_item($obj,$key) 
    	{
            
            $key=$this->index;
    	 if ($key == null) 
    	{
        	$this->bucket[] = $obj;
            $this->index++;
    	}
    	else 
    	{
        	if (isset($this->bucket[$key])) 
        	{
        		
            	throw new KeyHasUseException("Key $key already in use.");
       		}
        	else
        	{
            	$this->bucket[$key] = $obj;
            	$this->index++;
        	}
    	}
		}
		public function delete_item($key) 
		{
    		if (isset($this->bucket[$key])) 
			{
        		unset($this->bucket[$key]);
    		}
    		else 
    		{
        		throw new KeyInvalidException("Invalid key $key.");
    		}
		}
 		public function get_category() 
		{
    			return $this->category;
    		
		}
		public function get_item($key) 
		{
    		if (isset($this->bucket[$key])) 
    		{
    			//echo 'dump'.var_export($this->buckets[$key]); //
        		return $this->bucket[$key];
    		}
    		else 
    		{
        		throw new KeyInvalidException("Invalid key $key.");
    		}
		}
		public function keys() 
		{
    		return array_keys($this->bucket);
		}
		public function length() 
		{
    		return count($this->bucket);
		}
		public function keyExists($key)
		{
    		return isset($this->bucket[$key]);
		}
    }
	
?>