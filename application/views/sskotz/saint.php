<style type="text/css">
    .img-caballero{
        background-repeat:no-repeat;
        background-position:center top;
        background-size:contain;
    }
    .rojo{
        color:red;
    }
</style>

<div class="container">
    <?php #Msj Error/OK
        if(!empty($msj)){
            $alert = $msg=="ok"?"success":$msg=="error"?"danger":"info";
            echo "<div class='alert alert-$alert text-center' role='alert'>".$msj."</div>";
        }
    ?>
    <dl class="row">
        <div class="col-sm-8">
            <div class="box-gris">
                <h2>Habilidades</h2>
                <div class="row">
                    <div class="col-sm 9 txt-14">
                        <div class="row row-espaciado">
                            <div class="col-6">
                                <span class="txt-14"><?php if($caballero["skills"]["nombre_skill_1"]) echo "Skill 1: ".$caballero["skills"]["nombre_skill_1"]; ?></span><br>
                                <span class="txt-14"><?php if($caballero["skills"]["imagen_skill_1"]) echo $caballero["skills"]["imagen_skill_1"]; ?></span><br>
                                <span class="txt-14"><?php if($caballero["skills"]["nombre_skill_3"]) echo "Skill 3: ".$caballero["skills"]["nombre_skill_3"]; ?></span><br>
                                <span class="txt-14"><?php if($caballero["skills"]["imagen_skill_3"]) echo $caballero["skills"]["imagen_skill_3"]; ?></span><br>
                            </div>
                            <div class="col-6">
                                <span class="txt-14"><?php if($caballero["skills"]["nombre_skill_2"]) echo "Skill 2: ".$caballero["skills"]["nombre_skill_2"]; ?></span><br>
                                <span class="txt-14"><?php if($caballero["skills"]["imagen_skill_2"]) echo $caballero["skills"]["imagen_skill_2"]; ?></span><br>
                                <span class="txt-14"><?php if($caballero["skills"]["nombre_skill_4"]) echo "Skill 4: ".$caballero["skills"]["nombre_skill_4"]; ?></span><br>
                                <span class="txt-14"><?php if($caballero["skills"]["imagen_skill_4"]) echo $caballero["skills"]["imagen_skill_4"]; ?></span><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-gris">
                <h2>Cosmos</h2>
                <div class="row">
                    <div class="col-sm 9 txt-14">
                        <div class="row row-espaciado">
                            <div class="col-8"></div>
                            <div class="col-4"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-gris">
                <h2>Vínculos</h2>
                <div class="row">
                    <div class="col-sm 9 txt-14">
                        <div class="row row-espaciado">
                            <div class="col-8"></div>
                            <div class="col-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="box-gris">
                <h2>Información</h2>
                <div class="row">                
                    <div class="col-sm-3 img-caballero" style="background-image:url(<?php echo $caballero["imagen"];?>)">&nbsp;</div>
                    <div class="col-sm-9 txt-14">
                        <div class="row row-espaciado">
                            <div class="col-8">
                                <span class="txt-14"><?php if($caballero["rango"]) echo "Rango: ".$caballero["rango"]; ?></span><br>
                            </div>
                            <div class="col-4">
                                <span class="txt-14"><?php if($caballero["utilidad"]) echo "Utilidad: ".$caballero["utilidad"]; ?></span><br>
                            </div>
                        </div>
                        <div class="row row-espaciado">
                            <div class="col-8">
                                <span class="txt-14"><?php if($caballero["uso"]) echo "Uso: ".$caballero["uso"]; ?></span><br>
                            </div>
                            <div class="col-4">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>