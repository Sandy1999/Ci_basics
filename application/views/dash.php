<!Doctype html>
<?php if(isset($_SESSION['message'])) echo $this->session->flashdata('message'); ?>
<h1>Welcome to Dashboard <?php if(isset($_SESSION)) echo $this->session->userdata('username');?></h1>
<form method = "POST" action = "dash_cont/update_admins">
<button type = "submit" name = "ch_pwd">Update Admin </button>
<button name = "logout" formaction="dash_cont/lg_out">Log Out</button>
</form>