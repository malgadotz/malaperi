<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']) ?>

    <?= $form->field($model, 'file')->fileInput(); ?>

    <?= Html::submitButton('Upload') ?>

<?php ActiveForm::end() ?>
