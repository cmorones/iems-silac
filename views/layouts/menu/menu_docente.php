<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;
?>

<ul class="sidebar-menu">
        <li><?= Html::a('<i class="fa  fa-cogs"></i> <span>Tablero</span>', ['/docente']); ?></li>
        <li><?= Html::a('<i class="fa  fa-calendar"></i> <span>Listados de Sesiones </span>', ['/docente/periodos/']);?></li>
        <li><?= Html::a('<i class="fa  fa-calendar"></i> <span>Registro de Sessiones Extraordianrias</span>', ['/dashboard/default/index']);?></li>
        <li><?= Html::a('<i class="fa  fa-edit"></i> <span>Informe de Sesiones Realizadas</span>', ['/lab/cierre']);?></li>
       
</ul>

