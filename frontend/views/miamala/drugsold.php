<?php
use common\models\Seller;
use common\models\User;
use frontend\models\Drugs;
use yii\helpers\Html;
$this->title='SALES REPORT';
?>
 <link rel="stylesheet" href="/css/malipon.css"> 
   <div class="box-md  joi mauto md">
  
<div class="btn-cool center block angelBlue text-info" style=";margin: auto;padding: 8px 4px;margin-top: 11px;">
      <h4 class="">MALAPERI STORE DRUG SALES REPORT</h4>
    </div>
      <table id="payment" class="table table-bordered table-striped" style="z-index: -1">
        <?php 
     $i=1;
     $sum=0;
foreach($sales as $sales): ?>
      <tr>
        <td>Date Sold</td>
        <td><?php echo $sales->date;?></td>
      </tr>
     <tr> 
        <td>Name of Seller</td>
        <td><?php echo User::findone(['id'=>Seller::findone(['id'=> $sales->seller_id])->log_id])->username;?></td>
        </tr>
     <tr>
        <td>Drug Name</td>
         <td><?php echo Drugs::findone(['inv_id'=>$sales->drug_id])->drug_name;?></td>
    </tr>
    <tr>
        <td>Drug Expire At</td>
         <td><?php echo Drugs::findone(['inv_id'=>$sales->drug_id])->expire;?></td>
    </tr>
     <tr>
        <td>Quantity Sold</td>
        <td><?php echo $sales->quantity;?></td>
    </tr>
     <tr>
        <td>Amount Received</td>
        <td><?php echo $sales->amount;$sum=$sum+$sales->amount;?></td>
    </tr>
          <?php endforeach; ?>  
    <tr>
           
            <td><h4>TOTAL SALES AMOUNT</h4></td>     
            
            <td><h5><strong> <?php echo $sum;?></h5></strong></td>
    </tr>
    </table>
  </div>
 

  <!-- </div>  --> <!-- ending tag for content -->
