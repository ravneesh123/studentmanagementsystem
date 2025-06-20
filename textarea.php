<?php include('header.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
.result {
    text-align: left;
}

</style>
<script>
    jQuery(document).ready(function(){
        jQuery('.text').on('submit', function(event){
            event.preventDefault();

            var message = jQuery('#message').val();

            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                data: { 
                    query: message 
                },
                success: function (data) {
                    jQuery('.rsult').html(data);
                }
            });
            jQuery('.rsult').html(message);
        });
    });
</script>

<div class="maincontainer" style="min-height: 1000px;">
    <div class="heading1">
        <h1>Textarea</h1>     
    </div>
    <div class="all-course">
        <form class = "text">
            <div class="feild-set">
                <textarea id="message" name="message"  required>SELECT * FROM `studentsinfo`</textarea>
            </div>
            <div class="feild-set">
                <input type="submit" name="submit">         
            </div>
        </form>
        
        <div class= "result">
            <h1>Result</h1>
            <div class="rsult">

            </div>

        </div>

    </div>
</div>
<?php include('footer.php'); ?>