<?php
    $brands=$data['brands'];
    $paging =$data['paging'];


?>


<a class="btn btn-primary" href="#" role="button">Thùng rác</a>
<div class="row button btn-warning">
  <?php
      if(!empty($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
  ?>
</div>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">BrandId</th>
      <th scope="col">BrandName</th>
      <th scope="col">Status</th>
      <th scope="col">Trash</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i=1;
      foreach($brands as $b){
    ?>

    <tr>
      <th scope="row"><?php echo $i++ ?></th>
      <td><?php echo $b['brandId'] ?></td>
      <td><?php echo $b['brandName'] ?></td>

      <td>
        <a href="<?php echo BASE_URL?>adminbrand/brandToggleStatus/<?php echo $b['brandId']?>">
          <?php 
            if($b['status']==1)
              echo'<i class="fas fa-check text-primary"></i>'; 
            else 
              echo'<i class="fas fa-times text-danger"></i>'; 
          ?>
        </a>
      </td>

      <td><?php echo $b['trash'] ?></td>
      <td>
        <a href="<?php echo BASE_URL?>adminbrand/brandDelete/<?php echo $b['brandId']?>" onclick="return confirm('Bạn có chắc chăn xóa vĩnh viễn sản phảm này?');">Xóa vĩnh viễn</a> |
        <a href='<?php echo BASE_URL.'adminbrand/brandUnTrash/'.$b['brandId']?>'onclick="return confirm('Bạn có chắc chăn khôi phục sản phảm này?');">khôi phục</a>
      </td>
    </tr>
    <?php }?>

  </tbody>
</table>
<?php $paging->createLinks()?>
