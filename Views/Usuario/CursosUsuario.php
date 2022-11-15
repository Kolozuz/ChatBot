<?php
include '../Inc/userheader.php';
// include '../Models/Curso.php';
$cursoall =  new Curso();
$id_u = $_GET['id'];
$cursoobj = $cursoall->CheckCursoFromDB($id_u);
?>
<main class="container-fluid">
    <div class="row mt-4 text-center">
        <div class="col-12">
            <h2 class="fw-semibold">Administrador de Cursos</h2>
        </div>
    </div>
    <div class="row mt-4 text-center">
        <div class="col-md-3 col-sm-5 my-2">
            <a href="CursoController.php?action=crearCurso" class="btn btn-primario spin_animation fs-5 fw-bold p-3">
                <i class="fa-solid fa-plus"></i> Nuevo
            </a>
        </div>
        <div class="col-md-6 col-sm-1"></div>
        <div class="col-md-3 col-sm-5 my-2 dropdown">
            <button type="button" class="btn btn-primario dropdown-toggle p-3" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Ordernar por</button>
            <ul class="dropdown-menu">
                <li class="dropdown-item">
                    <input type="checkbox" id="fecha_check" name="fecha_check">
                    <label for="fecha_check">Fecha</label>
                </li>
                <li class="dropdown-item">
                    <input type="checkbox" id="nombre_check" name="nombre_check">
                    <label for="nombre_check">Nombre</label>
                </li>
            </ul>
        </div>
    </div>
</main>
<!-- <div class="col">
        <label for="tema_curso">Categoria</label>
        <select multiple name="tema_curso" id="tema_curso" class="form-select">
            <option selected>Selecciona una opcion</option>
            <option value="1"></option>
            <option value="2"></option>
            <option value="3"></option>
        </select>
    </div>

        <div class="col dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-autoclose="outside">Idioma</a>
            <div class="dropdown-menu">
                <form class="p-4 m-0">
                    <div class="form-check">
                        <input type="checkbox" name="spanish" id="spanish" class="form-check-input">
                        <label for="spanish" class="form-check-label">Español</label>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="form-check">
                        <input type="checkbox" name="spanish" id="english" class="form-check-input">
                        <label for="english" class="form-check-label">Ingles</label>
                    </div>
                </form>
            </div>
        </div> -->

<!-- <div class="col-md-4 form-floating">
        <input type="search" name="buscar_cursos" id="buscar_cursos" class="form-control" placeholder="p.eg Curso de Html">
        <label for="buscar_cursos">Busca algun curso</label>
    </div> -->

<div class="row container-fluid text-center p-5 mx-0">
    <?php foreach ($cursoobj as $c) { ?>
        <article class="col-md-3 col-sm-12 my-2">
            <div class="container-fluid bg-light p-2 mx-2 rounded text-center div-hover">
                <a href="UsuarioController.php?curso=html5" class="row">
                    <?php echo $c->img_c ?>
                    <a href="UsuarioController.php?curso=html5" class="row" style="text-decoration:none">
                        <span>
                            <?php echo $c->nombre_c ?>
                        </span>
                    </a>
            </div>
        </article>
    <?php }; ?>
</div>
<?php include '../Inc/userfooter.php' ?>