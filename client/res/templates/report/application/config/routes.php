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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] 						= 'welcome';
$route['404_override'] 								= '';
$route['translate_uri_dashes'] 						= FALSE;

// CRUD OPERATION
$route['email-reminder'] 							= "reminder/emailList";
$route['sms-reminder'] 								= "reminder/smsList";

// REPORTS
$route['email-report'] 								= "emailreport";
$route['sms-report'] 								= "smsreport";

// REPORTS : Lead  
$route['lead-report'] 								= "lead/index";
$route['get-lead-data'] 							= "lead/dataPointData";
$route['lead-load-more'] 							= "lead/tabularLoadMore"; // tabular & kanban load more

// REPORTS : Lead status 
$route['status-lead-report'] 						= "leadsreport/statusLeads";
$route['get-lead-status-data'] 						= "leadsreport/statusDataPointData";
$route['status-tabular-data'] 						= "leadsreport/statusTabularLoadMore"; // tabular & kanban load more

// REPORTS : Lead source 
$route['source-lead-report'] 						= "leadsreport/sourceLeads";
$route['get-lead-source-data'] 						= "leadsreport/sourceDataPointData";
$route['source-tabular-data'] 						= "leadsreport/sourceTabularLoadMore"; // tabular & kanban load more


// REPORT : Opportunity Stage
$route['opportunity-stage-report'] 					= "opportunityreport/oppStage";
$route['get-opp-stage-data'] 						= "opportunityreport/oppStageDataPointData";
$route['opp-stage-tabular-data'] 					= "opportunityreport/oppStageTabularLoadMore"; // tabular & kanban load more


// REPORT : Opportunity Revenue
$route['opportunity-revenue-report'] 				= "opportunityreport/oppRevenue";
$route['get-opp-revenue-data'] 						= "opportunityreport/oppRevenueDataPointData";
$route['opp-revenue-tabular-data'] 					= "opportunityreport/oppRevenueTabularLoadMore"; // tabular & kanban load more

// REPORT : Financial reports
$route['billing_entitywise-report']					= "financial/index";	// Billing Entity Wise report
$route['billing_entitywise-report/(:any)']			= "financial/index/$1";	// Billing Entity Wise report
$route['customerwise-report']						= "financial/customerwise";		// Customer Wise report
$route['customerwise-report/(:any)']				= "financial/customerwise/$1";	// Customer Wise report
$route['aginganalysis-report']						= "financial/debtorsaging_analysis"; // Debtors Aging analysis report
$route['aginganalysis-report/(:any)']				= "financial/debtorsaging_analysis/$1"; // Debtors Aging analysis report