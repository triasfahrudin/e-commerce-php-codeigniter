-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.20 - Source distribution
-- Server OS:                    Linux
-- HeidiSQL Version:             9.4.0.5174
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for bella_ecommerce
DROP DATABASE IF EXISTS `bella_ecommerce`;
CREATE DATABASE IF NOT EXISTS `bella_ecommerce` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bella_ecommerce`;

-- Dumping structure for event bella_ecommerce.cek_penjualan
DROP EVENT IF EXISTS `cek_penjualan`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` EVENT `cek_penjualan` ON SCHEDULE EVERY 1 SECOND STARTS '2017-10-11 12:54:13' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'auto cek penjualan, jika tgl_pemesanan >= 1 hari tidak melakukan' DO BEGIN
	DECLARE done INT;
	DECLARE penjualan_id INT;
	DECLARE produk_id INT;
	DECLARE qty_penjualan INT; 
	
	DECLARE cur CURSOR FOR
		SELECT a.id,b.produk_id,b.qty FROM penjualan a 
		LEFT JOIN penjualan_detail b ON a.id = b.penjualan_id
		WHERE (NOW() >= DATE_ADD(a.tgl_pemesanan, INTERVAL 1 DAY)) AND a.`status` = 'belum-bayar';

	DECLARE CONTINUE HANDLER FOR NOT found SET done=1;		
	
	SET done = 0;
	
	OPEN cur;   
	mainloop:LOOP    
   	FETCH cur INTO penjualan_id,produk_id,qty_penjualan;
   	IF done = 1 THEN LEAVE mainloop; END IF;   
   	UPDATE penjualan SET status = 'batal' WHERE id = penjualan_id;
   	UPDATE produk SET stok = stok + qty_penjualan WHERE id = produk_id; 
   END LOOP mainloop;
	CLOSE cur;	
END//
DELIMITER ;

