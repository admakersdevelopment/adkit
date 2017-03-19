<?php

namespace app\controllers;

use Yii;
use app\models\Specsheets;
use app\models\SpecsheetsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SpecsheetsController implements the CRUD actions for Specsheets model.
 */
class SpecsheetsController extends Controller
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
     * Lists all Specsheets models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SpecsheetsSearch();
        $queryParams = array_merge(array(),Yii::$app->request->getQueryParams());
        $queryParams["SpecsheetsSearch"]["is_not_archived"] = 1;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewChevrolet()
    {
        $searchModel = new SpecsheetsSearch();
        $queryParams = array_merge(array(),Yii::$app->request->getQueryParams());
        $queryParams["SpecsheetsSearch"]["category_ref"] = 1;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('view-chevrolet', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewOpel()
    {
        $searchModel = new SpecsheetsSearch();
        $queryParams = array_merge(array(),Yii::$app->request->getQueryParams());
        $queryParams["SpecsheetsSearch"]["category_ref"] = 2;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('view-opel', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewIsuzu()
    {
        $searchModel = new SpecsheetsSearch();
        $queryParams = array_merge(array(),Yii::$app->request->getQueryParams());
        $queryParams["SpecsheetsSearch"]["category_ref"] = 3;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('view-isuzu', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewArchived()
    {
        $searchModel = new SpecsheetsSearch();
        $queryParams = array_merge(array(),Yii::$app->request->getQueryParams());
        $queryParams["SpecsheetsSearch"]["status_ref"] = 3;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('view-archived', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Specsheets model.
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
     * Creates a new Specsheets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Specsheets();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->thumbnail = UploadedFile::getInstance($model, 'thumbnail');
            $model->date_created = date('Y-m-d');

            if ( $model->validate() && $model->save()) {
                if ( $model->upload_specsheet()) { 
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            }else{
                return $this->render('create', [
                    'model' => $model,
                ]); 
            }
        }else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Specsheets model.
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
     * Deletes an existing Specsheets model.
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
     * Finds the Specsheets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Specsheets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Specsheets::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
