<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$url1=Yii::$app->homeUrl;

$form = ActiveForm::begin([
    'id' => 'active-form',
    'options' => [
		'class' => '',
		'enctype' => 'multipart/form-data'
	],
])?>
     
   <div class="content">
       <ol class="breadcrumb ">
        <li><a href=<?=$url1;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?=$cat->cat_name;?></li>
    </ol>
   <div class="card  mauto half">
    <div class="card-header bg-info">
    <h3 class="text-center btn-block"><i class="fa fa-user-plus text-white"></i> Add New Category</h3>
    </div>
    <div class="card-body">
    
    <?= $form->field($cat, 'cat_name')->textInput(['autofocus' => true, 'prompt'=>$cat->cat_name])?>

<?= $form->field($cat, 'cat_pic')->fileInput(['prompt'=>$cat->cat_pic])?>
                <div class="form-group">
                    <?= Html::submitButton('Update Drug Category', ['class' => 'btn btn-success btn-block btn-flat '  , 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            </div>
            </div>
        </div>