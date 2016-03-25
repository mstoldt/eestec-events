<?php include 'header.php'; ?>
<?php

$this->load->helper(array('form', 'url'));
// Open form and set URL for submit form
echo form_open('violetta/events/data_submitted');

// Show Email Field in View Page
echo form_label('User email:', 'u_email');
$data= array(
'type' => 'email',
'name' => 'u_email',
'placeholder' => 'Please Enter Email Address',
'class' => 'input_box'
);
echo form_input($data);

// Show Name Field in View Page
echo form_label('Password :', 'u_pass');
$data= array(
'type' => 'password',
'name' => 'u_pass',
'placeholder' => 'Please Enter your password',
'class' => 'input_box'
);
echo form_input($data);
?>
</div>

<div id="form_button">
<?php
$data = array(
'type' => 'submit',
'value'=> 'Submit',
'class'=> 'submit'
);
echo form_submit($data); ?>
</div>


<?php echo form_close();?>


<?php if(isset($user_password) && isset($user_email_id)){
echo "<div id='content_result'>";
echo "<div id='result_show'>";
echo "<label class='label_output'>Entered Email: </label>".$user_email_id;
echo "<label class='label_output'>Entered password : </label>".$user_password;
echo "<div>";
echo "</div>";
} ?>
</div>
</div>
<?php include 'footer.php'; ?>
