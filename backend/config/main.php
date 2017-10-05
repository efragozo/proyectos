<?php
header('Content-Type: text/html; charset=utf-8');
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        //Inicio codigo externo integracion ADMINLTE
        'view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@backend/views'//'@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                 ],
             ],
        ],
        
        'assetManager' => [
        'bundles' => [
            'dmstr\web\AdminLteAsset' => [
                'skin' => 'skin-green',
                ],
            ],
            
            'class'=>'yii\web\AssetManager',
            'bundles'=>[
                //--------
                'skin' => 'skin-green',
                'insolita\wgadminlte\ExtAdminlteAsset'=>[
                    'depends'=>[
                        'yii\web\YiiAsset',
                        'path\to\AdminLteAsset',
                        'insolita\wgadminlte\JsCookieAsset'
                    ]
                ],
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
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                
                //Si la vista se encuentra por fuera de la carpeta Site
                //esto corresponde a un render parcial
                
                'index'  => 'site/index',
                'ingreso' => 'site/login',
                'saludo' => 'site/saludo',
                'registro-admin' => 'site/signup',
                
                
               
              
                
            ],
        ],
    ],
    'params' => $params,
];
