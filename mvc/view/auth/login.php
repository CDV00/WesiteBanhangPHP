


<!-- <form action="<?php //echo BASE_URL ?>auth/adminLogin/" method=post>
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name=inputUsername></td>
        </tr>
        <td>Password</td>
        <td><input type="password" name=inputPassword></td>
        </tr>
        <tr>
            <td colspan=2><input type="submit" name='login' value="Login"> <input type="Reset" value=Reset></td>
        </tr>
    </table>
</form> -->

<div id="login" style='margin-top:10%;'>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form action="<?php echo BASE_URL ?>auth/adminLogin/" method=post>
                        <h3 class="text-center ">Login</h3>
                        <div class="form-group">
                            <label for="username" >Username:</label><br>
                            <input type="text" name="inputUsername" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" >Password:</label><br>
                            <input type="text" name="inputPassword" id="password" class="form-control">
                        </div>
                        <div class='btn-warning'>
                            <?php
                                if (isset($_SESSION['msg'])) {
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }
                            ?>
                        </div>
                        
                        <div class="form-group">
                            <!--label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br-->
                            <input style='float:left' type="submit" name='login' value="Login" class="btn btn-info btn-md">
                        </div>
                        <div id="register-link" class="text-right">
                            <input style='float:right; margin-bottom:20px;' type="submit" name='Register' value="Register here" class="btn btn-info btn-md">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>