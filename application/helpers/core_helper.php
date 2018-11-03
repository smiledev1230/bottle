<?php 



function print_pre($content){

    echo "<pre>";

    print_r($content);

    echo "</pre>";

}

function get_file_extension($filename){
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	return $ext;
}



?>