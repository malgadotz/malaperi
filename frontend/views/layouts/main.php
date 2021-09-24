<?php

/* @var $this \yii\web\View */
/* @var $content string */
namespace frontend\controllers;
use yii\base\Model;
use common\widgets\Alert;
use common\models\User;
use common\models\Admin;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\NavBar;
use yii;


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
    <?php $this->head() ?>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<header>
    <?php
    NavBar::begin([
               'brandLabel'=>'MEDICAL STORE',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                'class' => 'navbar navbar-static-top navbar-light text-white bg-info fixed-top',
        ],
    ]);



   
    //  echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav text-center'],
        
    // ]);
    NavBar::end();
    ?>

</header>
<?php 
if ('john') {?>
<div class="dashboard side-navbar navbar-dark bg-dark comic">
<!-- <div class="card"> -->
  <div style="background:#357CA5;opacity: ;padding: 14px 3px;color:white;font-size: 15pt;text-align: center;text-shadow: 1px 1px 11px black">
    <a href="index.php" style="color: white;text-decoration: none;"><?=Yii::$app->name; ?> </a>
  </div>
  <div class="flex" style="padding: 3px 7px;margin:5px 2px;">
    <div>
      <img src="/photo/<?php echo Admin::findone(['log_id'=>\Yii::$app->user->identity->id])->pic;?>
" class='img-circle' style='width: 77px;height: 66px'></div>
    <div style="color:lightgreen;font-size: 13pt;padding: 14px 7px;margin-left: 11px;">
    <?=Yii::$app->user->identity->username ?>
        </div>
  </div>
  <div class="bt-block" style="background: #1A2226;font-size: 10pt;padding: 11px;color: #79978F">MAIN NAVIGATION</div>
  <div>
    <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-dashboard fa-fw"></i> Dashboard</span></div>
    <div class="item">
      <ul class="nostyle zero">
        <li style="color: white"><i class="fa fa-home fa-fw text-primary"></i> <?= Html:: a("Home", Yii::$app->homeUrl,['class' => 'btn btn-primary half-5']) ?></li>

        <li><i class="fa fa-database fa-fw text-danger"></i> <?= Html:: a("Drugs",['/miamala/drugs'],['class' => 'btn btn-primary half-5']) ?></li>

       <li><i class="fa fa-plus-square fa-fw text-warning"></i> <?= Html:: a("Add New Drug",['/miamala/add-drug'],['class' => 'btn btn-primary half-5']) ?></li>
<!--         <a href="newsell"><li><i class="fa fa-circle-o fa-fw"></i> New Sell</li></a> -->
        <li><i class="fa fa-folder-open fa-fw text-success"></i> <?= Html:: a("Report",['/miamala/reports'],['class' => 'btn btn-primary half-5']) ?></li>
      </ul>
    </div>
  </div>
  <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Other Menu</span></div>
  <div class="item">
      <ul class="nostyle zero">

        <li><i class="fa fa-user-plus fa-fw text-warning"></i> <?= Html:: a("Register New Seller",['/miamala/add-user'],['class' => 'btn btn-primary half-5']) ?></li>
       <li><i class="fa fa-user-circle-o fa-fw text-gado"></i> <?= Html:: a("Profile Settings",['/miamala/profile'],['class' => 'btn btn-primary half-5']) ?></li>
        <li><i class="fa fa-lock fa-fw text-info"></i> <?= Html:: a("Account Settings",['/miamala/account'],['class' => 'btn btn-primary half-5']) ?></li>
        <li><i class="fa fa-sign-out fa-fw text-white"></i> <?= Html:: a("Sign Out",['/miamala/login'],['class' => 'btn btn-primary half-5']) ?></li>
      </ul>
    </div>
<!-- </div> -->
</div>

<?php }?>

<div class="marginLeft">

<main role="main" class="flex-shrink-0 mauto">
    <!-- <div class="container"> -->
<!-- <div class="card"> -->
    <!-- <div class="card-body"> -->
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    <!-- </div> -->
    
<!-- </div>     -->
    <!-- </div> -->
</main>
</div>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span1 = document.getElementsByClassName("close")[1];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
span1.onclick = function() {
  modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function play(){
   modal.style.display = "block"; 
}
 $(document).ready(function()
  {
    $(".rightAccount").click(function(){$(".account").fadeToggle();});
    }
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();



 // if (Yii::$app->user->isGuest) {
    //     $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    //     $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    //     $menuItems[] = '<li>'
    //         . Html::beginForm(['/site/logout'], 'post', ['class' => 'float-right'])
    //         . Html::submitButton(
    //             'Kulia',
    //             ['class' => 'btn btn-link float-right']
    //         )
    //         . Html::endForm()
    //         . '</li>';
    // } else {
    //     $menuItems[] = '<li>'
    //         . Html::beginForm(['/site/logout'], 'post', ['class' => 'float-right'])
    //         . Html::submitButton(
    //             'Logout (' . Yii::$app->user->identity->username . ')',
    //             ['class' => 'btn btn-link logout pull-right']
    //         )
    //         . Html::endForm()
    //         . '</li>';
    // }
    //
