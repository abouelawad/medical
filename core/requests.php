<?php 


//prepare input from sessions
function prepareInput($input): string
{
	return trim(htmlspecialchars($input));
}


function redirect($url) 
{
	 header("location: " . URL . "$url");

}

function aRedirect($url)
{
	header("location: " . AURL . "$url");
}

function typeCount()
{
	static $i = 0;
	
	$i++;
	return $i;
}

function abort()
{
	header("location: " . AURL . "404.php");
}


