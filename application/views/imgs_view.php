<?php if(isset($_SESSION['message'])) echo $this->session->flashdata('message'); ?>
<!Doctype html>
<h1>Images Present in Gallery</h1>
<?php
    if(!empty($imgarr)){
        $output ="";
        foreach($imgarr as $img){
            $output.="<img src=\"../../uploads/".$img['image']."\"";
            $output.=" widht=\"200\" height=\"200\"><br/>";
            $output.= anchor(base_url().'index.php/img_cont/img_updt/'.$img['imgid'],'Update')."<br/>";
        }
        echo $output; 
    }else echo "No Images Uploaded";
?>