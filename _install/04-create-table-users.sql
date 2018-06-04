CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `remember_me` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;