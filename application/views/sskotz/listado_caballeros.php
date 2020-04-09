<style>
	#heading0{
		background-color:lightblue;
	}
</style>

<!-- Msj Error / OK / Vacio -->
    <?php
        if(!empty($msj)){
            if($msg=="ok") echo "<div class='alert alert-success text-center' role='alert'>$msj</div>";
            elseif($msg=="error") echo "<div class='alert alert-danger text-center' role='alert'>$msj</div>";
            else "<div class='alert alert-info text-center' role='alert'>$msj</div>";
        }
    ?>
    
    <div class="container">
        <div class="breadcrumb t2"><a href="sskotz/panel"><i class="fa fa-angle-left" aria-hidden="true"></i> Volver a panel</a></div>
        <div class="row cabecera-panel">
            <div class="col-6"><h1 class="titulo-panel">Caballeros</h1></div>
            <div class="col-6 text-right">
                <a href="/sskotz/nuevo-caballero"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ingresar Caballero</a>
            </div>
        </div>

        <div class="wrapper-modal-editor">
            <!-- Listado Caballeros -->
                <table id="tabla_caballeros" class="table table-striped table-bordered table-hover table-responsive text-nowrap table-sm" style="width:100%">
                    <thead>
                        <th>Nombre</th>
                        <th>Rango</th>
                        <th>Utilidad</th>
                        <th>Uso</th>
                    </thead>
                    <tbody><?php
                        if(count($caballeros) > 0){
                            foreach($caballeros as $caballero){ ?>
                                <tr>
                                    <td><a href="/sskotz/caballero/<?php echo $caballero["id"]; ?>" class="link-texto"><?php echo $caballero["nombre"] ?></a></td>
                                    <td><?php echo $caballero["rango"]; ?></td>
                                    <td><?php echo $caballero["utilidad"]; ?></td>
                                    <td><?php echo $caballero["uso"]; ?></td>
                                </tr><?php
                            }
                        }else{
                            echo '<div class="txt-16">No se encontraron Pedidos</div>';
                        } ?>
                    </tbody>
                </table>
        </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css" rel="stylesheet"/>

<!-- Scripts -->
<script>
    $(document).ready(function(){
        var table = $("#tabla_caballeros").DataTable({
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
    });
</script>