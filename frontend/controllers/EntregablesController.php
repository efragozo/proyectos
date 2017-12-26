<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Entregables;
use frontend\models\EntregablesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\models\User;
use frontend\models\Proyectos;
use yii\web\UploadedFile;

/**
 * EntregablesController implements the CRUD actions for Entregables model.
 */
class EntregablesController extends Controller
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
     * Lists all Entregables models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new EntregablesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionIndex2()
    {
        $searchModel = new EntregablesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, null);
        
        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    

    /**
     * Displays a single Entregables model.
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
     * Creates a new Entregables model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        
        $proyecto  = Proyectos::find();
        

        $listaProyectos = ArrayHelper::map($proyecto->all(), 'id', 'nombreProyecto');
        
//         print_r($listaProyectos);
//         exit();
        $model = new Entregables();
        $dataUsuario = ArrayHelper::map(User::find()->all(), 'username', function($model, $defaultValue) {
            return $model['first_name'].' '.$model['last_name'];
        });
       $dataProyecto = ArrayHelper::map(Proyectos::find()->all(), 'id', 'nombreProyecto');
        
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $proyecto = $proyecto->where(['id' => $id])->one();
            $proyecto->entregables = 1;
            
            if($model->save()){
                $proyecto->update();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'dataUsuario' => $dataUsuario,
                'dataProyecto' => $dataProyecto,
                'proyecto' => $proyecto->where(['id' => $id])->one(),
                'listaProyectos' => $listaProyectos
            ]);
        }
    }
    
    /**
     * Creates a new Entregables model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate2($id)
    {
        
        $model = new Entregables();
        $dataUsuario = ArrayHelper::map(User::find()->all(), 'username', function($model, $defaultValue) {
            return $model['first_name'].' '.$model['last_name'];
        });
            $dataProyecto = ArrayHelper::map(Proyectos::find()->all(), 'id', 'nombreProyecto');
            
            if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
                Yii::$app->response->format = 'json';
                return ActiveForm::validate($model);
            }
            
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->renderAjax('create2', [
                    'model' => $model,
                    'dataUsuario' => $dataUsuario,
                    'dataProyecto' => $dataProyecto,                    
                ]);
            }
    }
    
    public function actionCreateExcel()
    {
        $envio = array();
        $model = new Entregables();
        
        $excel = UploadedFile::getInstance($model, 'excel');
        
        if(Yii::$app->request->post()){
             
            if(!is_null($excel)){
                $ruta = Yii::getAlias('@root') . '/common/entregables/';
                $excel->name = 'entregables' . '.' . $excel->extension;
                $excel->saveAs($ruta . $excel);  
//                echo'<pre>';
//                print_r($this->validaExcelEntregables($excel, $ruta));
//                exit();
                $envio = $this->validaExcelEntregables($excel, $ruta);
                
                
            } else {
                print_r('no hay na');
                exit();
            }
            
        }
        
        return $this->render('create-excel', [
            'model' => $model,
            'envio' => (count($envio)==0) ? null : $envio,
        ]);
    }

    private function validaExcelEntregables($excel,$ruta)
    {
        
        $inputFile = $ruta . $excel;
        $erroresEncontrados = array();
        $duplicacionEntregables = array();
        try {
            $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
            $objectReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objectPHPExcel = $objectReader->load($inputFile);
        } catch (Exception $e) {
            die('error');
        }
        
        $hojaEntregables = $objectPHPExcel->getSheet(0);
        $highestRow = $hojaEntregables->getHighestRow();
        $highestColumn = $hojaEntregables->getHighestColumn(); 
        
        
        for ($row = 2; $row <= $highestRow; $row ++) {
            $rowData = $hojaEntregables->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, true, FALSE);
            /*Validar si hay duplicacion de codigo en el excel archivo*/
            
            if(in_array($rowData[0][1], $duplicacionEntregables)){
                array_push($erroresEncontrados, 'Existe duplicacion de datos en la plantilla. Fila:'.$row);                
            } else {
                array_push($duplicacionEntregables, $rowData[0][1]);
            }
            
            /*Validar en la base de datos codigo*/
            $entregables = Entregables::find()
                            ->where(['codigo' => $rowData[0][1]])
                            ->one();
            if(count($entregables) !=0) {
                 array_push($erroresEncontrados, 'Este registro existe en la base de datos. Fila: '.$row);
            }
            
            /*validar campos vacios en el excel*/
            if(
                empty($rowData[0][0])|| 
                empty($rowData[0][1])||
                empty($rowData[0][2])||
                empty($rowData[0][3])||
                empty($rowData[0][4])||
                empty($rowData[0][5]))
             {
                array_push($erroresEncontrados, 'Existen campos vacíos en esta fila. Fila: '.$row);
             }
            
         
        }          
        /*valida subida de excel*/
        return $this->subidaExcelEntregables($rowData, $erroresEncontrados, $highestRow, $highestColumn, $hojaEntregables);
    }   
    
    protected function subidaExcelEntregables($rowData, $erroresEncontrados, $highestRow, $highestColumn, $hojaEntregables)
    {
        if(count($erroresEncontrados) == 0){
             for ($row = 2; $row <= $highestRow; $row ++) {
                     $rowData = $hojaEntregables->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, true, FALSE);
                        $model = new Entregables();
                        $model->idProyecto = $rowData[0][0];
                        $model->codigo = $rowData[0][1];
                        $model->nombre = $rowData[0][2];
                        $model->categoria = $rowData[0][3];
                        $model->usuario = $rowData[0][4];
                        $model->revisor = $rowData[0][5];
                        $model->save();
                        
                    }
        } else {
            return $erroresEncontrados;
        }
    }        
    /********************************************************************************
     * Updates an existing Entregables model.                                       *
     * If update is successful, the browser will be redirected to the 'view' page.  *
     * @param integer $id                                                           *
     * @return mixed                                                                *
     *******************************************************************************/
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dataUsuario = ArrayHelper::map(User::find()->all(), 'username', function($model, $defaultValue) {
            return $model['first_name'].' '.$model['last_name'];
        });
        $dataProyecto = ArrayHelper::map(Proyectos::find()->all(), 'id', 'nombreProyecto');

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
                'dataUsuario' => $dataUsuario,
                'dataProyecto' => $dataProyecto
            ]);
        }
    }
    /* creamos el update de aceptar entregable */
    public function actionUpdate_aceptar($id)
    {
        $model = $this->findModel($id);
                    
            if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
                Yii::$app->response->format = 'json';
                return ActiveForm::validate($model);
            }
            
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->renderAjax('update_aceptar', [
                    'model' => $model,                    
                ]);
            }
    }
    
    /* creamos el update de devolver el entregable */
    public function actionUpdate_devolver($id)
    {
        $model = $this->findModel($id);
        
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('update_devolver', [
                'model' => $model,
            ]);
        }
    }

     /**************************************************************************************
     * Deletes an existing Entregables model.                                              *
     * If deletion is successful, the browser will be redirected to the 'index' page.      *
     * @param integer $id                                                                  *
     * @return mixed                                                                       *
     **************************************************************************************/
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Entregables model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Entregables the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Entregables::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
