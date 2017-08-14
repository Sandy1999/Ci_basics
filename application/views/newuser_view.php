<?php 
// if(!empty($country)) print_r($country); exit;
?>
<!Doctype html>
<html>
    <head>
        <title>New User</title>
        <script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
              crossorigin="anonymous"></script> 
    </head>
    <body>
        <script>
            function getstatedetails(id){
               // alert('<?php echo base_url();?>/index.php/user_cont/ajx_state/'+id);
                 $.ajax({
                    type:"POST",
                    url:'<?php echo base_url();?>/index.php/user_cont/ajx_state/'+id,
                    data : id='cat_id',
                    success:function(data){
                     //   alert(data);
                        $('#state').empty();
                        $('#state').append(data);
                    },
                });
            }
            function getcitydetails(id){
                   // alert('<?php echo base_url();?>/index.php/user_cont/ajx_city/'+id);
                $.ajax({
                    type:"POST",
                    url:'<?php echo base_url();?>/index.php/user_cont/ajx_city/'+id,
                    data : id = 'cat_id',
                    success:function(data){
                       // alert(data);
                        $('#city').html(data);
                    }
                });
            }
            </script>
        <h1>Create New User</h1>
        <form method="POST" action="user_cont/create">
            <fieldset>
                <legend>New User</legend>
                <label>Name:</label><br/>
                <input type="text" name="name"><br/>
                <label>Email:</label></br>
                <input type="email" name="email"><br/>
                <label>Mobile Number:</label><br/>
                <input type="text" name="number"><br/>
                <label>Country:</label>
                <select id="country" onchange="getstatedetails(this.value)" name="country">
                <option value="">Select Countries</option>
                <?php 
                if(!empty($country)){
                    foreach($country as $count){
                        echo"<option value = \"".$count['country_id']."\">".$count['country_name']."</option>";
                    }
                }
                ?>
                </select><br/>
                <label>State:</label>
                <select id="state" onchange="getcitydetails(this.value)" name="state"></select><br/>
                <label>City:</label>
                <select id="city" name="city" onchange="" name="city" ></select><br/>
                <button type="submit" name="new_user">Create</button>
            </fieldset>
        </form>
    </body>
</html>