-- Dumping structure for table bella_ecommerce.ci_session
DROP TABLE IF EXISTS `ci_session`;
CREATE TABLE IF NOT EXISTS `ci_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bella_ecommerce.ci_session: ~61 rows (approximately)
DELETE FROM `ci_session`;
/*!40000 ALTER TABLE `ci_session` DISABLE KEYS */;
INSERT INTO `ci_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
	('0nonbkjnl8u6i1vjq0cncpeh8ro1jne6', '::1', 1508428671, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383432383337333B757365725F69647C733A313A2231223B757365725F757365726E616D657C733A353A2261646D696E223B757365725F6C6576656C7C733A353A2261646D696E223B),
	('0thkrkg0fpmcv6071hbdt0g69nmp3tad', '::1', 1508469167, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383436393136303B757365725F69647C733A313A2231223B757365725F757365726E616D657C733A353A2261646D696E223B757365725F6C6576656C7C733A353A2261646D696E223B),
	('0uq2coukpgb8tv3g8t9aeed2lj5nhjm0', '::1', 1508479461, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383437393339363B),
	('14di9327a7jrj45pddn2h8u9b5o57j5c', '::1', 1508735191, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383733353132363B),
	('16ah5k0dlc4m6sphk3rev5ei9532ses0', '::1', 1508549894, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383534393636393B),
	('18cbqkv6s9h5i3tb76h2fbmvlhc01bfu', '::1', 1508465085, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383436343834393B),
	('219oehed1momo5d4vtmavg7rl8tgkts5', '::1', 1508633410, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383633333339343B),
	('21qhgjihrojvdv1vag8p81t07mjn155e', '::1', 1508736483, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383733363237393B),
	('269g3u7mibdtk1kce64blc4uoun16btk', '::1', 1508469393, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383436393337393B),
	('3r0f4ekfta4sene0m7t5otvbj999ck8e', '::1', 1508739453, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383733393138343B),
	('58296htomv5o34orhamjhm8oa6ij8u9a', '::1', 1508738789, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383733383530333B),
	('5n2072nv6osscrcm52cii5q7ols21ed4', '::1', 1508429152, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383432393135323B),
	('5phphphjo579tvhsm7b4sngm768l2cbp', '::1', 1508737670, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383733373431373B),
	('697mdqcf9nmdth9q88nkrg9v461at6r7', '::1', 1508470087, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383436393834343B757365725F69647C733A313A2231223B757365725F757365726E616D657C733A353A2261646D696E223B757365725F6C6576656C7C733A353A2261646D696E223B),
	('6c1u9s788sovue68u9uuhdsh8lbqlr0g', '::1', 1508468932, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383436383639343B),
	('74vpqje4r7bq26o5e1i5ue0de8q5aqcp', '::1', 1508428977, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383432383638373B757365725F69647C733A313A2231223B757365725F757365726E616D657C733A353A2261646D696E223B757365725F6C6576656C7C733A353A2261646D696E223B),
	('755a9absmq8q9tsol0qu01de7jc8qerg', '::1', 1508734747, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383733343734373B),
	('7dp589cm47pmflrhlp8mguudaa2a2fn2', '::1', 1508552627, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383535323632373B757365725F69647C733A313A2231223B757365725F757365726E616D657C733A353A2261646D696E223B757365725F6C6576656C7C733A353A2261646D696E223B),
	('9bqnp4lk6octms5ca4qfvkbpf0g8hluv', '::1', 1508734471, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383733343333393B),
	('9sn5uaar1fe93jdgt6d9m5h0654ve7s3', '::1', 1508428005, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383432373731333B757365725F69647C733A313A2231223B757365725F757365726E616D657C733A353A2261646D696E223B757365725F6C6576656C7C733A353A2261646D696E223B),
	('adnq6bs6k456fvelkvp1fg6kkjgh5jkf', '::1', 1508550632, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383535303339303B757365725F69647C733A313A2231223B757365725F757365726E616D657C733A353A2261646D696E223B757365725F6C6576656C7C733A353A2261646D696E223B),
	('b7v3bo89q62g7u12gjmvb0sjehfm5um3', '::1', 1508480536, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383438303233383B),
	('bh8rh6glvn1937sputo27kgnqgodihnv', '::1', 1508737047, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383733363931333B),
	('bhn1glqf3caqkqgf7etd2oal8gebfr96', '::1', 1508468660, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383436383337383B),
	('brdnded3vcs8kt4v70jqs60qtt19ptla', '::1', 1508480935, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383438303636353B),
	('bvf526meqv99q75u9njhus4suidepon3', '::1', 1508481332, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383438313033373B),
	('cnhiekmqjtfr7b31ssmq94iadn9p70r2', '::1', 1508464931, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383436343734383B757365725F69647C733A313A2231223B757365725F757365726E616D657C733A353A2261646D696E223B757365725F6C6576656C7C733A353A2261646D696E223B),
	('d0gm78tu4s6v6nu2dc2mkc75he4vo0oe', '::1', 1508430631, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383433303139393B757365725F69647C733A313A2231223B757365725F757365726E616D657C733A353A2261646D696E223B757365725F6C6576656C7C733A353A2261646D696E223B),
	('dta1qinice15108mk97co7gp5054mlfa', '::1', 1508465706, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383436353533313B),
	('enqfftjtmepqqdqh99np48lv4t3bu1km', '::1', 1508470306, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383437303039303B),
	('fbf4icfa53b0otdorn35v6tga71555ic', '::1', 1508465465, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383436353139383B),
	('ftdrp5ec1jcu1tuc7pp1c0fi3j5sqes9', '::1', 1508732300, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383733323035313B),
	('h2v7560onjd0gltcq89tnc5par4vo75d', '::1', 1508477728, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383437373637373B),
	('h4mods6iq6jtv1sdp0lt0l5s3t562i67', '::1', 1508641994, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383634313939343B),
	('haf69e5bclsi99cvpuobasi10eptm0rs', '::1', 1508736184, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383733353931353B),
	('hp9id53nqfp0057lak1950t1oi2v4l2o', '::1', 1508479871, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383437393736313B),
	('i6gka6of0lfrs03dqrood5v7jk9fii7s', '::1', 1508429183, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383432393032323B757365725F69647C733A313A2231223B757365725F757365726E616D657C733A353A2261646D696E223B757365725F6C6576656C7C733A353A2261646D696E223B),
	('ilf7jvi08mq3lohqphq98j5lilvop7sl', '::1', 1508470263, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383437303233383B757365725F69647C733A313A2231223B757365725F757365726E616D657C733A353A2261646D696E223B757365725F6C6576656C7C733A353A2261646D696E223B),
	('jo2fsnejrkf4pjbnosi1lod5frspctaa', '::1', 1508739080, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383733383834303B),
	('k2boeeqd923mrq7ukdkls3jm09iljkka', '::1', 1508634233, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383633343131373B),
	('k6u977gbbnasoqnst0the9tn2tmo1d0i', '::1', 1508741346, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383734313136363B757365725F69647C733A313A2231223B757365725F757365726E616D657C733A353A2261646D696E223B757365725F6C6576656C7C733A353A2261646D696E223B),
	('kbcdk9bms91ra0i5bj1cltna805nnhva', '::1', 1508429684, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383432393433373B757365725F69647C733A313A2231223B757365725F757365726E616D657C733A353A2261646D696E223B757365725F6C6576656C7C733A353A2261646D696E223B),
	('kf7bkqilqv5l23r2pv8nbnfvi5nlpj6n', '::1', 1508550235, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383534393937303B757365725F69647C733A313A2231223B757365725F757365726E616D657C733A353A2261646D696E223B757365725F6C6576656C7C733A353A2261646D696E223B),
	('ktd24g1v6u4035qdagsrrv572r5uun2r', '::1', 1508732631, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383733323435363B),
	('kvmjjp3mbcnr2obebh48jit9nvu1ip0n', '::1', 1508549557, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383534393335343B),
	('l4mudum7k37sh8he2bacj4v20rfslopg', '::1', 1508469199, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383436393035373B),
	('n11oj63c8l05ed4rv5tr4068366gq5bo', '::1', 1508430634, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383433303434363B),
	('o89cq5rfadfjukm97s7ldckn51bcvaon', '::1', 1508633975, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383633333830313B),
	('ofe8h0bi848okr2rkr1cioa5ptlisvai', '::1', 1508550945, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383535303832313B757365725F69647C733A313A2231223B757365725F757365726E616D657C733A353A2261646D696E223B757365725F6C6576656C7C733A353A2261646D696E223B),
	('ok86hekcnenouotltg9e6143333r3anh', '::1', 1508548727, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383534383536373B),
	('pr882p1kfeq6c00b9cd2va3kccadd1k4', '::1', 1508428354, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383432383035353B757365725F69647C733A313A2231223B757365725F757365726E616D657C733A353A2261646D696E223B757365725F6C6576656C7C733A353A2261646D696E223B),
	('puukbqkhshem9c8dv6kji25ro4nfimhh', '::1', 1508468018, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383436373931323B),
	('pvmbg8im5he1us9hcfadj2h7t8gto40r', '::1', 1508431045, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383433303833333B),
	('q0e7u4h7jru9hbs3f231lpke9r0m66tp', '::1', 1508430194, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383432393735373B757365725F69647C733A313A2231223B757365725F757365726E616D657C733A353A2261646D696E223B757365725F6C6576656C7C733A353A2261646D696E223B),
	('r57e7r8sdf53d99smsfhqrc7qe93r2oo', '::1', 1508427690, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383432373639303B),
	('sk343eiqfho48dj549q4pj6029f0k4ri', '::1', 1508429844, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383432393834343B),
	('suaiariq5rdbibr4pgcht2kihblqkhnm', '::1', 1508431269, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383433313136373B),
	('teqm7p54aho1ajp38jarstk03h6pg4l7', '::1', 1508738409, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383733383135383B),
	('tkv29j8cmof77lc8t22ivmdqhudd2ibe', '::1', 1508466299, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383436363234353B),
	('tlggajlmgc30mlf2rdejj20pnfae5oat', '::1', 1508481634, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383438313334313B),
	('ulbgqtiqt16unmm24q5r2dcrpoac57bn', '::1', 1508737775, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530383733373733363B);
