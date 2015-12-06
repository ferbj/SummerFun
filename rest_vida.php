<?php
//require_once '\plugins\Cmfcmf\OpenWeatherMap.php';
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;

require_once('plugins/Cmfcmf/vendor/autoload.php');
$lang='es';
$units='metric';

//$idvida = -1;
if(isset($_GET['id'])) $idvida = $_GET['id'];
//$json = "";

$json = '{ "vidas" : [';

$vidas = array(
			array('lat'=> '-6.8385667','lng'=> '-79.9376798','nombre'=> 'Salvataje Pimentel'),
			array('lat'=> '-6.849837','lng'=> '-79.937633','nombre'=> 'Salvataje Las Rocas'),
			array('lat'=> '-6.878607','lng'=> '-79.92499','nombre'=> 'Salvataje Santa Rosa'),
			array('lat'=> '-6.933170','lng'=> '-79.866226','nombre'=> 'Salvataje Puerto Eten'),
			array('lat'=> '-6.768344','lng'=> '-79.972566','nombre'=> 'Salvataje San José'),
			array('lat'=> '-6.959094','lng'=> '-79.851197','nombre'=> 'Salvataje Los Lobos'),
			array('lat'=> '-6.669829','lng'=> '-80.080443','nombre'=> 'Salvataje Naylamp'),
			array('lat'=> '-6.886118','lng'=> '-79.919041','nombre'=> 'Salvataje Hondo'),
			array('lat'=> '-6.903357','lng'=> '-79.89936','nombre'=> 'Salvataje Monsefú'),
			array('lat'=> '-6.951439','lng'=> '-79.861406','nombre'=> 'Salvataje Media Luna'),
			array('lat'=> '-4.103835','lng'=> '-81.054779','nombre'=> 'Salvataje Máncora'), //PIURA
			array('lat'=> '-4.132647','lng'=> '-81.102343','nombre'=> 'Salvataje Vichayito'),
			array('lat'=> '-4.176102','lng'=> '-81.130362','nombre'=> 'Salvataje Órganos'),			
			array('lat'=> '-5.009676','lng'=> '-81.066617','nombre'=> 'Salvataje Colán'),
			array('lat'=> '-4.452993','lng'=> '-81.286127','nombre'=> 'Salvataje Lobitos'),
			array('lat'=> '-4.250222','lng'=> '-81.230774','nombre'=> 'Salvataje Cabo Blanco'),
			array('lat'=> '-5.130975','lng'=> '-81.171469','nombre'=> 'Salvataje Yacila'),
			array('lat'=> '-4.114521','lng'=> '-81.079810','nombre'=> 'Salvataje Pocitas'),
			array('lat'=> '-3.955955','lng'=> '-80.955890','nombre'=> 'Salvataje Punta Sal'), //TUMBES
			array('lat'=> '-3.678105','lng'=> '-80.676531','nombre'=> 'Salvataje Zorritos'), 
			array('lat'=> '-8.104030','lng'=> '-79.106577','nombre'=> 'Salvataje Huanchaco'), //LA LIBERTAD
			array('lat'=> '-7.398315','lng'=> '-79.571873','nombre'=> 'Salvataje Pacasmayo'),
			array('lat'=> '-8.223446','lng'=> '-78.980916','nombre'=> 'Salvataje Salaverry'),
			array('lat'=> '-7.923984','lng'=> '-79.307979','nombre'=> 'Salvataje El Brujo')
		);

if(!isset($_GET['id']))
	foreach($vidas as $id => $vida){
		$owm = new OpenWeatherMap();
		$vida = $vidas[$id];
		$weather = $owm->getWeather(array('lat'=>$vida['lat'],'lon'=>$vida['lng']),$units,$lang,'3353661db4e4a9b023409e84c4f7b467');
		$json .= '{'.'"nombre" :"'  . $vida['nombre'] . '", "lat" :' . $vida['lat'] . ', "lng":' . $vida['lng'] .'},';
	}
else {
	$owm = new OpenWeatherMap();
		$vida = $vidas[$idvida];
		$weather = $owm->getWeather(array('lat'=>$vida['lat'],'lon'=>$vida['lng']),$units,$lang,'3353661db4e4a9b023409e84c4f7b467');
		$json .= '{'.'"nombre" :"'  . $vida['nombre'] . '", "lat" :' . $vida['lat'] . ', "lng":' . $vida['lng'] .'},';
}
$json = trim($json,',');
$json .= ']}';

header('Content-Type: application/json');
print $json;




?>