<?php

include "-db.php";
include "fonksiyon.php";
	function dosya_uzanti_oku($dosya_adi) {
    return substr(strrchr($dosya_adi,'.'),1);
}


		$sayi=0;
$conn =  @mysqli_connect(dbhost, dbuser, dbpass, dbnamecdr);
			$GLOBALS["db"] =  @mysqli_connect(dbhost, dbuser, dbpass, dbnamecdr);
            $sql = "SELECT * FROM  cdr where 
			CHAR_LENGTH(recordingfile)>2 and recordingfile LIKE '%.wav'		  
			 order by calldate 
			desc Limit 0,500";
            $result = @mysqli_query($db, $sql);	
            while($row = @mysqli_fetch_assoc($result)) 
	{
		
		
		$tarih=$row[calldate];
		$tarih = explode('-',$tarih);
		$gun=$tarih[2];
		$gun= explode(' ',$gun);
		
		$recordingfile=$row["recordingfile"];
		$kontrol=dosyakontrol($recordingfile,"/var/");
		
		$dosyaadi='recording/'.$tarih[0].'/'.$tarih[1].'/'.$gun[0].'/'.$row['recordingfile'];
		//echo $dosyaadi;echo "<br>";
		
		if($kontrol=="var")
		{
					$dosyaadi=dosyacevir($row["recordingfile"]);
					$uzanti=dosya_uzanti_oku("$dosyaadi");
					echo $uzanti;
					$dosyaboyutham= round(filesize("$dosyaadi"));
					$dosyatarih =$row[recordingfile];
					$dosyatarih = explode('/',$dosyatarih);
					$dosyaadikaydedilecek=wavmp3($dosyatarih[8]);
					$dosyaadifile='recording/'.$tarih[0].'/'.$tarih[1].'/'.$gun[0].'/'.$dosyaadikaydedilecek;
					if($uzanti=="wav" and $dosyaboyutham>1)
			{
				echo $sayi; echo " ";
				echo $dosyaadi;
				echo $dosyaadifile;
				echo "-+-";
				echo $dosyaadikaydedilecek;
				echo "<br><br>";
				
				
					exec( "lame --cbr -b 12k $dosyaadi $dosyaadifile" ,$output, $return);
					if (!$return) {
					$sqld = "UPDATE cdr
					SET recordingfile='$dosyaadikaydedilecek'  WHERE recordingfile='$recordingfile'";	
					if ($GLOBALS["db"]->query($sqld) === FALSE) {
					echo "Error: " . $sqld . "<br>" . $GLOBALS["db"]->error;}
					unlink("$dosyaadi");
					} else {
					echo "cevrilemedi";
					}
				
			}
		
			
		}else{
				
					$uzanti=dosya_uzanti_oku("$dosyaadi");
					//echo $uzanti;
					$dosyaboyutham= round(filesize("$dosyaadi"));
					$dosyaadikaydedilecek=wavmp3($row['recordingfile']);
					$dosyaadifile='recording/'.$tarih[0].'/'.$tarih[1].'/'.$gun[0].'/'.$dosyaadikaydedilecek;
					if($uzanti=="wav" and $dosyaboyutham>1)
			{
				echo $sayi; echo " ";
				echo $dosyaadi;
				echo $dosyaadifile;
				echo "---";
				echo $dosyaadikaydedilecek;
				echo "<br><br>";
					exec( "lame --cbr -b 12k $dosyaadi $dosyaadifile" ,$output, $return);
					if (!$return) {
					$sqld = "UPDATE cdr
					SET recordingfile='$dosyaadikaydedilecek'  WHERE recordingfile='$recordingfile'";	
					if ($GLOBALS["db"]->query($sqld) === FALSE) {
					echo "Error: " . $sqld . "<br>" . $GLOBALS["db"]->error;}
					unlink("$dosyaadi");
					} else {
					echo "cevrilemedi";
					}
					
				
				
				
			}
				
		}
		
	$sayi=$sayi+1;	
	}
	
	
	echo "<br>---<br>";
		
			$conn =  @mysqli_connect(dbhost, dbuser, dbpass, dbnamecdr);
			$GLOBALS["db"] =  @mysqli_connect(dbhost, dbuser, dbpass, dbnamecdr);
            $sql = "SELECT * FROM  cdr 	where CHAR_LENGTH(recordingfile)<2	 and  calldate>'$bugun' and calldate<'$yarin' 
			 order by calldate 
			desc Limit 0,500";
            $result = @mysqli_query($conn, $sql);	
            while($row = @mysqli_fetch_assoc($result))  {
		
				$recordingfile="";
				$uni=$row["uniqueid"];
				
				$sql2 = "SELECT * FROM cdr where 	
				CHAR_LENGTH(recordingfile)>2 and uniqueid='$uni'  and  calldate>'$bugun' and calldate<'$yarin'		  
				order by calldate 
				desc Limit 0,1";
				$result2 = @mysqli_query($conn, $sql2);	
				$row2 = @mysqli_fetch_assoc($result2);
				
				
				echo $row["src"];
				echo " - ";
				echo $row["uniqueid"];
				echo " - ";
				echo $row2["recordingfile"];
				$recordingfile=$row2["recordingfile"];
					
		 $kayitguncelle=guncelle("cdr","recordingfile='$recordingfile'","uniqueid='$uni' and  calldate>'$bugun' and calldate<'$yarin'	");
	
				
				echo "<br>";
			}

	
