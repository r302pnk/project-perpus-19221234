<?=$this->extend('template')?>

<?=$this->section('isi_konten')?>
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Data Peminjaman</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Peminjaman</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<div class="card">
    <div class="card-header">
    <h3 class="card-title">Data Peminjaman buku perpustakaan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <a class="btn btn-primary" href="<?=base_url('/peminjaman/form')?>">Tambah data</a>
<table class='mydatatable table border'>
    <thead>
        <tr>
            <th>Tanggal Peminjaman</th>
            <th>Anggota</th>
            <th>Koleksi Buku</th> 
            <th>Petugas</th>
            <th>Edit</th>
            <th>Hapus</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach($daftar_peminjaman as $k=>$v): ?>
            <tr>
                <td><?=$v['tgl_peminjaman'] ?></td>
                <td><?=$v['nama_lengkap'] ?></td>
                <td><?=$v['judul'] ?></td> 
                <td><?=$v['petugas'] ?></td>
                 <td> <a href="<?=base_url("/peminjaman/edit/".$v['id'])?>">Edit</a> </td>
                <td>
                    <form onsubmit="return confirm('yakin ke nak dihapus??')" action="<?=base_url('penerbit/hapus')?>" method="post">
                        <input type="hidden" name="id" value="<?=$v['id']?>" />
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


    </div>
    <!-- /.card-body -->
</div>
 
<?=$this->endSection()?>