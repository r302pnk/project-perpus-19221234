<?=$this->extend('template')?>

<?=$this->section('isi_konten')?>
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Form Penerbit</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('penerbit')?>">Penerbit</a></li>
            <li class="breadcrumb-item active">Form Penerbit</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Form Penerbit</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form enctype="multipart/form-data" action="<?= base_url('penerbit/create') ?>" method="post">

        <input type="hidden" name="id" value="<?=$data['id'] ?? ''?>" />
        <div class="card-body">
            <div class="form-group">
            <label for="kota">Kota</label>
            <input type="text" class="form-control" id="kota" placeholder="Kota Penerbit">
            </div>
            <div class="form-group">
            <label for="penerbit">Nama Penerbit</label>
            <input type="text" class="form-control" id="penerbit" placeholder="Nama Penerbit">
            </div>
            
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
    </div>
    <!-- /.card -->

    <div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Penerbit</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form enctype="multipart/form-data" action="<?= base_url('penerbit/create') ?>" method="post">

        <input type="hidden" name="id" value="<?=$data['id'] ?? ''?>" />
        <div class="card-body">
            <div class="form-group">
                <label for="kota">Kota</label>
                <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota Penerbit">
            </div>
            <div class="form-group">
                <label for="penerbit">Nama Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Nama Penerbit">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Penerbit">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="no_telepon">No Telepon</label>
                <input type="tel" class="form-control" id="no_telepon" name="no_telepon" placeholder="No Telepon">
            </div>

            <input class="btn btn-primary" type="submit" value="Submit">
        </div>
    </form>
</div>

</div>
 
</div> 
 
<?=$this->endSection()?>
