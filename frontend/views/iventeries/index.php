 <div class="content">
   <ol class="breadcrumb ">
        <li><a href=<?=Yii::$app->homeUrl;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">catName</li>
    </ol>
  <div class="tableBox" >
    <table id="dataTable" class="table table-bordered table-striped" style="z-index: -1">
      <thead>
        <th>#</th>
        <th>Name</th>
        <th>Unit</th>
        <th>Price Per Unit</th>
        <th>Expire Date</th>
        <th>Supplier Name</th>
        <th>Company</th>
        <th></th>

      </thead>
     <tbody>
      
       
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>


              <td colspan="center"><i class="fa fa-folder-open fa-fw"></i><?= Html:: a("Delete Item",['/miamala/profile'],['class' => 'btn btn-danger btn-xs']) ?></td>
          </tr>
      
     </tbody>
    </table>
  </div>

  </div>  <!-- ending tag for content -->
