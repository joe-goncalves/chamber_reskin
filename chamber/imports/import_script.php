<?php
$file = file_get_contents("memberCat.xml");
$row_delimiter = "</Table><Table>";
$column_name_array = array("pkid","memberCatName");

sqlServerXMLtoCSV($file, "memberCat.txt", $row_delimiter, $column_name_array);



function sqlServerXMLtoCSV($file, $file_name, $row_delimiter, $column_name_array){	
	$row_array = explode($row_delimiter, $file);
	$tsv_array = array();
	foreach ($row_array as $key=>$row){
		$temp = $row;
		foreach($column_name_array as $index => $col_nm){
			$temp=str_replace("</".$col_nm.">","",str_replace("<".$col_nm.">", "|", $temp));
		}
		$tsv_array[]=$temp."\n";
	} 
	$file_holder=fopen($file_name, 'w'); 
 	foreach ($tsv_array as $index => $row){
 		$write2 = fwrite($file_holder, $row);
 		//if($write2)echo 'row' . $index . " written<br/>";
 	}
 	fclose($file_holder);
 	header('Content-Disposition: attachment; filename="'.$file_name.'"');
	readfile($file_name);
	exit();
}
?>




