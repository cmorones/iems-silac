<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

      public function actionConsumos()
    {
        return $this->render('consumos');
    }


      public function actionInstalaciones()
    {
        return $this->render('instalaciones');
    }


      public function actionDesechos()
    {
        return $this->render('desechos');
    }


      public function actionMaterial()
    {
        return $this->render('material');
    }

        public function actionGraficas()
    {
        return $this->render('graficas');
    }



      public function actionInventario()
    {
       
              $data = new \yii\db\Query();
            $data ->select('*')
                ->from('inventario_lab')
                ->join('join','cat_matyreact', 'cat_matyreact.id = inventario_lab.id_catmat')
                ->where(['inventario_lab.id_plantel' => Yii::$app->user->identity->id_plantel]);
                //->andFilterWhere(['inventario_lab.id_periodo' => Yii::$app->user->identity->id_periodo]);

                // ->join('join','cat_matyreact', 'cat_matyreact.id = inventario_lab.id_catmat')
                
            $command = $data->createCommand();
            $listado = $command->queryAll();

           // print_r($listado);

        return $this->render('inventario', [
           // 'searchModel' => $searchModel,
            'listado' => $listado,
        ]);
    }

}
