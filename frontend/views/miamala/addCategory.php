<?php
namespace frontend\controllers;
use yii\base\Model;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use frontend\models\Categories;
use yii;
$url1=Yii::$app->homeUrl;



$form = ActiveForm::begin([
    'id' => 'active-form',
    'options' => [
		'class' => 'form-horizontal',
		'enctype' => 'multipart/form-data'
	],
])?>
     
   <div class="content">
       <ol class="breadcrumb ">
        <li><a href=<?=$url1;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add New Category</li>
    </ol>
   <div class="card  mauto half">
    <div class="card-header bg-primary">
    <h3 class="text-center btn-block"><i class="fa fa-user-plus text-white"></i> Add New Category</h3>
    </div>
    <div class="card-body">
    
    <?= $form->field($model, 'cat_name')->textInput(['autofocus' => true])?>

<?= $form->field($model, 'image')->fileInput(['label'=>'Picture'])?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-block btn-flat '  , 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            </div>
            </div>
        </div>