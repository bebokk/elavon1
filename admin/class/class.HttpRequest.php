<?php

/**
 *  Class: HttpRequestParameter;
 *  Author: zbigniew.labacz@gmail.com
 *  Uses: PHP5
 */

class HttpRequestParameter {

  protected $PARAM;
  protected $index;
  
  public function __construct($index="", $T=array()) {
    $this->PARAM = $T;
    $this->index = $index;
  }
  
  public function & Add($var, $val) {
    $this->PARAM[$var] = $val;
    return $this;
  }
  
  public function & Not($val) {
    if (isset($this->PARAM[$val])) unset($this->PARAM[$val]);
    return $this;
  }
  
  public function & Set($var, $val) {
    if (isset($this->PARAM[$var])) {
      $this->PARAM[$var] = $val;
    }
    return $this;
  }  
  
  public function Url($fragment=null) {
    $str = '';
    $i=0;
    foreach ($this->PARAM as $K => $V) {
      $str .= ($i++) ? "&amp;".$K."=".$V : $K."=".$V;
    }
    return $this->index.'?'.$str.((isset($fragment)) ? '#'.$fragment : '');
  }
  
  public function Inp() {
    $str = '';
    foreach ($this->PARAM as $K => $V) {
      $str .= sprintf('<input type="hidden" name="%s" value="%s" />', $K, $V);
    }
    return $str;
  }
  
  public function __toString() {
    $str = "<pre>HttpRequestParameter (\n";
    foreach ($this->PARAM as $K => $V) {
      $str .= sprintf("  %s => %s\n", $K, $V);
    }
    $str .= ')</pre>';
    return $str;
  }
}


/**
 *  Class: HttpRequest;
 *  Author: zbigniew.labacz@gmail.com
 *  Uses: PHP5
 */

class HttpRequest {

  public static $Instance;
  protected $index;
  protected $REQUEST;
  protected $GET;
  protected $POST;
  protected $COOKIE;
  protected $PARAM;
  
  protected function __construct() {
    $this->REQUEST = array();
    $this->REQUEST = array_merge($this->REQUEST, $_GET, $_POST);
    $this->GET = $_GET;
    $this->POST = $_POST;
    $this->COOKIE = $_COOKIE;
    $this->PARAM = array();
    $this->index = $_SERVER['PHP_SELF'];
  }
  
  public static function GetInstance() {
    if (!isset(self::$Instace)) {
      self::$Instance = new self();
    }
    return self::$Instance;
  }
  
  public function __clone() {
    return self::$Instance;
  }
  
  public function Is($var) {
    return isset($this->REQUEST[$var]);
  }
  
  public function IsGet($var) {
    return isset($this->GET[$var]);
  }
  
  public function IsPost($var) {
    return isset($this->POST[$var]);
  }
  
  public function IsCookie($var) {
    return isset($this->COOKIE[$var]);
  }

  public function GetValue($var) {
    if (isset($this->REQUEST[$var])) {
      return $this->REQUEST[$var];
    }
    else {
      return null;
    }
  }
  
  public function Value($var) {
    return $this->GetValue($var);
  }
  
  public function Get($var) {
    if (isset($this->GET[$var])) {
      return $this->GET[$var];
    }
    else {
      return null;
    }
  }
  
  public function Post($var) {
    if (isset($this->POST[$var])) {
      return $this->POST[$var];
    }
    else {
      return null;
    }
  }
  
  public function GetIndex() {
    return $this->index;
  }
  
  public function AddParam($var, $val) {
    $this->PARAM[$var] = $val;
  }
  
  public function Href() {
    return new HttpRequestParameter($this->index, $this->PARAM);
  }
  
  public function NewHref() {
    return new HttpRequestParameter($this->index);
  }
  
  public function RealHref() {
    return new HttpRequestParameter($this->index, $this->REQUEST);
  }

}

/**
 *  Class: FriendlyHttpRequestParameter;
 *  Author: ksajkowski@gmail.com
 *  Uses: PHP5
 */
 
class FriendlyHttpRequestParameter extends HttpRequestParameter {
	
	protected $friendly = true;
	protected $str = '';
	protected $smarty = true;
	protected $generated = false;
	protected $ADDED = array();
	
	public function __construct($T=array()) {
		$this->str = '';
		parent::__construct("",$T);
	}
	
	public function & Clear() {
		$this->generated = false;
		$this->str = "";
		$this->PARAM = array();
		
		return $this;
	}
	
