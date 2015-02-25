<?php

  /*
   *  Class: Image;
   *  Author: zbych@piroportal.org
   *  Uses: PHP 5.x, GD2;
   *  Encoding: UTF-8;
   */

class Image {

  protected $result;
  protected $imgPath;
  protected $ext;
  protected $TYPE;
  protected $pType;
  protected $pName;
  protected $imgWidth;
  protected $imgHeight;
  
  protected $WM;
  protected $WM_path;
  protected $WM_mode;
  protected $WM_sx;
  protected $WM_sy;
  
  protected $minSize;
  protected $minWidth;
  protected $minHeight;
  
  function __construct($pointer, $minWidth=null, $minHeight=null) {
    $this->result = array();
    $this->WM = false;
    
    if (isset($minWidth) && isset($minHeight)) {
      $this->minSize = true;
      $this->minWidth = $minWidth;
      $this->minHeight = $minHeight;
    }
    else {
      $this->minSize = false;
    }
    
    if ($_FILES[$pointer]['name'] != '') {
      
      $this->imgPath = $_FILES[$pointer]['tmp_name'];
      $this->pName = $_FILES[$pointer]['name'];
      $this->pType = $_FILES[$pointer]['type'];
      
      $this->TYPE = array();
      
      $this->TYPE['jpg'] = array(
        'mime' => 'jpeg',
        'func_create_from' => "ImageCreateFromJPEG",
        'func_save' => "ImageJPEG",
        'func_resize' => "ImageCopyResampled",
        'func_create_blank' => "ImageCreateTrueColor"
      );
      
      $this->TYPE['gif'] = array(
        'mime' => 'gif',
        'func_create_from' => "ImageCreateFromGIF",
        'func_save' => "ImageGIF",
        'func_resize' => "ImageCopyResized",
        'func_create_blank' => "ImageCreate"
      );
      
      $this->TYPE['png'] = array(
        'mime' => 'png',
        'func_create_from' => "ImageCreateFromPNG",
        'func_save' => "ImagePNG",
        'func_resize' => "ImageCopyResized",
        'func_create_blank' => "ImageCreate"
      ); 
      
      if (@is_uploaded_file($this->imgPath)) {
        $this->setImage();
      }
      else {
        $this->getError("Nieprawidłowe pochodzenie pliku!");
      }
      
    }
    else {
      $this->getError("Nie przesłano żadnego pliku...");
    }
  }
  
  
  public function SetWaterMark($ImgPath, $sx, $sy, $mode='left-top') {
    if (preg_match("/^(left|right)\-(top|bottom)$/", $mode)) {
      if (file_exists($ImgPath)) {
        
        $this->WM_path = $ImgPath;
        $this->WM_sx = $sx;
        $this->WM_sy = $sy;
        $this->WM_mode = $mode;
        $this->WM = true;
        return true;
        
      }
      else {
        $this->getError("Błędna ścieżka znaku wodnego!");
        return false;
      }
    }
    else {
      $this->getError("Zły tryb wyświetlenia znaku wodnego!");
      return false;
    }
  }
  
  
  public function SetMinSize($sx, $sy) {
    $this->minSize = true;
    $this->minWidth = $sx;
    $this->minHeight = $sy;
  }
  
  
  protected function getProportion($intX, $intY, $w) {
    $intX = (int) $intX;
    if ($intX) {
      $y = ($intY * $w) / $intX;
      $y = round($y);
      return $y; 
    }
    else {
      $this->getError("Error: Dzielenie przez zero!");
      return $intY;
    }
  }
  
  
  protected function InsertWaterMark(&$imgDST, $width, $height) {
    $P = explode('.', $this->WM_path);
    $ext = trim(array_pop($P));
    $ImageCreateFrom = (string) $this->TYPE[$ext]['func_create_from'];
    
    list ($PosX, $PosY) = explode('-', $this->WM_mode);
    
    if ($imgWM = $ImageCreateFrom($this->WM_path)) {
      
      $imgWM_width = ImageSX($imgWM);
      $imgWM_height = ImageSY($imgWM);
      
      $sx = ($PosX == 'left') ? ($this->WM_sx) : ($width - $imgWM_width - $this->WM_sx) ;
      $sy = ($PosY == 'top') ? ($this->WM_sy) : ($height - $imgWM_height - $this->WM_sy) ;
      
      if (ImageCopy($imgDST, $imgWM, $sx, $sy, 0, 0, $imgWM_width, $imgWM_height)) {
        ImageDestroy($imgWM);
        return true;
      }
      else {
        ImageDestroy($imgWM);
        $this->getError("Nie udało nanieść znaku wodnego!");
        return false;
      }
      
    }
    else {
      $this->getError("Nie udało się zainicjalizować znaku wodnego!");
      return false;
    }
    
  }
  
  
  protected function setImage() {
    $N = explode(".", $this->pName);
    $this->ext = strToLower(trim(array_pop($N)));
    
    if (isset($this->TYPE[$this->ext]['mime'])) {
      if (preg_match('/'.$this->TYPE[$this->ext]['mime'].'/', $this->pType)) {
        list($w, $h) = getImageSize($this->imgPath);
        $this->imgWidth = (int) $w;
        $this->imgHeight = (int) $h;
      }
      else {
        $this->getError("Nieodpowiedni typ 'MIME'!");
        return false;
      }
    }
    else {
      $this->getError("Plik posiada nieodpowiednie rozszerzenie!");
      return false;
    }
    
    if (filesize($this->imgPath) > (1024*1000*500)) {
      $this->GetError("Plik zajmuje zbyt dużo pamięci! Skompresuj/pomniejsz grafikę w edytorze graficznym oraz wyślij ponownie!");
      return false;
    }
    
    if ($this->imgWidth > 1600 || $this->imgHeight > 1020) {
      $this->GetError('Plik posiada zbyt duże rozmiary. Pomniejsz grafikę do rozmiarów nie większych niż <b>1600x1200</b> px!');
      return false;
    }
    
    if ($this->minSize) {
      if ($this->imgWidth < $this->minWidth || $this->imgHeight < $this->minHeight) {
        $this->GetError('Niestety grafika którą chcesz wysłać posiada zbyt małą rozdzielczość. Umieść grafikę nie mniejszą niż: <b>'.$this->minWidth.'x'.$this->minHeight.'</b> px!');
        return false;
      }
    }
    
    return true;
  }
  
  
  public function CheckImage() {
    return ($this->SetImage()) ? true : false ;
  }
  
  
  public function getExtension() {
    return (string) ".".$this->ext;
  }
  
  
  public function make($path, $size=0) {
    $path = trim($path);
    if ($path != '') {
      
      $P = explode("/", $path);
      array_pop($P);
      $upDir = implode("/", $P);
      
      if (!is_dir($upDir)) {
        $this->getError("Podany katalog w którym należy umieścić grafikę nie istnieje!");
        return false;
      }
      
      if ($size == 0 || $size >= $this->imgWidth) {
        if ($this->imageOriginal($path)) {
          return true;
        }
        else {
          return false;
        }
      }
      else {
        if ($this->imageResize($path, $size)) {
          return true;
        }
        else {
          return false;
        }
      }
    }
    else {
      $this->getError("Podano nieprawidłową ścieżkę!");
      return false;
    }
  }
  
  
  public function thumb($path, $width, $height) {
    $path = trim($path);
    if ($path != '') {
      
      $P = explode("/", $path);
      array_pop($P);
      $upDir = implode("/", $P);
      
      if (!is_dir($upDir)) {
        $this->getError("Podany katalog w którym należy umieścić grafikę nie istnieje!");
        return false;
      }
      
      // proporcja narzucona:
      $proportion = (float) round(($height / $width), 2);
      
      // proporcja rozmiarów rzeczywistych grafiki:
      $avg = (float) round(($this->imgHeight/$this->imgWidth), 2);
      
      
      if ($this->imgWidth >= $width && $this->imgHeight >= $height) {
        if ($width == $this->imgWidth && $height == $this->imgHeight) {
          // jeżeli podano grafikę o identycznych rozmiarach z narzuconymi:
          if ($this->imageOriginal($path)) {
            return true;
          }
          else {
            return false;
          }
        }
        else {
          if ($avg == $proportion) {
            // jeżeli proporcje podanej grafiki zgadzają się z proporcją narzuconą:
            if ($this->imageResize($path, $width)) {
              return true;
            }
            else {
              return false;
            }
          }
          else {
            // jeżeli proporcje podanej grafiki nie zgadzają się z proporcjami narzuconymi:
            if ($this->imageResizeStrict($path, $width, $height)) {
              return true;
            }
            else {
              return false;
            }
          }
        }
        
      }
      else {
        $this->getError("Przesłana grafika posiada mniejszy rozmiar od minimalnego (narzuconego)!");
        return false;
      }
      
    }
    else {
      $this->getError("Podano nieprawidłową ścieżkę!");
      return false;
    }
  }
  
  
  protected function imageOriginal($path) {
    if ($this->WM) {
      $ImageCreateFrom = (string) $this->TYPE[$this->ext]['func_create_from'];
      $ImageSave = (string) $this->TYPE[$this->ext]['func_save'];
      
      if ($imgDST = $ImageCreateFrom($this->imgPath)) {
        $width = ImageSX($imgDST);
        $height = ImageSY($imgDST);
        
        $this->InsertWaterMark($imgDST, $width, $height);
        
        if ($ImageSave($imgDST, $path.$this->getExtension())) {
          @chmod($path.$this->getExtension(), 0644);
          ImageDestroy($imgDST);
          return true;
        }
        else {
          ImageDestroy($imgDST);
          $this->getError("Nie udało się zapisać obrazu!");
          return false;
        }
        
      }
      else {
        $this->getError("Utworzenie obrazu na podstawie '".$path."' nie powiodło się!");
        return false;
      }
      
    }
    else {
      
      if (@copy($this->imgPath, $path.$this->getExtension())) {
        @chmod($path.$this->getExtension(), 0644);
        return true;
      }
      else {
        $this->getError("Nie udało się załadować obrazu!");
        return false;
      }
      
    }
  }
  
  
  protected function imageResize($path, $width) {
    $ImageCreate = (string) $this->TYPE[$this->ext]['func_create_blank'];
    $ImageCreateFrom = (string) $this->TYPE[$this->ext]['func_create_from'];
    $ImageSave = (string) $this->TYPE[$this->ext]['func_save'];
    $ImageResize = (string) $this->TYPE[$this->ext]['func_resize'];
    
    if ($ImageCreate!="" && $ImageCreateFrom!="" && $ImageSave!="" && $ImageResize!="") {
      
      $height = $this->getProportion($this->imgWidth, $this->imgHeight, $width);
      
      if ($imgDST = $ImageCreate($width, $height)) {
        if ($imgSRC = $ImageCreateFrom($this->imgPath)) {
          
          if ($ImageResize($imgDST, $imgSRC, 0, 0, 0, 0, $width, $height, $this->imgWidth, $this->imgHeight)) {
            
            if ($this->WM) {
              $this->InsertWaterMark($imgDST, $width, $height);
            }
            
            if ($ImageSave($imgDST, $path.$this->getExtension())) {
              @chmod($path.$this->getExtension(), 0644);
              ImageDestroy($imgSRC);
              ImageDestroy($imgDST);
              return true;
            }
            else {
              $this->getError("CORE-Error: ".__class__."::".__function__." (#".__line__.")");
              ImageDestroy($imgSRC);
              ImageDestroy($imgDST);
              return false;
            }
            
          }
          else {
            $this->getError("CORE-Error: ".__class__."::".__function__." (#".__line__.")");
            ImageDestroy($imgSRC);
            ImageDestroy($imgDST);
            return false;
          }
          
        }
        else {
          $this->getError("CORE-Error: ".__class__."::".__function__." (#".__line__.")");
          ImageDestroy($imgDST);
          return false;
        }
      }
      else {
        $this->getError("CORE-Error: ".__class__."::".__function__." (#".__line__.")");
        return false;
      }
    }
    else {
      $this->getError("CORE-Error: ".__class__."::".__function__." (#".__line__.")");
      return false;
    }
  }
  
  
  
