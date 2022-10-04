<?php
 $cats=$data['cats'];
 $brands=$data['brands'];
 $oldproduct=$data['oldproduct'];

?>

<div class="col-md-9">
    <h2>ADD PRODUCT</h2>
    <div class="row bnt-success">
        <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>
    </div>
    <div class="row">
        <form action="" method=post enctype="multipart/form-data">
            <table>
                <tr>
                    <td class="col-md-3">
                        <label for="inputProductName">ProductName</label>
                    </td>
                    <td><input type="text" name="inputProductName"required value="<?php echo $oldproduct['productName'];?>"></td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputAlias">Alias</label>
                    </td>
                    <td><input type="text" name="inputAlias" value="<?php echo $oldproduct['Alias'];?>"></td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputCatId">Cat Name</label>
                    </td>
                    <td>
                        <select name="inputCatId" id="inputCatId">
                            <?php foreach($cats as $cat){?>
                                <option value="<?php echo $cat['catId']?>"<?php if($cat['catId']==$oldproduct['catId'])echo'selected'?>><?php echo $cat['catName']?></option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputBrandId">Brand Name</label>
                    </td>
                    <td>
                        <select name="inputBrandId" id="inputBrandId">
                            <?php foreach($brands as $brand){?>
                                <option value="<?php echo $brand['brandId']?>"<?php if($brand['brandId']==$oldproduct['brandId'])echo'selected'?>><?php echo $brand['brandName']?></option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputDetail">Chi tiết sản phẩm</label>
                    </td>
                    <td>
                        <textarea name="inputDetail" id="inputDetail" cols="50" rows="10"><?php echo $oldproduct['Detail']?></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputPrice">Price</label>
                    </td>
                    <td>
                        <input type="number" name="inputPrice" step="0.01" min=1 value="<?php echo $oldproduct['Price']?>">
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputsalePrice">Sale Price</label>
                    </td>
                    <td>
                        <input type="number" name="inputsalePrice" step="0.01"  min=0 value="<?php echo $oldproduct['salePrice']?>">
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputFileUpload">Image</label>
                    </td>
                    <td><input type="file" name="inputFileUpload">(Hình Cũ: <?php echo $oldproduct['Image']?>)</td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputStatus">Status</label>
                    </td>
                    <td>
                        <select name="inputStatus" id="inputStatus"require>
                          
                            <option value="0"<?php if($oldproduct['status']==0)echo'selected'?>>Ẩn</option>
                            <option value="1"<?php if($oldproduct['status']==1)echo'selected'?>>Hiện</option>
                        
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputTrash">Trash</label>
                    </td>
                    <td>
                        <select name="inputTrash" id="inputTrash"require>
                          
                            <option value="0"<?php if($oldproduct['trash']==0)echo'selected'?>>Không</option>
                            <option value="1"<?php if($oldproduct['trash']==1)echo'selected'?>>Trash</option>
                        
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <input type="submit" name="submit" value="submit">
                    </td>
                    <td>
                        <input type="reset" name="reset" value="reset">
                    </td>
                </tr>
            </table>
        </form>
        <p> </p>
    </div>
</div>