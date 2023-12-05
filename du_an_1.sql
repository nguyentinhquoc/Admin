-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 12:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `du_an_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bienthe`
--

CREATE TABLE `bienthe` (
  `id` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `idcolor` int(11) NOT NULL,
  `idsize` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(10) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idsp` int(10) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id`, `comment`, `iduser`, `idsp`, `date`) VALUES
(81, 'csa', 1, 236, '2023-11-13'),
(82, 'ok', 2, 236, '2023-11-13'),
(83, 'ok', 2, 236, '2023-11-13'),
(84, 'dấccsa', 2, 236, '2023-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `chatuser` varchar(225) NOT NULL,
  `chatadmin` varchar(225) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdh`
--

CREATE TABLE `chitietdh` (
  `id` int(11) NOT NULL,
  `iddh` int(11) NOT NULL,
  `idtrangthai` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color`) VALUES
(1, 'green'),
(2, 'red'),
(3, 'black'),
(4, 'white');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(1, 'Nike\r\n'),
(2, 'Jordan\r\n'),
(3, 'MLB\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `idvocher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `img` varchar(255) NOT NULL,
  `mota` text NOT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `iddm` int(11) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `img`, `mota`, `luotxem`, `iddm`, `soluong`, `sale`) VALUES
(95, ' Nike Waffle Racer ', 1000000.00, 'nike (1).jpg', ' Đôi giày chạy bộ đầu tiên của Nike, được thiết kế bởi Bill Bowerman. Nó có đế waffle đặc trưng, giúp tăng độ bám ', 1433, 1, 40, NULL),
(96, 'Nike Bruin', 2000000.00, 'nike (2).jpg', ' Đôi giày bóng rổ đầu tiên của Nike. Nó có đế cao su dày và phần trên bằng da, mang lại sự hỗ trợ và độ bền.', 949, 1, 17, NULL),
(97, 'Nike Cortez', 1500000.00, 'nike (3).jpg', 'Đôi giày chạy bộ mang tính biểu tượng của Nike. Nó có đế cao su và phần trên bằng da, mang lại sự thoải mái và hỗ trợ.', 1449, 1, 14, NULL),
(98, 'Nike Tailwind', 1000000.00, 'nike (5).jpg', 'Đôi giày chạy bộ đầu tiên của Nike có đế khí. Nó có đế khí lớn ở gót chân, mang lại sự êm ái và thoải mái.', 432, 1, 20, NULL),
(99, 'Nike Air Force 1', 2000000.00, 'nike (4).jpg', 'Đôi giày bóng rổ mang tính biểu tượng của Nike. Nó có đế khí ở gót chân, mang lại sự êm ái và thoải mái.', 780, 1, 90, NULL),
(100, 'Nike Air Jordan 1', 1500000.00, 'nike (6).jpg', 'Đôi giày bóng rổ mang tính biểu tượng của Michael Jordan. Nó có thiết kế táo bạo và nổi bật, với phần trên bằng da và logo Jumpman.', 749, 1, 14, NULL),
(101, 'Nike Air Max 1', 1000000.00, 'nike (7).jpg', 'Đôi giày chạy bộ mang tính cách mạng của Nike. Nó là đôi giày đầu tiên có đế khí visible, cho phép người dùng cảm nhận được độ đàn hồi và thoải mái.', 583, 1, 47, NULL),
(102, 'Nike Air Max 90', 2000000.00, 'nike (8).jpg', 'Phiên bản nâng cấp của Air Max 1, với phần trên được làm bằng chất liệu nhẹ và thoáng khí hơn.', 1500, 1, 37, NULL),
(103, 'Nike Air Max 95', 1500000.00, 'nike (9).jpg', 'Đôi giày chạy bộ mang tính đột phá của Nike. Nó có thiết kế độc đáo với các lỗ Air visible được đặt ở các vị trí khác nhau trên đế giày.', 1749, 1, 15, NULL),
(104, 'Nike Waffle Racer', 1000000.00, 'nike (10).jpg', 'Đôi giày chạy bộ đầu tiên của Nike, được thiết kế bởi Bill Bowerman. Nó có đế waffle đặc trưng, giúp tăng độ bám', 443, 1, 67, NULL),
(105, 'Nike Air Max Plus', 2000000.00, 'nike (11).jpg', 'Đôi giày chạy bộ mang tính cách mạng của Nike. Nó có thiết kế táo bạo và nổi bật, với phần trên bằng lưới và logo Swoosh lớn.', 940, 1, 37, NULL),
(106, 'Nike Air Max 98', 1500000.00, 'nike (12).jpg', 'Đôi giày chạy bộ mang tính biểu tượng của Nike. Nó có thiết kế độc đáo với phần đế giày được bao phủ bởi các lỗ Air visible.', 749, 1, 14, NULL),
(107, 'Nike Air Max TN', 1000000.00, 'nike (13).jpg', 'Phiên bản giới hạn của Air Max Plus, được phát hành ở Úc. Nó có thiết kế táo bạo và nổi bật, với phần trên bằng lưới và logo Swoosh lớn.', 593, 1, 44, NULL),
(108, 'Nike Air Max 2000', 2000000.00, 'nike (14).jpg', 'Đôi giày chạy bộ mang tính cách mạng của Nike. Nó có thiết kế độc đáo với phần đế giày được bao phủ bởi các lỗ Air visible', 1540, 1, 71, NULL),
(109, 'Nike Air Max 2002', 2000000.00, 'nike (15).jpg', 'Đôi giày chạy bộ mang tính biểu tượng của Nike. Nó có thiết kế táo bạo và nổi bật, với phần trên bằng lưới và logo Swoosh lớn.', 1140, 1, 17, NULL),
(110, 'Nike Air Max 2003', 2000000.00, 'nike (16).jpg', 'Đôi giày chạy bộ mang tính biểu tượng của Nike. Nó có thiết kế độc đáo với phần đế giày được bao phủ bởi các lỗ Air visible.', 845, 1, 77, NULL),
(111, 'Nike Air Max 360', 2000000.00, 'nike (17).jpg', 'Đôi giày chạy bộ mang tính cách mạng của Nike. Nó có đế khí bao phủ toàn bộ đế giày, mang lại sự thoải mái và hỗ trợ', 940, 1, 97, NULL),
(112, 'Nike Air Max 180', 2000000.00, 'nike (18).jpg', 'Đôi giày chạy bộ mang tính biểu tượng của Nike. Nó có đế khí lớn ở gót chân, mang lại sự thoải mái và hỗ trợ', 590, 1, 57, NULL),
(113, 'Nike Air Max 32', 2000000.00, 'nike (19).jpg', 'Đôi giày bóng rổ mang tính cách mạng của Nike. Nó có đế khí lớn ở gót chân, mang lại sự thoải mái và hỗ trợ', 570, 1, 97, NULL),
(114, 'Nike Air Max 24/7', 2000000.00, 'nike (20).jpg', 'Đôi giày chạy bộ mang tính biểu tượng của Nike. Nó có thiết kế độc đáo với phần', 550, 1, 73, NULL),
(115, 'Adidas Adizero Afterburner V Cleats', 1500000.00, 'mlb (1).jpg', 'Đôi giày chuyên dụng cho môn bóng chày, có đế nổi tiếng Adizero của Adidas, giảm trọng lượng và tăng độ bám trên sân.', 999, 3, 84, NULL),
(116, 'New Balance 4040v4 Metal Cleats', 1500000.00, 'mlb (2).jpg', 'Đôi giày có đế chắc chắn và miếng lót thoáng khí để hỗ trợ các vận động viên ở vị trí chạy nhanh trên sân.', 498, 3, 24, NULL),
(117, 'Under Armour Harper 4 Mid Metal Cleats', 1500000.00, 'mlb (3).jpg', 'Đôi giày được thiết kế đặc biệt cho Bryce Harper, với đế chắc chắn, hỗ trợ và mang lại sự ổn định khi chơi bóng.', 779, 3, 84, NULL),
(118, 'Nike Air Max MVP Elite 3/4 Metal Cleats', 1500000.00, 'mlb (4).jpg', 'Đôi giày chất lượng cao với đế metal và công nghệ Air Max của Nike, đem lại sự thoải mái và độ bám tốt trên sân', 493, 3, 54, NULL),
(119, 'Adidas Adizero 8.0 Uncaged Cleats', 1500000.00, 'mlb (5).jpg', 'Được xem là một trong những đôi giày bóng chày nhẹ nhất trên thị trường, với chất liệu nhẹ và kiểu dáng tối giản.', 791, 3, 34, NULL),
(120, 'New Balance Fresh Foam LAZR v2 Cleats', 1500000.00, 'mlb (6).jpg', 'Đôi giày cung cấp sự thoải mái và hỗ trợ tốt nhờ công nghệ đệm Fresh Foam đặc biệt của New Balance.', 949, 3, 64, NULL),
(121, 'Under Armour Yard Low ST Cleats', 1500000.00, 'mlb (7).jpg', 'Đôi giày chuyên dụng cho cỏ tự nhiên, có đế chắc chắn và khả năng bám trên sân cỏ tốt.', 1749, 3, 84, NULL),
(122, 'Nike Force Trout 6 Pro Metal Cleats', 1500000.00, 'mlb (8).jpg', 'Đôi giày thiết kế đặc biệt cho Mike Trout, với đế kim loại và công nghệ Nike Zoom Air để tăng cường hiệu suất chơi bóng.', 799, 3, 94, NULL),
(123, 'Adidas Icon 4 Cleats', 1500000.00, 'mlb (9).jpg', 'Đôi giày bóng chày với thiết kế đơn giản, tạo cảm giác thoải mái và bền bỉ trên sân.', 649, 3, 24, NULL),
(124, 'New Balance 574 Baseball Cleats', 1500000.00, 'mlb (10).jpg', 'Đôi giày có kiểu dáng retro và thoải mái, đặc biệt được thiết kế cho các hoạt động bóng chày.', 759, 3, 34, NULL),
(125, 'Under Armour Yard Trainer Shoes', 1500000.00, 'mlb (11).jpg', 'Đôi giày huấn luyện đa năng với đế êm ái và hỗ trợ tốt cho các hoạt động thể thao.', 749, 3, 14, NULL),
(126, 'Nike Air Max', 1500000.00, 'joden (1).jpg', 'Đôi giày thể thao từ Nike với thiết kế đặc trưng và công nghệ Air Max để cung cấp đệm êm ái và thoáng khí tốt.', 1049, 2, 94, NULL),
(127, 'Adidas Superstar', 1500000.00, 'joden (2).jpg', ': Đôi giày thành danh của Adidas với mũi giày cao su đen và dải sọc ba sọc đặc trưng, mang lại phong cách cổ điển và cá tính.', 791, 2, 31, NULL),
(128, 'Converse Chuck Taylor All Star', 1500000.00, 'joden (3).jpg', 'Giày cao cổ từ Converse với thiết kế đơn giản, phong cách retro, và là biểu tượng của người sử dụng giày thể thao hàng ngày.', 709, 2, 54, NULL),
(129, 'Vans Old Skool', 1500000.00, 'joden (4).jpg', 'Giày skateboard cổ điển của Vans với dải sọc hai bên và đế cao su waffle đặc trưng, tạo nên phong cách đơn giản và thời trang.', 777, 2, 24, NULL),
(130, 'Puma Suede Classic', 1500000.00, 'joden (5).jpg', 'Đôi giày da từ Puma với thiết kế thấp cổ và mặt ngoài da lì, mang đến sự thoải mái và phong cách độc đáo.', 679, 2, 64, NULL),
(131, 'Reebok Classic Leather', 1500000.00, 'joden (6).jpg', 'Đôi giày da từ Reebok với thiết kế đơn giản và đế giữa êm ái, tạo nên phong cách thể thao phối cùng với trang phục hàng ngày.', 557, 2, 34, NULL),
(132, 'New Balance 574', 1500000.00, 'joden (7).jpg', ': Đôi giày chạy bộ từ New Balance với thiết kế retro và công nghệ đệm tốt, tạo cảm giác thoải mái và hỗ trợ cho đôi chân.', 929, 2, 74, NULL),
(133, 'Asics Gel-Lyte III', 1500000.00, 'joden (8).jpg', 'Đôi giày chạy từ Asics với thiết kế phối màu độc đáo và công nghệ đệm gel, mang lại sự êm ái và kiểu dáng đặc trưng.', 719, 2, 84, NULL),
(134, 'Saucony Jazz Original', 1500000.00, 'joden (9).jpg', ': Đôi giày chạy từ Saucony với thiết kế retro và đế giữa đệm êm ái, tạo nên sự thoải mái trong hoạt động chạy bộ.', 799, 2, 44, NULL),
(135, 'Jordan Retro', 1500000.00, 'joden (10).jpg', 'Đôi giày từ dòng sản phẩm Air Jordan của Nike, mang lại phong cách thể thao và hình ảnh của huyền thoại Michael Jordan.', 495, 2, 17, NULL),
(136, 'Timberland 6-Inch Premium Boots', 1500000.00, 'joden (11).jpg', 'Muối của Timberland, đôi giày cao cổ chất liệu da chống nước, đế lugged cho khả năng bám tốt và sự bền bỉ.', 589, 2, 94, NULL),
(137, 'Dr. Martens 1460', 1500000.00, 'joden (12).jpg', 'Đôi giày cao cổ từ Dr. Martens với thiết kế bền bỉ và kiểu dáng punk, mang đến sự cá tính và phong cách riêng.', 899, 2, 19, NULL),
(138, 'Converse Jack Purcell', 1500000.00, 'joden (13).jpg', 'Đôi giày thể thao low-top từ Converse với thiết kế đơn giản, màu sắc trang nhã và một chi tiết kẻ xéo ở mũi giày.', 899, 2, 19, NULL),
(139, 'Adidas Stan Smith', 1500000.00, 'joden (14).jpg', 'Biểu tượng của Adidas, đôi giày thể thao với thiết kế trắng đơn giản và logo Stan Smith đằng sau.', 899, 2, 19, NULL),
(140, 'Nike Dunk', 1500000.00, 'joden (15).jpg', 'Đôi giày bóng rổ từ Nike với thiết kế mạnh mẽ và màu sắc đa dạng, được yêu thích trong cả thời trang hàng ngày.', 899, 2, 19, NULL),
(141, 'Vans Sk8-Hi', 1500000.00, 'joden (16).jpg', 'Đôi giày skateboarding cao cổ từ Vans với dải sọc và đế cao su waffle, mang đến sự thoải mái và hỗ trợ cho người sử dụng.', 899, 2, 19, NULL),
(142, 'Puma RS-X', 1500000.00, 'joden (17).jpg', 'Đôi giày từ dòng RS-X của Puma, với thiết kế đặc trưng, màu sắc táo bạo và kiểu dáng thể thao hiện đại.', 899, 2, 19, NULL),
(143, 'Reebok Club C 85', 1500000.00, 'joden (18).jpg', ': Đôi giày thể thao từ Reebok với thiết kế cổ điển, màu trắng trang nhã và tính năng thoáng khí.', 899, 2, 19, NULL),
(144, 'New Balance 997', 1500000.00, 'joden (19).jpg', ': Đôi giày chạy từ New Balance với thiết kế hiện đại và công nghệ đệm tối ưu, tạo cảm giác thoải mái và ổn định.', 899, 2, 19, NULL),
(145, 'Asics Gel-Kayano', 1500000.00, 'joden (20).jpg', 'Đôi giày chạy từ Asics với thiết kế hiện đại và công nghệ đệm Gel-Kayano, mang lại sự thoải mái và hỗ trợ cho người sử dụng.', 899, 2, 19, NULL),
(146, 'Saucony Shadow 5000', 1500000.00, 'joden (21).jpg', 'Đôi giày từ Saucony với thiết kế retro và công nghệ thoáng khí, tạo cảm giác nhẹ và thoải mái cho người sử dụng.', 899, 2, 19, NULL),
(147, 'Adidas Gazelle', 1500000.00, 'joden (22).jpg', 'Đôi giày từ Adidas với thiết kế thể thao và màu sắc tươi sáng, mang đến phong cách năng động và trẻ trung.', 899, 2, 19, NULL),
(148, 'Nike Air Force 1', 1500000.00, 'joden (23).jpg', 'Đôi giày thể thao cổ điển của Nike với thiết kế trắng đơn giản và công nghệ đệm tốt, được yêu thích trong cả thời trang streetwear.', 899, 2, 19, NULL),
(149, 'Vans Authentic', 1500000.00, 'joden (24).jpg', 'Đôi giày thể thao từ Vans với thiết kế nền và logo Vans đặc trưng, mang đến phong cách dễ thương và thoải mái.', 899, 2, 19, NULL),
(150, 'Puma Clyde', 1500000.00, 'joden (25).jpg', 'Đôi giày từ Puma, lấy cảm hứng từ cựu cầu thủ bóng rổ Clyde Frazier, mang đến phong cách thể thao tinh tế và sang trọng.', 899, 2, 19, NULL),
(151, 'Reebok Workout Plus', 1500000.00, 'joden (26).jpg', 'Đôi giày thể thao từ Reebok với thiết kế đơn giản và công nghệ thoáng khí, mang đến sự thoải mái và kiểu dáng thể thao đa năng.', 899, 2, 19, NULL),
(152, 'New Balance 990', 1500000.00, 'joden (27).jpg', 'Đôi giày chạy cao cấp từ New Balance với thiết kế retro và công nghệ đệm tối ưu, tạo cảm giác thoải mái và ổn định trong hoạt động chạy.', 899, 2, 19, NULL),
(153, 'Asics Gel-Lyte V', 1500000.00, 'joden (28).jpg', 'Đôi giày chạy từ Asics với thiết kế thời trang và công nghệ đệm gel, mang đến sự thoải mái và kiểu dáng đặc trưng.', 899, 2, 19, NULL),
(154, 'Saucony Grid SD', 1500000.00, 'joden (29).jpg', 'Đôi giày từ dòng Grid của Saucony với thiết kế đa dạng và công nghệ thoáng khí, mang đến sự thoải mái và hỗ trợ cho người sử dụng.', 899, 2, 19, NULL),
(155, 'Adidas NMD', 1500000.00, 'joden (30).jpg', 'Đôi giày thể thao hiện đại từ Adidas với thiết kế đơn giản và công nghệ đệm tối ưu, tạo cảm giác nhẹ nhàng và bền bỉ.', 899, 2, 19, NULL),
(156, 'Nike Blazer', 1500000.00, 'joden (31).jpg', 'Đôi giày thể thao từ Nike với thiết kế cổ cao và phong cách hoài cổ, mang đến phong cách thể thao và thời trang cổ điển.', 519, 2, 69, NULL),
(157, 'Vans Slip-On', 1500000.00, 'joden (32).jpg', 'Đôi giày từ Vans với thiết kế đơn giản không cần dây buộc, đế cao su waffle và dải sọc đặc trưng, mang đến sự tiện lợi và phong cách đặc trưng của thương hiệu.', 839, 2, 39, NULL),
(158, 'Puma Roma', 1500000.00, 'joden (33).jpg', 'Đôi giày từ Puma với thiết kế thể thao retro và màu sắc tinh tế, tạo nên phong cách độc đáo và trẻ trung.', 819, 2, 93, NULL),
(159, 'Reebok Classic Nylon', 1500000.00, 'joden (34).jpg', 'Đôi giày từ Reebok với thiết kế đơn giản và chất liệu nylon, mang đến sự nhẹ nhàng và thoáng khí cho đôi chân.', 669, 2, 89, NULL),
(160, 'New Balance 996', 1500000.00, 'joden (35).jpg', 'Đôi giày chạy từ New Balance với thiết kế đa năng và phối màu hợp thời, mang đến sự thoải mái và phong cách thể thao hiện đại.', 1899, 2, 51, NULL),
(161, 'Asics Gel-Respector', 1500000.00, 'joden (36).jpg', 'Đôi giày chạy từ Asics với thiết kế retro và công nghệ đệm gel, tạo cảm giác êm ái và phong cách đặc trưng.', 839, 2, 100, NULL),
(162, 'Saucony Grid 9000', 1500000.00, 'joden (37).jpg', 'Đôi giày từ Saucony với thiết kế thể thao và công nghệ thoáng khí, mang lại cảm giác thoải mái và sự hỗ trợ cho người sử dụng.', 829, 2, 79, NULL),
(163, 'Adidas Ultra Boost', 1500000.00, 'joden (38).jpg', 'Biểu tượng của Adidas, đôi giày chạy với thiết kế hiện đại và công nghệ đệm tối ưu, tạo cảm giác nhẹ nhàng và đàn hồi.', 777, 2, 30, NULL),
(164, 'Nike Cortez', 1500000.00, 'joden (39).jpg', 'Đôi giày thể thao cổ điển của Nike với thiết kế đơn giản và logo Swoosh phản quang, mang đến phong cách thể thao và retro đặc trưng.', 841, 2, 17, NULL),
(165, 'Puma Basket', 1500000.00, 'joden (40).jpg', 'Đôi giày từ Puma với thiết kế thể thao đơn giản và kiểu dáng thấp cổ, tạo nên phong cách năng động và trẻ trung.', 891, 2, 91, NULL),
(166, 'New Balance 997H', 1500000.00, 'joden (41).jpg', 'Phiên bản cải tiến từ New Balance 997, với thiết kế hiện đại và công nghệ đệm tối ưu, mang đến sự thoải mái và kiểu dáng độc đáo.', 795, 2, 29, NULL),
(167, 'Asics Gel-Lyte I', 1500000.00, 'joden (42).jpg', 'Đôi giày chạy điểm danh từ Asics với thiết kế retro và công nghệ đệm gel, tạo cảm giác êm ái và kiểu dáng đặc trưng.', 596, 2, 31, NULL),
(168, 'Saucony Jazz Low Pro', 1500000.00, 'joden (43).jpg', 'Phiên bản thấp cổ từ Saucony Jazz Original, với thiết kế retro và đế giữa đệm êm ái, tạo cảm giác nhẹ nhàng và thoải mái.', 800, 2, 66, NULL),
(169, 'Adidas Yeezy', 1500000.00, 'joden (44).jpg', 'Dòng sản phẩm hợp tác giữa Adidas và rapper Kanye West, với thiết kế độc đáo và các phối màu đặc trưng, tạo nên sự cá tính và ấn tượng.', 500, 2, 18, NULL),
(170, 'Nike Air Max 97', 1500000.00, 'joden (45).jpg', 'Đôi giày thể thao từ Nike với thiết kế độc đáo và công nghệ Air Max, tạo cảm giác êm ái và phong cách hiện đại.', 600, 2, 30, NULL),
(171, 'Vans Sk8-Mid', 1500000.00, 'joden (46).jpg', 'Đôi giày skate cao cổ từ Vans, độc đáo với thiết kế mặt lưng màu sáng và dải sọc đặc trưng, mang đến phong cách cá nhân và bền bỉ.', 799, 2, 21, NULL),
(172, 'Puma Future Rider', 1500000.00, 'joden (48).jpg', 'Đôi giày từ Puma với thiết kế hiện đại và phối màu táo bạo, tạo nên sự thoải mái và cá tính trong hoạt động hàng ngày.', 669, 2, 79, NULL),
(173, 'Reebok Question', 1500000.00, 'joden (49).jpg', 'Đôi giày bóng rổ cổ điển từ Reebok, được thiết kế theo mẫu của cựu cầu thủ NBA Allen Iverson, với sự kết hợp giữa phong cách và hiệu suất thể thao.', 599, 2, 39, NULL),
(174, 'Saucony Jazz Low Pro', 1500000.00, 'joden (50).jpg', 'Phiên bản thấp cổ từ Saucony Jazz Original, với thiết kế retro và đế giữa đệm êm ái, tạo cảm giác nhẹ nhàng và thoải mái.', 999, 2, 99, NULL),
(175, 'Nike Air Zoom Pegasus 36 MLB', 1500000.00, 'mlb (11).jpg', 'Đôi giày chạy bộ thiết kế đặc biệt với logo MLB, có đệm hỗ trợ tốt và mang lại sự thoải mái cho người sử dụng.', 949, 3, 24, NULL),
(176, 'Adidas Adizero Afterburner V Cleats', 1500000.00, 'mlb (12).jpg', 'Đôi giày chuyên dụng cho môn bóng chày, có đế nổi tiếng Adizero của Adidas, giảm trọng lượng và tăng độ bám trên sân.', 546, 3, 18, NULL),
(177, 'New Balance 4040v4 Metal Cleats', 1500000.00, 'mlb (13).jpg', 'Đôi giày có đế chắc chắn và miếng lót thoáng khí để hỗ trợ các vận động viên ở vị trí chạy nhanh trên sân.', 749, 3, 14, NULL),
(178, 'Under Armour Harper 4 Mid Metal Cleats', 1500000.00, 'mlb (14).jpg', 'Đôi giày được thiết kế đặc biệt cho Bryce Harper, với đế chắc chắn, hỗ trợ và mang lại sự ổn định khi chơi bóng.', 749, 3, 14, NULL),
(179, 'Nike Air Max MVP Elite 3/4 Metal Cleats', 1500000.00, 'mlb (15).jpg', 'Đôi giày chất lượng cao với đế metal và công nghệ Air Max của Nike, đem lại sự thoải mái và độ bám tốt trên sân.', 749, 3, 14, NULL),
(180, 'Adidas Adizero 8.0 Uncaged Cleats', 1500000.00, 'mlb (16).jpg', 'Được xem là một trong những đôi giày bóng chày nhẹ nhất trên thị trường, với chất liệu nhẹ và kiểu dáng tối giản.', 749, 3, 14, NULL),
(181, 'New Balance Fresh Foam LAZR v2 Cleats', 1500000.00, 'mlb (17).jpg', 'Đôi giày cung cấp sự thoải mái và hỗ trợ tốt nhờ công nghệ đệm Fresh Foam đặc biệt của New Balance.', 749, 3, 14, NULL),
(182, 'Under Armour Yard Low ST Cleats', 1500000.00, 'mlb (18).jpg', 'Đôi giày chuyên dụng cho cỏ tự nhiên, có đế chắc chắn và khả năng bám trên sân cỏ tốt.', 749, 3, 14, NULL),
(183, 'Nike Force Trout 6 Pro Metal Cleats', 1500000.00, 'mlb (19).jpg', 'Đôi giày thiết kế đặc biệt cho Mike Trout, với đế kim loại và công nghệ Nike Zoom Air để tăng cường hiệu suất chơi bóng.', 749, 3, 14, NULL),
(184, 'Adidas Icon 4 Cleats', 1500000.00, 'mlb (20).jpg', 'Đôi giày bóng chày với thiết kế đơn giản, tạo cảm giác thoải mái và bền bỉ trên sân.', 749, 3, 14, NULL),
(185, 'New Balance 574 Baseball Cleats', 1500000.00, 'mlb (21).jpg', 'Đôi giày có kiểu dáng retro và thoải mái, đặc biệt được thiết kế cho các hoạt động bóng chày.', 749, 3, 14, NULL),
(186, 'Nike Huarache 2K Filth Pro Mid Metal Cleats', 1500000.00, 'mlb (22).jpg', 'Đôi giày sử dụng công nghệ Huarache của Nike và có đế kim loại, tạo sự bám và ổn định trên sân.', 749, 3, 14, NULL),
(187, 'Adidas Icon Bounce Cleats', 1500000.00, 'mlb (23).jpg', 'Đôi giày bóng chày với công nghệ phản hồi năng lượng Bounce của Adidas, mang đến sự thoải mái và đàn hồi cho người sử dụng.', 749, 3, 14, NULL),
(188, 'New Balance Fresh Foam LAZR v2 Turf Shoes', 1500000.00, 'mlb (24).jpg', 'Đôi giày turf với công nghệ đế Fresh Foam của New Balance, cho cảm giác thoải mái và đệm êm ái.', 749, 3, 14, NULL),
(189, 'Under Armour Leadoff Mid RM Cleats', 1500000.00, 'mlb (25).jpg', 'Đôi giày bóng chày cao cổ với đế cao su và thiết kế hỗ trợ, tạo sự ổn định và độ bám tốt trên sân.', 749, 3, 14, NULL),
(190, 'Nike Vapor Ultrafly Elite 2 Metal Cleats', 1500000.00, 'mlb (26).jpg', 'Đôi giày kim loại với công nghệ Nike Vapor để tăng hiệu suất chạy nhanh và đế cao su cung cấp độ bám tốt.', 749, 3, 14, NULL),
(191, 'Adidas Adizero Afterburner 7 Cleats', 1500000.00, 'mlb (34).jpg', 'Đôi giày bóng chày nhẹ và linh hoạt, với thiết kế tối giản và độ bám cao trên sân.', 989, 3, 74, NULL),
(192, 'New Balance Fresh Foam 3000v5 Turf Shoes', 1500000.00, 'mlb (35).jpg', 'Đôi giày turf với công nghệ đệm Fresh Foam và đế nhựa TPU, mang đến sự thoải mái và bền bỉ trên sân cỏ nhân tạo.', 549, 3, 31, NULL),
(193, 'Under Armour Yard Low Trainer Turf Shoes', 1500000.00, 'mlb (36).jpg', 'Đôi giày turf đa năng với thiết kế thời trang và đế êm ái, phù hợp cho cả các hoạt động thể dục và huấn luyện.', 909, 3, 14, NULL),
(194, 'Nike Alpha Huarache Elite 3 Turf Shoes', 1500000.00, 'mlb (37).jpg', 'Đôi giày turf với công nghệ phản hồi năng lượng và đế cao su, tạo độ bám và ổn định trên sân cỏ nhân tạo.', 999, 3, 54, NULL),
(195, 'Adidas Wheelhouse 4 Cleats', 1500000.00, 'mlb (38).jpg', 'Đôi giày bóng chày với thiết kế đơn giản và đế cao su, phù hợp cho các hoạt động bóng chày trong môi trường cỏ tự nhiên.', 709, 3, 14, NULL),
(196, 'New Balance 4040v5 Metal Cleats', 1500000.00, 'mlb (39).jpg', 'Đôi giày kim loại với công nghệ đế lót Fresh Foam và thiết kế hỗ trợ, giúp gia tăng hiệu suất chơi bóng.', 789, 3, 16, NULL),
(197, 'Under Armour Harper 5 Turf Shoes', 1500000.00, 'mlb (40).jpg', 'Đôi giày turf thiết kế đặc biệt cho Bryce Harper, với đế êm ái và hỗ trợ dễ chịu khi chơi trên bề mặt cỏ tự nhiên và nhân tạo.', 649, 3, 94, NULL),
(198, 'Nike Air Zoom Pegasus 37 MLB', 1500000.00, 'mlb (41).jpg', 'Đôi giày chạy bộ với thiết kế đặc biệt và logo MLB, cung cấp độ thoải mái và bùng nổ năng lượng khi chạy.', 779, 3, 74, NULL),
(199, 'Adidas Adizero Afterburner Low Cleats', 1500000.00, 'mlb (42).jpg', 'Đôi giày bóng chày nhẹ nhất của Adidas, với đế thấp và thiết kế tối giản, nhằm tối ưu hóa tốc độ và độ bám trên sân.', 748, 3, 17, NULL),
(200, 'New Balance Fresh Foam 3000v5 Metal Cleats', 1500000.00, 'mlb (43).jpg', 'Đôi giày bóng chày kim loại với công nghệ đệm Fresh Foam và đế chắc chắn, thuận tiện cho các hoạt động ở vị trí chạy nhanh.', 749, 3, 14, NULL),
(201, 'Under Armour Clean Up Culture Batting Gloves', 1500000.00, 'mlb (44).jpg', 'Đôi găng tay bóng chày với hình in thú vị và hỗ trợ cải thiện cảm giác khi nắm vợt', 1749, 3, 81, NULL),
(202, 'Nike Alpha Huarache Elite 3 Low Cleats', 1500000.00, 'mlb (46).jpg', 'Đôi giày bóng chày có đế cao su và công nghệ Nike Alpha, mang lại sự thoải mái và bám tốt trên sân.', 509, 3, 94, NULL),
(203, 'Adidas Icon 5 Bounce Cleats', 1500000.00, 'mlb (45).jpg', 'Đôi giày bóng chày với công nghệ phản hồi năng lượng Bounce để tăng cường hiệu suất và độ bền.', 609, 3, 34, NULL),
(204, 'New Balance 3000v5 Cleats', 1500000.00, 'mlb (47).jpg', 'Đôi giày bóng chày với công nghệ đế Fresh Foam và thiết kế chắc chắn, giúp cung cấp sự thoải mái và hỗ trợ tốt.', 740, 3, 44, NULL),
(205, 'Under Armour Yard Mid ST Cleats', 1500000.00, 'mlb (48).jpg', 'Đôi giày bóng chày cao cổ với đế chắc chắn và khả năng bám trên sân cỏ tự nhiên.', 899, 3, 24, NULL),
(206, 'Nike Vapor Ultrafly 2 Keystone Cleats', 1500000.00, 'mlb (49).jpg', 'Đôi giày bóng chày với đế cao su và thiết kế linh hoạt, mang lại sự thoải mái và độ bám tốt trên sân.', 709, 3, 17, NULL),
(207, 'Adidas Speed Trainer 4 Turf Shoes', 1500000.00, 'mlb (50).jpg', 'Đôi giày turf đa năng với đế êm ái và thiết kế hiện đại, phù hợp cho các hoạt động thể dục và huấn luyện trên sân cỏ nhân tạo.', 729, 3, 16, NULL),
(208, 'Nike Air Max 150', 2000000.00, 'nike (21).jpg', 'Đôi giày chạy bộ mang tính cách mạng của Nike. Nó có đế khí lớn ở gót chân, mang lại sự thoải mái và hỗ trợ', 550, 1, 73, NULL),
(209, 'Nike Air Max 2010', 2000000.00, 'nike (22).jpg', 'Đôi giày chạy bộ mang tính biểu tượng của Nike. Nó có thiết kế độc đáo với phần đế giày được bao phủ bởi các lỗ Air visible.', 550, 1, 73, NULL),
(210, 'Nike Air Max 1 Ultra (2011)', 2000000.00, 'nike (23).jpg', 'Phiên bản cập nhật của Air Max 1, với phần trên bằng lưới và đế Air visible.', 550, 1, 73, NULL),
(211, 'Nike Air Max 90 Ultra (2013)', 2000000.00, 'nike (24).jpg', 'Phiên bản cập nhật của Air Max 90, với phần trên bằng lưới và đế Air visible.', 550, 1, 73, NULL),
(212, 'Nike Air Max 1 Flyknit (2014)', 2000000.00, 'nike (25).jpg', 'Phiên bản Flyknit của Air Max 1, với phần trên bằng vải Flyknit.', 550, 1, 73, NULL),
(213, 'Nike Air Max 90 Flyknit (2015)', 2000000.00, 'nike (26).jpg', 'Phiên bản Flyknit của Air Max 90, với phần trên bằng vải Flyknit.', 550, 1, 73, NULL),
(214, 'Nike Air Max 95 Flyknit (2015)', 2000000.00, 'nike (27).jpg', 'Phiên bản Flyknit của Air Max 95, với phần trên bằng vải Flyknit.', 550, 1, 73, NULL),
(215, 'Nike Air Max 270 (2018)', 2000000.00, 'nike (28).jpg', 'Đôi giày chạy bộ mang tính cách mạng của Nike. Nó có đế khí lớn ở gót chân, mang lại sự thoải mái và hỗ trợ', 550, 1, 73, NULL),
(216, 'Nike Air Max 270 React (2019)', 2000000.00, 'nike (29).jpg', 'Phiên bản kết hợp của Air Max 270 và React. Nó có đế Air visible và đế React, mang lại sự thoải mái và hỗ trợ tối ưu.', 550, 1, 73, NULL),
(217, 'Nike Air Max 720 (2019)', 2000000.00, 'nike (30).jpg', 'Đôi giày chạy bộ mang tính cách mạng của Nike. Nó có đế khí lớn bao phủ toàn bộ đế giày, mang lại sự thoải mái và hỗ trợ.', 550, 1, 73, NULL),
(218, 'Nike Air Max 270 React 3 (2020)', 2000000.00, 'nike (31).jpg', 'Phiên bản cập nhật của Air Max 270 React, với phần đế được làm bằng chất liệu nhẹ và bền hơn.', 930, 1, 63, NULL),
(219, 'Nike Air Max 270 React SE (2020)', 2000000.00, 'nike (32).jpg', 'Phiên bản đặc biệt của Air Max 270 React, với phần trên được làm bằng chất liệu cao cấp và thiết kế độc đáo.', 580, 1, 73, NULL),
(220, 'Nike Air Max 270 React ENG (2020)', 2000000.00, 'nike (33).jpg', 'Phiên bản Engineered Garments của Air Max 270 React, với phần trên được làm bằng chất liệu cao cấp và thiết kế cổ điển.', 1110, 1, 19, NULL),
(221, 'Nike Air Max 270 React 2 (2021)', 2000000.00, 'nike (34).jpg', 'Phiên bản cập nhật của Air Max 270 React, với phần đế được làm bằng chất liệu nhẹ và bền hơn.', 1010, 1, 43, NULL),
(222, 'Nike Air Force 1 Low (1982)', 2000000.00, 'nike (35).jpg', 'Phiên bản thấp cổ của Air Force 1, mang lại sự thoải mái và linh hoạt.', 510, 1, 33, NULL),
(223, 'Nike Air Force 1 Mid (1983)', 2000000.00, 'nike (36).jpg', 'Phiên bản cổ giữa của Air Force 1, mang lại sự hỗ trợ và bảo vệ.', 1250, 1, 61, NULL),
(224, 'Nike Air Force 1 High (1984)', 2000000.00, 'nike (37).jpg', 'Phiên bản cổ cao của Air Force 1, mang lại sự thoải mái và thời trang.', 1000, 1, 100, NULL),
(225, 'Nike Air Force 1 07 (2007)', 2000000.00, 'nike (38).jpg', 'Phiên bản cập nhật của Air Force 1, với thiết kế cổ điển và chất liệu cao cấp.', 1050, 1, 90, NULL),
(226, 'Nike Air Force 1 07 LV8 (2012)', 2000000.00, 'nike (39).jpg', 'Phiên bản đặc biệt của Air Force 1, với thiết kế độc đáo và chất liệu cao cấp.', 1150, 1, 63, NULL),
(227, 'Nike Air Force 1 07 LV8 Utility (2017)', 2000000.00, 'nike (40).jpg', 'Phiên bản Utility của Air Force 1, với thiết kế ứng dụng và chất liệu cao cấp.', 1530, 1, 73, NULL),
(228, 'Nike Air Force 1 Low Off-White (2017)', 2000000.00, 'nike (41).jpg', 'Phiên bản hợp tác của Air Force 1, được thiết kế bởi Virgil Abloh.', 590, 1, 83, NULL),
(229, 'Nike Air Force 1 Mid Off-White (2018)', 2000000.00, 'nike (42).jpg', 'Phiên bản hợp tác của Air Force 1, được thiết kế bởi Virgil Abloh.', 1450, 1, 83, NULL),
(230, 'Nike Air Force 1 High Off-White (2018)', 2000000.00, 'nike (43).jpg', 'Phiên bản hợp tác của Air Force 1, được thiết kế bởi Virgil Abloh.', 910, 1, 51, NULL),
(231, 'Nike Air Force 1 Low Travis Scott (2018)', 2000000.00, 'nike (44).jpg', 'Phiên bản hợp tác của Air Force 1, được thiết kế bởi Travis Scott.', 1550, 1, 93, NULL),
(232, 'Nike Air Force 1 Mid Travis Scott (2019)', 2000000.00, 'nike (45).jpg', 'Phiên bản hợp tác của Air Force 1, được thiết kế bởi Travis Scott.', 510, 1, 53, NULL),
(233, 'Nike Air Force 1 High Travis Scott (2019)', 2000000.00, 'nike (46).jpg', 'Phiên bản hợp tác của Air Force 1, được thiết kế bởi Travis Scott.', 559, 1, 93, NULL),
(234, 'Nike Air Force 1 Low Supreme (2018)', 2000000.00, 'nike (48).jpg', 'Phiên bản hợp tác của Air Force 1, được thiết kế bởi Supreme.', 555, 1, 77, NULL),
(235, 'Nike Air Force 1 Mid Supreme (2018)', 2000000.00, 'nike (49).jpg', 'Phiên bản hợp tác của Air Force 1, được thiết kế bởi Supreme.', 950, 1, 83, NULL),
(236, ' Nike Air Force 1 High Supreme (2018)', 2000000.00, 'nike (50).jpg', ' Phiên bản hợp tác của Air Force 1, được thiết kế bởi Supreme.', 560, 1, 63, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`) VALUES
(1, 'SIZE 37'),
(2, 'SIZE 38'),
(3, 'SIZE 39'),
(4, 'SIZE 40'),
(5, 'SIZE 41'),
(6, 'SIZE 42'),
(7, 'SIZE 43');

-- --------------------------------------------------------

--
-- Table structure for table `star`
--

CREATE TABLE `star` (
  `id` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `star` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `name`, `pass`, `email`, `address`, `tel`, `role`, `img`) VALUES
(1, 'Admin', '123456', 'admin@fpt.edu.vn', NULL, '423543', 1, NULL),
(2, 'nguyentinh', '201004', 'tinhnguyen@gmail.com', 'Nam Định', '06792568793', 2, 'user (1).jpg'),
(9, 'USER', '201004', '123', '123', '123', 0, '123'),
(10, 'ting', '12', 'dsa33d@gmail.com', NULL, '0867867347', 0, NULL),
(11, 'ting', '12', 'dssad@gmail.com', NULL, '0987564678', 0, NULL),
(12, 'dá', '12', 'nguyentinh140321@gmail.com', NULL, '0987657893', 0, NULL),
(13, 'ting', '1234567', 'ds234aad@gmail.com', NULL, '0987656784', 0, NULL),
(14, 'Nguyễn Tình', '1234567', 'user@gmail.com', NULL, '0862201043', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trangthai`
--

CREATE TABLE `trangthai` (
  `id` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vocher`
--

CREATE TABLE `vocher` (
  `id` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bienthe`
--
ALTER TABLE `bienthe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcolor` (`idcolor`),
  ADD KEY `idsize` (`idsize`),
  ADD KEY `idsp` (`idsp`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpro` (`idsp`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `chitietdh`
--
ALTER TABLE `chitietdh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddh` (`iddh`),
  ADD KEY `idtrangthai` (`idtrangthai`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idsanpham` (`idsp`),
  ADD KEY `idvocher` (`idvocher`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddm` (`iddm`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `star`
--
ALTER TABLE `star`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsp` (`idsp`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vocher`
--
ALTER TABLE `vocher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idacc` (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bienthe`
--
ALTER TABLE `bienthe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chitietdh`
--
ALTER TABLE `chitietdh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `star`
--
ALTER TABLE `star`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vocher`
--
ALTER TABLE `vocher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bienthe`
--
ALTER TABLE `bienthe`
  ADD CONSTRAINT `bienthe_ibfk_1` FOREIGN KEY (`idcolor`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `bienthe_ibfk_2` FOREIGN KEY (`idsize`) REFERENCES `size` (`id`),
  ADD CONSTRAINT `bienthe_ibfk_3` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `chitietdh`
--
ALTER TABLE `chitietdh`
  ADD CONSTRAINT `chitietdh_ibfk_1` FOREIGN KEY (`iddh`) REFERENCES `donhang` (`id`),
  ADD CONSTRAINT `chitietdh_ibfk_2` FOREIGN KEY (`idtrangthai`) REFERENCES `trangthai` (`id`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`idvocher`) REFERENCES `vocher` (`id`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `donhang_ibfk_3` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);

--
-- Constraints for table `star`
--
ALTER TABLE `star`
  ADD CONSTRAINT `star_ibfk_1` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `vocher`
--
ALTER TABLE `vocher`
  ADD CONSTRAINT `vocher_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
