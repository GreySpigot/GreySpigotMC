<?php
include 'header.php';
include 'sidebar.php';

$ayarsor=$db->prepare("SELECT * FROM ayarlar");
$ayarsor->execute();

$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
?>
<div class="span9">
      <div class="content">

        <div class="module">
          <div class="module-head">
            <h3>Site Genel Ayarları</h3>
          </div>
          <div class="module-body">

              <form class="form-horizontal row-fluid" action="operation.php" method="POST">
                <div class="control-group">
                  <label class="control-label" for="basicinput">Site Title</label>
                  <div class="controls">
                    <input type="text" name="site_title" value="<?php echo $ayarcek['site_title']; ?>" class="span8">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="basicinput">Site Url</label>
                  <div class="controls">
                    <input type="text" name="site_url" value="<?php echo $ayarcek['site_url']; ?>" class="span8">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="basicinput">Site Logo</label>
                  <div class="controls">
                    <input type="text" name="site_logo" value="<?php echo $ayarcek['site_logo']; ?>" class="span8">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="basicinput">Site Arkaplan</label>
                  <div class="controls">
                    <input type="text" name="site_arkaplan" value="<?php echo $ayarcek['site_arkaplan']; ?>" class="span8">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="basicinput">Featured Durum</label>
                  <div class="controls">
                    <select class="span8" name="site_featured_durum">
                      <?php if ($ayarcek['site_featured_durum'] == 1) { ?>
													<option value="1">Aktif</option>
                          <option value="0">Pasif</option>
                      <?php } else if ($ayarcek['site_featured_durum'] == 0) { ?>
                          <option value="0">Pasif</option>
                          <option value="1">Aktif</option>
                      <?php } ?>
												</select>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="basicinput">Featured Resim</label>
                  <div class="controls">
                    <input type="text" name="site_featured_resim" value="<?php echo $ayarcek['site_featured_resim']; ?>" class="span8">
                  </div>
                </div>

                <div class="control-group">
                  <div class="controls">
                    <button type="submit" name="ayarsave" class="btn btn-success">Ayarları Kaydet</button>
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
