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
$route['default_controller'] = 'Home';
$route['admin'] = 'admin/Login';
$route['admin/login'] = 'admin/Admin/login_do';
$route['student/login'] = 'student/Login';
$route['student/register'] = 'student/Register'; 

$route['courses/all-offered-courses'] = 'website/Courses/all_offered_courses';
$route['courses/ajax_offered_courses'] = 'website/Courses/ajax_offered_courses'; 
$route['courses/ajax_offered_courses/(:num)'] = 'website/Courses/ajax_offered_courses/$1';
$route['courses/course-details/(:any)'] = 'website/Courses/course_details/$1';
// $route['courses/offered-course-details/(:any)'] = 'website/Courses/course_details/$1';


$route['courses/all-courses'] = 'website/Courses/all_courses';
$route['courses/ajax_courses'] = 'website/Courses/ajax_courses'; 
$route['courses/ajax_courses/(:num)'] = 'website/Courses/ajax_courses/$1';

$route['events/all_events'] = 'website/Events/all_events'; 
$route['events/ajax_events'] = 'website/Events/ajax_events'; 
$route['events/ajax_events/(:num)'] = 'website/Events/ajax_events/$1';

$route['teachers/all-teachers'] = 'website/Teachers/all_teachers'; 
$route['teachers/ajax_teachers'] = 'website/Teachers/ajax_teachers'; 
$route['teachers/ajax_teachers/(:num)'] = 'website/Teachers/ajax_teachers/$1';

$route['blog/all-blogs'] = 'website/Blogs/all_blogs'; 
$route['blog/ajax_blogs'] = 'website/Blogs/ajax_blogs'; 
$route['blog/ajax_blogs/(:num)'] = 'website/Blogs/ajax_blogs/$1';
$route['blog/blog-details/(:any)'] = 'website/Blogs/blog_details/$1';

$route['program/all-programs'] = 'website/Programs/all_programs'; 
$route['program/ajax_programs'] = 'website/Programs/ajax_programs'; 
$route['program/ajax_programs/(:num)'] = 'website/Programs/ajax_programs/$1';
$route['program/program-details/(:any)'] = 'website/Programs/program_details/$1';

$route['book/all-books'] = 'website/Books/all_books'; 
$route['book/ajax_books'] = 'website/Books/ajax_books'; 
$route['book/ajax_books/(:num)'] = 'website/Books/ajax_books/$1';
$route['book/view-book/(:any)'] = 'website/Books/view_book/$1';

$route['gallery/all-images'] = 'website/Gallery/all_images'; 

$route['student/learn/(:any)'] = 'student/Courses/show_course_content/$1';
// $route['student/learn/lecture/(:any)'] = 'student/Courses/show_course_content';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
