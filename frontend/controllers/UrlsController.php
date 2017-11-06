<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Urls;
use frontend\models\UrlsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\bootstrap\ActiveForm;
use yii\filters\VerbFilter;
use frontend\models\Proyectos;

/**
 * UrlsController implements the CRUD actions for Urls model.
 */
class UrlsController extends Controller
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
     * Lists all Urls models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UrlsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Urls model.
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
     * Creates a new Urls model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {    
        $model = new Urls();
        
        $ruta = Yii::getAlias('@root').'/uploads/';
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
        //Traemos el modelo de proyectos
        $proyecto = Proyectos::findOne($id);
            //         echo'<pre>';
            //         print_r($proyecto);
            //         exit();
        if ($model->load(Yii::$app->request->post())) {
            
            
             $archivo = UploadedFile::getInstance($model, 'urlproyecto');
             
             if(!is_null($archivo)){
                 $resultado = $this->uploadFile($ruta, $archivo, $model, $proyecto);
                 //Indicamos la accion que vamos a hacer en el modelo de proyectos
                 $resultado['proyecto']->update();
                 
             }
             
             $resultado['model']->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'id' => $id
            ]);
        }
    }

    private function uploadFile($ruta,$archivo ,$model, $proyecto)
    {
        
        $archivo->name = 'CRONOGRAMA-'.$model->proyecto.'.'.$archivo->extension;
        $model->urlproyecto = $archivo->name;       
        $archivo->saveAs($ruta.$archivo);
        //en el modelo de proyectos le decimos que haga una actualizacion de los datos y el campo cronograma le ponga 1
        $proyecto->cronograma = 1;
        
        return array('model' => $model, 'proyecto' => $proyecto);
    }
    /**
     * Updates an existing Urls model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $ruta = Yii::getAlias('@frontHome').'/uploads/';
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            
            $archivo = UploadedFile::getInstance($model, 'urlproyecto');
            
            /*Esta validacion permite ver si hay archivo*/
            if(!is_null($archivo)){
                $this->uploadFile($ruta, $archivo, $model);
            }
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'id' => $id
            ]);
        }
    }

    /**
     * Deletes an existing Urls model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionUpload()
    {
        $model = new Urls;        
        if (Yii::$app->request->isPost) {
           $archivo = UploadedFile::getInstance($model, 'urlproyecto');
           print_r($archivo);
           exit();
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }
        
        return $this->render('upload', ['model' => $model]);
    }

    /**
     * Finds the Urls model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Urls the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Urls::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
