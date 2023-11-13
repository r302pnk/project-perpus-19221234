<?=$this->extend('template')?>

<?=$this->section('isi_konten')?>
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Form Peminjaman</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('penerbit')?>">Penerbit</a></li>
            <li class="breadcrumb-item active">Form Peminjaman</li>
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
        <h3 class="card-title">Form Peminjaman</h3>
        </div>
         
        <div class="col-md-12">
        <form action="<?=base_url('peminjaman')?>" method="post">
            
            <input type="hidden" class="form-control" id="id" name="id" value="<?=$data['id'] ?? ''?>">
    
        <div class="form-group">
            <label for="tgl_peminjaman">Tanggal Peminjaman:</label>
            <input type="datetime-local" value="<?=$data['tgl_peminjaman'] ?? ''?>" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman" required>
        </div>
         
        <div class="form-group">
            <label for="tb_anggota_id">Anggota:</label>
            <select name="tb_anggota_id" class="select2">
                <?php foreach($daftar_anggota as $k):
                        $selected = $k['id'] == $data['tb_anggota_id'] ? 'selected' : '';
                    ?>
                    <option <?=$selected?> value="<?=$k['id']?>"><?=$k['nama_lengkap']?> - <?=$k['alamat']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="tb_koleksibuku_id">Koleksi Buku:</label>
            <select name="tb_koleksibuku_id" class="select2">
                <?php foreach($daftar_koleksi as $k):
                         $selected = $k['id'] == $data['tb_koleksibuku_id'] ? 'selected' : '';
                    ?>
                    <option <?=$selected?> value="<?=$k['id']?>"><?=$k['judul']?>. No Koleksi <?=$k['nomor_koleksi']?></option>
                <?php endforeach;?>
            </select>
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> 
        </div>
         
    </div>
    <!-- /.card -->
 
</div>

</div>
 
</div> 
 
<script>
    document.addEventListener('DOMContentLoaded', function(e){
        $('.select2').select2({
            'width':'100%'
        });
    });
</script>
<?=$this->endSection()?>
