<?php
// Create image instances
$src = imagecreatefromjpeg('php.jpg');
$dest = imagecreatetruecolor(178,108);
$w=81;
$h=108;
// Copy
imagecopy($dest, $src, 0, 0, ($w-178)/2, ($h-108)/2, 178, 108);

// Output and free from memory
header('Content-Type: image/gif');
imagegif($dest);

imagedestroy($dest);
imagedestroy($src);
?>