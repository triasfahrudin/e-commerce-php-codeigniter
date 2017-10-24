<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-10-19 10:39:23 --> ErrorException [ 8 ]: Undefined variable: menus ~ /home/trias/htdocs/bella_ecommerce/application/modules/web/views/master.php [ 123 ]
ERROR - 2017-10-19 10:39:23 --> Severity: Error --> Call to a member function result_array() on a non-object /home/trias/htdocs/bella_ecommerce/application/modules/web/views/master.php 123
ERROR - 2017-10-19 13:46:56 --> ErrorException [ 8 ]: Constant ENVIRONMENT already defined ~ /home/trias/htdocs/bella_ecommerce/index.php [ 57 ]
ERROR - 2017-10-19 13:46:56 --> ErrorException [ 8 ]: Constant SELF already defined ~ /home/trias/htdocs/bella_ecommerce/index.php [ 229 ]
ERROR - 2017-10-19 13:46:56 --> ErrorException [ 8 ]: Constant BASEPATH already defined ~ /home/trias/htdocs/bella_ecommerce/index.php [ 232 ]
ERROR - 2017-10-19 13:46:56 --> ErrorException [ 8 ]: Constant FCPATH already defined ~ /home/trias/htdocs/bella_ecommerce/index.php [ 235 ]
ERROR - 2017-10-19 13:46:56 --> ErrorException [ 8 ]: Constant SYSDIR already defined ~ /home/trias/htdocs/bella_ecommerce/index.php [ 238 ]
ERROR - 2017-10-19 13:46:56 --> ErrorException [ 8 ]: Constant APPPATH already defined ~ /home/trias/htdocs/bella_ecommerce/index.php [ 271 ]
ERROR - 2017-10-19 13:46:56 --> ErrorException [ 8 ]: Constant VIEWPATH already defined ~ /home/trias/htdocs/bella_ecommerce/index.php [ 308 ]
ERROR - 2017-10-19 22:52:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`DESC` ASC
 LIMIT 10' at line 4 - Invalid query: SELECT `stok_opname`.*, j86f9cc88.nama AS s86f9cc88
FROM `stok_opname`
LEFT JOIN `produk` as `j86f9cc88` ON `j86f9cc88`.`id` = `stok_opname`.`produk_id`
ORDER BY `tgl` `DESC` ASC
 LIMIT 10
ERROR - 2017-10-19 22:52:04 --> ErrorException [ 1 ]: Error Number: 1064 / You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`DESC` ASC
 LIMIT 10' at line 4 / SELECT `stok_opname`.*, j86f9cc88.nama AS s86f9cc88
FROM `stok_opname`
LEFT JOIN `produk` as `j86f9cc88` ON `j86f9cc88`.`id` = `stok_opname`.`produk_id`
ORDER BY `tgl` `DESC` ASC
 LIMIT 10 / Filename: models/Grocery_crud_model.php / Line Number: 87 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 87 ]
