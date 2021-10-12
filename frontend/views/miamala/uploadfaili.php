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
        <li class="active">File Upoad</li>
    </ol>
   <div class="card joi mauto md">
    <div class="card-header bg-primary">
    <h3 class="text-center btn-block"><i class="fa fa-picture-o text-white"></i> Upload photos</h3>
    </div>
    <div class="card-body">
    
    <?= $form->field($models, 'name')->textInput(['autofocus' => true])?>

<?= $form->field($models, 'faili', [
            'template' =>'
            <div class="custom-file">
            {label}
            {input}
            {error}
            </div>
            ',
            'inputOptions'=>['class'=>'custom-file-input'],
            'labelOptions' => ['class' => 'custom-file-label']
    ])->textInput(['type'=>'file']) 
     ?>

                <div class="form-group">
                    
                   <buttonc class="btn btn-success btn-block"><i class="fa fa-upload"></i> Upload</button>
                </div>

            <?php ActiveForm::end(); ?>
            </div>
            </div>
        </div>