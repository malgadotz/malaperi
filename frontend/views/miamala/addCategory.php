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
     
   <div class="card-header top-back">
       <ol class="breadcrumb ">
        <li><a href=<?=$url1;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add New Category</li>
        </ol>
        <span style="font-size: 14pt;color: #333333"><i class="fa fa-book fa-2x text-dark"> </i></span>
      <?= Html:: a(" Go Back",['/miamala/manage-cat'],['class' => 'fa fa-arrow-backward btn btn-primary btn-sm pull-right text-white']) ?>
 </div>
<div class="card joi mauto md">
    <div class="card-header bg-info">
    <h3 class="text-center btn-block"><i class="fa fa-object-group text-white"></i> Add New Category</h3>
    </div>
    <div class="card-body">
    
    <?= $form->field($model, 'cat_name')->textInput(['autofocus' => true])?>

    <?= $form->field($model, 'cat_pic', [
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
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-success btn-block btn-flat '  , 'name' => 'contact-button'  ,

            'data' => [
                'confirm' => 'Are  you Sure you want to Add this Category?',
                'method' => 'post'],
           ]) ?>
                </div>
            <?php ActiveForm::end(); ?>
    </div>
</div>
