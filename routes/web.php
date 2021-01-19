<?php

use Jenssegers\Agent\Agent;
use App\config_quoteandsell;
use App\LoginRegister;
use App\Product;
use App\Category;
use App\Categorytwo;
use App\Categorythree;
use App\Categoryfour;
use App\Categoryfive;



/*
|--------------------------------------------------------------------------
| Dependency
|--------------------------------------------------------------------------
|
*/

// Product dependency injection
Route::bind('product', function($slug){
	return App\Product::where('slug', $slug)->first();
});

// Category dependency injection
Route::bind('category', function($category){
    return App\Category::find($category);
});

// User dependency injection
Route::bind('user', function($user){
    return App\User::find($user);
});

// config_quoteandsell dependency injection
Route::bind('config_quoteandsell', function($config_quoteandsell){
    return App\config_quoteandsell::find($config_quoteandsell)->first();
});

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

Route::get('locale/{locale}',function ($locale) {
    Session::put('locale',$locale);
    return redirect()->back();
});

Auth::routes();

Route::get('/', function () {
    
    /*Conseguir configuracion de visualizacion por defoult de vendeloya */ 
    $config_quoteandsell = config_quoteandsell::first();
	$view_type_products = $config_quoteandsell->view_type_products;
	$view_type_scream = $config_quoteandsell->view_type_scream ;
	$categoryselect = $config_quoteandsell->Category_id;
	
	$products  = DB::table('products')->where('category_id', $categoryselect)
												->where('visible', '1')
												->paginate(4);
	
	
	$categories= Category::all()->where('id',$categoryselect)->pluck('name');
    $Categoryname = json_encode($categories);
   
    $len = strlen($Categoryname); 
    $Categoryname = substr($Categoryname, 2, $len - 3);
    $len = strlen($Categoryname); 
	$Categoryname = substr($Categoryname, 0, $len - 1);
	
	$categories= Category::all();
	
	$agent = new Agent();

	
	if ($config_quoteandsell->Active_site) {
		if($agent->isMobile()) {
           
			$products = Product::where('category_id', '<>', 1);
			return view('home.mobile.index', compact('products','categories','categoriestwo','view_type_products','view_type_scream','categoryselect','Categoryname'), compact('config_quoteandsell'));
		}else {
			return view('home.desktop.index', compact('products','categories','view_type_products','view_type_scream','categoryselect','Categoryname'), compact('config_quoteandsell'));
		} 
	}else {
		$products = Product::all()->where('visible', '1');
		return view('home.siteoffline',compact('config_quoteandsell')); 
	}
	

})->name('home');

Route::get('/welcome', function () {


    $ip = \Request::ip();
   
        
    if(Auth::check()) {
        $config_quoteandsell = config_quoteandsell::first();
		$LoginRegister= LoginRegister::create([
			'user_id' 					=> Auth::user()->id,
			'ip_access' 				=> $ip,
			'country_access' 			=> "",
			'view_type_products' 		=> $config_quoteandsell->view_type_products,
			'view_type_scream' 			=> $config_quoteandsell->view_type_scream,
			'Category_id' 				=> $config_quoteandsell->Category_id,
        ]);
        $userid = Auth::user()->id;
		$loginRegister = LoginRegister::where('user_id', $userid)->max('id');
		$loginid = json_encode($loginRegister);
		$LoginRegister = LoginRegister::find($loginid);
		if($LoginRegister == null) {
			/*Auth::logout();*/
			$config_quoteandsell    = config_quoteandsell::first();
			$view_type_products     = $config_quoteandsell->view_type_products;
			$view_type_scream       = $config_quoteandsell->view_type_scream ;
			$categoryselect         = $config_quoteandsell->Category_id;
		}else {
			$view_type_products     = $LoginRegister->view_type_products;
			$view_type_scream       = $LoginRegister->view_type_scream;
			$categoryselect         = $LoginRegister->Category_id;
			$config_quoteandsell    = config_quoteandsell::first();
		}	

    } else {
        /*Conseguir configuracion de visualizacion por defoult de vendeloya */ 
        $config_quoteandsell = config_quoteandsell::first();
		$view_type_products = $config_quoteandsell->view_type_products;
		$view_type_scream = $config_quoteandsell->view_type_scream ;
		$categoryselect = $config_quoteandsell->Category_id; 
    }    

   
	$products  = DB::table('products')->where('category_id', $categoryselect)
	   									->where('visible', '1')
										->paginate(4);
	

    
    $agent = new Agent();
	
	$categories= Category::all()->where('id',$categoryselect)->pluck('name');
    $Categoryname = json_encode($categories);
   
    $len = strlen($Categoryname); 
    $Categoryname = substr($Categoryname, 2, $len - 3);
    $len = strlen($Categoryname); 
	$Categoryname = substr($Categoryname, 0, $len - 1);
	
	$categories= Category::all();
    
	if ($config_quoteandsell->Active_site) {
		if($agent->isMobile()) {

			$products = Product::where('category_id', '<>', 1);
			return view('home.mobile.index', compact('products','categories','categoriestwo','view_type_products','view_type_scream','categoryselect','Categoryname'), compact('config_quoteandsell'));
		}else {
			$products = Product::all()->where('visible', '1');
			return view('home.desktop.index', compact('products','categories','view_type_products','view_type_scream','categoryselect','Categoryname'), compact('config_quoteandsell'));
		} 
	}else {
		return view('home.siteoffline',compact('config_quoteandsell')); 
	}
	
    
})->name('welcome');


