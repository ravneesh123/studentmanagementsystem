<?php include('header.php'); ?>
<?php include('database.php'); ?> 
   <div class="maincontainer">
        <div class= "heading1">
            <h2>User Login</h2>
        </div>
        <div class = "register">
            <form action="userLogin.php" method="POST">
                <div class = "feild-set">
                    <label>User Name :</label>
                    <input type="text" name="username" />
                </div>
                <div class = "feild-set">
                    <label>Password :</label>
                    <input type="password"  name="password" />
                </div>
                <div class="field-set">
                    <input type="submit" value="Login"/>
                </div>
            </form>
        </div>
    </div>
<?php include('footer.php'); ?>
