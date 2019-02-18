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
            if ($msg=="cargado") {
                echo    '<div class="alert alert-success text-center" role="alert">
                            El pedido fue ingresado correctamente.
                        </div>';
            }else if($msg=="editado"){
                echo    '<div class="alert alert-success text-center" role="alert">
                            El pedido fue editado correctamente.
                        </div>';
            }else if($msg=="eliminado"){
                echo    '<div class="alert alert-success text-center" role="alert">
                            El pedido se elimino correctamente.
                        </div>';
            }else if($msg=="error"){
                echo    '<div class="alert alert-danger text-center" role="alert">
                            No se pudo realizar la accion, volvé a intentarlo.
                        </div>';
            }else if($msg=="vacio"){
                echo    '<div class="alert alert-danger text-center" role="alert">
                            Se deben completar todos los campos que contengan un *.
                        </div>';
            }else if($msg=="error"){
                echo    '<div class="alert alert-danger text-center" role="alert">
                            Hubo un error, volvé a intentarlo.
                        </div>';
            }
        }
    ?>
<div class="container">
    <div class="breadcrumb t2"><a href="/panel"><i class="fa fa-angle-left" aria-hidden="true"></i> Volver al Panel</a></div>
    <div class="row cabecera-panel">
        <div class="col-6"><h1 class="titulo-panel">Pedidos</h1></div>
        <div class="col-6 text-right">
            <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapse0" aria-expanded="false" aria-controls="collapse0">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                Ingresar Pedido
            </button>
        </div>
    </div>

    <!-- Nuevo Pedido -->
        <div class="accordion" id="accordion">
            <div class="card card-header">
                <div id="collapse0" class="collapse" aria-labelledby="heading0" data-parent="#accordion">
                    <?php echo form_open('/pedido/agregar-pedido'); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <input class="form-contorl" type="text" name="obrero" placeholder="Nombre del Obrero..." required>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <select class="lista_productos" name="id_producto">
                                            <option selected disabled>Productos</option>
                                            <?php foreach($productos as $producto){ ?>
                                                <option id="<?php echo $producto['id_producto']; ?>" value="<?php echo $producto['nombre']; ?>">
                                                    <?php echo $pedido['nombre']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-contorl" type="number" name="cantidad" placeholder="Cantidad solicitada..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <button type="submit" class="btn btn-primary">Guardar Pedido</button>
                            </div>
                        </div>
                    </form>  
                </div>
            </div>
        </div>

    <div class="wrapper-modal-editor">
        <!-- Listado Pedidos -->
            <table id="tabla_pedidos" class="table table-striped table-bordered table-hover table-responsive text-nowrap table-sm" style="width:100%">
                <thead>
                    <th>ID</th>
                    <th>Obrero</th>
                    <th>Fecha Pedido</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php
                        if(count($pedidos) > 0){
                            foreach($pedidos as $pedido){ ?>
                                <tr>
                                    <!-- ID Pedido-->
                                        <td><?php echo $pedido['id_pedido']; ?></td>
                                    <!-- Nombre -->
                                        <td><a href="" class="link-texto" data-toggle="modal" data-target="#modal_editar_pedido<?php echo $pedido['id_pedido']; ?>"><?php echo sustituto_tilde($pedido['nombre']); ?></a></td>
                                    <!-- Fecha -->
                                        <td><?php $date = new DateTime($pedido['fecha_pedido']); echo $date->format('d-m-Y'); ?></td>
                                    <!-- Cantidad -->
                                        <td><?php echo $pedido['cantidad']; ?></td>
                                    <!-- Estado -->
                                        <td>
                                            <?php
                                                switch($pedido['estado']){
                                                    case 1: echo 'Ingresado'; break;
                                                    case 2: echo 'Solicitado'; break;
                                                    case 3: echo 'Recibido';break;
                                                    case 4: echo 'Entregado'; break;
                                                }
                                            ?>
                                        </td>
                                    <!-- Acciones -->
                                        <td>
                                            <!-- edit -->
                                                <a href="" class="btn btn-info btn-rounded btn-sm editar_pedido" data-toggle="modal" data-target="#modal_editar_pedido<?php echo $pedido['id_pedido']; ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            <!-- duplicate -->
                                                <a href="" class="btn btn-info btn-rounded btn-sm duplicar_pedido" data-id="<?php echo $pedido['id_pedido'];?>" data-toggle="modal" data-target="#modal_duplicar_pedido">
                                                    <i class="far fa-copy"></i>
                                                </a>
                                            <!-- delete -->
                                                <?php //if($this->session->type === 'admin'){ ?>
                                                    <a href="/Pedido/eliminar_pedido/<?php echo $pedido['id_pedido']; ?>" onclick='return eliminar_pedido(JSON.stringify("<?php echo $pedido["nombre"]; ?>"))' class="btn btn-info btn-rounded btn-sm">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                <?php //} ?>
                                        </td>
                                </tr>
                    <?php   }
                        }else{
                            echo '<div class="txt-16">No se encontraron Pedidos</div>';
                            }
                        ?>
                </tbody>
            </table>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css" rel="stylesheet"/>

<!-- Scripts -->
<script>
    $(document).ready(function(){
        $(".lista_productos").select2({
            placeholder: "Selecciona Producto",
            allowClear: true
        });
        var table = $('#tabla_pedido').DataTable({
            paging: true,
            ordering: true,
            autoWidth: true,
            stateSave: true,
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

        $('#tabla_pedidos tbody').on('click', 'td.detalle_pedido', function(){
            var tr = this.closest('tr');
            var row = table.row(tr);

            if(row.child.isShown()){
                row.child.hide();
            }else{
                row.child( mas_info(row.data()) ).show();
            }
        });

        $("div.buscador").html( 'Estado: <select id="estado"><option selected value="">Todos</option><option value="ingresado">Ingresado</option><option value="Solicitado">Solicitado</option><option value="Recibido">Recibido</option><option value="Entregado">Entregado</option></select>');
        var table = $('#tabla_pedidos').DataTable();

        $('#estado').change(function(){
            table
                .columns(3)
                .search($('#estado').val())
                .draw();
        });
    });
</script>