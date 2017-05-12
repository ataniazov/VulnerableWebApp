<?php
// Veritaban bağlantı ayarlarını al
require_once ('config/config.inc.php');
$response = "";
if( isset( $_GET[ 'submit' ]  ) ) {
  if( $DBMS == 'MySQL' ) {
    // Veritabanı ile bağlantı kur
    $conn = new mysqli($_DNRDB[ 'db_server' ], $_DNRDB[ 'db_user' ], $_DNRDB[ 'db_password' ]);
    // Bağlantı kuruldu mu?
    if ($conn->connect_error) {
      // Bağlantı kurulamadı!
      $response .= "\n<div class=\"alert alert-danger alert-dismissable fade in\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Veritabanına bağlantı başarısız oldu:</strong> $conn->connect_error
        </div>";
      die;
    }
    // Bağlantı başarılı

    // Konu al
    $subject = $_GET[ 'subject' ];
    // Mesajı al
    $message = $_GET[ 'message' ];
    // Sorgu hazırlama
    $sql = "INSERT INTO {$_DNRDB[ 'db_database' ]}.tickets (subject, message) VALUES ('{$subject}', '{$message}')";
    if ($conn->query($sql) !== TRUE) {
      // Sorgu yapılamadı
      $response .= "\n<div class=\"alert alert-danger alert-dismissable fade in\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Hata:</strong> $sql $conn->error
        </div>";
    }
    // Sorgu başarılı

    // Veritabanı ile bağlantı kes
    $conn->close();
  }
}

if( $DBMS == 'MySQL' ) {
  // Create connection
  $conn = new mysqli($_DNRDB[ 'db_server' ], $_DNRDB[ 'db_user' ], $_DNRDB[ 'db_password' ]);
  // Check connection
  if ($conn->connect_error) {
    // die("Connection failed: " . $conn->connect_error . "<br />");
    $response .= "\n<div class=\"alert alert-danger alert-dismissable fade in\">
      <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
      <strong>Veritabanına bağlantı başarısız oldu:</strong> $conn->connect_error
      </div>";
    die;
  }
  // Check database
  $sql = "SELECT * FROM {$_DNRDB[ 'db_database' ]}.tickets;";
  // echo $sql;
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $response .="\n<div class=\"panel webapp-panel\">
        <div class=\"panel-heading\">
          <h3 class=\"panel-title\">{$row[ 'subject' ]}</h3>
        </div>
        <div class=\"panel-body\">
          <p>{$row[ 'message' ]}</p>
        </div>
      </div>";
    }
  } else {
    // echo "Error: " . $sql . "<br />" . $conn->error . "<br />";
    $response .= "\n<div class=\"alert alert-info alert-dismissable fade in\">
      <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
      <strong>Bilgi:</strong> Mesaj yok.
      </div>";
  }
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="Zayıf Web Uygulaması">
  <meta name="author" content="Ata Niyazov">
  <link rel="icon" href="img/favicon.ico">

  <title>Zayıf Web Uygulaması</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">

  <!-- Optional theme -->
  <link href="bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/offcanvas.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

  <!-- <nav class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
  <div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">Project name</a>