	public function & AddArray($some_array=array()) {
		if (is_array($some_array)) {
			foreach ($some_array as $key=>$value) {
				$this->PARAM[$key] = $value;
			}
		}

		return $this;
	}
	
	public function Url($add_array=null,$fragment=null) {
		if ($add_array!=null) {
			if (is_array($add_array)) {
				$this->Clear();
				
				/*if (!isset($add_array["lang"])) {
					$tmp["lang"] = $_SESSION[APP]["lang"];
					$add_array = array_merge($tmp,$add_array);
				}*/
				
				$this->AddArray($add_array);
				$this->generated=false;
			}
			elseif (is_string($add_array)) {
				$this->Clear();
				$this->generated = true;
				$this->str = $add_array.$fragment;
			}
		}
		
		if (!$this->generated) {
			if ($this->friendly) {
				$this->str = $this->FriendlyUrl($fragment);
			}
			else {
				foreach ($this->PARAM as $key=>$value) {
					if (substr($key,0,8)=="friendly") {
						unset($this->PARAM[$key]);
					}
				}
				$this->str = parent::Url($fragment);
				$this->str = "index.php".$this->str;
			}
			$this->generated = true;
		}

		return $this->str;
	}
	
	protected function FriendlyStrAdd($str,$added="") {
		if ($added!="") {
			$this->ADDED[$added]=1;
		}
		
		if ($str!="") {
			return $str."/";
		}

		return "";
	}
	
	protected function FriendlyIntAdd($int,$added="") {
		if ($added!="") {
			$this->ADDED[$added]=1;
		}
		return intval($int)."/";
	}
	
	public function FriendlyUrl($fragment=null) {
		//jesli w tablicy bedzie zmienna z listy ponizej, to rob przyjazne linki		
		$t = array(
			"id_pro"=>"produkt",
		);
		
		$ignore_rest = false;
	    $str = '';
		
		$found = false;
		
		foreach ($t as $key=>$value) {
			if (isset($this->PARAM[$key]) && !$found) {
				switch($key) {
					case "id_pro":
						$found = true;
						
						$str.= $this->FriendlyStrAdd($value);
						$str.= $this->FriendlyIntAdd($this->PARAM[$key],$key);
						$str.= $this->FriendlyStrAdd($this->PARAM["friendlyname"],"friendlyname");
						
						break;
					default:
						break;
				}
			}
		}
		
		if (!$ignore_rest) {
			$str = $this->MakeStrFriendly($str);
			$str2 = "";
			foreach ($this->PARAM as $key=>$value) {
				if (@$this->ADDED[$key]!=1 && $value!="") {
					$str2.= "&amp;".$key."=".$value;
				}
			}
			if ($str2!="") {
				$str .= "?".substr($str2,5);
			}
		}

		return $str.((isset($fragment)) ? '#'.$fragment : '');
	}
	
	public function __toString() {
		if ($this->smarty) {
			return "";
		}
		
		$this->Url();
		return $this->str;
	}
	
	public static function MakeStrFriendly($str) {
		
		//setlocale(LC_CTYPE, 'pl_PL.utf8');
		//$str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        
        $char_in = array('ą','ć','ę','ł','ń','ó','ś','ż','ź','Ą','Ć','Ę','Ł','Ń','Ó','Ś','Ż','Ź');
        $char_out = array('a','c','e','l','n','o','s','z','z','A','C','E','L','N','O','S','Z','Z');
        
		$str = str_replace($char_in,$char_out,$str);
		
		$str = preg_replace('#[^a-z0-9/\.,]+#i','-',$str);	//wywalamy to co nie jest a-z, ani 0-9, ani nie jest kropka, ani przecinkiem, ani slashem
		
		#$str = preg_replace("('|\"|\^|`)","",$str);
		#$str = preg_replace("([^a-zA-Z0-9/\-\.,])","-",$str);
		#$str = preg_replace("(\.{2,})","-",$str);
		#$str = preg_replace("(\-+)","-",$str);
		
		$str = strtolower($str);
		
		return $str;
	}
	
	public static function MakeStrFriendlyDomain($str) {
		$str = self::MakeStrFriendly($str);
		
		$str = preg_replace("(\.)","",$str);
		$str = preg_replace("(\,)","",$str);
		$str = preg_replace("/^([\-\_]+)/","",$str);
		$str = preg_replace("(\_)","-",$str);
		
		return $str;
	}
}


?>