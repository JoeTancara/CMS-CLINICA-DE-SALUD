<?php

class AdminDashboardController extends Controller
{
    public function index(): void
    {
        $this->requireLogin();

        $serviceModel = new Service();
        $teamModel = new TeamMember();
        $testimonialModel = new Testimonial();
        $messageModel = new Message();

        $this->adminView('dashboard', [
            'totalServices'     => count($serviceModel->all()),
            'totalTeam'         => count($teamModel->all()),
            'totalTestimonials' => count($testimonialModel->all()),
            'unreadMessages'    => $messageModel->unreadCount(),
            'recentMessages'    => $messageModel->recent(5),
        ]);
    }
}
