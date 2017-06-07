<?php
namespace App;

class Zipfile{


public static function decyptFileNames($fileNames){

	$newFileNames = [];

	foreach($fileNames as $fileName){
		$newFileNames[] = self::decrypt($fileName, env('FILE_ENCRYPTION_KEY',''));
	}

	return $newFileNames;

}


public static function decrypt($value, $key)
{
 $value = base64_decode($value);
 $value = substr($value, 0, strlen($key));
 return $value;
}

}