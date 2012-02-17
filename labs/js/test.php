<?php
$location_full_name = array("Google, Inc.", "Siku-Siku.com");
$location_type = array("Google headquarter", "Virtual address");
$ret = array("full_name" => $location_full_name, "type" => $location_type);
echo json_encode($ret);
?>