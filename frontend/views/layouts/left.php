<?php
use frontend\models\Tipousuario;
use frontend\models\Permisos;
use yii\helpers\ArrayHelper;
?>
<aside class="main-sidebar">

    <section class="sidebar" style="height: auto;">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/advanced/frontend/web/images/user.gif" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <!-- mostramos el usuario logueado, con los echos solo usamos codigo html dentro de php -->
                <?php if(!Yii::$app->user->isGuest){
                     echo '<p>';
                     print_r( Yii::$app->user->identity->username);
                     echo '</p>';
                     echo '<a href="#"><i class="fa fa-circle text-success"></i> Online</a>';
                    } else 
                        {
                        echo '<p>';
                        echo '</p>';
                        echo '<a href="#"><i class="fa fa-circle text-error"></i> Offline</a>';
                    }
                 ?>               
            </div>
        </div>

       <!-- search form -->
       <!--  <form action="#" method="get" class="sidebar-form">
             <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <!-- en estas lineas de codigo, lo que se hace es validar que el usuario este logueado, ademas traemos el tipo de usuario 
        de la tabla user, y con base a eso imprimimos un menu en este caso si el tipo de usuario es 1 o 2 mostrara el menu de lo contrario
        no mostrará nada -->
         <?php if(!Yii::$app->user->isGuest){ 
             /* guardamos el id del usuario logueado */
             $usuarioid = Yii::$app->user->identity->id;
             /* Consulta con menor igual que $rol = Permisos::find()->select('rol')->where(['idusuario' => $usuarioid]) ->andWhere(['AND','rol' <= 3])-> one()->rol; */
             $rol = Permisos::find()->select('rol')->where(['idusuario' => $usuarioid]) ->one()->rol;
             //echo 'Permiso '.$usuarioid . ' rol: ' .$permiso;
             //$dato = Yii::$app->user->identity->tipoUsuario;   
             //proyectos             
         
         ?>
         
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Opciones Proyectos', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Yii2', 'icon' => 'support', 'url' => '#', 'visible' => $rol==1,
                        'items'=>[
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                        ]
                    ],
                    
                    ['label' => 'Home','icon' => 'home text-green','url' => ['/home'],],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Clíentes','icon' => 'users text-yellow','url' => '/advanced/clientes', 
                        'visible' => $rol<=2],
                    [
                        'label' => 'Proyectos',
                        'icon' => 'handshake-o text-info',
                        'url' => '#',
                        'visible' => $rol<=2,
                        'items'=>[
                            ['label' => 'Proyectos', 'icon' => 'handshake-o text-info', 'url' => ['/proyectos-uno']],
                            ['label' => 'Entregables', 'icon' => 'calendar-check-o text-danger', 'url' => ['/entregables/index2']],
                        ]
                    ],
                    ['label' => 'Usuarios','icon' => 'user-plus text-warning','url' => ['/usuarios'],'visible' => $rol<=2]
                                   
                ],
            ]),
            //En este codigo generamos el men� administrativo en donde pondremos todas las funciones administrativas
            dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                    'items' => [
                        ['label' => 'Opciones Administrativas', 'options' => ['class' => 'header']],                      
                        ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                        [
                            'label' => 'Administrativos',
                            'icon' => 'bar-chart text-blue',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Anticipos', 'icon' => 'calculator text-red', 'url' => ['/anticipos']],
                                ['label' => 'Tiquetes aereos', 'icon' => 'plane text-aqua', 'url' => ['/#']],
                                ['label' => 'Impresiones', 'icon' => 'print text-yellow', 'url' => ['/#']],
                                ['label' => 'Proveedores', 'icon' => 'suitcase text-orange', 'url' => ['/#']],
                                [
                                    'label' => 'Legalizaciones',
                                    'icon' => 'bank text-green',
                                    'url' => '#',
                                    /* 'items' => [
                                        ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                        [
                                            'label' => 'Level Two',
                                            'icon' => 'circle-o',
                                            'url' => '#',
                                            'items' => [
                                                ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                                ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ],
                                        ],
                                    ], */
                                ],
                            ],
                        ],
                    ],
                ])
            ?><!-- Finaliza la etiqueta de php -->
			
			<?php }?>
    </section>

</aside>
