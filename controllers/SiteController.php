<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ForgotPasswordForm;
use app\models\Users;

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
                        'actions' => ['logout'],
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
    public function actionIndex()
    {
        return $this->render('index');
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
     * Forgot Password action.
     *
     * @return string
     */
    public function actionForgotPassword()
    {

        $model = new ForgotPasswordForm();
        if ($model->load(Yii::$app->request->post())) {

            //if username exists send new password else send error message
            if($model->validateUsername()){
                $userModel = Users::find()
                ->where(['username' => $model->username])
                ->one();

                $password =  Yii::$app->getSecurity()->generateRandomString ( $length = 15 );
                $encryptPassword = sha1($password);
                $userModel->password = $encryptPassword;
                $userModel->save();


                $html = "
                <p>Dear ".$userModel->name." ".$userModel->surname."</p>
                <p>These are your new login details: <br>Username: ".$userModel->username."<br>Password: ".$password."</p>
                <p>Kind Regards<br>The Adkit Team</p>
                ";    
                $sent =  Yii::$app->mailer->compose()
                ->setFrom('from@domain.com')
                ->setTo('ally@newby.co.za')
                ->setSubject('Forgot Password')
                ->setHtmlBody($html)
                ->send();
                \Yii::$app->getSession()->setFlash('success', 'An email has been sent with your new login details.');
                return $this->redirect(['index']);
                
            }else{
                \Yii::$app->getSession()->setFlash('danger', 'Username does not exist.');
            }
            
        }
        return $this->render('forgot', [
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
