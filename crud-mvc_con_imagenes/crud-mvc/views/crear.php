<?php require 'views/header.php'; ?>

<form method='post' enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input name='nombre' type="text"><br><br>
    <label for="email">Email</label>
    <input name='email' type="text"><br><br>
    <label for="imagen">Foto</label>
    <input type="file" name="imagen" id="imagen"><br><br>
    <button> Guardar </button>
</form>

<?php require 'views/footer.php'; ?>