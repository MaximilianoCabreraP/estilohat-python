<!-- Msj Error / OK / Vacio -->
    <?php
        if(!empty($msj)){
            if($msg=="ok") echo "<div class='alert alert-success text-center' role='alert'>$msj</div>";
            elseif($msg=="error") echo "<div class='alert alert-danger text-center' role='alert'>$msj</div>";
        }
    ?>
    
<div class="ancho-control-2">
    <?php echo form_open('/sskotz/agregar-caballero'); ?>
        <div class="bloque-blanco">
            <h4 class="txt-16">Información Caballero</h4><br>
            <div class="row">
                <div class="col-sm-5">
                    <div class="porta-input">
                        <label class="label-control-2">*Nombre</label><br>
                        <input id="nombre" class="input-control-2" type="text" name="nombre" value="<?php echo !empty($caballero["nombre"])?$caballero["nombre"]:""; ?>"/>
                    </div>
                    <div class="porta-input">
                        <label class="label-control-2">*Rango</label><br>
                        <select class="input-control-2" id="rango" name="rango" required>
                            <option value="" selected disable>Seleccioná un rango</option>
                            <option value="SS">SS</option>
                            <option value="S">S</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">&nbsp;</div>
                <div class="col-sm-5">
                    <div class="porta-input">
                        <label class="label-control-2">Uso <button type="button" class="btn-ayuda" data-container="body" data-toggle="popover" data-placement="top" data-content="Indicá que uso va a tener este caballero: Curador, Soporte, Atacante, etc."><i class="fas fa-question-circle"></i></button></label>
                        <input class="input-control-2" type="text" name="uso" value="<?php echo !empty($caballero["uso"])?$caballero["uso"]:""; ?>" />
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Crear Caballero" /><br>
    </form>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css" rel="stylesheet"/>