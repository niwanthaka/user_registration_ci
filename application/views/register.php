<?php if(!$this->session->userdata('logged_in')) {  ?>
<h1 style="font-weight: bold;text-decoration: underline">Register for an new account</h1>
<p style="color:green;text-decoration: underline">Please fill out the form below to create an account</p>
<?php } ?>

<!--Display Errors-->
<?php echo validation_errors('<p class="error">'); ?>
 <?php echo form_open('user/register'); ?>
 
 <?php 

$contactname 		= @$user->contact_name;
$contactphone 		= @$user->contact_phone;
$address 			= @$user->address;
$email 				= @$user->email;
$dob 				= @$user->date_of_birth;
$username 			= @$user->username;
$password 			= @$user->password;
$password2 			= @$user->password2;

if( $_POST )
{
	$contactname 	= $_POST['contactname'];
	$contactphone 	= $_POST['contactphone'];
	$address 	= $_POST['address'];
	$email 		= $_POST['email'];
	$dob 		= $_POST['dob'];
	$username 	= @$_POST['username'];
	$password 	= @$_POST['password'];
	$password2	= @$_POST['password2'];
}

  ?>

<?php echo form_open('user/login',array('id'=>'login_form')); ?>

<table>
<tr>
<td>Contact Name :</td>
<td><?php echo form_input(array('name'=>'contactname','placeholder'=>'Enter your name','value'=> $contactname )); ?> </td><!--contactname-->
</p>
</tr>
<tr>
<td>Contact Phone :</td>
<td><?php echo form_input(array('name'=>'contactphone','placeholder'=>'Enter your phone number','value'=>$contactphone )); ?></td><!--contactphone-->
</tr>
<tr>
<td>Address :</td>
<td><?php echo form_input(array('name'=>'address','placeholder'=>'Enter your address','value'=>$address)); ?></td> <!--address-->
</tr>
<tr>
<td>Email :</td>
<td><?php echo form_input(array('name'=>'email','placeholder'=>'Enter your email address','value'=>$email)); ?></td> <!--email-->
</tr>
<tr>
<td>Date of Birth :</td>
<td><?php echo form_input(array('name'=>'dob','id'=>'datepicker','placeholder'=>'Enter your date of birth','value'=>$dob )); ?></td> <!--dob-->
</tr>
<?php if(!$this->session->userdata('logged_in')) : ?>
<tr>
<td>UserName :</td>
<td><?php echo form_input(array('name'=>'username','placeholder'=>'Please enter a username','value'=>$username )); ?></td><!--username-->
</tr>
<?php endif; ?>
<tr>
<td colspan=2 ><?php if($this->session->userdata('logged_in')) : echo  "If you want to change the password,please enter below"; endif;?></td>
</tr>
<tr>
<td>Password :</td>
<td><?php echo form_password(array('name'=>'password','placeholder'=>'Please enter a Password')); ?></td><!--password-->
</tr>
<tr>
<td>Confirm Password :</td>
<td><?php echo form_password(array('name'=>'password2','placeholder'=>'Please repeat the Password')); ?></td><!--password2-->
</tr>

<tr></tr>
<tr>
<td align="center" colspan=2>	
<?php if(!$this->session->userdata('logged_in')) echo form_submit(array('name'=>'sbm_btn','value'=>'Login')); else echo form_submit(array('name'=>'sbm_btn','value'=>'Update'));?>
<td>
</tr>
<?php echo form_close(); ?>
</table>

 