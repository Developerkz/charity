<?php
/*
	AutoLoad of Objects
*/
function __autoload($class_name)
{

	//List of path where have and need Objects
    $array_paths = array('models/','components/','controllers/','functions/');


    //Loop of all file which we need
    foreach ($array_paths as $path) {

    	//Full Path to File
        $path = P . $path . $class_name . '.php';

        //include File
        if (is_file($path)) {include_once $path;}
    }
    //endLoop

}
