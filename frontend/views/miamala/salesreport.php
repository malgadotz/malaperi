<?php
use common\models\Seller;
use common\models\User;

use frontend\models\Drugs;
use yii\helpers\Html;
$this->title='SALES REPORT';
?> 
<div class="modal-header center block top-back" style=";margin: auto;padding: 8px 4px;margin-top: 11px;">
      <h2 class="text-center">MEDICAL STORE SALES REPORT AS AT: <?php echo date('Y-m-d')?></h2>
    </div>
      <table id="payment" class="table table-bordered table-striped" style="z-index: -1">
      <tr>
        <th>#</th>
        <th>Date Sold</th>
        <th>Name of Seller</th>
        <th>Drug Name</th>
        <th>Quantity Sold</th>
        <th>Amount Received</th>
      </tr>
     <?php 
     $i=1;
     $sum=0;
     foreach($sales as $sales): ?>
          <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $sales->date;?></td>
            <td><?php echo User::findone(['id'=>Seller::findone(['id'=> $sales->seller_id])->log_id])->username;?></td>
            <td><?php echo Drugs::findone(['inv_id'=>$sales->drug_id])->drug_name;?></td>
            <td><?php echo $sales->quantity;?></td>
            <td class="total"><?php echo $sales->amount;$sum=$sum+$sales->amount;?></td>
          </tr>
          <?php endforeach; ?>  
          <tr class="total">
            <td></td>
            <td><h4>TOTAL SALES AMOUNT</h4></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="sum"><?php echo $sum;?></td>
            </tr>
    </table>
  

  <!-- </div>  --> <!-- ending tag for content -->