  protected function imageResizeStrict($path, $width, $height) {
    $ImageCreate = (string) $this->TYPE[$this->ext]['func_create_blank'];
    $ImageCreateFrom = (string) $this->TYPE[$this->ext]['func_create_from'];
    $ImageSave = (string) $this->TYPE[$this->ext]['func_save'];
    $ImageResize = (string) $this->TYPE[$this->ext]['func_resize'];
    
    if ($ImageCreate!="" && $ImageCreateFrom!="" && $ImageSave!="" && $ImageResize!="") {
      
      if ($imgDST = $ImageCreate($width, $height)) {
        if ($imgSRC = $ImageCreateFrom($this->imgPath)) {
          
          $proportion = (float) round(($height / $width), 2);
          $avg = (float) round(($this->imgHeight/$this->imgWidth), 2);
          
          if ($avg > $proportion) {
            // jeżeli obraz jest wyższy niż szerszy od rozmiaru narzuconego;
            
            $HeightProportion = (float) round(($height / $width), 2);
            $VHeight = round($this->imgWidth * $HeightProportion);
            $ySRC = round(($this->imgHeight - $VHeight) / 2);
            
            if ($ImageResize($imgDST, $imgSRC, 0, 0, 0, $ySRC, $width, $height, $this->imgWidth, $VHeight)) {
              
              if ($this->WM) {
                $this->InsertWaterMark($imgDST, $width, $height);
              }
              
              if ($ImageSave($imgDST, $path.$this->getExtension())) {
                @chmod($path.$this->getExtension(), 0644);
                ImageDestroy($imgSRC);
                ImageDestroy($imgDST);
                return true;
              }
              else {
                $this->getError("CORE-Error: ".__class__."::".__function__." (#".__line__.")");
                ImageDestroy($imgSRC);
                ImageDestroy($imgDST);
                return false;
              }
            }
            else {
              $this->getError("CORE-Error: ".__class__."::".__function__." (#".__line__.")");
              ImageDestroy($imgSRC);
              ImageDestroy($imgDST);
              return false;
            }
            
          }
          elseif ($avg < $proportion) {
            // jeżeli obraz jest szerszy niż wyższy od rozmiaru narzuconego;
            
            $WidthProportion = (float) round(($width / $height), 2);
            $VWidth = round($this->imgHeight * $WidthProportion);
            $xSRC = round(($this->imgWidth - $VWidth) / 2);
            
            if ($ImageResize($imgDST, $imgSRC, 0, 0, $xSRC, 0, $width, $height, $VWidth, $this->imgHeight)) {
              
              if ($this->WM) {
                $this->InsertWaterMark($imgDST, $width, $height);
              }
              
              if ($ImageSave($imgDST, $path.$this->getExtension())) {
                @chmod($path.$this->getExtension(), 0644);
                ImageDestroy($imgSRC);
                ImageDestroy($imgDST);
                return true;
              }
              else {
                $this->getError("CORE-Error: ".__class__."::".__function__." (#".__line__.")");
                ImageDestroy($imgSRC);
                ImageDestroy($imgDST);
                return false;
              }
              
            }
            else {
              $this->getError("CORE-Error: ".__class__."::".__function__." (#".__line__.")");
              ImageDestroy($imgSRC);
              ImageDestroy($imgDST);
              return false;
            }
            
          }
          
        }
        else {
          $this->getError("CORE-Error: ".__class__."::".__function__." (#".__line__.")");
          ImageDestroy($imgDST);
          return false;
        }
      }
      else {
        $this->getError("CORE-Error: ".__class__."::".__function__." (#".__line__.")");
        return false;
      }
    }
    else {
      $this->getError("CORE-Error: ".__class__."::".__function__." (#".__line__.")");
      return false;
    }
  }
  
  
  
  public function getMessage() {
    return implode('<br />', $this->result);
  }
  public function isError() {
    return (count($this->result)) ? true : false ;
  }
  protected function getError($msg) {
    $this->result[] = $msg;
  }
  function __set($n, $v) {
    $this->getError(__class__.': Nastąpiła próba zapisu danych w nieistniejącej zmiennej: '.$n);
  }
  function __get($n) {
    $this->getError(__class__.': Nastąpiła próba odwołania się do nieistniejącej zmiennej: '.$n);
  }
  function __destruct() {
    unset($this->TYPE);
    unset($this->result);
  }
  
}

?>