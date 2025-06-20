<?php include('header.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    jQuery(document).ready(function(){
        jQuery('#username').on('keyup' , function(){
            var username = jQuery(this).val();
            $.ajax({
                url: 'checkusername.php',
                type: 'POST',
                data : {
                    query: username
                },
                success :function(response){
                    if(response == 'exists'){
                        alert('Username already exists');
                        jQuery('#submitbttn').prop('disabled', true);
                    }else {
                        jQuery('#submitbttn').prop('disabled', false);
                    }
                }
            })
        });
    });
</script>
   <div class="maincontainer">
        <div class= "heading1">
            <h2>Register Form</h2>
        </div>
        <div class = "register">
            <form action="userRegister.php" method="POST">
                <div class = "feild-set">
                    <label>User Name :</label>
                    <input type="text" name="username" id = "username" />
                </div>
                <div class = "feild-set">
                    <label>Password :</label>
                    <input type="password"  name="password" />
                </div>
                <div class = "feild-set">
                    <label>Email :</label>
                    <input type="email" name="email" />
                </div>
                <div class="field-set">
                    <input type="submit" value="Submit" id = "submitbttn"/>
                </div>
            </form>
        </div>
    </div>
<?php include('footer.php'); ?>
