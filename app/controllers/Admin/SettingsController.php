<?php

class AdminSettingsController extends Controller
{
    public function index(): void
    {
        $this->requireLogin();
        $this->adminView('settings/index', ['settingsForm' => Setting::allAsArray()]);
    }

    public function store(): void
    {
        $this->requireLogin();
        $model = new Setting();

        $keys = [
            'site_name', 'site_tagline', 'address', 'phone', 'phone_2', 'email',
            'facebook', 'twitter', 'instagram', 'linkedin', 'map_embed_url',
            'footer_about', 'video_url',
        ];

        $data = [];
        foreach ($keys as $key) {
            $data[$key] = $this->input($key, '');
        }

        $model->setMany($data);
        flash('success', 'Configuración actualizada correctamente.');
        $this->redirect('/admin/settings');
    }
}
