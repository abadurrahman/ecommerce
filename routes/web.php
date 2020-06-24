 <?php

Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');


//--admin section
//--Categories
Route::get('admin/catgories', 'Admin\Category\CategoryController@catgory')->name('categories');     
Route::post('admin/store/category', 'Admin\Category\CategoryController@storecatgory')->name('store.category');
Route::get('delete/category/{id}','Admin\Category\CategoryController@DeleteCategory');
Route::get('edit/category/{id}','Admin\Category\CategoryController@EditCategory');
Route::post('update/category/{id}','Admin\Category\CategoryController@UpdateCategory');

//brands=====
Route::get('admin/brands', 'Admin\Category\CategoryController@brand')->name('brands');
Route::post('admin/store/brand', 'Admin\Category\CategoryController@storebrand')->name('store.brand'); 
Route::get('delete/brand/{id}','Admin\Category\CategoryController@DeleteBrand');
Route::get('edit/brand/{id}','Admin\Category\CategoryController@EditBrand'); 
Route::post('update/brand/{id}','Admin\Category\CategoryController@UpdateBrand'); 

  //sub categories=====
Route::get('admin/sub/category', 'Admin\Category\CategoryController@subcategories')->name('sub.categories');
Route::post('admin/store/subcat', 'Admin\Category\CategoryController@storesubcat')->name('store.subcategory');
Route::get('delete/subcategory/{id}','Admin\Category\CategoryController@DeleteSubCat');
Route::get('edit/subcategory/{id}','Admin\Category\CategoryController@EditSubCat');
Route::post('update/subcategory/{id}','Admin\Category\CategoryController@UpdateSubCat');

  //coupon------
Route::get('admin/sub/coupon', 'Admin\CouponController@Coupon')->name('admin.coupon');
Route::post('admin/store/coupon', 'Admin\CouponController@StoreCoupon')->name('store.coupon');
Route::get('delete/coupon/{id}','Admin\CouponController@DeleteCoupon');
Route::get('edit/coupon/{id}','Admin\CouponController@EditCoupon');
Route::post('update/coupon/{id}','Admin\CouponController@UpdateCoupon'); 

  //newslater
Route::get('admin/newslater', 'Admin\CouponController@Newslater')->name('admin.newslater');
Route::get('delete/sub/{id}','Admin\CouponController@DeleteSub'); 
Route::get('admin/seo', 'Admin\CouponController@Seo')->name('admin.seo');
Route::post('admin/update/seo', 'Admin\CouponController@UpdateSeo')->name('update.seo');
 //products routes=====
Route::get('admin/product/all', 'Admin\ProductController@index')->name('all.product');
Route::get('admin/product/add', 'Admin\ProductController@create')->name('add.product');
Route::post('admin/store/product', 'Admin\ProductController@store')->name('store.product');
Route::get('inactive/product/{id}','Admin\ProductController@Inactive'); 
Route::get('active/product/{id}','Admin\ProductController@Active');
Route::get('delete/product/{id}','Admin\ProductController@DeleteProduct');
Route::get('view/product/{id}','Admin\ProductController@ViewProduct');
Route::get('edit/product/{id}','Admin\ProductController@EditProduct');
Route::post('update/product/withoutphoto/{id}','Admin\ProductController@UpdateProductWithoutPhoto');
Route::post('update/product/photo/{id}','Admin\ProductController@UpdateProductPhoto');


//blog_caategory
Route::get('admin/postcategory', 'Admin\Category\CategoryController@category')->name('post.category');     
Route::post('admin/store/postcategory', 'Admin\Category\CategoryController@storepostcategory')->name('store.postcategory');
Route::get('delete/postcategory/{id}','Admin\Category\CategoryController@DeletePostCategory');
Route::get('edit/postcategory/{id}','Admin\Category\CategoryController@EditPostCategory');
Route::post('update/postcategory/{id}','Admin\Category\CategoryController@UpdatepostCategory');

   //blog post routes
Route::get('admin/add/post', 'Admin\PostController@create')->name('add.blogpost');
Route::post('admin/store/post', 'Admin\PostController@store')->name('store.post');
Route::get('admin/all/post', 'Admin\PostController@index')->name('all.blogpost');
Route::get('delete/post/{id}','Admin\PostController@destroy');
Route::get('edit/post/{id}','Admin\PostController@edit');
Route::post('update/post/{id}','Admin\PostController@update');



 //sliders routes=====
