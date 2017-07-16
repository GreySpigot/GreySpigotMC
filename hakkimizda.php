<?php
include 'header.php';
include 'sidebar.php';

$haksor=$db->prepare("SELECT * FROM hakkimizda");
$haksor->execute();

$hakcek=$haksor->fetch(PDO::FETCH_ASSOC);
?>
<div class="span9">
      <div class="content">

        <div class="module">
          <div class="module-head">
            <h3>Hakkımız'da Sayfası</h3>
          </div>
          <div class="module-body">

              <form class="form-horizontal row-fluid" action="operation.php" method="POST">
                <div class="control-group">
                  <label class="control-label" for="basicinput">Başlık</label>
                  <div class="controls">
                    <input type="text" name="baslik" value="<?php echo $hakcek['baslik']; ?>" class="span8">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="basicinput">İçerik</label>
                  <div class="controls">
                    <textarea name="icerik" class="ckeditor" class="span8"><?php echo $hakcek['icerik']; ?></textarea>
                  </div>
                </div>

                <div class="control-group">
                  <div class="controls">
                    <button type="submit" name="haksave" class="btn btn-success">Kaydet</button>
                  </div>
                </div>

              </form>
          </div>
        </div>
      </div>
    </div>

    </div>
    </div>
    </div>
<?php include 'footer.php'; ?>
