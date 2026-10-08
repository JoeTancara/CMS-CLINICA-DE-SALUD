<?php

class AdminServiceController extends Controller
{
    public function index(): void
    {
        $this->requireLogin();
        $model = new Service();
        $this->adminView('services/index', ['items' => $model->all('sort_order ASC, id ASC')]);
    }

    public function create(): void
    {
        $this->requireLogin();
        $this->adminView('services/form', ['item' => null]);
    }

    public function edit(int $id): void
    {
        $this->requireLogin();
        $model = new Service();
        $item = $model->find($id);
        if (!$item) {
            flash('error', 'Servicio no encontrado.');
            $this->redirect('/admin/services');
        }
        $this->adminView('services/form', ['item' => $item]);
    }

    public function store(): void
    {
        $this->requireLogin();
        $model = new Service();

        $title = trim((string) $this->input('title', ''));
        if ($title === '') {
            flash('error', 'El título es obligatorio.');
            $this->redirect('/admin/services/create');
        }

        $id = $this->input('id');
        $image = upload_image('image', $this->input('current_image'));

        $data = [
            'title'             => $title,
            'slug'              => $model->uniqueSlug($this->input('slug') ?: $title, $id ? (int)$id : null),
            'short_description' => $this->input('short_description'),
            'image'             => $image,
            'icon'              => $this->input('icon', 'fa-diagnoses'),
            'content'           => $this->input('content'),
            'sort_order'        => (int) $this->input('sort_order', 0),
            'status'            => $this->input('status') ? 1 : 0,
        ];

        if ($id) {
            $model->update((int)$id, $data);
            flash('success', 'Servicio actualizado correctamente.');
        } else {
            $model->create($data);
            flash('success', 'Servicio creado correctamente.');
        }

        $this->redirect('/admin/services');
    }

    public function delete(int $id): void
    {
        $this->requireLogin();
        (new Service())->delete($id);
        flash('success', 'Servicio eliminado.');
        $this->redirect('/admin/services');
    }
}