Route::get('logout', function () {
	Auth::logout();
	$config_quoteandsell = config_quoteandsell::first();
    $view_type_products = $config_quoteandsell->view_type_products;
    $view_type_scream = $config_quoteandsell->view_type_scream ;
    $categoryselect = $config_quoteandsell->Category_id;

    $agent = new Agent();
    $categories= Category::all();
	
	if ($config_quoteandsell->Active_site) {
		if($agent->isMobile()) {
			$products = Product::all();
			$config_quoteandsell->Image_slider_5 =  $pre_pathimagemobile .'/mobile' . $post_pathimagemobile;

			return view('home.mobile.index', compact('products','categories','categoriestwo','view_type_products','view_type_scream','categoryselect'), compact('config_quoteandsell'));
		 } else {
			return view('home.desktop.index', compact('products','categories','view_type_products','view_type_scream','categoryselect'), compact('config_quoteandsell'),compact('user'));
		 } 
	}else {
		return view('Store.siteoffline',compact('config_quoteandsell')); 
	}
    
})->name('logout');


// Route Home


Route::get('go-store/{id}/{id2}', [
	'as' => 'go-store',
	'uses' => 'StoreController@gostore'
]);

Route::get('product/{slug}/{id}/{id2}', [
	'as' => 'product-detail',
	'uses' => 'StoreController@show'
]);

Route::get('download-file/{file}', [
	'as' => 'download-file',
	'uses' => 'StoreController@downloadfile'
]);

Route::get('gocorporation', [
	'as' => 'go-corporation',
	'uses' => 'StoreController@gocorporation'
]);

Route::resource('storecontroller', 'StoreController');


// Aun por verificar si pasan a space admin

Route::resource('contactus', 'ContactUsController');

Route::get('reports/contactUswebsite', [
	'as' => 'reports-contactUswebsite',
	'uses' => 'ReportsController@contactUswebsite'
]);

Route::post('/reports/datatable/contactUswebsite','DataTableReportsController@getcontactUswebsite')->name('dtcontactUsWebSiteProcessing');

/*
|--------------------------------------------------------------------------
| Route dashboard
|--------------------------------------------------------------------------
|
*/


// crud user
	Route::post('admin_users','DataAdminUserController@getusers')->name('dataProcessing3');
	Route::get('deleteuser/{id}', 'Admin\UserController@deleteuser');
	Route::Post('updateselluser/{id}', 'Admin\UserController@updateselluser');
	Route::get('confirmdeleteuser/{id}', 'Admin\UserController@confirmdeleteuser');
	Route::get('assingselltouser/{id}', 'Admin\UserController@assingselltouser');

// crud product

	Route::post('admin_products','DataAdminProductController@getproducts')->name('dataProcessing2');
	Route::get('activeupdate/{id}', 'Admin\ProductController@activeupdate');
	Route::get('deleteproduct/{id}', 'Admin\ProductController@deleteproduct');
	Route::get('confirmdeleteproduct/{id}', 'Admin\ProductController@confirmdeleteproduct');

// space admin

Route::namespace('Admin')->middleware('auth')->prefix('admin')->group(function () {
	
	Route::resource('config_quoteandsell', 'ConfigController');
	
	Route::resource('category', 'CategoryController');
	
	Route::resource('product', 'ProductController');
	
	Route::get('product/updateactive/{slug}', [
		'as' => 'productactiveupdate-show',
		'uses' => 'ProductController@show'
	]);
	   
	Route::get('product-loadimport','ExcelController@productsloadimport')->name('product.loadimport');
	Route::get('product-deleteall','ExcelController@productsdelete')->name('product.deleteall');

	Route::resource('dashboard', 'DashboardController');
	
	Route::resource('filemanager', 'FileManagerController');
	
	Route::resource('user', 'UserController');

});


/*
|--------------------------------------------------------------------------
| Route Import-Export Excel with Maatwebsite\Excel
|--------------------------------------------------------------------------
|
*/

// Products
Route::get('importExportView', 'ImpExpProductsController@importExportView')->name('ImportExportProductsView');
Route::get('export', 'ImpExpProductsController@export')->name('ExportProducts');
Route::get('ExportLanco', 'ImpExpProductsController@exportlanco')->name('ExportLanco');
Route::get('ExportPriceList', 'ImpExpProductsController@exportpricelist')->name('ExportPriceList');
Route::post('import', 'ImpExpProductsController@import')->name('ImportProducts');