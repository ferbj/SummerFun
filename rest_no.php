<?php
//require_once '\plugins\Cmfcmf\OpenWeatherMap.php';
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;

require_once('plugins/Cmfcmf/vendor/autoload.php');
$lang='es';
$units='metric';

//$idplaya = -1;
if(isset($_GET['id'])) $idplaya = $_GET['id'];
//$json = "";

$json = '{ "beaches" : [';

$a = new stdClass();
$a->lat = '-6.8385667';
$a->lon = '-79.9376798';
$a->nombre ='Pimentel';

$beaches = array(
			array('lat'=> '-12.153916','lng'=> '-77.025337','nombre'=> 'Los Yuyos'),
			array('lat'=> '-12.145530','lng'=> '-77.026149','nombre'=> 'Los Pavos'),
			array('lat'=> '-12.161013','lng'=> '-77.026906','nombre'=> 'Agua Dulce'),
			array('lat'=> '-12.067933','lng'=> '-77.155238','nombre'=> 'Carpayo'),
			array('lat'=> '-12.212274','lng'=> '-77.018990','nombre'=> 'Villa'),
			array('lat'=> '-12.216014','lng'=> '-77.009011','nombre'=> 'Encantada'),
			array('lat'=> '-12.479131','lng'=> '-76.793511','nombre'=> 'Naplo'),
			array('lat'=> '-3.500670','lng'=> '-80.391752','nombre'=> 'Puerto Pizarro'),
			array('lat'=> '-8.075749','lng'=> '-79.119437','nombre'=> 'El Boquerón'),
			array('lat'=> '-8.0832702','lng'=> '-79.1254578','nombre'=> 'Huankarute')
		);

if(!isset($_GET['id']))
	foreach($beaches as $id => $beach){
		$owm = new OpenWeatherMap();
		$beach = $beaches[$id];
		$weather = $owm->getWeather(array('lat'=>$beach['lat'],'lon'=>$beach['lng']),$units,$lang,'3353661db4e4a9b023409e84c4f7b467');
		$json .= '{'.'"nombre" :"'  . $beach['nombre'] . '", "lat" :' . $beach['lat'] . ', "lng":' . $beach['lng'] . ', "temp" :"'. $weather->temperature->now . '", "velviento" :"'.$weather->wind->speed . '" , "dirvie" :"'.$weather->wind->direction .'" ,"hum" :"'.$weather->humidity.'" , "pres" :"' .$weather->pressure . '"},';
	}
else {
	$owm = new OpenWeatherMap();
		$beach = $beaches[$idplaya];
		$weather = $owm->getWeather(array('lat'=>$beach['lat'],'lon'=>$beach['lng']),$units,$lang,'3353661db4e4a9b023409e84c4f7b467');
		$json .= '{'.'"nombre" :"'  . $beach['nombre'] . '", "lat" :' . $beach['lat'] . ', "lng":' . $beach['lng'] . ', "temp" :"'. $weather->temperature->now . '", "velviento" :"'.$weather->wind->speed . '" , "dirvie" :"'.$weather->wind->direction .'" ,"hum" :"'.$weather->humidity.'" , "pres" :"' .$weather->pressure . '"},';
}

	$json = trim($json,',');
$json .= ']}';

header('Content-Type: application/json');
print $json;




?>