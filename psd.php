<?PHP




$im = new Imagick(dirname(__FILE__)."/Mundial_face.psd");
$i=0;


$html = '<div style="position: relative; width:730px; height: 323px;">';
$zindex = 1;
foreach($im as $layer) {

	$fileName = "layer" . ++$i . ".png";
  	$layer->writeImage(dirname(__FILE__)."/" . $fileName);
  
  
	$dimensions = $layer->getImageGeometry();
	$pagedata 	= $layer->getImagePage();
	
	$width = $dimensions['width'];
	$height = $dimensions['height'];
	
	#echo 'X:'.$pagedata["x"].", Y: ".$pagedata["y"]."<br/>";
	#echo 'W:'.$width.', H:'.$height.'<br />';
	$html .= '<div style="position: absolute; left: '.$pagedata["x"].'px; top:'.$pagedata["y"].'; z-index: '.$zindex.'; width: '.$width.'px; height: '.$height.'px;background-image: url(http://dev.radiobiobio.cl/'.$fileName.');"></div>';
  //
  $zindex++;
}
$html .= '/<div>';
echo $html;


?>