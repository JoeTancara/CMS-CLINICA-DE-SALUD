<?php

class AdminContentBlockController extends Controller
{
    private array $keys = [
        'home_services'     => 'Inicio - Sección Servicios',
        'home_features'     => 'Inicio - Sección Características',
        'home_appointment'  => 'Inicio - Sección Cita/Video',
        'home_team'         => 'Inicio - Sección Equipo',
        'home_testimonial'  => 'Inicio - Sección Testimonios',
        'about_intro'       => 'Sobre nosotros - Introducción',
        'contact_intro'     => 'Contacto - Introducción',
    ];

    public function index(): void
    {
        $this->requireLogin();
        $model = new ContentBlock();
        $items = [];
        foreach ($this->keys as $key => $label) {
            $block = $model->getByKey($key);
            $block['label'] = $label;
            $items[] = $block;
        }
        $this->adminView('content_blocks/index', ['items' => $items]);
    }

    public function edit(string $key): void
    {
        $this->requireLogin();
        if (!isset($this->keys[$key])) {
            flash('error', 'Bloque no encontrado.');
            $this->redirect('/admin/content-blocks');
        }
        $model = new ContentBlock();
        $this->adminView('content_blocks/form', [
            'item'  => $model->getByKey($key),
            'label' => $this->keys[$key],
        ]);
    }

    public function store(): void
    {
        $this->requireLogin();
        $key = $this->input('block_key');
        if (!isset($this->keys[$key])) {
            flash('error', 'Bloque no válido.');
            $this->redirect('/admin/content-blocks');
        }

        $model = new ContentBlock();
        $existing = $model->findBy('block_key', $key);
        $image = upload_image('image', $this->input('current_image'));

        $data = [
            'block_key' => $key,
            'title'     => $this->input('title'),
            'subtitle'  => $this->input('subtitle'),
            'body'      => $this->input('body'),
            'image'     => $image,
        ];

        if ($existing) {
            $model->update($existing['id'], $data);
        } else {
            $model->create($data);
        }

        flash('success', 'Texto actualizado correctamente.');
        $this->redirect('/admin/content-blocks');
    }
}
