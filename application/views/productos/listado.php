<style>
	#heading0{
		background-color:lightblue;
	}
</style>
<?php
    function sustituto_tilde($nombre){ 
        $nombre = str_replace("á", "a", $nombre);
        $nombre = str_replace("Á", "A", $nombre);
        $nombre = str_replace("é", "e", $nombre);
        $nombre = str_replace("É", "E", $nombre);
        $nombre = str_replace("í", "i", $nombre);
        $nombre = str_replace("Í", "I", $nombre);
        $nombre = str_replace("ó", "o", $nombre);
        $nombre = str_replace("Ó", "O", $nombre);
        $nombre = str_replace("ú", "u", $nombre);
        $nombre = str_replace("Ú", "U", $nombre);

        return $nombre;
    }
?>
<!-- Msj Error / OK / Vacio -->
    <?php
        if ($msg!=null) {
            if ($msg=="ok") {
                echo    "<div class='alert alert-success text-center' role='alert'>
                            El producto fue ingresado correctamente.
                        </div>";
            }else if($msg=="editado"){
                echo    "<div class='alert alert-success text-center' role='alert'>
                            El producto fue editado correctamente.
                        </div>";
            }else if($msg=="eliminado"){
                echo    "<div class='alert alert-success text-center' role='alert'>
                            El producto se elimino correctamente.
                        </div>";
            }else if($msg=="error"){
                echo    "<div class='alert alert-danger text-center' role='alert'>
                            No se pudo realizar la accion, volvé a intentarlo.
                        </div>";
            }else if($msg=="vacio"){
                echo    "<div class='alert alert-danger text-center' role='alert'>
                            Se deben completar todos los campos que contengan un *.
                        </div>";
            }
        }if($falta!=null){
            $msj = "<div class='alert alert-danger text-center' role='alert'>
                        Faltan los siguientes datos: ";
                        $val = 0;
                        $mensaje = "";
                        foreach ($falta as $e){
                            if($val != 0){
                                if($e == "Obrero"){
                                    $mensaje .= "Obrero";
                                }elseif($e == "Fecha Pedido"){
                                    if($mensaje != "")
                                        $mensaje .= " | ";
                                    $mensaje .= "Fecha Pedido";
                                }elseif($e == "Estado"){
                                    if($mensaje != "")
                                        $mensaje .= " | ";
                                    $mensaje .= "Estado";
                                }elseif($e == "Cantidad"){
                                    if($mensaje != "")
                                        $mensaje .= " | ";
                                    $mensaje .= "Cantidad";
                                }else{
                                    if($mensaje != "")
                                        $mensaje .= " | ";
                                    $mensaje .= $e;
                                }
                                echo $mensaje;
                            }else{
                                echo "".$e;
                                $val = 1;
                            }
                        }
                        $msj .= "</div>";
            echo $msj;
        }
    ?>
