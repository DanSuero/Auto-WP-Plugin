<?php


//Auto Class Loader
include_once "autoloader.php";

$trucks = new ImportXML();
$trucks->set_xml_URL("https://clients.automanager.com/0254448e2be24576857eb0d1e26a96bf/inventory.xml?ID=ee30fb1027&VehicleCategory=Passenger&Photos=1&Features=1");

ImportXML::inserting_trucks($_GET["import"]);

?>