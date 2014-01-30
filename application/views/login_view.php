<div class="error"><?php echo validation_errors();?></div>
    
    <?php
    $message = $this->session->userdata('message');
    if ($message!=NULL) {
        ?>
<div class="info">
    <strong><?php echo $message;?>!</strong>   
</div>
      
  <?php      
  $this->session->unset_userdata('message');
    }
    ?>
    <?php  $error = $this->session->userdata('error');
    if ($error!=NULL) { ?>
        <div class="error">
            <strong>Error!</strong> <?php echo $error;?>
        </div>
    <?php $this->session->unset_userdata('error');} ?>

<?php echo form_open('login','class="form-1"');?>

   <p class="field"> <?php 
    echo form_input('email_address','','id="email_address" placeholder="Email Address"');
    echo '<i class="icon-user icon-large"></i>';
?>
</p>
<p class="field">
<?php 
    
    echo form_password('password','','id="password" placeholder="Password"');
    echo '<i class="icon-lock icon-large"></i>';
?>
</p>
<p class="submit">
    <?php 
    $data = array(
    'name' => 'button',
    'id' => 'button',
    'value' => 'true',
    'type' => 'submit',
    'content' => '<i class="icon-arrow-right icon-large"></i>'
);

echo form_button($data);
    echo form_close();
?></p>
