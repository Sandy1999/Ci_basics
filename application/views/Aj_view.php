<!doctype html>
<html>
    <head>
        <title>Ajax Test</title>
       <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
       <script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script> 
    </head>
    <body>
    <script>
    function getstatedetails(nm){
        //alert('<?php echo base_url();?>/index.php/ajtest/ajx_state_list/'+nm);
        $.ajax({
            type:"POST",
            url:'<?php echo base_url();?>/index.php/ajtest/ajx_state_list/'+nm,
            data : nm='cat_nm',
            success:function(data){
                $('#state').empty();
                $('#state').append(data);
            },
        });
    }
    function getcitydetails(nm){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url();?>/index.php/ajtest/ajx_city_list/'+nm,
            data : nm='cat_nm',
            success:function(data){
                $('#city').html(data);
            },
        });
    }
    </script>
        <?php if(!empty($country)){ ?>
            <select id="country" onChange="getstatedetails(this.value)"><option vlaue =" ">Countries</option>
         <?php  foreach($country as $count){
                echo"<option value=\"".$count['country']."\">".$count['country']."</option>";
            }
            echo"</select><br/><br/>";
            echo"<select id=\"state\" onChange=\"getcitydetails(this.value)\"><option vlaue =\"\">Select  States</option>";
            echo"</select><br/><br/>";
            echo"<select id=\"city\"><option vlaue =\"\">Select City</option>";
            echo"</select>";

        } ?>
    </body>
    <script>
    /*
         $(document).on("change", '#country', function(e) {
            var country = $(this).val();
            var url = '<?php echo base_url();?>welcome/ajax_state_list ';
           // alert('http://localhost/blog_sm_ci/index.php/Ajtest/ajx_test/'+country);
           alert(url);
        $.ajax({
            type: "POST",
            data:"ajx_test/country" ,
            url: 'http://localhost/blog_sm_ci/index.php/Ajtest/ajx_test/'+country,
           // dataType: 'str',
            success: function(str) {
                var $el = $("#state");
                $el.empty(); // remove old options
                $el.append($("<option></option>")
                        .attr("value", '').text('Please Select'));
                    var test = ['LTS','INC'];
                   // alert(str);
                $.each(test,function(index,value) {
                    $el.append($("<option></option>")
                            .attr("value", value).text(value)); 
                });                                                     
            }
        }); 
       
    }); */
    </script>
</html>