/*!40000 ALTER TABLE `ci_session` ENABLE KEYS */;

-- Dumping structure for table bella_ecommerce.gambar_produk
DROP TABLE IF EXISTS `gambar_produk`;
CREATE TABLE IF NOT EXISTS `gambar_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table bella_ecommerce.gambar_produk: ~2 rows (approximately)
DELETE FROM `gambar_produk`;
/*!40000 ALTER TABLE `gambar_produk` DISABLE KEYS */;
INSERT INTO `gambar_produk` (`id`, `produk_id`, `gambar`) VALUES
	(1, 1, 'b6eb5-cf4894e40be637e081dd1a85b6ec0107.jpg'),
	(2, 1, 'f16ad-5effead88d47b4c3536c21e95f33809f.jpg'),
	(3, 1, '0a10f-356fb9645e140fc08d855fe724547197.jpg');
/*!40000 ALTER TABLE `gambar_produk` ENABLE KEYS */;

-- Dumping structure for table bella_ecommerce.kategori
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(100) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table bella_ecommerce.kategori: ~25 rows (approximately)
DELETE FROM `kategori`;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id`, `parent`, `nama`, `slug`, `keterangan`) VALUES
	(1, 0, 'Popok', 'beli-popok', '<p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ulla. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>\r\n'),
	(2, 1, 'Diapers', 'beli-popok-diapers', NULL),
	(3, 1, 'Clodi / Popok Kain', 'beli-popok-clodi-popok-kain', NULL),
	(4, 1, 'Tissue Basah & Kapas', 'beli-popok-tissue-basah-dan-kapas', NULL),
	(5, 1, 'Salep', 'beli-popok-salep', NULL),
	(6, 1, 'Training Pants', 'beli-popok-training-pants', NULL),
	(7, 1, 'Tas Bayi', 'beli-popok-tas-bayi', NULL),
	(8, 0, 'Perlengkapan Mandi', 'beli-perlengkapan-mandi', NULL),
	(9, 8, 'Gift Set', 'beli-perlengkapan-mandi-gift-set', NULL),
	(10, 8, 'Organik', 'beli-perlengkapan-mandi-organik', NULL),
	(11, 8, 'Bak & Kursi Mandi', 'beli-perlengkapan-mandi-bak-dan-kursi-mandi', NULL),
	(12, 8, 'Mainan & Aksesoris Mandi', 'beli-perlengkapan-mandi-mainan-dan-aksesoris-mandi', NULL),
	(13, 8, 'Sabun & Sampo', 'beli-perlengkapan-mandi-sabun-dan-sampo', NULL),
	(14, 8, 'Perawatan Kulit bayi', 'beli-perlengkapan-mandi-perawatan-kulit-bayi', NULL),
	(15, 8, 'Sikat Gigi & Odol', 'beli-perlengkapan-mandi-sikat-gigi-dan-odol', NULL),
	(16, 8, 'Gunting, Sisir & Aksesoris', 'beli-perlengkapan-mandi-gunting-sisir-dan-aksesoris', NULL),
	(17, 8, 'Handuk', 'beli-perlengkapan-mandi-handuk', NULL),
	(18, 8, 'Lotion, Minyak & Aromatherapi', 'beli-perlengkapan-mandi-lotion-minyak-dan-aromatherapi', NULL),
	(19, 0, 'Alat Makan', 'beli-alat-makan', NULL),
	(20, 19, 'Perlengkapan Makan & Minum', 'beli-alat-makan-perlengkapan-makan-dan-minum', NULL),
	(21, 19, 'Kotak Makan Bayi', 'beli-alat-makan-kotak-makan-bayi', NULL),
	(22, 19, 'Termos Bayi', 'beli-alat-makan-termos-bayi', NULL),
	(23, 19, 'Blender & Alat Pengolah Makanan', 'beli-alat-makan-blender-dan-alat-pengolah-makanan', NULL),
	(24, 19, 'Celemek Bayi & Saputangan', 'beli-alat-makan-celemek-bayi-dan-saputangan', NULL),
	(25, 19, 'Backpack & Tas Makan', 'beli-alat-makan-backpack-dan-tas-makan', NULL);
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table bella_ecommerce.member
DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jk` enum('Laki','Perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `last_reset_password` datetime DEFAULT NULL,
  `reset_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table bella_ecommerce.member: ~1 rows (approximately)
