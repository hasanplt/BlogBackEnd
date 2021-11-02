<?php 
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İNDEX</title>
</head>
<body>
    <?php 
    $blogsor=$db->prepare("SELECT * FROM blog where blog_id=:id");
    $blogsor->execute(array(
        "id" => $_GET['id']
    ));
    ?>
    <a href="logout.php">Kullanıcı Çıkışı Yap</a><br><br>
    <a href="index.php">Anasayfaya dön</a><br><br><br><br>
    YAZINI DÜZENLE: <br> 
    <hr>
    <?php 
    while($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC)){
        $zaman = $blogcek['blog_zaman'];
        $zaman = strtotime($zaman);
        $zaman = utf8_encode(strftime("%d %B %Y %H:%M", $zaman));

    ?>
    <form action="islem.php" method="POST">
        <a href="islem.php?sil=ok&id=<?php echo $blogcek['blog_id']; ?>&tablo=blog&link=index"><button type="button">YAZIYI SİL</button></a><br><br>
        <input type="text" name="blog_baslik" value="<?php echo $blogcek['blog_baslik']; ?>"><br><br>
        <input type="text" name="blog_etiketler" value="<?php echo $blogcek['blog_etiketler']; ?>"><br><br>
        <textarea cols="70" rows="20" name="blog_text">
            <?php echo $blogcek['blog_text']; ?>
        </textarea><br><br>
        <input type="hidden" name="blog_id" value="<?php echo $blogcek['blog_id']; ?>">
        <p><?php echo "YAZILMA ZAMANI: ".$zaman; ?></p><br>
        <button type="submit" name="blogyaziDUZENLE">YAZIYI DÜZENLE</button>
    </form>
    <hr>
    <?php } ?>

</body>
</html>