<?php

	class Circle
	{
	
    	private $friends = array();
    	private $index;
    	function Cirlce()
    	{
    		$this->index=0;

    	}
    	public function add_friend($obj,$key) 
    	{
            $key=$this->index;
            if ($key == null) 
    	    {
        	   $this->friends[] = $obj;
                $this->index++;
    	    }
    	   else 
    	   {
        	   if (isset($this->friends[$key])) 
        	   {
        		
            	   throw new KeyHasUseException("Key $key already in use.");
       		   }
        	   else
        	   {
                	$this->friends[$key] = $obj;
                	 $this->index++;
            	}
    	   }
		}
		
 		public function get_friend($key) 
		{
    		if (isset($this->friends[$key])) 
    		{
    			//echo 'dump'.var_export($this->buckets[$key]); //
        		return $this->friends[$key];
    		}
    		else 
    		{
        		throw new KeyInvalidException("Invalid key $key.");
    		}
		}
		public function keys() 
		{
    		return array_keys($this->friends);
		}
		public function length() 
		{
    		return count($this->friends);
		}
		public function keyExists($key)
		{
    		return isset($this->friends[$key]);
		}
    }
    /**
    * 
    */
    class friend
    {
        
        private $id;
        private $name;
        private $pic_url;
        function Friend($id,$name,$pic)
        {
            $this->id=$id;
            $this->name=$name;
            $this->pic_url=$pic;
        }
        function get_id()
        {
            return $this->id;
        }
        function get_name()
        {
            return $this->name;
        }
        function get_pic()
        {
            return($this->pic_url);
        }
    }
	
?>