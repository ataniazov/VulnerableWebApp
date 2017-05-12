<?php
$response = "";
$login_message = "";
if( isset( $_GET[ 'submit' ]  ) ) {
	// Veritaban bağlantı ayarlarını al
	require_once ('config/config.inc.php');
	if( $DBMS == 'MySQL' ) {
		// E-posta al
		$email = $_GET[ 'email' ];
		// Şifre al
    $pass = $_GET[ 'password' ];
		// Veritabanı ile bağlantı kur
		$conn = new mysqli($_DNRDB[ 'db_server' ], $_DNRDB[ 'db_user' ], $_DNRDB[ 'db_password' ]);
		// Bağlantı kuruldu mu?
		if ($conn->connect_error) {
			// Bağlantı kurulamadı!
			// die("Connection failed: " . $conn->connect_error . "<br />");
			$response .= "\n<div class=\"alert alert-danger alert-dismissable fade in\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Veritabanına bağlantı başarısız oldu:</strong> $conn->connect_error
        </div>";
			die;
		}
		// Bağlantı başarılı

		// Sorgu hazırlama
		$sql = "SELECT id, firstname, lastname, email, phone FROM {$_DNRDB[ 'db_database' ]}.users WHERE (users.email = '$email') AND (users.password = md5('$pass')) LIMIT 1;";
		// Veritabanına sorgulama
    $result = $conn->query($sql);
		// Sorgu sonucu var mı?
		if ($result->num_rows > 0) {
			// Sorgu başarılı
      $row = $result->fetch_assoc();
      // Giriş başarılı
      $login_message = "<div class=\"alert alert-success alert-dismissable fade in\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <span class=\"glyphicon glyphicon-ok-circle\" aria-hidden=\"true\"></span> Giriş başarılı.
        </div>";
			$response .= "<div class=\"table-responsive\">
				<table class=\"table table-bordered table-striped table-hover\">
				<thead>
				<tr>
				<th>Ad</th>
				<th>Soyad</th>
				<th>E-posta</th>
				<th>Telefon</th>
				</tr>
				</thead>
				<tbody>
				<tr>
				<td>{$row[ 'firstname' ]}</td>
				<td>{$row[ 'lastname' ]}</td>
				<td>{$row[ 'email' ]}</td>
				<td>{$row[ 'phone' ]}</td>
				</tr>
				</tbody>
				</table>
				</div>";

			$sql = "SELECT * FROM {$_DNRDB[ 'db_database' ]}.domains WHERE domains.user_id={$row[ 'id' ]};";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				$response .= "\n<div class=\"table-responsive\">
					<table class=\"table table-bordered table-striped table-hover\">
					<thead>
					<tr>
					<th>Alan adı</th>
					<th>Kayıt</th>
					</tr>
					</thead>
					<tbody>";
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$response .= "\n<tr>
						<td>{$row[ 'domain' ]}</td>
						<td>{$row[ 'record' ]}</td>
						</tr>";
				}
				$response .= "\n</tbody>
					</table>
					</div>";
			}

		} else {
			// echo "0 results";
      $login_message = "<div class=\"alert alert-danger alert-dismissable fade in\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <span class=\"glyphicon glyphicon-ban-circle\" aria-hidden=\"true\"></span> E-posta adresi veya Şifre yanlış.
        </div>";
		}
		// Veritabanı ile bağlantı kes
		$conn->close();
	}
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
							<h1>SQL Enjeksiyon <span class="glyphicon glyphicon-pushpin webapp-h1-glyphicon" aria-hidden="true"></span></h1>
						</div>

            <hr class="webapp-hr">
            <div class="jumbotron" id="webapp-vuln-jumbo">
              <form class="form-signin" method="get" action="">
                <?php echo $login_message; ?>
                <h2 class="form-signin-heading">Lütfen giriş yapınız:</h2>
                 <div class="input-group">
                   <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <label for="inputEmail" class="sr-only">Email address</label>
                   <input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-posta adresi" required autofocus>
                 </div>
                 <div class="input-group">
                   <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                   <label for="inputPassword" class="sr-only">Password</label>
                   <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Şifre" required>
                 </div>
                <button class="btn btn-lg btn-block webapp-button" type="submit" name="submit" style="margin: 10px 0px 0px 0px;"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Giriş yap</button>
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
            <a href="sqli.php" class="list-group-item webapp-list-group-item-active">
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
								E-posta adresi: <strong>ali.yilmaz@aol.com</strong><br />
								Şifre: <strong>ali.yilmaz</strong>
							</p>
							<p>
								E-posta adresi: <strong>berat.kaya@yahoo.com</strong><br />
								Şifre: <strong>berat.kaya</strong>
							</p>
							<p>
								Şifresiz giriş için şifre giriş alanına aşağıdaki SQL enjeksiyonunu girebilirsiniz:
							</p>
							<pre><code>') OR 1=1)#</code></pre>
							<pre><code>') OR 1=1)-- </code></pre>
              <p>
                Zafiyet sömürüsü için tarayıcının URL girişine aşağıdaki satırı giriniz:
              </p>
							<pre><code>http://localhost/www/sqli.php?email=ali.yilmaz%40aol.com&password=%27%29+OR+1%3D1%29%23&submit=</code></pre>
              <pre><code>http://localhost/www/sqli.php?email=berat.kaya%40yahoo.com&password=%27%29+OR+1%3D1%29--+&submit=</code></pre>
            </div>
            <div id="explanation" class="tab-pane fade">
              <h2>Açıklama</h2>
              <hr class="webapp-hr">
              <p><strong>SQL enjeksiyon</strong> web sitelerine, programlara, uygulamalara vs. veritabanı kullanan projelerin açıklarından faydalanarak adında belli olduğu gibi SQL(Yapısal Sorgulama Dili) eklemesi yapmak suretiyle sızma işlemidir. Amaç yazılımcının veritabanı sorgusu için kullandığı SQL yapısına dışarıdan bir müdahale ile sisteminize sızmak ve açık bulma ve bunu kullanarak geniş çaplı olabilecek yetki ve bilgilere ulaşmaya çalışmaktır. SQL enjeksiyon genellikle yazılımsal hatalar ve güvenlik zaafları sonucu oluşur ve çözümü bazen sadece birkaç basit kod satırını kullanmak olabilir.</p>
							<pre class="php" style="font-family:monospace;"><ol><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #000000; font-weight: bold;">&lt;?php</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #b1b100;">if</span><span style="color: #009900;">&#40;</span> <span style="color: #990000;">isset</span><span style="color: #009900;">&#40;</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'submit'</span> <span style="color: #009900;">&#93;</span>  <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #666666; font-style: italic;">// Veritaban bağlantı ayarlarını al</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #b1b100;">require_once</span> <span style="color: #009900;">&#40;</span><span style="color: #0000ff;">'config/config.inc.php'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #b1b100;">if</span><span style="color: #009900;">&#40;</span> <span style="color: #000088;">$DBMS</span> <span style="color: #339933;">==</span> <span style="color: #0000ff;">'MySQL'</span> <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// E-posta al</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$email</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'email'</span> <span style="color: #009900;">&#93;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Şifre al</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$pass</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'password'</span> <span style="color: #009900;">&#93;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Veritabanı ile bağlantı kur</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$conn</span> <span style="color: #339933;">=</span> <span style="color: #000000; font-weight: bold;">new</span> mysqli<span style="color: #009900;">&#40;</span><span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_server'</span> <span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span> <span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_user'</span> <span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span> <span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_password'</span> <span style="color: #009900;">&#93;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Bağlantı kuruldu mu?</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #b1b100;">if</span> <span style="color: #009900;">&#40;</span><span style="color: #000088;">$conn</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">connect_error</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">      <span style="color: #666666; font-style: italic;">// Bağlantı kurulamadı!</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">      <span style="color: #990000;">die</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #009900;">&#125;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Bağlantı başarılı</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">&nbsp;</div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Sorgu hazırlama</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$sql</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">&quot;SELECT id, firstname, lastname, email, phone FROM {<span style="color: #006699; font-weight: bold;">$_DNRDB</span>[ 'db_database' ]}.users</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #0000ff;">     WHERE (users.email = '<span style="color: #006699; font-weight: bold;">$email</span>') AND (users.password = md5('<span style="color: #006699; font-weight: bold;">$pass</span>')) LIMIT 1;&quot;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Veritabanına sorgulama</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$result</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$conn</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #009900;">&#40;</span><span style="color: #000088;">$sql</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Sorgu sonucu var mı?</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #b1b100;">if</span> <span style="color: #009900;">&#40;</span><span style="color: #000088;">$result</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">num_rows</span> <span style="color: #339933;">&gt;</span> <span style="color: #cc66cc;">0</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">      <span style="color: #666666; font-style: italic;">// Sorgu başarılı</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">      <span style="color: #000088;">$row</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$result</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">fetch_assoc</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">      <span style="color: #666666; font-style: italic;">// ...</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #009900;">&#125;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">&nbsp;</div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Veritabanı ile bağlantı kes</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$conn</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">close</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #009900;">&#125;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #009900;">&#125;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #000000; font-weight: bold;">?&gt;</span></div></li></ol></pre>
							<p>
								Yukarıda görüldüğü gibi "password" parametresi GET metodu ile alındıktan sonra herhangi bir filtreleme veya kontrol işleminden geçirilmeden veritabanına sorgu içerisinde kullanılmaktadır. Bir saldırgan, "password" parametresine şifre yerine <strong><code>') OR 1=1)#</code></strong> veya <strong><code>') OR 1=1)-- </code></strong> gibi bir girdi girerek giriş yapar ve kullanıcı bilgilerine erişir. Kullanıcı tarafından gelen girdi sunucu tarafında herhangi bir kontrol ve filtreleme işlemine tabi tutulmadan veritabanına sorgu içerisinde kullanıldığı için bu açık ortaya çıkmıştır.
							</p>
            </div>
            <div id="prevention" class="tab-pane fade">
              <!-- Online syntax highlighter: http://highlight.hohli.com/ -->
              <h2>Önleme</h2>
              <hr class="webapp-hr">
							<p>
								SQL enjeksiyonlarını önlemek için bağlı parametreleri kullanan hazır ifadeler denen (Use Prepared Statements) kullanmamız gerekir. Prepared Statements, değişkenleri SQL dizeleri ile birleştirmez, bu nedenle bir saldırganın SQL deyimini değiştirmesi mümkün değildir. Prepared Statements, değişkeni derlenmiş SQL deyimiyle birleştirir; bu, SQL ve değişkenlerin ayrı gönderildiği ve değişkenlerin SQL deyiminin parçası değil yalnızca dizeler olarak yorumlandığı anlamına gelir.
							</p>
							<p>
								Prepared Statements ile SQLi önlemesi için iki araçtan biri kullanıla bilinir. Onlar PDO ve MySQLi. Buradaki iyileştirme örneğinde MySQLi kullanılmıştır.
							</p>

							<pre class="php" style="font-family:monospace;"><ol><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #000000; font-weight: bold;">&lt;?php</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #b1b100;">if</span><span style="color: #009900;">&#40;</span> <span style="color: #990000;">isset</span><span style="color: #009900;">&#40;</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'submit'</span> <span style="color: #009900;">&#93;</span>  <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #666666; font-style: italic;">// Veritaban bağlantı ayarlarını al</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #b1b100;">require_once</span> <span style="color: #009900;">&#40;</span><span style="color: #0000ff;">'config/config.inc.php'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #b1b100;">if</span><span style="color: #009900;">&#40;</span> <span style="color: #000088;">$DBMS</span> <span style="color: #339933;">==</span> <span style="color: #0000ff;">'MySQL'</span> <span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// E-posta al</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$email</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'email'</span> <span style="color: #009900;">&#93;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Şifre al</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$pass</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$_GET</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'password'</span> <span style="color: #009900;">&#93;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Veritabanı ile bağlantı kur</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$conn</span> <span style="color: #339933;">=</span> <span style="color: #000000; font-weight: bold;">new</span> mysqli<span style="color: #009900;">&#40;</span><span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_server'</span> <span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span> <span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_user'</span> <span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span> <span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_password'</span> <span style="color: #009900;">&#93;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Bağlantı kuruldu mu?</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #b1b100;">if</span> <span style="color: #009900;">&#40;</span><span style="color: #000088;">$conn</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">connect_error</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">      <span style="color: #666666; font-style: italic;">// Bağlantı kurulamadı!</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">      <span style="color: #990000;">die</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #009900;">&#125;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Bağlantı başarılı</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">&nbsp;</div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #b1b100;">if</span> <span style="color: #009900;">&#40;</span><span style="color: #000088;">$stmt</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$mysqli</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">prepare</span><span style="color: #009900;">&#40;</span><span style="color: #0000ff;">&quot;SELECT id, firstname, lastname, email, phone</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #0000ff;">      FROM {<span style="color: #006699; font-weight: bold;">$_DNRDB</span>[ 'db_database' ]}.users WHERE (users.email = ?) AND (users.password = ?) LIMIT 1;&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">        <span style="color: #666666; font-style: italic;">// MD5 hash hesaplama</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">        <span style="color: #000088;">$pass</span> <span style="color: #339933;">=</span> <span style="color: #990000;">md5</span><span style="color: #009900;">&#40;</span><span style="color: #000088;">$pass</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">        <span style="color: #666666; font-style: italic;">// Değişken parametreye bir dize olarak bağlanır</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">        <span style="color: #000088;">$stmt</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">bind_param</span><span style="color: #009900;">&#40;</span><span style="color: #0000ff;">&quot;ss&quot;</span><span style="color: #339933;">,</span> <span style="color: #000088;">$email</span><span style="color: #339933;">,</span> <span style="color: #000088;">$pass</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">        <span style="color: #666666; font-style: italic;">// Veritabanına sorgulama</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">        <span style="color: #000088;">$stmt</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">execute</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">        <span style="color: #666666; font-style: italic;">// Sorgudan değişkenleri al</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">        <span style="color: #000088;">$stmt</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">bind_result</span><span style="color: #009900;">&#40;</span><span style="color: #000088;">$id</span><span style="color: #339933;">,</span> <span style="color: #000088;">$firstname</span><span style="color: #339933;">,</span> <span style="color: #000088;">$lastname</span><span style="color: #339933;">,</span> <span style="color: #000088;">$email</span><span style="color: #339933;">,</span> <span style="color: #000088;">$phone</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">        <span style="color: #666666; font-style: italic;">// İstenen verileri çek</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">        <span style="color: #000088;">$stmt</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">fetch</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">        <span style="color: #666666; font-style: italic;">// ...</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">&nbsp;</div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">        <span style="color: #666666; font-style: italic;">// Prepared statement kapat</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">        <span style="color: #000088;">$stmt</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">close</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #009900;">&#125;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #666666; font-style: italic;">// Veritabanı ile bağlantı kes</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">    <span style="color: #000088;">$conn</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">close</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;">  <span style="color: #009900;">&#125;</span></div></li><li style="font-weight: normal; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #009900;">&#125;</span></div></li><li style="font-weight: bold; vertical-align:top;"><div style="font: normal normal 1em/1.2em monospace; margin:0; padding:0; background:none; vertical-align:top;"><span style="color: #000000; font-weight: bold;">?&gt;</span></div></li></ol></pre>

							<p>
								Yukarıda görüldüğü gibi 'password' parametresi GET metodu ile alındıktan sonra $stmt isimli MySQLi nesnesine string parametresi olarak veriliyor. Bir saldırgan, istenen şifre girişinden başka SQL enjeksiyonunu kullanırsa, o giriş MySQLi nesnesinde takılır ve veritabanına sorgu yapılmaz.
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
