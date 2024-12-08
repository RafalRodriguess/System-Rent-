<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AiapplicationController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ComponentpageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RoleandaccessController;
use App\Http\Controllers\CryptocurrencyController;
use App\Http\Controllers\SiteController;

// Rotas para site público
Route::prefix('/')->group(function () {
    Route::controller(SiteController::class)->group(function () {
        Route::get('/', 'index')->name('site.site');

    });
});


// Autenticação
Route::prefix('authentication')->group(function () {
    Route::controller(AuthenticationController::class)->group(function () {
        Route::get('/signin', 'signIn')->name('signin');
        Route::post('/signin', 'login')->name('login');
        Route::get('/signup', 'signUp')->name('signup');
        Route::post('/register', 'register')->name('register');
        Route::get('/forgotpassword', 'forgotPassword')->name('forgotPassword');
        Route::post('/logout', 'logout')->name('logout');
    });
});

// Dashboard (Protegido por autenticação)
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/index2', 'index2')->name('index2');
        Route::get('/index3', 'index3')->name('index3');
        Route::get('/index4', 'index4')->name('index4');
        Route::get('/index5', 'index5')->name('index5');
        Route::get('/index6', 'index6')->name('index6');
        Route::get('/index7', 'index7')->name('index7');
        Route::get('/index8', 'index8')->name('index8');
        Route::get('/index9', 'index9')->name('index9');
        Route::get('/index10', 'index10')->name('index10');
        Route::get('/wallet', 'wallet')->name('wallet');
    });
});

// Usuários
Route::middleware(['auth'])->prefix('users')->group(function () {
    Route::controller(UsersController::class)->group(function () {
        Route::get('/', 'index')->name('users.index');
        Route::get('/create', 'create')->name('users.create');
        Route::post('/', 'store')->name('users.store');
        Route::get('/{id}', 'show')->name('users.show');
        Route::get('/{id}/edit', 'edit')->name('users.edit');
        Route::put('/{id}', 'update')->name('users.update');
        Route::delete('/{id}', 'destroy')->name('users.destroy');
        Route::get('/users-grid', 'usersGrid')->name('usersGrid');
        Route::get('/users-list', 'usersList')->name('usersList');
        Route::put('/{user}/update-password', 'updatePassword')->name('users.update-password');
    });
});


// Veiculos
Route::middleware(['auth'])->prefix('veiculos')->group(function () {
    Route::controller(VeiculoController::class)->group(function () {
        Route::get('/', 'index')->name('veiculos.index');
        Route::get('create', 'create')->name('veiculos.create');
        Route::post('/', 'store')->name('veiculos.store');
        Route::put('{id}', 'update')->name('veiculos.update');
        Route::delete('{id}', 'destroy')->name('veiculos.destroy');
        Route::get('{id}/edit', 'edit')->name('veiculos.edit');
    });
});



// Relatórios
Route::middleware(['auth'])->prefix('reports')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/sales', 'sales')->name('reports.sales');
        Route::get('/users', 'users')->name('reports.users');
    });
});

// Configurações
Route::middleware(['auth'])->prefix('settings')->group(function () {
    Route::controller(SettingsController::class)->group(function () {
        Route::get('/company', 'company')->name('settings.company');
        Route::get('/currencies', 'currencies')->name('settings.currencies');
        Route::get('/language', 'language')->name('settings.language');
        Route::get('/notification', 'notification')->name('settings.notification');
        Route::get('/payment-gateway', 'paymentGateway')->name('settings.paymentGateway');
        Route::get('/theme', 'theme')->name('settings.theme');
    });
});

// AI Application
Route::middleware(['auth'])->prefix('aiapplication')->group(function () {
    Route::controller(AiapplicationController::class)->group(function () {
        Route::get('/codegenerator', 'codeGenerator')->name('codeGenerator');
        Route::get('/imagegenerator', 'imageGenerator')->name('imageGenerator');
        Route::get('/textgenerator', 'textGenerator')->name('textGenerator');
        Route::get('/videogenerator', 'videoGenerator')->name('videoGenerator');
        Route::get('/voicegenerator', 'voiceGenerator')->name('voiceGenerator');
    });
});

// Charts
Route::middleware(['auth'])->prefix('chart')->group(function () {
    Route::controller(ChartController::class)->group(function () {
        Route::get('/columnchart', 'columnChart')->name('columnChart');
        Route::get('/linechart', 'lineChart')->name('lineChart');
        Route::get('/piechart', 'pieChart')->name('pieChart');
    });
});

// Componentes
Route::middleware(['auth'])->prefix('components')->group(function () {
    Route::controller(ComponentpageController::class)->group(function () {
        Route::get('/alert', 'alert')->name('alert');
        Route::get('/button', 'button')->name('button');
        Route::get('/card', 'card')->name('card');
        Route::get('/colors', 'colors')->name('colors');
        Route::get('/progress', 'progress')->name('progress');
        Route::get('/tabs', 'tabs')->name('tabs');
        Route::get('/tooltip', 'tooltip')->name('tooltip');
    });
});

// Forms
Route::middleware(['auth'])->prefix('forms')->group(function () {
    Route::controller(FormsController::class)->group(function () {
        Route::get('/form-layout', 'formLayout')->name('formLayout');
        Route::get('/form-validation', 'formValidation')->name('formValidation');
        Route::get('/form', 'form')->name('form');
        Route::get('/wizard', 'wizard')->name('wizard');
    });
});

// Faturas
Route::middleware(['auth'])->prefix('invoice')->group(function () {
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/add', 'invoiceAdd')->name('invoice.add');
        Route::get('/edit', 'invoiceEdit')->name('invoice.edit');
        Route::get('/list', 'invoiceList')->name('invoice.list');
        Route::get('/preview', 'invoicePreview')->name('invoice.preview');
    });
});

// Blog
Route::middleware(['auth'])->prefix('blog')->group(function () {
    Route::controller(BlogController::class)->group(function () {
        Route::get('/add', 'addBlog')->name('blog.add');
        Route::get('/', 'blog')->name('blog');
        Route::get('/details', 'blogDetails')->name('blog.details');
    });
});

// Papel e Acesso
Route::middleware(['auth'])->prefix('roleandaccess')->group(function () {
    Route::controller(RoleandaccessController::class)->group(function () {
        Route::get('/assign', 'assignRole')->name('role.assign');
        Route::get('/', 'roleAaccess')->name('role.access');
    });
});

// Criptomoedas
Route::middleware(['auth'])->prefix('cryptocurrency')->group(function () {
    Route::controller(CryptocurrencyController::class)->group(function () {
        Route::get('/marketplace', 'marketplace')->name('cryptocurrency.marketplace');
        Route::get('/details', 'marketplaceDetails')->name('cryptocurrency.details');
        Route::get('/portfolio', 'portfolio')->name('cryptocurrency.portfolio');
        Route::get('/wallet', 'wallet')->name('cryptocurrency.wallet');
    });
});
