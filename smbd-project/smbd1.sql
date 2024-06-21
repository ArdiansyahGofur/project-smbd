CREATE DATABASE db_rental_car;
USE db_rental_car;

CREATE TABLE IF NOT EXISTS mobil(
id_mobil INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
no_plat VARCHAR (12) NOT NULL,
merk VARCHAR (20) NOT NULL,
tahun_mobil VARCHAR (4) NOT NULL,
harga_sewa INT (10) NOT NULL,
status_mobil VARCHAR (50) NOT NULL
);

CREATE TABLE IF NOT EXISTS penyewa(
id_penyewa INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
nama_penyewa VARCHAR (50) NOT NULL,
nik_penyewa VARCHAR (16) NOT NULL,
tlp_penyewa VARCHAR (12) NOT NULL,
alamat_penyewa VARCHAR (50) NOT NULL,
jenis_kelamin VARCHAR (1) NOT NULL
);

CREATE TABLE IF NOT EXISTS booking(
id_booking INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
id_penyewa INT NOT NULL,
id_mobil INT NOT NULL,
tanggal_pinjam DATE NOT NULL,
lama_sewa INT (10) NOT NULL,
rencana_tanggal_kembali DATE,
total_sewa INT (10)
);


CREATE TABLE IF NOT EXISTS pengembalian(
id_pengembalian INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
id_booking INT,
no_plat VARCHAR (12),
tanggal_pinjam DATE,
tanggal_kembali DATE,
denda INT (10)
);

ALTER TABLE booking ADD CONSTRAINT fk_id_penyewa FOREIGN KEY (id_penyewa) REFERENCES penyewa(id_penyewa) ON DELETE CASCADE;

ALTER TABLE booking ADD CONSTRAINT fk_id_mobil FOREIGN KEY (id_mobil) REFERENCES mobil(id_mobil) ON DELETE CASCADE;

ALTER TABLE pengembalian ADD CONSTRAINT fk_id_booking FOREIGN KEY (id_booking) REFERENCES booking(id_booking) ON DELETE CASCADE;


INSERT INTO mobil VALUES
('', 'AG1122AA', 'AVANZA', '2020', 200000, 'TERSEDIA'),
('', 'AG2211BB', 'XENIA', '2019', 150000, 'TERSEDIA');

INSERT INTO mobil VALUES
('', 'AG2211BB', 'ALPHAR', '2021', 300000, ' TIDAK TERSEDIA');


INSERT INTO penyewa VALUES
('', 'Ali', '1920430382923840', '039403940394', 'Sagaras', 'L');


SELECT * FROM mobil;

-- batas -----------------------------------------------------------------------------
DELIMITER //
CREATE PROCEDURE bookingAndPenggembalian(
	IN p_id_penyewa INT ,
	IN p_id_mobil INT,
	IN p_tanggal_pinjam DATE,
	IN p_lama_sewa INT
)
BEGIN
	DECLARE v_id_booking INT;
	DECLARE v_rencana_tanggal_kembali DATE;
	DECLARE v_total_sewa INT;
	
	-- menghitung rencana tanggal kembali
	SET v_rencana_tanggal_kembali = DATE_ADD(p_tanggal_pinjam, INTERVAL p_lama_sewa DAY);
	
	-- menghitung total sewa berdasarkan jumlah hari penyewaan dan haega sewa
	SET v_total_sewa = p_lama_sewa * (SELECT harga_sewa FROM mobil WHERE id_mobil = p_id_mobil);
	
	INSERT INTO booking VALUES ('', p_id_penyewa, p_id_mobil, p_tanggal_pinjam, p_lama_sewa, v_rencana_tanggal_kembali, v_total_sewa);
	
	SET v_id_booking = LAST_INSERT_ID();
	
	INSERT INTO pengembalian (id_booking, no_plat, tanggal_pinjam)
	SELECT v_id_booking, m.no_plat, p_tanggal_pinjam
	FROM mobil m
	WHERE m.id_mobil = p_id_mobil;
