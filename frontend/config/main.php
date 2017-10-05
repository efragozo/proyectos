<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

//obtener host para configurar prettyurl
use \yii\web\Request;
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());
$baseUrl2 = str_replace('/backend/web', '', (new Request)->getBaseUrl());

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'language' => 'es',
    'bootstrap' => ['log'],
    'defaultRoute' => 'site/index',
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ]
    ],
    'components' => [
        //Inicio codigo externo integracion ADMINLTE
        'view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@frontend/views'//'@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                 ],
             ],
        ],
        'assetManager' => [
        'bundles' => [
            'dmstr\web\AdminLteAsset' => [
                'skin' => 'skin-green',
                ],
            'class'=>'yii\web\AssetManager',
            'insolita\wgadminlte\ExtAdminlteAsset'=>[
                'depends'=>[
                    'yii\web\YiiAsset',
                    'path\to\AdminLteAsset',
                    'insolita\wgadminlte\JsCookieAsset'
                ]
            ],
            'class'=>'yii\web\AssetManager',
            'insolita\wgadminlte\JsCookieAsset'=>[
                'depends'=>[
                    'yii\web\YiiAsset',
                    'path\to\AdminLteAsset'
                ]
            ],
            
            ],            
                   
        ],     
        //Fin codigo externo integracion ADMINLTE
        'request' => [
            'csrfParam' => '_csrf-frontend',
             'baseUrl'    =>  $baseUrl
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
             //urlFormat => 'path',
            'baseUrl'    =>   $baseUrl,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                //Aquí­ agregas las url amigables, atribuir la direccion de la vista
               'index'          => 'site/index',  
               'hola-eder'      => 'site/holaeder',
               'ingreso-frontend' => 'site/login',
               'salida'         => 'site/logout',
               'tipo-usuario'  => 'tipousuario',
               'tipo-usuario-nuevo' => 'tipousuario/create',
               'request-password-reset' => 'site/requestPasswordResetToken',
               'signup' => 'site/signup',
               'proyectos-uno' => 'proyectos/',
               'entregables' => 'entregables',
               'usuarios'=>'user',
               
            ],
        ],
    ],
    'params' => $params,
];
