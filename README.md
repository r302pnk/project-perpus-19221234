# Membuata view v_peminjaman

```
CREATE VIEW v_koleksibuku
AS
SELECT a.*, b.`judul`, b.`penulis`, b.`tb_penerbit_id`, c.`penerbit`
FROM 	tb_koleksibuku a LEFT JOIN
	tb_buku b ON a.`tb_buku_id`=b.`id` 
	LEFT JOIN tb_penerbit c ON
	c.`id`=b.`tb_penerbit_id`

```

Membuat View v_koleksibuku
```
CREATE VIEW v_koleksibuku
as
SELECT
  `a`.`id`             AS `id`,
  `a`.`tb_buku_id`     AS `tb_buku_id`,
  `a`.`nomor_koleksi`  AS `nomor_koleksi`,
  `a`.`status_koleksi` AS `status_koleksi`,
  `b`.`judul`          AS `judul`,
  `b`.`penulis`        AS `penulis`,
  `b`.`tb_penerbit_id` AS `tb_penerbit_id`,
  `c`.`penerbit`       AS `penerbit`
FROM ((`tb_koleksibuku` `a`
    LEFT JOIN `tb_buku` `b`
      ON (`a`.`tb_buku_id` = `b`.`id`))
   LEFT JOIN `tb_penerbit` `c`
     ON (`c`.`id` = `b`.`tb_penerbit_id`))
```