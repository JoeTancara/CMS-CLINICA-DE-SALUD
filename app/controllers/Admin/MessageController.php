<?php

class AdminMessageController extends Controller
{
    public function index(): void
    {
        $this->requireLogin();
        $model = new Message();
        $this->adminView('messages/index', ['items' => $model->allWithService()]);
    }

    public function show(int $id): void
    {
        $this->requireLogin();
        $model = new Message();
        $item = $model->find($id);
        if (!$item) {
            flash('error', 'Mensaje no encontrado.');
            $this->redirect('/admin/messages');
        }
        if (!$item['is_read']) {
            $model->markRead($id);
        }

        $serviceTitle = null;
        if (!empty($item['service_id'])) {
            $service = (new Service())->find((int)$item['service_id']);
            $serviceTitle = $service['title'] ?? null;
        }

        $this->adminView('messages/show', ['item' => $item, 'serviceTitle' => $serviceTitle]);
    }

    public function delete(int $id): void
    {
        $this->requireLogin();
        (new Message())->delete($id);
        flash('success', 'Mensaje eliminado.');
        $this->redirect('/admin/messages');
    }
}
