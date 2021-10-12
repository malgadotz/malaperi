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

$role=\Yii::$app->user->identity->role;
$isAdmin=false;
$isSeller=false;
$id=\Yii::$app->user->identity->id;

$user;
if($role >9)
{ $isAdmin = true;
$user=Admin::findone(['log_id'=>$id]);
}
else{ $isSeller=true; $user=Seller::findone(['log_id'=>$id]);}
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
<!--      <link rel="stylesheet" href="/css/malipo.css">  -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
     <!-- https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" integrity="sha384-tKLJeE1ALTUwtXlaGjJYM3sejfssWdAaWR2s97axw4xkiAdMzQjtOjgcyw0Y50KU" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
</head>
<body class="d-flex flex-column h-100 back">
<?php $this->beginBody() ?>
<header class="navbar navbar-expand text-center text-white fixed-top"  style="background:#357CA5;">
    <h2 class="mauto">MEDICAL STORE MANAGEMENT SYSTEM</h2>
</header>
<div class="card dashboard side-navbar zero navbar-dark bg-dark comic">
<!-- <div class="card"> -->
  <div style="background:#357CA5;opacity: ;padding: 14px 3px;color:white;font-size: 15pt;text-align: center;text-shadow: 1px 1px 11px black">
    <a href="<?=Yii::$app->homeUrl; ?>" style="color: white;text-decoration: none;">MEDICAL STORE MS</a>
  </div>
  <div class="card bg-dark">
    <div class="card-body mauto">
      <img src="/photo/<?php 
      echo $user->pic;?>
" class='img-circle' style='width: 120px;height: 120px'></div>
    <div class="btn-block text-center mauto fs-lg text-white">
    <?=Yii::$app->user->identity->username ?>
    <?php if($isAdmin){?><p class="text-primary">Administrator<p>
       <?php } else{?><p class="text-primary">Drug Seller<p><?php }?>
        </div>
  </div>
<!-- <div class="bt-block" style="background: #1A2226;font-size: 10pt;padding: 11px;color: #79978F">MAIN NAVIGATION</div> -->
  <div>
    <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-dashboard fa-fw"></i> Dashboard</span></div>
    <div class="item">
      <ul class="nostyle zero">
        <li  style="color: white"><i class="fa fa-home fa-fw text-primary"></i> <?= Html:: a("Home",Yii::$app->homeUrl,['class' => 'btn btn-primary half-5']) ?></li>
        <li><i class="fa fa-database fa-fw text-danger"></i> <?= Html:: a("Drugs",['/miamala/drugs'],['class' => 'btn btn-primary half-5 ']) ?></li>

       <li><i class="fa fa-folder-open fa-fw text-warning"></i><?= Html:: a("Reports",['/miamala/reports'],['class' => 'btn btn-primary half-5']) ?></li>
       <?php if($isAdmin ):?>
        <!-- <li><i class="fa fa-upload fa-fw text-success"></i> <?= Html:: a("Help",['/miamala/upload-faili'],['class' => 'btn btn-primary half-5']) ?></li> -->
        <?php endif;?>
      </ul>
    </div>
  </div>
 <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-cogs fa-fw fa-pulse" aria-hidden="true"></i>&nbsp; User Settings</span></div>
  <div class="item">
      <ul class="nostyle zero">
      <?php if($isAdmin):?>
        <li><i class="fa fa-user-plus fa-fw text-warning"></i> <?= Html:: a("Add Seller",['/miamala/adduser'],['class' => 'btn btn-primary half-5']) ?></li>
        <?php endif;?>
       <li><i class="fa fa-picture-o  fa-fw text-gado"></i> <?= Html:: a("Profile Settings",['/miamala/profile'],['class' => 'btn btn-primary half-5']) ?></li>
        <li><i class="fa fa-key fa-fw text-info"></i> <?= Html:: a("User Account",['/miamala/account'],['class' => 'btn btn-primary half-5']) ?></li>
        <li ><i class="fa fa-sign-out fa-fw text-white"></i> <?= Html:: a("Sign Out",['miamala/logout'],['class' => 'btn btn-primary half-5',
            'data' => [
                'confirm' => 'Are you sure you want to Sign Out?',
                'method' => 'post'],
           ]) ?></li>
      </ul>
    </div>
</div>
<div class="marginLeft">
<main role="main" class="flex-shrink-0 mauto ">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
</main>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();?>