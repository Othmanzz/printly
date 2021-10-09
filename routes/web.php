<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    \App::setLocale($locale);
    return redirect()->back();
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/wallet', [App\Http\Controllers\ProfileController::class, 'wallet'])->name('wallet');

Route::post('/update_password', [App\Http\Controllers\ProfileController::class, 'update_password'])->name('update_password');
Route::post('/update_customer', [App\Http\Controllers\ProfileController::class, 'update_profile'])->name('update_customer');

Route::get('/admin', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('admin');
Route::get('/admin/papers', [App\Http\Controllers\PaperController::class, 'index'])->name('papers');
Route::get('/admin/papers/add', [App\Http\Controllers\PaperController::class, 'create'])->name('add-paper');
Route::post('/admin/papers/add', [App\Http\Controllers\PaperController::class, 'store_paper'])->name('add-paper');
Route::get('/admin/papers/edit/{id}', [App\Http\Controllers\PaperController::class, 'edit'])->name('edit-paper');
Route::post('/admin/papers/edit/{id}', [App\Http\Controllers\PaperController::class, 'update_paper'])->name('edit-paper');
Route::get('/admin/papers/delete/{id}', [App\Http\Controllers\PaperController::class, 'destroy'])->name('delete-paper');
Route::post('/admin/papers/update_price_for_price_list/{id}', [App\Http\Controllers\PaperController::class, 'update_price_for_price_list'])->name('update_price_for_price_list');
Route::post('/admin/papers/update_name_for_paper/{id}', [App\Http\Controllers\PaperController::class, 'update_name_for_paper'])->name('update_name_for_paper');


Route::get('/admin/papers/paper-types', [App\Http\Controllers\PaperController::class, 'papers_type'])->name('paper-types');
Route::get('/admin/papers/add-paper-type', [App\Http\Controllers\PaperController::class, 'add_paper_type'])->name('add-paper-type');
Route::post('/admin/papers/add-paper-type', [App\Http\Controllers\PaperController::class, 'store_paper_type'])->name('add-paper-type');
Route::get('/admin/papers/edit-paper-type/{id}', [App\Http\Controllers\PaperController::class, 'edit_paper_type'])->name('edit-paper-type');
// Route::get('/admin/papers/paper-price-list/{id}', [App\Http\Controllers\PaperController::class, 'paper_price_list'])->name('paper-price-list');
Route::post('/admin/papers/edit-paper-type/{id}', [App\Http\Controllers\PaperController::class, 'update_paper_type'])->name('update-paper-type');
Route::get('/admin/papers/delete-paper-type/{id}', [App\Http\Controllers\PaperController::class, 'delete_paper_type'])->name('delete-paper-type');

// price list
Route::get('/admin/price_list/{id}', [App\Http\Controllers\PaperController::class, 'paper_price_list'])->name('paper-price-list');
Route::get('/admin/price_list/add/{id}', [App\Http\Controllers\PaperController::class, 'create_price_list'])->name('add-price-list');
Route::post('/admin/price_list/add/{id}', [App\Http\Controllers\PaperController::class, 'store_price_list'])->name('add-price-list');
Route::get('/admin/price_list/delete/{id}', [App\Http\Controllers\PaperController::class, 'destroy_price_list'])->name('delete-price-list');
Route::get('/admin/price_list/edit/{id}', [App\Http\Controllers\PaperController::class, 'edit_price_list'])->name('edit-price-list');
Route::post('/admin/price_list/edit/{id}', [App\Http\Controllers\PaperController::class, 'update_price_list'])->name('update-price-list');


Route::get('/admin/paper_slices', [App\Http\Controllers\PaperController::class, 'paper_slices'])->name('paper_slices');
Route::get('/admin/paper_slices/add', [App\Http\Controllers\PaperController::class, 'create_paper_slices'])->name('add-paper-slice');
Route::post('/admin/paper_slices/add', [App\Http\Controllers\PaperController::class, 'store_paper_slice'])->name('add-paper-slice');
Route::get('/admin/paper_slices/delete/{id}', [App\Http\Controllers\PaperController::class, 'destroy_paper_slice'])->name('delete-paper-slice');
Route::get('/admin/paper_slices/edit-paper-slice/{id}', [App\Http\Controllers\PaperController::class, 'edit_paper_slice'])->name('edit-paper-slice');
Route::post('/admin/paper_slices/edit-paper-slice/{id}', [App\Http\Controllers\PaperController::class, 'update_paper_slice'])->name('update-paper-slice');




Route::get('/admin/cover_types', [App\Http\Controllers\PaperController::class, 'cover_types'])->name('cover_types');
Route::get('/admin/cover_types/add', [App\Http\Controllers\PaperController::class, 'create_cover_type'])->name('add-cover-type');
Route::post('/admin/cover_types/add', [App\Http\Controllers\PaperController::class, 'store_cover_type'])->name('add-cover-type');
Route::get('/admin/cover_types/delete/{id}', [App\Http\Controllers\PaperController::class, 'destroy_cover_type'])->name('delete-cover-type');
Route::get('/admin/cover_types/edit-cover-type/{id}', [App\Http\Controllers\PaperController::class, 'edit_cover_type'])->name('edit-cover-type');
Route::post('/admin/cover_types/edit-cover-type/{id}', [App\Http\Controllers\PaperController::class, 'update_cover_type'])->name('update-cover-type');



Route::get('/admin/aorders', [App\Http\Controllers\AdminController::class, 'orders'])->name('aorders');
Route::get('/admin/show_aorder/{id}', [App\Http\Controllers\AdminController::class, 'show_order'])->name('show_aorder');
Route::post('/admin/achange_order_status/{id}', [App\Http\Controllers\AdminController::class, 'change_order_status'])->name('achange_order_status');
Route::post('/admin/assgined_to/{id}', [App\Http\Controllers\AdminController::class, 'assgined_to'])->name('assgined_to');


Route::get('/admin/orders/export', [App\Http\Controllers\AdminController::class, 'export_orders'])->name('export_orders');
Route::get('/admin/users/export', [App\Http\Controllers\AdminController::class, 'export_users'])->name('export_users');



//Customers
Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
Route::get('/admin/users/{id}', [App\Http\Controllers\AdminController::class, 'show_user'])->name('show-user');
Route::post('/admin/users/{id}', [App\Http\Controllers\AdminController::class, 'update_user'])->name('update-user');
Route::get('/admin/add-user', [App\Http\Controllers\AdminController::class, 'add_user'])->name('add-user');
Route::post('/admin/add-user', [App\Http\Controllers\AdminController::class, 'store_user'])->name('add-user');

Route::get('/admin/delete-user/{id}', [App\Http\Controllers\AdminController::class, 'delete_user'])->name('delete-user');
Route::post('/admin/block-user/{id}', [App\Http\Controllers\AdminController::class, 'block_user'])->name('block-user');
Route::get('/admin/block-cancel/{id}', [App\Http\Controllers\AdminController::class, 'block_cancel'])->name('block-cancel');
// banners
Route::get('/admin/banners', [App\Http\Controllers\AdminController::class, 'banners'])->name('banners');
Route::get('/admin/banners/add', [App\Http\Controllers\AdminController::class, 'create_banner'])->name('add-banner');
Route::post('/admin/banners/add', [App\Http\Controllers\AdminController::class, 'store_banner'])->name('add-banner');
Route::get('/admin/banners/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit_banner'])->name('edit-banner');
Route::post('/admin/banners/add/{id}', [App\Http\Controllers\AdminController::class, 'update_banner'])->name('update-banner');


