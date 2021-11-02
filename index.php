<?php 
include 'admin/baglan.php';
date_default_timezone_set('Europe/Istanbul');
setlocale(LC_TIME,"Turkish");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG | HASAN</title>
</head>
<body>
    <a href="admin/index.php">PANEL</a><br><br><br>
    <h1>Blog Yazıları</h1><hr><br><br>
    <?php 
    $blogsor=$db->prepare("SELECT * FROM blog");
    $blogsor->execute();
    while($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC)){
        $zaman = $blogcek['blog_zaman'];
        $zaman = strtotime($zaman);
        $zaman = iconv("iso-8859-9", "utf-8", strftime("%d %B %Y %H:%M", $zaman));

        $yazarsor=$db->prepare("SELECT * FROM user where user_id=:id");
        $yazarsor->execute(array(
            'id' => $blogcek['blog_yazarid']
        ));
        $yazarcek=$yazarsor->fetch(PDO::FETCH_ASSOC);
    ?>
    <br><br><hr>
    <?php echo $zaman; ?>
    <h3 style="text-align:center;"><?php echo $blogcek['blog_baslik']; ?></h3>
    <p style="text-align:center;"><?php echo $blogcek['blog_text']; ?></p>
    <p style="text-align:center;"><strong>YAZAR: <i><?php echo $yazarcek['user_name']; ?></i> </strong></p>
    
    <br><br><hr>
    <?php 
    }
    ?>
</body>
</html>