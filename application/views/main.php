<?php if($this->session->flashdata('updated')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('updated') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('registered')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('registered') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('logged_out')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('logged_out') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('need_login')) : ?>
    <?php echo '<p class="text-error">' .$this->session->flashdata('need_login') . '</p>'; ?>
<?php endif; ?>

<h1>Welcome to user registration form</h1>
<p>If you already has an account please log in by entering your username and password above.
If not please create an account by clicking on Register.</p>