Route::get('admin/slider/all', 'Admin\SliderController@index')->name('all.slider');
Route::get('admin/slider/add', 'Admin\SliderController@create')->name('add.slider');
Route::post('admin/store/slider', 'Admin\SliderController@store')->name('store.slider');
Route::get('inactive/slider/{id}','Admin\SliderController@Inactive'); 
Route::get('active/slider/{id}','Admin\SliderController@Active');
Route::get('delete/slider/{id}','Admin\SliderController@DeleteSlider');
Route::get('view/slider/{id}','Admin\SliderController@ViewProduct');
Route::get('edit/slider/{id}','Admin\SliderController@EditSlider');
Route::post('update/slider/withoutphoto/{id}','Admin\SliderController@UpdateSliderWithoutPhoto');
Route::post('update/slider/withphoto/{id}','Admin\SliderController@UpdateSliderWithPhoto');


 //electronicss routes=====
Route::get('admin/electronics/all', 'Admin\ElectronicController@index')->name('all.electronics');
Route::get('admin/electronics/add', 'Admin\ElectronicController@create')->name('add.electronics');
Route::post('admin/store/electronics', 'Admin\ElectronicController@Store')->name('store.electronics');
Route::get('inactive/electronics/{id}','Admin\ElectronicController@Inactive'); 
Route::get('active/electronics/{id}','Admin\ElectronicController@Active');
Route::get('delete/electronics/{id}','Admin\ElectronicController@DeleteElectronic');
Route::get('view/electronics/{id}','Admin\ElectronicController@ViewElectronics');
Route::get('edit/electronics/{id}','Admin\ElectronicController@EditElectronics');
Route::post('update/electronics/withoutphoto/{id}','Admin\ElectronicController@UpdateElectronicWithoutPhoto');
Route::post('update/electronics/photo/{id}','Admin\ElectronicController@UpdateElectronicPhoto');



 //subcategorypage routes=====
Route::get('admin/subcategorypages/all', 'Admin\SubCategoryPageController@index')->name('all.subcategorypages');
Route::get('admin/subcategorypages/add', 'Admin\SubCategoryPageController@create')->name('add.subcategorypages');
Route::post('admin/store/subcategorypages', 'Admin\SubCategoryPageController@Store')->name('store.subcategorypages');
Route::get('inactive/subcategorypages/{id}','Admin\SubCategoryPageController@Inactive'); 
Route::get('active/subcategorypages/{id}','Admin\SubCategoryPageController@Active');
Route::get('delete/subcategorypages/{id}','Admin\SubCategoryPageController@DeleteSubcategorypages');
Route::get('view/subcategorypages/{id}','Admin\SubCategoryPageController@ViewSubcategorypages');
Route::get('edit/subcategorypages/{id}','Admin\SubCategoryPageController@EditSubcategorypages');
Route::post('update/subcategorypages/withoutphoto/{id}','Admin\SubCategoryPageController@UpdateSubcategorypageWithoutPhoto');
Route::post('update/subcategorypages/photo/{id}','Admin\SubCategoryPageController@UpdateSubcategorypagePhoto');



//--tags
Route::get('admin/tag', 'Admin\PostController@tag')->name('tags');     
Route::post('admin/store/tag', 'Admin\PostController@storetag')->name('store.tag');
Route::get('delete/tag/{id}','Admin\PostController@deletetag');
Route::get('edit/tag/{id}','Admin\PostController@edittag');
Route::post('update/tag/{id}','Admin\PostController@updatetag');



//blog_caategory
Route::get('admin/settings', 'SiteController@create')->name('admin.settings');     
Route::post('admin/store/postcategory', 'SiteController@storesetting')->name('store.setting');
Route::get('admin/sitpage', 'SiteController@index')->name('sitpage');
Route::get('delete/setting/{id}','SiteController@deletesetting');
Route::get('edit/setting/{id}','SiteController@editsetting');
Route::post('update/setting/{id}','SiteController@Updatesetting');




//orders routes
Route::get('admin/today/order', 'Admin\ReportController@TodayOrder')->name('today.order');
Route::get('admin/today/deleverd', 'Admin\ReportController@TodayDelevered')->name('today.delevered');
Route::get('admin/this/month', 'Admin\ReportController@ThisMonth')->name('this.month');
Route::get('admin/search/report', 'Admin\ReportController@search')->name('search.report');
Route::post('admin/search/byyear', 'Admin\ReportController@searchByYear')->name('search.by.year');
Route::post('admin/search/bymonth', 'Admin\ReportController@searchByMonth')->name('search.by.month');
Route::post('admin/search/bydate', 'Admin\ReportController@searchByDate')->name('search.by.date');
//user role
Route::get('admin/create/role', 'Admin\ReportController@UserRole')->name('create.user.role');
Route::get('admin/create/admin', 'Admin\ReportController@UserCreate')->name('create.admin');
Route::post('admin/store/admin', 'Admin\ReportController@UserStore')->name('store.admin');
Route::get('delete/admin/{id}', 'Admin\ReportController@UserDelete');
Route::get('edit/admin/{id}', 'Admin\ReportController@UserEdit');
Route::post('admin/update/admin', 'Admin\ReportController@UserUpdate')->name('update.admin');

