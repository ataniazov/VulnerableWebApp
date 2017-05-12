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
            <h1>Kurulum Dokümantasyonu</h1>
            <hr class="webapp-hr">

            <!-- Toggleable / Dynamic Tabs -->
            <ul class="nav nav-pills">
              <li class="active"><a data-toggle="tab" class="webapp-pills" href="#instruction"><strong>Doküman</strong></a></li>
              <li><a data-toggle="tab" class="webapp-pills" href="#license"><strong>Lisans</strong></a></li>
            </ul>

            <div class="tab-content">
              <div id="instruction" class="tab-pane fade in active">
                <h2>Doküman <a href="docs/Zayıf-Web-Uygulaması_v1.0.1.pdf"><small>(.pdf)</small></a></h2>
                <hr class="webapp-hr">
                <p><strong>Zayıf Web Uygulaması</strong> web uygulama güvenliği alanında kendini geliştirmek isteyen pentesterlar ve güvenlik ile uğraşan kimseler için PHP ile oluşturulmuş içinde belli web zafiyetlerini barındıran bir eğitim sistemidir.</p>
                <p>Bu proje Kocaeli Üniversitesinin Bilgisayar Mühendisligi bölümünündeki Yazılım Laboratuvarı 2 (Proje III) ders projesi kapsamında geliştirilmiştir. Güvenlik uzmanlarının arasında meşhur Damn Vulnerable Web Application (DVMA) zayıf web
                  uygulamasından ilham alıp bu projeni geliştirdik.</p>
                <p>Uygulamamızın temel amacı güvenlik uzmanlarının becerilerini yasal bir ortamda geliştirmelerine, web geliştiricilerinin uygulamalarını daha iyi anlamalarına ve güvenli yazılımlar geliştirmelerine, hem öğrencilerin hem de öğretmenlerin
                  kontrollü bir sınıfta web uygulaması güvenliği hakkında bilgi edinmelerine yardımcı olmak.</p>
                <p>Her zafiyetin bulunduğu her bir sayfada <span class="label webapp-label"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Yardım</span> bağlantısına tıklandığında pop-up şeklinde açılan bir sayfada ilgili zafiyetin
                  sömürmek için örnek bir URL, bir paragraflık açıklaması, kaynak koddaki hangi kısımdan dolayı ve neden bu zafiyetin ortaya çıktığı, kaynak koddaki hangi değişiklikle ve nasıl bu zafiyetin engellenebileceği hakkında bilgi edinebilirsiniz.</p>

                <hr />
                <h3 class="text-danger"><strong>UYARI!</strong></h3>
                <p><strong>Geliştirdiğimiz Zayıf Web Uygulamasını denemek için bir web hostinge veya internet'e açık sunuculara yüklemeyiniz.</strong> NAT ağ moduna ayarlanmış bir sanal makine (<a href="https://www.virtualbox.org/" class="webapp-text"><strong>VirtualBox</strong></a>                  veya
                  <a href="https://www.vmware.com/" class="webapp-text"><strong>VMware</strong></a> gibi) veya <a href="https://www.apachefriends.org/" class="webapp-text"><strong>XAMPP</strong></a> uygulamasını kullanmanızı öneririz. Herhangi birinin
                  uygulamamızı kullanımı ile ilgili sorumluluk kabul etmiyoruz. Uygulamamızın yukarıda belirttigimiz amaçlar dışında (kötü niyetle vs.) kullanmamlısınız. Bu uygulama kurulu web sunucunuz tehlikeye girerse sorumluluğumuz değil, yükleyen
                  kişinin sorumluluğu altındadır.</p>

                <hr />
                <h3>Lisans (LICENSE)</h3>
                <p>
                  Zayıf web uygulamamız ücretsiz bir yazılımdır. GNU Genel Kamu Lisansı 3'üncü (GPLv3) versiyonu altında yayınlanmıştır. Free Software Foundation tarafından yayınlanan şartlar altında dağıtabilir ve/veya değiştirebilirsiniz.
                </p>
                <p>
                  GNU Genel Kamu Lisansı'nın bir kopyası bu yazılımla birlikte almışsınızdır, eğer almadıysanız http://www.gnu.org/licenses/ link'inden bakabilirsiniz.
                </p>

                <hr />
                <h3>İndir</h3>
                <p>
                  Uygulamamız github üzerinden geliştirilyor ve dağıtılyor ve <a class="webapp-text" href="https://github.com/ataniazov/Zayif-Web-Uygulamasi/archive/master.zip"><strong>Github Link</strong></a> indirebilirsiniz veya bilgisayarınızda git
                  kuruluysa:
                </p>
                <pre class="bash" style="font-family:monospace;"><span style="color: #c20cb9; font-weight: bold;">git clone</span> https:<span style="color: #000000; font-weight: bold;">//</span>github.com<span style="color: #000000; font-weight: bold;">/</span>ataniazov<span style="color: #000000; font-weight: bold;">/</span>Zayif-Web-Uygulamasi.git</pre>

                <hr />
                <h3>Kurulum</h3>
                <p>
                  Zayıf Web Uygulamasını kurmanın en kolay yolu <a class="webapp-text" href="https://www.apachefriends.org/"><strong>XAMPP</strong></a> uygulamasının indirilip üzerine kurulmasıdır. XAMPP, esas olarak Apache HTTP sunucusu, MySQL veritabanı
                  dağıtımı olup, PHP ve PERL programlama dilleri ile yazılmış çapraz platform web sunucusu çözümü ve ücretsiz, açık kaynaklı yığın paketidir. Oldukça popüler olan bir PHP geliştirme ortamı yazılımıdır. Windows, Mac OS X ve Linux için uygun
                  paketleri bulunmaktadır.
                </p>
                <p>
                  XAMPP <a class="webapp-text" href="https://www.apachefriends.org/"><strong>https://www.apachefriends.org/</strong></a> linkinden indirebilirsiniz.
                </p>
                <p>
                  <a class="webapp-text" href="https://github.com/ataniazov/Zayif-Web-Uygulamasi/archive/master.zip"><strong>Github Link</strong></a> uygulamamızın sıkıştırılmış dosyasını çıkartıp, XAMPP uygulamasının genel html klasörüne yerleştirin,
                  ardından tarayıcınıza aşağıdaki adresi giriniz:
                </p>
                <pre class="html4strict" style="font-family:monospace;">http://127.0.0.1/</pre>
                <br />
                <h4>Ubuntu + XAMPP</h4>
                <p>
                  Zayıf Web Uygulaması <a class="webapp-text" href="https://www.ubuntu.com/"><strong>Ubuntu</strong></a> linux dağıtımının 16.04.2, <a class="webapp-text" href="https://www.apachefriends.org/"><strong>XAMPP</strong></a> uygulamasının 5.6.30
                  versiyonunda test edilmiştir. Ubuntu linux dağıtımına XAMPP kurulumu:
                </p>
                <pre class="bash" style="font-family:monospace;"><span style="color: #c20cb9; font-weight: bold;">wget</span> https:<span style="color: #000000; font-weight: bold;">//</span>www.apachefriends.org<span style="color: #000000; font-weight: bold;">/</span>xampp-files<span style="color: #000000; font-weight: bold;">/</span>5.6.30<span style="color: #000000; font-weight: bold;">/</span>xampp-linux-x64-5.6.30-0-installer.run
