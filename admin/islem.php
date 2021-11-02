<?php 
    
    include "baglan.php";

    if(isset($_POST['admingiriskontrol'])){

        $user_mail=$_POST['user_mail'];
        $user_password=md5($_POST['user_password']);

        $kullanicisor=$db->prepare("SELECT * FROM user where user_mail=:mail and user_password=:password and user_authority=:authority");
        $kullanicisor->execute(array(
            'mail' => $user_mail,
            'password' => $user_password,
            'authority' => 1
        ));
        $say=$kullanicisor->rowCount();

        if($say==1){
            
            $_SESSION['GİRİSBİLGİ']=$user_mail;
            header("Location:index.php");
            exit;

        }else{
            header("Location:login.php?durum=no");
            exit;
        }

    }

    //SİLME İŞLEMLERİNİ TEK İF İLE ÇÖZDÜM
    if(@$_GET['sil'] == "ok"){
        
        //kontrol
        if(empty($_SESSION['GİRİSBİLGİ'])){
            header("Location:login.php?durum=izinsiz");
            exit;
        }

        //GET VERİLERİ
        $tablo = $_GET['tablo'];
        $id = $_GET['id'];
        $link = $_GET['link'];

        $idlendirme = $tablo."_id";

        $sil=$db->prepare("DELETE FROM $tablo where $idlendirme=:id");
        $kontrol=$sil->execute(array(
            'id' => $id
        ));

        if($kontrol){
            header("Location:$link.php");
            exit();
        }else{
            header("Location:$link.php");
            exit();
        }

    }

    // link mevzusu kaldı, bu kısım silme işlemi gibi ekleme işlemide tek kod bloğunda kalıcak
    $gelenveri      = array_keys($_POST);
    $gelenveri      = end($gelenveri);
    $gelenverison4  = substr($gelenveri, -4);

    if($gelenverison4 === "EKLE"){
        mysqlpdoveriekle($_POST);
    }

    function mysqlpdoveriekle($veriler){
        global $gelenveri, $db;
        $keytodata      = array_keys($veriler);

        $tablo_adi      = explode("_", $keytodata[0]);
        $tablo_adi      = $tablo_adi[0];

        $sonverieksik   = $veriler;
        unset($sonverieksik[$gelenveri]);

        $sonverieksikkeytodata  = array_keys($sonverieksik);
        $anahtarlar = implode(", ", $sonverieksikkeytodata);
        $sonverieksik = array_values($sonverieksik);
        
        $sonverieksikcount = count($sonverieksik);
        $saysay = 0;
        $soruisaretleri = array();
        while($sonverieksikcount > $saysay){
            $soruisaretleri[] = "?";
            $saysay = $saysay + 1;
            echo "ege";
        }
        $soruisaretleri = implode(",", $soruisaretleri);


        $ayarekle=$db->prepare("INSERT INTO $tablo_adi ($anahtarlar) VALUES ($soruisaretleri)");
        $insert=$ayarekle->execute($sonverieksik);
        if($insert){
            header("Location:index.php?durum=ok");
            exit();
        }else{
            header("Location:yazi-ekle.php?durum=no");
        exit();
        }
    }


    if(isset($_POST['blogyaziDUZENLE'])){
        $blog_id=$_POST['blog_id'];
    
        $kaydet=$db->prepare("UPDATE blog SET
            blog_baslik=:blog_baslik,
            blog_etiketler=:blog_etiketler,
            blog_text=:blog_text
            WHERE blog_id={$blog_id}");
        $update=$kaydet->execute(array(
            'blog_baslik' => $_POST['blog_baslik'],
            'blog_etiketler' => $_POST['blog_etiketler'],
            'blog_text' => $_POST['blog_text']
        ));
        if($update){
            header("Location:yazi-duzenle.php?id=$blog_id&durum=ok");
            exit;
        }else{
            header("Location:yazi-duzenle.php?id=$blog_id&durum=no");
            exit;
        }
    }




?>