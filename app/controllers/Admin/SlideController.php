<?php

class AdminSlideController extends Controller
{
    public function index(): void
    {
        $this->requireLogin();
        $model = new Slide();
        $this->adminView('slides/index', ['items' => $model->all('sort_order ASC, id ASC')]);
    }

    public function create(): void
    {
        $this->requireLogin();
        $this->adminView('slides/form', ['item' => null]);
    }

    public function edit(int $id): void
    {
        $this->requireLogin();
        $model = new Slide();
        $item = $model->find($id);
        if (!$item) {
            flash('error', 'Slide no encontrado.');
            $this->redirect('/admin/slides');
        }
        $this->adminView('slides/form', ['item' => $item]);
    }

    public function store(): void
    {
        $this->requireLogin();
        $model = new Slide();
        $id = $this->input('id');
        $image = upload_image('image', $this->input('current_image'));

        if (!$image) {
            flash('error', 'Debes subir una imagen para el slide.');
            $this->redirect($id ? '/admin/slides/edit/' . $id : '/admin/slides/create');
        }

        $data = [
            'image'       => $image,
            'subtitle'    => $this->input('subtitle'),
            'title'       => $this->input('title'),
            'description' => $this->input('description'),
            'button_text' => $this->input('button_text'),
            'button_link' => $this->input('button_link'),
            'sort_order'  => (int) $this->input('sort_order', 0),
            'status'      => $this->input('status') ? 1 : 0,
        ];

        if ($id) {
            $model->update((int)$id, $data);
            flash('success', 'Slide actualizado.');
        } else {
            $model->create($data);
            flash('success', 'Slide creado.');
        }
        $this->redirect('/admin/slides');
    }

    public function delete(int $id): void
    {
        $this->requireLogin();
        (new Slide())->delete($id);
        flash('success', 'Slide eliminado.');
        $this->redirect('/admin/slides');
    }
}
