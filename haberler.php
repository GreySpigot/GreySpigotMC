<?php
include 'header.php'; ?>
<?php
include 'sidebar.php';
?>
    <div class="span9">
        <div class="content">
            <div class="module message">
                <div class="module-head">
                    <h3>Blog Yazıları</h3><a href="new-blog.php">
                        <button style="float:right; margin-top: -22.5px;" class="btn btn-success">Yeni Haber Ekle</button></a>
                </div>
                <div class="module-body table">
                    <table class="table table-message">
                        <tbody>
                        <tr class="heading">
                            <td><i class="fa fa-user" aria-hidden="true"></i> Yayınlanma Tarih</td>
                            <td><i class="fa fa-bullhorn" aria-hidden="true"></i> Başlık</td>
                            <td width="100"><i class="fa fa-external-link" aria-hidden="true"></i> İşlemler</td>
                        </tr>
                            <?php
                            $blogsor=$db->prepare("select * from haberler order by id DESC");
                            $blogsor->execute();

                            while ($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC))
                            { ?>
                        <tr class="read">
                            <td>
                                <?php echo $blogcek['haber_tarih']; ?>
                            </td>
                            <td>
                                <?php echo $blogcek['haber_baslik']; ?>
                            </td>
                            <td>
                                <a href="blog-goruntule.php?id=<?php echo $blogcek['id']; ?>">
                                    <button class="btn btn-primary btn-xs">Görüntüle</button></a>
                                <a href="operation.php?haberdel=ok&id=<?php echo $blogcek['id'] ?>">
                                    <button class="btn btn-danger btn-xs">Sil</button></a>
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
