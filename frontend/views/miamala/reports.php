<?php

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
        <th>Name Of Product/th>
        <th>quantity Purchased</th>
        <th>Amount Payed</th>
        <th>Transaction By:</th>
        <th>Date</th>
        <th>Action</th>

      </thead>
     <tbody>
      
       
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
             <td colspan="center"><i class="fa fa-edit fa-lg text-primary"></i><?= Html:: a("update",['/miamala/profile'],['class' => 'btn btn-success btn-xs']) ?>

              <i class="fa fa-print fa-lg text-dark"></i><?= Html:: a("print",['/miamala/profile'],['class' => 'btn btn-info btn-xs']) ?>

            </td>
          </tr>
      
     </tbody>
    </table>
  </div>

  </div>  <!-- ending tag for content -->
