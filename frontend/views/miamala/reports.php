<?php
use common\models\Seller;
use common\models\User;
use frontend\models\Drugs;
use yii\helpers\Html;
?>
     <link rel="stylesheet" href="/css/tables.css"> 
 <div class="card-header top-back">
   <ol class="breadcrumb ">
        <li><a href=<?=Yii::$app->homeUrl;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Reports</li>
    </ol>
  <!-- </div>
  <div class="card-header"> -->
   <span style="font-size: 12pt;color: #333333"><i class="fa fa-search fa-2x text-info"> </i></span>
   <?= Html:: a(' Sales Report'
          ,['/miamala/sales-report'],['class' => ' btn fa fa-file-pdf-o fa-lg text-white btn-success pull-right'])?>  
    <!-- SEARCH BOX -->
    <div class="pull-left form-inline">  
  <input class=" form-control md fa fa-search fa-lg text-info" id="tableSearch" type="text"
    placeholder="Search Here">
  </div> </div>
      <!-- TABLE DATA -->
  <div class="tableBox">
    <table id="dataTable" class="table table-bordered table-striped" style="z-index: -1">
      <thead>
        <th>#</th>
        <th>Date Performed</th>
        <th>Sold By:</th>
        <th>Drug Name</th>
        <th>Quantity Sold</th>
        <th>Amount Earned(TSH)</th>
        <th>Action</th>
      </thead>
     <tbody id="myTable">
     <?php 
     $i=1;
     $amount=0;
     $quantity=0;
     foreach($report as $report): ?>
          <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $report->date;?></td>
            <td><?php echo User::findone(['id'=>Seller::findone(['id'=> $report->seller_id])->log_id])->username;?></td>
            <td><?php echo Drugs::findone(['inv_id'=>$report->drug_id])->drug_name;?></td>
            <td><?php echo $report->quantity;?></td>
            <td><?php echo $report->amount;?></td>
          
             <td>
              <?= Html:: a("",['/miamala/print' , 'sale_id'=>$report->sales_id],['class' => 'btn text-dark btn-sm fa fa-download fa-lg']) ?>
               <?= Html:: a("",['/miamala/view' , 'sale_id'=>$report->sales_id],['class' => 'btn  text-info  btn-sm fa fa-eye fa-lg']) ?>
            </td>
          </tr>
          <?php 
          $amount= $amount + $report->amount;
          $quantity=$quantity + $report->quantity;?> 
          <?php endforeach;  
         if(Yii::$app->user->identity->role > 9):?>
          <tr class="bold">
            <td><?php echo $i;?></td>
            <td><h4>TOTAL SALES AMOUNT</h4></td>
            <td></td>
            <td></td>
            <td><?php echo $quantity;?></td>
            <td><?php echo $amount;?></td>
            </tr>
            <?php endif;?>
      
     </tbody>
    </table>
  </div>
  </div>  <!-- ending tag for content -->
