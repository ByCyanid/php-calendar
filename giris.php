<?php
session_start();
ob_start();
$db = new PDO("mysql:host=localhost;dbname=login;charset=utf8", "root", "");//Bağlantı oluşturduk
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Bağlantı ayarlarını yaptık
$kadi = trim(filter_input(INPUT_POST,'kullanici_adi',FILTER_SANITIZE_STRING));
$sifre = trim(filter_input(INPUT_POST,'sifre',FILTER_SANITIZE_STRING));

try{
    $user = $db->query("SELECT * FROM admingiris WHERE user = '$kadi' AND pass = '$sifre'")->fetch();//admin giristeki kullanıcı adı ve sifresinin doğruluk değerini user adlı degiskene atar. fetch bool değer döndürür

    if ($user) {
    $_SESSION['id']=$user['id'];
    header("location: index.php");
    }
    else{
        header("location: login.php");
    }
    
}

catch(PDOException $hataa){
    die("Hata: " . $hataa -> getMessage());
}
?>