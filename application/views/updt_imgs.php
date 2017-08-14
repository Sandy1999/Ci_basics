<!Doctype html>
<html>
    <head>
        <title>Upload Images</title>
    </head>
    <body>
        <h1>Update Image</h1>
        <form action="<?php echo $this->uri->segment(6);?>" enctype="multipart/form-data" method="POST">
        <fieldset>
            <legend>Current Image: <?php if(isset($_SESSION['img_nm'])) echo $this->session->userdata('img_nm');?></legend>
            <p>Image file:
                <input type="hidden" name="MAX_FILE_INPUT" value="10000000"><br/>
                <input type="file" name="file_upload"><br/><br/>
                <button type="submit" name="upload" value="img_up">Update</button>
            </p>
        </fieldset>
        </form>
