<?php

class AdminTeamController extends Controller
{
    public function index(): void
    {
        $this->requireLogin();
        $model = new TeamMember();
        $this->adminView('team/index', ['items' => $model->all('sort_order ASC, id ASC')]);
    }

    public function create(): void
    {
        $this->requireLogin();
        $this->adminView('team/form', ['item' => null]);
    }

    public function edit(int $id): void
    {
        $this->requireLogin();
        $model = new TeamMember();
        $item = $model->find($id);
        if (!$item) {
            flash('error', 'Miembro no encontrado.');
            $this->redirect('/admin/team');
        }
        $this->adminView('team/form', ['item' => $item]);
    }

    public function store(): void
    {
        $this->requireLogin();
        $model = new TeamMember();
        $id = $this->input('id');

        $name = trim((string) $this->input('name', ''));
        if ($name === '') {
            flash('error', 'El nombre es obligatorio.');
            $this->redirect($id ? '/admin/team/edit/' . $id : '/admin/team/create');
        }

        $image = upload_image('image', $this->input('current_image'));

        $data = [
            'name'        => $name,
            'role'        => $this->input('role'),
            'description' => $this->input('description'),
            'image'       => $image,
            'facebook'    => $this->input('facebook'),
            'twitter'     => $this->input('twitter'),
            'instagram'   => $this->input('instagram'),
            'linkedin'    => $this->input('linkedin'),
            'sort_order'  => (int) $this->input('sort_order', 0),
            'status'      => $this->input('status') ? 1 : 0,
        ];

        if ($id) {
            $model->update((int)$id, $data);
            flash('success', 'Miembro del equipo actualizado.');
        } else {
            $model->create($data);
            flash('success', 'Miembro del equipo creado.');
        }
        $this->redirect('/admin/team');
    }

    public function delete(int $id): void
    {
        $this->requireLogin();
        (new TeamMember())->delete($id);
        flash('success', 'Miembro eliminado.');
        $this->redirect('/admin/team');
    }
}
