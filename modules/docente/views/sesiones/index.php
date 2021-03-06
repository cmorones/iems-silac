<?php
use yii\helpers\Html;
use app\modules\docente\models\ConsumoMateriales;
/*use app\modules\student\models\StuMaster;
use \app\modules\course\models\Batches;
$this->title = Yii::t('course', 'Manage Course Modules');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(".disp-count{cursor:default;} .disp-count:hover {background-color:none !important}");*/

?>


<div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title"><i class="fa fa-graduation-cap"></i> <?php echo Yii::t('app', 'Listado de Sesiones y Grupos Activas'). " semestre $nombre"; ?></h3>
	</div><!-- /.box-header -->
	<div class="box-body">
	<?php if(!empty($actCourseData)) : ?>
	  <div id="accordion" class="box-group">

	  <?php foreach($actCourseData as $ck=>$cv) :


 if ($cv->is_status==0) {
 	$estado ="<span class=\"btn btn-sm btn-warning disp-count\"><i class=\"fa fa-check\"></i>Activo</span>";
 }elseif ($cv->is_status==1) {
 	$estado ="<span class=\"btn btn-sm btn-success disp-count\"><i class=\"fa fa-check\"></i>Cerrado</span>";
 }elseif ($cv->is_status==2) {
 	$estado ="<span class=\"btn btn-sm btn-danger disp-count\"><i class=\"fa  fa-close\"></i>Cerrado fuera de tiempo</span>";
 }



	   ?>
	    <div class="panel box box-default">
	      <div class="box-header with-border">
		<h4 class="box-title">
		  <?= Html::a(($ck+1).'. '.'Grupo:'.$cv->id_grupo. '-'.$cv->event_title.' del '.$cv->event_start_date.' al '.$cv->event_end_date, '#collapse'.$ck, ['data-parent'=>'#accordion', 'data-toggle'=>'collapse', 'aria-expanded'=>"true", 'style'=>'color:#3c8dbc']) ?>

		</h4>

		<div class="<?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'; ?> box-tools">
		
		    <span class="btn btn-sm btn-info disp-count">
			<i class="fa fa-users"></i> <?php echo Yii::t('app', 'Materiales'); ?> &nbsp;
			<span class="badge">
				<?= ConsumoMateriales::find()->where(['<>', 'estado', 0])->andWhere(['id_sesion'=>$cv->event_id])->count() ?>
			</span>
		    </span>
		     

		     <span class="btn btn-sm btn-primary disp-count">
			<i class="fa fa-sitemap"></i> <?php echo Yii::t('app', 'Autorizados'); ?> &nbsp;
			<span class="badge">
				<?= ConsumoMateriales::find()->where(['estado'=>2])->andWhere(['id_sesion'=>$cv->event_id])->count() ?>
			</span>
		    </span>

		    <?=$estado?>


		   <?php if ($cv->is_status==2) { ?>
		   
		    <?php 
				}else{
			?>
				 <?= Html::a('<i class="fa fa-pencil-square-o"></i>', ['seg', 'id'=>$cv->event_id], ['class'=>'btn-sm btn btn-default', 'title'=>Yii::t('app', 'Segumiento de Sesion')]) ?>
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

