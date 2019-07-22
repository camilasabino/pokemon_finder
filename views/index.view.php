<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Pokemon Finder</title>

        <!-- Fonts -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Play&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="css/app.css" rel="stylesheet">

    </head>

    <body>

        <div class="jumbotron bg-azul text-center p-4">
            <a href="index.php"><h1 class="text-amarillo">Pokemon Finder</h1></a>
            <p class="text-white mb-5">El que quiere Pokemons, que los busque.</p>

            <form class="mt-5 form-buscar" enctype="multipart/form-data">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control mr-2 busqueda" name="busqueda" placeholder="Buscar Pokemons..." required>
                    <span class="input-group-btn">
                        <button class="btn btn-warning buscar" type="submit">Buscar</button>
                    </span>
                </div>
                <div class="input-group col-md-12">
                    <span class="text-white contador" name="contador"><?php echo count($pokemons); ?> resultado(s)</span>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input check-exacta" id="check-exacta" name="check-exacta">
                    <label class="form-check-label text-white" for="check-exacta">Búsqueda exacta</label>
                </div>
            </form>

        </div>

        <div class="container container-fluid mb-4">
            <div class="row fila-resultados">
                <div class="col col-resultados">

                    <?php if (!empty($pokemons)): ?> 

                        <ul class="list-unstyled lista-resultados">
                            <?php foreach ($pokemons as $pokemon): ?>
                                <li class="media bg-white mb-3 item-resultado">
                                    <img class="bg-celeste mr-3" src="<?php echo $pokemon->getImagen() ?>" alt="" onerror="this.onerror=null; this.src='img/desconocido.png'" width="100" height="100">
                                    <div class="media-body">
                                        <h2 class="text-azul mt-0 mb-1"><?php echo $pokemon->getNombre() ?> </h2>
                                        <div class="d-inline-block mr-3">
                                            <p><b class="mr-2">Experiencia Base:</b><?php echo $pokemon->getExperienciaBase() ?></p>
                                        </div>
                                        <div class="d-inline-block mr-3">
                                            <p><b class="mr-2">Altura:</b><?php echo $pokemon->getAltura() ?></p>
                                        </div>
                                        <div class="d-inline-block mr-3">
                                            <p><b class="mr-2">Peso:</b><?php echo $pokemon->getPeso() ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                    <?php else: ?>
                        <div class="alert alert-light text-azul">
                            <p>¡Lo siento! Lo que buscaste no existe en el mundo Pokemon.</p>
                        </div>
                    <?php endif ?>

                </div>
                <div class="col text-center col-cargando">
                    <p>Buscando Pokemons...</p>
                    <div class="spinner-border text-primary my-4 spinner-busqueda" role="status" aria-hidden="true"></div>
                    <p>Esto puede demorar un tiempo.</p>
                </div>
            </div>

        </div>

        <!-- JavaScript -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="js/app.js"></script>

    </body>

</html>