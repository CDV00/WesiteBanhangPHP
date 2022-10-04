
<?php
    $img=$data['img'];
    $name =$data['name'];
    $paging=$data['paging'];

?>





<a class="btn btn-primary" href="#" role="button">Tất cả sản phẩm</a>
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
      <th scope="col">Image</th>
      <th scope="col">ImageName</th>
      <th scope="col">Status</th>
      <th scope="col">Trash</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i=1;
      for($a=0;$a<count($img);$a++){
    ?>

    <tr>
      <th scope="row"><?php echo $i++ ?></th>
      <td><?php echo $img[$a] ?></td>
      <td><?php echo $name[$a] ?></td>

      <td>
        <a href="<?php echo BASE_URL?>adminproduct/productToggleStatus/<?php echo 'productId'?>">
          <?php 
            if('status'==1)
              echo'<i class="fas fa-check text-primary"></i>'; 
            else 
              echo'<i class="fas fa-times text-danger"></i>'; 
          ?>
        </a>
      </td>

    
      <td><?php echo 'trash' ?></td>
      <td>
        <a href="<?php echo BASE_URL?>adminproduct/productToggleTrash/<?php echo 'productId'?> " onclick="return confirm('Bạn có chắc chăn xóa sản phảm này?');">Xóa</a> |
        <a href='<?php echo BASE_URL.'adminproduct/updateProduct/'.'productId'?>'>Sửa</a>
      </td>
    </tr>
    <?php }?>

  </tbody>
</table>
<?php $paging->createLinks()?>
