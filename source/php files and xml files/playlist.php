<?php
$path_to_image_dir = 'C:\xampp\htdocs\files'; // relative path to your directory
 
$xml_string = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<videos> 
</videos>
XML;
 
$xml_generator = new SimpleXMLElement($xml_string);
 
if ( $handle = opendir( $path_to_image_dir ) ) 
{
    while (false !== ($file = readdir($handle))) 
    {
        if ( is_file($path_to_image_dir.'/'.$file) ) 
        {
           list( $width, $height ) = getimagesize($path_to_image_dir.'/'.$file);	
           $image = $xml_generator->addChild('video');  
           $image->addAttribute('url', $path_to_image_dir.'/'.$file);    
           $image->addAttribute('desc', $file);      
        }
    }
    closedir($handle);
}
 $file = fopen('C:\xampp\htdocs\playlist.xml','w');
fwrite($file, $xml_generator->asXML());
fclose($file);
?>