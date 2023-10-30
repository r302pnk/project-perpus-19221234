<?=$this->extend('template')?>

<?=$this->section('isi_konten')?>
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Data Penerbit</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Penerbit</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<div class="card">
    <div class="card-header">
    <h3 class="card-title">Data penerbit buku perpustakaan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <a class="btn btn-primary" href="<?=base_url('/penerbit/form')?>">Tambah data</a>
<table class='mydatatable table border'>
    <thead>
        <tr>
            <th>Nama Penerbit</th>
            <th>Kota</th>
            <th>Icon</th>
            <th>Edit</th>
            <th>Hapus</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach($daftar_penerbit as $k=>$v): ?>
            <tr>
                <td><?=$v['penerbit'] ?></td>
                <td><?=$v['kota'] ?></td>
                <td> <img style="width: 100px;" src="<?=base_url('penerbit/icon/'.$v['id'].'.png')?>" />  </td>
                <td> <a href="<?=base_url("/penerbit/edit/".$v['id'])?>">Edit</a> </td>
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