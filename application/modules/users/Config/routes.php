<?php
$route['users/activatenow'] 	= "users/activatenow";
$route['users/activatenow/(:any)/(:any)'] 	= "users/activatenow/$1/$2";
$route['users/venue_signup'] 	= "users/venue_signup";
$route['users/sendmailme'] 	= "users/sendmailme";
$route['users/fan_signup'] 	= "users/fan_signup";
$route['users/logout'] 	= "users/logout";
$route['users/account']	= "users/account";
$route['users/signin'] 	= "users/signin";
$route['users/signup'] 	= "users/signup";
$route['users/artists'] = "users/artists";
$route['users/venues'] = "users/venues";
$route['users/fans'] = "users/fans";
$route['users/discover'] = "users/discover";
$route['users/activation'] = "users/activation";
$route['users/activated'] = "users/activated";
$route['users/do_upload'] = "users/do_upload";
$route['users/activation/(:any)'] = "users/activation/$1";
$route['users/(:any)'] 	= "users/user/$1";




?>