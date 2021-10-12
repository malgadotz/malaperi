<?php
use common\models\Seller;
use common\models\User;
use frontend\models\Drugs;
use yii\helpers\Html;
$this->title='SALES REPORT';
?>
 <link rel="stylesheet" href="/css/malipon.css"> 
    <?php foreach ($sale as $salee):?>
<div class="ccard-header top-back">
   <ol class="breadcrumb ">
        <li><a href=<?=Yii::$app->homeUrl;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Sales Reports</li><li class="active"><?=Drugs::findone(['inv_id'=>$salee->drug_id])->drug_name;?></li>
    </ol>
  
 
   
   <span style="font-size: 16pt;color: #333333"><i class="fa fa-book fa-2x text-info"> </i> </span>
        <?= Html:: a(' Print Receipt'
          ,['/miamala/print','sale_id'=>$salee->sales_id],['class' => ' btn fa fa-file-pdf fa-lg text-white btn-success pull-right'])?>
        <?= Html:: a(' Go Back'
          ,['/miamala/reports'],['class' => ' btn fa fa-arrow-left fa-lg text-white status-info pull-right'])?>
        <?php endforeach;?>
    </div>
    
   <div class="tableBox  joi mauto half-5">
  
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
