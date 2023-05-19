<?php /** @var gamboamartin\controllers\controlador_adm_session $controlador */

use config\views;

if (isset((new views())->template)):?>
    <div class="form-signin w-100 m-auto">
        <form method="post" action="./index.php?seccion=adm_session&accion=loguea" class="form-additional">

            <div class="form-floating">
                <input type="text" name="user" class="form-control no-focus-outline outline-0 login-input"
                       id="floatingInput" placeholder=""/>
                <label for="floatingInput">Usuario:</label>
            </div>

            <div class="form-floating my-4">
                <input type="password" name="password" class="form-control no-focus-outline outline-0 login-input"
                       id="floatingPassword" placeholder="">
                <label for="floatingPassword">Contraseña:</label>
            </div>

            <button class="w-100 mt-2 btn btn-lg btn-primary login-button" type="submit">INICIAR SESIÓN</button>
        </form>
    </div>
<?php else: ?>
    <div class="container container-login">
        <div class="row">
            <div class="col-md-12">
                <!-- /. widget-AVAILABLE PACKAGES -->
                <div class="row-cols-12">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <form method="post" action="./index.php?seccion=adm_session&accion=loguea"
                              class="form-additional">
                            <div class="control-group">
                                <label class="control-label login-label" for="inputUsername2">Usuario:</label>
                                <div class="controls">
                                    <input type="text" name="user" value="" class="form-control login-input"
                                           id="inputUsername2" placeholder=""/>
                                </div>
                            </div>
                            <div class="control-group login-control">
                                <label class="control-label login-label" for="inputPassword1">Contraseña:</label>
                                <div class="controls">
                                    <input type="password" name="password" value="" class="form-control login-input"
                                           id="inputPassword1" placeholder=""/>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="col-md-12 btn btn-danger login-button">INICIAR SESIÓN
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.center-content -->
        </div>
    </div>
<?php endif; ?>


