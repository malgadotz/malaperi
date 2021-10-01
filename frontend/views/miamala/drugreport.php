<?php

use yii\helpers\Html;
use common\models\Seller;
use common\models\Categories;
use common\models\Admin;


$id=\Yii::$app->user->identity->id;
$userwho="user";
$user;
if(Admin::findone(['log_id'=>$id]))
{ 
$userwho = "admin";
$user=Admin::findone(['log_id'=>$id]);
}
else 
{
  $userwho= "seller";
  $user=Seller::findone(['log_id'=>$id]);
  
}

$this->title='SALES REPORT';
?>
  <div class="tableBox" >
<div class="btn-cool center block" style="margin: auto;padding: 8px 4px;margin-top: 11px;">
      <h2 class="">MALAPERI STORE PROFORMER INVOICE</h2>
    </div>
      <table id="payment" class="table table-bordered table-striped" style="z-index: -1">
      <tr>
        <th>#</th>
        <th>Drug Name</th>
        <th>Unit Price</th>
        <th>Drug Category</th>
        <th>Expire Date</th>
        <th>Description</th>
      </tr>
     
     <?php 
     $a=1;
     foreach($model as $model): ?>
          <tr>
            <td><?php echo $a++;?></td>
            <td><?php echo $model->drug_name;?></td>
            <td><?php echo $model->price;?></td>
            <td><?php echo Categories::findone(['cat_id'=>$model->cat_id])->cat_name;?></td>
            <td><?php echo $model->expire?></td>
            <td><?php echo $model->description?></td>
          </tr>
          <?php endforeach; ?>  
     
    </table>
  </div>

  </div>  <!-- ending tag for content -->
