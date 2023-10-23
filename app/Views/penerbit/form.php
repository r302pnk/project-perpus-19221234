<!DOCTYPE html>
<html>
<head>
    <title>Create Penerbit</title>
</head>
<body>

<h1>Create Penerbit</h1>

<form enctype="multipart/form-data" action="<?= base_url('penerbit/create') ?>" method="post">
    <input type="hidden" name="id" value="<?=$data['id'] ?? ''?>" />
    <label for="namapenerbit">Nama Penerbit</label>
    <input type="text" name="penerbit" value="<?=$data['penerbit'] ?? ''?>" required><br>

    <label for="kota">Kota</label>
    <input type="text" name="kota" value="<?=$data['kota'] ?? ''?>" required><br>

    <label for="icon">Icon Penerbit</label>
    <input type="file" name="icon" ><br>
    
    <input type="submit" value="Submit">
</form>

</body>
</html>
