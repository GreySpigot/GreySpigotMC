<?php
include 'header.php';
include 'sidebar.php';

$ticketsor=$db->prepare("SELECT * FROM destek WHERE destek_id=:destek_id");
$ticketsor->execute(array(
    'destek_id' => $_GET['destek_id']
));

$ticketcek=$ticketsor->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['adcevap'])) {


    $cevapsave=$db->prepare("INSERT INTO cevap SET
realname=:realname,
destek_id=:destek_id,
cevap_tarih=:cevap_tarih,
cevap_mesaj=:cevap_mesaj");
    $insert=$cevapsave->execute(array(
        'realname' => $_POST['realname'],
        'destek_id' => $_POST['destek_id'],
        'cevap_tarih' => $_POST['cevap_tarih'],
        'cevap_mesaj' => $_POST['cevap_mesaj']));

    if ($insert) {

        Header("Location:destek.php?status=ok");
    }
    else {
        Header("Location:destek.php?status=no");
    }
}

if (isset($_POST['adcevap'])) {

    $cevapsava=$db->prepare("UPDATE destek SET
destek_durum=:destek_durum
WHERE destek_id={$_GET['destek_id']}");
    $insert=$cevapsava->execute(array(
        'destek_durum' => $_POST['destek_durum']));
}

if (isset($_POST['addurum'])) {

    $cevapsav=$db->prepare("UPDATE destek SET
destek_durum=:destek_durum
WHERE destek_id={$_GET['destek_id']}");
    $insert=$cevapsav->execute(array(
        'destek_durum' => $_POST['destek_durum']));

    if ($insert) {
        Header("Location:destek.php?status=ok");
    }
    else {
        Header("Location:destek.php?status=no");
    }
}
date_default_timezone_set('Europe/Istanbul');
?>

    <div class="span9">
        <div class="content">
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="control-group">
                <div class="controls">
                    <select tabindex="1" data-placeholder="Durum Seç" class="span8" name="destek_durum">
                        <option value="1">Aktif</option>
                        <option value="0">Pasif</option>
                    </select>
                    <button class="btn btn-success" style="margin-top: -10px; margin-left: 10px;" type="submit" name="addurum"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Kaydet</button>
                </div>
            </div>
            </form>



            <div class="module message">
                <div class="module-head">
                    <h3>
                        <i class="fa fa-user" aria-hidden="true"></i> <?php echo $ticketcek['realname']; ?> </h3>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table">
                            <tbody>
                            <tr style="border: 1px #000000;">
                                <td style="width: 80px; border-right: 1px solid #ddd;">
                                    <img src="http://cravatar.eu/head/<?php echo $ticketcek['realname']; ?>" class="imgCom img-rounded img-responsive" style="border: 0px solid #fff; border-radius: 3px;">&nbsp;
                                </td>
                                <td>
                                    <strong style="font-family: Candara; font-weight: 100; font-size: 15px;"><?php echo $ticketcek['destek_mesaj']; ?></strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!-- Cevaplar kısmı -->
<?php

$id = $_GET['destek_id'];
$sql= "SELECT * FROM cevap WHERE destek_id = :destek_id";
$query = $db->prepare($sql);
$query->bindParam(':destek_id', $id, PDO::PARAM_INT);
$sonuc = $query->execute();

if($query->rowCount() > 0) {
    while($row=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        echo "<div class=\"span9\" style=\"float: right;\">
        <div class=\"content\">
            <div class=\"module message\">
                <div class=\"module-head\">
                    <h3>
                       <i class=\"fa fa-user\" aria-hidden=\"true\"></i> $realname
<strong style=\"font-weight: 100; float:right\"><i class=\"fa fa-calendar\"></i> $cevap_tarih </strong>
                       </h3>
                </div>

                <div class=\"panel panel-default\">
                    <div class=\"panel-body\">
                        <table class=\"table\">
                            <tbody>
                            <tr style=\"border: 1px #000000;\">
                                <td style=\"width: 80px; border-right: 1px solid #ddd;\">
                                    <img src=\"http://cravatar.eu/head/$realname\" class=\"imgCom img-rounded img-responsive\" style=\"border: 0px solid #fff; border-radius: 3px;\">&nbsp;
                                </td>
                                <td><strong style=\"font-family: Candara; font-weight: 100; font-size: 15px;\">$cevap_mesaj</strong></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div> ";
    }

}
?>

    <div class="span9" style="float: right;">
        <div class="content">

            <div class="module message">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <form style="padding: 10px;" action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="realname" value="<?php echo $admincek['admin_username']; ?>">
                            <input type="hidden" name="destek_id" value="<?php echo $ticketcek['destek_id']; ?>">
                            <input type="hidden" name="cevap_tarih" value="<?php echo date('d.m.Y H:i'); ?>">
                            <input type="hidden" name="destek_durum" value="2">

                            <div class="controls">
                                <textarea style="width: 834px;" rows="5" name="cevap_mesaj" placeholder=""></textarea>
                            </div>

                            <button class="btn btn-success top10 btn-block" type="submit" name="adcevap"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Gönder</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
<?php include 'footer.php'; ?>
