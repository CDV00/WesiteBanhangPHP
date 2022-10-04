
<div class="col-md-9">
    <h2>CHECK OUT</h2>
    <div class="row bnt-success">
        <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>
    </div>
    <div class="row">
        <form action="" method=post>
            <table>
                <tr>
                    <td class="col-md-3">
                        <label for="inputProductName">Họ & Tên</label>
                    </td>
                    <td><input type="text" name="inputFullname" required></td>
                </tr>

                <tr>
                    <td class="col-md-3">
                        <label for="inputProductName">Địa Chỉ</label>
                    </td>
                    <td><input type="text" name="inputAddress" required></td>
                </tr>

                <tr>
                    <td class="col-md-3">
                        <label for="inputProductName">Số Điện Thoại</label>
                    </td>
                    <td><input type="phone" name="inputPhone" required></td>
                </tr>

                <tr>
                    <td class="col-md-3">
                        <label for="inputProductName">Email</label>
                    </td>
                    <td><input type="email" name="inputEmail" required></td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputProductName">Ghi Chú</label>
                    </td>
                    <td><textarea name="inputNote" cols="50" rows="5"></textarea></td>
                </tr>
                
                <tr>
                    <td>
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