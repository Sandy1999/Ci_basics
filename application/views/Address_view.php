<!Doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Address</title>
    </head>
    <body>
        <h1>Enter New Country State and City</h1>
        <?php if(isset($_SESSION['message'])){
            echo $this->session->flashdata('message');
}
?>
        <form method="POST" action="address_cont">
            <label>Country:</label><br/>
            <input type="text" name="country" value="<?php set_value('country')?>" required ><br/>
            <button type="submit" name="country_btn">Add New Country</button>
        </form>
        <hr/>
         <?php if(isset($_SESSION['message'])){
            echo $this->session->flashdata('message');
}
?>
        <form method ="POST" action="address_cont">
            <label>Country:</label><br/>
            <select name = "country"><option value="">Select Country</option>
            <?php
            if(isset($country)){
                foreach($country as $cont){
                    echo"<option value = \"".$cont['country_id']."\">".$cont['country_name']."</option>";
                }
            } 
            ?>
            </select><br/>
            <label>State</label><br/>
            <input type="text" name="state" required><br/>
            <button type="submit" name="state_btn">Add New State</button>
        </form>
        <hr/>
        <form method="POST" action="address_cont">
            <label>State:</label><br>
            <select name = "state"><option value="">Select State</option>
            <?php
            if(isset($state)){
                foreach($state as $st){
                    echo"<option value = \"".$st['state_id']."\">".$st['state_name']."</option>";
                }
            } 
            ?>
            </select><br/>
            <label>City:</label><br/>
            <input type="text" name="city" required><br/>
            <button type="submit" name="city_btn">Add New City</button>
        </form>
    </body>
</html>