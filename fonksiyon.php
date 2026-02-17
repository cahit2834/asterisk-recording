<?php

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

