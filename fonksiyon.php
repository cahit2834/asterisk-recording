<?php

date_default_timezone_set('Europe/Istanbul');

$bugunsaat=date("Y-m-d H:i:s");

if ($_POST['bugun']==""){
$bugun=date("Y-m-d");
}else{
$bugun=$_POST['bugun'];
}

if ($_POST['yarin']==""){
$yarin = strtotime('1 day',strtotime($bugun));
$yarin = date('Y-m-d' ,$yarin );
}else{
$yarin=$_POST['yarin'];
}


function dosyacevirkisa($gelen){
		  $gelen=str_replace('/var/spool/asterisk/monitor/', '', $gelen);
		  return $gelen;
		}

function wavmp3($gelen){
		  $gelen=str_replace('.wav', '.mp3', $gelen);
		  return $gelen;
		}

	function guncelle($tablo,$degisiklik,$kosul){
			$sql = "UPDATE $tablo
			SET $degisiklik
			WHERE $kosul";	
			if ($GLOBALS["db"]->query($sql) === FALSE) {
			echo "Error: " . $sql . "<br>" . $GLOBALS["db"]->error;
			}
	}

