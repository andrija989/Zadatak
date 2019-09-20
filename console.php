#!/usr/bin/env php
<?php
// console.php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();

$poligon1 = [
	[210,10],
	[250,190],
	[160,210]
];

$poligon2 = [
	[400,20],
	[250,170],
	[170,210],
	[200,40]
];

$poligon3 = [
	[50,20],
	[40,10],
	[170,60],
	[48,40]
];

$obimiPoligona = [];
function stranice($poligon) {
	$noviNiz = [];
	$obim = 0;
	for($i = 0; $i < count($poligon); $i++) {
		if($i < count($poligon) - 1){
			$x = ( pow($poligon[$i+1][0]-$poligon[$i][0],2));
			$y = ( pow($poligon[$i+1][1]-$poligon[$i][1],2));
			$noviNiz[] += round( sqrt($x + $y) );
		} else {
			$x = ( pow($poligon[0][0]-$poligon[$i][0],2));
			$y = ( pow($poligon[0][1]-$poligon[$i][1],2));
			$noviNiz[] += round( sqrt($x + $y) );
		}
		
	}
	return $noviNiz;
}
$poligoni = [];
$poligoni[] = stranice($poligon1);
$poligoni[] = stranice($poligon2);
$poligoni[] = stranice($poligon3);
var_dump($poligoni);

function ObimPoligona($niz)
{
	$nizObima = [];
	foreach($niz as $objekat) {
		$nizObima[] += array_sum($objekat);
	}
	arsort($nizObima);
	var_dump($nizObima);
	return $nizObima;
}

ObimPoligona($poligoni);

$application->run();