END //
DELIMITER ;

CALL bookingAndPenggembalian(1, 1, '2024-06-09', 2)

DROP PROCEDURE bookingAndPenggembalian;

DELETE FROM booking;
DELETE FROM pengembalian;
SELECT * FROM booking;
SELECT * FROM pengembalian;

-- batas -----------------------------------------------------------------------------
DELIMITER //

CREATE TRIGGER hitung_denda BEFORE UPDATE ON pengembalian
FOR EACH ROW
BEGIN
    DECLARE v_tanggal_rencana DATE;
    DECLARE v_lama_keterlambatan INT;
    
    -- Mendapatkan tanggal rencana kembali dari tabel booking
    SELECT rencana_tanggal_kembali INTO v_tanggal_rencana
    FROM booking
    WHERE id_booking = NEW.id_booking;
    
    -- Menghitung jumlah keterlambatan
    SET v_lama_keterlambatan = DATEDIFF(NEW.tanggal_kembali, v_tanggal_rencana);
    
    -- Pengecekan bahwa tanggal kembali tidak lebih awal atau sama dengan tanggal pinjam
    IF NEW.tanggal_kembali <= NEW.tanggal_pinjam THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Tanggal kembali harus setelah tanggal pinjam.';
    END IF;
    
    -- Mengupdate denda
    IF v_lama_keterlambatan > 0 THEN
        SET NEW.denda = v_lama_keterlambatan * (SELECT harga_sewa FROM mobil WHERE id_mobil = (SELECT id_mobil FROM booking WHERE id_booking = NEW.id_booking));
    ELSE
        SET NEW.denda = 0;
    END IF;
END //

DROP TRIGGER hitung_denda;

DELIMITER ;
-- batas -----------------------------------------------------------------------------
DELIMITER //
CREATE PROCEDURE update_pengembalian(
	IN p_id_pengembalian INT,
	IN p_tanggal_kembali DATE
)
BEGIN
	UPDATE pengembalian SET tanggal_kembali = p_tanggal_kembali WHERE id_pengembalian = p_id_pengembalian;
END //
DELIMITER ;

CALL update_pengembalian(2, '2024-06-12');
DROP PROCEDURE update_pengembalian;

-- batas -----------------------------------------------------------------------------
DELIMITER //

CREATE TRIGGER check_penyewa_insert BEFORE INSERT ON penyewa
FOR EACH ROW
BEGIN
    DECLARE error_message VARCHAR(255);
    
    -- Pengecekan panjang NIK dan bahwa NIK hanya berisi angka
    IF CHAR_LENGTH(NEW.nik_penyewa) != 16 OR NOT NEW.nik_penyewa REGEXP '^[0-9]+$' THEN
        SET error_message = 'NIK harus terdiri dari 16 digit angka.';
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = error_message;
    END IF;
    
    -- Pengecekan panjang nomor telepon dan bahwa nomor telepon hanya berisi angka
    IF CHAR_LENGTH(NEW.tlp_penyewa) < 12 OR CHAR_LENGTH(NEW.tlp_penyewa) > 15 OR NOT NEW.tlp_penyewa REGEXP '^[0-9]+$' THEN
        SET error_message = 'Nomor telepon harus terdiri dari 12-15 digit angka.';
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = error_message;
    END IF;
END //

DELIMITER ;

INSERT INTO penyewa VALUES
('', 'Raib', '1111222233334444', '0394040394', 'Sagaras', 'P');


CREATE VIEW booking_view AS
SELECT 
    b.id_booking,
    p.nama_penyewa,
    m.merk AS merk_mobil,
    b.tanggal_pinjam,
    b.lama_sewa,
    b.rencana_tanggal_kembali,
    b.total_sewa
FROM 
    booking b
INNER JOIN penyewa p ON b.id_penyewa = p.id_penyewa
INNER JOIN mobil m ON b.id_mobil = m.id_mobil;
