<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// Admin links ----------------------------------------------------------------------------------------

// Login
$route['admin/auth_login'] = 'Admin/Login/Login/auth_login';
$route['admin/login'] = 'Admin/Login/Login';
$route['admin'] = 'Admin/Login/Login';

// Dashboard
$route['admin_panel/evaluation/progress/(:num)'] = 'Admin/Dashboard/Dashboard/Evaluation_progress/$1';
$route['admin_panel/evaluation_status/(:num)'] = 'Admin/Dashboard/Dashboard/Evaluation_status/$1';
$route['admin_panel/dashboard'] = 'Admin/Dashboard/Dashboard';

// Elementary Student's Record
$route['admin_panel/student_records/elem/del_sub/(:any)/(:any)/(:any)'] = 'Admin/Records/Student/Elementary/Delete_subject/$1/$2/$3';
$route['admin_panel/student_records/elem/insert_sub/(:any)'] = 'Admin/Records/Student/Elementary/Insert_subjects/$1';
$route['admin_panel/student_records/elem/add_sub/(:any)'] = 'Admin/Records/Student/Elementary/Add_subjects/$1';
$route['admin_panel/student_records/elem/delete/(:num)'] = 'Admin/Records/Student/Elementary/Delete_student/$1';
$route['admin_panel/student_records/elem/update'] = 'Admin/Records/Student/Elementary/Update_student';
$route['admin_panel/student_records/elem/edit/(:any)'] = 'Admin/Records/Student/Elementary/Edit_student/$1';
$route['admin_panel/student_records/elem/insert'] = 'Admin/Records/Student/Elementary/Insert_student';
$route['admin_panel/student_records/elem/new'] = 'Admin/Records/Student/Elementary/New_student';
$route['admin_panel/student_records/elem/(:any)'] = 'Admin/Records/Student/Elementary/View_student/$1';
$route['admin_panel/student_records/elem'] = 'Admin/Records/Student/Elementary';

// High School Student's Record
$route['admin_panel/student_records/hs/del_sub/(:any)/(:any)/(:any)'] = 'Admin/Records/Student/High_school/Delete_subject/$1/$2/$3';
$route['admin_panel/student_records/hs/insert_sub/(:any)'] = 'Admin/Records/Student/High_school/Insert_subjects/$1';
$route['admin_panel/student_records/hs/add_sub/(:any)'] = 'Admin/Records/Student/High_school/Add_subjects/$1';
$route['admin_panel/student_records/hs/delete/(:num)'] = 'Admin/Records/Student/High_school/Delete_student/$1';
$route['admin_panel/student_records/hs/update'] = 'Admin/Records/Student/High_school/Update_student';
$route['admin_panel/student_records/hs/edit/(:any)'] = 'Admin/Records/Student/High_school/Edit_student/$1';
$route['admin_panel/student_records/hs/insert'] = 'Admin/Records/Student/High_school/Insert_student';
$route['admin_panel/student_records/hs/new'] = 'Admin/Records/Student/High_school/New_student';
$route['admin_panel/student_records/hs/(:any)'] = 'Admin/Records/Student/High_school/View_student/$1';
$route['admin_panel/student_records/hs'] = 'Admin/Records/Student/High_school';

// College Student's Record
$route['admin_panel/student_records/college/del_sub/(:any)/(:any)/(:any)'] = 'Admin/Records/Student/College/Delete_subject/$1/$2/$3';
$route['admin_panel/student_records/college/insert_sub/(:any)'] = 'Admin/Records/Student/College/Insert_subjects/$1';
$route['admin_panel/student_records/college/add_sub/(:any)'] = 'Admin/Records/Student/College/Add_subjects/$1';
$route['admin_panel/student_records/college/delete/(:num)'] = 'Admin/Records/Student/College/Delete_student/$1';
$route['admin_panel/student_records/college/update'] = 'Admin/Records/Student/College/Update_student';
$route['admin_panel/student_records/college/edit/(:any)'] = 'Admin/Records/Student/College/Edit_student/$1';
$route['admin_panel/student_records/college/insert'] = 'Admin/Records/Student/College/Insert_student';
$route['admin_panel/student_records/college/new'] = 'Admin/Records/Student/College/New_student';
$route['admin_panel/student_records/college/(:any)'] = 'Admin/Records/Student/College/View_student/$1';
$route['admin_panel/student_records/college'] = 'Admin/Records/Student/College';
$route['admin_panel/student_records/section'] = 'Admin/Records/Student/College/Section';

