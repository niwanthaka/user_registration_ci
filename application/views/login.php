<?php if($this->session->userdata('logged_in')) : ?>
    <p>You are logged in as <?php echo $this->session->userdata('username'); ?></p>
    <!--Start Form-->
    <?php $attributes = array('id' => 'logout_form',
                          'class' => 'form-horizontal'); ?>
    <?php echo form_open('user/logout',$attributes); ?>
         <!--Submit Buttons-->
    <?php $data = array("value" => "Logout",
                    "name" => "submit",
                    "class" => "btn btn-primary"); ?>
    <?php echo form_submit($data); ?>
    <?php echo form_close(); ?>
<?php else : ?>

<?php if($this->session->flashdata('login_failed')) : ?>
    <?php echo '<p class="text-error">' .$this->session->flashdata('login_failed') . '</p>'; ?>
<?php endif; ?>

<?php echo form_open('user/login',array('id'=>'login_form')); ?>

<p>Username :
<?php echo form_input(array('name'=>'username','placeholder'=>'Username','value'=>set_value('username'))); ?> <!--username-->
</p>
<p>Password :
<?php echo form_password(array('name'=>'password','placeholder'=>'Password','value'=>set_value('password'))); ?><!--password-->
</p>
<p>
<?php echo form_submit(array('name'=>'sbm_btn','value'=>'Login')); ?>
</p>
<?php echo form_close(); ?>

<?php endif; ?>

