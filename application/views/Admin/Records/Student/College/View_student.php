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
	    <a href="<?php echo site_url('admin_panel/dashboard'); ?>" class="navbar-brand">
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
			    <a href="<?php echo site_url('admin_panel/account_settings'); ?>">
				  <i class="ace-icon fa fa-cog"></i>
				  Account Settings
				</a>
			  </li>

			  <li>
				<a href="<?php echo site_url('admin_panel/profile'); ?>">
				  <i class="ace-icon fa fa-user"></i>
				  Profile
				</a>
			  </li>

			  <li class="divider"></li>

			  <li>
				<a href="<?php echo site_url('admin_panel/logout'); ?>">
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
		  <a href="<?php echo site_url('admin_panel/dashboard'); ?>">
		    <i class="menu-icon fa fa-home"></i>
			<span class="menu-text"> Dashboard</span>
		  </a>

		  <b class="arrow"></b>
		</li><!-- dashboard -->

		<li class="active open">
		  <a href="#" class="dropdown-toggle">
		    <i class="menu-icon fa fa-list-alt"></i>
		    <span class="menu-text"> Records</span>

		    <b class="arrow fa fa-angle-down"></b>
		  </a>

		  <b class="arrow"></b>

		  <ul class="submenu">
		  	<li class="active open">
			  <a href="#" class="dropdown-toggle">
			    <i class="menu-icon fa fa-caret-right"></i>
			    <span class="menu-text"> Student Records</span>

			    <b class="arrow fa fa-angle-down"></b>
			  </a>

			  <b class="arrow"></b>

			  <ul class="submenu">
			  	<li class="">
				      <a href="<?php echo site_url('admin_panel/student_records/elem'); ?>">
				      	<i class="menu-icon fa fa-caret-right"></i> 
				      	Elementary
				      </a>

				      <b class="arrow"></b>
				    </li>
			  	
			    <li class="">
			      <a href="<?php echo site_url('admin_panel/student_records/hs'); ?>">
			      	<i class="menu-icon fa fa-caret-right"></i> 
			      	High School
			      </a>

			      <b class="arrow"></b>
			    </li>

			    <li class="active">
			      <a href="<?php echo site_url('admin_panel/student_records/college'); ?>">
			      	<i class="menu-icon fa fa-caret-right"></i> 
			      	College
			      </a>

			      <b class="arrow"></b>
			    </li>
			  </ul>
			</li>

			<li class="">
			  <a href="<?php echo site_url('admin_panel/employee_records'); ?>">
			    <i class="menu-icon fa fa-caret-right"></i>
			    <span class="menu-text"> Employee Records</span>
			  </a>

			  <b class="arrow"></b>
			</li>
		  </ul><!-- submenu -->
		</li><!-- records -->

		<li class="">
		  <a href="#" class="dropdown-toggle">
		    <i class="menu-icon fa fa-question"></i>
		    <span class="menu-text"> Questionnaires</span>

		    <b class="arrow fa fa-angle-down"></b>
		  </a>

		  <b class="arrow"></b>

		  <ul class="submenu">
		  	<li class="">
			  <a href="<?php echo site_url('admin_panel/questionnaire/student'); ?>">
			    <i class="menu-icon fa fa-caret-right"></i>
			    <span class="menu-text"> For Students</span>
			  </a>

			  <b class="arrow"></b>
			</li>

				<li class="">
				  <a href="<?php echo site_url('admin_panel/questionnaire/employee'); ?>">
				    <i class="menu-icon fa fa-caret-right"></i>
				    <span class="menu-text"> For Employee</span>
				  </a>

				  <b class="arrow"></b>
				</li>

			<li class="">
			  <a href="<?php echo site_url('admin_panel/questionnaire/executive'); ?>">
			    <i class="menu-icon fa fa-caret-right"></i>
			    <span class="menu-text"> For Executives</span>
			  </a>

			  <b class="arrow"></b>
			</li>
		  </ul><!-- submenu -->
		</li><!-- questionnaires -->

		<li class="">
		  <a href="#" class="dropdown-toggle">
		    <i class="menu-icon fa fa-file-o"></i>
		    <span class="menu-text"> Reports</span>

		    <b class="arrow fa fa-angle-down"></b>
		  </a>

		  <b class="arrow"></b>

		  <ul class="submenu">
		  	<li class="">
		  	  <a href="#" class="dropdown-toggle">
			    <i class="menu-icon fa fa-caret-right"></i>
			    Evaluation Reports

			    <b class="arrow fa fa-angle-down"></b>
			  </a>

			  <b class="arrow"></b>

			  <ul class="submenu">
			  	<li class="">
					  <a href="<?php echo site_url('admin_panel/report/evaluation/elementary'); ?>">
					    <i class="menu-icon fa fa-caret-right"></i>
					    Elementary
					  </a>

					  <b class="arrow"></b>
					</li>
			  	
			  	<li class="">
			  	  <a href="<?php echo site_url('admin_panel/report/evaluation/high_school'); ?>">
			  	    <i class="menu-icon fa fa-caret-right"></i>
			  	    High School
			  	  </a>

			  	  <b class="arrow"></b>
			  	</li>

			  	<li class="">
			  	  <a href="<?php echo site_url('admin_panel/report/evaluation/college'); ?>">
			  	    <i class="menu-icon fa fa-caret-right"></i>
			  	    College
			  	  </a>

			  	  <b class="arrow"></b>
			  	</li>

			  	<li class="">
					  <a href="<?php echo site_url('admin_panel/report/evaluation/employee'); ?>">
					    <i class="menu-icon fa fa-caret-right"></i>
					    Employee
					  </a>

					 <b class="arrow"></b>
					</li>

					<li class="">
					  <a href="<?php echo site_url('admin_panel/report/evaluation/executive'); ?>">
					    <i class="menu-icon fa fa-caret-right"></i>
					    Executive
					  </a>

					  <b class="arrow"></b>
					</li>
			  </ul><!-- submenu -->
		  	</li><!-- evaluation-report -->

		  	<!-- <li class="">
		  	  <a href="#" class="dropdown-toggle">
				  	<i class="menu-icon fa fa-caret-right"></i> 
				  	Statistics Report

				  	<b class="arrow fa fa-angle-down"></b>
				  </a>

				  <b class="arrow"></b>

				  <ul class="submenu">
				  	<li class="">
				  	  <a href="<?php echo site_url('admin_panel/report/statistics/high_school'); ?>">
				  	    <i class="menu-icon fa fa-caret-right"></i>
				  	    High School
				  	  </a>

				  	  <b class="arrow"></b>
				  	</li>

				  	<li class="">
				  	  <a href="<?php echo site_url('admin_panel/report/statistics/college'); ?>">
				  	    <i class="menu-icon fa fa-caret-right"></i>
				  	    College
				  	  </a>

				  	  <b class="arrow"></b>
				  	</li>

				  	<li class="">
						  <a href="<?php echo site_url('admin_panel/report/statistics/employee'); ?>">
						    <i class="menu-icon fa fa-caret-right"></i>
						    Employee
						  </a>

				  	  <b class="arrow"></b>
						</li>

						<li class="">
						  <a href="<?php echo site_url('admin_panel/report/statistics/executive'); ?>">
						    <i class="menu-icon fa fa-caret-right"></i>
						    Executive
						  </a>

						  <b class="arrow"></b>
						</li>
				  </ul>
		  	</li> --><!-- statistics-report -->

		  	<!-- <li class="">
		  	  <a href="#" class="dropdown-toggle">
				  	<i class="menu-icon fa fa-caret-right"></i> 
				  	Employee Ranking Report

				  	<b class="arrow fa fa-angle-down"></b>
				  </a>

			  	<b class="arrow"></b>

				  <ul class="submenu">
				  	<li class="">
				  	  <a href="<?php echo site_url('admin_panel/report/ranking/high_school'); ?>">
				  	    <i class="menu-icon fa fa-caret-right"></i> 
				  	    High School
				  	  </a>

				  	  <b class="arrow fa fa-angle-down"></b>
				  	</li>

				  	<li class="">
				  	  <a href="<?php echo site_url('admin_panel/report/ranking/college'); ?>">
				  	    <i class="menu-icon fa fa-caret-right"></i> 
				  	    College
				  	  </a>

				  	  <b class="arrow fa fa-angle-down"></b>
				  	</li>
				  </ul>
		  	</li> --><!-- employee-ranking -->
		  </ul><!-- submenu -->
		</li><!-- reports -->

		<li class="">
		  <a href="#" class="dropdown-toggle">
		    <i class="menu-icon fa fa-cogs"></i>
		    <span class="menu-text"> Settings</span>

		    <b class="arrow fa fa-angle-down"></b>
		  </a>

		  <b class="arrow"></b>

		  <ul class="submenu">
		  	<li class="">
		  	  <a href="<?php echo site_url('admin_panel/settings/course'); ?>">
		  	  	<i class="menu-icon fa fa-caret-right"></i> 
		  	  	Course
		  	  </a>

		  	  <b class="arrow"></b>
		  	</li>

		  	<li class="">
		  	  <a href="<?php echo site_url('admin_panel/settings/eval_logs'); ?>">
		  	  	<i class="menu-icon fa fa-caret-right"></i> 
		  	  	Evaluation Logs
		  	  </a>

		  	  <b class="arrow"></b>
		  	</li>

		  	<li class="">
		  	  <a href="<?php echo site_url('admin_panel/settings/positions'); ?>">
		  	  	<i class="menu-icon fa fa-caret-right"></i> 
		  	  	Positions
		  	  </a>

		  	  <b class="arrow"></b>
		  	</li>

		  	<li class="">
		  	  <a href="<?php echo site_url('admin_panel/settings/department'); ?>">
		  	  	<i class="menu-icon fa fa-caret-right"></i> 
		  	  	Department
		  	  </a>

		  	  <b class="arrow"></b>
		  	</li>

		  	<li class="">
		  	  <a href="<?php echo site_url('admin_panel/settings/subjects'); ?>">
		  	  	<i class="menu-icon fa fa-caret-right"></i> 
		  	  	Subjects
		  	  </a>

		  	  <b class="arrow"></b>
		  	</li>
		  </ul>
		</li><!-- settings -->

		<!-- <li class="">
		  <a href="<?php echo site_url('admin_panel/user_mngmnt'); ?>">
		    <i class="menu-icon fa fa-users"></i> 
		    <span class="menu-text"> User Management</span>
		  </a>

		  <b class="arrow"></b>
		</li> --><!-- user-management -->

		<li class="">
		  <a href="#" class="dropdown-toggle">
		  	<i class="menu-icon fa fa-folder-open-o"></i>
		  	<span class="menu-text"> Data Management</span>

		  	<b class="arrow fa fa-angle-down"></b>
		  </a>

		  <b class="arrow"></b>

		  <ul class="submenu">
		  	<li class="">
			    <a href="<?php echo site_url('admin_panel/data_mngmnt/restore'); ?>">
			    	<i class="menu-icon fa fa-caret-right"></i> 
			      Restore
			    </a>

			    <b class="arrow"></b>
			  </li><!-- restore -->

			  <li class="">
			    <a href="<?php echo site_url('admin_panel/data_mngmnt/backup'); ?>">
			    	<i class="menu-icon fa fa-caret-right"></i> 
			      Backup
			    </a>

			    <b class="arrow"></b>
			  </li><!-- backup -->
		  </ul>
		</li><!-- data-management -->
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
			  <a href="<?php echo site_url('admin_panel/dashboard'); ?>">Dashboard</a>
			</li>
			<li class="">
			  <a href="#">Records</a>
			</li>
			<li class="">
			  <a href="#">Students</a>
			</li>
			<li class="">
			  <a href="<?php echo site_url('admin_panel/student_records/college'); ?>">College</a>
			</li>
			<li class="active"><?php echo $info->stud_id; ?></li>
		  </ul><!-- /.breadcrumb -->
		</div><!-- breadcrumbs -->

		<div class="page-content">
		  <div class="page-header">
		    <h1>
		      Records
		      <small>
		        <i class="ace-icon fa fa-angle-double-right"></i>
				Student Records
				<i class="ace-icon fa fa-angle-double-right"></i>
				College
				<i class="ace-icon fa fa-angle-double-right"></i>
				<?php echo $info->stud_id; ?>
		      </small>
		    </h1>
		  </div><!-- page-header -->

		  <div class="row">
		  	<div class="col-xs-12">
		      <?php if($this->session->flashdata('error')): ?>
		      	<span class="help-block">
		      	  <?php
		      	  echo '<div class="alert alert-success">
		      	  	<button type="button" class="close" data-dismiss="alert">
					  <i class="ace-icon fa fa-times"></i>
					</button>
					<strong>
					  <i class="ace-icon fa fa-check"></i>
					  Success!
					</strong>
					'.$this->session->flashdata('error').'
		      	  </div><!-- alert -->';
		      	  ?>
		      	</span>
		      <?php endif; ?>

			  <div id="profile-content" class="user-profile">
			  	<div class="tabbable">
			  	  <ul class="nav nav-tabs padding-18">
			  	  	<li class="active">
			  	  	  <a data-toggle="tab" href="#profile">
						<i class="green ace-icon fa fa-user bigger-120"></i>
						Profile
					  </a>
			  	  	</li>

			  	  	<!-- <li class="">
			  	  	  <a data-toggle="tab" href="#activity">
						<i class="orange ace-icon fa fa-rss bigger-120"></i>
						Activity
					  </a>
			  	  	</li> -->
			  	  </ul><!-- nav-tabs -->

			  	  <div class="tab-content no-border padding-24">
			  	    <div id="profile" class="tab-pane fade in active">
			  	      <div class="row">
			  	      	<div class="col-xs-12 col-sm-3 center">
						  <span class="profile-picture">
						    <?php if ($info->photo): ?>
						    	<img class="editable img-responsive" alt="" id="avatar2" src="<?php echo base_url('assets/uploads/profile/'.$info->photo); ?>" />
						  	<?php else: ?>
						  		<img class="editable img-responsive" alt="" id="avatar2" src="<?php echo base_url('assets/avatars/profile-pic.jpg'); ?>" />
						  	<?php endif; ?>
						  </span>

						  <div class="space space-4"></div>

						  <a href="<?php echo site_url('admin_panel/student_records/college/edit/'.$info->stud_id); ?>" class="btn btn-sm btn-block btn-inverse">
						  	<i class="ace-icon fa fa-pencil bigger-120"></i>
						  	<span class="bigger-110"> Edit Record</span>
						  </a>

						  <a href="javascript:();" id="confirm" data-id="<?php echo $info->stud_id; ?>" class="btn btn-sm btn-block btn-danger">
							<i class="ace-icon fa fa-trash-o bigger-120"></i>
							<span class="bigger-110"> Delete</span>
						  </a>

						  <a href="<?php echo site_url('admin_panel/student_records/college'); ?>" class="btn btn-sm btn-block btn-default">
						    <i class="ace-icon fa fa-arrow-left bigger-110"></i>
						  	<span class="bigger-110">Go back</span>
						  </a>
						</div><!-- profile-picture -->

						<div id="details" class="col-xs-12 col-sm-9">
						  <h4 class="blue">
						    <?php echo $info->lname.', '.$info->fname.' '.$info->mname; ?>
						  	<?php if($info->is_active): ?>
						  	  <span class="label label-success arrowed-right">
							    <i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
								Online
							  </span>
							<?php else: ?>
							  <span class="label label-default arrowed-right">
							    <i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
								Offline
							  </span>
						  	<?php endif; ?>
						  </h4>

						<div class="profile-user-info">
							<div class="profile-info-row">
							  <div class="profile-info-name"> Student ID </div>

							  <div class="profile-info-value">
							    <span><?php echo $info->stud_id; ?></span>
							  </div>
							</div>

							<div class="profile-info-row">
							  <div class="profile-info-name"> Course </div>

							  <div class="profile-info-value">
							    <span><?php echo $cinfo->course; ?></span>
							  </div>
							</div>

							<div class="profile-info-row">
							  <div class="profile-info-name"> Year &amp; Section </div>

							  <div class="profile-info-value">
							    <span><?php echo $info->yr_lvl.' - '.$info->section; ?></span>
							  </div>
							</div>

							<div class="profile-info-row">
							  <div class="profile-info-name"> Date Created </div>

							  <div class="profile-info-value">
							    <span><?php echo date('M d, Y', $info->date_created); ?></span>
							  </div>
							</div>

							<div class="profile-info-row">
							  <div class="profile-info-name"> Last Modified </div>

							  <div class="profile-info-value">
							    <span><?php echo ($info->last_mod) ? date('M d, Y', $info->last_mod) : 'Never'; ?></span>
							  </div>
							</div>

							<div class="profile-info-row">
							  <div class="profile-info-name"> Last Online </div>

							  <div class="profile-info-value">
							    <span><?php echo ($info->last_seen) ? date('M d, Y', $info->last_seen) : 'Never'; ?></span>
							  </div>
							</div>
						  </div><!-- profile-user-info -->

						  <div class="space-20"></div>

						  <div class="widget-box transparent">
						  	<div class="widget-header widget-header-small">
								  <h4 class="widget-title blue smaller">
									  Subject(s)
									</h4>

									<div class="widget-toolbar action-buttons">
									  <a href="<?php echo site_url('admin_panel/student_records/college/add_sub/'.$info->stud_id); ?>" class="blue">
									    <i class="ace-icon fa fa-plus"></i>
									  </a>
									  &nbsp;
									  <a href="#" data-action="reload">
									    <i class="ace-icon fa fa-refresh blue"></i>
									  </a>
									</div>
								</div>

								<div class="widget-body">
								  <div class="widget-main padding-8">
								  	<div id="profile-feed-1" class="profile-feed">
								  		<?php if ($subjects): ?>
								  			<?php foreach($subjects as $item): ?>
								  				<div class="profile-activity clearfix">
									      	  <div>
									      	  	<span><?php echo $item->subj_name . ' - ' . $item->lname.', '.$item->fname.' '.$item->mname; ?></span>
									      	  	<input type="hidden" id="subj_<?php echo $item->emp_id; ?>" name="subj_<?php echo $item->emp_id; ?>" value="<?php echo $item->subject; ?>">
									      	  </div>
									      	  <div class="tools action-buttons">
															<a href="javascript:();" class="red sup_<?php echo $item->emp_id; ?>" data-id="<?php echo $item->emp_id; ?>">
																<i class="ace-icon fa fa-times bigger-125"></i>
															</a>
														</div>
									      	</div>
								  			<?php endforeach; ?>
								  		<?php else: ?>
								  			<p>Table empty! No records to show.</p>
								  		<?php endif; ?>
								  	</div>
								  </div>
								</div>
						  </div>
						</div><!-- details -->
			  	      </div><!-- row -->
			  	    </div><!-- profile -->

			  	    <!-- <div id="activity" class="tab-pane fade">
			  	      <h4>Insert activity feeds here...</h4>
			  	    </div> --><!-- activity -->
			  	  </div><!-- tab-content -->
			  	</div><!-- tabbable -->
			  </div><!-- user-profile -->
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
	<script src="<?php echo base_url('assets/js/bootbox.min.js'); ?>"></script>

	<!-- ace scripts -->
	<script src="<?php echo base_url('assets/js/ace-elements.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/ace.min.js'); ?>"></script>

	<!-- inline scripts related to this page -->
	<script type="text/javascript">
	  jQuery(function($) {
	  	//subjects confirm dialog
	  	<?php if($subjects): ?>
	  		<?php foreach($subjects as $item): ?>
		  		$(".sup_<?php echo $item->emp_id; ?>").on(ace.click_event, function() {
		  			bootbox.dialog({
			  		  message: "Are you sure you want to delete this data?",
			  		  title: "Confirm",
			  		  buttons: {
			  		    success: {
			  		      label: "<i class='ace-icon fa fa-trash-o'></i> Delete",
			  		      className: "btn btn-danger bigger-110",
			  		      callback: function() {
			  		      	var id = $(".sup_<?php echo $item->emp_id; ?>").attr('data-id');
										var subj = $("#subj_<?php echo $item->emp_id; ?>").val();
			  		        var link = "<?php echo site_url('admin_panel/student_records/college/del_sub/'.$info->stud_id.'/"+id+"/"+subj+"'); ?>";
			  		        
			  		        document.location.assign(link);
			  		      }
			  		    },
			  		    cancel: {
			  		      label: "<i class='ace-icon fa fa-close'></i> Cancel",
			  		      className: "btn btn-default bigger-110"
			  		    }
			  		  }
			  		});
		  		});
	  		<?php endforeach; ?>
	  	<?php endif; ?>

	  	//Confirm Dialog
	  	$("#confirm").on(ace.click_event, function() {
	  		bootbox.dialog({
	  		  message: "Are you sure you want to delete this data?",
	  		  title: "Confirm",
	  		  buttons: {
	  		    success: {
	  		      label: "<i class='ace-icon fa fa-trash-o'></i> Delete",
	  		      className: "btn btn-danger bigger-110",
	  		      callback: function() {
	  		      	var id = $("#confirm").attr('data-id');
	  		        var link = "<?php echo site_url('admin_panel/student_records/college/delete/"+id+"'); ?>";
	  		        
	  		        document.location.assign(link);
	  		      }
	  		    },
	  		    cancel: {
	  		      label: "<i class='ace-icon fa fa-close'></i> Cancel",
	  		      className: "btn btn-default bigger-110"
	  		    }
	  		  }
	  		});
	  	});

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