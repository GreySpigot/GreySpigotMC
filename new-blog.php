<?php
date_default_timezone_set('Europe/Istanbul');
include 'header.php'; ?>

<?php
include 'sidebar.php';

?>
<div class="span9">
      <div class="content">

        <div class="module">
          <div class="module-head">
            <h3>Bloga yeni bir haber ekliyorsun</h3>
          </div>
          <div class="module-body">

              <form class="form-horizontal row-fluid" action="operation.php" method="POST">
                <input type="hidden" name="haber_tarih" value="<?php echo date('d.m.Y - H:i'); ?>" class="span8">
                <div class="control-group">
                  <label class="control-label" for="basicinput">Haber Başlık</label>
                  <div class="controls">
                    <input type="text" name="haber_baslik" placeholder="Yazının başlığını gir." class="span8" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="basicinput">Haber Keywords</label>
                  <div class="controls">
                    <input type="text" name="haber_key" placeholder="Yazı hakkında anahtar kelimeler. Aralarına virgül koymayı unutma." class="span8">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="basicinput">Haber Resim</label>
                  <div class="controls">
                    <input type="text" name="haber_resim" value="https://i.hizliresim.com/okrNbX.png" class="span8" required>
                    <small>Resim'i url adresi olarak giriniz.</small>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="basicinput">Haber İçerik</label>
                  <div class="controls">
                    <textarea name="haber_yazi" class="ckeditor" class="span8" required></textarea>
                  </div>
                </div>

                <div class="control-group">
                  <div class="controls">
                    <button type="submit" name="blogsave" class="btn">Haber Ekle</button>
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
