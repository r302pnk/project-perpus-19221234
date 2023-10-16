<h3>Sistem Informasi Perpustakaan</h3>
<h5>Selamat datang <?=$pengguna['nama_lengkap'] ?? ''?> | <?=$pengguna['email']?></h5>
<ul>
    <li><a href="<?=base_url('anggota')?>">Anggota</a></li>
    <li><a href="<?=base_url('penerbit')?>">Penerbit</a></li>
    <li><a href="<?=base_url('kategori')?>">kategori</a></li>
    <li><a href="<?=base_url('peminjaman')?>">Peminjaman</a></li>
    <li><a href="<?=base_url('logout')?>">Keluar</a></li>
    
</ul>