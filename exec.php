<?php
$response = "";
if( isset( $_GET[ 'submit' ]  ) ) {
  // Alan adını al
  $domain = $_GET[ 'domain' ];
  // komut satırda "whois -H" çalıştır
  $cmd = shell_exec( 'whois -H ' . $domain );
  $response = "<pre class=\"webapp-pre\"><strong>{$cmd}</strong></pre>";
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
                <h1>Komut Enjeksiyon <span class="glyphicon glyphicon-console webapp-h1-glyphicon" aria-hidden="true"></span></h1>
            </div>

            <hr class="webapp-hr">
            <div class="jumbotron" id="webapp-vuln-jumbo">
              <form method="get" action="">
                  <h2>Alan adı sorgulama:</h2>
                  <div class="input-group">
                    <span class="input-group-addon webapp-text"><strong>Whois:</strong></span>
                    <input type="domain" name="domain" id="inputDomain" class="form-control" placeholder="Alan adı" required autofocus>
                    <div class="input-group-btn">
                      <button class="btn webapp-button" type="submit" name="submit">
                        <i class="glyphicon glyphicon-search" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
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
            <a href="xss.php" class="list-group-item webapp-list-group-item">
              <span class="glyphicon glyphicon-fire" aria-hidden="true"></span> <strong>XSS</strong></a>
            <a href="exec.php" class="list-group-item webapp-list-group-item-active">
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
              <p>Whois: <code><strong>kocaeli.edu.tr; echo "You have been pwned!</strong></code></p>
              <pre><code>http://localhost/www/exec.php?domain=kocaeli.edu.tr%3B+echo+%22You+have+been+pwned%21%22&submit=</code></pre>
              <p>Whois: <code><strong>; cat /etc/passwd</strong></code></p>
              <pre><code>http://localhost/www/exec.php?domain=%3B+cat+%2Fetc%2Fpasswd&submit=</code></pre>
            </div>
            <div id="explanation" class="tab-pane fade">
              <h2>Açıklama</h2>
              <hr class="webapp-hr">
              <p><strong>Command Injection</strong>, yani komut enjeksiyonu saldırganın zafiyet barındıran bir uygulama üzerinden hedef sistemde dilediği komutları çalıştırabilmesine denir. Komut ile kastedilen şey Windows'ta CMD ve Linux'ta Terminal pencerelerine girilen sistem komutlarıdır. Literatürde Shell kodlaması diye de geçer. Command Injection saldırısı büyük oranda yetersiz input denetleme mekanizması nedeniyle gerçekleşmektedir.</p>
              <pre class="php" style="font-family:monospace;"><ol><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #000000; font-weight: bold;">&lt;?php</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #b1b100;">if</span><span style="color: #009900;">&#40;</span> <span style="color: #990000;">isset</span><span style="color: #009900;">&#40;</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'submit'</span> <span style="color: #009900;">&#93;</span>  <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #666666; font-style: italic;">// Alan adını al</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #000088;">$domain</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'domain'</span> <span style="color: #009900;">&#93;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #666666; font-style: italic;">// komut satırda &quot;whois -H&quot; çalıştır</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #000088;">$cmd</span> <span style="color: #339933;">=</span> <span style="color: #990000;">shell_exec</span><span style="color: #009900;">&#40;</span> <span style="color: #0000ff;">'whois -H '</span> <span style="color: #339933;">.</span> <span style="color: #000088;">$domain</span> <span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #009900;">&#125;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #000000; font-weight: bold;">?&gt;</span></div></li></ol></pre>
              <p>
                Yukarıda görüldüğü gibi "domain" parametresi GET metodu ile alındıktan sonra herhangi bir filtreleme veya kontrol işleminden geçirilmeden <strong><code>whois -H</code></strong> komutu içerisinde kullanılmaktadır. Bir saldırgan, "domain" parametresine "example.com" gibi beklenen bir girdi yerine "; cat /etc/passwd" gibi bir girdi girerek kullanıcı bilgilerine erişebilir. Kullanıcı tarafından gelen girdi sunucu tarafında herhangi bir kontrol ve filtreleme işlemine tabi tutulmadan "whois -H" komutu içerisinde kullanıldığı için bu açık ortaya çıkmıştır.
              </p>
            </div>
            <div id="prevention" class="tab-pane fade">
              <!-- Online syntax highlighter: http://highlight.hohli.com/ -->
              <h2>Önleme</h2>
              <hr class="webapp-hr">
              <p>
                Komut enjeksiyonunu önlemek için tavsiye edilen mümkün oldukça komut satırına hiç bir sorgu göndermemek ve yerine kullanılan programlama dilinin aynı işlemleri yapan hazır fonksiyonları kullanmak. Bazı programlama dillerinde komut satırındaki işlemlerin aynısın yapan alternatifler mevcut. Örnek olarak mail komutunun Java dilindeki alternatifi javax.mail vs. kullanılabilinir. Komut satırına sorgu yapmadan işlem yapılamıyorsa "domain" parametresini düzenli ifade (regular expression) şeklinde yazılması ve bir kaç filtreleme işlemine tabi tutulması gerekmektedir.
              </p>
              <pre class="php" style="font-family:monospace;"><ol><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #000000; font-weight: bold;">&lt;?php</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #b1b100;">if</span><span style="color: #009900;">&#40;</span> <span style="color: #990000;">isset</span><span style="color: #009900;">&#40;</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'submit'</span> <span style="color: #009900;">&#93;</span>  <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #666666; font-style: italic;">// Alan adını al</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #000088;">$domain</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'domain'</span> <span style="color: #009900;">&#93;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #666666; font-style: italic;">// düzenli ifade (regular expression) tanımı</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #000088;">$pattern</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">&quot;^(?!\-)(?:[a-zA-Z\d\-]{0,62}[a-zA-Z\d]\.){1,126}(?!\d+)[a-zA-Z\d]{1,63}$&quot;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #666666; font-style: italic;">// düzenli ifade'ye uyuyor mu?</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #b1b100;">if</span> <span style="color: #009900;">&#40;</span><span style="color: #990000;">preg_match</span><span style="color: #009900;">&#40;</span><span style="color: #000088;">$pattern</span><span style="color: #339933;">,</span> <span style="color: #000088;">$domain</span><span style="color: #339933;">,</span> <span style="color: #000088;">$match</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// uyuyorsa komut satırına gönder</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// komut satırda &quot;whois -H&quot; çalıştır</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$cmd</span> <span style="color: #339933;">=</span> <span style="color: #990000;">shell_exec</span><span style="color: #009900;">&#40;</span> <span style="color: #0000ff;">'whois -H '</span> <span style="color: #339933;">.</span> <span style="color: #000088;">$match</span> <span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// ...</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #009900;">&#125;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #009900;">&#125;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #000000; font-weight: bold;">?&gt;</span></div></li></ol></pre>
              <p>
                Yukarıda iyileştirme olarak düzenli ifade (regular expression) kullandık. Bizim istedimiz alan adı girişinden başka giriş yapmak mümkün değil.
              </p>

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
