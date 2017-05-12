<?php
$response = "";
$success = TRUE;
require_once ('config/config.inc.php');
if( isset( $_POST[ 'submit' ]  ) ) {
  if( $DBMS == 'MySQL' ) {
    // Create connection
    $conn = new mysqli($_DNRDB[ 'db_server' ], $_DNRDB[ 'db_user' ], $_DNRDB[ 'db_password' ]);
    // Check connection
    if ($conn->connect_error) {
      // die("Connection failed: " . $conn->connect_error . "<br />");
      $success = FALSE;
      $response .= "\n<div class=\"alert alert-danger alert-dismissable fade in\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Veritabanına bağlantı başarısız oldu:</strong> $conn->connect_error
        </div>";
      die;
    }

    // Drop database
    $drop_db = "DROP DATABASE IF EXISTS {$_DNRDB[ 'db_database' ]}";
    if ($conn->query($drop_db) === TRUE) {
      // echo "Database dropped successfully<br />";
      $response .= "\n<div class=\"alert alert-info alert-dismissable fade in\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Bilgi:</strong> Veritabanı başarıyla silindi.
        </div>";
    } else {
      // echo "Error dropping database: " . $conn->error . "<br />";
      $success = FALSE;
      $response .= "\n<div class=\"alert alert-danger alert-dismissable fade in\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Veritabanı silinirken hata oluştu:</strong> $conn->error
        </div>";
    }

    // Create database
    $create_db = "CREATE DATABASE {$_DNRDB[ 'db_database' ]} CHARACTER SET utf16 COLLATE utf16_turkish_ci";
    if ($conn->query($create_db) === TRUE) {
      // echo "Database created successfully<br />";
      $response .= "\n<div class=\"alert alert-info alert-dismissable fade in\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Bilgi:</strong> Veritabanı başarıyla oluşturuldu.
        </div>";
    } else {
      // echo "Error creating database: " . $conn->error . "<br />";
      $success = FALSE;
      $response .= "\n<div class=\"alert alert-danger alert-dismissable fade in\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Veritabanı oluşturulurken hata oluştu:</strong> $conn->error
        </div>";
    }

    // Create users tables
    $create_table_users = "CREATE TABLE {$_DNRDB[ 'db_database' ]}.users (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      firstname VARCHAR(32) NOT NULL,
      lastname VARCHAR(32) NOT NULL,
      email VARCHAR(50) NOT NULL,
      phone VARCHAR(19) NOT NULL,
      password VARCHAR(32) NOT NULL
    )";

    if ($conn->query($create_table_users) === TRUE) {
      // echo "Table 'users' created successfully<br />";
      $response .= "\n<div class=\"alert alert-info alert-dismissable fade in\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Bilgi:</strong> 'users' tablo'su başarıyla oluşturuldu.
        </div>";

      $USERS = array();
      array_push($USERS, "INSERT INTO {$_DNRDB[ 'db_database' ]}.users (firstname, lastname, email, phone, password) VALUES ('Ali', 'Yılmaz', 'ali.yilmaz@aol.com', '+90 (506) 589 01 63', '" . md5('ali.yilmaz') . "')" );
      array_push($USERS, "INSERT INTO {$_DNRDB[ 'db_database' ]}.users (firstname, lastname, email, phone, password) VALUES ('Berat', 'Kaya', 'berat.kaya@yahoo.com', '+90 (553) 425 42 57', '" . md5('berat.kaya') . "')" );
      array_push($USERS, "INSERT INTO {$_DNRDB[ 'db_database' ]}.users (firstname, lastname, email, phone, password) VALUES ('Deniz', 'Yüksel', 'deniz.yuksel@icloud.com', '+90 (535) 505 04 43', '" . md5('deniz.yuksel') . "')" );
      array_push($USERS, "INSERT INTO {$_DNRDB[ 'db_database' ]}.users (firstname, lastname, email, phone, password) VALUES ('Hasan', 'Akgün', 'hasan.akgun@gmail.com', '+90 (542) 636 24 21', '" . md5('hasan.akgun') . "')" );
      array_push($USERS, "INSERT INTO {$_DNRDB[ 'db_database' ]}.users (firstname, lastname, email, phone, password) VALUES ('Mehmet', 'Aydın', 'mehmet.aydin@hotmail.com', '+90 (532) 309 82 18', '" . md5('mehmet.aydin') . "')" );
      array_push($USERS, "INSERT INTO {$_DNRDB[ 'db_database' ]}.users (firstname, lastname, email, phone, password) VALUES ('Yusuf', 'Doğan', 'yusuf.dogan@gmail.com', '+90 (554) 957 56 41', '" . md5('yusuf.dogan') . "')" );
      foreach ($USERS as $sql) {
        if ($conn->query($sql) === TRUE) {
          // $last_id = $conn->insert_id;
          // echo "Data inserted into 'users' table. Last inserted ID is: " . $last_id . "<br />";
          // $response .= "\n<div class=\"alert alert-success alert-dismissable fade in\">
          //   <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
          //   <strong>Bilgi:</strong> Veri 'users' tablosuna eklendi. Son eklenen ID: $last_id
          //   </div>";
        } else {
          // echo "Error: " . $sql . "<br />" . $conn->error . "<br />";
          $success = FALSE;
          $response .= "\n<div class=\"alert alert-danger alert-dismissable fade in\">
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
            <strong>Hata:</strong> $sql $conn->error
            </div>";
        }
      }
    } else {
      // echo "Error creating table: " . $conn->error . "<br />";
      $success = FALSE;
      $response .= "\n<div class=\"alert alert-danger alert-dismissable fade in\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Tablo oluşturulurken hata oluştu:</strong> $conn->error
        </div>";
    }

    // Create domains table
    $create_table_domains = "CREATE TABLE {$_DNRDB[ 'db_database' ]}.domains (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      user_id INT(6) UNSIGNED NOT NULL,
      domain VARCHAR(50) NOT NULL,
      record VARCHAR(15) NOT NULL,
      FOREIGN KEY (user_id) REFERENCES {$_DNRDB[ 'db_database' ]}.users (id)
    )";

    if ($conn->query($create_table_domains) === TRUE) {
      // echo "Table 'domains' created successfully<br />";
      $response .= "\n<div class=\"alert alert-info alert-dismissable fade in\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Bilgi:</strong> 'domains' tablo'su başarıyla oluşturuldu.
        </div>";

      $DOMAINS = array();
      array_push($DOMAINS, "INSERT INTO {$_DNRDB[ 'db_database' ]}.domains (user_id, domain, record) VALUES (1, 'firsat.com.tr', '36.182.224.219')");
      array_push($DOMAINS, "INSERT INTO {$_DNRDB[ 'db_database' ]}.domains (user_id, domain, record) VALUES (1, 'enucuzu.com.tr', '38.154.247.125')");

      array_push($DOMAINS, "INSERT INTO {$_DNRDB[ 'db_database' ]}.domains (user_id, domain, record) VALUES (2, 'bizimgazete.com.tr', '129.72.175.81')");

      array_push($DOMAINS, "INSERT INTO {$_DNRDB[ 'db_database' ]}.domains (user_id, domain, record) VALUES (3, 'fanatikspor.com.tr', '56.33.239.241')");
      array_push($DOMAINS, "INSERT INTO {$_DNRDB[ 'db_database' ]}.domains (user_id, domain, record) VALUES (3, 'mp3ceviri.com.tr', '57.74.3.125')");

      array_push($DOMAINS, "INSERT INTO {$_DNRDB[ 'db_database' ]}.domains (user_id, domain, record) VALUES (4, 'mobilyacim.com.tr', '73.32.240.162')");
      array_push($DOMAINS, "INSERT INTO {$_DNRDB[ 'db_database' ]}.domains (user_id, domain, record) VALUES (4, 'hizliemlak.com.tr', '76.124.16.52')");
      array_push($DOMAINS, "INSERT INTO {$_DNRDB[ 'db_database' ]}.domains (user_id, domain, record) VALUES (4, 'kiralikoto.com.tr', '77.50.24.135')");

      array_push($DOMAINS, "INSERT INTO {$_DNRDB[ 'db_database' ]}.domains (user_id, domain, record) VALUES (5, 'sanalbanka.com.tr', '60.197.57.224')");

      array_push($DOMAINS, "INSERT INTO {$_DNRDB[ 'db_database' ]}.domains (user_id, domain, record) VALUES (6, 'eczaneburada.com.tr', '42.122.100.19')");
      foreach ($DOMAINS as $sql) {
        if ($conn->query($sql) === TRUE) {
          // $last_id = $conn->insert_id;
          // echo "Data inserted into 'domains' table. Last inserted ID is: " . $last_id . "<br />";
          // $response .= "\n<div class=\"alert alert-success alert-dismissable fade in\">
          //   <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
          //   <strong>Bilgi:</strong> Veri 'domains' tablosuna eklendi. Son eklenen ID: $last_id
          //   </div>";
        } else {
          // echo "Error: " . $sql . "<br />" . $conn->error . "<br />";
          $success = FALSE;
          $response .= "\n<div class=\"alert alert-danger alert-dismissable fade in\">
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
            <strong>Hata:</strong> $sql $conn->error
            </div>";
        }
      }
    } else {
      // echo "Error creating table: " . $conn->error . "<br />";
      $success = FALSE;
      $response .= "\n<div class=\"alert alert-danger alert-dismissable fade in\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Tablo oluşturulurken hata oluştu:</strong> $conn->error
        </div>";
    }

    // Create tickets table
    $create_table_tickets = "CREATE TABLE {$_DNRDB[ 'db_database' ]}.tickets (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      subject VARCHAR(80) NOT NULL,
      message VARCHAR(320) NOT NULL
    )";

    if ($conn->query($create_table_tickets) === TRUE) {
      // echo "Table 'tickets' created successfully<br />";
      $response .= "\n<div class=\"alert alert-info alert-dismissable fade in\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Bilgi:</strong> 'tickets' tablo'su başarıyla oluşturuldu.
        </div>";
      $TICKETS = array();
      array_push($TICKETS, "INSERT INTO {$_DNRDB[ 'db_database' ]}.tickets (subject, message) VALUES ('Alan adı transferi nasıl yapılır?', 'GoDaddy hesabımdan bu sisteminizdeki hesabıma nasıl alan adı (domain) transferi yapabilirim?')");
      foreach ($TICKETS as $sql) {
        if ($conn->query($sql) === TRUE) {
          // $last_id = $conn->insert_id;
          // echo "Data inserted into 'tickets' table. Last inserted ID is: " . $last_id . "<br />";
          // $response .= "\n<div class=\"alert alert-success alert-dismissable fade in\">
          //   <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
          //   <strong>Bilgi:</strong> Veri 'tickets' tablosuna eklendi. Son eklenen ID: $last_id
          //   </div>";
        } else {
          // echo "Error: " . $sql . "<br />" . $conn->error . "<br />";
          $success = FALSE;
          $response .= "\n<div class=\"alert alert-danger alert-dismissable fade in\">
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
            <strong>Hata:</strong> $sql $conn->error
            </div>";
        }
      }
    } else {
      // echo "Error creating table: " . $conn->error . "<br />";
      $success = FALSE;
      $response .= "\n<div class=\"alert alert-danger alert-dismissable fade in\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Tablo oluşturulurken hata oluştu:</strong> $conn->error
        </div>";
    }

    // Closing connection
    $conn->close();

  } else {
    // die ( "Unknown {$DBMS} selected." );
    $success = FALSE;
    $response .= "\n<div class=\"alert alert-danger alert-dismissable fade in\">
      <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
      <strong>Bilinmeyen {$DBMS} seçildi.</strong>
      </div>";
    die;
  }

  if($success === TRUE){
    $response .= "\n<div class=\"alert alert-success alert-dismissable fade in\">
      <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
      <strong>Kurulum başarılı!</strong>
      </div>";
  } else {
    $response .= "\n<div class=\"alert alert-danger alert-dismissable fade in\">
      <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
      <strong>Kurulum başarısız oldu.</strong>
      </div>";
  }
  $response .= "\n<hr />";
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
            <h1>Veritabanı Kurulumu <span class="glyphicon glyphicon-wrench webapp-h1-glyphicon" aria-hidden="true"></span></h1>
            <hr class="webapp-hr">
            <p>
              Veritabanı oluşturmak veya sıfırlamak için aşağıdaki <span class="label webapp-label-danger"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Kur / Sıfırla</span> düğmesine tıklayın. Veritabanınızı oluşturmaya çalışırken
              bir hata mesajı alırsanız <code><strong>./config/config.inc.php</strong></code> içinde veritabanın bağlantı ayarlarının doğru olduğundan emin olun. Veritabanın bağlantı ayarları varsayılan olarak aşağıdaki şekildedir:
            </p>
            <pre class="php" style="font-family:monospace;"><span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_server'</span> <span style="color: #009900;">&#93;</span>   <span style="color: #339933;">=</span> <span style="color: #0000ff;">'127.0.0.1'</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_database'</span> <span style="color: #009900;">&#93;</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">'dnrdb'</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_user'</span> <span style="color: #009900;">&#93;</span>     <span style="color: #339933;">=</span> <span style="color: #0000ff;">'root'</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_password'</span> <span style="color: #009900;">&#93;</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">''</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$_DNRDB</span><span style="color: #009900;">&#91;</span> <span style="color: #0000ff;">'db_port '</span><span style="color: #009900;">&#93;</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">'3306'</span><span style="color: #339933;">;</span></pre>
            <p>
              Veritabanı zaten varsa, silinecek ve veriler sıfırlanacaktır.
            </p>
            <hr />

            <form method="post" action="">
              <button type="submit" name="submit" class="btn btn-danger"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> <strong>Kur / Sıfırla</strong></button>
            </form>
            <hr />
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
            <a href="setup.php" class="list-group-item webapp-list-group-item-active">
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
