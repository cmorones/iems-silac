<?php

namespace app\modules\docente\controllers;


use Yii;
use app\modules\dashboard\models\Events;
use app\modules\dashboard\models\EventsSearch;
use yii\web\Controller;

/**
 * Default controller for the `docente` module
 */
class SesionesController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($id,$nombre)
    {
       $id_plantel = Yii::$app->user->identity->id_plantel;
       $id_profesor = Yii::$app->user->identity->id_profesor;
        $actCourseData = \app\modules\dashboard\models\Events::find()->where(['id_profesor'=>$id_profesor])->andWhere(['id_periodo' => $id])->andWhere(['id_plantel' => $id_plantel])->andWhere(['is_status' =>0])->all();
        return $this->render('index', [
            'actCourseData' => $actCourseData,
            'id'=>$id,
            'nombre'=>$nombre
                    ]);
    }

      public function actionSeg($id)
    {
        //$actCourseData = \app\modules\dashboard\models\Events::find()->where(['is_status'=>0])->all();

        if(isset($_POST['update'])){

         //print_r($_POST['qty']);

        /* 
            pobacion_esperada
            pobacion_atendida
        */

       

         foreach ($_POST['qty'] as $idc=>$valor){ 
          $sql="UPDATE consumo_lab SET cantidad='$valor' WHERE id='$idc'"; 
            \Yii::$app->db ->createCommand($sql)->execute();
          }  

          
          if(isset($_POST['remove'])){
             
            foreach ($_POST['remove'] as $removeid) {
             $delete = "Delete from consumo_lab where id=$removeid";

             \Yii::$app->db ->createCommand($delete)->execute();
            }
          }
        }


        return $this->render('seg', [
            'id' => $id,
                    ]);
    }

}