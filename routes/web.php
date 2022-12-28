<?php

use Illuminate\Support\Facades\Route;
//UI Controller
use App\http\Controllers\HomeController;
use App\http\Controllers\CartController;
use App\http\Controllers\CheckOutController;
use App\http\Controllers\CustomerController;
use App\http\Controllers\ShippingController;
//Admin Controller
use App\http\Controllers\LoginRegisterController;
use App\http\Controllers\DashboardController;
use App\http\Controllers\CategoryController;
use App\http\Controllers\SubCategoryController;
use App\http\Controllers\BrandController;
use App\http\Controllers\UnitController;
use App\http\Controllers\SizeController;
use App\http\Controllers\ColorController;
use App\http\Controllers\ProductController;




// Admin route
Route::get('/admins',[LoginRegisterController::class,'Login']);
Route::post('/login',[LoginRegisterController::class,'LoginToApps']);
Route::get('/logout',[LoginRegisterController::class,'LogOut']);
Route::get('/Dashboard',[DashboardController::class,'Dashboard'])->middleware('loginAuth');

//Category Managment
Route::get('/allCategory',[CategoryController::class,'Index'])->middleware('loginAuth');
Route::get('/createCategory',[CategoryController::class,'createCategory'])->middleware('loginAuth');
Route::post('/store',[CategoryController::class,'Store'])->middleware('loginAuth');
Route::get('/active/{id}',[CategoryController::class,'StatusActive'])->middleware('loginAuth');
Route::get('/Deactive/{id}',[CategoryController::class,'StatusDeactive'])->middleware('loginAuth');
Route::get('/delete/cat/{id}',[CategoryController::class,'DeleteCategory'])->middleware('loginAuth');
Route::get('/categoryEdit/{id}',[CategoryController::class,'EditCategory'])->middleware('loginAuth');
Route::post('/update/category/{id}',[CategoryController::class,'UpdateCategory'])->middleware('loginAuth');

//Sub Category Managment
Route::get('/allSubCategory',[SubCategoryController::class,'Index'])->middleware('loginAuth');
Route::get('/createSubCategory',[SubCategoryController::class,'createSubCategory'])->middleware('loginAuth');
Route::post('/SubCatStore',[SubCategoryController::class,'Store'])->middleware('loginAuth');
Route::get('/SubCategoryEdit/{id}',[SubCategoryController::class,'EditSubCategory'])->middleware('loginAuth');
Route::get('/subactive/{id}',[SubCategoryController::class,'StatusActive'])->middleware('loginAuth');
Route::get('/subDeactive/{id}',[SubCategoryController::class,'StatusDeactive'])->middleware('loginAuth');
Route::get('/subdelete/cat/{id}',[SubCategoryController::class,'DeleteSubCategory'])->middleware('loginAuth');
Route::get('/SubscategoryEdit/{id}',[SubCategoryController::class,'EditSubCategory'])->middleware('loginAuth');
Route::post('/update/subcategory/{id}',[SubCategoryController::class,'UpdateSubCategory'])->middleware('loginAuth');

//Brand Managment systeam
Route::get('/allBrands',[BrandController::class,'Index'])->middleware('loginAuth');
Route::get('/AddBrands',[BrandController::class,'AddBrands'])->middleware('loginAuth');
Route::post('/StoreBrands',[BrandController::class,'StoreBrands'])->middleware('loginAuth');
Route::get('/Brandactive/{id}',[BrandController::class,'StatusActive'])->middleware('loginAuth');
Route::get('/BrandDeactive/{id}',[BrandController::class,'StatusDeactive'])->middleware('loginAuth');
Route::get('/Delete/brand/{id}',[BrandController::class,'DeleteBrand'])->middleware('loginAuth');
Route::get('/BrandEdit/{id}',[BrandController::class,'EditBrand'])->middleware('loginAuth');
Route::post('/update/brand/{id}',[BrandController::class,'UpdateBrands'])->middleware('loginAuth');

//Brand Managment systeam
Route::get('/allUnits',[UnitController::class,'Index'])->middleware('loginAuth');
Route::get('/AddUnits',[UnitController::class,'AddUnits'])->middleware('loginAuth');
Route::post('/StoreUnits',[UnitController::class,'StoreUnits'])->middleware('loginAuth');
Route::get('/UnitsActive/{id}',[UnitController::class,'StatusActive'])->middleware('loginAuth');
Route::get('/UnitsDeactive/{id}',[UnitController::class,'StatusDeactive'])->middleware('loginAuth');
Route::get('/Delete/units/{id}',[UnitController::class,'DeleteUnits'])->middleware('loginAuth');
Route::get('/Units/edit/{id}',[UnitController::class,'EditUnits'])->middleware('loginAuth');
Route::post('/Units/update/{id}',[UnitController::class,'UnitUpdate'])->middleware('loginAuth');

