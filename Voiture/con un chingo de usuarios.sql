-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2015 a las 23:43:33
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `projetvoiture`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `utilisateurs_pseudo_unique` (`pseudo`),
  KEY `utilisateurs_role_id_foreign` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mod1', '$2y$10$Uadq4tqtj1zz.NJwDF5eMOCdP5qwNSUvQL3sdyYoh4E03qFv8plWe', 1, 'jxslc5oUnEO43QLBsNTSBNDD0A7VA50XYoGlGDm9RDebtkjMdAyySBfuOSB6', '0000-00-00 00:00:00', '2015-02-15 16:41:22'),
(2, 'spe1', '$2y$10$Pbb4nJnN9HwutH/zCG2gK.bVXs3CbL.RcH0PkfezVT/C.QZorZxN6', 2, 'EmiFoYy6zFm7rK4lOyGpfMt90QgppfLogD8dtQQVByo0xFShtjCSwsf38rBc', '0000-00-00 00:00:00', '2015-02-15 21:37:37'),
(3, 'adc', '$2y$10$qSGgkO.iQuO1TpxRbPqAeOPAO7NWIPM8M486Nu1Us5MbpJmBASU8W', 3, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'edit1', '$2y$10$nMc4bSbDVTF6/dcgtHOx0ObRoNhSTbkv85mpZ6wrJ/8pnzz6JSSOW', 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'cli1', '$2y$10$Rd9GJKSHW9GZYLts3e5MTuWJiAROic8zdoiJQif13AeiDOtFOSSHO', 5, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
