<?php
use common\models\Seller;
use common\models\User;

use frontend\models\Drugs;
use yii\helpers\Html;
?>
 <div class="content">
   <ol class="breadcrumb ">
        <li><a href=<?=Yii::$app->homeUrl;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Reports</li>
    </ol>
  <div class="tableBox" >
    <table id="dataTable" class="table table-bordered table-striped" style="z-index: -1">
      <thead>
        <th>#</th>
        <th>Drug Name</th>
        <th>Quantity Purchased</th>
        <th>Amount Payed</th>
        <th>Sold By:</th>
        <th>Date Performed</th>
        <th>Action</th>
      </thead>
     <tbody>
     <?php 
     $i=1;
     foreach($report as $report): ?>
          <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo Drugs::findone(['inv_id'=>$report->drug_id])->drug_name;?></td>
            <td><?php echo $report->quantity;?></td>
            <td><?php echo $report->amount;?></td>
            <td><?php echo User::findone(['id'=>Seller::findone(['id'=> $report->seller_id])->log_id])->username;?></td>
            <td><?php echo $report->date;?></td>
             <td>
              <i class="fa fa-print fa-lg text-dark"></i><?= Html:: a("print",['/miamala/profile'],['class' => 'btn btn-info btn-xs']) ?>
            </td>
          </tr>
          <?php endforeach; ?>  
     </tbody>
    </table>
  </div>

  </div>  <!-- ending tag for content -->
