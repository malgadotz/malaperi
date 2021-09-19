<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;


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
               'brandLabel'=> Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                'class' => 'navbar navbar-static-top navbar-light text-white bg-info fixed-top',
        ],
    ]);



   
     echo Nav::widget([
        'options' => ['class' => 'navbar-nav text-center'],
        
    ]);
    NavBar::end();
    ?>

</header>

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
