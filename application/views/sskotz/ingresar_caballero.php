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
                        <label class="label-control-2">Utilidad <button type="button" class="btn-ayuda" data-container="body" data-toggle="popover" data-placement="top" data-content="Indica si es para PVP o PVE."><i class="fas fa-question-circle"></i></button></label>
                        <input class="input-control-2" type="text" name="utilidad" value="<?php echo !empty($caballero["utilidad"])?$caballero["utilidad"]:""; ?>" />
                    </div>
                    <div class="porta-input">
                        <label class="label-control-2">Uso <button type="button" class="btn-ayuda" data-container="body" data-toggle="popover" data-placement="top" data-content="Indicá que uso va a tener este caballero: Curador, Soporte, Atacante, etc."><i class="fas fa-question-circle"></i></button></label>
                        <input class="input-control-2" type="text" name="uso" value="<?php echo !empty($caballero["uso"])?$caballero["uso"]:""; ?>" />
                    </div>
                </div>
            </div>
            <div class="row">
                <h1>Habilidades</h1>
                <div class="col-sm-5">
                    <div class="porta-input">
                        <label class="label-control-2">Habilidad 1</label>
                        <input class="input-control-2" type="text" name="habilidad1" value="<?php echo !empty($caballero["habilidad1"])?$caballero["habilidad1"]:""; ?>" />
                        <input class="input-control-2" type="text" name="imagen_habilidad1" value="<?php echo !empty($caballero["imagen_habilidad1"])?$caballero["imagen_habilidad1"]:""; ?>" />
                    </div>
                    <div class="porta-input">
                        <label class="label-control-2">Habilidad 3</label>
                        <input class="input-control-2" type="text" name="habilidad3" value="<?php echo !empty($caballero["habilidad3"])?$caballero["habilidad3"]:""; ?>" />
                        <input class="input-control-2" type="text" name="imagen_habilidad3" value="<?php echo !empty($caballero["imagen_habilidad3"])?$caballero["imagen_habilidad3"]:""; ?>" />
                    </div>
                </div>
                <div class="col-sm-2">&nbsp;</div>
                <div class="col-sm-5">
                    <div class="porta-input">
                        <label class="label-control-2">Habilidad 2</label>
                        <input class="input-control-2" type="text" name="habilidad2" value="<?php echo !empty($caballero["habilidad2"])?$caballero["habilidad2"]:""; ?>" />
                        <input class="input-control-2" type="text" name="imagen_habilidad2" value="<?php echo !empty($caballero["imagen_habilidad2"])?$caballero["imagen_habilidad2"]:""; ?>" />
                    </div>
                    <div class="porta-input">
                        <label class="label-control-2">Habilidad 4</label>
                        <input class="input-control-2" type="text" name="habilidad4" value="<?php echo !empty($caballero["habilidad4"])?$caballero["habilidad4"]:""; ?>" />
                        <input class="input-control-2" type="text" name="imagen_habilidad4" value="<?php echo !empty($caballero["imagen_habilidad4"])?$caballero["imagen_habilidad4"]:""; ?>" />
                    </div>
                </div>
            </div>
            <div class="row">
                <h1>Niveles</h1>
                <div class="col-sm-4">
                    <div class="porta-input">
                        <label class="label-control-2">skill1_minimo</label>
                        <input class="input-control-2" type="text" name="" value="<?php echo !empty($caballero[""])?$caballero[""]:""; ?>" />
                    </div>
                    <div class="porta-input">
                        <label class="label-control-2">skill2_minimo</label>
                        <input class="input-control-2" type="text" name="" value="<?php echo !empty($caballero[""])?$caballero[""]:""; ?>" />
                    </div>
                    <div class="porta-input">
                        <label class="label-control-2">skill3_minimo</label>
                        <input class="input-control-2" type="text" name="" value="<?php echo !empty($caballero[""])?$caballero[""]:""; ?>" />
                    </div>
                    <div class="porta-input">
                        <label class="label-control-2">skill4_minimo</label>
                        <input class="input-control-2" type="text" name="" value="<?php echo !empty($caballero[""])?$caballero[""]:""; ?>" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="porta-input">
                        <label class="label-control-2">skill1_recomendado</label>
                        <input class="input-control-2" type="text" name="" value="<?php echo !empty($caballero[""])?$caballero[""]:""; ?>" />
                    </div>
                    <div class="porta-input">
                        <label class="label-control-2">skill2_recomendado</label>
                        <input class="input-control-2" type="text" name="" value="<?php echo !empty($caballero[""])?$caballero[""]:""; ?>" />
                    </div>
                    <div class="porta-input">
                        <label class="label-control-2">skill3_recomendado</label>
                        <input class="input-control-2" type="text" name="" value="<?php echo !empty($caballero[""])?$caballero[""]:""; ?>" />
                    </div>
                    <div class="porta-input">
                        <label class="label-control-2">skill4_recomendado</label>
                        <input class="input-control-2" type="text" name="" value="<?php echo !empty($caballero[""])?$caballero[""]:""; ?>" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="porta-input">
                        <label class="label-control-2">skill1_optimos</label>
                        <input class="input-control-2" type="text" name="" value="<?php echo !empty($caballero[""])?$caballero[""]:""; ?>" />
                    </div>
                    <div class="porta-input">
                        <label class="label-control-2">skill2_optimos</label>
                        <input class="input-control-2" type="text" name="" value="<?php echo !empty($caballero[""])?$caballero[""]:""; ?>" />
                    </div>
                    <div class="porta-input">
                        <label class="label-control-2">skill3_optimos</label>
                        <input class="input-control-2" type="text" name="" value="<?php echo !empty($caballero[""])?$caballero[""]:""; ?>" />
                    </div>
                    <div class="porta-input">
                        <label class="label-control-2">skill4_optimos</label>
                        <input class="input-control-2" type="text" name="" value="<?php echo !empty($caballero[""])?$caballero[""]:""; ?>" />
                    </div>
                </div>
            </div>
            <div class="row">
                <h1>Cosmos</h1>
                <div class="col-sm-3">Rojos</div>
                <div class="col-sm-3">Amarillos</div>
                <div class="col-sm-3">Azules</div>
                <div class="col-sm-3">Legendarios</div>
            </div>
            <div class="row">
                <h1>Datos</h1>
                <div class="col-sm-3">Pros y Contras</div>
                <div class="col-sm-3">Equipos</div>
                <div class="col-sm-3">Counters</div>
                <div class="col-sm-3">Videos</div>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Crear Caballero" /><br>
    </form>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css" rel="stylesheet"/>