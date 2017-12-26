<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Clientes;
use frontend\models\Modalidadproy;
use frontend\models\Proyectos;
use frontend\models\ProyectosSearch;
use frontend\models\Tiposproyectos;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use frontend\models\Urls;

/**
 * ProyectosController implements the CRUD actions for Proyectos model.
 */
class ProyectosController extends Controller
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
     * Lists all Proyectos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProyectosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Proyectos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $cronograma = Urls::find()->where(['proyecto' => $model->id])->one();
        // $tipoUser = Tipousuario::find()->select('descripcion')->where(['id'=>$idUser])->one()->descripcion;
        /*$cronograma2=Proyectos::findOne($model->id)->cronograma;
        print_r($cronograma2);*/
        return $this->render('view', [
            'model' => $model,
            'cronograma' => $cronograma
        ]);
    }

    /**
     * Creates a new Proyectos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Proyectos();
    
        $dataTproy = ArrayHelper::map(Tiposproyectos::find()->all(), 'id', 'tipo');

        $dataCli = ArrayHelper::map(Clientes::find()->all(), 'id', 'nombreCli');
        
        $dataModalidad = ArrayHelper::map(Modalidadproy::find()->all(), 'ccof', 'modalidad');
        
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'dataTproy' => $dataTproy,
                'dataCli' => $dataCli,
                'dataModalidad' => $dataModalidad
            ]);
        }
    }

    /**
     * Updates an existing Proyectos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dataTproy = ArrayHelper::map(Tiposproyectos::find()->all(), 'id', 'tipo');
        
        $dataCli = ArrayHelper::map(Clientes::find()->all(), 'id', 'nombreCli');
        
        $dataModalidad = ArrayHelper::map(Modalidadproy::find()->all(), 'ccof', 'modalidad');

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
                'dataTproy' => $dataTproy,
                'dataCli' => $dataCli,
                'dataModalidad' => $dataModalidad
            ]);
        }
    }
    
    public function actionUpdate1($id)
    {
        $model = $this->findModel($id);
        
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('update1', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionUpdate2($id)
    {
        $model = $this->findModel($id);
        
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('update2', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionUpdate3($id)
    {
        $model = $this->findModel($id);
        
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
            } else {
            return $this->renderAjax('update3', [
                'model' => $model,
            ]);
        }
    }
    /* Con esta funcion usamos o actualizamos la fecha de solicitud unicamente */
    public function actionUpdate4($id)
    {
        $model = $this->findModel($id);
        
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('update4', [
                'model' => $model,
            ]);
        }
    }
    
    /* Con esta funcion usamos o actualizamos la fecha de solicitud unicamente */
    public function actionUpdate_imp_cronograma($id)
    {
        $model = $this->findModel($id);
        
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('update_imp_cronograma', [
                'model' => $model,
            ]);
        }
    }

    /* Con esta funcion usamos o actualizamos fin de proyecto aqui finalizamos el proyecto */
    public function actionUpdate_fin_proyecto($id)
    {
        $model = $this->findModel($id);
        
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('update_fin_proyecto', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Deletes an existing Proyectos model.
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
     * Finds the Proyectos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Proyectos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Proyectos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
