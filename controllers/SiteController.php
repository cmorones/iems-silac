<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['index','logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex2()
    {
        if (\Yii::$app->user->isGuest)
        return $this->redirect(['site/login']);
        else {
        return $this->render('index');
        }
    }

    public function actionIndex()
    {
  
  // $this->layout = 'homePage';
    if (\Yii::$app->user->isGuest)
        return $this->redirect(['site/login']);
        else {
            
       // $isStudent = Yii::$app->session->get('stu_id');
       // $isEmployee = Yii::$app->session->get('emp_id');
       // $holidayData = \app\models\NationalHolidays::find()->andWhere(['is_status'=>0])->asArray()->all();
      /*  if(isset($isStudent)) {
            $payFees = Yii::$app->db->createCommand("SELECT SUM(fees_pay_tran_amount) FROM fees_payment_transaction WHERE fees_pay_tran_stu_id=:stuId AND is_status=:status")
                ->bindValues([
                        ':stuId' => Yii::$app->session->get('stu_id'),
                        ':status' => 0,
                    ])
                ->queryScalar();
            $currentFeesData = \app\modules\fees\models\FeesPaymentTransaction::getUnpaidTotal($isStudent);
                return $this->render('stu-dashboard', ['holidayData'=>$holidayData, 'currentFeesData'=>$currentFeesData, 'payFees'=>$payFees]);
        }*/
       // else if(isset($isEmployee))
            return $this->render('silac-dashboard');
        //else
        //    return $this->render('user-dashboard', ['holidayData'=>$holidayData]);
    }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
       
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
