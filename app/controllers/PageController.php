<?php

class PageController extends Controller
{
    public function about(): void
    {
        $blockModel = new ContentBlock();
        $teamModel = new TeamMember();
        $featureModel = new Feature();

        $this->view('about', [
            'currentRoute'    => 'about',
            'pageTitle'       => 'Sobre nosotros',
            'breadcrumbTitle' => 'Sobre nosotros',
            'block'           => $blockModel->getByKey('about_intro'),
            'team'            => $teamModel->allActive(),
            'features'        => $featureModel->allActive(),
        ]);
    }

    public function team(): void
    {
        $teamModel = new TeamMember();

        $this->view('team', [
            'currentRoute'    => 'team',
            'pageTitle'       => 'Nuestro equipo',
            'breadcrumbTitle' => 'Nuestro equipo',
            'team'            => $teamModel->allActive(),
        ]);
    }

    public function testimonial(): void
    {
        $testimonialModel = new Testimonial();

        $this->view('testimonial', [
            'currentRoute'    => 'testimonial',
            'pageTitle'       => 'Motivación',
            'breadcrumbTitle' => 'Motivación',
            'testimonials'    => $testimonialModel->allActive(),
        ]);
    }

    public function feature(): void
    {
        $featureModel = new Feature();

        $this->view('feature', [
            'currentRoute'    => 'feature',
            'pageTitle'       => 'Características',
            'breadcrumbTitle' => 'Características',
            'features'        => $featureModel->allActive(),
        ]);
    }

    public function appointment(): void
    {
        $serviceModel = new Service();

        $this->view('appointment', [
            'currentRoute'    => 'appointment',
            'pageTitle'       => 'Reserva tu cita',
            'breadcrumbTitle' => 'Reserva tu cita',
            'services'        => $serviceModel->allActive(),
        ]);
    }

    public function storeAppointment(): void
    {
        $name = trim((string) $this->input('name', ''));
        if ($name === '') {
            flash('error', 'El nombre es obligatorio.');
            $this->redirect('/cita');
        }

        $messageModel = new Message();
        $messageModel->create([
            'type'       => 'cita',
            'name'       => $name,
            'email'      => $this->input('email'),
            'phone'      => $this->input('phone'),
            'gender'     => $this->input('gender'),
            'birthdate'  => $this->input('birthdate') ?: null,
            'subject'    => 'Solicitud de cita',
            'message'    => $this->input('message'),
            'service_id' => $this->input('service_id') ?: null,
            'is_read'    => 0,
        ]);

        flash('success', 'Tu solicitud de cita fue enviada. Nos pondremos en contacto contigo pronto.');
        $this->redirect('/cita');
    }
}
