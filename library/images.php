<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 06/08/2017
 * Time: 16:43
 */

class Images {

    /**
     * Resize an image and keep the proportions
     * @param string $file
     * @param integer $max_width
     * @param integer $max_height
     */
    static public function resizeImage($file, $max_width, $max_height){

        list($orig_width, $orig_height) = getimagesize($file);

        $width = $orig_width;
        $height = $orig_height;

        # taller
        if ($height > $max_height) {
            $width = ($max_height / $height) * $width;
            $height = $max_height;
        }

        # wider
        if ($width > $max_width) {
            $height = ($max_width / $width) * $height;
            $width = $max_width;
        }

        /* read binary data from image file */
        $imgString = file_get_contents($file);

        /* create image from string */
        $image = imagecreatefromstring($imgString);
        $tmp = imagecreatetruecolor($width, $height);
        imagecopyresampled($tmp, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);

        switch (strtolower(substr($file,strlen($file) - 3, strlen($file)))) {
            case 'jpg':
                imagejpeg($tmp, $file, 100);
                break;
            case 'png':
                imagepng($tmp, $file, 0);
                break;
            case 'gif':
                imagegif($tmp, $file);
                break;
            default:
                break;
        }

        imagedestroy($image);
        imagedestroy($tmp);
    }

    /**
     * Rotate an image
     * @param string $img
     * @param integer|boolean $angle
     */
    static public function rotateImage($img, $angle = false) {
        if($angle == false) {
            return;
        }

        //chmod(BASE_PATH . 'www/Medias/uploads', 777);
        //chmod($img, 777);

//        die('convert ' . escapeshellarg($img) . ' -rotate ' . escapeshellarg($angle) . ' ' . escapeshellarg($img));
        exec('convert ' . escapeshellarg($img) . ' -rotate ' . escapeshellarg($angle) . ' ' . escapeshellarg($img));
    }
}
