

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `activity_log` (`id`, `user_id`, `username`, `action`, `created_at`) VALUES
(1, 1, 'admin', 'U fut në sistem (Login)', '2026-05-05 07:23:22'),
(2, 1, 'admin', 'U fut në sistem (Login)', '2026-05-05 07:27:49'),
(3, 1, 'admin', 'U fut në sistem (Login)', '2026-05-05 08:17:55'),
(4, 1, 'admin', 'U fut në sistem (Login)', '2026-05-05 08:23:51'),
(5, 1, 'admin', 'U fut në sistem (Login)', '2026-05-05 11:14:24'),
(6, 2, 'user', 'U fut në sistem (Login)', '2026-05-05 11:16:47'),
(7, 1, 'admin', 'U fut në sistem (Login)', '2026-05-05 11:19:48'),
(8, 1, 'admin', 'U fut në sistem (Login)', '2026-05-05 11:52:02'),
(9, 1, 'admin', 'U fut në sistem (Login)', '2026-05-05 11:52:49');



CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'elza', 'elza@gmail.com', 'Dua te porosise produktet e tua', '2026-05-05 08:17:08'),
(2, 'elza', 'elzza@gmail.com', 'Produktet e juaja jane shum cilesore', '2026-05-05 08:17:43');



CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_at`) VALUES
(1, 'Teknologjia e Re OLED', 'Zbuloni modelet më të reja të televizorëve OLED që po ndryshojnë tregun.', 'emri_i_fotos_tende.avif', '2026-05-02 18:39:13'),
(2, 'Smart Home Revolucioni', 'Si pajisjet inteligjente po e bëjnë jetën tonë më të lehtë dhe më të sigurt.', 'news2.jpg', '2026-05-02 18:39:13'),
(3, 'Kursimi i Energjisë', 'Pajisjet shtëpiake që harxhojnë më pak energji dhe mbrojnë ambientin.', 'news3.jpg', '2026-05-02 18:39:13');



CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `orders` (`id`, `user_id`, `address`, `phone`, `total_amount`, `status`, `created_at`) VALUES
(1, 1, 'Prishine', '044 205 565', 150.00, 'Pending', '2026-05-05 11:29:17');



CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `products` (`id`, `title`, `description`, `price`, `image`, `created_by`, `created_at`) VALUES
(1, 'Smart Refrigerator', 'Frigorifer inteligjent me teknologjinë më të fundit.', 899.00, 'Smart Refrigerator.avif', 1, '2026-05-02 18:39:14'),
(2, 'Washing Machine', 'Makinë larëse efikase dhe kursyese energjie.', 550.00, 'Washing Machine.avif', 1, '2026-05-02 18:39:14'),
(3, 'OLED Smart TV', 'Ekran OLED për ngjyra dhe kontrast perfekt.', 1200.00, 'OLED Smart TV.avif', 1, '2026-05-02 18:39:14'),
(4, 'Microwave Oven', 'Furrë me mikrovalë për gatim të shpejtë.', 180.00, 'Microwave Oven.avif', 1, '2026-05-02 18:39:14'),
(5, 'Air Conditioner', 'Klimatizim perfekt për verë dhe dimër.', 650.00, 'Air Conditioner.avif', 1, '2026-05-02 18:39:14'),
(6, 'Dishwasher', 'Enëlarëse me kapacitet të lartë.', 500.00, 'Dishwasher.avif', 1, '2026-05-02 18:39:14'),
(7, 'Coffee Machine', 'Eksperienca e kafesë profesionale në shtëpi.', 120.00, 'Coffee Machine.avif', 1, '2026-05-02 18:39:14'),
(8, 'Vacuum Cleaners', 'Fshirëse elektrike me fuqi të lartë thithëse.', 250.00, 'Vacuum Cleaners.avif', 1, '2026-05-02 18:39:14'),
(9, 'Electric Grill', 'Grill elektrik për gatime të shëndetshme.', 95.00, 'Electric Grill.avif', 1, '2026-05-02 18:39:14'),
(10, 'Blender Pro', 'Blender profesional për smoothie dhe lëngje.', 70.00, 'Blender Pro.avif', 1, '2026-05-02 18:39:14'),
(11, 'Toaster', 'Toster për mëngjesin tuaj ideal.', 45.00, 'Toaster.avif', 1, '2026-05-02 18:39:14'),
(12, 'Steam Iron', 'Hekur me avull për rroba pa rrudha.', 55.00, 'Steam Iron.avif', 1, '2026-05-02 18:39:14'),
(13, 'Air Fryer', 'Skuqje me ajër pa përdorur vaj.', 140.00, 'Air Fryer.avif', 1, '2026-05-02 18:39:14'),
(14, 'Water Heater', 'Ngrohës uji efikas dhe i shpejtë.', 190.00, 'Water Heater.avif', 1, '2026-05-02 18:39:14'),
(15, 'Induction Hob', 'Pllakë gatimi me induksion, moderne dhe e sigurt.', 300.00, 'Induction Hob.avif', 1, '2026-05-02 18:39:14'),
(16, 'Humidifier', 'Lagështues ajri për ambient të shëndetshëm.', 60.00, 'Humidifier.avif', 1, '2026-05-02 18:39:14'),
(17, 'Stand Mixer', 'Mikser profesional për brumë dhe ëmbëlsira.', 280.00, 'Stand Mixer.avif', 1, '2026-05-02 18:39:14'),
(18, 'Hair Dryer', 'Tharëse flokësh me mbrojtje ndaj nxehtësisë.', 40.00, 'Hair Dryer.avif', 1, '2026-05-02 18:39:14'),
(19, 'Electric Kettle', 'Ibrik elektrik për ngrohjen e shpejtë të ujit.', 35.00, 'Electric Kettle.avif', 1, '2026-05-02 18:39:14');



CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `section_name` varchar(50) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `site_settings` (`id`, `section_name`, `content`, `updated_at`) VALUES
(1, 'hero_title', 'Welcome to ElectroStore', '2026-05-05 11:51:41'),
(2, 'hero_subtitle', 'Gjeni teknologjinë më të fundit këtu.', '2026-05-05 11:51:41');



CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `slider` (`id`, `title`, `image`) VALUES
(1, 'Mirësevini në ElectroStore', 'slider.jpg'),
(2, 'Oferta Ekskluzive këtë Muaj', 'slider1.jpg'),
(3, 'Mirësevini në ElectroStore', 'slider.jpg'),
(4, 'Oferta Ekskluzive këtë Muaj', 'slider1.jpg');



CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'admin@electrostore.com', 'admin123', 'admin', '2026-05-02 18:39:13'),
(2, 'user', 'user@gmail.com', 'user123', 'user', '2026-05-04 07:07:10'),
(5, 'lina', 'lina@gmail.com', 'lina123', 'user', '2026-05-05 08:25:06'),
(10, 'rina', 'rina@gmail.com', 'rina123', 'user', '2026-05-05 11:11:26');


ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_user` (`created_by`);


ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `section_name` (`section_name`);


ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;


ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

