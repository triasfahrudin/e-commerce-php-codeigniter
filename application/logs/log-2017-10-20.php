<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-10-20 09:24:05 --> ErrorException [ 8 ]: Undefined variable: parent ~ /home/trias/htdocs/bella_ecommerce/application/modules/web/controllers/Web.php [ 47 ]
ERROR - 2017-10-20 09:51:52 --> ErrorException [ 4096 ]: Object of class CI_DB_mysqli_result could not be converted to string ~ /home/trias/htdocs/bella_ecommerce/system-3.1.5/database/DB_query_builder.php [ 836 ]
ERROR - 2017-10-20 09:51:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `produk`
WHERE `kategori_id` IN()
ERROR - 2017-10-20 09:51:52 --> ErrorException [ 1 ]: Error Number: 1064 / You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 / SELECT *
FROM `produk`
WHERE `kategori_id` IN() / Filename: modules/web/controllers/Web.php / Line Number: 58 ~ /home/trias/htdocs/bella_ecommerce/application/modules/web/controllers/Web.php [ 58 ]
ERROR - 2017-10-20 09:59:38 --> Severity: Error --> Call to undefined method Web::_paginate() /home/trias/htdocs/bella_ecommerce/application/modules/web/controllers/Web.php 72
ERROR - 2017-10-20 10:07:43 --> ErrorException [ 2 ]: Cannot modify header information - headers already sent by (output started at /home/trias/htdocs/bella_ecommerce/application/controllers/Thumb.php:283) ~ /home/trias/htdocs/bella_ecommerce/system-3.1.5/core/Common.php [ 570 ]
ERROR - 2017-10-20 10:08:40 --> ErrorException [ 2 ]: Cannot modify header information - headers already sent by (output started at /home/trias/htdocs/bella_ecommerce/application/controllers/Thumb.php:283) ~ /home/trias/htdocs/bella_ecommerce/system-3.1.5/core/Common.php [ 570 ]
ERROR - 2017-10-20 10:08:52 --> ErrorException [ 2 ]: Cannot modify header information - headers already sent by (output started at /home/trias/htdocs/bella_ecommerce/application/controllers/Thumb.php:283) ~ /home/trias/htdocs/bella_ecommerce/system-3.1.5/core/Common.php [ 570 ]
ERROR - 2017-10-20 10:13:02 --> Severity: Error --> Call to a member function result_array() on a non-object /home/trias/htdocs/bella_ecommerce/application/modules/web/views/kategori.php 222
ERROR - 2017-10-20 10:13:19 --> Severity: Error --> Call to a member function result_array() on a non-object /home/trias/htdocs/bella_ecommerce/application/modules/web/views/kategori.php 222
ERROR - 2017-10-20 10:28:12 --> ErrorException [ 2 ]: Cannot modify header information - headers already sent by (output started at /home/trias/htdocs/bella_ecommerce/application/controllers/Thumb.php:283) ~ /home/trias/htdocs/bella_ecommerce/system-3.1.5/core/Common.php [ 570 ]
ERROR - 2017-10-20 10:31:07 --> ErrorException [ 8 ]: Undefined index: rincian ~ /home/trias/htdocs/bella_ecommerce/application/modules/web/views/kategori.php [ 228 ]
ERROR - 2017-10-20 12:35:05 --> ErrorException [ 2 ]: Cannot modify header information - headers already sent by (output started at /home/trias/htdocs/bella_ecommerce/application/controllers/Thumb.php:283) ~ /home/trias/htdocs/bella_ecommerce/system-3.1.5/core/Common.php [ 570 ]
ERROR - 2017-10-20 13:36:03 --> Query error: Table 'bella_ecommerce.-produk' doesn't exist - Invalid query: SELECT *
FROM `-produk`
WHERE `slug` =0
ERROR - 2017-10-20 13:36:03 --> ErrorException [ 1 ]: Error Number: 1146 / Table 'bella_ecommerce.-produk' doesn't exist / SELECT *
FROM `-produk`
WHERE `slug` =0 / Filename: modules/web/controllers/Web.php / Line Number: 115 ~ /home/trias/htdocs/bella_ecommerce/application/modules/web/controllers/Web.php [ 115 ]
