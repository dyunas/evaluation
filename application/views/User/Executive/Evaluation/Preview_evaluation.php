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
		    <a href="<?php echo site_url('executive/dashboard'); ?>" class="navbar-brand">
				  <small>
				    <i class="fa fa-user"></i>
				      <span class="red">The</span> Evaluator
				  </small>
				</a>
		  </div><!-- navbar-header -->

		  <div class="navbar-buttons navbar-header pull-right" role="navigation">
		    <ul class="nav ace-nav">
		      <li class="red">
		        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
		          <img class="nav-user-photo" src="<?php echo base_url('assets/avatars/user.jpg'); ?>" alt="Jason's Photo" />
							<span class="user-info">
							  <small>Welcome</small>
							  <?php extract($acc_dtls); ?>
							  <?php echo $fname.' '.$lname; ?>
							 </span>
				  		<i class="ace-icon fa fa-caret-down"></i>
		        </a>

		        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						  <li>
						    <a href="<?php echo site_url('executive/account_settings/edit_profile'); ?>">
							  <i class="ace-icon fa fa-cog"></i>
							  Account Settings
							</a>
						  </li>

						  <li>
							<a href="<?php echo site_url('executive/profile'); ?>">
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
			<li class="">
			  <a href="<?php echo site_url('executive/dashboard'); ?>">
			    <i class="menu-icon fa fa-home"></i>
				<span class="menu-text"> Dashboard</span>
			  </a>

			  <b class="arrow"></b>
			</li><!-- dashboard -->

			<li class="active">
			  <a href="<?php echo site_url('executive/evaluate'); ?>">
			    <i class="menu-icon fa fa-pencil"></i>
				<span class="menu-text"> Evaluate</span>
			  </a>

			  <b class="arrow"></b>
			</li><!-- evaluate -->

			<li class="">
			  <a href="<?php echo site_url('executive/evaluation_logs'); ?>">
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
					  <a href="<?php echo site_url('executive/dashboard'); ?>">Dashboard</a>
					</li>
					<li class="">
						<a href="<?php echo site_url('executive/evaluate'); ?>">Evaluate</a>
					</li>
					<li class="active">Evaluation Form</li>
			  </ul><!-- /.breadcrumb -->
			</div><!-- breadcrumbs -->

			<div class="page-content">
			  <div class="page-header">
			    <h1>
			      Evaluate
			      <small>
			        <i class="ace-icon fa fa-angle-double-right"></i>
			        Evaluation Form
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
									  <i class="ace-icon fa fa-times"></i>
									  Oh snap!
									</strong>
									'.$this->session->flashdata('error').'
						      </div><!-- alert -->';
			      	  ?>
			      	</span>
			      <?php endif; ?>
			      <h5 class="help-block"><em><strong>Legend:</strong></em> <span class="blue">6 = Excellent</span> | <span class="light-blue">5 = Very Good</span> | <span class="green">4 = Good</span> | <span class="light-green">3 = Satisfactory</span> | <span class="orange">2 = Fair</span> | <span class="red">1 = Poor</span></h5>
			      <?php echo form_open(site_url('executive/evaluate/insert'), 'id="evaluation_form"'); ?>
			      <input type="hidden" name="emp_id" value="<?php echo $emp_info->emp_id; ?>">
			      <input type="hidden" name="evltr_id" value="<?php echo $emp_id; ?>">
			      <input type="hidden" name="evltn_dte" value="<?php echo strtotime(date('F, Y')); ?>">
			      	<table class="table table-striped table-bordered table-hover">
			      		<thead>
			      			<tr>
			      				<th>Question</th>
			      				<th>Rating</th>
			      				<th>Remarks</th>
			      			</tr>
			      		</thead>
			      		<tbody>
			      			<?php foreach($questions as $qstn): ?>
			      				<tr>
			      					<td class="col-xs-6 col-sm-6"><?php echo $qstn->question; ?></td>
			      					<td class="col-xs-1 col-sm-1">
			      						<div class="form-group">
													<input name="box_<?php echo $qstn->id; ?>" class="col-xs-12 col-sm-12" type="text" maxlength="1" value="<?php echo $this->input->post('box_'.$qstn->id); ?>" readonly/>
												</div>
			      					</td>
			      					<td class="col-xs-4 col-sm-4">
			      						<div class="form-group">
													<input name="rem_<?php echo $qstn->id; ?>" class="col-xs-12 col-sm-12" type="text" maxlength="160" value="<?php echo $this->input->post('rem_'.$qstn->id); ?>" readonly/>
												</div>
			      					</td>
			      				</tr>
			      			<?php endforeach; ?>
			      		</tbody>
			      	</table><!-- evaluation-form -->

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
								<a href="<?php echo site_url('executive/evaluate'); ?>" class="btn btn-danger">
								  <i class="ace-icon fa fa-close bigger-110"></i>
								  Cancel
								</a>
							  </div><!-- col-md-offset-3 -->
							</div><!-- clearfix -->
			      <?php echo form_close(); ?>
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

	<!--[if lte IE 8]>
	  <script src="assets/js/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php echo base_url('assets/js/jquery-ui.custom.min.js'); ?>"></script>
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
			var $validation = false;
			$('#fuelux-wizard-container')
			.on('actionclicked.fu.wizard' , function(e, info){
			  if(info.step == 1 && $validation) {
			    if(!$('#evaluation_form').valid()) e.preventDefault();
			  }
			});

		  	$('#evaluation_form').validate({
			  errorElement: 'div',
			  errorClass: 'help-block',
			  focusInvalid: false,
			  ignore: "",
			  rules: {
			  	<?php foreach($questions as $qstn): ?>
			  	box_<?php echo $qstn->id; ?>: {required: true},
			  	<?php endforeach; ?>
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