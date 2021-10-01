<?php

namespace frontend\controllers;
use dosamigos\datepicker\DatePicker;
// use yii\jui\DatePicker;
use yii\base\Model;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;
use common\models\Categories;
use yii;
$url1=Yii::$app->homeUrl;


$form=ActiveForm::begin([
'id' => 'profile'

])
   ?>  
   <div class="content">
       <ol class="breadcrumb ">
        <li><a href=<?=$url1;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add New Drug</li>
    </ol>
   <div class="card  mauto half">
    <div class="modal-header bg-info">
    <h3 class="text-center btn-block"><i class="fa fa-user-plus text-white"></i> Add New Drug</h3>
    </div>
    <div class="card-body">
    
    <?= $form->field($model, 'drug_name')->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'quantity')->textInput()?>
<?= $form->field($model, 'price')->textInput() ?>

<?= $form->field($model, 'expire')->widget(
    DatePicker::className(), [
         'inline' => false, 
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

    

<?= $form->field($model, 'cat_id')->dropDownList(
    ArrayHelper::map(Categories::find()->all(),'cat_id','cat_name'), ['prompt' => 'select Category']) ?>

<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

























              
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-block btn-flat '  , 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            </div>
            </div>
        </div>