DELETE FROM `member`;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` (`id`, `avatar`, `username`, `password`, `nama_lengkap`, `jk`, `tgl_lahir`, `telp`, `email`, `last_reset_password`, `reset_token`) VALUES
	(1, '', 'triasfahrudin', '5e2f28bfc775b48991e1a58fc8ea0791', 'trias fahrudin', 'Laki', '2017-10-13', '630245', 'triasfahrudin@gmail.com', '2017-10-13 12:14:46', '8dacca93-afd5-11e7-bfa0-742f68adb2f1');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;

-- Dumping structure for table bella_ecommerce.member_alamat
DROP TABLE IF EXISTS `member_alamat`;
CREATE TABLE IF NOT EXISTS `member_alamat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota_kab` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kode_pos` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bella_ecommerce.member_alamat: ~0 rows (approximately)
DELETE FROM `member_alamat`;
/*!40000 ALTER TABLE `member_alamat` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_alamat` ENABLE KEYS */;

-- Dumping structure for table bella_ecommerce.penjualan
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL DEFAULT '0',
  `tgl_pemesanan` datetime NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status` enum('belum-bayar','konfirmasi-bayar','dikemas','dikirim','selesai','batal','pengembalian') NOT NULL DEFAULT 'belum-bayar',
  `pengiriman_service` varchar(50) NOT NULL,
  `tgl_kirim` datetime NOT NULL,
  `subtotal` double NOT NULL,
  `ongkir` double NOT NULL,
  `bukti_bayar` varchar(50) NOT NULL,
  `nama_bayar` varchar(50) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `tgl_konfirmasi_bayar` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `update_akhir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table bella_ecommerce.penjualan: ~1 rows (approximately)
