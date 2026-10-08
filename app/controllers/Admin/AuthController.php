<?php

class AdminAuthController extends Controller
{
    public function loginForm(): void
    {
        if (!empty($_SESSION['admin_id'])) {
            $this->redirect('/admin');
        }
        require VIEWS_PATH . '/admin/login.php';
    }

    public function login(): void
    {
        $username = trim((string) $this->input('username', ''));
        $password = (string) $this->input('password', '');

        $adminModel = new AdminUser();
        $user = $adminModel->attempt($username, $password);

        if (!$user) {
            flash('error', 'Usuario o contraseña incorrectos.');
            $this->redirect('/admin/login');
        }

        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['admin_name'] = $user['full_name'];
        $this->redirect('/admin');
    }

    public function logout(): void
    {
        unset($_SESSION['admin_id'], $_SESSION['admin_name']);
        $this->redirect('/admin/login');
    }
}
