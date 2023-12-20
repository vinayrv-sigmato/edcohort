<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['404_override'] = 'page_not_found';
$route['translate_uri_dashes'] = FALSE;
//==========================Admin Route==================================
$route['facebook-login'] = 'login/facebook_login';
$route['google-login'] = 'login/google_login';
$route['verify-email'] = 'login/verify_email';
$route['get-header-search'] = 'jewelry/header_search';
//=====================Front Route=======================================
$route['load-more-diamond'] = 'diamond/load_more_data';
$route['diamond'] = 'diamond';
$route['diamond/(:any)'] = 'diamond';
$route['diamond-details/:num'] = 'diamond/diamond_details';
$route['send-data']="diamond/send_data";
$route['print-diamond']="diamond/print_data";
$route['export-diamond']="diamond/export_diamond";
$route['add-compare-diamond']="diamond/add_compare";
// $route['match-diamond'] = 'match_diamond';
// $route['load-more-match-diamond'] = 'match_diamond/load_more_data';
// $route['print-match-diamond'] = 'match_diamond/print_data';
// $route['export-match-diamond']="match_diamond/export_diamond";

$route['compare-diamond'] = 'diamond/compare_diamond';
$route['remove-compare-diamond'] = 'diamond/remove_compare';
$route['diamond-compare-ajax'] = 'diamond/getCompareAjax';
$route['add-wish-diamond'] = 'diamond/add_wish';
$route['add-cart-diamond'] = 'diamond/add_cart';
$route['print-details-diamond'] = 'diamond/print_details';

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$route['ring-builder'] = 'ring_builder';
$route['ring-builder/:any'] = 'ring_builder';
$route['ring-builder/:any/:any'] = 'ring_builder';
$route['ring-builder/:any/:any/:any'] = 'ring_builder';
$route['ring-builder-details/:any'] = 'ring_builder/jewelry_details';
$route['load-ring-builder'] = 'ring_builder/load_more_data';
$route['add-ring-setting'] = 'ring_builder/add_ring_setting';

$route['ring-builder-diamond'] = 'ring_builder_diamond';
$route['ring-builder-diamond/:any'] = 'ring_builder_diamond';
$route['ring-builder-diamond-details/:any'] = 'ring_builder_diamond/diamond_details';
$route['load-ring-builder-diamond'] = 'ring_builder_diamond/load_more_data';
$route['add-ring-diamond-setting'] = 'ring_builder_diamond/add_ring_setting';

$route['ring-builder-review'] = 'ring_builder/ring_review';
$route['ring-to-bag'] = 'ring_builder/add_cart';
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$route['jewelry'] = 'jewelry';
$route['jewelry/:any'] = 'jewelry';
$route['jewelry/:any/:any'] = 'jewelry';
$route['jewelry/:any/:any/:any'] = 'jewelry';
$route['jewelry-details/:any'] = 'jewelry/jewelry_details';
$route['add-compare-jewelry']="jewelry/add_compare";
$route['compare-jewelry'] = 'jewelry/compare_jewelry';
$route['load-more-product'] = 'jewelry/load_more_data';
$route['remove-compare-jewelry'] = 'jewelry/remove_compare';
$route['jewelry-compare-ajax'] = 'jewelry/getCompareAjax';
$route['add-wish-jewelry'] = 'jewelry/add_wish';
$route['add-cart-jewelry'] = 'jewelry/add_cart';
$route['print-details-jewelry'] = 'jewelry/print_details';

$route['product-variation-price'] = 'jewelry/variation_price';
$route['send-product-review'] = 'jewelry/product_review_submit';
$route['product-review/:any'] = 'jewelry/product_review';
$route['load-product-review'] = 'jewelry/load_product_review';

$route['deals'] = 'deals';
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$route['cart'] = 'mycart';
$route['cart-delete/:any/:num'] = 'mycart/delete_cart';
$route['cart-update-quantity'] = 'mycart/update_cart_quantity';

