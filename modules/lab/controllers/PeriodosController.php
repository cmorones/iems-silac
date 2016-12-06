<?php

namespace app\modules\lab\controllers;


use Yii;
use app\modules\dashboard\models\Events;
use app\modules\dashboard\models\EventsSearch;
use yii\web\Controller;

/**
 * Default controller for the `docente` module
 */
class PeriodosController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
       $id_plantel = Yii::$app->user->identity->id_plantel;
       $id_profesor = Yii::$app->user->identity->id_profesor;
        $actCourseData = \app\modules\docente\models\CatPeriodos::find()->where(['status'=>1])->all();
        return $this->render('index', [
            'actCourseData' => $actCourseData,
                    ]);
    }

    
}