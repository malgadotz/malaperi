<?php

/* @var $this \yii\web\View */
/* @var $content string */
namespace frontend\controllers;
use yii\base\Model;
use common\widgets\Alert;
use common\models\User;
use common\models\Seller;
use common\models\Admin;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\NavBar;
use yii;

$id=\Yii::$app->user->identity->id;
$userwho="user";
$user;
if(Admin::findone(['log_id'=>$id]))
{ 
$userwho = "admin";
$user=Admin::findone(['log_id'=>$id]);
}
else 
{
  $userwho= "seller";
  $user=Seller::findone(['log_id'=>$id]);
  
}
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
   <!--  <link rel="icon" href="https://assets.msn.com/statics/icons/favicon_newtabpage.png" type="image/png" crossorigin="anonymous" sizes="32x32"> -->
    <?php $this->head() ?>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<header class="navbar navbar-expand text-center text-white fixed-top"  style="background:#357CA5;">

    <h2 class="mauto">MALAPERI STORE MSMS</h2>



   
    <!-- /  echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav text-center'],
        
    // ]);
    NavBar::end();
    ?>
 -->
</header>

<div class="card dashboard side-navbar zero navbar-dark bg-dark comic">
<!-- <div class="card"> -->
  <div style="background:#357CA5;opacity: ;padding: 14px 3px;color:white;font-size: 15pt;text-align: center;text-shadow: 1px 1px 11px black">
    <a href="<?=Yii::$app->homeUrl; ?>" style="color: white;text-decoration: none;">MALAPERI STORE</a>
  </div>
  <div class="card bg-dark">
    <div class="card-body mauto">
      <img src="/photo/<?php 
      echo $user->pic;?>
" class='img-circle' style='width: 120px;height: 120px'></div>
    <div class="btn-block text center mauto text-success">
    <?=Yii::$app->user->identity->username ?>
        </div>
  </div>
  <div class="btn-block" style="background: #1A2226;font-size: 10pt;padding: 11px;color: #79978F">MAIN NAVIGATION</div>
  <div>
    <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-dashboard fa-fw"></i> Dashboard</span></div>
    <div class="item">
      <ul class="nostyle zero">
        <li class="btn-block"> <?= Html:: a("  Category",Yii::$app->homeUrl,['class' => 'btn btn-primary btn-xs fa fa-home half-5']) ?></li>

       <li class="btn-block btn-flat"><?= Html:: a("  Drugs",['/miamala/drugs'],['class' => 'btn btn-primary btn-xs fa fa-database half-5 ']) ?></li>      
       <li class="btn-block">  <?= Html:: a("  Sales",['/miamala/reports'],['class' => 'btn btn-primary mauto fa fa-folder-open half-5']) ?></li>
	   <li class="btn-block">  <?= Html:: a("  Matokeo",['/miamala/upload-faili'],['class' => 'btn btn-primary mauto fa fa-plus-square half-5']) ?></li>
      </ul>
    </div>
  </div>
  <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Other Menu</span></div>
  <div class="item">
      <ul class="nostyle zero">
      <?php if ($userwho == 'admin'):?>
        <li class="btn-block"><?= Html:: a(" Add Seller",['/miamala/add-seller'],['class' => 'fa fa-user-plus btn btn-primary half-5']) ?></li>
        <?php endif;?>
       <li class="btn-block"> <?= Html:: a(" Profile Settings",['/miamala/profile'],['class' => 'btn btn-primary fa fa-user-circle-o text-gado half-5']) ?></li>
        <li class="btn-block"><?= Html:: a(" Account Settings",['/miamala/account'],['class' => 'fa fa-lock btn btn-primary half-5']) ?></li>
        <li class="btn-block"> <?= Html:: a(" Sign Out",['miamala/logout'],['class' => 'btn fa fa-sign-out btn-primary half-5','data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?></li>
      </ul>
    </div>
</div>
<!-- //MAIN PAGE CONTENT STAY HERE -->
<main role="main" class="flex-shrink-0 marginLeft">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();