// Employee's Record
$route['admin_panel/employee_records/insert_other_sup/(:any)'] = 'Admin/Records/Employee/Employee/Insert_other_supervisions/$1';
$route['admin_panel/employee_records/add_other_sup/(:any)'] = 'Admin/Records/Employee/Employee/Add_other_supervisions/$1';
//$route['admin_panel/employee_records/insert_sup/(:any)'] = 'Admin/Records/Employee/Employee/Insert_supervisions/$1';
//$route['admin_panel/employee_records/add_sup/(:any)'] = 'Admin/Records/Employee/Employee/Add_supervisions/$1';
$route['admin_panel/employee_records/delete/(:any)'] = 'Admin/Records/Employee/Employee/Delete_employee/$1';
$route['admin_panel/employee_records/update'] = 'Admin/Records/Employee/Employee/Update_employee';
$route['admin_panel/employee_records/edit/(:any)'] = 'Admin/Records/Employee/Employee/Edit_employee/$1';
$route['admin_panel/employee_records/insert'] = 'Admin/Records/Employee/Employee/Insert_employee';
$route['admin_panel/employee_records/new'] = 'Admin/Records/Employee/Employee/New_employee';
$route['admin_panel/employee_records/(:any)'] = 'Admin/Records/Employee/Employee/View_employee/$1';
$route['admin_panel/employee_records'] = 'Admin/Records/Employee/Employee';
$route['admin_panel/employee_records/supervisions/delete/(:any)/(:any)'] = 'Admin/Records/Employee/Employee/Delete_supervisions/$1/$2';
$route['admin_panel/employee_records/other_sup/delete/(:any)/(:any)'] = 'Admin/Records/Employee/Employee/Delete_other_supervisions/$1/$2';

// Student's Questionnare
$route['admin_panel/questionnaire/student/delete/(:num)'] = 'Admin/Questionnaires/Students/Delete_question/$1';
$route['admin_panel/questionnaire/student/update'] = 'Admin/Questionnaires/Students/Update_question';
$route['admin_panel/questionnaire/student/edit/(:num)'] = 'Admin/Questionnaires/Students/Edit_question/$1';
$route['admin_panel/questionnaire/student/insert'] = 'Admin/Questionnaires/Students/Insert_question';
$route['admin_panel/questionnaire/student/new'] = 'Admin/Questionnaires/Students/New_question';
$route['admin_panel/questionnaire/student'] = 'Admin/Questionnaires/Students';

// Employee's Questionare
$route['admin_panel/questionnaire/employee/delete/(:num)'] = 'Admin/Questionnaires/Employee/Delete_question/$1';
$route['admin_panel/questionnaire/employee/update'] = 'Admin/Questionnaires/Employee/Update_question';
$route['admin_panel/questionnaire/employee/edit/(:num)'] = 'Admin/Questionnaires/Employee/Edit_question/$1';
$route['admin_panel/questionnaire/employee/insert'] = 'Admin/Questionnaires/Employee/Insert_question';
$route['admin_panel/questionnaire/employee/new'] = 'Admin/Questionnaires/Employee/New_question';
$route['admin_panel/questionnaire/employee'] = 'Admin/Questionnaires/Employee';

// Executive's Questionare
$route['admin_panel/questionnaire/executive/delete/(:num)'] = 'Admin/Questionnaires/Executive/Delete_question/$1';
$route['admin_panel/questionnaire/executive/update'] = 'Admin/Questionnaires/Executive/Update_question';
$route['admin_panel/questionnaire/executive/edit/(:num)'] = 'Admin/Questionnaires/Executive/Edit_question/$1';
$route['admin_panel/questionnaire/executive/insert'] = 'Admin/Questionnaires/Executive/Insert_question';
$route['admin_panel/questionnaire/executive/new'] = 'Admin/Questionnaires/Executive/New_question';
$route['admin_panel/questionnaire/executive'] = 'Admin/Questionnaires/Executive';

// Elementary Evaluation Report
$route['admin_panel/report/evaluation/elementary/(:any)/(:num)'] = 'Admin/Reports/Evaluation/Elementary/View_report/$1/$2';
$route['admin_panel/report/evaluation/elementary'] = 'Admin/Reports/Evaluation/Elementary';

// High School Evaluation Report
$route['admin_panel/report/evaluation/high_school/(:any)/(:num)'] = 'Admin/Reports/Evaluation/High_school/View_report/$1/$2';
$route['admin_panel/report/evaluation/high_school'] = 'Admin/Reports/Evaluation/High_school';

// College Evaluation Report
$route['admin_panel/report/evaluation/college/(:any)/(:num)'] = 'Admin/Reports/Evaluation/College/View_report/$1/$2';
$route['admin_panel/report/evaluation/college'] = 'Admin/Reports/Evaluation/College';

// Employee Evaluation Report
$route['admin_panel/report/evaluation/employee/(:any)/(:num)'] = 'Admin/Reports/Evaluation/Employee/View_report/$1/$2';
$route['admin_panel/report/evaluation/employee'] = 'Admin/Reports/Evaluation/Employee';

