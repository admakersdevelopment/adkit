<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\UserGroups;
use app\models\LinkUserGroups;
use app\models\UsersSearch;
use app\models\UserGroupsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $searchModelUserGroups = new UserGroupsSearch();
        $dataProviderUserGroups = $searchModelUserGroups->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModelUserGroups' => $searchModelUserGroups,
            'dataProviderUserGroups' => $dataProviderUserGroups,
        ]);
    }

    public function actionAddNewGroup() {
        $model = new UserGroups();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }elseif (Yii::$app->request->isAjax) {
            return $this->renderAjax('_user_groups_form', [
                'model' => $model
            ]);
        } else {
            return $this->render('_form', [
                'model' => $model
            ]);
        }
    }

    public function actionLinkGroup($id) {
        $model = new LinkUserGroups();
        if ($model->load(Yii::$app->request->post()) ) {
            $model->user_id = $id;
            if($model->validate() && $model->save()){
                return $this->redirect(['view', 'id' => $id]);    
            }var_dump($model); die();
        }elseif (Yii::$app->request->isAjax) {
            return $this->renderAjax('_link_user_groups_form', [
                'model' => $model
            ]);
        } else {
            return $this->render('_form', [
                'model' => $model
            ]);
        }
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->password = sha1('admin');
            if($model->save()){
                // mail('ally@newby.co.za','subject','message');/
                Yii::$app->mailer->compose()
                 ->setFrom('ally@newby.co.za')
                 ->setTo('ally@newby.co.za')
                 ->setSubject('Message subject')
                 ->setHtmlBody('<b>HTML content</b>')
                ->send();
                /*if(
                Yii::$app->mailer->compose()
                ->setFrom('ally@newby.co.za')
                ->setTo('ally@newby.co.za')
                ->setSubject('Message subject')
                ->setHtmlBody('<b>HTML content</b>')
                ->send()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }*/
                var_dump('here'); die();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
