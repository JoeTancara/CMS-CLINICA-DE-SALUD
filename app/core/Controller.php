<?php

abstract class Controller
{
    /**
     * Renderiza una vista pública dentro del layout (header + footer).
     */
    protected function view(string $view, array $data = []): void
    {
        extract($data);
        $settings = $data['settings'] ?? Setting::allAsArray();
        require VIEWS_PATH . '/partials/header.php';
        require VIEWS_PATH . "/{$view}.php";
        require VIEWS_PATH . '/partials/footer.php';
    }

    /**
     * Renderiza una vista del panel admin dentro de su propio layout.
     */
    protected function adminView(string $view, array $data = []): void
    {
        extract($data);
        $settings = $data['settings'] ?? Setting::allAsArray();
        require VIEWS_PATH . '/admin/_header.php';
        require VIEWS_PATH . "/admin/{$view}.php";
        require VIEWS_PATH . '/admin/_footer.php';
    }

    protected function redirect(string $path): void
    {
        header('Location: ' . base_url($path));
        exit;
    }

    protected function requireLogin(): void
    {
        if (empty($_SESSION['admin_id'])) {
            flash('error', 'Debes iniciar sesión para continuar.');
            $this->redirect('/admin/login');
        }
    }

    protected function input(string $key, $default = null)
    {
        return $_POST[$key] ?? $_GET[$key] ?? $default;
    }

    protected function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
}
