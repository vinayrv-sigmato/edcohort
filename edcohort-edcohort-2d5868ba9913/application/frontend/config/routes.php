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

$route['home/:any'] = 'home';

$route['custom-design'] = 'home/custom_design';
$route['custom-design-submit'] = 'home/custom_design_submit';


$route['design-with-us'] = 'design'; 
$route['custom-design-with-us'] = 'design/custom_design';
$route['design-submit'] = 'design/design_submit';
$route['custom-design-submit'] = 'design/custom_design_submit';
$route['design-success'] = 'design/design_success';

$route['dna/:any'] = 'diamond/dna_details';

$route['load-more-lab-grown-diamond'] = 'lab_grown_diamond/load_more_data';
$route['lab-grown-diamond'] = 'lab_grown_diamond';
$route['lab-grown-diamond/(:any)'] = 'lab_grown_diamond';



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
//================== Order ============
$route['my-quotes'] = 'myorder/myquote';
$route['my-orders'] = 'myorder/myorders';
$route['completed-orders'] = 'myorder/completedquote';
$route['design-detail/(:any)']="myorder/design_detail/$1";
$route['send-images/(:any)']="myorder/send_images/$1";
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$route['cart'] = 'mycart';
$route['cart-diamond'] = 'mycart/cart_diamond';
$route['cart-delete/:any/:num'] = 'mycart/delete_cart';
$route['cart-delete-diamond/:any/:num'] = 'mycart/delete_cart_diamond';
$route['cart-update-quantity'] = 'mycart/update_cart_quantity';

$route['wishlist'] = 'mywishlist';
$route['wishlist-diamond'] = 'mywishlist/wishlist_diamond';
$route['wishlist-delete-diamond/:any/:num'] = 'mywishlist/delete_wishlist_diamond';
$route['wishlist-delete/:any/:num'] = 'mywishlist/delete_wishlist';
$route['checkout'] = 'order';
$route['checkout-address-save'] = 'order/address_submit';
$route['checkout-payment'] = 'order/payment';
$route['checkout-confirm'] = 'order/confirm';
$route['checkout-confirm-wire'] = 'order/wire_confirm';
$route['checkout-submit-wire'] = 'order/submit_wire';

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
$route['otp-submit'] = 'login/otp_submit';
$route['subscribe-submit'] = 'login/subscribe_submit';
//----User Admin------//
$route['edit-profile'] = 'user/edit_profile';
$route['edit-profile-submit'] = 'user/update_profile';
$route['edit-image-submit'] = 'user/update_image';
$route['change-password'] = 'user/change_password';
$route['update-password'] = 'user/update_password';
$route['address'] = 'user/address';
$route['billing-address'] = 'user/billing_address';
$route['update-billing-address'] = 'user/update_billing_address';
$route['make-default-address'] = 'user/makeDefaultAddress';
$route['delete-address'] = 'user/delete_address';
$route['your-orders'] = 'user/your_orders';
$route['diamond-orders'] = 'user/order_diamond';
$route['getOrderAjax'] = 'user/getOrderAjax';
$route['export-order'] = 'user/export_order';
$route['cancel-order-submit'] = 'user/cancel_order';
$route['order-details/(:any)'] = 'user/order_details';
$route['forgot-password'] = 'login/resetPassword';
$route['UserNewPassword/(:any)']="login/new_password/$1";
//--------------------- Pages -----------------------------//
$route['contact-us'] = 'login/contact';
$route['contact-submit'] = 'login/contact_submit';
$route['partner-submit'] = 'login/partner_submit';
$route['counseller-submit'] = 'login/counseller_submit';
$route['about-us'] = 'pages';
$route['terms-conditions'] = 'pages/terms';
$route['privacy-policy'] = 'pages/privacy';
$route['return-policy'] = 'pages/return';
$route['shipping-policy'] = 'pages/shipping';
$route['education'] = 'pages/education';
$route['diamond-education'] = 'pages/education';
$route['jewelry-education'] = 'pages/jewelry_education';
$route['customer-experiences'] = 'pages/customer_experiences';
$route['partner-us'] = 'pages/partner_us';
$route['review-us'] = 'pages/review_us';
$route['testimonial-submit'] = 'pages/testimonial_submit';
$route['appointment'] = 'pages/appointments';
$route['appointment-submit'] = 'appointment/appointment_submit';
$route['faq'] = 'pages/faq';
$route['services'] = 'pages/services';
$route['news'] = 'blog';
$route['news-detail/(:any)'] = 'blog/blog_detail/$1';
$route['blog'] = 'blog/blog';
$route['blog-detail/(:any)'] = 'blog/blog_detail/$1';
$route['blog-comment'] = 'blog/blog_comment_submit';

