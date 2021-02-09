<?php

//echo "HIIII !!!!!!!!!!!";
$folderPath= "../../for_download_folder/";

function deleteAll($str) {
	//echo "<br>";
	//echo "IN DELETE ALL FUNCTION....";
    //It it's a file.
    if (is_file($str)) {
        //Attempt to delete it.
        return unlink($str);
    }
    //If it's a directory.
    elseif (is_dir($str)) {
        //Get a list of the files in this directory.
        $scan = glob(rtrim($str,'/').'/*');
        //Loop through the list of files.
        foreach($scan as $index=>$path) {
            //Call our recursive function.
            deleteAll($path);
        }
        //Remove the directory itself.
        return @rmdir($str);
    }
}

//call our function
deleteAll($folderPath); 

mkdir("../../for_download_folder", 0775);
?>