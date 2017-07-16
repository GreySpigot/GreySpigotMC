<?php
ob_start();
session_start();
include '../php-file/config.php';

if (isset($_POST['loggin'])) {

    $admin_username=$_POST['admin_username'];
    $admin_password=md5($_POST['admin_password']);

        if ($admin_username && $admin_password) {

            $adminsor=$db->prepare("SELECT * from admin where admin_username=:username and admin_password=:passwd");
            $adminsor->execute(array(
                'username' => $admin_username,
                'passwd' => $admin_password
            ));

            $say=$adminsor->rowCount();

            if ($say>0) {
                $_SESSION['admin_username'] = $admin_username;

                header('Location:index.php');

            } else {

                header('Location:login.php?status=no');

            }
        }
}

if (isset($_POST['blogsave'])) {

    $blogsave=$db->prepare("INSERT INTO haberler SET
haber_baslik=:haber_baslik,
haber_key=:haber_key,
haber_resim=:haber_resim,
haber_yazi=:haber_yazi,
haber_tarih=:haber_tarih");
    $insert=$blogsave->execute(array(
        'haber_baslik' => $_POST['haber_baslik'],
        'haber_key' => $_POST['haber_key'],
        'haber_resim' => $_POST['haber_resim'],
        'haber_yazi' => $_POST['haber_yazi'],
        'haber_tarih' => $_POST['haber_tarih']));

    if ($insert) {
        Header("Location:haberler.php?status=ok");
    }
    else {
        Header("Location:haberler.php?status=no");
    }
}

if (isset($_POST['blogedit'])) {

    $blogsave=$db->prepare("UPDATE haberler SET
blog_baslik=:blog_baslik,
blog_key=:blog_key,
haber_resim=:haber_resim,
haber_yazi=:haber_yazi");
    $insert=$blogsave->execute(array(
        'haber_baslik' => $_POST['haber_baslik'],
        'haber_key' => $_POST['haber_key'],
        'haber_resim' => $_POST['haber_resim'],
        'haber_yazi' => $_POST['haber_yazi']));

    if ($insert) {
        Header("Location:haberler.php?status=ok");
    }
    else {
        Header("Location:haberler.php?status=no");
    }
}

if (isset($_POST['haksave'])) {

    $haksave=$db->prepare("UPDATE hakkimizda SET
baslik=:baslik,
icerik=:icerik
WHERE id=1");
    $insert=$haksave->execute(array(
        'baslik' => $_POST['baslik'],
        'icerik' => $_POST['icerik']));

    if ($insert) {
        Header("Location:hakkimizda.php?status=ok");
    }
    else {
        Header("Location:hakkimizda.php?status=no");
    }
}

if ($_GET['haberdel']=="ok") {

    $sil=$db->prepare("DELETE from haberler where id=:id");
    $kontrol=$sil->execute(array(
        'id' => $_GET['id']
    ));
    if ($kontrol) {
        Header("Location:haberler.php?status=ok");
    } else {
        Header("Location:haberler.php?status=no");
    }
}

if (isset($_POST['ayarsave'])) {

    $ayarsave=$db->prepare("UPDATE ayarlar SET
site_title=:title,
site_url=:url,
site_logo=:logo,
site_featured_durum=:durum,
site_featured_resim=:resim,
site_arkaplan=:arkaplan
WHERE id=1");
    $update=$ayarsave->execute(array(
        'title' => $_POST['site_title'],
        'url' => $_POST['site_url'],
        'logo' => $_POST['site_logo'],
        'durum' => $_POST['site_featured_durum'],
        'resim' => $_POST['site_featured_resim'],
        'arkaplan' => $_POST['site_arkaplan']
    ));

    if ($update) {
        Header("Location:index.php?status=ok");
    }
    else {
        Header("Location:index.php?status=no");
    }
}
?>