$route['brands'] = 'brands';
$route['brands-detail/(:any)'] = 'brands/brands_detail/$1';
$route['brands-list'] = 'brands/brands_list';

$route['brands'] = 'brands';
$route['brands/:any'] = 'brands';
$route['brands/:any/:any'] = 'brands';
$route['load-more-brands'] = 'brands/load_more_data';
$route['brands-detail/(:any)'] = 'brands/brands_detail/$1';
$route['brands-list'] = 'brands/brands_list';
$route['get-brands-board'] = 'brands/get_board_list';
$route['get-brands-class'] = 'brands/get_class_list';
$route['get-brands-batch'] = 'brands/get_batch_list';

$route['course'] = 'course';
$route['course/:any'] = 'course';
$route['course/:any/:any'] = 'course';
$route['load-more-course'] = 'course/load_more_data';
$route['course-detail/(:any)'] = 'course/course_detail/$1';
$route['course-list'] = 'course/course_list';
$route['get-course-board'] = 'course/get_board_list';
$route['get-course-class'] = 'course/get_class_list';
$route['get-course-batch'] = 'course/get_batch_list';


$route['conflict-free-policy'] = 'pages/conflict_free_policy';
$route['why-choose-european-jewelry'] = 'pages/why_choose_european';
$route['custom-work'] = 'pages/custom_work';
$route['jewelry-repairs'] = 'pages/jewelry_repairs';
$route['european-jewelry-credit-card'] = 'pages/credit_card'; 

$route['engagement-rings'] = 'pages/engagement_rings';

$route['dashboard'] = 'pages/dashboard';
$route['bank-wire'] = 'pages/bank_wire';
$route['dashboard-count'] = 'diamond/dashboard_count';



//------------Payment -----------//
$route['payment'] = 'paypal/payment';
$route['paypal-success'] = 'paypal/success';
$route['paypal-cancel'] = 'paypal/cancel';

$route['card-payment'] = 'authorize_net/do_user_payment';

//------search -----//
$route['header-search'] = 'jewelry/header_search';
$route['header-search-result'] = 'jewelry/header_search_result';

//---------blog ----//
$route['blog'] = 'blog';
$route['blog-detail/(:any)'] = 'blog/blog_detail/$1';

//-------chat----------//
$route['update-chat-visitor'] = 'chat/update_visitor';
$route['getall-visitor'] = 'chat/get_all';

//-------- Review----//
$route['review'] = 'review';
$route['review-search'] = 'review/search';
$route['review/:any'] = 'review';
$route['review/:any/:any'] = 'review';
$route['review/:any/:any/:any'] = 'review';
$route['review-submit'] = 'review/review_submit';
$route['review-like'] = 'review/review_like';
$route['review-reply-submit'] = 'review/review_reply_submit';
$route['boost-review-submit'] = 'review/boost_review_submit';
$route['get-board-list'] = 'review/get_board_list';
$route['get-class-list'] = 'review/get_class_list';
$route['get-batch-class'] = 'review/get_batch_list';
$route['my-review'] = 'review/my_review';
$route['my-review-reply'] = 'review/my_review_reply';
$route['write-a-review'] = 'review/write_review';
$route['get-category-list'] = 'review/get_category_list';
$route['get-product-data'] = 'review/get_product_data';


//--------Write Review -----//
$route['get-common-board-list'] = 'review/get_board_list';
$route['get-common-class-list'] = 'review/get_class_list';
$route['get-common-batch-class'] = 'review/get_batch_list';


//-------- complaint----//
$route['complaint'] = 'complaint';
$route['complaint-search'] = 'complaint/search';
$route['complaint/:any'] = 'complaint';
$route['complaint/:any/:any'] = 'complaint';
$route['complaint/:any/:any/:any'] = 'complaint';
$route['complaint-submit'] = 'complaint/complaint_submit';
$route['complaint-like'] = 'complaint/complaint_like';
$route['complaint-resolved'] = 'complaint/complaint_resolved';
$route['complaint-reply-submit'] = 'complaint/complaint_reply_submit';
$route['boost-complaint-submit'] = 'complaint/boost_complaint_submit';
$route['my-complaint'] = 'complaint/my_complaint';
$route['write-a-complaint'] = 'complaint/write_complaint';

