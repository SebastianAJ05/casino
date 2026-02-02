<?php require 'views/header.php'; ?>

<form method='post' enctype="multipart/form-data">
    <input name='nombre' type="text" value='<?= $data['username'] ?>'>
    <input name='email' type="text" value='<?= $data['email'] ?>'><br><br>
    <label for="foto">Foto:</label>
    <input type="file" name="imagen" id="imagen">
    <button> Actualizar </button>
</form>

<?php require 'views/footer.php'; ?>