<?php
include '../../Inc/userheader.php';
include '../../Models/Curso.php';
?>
<div class="row container-fluid text-center p-4">
<?php foreach($cursoobjeto as $c){ ?>
    <article class="col-3">
        <div class="container-fluid bg-light p-2 mx-2 rounded">
            <a href="../Cursos/html5.php" class="row">
                <img src="<?php echo '../Cursos/' . $c->url_img_curso . $c->img_curso ?>" alt="logo css">
            <a href="../Cursos/html5.php" class="row" style="text-decoration:none">
            <span>
                <?php echo $c->nombre_curso?>
            </span>
            </a>
        </div>
    </article>
<?php }; ?>
</div>
<?php include '../../Inc/userfooter.php' ?>