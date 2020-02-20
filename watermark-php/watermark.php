<?php

/*
 * This script places a watermark on a given jpeg, png or gif image.
 *
 * Use the script as follows in your HTML code:
 * <img src="watermark.php?image=image.jpg&watermark=watermark.png" />
 *
 * Visit http://www.htmlguard.com for more great scripts!
 */

  // loads a png, jpeg or gif image from the given file name
  function imagecreatefromfile($image_path) {
    // retrieve the type of the provided image file
    list($width, $height, $image_type) = getimagesize($image_path);

    // select the appropriate imagecreatefrom* function based on the determined
    // image type
    switch ($image_type)
    {
      case IMAGETYPE_GIF: return imagecreatefromgif($image_path); break;
      case IMAGETYPE_JPEG: return imagecreatefromjpeg($image_path); break;
      case IMAGETYPE_PNG: return imagecreatefrompng($image_path); break;
      default: return ''; break;
    }
  }

  // load source image to memory
  $image = imagecreatefromfile($_FILES["fileToUpload"]["tmp_name"]);
  if (!$image) die('Unable to open image');

  // load watermark to memory
  $source = imagecreatefromfile("watermark.png");
  if (!$image) die('Unable to open watermark');

  // calculate the position of the watermark in the output image (the
  // watermark shall be placed in the lower right corner)
 /* $watermark_pos_x = imagesx($image) - imagesx($watermark) - 8;
  $watermark_pos_y = imagesy($image) - imagesy($watermark) - 10;
  */

if(imagesx($image)<imagesy($image))
    $min=imagesx($image);
else
    $min=imagesy($image);



$watermark = imagecreatetruecolor($min, $min);
 imagealphablending($watermark, false);
 imagesavealpha($watermark,true);
 $transparent = imagecolorallocatealpha($watermark, 255, 255, 255, 127);


// Resize
imagecopyresized($watermark, $source, 0, 0, 0, 0, $min, $min, 3000, 3000);





  // merge the source image and the watermark
  imagecopy($image, $watermark,  imagesx($image)-$min, imagesy($image)-$min, 0, 0,
    imagesx($watermark), imagesy($watermark));

  // output watermarked image to browser
  header('Content-Type: image/jpeg');
  imagejpeg($image, NULL, 100);  // use best image quality (100)

  // remove the images from memory
  imagedestroy($image);
imagedestroy($source);
  imagedestroy($watermark);

?>