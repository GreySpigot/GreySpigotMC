<?php
include 'header.php'; ?>


<?php
include 'sidebar.php';
?>
    <div class="span9">
        <div class="content">
            <div class="module message">
                <div class="module-head">
                    <h3>
                        Destek Bildirimleri</h3>
                </div>
                <div class="module-body table">
                    <table class="table table-message">
                        <tbody>
                        <tr class="heading">
                            <td><i class="fa fa-user" aria-hidden="true"></i> Oyuncu</td>
                            <td><i class="fa fa-bullhorn" aria-hidden="true"></i> Başlık</td>
                            <td><i class="fa fa-th-large"></i> Kateogri</td>
                            <td><i class="fa fa-eye"></i> Durum</td>
                            <td width="100"><i class="fa fa-external-link" aria-hidden="true"></i> İşlemler</td>
                        </tr>
                            <?php
                            $repsor=$db->prepare("select * from destek order by destek_id DESC");
                            $repsor->execute();

                            while ($repcek=$repsor->fetch(PDO::FETCH_ASSOC))
                            { ?>
                        <tr class="read">
                            <td>
                                <?php echo $repcek['realname']; ?>
                            </td>
                            <td>
                                <?php echo $repcek['destek_baslik']; ?>
                            </td>
                            <td>
                                <?php echo $repcek['destek_kategori']; ?>
                            </td>
                            <td>
                                <?php
                                if($repcek['destek_durum']=="1") { ?>
                                    <span>Aktif</span>
                                <?php } elseif($repcek['destek_durum']==2) { ?>
                                    <span>Sen Cevapladın</span>
                                <?php } elseif($repcek['destek_durum']==0) { ?>
                                  <span>Pasif</span>
                                <?php } elseif($repcek['destek_durum']==3) { ?>
                                  <span>Oyuncu Yanıtı</span>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="destek-goruntule.php?destek_id=<?php echo $repcek['destek_id']; ?>">
                                    <button class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button></a>
                                <a href="#">
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-times-circle"></i></button></a>
                            </td>
                        </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="module-foot">
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
<?php include 'footer.php'; ?>
