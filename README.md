İssabel Pbx & Elastiks & Asterisk çağrı kayıt dosyalarını wav formatından mp3 formatına dönüştürmek.


*Kodun Çalıştırıldığı Sistem

-İssabel Pbx



*Kadun Yaptıkları

- Çağrı kayıt dosyalarını wav formatından mp3 formatına dönüştürür.
  
- Sql cdr tablosundaki kayıtları mp3 olarak günceller.
  
- Sql kayıtlarındaki kayıt dizin hatalarını gidererek standart hale getirir
  
- Aynı Unic id ye sahip kayıtlarda boş olan recordingfile stununa aynı dosya ismini yazarak dinleme işlemini kolaylaştırır.


*Gereksinimler

-Lame yüklü olmalıdır, yum install lame kodu ile yükleyebilirsiniz.



*Nasıl Çalıştırılır

-Db.php dosyanız ile db bağlantısını yapınız

-Zamanlanmış görevlerden mp3 dönüştürme dosyasını 15 dk da bir (Veya kendi sisteminizin yoğunluğuna göre daha az) çalışıcak şekilde ayarlayınız

wget 127.0.0.1/mp3-donustur.php 

rm -f /root/mp3-donustur*

-Monitoring klasöründen kayıtları kontrol ediniz.

- lame --cbr -b 12k satırındaki 12k kısmından mp3 sıkıştırma oranını değiştirebilirsiniz.



[Buyatek](https://Buyatek.com)

[Sizinsayfaniz.com](https://Sizinsayfaniz.com)
