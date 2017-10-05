<?php
use frontend\models\Tipousuario;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user.gif" class="img-circle" alt="User Image"/>
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
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- en estas lineas de codigo, lo que se hace es validar que el usuario este logueado, ademas traemos el tipo de usuario 
        de la tabla user, y con base a eso imprimimos un menu en este caso si el tipo de usuario es 1 o 2 mostrara el menu de lo contrario
        no mostrará nada -->
         <?php if(!Yii::$app->user->isGuest){ 
             $dato = Yii::$app->user->identity->tipoUsuario;
         if ($dato ==1 or $dato==2) {
            //proyectos
             
         
         ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Home','icon' => 'home','url' => '/advanced/',],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Clíentes','icon' => 'users','url' => '/advanced/clientes',],
                    [
                        'label' => 'Proyectos',
                        'icon' => 'share',
                        'url' => '/advanced/proyectos-uno',
                        /*'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
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
                                ],
                            ],
                        ],*/
                    ],                                        
                    
                    
                    ['label' => 'Usuarios','icon' => 'user','url' => '/advanced/usuarios',],
                ],
            ]
        ) ?>
			
			<?php }}?>
    </section>

</aside>
