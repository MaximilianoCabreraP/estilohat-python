<div class="cabecera-panel">
    <div class="container">
        <div class="breadcrumb2 t2"><a href="/<?php echo $volver=="Panel"?"":$volver;?>"><i class="far fa-angle-left"></i> Volver a <?php echo $volver;?></a></div>
        <div class="row">
            <div class="col-6 align-self-center"><h1 class="titulo-panel"><i class="<?php echo $icono; ?>"></i> <?php echo $titulo; ?></h1></div>
            <?php if(!empty($boton)){?>
                <div class="col-6  align-self-center text-right">
                    <?php echo $boton; ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>