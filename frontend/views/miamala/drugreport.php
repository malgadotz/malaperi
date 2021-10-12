<?php

use yii\helpers\Html;
use common\models\Seller;
use common\models\Categories;
use common\models\Admin;

$this->title='Medical Store| Invoice';
?>
  <div class="tableBox" >
<div class="btn-cool center block " style="margin: auto;padding: 8px 4px;margin-top: 11px;">
      <h2 class="">MEDICAL STORE PROFORMER INVOICE AS TO: <?php echo date('Y-m-d')?></h2>
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
            <td class="top-back"><?php echo $model->drug_name;?></td>
            <td><?php echo $model->price;?></td>
            <td><?php echo Categories::findone(['cat_id'=>$model->cat_id])->cat_name;?></td>
            <td><?php echo $model->expire?></td>
            <td><?php echo $model->description?></td>
          </tr>
          <?php endforeach; ?>  
    </table>
  </div>
  </div>  <!-- ending tag for content -->