// Executive Evaluation Report
$route['admin_panel/report/evaluation/executive/(:any)/(:num)'] = 'Admin/Reports/Evaluation/Executive/View_report/$1/$2';
$route['admin_panel/report/evaluation/executive'] = 'Admin/Reports/Evaluation/Executive';

// Employee Evaluation Report
$route['admin_panel/report/evaluation/employee'] = 'Admin/Reports/Evaluation/Employee';

// Course's Settings
$route['admin_panel/settings/course/delete/(:num)'] = 'Admin/Settings/Course/Delete_course/$1';
$route['admin_panel/settings/course/update'] = 'Admin/Settings/Course/Update_course';
$route['admin_panel/settings/course/edit/(:num)'] = 'Admin/Settings/Course/Edit_course/$1';
$route['admin_panel/settings/course/insert'] = 'Admin/Settings/Course/Insert_course';
$route['admin_panel/settings/course/new'] = 'Admin/Settings/Course/New_course';
$route['admin_panel/settings/course'] = 'Admin/Settings/Course';

// Evaluation Logs Settings
$route['admin_panel/settings/eval_logs'] = 'Admin/Settings/Evaluation_logs';

// Position's Settings
$route['admin_panel/settings/positions/delete/(:num)'] = 'Admin/Settings/Positions/Delete_position/$1';
$route['admin_panel/settings/positions/update'] = 'Admin/Settings/Positions/Update_position';
$route['admin_panel/settings/positions/edit/(:num)'] = 'Admin/Settings/Positions/Edit_position/$1';
$route['admin_panel/settings/positions/insert'] = 'Admin/Settings/Positions/Insert_position';
$route['admin_panel/settings/positions/new'] = 'Admin/Settings/Positions/New_position';
$route['admin_panel/settings/positions'] = 'Admin/Settings/Positions';

// Department's Settings
$route['admin_panel/settings/department/delete/(:num)'] = 'Admin/Settings/Department/Delete_department/$1';
$route['admin_panel/settings/department/update'] = 'Admin/Settings/Department/Update_department';
$route['admin_panel/settings/department/edit/(:num)'] = 'Admin/Settings/Department/Edit_department/$1';
$route['admin_panel/settings/department/insert'] = 'Admin/Settings/Department/Insert_department';
$route['admin_panel/settings/department/new'] = 'Admin/Settings/Department/New_department';
$route['admin_panel/settings/department'] = 'Admin/Settings/Department';

// Subjects Settings
$route['admin_panel/settings/subjects/delete/(:num)'] = 'Admin/Settings/Subjects/Delete_subject/$1';
$route['admin_panel/settings/subjects/update/(:num)'] = 'Admin/Settings/Subjects/Update_subject/$1';
$route['admin_panel/settings/subjects/edit/(:num)'] = 'Admin/Settings/Subjects/Edit_subject/$1';
$route['admin_panel/settings/subjects/insert'] = 'Admin/Settings/Subjects/Insert_subject';
$route['admin_panel/settings/subjects/new'] = 'Admin/Settings/Subjects/New_subject';
$route['admin_panel/settings/subjects'] = 'Admin/Settings/Subjects';

// Data Management - Backup
$route['admin_panel/data_mngmnt/backup'] = 'Admin/Data_Management/Backup';
$route['admin_panel/data_mngmnt/restore/restore_database'] = 'Admin/Data_Management/Restore/Restore_database';
$route['admin_panel/data_mngmnt/restore'] = 'Admin/Data_Management/Restore';

// Account Settings
$route['admin_panel/account_settings/change_pass/confirm'] = 'Admin/Account_settings/Account_settings/Confirm_password_change';
$route['admin_panel/account_settings/edit_picture/confirm'] = 'Admin/Account_settings/Account_settings/Confirm_edit_picture';
$route['admin_panel/account_settings/edit_profile/confirm'] = 'Admin/Account_settings/Account_settings/Confirm_edit_profile';
$route['admin_panel/account_settings/edit_profile'] = 'Admin/Account_settings/Account_settings/Edit_profile';
$route['admin_panel/account_settings'] = 'Admin/Account_settings/Account_settings/Edit_profile';
$route['admin_panel/profile'] = 'Admin/Account_settings/Account_settings';

// Logout
$route['admin_panel/logout'] = 'Admin/Login/Logout/logout';

// End of admin links ---------------------------------------------------------------------------------

// User links -----------------------------------------------------------------------------------------

// Login
$route['user/auth_login'] = 'User/Login/Login/auth_login';
$route['user/login'] = 'User/Login/Login/login';
$route['user'] = 'User/Login/Login';

// Reset Password
$route['user/login/reset_pw'] = 'User/Login/Login/Reset_pword';

// Student Dashboard
$route['student/dashboard'] = 'User/Student/Dashboard/Dashboard';

