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
  $AnketSorgusu = $db->prepare("SELECT * FROM anket LIMIT 1");
  $AnketSorgusu->execute();
  $KayitSayisi = $AnketSorgusu->rowCount();
  $Kayit = $AnketSorgusu->fetch(PDO::FETCH_ASSOC);

  if ($KayitSayisi > 0) {
  ?>
  
    <div class="container">
    <form action="oyver.php" method="post">
      <table class="table table-secondary">
        <thead>
          <tr>
            <td class="text-dark"colspan="2"><?php echo $Kayit["soru"]; ?></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row"><input type="radio" value="1" name="cevap" class="radio"></th>
            <td class="w-100"><?php echo $Kayit["cevap_bir"]; ?></td>
          </tr>
          <tr>
            <th scope="row"><input type="radio" value="1" name="cevap" class="radio"></th>
            <td class="w-100"><?php echo $Kayit["cevap_iki"]; ?></td>

          </tr>
          <tr>
            <th scope="row"><input type="radio" value="1" name="cevap" class="radio"></th>
            <td class="w-100"><?php echo $Kayit["cevap_uc"]; ?></td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" value="Gönder" class="btn btn-success"></td>
          </tr>
          <tr>
            <td colspan="2"><a href="sonuclar.php"class="link-primary text-decoration-none">Anket Sonuçlarını Göster</a></td>
          </tr>
        </tbody>
      </table>
      </form>
    </div>
  <?php
  }else {
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