DELETE FROM `penjualan`;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` (`id`, `member_id`, `tgl_pemesanan`, `alamat_pengiriman`, `status`, `pengiriman_service`, `tgl_kirim`, `subtotal`, `ongkir`, `bukti_bayar`, `nama_bayar`, `tgl_bayar`, `tgl_konfirmasi_bayar`, `tgl_selesai`, `update_akhir`) VALUES
	(1, 1, '2017-10-10 13:06:55', '', 'batal', '', '0000-00-00 00:00:00', 0, 0, '', '', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2017-10-13 12:38:07');
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;

-- Dumping structure for table bella_ecommerce.penjualan_detail
DROP TABLE IF EXISTS `penjualan_detail`;
CREATE TABLE IF NOT EXISTS `penjualan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penjualan_id` int(11) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `qty` tinyint(4) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table bella_ecommerce.penjualan_detail: ~0 rows (approximately)
DELETE FROM `penjualan_detail`;
/*!40000 ALTER TABLE `penjualan_detail` DISABLE KEYS */;
INSERT INTO `penjualan_detail` (`id`, `penjualan_id`, `produk_id`, `qty`, `harga`) VALUES
	(1, 1, 1, 5, 74000);
/*!40000 ALTER TABLE `penjualan_detail` ENABLE KEYS */;

-- Dumping structure for table bella_ecommerce.produk
DROP TABLE IF EXISTS `produk`;
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `harga_lama` double NOT NULL,
  `status_harga` enum('normal','diskon') NOT NULL,
  `stok` smallint(6) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `detail` text NOT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table bella_ecommerce.produk: ~2 rows (approximately)
DELETE FROM `produk`;
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
INSERT INTO `produk` (`id`, `nama`, `kategori_id`, `slug`, `merk`, `harga`, `harga_lama`, `status_harga`, `stok`, `gambar`, `deskripsi`, `detail`, `tgl_buat`) VALUES
	(1, 'Mamypoko Standard Pants - M 40 ', 2, 'mamypoko-standard-pants-m-40', 'mamipoko', 70000, 80000, 'diskon', 10, 'b5e51-mamy-poko-pants-std-m40.jpg', '<p>Mamypoko Standard Pants - M 40 siap memberi perlindungan ekstra terhadap kebocoran dengan penahan ganda. MamyPoko Pants Standar memiliki bentuk celana baru, yang membuatnya pas di area perut si kecil sehingga dapat membuatnya lebih nyaman. Celana popok ini sangat memudahkan ketika Anda sedang tidak berada di rumah/berjalan-jalan dan sulit untuk menemukan tempat untuk anak Anda berbaring mengganti popok. MamyPoko Pants Standar adalah diaper yang berdaya serap tinggi, lembut dan pas dikenakan, dengan perlindungan ekstra lebih lama.</p>\r\n\r\n<h2>Lembut dan Elastis</h2>\r\n\r\n<p>MamyPoko Pants Standar terbuat dari bahan yang lembut seperti kain sehingga elastis ketika dikenakan oleh bayi. Dengan memakainya, kulit bayi terhindar dari stretch mark dan tetap nyaman setiap hari walaupun ia bergerak aktif sepanjang hari. Didesain tipis, kuat dan ramping sehingga memungkinkan anak Anda dapat bergerak bebas tanpa takut bocor. MamyPoko ekstra lembut ini sangat baik dan membuat bayi Anda ceria karena merasa nyaman sepanjang hari.</p>\r\n\r\n<h2>Penahan Ganda</h2>\r\n\r\n<p>Ukuran popok celana ini dilengkapi penahan ganda berupa pencegah kebocoran samping sehingga si kecil dapat tidur lebih nyaman. Sistem penguncian kebocoran super bekerja 2x lebih keras dari popok biasa. Lapisan selembut kapas bertekstur garisnya pun dapat menyerap dan mengunci pipis agar tetap di dalam dengan cepat untuk perlindungan ekstra kering. Dengan daya serap ekstra, popok celana ini siap menjaga kulit bayi tetap kering sehingga ia merasa nyaman.</p>\r\n\r\n<h2>Bagian Berdaya Serap Kuat</h2>\r\n\r\n<p>MamyPoko Pants tidak hanya unggul dalam hal kelembutan, namun juga memiliki daya serap yang tinggi. Popok celana ini dapat mencegah kebocoran, karena dapat menyerap pipis si kecil hingga 6 kali sehingga dapat dipakai lama. Pemakaian lama ini memudahkan Anda agar tidak repot untuk mengganti-ganti popok setiap kali anak pipis. Si kecil pun akan merasa tetap nyaman memakainya walaupun sudah berkali-kali pipis.</p>\r\n\r\n<h2>Lapisan Bersirkulasi Udara</h2>\r\n\r\n<p>Bayi baru lahir memiliki ketebalan kulit 1/3 dari orang dewasa, karena itu kulitnya sangat lembut dan membutuhkan perlakuan dan perawatan ekstra. MamyPoko Pants dengan teknologi terbaru, sangat baik dalam sirkulasi udara sehingga mencegah lembab dan membantu mengurangi iritasi. Kulit bayi Anda akan tetap kering dan tidak menimbulkan iritasi/ruam ketika memakainya.</p>\r\n\r\n<h2>Karet Fleksibel &amp; Mudah Dipakai</h2>\r\n\r\n<p>Tak ada lagi kebocoran pada popok bayi karena MamyPoko Pants Standar memiliki karet yang fleksibel, memungkinkan si kecil bebas bergerak dan aman dari kebocoran. Hal ini juga memudahkan Anda ketika ingin mengganti popok di saat bayi sedang bergerak menendang-nendang atau ingin berjalan, karena modelnya yang praktis membuat Anda lebih cepat dalam menggantinya kapanpun dan dimanapun.</p>\r\n\r\n<h2>Spesifikasi</h2>\r\n\r\n<ul>\r\n	<li>Untuk bayi dengan berat 7-12 kg.</li>\r\n	<li>Bentuk Celana.</li>\r\n	<li>Isi 40pc</li>\r\n	<li>Ukuran M</li>\r\n</ul>\r\n', '', '2017-10-23 12:00:30'),
	(2, 'Bambino Mio Solo Reusable Nappy Woodland Fox', 3, 'bambino-mio-solo-reusable-nappy-woodland-fox', 'Mio', 258000, 0, 'normal', 0, '73a36-diap-bmio-008b.jpg', '<p>Berikan kepraktisan dan kenyamanan bagi si kecil yang masih sering mengompol dengan menggunakan popok kain modern&nbsp;<em>Bambino Mio Solo Reusable Nappy Woodland Fox</em>.&nbsp;Popok cuci ulang ini terbuat dari bahan berkualitas tinggi,&nbsp;dapat digunakan kembali (<em>reusable</em>), dan higienis.</p>\r\n\r\n<ul>\r\n	<li><em>Adjustable poppers&nbsp;</em>dan perekat&nbsp;<em>velcro</em>, sehingga ukuran popok dapat disesuaikan dengan perkembangan tubuh si kecil</li>\r\n	<li><em>Concealed super absorbent core,</em>&nbsp;sehingga lapisan dalam popok selalu terjaga tetap kering untuk menjaga kelembapan dan kehalusan kulit si kecil</li>\r\n	<li><em>Pull out tab system,&nbsp;</em>&nbsp;sehingga&nbsp;<em>absorbent core</em>&nbsp;dapat dikeluarkan untuk mempermudah proses membersihkan popok</li>\r\n</ul>\r\n', '', '2017-10-23 12:00:30');
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;

-- Dumping structure for table bella_ecommerce.settings
DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `tipe` enum('small-text','big-text','image','map','options') DEFAULT 'small-text',
  `value` text,
  `link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bella_ecommerce.settings: ~0 rows (approximately)
