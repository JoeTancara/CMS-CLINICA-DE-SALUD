<?php

class AdminTestimonialController extends Controller
{
    public function index(): void
    {
        $this->requireLogin();
        $model = new Testimonial();
        $this->adminView('testimonials/index', ['items' => $model->all('sort_order ASC, id ASC')]);
    }

    public function create(): void
    {
        $this->requireLogin();
        $this->adminView('testimonials/form', ['item' => null]);
    }

    public function edit(int $id): void
    {
        $this->requireLogin();
        $model = new Testimonial();
        $item = $model->find($id);
        if (!$item) {
            flash('error', 'Testimonio no encontrado.');
            $this->redirect('/admin/testimonials');
        }
        $this->adminView('testimonials/form', ['item' => $item]);
    }

    public function store(): void
    {
        $this->requireLogin();
        $model = new Testimonial();
        $id = $this->input('id');

        $quote = trim((string) $this->input('quote', ''));
        if ($quote === '') {
            flash('error', 'El texto del testimonio es obligatorio.');
            $this->redirect($id ? '/admin/testimonials/edit/' . $id : '/admin/testimonials/create');
        }

        $image = upload_image('image', $this->input('current_image'));

        $data = [
            'name'       => $this->input('name'),
            'role'       => $this->input('role'),
            'image'      => $image,
            'quote'      => $quote,
            'sort_order' => (int) $this->input('sort_order', 0),
            'status'     => $this->input('status') ? 1 : 0,
        ];

        if ($id) {
            $model->update((int)$id, $data);
            flash('success', 'Testimonio actualizado.');
        } else {
            $model->create($data);
            flash('success', 'Testimonio creado.');
        }
        $this->redirect('/admin/testimonials');
    }

    public function delete(int $id): void
    {
        $this->requireLogin();
        (new Testimonial())->delete($id);
        flash('success', 'Testimonio eliminado.');
        $this->redirect('/admin/testimonials');
    }
}
