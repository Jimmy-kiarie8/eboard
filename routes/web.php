<?php
use App\Mail\Userregistered;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('dash');
});

Route::get('/', function () {
    Mail::to('jimkiarie8@gmail.com')->send(new Userregistered);
    return view('welcome');
});


//Admin auth 

Route::get('admin/home', 'AdminController@index');

Route::get('admin', 'admin\LoginController@showAdminLoginForm')->name('admin.login');
Route::post('admin', 'admin\LoginController@login');
// Route::post('admin', 'admin\LoginController@logout')->name('admin.logout');

// Registration Routes...
Route::get('admin/register', 'admin\RegisterController@showAdminRegistrationForm')->name('admin.register');
Route::post('admin/register', 'admin\RegisterController@register');

// Password Reset Routes...
Route::get('admin/password/reset', 'admin\ForgotPasswordController@showAdminLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset/{token}', 'admin\ResetPasswordController@showAdminResetForm')->name('admin.password.reset');
Route::post('admin-password/reset', 'admin\ResetPasswordController@reset');

//Admin auth 

// Route::get('/', 'HomeController@docs')->name('show-home');


Route::get('/eboard', function () {
	return view('welcome');
});

Route::get('verifyEmailFirst', 'Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');

Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');
Route::get('/cal', function () {
	return view('calendar');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

// Route::middleware(['auth'])->group(function () {
	Route::get('/eboard/{name}', function () {
		return redirect('/');
	})->where('name', '[A-Za-z]+');
	Route::resource('director', 'DirectorController');
	Route::resource('shareholder', 'ShareholderController');
	Route::resource('users', 'UserController');
	Route::resource('manage', 'ManageController');
	Route::resource('nse', 'NseController');
	Route::resource('file', 'HomeController');
    Route::resource('company', 'CompanyController');
    Route::resource('comment', 'CommentController');
	Route::resource('sharecomment', 'ShareCommentController');
    Route::resource('getdirectcomment', 'DirectCommentController');
    Route::resource('cats', 'CategoryController');
    Route::resource('uploadimage', 'LogoController');
    Route::resource('surveys', 'SurveysController');
    Route::resource('questions', 'QuestionsController');
    Route::resource('answers', 'AnswersController');
	Route::resource('docs', 'SubcatController');
    Route::resource('poll','PollController');
	// Route::resource('report', 'ReportController');
	// Route::resource('posts', 'postsController');



    Route::post('/subcat', 'SubcatController@subcat');
    Route::post('/getattach', 'SubcatController@getattach');


    Route::post('/getcomm', 'CommentController@getcomm');
	Route::post('getDirector', 'DirectorController@getDirector');
	Route::post('getShareholders', 'ShareholderController@getShareholders');
	Route::post('getNse', 'NseController@getNse');
    Route::post('/getsharecomment', 'ShareCommentController@getsharecomment');
    Route::post('/getPosts', 'postsController@getPosts');
    Route::post('/getsurvey', 'SurveysController@getsurvey');
    Route::post('/getAns', 'AnswersController@getAns');
	Route::post('/getquest', 'QuestionsController@getquest');


	Route::post('/submit', function(\Illuminate\Http\Request $request)
	{
		$content = $request['content'];
		return view('posts/output', ['content' => $content]);
	})->name('submit');


	// file upload
	Route::post('/attachments/store', 'HomeController@store')->name('store-attachments');
	Route::post('/attachments', 'HomeController@pullAttachments')->name('pull-attachments');
	Route::delete('/attachments/', 'HomeController@deleteAttachment')->name('delete-attachment');
	Route::post('/attachments/categories', 'HomeController@getCategories')->name('pull-categories');
	Route::post('/categories', 'HomeController@storeCategories');
	Route::post('/getCategory', 'HomeController@getCategory');
    Route::post('/getmanage', 'ManageController@getmanage');
	Route::post('/getcompany', 'CompanyController@getcompany');
	Route::post('/getCat', 'CategoryController@getCat');
	Route::post('/getDocs', 'CategoryController@getDocs');
	Route::post('/getAllUsers', 'CategoryController@getAllUsers');

	Route::post('/getview', 'CompanyController@getview');
    Route::post('/getusersNo', 'CompanyController@getusersNo');
	Route::post('/getusers', 'postsController@getusers');
	Route::post('/getcom', 'ShareholderController@getcom');
    Route::post('/getdircom', 'ShareholderController@getdircom');
    Route::post('/getlogo', 'LogoController@getlogo');
	Route::post('/getpoll', 'PollController@getpoll');


	// blog

	Route::resource('posts', 'postsController');
    Route::get('/dashboard', 'DashboardController@index');
	Route::get('/usersget', 'CompanyController@usersget');
	Route::get('/profiles', 'ProfilesController@index');
	Route::post('/uploadPhoto', 'ProfilesController@uploadPhoto');
	Route::post('/search', 'ProfilesController@search')->name('search');
	Route::get('/changePhoto', function () {
		return view('profiles.pic');
	});
	// Route::resource('menu', 'MenuController');
	// Route::get('/laptop', 'MenuController@index');
    // Route::get('/survey', 'SurveyController@survey')->name('survey');
    // Route::get('/survey/new', 'SurveyController@new_survey')->name('new.survey');

    Route::get('/survey', 'SurveyController@survey');

    Route::get('/survey/new', 'SurveyController@new_survey')->name('new.survey');
    Route::get('/survey/{survey}', 'SurveyController@detail_survey')->name('detail.survey');
    Route::get('/survey/view/{survey}', 'SurveyController@view_survey')->name('view.survey');
    Route::get('/survey/answers/{survey}', 'SurveyController@view_survey_answers')->name('view.survey.answers');
    Route::get('/survey/{survey}/delete', 'SurveyController@delete_survey')->name('delete.survey');

    Route::get('/survey/{survey}/edit', 'SurveyController@edit')->name('edit.survey');
    Route::patch('/survey/{survey}/update', 'SurveyController@update')->name('update.survey');

    Route::post('/survey/view/{survey}/completed', 'AnswerController@store')->name('complete.survey');
    Route::post('/survey/create', 'SurveyController@create')->name('create.survey');

    // Questions related
    Route::post('/survey/{survey}/questions', 'QuestionController@store')->name('store.question');

    Route::get('/question/{question}/edit', 'QuestionController@edit')->name('edit.question');
    Route::patch('/question/{question}/update', 'QuestionController@update')->name('update.question');
    Route::auth();


    /*Route::get('/', 'PollController@index');
    Route::get('/polls','PollController@show');
    Route::post('/polls','PollController@store');*/

    Route::get('chat', 'ChatController@chat');
    Route::get('send', 'ChatController@send');
    // email
// });




/*
$middleware = array_merge(\Config::get('lfm.middlewares'), [
    '\Unisharp\Laravelfilemanager\middlewares\MultiUser',
    '\Unisharp\Laravelfilemanager\middlewares\CreateDefaultFolder',
]);
$prefix = \Config::get('lfm.url_prefix', \Config::get('lfm.prefix', 'laravel-filemanager'));
$as = 'unisharp.lfm.';
$namespace = '\Unisharp\Laravelfilemanager\controllers';

// make sure authenticated
Route::group(compact('middleware', 'prefix', 'as', 'namespace'), function () {

    // Show LFM
    Route::get('/', [
        'uses' => 'LfmController@show',
        'as' => 'show',
    ]);

    // Show integration error messages
    Route::get('/errors', [
        'uses' => 'LfmController@getErrors',
        'as' => 'getErrors',
    ]);

    // upload
    Route::any('/upload', [
        'uses' => 'UploadController@upload',
        'as' => 'upload',
    ]);

    // list images & files
    Route::get('/jsonitems', [
        'uses' => 'ItemsController@getItems',
        'as' => 'getItems',
    ]);

    // folders
    Route::get('/newfolder', [
        'uses' => 'FolderController@getAddfolder',
        'as' => 'getAddfolder',
    ]);
    Route::get('/deletefolder', [
        'uses' => 'FolderController@getDeletefolder',
        'as' => 'getDeletefolder',
    ]);
    Route::get('/folders', [
        'uses' => 'FolderController@getFolders',
        'as' => 'getFolders',
    ]);

    // crop
    Route::get('/crop', [
        'uses' => 'CropController@getCrop',
        'as' => 'getCrop',
    ]);
    Route::get('/cropimage', [
        'uses' => 'CropController@getCropimage',
        'as' => 'getCropimage',
    ]);
    Route::get('/cropnewimage', [
        'uses' => 'CropController@getNewCropimage',
        'as' => 'getCropimage',
    ]);

    // rename
    Route::get('/rename', [
        'uses' => 'RenameController@getRename',
        'as' => 'getRename',
    ]);

    // scale/resize
    Route::get('/resize', [
        'uses' => 'ResizeController@getResize',
        'as' => 'getResize',
    ]);
    Route::get('/doresize', [
        'uses' => 'ResizeController@performResize',
        'as' => 'performResize',
    ]);

    // download
    Route::get('/download', [
        'uses' => 'DownloadController@getDownload',
        'as' => 'getDownload',
    ]);

    // delete
    Route::get('/delete', [
        'uses' => 'DeleteController@getDelete',
        'as' => 'getDelete',
    ]);

    // Route::get('/demo', 'DemoController@index');
});

Route::group(compact('prefix', 'as', 'namespace'), function () {
    // Get file when base_directory isn't public
    $images_url = '/' . \Config::get('lfm.images_folder_name') . '/{base_path}/{image_name}';
    $files_url = '/' . \Config::get('lfm.files_folder_name') . '/{base_path}/{file_name}';
    Route::get($images_url, 'RedirectController@getImage')
        ->where('image_name', '.*');
    Route::get($files_url, 'RedirectController@getFile')
        ->where('file_name', '.*');
});
*/
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
