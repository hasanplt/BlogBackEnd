<?php 
    include 'header.php';
    $yazarsor=$db->prepare("SELECT * FROM user where user_mail=:id");
    $yazarsor->execute(array(
        'id' => $_SESSION['GİRİSBİLGİ']
    ));
    $yazarcek=$yazarsor->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YAZI EKLE</title>
</head>
<body>
    <a href="logout.php">Kullanıcı Çıkışı Yap</a><br><br>
    <a href="index.php">Anasayfaya dön</a><br><br><br><br>
    <hr><br><br>
    <form action="islem.php" method="POST">
        <input type="text" name="blog_baslik" placeholder="Yazı Başlığı"><br><br>
        <input type="text" name="blog_etiketler" placeholder="Yazı, Etiketleri, Böyle"><br><br>
        <textarea cols="70" name="blog_text" rows="20" placeholder="Yazı İçeriği"></textarea><br><br>
        <input type="hidden" name="blog_yazarid" value="<?php echo $yazarcek['user_id']; ?>">
        <input type="hidden" name="Donus_link" value="<?php echo "index.php?durum=ok<>yazi-ekle.php?durum=no";?>">
        <button type="submit" name="YaziEKLE">Yazıyı Ekle</button>
    </form>

</body>
</html>