//Sizes Route Managment systeam
Route::get('/allSizes',[SizeController::class,'Index'])->middleware('loginAuth');
Route::get('/AddSizes',[SizeController::class,'AddSizes'])->middleware('loginAuth');
Route::post('/StoreSize',[SizeController::class,'StoreSize'])->middleware('loginAuth');
Route::get('/SizeActive/{id}',[SizeController::class,'StatusActive'])->middleware('loginAuth');
Route::get('/SizeDeactive/{id}',[SizeController::class,'StatusDeactive'])->middleware('loginAuth');
Route::get('/Delete/Size/{id}',[SizeController::class,'DeleteSize'])->middleware('loginAuth');
Route::get('/Size/Edit/{id}',[SizeController::class,'EditSize'])->middleware('loginAuth');
Route::post('/updateSizes/{id}',[SizeController::class,'UpdateSizes'])->middleware('loginAuth');

//Color Managment Systeam
Route::get('/allColor',[ColorController::class,'Index'])->middleware('loginAuth');
Route::get('/AddColor',[ColorController::class,'AddColor'])->middleware('loginAuth');
Route::post('/StoreColor',[ColorController::class,'StoreColor'])->middleware('loginAuth');
Route::get('/ColorActive/{id}',[ColorController::class,'StatusActive'])->middleware('loginAuth');
Route::get('/ColorDeactive/{id}',[ColorController::class,'StatusDeactive'])->middleware('loginAuth');
Route::get('/Delete/Color/{id}',[ColorController::class,'DeleteColor'])->middleware('loginAuth');
Route::get('/Color/Edit/{id}',[ColorController::class,'EditColor'])->middleware('loginAuth');
Route::post('/updateColor/{id}',[ColorController::class,'updateColor'])->middleware('loginAuth');

//Product Managment system
Route::get('/products',[ProductController::class,'Index'])->middleware('loginAuth');
Route::get('/AddProduct',[ProductController::class,'AddProduct'])->middleware('loginAuth');
Route::post('/StoreProduct',[ProductController::class,'StoreProduct'])->middleware('loginAuth');
Route::get('/ProActive/{id}',[ProductController::class,'StatusActive'])->middleware('loginAuth');
Route::get('/ProDeactive/{id}',[ProductController::class,'StatusDeactive'])->middleware('loginAuth');
Route::get('/delete/product/{id}',[ProductController::class,'DeleteProduct'])->middleware('loginAuth');
Route::get('/ProductEdits/{id}',[ProductController::class,'EditProduct'])->middleware('loginAuth');
Route::post('/UpdateProduct/{id}',[ProductController::class,'UpdateProduct'])->middleware('loginAuth');



// UI Route
Route::get('/',[HomeController::class,'Index']);
Route::get('/single/product/{id}',[HomeController::class,'SingleProduct']);
Route::get('/Shop/{cate_name}/{id}',[HomeController::class,'Shop']);
Route::get('/Shops/{brand_name}/{id}',[HomeController::class,'ShopByBrand']);

//Cart Route Managment Systeam
Route::post('/add-to-cart/{id}',[CartController::class,'Add_To_Cart']);
Route::get('/cart-remove/{id}',[CartController::class,'RemoveCart']);

//Checkout Route Managment
Route::get('/checkout',[CheckOutController::class,'Index'])->middleware('customerAuth');

//Customer Login & Register & Logout
Route::get('/customer',[CustomerController::class,'Index']);
Route::get('/customer-signout',[CustomerController::class,'SignOut']);
Route::post('/customer-login',[CustomerController::class,'CustomerLogin']);
Route::post('/customer-register',[CustomerController::class,'CustomerRegistration']);

//Place Order route
Route::get('/save-shipping-details',[ShippingController::class,'ShippingDetails'])->middleware('customerAuth');

Route::get('/Payment',[ShippingController::class,'Payment'])->middleware('customerAuth');
Route::post('/place-order',[ShippingController::class,'PlaceOrder'])->middleware('customerAuth');

