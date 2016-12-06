<?php


namespace app\modules\lab\controllers;

use Yii;

use app\modules\lab\models\Events;
use yii\web\Controller;

/**
 * Default controller for the `lab` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
      public function actionIndex($id,$nombre)
    {
        $id_plantel = Yii::$app->user->identity->id_plantel;
        $actCourseData = \app\modules\dashboard\models\Events::find()->where(['id_periodo' => $id])->andWhere(['is_status'=>0])->andWhere(['id_plantel' => $id_plantel])->all();
        return $this->render('index', [
            'actCourseData' => $actCourseData,
                    ]);
    }

        public function actionSeg($id)
    {
        //$actCourseData = \app\modules\dashboard\models\Events::find()->where(['is_status'=>0])->all();

        if(isset($_POST['update'])){

         print_r($_POST['qty']);

         foreach ($_POST['qty'] as $idc=>$valor){ 
          $sql="UPDATE consumo_lab SET cantidad='$valor' WHERE id='$idc'"; 
            \Yii::$app->db ->createCommand($sql)->execute();
          }  

          
          if(isset($_POST['validar'])){
             
            foreach ($_POST['validar'] as $removeid) {
             $update = "UPDATE consumo_lab SET estado=2 where id=$removeid";

             \Yii::$app->db ->createCommand($update)->execute();
            }
          }
        }


        return $this->render('seg', [
            'id' => $id,
                    ]);
    }

       public function actionCierre()
    {
        $id_plantel = Yii::$app->user->identity->id_plantel;
        $actCourseData = \app\modules\dashboard\models\Events::find()->where(['is_status'=>0])->andWhere(['id_plantel' => $id_plantel])->all();
        return $this->render('cierre', [
            'actCourseData' => $actCourseData,
                    ]);
    }

     public function actionCerrar($id)
    {
        //$actCourseData = \app\modules\dashboard\models\Events::find()->where(['is_status'=>0])->all();

        if(isset($_POST['update'])){

         $sql2="UPDATE events SET poblacion_esperada='$_POST[poblacion_esperada]', poblacion_atendida='$_POST[poblacion_atendida]' WHERE event_id='$id'"; 
            \Yii::$app->db ->createCommand($sql2)->execute();

         foreach ($_POST['qty'] as $idc=>$valor){ 
          $sql="UPDATE consumo_lab SET cantidad='$valor' WHERE id='$idc'"; 
            \Yii::$app->db ->createCommand($sql)->execute();
          }  

          
          if(isset($_POST['cerrar'])){
             
            foreach ($_POST['cerrar'] as $removeid) {
             $update = "UPDATE consumo_lab SET estado=3 where id=$removeid";

             \Yii::$app->db ->createCommand($update)->execute();
            }
          }
        }


        return $this->render('cerrar', [
            'id' => $id,
                    ]);
    }


}
