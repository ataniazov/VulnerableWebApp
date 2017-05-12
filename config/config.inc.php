<?php
# Kullanılacak veritabanı yönetim sistemi
$DBMS = 'MySQL';

# Veritabanı değişkenleri
#   UYARI: db_database altında belirtilen veritabanı kurulum sırasında tamamen silinecektir.
#   Lütfen DNDB'ye ayrılmış bir veri tabanı kullanın.
$_DNRDB = array();
$_DNRDB[ 'db_server' ]   = '127.0.0.1';
$_DNRDB[ 'db_database' ] = 'dnrdb';
$_DNRDB[ 'db_user' ]     = 'root';
$_DNRDB[ 'db_password' ] = '';

# Sadece MySQL veritabanı seçimi ile kullanılır.
$_DNRDB[ 'db_port '] = '3306';
?>
