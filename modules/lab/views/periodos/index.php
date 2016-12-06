<?php
use yii\helpers\Html;
//use app\modules\docente\models\ConsumoMateriales;
use app\modules\dashboard\models\Events;
/*use app\modules\student\models\StuMaster;
use \app\modules\course\models\Batches;
$this->title = Yii::t('course', 'Manage Course Modules');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(".disp-count{cursor:default;} .disp-count:hover {background-color:none !important}");*/
$id_plantel = Yii::$app->user->identity->id_plantel;
$id_profesor = Yii::$app->user->identity->id_profesor;
?>


<div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title"><i class="fa fa-graduation-cap"></i> <?php echo Yii::t('app', 'Seleccionar Periodo'); ?></h3>
	</div><!-- /.box-header -->
	<div class="box-body">
	<?php if(!empty($actCourseData)) : ?>
	  <div id="accordion" class="box-group">

	  <?php foreach($actCourseData as $ck=>$cv) :


 if ($cv->status==0) {
 	$estado ="<span class=\"btn btn-sm btn-warning disp-count\"><i class=\"fa fa-check\"></i>Activo</span>";
 }elseif ($cv->status==1) {
 	$estado ="<span class=\"btn btn-sm btn-success disp-count\"><i class=\"fa fa-check\"></i>Activo</span>";
 }elseif ($cv->status==2) {
 	$estado ="<span class=\"btn btn-sm btn-danger disp-count\"><i class=\"fa  fa-close\"></i>Cerrado</span>";
 }



	   ?>
	    <div class="panel box box-default">
	      <div class="box-header with-border">
		<h4 class="box-title">
		  <?= Html::a(($ck+1).'. '.'Periodo: '. $cv->nombre, '#collapse'.$ck, ['data-parent'=>'#accordion', 'data-toggle'=>'collapse', 'aria-expanded'=>"true", 'style'=>'color:#3c8dbc']) ?>

		</h4>

		<div class="<?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'; ?> box-tools">
		
		   <span class="btn btn-sm btn-info disp-count">
			<i class="fa fa-users"></i> <?php echo Yii::t('app', 'Sesiones'); ?> &nbsp;
			<span class="badge">
				<?= Events::find()->where(['id_periodo'=>$cv->secuencia])->andWhere(['id_profesor'=>$id_profesor])->andWhere(['id_plantel' => $id_plantel])->andWhere(['is_status' =>0])->count() ?>
			</span>
		    </span>
		     
<!--
		     <span class="btn btn-sm btn-primary disp-count">
			<i class="fa fa-sitemap"></i> <?php echo Yii::t('app', 'Autorizados'); ?> &nbsp;
			<span class="badge">
				<?//= ConsumoMateriales::find()->where(['estado'=>2])->andWhere(['id_sesion'=>$cv->id])->count() ?>
			</span>
		    </span>-->

		    <?=$estado?>


		   <?php if ($cv->status==2) { ?>
		   
		    <?php 
				}else{
			?>
				 <?= Html::a('<i class="fa fa-pencil-square-o"></i>', ['/lab', 'id'=>$cv->secuencia, 'nombre'=>$cv->nombre], ['class'=>'btn-sm btn btn-default', 'title'=>Yii::t('app', 'Segumiento de Sesion')]) ?>
			<?php
				}
			?>
		 
                </div>

	      </div>

	    
	    </div><!-- /.panel box -->
	<?php endforeach; ?>
	  </div><!-- /.box-group -->

	<?php else : ?>
		<div class="alert alert-danger">No tienes registradas sessiones de laboratorio</div>
	<?php endif; ?>
	</div>
</div>
