<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;
?>
   <?php
	/*$isStudent = $isEmployee = NULL;

	if(!Yii::$app->user->isGuest){
	      $isStudent = Yii::$app->session->get('stu_id');
	      $isEmployee = Yii::$app->session->get('emp_id');
	}
	if(isset($isStudent))
	{
		$stuMaster = app\modules\student\models\StuMaster::find()->andWhere(['stu_master_id' => $isStudent])->one();
		if(!empty($stuMaster))
		      $stuInfo = app\modules\student\models\StuInfo::findOne($stuMaster->stu_master_stu_info_id);
		else
		      throw new app\web\NotFoundHttpException('The requested user login credentials does not exist.');
		$Photo = $stuInfo->getStuPhoto($stuInfo->stu_photo);
	}
	else if(isset($isEmployee))
	{
		$empMaster = app\modules\employee\models\EmpMaster::find()->andWhere(['emp_master_id' => $isEmployee])->one();
		if(!empty($empMaster))
		      $empInfo = app\modules\employee\models\EmpInfo::findOne($empMaster->emp_master_emp_info_id);
		else
		      throw new app\web\NotFoundHttpException('The requested user login credentials does not exist.');
		$Photo = $empInfo->getEmpPhoto($empInfo->emp_photo);
	}
	else {
		$Photo = Yii::getAlias('@web'). '/data/emp_images/no-photo.png';
	}*/
   ?>
<aside class="left-side sidebar-offcanvas">

    <section class="sidebar">

     

        <ul class="sidebar-menu">
            <li>
                <a href="#" class="navbar-link">
                     <li><?= Html::a('<i class="fa fa-cogs"></i> <span>'.Yii::t('app', 'Menu').'</span>', ['/site/index']); ?></li>
                </a>
            </li>
	<?php //if(Yii::$app->user->can('Configuration')) { 
		if($this->context->module->id == 'admin'){


		?>
		<li><?= Html::a('<i class="fa fa-cogs"></i> <span>'.Yii::t('app', 'Administracion').'</span>', ['/admin/default/index']); ?></li>
		<li class="treeview active">
			<ul class="treeview-menu">
				<li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i>Materiales',['/admin/materiales/index'])  ?>
	    </li>
			</ul>
		</li>
	  
	<?php }if($this->context->module->id == 'rights'){


		?>
		<li><?= Html::a('<i class="fa fa-cogs"></i> <span>'.Yii::t('app', 'Administracion').'</span>', ['/admin/default/index']); ?></li>
		<li class="treeview active">
			<ul class="treeview-menu">
				<li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i>Asignaciones',['/rights/assignment'])  ?>
	    </li>

	    	<li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i>Permisos',['/rights/permission'])  ?>
	    </li>

	    <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i>Roles',['/rights/role'])  ?>
	    </li>
			</ul>
		</li>
	  
	<?php }
	else{ 
	     ?>
	   <li><?= Html::a('<i class="fa fa-cogs"></i> <span>'.Yii::t('app', 'Configuración').'</span>', ['/default/index']); ?></li>
	   
 
         <li><?= Html::a('<i class="fa  fa-edit"></i> <span>Informe de Inventarios</span>', ['/admin/default/inventario/']);?></li>
        <li><?= Html::a('<i class="fa  fa-edit"></i> <span>Informe de Consumos</span>', ['/admin/default/instalaciones']);?></li>
        <li><?= Html::a('<i class="fa  fa-edit"></i> <span>Informe de uso de instalaciones </span>', ['/admin/default/consumos']);?></li>
        <li><?= Html::a('<i class="fa  fa-edit"></i> <span>Informe de Deseños Quimicos</span>', ['/admin/default/desechos']);?></li>
        <li><?= Html::a('<i class="fa  fa-edit"></i> <span>Informe de Material Dañado</span>', ['/admin/default/material']);?></li>

         <li><?= Html::a('<i class="fa  fa-edit"></i> <span>Graficos</span>', ['/admin/default/graficas']);?></li>
	   
		<?php } ?>
        </ul>

	<!-- sidebar-menu. -- End -->

    </section>

</aside>