// Student Evaluation
$route['student/evaluate/sample'] = 'User/Student/Evaluation/Evaluation/Sample';
$route['student/evaluate/insert'] = 'User/Student/Evaluation/Evaluation/Insert_evaluation';
$route['student/evaluate/preview/(:any)/(:any)'] = 'User/Student/Evaluation/Evaluation/Preview_evaluation/$1/$2';
$route['student/evaluate/(:any)/(:any)'] = 'User/Student/Evaluation/Evaluation/Evaluation_form/$1/$2';
$route['student/evaluate'] = 'User/Student/Evaluation/Evaluation';

// Student Review Evaluation
$route['student/evaluation_logs/(:any)/(:any)/(:num)'] = 'User/Student/Evaluation/Evaluation_logs/View_logs/$1/$2/$3';
$route['student/evaluation_logs'] = 'User/Student/Evaluation/Evaluation_logs';

// Student Account Settings
$route['student/account_settings/change_pass/confirm'] = 'User/Student/Account_settings/Account_settings/Confirm_password_change';
$route['student/account_settings/change_pass'] = 'User/Student/Account_settings/Account_settings/Change_pass';
$route['student/account_settings/edit_picture/confirm'] = 'User/Student/Account_settings/Account_settings/Confirm_edit_picture';
$route['student/account_settings/edit_profile/confirm'] = 'User/Student/Account_settings/Account_settings/Confirm_edit_profile';
$route['student/account_settings/edit_profile'] = 'User/Student/Account_settings/Account_settings/Edit_profile';

// Employee Dashboard
$route['employee/dashboard'] = 'User/Employee/Dashboard/Dashboard';

// Employee Account Settings
$route['employee/account_settings/change_pass/confirm'] = 'User/Employee/Account_settings/Account_settings/Confirm_password_change';
$route['employee/account_settings/change_pass'] = 'User/Employee/Account_settings/Account_settings/Change_pass';
$route['employee/account_settings/edit_picture/confirm'] = 'User/Employee/Account_settings/Account_settings/Confirm_edit_picture';
$route['employee/account_settings/edit_profile/confirm'] = 'User/Employee/Account_settings/Account_settings/Confirm_edit_profile';
$route['employee/account_settings/edit_profile'] = 'User/Employee/Account_settings/Account_settings/Edit_profile';

// Employee Evaluation
$route['employee/evaluate/insert'] = 'User/Employee/Evaluation/Evaluation/Insert_evaluation';
$route['employee/evaluate/preview/(:any)'] = 'User/Employee/Evaluation/Evaluation/Evaluation_form/$1';
$route['employee/evaluate/(:any)'] = 'User/Employee/Evaluation/Evaluation/Evaluation_form/$1';
$route['employee/evaluate'] = 'User/Employee/Evaluation/Evaluation';

// Employee Evaluation Logs
$route['employee/evaluation_logs/(:any)/(:num)'] = 'User/Employee/Evaluation/Evaluation_logs/View_logs/$1/$2';
$route['employee/evaluation_logs'] = 'User/Employee/Evaluation/Evaluation_logs';

// Executive Dashboard
$route['executive/dashboard'] = 'User/Executive/Dashboard/Dashboard';

// Executive Account Settings
$route['executive/account_settings/change_pass/confirm'] = 'User/Executive/Account_settings/Account_settings/Confirm_password_change';
$route['executive/account_settings/change_pass'] = 'User/Executive/Account_settings/Account_settings/Change_pass';
$route['executive/account_settings/edit_picture/confirm'] = 'User/Executive/Account_settings/Account_settings/Confirm_edit_picture';
$route['executive/account_settings/edit_profile/confirm'] = 'User/Executive/Account_settings/Account_settings/Confirm_edit_profile';
$route['executive/account_settings/edit_profile'] = 'User/Executive/Account_settings/Account_settings/Edit_profile';

// Executive Evaluation
$route['executive/evaluate/insert'] = 'User/Executive/Evaluation/Evaluation/Insert_evaluation';
$route['executive/evaluate/preview/(:any)'] = 'User/Executive/Evaluation/Evaluation/Preview_evaluation/$1';
$route['executive/evaluate/(:any)'] = 'User/Executive/Evaluation/Evaluation/Evaluation_form/$1';
$route['executive/evaluate'] = 'User/Executive/Evaluation/Evaluation';

// Executive Review Evaluation
$route['executive/evaluation_logs/(:any)/(:num)'] = 'User/Executive/Evaluation/Evaluation_logs/View_logs/$1/$2';
$route['executive/evaluation_logs'] = 'User/Executive/Evaluation/Evaluation_logs';

// Logout
$route['user/logout'] = 'User/Login/Logout/Logout';

// Default links
$route['default_controller'] = 'Main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
