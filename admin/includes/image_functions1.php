<?php
function saveThumb($file,$image_size,$images_path, $imageName)
{
        list($thumbWidth,$thumbHeight) = explode("x",$image_size);

        $twidth = ($thumbWidth)?$thumbWidth:100;
        $theight = ($thumbHeight)?$thumbHeight:100;

        list($width, $height, $type) = getimagesize($file);
		
		 if($width <= $twidth && $height <= $theight)
		 {
			$newHeight	= $height;
			$newWidth	= $width;
		 }
		 
		 if($width > $twidth)
		 {
			$rewidth1 = $twidth ;
			$refact = $width / $twidth ;
			$reheight1 = ceil($height / $refact);

			$newHeight	= $reheight1;
			$newWidth	= $twidth;	
			
		 }else if($height > $theight){
			$refact = $height / $theight ;
			$rewidth = ceil($width / $refact);
			
			$newHeight	= $theight;
			$newWidth	= $rewidth;	
		 }
				
		 if ($newHeight > $theight)
		 {					 
			$refact = $newHeight / $theight ;
			$rewidth = ceil($newWidth / $refact);
			
			$newHeight	= $theight;
			$newWidth	= $rewidth;	
			
		 }
		
       // $newHeight = ($newHeight < $theight ) ?  $newHeight : $theight;
		
		
		/*
        $change = $twidth / $width  ;
        $newHeight = ceil ($height * $change);

        //    $newHeight = ($newHeight < $theight ) ?  $newHeight : $theight;
        $newWidth = $twidth;
		if ($newHeight > $theight ) {
				$change = $theight / $newHeight  ;
				$newWidth = ceil ($newWidth * $change);
				$newHeight = $theight;
		}
		*/
/*		
echo "mage_size-".$image_size."<br />";
echo "width-".$width."<br />";
echo "height-".$height."<br />";
echo "type-".$type."<br />";

echo "newWidth-".$newWidth."<br />";
echo "newHeight-".$newHeight."<br />";
die();
*/

        switch ($type){
                case 1: //gif
                        $create = "imagecreatefromgif";
                        $save = "imagegif";
                        //$thumb = rand(1000,99999999)."_".$imageName.".gif";
                        $thumb = $imageName;
                        break;
                case 2: //jpeg
                        $create = "imagecreatefromjpeg";
                        $save = "imagejpeg";
                        //$thumb = rand(1000,99999999)."_".$imageName.".jpg";
                        $thumb = $imageName;
                        break;
                case 3: //png
                        $create = "imagecreatefrompng";
                        $save = "imagepng";
                        //$thumb = rand(1000,99999999)."_".$imageName.".png";
                        $thumb = $imageName;
                        break;
                case 6: //bmp
                        $create = "imagecreatefrombmp";
                        $save = "imagegif";
                        //$thumb = rand(1000,99999999)."_".$imageName.".gif";
                        $thumb = $imageName;
                        break;
        }
                $im0 = @$create($file);
                if (!$im0 and $type !=6) {
                        $data = file_get_contents ($file);
                        $im0 = @imagecreatefromstring($data);
                }

                if ($im0)
                {
                        $im1 = imagecreatetruecolor($newWidth, $newHeight);
                        $bg = imagecolorallocate($im1,255,255,255);
                        imagefilledrectangle($im1,0,0,$newWidth, $newHeight,$bg);
                        imagecopyresampled($im1,$im0,0,0,0,0,$newWidth,$newHeight,$width,$height);
                        //$thumb = rand(1000,9999).".gif";
                        $thumbPath = "$images_path/$thumb";
                        $save($im1,$thumbPath);
                        imagedestroy($im1);
                        imagedestroy($im0);
                        chmod($thumbPath,0664);
                }
                return $thumb;
}
/*	//save logo
	function SaveProviderLogo($uploadedImage, $imageName){
	   $user_images = "./image";
		$user_size	= "40x40"; 
		$thumb = saveThumb($uploadedImage,$user_size,$user_images, $imageName);
	   return $thumb;
	}

	//save photo
	function SaveProviderPhoto($uploadedImage, $imageName){
	   $user_images = "./image";
		$user_size	= "260x150"; 
		$thumb = saveThumb($uploadedImage,$user_size,$user_images, $imageName);
	   return $thumb;
	}
*/	
	
	//save photo
	function THUMPCREATIONFUNCTION($uploadedImage, $imageName,$user_images,$user_size){
		$thumb = saveThumb($uploadedImage,$user_size,$user_images, $imageName);
		return $thumb;
	}
	
?>