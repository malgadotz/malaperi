<?php
use yii\helpers\Html;
use common\models\Seller;
use common\models\Categories;
use common\models\Admin;
?>
 <div class="card  mauto ">
<div class="btn-cool center block frogGreen" style=";margin: auto;padding: 8px 4px;margin-top: 11px;">
      <h2 class="">MEDICAL STORE INVENTORY REPORT AS AT: <?php echo date('Y-m-d')?> </h2>
    </div>
 <!--  <div class="tableBox joi" > -->   
    <table id="dataT" class=" table table-bordered table-striped" style="z-index: -1">
      <tr class="active">
        <th>#</th>
        <th>Drug Name</th>
        <th>Stock</th>
        <th>Price (TSH)</th>
        <th>Category</th>
        <th>Expire Date</th>
        <th>Description</th>
      </tr>
        <?php 
     $a=1;
     $amount=0;
     $quantity=0;
     foreach($model as $model): ?>
          <tr>
            <td><?php echo $a++;?></td>
            <td><?php echo $model->drug_name;?></td>
            <td class="joi"><?php echo $model->quantity;?></td>
            <td><?php echo $model->price;?></td>
            <td><?php echo Categories::findone(['cat_id'=>$model->cat_id])->cat_name;?></td>
            <td class="joi"><?php echo $model->expire?></td>
            <td><?php echo $model->description?></td>
        
          </tr class="top-back">
          <?php 
          $quantity=$quantity + $model->quantity;
          $amount=$amount + $model->price * $model->quantity;
          endforeach; ?>
          <tr class="bold">
            <td></td><td class="joi">Total </td><td>Stock</td><td class="top-back"><?php echo $quantity;?></td><td class="joi">Price</td><td class="top-back"><?php echo $amount;?></td><td class="joi">Inventory Status</td>
          </tr>  
     
    </table>
  </div>

  </div>  <!-- ending tag for content -->