DELETE FROM `settings`;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table bella_ecommerce.slider_images
DROP TABLE IF EXISTS `slider_images`;
CREATE TABLE IF NOT EXISTS `slider_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` text,
  `file_name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table bella_ecommerce.slider_images: ~2 rows (approximately)
DELETE FROM `slider_images`;
/*!40000 ALTER TABLE `slider_images` DISABLE KEYS */;
INSERT INTO `slider_images` (`id`, `keterangan`, `file_name`) VALUES
	(20, 'lorem ipsum', '12305-Perlengkapan-Bayi-Baru-Lahir-yang-Harus-Disiapkan.jpg'),
	(22, NULL, '77d84-RESELLER-PERLENGKAPAN-BAYI.jpg');
/*!40000 ALTER TABLE `slider_images` ENABLE KEYS */;

-- Dumping structure for function bella_ecommerce.slugify
DROP FUNCTION IF EXISTS `slugify`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `slugify`(
	`dirty_string` varchar(200)

) RETURNS varchar(200) CHARSET latin1
    DETERMINISTIC
BEGIN
    DECLARE x, y , z Int;
    DECLARE temp_string, new_string VarChar(200);
    DECLARE is_allowed Bool;
    DECLARE c, check_char VarChar(1);

    set temp_string = LOWER(dirty_string);

    Set temp_string = replace(temp_string, '&', ' dan ');

    Select temp_string Regexp('[^a-z0-9\-]+') into x;
    If x = 1 then
        set z = 1;
        While z <= Char_length(temp_string) Do
            Set c = Substring(temp_string, z, 1);
            Set is_allowed = False;
            If !((ascii(c) = 45) or (ascii(c) >= 48 and ascii(c) <= 57) or (ascii(c) >= 97 and ascii(c) <= 122)) Then
                Set temp_string = Replace(temp_string, c, '-');
            End If;
            set z = z + 1;
        End While;
    End If;

    Select temp_string Regexp("^-|-$|'") into x;
    If x = 1 Then
        Set temp_string = Replace(temp_string, "'", '');
        Set z = Char_length(temp_string);
        Set y = Char_length(temp_string);
        Dash_check: While z > 1 Do
            If Strcmp(SubString(temp_string, -1, 1), '-') = 0 Then
                Set temp_string = Substring(temp_string,1, y-1);
                Set y = y - 1;
            Else
                Leave Dash_check;
            End If;
            Set z = z - 1;
        End While;
    End If;

    Repeat
        Select temp_string Regexp("--") into x;
        If x = 1 Then
            Set temp_string = Replace(temp_string, "--", "-");
        End If;
    Until x <> 1 End Repeat;

    If LOCATE('-', temp_string) = 1 Then
        Set temp_string = SUBSTRING(temp_string, 2);
    End If;

    Return temp_string;
END//
DELIMITER ;

-- Dumping structure for table bella_ecommerce.stok_opname
DROP TABLE IF EXISTS `stok_opname`;
CREATE TABLE IF NOT EXISTS `stok_opname` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_id` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table bella_ecommerce.stok_opname: ~0 rows (approximately)
DELETE FROM `stok_opname`;
/*!40000 ALTER TABLE `stok_opname` DISABLE KEYS */;
INSERT INTO `stok_opname` (`id`, `produk_id`, `stok`, `tgl`) VALUES
	(1, 1, 10, '2017-10-19');
