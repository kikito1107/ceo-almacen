<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" ng-app="messaging">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!--suppress HtmlUnknownTarget -->
    <script src="<?php echo Url::base() ?>/js/main.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500,100,300' rel='stylesheet' type='text/css'>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC81Qn9292OklIJhdtjPPGknJuJEy9woJ4&libraries=places"></script>
</head>
<body class="theme-4">
<?php $this->beginBody() ?>
<script type="text/javascript">
    Messaging = {
        baseUrl: '<?php echo Url::base() ?>/'
    };
</script>
<div class="layout-container" ng-controller="MainController">
    <header class="header-container">
        <nav>
            <ul>
                <li class="visible-xs visible-sm hidden-md">
                    <a href="javascript:void(0);" id="sidebar-toggler" class="menu-link menu-link-slide"><span><em></em></span></a>
                </li>
            </ul>
            <h2 class="header-title"><?= Yii::t('app', 'Sistema de Administración de Zapatos') ?></h2>
            <ul class="pull-right">
                <li uib-dropdown class="dropdown">
                    <a uib-dropdown-toggle href="javascript:void(0);" class="dropdown-toggle ripple" aria-haspopup="true" aria-expanded="false">
                        <em class="fa fa-cog"></em>
                        <span class="md-ripple"></span>
                    </a>
                    <ul dropdown-menu class="dropdown-menu dropdown-menu-right md-dropdown-menu">
                        <li class="ripple ripple-block">
                            <a href="<?php echo Url::to(['/auth/profile/view']) ?>">
                                <em class="fa fa-home"></em>
                                <?php echo Yii::t('app', 'Mi perfil') ?>
                            </a>
                            <span class="md-ripple"></span>
                        </li>
                        <li role="presentation" class="divider"></li>
                        <li class="ripple ripple-block">
                            <a href="<?php echo Url::to(['/auth/default/logout']) ?>">
                                <em class="fa fa-sign-out"></em>
                                <?php echo Yii::t('app', 'Cerrar sesión') ?>
                            </a>
                            <span class="md-ripple"></span>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <aside class="sidebar-container">
        <div class="sidebar-header">
            <a href="<?= Url::to(['/site/index']) ?>">
                <!--suppress HtmlUnknownTarget -->
                <i class="fa fa-cubes logo">
<!--                    <img src="--><?php //echo Url::base() ?><!--/image/ogo.png" class="block-center " height="50" width="180"> -->
                    <?= Yii::t('app', 'Inicio') ?></i>
            </a>
        </div>
        <div class="sidebar-content">
            <nav class="sidebar-nav">
                <ul>
                    <li>
                        <a href="<?= Url::to(['/profile']) ?>" class="ripple">
                            <em class="fa fa-user icon-sidebar-menu"></em>
                            <span><?= Yii::t('app', 'Usuarios del sistema') ?></span>
                            <span class="md-ripple"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/provider']) ?>" class="ripple">
                            <em class="fa fa-users icon-sidebar-menu"></em>
                            <span><?= Yii::t('app', 'Provedores') ?></span>
                            <span class="md-ripple"></span>
                        </a>
                    </li>
<!--                    <li>-->
<!--                        <a href="--><?//= Url::to(['/mark']) ?><!--" class="ripple">-->
<!--                            <em class="fa fa-copyright icon-sidebar-menu"></em>-->
<!--                            <span>--><?//= Yii::t('app', 'Marcas') ?><!--</span>-->
<!--                            <span class="md-ripple"></span>-->
<!--                        </a>-->
<!--                    </li>-->
                    <li>
                        <a href="<?= Url::to(['/models']) ?>" class="ripple">
                            <em class="fa fa-modx icon-sidebar-menu"></em>
                            <span><?= Yii::t('app', 'Modelos') ?></span>
                            <span class="md-ripple"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/models-shows/inventory']) ?>" class="ripple">
                            <em class="fa fa-modx icon-sidebar-menu"></em>
                            <span><?= Yii::t('app', 'Gestión de inventario') ?></span>
                            <span class="md-ripple"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/mayorista']) ?>" class="ripple">
                            <em class="fa fa-user icon-sidebar-menu"></em>
                            <span><?= Yii::t('app', 'Clientes mayoritas') ?></span>
                            <span class="md-ripple"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/minorista']) ?>" class="ripple">
                            <em class="fa fa-user icon-sidebar-menu"></em>
                            <span><?= Yii::t('app', 'Clientes minoristas') ?></span>
                            <span class="md-ripple"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/herramientas']) ?>" class="ripple">
                            <em class="fa fa-server icon-sidebar-menu"></em>
                            <span><?= Yii::t('app', 'Herramientas adicionales') ?></span>
                            <span class="md-ripple"></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <div class="sidebar-layout-obfuscator"></div>
    <main class="main-container">
        <section>
            <div class="container-fluid">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>

                <?= $content ?>
            </div>
        </section>
    </main>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
