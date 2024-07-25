<?php
$xml = simplexml_load_file('https://www.cbar.az/currencies/25.07.2024.xml');

$data = json_decode(json_encode($xml),true);