/*!40000 ALTER TABLE `stok_opname` ENABLE KEYS */;

-- Dumping structure for table bella_ecommerce.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `level` enum('admin') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table bella_ecommerce.user: ~1 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `email`, `level`) VALUES
	(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for view bella_ecommerce.view_penjualan
DROP VIEW IF EXISTS `view_penjualan`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_penjualan` (
	`id` BIGINT(11) NULL,
	`member_id` BIGINT(11) NULL,
	`tgl_pemesanan` DATETIME NULL,
	`alamat_pengiriman` TEXT NULL COLLATE 'latin1_swedish_ci',
	`status` VARCHAR(16) NULL COLLATE 'latin1_swedish_ci',
	`pengiriman_service` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`tgl_kirim` DATETIME NULL,
	`subtotal` DOUBLE NULL,
	`ongkir` DOUBLE NULL,
	`bukti_bayar` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nama_bayar` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`tgl_bayar` DATE NULL,
	`tgl_konfirmasi_bayar` DATETIME NULL,
	`tgl_selesai` DATETIME NULL,
	`update_akhir` TIMESTAMP NULL,
	`username` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`detail` TEXT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for trigger bella_ecommerce.kategori_before_insert
DROP TRIGGER IF EXISTS `kategori_before_insert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `kategori_before_insert` BEFORE INSERT ON `kategori` FOR EACH ROW BEGIN
  	DECLARE parent_name VARCHAR(50);
  
	IF(NEW.parent = 0) THEN
		SET NEW.slug = CONCAT('beli-',slugify(NEW.nama));
	ELSE
		SELECT nama INTO parent_name FROM kategori WHERE id = NEW.parent;
		SET NEW.slug = CONCAT('beli-',slugify(parent_name),'-',slugify(NEW.nama));	
		-- SET NEW.slug = parent_name;
	END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger bella_ecommerce.kategori_before_update
DROP TRIGGER IF EXISTS `kategori_before_update`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `kategori_before_update` BEFORE UPDATE ON `kategori` FOR EACH ROW BEGIN
  	DECLARE parent_name VARCHAR(50);
  
	IF(NEW.parent = 0) THEN
		SET NEW.slug = CONCAT('beli-',slugify(NEW.nama));
	ELSE
		SELECT nama INTO parent_name FROM kategori WHERE id = NEW.parent;
		SET NEW.slug = CONCAT('beli-',slugify(parent_name),'-',slugify(NEW.nama));	
		-- SET NEW.slug = parent_name;
	END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger bella_ecommerce.member_before_insert
DROP TRIGGER IF EXISTS `member_before_insert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `member_before_insert` BEFORE INSERT ON `member` FOR EACH ROW BEGIN
	SET NEW.reset_token = UUID();
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger bella_ecommerce.member_before_update
DROP TRIGGER IF EXISTS `member_before_update`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `member_before_update` BEFORE UPDATE ON `member` FOR EACH ROW BEGIN
	SET NEW.reset_token = UUID();
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger bella_ecommerce.produk_before_insert
DROP TRIGGER IF EXISTS `produk_before_insert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `produk_before_insert` BEFORE INSERT ON `produk` FOR EACH ROW BEGIN
	SET NEW.slug = slugify(NEW.nama);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger bella_ecommerce.produk_before_update
DROP TRIGGER IF EXISTS `produk_before_update`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `produk_before_update` BEFORE UPDATE ON `produk` FOR EACH ROW BEGIN
	SET NEW.slug = slugify(NEW.nama);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger bella_ecommerce.stok_opname_before_insert
DROP TRIGGER IF EXISTS `stok_opname_before_insert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `stok_opname_before_insert` BEFORE INSERT ON `stok_opname` FOR EACH ROW BEGIN
	UPDATE produk a SET a.stok = NEW.stok WHERE a.id = NEW.produk_id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for view bella_ecommerce.view_penjualan
DROP VIEW IF EXISTS `view_penjualan`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_penjualan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_penjualan` AS select `a`.`id` AS `id`,`a`.`member_id` AS `member_id`,`a`.`tgl_pemesanan` AS `tgl_pemesanan`,`a`.`alamat_pengiriman` AS `alamat_pengiriman`,`a`.`status` AS `status`,`a`.`pengiriman_service` AS `pengiriman_service`,`a`.`tgl_kirim` AS `tgl_kirim`,`a`.`subtotal` AS `subtotal`,`a`.`ongkir` AS `ongkir`,`a`.`bukti_bayar` AS `bukti_bayar`,`a`.`nama_bayar` AS `nama_bayar`,`a`.`tgl_bayar` AS `tgl_bayar`,`a`.`tgl_konfirmasi_bayar` AS `tgl_konfirmasi_bayar`,`a`.`tgl_selesai` AS `tgl_selesai`,`a`.`update_akhir` AS `update_akhir`,`b`.`username` AS `username`,group_concat(concat(`c`.`produk_id`,'|',`c`.`qty`,'|',`c`.`harga`) separator ',') AS `detail` from ((`penjualan` `a` left join `member` `b` on((`a`.`member_id` = `b`.`id`))) left join `penjualan_detail` `c` on((`a`.`id` = `c`.`penjualan_id`)));

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
