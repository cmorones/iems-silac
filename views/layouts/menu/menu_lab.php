<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;
?>

<ul class="sidebar-menu">
        <li><?= Html::a('<i class="fa  fa-cogs"></i> <span>Tablero</span>', ['/inventario/dash']); ?></li>
        <li><?= Html::a('<i class="fa  fa-cogs"></i> <span>Inventario</span>', ['/inventario/inventario/']);?></li>
        <li><?= Html::a('<i class="fa  fa-calendar"></i> <span>Listado de solicitudes</span>', ['/lab/periodos']);?></li>
        <li><?= Html::a('<i class="fa  fa-check"></i> <span>Cierre de Sesiones</span>', ['/lab/default/cierre']);?></li>
        <li><?= Html::a('<i class="fa  fa-trash"></i> <span>Registro Desechos Quimicos</span>', ['/lab/default/cierre']);?></li>
        <li><?= Html::a('<i class="fa  fa-recycle"></i> <span>Registro de Material Dañado</span>', ['/lab/cierre']);?></li>
        <li><?= Html::a('<i class="fa  fa-edit"></i> <span>Informe de Sesiones</span>', ['/lab/cierre']);?></li>
        <li><?= Html::a('<i class="fa  fa-edit"></i> <span>Informe de Consumos</span>', ['/lab/cierre']);?></li>
        <li><?= Html::a('<i class="fa  fa-edit"></i> <span>Informe de Deseños Quimicos</span>', ['/lab/cierre']);?></li>
        <li><?= Html::a('<i class="fa  fa-edit"></i> <span>Informe de Material Dañado</span>', ['/lab/cierre']);?></li>
</ul>
