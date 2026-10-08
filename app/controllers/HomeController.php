<?php

class HomeController extends Controller
{
    public function index(): void
    {
        $serviceModel = new Service();
        $featureModel = new Feature();
        $teamModel = new TeamMember();
        $testimonialModel = new Testimonial();
        $slideModel = new Slide();
        $blockModel = new ContentBlock();

        $blocks = [];
        foreach (['home_services', 'home_features', 'home_appointment', 'home_team', 'home_testimonial'] as $key) {
            $blocks[$key] = $blockModel->getByKey($key);
        }

        $this->view('home', [
            'currentRoute'  => 'home',
            'pageTitle'     => 'Inicio',
            'slides'        => $slideModel->allActive(),
            'services'      => $serviceModel->allActive(),
            'features'      => $featureModel->allActive(),
            'team'          => $teamModel->allActive(),
            'testimonials'  => $testimonialModel->allActive(),
            'blocks'        => $blocks,
        ]);
    }
}
