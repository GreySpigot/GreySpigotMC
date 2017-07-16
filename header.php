<?php
ob_start();
session_start();
include '../php-file/config.php';
include 'operation.php';
date_default_timezone_set('Europe/Istanbul');

$adminsor=$db->prepare("select * from admin where admin_username=:username");
$adminsor->execute(array(
   'username' => $_SESSION['admin_username']
));

$say=$adminsor->rowCount();

if ($say==0) {
    header("Location:login.php?status=opss!");
    exit;
}
$admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Yönetici Paneli</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <script src="//cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
        <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">Yönetici Paneli </a>
                </div>
            </div>
        </div>
