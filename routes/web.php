<?php

use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Ley5189Controller;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanRequestController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\LimpiarController;
use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::get('/', [WebController::class, 'index'])->name('home');
    Route::get('/contactenos', [WebController::class, 'contact'])->name('contact');
    Route::post('/contactenos', [WebController::class, 'contactSend']);
    Route::get('/institucional/direcciones/{slug?}', [WebController::class, 'departments'])->name('institutional.departments');
    Route::get('/institucional', [WebController::class, 'institutional'])->name('institutional');
    Route::get('/institucional/autoridades', [WebController::class, 'institutionalAuthorities'])->name('institutional.authorities');
    Route::get('/institucional/historia', [WebController::class, 'institutionalHistory'])->name('institutional.history');
    Route::get('/institucional/servicio-medico', [WebController::class, 'institutionalMedical'])->name('institutional.medical');
    Route::get('/institucional/sede-social', [WebController::class, 'institutionalSocial'])->name('institutional.social');
    Route::get('/ley5189/{slug?}', [WebController::class, 'ley5189'])->name('wley5189');
    Route::get('/ley2991/{slug?}', [WebController::class, 'ley2991'])->name('wley2991');
    Route::get('/noticias/{slug?}', [WebController::class, 'news'])->name('wnews');
    Route::get('/limpiar', [LimpiarController::class, 'limpiar']);
    Route::get('/link', function () {
        $target = '/home/zaqptb99qumc/laravel/storage/app/public';
        $shortcut = '/home/zaqptb99qumc/public_html/storage';
        symlink($target, $shortcut);
    });
});

Route::group([
    'prefix' => 'portal',
], function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/forgot', [AuthController::class, 'forgotForm'])->name('forgot');
    Route::post('/forgot', [AuthController::class, 'forgot']);
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::group([
    'prefix' => 'portal',
    'middleware' => 'auth',
], function () {
    Route::get('/', [PortalController::class, 'index'])->name('portal');
    Route::get('/aportes', [PortalController::class, 'aportes'])->name('aportes');
    Route::get('/prestamos', [PortalController::class, 'prestamos'])->name('prestamos');
    Route::get('/prestamos/solicitar', [PortalController::class, 'prestamosSolicitar'])->name('prestamos.solicitar');
    Route::post('/prestamos/solicitar', [PortalController::class, 'prestamosSolicitarPost']);
    Route::resource('/affiliate', AffiliateController::class);
    Route::resource('/ley5189', Ley5189Controller::class)->names('ley5189');
    Route::resource('/prestamo', LoanController::class)->names('loan');
    Route::resource('/prestamo/{loan}/lrequest', LoanRequestController::class)->names('lrequest');
    Route::get('/prestamo/{loan}/lrequest/estado/{lrequest}', [LoanRequestController::class, 'status'])->name('lrequest.status');
    Route::post('/prestamo/{loan}/lrequest/estado/{lrequest}', [LoanRequestController::class, 'statusSend']);

    Route::resource('/municipality', MunicipalityController::class);
    Route::resource('/noticias', NewsController::class)->names('news');
    Route::get('/password', [PortalController::class, 'password'])->name('password');
    Route::post('/password', [PortalController::class, 'passwordSend']);
    Route::get('/account', [PortalController::class, 'accountOption'])->name('account');
    Route::resource('/role', UserRoleController::class);
    Route::resource('/user', UserController::class);
});
