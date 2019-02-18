<div class="row d-flex justify-content-center modalWrapper">
    <div class="modal fade editar_pedido" id="modal_editar_pedido<?php echo $pedido['id_pedido'];?>" role="dialog" aria-labellydby="modal_editar_pedido" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <?php echo form_open('/pedido/editar'); ?>
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Editar Pedido</h4>
                        <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="row">
                            <!-- ID -->
                                <input class="form-control" name="id_pedido" value="<?php echo $pedido['id_pedido']; ?>" hidden>
                            <!-- Obrero -->
                                Obrero: <input class="form-control" name="obrero" placeholder="Obrero que realiza el pedido..." value="<?php if(!empty($datos_ingresados['obrero'])) echo sustituto_tilde($datos_ingresados['obrero']); else echo sustituto_tilde($pedido['obrero']); ?>" required> <br>
                            <!-- Productos -->
                                Productos: 
                                <select class="lista_productos" multiple="true" name="id_producto[]">
                                    <?php foreach($productos as $producto){ ?>
                                        <option id="<?php echo $producto['id_producto']; ?>" value="<?php echo $producto['nombre']; ?>"
                                            <?php if(isset($datos_ingresados) && !empty($datos_ingresados)){ 
                                                foreach($datos_ingresados['producto'] as $p_ingresado){
                                                    if($p_ingresado == $producto['id_producto']){
                                                        echo 'selected="selected"';
                                                    }else{
                                                        echo '';
                                                    }
                                                }
                                            } ?>
                                        >
                                            <?php echo $producto['nombre']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            <!-- Cantidad -->
                                Cantidad: <input class="form-control" type="number" name="cantidad" min="0" value="<?php if(!empty($datos_ingresados['cantidad'])) echo $datos_ingresados['cantidad']; else echo $pedido['cantidad']; ?>"><br>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center buttonEditFormWrapper">
                        <button id="editar_pedido" class="btn btn-primary" type="submit">Editar Pedido</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>