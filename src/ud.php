<?php
/**
* Name: 		UrbanDictionary.com Workflow for Alfred 2
* Author: 		Danylo Kostyshyn (@danylokostyshyn)
* Revised: 		3/25/2013
* Version:		0.1
*/

require_once('workflows.php');
$w = new Workflows();

$query = implode( ' ', array_slice( $argv, 1 ) );
$query = urlencode( $query );

$url = "http://api.urbandictionary.com/v0/define?term=$query";
$suggestions = $w->request( $url );

$suggestions = json_decode( $suggestions );

foreach( $suggestions->list as $suggest ):
$w->result( 
	'na', 
	$query, 
	$suggest->definition, 
	$suggest->example, 
	'icon.png', 
	'yes' );
endforeach;

echo $w->toxml();
