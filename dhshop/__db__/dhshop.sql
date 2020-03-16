-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 10:05 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `user` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user`, `password`) VALUES
(1, 'admin', '$2y$10$jBu7f75o4CEQwdiZamnHbOJEoLyZJI60UW1mwlgQ5I5CElSo43/oi');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(-1, 'Sin definir'),
(1, 'celulares'),
(2, 'accesorios'),
(3, 'auriculares inalámbricos'),
(4, 'auriculares con cable'),
(6, 'teclados'),
(7, 'televisores'),
(14, 'consolas');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `name`) VALUES
(-1, 'Sin definir'),
(1, 'samsung'),
(2, 'xiaomi'),
(3, 'apple'),
(4, 'huawei'),
(5, 'motorola'),
(6, 'sony'),
(7, 'fiio'),
(10, 'lenovo'),
(16, 'kz');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2020_02_12_202328_column_quantity_added_to_receipts_products', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `mark_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `description`, `image`, `mark_id`, `category_id`) VALUES
(1, 'Airdots', 2900, 6, 'pequeños auriculares inalámbricos que cuentan con estuche que también sirve de cargador. Una buena alternativa a los Apple Airpods.', '1.jpg', 2, 3),
(2, 'Fiio F3', 3600, 91, 'Los FiiO F3 son los nuevos auriculares In-Ear con drivers de Grafeno, un nano material muy reciente con excelentes propiedades para la producción de sonido en alta fidelidad. Los F3 están construidos con la calidad que caracteriza a los productos FiiO y cuentan con un completo set de accesorios que normalmente puede encontrarse en auriculares que duplican y triplican su valor. Los F3 son IEMs que ofrecen excelente calidad de sonido, aislación del exterior y comodidad para una experiencia de sonido de alta definición que puede disfrutarse en todo momento y lugar.', '2.jpg', 7, 4),
(3, 'Apple iPhone 11 Pro Dual SIM 256 GB Verde medianoche 4 GB RAM', 142000, 8, '¡El nuevo smartphone que lo tiene todo! Con este lanzamiento, Apple ha superado todos sus récords. Su diseño se destaca por sus líneas finas y distinguidas a partir de una sola hoja de vidrio resistente, combinada con aluminio de excelente calidad.', '3.jpg', 3, 1),
(4, 'Samsung Buds', 10000, 2, 'En la calle, en el colectivo o en la oficina, tené siempre a mano tus auriculares Samsung y ¡escapate de la rutina por un rato! Vas a poder disfrutar de la música que más te gusta y de tus podcasts favoritos cuando quieras y donde quieras.El formato perfecto para vos. Al ser in-ear, aíslan el ruido del exterior, mejoran la calidad del audio y son de tamaño pequeño para poder insertarse en tu oreja. Son ideales para acompañarte a la hora de hacer ejercicio mientras te sumergís en el mejor sonido envolvente.', '4.jpg', 1, 3),
(5, 'Xiaomi Redmi Note 8 Dual SIM 64 GB', 20000, 2, 'El sistema operativo avanzado Android 9.0 Pie aprende tus hábitos para adaptarse a tu rutina y lograr la máxima eficiencia de tu equipo. Tu dispositivo tendrá la autonomía necesaria para reducir el consumo energético ajustando el brillo automáticamente y gestionando la batería de manera inteligente para que puedas priorizar el uso de tus aplicaciones habituales.\nCon su pantalla IPS de 6.3\", disfrutá de colores intensos y mayor nitidez en todos tus contenidos. Con su memoria interna de 64 GB siempre tendrás espacio para almacenar archivos y documentos importantes. Además, podrás guardar películas, series y videos para reproducirlos cuando quieras sin conexión. Si necesitas más, podrás agregar una tarjeta micro-SD, que te permitirá contar con 256 GB extras.\n', '5.jpg', 2, 1),
(13, 'Samsung Galaxy S10e 128 GB Azul prisma', 49599, 5, 'La doble cámara trasera te permitirá tomar imágenes de alta definición con el famoso modo retrato de poca profundidad de campo. Además, la cámara frontal permite tomar fotos de gran calidad, perfecta para hacer videollamadas y tomar selfies grupales.', '13.jpg', 1, 1),
(14, 'Apple AirPods', 16599, 4, 'Los AirPods reinventan el concepto de auriculares inalámbricos. Los sacás del estuche y ya funcionan con tu iPhone, Apple Watch, iPad o Mac. Se configuran con un simple toque, se activan automáticamente y están siempre conectados, hasta detectan si los llevás puestos y detienen la reproducción cuando te los sacás. Además, ¡Siri hace todo por vos! solo tenés que pedirle que ajuste el volumen, cambie de canción, haga una llamada o te diga cómo llegar a algún sitio.', '14.jpg', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `date`, `user_id`) VALUES
(13, '2020-02-12 17:30:55', 7),
(14, '2020-02-12 17:35:08', 7),
(15, '2020-03-15 20:00:03', 7),
(16, '2020-03-16 16:50:57', 7),
(19, '2020-03-16 16:54:04', 7),
(23, '2020-03-16 17:00:24', 7),
(24, '2020-03-16 17:01:11', 7),
(26, '2020-03-16 17:02:24', 7),
(27, '2020-03-16 17:10:09', 7),
(28, '2020-03-16 17:11:48', 7),
(29, '2020-03-16 17:13:44', 7);

-- --------------------------------------------------------

--
-- Table structure for table `receiptsproducts`
--

CREATE TABLE `receiptsproducts` (
  `id` int(11) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receiptsproducts`
--

INSERT INTO `receiptsproducts` (`id`, `receipt_id`, `product_id`, `quantity`) VALUES
(4, 13, 1, 2),
(5, 13, 2, 3),
(6, 14, 1, 2),
(7, 14, 2, 3),
(8, 15, 2, 1),
(9, 16, 1, 1),
(10, 19, 1, 5),
(11, 23, 1, 1),
(12, 24, 1, 3),
(13, 24, 3, 2),
(14, 24, 14, 1),
(15, 26, 2, 1),
(16, 26, 3, 3),
(17, 27, 3, 2),
(18, 27, 13, 2),
(19, 28, 3, 3),
(20, 28, 4, 1),
(21, 29, 2, 3),
(22, 29, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `dni` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `remember_token` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `birthdate`, `phone`, `dni`, `address`, `image`, `remember_token`) VALUES
(7, 'Santiago Nicolás', 'Penalva', 'penalvasantiagogm@gmail.com', '$2y$10$b7IsWLqP.FTctv6hCbVnLOUuMrjP8e/KvO7NFrIFkuYXSYQmpWUQO', '1999-05-05', '01166400929', '42148622', 'Virrey Cevallos 215, 4to C', '1581553513.jpg', '3NXM2W3KbpYDYFNWs7tg0chmiFZiNTet2XnBGS0K5ygGFM98lUfzIeuteErJ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `mark_id` (`mark_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `receiptsproducts`
--
ALTER TABLE `receiptsproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipt_id` (`receipt_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `receiptsproducts`
--
ALTER TABLE `receiptsproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`mark_id`) REFERENCES `marks` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `receiptsproducts`
--
ALTER TABLE `receiptsproducts`
  ADD CONSTRAINT `receiptsproducts_ibfk_1` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`),
  ADD CONSTRAINT `receiptsproducts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
