<body class="no-skin">
  <div id="navbar" class="navbar navbar-red">
	<script type="text/javascript">
	  try{ace.settings.check('navbar' , 'fixed')}catch(e){}
	</script>

		<div class="navbar-container" id="navbar-container">
		  <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
		    <span class="sr-only">Toggle sidebar</span>

				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
		  </button>

		  <div class="navbar-header pull-left">
		    <a href="<?php echo site_url('student/dashboard'); ?>" class="navbar-brand">
				  <small>
				    <i class="fa fa-user"></i>
				      <span class="red">The</span> Evaluator
				  </small>
				</a>
		  </div><!-- navbar-header -->

		  <div class="navbar-buttons navbar-header pull-right" role="navigation">
		    <ul class="nav ace-nav">
					<?php extract($acc_dtls); ?>
		      <li class="red">
		        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
		          <?php if ($photo): ?>
		          	<img class="nav-user-photo" src="<?php echo base_url('assets/uploads/profile/'.$photo); ?>" height="36" width="36" />
		          <?php else: ?>
		          	<img class="nav-user-photo" src="<?php echo base_url('assets/avatars/user.jpg'); ?>" />
		          <?php endif; ?>
							<span class="user-info">
							  <small>Welcome</small>
							  <?php echo $fname.' '.$lname; ?>
							 </span>
				  		<i class="ace-icon fa fa-caret-down"></i>
		        </a>

		        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						  <li>
						    <a href="<?php echo site_url('student/account_settings/edit_profile'); ?>">
							  <i class="ace-icon fa fa-cog"></i>
							  Account Settings
							</a>
						  </li>

						  <li>
							<a href="<?php echo site_url('student/dashboard'); ?>">
							  <i class="ace-icon fa fa-user"></i>
							  Profile
							</a>
						  </li>

						  <li class="divider"></li>

						  <li>
							<a href="<?php echo site_url('user/logout'); ?>">
							  <i class="ace-icon fa fa-power-off"></i>
							  Logout
							</a>
						  </li>
						</ul><!-- user-menu -->
		      </li><!-- red -->
		    </ul><!-- nav ace-nav -->
		  </div><!-- navbar-buttons -->

		</div><!-- navbar-container -->
  </div><!-- navbar -->

  <div class="main-container" id="main-container">
    <script type="text/javascript">
		  try{ace.settings.check('main-container' , 'fixed')}catch(e){}
		</script>

	<div id="sidebar" class="sidebar responsive">
	  <script type="text/javascript">
	    try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	  </script>

	  <ul class="nav nav-list">
			<li class="active">
			  <a href="<?php echo site_url('student/dashboard'); ?>">
			    <i class="menu-icon fa fa-home"></i>
				<span class="menu-text"> Dashboard</span>
			  </a>

			  <b class="arrow"></b>
			</li><!-- dashboard -->

			<li class="">
			  <a href="<?php echo site_url('student/evaluate'); ?>">
			    <i class="menu-icon fa fa-pencil"></i>
				<span class="menu-text"> Evaluate</span>
			  </a>

			  <b class="arrow"></b>
			</li><!-- evaluate -->

			<li class="">
			  <a href="<?php echo site_url('student/evaluation_logs'); ?>">
			    <i class="menu-icon fa fa-folder-open-o"></i>
				<span class="menu-text"> Review Evaluation</span>
			  </a>

			  <b class="arrow"></b>
			</li><!-- review evaluation -->
	  </ul>

	  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
			<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	  </div>

	  <script type="text/javascript">
	    try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	  </script>
	</div><!-- sidebar -->

	<div class="main-content">
	  <div class="main-content-inner">
			<div class="breadcrumbs" id="breadcrumbs">
			  <script type="text/javascript">
			    try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			  </script>

			  <ul class="breadcrumb">
					<li>
					  <i class="ace-icon fa fa-home home-icon"></i>
					  <a href="<?php echo site_url('student/dashboard'); ?>">Dashboard</a>
					</li>
					<li class="">
						<a href="#">Account Settings</a>
					</li>
					<li class="active">Change Password</li>
			  </ul><!-- /.breadcrumb -->
			</div><!-- breadcrumbs -->

			<div class="page-content">
			  <div class="page-header">
			    <h1>
			      Account Settings
			      <small>
			        <i class="ace-icon fa fa-angle-double-right"></i>
							Change Password
			      </small>
			    </h1>
			  </div><!-- page-header -->

			  <div class="row">
			  	<div class="col-xs-12">
			      <?php if($this->session->flashdata('error')): ?>
			      	<span class="help-block">
			      	  <?php
			      	  echo '<div class="alert alert-danger">
			      	  	<button type="button" class="close" data-dismiss="alert">
									  <i class="ace-icon fa fa-times"></i>
									</button>
									<strong>
									  <i class="ace-icon fa fa-close"></i>
									  Oh snap!
									</strong>
									'.$this->session->flashdata('error').'
									</div><!-- alert -->';
			      	  ?>
			      	</span>
			      <?php endif; ?>

					  <div class="row">
					  	<div class="col-xs-12">
					  		<?php echo form_open(site_url('student/account_settings/change_pass/confirm'), 'id="password-form" class="form-horizontal"'); ?>
					  			<input type="hidden" name="user_id" value="<?php echo $stud_id; ?>" />
					  			<div class="form-group">
									  <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="opword"> Old Password: </label>

									  <div class="col-xs-12 col-sm-9">
									  	<div class="clearfix">
										  	<input type="password" id="opword" name="opword" class="col-xs-10 col-sm-6" maxlength="16"/>
											</div>
									  </div>
									</div><!-- form-group -->

									<div class="space-2"></div>

									<div class="form-group">
									  <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="npword"> New Password: </label>

									  <div class="col-xs-12 col-sm-9">
									  	<div class="clearfix">
										  	<input type="password" id="npword" name="npword" class="col-xs-10 col-sm-6" maxlength="16"/>
											</div>
									  </div>
									</div><!-- form-group -->

									<div class="space-2"></div>

									<div class="form-group">
									  <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="cnpword"> Confirm New Password: </label>

									  <div class="col-xs-12 col-sm-9">
									  	<div class="clearfix">
										  	<input type="password" id="cnpword" name="cnpword" class="col-xs-10 col-sm-6" maxlength="16"/>
											</div>
									  </div>
									</div><!-- form-group -->

									<div class="space-2"></div>

									<div class="clearfix form-actions">
									  <div class="col-md-offset-3 col-md-9">
									    <button class="btn btn-info" type="submit">
										  <i class="ace-icon fa fa-check bigger-110"></i>
										  Submit
										</button>

										<button class="btn" type="reset">
										  <i class="ace-icon fa fa-undo bigger-110"></i>
										  Clear
										</button>
										<a href="<?php echo site_url('employee/dashboard'); ?>" class="btn btn-danger">
										  <i class="ace-icon fa fa-close bigger-110"></i>
										  Cancel
										</a>
									  </div><!-- col-md-offset-3 -->
									</div><!-- clearfix -->
					  		<?php echo form_close(); ?>
					  	</div><!-- col-xs-12 -->
					  </div><!-- row -->
			    </div><!-- col-xs-12 -->
			  </div><!-- row -->
			</div><!-- page-content -->
	  </div><!-- main-content-inner -->
	</div><!-- main-content -->

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
	  <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
  </div><!-- main-container -->

  <!-- basic scripts -->

	<!--[if !IE]> -->
	<script src="<?php echo base_url('assets/js/jquery.2.1.1.min.js'); ?>"></script>
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
 	    window.jQuery || document.write("<script src='<?php echo base_url('assets/js/jquery1x.min.js'); ?>'>"+"<"+"/script>");
	  </script>
	<![endif]-->
		
	<script type="text/javascript">
	  if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url('assets/js/jquery.mobile.custom.min.js'); ?>'>"+"<"+"/script>");
	</script>
	
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

	<!-- page specific plugin scripts -->

	<!--[if lte IE 8]>
	  <script src="assets/js/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php echo base_url('assets/js/jquery-ui.custom.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.ui.touch-punch.min.js.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.flot.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.flot.pie.min.js'); ?>"></script>

	<!-- ace scripts -->
	<script src="<?php echo base_url('assets/js/ace-elements.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/ace.min.js'); ?>"></script>

	<!-- page specific plugin scripts -->
	<script src="<?php echo site_url('assets/js/fuelux.wizard.min.js'); ?>"></script>
	<script src="<?php echo site_url('assets/js/jquery.validate.min.js'); ?>"></script>
	<script type="text/javascript">
	  jQuery(function($)
	  {
		// var $validation = false;
		// $('#fuelux-wizard-container')
		// .on('actionclicked.fu.wizard' , function(e, info){
		//   if(info.step == 1 && $validation) {
		//     if(!$('#student-form').valid()) e.preventDefault();
		//   }
		// });

	  	$('#password-form').validate({
			  errorElement: 'div',
			  errorClass: 'help-block',
			  focusInvalid: false,
			  ignore: "",
			  rules: {
			  	opword: {
			  	  required: true,
			  	},
			  	npword: {
			  	  required: true,
				  	minlength: 6,
			  	},
			  	cnpword: {
			  		required: true,
			  		equalTo: "#npword"
			  	}
			  },

			  messages: {
					opword: {
					  required: "Please provide your old password."
					},
					npword: {
					  required: "Please provide a new password."
					},
					cnpword: {
					  required: "Please confirm new password.",
					  equalTo: "Password and Confirm Password do not match"
					},
		  	},
			
		  
			
			
			  highlight: function (e) {
			  	$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			  },
				
			  success: function (e) {
			  	$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
				$(e).remove();
			  },
				
			  errorPlacement: function (error, element) {
			  	error.insertAfter(element.parent());
			  },
				
			  submitHandler: function (form) {
			  	$(form).ajaxSubmit();
			  },
			  invalidHandler: function (form) {
			  }
			});
	  });
	</script>

	<!-- inline scripts related to this page -->
	<script type="text/javascript">
	  jQuery(function($) {  	
	  	//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
		//so disable dragging when clicking on label
		var agent = navigator.userAgent.toLowerCase();
		  if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
			$('#tasks').on('touchstart', function(e){
			  var li = $(e.target).closest('#tasks li');
			  if(li.length == 0)return;
			  var label = li.find('label.inline').get(0);
			  if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
			});
			
			$('#tasks').sortable({
			  opacity:0.8,
			  revert:true,
			  forceHelperSize:true,
			  placeholder: 'draggable-placeholder',
			  forcePlaceholderSize:true,
			  tolerance:'pointer',
			  stop: function( event, ui ) {
			    //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
			    $(ui.item).css('z-index', 'auto');
			  }
			});
			$('#tasks').disableSelection();
			$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
			  if(this.checked) $(this).closest('li').addClass('selected');
			  else $(this).closest('li').removeClass('selected');
			});
			
			
			//show the dropdowns on top or bottom depending on window height and menu position
			$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
			  var offset = $(this).offset();
			
			  var $w = $(window)
			  if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
			    $(this).addClass('dropup');
			  else $(this).removeClass('dropup');
			});
	  });
	</script>
</body>