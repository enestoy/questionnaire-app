<?php require 'database.php'; ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Web Anket</title>
</head>

<body style="background-color:SpringGreen">

  <?php
  $AnketSorgusu 	= $db->prepare("SELECT * FROM anket LIMIT 1");
	$AnketSorgusu->execute();
	$KayitSayisi	= $AnketSorgusu->rowCount();
	$Kayit 			= $AnketSorgusu->fetch(PDO::FETCH_ASSOC);

  $ToplamOy 		= $Kayit["oysayisi_toplam"];
	$AnketBirinci 	= $Kayit["oysayisi_bir"];
	$AnketIkinci 	= $Kayit["oysayisi_iki"];
	$AnketUcuncu 	= $Kayit["oysayisi_uc"];
	
	$BirinciOranYuzde 	= ($AnketBirinci/$ToplamOy)*100;
	$IkinciOranYuzde 	= ($AnketIkinci/$ToplamOy)*100;
	$UcuncuOranYuzde 	= ($AnketUcuncu/$ToplamOy)*100;
	
	$BirinciOran 	= number_format($BirinciOranYuzde, 2, ",", "");
	$IkinciOran 	= number_format($IkinciOranYuzde, 2, ",", ""); 
	$UcuncuOran 	= number_format($UcuncuOranYuzde, 2, ",", "");

  if ($KayitSayisi > 0) {
  ?>
  
    <div class="container">
      <table class="table table-secondary">
        <thead>
          <tr>
            <td class="text-dark"colspan="2"><?php echo $Kayit["soru"]; ?></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">%<?php echo $BirinciOran; ?></th>
            <td class="w-100"><?php echo $Kayit["cevap_bir"]; ?></td>
          </tr>
          <tr>
            <th scope="row">%<?php echo $IkinciOran; ?></th>
            <td class="w-100"><?php echo $Kayit["cevap_iki"]; ?></td>

          </tr>
          <tr>
            <th scope="row">%<?php echo $UcuncuOran; ?></th>
            <td class="w-100"><?php echo $Kayit["cevap_uc"]; ?></td>
          </tr>
          <tr>
            <td colspan="2"><a href="index.php"class="link-primary text-decoration-none">Anasayfaya Dön.</a></td>
          </tr>
        </tbody>
      </table>

    </div>
  <?php
  } else {
    header("Location:index.php");
    exit();


  }
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

<?php
$db = null;
?>