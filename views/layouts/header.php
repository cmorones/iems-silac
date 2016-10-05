<?php
use \app\assets_b\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\NotFoundHttpException;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

Yii::$app->name = "SILAC";

if(Yii::$app->language == 'es') :
	$this->registerCss('
.navbar-right:last-child {
    margin-left: 6px !important;
}
.navbar-nav > .notifications-menu > .dropdown-menu > li.header::after, .navbar-nav > .messages-menu > .dropdown-menu > li.header::after, .navbar-nav > .tasks-menu > .dropdown-menu > li.header::after {
	left:8% !important;
}
');
endif;
?>

<header class="main-header header">

<a href=#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>IEMS</b>-</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SILAC</b>2016</span>
    </a>

<nav class="navbar navbar-static-top" role="navigation">

<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
<div class="navbar-right">

	<ul class="nav navbar-nav">
		<li class="dropdown module-menu">
		    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" title="<?= Yii::t('app', 'Main Menu') ?>">
				<i class="fa fa-th fa-lg"></i>
		    </a>
		<?= $this->render(
			'module-name.php'
		)
		?>
</li>

<?php
if (Yii::$app->user->isGuest) {
    ?>
    <li class="footer">
        <?= Html::a(Yii::t('app', 'Login'), ['/site/login']) ?>
    </li>
<?php
} else {
	
    ?>
    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i>
            <span><?= @Yii::$app->user->identity->user_login_id ?> <i class="caret"></i></span>
        </a>
        <ul class="dropdown-menu" style="margin-right:<?= (Yii::$app->language == 'ar' && isset($isStudent)) ? '-50px' : '10px'; ?>">
            <!-- User image -->
            <li class="user-header bg-light-blue">
                <img src="" class="img-circle" alt="User Image"/>

                <p style="font-size: 18px;">
                    <?= @Yii::$app->user->identity->perfil ?>
                </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body" style="">
                <div class="col-xs-6 no-padding">
		  </div>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
		    <?= Html::a(Yii::t('app', 'Cambiar Contraseña'), ['/user/change'], ['class' => 'btn btn-default btn-flat', 'style' => 'font-size:12px'.((Yii::$app->language == 'fr' || Yii::$app->language == 'es') ? ';padding: 6px 3px;' : '')]) ?>
                </div>
                <div class="pull-right">
                    <?= Html::a(
                            Yii::t('app', 'Salir'),
                            ['/site/logout'],
                            ['data-method' => 'post','class'=>'btn btn-default btn-flat', 'style' => 'font-size:12px'.((Yii::$app->language == 'fr' || Yii::$app->language == 'es') ? ';padding: 6px 3px;' : '')]
                        ) ?>
                </div>
            </li>
        </ul>
    </li><?php
}
?>
	</ul>

</div>



</nav>
</header>