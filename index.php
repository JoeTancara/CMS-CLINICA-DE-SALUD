<?php

session_start();

if (PHP_SAPI === 'cli-server') {
    $requested = __DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if ($requested !== __DIR__ . '/' && is_file($requested)) {
        return false;
    }
}

require __DIR__ . '/config/config.php';

foreach ([
    APP_PATH . '/core/*.php',
    APP_PATH . '/models/*.php',
    APP_PATH . '/controllers/*.php',
    APP_PATH . '/controllers/Admin/*.php',
] as $pattern) {
    foreach (glob($pattern) as $file) {
        require_once $file;
    }
}

require APP_PATH . '/helpers/functions.php';

$router = new Router();

// --- Sitio público ---
$router->get('/', function () {
    (new HomeController())->index();
});

$router->get('/servicios', function () {
    (new ServiceController())->index();
});

$router->get('/servicio/{slug}', function (string $slug) {
    (new ServiceController())->show($slug);
});

$router->get('/sobre-nosotros', function () {
    (new PageController())->about();
});

$router->get('/equipo', function () {
    (new PageController())->team();
});

$router->get('/motivacion', function () {
    (new PageController())->testimonial();
});

$router->get('/caracteristicas', function () {
    (new PageController())->feature();
});

$router->get('/cita', function () {
    (new PageController())->appointment();
});
$router->post('/cita', function () {
    (new PageController())->storeAppointment();
});

$router->get('/contacto', function () {
    (new ContactController())->index();
});
$router->post('/contacto', function () {
    (new ContactController())->store();
});

// --- Panel de administración ---
$router->get('/admin/login', function () {
    (new AdminAuthController())->loginForm();
});
$router->post('/admin/login', function () {
    (new AdminAuthController())->login();
});
$router->get('/admin/logout', function () {
    (new AdminAuthController())->logout();
});

$router->get('/admin', function () {
    (new AdminDashboardController())->index();
});

// Servicios
$router->get('/admin/services', fn() => (new AdminServiceController())->index());
$router->get('/admin/services/create', fn() => (new AdminServiceController())->create());
$router->get('/admin/services/edit/{id}', fn($id) => (new AdminServiceController())->edit((int)$id));
$router->post('/admin/services/store', fn() => (new AdminServiceController())->store());
$router->get('/admin/services/delete/{id}', fn($id) => (new AdminServiceController())->delete((int)$id));

// Slides
$router->get('/admin/slides', fn() => (new AdminSlideController())->index());
$router->get('/admin/slides/create', fn() => (new AdminSlideController())->create());
$router->get('/admin/slides/edit/{id}', fn($id) => (new AdminSlideController())->edit((int)$id));
$router->post('/admin/slides/store', fn() => (new AdminSlideController())->store());
$router->get('/admin/slides/delete/{id}', fn($id) => (new AdminSlideController())->delete((int)$id));

// Features
$router->get('/admin/features', fn() => (new AdminFeatureController())->index());
$router->get('/admin/features/create', fn() => (new AdminFeatureController())->create());
$router->get('/admin/features/edit/{id}', fn($id) => (new AdminFeatureController())->edit((int)$id));
$router->post('/admin/features/store', fn() => (new AdminFeatureController())->store());
$router->get('/admin/features/delete/{id}', fn($id) => (new AdminFeatureController())->delete((int)$id));

// Equipo
$router->get('/admin/team', fn() => (new AdminTeamController())->index());
$router->get('/admin/team/create', fn() => (new AdminTeamController())->create());
$router->get('/admin/team/edit/{id}', fn($id) => (new AdminTeamController())->edit((int)$id));
$router->post('/admin/team/store', fn() => (new AdminTeamController())->store());
$router->get('/admin/team/delete/{id}', fn($id) => (new AdminTeamController())->delete((int)$id));

// Testimonios
$router->get('/admin/testimonials', fn() => (new AdminTestimonialController())->index());
$router->get('/admin/testimonials/create', fn() => (new AdminTestimonialController())->create());
$router->get('/admin/testimonials/edit/{id}', fn($id) => (new AdminTestimonialController())->edit((int)$id));
$router->post('/admin/testimonials/store', fn() => (new AdminTestimonialController())->store());
$router->get('/admin/testimonials/delete/{id}', fn($id) => (new AdminTestimonialController())->delete((int)$id));

// Bloques de texto
$router->get('/admin/content-blocks', fn() => (new AdminContentBlockController())->index());
$router->get('/admin/content-blocks/edit/{key}', fn($key) => (new AdminContentBlockController())->edit($key));
$router->post('/admin/content-blocks/store', fn() => (new AdminContentBlockController())->store());

// Configuración
$router->get('/admin/settings', fn() => (new AdminSettingsController())->index());
$router->post('/admin/settings/store', fn() => (new AdminSettingsController())->store());

// Mensajes / citas
$router->get('/admin/messages', fn() => (new AdminMessageController())->index());
$router->get('/admin/messages/{id}', fn($id) => (new AdminMessageController())->show((int)$id));
$router->get('/admin/messages/delete/{id}', fn($id) => (new AdminMessageController())->delete((int)$id));

$router->dispatch();
