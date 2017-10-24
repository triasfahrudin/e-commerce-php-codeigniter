<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-10-13 07:19:40 --> Query error: Table 'bella_ecommerce.ci_session' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session`
WHERE `id` = '6ak89l4n12p6qc32uiga6um4h7up7pv5'
ERROR - 2017-10-13 07:19:40 --> ErrorException [ 1 ]: Error Number: 1146 / Table 'bella_ecommerce.ci_session' doesn't exist / SELECT `data`
FROM `ci_session`
WHERE `id` = '6ak89l4n12p6qc32uiga6um4h7up7pv5' / Filename: libraries/Session/drivers/Session_database_driver.php / Line Number: 169 ~ /home/trias/htdocs/bella_ecommerce/application/third_party/MX/Loader.php [ 173 ]
ERROR - 2017-10-13 07:20:04 --> ErrorException [ 2 ]: file_get_contents(): php_network_getaddresses: getaddrinfo failed: Name or service not known ~ /home/trias/htdocs/bella_ecommerce/application/libraries/Recaptcha.php [ 65 ]
ERROR - 2017-10-13 07:20:04 --> ErrorException [ 2 ]: file_get_contents(https://www.google.com/recaptcha/api/siteverify?secret=6LeYyh4TAAAAAN5a1mhf9MMxUKZI3JhHOg6PEFc1&amp;remoteip=%3A%3A1&amp;v=php_1.0&amp;response=): failed to open stream: php_network_getaddresses: getaddrinfo failed: Name or service not known ~ /home/trias/htdocs/bella_ecommerce/application/libraries/Recaptcha.php [ 65 ]
ERROR - 2017-10-13 08:00:14 --> ErrorException [ 2 ]: include(/home/trias/htdocs/bella_ecommerce/application/errors/error_general.php): failed to open stream: No such file or directory ~ /home/trias/htdocs/bella_ecommerce/application/core/MY_Exceptions.php [ 493 ]
ERROR - 2017-10-13 08:00:14 --> ErrorException [ 2 ]: include(): Failed opening '/home/trias/htdocs/bella_ecommerce/application/errors/error_general.php' for inclusion (include_path='.:/opt/lampp/lib/php') ~ /home/trias/htdocs/bella_ecommerce/application/core/MY_Exceptions.php [ 493 ]
ERROR - 2017-10-13 08:02:14 --> ErrorException [ 2 ]: include(beranda.php): failed to open stream: No such file or directory ~ /home/trias/htdocs/bella_ecommerce/application/modules/admin/views/master.php [ 183 ]
ERROR - 2017-10-13 08:02:14 --> ErrorException [ 2 ]: include(): Failed opening 'beranda.php' for inclusion (include_path='.:/opt/lampp/lib/php') ~ /home/trias/htdocs/bella_ecommerce/application/modules/admin/views/master.php [ 183 ]
ERROR - 2017-10-13 08:04:00 --> ErrorException [ 2 ]: include(beranda.php): failed to open stream: No such file or directory ~ /home/trias/htdocs/bella_ecommerce/application/modules/admin/views/master.php [ 183 ]
ERROR - 2017-10-13 08:04:00 --> ErrorException [ 2 ]: include(): Failed opening 'beranda.php' for inclusion (include_path='.:/opt/lampp/lib/php') ~ /home/trias/htdocs/bella_ecommerce/application/modules/admin/views/master.php [ 183 ]
ERROR - 2017-10-13 08:04:17 --> ErrorException [ 2 ]: include(beranda.php): failed to open stream: No such file or directory ~ /home/trias/htdocs/bella_ecommerce/application/modules/admin/views/master.php [ 186 ]
ERROR - 2017-10-13 08:04:17 --> ErrorException [ 2 ]: include(): Failed opening 'beranda.php' for inclusion (include_path='.:/opt/lampp/lib/php') ~ /home/trias/htdocs/bella_ecommerce/application/modules/admin/views/master.php [ 186 ]
ERROR - 2017-10-13 08:07:29 --> ErrorException [ 2 ]: include(beranda.php): failed to open stream: No such file or directory ~ /home/trias/htdocs/bella_ecommerce/application/modules/admin/views/master.php [ 152 ]
ERROR - 2017-10-13 08:07:29 --> ErrorException [ 2 ]: include(): Failed opening 'beranda.php' for inclusion (include_path='.:/opt/lampp/lib/php') ~ /home/trias/htdocs/bella_ecommerce/application/modules/admin/views/master.php [ 152 ]
ERROR - 2017-10-13 08:34:06 --> ErrorException [ 2 ]: explode() expects parameter 2 to be string, array given ~ /home/trias/htdocs/bella_ecommerce/system-3.1.5/database/DB_query_builder.php [ 1227 ]
ERROR - 2017-10-13 08:34:06 --> ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ /home/trias/htdocs/bella_ecommerce/system-3.1.5/database/DB_query_builder.php [ 1227 ]
ERROR - 2017-10-13 08:34:06 --> ErrorException [ 8 ]: Array to string conversion ~ /home/trias/htdocs/bella_ecommerce/assets/grocery_crud/themes/flexigrid/views/list_template.php [ 130 ]
ERROR - 2017-10-13 08:34:22 --> ErrorException [ 2 ]: explode() expects parameter 2 to be string, array given ~ /home/trias/htdocs/bella_ecommerce/system-3.1.5/database/DB_query_builder.php [ 1227 ]
ERROR - 2017-10-13 08:34:22 --> ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ /home/trias/htdocs/bella_ecommerce/system-3.1.5/database/DB_query_builder.php [ 1227 ]
ERROR - 2017-10-13 08:34:22 --> ErrorException [ 8 ]: Array to string conversion ~ /home/trias/htdocs/bella_ecommerce/assets/grocery_crud/themes/flexigrid/views/list_template.php [ 130 ]
ERROR - 2017-10-13 08:36:07 --> Query error: Column 'parent' in where clause is ambiguous - Invalid query: SELECT `kategori`.*, jd0e45878.nama AS sd0e45878, `kategori`.nama AS 'kategori.nama'
FROM `kategori`
LEFT JOIN `kategori` as `jd0e45878` ON `jd0e45878`.`id` = `kategori`.`parent`
WHERE `parent` =0
ORDER BY `nama` ASC
 LIMIT 10
ERROR - 2017-10-13 08:36:07 --> ErrorException [ 1 ]: Error Number: 1052 / Column 'parent' in where clause is ambiguous / SELECT `kategori`.*, jd0e45878.nama AS sd0e45878, `kategori`.nama AS 'kategori.nama'
FROM `kategori`
LEFT JOIN `kategori` as `jd0e45878` ON `jd0e45878`.`id` = `kategori`.`parent`
WHERE `parent` =0
ORDER BY `nama` ASC
 LIMIT 10 / Filename: models/Grocery_crud_model.php / Line Number: 87 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 87 ]
ERROR - 2017-10-13 08:57:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`produk` LIKE '%sa%' ESCAPE '!'
HAVING `parent` = '8'' at line 5 - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sa%' ESCAPE '!'
OR  `Jumlah` `produk` LIKE '%sa%' ESCAPE '!'
HAVING `parent` = '8'
ERROR - 2017-10-13 08:57:32 --> ErrorException [ 1 ]: Error Number: 1064 / You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`produk` LIKE '%sa%' ESCAPE '!'
HAVING `parent` = '8'' at line 5 / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sa%' ESCAPE '!'
OR  `Jumlah` `produk` LIKE '%sa%' ESCAPE '!'
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 08:57:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'' at line 5 - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
OR  `Jumlah` `produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'
ERROR - 2017-10-13 08:57:35 --> ErrorException [ 1 ]: Error Number: 1064 / You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'' at line 5 / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
OR  `Jumlah` `produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 08:57:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'' at line 5 - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
OR  `Jumlah` `produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'
ERROR - 2017-10-13 08:57:36 --> ErrorException [ 1 ]: Error Number: 1064 / You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'' at line 5 / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
OR  `Jumlah` `produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 08:57:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'' at line 5 - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
OR  `Jumlah` `produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'
ERROR - 2017-10-13 08:57:43 --> ErrorException [ 1 ]: Error Number: 1064 / You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'' at line 5 / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
OR  `Jumlah` `produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 08:58:19 --> Query error: Unknown column 'produk' in 'where clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
OR  `produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'
ERROR - 2017-10-13 08:58:19 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'produk' in 'where clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
OR  `produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 08:58:22 --> Query error: Unknown column 'produk' in 'where clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
OR  `produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'
ERROR - 2017-10-13 08:58:22 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'produk' in 'where clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
OR  `produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 08:58:24 --> Query error: Unknown column 'produk' in 'where clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
OR  `produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'
ERROR - 2017-10-13 08:58:24 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'produk' in 'where clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
OR  `produk` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:01:37 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
AND (`nama` LIKE '%sab%')
HAVING `parent` = '8'
ERROR - 2017-10-13 09:01:37 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
AND (`nama` LIKE '%sab%')
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:01:44 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
AND (`nama` LIKE '%sab%')
HAVING `parent` = '8'
ERROR - 2017-10-13 09:01:44 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
AND (`nama` LIKE '%sab%')
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:02:27 --> Query error: Unknown column 'kategori.parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
AND (`nama` LIKE '%pop%')
HAVING `kategori`.`parent` = '0'
ERROR - 2017-10-13 09:02:27 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'kategori.parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
AND (`nama` LIKE '%pop%')
HAVING `kategori`.`parent` = '0' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:03:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`kategori` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0'' at line 5 - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
OR  `sub` `kategori` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0'
ERROR - 2017-10-13 09:03:57 --> ErrorException [ 1 ]: Error Number: 1064 / You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`kategori` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0'' at line 5 / SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
OR  `sub` `kategori` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:04:49 --> Query error: Unknown column 'kategori.parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0'
ERROR - 2017-10-13 09:04:49 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'kategori.parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:04:54 --> Query error: Unknown column 'kategori.parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0'
ERROR - 2017-10-13 09:04:54 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'kategori.parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:06:48 --> Query error: Unknown column 'kategori.parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0'
ERROR - 2017-10-13 09:06:48 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'kategori.parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:06:48 --> Query error: Unknown column 'kategori.parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0'
ERROR - 2017-10-13 09:06:48 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'kategori.parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:08:00 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
OR  `nama` LIKE '%ter%' ESCAPE '!'
HAVING `parent` = '19'
ERROR - 2017-10-13 09:08:00 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
OR  `nama` LIKE '%ter%' ESCAPE '!'
HAVING `parent` = '19' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:11:06 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
OR  `nama` LIKE '%ter%' ESCAPE '!'
HAVING `parent` = '19'
ERROR - 2017-10-13 09:11:06 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
OR  `nama` LIKE '%ter%' ESCAPE '!'
HAVING `parent` = '19' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:11:14 --> Query error: Unknown column 'kategori.parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0'
ERROR - 2017-10-13 09:11:14 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'kategori.parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:11:17 --> Query error: Unknown column 'kategori.parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0'
ERROR - 2017-10-13 09:11:17 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'kategori.parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:11:46 --> Query error: Unknown column 'kategori.parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0'
ERROR - 2017-10-13 09:11:46 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'kategori.parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:11:54 --> Query error: Unknown column 'kategori.parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0'
ERROR - 2017-10-13 09:11:54 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'kategori.parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:13:32 --> Query error: Unknown column 'kategori.parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `parent` LIKE '%pop%' ESCAPE '!'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0'
ERROR - 2017-10-13 09:13:32 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'kategori.parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `kategori`.`parent` = '0'
OR  `parent` LIKE '%pop%' ESCAPE '!'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `kategori`.`parent` = '0' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:13:51 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'
ERROR - 2017-10-13 09:13:51 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:13:54 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'
ERROR - 2017-10-13 09:13:54 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:14:37 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `parent` = '0'
ERROR - 2017-10-13 09:14:37 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `parent` = '0' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:14:40 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `parent` = '0'
ERROR - 2017-10-13 09:14:40 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `parent` = '0' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:14:46 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'
ERROR - 2017-10-13 09:14:46 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:14:48 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'
ERROR - 2017-10-13 09:14:48 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:16:39 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'
ERROR - 2017-10-13 09:16:39 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:17:15 --> Query error: Unknown column 'lolparent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `lolparent` = '8'
ERROR - 2017-10-13 09:17:15 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'lolparent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `lolparent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:18:56 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'
ERROR - 2017-10-13 09:18:56 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:18:59 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'
ERROR - 2017-10-13 09:18:59 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:19:01 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `parent` = '0'
ERROR - 2017-10-13 09:19:01 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '0'
OR  `nama` LIKE '%pop%' ESCAPE '!'
HAVING `parent` = '0' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:19:07 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
OR  `nama` LIKE '%ter%' ESCAPE '!'
HAVING `parent` = '19'
ERROR - 2017-10-13 09:19:07 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
OR  `nama` LIKE '%ter%' ESCAPE '!'
HAVING `parent` = '19' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:19:17 --> Query error: Unknown column 'produk' in 'where clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
AND  `produk` LIKE '%ter%' ESCAPE '!'
ERROR - 2017-10-13 09:19:17 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'produk' in 'where clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
AND  `produk` LIKE '%ter%' ESCAPE '!' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:19:18 --> Query error: Unknown column 'produk' in 'where clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
AND  `produk` LIKE '%ter%' ESCAPE '!'
ERROR - 2017-10-13 09:19:18 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'produk' in 'where clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
AND  `produk` LIKE '%ter%' ESCAPE '!' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:19:34 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
OR  `nama` LIKE '%ter%' ESCAPE '!'
HAVING `parent` = '19'
ERROR - 2017-10-13 09:19:34 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
OR  `nama` LIKE '%ter%' ESCAPE '!'
HAVING `parent` = '19' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:21:31 --> ErrorException [ 8 ]: Undefined index: search_field ~ /home/trias/htdocs/bella_ecommerce/application/libraries/Grocery_CRUD.php [ 3148 ]
ERROR - 2017-10-13 09:21:31 --> ErrorException [ 8 ]: Undefined index: search_field ~ /home/trias/htdocs/bella_ecommerce/application/libraries/Grocery_CRUD.php [ 3148 ]
ERROR - 2017-10-13 09:21:31 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
OR  `nama` LIKE '%ter%' ESCAPE '!'
HAVING `parent` = '19'
ERROR - 2017-10-13 09:21:31 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
OR  `nama` LIKE '%ter%' ESCAPE '!'
HAVING `parent` = '19' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:21:38 --> ErrorException [ 8 ]: Undefined index: search_field ~ /home/trias/htdocs/bella_ecommerce/application/libraries/Grocery_CRUD.php [ 3148 ]
ERROR - 2017-10-13 09:21:38 --> ErrorException [ 8 ]: Undefined index: search_field ~ /home/trias/htdocs/bella_ecommerce/application/libraries/Grocery_CRUD.php [ 3148 ]
ERROR - 2017-10-13 09:21:38 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
OR  `nama` LIKE '%ter%' ESCAPE '!'
HAVING `parent` = '19'
ERROR - 2017-10-13 09:21:38 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
OR  `nama` LIKE '%ter%' ESCAPE '!'
HAVING `parent` = '19' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:21:44 --> Query error: Unknown column 'produk' in 'where clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
AND  `produk` LIKE '%ter%' ESCAPE '!'
ERROR - 2017-10-13 09:21:44 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'produk' in 'where clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '19'
AND  `produk` LIKE '%ter%' ESCAPE '!' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:24:28 --> ErrorException [ 8 ]: Undefined index: search_field ~ /home/trias/htdocs/bella_ecommerce/application/libraries/Grocery_CRUD.php [ 3148 ]
ERROR - 2017-10-13 09:24:28 --> ErrorException [ 8 ]: Undefined index: search_field ~ /home/trias/htdocs/bella_ecommerce/application/libraries/Grocery_CRUD.php [ 3148 ]
ERROR - 2017-10-13 09:24:28 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'
ERROR - 2017-10-13 09:24:28 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 09:24:34 --> ErrorException [ 8 ]: Undefined index: search_field ~ /home/trias/htdocs/bella_ecommerce/application/libraries/Grocery_CRUD.php [ 3148 ]
ERROR - 2017-10-13 09:24:34 --> ErrorException [ 8 ]: Undefined index: search_field ~ /home/trias/htdocs/bella_ecommerce/application/libraries/Grocery_CRUD.php [ 3148 ]
ERROR - 2017-10-13 09:24:34 --> Query error: Unknown column 'parent' in 'having clause' - Invalid query: SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8'
ERROR - 2017-10-13 09:24:34 --> ErrorException [ 1 ]: Error Number: 1054 / Unknown column 'parent' in 'having clause' / SELECT `kategori`.`id`
FROM `kategori`
WHERE `parent` = '8'
OR  `nama` LIKE '%sab%' ESCAPE '!'
HAVING `parent` = '8' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
ERROR - 2017-10-13 10:00:17 --> ErrorException [ 8 ]: Undefined property: stdClass::$price ~ /home/trias/htdocs/bella_ecommerce/application/modules/admin/controllers/Admin.php [ 149 ]
ERROR - 2017-10-13 10:00:17 --> ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'Admin' does not have a method '_upload_product_image' ~ /home/trias/htdocs/bella_ecommerce/application/libraries/Grocery_CRUD.php [ 1820 ]
ERROR - 2017-10-13 10:00:27 --> ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'Admin' does not have a method '_upload_product_image' ~ /home/trias/htdocs/bella_ecommerce/application/libraries/Grocery_CRUD.php [ 1820 ]
ERROR - 2017-10-13 12:34:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM `view_penjualan`
WHERE `username` = 'triasfahrudin'' at line 2 - Invalid query: SELECT `view_penjualan`.
FROM `view_penjualan`
WHERE `username` = 'triasfahrudin'
ERROR - 2017-10-13 12:34:56 --> ErrorException [ 1 ]: Error Number: 1064 / You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM `view_penjualan`
WHERE `username` = 'triasfahrudin'' at line 2 / SELECT `view_penjualan`.
FROM `view_penjualan`
WHERE `username` = 'triasfahrudin' / Filename: models/Grocery_crud_model.php / Line Number: 194 ~ /home/trias/htdocs/bella_ecommerce/application/models/Grocery_crud_model.php [ 194 ]
