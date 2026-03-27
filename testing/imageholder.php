<?php
require_once('../vendor/autoload.php');
use Da\QrCode\QrCode;
use GDText\Box;
use GDText\Color;
$qrCode = (new QrCode('This is my text'))
    ->setSize(250)
    ->setMargin(5);

// now we can display the qrcode in many ways
// saving the result to a file:

$qrCode->writeFile(__DIR__ . '/code.jpg');

$img 			= imagecreatefromjpeg('..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'template.jpg');
$black 			= imagecolorallocate($img, 0, 0, 0);
$white 			= imagecolorallocate($img, 255, 255, 255);
list($width, $height) = getimagesize('..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'template.jpg');

//$qr = imagecreatefromjpeg( __DIR__ .DIRECTORY_SEPARATOR.'code.jpeg');
$qr = imagecreatefrompng('code.png');
list($bottom_width, $bottom_height) = getimagesize('code.png');
imagecopy($img, $qr, 230, 600, 0, 0, $bottom_width, $bottom_height);


putenv('GDFONTPATH=' . realpath('.'));
$box = new Box($img);
$box->setFontFace(__DIR__.'/gv.ttf');
$box->setFontColor(new Color(250, 236, 175));
$box->setFontSize(54);
$box->setBox(0,325,$width, 20);
$box->setTextAlign('center', 'center');
$box->draw("Muhammad Abduh N, S.Kom.");

$box = new Box($img);
$box->setFontFace(__DIR__.'/gv.ttf');
$box->setFontColor(new Color(250, 236, 175));
$box->setFontSize(54);
$box->setBox(0,469,$width, 20);
$box->setTextAlign('center', 'center');
$box->draw("Faramitha Jak Dewi, M.T.");

$box = new Box($img);
$box->setFontFace(__DIR__.'/lato.ttf');
$box->setFontColor(new Color(250, 236, 175));
$box->setFontSize(25);
$box->setBox(0,550,$width, 20);
$box->setTextAlign('center', 'center');
$box->draw("Minggu, 18 Januari 2021");

header('Content-type: image/jpeg');
imagejpeg($img);
imagedestroy($img);
#header('Content-Type: '.$qrCode->getContentType());
#echo $qrCode->writeString();