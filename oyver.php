<?php require 'database.php';


$GelenCevap = Filtrele($_POST["cevap"]);
$KontrolSorgusu = $db->prepare("SELECT * FROM oy_kullananlar WHERE ip_adresi =? AND tarih >=?");
$KontrolSorgusu->execute([$IPAdresi,$ZamaniGeriAl]);
$KontrolSayisi = $KontrolSorgusu->rowCount();

if($KontrolSayisi>0):
  echo "HATA<br/>";
  echo "Daha Önce Oy Kullanmışsınız. Lütfen en az 24 saat sonra tekrar deneyiniz.<br/>";
  echo "Anasayfaya Dönmek İçin <a href='index.php' class='link-primary text-decoration-none'>tıklayınız.</a>";
  $db 	= null;
	die();

else:
  if($GelenCevap==1){
    $Guncelle = $db->prepare("UPDATE anket SET oysayisi_bir=oysayisi_bir + 1, oysayisi_toplam= oysayisi_toplam+1");
    $Guncelle->execute();

  }elseif($GelenCevap==2){
    $Guncelle = $db->prepare("UPDATE anket SET oysayisi_iki=oysayisi_iki + 1, oysayisi_toplam= oysayisi_toplam+1");
    $Guncelle->execute();

  }elseif($GelenCevap==3){
    $Guncelle = $db->prepare("UPDATE anket SET oysayisi_uc=oysayisi_uc + 1, oysayisi_toplam= oysayisi_toplam+1");
    $Guncelle->execute(); $Guncelle->execute([$IPAdresi, $ZamaniGeriAl]);

  }else{
    echo "HATA<br/>";
    echo "Cevap Kaydı Bulunamıyor.<br/>";
    echo "Anasayfaya Dönmek İçin <a href='index.php' class='link-primary text-decoration-none'>tıklayınız.</a>";
    $db 	= null;
    die();

  }


$Ekle = $db->prepare("INSERT INTO oy_kullananlar (ip_adresi, tarih) values (?,?)");
$Ekle->execute([$IPAdresi,$ZamanDamgasi]);
$EkleKontrol = $Ekle->rowCount();

if($EkleKontrol>0){
  echo "Vermiş olduğunuz oy sisteme Kaydedildi.<br/>";
  echo "Anasayfaya Dönmek İçin <a href='index.php' class='link-primary text-decoration-none'>tıklayınız.</a>";
}else{
    echo "HATA<br/>";
    echo "İşlem Sırasında bir hata oluştu. Lütfen Daha Sonra tekrar deneyiniz.<br/>";
    echo "Anasayfaya Dönmek İçin <a href='index.php' class='link-primary text-decoration-none'>tıklayınız.</a>";

}

endif;

?>

<?php
$db = null;
?>