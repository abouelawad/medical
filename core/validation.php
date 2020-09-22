<?php 

$errors = [];
$sucsess = "";

// 1 - isRequired
function isRequired( $input ): bool
	{
		return (!empty($input));	
	}
// 2 - isString
function isString( $input ): bool
	{
                        
		return (gettype($input) === "string");
	}
// 3 - isLessThan
function isLessThan($input , $maxLength)
	{
		return (strLen($input)<= $maxLength);
	}	

function isEmail($input)
	{
 		return (filter_var($input, FILTER_VALIDATE_EMAIL)) ;
	}

	function getErrors(string $key){
		global $errors ;

		if (isset($errors[$key])){
		echo "<span class='text-danger'>(" . $errors[$key] . ")</span>" ;
		}
	}



	


