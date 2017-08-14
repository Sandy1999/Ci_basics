<!Doctype html>
<h1>Update <?php if(isset($_SESSION['username'])) echo $this->session->userdata('username');?></h1>
<form method = "POST" action = "updt_prcs">
<label for="username">User Name:</label>
	<input type="text" name="username"><br/>
	<label for="password">Password:</label>
	<input type="password" name="password"><br/>
<button type = "submit" name = "ch_pwd" onclick = "alert('Are you sure')">Update</button>
<button type = "submit" name = "del" formaction = "del_admn" onclick = "alert('Are you sure')">Delete</button>

</form>