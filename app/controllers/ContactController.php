<?php

class ContactController extends Controller
{
    public function index(): void
    {
        $blockModel = new ContentBlock();
        $serviceModel = new Service();

        $this->view('contact', [
            'currentRoute'    => 'contact',
            'pageTitle'       => 'Contáctanos',
            'breadcrumbTitle' => 'Contáctanos',
            'block'           => $blockModel->getByKey('contact_intro'),
            'services'        => $serviceModel->allActive(),
        ]);
    }

    public function store(): void
    {
        $name = trim((string) $this->input('name', ''));
        if ($name === '') {
            flash('error', 'El nombre es obligatorio.');
            $this->redirect('/contacto');
        }

        $messageModel = new Message();
        $messageModel->create([
            'type'       => 'contacto',
            'name'       => $name,
            'email'      => $this->input('email'),
            'phone'      => $this->input('phone'),
            'gender'     => null,
            'birthdate'  => null,
            'subject'    => $this->input('subject'),
            'message'    => $this->input('message'),
            'service_id' => $this->input('service_id') ?: null,
            'is_read'    => 0,
        ]);

        flash('success', 'Tu mensaje fue enviado correctamente. Te contactaremos pronto.');
        $this->redirect('/contacto');
    }
}
