<?php

class ServiceController extends Controller
{
    public function index(): void
    {
        $serviceModel = new Service();

        $this->view('services/list', [
            'currentRoute'    => 'services',
            'pageTitle'       => 'Servicios',
            'breadcrumbTitle' => 'Nuestros servicios',
            'services'        => $serviceModel->allActive(),
        ]);
    }

    public function show(string $slug): void
    {
        $serviceModel = new Service();
        $service = $serviceModel->findBySlug($slug);

        if (!$service || (int)$service['status'] !== 1) {
            http_response_code(404);
            $this->view('404', ['currentRoute' => '', 'pageTitle' => 'No encontrado']);
            return;
        }

        $this->view('services/detail', [
            'currentRoute'    => 'services',
            'pageTitle'       => $service['title'],
            'breadcrumbTitle' => $service['title'],
            'service'         => $service,
        ]);
    }
}
