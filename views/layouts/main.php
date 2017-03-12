<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('images/logo-cropped.png', [],['alt' => 'alt image']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Admin', 'url' => ['/users/index'], 'visible' => !Yii::$app->user->isGuest],
            //['label' => 'Browse All', 'url' => ['/specsheets/index'], 'visible' => !Yii::$app->user->isGuest],
            [
            'visible' => !Yii::$app->user->isGuest,
            'label' => 'Spec Sheets',
            'items' => [
                 ['label' => 'All', 'url' => ['/specsheets/index']],
                 ['label' => 'Chevrolet', 'url' => ['/specsheets/view-chevrolet']],
                 ['label' => 'Opel', 'url' => ['/specsheets/view-opel']],
                 ['label' => 'Isuzu', 'url' => ['/specsheets/view-isuzu']]
            ],
            ],
            [
            'visible' => !Yii::$app->user->isGuest,
            'label' => 'iCare',
            'items' => [
                 ['label' => 'All', 'url' => ['/icare/index']],
                 ['label' => 'Chevrolet', 'url' => ['/specsheets/nominations']],
            ],
            ],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <a href="http://www.admakers.com/" target="_blank" class="color-blue">Admakers International</a> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