//-------- comparison----//
$route['comparison'] = 'comparison';
$route['comparison-search'] = 'comparison/search';
$route['comparison/:any'] = 'comparison';
$route['comparison/:any/:any'] = 'comparison';
$route['comparison/:any/:any/:any'] = 'comparison';
$route['comparison-submit'] = 'comparison/comparison_submit';
$route['comparison-search'] = 'comparison/search';

//-------- coupon----//
$route['coupon'] = 'coupon';
$route['coupon'] = 'coupon';
$route['coupon/:any'] = 'coupon';
$route['coupon/:any/:any'] = 'comparison';
$route['coupon/:any/:any/:any'] = 'coupon';
$route['coupon-submit'] = 'coupon/coupon_submit';
$route['coupon-search'] = 'coupon/search';
$route['coupon-create-dummy'] = 'coupon/createcoupon';

//-------- comparison----//
$route['counselling'] = 'counselling';
$route['counselling-search'] = 'counselling/counselling_search';
$route['counselling/:any'] = 'counselling';
$route['counselling/:any/:any'] = 'counselling';
$route['counselling/:any/:any/:any'] = 'counselling';
$route['counselling-submit'] = 'counselling/counselling_submit';
$route['get-counselling-board'] = 'counselling/get_counselling_board';
$route['get-counselling-class'] = 'counselling/get_counselling_class';
$route['get-counselling-batch'] = 'counselling/get_counselling_batch';
$route['counselling-confirm/:any'] = 'counselling/counselling_confirm/$1';
$route['create-a-counselling'] = 'counselling/create_counselling';
$route['create-counselling-submit'] = 'counselling/create_counselling_submit';
//$route['counselling-submit'] = 'counselling/counselling_submit';

//-------- Cohort----//
$route['cohort'] = 'cohort';
$route['cohort/:any'] = 'cohort';
$route['cohort/:any/:any'] = 'cohort';
$route['cohort/:any/:any/:any'] = 'cohort';
$route['cohort-search'] = 'cohort/search';
$route['cohort-submit'] = 'cohort/cohort_submit';
$route['cohort-like'] = 'cohort/cohort_like';
$route['cohort-reply-submit'] = 'cohort/cohort_reply_submit';
$route['boost-cohort-submit'] = 'cohort/boost_cohort_submit';
$route['get-cohort-board'] = 'cohort/get_cohort_board';
$route['get-cohort-class'] = 'cohort/get_cohort_class';
$route['get-cohort-batch'] = 'cohort/get_cohort_batch';
$route['create-cohort'] = 'cohort/create_cohort';
$route['create-cohort-submit'] = 'cohort/create_cohort_submit';
$route['check-tag-availability'] = 'cohort/check_tag_availability';
$route['cohort-group/:any'] = 'cohort/cohort_group/$1';
$route['view-cohort-group/:any'] = 'cohort/view_cohort_group/$1';
$route['message-send'] = 'cohort/message_send';
$route['leave-group/:any'] = 'cohort/leave_group/$1';

//-------- Cohort----//
$route['collaborate'] = 'cohort';
$route['collaborate'] = 'cohort';
$route['collaborate/:any'] = 'cohort';
$route['collaborate/:any/:any'] = 'cohort';
$route['collaborate/:any/:any/:any'] = 'cohort';
$route['cohort-submit'] = 'cohort/cohort_submit';
$route['cohort-like'] = 'cohort/cohort_like';
$route['cohort-reply-submit'] = 'cohort/cohort_reply_submit';
$route['boost-cohort-submit'] = 'cohort/boost_cohort_submit';

//-------- ranking----//
$route['brand-wise-ranking'] = 'ranking/brand_ranking';
$route['brand-wise-ranking/:any'] = 'ranking/brand_ranking';
$route['brand-wise-ranking/:any/:any'] = 'ranking/brand_ranking';

$route['faculty-wise-ranking'] = 'ranking/faculty_ranking';
$route['faculty-wise-ranking/:any'] = 'ranking/faculty_ranking';
$route['faculty-wise-ranking/:any/:any'] = 'ranking/faculty_ranking';

$route['course-wise-ranking'] = 'ranking/course_ranking';
$route['price-wise-ranking'] = 'ranking/price_ranking';
$route['ranking'] = 'ranking';
$route['ranking/:any'] = 'ranking';
$route['ranking/:any/:any'] = 'ranking';
$route['ranking/:any/:any/:any'] = 'ranking';
$route['ranking-submit'] = 'ranking/ranking_submit';



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


