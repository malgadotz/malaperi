<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Party;

/* @var $this yii\web\View */
/* @var $model common\models\Candidates */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Candidates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="candidates-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php foreach ($candidate as $candidates):?>
        <div class="card ">
        <div class="row">
        <div class="col-4"><h3 class="pull-left">
            <?php echo Party::findOne(['id'=> $candidates ->party_id])->party_name;?>
        </h3></div>
            <div class="pull-right">
            <img class="pull-right" src ="/uploads/<?php echo $candidates->image?>" style="width:200px; height:400;" alt="photo">
    </div>
     </div>
    </div>
     <?php endforeach;?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'firstName',
            'middleName',
            'lastName',
            // 'party_id',
            
            
        ],
    ]) ?>

        

