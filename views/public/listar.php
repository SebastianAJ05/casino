<?php require 'views/header.php'; ?>

<a href='?c=Usuario&a=crear'> Nuevo </a> <!--  -> IMPORTANTE !!!! -->
<div>
    <?php foreach ($usuarios as $u): ?>
        <p><?= $u['username'] ?> - <?= $u['email'] ?>
            <a href='?c=Usuario&a=editar&id=<?= $u['id'] ?>'> Editar </a>
            <a href='?c=Usuario&a=eliminar&id=<?= $u['id'] ?>'> Eliminar </a>
        </p>
        <img src="<?= $u['img_path'] ?>" alt="Foto de usuario">
    <?php endforeach; ?>
</div>

<?php require 'views/footer.php'; ?>


<!--
Esta “ruta” NO es una ruta:
    <a href="?c=Usuario&a=crear">Nuevo</a>

    Eso es query string de HTTP.

Qué pasa realmente ??
    El navegador abre:
        index.php?c=Usuario&a=crear

    PHP NO entiende MVC por sí solo.
    Solo lee:
        $_GET['c']  // "Usuario"
        $_GET['a']  // "crear"

    index.php decide todo -> IMPORTANTE !!!!!!

    Quién “sabe” a dónde ir ??
        -> No la vista
        -> No PHP
        -> El Front Controller (index.php)  

-->