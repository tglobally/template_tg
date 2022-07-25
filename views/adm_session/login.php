<?php /** @var gamboamartin\controllers\controlador_adm_session $controlador */ ?>
<div class="container container-login">
    <div class="row">
        <div class="col-md-12">
            <!-- /. widget-AVAILABLE PACKAGES -->
            <div class="row-cols-12">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <form method="post" action="./index.php?seccion=adm_session&accion=loguea" class="form-additional">
                        <div class="control-group">
                            <label class="control-label login-label" for="inputUsername2">Usuario:</label>
                            <div class="controls">
                                <input type="text" name="user" value="" class="form-control login-input" id="inputUsername2" placeholder="" />
                            </div>
                        </div>
                        <div class="control-group login-control">
                            <label class="control-label login-label" for="inputPassword1">Contraseña:</label>
                            <div class="controls">
                                <input type="password" name="password" value="" class="form-control login-input" id="inputPassword1" placeholder="" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="col-md-12 btn btn-danger login-button">INICIAR SESIÓN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.center-content -->
    </div>
</div>