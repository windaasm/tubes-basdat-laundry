
-- Database Backup --
-- Ver. : 1.0.1
-- Host : 127.0.0.1
-- Generating Time : Jul 24, 2022 at 18:08:49:PM



CREATE TABLE `barang` (
  `IdBarang` varchar(3) NOT NULL,
  `NamaBarang` varchar(30) NOT NULL,
  PRIMARY KEY (`IdBarang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO barang VALUES
("B01","Kemeja"),
("B02","Kaos"),
("B03","Trauser/Celana Panjang"),
("B04","Short/Celana Pendek"),
("B05","Blouse/Baju Perempuan"),
("B06","Dress/Daster"),
("B07","Pajamas/Baju Tidur"),
("B08","Bra/BH"),
("B09","Scarf/Kerudung"),
("B10","Jas"),
("B11","Setelan Jas"),
("B12","Jaket"),
("B13","Sepatu"),
("B14","Bed Cover"),
("B15","Seprai"),
("B16","Selimut"),
("B17","Karpet"),
("B18","Duve"),
("B19","Handuk"),
("B20","Sarung Bantal");




CREATE TABLE `detail_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NoOrder` varchar(5) NOT NULL,
  `IdBarang` varchar(3) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `NoOrder` (`NoOrder`),
  KEY `IdBarang` (`IdBarang`),
  CONSTRAINT `detail_barang_ibfk_1` FOREIGN KEY (`NoOrder`) REFERENCES `pemesanan` (`NoOrder`),
  CONSTRAINT `detail_barang_ibfk_2` FOREIGN KEY (`IdBarang`) REFERENCES `barang` (`IdBarang`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;


INSERT INTO detail_barang VALUES
("1","8684","B01","1"),
("2","8684","B02","5"),
("3","8684","B03","4"),
("4","8684","B04","1"),
("5","3213","B02","6"),
("6","3213","B05","1"),
("7","3213","B06","2"),
("8","10023","B07","3"),
("9","10023","B08","2"),
("10","10023","B09","1"),
("11","10023","B10","2"),
("12","28323","B11","3"),
("13","28323","B02","1"),
("14","28323","B12","1"),
("15","28323","B13","1"),
("16","1332","B01","3"),
("17","1332","B14","2"),
("18","1332","B11","7"),
("19","1332","B06","4"),
("20","1332","B15","1"),
("22","8684","B14","1");




CREATE TABLE `detail_layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NoOrder` varchar(5) NOT NULL,
  `IdLayanan` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `NoOrder` (`NoOrder`),
  KEY `IdLayanan` (`IdLayanan`),
  CONSTRAINT `detail_layanan_ibfk_1` FOREIGN KEY (`NoOrder`) REFERENCES `pemesanan` (`NoOrder`),
  CONSTRAINT `detail_layanan_ibfk_2` FOREIGN KEY (`IdLayanan`) REFERENCES `layanan` (`IdLayanan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;


INSERT INTO detail_layanan VALUES
("1","8684","L04"),
("2","3213","L02"),
("3","10023","L02"),
("4","28323","L03"),
("5","1332","L04");




CREATE TABLE `layanan` (
  `IdLayanan` varchar(3) NOT NULL,
  `NamaLayanan` varchar(10) NOT NULL,
  `Harga` double NOT NULL,
  PRIMARY KEY (`IdLayanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO layanan VALUES
("L01","Ekonomis","3000"),
("L02","Reguler","6000"),
("L03","Kilat","8000"),
("L04","Express","10000"),
("L05","Instant","13000");




CREATE TABLE `pelanggan` (
  `IdPelanggan` varchar(5) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Alamat` varchar(30) NOT NULL,
  `NoHp` varchar(13) NOT NULL,
  PRIMARY KEY (`IdPelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO pelanggan VALUES
("P0001","Raihan","Jl Arcamanik","089526754667"),
("P0002","Jalis","Jl Dg Tata Lama","089526754323"),
("P0003","Winda","Jl Cibiru","085632773773"),
("P0004","Irvin","Jl Antapani","081332883883"),
("P0005","Udin","Jl Dipati Ukur","083213626237");




CREATE TABLE `pemesanan` (
  `NoOrder` varchar(5) NOT NULL,
  `IdPelanggan` varchar(5) NOT NULL,
  `TglMasuk` date NOT NULL,
  `TglSelesai` date NOT NULL,
  `Berat` double NOT NULL,
  `TotalHarga` double NOT NULL,
  PRIMARY KEY (`NoOrder`),
  KEY `IdPelanggan` (`IdPelanggan`),
  CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`IdPelanggan`) REFERENCES `pelanggan` (`IdPelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO pemesanan VALUES
("10023","P0003","2021-08-23","2021-08-26","8.25","49500"),
("1332","P0005","2021-03-12","2021-03-12","5","50000"),
("28323","P0004","2021-08-24","2021-08-24","9.65","77200"),
("3213","P0002","2021-07-22","2021-07-25","2.35","14100"),
("8684","P0001","2021-08-21","2021-08-21","4.75","47500");




CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


INSERT INTO users VALUES
("1","admin","*161959ED38D1EC5E58962E6B9D50661C2A9C4B17"),
("2","admin2","*EE6AA00100EA06E4BA891AE073C4E4A98C601901"),
("3","admin3","jalis"),
("4","admin5","*EE6AA00100EA06E4BA891AE073C4E4A98C601901");