</div>
<div id="navbar" class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li class="active"><a href="#">Home</a></li>
<li><a href="#about">About</a></li>
<li><a href="#contact">Contact</a></li>
</ul> -->
  <!-- </div><!-- /.nav-collapse -->
  <!-- </div><!-- /.container -->
  <!-- </nav><!-- /.navbar -->

  <div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

      <div class="col-xs-12 col-sm-9">
        <p class="pull-right visible-xs">
          <button type="button" class="btn btn-sm webapp-button" data-toggle="offcanvas">
            <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> <strong>Menü</strong>
          </button>
        </p>
        <div class="jumbotron hidden-xs hidden-sm" id="webapp-jumbo">
          <div class="media">
            <div class="media-left">
              <a href="http://bilgisayar.kocaeli.edu.tr"><img src="img/kou-circle-extract.png" class="media-object img-circle" style="width:200px"></a>
            </div>
            <div class="media-body">
              <h2 class="media-heading" style="color: white;"><strong>Zayıf Web Uygulaması</strong></h2>
              <br />
              <p style="color: white;">Web uygulama güvenliği alanında kendini geliştirmek isteyen pentesterlar ve güvenlik ile uğraşan kimseler için PHP ile oluşturulmuş içinde belli web zafiyetlerini barındıran bir eğitim sistemidir.</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12">
            <div>
              <!-- Trigger the large modal with a button -->
              <button type="button" class="btn btn-sm pull-right webapp-button" style="margin: 8px 0px;" data-toggle="modal" data-target=".bs-example-modal-lg">
                <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> <strong>Yardım</strong></button>
              <h1>Siteler arası betik çalıştırma (XSS) <span class="glyphicon glyphicon-fire webapp-h1-glyphicon" aria-hidden="true"></span></h1>
            </div>

            <hr class="webapp-hr">
            <div class="jumbotron" id="webapp-vuln-jumbo">
              <form method="get" action="">
                <h2>Destek:</h2>
                <input type="subject" name="subject" class="form-control" maxlength="73" placeholder="Konu:" required autofocus>
                <div class="form-group webapp-textarea">
                  <textarea type="message" name="message" class="form-control" rows="3" maxlength="320" id="message" required placeholder="Mesajınız:"></textarea>
                </div>
                <button class="btn webapp-button" type="submit" name="submit" style="margin: 10px 0px 0px 0px;">
                  <i class="glyphicon glyphicon-send" aria-hidden="true"></i> <strong>Gönder</strong>
                </button>
              </form>
            </div>
            <hr>
            <?php echo $response; ?>
          </div>
          <!--/.col-xs-6.col-lg-4-->
        </div>
        <!--/row-->
      </div>
      <!--/.col-xs-12.col-sm-9-->

      <!-- Left Sidebar Content -->
      <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
        <div class="affix container-fluid" style="min-width: 265px">
          <div class="list-group">
            <a href="index.php" class="list-group-item webapp-list-group-item">
              <span class="glyphicon glyphicon-home" aria-hidden="true"></span> <strong>Anasayfa</strong></a>
            <a href="instructions.php" class="list-group-item webapp-list-group-item">
              <span class="glyphicon glyphicon-book" aria-hidden="true"></span> <strong>Kurulum Dokümantasyonu</strong></a>
            <a href="setup.php" class="list-group-item webapp-list-group-item">
              <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> <strong>Kur / Sıfırla</strong></a>
          </div>
          <div class="list-group">
            <a href="sqli.php" class="list-group-item webapp-list-group-item">
              <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> <strong>SQL Enjeksiyon</strong></a>
            <a href="xss.php" class="list-group-item webapp-list-group-item-active">
              <span class="glyphicon glyphicon-fire" aria-hidden="true"></span> <strong>XSS</strong></a>
            <a href="exec.php" class="list-group-item webapp-list-group-item">
              <span class="glyphicon glyphicon-console" aria-hidden="true"></span> <strong>Komut Enjeksiyon</strong></a>
          </div>
          <div class="list-group">
            <a href="phpinfo.php" class="list-group-item webapp-list-group-item">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>PHP Info</strong></a>
            <a href="about.php" class="list-group-item webapp-list-group-item">
              <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> <strong>Hakkında</strong></a>
          </div>
        </div>
      </div>
      <!--/.sidebar-offcanvas-->
    </div>
    <!--/row-->

    <!-- Footer -->
    <hr class="webapp-hr">
    <footer>
      <a href="#" class="btn btn-xs pull-right webapp-button" role="button">
        <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span> <strong>Başa Dön</strong></a>
      <p>&copy; 2017 <a href="http://www.kocaeli.edu.tr" class="webapp-text">Kocaeli Üniversitesi.</a> Bütün hakları saklıdır. &middot; Zayıf Web Uygulaması v1.0.1</p>
    </footer>

  </div>
  <!--/.container-->

  <!-- Large modal -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="Yardım">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header webapp-modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myLargeModalLabel"><strong>Yardım</strong></h4>
        </div>
        <div class="modal-body">

          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" class="webapp-tab" href="#exploitation"><strong>Sömürü</strong></a></li>
            <li><a data-toggle="tab" class="webapp-tab" href="#explanation"><strong>Açıklama</strong></a></li>
            <li><a data-toggle="tab" class="webapp-tab" href="#prevention"><strong>Önleme</strong></a></li>
          </ul>

          <div class="tab-content">
            <div id="exploitation" class="tab-pane fade in active">
              <h2>Sömürü</h2>
              <hr class="webapp-hr">
              <p>
                Zafiyet sömürüsü için tarayıcının URL girişine aşağıdaki satırı giriniz:
              </p>
              <p>
                Konu: <strong>XSS (Reflected)</strong><br />
                Mesajınız: <strong>&lt;script&gt;alert("XSS.+You+have+been+pwned!")&lt;script&gt;</strong>
              </p>
              <pre><code>http://localhost/www/xss.php?subject=XSS+(Reflected)&amp;message=&lt;script&gt;alert("XSS.+You+have+been+pwned!")&lt;%2Fscript&gt;&amp;submit=</code></pre>
              <p>
                Konu: <strong>XSS (Stored)</strong><br />
                Mesajınız: <strong>&lt;iframe src="http://www.kocaeli.edu.tr"&gt;&lt;iframe&gt;</strong>
              </p>
              <pre><code>http://localhost/www/xss.php?subject=XSS+(Stored)&amp;message=&lt;iframe+src%3D"http%3A%2F%2Fwww.kocaeli.edu.tr"&gt;&lt;%2Fiframe&gt;&amp;submit=</code></pre>
            </div>
            <div id="explanation" class="tab-pane fade">
              <h2>Açıklama</h2>
              <hr class="webapp-hr">
              <p><strong>Siteler arası betik çalıştırma (XSS) </strong>Web uygulamarının sebebiyet verdiği bu açık sayesinde saldırgan hazırladığı zararlı kodları yine kendi hazırladığı bir sayfaya saklayarak, hedefteki kullanıcıyı bu sayfaya yönlendirmesiyle veya yönlendirmeden o esnada aralarında iletişim için kullandıkları web uygulamasının arka planına saklayarak hedefteki kullanıcıya iletmesi ile meydana gelir. Kullanıcı bu sırada hiçbirşeyin farkına varmaz fakat o esnada oturum bilgileri gibi pek çok önemli bilgisi saldırganın istediği bir sayfaya kaydedilir.</p>
              <pre class="php" style="font-family:monospace;"><ol><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #000000; font-weight: bold;">&lt;?php</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #666666; font-style: italic;">// Veritaban bağlantı ayarlarını al</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #b1b100;">require_once</span> <span style="color: #009900;">&#40;</span><span style="color: #0000ff;">'config/config.inc.php'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #b1b100;">if</span><span style="color: #009900;">&#40;</span> <span style="color: #990000;">isset</span><span style="color: #009900;">&#40;</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'submit'</span> <span style="color: #009900;">&#93;</span>  <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #b1b100;">if</span><span style="color: #009900;">&#40;</span> <span style="color: #000088;">$DBMS</span> <span style="color: #339933;">==</span> <span style="color: #0000ff;">'MySQL'</span> <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Veritabanı ile bağlantı kur</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$conn</span> <span style="color: #339933;">=</span> <span style="color: #000000; font-weight: bold;">new</span> mysqli<span style="color: #009900;">&#40;</span><span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_server'</span> <span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span> <span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_user'</span> <span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span> <span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_password'</span> <span style="color: #009900;">&#93;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Bağlantı kuruldu mu?</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #b1b100;">if</span> <span style="color: #009900;">&#40;</span><span style="color: #000088;">$conn</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">connect_error</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">      <span style="color: #666666; font-style: italic;">// Bağlantı kurulamadı!</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">      <span style="color: #990000;">die</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #009900;">&#125;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Bağlantı başarılı</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">&nbsp;</div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Konu al</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$subject</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'subject'</span> <span style="color: #009900;">&#93;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Mesajı al</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$message</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'message'</span> <span style="color: #009900;">&#93;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Sorgu hazırlama</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$sql</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">&quot;INSERT INTO {<span style="color: #006699; font-weight: bold;">$_DNRDB</span>[ 'db_database' ]}.tickets (subject, message) VALUES ('<span style="color: #006699; font-weight: bold;">{$subject}</span>', '<span style="color: #006699; font-weight: bold;">{$message}</span>')&quot;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #b1b100;">if</span> <span style="color: #009900;">&#40;</span><span style="color: #000088;">$conn</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #009900;">&#40;</span><span style="color: #000088;">$sql</span><span style="color: #009900;">&#41;</span> <span style="color: #339933;">!==</span> <span style="color: #009900; font-weight: bold;">TRUE</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">      <span style="color: #666666; font-style: italic;">// Sorgu yapılamadı</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">      <span style="color: #666666; font-style: italic;">// ...</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #009900;">&#125;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Sorgu başarılı</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">&nbsp;</div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Veritabanı ile bağlantı kes</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$conn</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">close</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #009900;">&#125;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #009900;">&#125;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #000000; font-weight: bold;">?&gt;</span></div></li></ol></pre>
              <p>
                Yukarıda görüldüğü gibi "subject" ve "message" parametreleri GET metodu ile alındıktan sonra herhangi bir filtreleme veya kontrol işleminden geçirilmeden veritabanına sorgu içerisinde kullanılmaktadır. Bir saldırgan, "subject" ve "message" parametrelerine beklenen bir girdi yerine <code><strong>&lt;script&gt;alert("XSS.+You+have+been+pwned!")&lt;script&gt;</strong></code> veya <code><strong>&lt;iframe src="http://www.kocaeli.edu.tr"&gt;&lt;iframe&gt;</strong></code> gibi bir girdi girerek siteler arası betik çalıştırma (XSS) yapmış olur. Kullanıcı tarafından gelen girdi sunucu tarafında herhangi bir kontrol ve filtreleme işlemine tabi tutulmadan veritabanına sorgu içerisinde kullanıldığı için bu açık ortaya çıkmıştır.<br />
                Stored XSS saldırısı oldukça tehlikeli saldırı yöntemlerinden biridir. Daha çok forum tarzı yazılımlarda veya websitelerde ziyaretçi defterinde bulunur. Bu alanlara gönderilen XSS kodları veritabanına kaydedilir. Sayfaya giren her kullanıcı için sayfayı görüntülerken XSS saldırısına maruz kalır.
              </p>
            </div>
            <div id="prevention" class="tab-pane fade">
              <!-- Online syntax highlighter: http://highlight.hohli.com/ -->
              <h2>Önleme</h2>
              <hr class="webapp-hr">
              <p>
                Siteler arası betik çalıştırma (XSS) önlemek için tüm girdilerin kontrolu ve filtrelenmesi gerekmekedir. Programın kullanıcıdan aldığı girdiler, her zaman kontrolden geçirilmelidir. Bu aynı zamanda "Sql injection", "Buffer Overflow" gibi saldırıları da engelleyecektir. Eğer belirli bir tür veri (numerik, alfanümerik) bekleniyorsa ve belirli bir boyutta (8 karakter, maksimum 20 karakter gibi) olması bekleniyorsa, girilen verinin bu şartlara uyduğunun sağlanması gerekmektedir. Girdilerden metakarakter'ler mutlaka filtrelenmelidir. Bu birçok saldırıyı engelleyecektir. Örneğin <code><strong>< > " ' % ; ) ( &amp; + -</strong></code> karakterleri kullanıcı girdisinden temizlenmelidir. Aslında ne tür verinin beklendiği belirtildiği durumlarda, bu tür filtreleme de otomatikman gerçekleşecektir.Bu tür karakterlerin gerektiği ortamlarda, girilen verinin encode edilmesi gerekebilir. Bunun filter_sanitize_encoded(), htmlentities(), htmlspecialchars(), strip_tags() gibi bir kaç hazır fonksiyon kullanılabilinir.
              </p>
              <pre class="php" style="font-family:monospace;"><ol><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #000000; font-weight: bold;">&lt;?php</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #666666; font-style: italic;">// Veritaban bağlantı ayarlarını al</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #b1b100;">require_once</span> <span style="color: #009900;">&#40;</span><span style="color: #0000ff;">'config/config.inc.php'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #b1b100;">if</span><span style="color: #009900;">&#40;</span> <span style="color: #990000;">isset</span><span style="color: #009900;">&#40;</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'submit'</span> <span style="color: #009900;">&#93;</span>  <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #b1b100;">if</span><span style="color: #009900;">&#40;</span> <span style="color: #000088;">$DBMS</span> <span style="color: #339933;">==</span> <span style="color: #0000ff;">'MySQL'</span> <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Veritabanı ile bağlantı kur</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$conn</span> <span style="color: #339933;">=</span> <span style="color: #000000; font-weight: bold;">new</span> mysqli<span style="color: #009900;">&#40;</span><span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_server'</span> <span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span> <span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_user'</span> <span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span> <span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_password'</span> <span style="color: #009900;">&#93;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Bağlantı kuruldu mu?</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #b1b100;">if</span> <span style="color: #009900;">&#40;</span><span style="color: #000088;">$conn</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">connect_error</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">      <span style="color: #666666; font-style: italic;">// Bağlantı kurulamadı!</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">      <span style="color: #990000;">die</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #009900;">&#125;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Bağlantı başarılı</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">&nbsp;</div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Konu al ve filtrele</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$subject</span> <span style="color: #339933;">=</span> <span style="color: #990000;">strip_tags</span><span style="color: #009900;">&#40;</span><span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'subject'</span> <span style="color: #009900;">&#93;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Mesajı al ve filtrele</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$message</span> <span style="color: #339933;">=</span> <span style="color: #990000;">strip_tags</span><span style="color: #009900;">&#40;</span><span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'message'</span> <span style="color: #009900;">&#93;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Sorgu hazırlama</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$sql</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">&quot;INSERT INTO {<span style="color: #006699; font-weight: bold;">$_DNRDB</span>[ 'db_database' ]}.tickets (subject, message) VALUES ('<span style="color: #006699; font-weight: bold;">{$subject}</span>', '<span style="color: #006699; font-weight: bold;">{$message}</span>')&quot;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #b1b100;">if</span> <span style="color: #009900;">&#40;</span><span style="color: #000088;">$conn</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #009900;">&#40;</span><span style="color: #000088;">$sql</span><span style="color: #009900;">&#41;</span> <span style="color: #339933;">!==</span> <span style="color: #009900; font-weight: bold;">TRUE</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">      <span style="color: #666666; font-style: italic;">// Sorgu yapılamadı</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">      <span style="color: #666666; font-style: italic;">// ...</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #009900;">&#125;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Sorgu başarılı</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">&nbsp;</div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Veritabanı ile bağlantı kes</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$conn</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">close</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #009900;">&#125;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #009900;">&#125;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #000000; font-weight: bold;">?&gt;</span></div></li></ol></pre>
            </div>
          </div>

        </div>
        <div class="modal-footer webapp-modal-footer">
          <button type="button" class="btn btn-sm webapp-button" data-dismiss="modal"><strong>Kapat</strong></button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript
                          ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="bootstrap/assets/js/vendor/jquery.min.js"><\/script>')
  </script>
  <script src="bootstrap/dist/js/bootstrap.js"></script>
  <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  <script src="bootstrap/assets/js/vendor/holder.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>
  <script src="js/offcanvas.js"></script>
</body>

</html>