<!-- Nuevo Producto -->
    <div class="accordion" id="accordion">
        <div class="card card-header">
            <div id="collapse0" class="collapse" aria-labelledby="heading0" data-parent="#accordion">
                <?php echo form_open("/producto/agregar"); ?>
                    <div class="row">
                        <div class="col-sm-9">
                        <!-- Datos -->
                            <div class="row">
                                <div class="col-sm-6">
                                    Nombre: <input class="form-control" type="text" name="nombre" placeholder="Ingresá el nombre..." value="<?php if(!empty($datos_ingresados["nombre"])) echo $datos_ingresados["nombre"]; ?>" required />
                                    Tipo: <select class="form-control" name="tipo">
                                                <option selected disabled>Selecciona uno</option>
                                                <option value="1" <?php if($datos_ingresados["tipo"] == "1") echo "selected"; ?> >Herramienta</option>
                                                <option value="2" <?php if($datos_ingresados["tipo"] == "2") echo "selected"; ?>>Material</option>
                                                <option value="3" <?php if($datos_ingresados["tipo"] == "3") echo "selected"; ?>>Accesorio</option>
                                            </select>
                                    Estado: <select class="form-control" name="estado">
                                                <option selected disabled>Selecciona un estado</option>
                                                <option value="Nuevo" <?php echo $datos_ingresados["estado"]=="Nuevo"?"selected":"";?>>Nuevo</option>
												<option value="Gastado" <?php echo $datos_ingresados["estado"]=="Gastado"?"selected":"";?>>Gastado</option>
												<option value="Renovar" <?php echo $datos_ingresados["estado"]=="Renovar"?"selected":"";?>>Renovar</option>
												<option value="Repuesto" <?php echo $datos_ingresados["estado"]=="Repuesto"?"selected":"";?>>Repuesto</option>
												<option value="Roto" <?php echo $datos_ingresados["estado"]=="Roto"?"selected":"";?>>Roto</option>
												<option value="Entero" <?php echo $datos_ingresados["estado"]=="Entero"?"selected":"";?>>Entero</option>
												<option value="Medio" <?php echo $datos_ingresados["estado"]=="Medio"?"selected":"";?>>Medio</option>
												<option value="Vacio" <?php echo $datos_ingresados["estado"]=="Vacio"?"selected":"";?>>Vacio</option>
                                            </select>
                                </div>
                                <div class="col-sm-6">
                                    Descripción: <input class="form-control" type="text" name="descripcion" placeholder="Ingresá la descripción..." <?php if(!empty($datos_ingresados["descripcion"])) echo $datos_ingresados["descripcion"]; ?> required />
                                    Marca: <input class="form-control" type="text" name="marca" placeholder="Ingresá la marca..." value="<?php if(!empty($datos_ingresados["marca"])) echo $datos_ingresados["marca"]; ?>" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <button type="submit" class="btn btn-primary">Guardar Producto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<div class="wrapper-modal-editor">
    <!-- Listado Productos -->
        <table id="tabla_productos" class="table table-striped table-bordered table-hover table-responsive text-nowrap table-sm" style="width:100%">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php
                    if(count($productos) > 0){
                        foreach($productos as $producto){ ?>
                            <tr>
                                <!-- ID Producto-->
                                    <td><?php echo $producto["id_producto"]; ?></td>
                                <!-- Nombre -->
                                    <td><a href=""class="link-texto" data-toggle="modal" data-target="#modal_editar<?php echo $producto["id_producto"]; ?>"><?php echo sustituto_tilde($producto["nombre"]); ?></a></td>
                                <!-- Marca -->
                                    <td><?php echo $producto["marca"]; ?></td>
                                <!-- Tipo -->
                                    <td>
                                        <?php
                                            switch($producto["tipo"]){
                                                case 1: echo "Herramienta"; break;
                                                case 2: echo "Material"; break;
                                                case 3: echo "Accesorio";break;
                                            }
                                        ?>
                                    </td>
                                <!-- Botones -->
                                    <td>
                                        <!-- editar -->
                                            <a href="" class="btn btn-info btn-rounded btn-sm editar" data-toggle="modal" data-target="#modal_editar<?php echo $producto["id_producto"]; ?>">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        <!-- eliminar -->
                                            <?php //if($this->session->type === "admin"){ ?>
                                                <a href="/Producto/eliminar/<?php echo $producto["id_producto"]; ?>" onclick="return eliminar(JSON.stringify('<?php echo $producto['nombre']; ?>'))" class="btn btn-info btn-rounded btn-sm">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            <?php //} ?>
                                    </td>
                            </tr>
                <?php   }
                    }else{
                        echo "<div class='txt-16'>No se encontraron Productos</div>";
                        }
                    ?>
            </tbody>
        </table>
    <?php foreach($productos as $producto){ ?>
        <!-- Editar Producto -->
            <div class="row d-flex justify-content-center modalWrapper">
                <div class="modal fade editar" id="modal_editar<?php echo $producto["id_producto"];?>" role="dialog" aria-labellydby="modal_editar" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <?php echo form_open("/producto/editar"); ?>
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Editar Producto</h4>
                                    <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body mx-3">
                                    <div class="row">
                                        <!-- ID -->
                                            <input class="form-control" name="id_producto" value="<?php echo $producto["id_producto"]; ?>" hidden>
                                        <!-- Nombre -->
                                            Nombre: <input class="form-control" name="nombre" placeholder="Titulo..." value="<?php if(!empty($datos_ingresados["nombre"])) echo sustituto_tilde($datos_ingresados["nombre"]); else echo sustituto_tilde($producto["nombre"]); ?>" required> <br>
                                        <!-- Marca -->
                                            Marca: <input class="form-control" name="marca" placeholder="Marca..." value="<?php if(!empty($datos_ingresados["marca"])) echo sustituto_tilde($datos_ingresados["marca"]); else echo sustituto_tilde($producto["marca"]); ?>" required> <br>
                                        <!-- Descripcion -->
                                            Descripcion: <input class="form-control" name="descripcion" value="<?php if(!empty($datos_ingresados["descripcion"]))echo sustituto_tilde($datos_ingresados["descripcion"]); else echo sustituto_tilde($producto["descripcion"]); ?>" required> <br>
                                        <!-- Tipo -->
                                            Tipo: 
                                                <select class="form-control" name="tipo">
                                                    <option selected disabled>Eligir uno</option>
                                                    <option <?php if($datos_ingresados["tipo"] == 1 || $producto["tipo"] == 1) echo "selected";?> value="1">Herramienta</option>
                                                    <option <?php if($datos_ingresados["tipo"] == 2 || $producto["tipo"] == 2) echo "selected";?> value="2">Material</option>
                                                    <option <?php if($datos_ingresados["tipo"] == 3 || $producto["tipo"] == 3) echo "selected";?> value="3">Accesorio</option>
                                                </select><br>
                                        <!-- Estado -->
                                            Estado: <select class="form-control" name="estado">
                                                        <option selected disabled>Selecciona un estado</option>
                                                        <option value="Nuevo" <?php echo $datos_ingresados["estado"]=="Nuevo"?"selected":"";?>>Nuevo</option>
                                                        <option value="Gastado" <?php echo $datos_ingresados["estado"]=="Gastado"?"selected":"";?>>Gastado</option>
                                                        <option value="Renovar" <?php echo $datos_ingresados["estado"]=="Renovar"?"selected":"";?>>Renovar</option>
                                                        <option value="Repuesto" <?php echo $datos_ingresados["estado"]=="Repuesto"?"selected":"";?>>Repuesto</option>
                                                        <option value="Roto" <?php echo $datos_ingresados["estado"]=="Roto"?"selected":"";?>>Roto</option>
                                                        <option value="Entero" <?php echo $datos_ingresados["estado"]=="Entero"?"selected":"";?>>Entero</option>
                                                        <option value="Medio" <?php echo $datos_ingresados["estado"]=="Medio"?"selected":"";?>>Medio</option>
                                                        <option value="Vacio" <?php echo $datos_ingresados["estado"]=="Vacio"?"selected":"";?>>Vacio</option>
                                                    </select>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-center buttonEditFormWrapper">
                                    <button id="editar" class="btn btn-primary" type="submit">Editar Producto</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    <?php } ?>
</div>

<script>
    function eliminar(nombre){
        return confirm("¿Seguro que desea eliminar la el producto: "+JSON.parse(nombre)+"?");
    }
    $(document).ready(function(){
        var table = $("#tabla_productos").DataTable({
            paging: true,
            ordering: true,
            autoWidth: true,
            stateSave: true,
            pageLength: 50,
            dom: '<"top" <"float-left" f><"buscador control-form"><"float-right" l> > t <"bottom text-center" ip><"clear">',
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ regístros en total)",
                "infoPostFix": "",
                "thousands": ".",
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontró resultados - Lo siento",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
      
        $("div.buscador").html( " | Tipo: <select id="tipo"><option selected value="">Todos</option><option value="Herramientas">Herramientas</option><option value="Material">Material</option><option value="Accesorios">Accesorios</option></select>");
            var table = $("#tabla_productos").DataTable();
 
            // #pausado is a <input type="text"> element
            $("#tipo").change(function () {
                table
                    .columns(3)
                    .search( $("#tipo").val() )
                    .draw();
            } );
    });
</script>