$route['wishlist'] = 'mywishlist';
$route['wishlist-delete/:any/:num'] = 'mywishlist/delete_wishlist';
$route['checkout'] = 'order';
$route['checkout-address-save'] = 'order/address_submit';
$route['checkout-payment'] = 'order/payment';
$route['checkout-confirm'] = 'order/confirm';

$route['checkout-login'] = 'order/checkout_login';
$route['checkout-signup'] = 'order/checkout_register';
$route['checkout-signup-submit'] = 'order/signup_submit';
//----------Email-----------//
$route['email-to-friend'] = 'diamond/email_to_friend';
$route['email-watch-details'] = 'watch/email_watch_details';
$route['email-jewelry-details'] = 'jewelry/email_jewelry_details';
$route['email-to-vendor'] = 'diamond/email_to_vendor';
$route['email-us-watch'] = 'watch/email_us_watch';
$route['emailus-jewelry'] = 'jewelry/email_us_jewelry';
$route['appointment-form'] = 'appointment/appointment_form';
$route['get-quote-jewelry'] = 'jewelry/get_quote_submit';
//--------------------- User Route -----------------------------//
$route['login'] = 'login';
$route['logout'] = 'login/logout';
$route['login-pop'] = 'login/login_pop';
$route['login-submit'] = 'login/login_submit';
$route['register'] = 'login/signup';
$route['signup-submit'] = 'login/signup_submit';
$route['subscribe-submit'] = 'login/subscribe_submit';
//----User Admin------//
$route['edit-profile'] = 'user/edit_profile';
$route['edit-profile-submit'] = 'user/update_profile';
$route['change-password'] = 'user/change_password';
$route['update-password'] = 'user/update_password';
$route['address'] = 'user/address';
$route['billing-address'] = 'user/billing_address';
$route['update-billing-address'] = 'user/update_billing_address';
$route['make-default-address'] = 'user/makeDefaultAddress';
$route['delete-address'] = 'user/delete_address';
$route['your-orders'] = 'user/your_orders';
$route['getOrderAjax'] = 'user/getOrderAjax';
$route['cancel-order-submit'] = 'user/cancel_order';
$route['order-details/(:any)'] = 'user/order_details';
$route['forgot-password'] = 'login/resetPassword';
$route['UserNewPassword/(:any)']="login/new_password/$1";
//--------------------- Pages -----------------------------//
$route['contact-us'] = 'login/contact';
$route['contact-submit'] = 'login/contact_submit';
$route['about-us'] = 'pages';
$route['terms-conditions'] = 'pages/terms';
$route['privacy-policy'] = 'pages/privacy';
$route['return-policy'] = 'pages/return';
$route['shipping-policy'] = 'pages/shipping';
$route['education'] = 'pages/education';
$route['diamond-education'] = 'pages/education';
$route['jewelry-education'] = 'pages/jewelry_education';
$route['customer-experiences'] = 'pages/customer_experiences';
$route['appointment'] = 'pages/appointments';
$route['appointment-submit'] = 'appointment/appointment_submit';
$route['faq'] = 'pages/faq';
$route['services'] = 'pages/services';
$route['blog'] = 'pages/blog';
$route['blog-detail/(:any)'] = 'pages/blog_detail/$1';

$route['conflict-free-policy'] = 'pages/conflict_free_policy';
$route['why-choose-european-jewelry'] = 'pages/why_choose_european';
$route['custom-work'] = 'pages/custom_work';
$route['jewelry-repairs'] = 'pages/jewelry_repairs';
$route['european-jewelry-credit-card'] = 'pages/credit_card'; 

$route['engagement-rings'] = 'pages/engagement_rings';

//------------Payment -----------//
$route['payment'] = 'paypal/payment';
$route['paypal-success'] = 'paypal/success';
$route['paypal-cancel'] = 'paypal/cancel';

//------search -----//
$route['header-search'] = 'jewelry/header_search';
$route['header-search-result'] = 'jewelry/header_search_result';

//---------blog ----//
$route['blog'] = 'blog';
$route['blog-detail/(:any)'] = 'blog/blog_detail/$1';

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


