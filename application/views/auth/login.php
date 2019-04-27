<?php $this->load->view( "incs/header", [ "data" => $this->data ] ); ?>
<?php $rand = random_int(10,99) ; ?>
    <div class="login" style="background-image:url('https://images.pexels.com/photos/3735<?php echo $rand?>/pexels-photo-3735<?php echo $rand?>.jpeg?auto=compress&cs=tinysrgb&h=1000') ;">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="div login-block">

                <div class="login-title mb-5">
                    <h1><?php echo lang( 'login_heading' ); ?></h1>
                    <p><?php echo lang( 'login_subheading' ); ?></p>
                </div>

                <div id="infoMessage"><?php echo $message; ?></div>

				<?php echo form_open( "auth/login" ); ?>

                <p>
					<?php echo lang( 'login_identity_label', 'identity' ); ?>
					<?php echo form_input( $identity , '',['class'=>'form-control']); ?>
                </p>

                <p>
					<?php echo lang( 'login_password_label', 'password' ); ?>
					<?php echo form_input( $password ,'',['class'=>'form-control']); ?>
                </p>

                <p>
					<?php echo lang( 'login_remember_label', 'remember' ); ?>
					<?php echo form_checkbox( 'remember', '1', false, 'id="remember"' ); ?>
                </p>


                <p><?php echo form_submit( 'submit', lang( 'login_submit_btn' ) ,[ 'class' => 'btn btn-primary',]); ?></p>

				<?php echo form_close(); ?>

                <p><a href="forgot_password"><?php echo lang( 'login_forgot_password' ); ?></a></p>
            </div>
        </div>
    </div>
<?php $this->load->view( "incs/footer" ) ?>