ERROR - 2017-10-19 22:57:35 --> ErrorException [ 2 ]: include( settings.php): failed to open stream: No such file or directory ~ /home/trias/htdocs/bella_ecommerce/application/modules/admin/views/master.php [ 155 ]
ERROR - 2017-10-19 22:57:35 --> ErrorException [ 2 ]: include(): Failed opening ' settings.php' for inclusion (include_path='.:/opt/lampp/lib/php') ~ /home/trias/htdocs/bella_ecommerce/application/modules/admin/views/master.php [ 155 ]
ERROR - 2017-10-19 22:57:51 --> ErrorException [ 2 ]: include( settings.php): failed to open stream: No such file or directory ~ /home/trias/htdocs/bella_ecommerce/application/modules/admin/views/master.php [ 155 ]
ERROR - 2017-10-19 22:57:51 --> ErrorException [ 2 ]: include(): Failed opening ' settings.php' for inclusion (include_path='.:/opt/lampp/lib/php') ~ /home/trias/htdocs/bella_ecommerce/application/modules/admin/views/master.php [ 155 ]
ERROR - 2017-10-19 22:58:07 --> ErrorException [ 2 ]: include( settings.php): failed to open stream: No such file or directory ~ /home/trias/htdocs/bella_ecommerce/application/modules/admin/views/master.php [ 155 ]
ERROR - 2017-10-19 22:58:07 --> ErrorException [ 2 ]: include(): Failed opening ' settings.php' for inclusion (include_path='.:/opt/lampp/lib/php') ~ /home/trias/htdocs/bella_ecommerce/application/modules/admin/views/master.php [ 155 ]
ERROR - 2017-10-19 22:58:46 --> ErrorException [ 2 ]: include( settings.php): failed to open stream: No such file or directory ~ /home/trias/htdocs/bella_ecommerce/application/modules/admin/views/master.php [ 155 ]
ERROR - 2017-10-19 22:58:46 --> ErrorException [ 2 ]: include(): Failed opening ' settings.php' for inclusion (include_path='.:/opt/lampp/lib/php') ~ /home/trias/htdocs/bella_ecommerce/application/modules/admin/views/master.php [ 155 ]
ERROR - 2017-10-19 23:11:12 --> ErrorException [ 2 ]: include(/home/trias/htdocs/bella_ecommerce/application/errors/error_general.php): failed to open stream: No such file or directory ~ /home/trias/htdocs/bella_ecommerce/application/core/MY_Exceptions.php [ 493 ]
ERROR - 2017-10-19 23:11:12 --> ErrorException [ 2 ]: include(): Failed opening '/home/trias/htdocs/bella_ecommerce/application/errors/error_general.php' for inclusion (include_path='.:/opt/lampp/lib/php') ~ /home/trias/htdocs/bella_ecommerce/application/core/MY_Exceptions.php [ 493 ]
ERROR - 2017-10-19 23:12:34 --> ErrorException [ 2 ]: include(/home/trias/htdocs/bella_ecommerce/application/errors/error_general.php): failed to open stream: No such file or directory ~ /home/trias/htdocs/bella_ecommerce/application/core/MY_Exceptions.php [ 493 ]
ERROR - 2017-10-19 23:12:34 --> ErrorException [ 2 ]: include(): Failed opening '/home/trias/htdocs/bella_ecommerce/application/errors/error_general.php' for inclusion (include_path='.:/opt/lampp/lib/php') ~ /home/trias/htdocs/bella_ecommerce/application/core/MY_Exceptions.php [ 493 ]
ERROR - 2017-10-19 23:23:14 --> ErrorException [ 8 ]: Undefined property: stdClass::$relation_value ~ /home/trias/htdocs/bella_ecommerce/application/libraries/Image_CRUD.php [ 527 ]
ERROR - 2017-10-19 23:28:48 --> ErrorException [ 2 ]: Cannot modify header information - headers already sent by (output started at /home/trias/htdocs/bella_ecommerce/application/controllers/Thumb.php:283) ~ /home/trias/htdocs/bella_ecommerce/system-3.1.5/core/Common.php [ 570 ]
ERROR - 2017-10-19 23:29:51 --> ErrorException [ 8 ]: Undefined property: stdClass::$relation_value ~ /home/trias/htdocs/bella_ecommerce/application/libraries/Image_CRUD.php [ 527 ]
ERROR - 2017-10-19 23:29:55 --> ErrorException [ 2 ]: unlink(uploads/slider/c97b4-RESELLER-PERLENGKAPAN-BAYI--NEW-BORN--BABY-BIBS--PERLENGKAPAN-MAKAN-GROSIR-PERLENGKAPAN-BAYI-MICHSHOPBABY--TOKO-ONLINE-MURAH-READY-STOCK-NEW-BOR): No such file or directory ~ /home/trias/htdocs/bella_ecommerce/application/libraries/Image_CRUD.php [ 340 ]
ERROR - 2017-10-19 23:29:55 --> ErrorException [ 2 ]: unlink(uploads/slider/thumb__c97b4-RESELLER-PERLENGKAPAN-BAYI--NEW-BORN--BABY-BIBS--PERLENGKAPAN-MAKAN-GROSIR-PERLENGKAPAN-BAYI-MICHSHOPBABY--TOKO-ONLINE-MURAH-READY-STOCK-NEW-BOR): No such file or directory ~ /home/trias/htdocs/bella_ecommerce/application/libraries/Image_CRUD.php [ 341 ]
ERROR - 2017-10-19 23:29:55 --> ErrorException [ 2 ]: Cannot modify header information - headers already sent by (output started at /home/trias/htdocs/bella_ecommerce/application/core/MY_Exceptions.php:198) ~ /home/trias/htdocs/bella_ecommerce/system-3.1.5/helpers/url_helper.php [ 564 ]
ERROR - 2017-10-19 23:30:31 --> ErrorException [ 8 ]: Undefined property: stdClass::$relation_value ~ /home/trias/htdocs/bella_ecommerce/application/libraries/Image_CRUD.php [ 527 ]
ERROR - 2017-10-19 23:30:34 --> ErrorException [ 2 ]: Cannot modify header information - headers already sent by (output started at /home/trias/htdocs/bella_ecommerce/application/controllers/Thumb.php:283) ~ /home/trias/htdocs/bella_ecommerce/system-3.1.5/core/Common.php [ 570 ]
ERROR - 2017-10-19 23:37:19 --> ErrorException [ 2 ]: Cannot modify header information - headers already sent by (output started at /home/trias/htdocs/bella_ecommerce/application/controllers/Thumb.php:283) ~ /home/trias/htdocs/bella_ecommerce/system-3.1.5/core/Common.php [ 570 ]
