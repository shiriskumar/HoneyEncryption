-- phpMyAdmin SQL Dump

-- version 4.1.14

-- http://www.phpmyadmin.net

--

-- Host: 127.0.0.1

-- Generation Time: Feb 20, 2015 at 09:12 PM

-- Server version: 5.6.17

-- PHP Version: 5.5.12



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


SET time_zone = "+00:00";





/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;


/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;


/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;


/*!40101 SET NAMES utf8 */;



--
-- Database: `honeydev`
--




-- --------------------------------------------------------




--

-- Table structure for table `analytics`
--



CREATE TABLE IF NOT EXISTS `analytics` (
  `sno` int(3) NOT NULL AUTO_INCREMENT,
  `os_types` varchar(15) NOT NULL,
  `brw_types` varchar(15) NOT NULL,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;




--

-- Dumping data for table `analytics`

--



INSERT INTO `analytics` (`sno`, `os_types`, `brw_types`, `ip`) VALUES
(1, 'Windows 8.1', 'Firefox', '192.168.253.1'),
(2, 'Windows 8.1', 'Firefox', '122.547.452.65'),
(3, 'Windows 7', 'Safari', '127.0.0.1'),
(4, 'Windows Server', 'Internet Explor', '192.168.253.1'),
(5, 'Ubuntu', 'Maxthon', '255.255.255.8'),
(6, 'Ubuntu', 'Maxthon', '186.56.476.865'),
(7, 'Mac OS X', 'Safari', '874.43.78.01'),
(8, 'iPhone', 'Safari', '255.255.255.8'),
(9, 'Mac OS X', 'Safari', '255.255.255.8'),
(10, 'Ubuntu', 'Netscape', '874.43.78.01'),
(11, 'iPhone', 'Safari', '186.56.476.865'),
(12, 'Windows Phone', 'Mobile IE', '874.43.78.01'),
(13, 'BlackBerry', 'Unknown Browser', '186.56.476.865'),
(14, 'Windows Phone', 'Mobile IE', '255.255.255.8');




-- --------------------------------------------------------




--

-- Table structure for table `breach`

--



CREATE TABLE IF NOT EXISTS `breach` (
  `sno` int(3) NOT NULL AUTO_INCREMENT,
  `os_types` varchar(15) NOT NULL,
  `brw_types` varchar(15) NOT NULL,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;




-- --------------------------------------------------------




--

-- Table structure for table `honeychecker`

--



CREATE TABLE IF NOT EXISTS `honeychecker` (
  `userid` varchar(10) NOT NULL,
  `position` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--

-- Dumping data for table `honeychecker`

--



INSERT INTO `honeychecker` (`userid`, `position`) VALUES
('aditya', 2),
('shiris', 2);




-- --------------------------------------------------------




--

-- Table structure for table `hw_detail`

--



CREATE TABLE IF NOT EXISTS `hw_detail` (
  `sno` int(3) NOT NULL AUTO_INCREMENT,
  `userid` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;



--

-- Dumping data for table `hw_detail`

--



INSERT INTO `hw_detail` (`userid`, `name`, `email`) VALUES
(1, 'aditya', 'aditya', 'aditya@gmail.com'),
(2, 'shiris', 'shiris', 'shiriskumar.adv@gmail.com');




-- --------------------------------------------------------




--

-- Table structure for table `hw_fpkey`

--



CREATE TABLE IF NOT EXISTS `hw_fpkey` (
  `userid` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pkey` varchar(50) NOT NULL,
  `time` varchar(10) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




-- --------------------------------------------------------




--

-- Table structure for table `hw_password`

--



CREATE TABLE IF NOT EXISTS `hw_password` (
  `userid` varchar(10) NOT NULL,
  `password1` varchar(61) NOT NULL,
  `password2` varchar(61) NOT NULL,
  `password3` varchar(61) NOT NULL,
  `password4` varchar(61) NOT NULL,
  `password5` varchar(61) NOT NULL,
  `password6` varchar(61) NOT NULL,
  `password7` varchar(61) NOT NULL,
  `password8` varchar(61) NOT NULL,
  `password9` varchar(61) NOT NULL,
  `password10` varchar(61) NOT NULL,
  `password11` varchar(61) NOT NULL,
  `password12` varchar(61) NOT NULL,
  `password13` varchar(61) NOT NULL,
  `password14` varchar(61) NOT NULL,
  `password15` varchar(61) NOT NULL,
  `password16` varchar(61) NOT NULL,
  `password17` varchar(61) NOT NULL,
  `password18` varchar(61) NOT NULL,
  `password19` varchar(61) NOT NULL,
  `password20` varchar(61) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--

-- Dumping data for table `hw_password`

--



INSERT INTO `hw_password` (`userid`, `password1`, `password2`, `password3`, `password4`, `password5`, `password6`, `password7`, `password8`, `password9`, `password10`, `password11`, `password12`, `password13`, `password14`, `password15`, `password16`, `password17`, `password18`, `password19`, `password20`) VALUES
('aditya', '$2y$14$a21d118b54616fb9204a0uXReNzujGIaURYlvDEnvB8vmnwd7YWny', '$2y$14$031502619291043646e94uHCb34JcZdEFykCWaEbNTPwZ0rfhRUa2', '$2y$14$a3b368d8b67a8b9adc6d8uBIzbd8o2kMRhtbxEdo5vVpXN.XGbtxu', '$2y$14$d98e088dc5f2ab56eca2eO6Lzrp4bDvcr.022AIcbbEg2iDL.naz6', '$2y$14$1087e9626c4d911a1c485Opu/RZafuefzA8n28u6SC9T3.dH2F0DO', '$2y$14$81e58ce3dfac575016e77u7hxkd/SOx.mQiCQDwji..YRxEyouESS', '$2y$14$bb21b8d56f113e2f1d4bbO.hhE29lTmjaIk8bIy2UEI4sPDLbpfxy', '$2y$14$725dc1427e41398db2210uGN3S.nDWTJtAR0UfCUNmaP/Y.BYakH.', '$2y$14$2aa2a4829d5dada189e0cOkm8i/MRRd/rm5zjB18EN65ZzX7eUtIO', '$2y$14$ecca4b66d6cce6c72d893uauE/NoNphTSyPGgCjVv8AhJuG7ao1I2', '$2y$14$73ba37e0287a716e1776duiDGZ1QJKaGaa7q8S.9rMoqvvxtXaczm', '$2y$14$0768f6be1b75ed6b8e257utGjpJq2nG16crUTbB1bKCKcYJF/YQVu', '$2y$14$cd69c8dc2f7f312468a01Ohhfy6ILH4U/VgU9fnZveKYwYK7Js0.i', '$2y$14$ba81de3e0350085bb78ceu.iXd7W/daM/NklbcDhHDppf/hGe42tC', '$2y$14$b3a9c85c9b3dd0704635cu/ErRH8p4hzAZC3dAk.DyYgK4/GJCygi', '$2y$14$31474650c7cb8c158c24euvxGiH2Z9za3P6HDRlSDMWb.d/Jz9lGC', '$2y$14$6b56b193ff02a1708814fuzwwqzGbjuq8aTGse8GrEJWA3jfkkPEu', '$2y$14$9cbe6a6c7e253f2b87dd7excVVwAaEgoFQGg0djBLQIPOQIWh/mFS', '$2y$14$816f19f7317ff47742a20u9G4CyZm2X1PLVx3p9gzjjqzoMP0MlwS', '$2y$14$3803463a24f910032ea4auYDlKAsJsRNTslm/B3OX7sDjNrXitzsu'),
('shiris', '$2y$14$52ee27be4e06dce25b3dbO6xkKuaOEZukfqrCjuysOuM5WVqaiLKS', '$2y$14$aa21b5012e4474aa979b5usyIyBk4JCtJtTFvdcsdPw46nko4fdea', '$2y$14$01bbc796de59f1a74035bOE/Yi3bysO6dTa99Byc5KfRDOZgJtlkW', '$2y$14$0efc9f55a09090d15d935OCm1LG3OF2edH4qvkR81dkw4vqWHluJS', '$2y$14$7300627e1f1ee6446d147esvLsBMs4rfwQAyEGb1iyRe1mkOLds0C', '$2y$14$135527d0c051a97ae7b51uEBB2DsguSAwbFoVybsEsm6dOH3ss5ny', '$2y$14$88d18a4da30fe6b460b6eu3djIS5qPdaDV543C752Ka9FAulEYWl6', '$2y$14$8e8e1c717a0b75feed578OD3DBkDipWESUl3R4Qyh0mhU5mDZVKX.', '$2y$14$78d2334cfdbd338f53b87OTn0.waGM40Z4i1PTBepEsQoDZGrlyVK', '$2y$14$c9567f71b5bab7d41e50bOjKHp2iZnGYNoM.61y9kXK0fIEvStJrK', '$2y$14$3e32da539d4f298be822auvRT2yb/jHnQQR4d/XS76kYK0gKKfjlW', '$2y$14$5680d961765095050ff56uwAW21wCskwzPRg7Wa0ShYL5c3eisr5W', '$2y$14$b0c0b25c8d4f5163eb99eOYM9ButcW3ghO01a/wUoczIeRNw4ZtmW', '$2y$14$a7d64817500e281b3d3e9u85j.X1boOmp5LprMlki5G9f.je4rEwG', '$2y$14$662a5c0f80a561ff07b1fuJp8q4yStqvVuMYWizumalIALvNHtqTe', '$2y$14$338e197b668590d7e54fbuzWz3yQDpO7xJPMfbKXoW8cLaUx3xVYa', '$2y$14$0c74f2752c3946bc83559uquqxxXN.xi5yl.To49.U1NA/Ont7wyW', '$2y$14$809cacf91d1e0045da4a0OlYE0M.JWdWTOLduE.b7WWXU8LCgh.Du', '$2y$14$e0b70fe833a2a9c54391beH2170lAp9f27yidiNYCZAR/K7qb1TxG', '$2y$14$dce29795ab9ec1953791au0qYAT0JPBf9CpCxubLfPq59iZkEGGz.');




-- --------------------------------------------------------




--

-- Table structure for table `hw_password_plain`

--



CREATE TABLE IF NOT EXISTS `hw_password_plain` (
  `userid` varchar(10) NOT NULL,
  `password1` varchar(20) NOT NULL,
  `password2` varchar(20) NOT NULL,
  `password3` varchar(20) NOT NULL,
  `password4` varchar(20) NOT NULL,
  `password5` varchar(20) NOT NULL,
  `password6` varchar(20) NOT NULL,
  `password7` varchar(20) NOT NULL,
  `password8` varchar(20) NOT NULL,
  `password9` varchar(20) NOT NULL,
  `password10` varchar(20) NOT NULL,
  `password11` varchar(20) NOT NULL,
  `password12` varchar(20) NOT NULL,
  `password13` varchar(20) NOT NULL,
  `password14` varchar(20) NOT NULL,
  `password15` varchar(20) NOT NULL,
  `password16` varchar(20) NOT NULL,
  `password17` varchar(20) NOT NULL,
  `password18` varchar(20) NOT NULL,
  `password19` varchar(20) NOT NULL,
  `password20` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hw_password_plain`
--

INSERT INTO `hw_password_plain` (`userid`, `password1`, `password2`, `password3`, `password4`, `password5`, `password6`, `password7`, `password8`, `password9`, `password10`, `password11`, `password12`, `password13`, `password14`, `password15`, `password16`, `password17`, `password18`, `password19`, `password20`) VALUES
('aditya', '10donaldson1', 'adityavikas', '10coates519', '10dominic423', '107dorothy12401', '\r\n\r\n107dorothy1', '10dominic123', '10bernhardt108', '10coates1', 'letmein', '10dewitt123', '10dewitt', '10dewitt1', '123123', '12345678', '10dewitt12', '10freitas74', '10dominic12', 'letmein', '10freitas1\r\n752'),
('shiris', '12345678', 'shiris', 'iloveyou', 'iloveyou', 'hello', '10chiew12905', '10ghislaine1917293', '10dominic', 'coolprince', 'abc123', '1234', 'photoshop', 'abc123', '111111', '12345', 'photoshop', 'coolprince', '\r\n\r\n107lori1', 'sunshine', '10ghislaine1234\r\n');




-- --------------------------------------------------------




--

-- Table structure for table `tepm_dcp`

--



CREATE TABLE IF NOT EXISTS `tepm_dcp` (
  `sno` int(3) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;



--

-- Dumping data for table `tepm_dcp`

--



INSERT INTO `tepm_dcp` (`sno`, `password`) VALUES
(1, '5d41402abc4b2a76b9719d911017c592'),
(2, '5c0407b496844f35a94d829d7985700a'),
(3, 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(4, 'e10adc3949ba59abbe56e057f20f883e'),
(5, '5f4dcc3b5aa765d61d8327deb882cf99'),
(6, '25d55ad283aa400af464c76d713c07ad'),
(7, 'e99a18c428cb38d5f260853678922e03'),
(8, '25f9e794323b453885f5181f1b624d0b'),
(9, '96e79218965eb72c92a549dd5a330112'),
(10, 'fcea920f7412b5da7be0cf42b8c93759'),
(11, 'f25a2fc72690b780b2a14e140ef6a9e0'),
(12, '7558af202997483d3afef3bb2b5a709d'),
(13, '4297f44b13955235245b2497399d7a93'),
(14, 'e3afed0047b08059d0fada10f400c1e5'),
(15, 'e807f1fcf82d132f9bb018ca6738a19f'),
(16, '0d107d09f5bbe40cade3de5c71e9e9b7'),
(17, 'c7c9cfbb7ed7d1cebb7a4442dc30877f'),
(18, '81dc9bdb52d04dc20036dbd8313ed055'),
(19, 'd0763edaa9d9bd2a9516280e9044d885'),
(20, '3bf1114a986ba87ed28fc1b5884fc2f8'),
(21, '0571749e2ac330a7455809c6b0e7af90'),
(22, '827ccb0eea8a706c4c34a16891f84e7b'),
(23, '7c6a180b36896a0a8c02787eeafb0e4c'),
(24, '8afa847f50a716e64932d995c8e7435a'),
(25, 'ab4f63f9ac65152575886860dde480a1'),
(26, '5fcfd41e547a12215b173ff47fdd3739'),
(27, '670b14728ad9902aecba32e22fa4f6bd'),
(28, '670b14728ad9902aecba32e22fa4f6bd'),
(29, '4e0a770df8cc3799cd9facd938338803'),
(30, 'a029d0df84eb5549c641e04a9ef389e5');




-- --------------------------------------------------------




--

-- Table structure for table `user_password`

--



CREATE TABLE IF NOT EXISTS `user_password` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;




--

-- Dumping data for table `user_password`

--



INSERT INTO `user_password` (`sno`, `password`) VALUES
(1, 'hello'),
(2, 'shiris'),
(3, 'qwerty'),
(4, '123456'),
(5, 'password'),
(6, '12345678'),
(7, 'abc123'),
(8, '123456789'),
(9, '111111'),
(10, '1234567'),
(11, 'iloveyou'),
(12, 'adobe123'),
(13, '123123'),
(14, 'Admin'),
(15, '1234567890'),
(16, 'letmein'),
(17, 'photoshop'),
(18, 'photoshop'),
(19, '1234'),
(20, 'monkey'),
(21, 'shadow'),
(22, 'sunshine'),
(23, '12345'),
(24, 'password1'),
(25, 'princes'),
(26, 'azerty'),
(27, 'trustno1'),
(28, '000000'),
(29, 'coolprince');



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
