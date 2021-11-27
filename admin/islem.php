<?php 
    
    include "baglan.php";
    

    
    class VeriEkle{

        function mysqlpdoveriekle($veriler){
            global $gelenveri, $db;
            $keytodata      = array_keys($veriler); //Gelen dizinin anahtarlarını değer kısmına alıp, anahtarlarını oto numaralandırdı
    
            $tablo_adi      = explode("_", $keytodata[0]); // Tablo adı için gelen ilk veriyi "_" kısmından 2ye böldük
            $tablo_adi      = $tablo_adi[0]; // İlk kısmı tablonun adı olacağından ilk veriyi aldik
    
            $son2verieksik  = $veriler;
            array_pop($son2verieksik); // Son elemanı sildik çünkü PDO eklenmicek

            $EklemeIslemiLink =   end($son2verieksik);
            $EklemeIslemiLink =   explode("<>", $EklemeIslemiLink);
            $EklemeBasarili   =   $EklemeIslemiLink[0];
            $EklemeBasarisiz  =   $EklemeIslemiLink[1];

            array_pop($son2verieksik); // En son veride linkleme var PDO eklenmiceğinden sildik.
            

            $son2verieksikkeytodata  = array_keys($son2verieksik);
            $anahtarlar = implode(", ", $son2verieksikkeytodata);  //Anahtarları PDO kısmına yazacak uygun hale getirmek için dizideki elemanları ", " ile birleştirdik
            $son2verieksik = array_values($son2verieksik); // Anahtarları siler ve değerleri döndürür
            
            $son2verieksikcount = count($son2verieksik);  // Veritabanına eklenecek toplam veri sayısı
            $saysay = 0;
            $soruisaretleri = array();

            // PDO için soru işareti dizisi oluşturduk 
            while($son2verieksikcount > $saysay){
                $soruisaretleri[] = "?";
                $saysay = $saysay + 1;
            }
            $soruisaretleri = implode(",", $soruisaretleri); // Soru işareti dizisini PDO kısmına uygun hale getirdik
    
            $ayarekle=$db->prepare("INSERT INTO $tablo_adi ($anahtarlar) VALUES ($soruisaretleri)");
            $insert=$ayarekle->execute($son2verieksik);
            if($insert){
                header("Location:$EklemeBasarili");
                exit();
            }else{
                header("Location:$EklemeBasarisiz");
            exit();
            }
        }

    }

    
    //Gelen POST dizisinin son değeri buton değeri oluyor ve değerin son 4 harfi EKLE ise ona göre işlem yapacağız.
    $gelenveri      = array_keys($_POST); //Gelen dizinin anahtarlarını değer kısmına alıp, anahtarlarını oto numaralandırdı
    $gelenveri      = end($gelenveri); //Gelen dizinin en sonki değerini döndürür
    $gelenverison4  = substr($gelenveri, -4); // Gelen verinin son 4 harfini aldık.

    if($gelenverison4 === "EKLE"){
        $VeriEkle   =   new VeriEkle;
        $VeriEkle->mysqlpdoveriekle($_POST);
    }




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