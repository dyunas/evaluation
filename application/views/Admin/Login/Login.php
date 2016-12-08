<body class="login-layout">
<section>
  <div class="main-container">
    <div class="main-content">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="login-container">
		    <div class="center">
		  	  <h1>
		  		<span class="red">The</span>
		  		<span class="white" id="id-text2">Evaluator</span>
		  	  </h1>
		  	  <h4 class="red" id="id-company-text">&copy; Colegio de San Pedro</h4>
		  	</div><!-- center -->

		  	<div class="space-6"></div><!-- space-6 -->

		  	<div class="position-relative">
		  	  <div id="login-box" class="login-box visible widget-box no-border">
		  	    <div class="widget-body">
		  	      <div class="widget-main">
		  	        <h4 class="header red lighter bigger">
					  <i class="ace-icon fa fa-sign-in red"></i>
					  Log-in here
					</h4>

					<span class="help-block" style="color: #ff0000"><?php echo $this->session->flashdata('error'); ?></span>

					<div class="space-6"></div><!-- space-6 -->

					<?php echo form_open('admin/auth_login'); ?>
					  <fieldset>
					    <label class="block clearfix">
					      <span class="block input-icon input-icon-right">
						    <input type="text" class="form-control" name="uname" maxlength="16" placeholder="Username" />
						    <i class="ace-icon fa fa-user"></i>
						  </span><!-- block input-icon input-icon-right -->
						</label><!-- block clearfix -->

						<label class="block clearfix">
					      <span class="block input-icon input-icon-right">
						    <input type="password" class="form-control" name="pword" maxlength="16" placeholder="Password" />
						    <i class="ace-icon fa fa-lock"></i>
						  </span><!-- block input-icon input-icon-right -->
						</label><!-- block clearfix -->

						<div class="space"></div><!-- space -->

						<div class="clearfix">
						  <label class="inline">
						    <input type="checkbox" class="ace" />
							<span class="lbl"> Remember Me</span>
						  </label><!-- inline -->

						  <button type="submit" name="submit" class="width-35 pull-right btn btn-sm btn-danger">
						    <i class="ace-icon fa fa-key"></i>
						    <span class="bigger-110">Login</span>
						  </button>
						</div><!-- clearfix -->

						<div class="space-4"></div><!-- space-4 -->
					  </fieldset>
					<?php echo form_close(); ?>
		  	      </div><!-- widget-main -->
		  	    </div><!-- widget-body -->
		  	  </div><!-- login-box visible widget-box no-border -->
		  	</div><!-- position-relative -->

		  	<div class="navbar-fixed-top align-right">
			  <br />
			  &nbsp;
			  <a id="btn-login-dark" href="#">Dark</a>
			  &nbsp;
			  <span class="blue">/</span>
			  &nbsp;
			  <a id="btn-login-blur" href="#">Blur</a>
			  &nbsp;
			  <span class="blue">/</span>
			  &nbsp;
			  <a id="btn-login-light" href="#">Light</a>
			  &nbsp; &nbsp; &nbsp;
			</div>
		  </div><!-- login-container -->
        </div><!-- col-sm-10 col-sm-offset-1 -->
      </div><!-- row -->
    </div><!-- main-content -->
  </div><!-- main-container -->

  <!-- basic scripts -->

  <!--[if !IE]> -->
    <script src="assets/js/jquery.2.1.1.min.js"></script>
  <!-- <![endif]-->

  <!--[if IE]>
    <script src="<?php echo base_url('assets/js/jquery.1.11.1.min.js'); ?>"></script>
  <![endif]-->

  <!--[if !IE]> -->
	<script type="text/javascript">
	  window.jQuery || document.write("<script src='<?php echo base_url('assets/js/jquery.min.js'); ?>'>"+"<"+"/script>");
    </script>
  <!-- <![endif]-->

  <!--[if IE]>
    <script type="text/javascript">
      window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
    </script>
  <![endif]-->

  <script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url('assets/js/jquery.mobile.custom.min.js'); ?>'>"+"<"+"/script>");
  </script>

  <!-- inline scripts related to this page -->
  <script type="text/javascript">
    jQuery(function($) {
      $('#btn-login-dark').on('click', function(e) {
	    $('body').attr('class', 'login-layout');
	    $('#id-text2').attr('class', 'white');
	    $('#id-company-text').attr('class', 'red');
				
	    e.preventDefault();
	  });

	  $('#btn-login-light').on('click', function(e) {
	    $('body').attr('class', 'login-layout light-login');
		$('#id-text2').attr('class', 'dark');
		$('#id-company-text').attr('class', 'red');
				
		e.preventDefault();
      });
	
	  $('#btn-login-blur').on('click', function(e) {
	    $('body').attr('class', 'login-layout blur-login');
		$('#id-text2').attr('class', 'white');
		$('#id-company-text').attr('class', 'red');
				
	    e.preventDefault();
	  });
    });
  </script>
</section>
</body><!-- login-layout -->