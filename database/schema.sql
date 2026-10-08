CREATE DATABASE IF NOT EXISTS `salud_mental_cms`
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_unicode_ci;

USE `salud_mental_cms`;

CREATE TABLE `admin_users` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(60) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `full_name` VARCHAR(120) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE `settings` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `meta_key` VARCHAR(80) NOT NULL UNIQUE,
  `meta_value` TEXT NULL
) ENGINE=InnoDB;

CREATE TABLE `content_blocks` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `block_key` VARCHAR(80) NOT NULL UNIQUE,
  `title` VARCHAR(255) NULL,
  `subtitle` VARCHAR(255) NULL,
  `body` TEXT NULL,
  `image` VARCHAR(255) NULL
) ENGINE=InnoDB;

CREATE TABLE `slides` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `image` VARCHAR(255) NOT NULL,
  `subtitle` VARCHAR(150) NULL,
  `title` VARCHAR(255) NULL,
  `description` TEXT NULL,
  `button_text` VARCHAR(80) NULL,
  `button_link` VARCHAR(255) NULL,
  `sort_order` INT DEFAULT 0,
  `status` TINYINT(1) DEFAULT 1
) ENGINE=InnoDB;

CREATE TABLE `services` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(150) NOT NULL,
  `slug` VARCHAR(150) NOT NULL UNIQUE,
  `short_description` TEXT NULL,
  `image` VARCHAR(255) NULL,
  `icon` VARCHAR(60) DEFAULT 'fa-diagnoses',
  `content` LONGTEXT NULL,
  `sort_order` INT DEFAULT 0,
  `status` TINYINT(1) DEFAULT 1
) ENGINE=InnoDB;

CREATE TABLE `features` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `icon` VARCHAR(60) DEFAULT 'fa-heart',
  `title` VARCHAR(150) NOT NULL,
  `description` TEXT NULL,
  `sort_order` INT DEFAULT 0,
  `status` TINYINT(1) DEFAULT 1
) ENGINE=InnoDB;

CREATE TABLE `team_members` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(150) NOT NULL,
  `role` VARCHAR(150) NULL,
  `description` TEXT NULL,
  `image` VARCHAR(255) NULL,
  `facebook` VARCHAR(255) NULL,
  `twitter` VARCHAR(255) NULL,
  `instagram` VARCHAR(255) NULL,
  `linkedin` VARCHAR(255) NULL,
  `sort_order` INT DEFAULT 0,
  `status` TINYINT(1) DEFAULT 1
) ENGINE=InnoDB;

CREATE TABLE `testimonials` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(150) NULL,
  `role` VARCHAR(150) NULL,
  `image` VARCHAR(255) NULL,
  `quote` TEXT NOT NULL,
  `sort_order` INT DEFAULT 0,
  `status` TINYINT(1) DEFAULT 1
) ENGINE=InnoDB;

