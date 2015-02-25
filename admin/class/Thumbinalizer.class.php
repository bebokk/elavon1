<?php
// author: Michał Wachowski -> wachowski.airsoft-gorzow.pl
// modified by Kazimierz Sajkowski -> kazik.rus.mil.pl
class Thumbinalizer {
		private $prefix = NULL;
		private $thumbsize = NULL;
		private $quality = NULL;
		private $pic_quality = NULL;
		private $picsize = NULL; //tak na prawde maxsize

		public function __construct($prefix = NULL, $thumbsize = 0, $quality = 0, $pic_quality = 0, $picsize = 0) {
			$this->prefix = (empty($prefix) ? '' : $prefix);
			$this->thumbsize = ($thumbsize == 0 ? 100 : $thumbsize);
			$this->picsize = ($picsize == 0 ? 1024 : $picsize);
			$this->quality = ($quality == 0 ? 100 : $quality);
			$this->pic_quality = ($pic_quality == 0 ? 100 : $pic_quality);
			}
			
		public function SignPic($srcimg, $trgimg = NULL, $signimg, $signimg2) {
			if(!file_exists($signimg))
				return $srcimg;
			if($srcimg == $signimg)
				return $srcimg;
				
			if(!$this->EstimateMem($srcimg))
				return $srcimg;
				
			$imageinfo = getimagesize($srcimg);
			switch($imageinfo['mime']) {
				case "image/jpeg":
				case "image/jpg":
					$res_srcimg = imagecreatefromjpeg($srcimg);
					break;
				case "image/gif":
					$res_srcimg = imagecreatefromgif($srcimg);
					break;
				case "image/png":
					$res_srcimg = imagecreatefrompng($srcimg);
					break;
				default:
					return $srcimg;
				}
			$srcheight = imagesy($res_srcimg);
			$srcwidth = imagesx($res_srcimg);
			
			$mnoznik = 1;
			
			if ($srcwidth>=$srcheight) {
				$mnoznik=$this->picsize/$srcwidth;
			}
			else {
				$mnoznik=$this->picsize/$srcheight;
			}
			
			if ($mnoznik>1) {
				$mnoznik=1;
			}
			elseif($mnoznik<1) {
				$new_width=floor($srcwidth*$mnoznik);
				$new_height=floor($srcheight*$mnoznik);
				
				$res_srcimg2 = imagecreatetruecolor($new_width, $new_height);
				imagecopyresampled($res_srcimg2,$res_srcimg,0,0,0,0,$new_width,$new_height,$srcwidth,$srcheight);
				
				imagedestroy($res_srcimg);
				
				$res_srcimg = $res_srcimg2;
				
				$srcwidth = $new_width;
				$srcheight = $new_height;
			}
			
			$imageinfo = getimagesize($signimg);
			switch($imageinfo['mime']) {
				case "image/jpeg":
				case "image/jpg":
					$res_signimg = imagecreatefromjpeg($signimg);
					break;
				case "image/gif":
					$res_signimg = imagecreatefromgif($signimg);
					break;
				case "image/png":
					$res_signimg = imagecreatefrompng($signimg);
					break;
				default:
					return $srcimg;
				}
			$signheight = imagesy($res_signimg);
			$signwidth = imagesx($res_signimg);
			
			if ($signimg2!="") {
				$imageinfo = getimagesize($signimg2);
				switch($imageinfo['mime']) {
					case "image/jpeg":
					case "image/jpg":
						$res_signimg2 = imagecreatefromjpeg($signimg2);
						break;
					case "image/gif":
						$res_signimg2 = imagecreatefromgif($signimg2);
						break;
					case "image/png":
						$res_signimg2 = imagecreatefrompng($signimg2);
						break;
					default:
						break;
					}
				
				$signheight2 = imagesy($res_signimg2);
				$signwidth2 = imagesx($res_signimg2);
					
				imagecopy($res_srcimg, $res_signimg2, $srcwidth/2 - $signwidth2/2, $srcheight/2 - $signheight2/2, 0, 0, $signwidth2, $signheight2);
			}
			
			imagecopy($res_srcimg, $res_signimg, $srcwidth - $signwidth - 10, $srcheight - $signheight - 10, 0, 0, $signwidth, $signheight);
			
			if ($trgimg=="") {
				$trgimg = $srcimg;
			}
			
			imagejpeg($res_srcimg,$trgimg,$this->pic_quality);
			return true;
			}
			
		public function Thumb($srcimg, $trgimg = NULL, $img_ext=".jpg") {
			//$trgimg = str_replace("//","/",preg_replace("#\.(jpeg|jpg|gif|png)$#i",$img_ext, ($trgpath != NULL ? $trgpath."/" : '').$this->prefix.basename($srcimg)));
			
			if(file_exists($trgimg)) {
				$imginfo = getimagesize($trgimg);
				if($imginfo[0] == $this->thumbsize or $imginfo[1] == $this->thumbsize) 
					return $trgimg;
				}
			
			if(!$this->EstimateMem($srcimg))
				return $srcimg;
			
			$imageinfo = getimagesize($srcimg);
			switch($imageinfo['mime']) {
				case "image/jpeg":
				case "image/jpg":
					$res_srcimg = imagecreatefromjpeg($srcimg);
					break;
				case "image/gif":
					$res_srcimg = imagecreatefromgif($srcimg);
					break;
				case "image/png":
					$res_srcimg = imagecreatefrompng($srcimg);
					break;
				default:
					return $srcimg;
				}
			$height = imagesy($res_srcimg);
			$width = imagesx($res_srcimg);
			
			if($height <= $this->thumbsize and $width <= $this->thumbsize) {
				imagejpeg($res_srcimg,$trgimg, $this->quality);
				return true;
				}
			else {
				if($height > $width)
					$rate = $height / $this->thumbsize;
				else
					$rate = $width / $this->thumbsize;
					
				$trgimg_x = $width / $rate;
				$trgimg_y = $height / $rate;
		
				$res_trgimg = imagecreatetruecolor($trgimg_x, $trgimg_y);	
				imagecopyresampled($res_trgimg, $res_srcimg, 0, 0, 0, 0, $trgimg_x, $trgimg_y, $width, $height);
				imagejpeg($res_trgimg,$trgimg, $this->quality);
				chmod($trgimg, 0777);
				return true;
				}
			}		
		private function EstimateMem($srcimg) {
			$imageinfo = getimagesize($srcimg);
			$setmem = preg_replace("#[^0-9]#", NULL, ini_get('memory_limit'));
			$estmem = $imageinfo[0] * $imageinfo[1] * $imageinfo['bits'] / 1024 / 1024;
			if($setmem > $estmem)
				return true;
			else
				return false;
			}
	public function FileTypeByExt($string) {
		$file = $this->ExplodeFilename($string);
		$images = array("jpg", "jpeg", "gif", "png", "tif", "tiff", "bmp");
		$doc = array("php", "php5", "php4", "php3", "html", "htm", "tpl", "txt", "rtf", "doc", "xml", "xls");
		$arch = array("zip", "tar", "gzip", "lha", "arj", "rar", "gz", "7z");
		if(in_array($file['ext'], $images))
			return 'image';
		if(in_array($file['ext'], $doc))
			return 'document';		
		if(in_array($file['ext'], $arch))
			return 'archive';
		}
		private function ExplodeFilename($string) {
			$filename = NULL;
			$extension = NULL;
			$array = explode(".",$string);
			for($i = 0; $i <= count($array) - 2; $i++)
				$filename .= $array[$i];
			
			$extension = $array[count($array) -1];
			return array("name" => $filename, "ext" => $extension);
			} 
	}
?>