<span style="color: #c20cb9; font-weight: bold;">chmod</span> u+x .<span style="color: #000000; font-weight: bold;">/</span>xampp-linux-x64-5.6.30-0-installer.run
<span style="color: #c20cb9; font-weight: bold;">sudo</span> .<span style="color: #000000; font-weight: bold;">/</span>xampp-linux-x64-5.6.30-0-installer.run</pre>
                <p>
                  Komut enjeksiyonu zafiyetinin düzgün çalışması için bilgisayarınızda <strong>whois</strong> uygulamasının kurulu olması gerekmektedir.
                </p>
                <pre class="bash" style="font-family:monospace;"><span style="color: #c20cb9; font-weight: bold;">sudo</span> apt update &amp;&amp; apt install whois</pre>
                <p>
                  Ardından yukarıda belirtilen kurulum aşamalarını izlemeniz yeterlidir.
                </p>
                <br />
                <h4>Veritabanı ayarları</h4>
                <p>
                  Veritabanını kurmak için, ana menüde <span class="label webapp-label"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Kur / Sıfırla</span> düğmesine tıklayın. Bu sizin için bazı verilerle veritabanını oluşturacak
                  / sıfırlayacaktır. Veritabanınızı oluşturmaya çalışırken bir hata mesajı alırsanız <code><strong>./config/config.inc.php</strong></code> içinde veritabanın bağlantı ayarlarının doğru olduğundan emin olun. Veritabanın bağlantı ayarları
                  varsayılan olarak aşağıdaki şekildedir:
                </p>
                <pre class="php" style="font-family:monospace;"><span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_server'</span> <span style="color: #009900;">&#93;</span>   <span style="color: #339933;">=</span> <span style="color: #0000ff;">'127.0.0.1'</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_database'</span> <span style="color: #009900;">&#93;</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">'dnrdb'</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_user'</span> <span style="color: #009900;">&#93;</span>     <span style="color: #339933;">=</span> <span style="color: #0000ff;">'root'</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_password'</span> <span style="color: #009900;">&#93;</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">''</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_port '</span><span style="color: #009900;">&#93;</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">'3306'</span><span style="color: #339933;">;</span></pre>

                <br />
                <h4>Sorun giderme</h4>
                <p>
                  En son sorun giderme bilgileri için lütfen <a class="webapp-text" href="https://github.com/ataniazov/Zayif-Web-Uygulamasi/issues"><strong>Github Issues</strong></a> ziyaret edin.
                </p>
                <blockquote>
                  In open source, no one can hear you scream;)
                  <br /> Please use Google before asking questions.
                </blockquote>
                <hr />
                <h3>Bağlantılar</h3>
                <p>
                  Proje Ana Sayfası: <a class="webapp-text" href="https://github.com/ataniazov/Zayif-Web-Uygulamasi/"><strong>https://github.com/ataniazov/Zayif-Web-Uygulamasi/</strong></a>
                </p>
                <i>Ata Niyazov tarafından yazılmış ve geliştirilmiştir</i>
                <hr />
              </div>
              <div id="license" class="tab-pane fade">
                <h2>Lisans</h2>
                <hr class="webapp-hr">
                <iframe class="webapp-iframe" src="LICENSE"></iframe>
              </div>
            </div>

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
            <a href="instructions.php" class="list-group-item webapp-list-group-item-active">
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
