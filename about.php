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
            <h1>Zayıf Web Uygulamasına Hoş Geldiniz!</h1>
            <!-- Trigger the large modal with a button -->
            <button type="button" class="btn btn-xs webapp-button" data-toggle="modal" data-target=".bs-example-modal-lg">
              <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> <strong>Yardım</strong>
            </button>
            <hr class="webapp-hr">
            <p><strong>Zayıf Web Uygulaması</strong> web uygulama güvenliği alanında kendini geliştirmek isteyen pentesterlar ve güvenlik ile uğraşan kimseler için PHP ile oluşturulmuş içinde belli web zafiyetlerini barındıran bir eğitim sistemidir.</p>
            <p>Bu proje Kocaeli Üniversitesinin Bilgisayar Mühendisligi bölümünündeki Yazılım Laboratuvarı 2 (Proje III) ders projesi kapsamında geliştirilmiştir. Güvenlik uzmanlarının arasında meşhur Damn Vulnerable Web Application (DVMA) zayıf web uygulamasından
              ilham alıp bu projeni geliştirdik.</p>
            <p>Uygulamamızın temel amacı güvenlik uzmanlarının becerilerini yasal bir ortamda geliştirmelerine, web geliştiricilerinin uygulamalarını daha iyi anlamalarına ve güvenli yazılımlar geliştirmelerine, hem öğrencilerin hem de öğretmenlerin kontrollü
              bir sınıfta web uygulaması güvenliği hakkında bilgi edinmelerine yardımcı olmak.</p>
            <p>Her zafiyetin bulunduğu her bir sayfada <span class="label webapp-label">Yardım</span> bağlantısına tıklandığında pop-up şeklinde açılan bir sayfada ilgili zafiyetin sömürmek için örnek bir URL, bir paragraflık açıklaması, kaynak koddaki hangi
              kısımdan dolayı ve neden bu zafiyetin ortaya çıktığı, kaynak koddaki hangi değişiklikle ve nasıl bu zafiyetin engellenebileceği yazılıdır.</p>

            <hr>
            <h2 class="text-danger"><strong>UYARI!</strong></h2>
            <p><strong>Geliştirdiğimiz Zayıf Web Uygulamasını denemek için bir web hostinge veya internet'e açık sunuculara yüklemeyiniz.</strong> NAT ağ moduna ayarlanmış bir sanal makine (<a href="https://www.virtualbox.org/" class="webapp-text"><strong>VirtualBox</strong></a>              veya <a href="https://www.vmware.com/" class="webapp-text"><strong>VMware</strong></a> gibi) veya <a href="https://www.apachefriends.org/" class="webapp-text"><strong>XAMPP</strong></a> uygulamasını kullanmanızı öneririz. Herhangi birinin
              uygulamamızı kullanımı ile ilgili sorumluluk kabul etmiyoruz. Uygulamamızın yukarıda belirttigimiz amaçlar dışında (kötü niyetle vs.) kullanmamlısınız. Bu uygulama kurulu web sunucunuz tehlikeye girerse sorumluluğumuz değil, yükleyen kişinin
              sorumluluğu altındadır.</p>

            <hr>
            <h2>Diğer Eğitim Kaynakları</h2>
            <p>Bizim projemiz web uygulamalarında bulunan en yaygın güvenlik açıklarını kapsamayı amaçlamaktadır. Herhangi bir ek saldırı vektörünü keşfetmek veya daha iyi kendinizi geliştirmek istiyorsanız, aşağıdaki projelere bakabilirsiniz:</p>
            <ul>
              <li><a href="http://www.dvwa.co.uk/" class="webapp-text"><strong>DVWA</strong></a></li>
              <li><a href="https://www.owasp.org/index.php/OWASP_Broken_Web_Applications_Project" class="webapp-text"><strong>OWASP Broken Web Applications Project</strong></a></li>
              <li><a href="http://www.itsecgames.com/" class="webapp-text"><strong>bWAPP</strong></a></li>
            </ul>
            <hr>

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
            <a href="exec.php" class="list-group-item webapp-list-group-item">
              <span class="glyphicon glyphicon-console" aria-hidden="true"></span> <strong>Komut Enjeksiyon</strong></a>
          </div>
          <div class="list-group">
            <a href="phpinfo.php" class="list-group-item webapp-list-group-item">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>PHP Info</strong></a>
            <a href="about.php" class="list-group-item webapp-list-group-item-active">
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
            <li><a data-toggle="tab" class="webapp-tab" href="#source"><strong>Kod</strong></a></li>
          </ul>

          <div class="tab-content">
            <div id="exploitation" class="tab-pane fade in active">
              <h2>Sömürü</h2>
              <hr class="webapp-hr">
              <p>Some content.</p>
            </div>
            <div id="explanation" class="tab-pane fade">
              <h2>Açıklama</h2>
              <hr class="webapp-hr">
              <p>Some content in menu 1.</p>
            </div>
            <div id="source" class="tab-pane fade">
              <!-- Online syntax highlighter: http://highlight.hohli.com/ -->
              <h2>Kod</h2>
              <hr class="webapp-hr">
              <p>Some content in menu 2.</p>

              <pre class="php" style="font-family:monospace;"><ol><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #000000; font-weight: bold;">&lt;?php</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #666666; font-style: italic;">// Test comment</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #b1b100;">if</span><span style="color: #009900;">&#40;</span> <span style="color: #990000;">isset</span><span style="color: #009900;">&#40;</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'domain'</span> <span style="color: #009900;">&#93;</span>  <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #000088;">$target</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'domain'</span> <span style="color: #009900;">&#93;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #000088;">$cmd</span> <span style="color: #339933;">=</span> <span style="color: #990000;">shell_exec</span><span style="color: #009900;">&#40;</span> <span style="color: #0000ff;">'whois -H '</span> <span style="color: #339933;">.</span> <span style="color: #000088;">$target</span> <span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #000088;">$stdout</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">&quot;&lt;pre&gt;<span style="color: #006699; font-weight: bold;">{$cmd}</span>&lt;/pre&gt;&quot;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #b1b100;">echo</span> <span style="color: #000088;">$stdout</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #009900;">&#125;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #000000; font-weight: bold;">?&gt;</span></div></li></ol></pre>

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
