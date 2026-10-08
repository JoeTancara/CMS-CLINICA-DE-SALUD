    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-white mb-4"><i class="fas fa-star-of-life me-3"></i><?= e($settings['site_name'] ?? 'Terapia') ?></h4>
                        <p><?= e($settings['footer_about'] ?? '') ?></p>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-share fa-2x text-white me-2"></i>
                            <a class="btn-square btn btn-primary text-white rounded-circle mx-1" href="<?= e($settings['facebook'] ?? '#') ?>"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn-square btn btn-primary text-white rounded-circle mx-1" href="<?= e($settings['twitter'] ?? '#') ?>"><i class="fab fa-twitter"></i></a>
                            <a class="btn-square btn btn-primary text-white rounded-circle mx-1" href="<?= e($settings['instagram'] ?? '#') ?>"><i class="fab fa-instagram"></i></a>
                            <a class="btn-square btn btn-primary text-white rounded-circle mx-1" href="<?= e($settings['linkedin'] ?? '#') ?>"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-white">Información de contacto</h4>
                        <a href="#"><i class="fa fa-map-marker-alt me-2"></i><?= e($settings['address'] ?? '') ?></a>
                        <a href="mailto:<?= e($settings['email'] ?? '') ?>"><i class="fas fa-envelope me-2"></i> <?= e($settings['email'] ?? '') ?></a>
                        <a href="tel:<?= e($settings['phone'] ?? '') ?>"><i class="fas fa-phone me-2"></i> <?= e($settings['phone'] ?? '') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start mb-md-0">
                    <span class="text-white"><a href="#"><i class="fas fa-copyright text-light me-2"></i><?= e($settings['site_name'] ?? 'Terapia') ?></a>, todos los derechos son reservados.</span>
                </div>
                <div class="col-md-6 text-center text-md-end text-white">
                    Panel de administración: <a class="border-bottom" href="<?= base_url('/admin') ?>">/admin</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= asset('lib/wow/wow.min.js') ?>"></script>
    <script src="<?= asset('lib/easing/easing.min.js') ?>"></script>
    <script src="<?= asset('lib/waypoints/waypoints.min.js') ?>"></script>
    <script src="<?= asset('lib/owlcarousel/owl.carousel.min.js') ?>"></script>
    <script src="<?= asset('js/main.js') ?>"></script>

</body>

</html>
