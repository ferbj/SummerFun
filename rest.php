<?php
//require_once '\plugins\Cmfcmf\OpenWeatherMap.php';
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;

require_once('plugins/Cmfcmf/vendor/autoload.php');
$lang='es';
$units='metric';

//$idplaya = -1;
if(isset($_POST['id'])) $idplaya = $_POST['id'];
//$json = "";
$json = '{ "beaches" : [';

$a = new stdClass();
$a->lat = '-6.8385667';
$a->lon = '-79.9376798';
$a->nombre ='Pimentel';

$beaches = array(
			array('lat'=> '-6.8385667','lng'=> '-79.9376798','nombre'=> 'Pimentel'),
			array('lat'=> '-6.849837','lng'=> '-79.937633','nombre'=> 'Las Rocas'),
			array('lat'=> '-6.878607','lng'=> '-79.92499','nombre'=> 'Santa Rosa'),
			array('lat'=> '-6.933170','lng'=> '-79.866226','nombre'=> 'Puerto Eten'),
			array('lat'=> '-6.768344','lng'=> '-79.972566','nombre'=> 'San José'),
			array('lat'=> '-6.959094','lng'=> '-79.851197','nombre'=> 'Los Lobos'),
			array('lat'=> '-6.669829','lng'=> '-80.080443','nombre'=> 'Naylamp'),
			array('lat'=> '-6.886118','lng'=> '-79.919041','nombre'=> 'Hondo'),
			array('lat'=> '-6.903357','lng'=> '-79.89936','nombre'=> 'Monsefú'),
			array('lat'=> '-6.951439','lng'=> '-79.861406','nombre'=> 'Media Luna'),
			array('lat'=> '-4.103835','lng'=> '-81.054779','nombre'=> 'Máncora'), //PIURA
			array('lat'=> '-4.132647','lng'=> '-81.102343','nombre'=> 'Vichayito'),
			array('lat'=> '-4.176102','lng'=> '-81.130362','nombre'=> 'Órganos'),			
			array('lat'=> '-5.009676','lng'=> '-81.066617','nombre'=> 'Colán'),
			array('lat'=> '-4.452993','lng'=> '-81.286127','nombre'=> 'Lobitos'),
			array('lat'=> '-4.250222','lng'=> '-81.230774','nombre'=> 'Cabo Blanco'),
			array('lat'=> '-5.130975','lng'=> '-81.171469','nombre'=> 'Yacila'),
			array('lat'=> '-4.114521','lng'=> '-81.079810','nombre'=> 'Pocitas'),
			array('lat'=> '-3.955955','lng'=> '-80.955890','nombre'=> 'Punta Sal'), //TUMBES
			array('lat'=> '-3.678105','lng'=> '-80.676531','nombre'=> 'Zorritos'), 
			array('lat'=> '-8.104030','lng'=> '-79.106577','nombre'=> 'Huanchaco'), //LA LIBERTAD
			array('lat'=> '-7.398315','lng'=> '-79.571873','nombre'=> 'Pacasmayo'),
			array('lat'=> '-8.223446','lng'=> '-78.980916','nombre'=> 'Salaverry'),
			array('lat'=> '-7.923984','lng'=> '-79.307979','nombre'=> 'El Brujo')
		);

if(!isset($_POST['id']))
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