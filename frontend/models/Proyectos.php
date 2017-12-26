<?php

namespace frontend\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "proyectos".
 *
 * @property integer $id
 * @property string $nombreProyecto
 * @property integer $idCliente
 * @property string $fechaCreado
 * @property string $fechaFinInterna
 * @property string $fechaFin
 * @property integer $tipoProyecto
 * @property string $centroCosto
 * @property integer $ccof
 * @property integer $imprcronograma
 * @property integer $cronograma
 * @property integer $entregables
 * @property integer $finalizado
 * @property string $fechaSolic
 * @property string $rehabilitado
 */
class Proyectos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyectos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCliente'], 'integer'],
            [['tipoProyecto', 'ccof', 'imprcronograma', 'cronograma', 'entregables', 'finalizado'], 'integer'],
            [['fechaCreado', 'fechaFinInterna', 'fechaFin', 'fechaSolic', 'rehabilitado','costo'], 'safe'],
            [['tipoProyecto'], 'required',  'message' => 'Este campo es requerido'],
            [['idCliente'], 'required',  'message' => 'Este campo es requerido'],
            [['nombreProyecto'], 'required',  'message' => 'Este campo es requerido'],
            [['nombreProyecto'], 'string','max' => 200, 'min' => 2],
            [['centroCosto'], 'string', 'max' => 50],
            [['centroCosto'], 'required', 'message' => 'Este campo es requerido'],
            [['ccof'], 'required',  'message' => 'Este campo es requerido'],
            [['costo'], 'required',  'message' => 'Este campo es requerido'],
        ];
    }

    public function behaviors()
    {
        return [
            
                 [
                    'class' => AttributeBehavior::className(),
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => 'cronograma',
                       
                    ],
                    'value' => function () {
                    
                    return 0;
                    },
                 ],
             
            
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
        {
            return [
                'id' => 'ID',
                'nombreProyecto' => 'Nombre del Proyecto',
                'idCliente' => 'ClÃ­ente',
                'fechaCreado' => 'Fecha CreaciÃ³n',
                'fechaFinInterna' => 'Fecha Fin Interna',
                'fechaFin' => 'Fecha Fin',
                'tipoProyecto' => 'Tipo Proyecto',
                'centroCosto' => 'Centro Costo',
                'costo' => 'Costo del proyecto',
                'ccof' => 'Tipo de Modalidad',
                'imprcronograma' => 'Cronograma Impreso',
                'cronograma' => 'Cronograma',
                'entregables' => 'Entregables',
                'finalizado' => 'Estado',
                'fechaSolic' => 'Fecha Orden de Inicio',
                'rehabilitado' => 'Reactivar Proyecto',
            ];
        }
        
        /* Creamos las relaciones de este modelo */
        /* public function relations()
        {
            /*
            return array(
            'clientes' => array(self::HAS_ONE, 'clientes', 'idCliente')                
            );
         } */
        
        public function getClientes()
        {
            return $this->hasOne(Clientes::className(),['id'=>'idCliente']);
        }
    /* *
     * @inheritdoc
     * @return ProyectosQuery the active query used by this AR class.
     */
        /*Creamos una funcion para reemplazar el codigo 1 o 0 por una palabra, nos dirá si esta impreso el cronograma o no
         * */
        public function imprimeCronograma($data)
        {
            if ($data==1)
            {
                return ('Impreso');
            }
            else {
                return ('No Impreso');
            }
        }
        /*Fin de la función*/
        /*Creamos una funcion para reemplazar el codigo 1 o 0 por una palabra, nos dirá si el proyecto esta activo o finalizado
         * */
        public function proyectoFinalizado($data)
        {
            if ($data==1)
            {
                return ('Entregado');
                }
                else {
                return ('Activo');
            }
        }
        /*Fin de la función*/
    public static function find()
    {
        return new ProyectosQuery(get_called_class());
    }
    
    public function beforeAction($action){
        $this->layout="@frontend/views/layouts/main";
        return 
        parent::beforeAction($action);
    }
}