CREATE TABLE `messages` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `type` ENUM('contacto','cita') NOT NULL DEFAULT 'contacto',
  `name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(150) NULL,
  `phone` VARCHAR(40) NULL,
  `gender` VARCHAR(20) NULL,
  `birthdate` DATE NULL,
  `subject` VARCHAR(255) NULL,
  `message` TEXT NULL,
  `service_id` INT UNSIGNED NULL,
  `is_read` TINYINT(1) DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT `fk_messages_service`
    FOREIGN KEY (`service_id`) REFERENCES `services`(`id`)
    ON DELETE SET NULL
) ENGINE=InnoDB;



-- Usuario admin por defecto -> usuario: admin / contraseña: admin123
INSERT INTO `admin_users` (`username`,`password`,`full_name`) VALUES
('admin', '$2y$10$eI1pJUwPm7DHjSY9x6t6Gepczz0XNYPi1ehLmPADu5g.aT7TPMCTm', 'Administrador');

-- Configuración general
INSERT INTO `settings` (`meta_key`,`meta_value`) VALUES
('site_name', 'Terapia'),
('site_tagline', 'Centro de Salud Mental'),
('address', 'ubicado en la A.V. 77 km. 61/2 al norte, barrio nueva Jerusalén.'),
('phone', '+591 67753023'),
('phone_2', '+591 75399498'),
('email', 'una&otra@gmail.com'),
('facebook', ''),
('twitter', ''),
('instagram', ''),
('linkedin', ''),
('map_embed_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.602943403177!2d-63.170292!3d-17.783065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e7f97f31bfb9%3A0x84da8db36805b97d!2sCentro%20de%20Salud%20Mental!5e0!3m2!1ses!2sbo!4v1700000000000'),
('footer_about', 'Ofrecemos atención psicológica profesional enfocada en el bienestar emocional, el manejo del estrés, la ansiedad y la depresión. Nuestro equipo de especialistas proporciona un acompañamiento empático y confidencial para promover el equilibrio mental, el crecimiento personal y una mejor calidad de vida.'),
('video_url', 'https://youtu.be/DW-Wj62NOjY?si=NyA4AWWPBC0HnP2W');

-- Bloques de contenido (hero, secciones, about)
INSERT INTO `content_blocks` (`block_key`,`title`,`subtitle`,`body`,`image`) VALUES
('home_services', 'Nuestros servicios brindan terapia en salud mental con expertos.', '¿QUÉ HACEMOS?', 'Ofrecemos atención psicológica profesional enfocada en el bienestar emocional, el manejo del estrés, la ansiedad y la depresión. Nuestro equipo de especialistas proporciona un acompañamiento empático y confidencial para promover el equilibrio mental, el crecimiento personal y una mejor calidad de vida.', NULL),
('home_features', '¿Por qué elegirnos? Recupera tu bienestar emocional', '¿POR QUÉ ELEJIRNOS?', 'En nuestro centro de salud mental trabajamos para acompañarte en cada etapa de tu proceso. Nuestro objetivo es ayudarte a recuperar tu equilibrio emocional y mejorar tu calidad de vida mediante terapias profesionales, seguras y personalizadas.', NULL),
('home_appointment', 'Servicios de alta calidad', 'Soluciones para tu bienestar', 'Nuestro enfoque se basa en técnicas terapéuticas efectivas para ayudarte a recuperar tu equilibrio emocional. Acompañamos tu proceso con empatía, respeto y profesionalismo.', 'video-img.jpg'),
('home_team', 'Especialistas en Salud Mental', 'CONOCE A NUESTRO EQUIPO', 'Nuestros especialistas en salud mental están comprometidos con ofrecer apoyo emocional, terapias basadas en evidencia y acompañamiento personalizado para fortalecer tu bienestar psicológico.', NULL),
('home_testimonial', 'Palabras que Inspiran Bienestar Mental', 'MOTIVACIÓN', '', NULL),
('about_intro', 'Estamos listos para ayudarte a mejorar tu bienestar Mental', 'Sobre nosotros', 'Nuestro equipo está comprometido con ofrecerte un acompañamiento respetuoso, humano y profesional. Creemos que cuidar tu salud mental es fundamental para vivir con equilibrio, claridad y calidad de vida.', 'videito.mp4'),
('contact_intro', 'SALUD MENTAL', 'Contáctanos', 'Si deseas comunicarte con nuestro equipo de orientación en salud mental, puedes hacerlo mediante los datos que encontrarás a continuación. Estamos aquí para escucharte, acompañarte y ofrecerte información confiable para tu bienestar emocional.', NULL);

-- Slides del carrusel principal
INSERT INTO `slides` (`image`,`subtitle`,`title`,`description`,`button_text`,`button_link`,`sort_order`,`status`) VALUES
('carousel-1.jpg', 'CENTRO DE AYUDA', 'La mejor solución para una vida dolorosa', 'Una y otra vez nos recuerda que merecemos calma, merecemos amor, y merecemos estar bien ante toda situación.', 'Reserva tu cita', '/contacto', 1, 1),
('carousel-2.jpg', 'CENTRO DE AYUDA', 'La mejor solución para una vida dolorosa', 'Una y otra vez nos recuerda que merecemos calma, merecemos amor, y merecemos estar bien ante toda situación.', 'Reserva tu cita', '/contacto', 2, 1);

-- Servicios / trastornos con su contenido de detalle
INSERT INTO `services` (`title`,`slug`,`short_description`,`image`,`icon`,`content`,`sort_order`,`status`) VALUES ('Depresión','depresion','La depresión es un trastorno emocional que implica un estado de ánimo deprimido, pérdida de interés en casi todas las actividades y una alteración significativa en la vida diaria, producto de factores biológicos, psicológicos y sociales.','service-1.jpg','fa-diagnoses','<div class="section-title mb-4 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-4 mb-3">Depresión</h1>
            <p class="mb-4">La depresión es más que sentirse triste o tener un mal día. Cuando la tristeza dura mucho tiempo y afecta la vida diaria, puede ser un signo de depresión.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <h2>Síntomas comunes</h2>
                <ul class="list-unstyled">
                    <li>💡 Tristeza o ansiedad frecuente o constante</li>
                    <li>💡 Pérdida de interés en actividades antes disfrutadas</li>
                    <li>💡 Irritabilidad, frustración o inquietud</li>
                    <li>💡 Problemas para dormir o dormir demasiado</li>
                    <li>💡 Cambios en el apetito</li>
                    <li>💡 Malestares físicos persistentes</li>
                    <li>💡 Dificultad para concentrarse</li>
                    <li>💡 Cansancio constante</li>
                    <li>💡 Sentimientos de culpa o desesperanza</li>
                    <li>💡 Pensamientos sobre hacerse daño</li>
                </ul>
                <p class="text-info"><strong>Nota:</strong> La depresión es tratable. Hablar con un especialista en salud mental es un paso importante hacia la recuperación.</p>
            </div>

            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                <h2>Causas y factores de riesgo</h2>
                <ul class="list-unstyled">
                    <li>💡 Antecedentes familiares de depresión</li>
                    <li>💡 Experiencias traumáticas o estresantes</li>
                    <li>💡 Cambios significativos en la vida</li>
                    <li>💡 Problemas médicos como cáncer o dolor crónico</li>
                    <li>💡 Medicamentos que afectan el estado de ánimo</li>
                    <li>💡 Consumo de alcohol o drogas</li>
                </ul>

                <h2>Quién puede verse afectado</h2>
                <ul class="list-unstyled">
                    <li>💡 Cualquier persona, sin importar la edad</li>
                    <li>💡 Cerca de 1 de cada 6 adultos experimentará depresión en algún momento</li>
                    <li>💡 Frecuentemente se presenta junto con trastornos de ansiedad</li>
                </ul>
            </div>
        </div>',1,1);
INSERT INTO `services` (`title`,`slug`,`short_description`,`image`,`icon`,`content`,`sort_order`,`status`) VALUES ('Ansiedad','ansiedad','La ansiedad es un estado emocional caracterizado por una sensación de inquietud, temor o angustia ante la anticipación de un peligro real o imaginario, que puede manifestarse con síntomas físicos como palpitaciones, sudoración o dificultad para concentrarse.','service-2.jpg','fa-diagnoses','<div class="section-title mb-4 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-4 mb-3">Ansiedad</h1>
            <p>La ansiedad es una respuesta natural del cuerpo ante situaciones de estrés o peligro. Sin embargo, cuando se vuelve intensa, frecuente o constante, puede afectar significativamente la vida diaria y la salud emocional.</p>
        </div>

        <h2>Síntomas de la ansiedad</h2>
        <ul class="list-unstyled">
            <li>💡 Preocupación excesiva por situaciones cotidianas.</li>
            <li>💡 Sensación de nerviosismo, inquietud o tensión constante.</li>
            <li>💡 Dificultad para concentrarse o tomar decisiones.</li>
            <li>💡 Tensión muscular, dolores de cabeza o problemas digestivos.</li>
            <li>💡 Alteraciones del sueño, insomnio o sueño no reparador.</li>
            <li>💡 Palpitaciones, sudoración, temblores o sensación de falta de aire.</li>
        </ul>

        <h2>Causas y factores de riesgo</h2>
        <ul class="list-unstyled">
            <li>💡 Antecedentes familiares de trastornos de ansiedad.</li>
            <li>💡 Estrés prolongado, situaciones de presión laboral o académica.</li>
            <li>💡 Experiencias traumáticas, pérdida de seres queridos o cambios significativos en la vida.</li>
            <li>💡 Desequilibrios químicos en el cerebro que afectan la regulación emocional.</li>
            <li>💡 Consumo excesivo de cafeína, alcohol o drogas.</li>
        </ul>

        <h2>Recomendaciones</h2>
        <ul class="list-unstyled">
            <li>💡 Practicar técnicas de respiración y meditación para reducir la tensión.</li>
            <li>💡 Mantener hábitos de sueño y alimentación saludables.</li>
            <li>💡 Realizar actividad física regular para mejorar el estado de ánimo.</li>
            <li>💡 Buscar apoyo psicológico o terapias cognitivo-conductuales cuando sea necesario.</li>
            <li>💡 Evitar el consumo excesivo de sustancias estimulantes o depresoras.</li>
        </ul>

        <p class="text-warning"><strong>Recuerda:</strong> La ansiedad es tratable. Buscar apoyo profesional a tiempo puede mejorar tu bienestar emocional y calidad de vida.</p>',2,1);
INSERT INTO `services` (`title`,`slug`,`short_description`,`image`,`icon`,`content`,`sort_order`,`status`) VALUES ('Estrés','estres','El estrés es una reacción del organismo frente a situaciones de presión o demanda, que puede generar tensión física y emocional, afectando el bienestar y el equilibrio de la persona.','service-3.jpg','fa-diagnoses','<div class="section-title mb-4 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-4 mb-3">Estrés</h1>
            <p>El estrés es una reacción normal del cuerpo ante desafíos, exigencias o cambios. Sin embargo, cuando se mantiene durante mucho tiempo, se convierte en estrés crónico y puede afectar la salud física y mental.</p>
        </div>

        <h2>Síntomas del estrés</h2>
        <ul class="list-unstyled">
            <li>💡 Sensación de presión constante o tensión mental.</li>
            <li>💡 Cambios de humor, irritabilidad y frustración frecuente.</li>
            <li>💡 Problemas para dormir o descanso insuficiente.</li>
            <li>💡 Alteraciones en la alimentación: comer en exceso o pérdida de apetito.</li>
            <li>💡 Fatiga física y mental, dificultad para concentrarse.</li>
            <li>💡 Dolores musculares, cefaleas y malestares digestivos.</li>
        </ul>

        <h2>Causas comunes</h2>
        <ul class="list-unstyled">
            <li>💡 Exceso de responsabilidades laborales, académicas o familiares.</li>
            <li>💡 Cambios importantes en la vida, como mudanzas, separaciones o pérdidas.</li>
            <li>💡 Problemas financieros o incertidumbre económica.</li>
            <li>💡 Conflictos interpersonales o relaciones tensas.</li>
            <li>💡 Estilo de vida poco saludable o falta de descanso adecuado.</li>
        </ul>

        <h2>Recomendaciones</h2>
        <ul class="list-unstyled">
            <li>💡 Establecer rutinas diarias y prioridades para reducir la sobrecarga.</li>
            <li>💡 Practicar ejercicio físico para liberar tensiones.</li>
            <li>💡 Realizar actividades recreativas y momentos de relajación.</li>
            <li>💡 Aprender técnicas de respiración y mindfulness.</li>
            <li>💡 Consultar a un profesional si el estrés afecta la vida cotidiana.</li>
        </ul>

        <p class="text-info"><strong>Nota:</strong> El manejo adecuado del estrés fortalece la salud mental y previene problemas más graves a largo plazo.</p>',3,1);
INSERT INTO `services` (`title`,`slug`,`short_description`,`image`,`icon`,`content`,`sort_order`,`status`) VALUES ('Trastorno de Pánico','transtorno-de-panico','El trastorno de pánico se caracteriza por la presencia de crisis repentinas de miedo intenso acompañadas de síntomas físicos como palpitaciones, sudoración, temblores, falta de aire y sensación de pérdida de control.','service-4.jpg','fa-diagnoses','<div class="section-title mb-4 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-4 mb-3">Trastorno de Pánico</h1>
            <p>El trastorno de pánico se caracteriza por ataques repentinos de miedo intenso que pueden causar síntomas físicos y emocionales graves. Aunque es angustiante, es tratable con intervención profesional.</p>
        </div>

        <h2>Síntomas</h2>
        <ul class="list-unstyled">
            <li>💡 Ataques repentinos de miedo intenso o malestar.</li>
            <li>💡 Palpitaciones, falta de aire o sensación de ahogo.</li>
            <li>💡 Mareos, sudoración, temblores, náuseas o malestar abdominal.</li>
            <li>💡 Miedo intenso a perder el control o a morir durante un ataque.</li>
            <li>💡 Evitación de lugares o situaciones por miedo a un ataque.</li>
        </ul>

        <h2>Causas y factores de riesgo</h2>
        <ul class="list-unstyled">
            <li>💡 Antecedentes familiares de trastornos de ansiedad o pánico.</li>
            <li>💡 Estrés crónico o experiencias traumáticas previas.</li>
            <li>💡 Desequilibrio químico en el cerebro que afecta la respuesta al miedo.</li>
            <li>💡 Consumo de estimulantes como cafeína, drogas o ciertos medicamentos.</li>
        </ul>

        <h2>Recomendaciones</h2>
        <ul class="list-unstyled">
            <li>💡 Aprender técnicas de respiración y relajación para calmar los ataques.</li>
            <li>💡 Evitar el consumo excesivo de estimulantes que puedan desencadenar ansiedad.</li>
            <li>💡 Mantener hábitos de sueño y alimentación saludables.</li>
            <li>💡 Buscar terapia psicológica, como la terapia cognitivo-conductual.</li>
            <li>💡 Hablar con un profesional de salud mental para planificar estrategias de manejo.</li>
        </ul>

        <p class="text-danger"><strong>Importante:</strong> El trastorno de pánico es tratable y contar con apoyo profesional ayuda a recuperar el control y mejorar la calidad de vida.</p>',4,1);
INSERT INTO `services` (`title`,`slug`,`short_description`,`image`,`icon`,`content`,`sort_order`,`status`) VALUES ('Autoestima Baja','autoestima-baja','La baja autoestima implica una percepción negativa de uno mismo, que puede afectar la confianza, las relaciones interpersonales y el bienestar emocional.','service-5.jpg','fa-diagnoses','<div class="section-title mb-4 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-4 mb-3">Autoestima Baja</h1>
            <p>La autoestima baja es una percepción negativa y limitada de uno mismo que afecta la manera en que pensamos, sentimos y actuamos en la vida diaria. Las personas con autoestima baja suelen minimizar sus logros, dudar de sus capacidades y sentirse menos valiosas frente a los demás, lo que puede afectar sus relaciones personales, académicas y laborales.</p>
        </div>

        <h2>Síntomas comunes</h2>
        <ul class="list-unstyled">
            <li>💡 Sentirse inseguro y con miedo a equivocarse constantemente.</li>
            <li>💡 Compararse negativamente con otras personas, sintiéndose inferior.</li>
            <li>💡 Dificultad para aceptar elogios o reconocer los propios logros.</li>
            <li>💡 Tendencia a culparse por errores, incluso los menores.</li>
            <li>💡 Evitación de situaciones nuevas por temor al fracaso o rechazo.</li>
            <li>💡 Pensamientos negativos recurrentes sobre uno mismo.</li>
            <li>💡 Dificultad para expresar opiniones y necesidades propias.</li>
        </ul>

        <h2>Causas frecuentes</h2>
        <ul class="list-unstyled">
            <li>💡 Experiencias negativas en la infancia, como críticas constantes, burlas o falta de apoyo emocional.</li>
            <li>💡 Comparaciones con estándares sociales o de redes sociales que generan insatisfacción.</li>
            <li>💡 Relaciones interpersonales tóxicas que disminuyen la confianza y seguridad personal.</li>
            <li>💡 Experiencias de fracaso repetidas sin recibir retroalimentación positiva o apoyo.</li>
            <li>💡 Creencias y mensajes internos negativos sobre las capacidades y valor personal.</li>
        </ul>

        <h2>Consecuencias</h2>
        <ul class="list-unstyled">
            <li>💡 Dificultad para establecer relaciones saludables y mantener amistades duraderas.</li>
            <li>💡 Evitación de oportunidades académicas o laborales por miedo a no ser suficiente.</li>
            <li>💡 Riesgo de desarrollar ansiedad, depresión o problemas de salud emocional.</li>
            <li>💡 Autoexigencia extrema que puede generar estrés y agotamiento.</li>
        </ul>

        <h2>Recomendaciones</h2>
        <ul class="list-unstyled">
            <li>💡 Practicar la autoaceptación y enfocarse en las propias fortalezas.</li>
            <li>💡 Establecer metas realistas y celebrar cada logro alcanzado, por pequeño que sea.</li>
            <li>💡 Evitar compararse con otros y centrarse en el crecimiento personal.</li>
            <li>💡 Buscar apoyo profesional mediante terapia cognitivo-conductual o coaching personal.</li>
            <li>💡 Mantener relaciones positivas que fomenten la seguridad y confianza.</li>
            <li>💡 Realizar actividades que generen satisfacción personal y autoestima, como hobbies y voluntariado.</li>
        </ul>

        <p class="text-warning"><strong>Recuerda:</strong> La autoestima es un proceso que se fortalece con práctica, autoconocimiento y acompañamiento profesional. Aprender a valorarse es clave para una vida más plena y equilibrada.</p>',5,1);
INSERT INTO `services` (`title`,`slug`,`short_description`,`image`,`icon`,`content`,`sort_order`,`status`) VALUES ('Burnout (agotamiento emocional)','burnout','El burnout es un estado de agotamiento físico, mental y emocional causado por estrés laboral prolongado. Se manifiesta a través de cansancio extremo, desmotivación, irritabilidad y disminución del rendimiento.','service-6.jpg','fa-diagnoses','<div class="section-title mb-4 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-4 mb-3">Burnout (Agotamiento Emocional)</h1>
            <p>El burnout, o agotamiento emocional, es un estado de cansancio físico, mental y emocional que se produce como resultado de un estrés prolongado, generalmente relacionado con el trabajo, estudios o responsabilidades constantes. Quienes lo experimentan suelen sentirse abrumados, incapaces de cumplir con las demandas diarias y emocionalmente agotados, lo que afecta tanto su desempeño como su bienestar general.</p>
        </div>

        <h2>Síntomas principales</h2>
        <ul class="list-unstyled">
            <li>💡 Sensación constante de fatiga y agotamiento, incluso después de descansar.</li>
            <li>💡 Falta de motivación y pérdida de interés en actividades antes disfrutadas.</li>
            <li>💡 Irritabilidad, frustración y conflictos frecuentes con compañeros o familiares.</li>
            <li>💡 Dificultad para concentrarse, tomar decisiones o mantener la productividad.</li>
            <li>💡 Sentimiento de ineficacia personal y falta de logro.</li>
            <li>💡 Problemas físicos como dolores de cabeza, tensión muscular y alteraciones digestivas.</li>
            <li>💡 Sensación de desapego, cinismo o negatividad hacia el trabajo o responsabilidades.</li>
        </ul>

        <h2>Causas frecuentes</h2>
        <ul class="list-unstyled">
            <li>💡 Sobrecarga laboral o académica prolongada sin períodos adecuados de descanso.</li>
            <li>💡 Falta de control sobre las responsabilidades o decisiones importantes.</li>
            <li>💡 Escaso reconocimiento por el esfuerzo realizado y falta de apoyo profesional.</li>
            <li>💡 Conflictos interpersonales constantes con compañeros, superiores o familiares.</li>
            <li>💡 Presión constante por resultados y metas poco realistas.</li>
        </ul>

        <h2>Consecuencias</h2>
        <ul class="list-unstyled">
            <li>💡 Disminución del rendimiento laboral o académico.</li>
            <li>💡 Problemas de salud física y emocional a largo plazo.</li>
            <li>💡 Alteraciones en las relaciones personales debido a irritabilidad y desapego.</li>
            <li>💡 Riesgo de depresión y ansiedad por agotamiento prolongado.</li>
        </ul>

        <h2>Recomendaciones</h2>
        <ul class="list-unstyled">
            <li>💡 Establecer límites claros entre la vida laboral y personal.</li>
            <li>💡 Tomar descansos regulares, vacaciones y momentos de ocio para recargar energía.</li>
            <li>💡 Practicar técnicas de relajación, meditación y ejercicio físico regularmente.</li>
            <li>💡 Revaluar las responsabilidades y aprender a delegar tareas cuando sea posible.</li>
            <li>💡 Buscar apoyo emocional, psicológico o terapia profesional para gestionar el estrés.</li>
            <li>💡 Mantener hábitos saludables de alimentación, sueño y autocuidado.</li>
        </ul>

        <p class="text-danger"><strong>Importante:</strong> Reconocer los signos de burnout a tiempo ayuda a prevenir consecuencias graves en la salud física y emocional. Cuidarte a ti mismo es fundamental para mantener un equilibrio saludable.</p>',6,1);
INSERT INTO `services` (`title`,`slug`,`short_description`,`image`,`icon`,`content`,`sort_order`,`status`) VALUES ('Trastorno de Ansiedad Social','trastorno-de-ansiedad-social','El trastorno de ansiedad social implica un miedo intenso y persistente a situaciones sociales por temor al juicio o la evaluación negativa de los demás.','service-7.jpg','fa-diagnoses','<div class="section-title mb-4 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-4 mb-3">Trastorno de Ansiedad Social</h1>
            <p>El trastorno de ansiedad social es un miedo intenso y persistente a situaciones donde la persona puede ser observada, evaluada o juzgada por los demás. Este miedo puede afectar la vida social, laboral o académica, limitando la interacción con otros y generando aislamiento y sentimientos de inferioridad.</p>
        </div>

        <h2>Síntomas comunes</h2>
        <ul class="list-unstyled">
            <li>💡 Miedo intenso a ser criticado, humillado o juzgado negativamente.</li>
            <li>💡 Evitación de situaciones sociales, reuniones, hablar en público o interactuar con desconocidos.</li>
            <li>💡 Síntomas físicos como sudoración, temblores, palpitaciones o náuseas antes o durante situaciones sociales.</li>
            <li>💡 Ansiedad anticipatoria: preocupación excesiva por eventos sociales futuros.</li>
            <li>💡 Dificultad para expresar opiniones, hacer preguntas o iniciar conversaciones.</li>
            <li>💡 Sentimientos de vergüenza o humillación incluso después de la interacción social.</li>
        </ul>

        <h2>Causas y factores de riesgo</h2>
        <ul class="list-unstyled">
            <li>💡 Antecedentes familiares de ansiedad o trastornos relacionados.</li>
            <li>💡 Experiencias negativas o humillaciones durante la infancia o adolescencia.</li>
            <li>💡 Personalidad tímida o introvertida que aumenta la sensibilidad social.</li>
            <li>💡 Factores ambientales que promueven la autoevaluación constante y la crítica social.</li>
        </ul>

        <h2>Consecuencias</h2>
        <ul class="list-unstyled">
            <li>💡 Aislamiento social y dificultad para establecer relaciones interpersonales.</li>
            <li>💡 Limitaciones en el desarrollo académico o profesional.</li>
            <li>💡 Aumento del riesgo de depresión, ansiedad generalizada y baja autoestima.</li>
            <li>💡 Estrés constante que puede afectar la salud física y mental.</li>
        </ul>

        <h2>Recomendaciones</h2>
        <ul class="list-unstyled">
            <li>💡 Practicar exposición gradual a situaciones sociales con apoyo profesional.</li>
            <li>💡 Aprender técnicas de respiración, relajación y manejo de la ansiedad.</li>
            <li>💡 Fortalecer habilidades sociales y de comunicación progresivamente.</li>
            <li>💡 Buscar terapia cognitivo-conductual especializada para mejorar la confianza y reducir el miedo social.</li>
            <li>💡 Evitar el aislamiento y fomentar relaciones de apoyo positivo.</li>
        </ul>

        <p class="text-warning"><strong>Recuerda:</strong> Con estrategias adecuadas y apoyo profesional, la ansiedad social se puede superar, mejorando la confianza y la interacción con los demás.</p>',7,1);
INSERT INTO `services` (`title`,`slug`,`short_description`,`image`,`icon`,`content`,`sort_order`,`status`) VALUES ('Duelo','duelo','El duelo es el proceso emocional natural que surge tras una pérdida significativa, y que requiere tiempo, acompañamiento y comprensión para ser superado.','service-8.jpg','fa-diagnoses','<div class="section-title mb-4 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-4 mb-3">Duelo Emocional</h1>
            <p>El duelo emocional surge tras una pérdida significativa, ya sea la muerte de un ser querido, la ruptura de una relación importante, la pérdida de empleo u otros cambios vitales. Es un proceso natural que implica adaptación, aceptación y manejo de emociones intensas.</p>
        </div>

        <h2>Síntomas comunes</h2>
        <ul class="list-unstyled">
            <li>💡 Tristeza profunda y llanto frecuente.</li>
            <li>💡 Sentimientos de culpa, impotencia o frustración.</li>
            <li>💡 Alteraciones del sueño y del apetito.</li>
            <li>💡 Dificultad para concentrarse y tomar decisiones importantes.</li>
            <li>💡 Aislamiento social o pérdida de interés en actividades antes disfrutadas.</li>
            <li>💡 Cambios en la energía, motivación y estado de ánimo.</li>
        </ul>

        <h2>Fases del duelo</h2>
        <ul class="list-unstyled">
            <li>💡 Negación: dificultad para aceptar la pérdida y sensación de irrealidad.</li>
            <li>💡 Ira: emociones de frustración, enojo o resentimiento.</li>
            <li>💡 Negociación: intentos de revertir o negociar la situación con pensamientos del tipo “si hubiera sido…”</li>
            <li>💡 Depresión: tristeza profunda y reflexión sobre la pérdida.</li>
            <li>💡 Aceptación: integración gradual de la pérdida y adaptación a la nueva realidad.</li>
        </ul>

        <h2>Consecuencias</h2>
        <ul class="list-unstyled">
            <li>💡 Riesgo de aislamiento y dificultades para mantener relaciones sociales.</li>
            <li>💡 Problemas de salud física y mental si el duelo no se procesa adecuadamente.</li>
            <li>💡 Mayor vulnerabilidad a la ansiedad y depresión.</li>
            <li>💡 Impacto en el desempeño laboral o académico por concentración disminuida.</li>
        </ul>

        <h2>Recomendaciones</h2>
        <ul class="list-unstyled">
            <li>💡 Permitir sentir y expresar las emociones sin juzgarse.</li>
            <li>💡 Buscar apoyo emocional de familiares, amigos o grupos de duelo.</li>
            <li>💡 Mantener hábitos saludables de alimentación, sueño y actividad física.</li>
            <li>💡 Consultar a un profesional de salud mental si las emociones resultan abrumadoras.</li>
            <li>💡 Evitar tomar decisiones importantes mientras se atraviesa la fase de mayor dolor emocional.</li>
            <li>💡 Recordar que el duelo es un proceso personal y no lineal; cada persona lo vive a su ritmo.</li>
        </ul>

        <p class="text-danger"><strong>Importante:</strong> Con apoyo adecuado y estrategias saludables, el duelo puede transformarse en una oportunidad de crecimiento personal y adaptación emocional.</p>',8,1);

-- Características / "por qué elegirnos"
INSERT INTO `features` (`icon`,`title`,`description`,`sort_order`,`status`) VALUES
('fa-diagnoses', 'Terapeutas Certificados', 'Contamos con profesionales capacitados y con experiencia en salud mental, comprometidos con tu bienestar emocional.', 1, 1),
('fa-briefcase-medical', 'Tratamiento Personalizado', 'Cada persona es única, por eso diseñamos un plan de apoyo según tus necesidades, ritmo y objetivos personales.', 2, 1),
('fa-hospital-user', 'Metas Terapéuticas', 'Te ayudamos a establecer metas claras y alcanzables para fortalecer tu salud mental y mejorar tu vida diaria.', 3, 1),
('fa-users', 'Red de Profesionales', 'Te ofrecemos acceso a una red de especialistas para brindarte un apoyo integral y multidisciplinario.', 4, 1),
('fa-spa', 'Acompañamiento Emocional', 'Te brindamos un espacio seguro donde puedes expresarte sin juicios. Nuestro objetivo es ayudarte a comprender tus emociones, manejar el estrés y fortalecer tu equilibrio emocional en cada etapa de tu proceso.', 5, 1),
('fa-heart', 'Confidencialidad Garantizada', 'Tu privacidad es una prioridad. Todo lo que compartas en tu proceso terapéutico será manejado con absoluta discreción y bajo estrictos estándares éticos y profesionales.', 6, 1),
('fa-pied-piper', 'Herramientas para la Vida Diaria', 'Te proporcionamos estrategias prácticas para enfrentar desafíos cotidianos, mejorar tu comunicación, regular tus emociones y fortalecer tus relaciones.', 7, 1),
('fa-user-md', 'Crecimiento Personal', 'Te acompañamos en el desarrollo de tu autoconocimiento, resiliencia y autoestima. La terapia no solo trata síntomas, sino que impulsa tu crecimiento y te ayuda a construir una vida más plena y significativa.', 8, 1);

-- Equipo de especialistas
INSERT INTO `team_members` (`name`,`role`,`description`,`image`,`sort_order`,`status`) VALUES
('Especialista 1', 'Psicóloga Clínica', 'Especialista en ansiedad, depresión y terapia cognitivo-conductual. Ofrece un enfoque cálido, cercano y orientado a resultados.', 'team-1.jpg', 1, 1),
('Especialista 2', 'Terapeuta Familiar y de Pareja', 'Experta en comunicación emocional, vínculos familiares y resolución de conflictos. Atención individual, en pareja o familiar.', 'team-2.jpg', 2, 1),
('Especialista 3', 'Psiquiatra', 'Especialista en trastornos del estado de ánimo y ansiedad. Brinda orientación sobre tratamientos integrales, incluidos los farmacológicos cuando son necesarios.', 'team-3.jpg', 3, 1),
('Especialista 4', 'Psicólogo Humanista', 'Enfoque centrado en la persona, autoestima, autoconocimiento y manejo del estrés. Acompaña procesos de crecimiento personal y bienestar emocional.', 'team-4.jpg', 4, 1);

-- Testimonios / frases motivacionales
INSERT INTO `testimonials` (`name`,`role`,`image`,`quote`,`sort_order`,`status`) VALUES
(NULL, NULL, 'testimonial-img.jpg', 'HABLAR DE LO QUE SIENTES NO TE HACE DÉBIL; TE LIBERA', 1, 1),
(NULL, NULL, 'testimonial-img.jpg', 'PERMÍTETE SENTIR SIN JUZGARTE. INCLUSO LAS EMOCIONES INCÓMODAS VIENEN A ENSEÑARTE ALGO SOBRE TU PROPIO LATIDO', 2, 1),
(NULL, NULL, 'testimonial-img.jpg', 'NO ERES EL PESO DE LO QUE TE DUELE. ERES LA LUZ QUE SIGUE INSISTIENDO AÚN CUANDO EL CAMINO SE OSCURECE', 3, 1),
(NULL, NULL, 'testimonial-img.jpg', 'SANAR NO ES OLVIDAR, ES APRENDER A VIVIR SIN QUE EL PASADO CONTROLE TUS PASOS', 4, 1);
