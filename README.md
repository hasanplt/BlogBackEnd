# BlogBackEnd

AMAÇ : Bu projedeki amacım PHP ile PDO kullanarak MYSQL veritabanlı bir basit blog oluşturmaktır. Frontend kısmıyla uğraşmadım. Proje sırasında islem.php kısmında işi daha çok kısaltmak için çaba verdim. Kısaltmak derken belli fonksiyonlar oluşturarak fonksiyonlara verdiğim parametreler ile belli kalıptaki kodları sadece birkaç değişiklik yapıp yeniden yazmak yerine otomatikleştirdim. Belli eksikleri olduğunu biliyorum ve zamanla düzelterek güncelleyeceğim.

*Class kullandım ancak gerek olmadığının farkındayım. Kullanım amacım sadece class içinde dıştan gelen değişken ifadelerini anlayabilmek denemekti.

## GENEL KURALLAR
    1) Tablo isimleri ve formdan göndereceğiniz veri isimleri aynı olmalı. Template: {Tabloİsmi}_{Veriİsmi}. Mesela Kullanici_İsim : Kullanıcı adlı tablonun isim verisi. Bu MYSQL kısmında da form kısmında da aynı olmalı. Kodları inceleyerek daha iyi anlayabilirsiniz.
    
    2) Son veri olarak formda inputu hidden olarak geri dönüş linkleri eklenmeli. 
    ### <input type="hidden" name="Donus_link" value="<?php echo "{Basarili Ekleme İse Link}<>yazi-ekle.php?{Basarisiz Ekleme İse Link}";?>">

    3) Kodlar içerisinde yorum satırları ile açıklamaya çalıştım eksiğim var ise veya anlamadığınız kısmı lütfen bana yazın bu kodları daha açıklayıcı ve doğru şekilde tamamlamak istiyorum.