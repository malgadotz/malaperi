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
        <li class="active">Update Profile Picture</li>
    </ol>
   <div class="card  mauto half">
    <div class="card-header bg-primary">
    <h3 class="text-center btn-block"><i class="fa fa-user-plus text-white"></i> Update Profile Picture</h3>
    </div>
    <div class="card-body">
    
    <?= $form->field($model, 'mobile')->textInput(['promp'=>'+255'])?>

<?= $form->field($model, 'pic')->fileInput()?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-block btn-flat '  , 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            </div>
            </div>
        </div>