//stock
Route::get('admin/product/stock', 'Admin\ReturnController@Stock')->name('admin.product.stock');



//site setting
Route::get('admin/site/setting', 'Admin\SettingController@SiteSetting')->name('admin.site.setting');
Route::post('admin/update/sitesetting', 'Admin\SettingController@UpdateSetting')->name('update.sitesetting');


//database backup
Route::get('admin/database/backup', 'Admin\SettingController@DatabaseBackup')->name('admin.database.backup');
Route::get('admin/database/backup/now', 'Admin\SettingController@BackupNow')->name('admin.backup.now');
Route::get('delete/database/{getFilename}', 'Admin\SettingController@DeleteDatabase');  
Route::get('getFilename', 'Admin\SettingController@DownloadDatabase');




//return products admin panel
 Route::get('admin/return/request', 'Admin\ReturnController@request')->name('admin.return.request');
 Route::get('/admin/approve/return/{id}', 'Admin\ReturnController@ApproveReturn');
 Route::get('admin/all/return', 'Admin\ReturnController@AllReturn')->name('admin.all.return');

 Route::post('order/tracking', 'FrontController@OrderTracking')->name('order.tracking');
 Route::post('product/search', 'FrontendController@ProductSearch')->name('product.search');




 //get sub cate by ajax
Route::get('get/subcategory/{category_id}','Admin\ProductController@GetSubcat');

//cart
Route::get('add/to/cart/{id}','CartController@AddCart');
Route::get('check','CartController@check');
Route::get('products/cart','CartController@showCart')->name('show.cart');
Route::get('remove/cart/{rowId}','CartController@removeCart');
Route::post('update/cart/item','CartController@UpdateCart')->name('update.cartitem');
Route::get('cart/product/view/{id}','CartController@ViewProduct');
Route::post('insert/into/cart/','CartController@InsertCart')->name('insert.into.cart');
Route::get('user/checkout/','CartController@Checkout');
Route::get('user/wishlist/','CartController@Wishlist')->name('user.wishlist');
Route::post('user/apply/coupon/','CartController@Coupon')->name('apply.coupon');
Route::get('coupon/remove/','CartController@CouponRemove')->name('coupon.remove');
Route::get('payment/page/','CartController@PymentPage')->name('payment.step');


//payment methods
Route::post('user/payment/process/','PaymentController@payment')->name('payment.process');
Route::post('user/stripe/charge/','PaymentController@STripeCharge')->name('stripe.charge');

Route::get('success/list/','PaymentController@SuccessList')->name('success.orderlist');
Route::get('request/return/{id}','PaymentController@RequestReturn');


//blog routes

Route::get('blog/post','BlogController@blog')->name('blog.post');

Route::get('language/bangla','BlogController@Bangla')->name('language.bangla');
Route::get('language/english','BlogController@English')->name('language.english');



//admin order routes
Route::get('admin/pending/order', 'Admin\OrderController@NewOrder')->name('admin.neworder');
Route::get('admin/view/order/{id}', 'Admin\OrderController@ViewOrder');
Route::get('admin/payment/accept/{id}', 'Admin\OrderController@PaymentAccept');
Route::get('admin/payment/cancel/{id}', 'Admin\OrderController@PaymentCancel');
Route::get('admin/accept/payment', 'Admin\OrderController@AcceptPaymentOrder')->name('admin.accept.payment');
Route::get('admin/progress/payment', 'Admin\OrderController@ProgressPaymentOrder')->name('admin.progress.payment');
Route::get('admin/success/payment', 'Admin\OrderController@SuccessPaymentOrder')->name('admin.success.payment');
Route::get('admin/cancel/payment', 'Admin\OrderController@CancelPaymentOrder')->name('admin.cancel.order');
Route::get('admin/delevery/progress/{id}', 'Admin\OrderController@DeleveryProgress');
Route::get('admin/delevery/done/{id}', 'Admin\OrderController@DeleveryDone');




//frontedn all routesa are here--------
Route::post('store/newslater', 'FrontendController@StoreNewslater')->name('store.newslater');

Route::get('/product/details/{id}/{product_name}', 'ProductdetailsController@ProductView');
Route::post('/cart/product/add/{id}', 'ProductdetailsController@AddCart');

Route::get('/products/{id}', 'ProductdetailsController@productsView');

 Route::post('order/tracking', 'FrontendController@OrderTracking')->name('order.tracking');



//electronics

Route::get('product/electronics','ElectronicPageController@Electronic')->name('product.electronics');


Route::get('/contact','ContactController@Contact')->name('contact');