// branches
Route::get('/admin/branchs', [App\Http\Controllers\BranchController::class, 'index'])->name('branchs');
Route::get('/admin/branchs/add', [App\Http\Controllers\BranchController::class, 'create'])->name('add-branch');
Route::post('/admin/branchs/add', [App\Http\Controllers\BranchController::class, 'store'])->name('add-branch');
Route::get('/admin/branchs/edit/{id}', [App\Http\Controllers\BranchController::class, 'edit'])->name('edit-branch');
Route::post('/admin/branchs/add/{id}', [App\Http\Controllers\BranchController::class, 'update'])->name('update-branch');


// faqs
Route::get('/admin/faqs', [App\Http\Controllers\FaqController::class, 'index'])->name('faqs');
Route::get('/admin/faqs/add', [App\Http\Controllers\FaqController::class, 'create'])->name('add-faq');
Route::post('/admin/faqs/add', [App\Http\Controllers\FaqController::class, 'store'])->name('add-faq');
Route::get('/admin/faqs/edit/{id}', [App\Http\Controllers\FaqController::class, 'edit'])->name('edit-faq');
Route::post('/admin/faqs/add/{id}', [App\Http\Controllers\FaqController::class, 'update'])->name('update-faq');

//categories


Route::get('/admin/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/admin/categories/add', [App\Http\Controllers\CategoryController::class, 'create'])->name('add-category');
Route::post('/admin/categories/add', [App\Http\Controllers\CategoryController::class, 'store'])->name('add-category');
Route::get('/admin/categories/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('delete-category');

Route::get('/admin/categories/edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('edit-category');
Route::post('/admin/categories/edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('update-category');



Route::get('/admin/products/', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('/admin/products/add', [App\Http\Controllers\ProductController::class, 'create'])->name('add-product');
Route::post('/admin/products/add', [App\Http\Controllers\ProductController::class, 'store'])->name('add-product');
Route::get('/admin/products/delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('delete-product');

Route::get('/admin/products/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit-product');
Route::post('/admin/products/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('update-product');

//coupons
Route::get('/admin/coupons/', [App\Http\Controllers\CouponController::class, 'index'])->name('coupons');
Route::get('/admin/coupons/add', [App\Http\Controllers\CouponController::class, 'create'])->name('add-coupon');
Route::post('/admin/coupons/add', [App\Http\Controllers\CouponController::class, 'store'])->name('add-coupon');
Route::get('/admin/coupons/delete/{id}', [App\Http\Controllers\CouponController::class, 'destroy'])->name('delete-coupon');

Route::get('/admin/coupons/edit-coupon/{id}', [App\Http\Controllers\CouponController::class, 'edit'])->name('edit-coupon');
Route::post('/admin/coupons/edit-coupon/{id}', [App\Http\Controllers\CouponController::class, 'update'])->name('update-coupon');
//stickers

//list
Route::get('/admin/stickers/paper-type/', [App\Http\Controllers\StickerController::class, 'paper_types'])->name('stickers-paper-type');
Route::get('/admin/stickers/paper-size/', [App\Http\Controllers\StickerController::class, 'paper_sizes'])->name('stickers-paper-size');
Route::get('/admin/stickers/paper-shape/', [App\Http\Controllers\StickerController::class, 'paper_shapes'])->name('stickers-paper-shape');
Route::get('/admin/stickers/price-list/', [App\Http\Controllers\StickerController::class, 'stickers_prices'])->name('stickers-price-list');

//add

Route::get('/admin/stickers/add-paper-type/', [App\Http\Controllers\StickerController::class, 'add_paper_types'])->name('add-stickers-paper-type');
Route::get('/admin/stickers/add-paper-size/', [App\Http\Controllers\StickerController::class, 'add_paper_sizes'])->name('add-stickers-paper-size');
Route::get('/admin/stickers/add-paper-shape/', [App\Http\Controllers\StickerController::class, 'add_paper_shapes'])->name('add-stickers-paper-shape');
Route::get('/admin/stickers/add-price-list/', [App\Http\Controllers\StickerController::class, 'add_stickers_prices'])->name('add-stickers-price-list');
//store
Route::post('/admin/stickers/add-paper-type/', [App\Http\Controllers\StickerController::class, 'store_paper_types'])->name('add-stickers-paper-type');
Route::post('/admin/stickers/add-paper-size/', [App\Http\Controllers\StickerController::class, 'store_paper_sizes'])->name('add-stickers-paper-size');
Route::post('/admin/stickers/add-paper-shape/', [App\Http\Controllers\StickerController::class, 'store_paper_shapes'])->name('add-stickers-paper-shape');
Route::post('/admin/stickers/add-price-list/', [App\Http\Controllers\StickerController::class, 'store_stickers_prices'])->name('add-stickers-price-list');


//edit

Route::get('/admin/stickers/edit-paper-type/{id}', [App\Http\Controllers\StickerController::class, 'edit_paper_types'])->name('edit-stickers-paper-type');
Route::get('/admin/stickers/edit-paper-size/{id}', [App\Http\Controllers\StickerController::class, 'edit_paper_sizes'])->name('edit-stickers-paper-size');
Route::get('/admin/stickers/edit-paper-shape/{id}', [App\Http\Controllers\StickerController::class, 'edit_paper_shapes'])->name('edit-stickers-paper-shape');
Route::get('/admin/stickers/edit-price-list/{id}', [App\Http\Controllers\StickerController::class, 'edit_stickers_prices'])->name('edit-stickers-price-list');
//update

Route::post('/admin/stickers/edit-paper-type/{id}', [App\Http\Controllers\StickerController::class, 'update_paper_types'])->name('update-stickers-paper-type');
Route::post('/admin/stickers/edit-paper-size/{id}', [App\Http\Controllers\StickerController::class, 'update_paper_sizes'])->name('update-stickers-paper-size');
Route::post('/admin/stickers/edit-paper-shape/{id}', [App\Http\Controllers\StickerController::class, 'update_paper_shapes'])->name('update-stickers-paper-shape');
Route::post('/admin/stickers/edit-price-list/{id}', [App\Http\Controllers\StickerController::class, 'update_stickers_prices'])->name('update-stickers-price-list');


//personal_cards

//list
Route::get('/admin/personal_cards/card-type/', [App\Http\Controllers\PersonalCardController::class, 'card_types'])->name('personal_cards-card-type');
Route::get('/admin/personal_cards/card-size/', [App\Http\Controllers\PersonalCardController::class, 'card_sizes'])->name('personal_cards-card-size');
Route::get('/admin/personal_cards/card-shape/', [App\Http\Controllers\PersonalCardController::class, 'card_shapes'])->name('personal_cards-card-shape');
Route::get('/admin/personal_cards/price-list/', [App\Http\Controllers\PersonalCardController::class, 'personal_cards_prices'])->name('personal_cards-price-list');

//add

Route::get('/admin/personal_cards/add-card-type/', [App\Http\Controllers\PersonalCardController::class, 'add_card_types'])->name('add-personal_cards-card-type');
Route::get('/admin/personal_cards/add-card-size/', [App\Http\Controllers\PersonalCardController::class, 'add_card_sizes'])->name('add-personal_cards-card-size');
Route::get('/admin/personal_cards/add-card-shape/', [App\Http\Controllers\PersonalCardController::class, 'add_card_shapes'])->name('add-personal_cards-card-shape');
Route::get('/admin/personal_cards/add-price-list/', [App\Http\Controllers\PersonalCardController::class, 'add_personal_cards_prices'])->name('add-personal_cards-price-list');
//store
Route::post('/admin/personal_cards/add-card-type/', [App\Http\Controllers\PersonalCardController::class, 'store_card_types'])->name('add-personal_cards-card-type');
Route::post('/admin/personal_cards/add-card-size/', [App\Http\Controllers\PersonalCardController::class, 'store_card_sizes'])->name('add-personal_cards-card-size');
Route::post('/admin/personal_cards/add-card-shape/', [App\Http\Controllers\PersonalCardController::class, 'store_paper_shapes'])->name('add-personal_cards-shape');
Route::post('/admin/personal_cards/add-price-list/', [App\Http\Controllers\PersonalCardController::class, 'store_personal_cards_prices'])->name('add-personal_cards-price-list');


//edit

Route::get('/admin/personal_cards/edit-card-type/{id}', [App\Http\Controllers\PersonalCardController::class, 'edit_card_types'])->name('edit-personal_cards-card-type');
Route::get('/admin/personal_cards/edit-card-size/{id}', [App\Http\Controllers\PersonalCardController::class, 'edit_card_sizes'])->name('edit-personal_cards-card-size');
Route::get('/admin/personal_cards/edit-card-shape/{id}', [App\Http\Controllers\PersonalCardController::class, 'edit_card_shapes'])->name('edit-personal_cards-card-shape');
Route::get('/admin/personal_cards/edit-price-list/{id}', [App\Http\Controllers\PersonalCardController::class, 'edit_personal_cards_prices'])->name('edit-personal_cards-price-list');
//update

Route::post('/admin/personal_cards/edit-card-type/{id}', [App\Http\Controllers\PersonalCardController::class, 'update_card_types'])->name('update-personal_cards-card-type');
Route::post('/admin/personal_cards/edit-card-size/{id}', [App\Http\Controllers\PersonalCardController::class, 'update_card_sizes'])->name('update-personal_cards-card-size');
Route::post('/admin/personal_cards/edit-price-list/{id}', [App\Http\Controllers\PersonalCardController::class, 'update_personal_cards_prices'])->name('update-personal_cards-price-list');

//rollup
Route::get('/admin/rollup/rollup-size/', [App\Http\Controllers\RollupController::class, 'rollup_sizes'])->name('rollups-size');
Route::get('/admin/rollup/add-rollup-size/', [App\Http\Controllers\RollupController::class, 'add_rollup_sizes'])->name('add-rollup-size');
Route::post('/admin/rollup/add-rollup-size/', [App\Http\Controllers\RollupController::class, 'store_rollup_sizes'])->name('add-rollup-size');
Route::get('/admin/rollup/edit-rollup-size/{id}', [App\Http\Controllers\RollupController::class, 'edit_rollup_sizes'])->name('edit-rollup-size');


//posters
Route::get('/admin/posters/posters-size/', [App\Http\Controllers\PosterController::class, 'posters_sizes'])->name('posters-size');
Route::get('/admin/posters/add-posters-size/', [App\Http\Controllers\PosterController::class, 'add_posters_sizes'])->name('add-posters-size');
Route::post('/admin/posters/add-posters-size/', [App\Http\Controllers\PosterController::class, 'store_posters_sizes'])->name('add-posters-size');
Route::get('/admin/posters/edit-posters-size/{id}', [App\Http\Controllers\PosterController::class, 'edit_posters_sizes'])->name('edit-posters-size');


//setting
Route::get('/admin/settings', [App\Http\Controllers\SettingController::class, 'settings'])->name('settings');

Route::get('/admin/setting/{id}', [App\Http\Controllers\SettingController::class, 'setting'])->name('setting');
Route::post('/admin/setting/edit/{id}', [App\Http\Controllers\SettingController::class, 'edit_setting'])->name('edit-setting');





// print man

Route::get('/admin/printorders', [App\Http\Controllers\PrintManController::class, 'index'])->name('printorders');
Route::get('/admin/show_printporder/{id}', [App\Http\Controllers\PrintManController::class, 'show'])->name('show_printporder');
Route::post('/admin/printchange_order_status/{id}', [App\Http\Controllers\PrintManController::class, 'change_order_status'])->name('rpchange_order_status');

//represntive

Route::get('/admin/reporders', [App\Http\Controllers\RepresentativeController::class, 'index'])->name('reporders');
Route::get('/admin/show_rporder/{id}', [App\Http\Controllers\RepresentativeController::class, 'show'])->name('show_rporder');
Route::post('/admin/rpchange_order_status/{id}', [App\Http\Controllers\RepresentativeController::class, 'change_order_status'])->name('rpchange_order_status');

Route::get('/admin/safer/orders', [App\Http\Controllers\SaferController::class, 'orders'])->name('safer_orders');




//site


//cart
Route::post('/addToCart', [App\Http\Controllers\CartController::class, 'store'])->name('add-to-cart');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/remove_from_cart', [App\Http\Controllers\CartController::class, 'destroy'])->name('remove_from_cart');
Route::post('/use_code', [App\Http\Controllers\CartController::class, 'use_code'])->name('use_code');

Route::post('/add_note', [App\Http\Controllers\CartController::class, 'add_note'])->name('add_note');
Route::post('/add_order_review/{id}', [App\Http\Controllers\OrderController::class, 'add_order_review'])->name('add_order_review');


//wishlist
Route::post('/addToWishlist', [App\Http\Controllers\WishlistController::class, 'store'])->name('add-to-wishlist');
Route::get('/wishlist', [App\Http\Controllers\WishlistController::class, 'index'])->name('cart');
Route::post('/remove_from_wishlist', [App\Http\Controllers\WishlistController::class, 'destroy'])->name('remove_from_wishlist');
Route::post('/address', [App\Http\Controllers\OrderController::class, 'address'])->name('address');
Route::post('/add_address', [App\Http\Controllers\OrderController::class, 'add_address'])->name('add_address');
Route::post('/remove_address', [App\Http\Controllers\OrderController::class, 'remove_address'])->name('remove_address');
Route::post('/confirm_address', [App\Http\Controllers\OrderController::class, 'confirm_address'])->name('confirm_address');
Route::post('/confirm_pay', [App\Http\Controllers\OrderController::class, 'confirm_pay'])->name('confirm_pay');


Route::post('/areas', [App\Http\Controllers\OrderController::class, 'areas'])->name('areas');



//site

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('siteproducts');



//checkout

Route::get('/checkout/{order_id}', [App\Http\Controllers\CheckoutController::class, 'prepare_checkout'])->name('checkout');
Route::get('/checkpayment/{order_id}', [App\Http\Controllers\CheckoutController::class, 'check_payment'])->name('check_payment');

//order
Route::get('/createorder', [App\Http\Controllers\OrderController::class, 'store'])->name('createorder');
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout_page');
Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders');
Route::get('/order/{id}', [App\Http\Controllers\OrderController::class, 'show_order'])->name('show-order');




// profile
Route::post('/prpfile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('edit_profile');


Route::post('/prpfile/update', [App\Http\Controllers\ProfileController::class, 'update_profile'])->name('update_profile');



//store
Route::get('/store/', [App\Http\Controllers\StoreController::class, 'index'])->name('store');


//custom product
Route::get('/custom-product', [App\Http\Controllers\CustomProductController::class, 'create'])->name('custome-product');
Route::post('/upload_file_custom_product/{id}', [App\Http\Controllers\CustomProductController::class, 'upload_file_custom_product'])->name('upload_file_custom_product');
Route::post('/get_uploaded_files/{id}', [App\Http\Controllers\CustomProductController::class, 'get_uploaded_files'])->name('get_uploaded_files');
Route::post('/get_prop/{id}', [App\Http\Controllers\CustomProductController::class, 'get_prop'])->name('get_prop');
Route::post('/get_paper_type_prop/{id}/{paper_type}', [App\Http\Controllers\CustomProductController::class, 'get_paper_type_prop'])->name('get_paper_type_prop');
Route::post('/custom_productm/update_quantity', [App\Http\Controllers\CustomProductController::class, 'update_quantity'])->name('update_quantity');

Route::post('/set_prop/{id}', [App\Http\Controllers\CustomProductController::class, 'set_prop'])->name('set_prop');
Route::post('/set_cover/{id}', [App\Http\Controllers\CustomProductController::class, 'set_cover'])->name('set_cover');
Route::post('/delete_cover', [App\Http\Controllers\CustomProductController::class, 'delete_cover'])->name('delete_cover');
Route::post('/delete_file', [App\Http\Controllers\CustomProductController::class, 'delete_file'])->name('delete_file');
Route::post('/add_custom_product_to_cart/{id}', [App\Http\Controllers\CustomProductController::class, 'add_custom_product_to_cart'])->name('add_custom_product_to_cart');
Route::post('/split_file/{id}', [App\Http\Controllers\CustomProductController::class, 'split_file'])->name('split_file');
Route::post('/get_price_preview/{id}', [App\Http\Controllers\CustomProductController::class, 'get_price_preview'])->name('get_price_preview');
Route::post('/get_cover_price_preview/{id}', [App\Http\Controllers\CustomProductController::class, 'get_cover_price_preview'])->name('get_cover_price_preview');
Route::post('/get_total_price/{id}', [App\Http\Controllers\CustomProductController::class, 'get_total_price'])->name('get_total_price');
Route::post('/get_covers/{id}', [App\Http\Controllers\CustomProductController::class, 'get_covers'])->name('get_covers');

Route::post('/custom_product/order_file', [App\Http\Controllers\CustomProductController::class, 'order_file'])->name('order_file');
Route::get('/create-poster', [App\Http\Controllers\CustomProductController::class, 'create_poster'])->name('create-poster');
Route::post('/create-poster', [App\Http\Controllers\CustomProductController::class, 'add_poster_product'])->name('create-poster');
Route::post('/get-poster-price', [App\Http\Controllers\CustomProductController::class, 'get_poster_price'])->name('get-poster-price');


Route::get('/create-sticker', [App\Http\Controllers\CustomProductController::class, 'create_sticker'])->name('create-sticker');
Route::post('/create-sticker', [App\Http\Controllers\CustomProductController::class, 'add_sticker_product'])->name('create-sticker');
Route::post('/get-sticker-price', [App\Http\Controllers\CustomProductController::class, 'get_sticker_price'])->name('get-sticker-price');


Route::get('/create-personal-cart', [App\Http\Controllers\CustomProductController::class, 'create_personal_cart'])->name('create-personal-cart');
Route::post('/create-personal-cart', [App\Http\Controllers\CustomProductController::class, 'add_personal_card_product'])->name('create-personal-cart');
Route::post('/get-personal-cart-price', [App\Http\Controllers\CustomProductController::class, 'get_personal_cart_price'])->name('get-personal-cart-price');


Route::get('/create-rollup', [App\Http\Controllers\CustomProductController::class, 'create_rollup'])->name('create-rollup');
Route::post('/create-rollup', [App\Http\Controllers\CustomProductController::class, 'add_rollup_product'])->name('create-rollup');


Route::post('/custom-product/add_to_cart', [App\Http\Controllers\CustomProductController::class, 'add_custom_product_to_cart'])->name('add_custom_product_to_cart');


Route::post('/noti_json', [App\Http\Controllers\NotificationController::class, 'real_time_notification'])->name('noti_route');
Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications');



Route::get('/tickets', [App\Http\Controllers\TicketController::class, 'index'])->name('tickets');
Route::get('/tickets/{id}', [App\Http\Controllers\TicketController::class, 'show_ticket'])->name('show_ticket');
Route::get('/tickets/add', [App\Http\Controllers\TicketController::class, 'add_ticket'])->name('add_ticket');
Route::post('/tickets/add', [App\Http\Controllers\TicketController::class, 'store_ticket'])->name('store_ticket');

Route::post('/tickets/send_message/{id}', [App\Http\Controllers\TicketController::class, 'send_message'])->name('send_message');

Route::get('/admin/blogs/', [App\Http\Controllers\AdminController::class, 'blogs'])->name('blogs');
Route::get('/admin/blogs/add', [App\Http\Controllers\AdminController::class, 'create_blog'])->name('add-blog');
Route::post('/admin/blogs/add', [App\Http\Controllers\AdminController::class, 'store_blog'])->name('add-blog');
Route::get('/admin/blogs/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroy_blog'])->name('delete-blog');

Route::get('/admin/blogs/edit-blog/{id}', [App\Http\Controllers\AdminController::class, 'edit_blog'])->name('edit-blog');
Route::post('/admin/blogs/edit-blog/{id}', [App\Http\Controllers\AdminController::class, 'update_blog'])->name('update-blog');




Route::get('/admin/country', [App\Http\Controllers\AdminController::class, 'country'])->name('country');
Route::get('/admin/country/add', [App\Http\Controllers\AdminController::class, 'create_country'])->name('add-country');
Route::post('/admin/country/add', [App\Http\Controllers\AdminController::class, 'store_country'])->name('add-country');
Route::get('/admin/country/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroy_country'])->name('delete-country');

Route::get('/admin/country/edit-country/{id}', [App\Http\Controllers\AdminController::class, 'edit_country'])->name('edit-country');
Route::post('/admin/country/edit-country/{id}', [App\Http\Controllers\AdminController::class, 'update_country'])->name('update-country');

Route::get('/admin/areas/', [App\Http\Controllers\AdminController::class, 'area'])->name('area');
Route::get('/admin/areas/add', [App\Http\Controllers\AdminController::class, 'create_area'])->name('add-area');
Route::post('/admin/areas/add', [App\Http\Controllers\AdminController::class, 'store_area'])->name('add-area');
Route::get('/admin/areas/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroy_area'])->name('delete-area');

Route::get('/admin/areas/edit-area/{id}', [App\Http\Controllers\AdminController::class, 'edit_area'])->name('edit-area');
Route::post('/admin/areas/edit-area/{id}', [App\Http\Controllers\AdminController::class, 'update_area'])->name('update-area');
Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');
