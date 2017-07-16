<?php
date_default_timezone_set('Europe/Istanbul');
include 'header.php'; ?>

<?php
include 'sidebar.php';
$blogsor=$db->prepare("SELECT * FROM blog WHERE id=:id");
$blogsor->execute(array(
    'id' => $_GET['id']
));

$blogcek=$blogsor->fetch(PDO::FETCH_ASSOC);
?>
<div class="span9">
      <div class="content">

        <div class="module">
          <div class="module-head">
            <h3>Bloga yeni bir haber ekliyorsun bro</h3>
          </div>
          <div class="module-body">

              <form class="form-horizontal row-fluid" action="operation.php" method="POST">
                <div class="control-group">
                  <label class="control-label" for="basicinput">Yazı Başlık</label>
                  <div class="controls">
                    <input type="text" name="blog_baslik" value="<?php echo $blogcek['blog_baslik']; ?>" class="span8">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="basicinput">Yazı Keywords</label>
                  <div class="controls">
                    <input type="text" name="blog_key" value="<?php echo $blogcek['blog_key']; ?>" class="span8">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="basicinput">Yazı Resim</label>
                  <div class="controls">
                    <input type="text" name="blog_resim" value="<?php echo $blogcek['blog_resim']; ?>" class="span8">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="basicinput">Yazı İçerik</label>
                  <div class="controls">
                    <textarea name="blog_yazi" class="ckeditor" class="span8"><?php echo $blogcek['blog_yazi']; ?></textarea>
                  </div>
                </div>

                <div class="control-group">
                  <div class="controls">
                    <button type="submit" name="blogedit" class="btn">Yazıyı Ekle</button>
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
