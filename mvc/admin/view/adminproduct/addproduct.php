<?php
 $cats=$data['cats'];
 $brands=$data['brands'];

?>
<div class="col-md-9">
    <h2>ADD PRODUCT</h2>
    <div class="row btn-warning">
        <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>
    </div>
    <div class="row">
        <form action="" method=post enctype="multipart/form-data">
            <table>
                <tr>
                    <td class="col-md-3">
                        <label for="inputProductName">ProductName</label>
                    </td>
                    <td><input type="text" name="inputProductName" required></td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputAlias">Alias</label>
                    </td>
                    <td><input type="text" name="inputAlias"></td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputCatId">Cat Name</label>
                    </td>
                    <td>
                        <select name="inputCatId" id="inputCatId">
                            <?php foreach($cats as $cat){?>
                                <option value="<?php echo $cat['catId']?>"><?php echo $cat['catName']?></option>
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
                                <option value="<?php echo $brand['brandId']?>"><?php echo $brand['brandName']?></option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputDetail">Chi tiết sản phẩm</label>
                    </td>
                    <td>
                        <textarea name="inputDetail" id="inputDetail" cols="80" rows="10">Chi tiết sản phẩm</textarea>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputPrice">Price</label>
                    </td>
                    <td>
                        <input type="number" name="inputPrice" step="0.01" min=1>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputsalePrice">Sale Price</label>
                    </td>
                    <td>
                        <input type="number" name="inputsalePrice" step="0.01" min=1>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputFileUpload">Image</label>
                    </td>
                    <td><input type="file" name="inputFileUpload"></td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputStatus">Status</label>
                    </td>
                    <td>
                        <select name="inputStatus" id="inputStatus"require>
                          
                            <option value="0">Ẩn</option>
                            <option value="1">Hiện</option>
                        
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