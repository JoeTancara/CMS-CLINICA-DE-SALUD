<?php

class AdminFeatureController extends Controller
{
    public function index(): void
    {
        $this->requireLogin();
        $model = new Feature();
        $this->adminView('features/index', ['items' => $model->all('sort_order ASC, id ASC')]);
    }

    public function create(): void
    {
        $this->requireLogin();
        $this->adminView('features/form', ['item' => null]);
    }

    public function edit(int $id): void
    {
        $this->requireLogin();
        $model = new Feature();
        $item = $model->find($id);
        if (!$item) {
            flash('error', 'Característica no encontrada.');
            $this->redirect('/admin/features');
        }
        $this->adminView('features/form', ['item' => $item]);
    }

    public function store(): void
    {
        $this->requireLogin();
        $model = new Feature();
        $id = $this->input('id');

        $title = trim((string) $this->input('title', ''));
        if ($title === '') {
            flash('error', 'El título es obligatorio.');
            $this->redirect($id ? '/admin/features/edit/' . $id : '/admin/features/create');
        }

        $data = [
            'icon'        => $this->input('icon', 'fa-heart'),
            'title'       => $title,
            'description' => $this->input('description'),
            'sort_order'  => (int) $this->input('sort_order', 0),
            'status'      => $this->input('status') ? 1 : 0,
        ];

        if ($id) {
            $model->update((int)$id, $data);
            flash('success', 'Característica actualizada.');
        } else {
            $model->create($data);
            flash('success', 'Característica creada.');
        }
        $this->redirect('/admin/features');
    }

    public function delete(int $id): void
    {
        $this->requireLogin();
        (new Feature())->delete($id);
        flash('success', 'Característica eliminada.');
        $this->redirect('/admin/features');
    }
}
