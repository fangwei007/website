-- phpMyAdmin SQL Dump
-- version 4.0.10.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2017 at 03:10 PM
-- Server version: 5.5.46
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `anewsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE IF NOT EXISTS `instruments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `image` (`image`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=89 ;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`id`, `name`, `introduction`, `image`, `company`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '镊子系列', '镊子系列', '/uploads/Pinzetten/Pinzetten.jpg', 'Germany', 'jc', '2016-06-08 07:04:00', '2016-08-22 16:44:54', NULL),
(2, '麻醉用器械系列', '麻醉用器械系列', '/uploads/Narkose/Narkose.jpg', 'Germany', 'jc', '2016-06-08 04:03:00', '2016-08-22 16:44:30', NULL),
(3, '肥胖症专用器械系列', '肥胖症专用器械系列', '/uploads/BariatischeChirugrie/BariatischeChirugrie.jpg', 'Germany', 'jc', '2016-06-08 04:00:00', '2016-08-22 16:42:12', NULL),
(4, '手术剪刀系列', '手术剪刀系列', '/uploads/Scheren/Scheren.jpg', 'Germany', 'jc', '2016-06-09 04:00:00', '2016-08-22 16:45:55', NULL),
(5, '诊断用器械系列', '诊断用器械系列', '/uploads/Diagnostik/Diagnostik.jpg', 'Germany', 'jc', '2016-06-08 04:00:00', '2016-08-22 16:46:44', NULL),
(6, '探条吸引管打孔器系列', '探条吸引管打孔器系列', '/uploads/SondenSaugrohre/SondenSaugrohre.jpg', 'Germany', 'jc', '2016-06-09 04:00:00', '2016-08-22 16:46:20', NULL),
(7, '缝合器械系列', '缝合器械系列', '/uploads/Naht/Naht.jpg', 'Germany', 'jc', '2016-06-08 04:00:00', '2016-08-22 16:42:43', NULL),
(8, '止血钳分离钳系列', '止血钳分离钳系列', '/uploads/Arterienklemmen/Arterienklemmen.jpg', 'Germany', 'jc', '2016-06-01 04:00:00', '2016-08-22 16:47:05', NULL),
(9, '解剖器械系列', '解剖器械系列', '/uploads/Autopsie/Autopsie.jpg', 'Germany', 'jc', '2016-06-02 04:00:00', '2016-08-22 16:43:09', NULL),
(14, '巾钳管道钳海绵钳系列', '巾钳管道钳海绵钳系列', '/uploads/Tuchklemmen/Tuchklemmen.jpg', 'Germany', 'jc', '2016-06-17 02:02:33', '2016-08-22 16:43:50', NULL),
(15, '备皮器械系列', '备皮器械系列', '/uploads/Vorbereitung Dermatologie/Vorbereitung Dermatologie.jpg', 'Germany', 'jc', '2016-06-17 02:03:55', '2016-08-22 16:41:25', NULL),
(16, '牵开器系列', '牵开器系列', '/uploads/Wundhaken/Wundhaken.jpg', 'Germany', 'jc', '2016-06-17 02:04:39', '2016-08-22 16:45:27', NULL),
(17, '自动牵开器系列', '自动牵开器系列', '/uploads/Wundspreizer/Wundspreizer.jpg', 'Germany', 'jc', '2016-06-17 02:05:15', '2016-08-22 16:47:24', NULL),
(20, '止血钳及分离钳系列(心胸外)', '止血钳及分离钳系列(心胸外)', '/uploads/Arterienklemmen 心胸外/Arterienklemmen 心胸外.jpg', 'Germany', 'xxw', '2016-07-13 22:12:10', '2016-08-22 18:02:38', NULL),
(21, '钢丝钳及引导系列', '钢丝钳及引导系列', '/uploads/Drahtinstrumente/Drahtinstrumente.jpg', 'Germany', 'xxw', '2016-07-13 22:12:28', '2016-08-22 17:56:05', NULL),
(22, '剥离器及刮匙系列', '剥离器及刮匙系列', '/uploads/Elevatorien/Elevatorien.jpg', 'Germany', 'xxw', '2016-07-13 22:12:46', '2016-08-22 17:55:34', NULL),
(23, '血管阻断钳', '血管阻断钳', '/uploads/Gefaessklemmen/Gefaessklemmen.jpg', 'Germany', 'xxw', '2016-07-13 22:12:59', '2016-08-22 18:01:55', NULL),
(24, '骨切钳系列', '骨切钳系列', '/uploads/Hohlmeisselzangen/Hohlmeisselzangen.jpg', 'Germany', 'xxw', '2016-07-13 22:13:18', '2016-08-22 17:56:21', NULL),
(25, '持骨钳系列', '持骨钳系列', '/uploads/Knochenhaltezangen/Knochenhaltezangen.jpg', 'Germany', 'xxw', '2016-07-13 22:13:55', '2016-08-22 17:55:51', NULL),
(26, '咬骨钳系列', '咬骨钳系列', '/uploads/Knochensplitterzangen/Knochensplitterzangen.jpg', 'Germany', 'xxw', '2016-07-13 22:53:28', '2016-08-22 18:02:09', NULL),
(27, '针持系列', '针持系列', '/uploads/Nadelhalter/Nadelhalter.jpg', 'Germany', 'xxw', '2016-07-13 22:53:45', '2016-08-22 18:02:24', NULL),
(28, '肋骨牵开器剪等系列', '肋骨牵开器剪等系列', '/uploads/RippenspreizerScheren/RippenspreizerScheren.jpg', 'Germany', 'xxw', '2016-07-13 22:53:59', '2016-08-22 17:56:36', NULL),
(29, '吸引管动脉内膜切除及打孔器系列', '吸引管动脉内膜切除及打孔器系列', '/uploads/Saugrohre/Saugrohre.jpg', 'Germany', 'xxw', '2016-07-13 22:54:17', '2016-08-22 18:01:16', NULL),
(30, '血管剪系列(心胸外)', '血管剪系列(心胸外)', '/uploads/Scheren 心胸外/Scheren 心胸外.jpg', 'Germany', 'xxw', '2016-07-13 22:54:46', '2016-08-22 18:01:34', NULL),
(31, '探针探条系列', '探针探条系列', '/uploads/SondenDilatatoren/SondenDilatatoren.jpg', 'Germany', 'xxw', '2016-07-13 22:55:09', '2016-08-22 18:00:56', NULL),
(32, '牵开器系列(心胸外)', '牵开器系列(心胸外)', '/uploads/Wundhaken 心胸外/Wundhaken 心胸外.jpg', 'Germany', 'xxw', '2016-07-13 22:55:35', '2016-08-22 18:00:37', NULL),
(33, '自动牵开器系列(心胸外)', '自动牵开器系列(心胸外)', '/uploads/Wundspreizer 心胸外/Wundspreizer 心胸外.jpg', 'Germany', 'xxw', '2016-07-13 22:56:01', '2016-08-22 18:03:03', NULL),
(35, '常规器械系列(普外)', '常规器械系列(普外)', '/uploads/AllgemeineHNO/AllgemeineHNO.jpg', 'Germany', 'pw', '2016-07-13 20:57:47', '2016-08-22 17:50:42', NULL),
(36, '止血钳分离钳(普外)', '止血钳分离钳(普外)', '/uploads/Arterienklemmen(普外)/Arterienklemmen(普外).jpg', 'Germany', 'pw', '2016-07-13 20:58:21', '2016-08-22 17:53:59', NULL),
(37, '探查器械系列(普外)', '探查器械系列(普外)', '/uploads/Diagnostik(普外)/Diagnostik(普外).jpg', 'Germany', 'pw', '2016-07-13 20:59:00', '2016-08-22 17:53:13', NULL),
(38, '肝胆肾科器械系列', '肝胆肾科器械系列', '/uploads/GalleLeberNiere/GalleLeberNiere.jpg', 'Germany', 'pw', '2016-07-13 20:59:17', '2016-08-22 17:51:45', NULL),
(39, '产科器械系列', '产科器械系列', '/uploads/Geburtshilfe/Geburtshilfe.jpg', 'Germany', 'pw', '2016-07-13 20:59:39', '2016-08-22 17:49:30', NULL),
(40, '妇科器械系列', '妇科器械系列', '/uploads/Gyna-êkologie/Gyna-êkologie.jpg', 'Germany', 'pw', '2016-07-13 21:00:07', '2016-08-22 17:51:32', NULL),
(41, '胃肛肠科器械系列', '胃肛肠科器械系列', '/uploads/MagenDarm/MagenDarm.jpg', 'Germany', 'pw', '2016-07-13 21:00:21', '2016-08-22 17:53:45', NULL),
(42, '缝合器械系列(普外)', '缝合器械系列(普外)', '/uploads/Naht(普外)/Naht(普外).jpg', 'Germany', 'pw', '2016-07-13 21:00:41', '2016-08-22 17:51:12', NULL),
(43, '探针吸引管穿刺器械系列(普外)', '探针吸引管穿刺器械系列(普外)', '/uploads/SondenSaugrohre(普外)/SondenSaugrohre(普外).jpg', 'Germany', 'pw', '2016-07-13 21:01:07', '2016-08-22 17:53:28', NULL),
(44, '巾钳管道钳分离钳(普外)', '巾钳管道钳分离钳(普外)', '/uploads/Tuchklemmen(普外)/Tuchklemmen(普外).jpg', 'Germany', 'pw', '2016-07-13 21:01:29', '2016-08-22 17:52:20', NULL),
(45, '泌尿外科器械系列', '泌尿外科器械系列', '/uploads/Urologie/Urologie.jpg', 'Germany', 'pw', '2016-07-13 21:01:42', '2016-08-22 17:52:37', NULL),
(46, '备皮器械系列(普外)', '备皮器械系列(普外)', '/uploads/Vorbereitung Dermatologie(普外)/Vorbereitung Dermatologie(普外).jpg', 'Germany', 'pw', '2016-07-13 21:02:05', '2016-08-22 17:49:09', NULL),
(47, '牵开器系列(普外)', '牵开器系列(普外)', '/uploads/Wundhaken(普外)/Wundhaken(普外).jpg', 'Germany', 'pw', '2016-07-13 21:02:27', '2016-08-22 17:52:53', NULL),
(48, '自动牵开器系列(普外)', '自动牵开器系列(普外)', '/uploads/Wundspreizer(普外)/Wundspreizer(普外).jpg', 'Germany', 'pw', '2016-07-13 21:02:47', '2016-08-22 17:54:20', NULL),
(49, '常规器械系列', '常规器械系列', '/uploads/AllgemeineHNO(耳鼻喉)/AllgemeineHNO(耳鼻喉).jpg', 'Germany', 'ebh', '2016-07-13 21:13:31', '2016-08-22 16:51:53', NULL),
(50, '止血钳分离钳系列(耳鼻喉)', '止血钳分离钳系列(耳鼻喉)', '/uploads/Arterienklemmen(耳鼻喉)/Arterienklemmen(耳鼻喉).jpg', 'Germany', 'ebh', '2016-07-13 21:13:46', '2016-08-22 17:46:07', NULL),
(51, '探查器械系列', '探查器械系列', '/uploads/Diagnostik(耳鼻喉)/Diagnostik(耳鼻喉).jpg', 'Germany', 'ebh', '2016-07-13 21:14:02', '2016-08-22 16:57:39', NULL),
(52, '颌面外科器械系列', '颌面外科器械系列', '/uploads/KranoMaxillofazialChirugie/KranoMaxillofazialChirugie.jpg', 'Germany', 'ebh', '2016-07-13 21:14:16', '2016-08-22 16:55:08', NULL),
(53, '喉外科器械系列', '喉外科器械系列', '/uploads/LaryngBronchoOesophagoskopie/LaryngBronchoOesophagoskopie.jpg', 'Germany', 'ebh', '2016-07-13 21:14:31', '2016-08-22 16:55:22', NULL),
(54, '显微喉外科器械系列', '显微喉外科器械系列', '/uploads/Laryngologie/Laryngologie.jpg', 'Germany', 'ebh', '2016-07-13 21:14:45', '2016-08-22 16:57:54', NULL),
(55, '口腔咽喉扁桃体器械系列', '口腔咽喉扁桃体器械系列', '/uploads/MundZungeTonsillektomie/MundZungeTonsillektomie.jpg', 'Germany', 'ebh', '2016-07-13 21:14:57', '2016-08-22 16:56:42', NULL),
(56, '缝合器械系列(耳鼻喉)', '缝合器械系列(耳鼻喉)', '/uploads/Naht(耳鼻喉)/Naht(耳鼻喉).jpg', 'Germany', 'ebh', '2016-07-13 21:15:11', '2016-08-22 17:46:27', NULL),
(57, '耳科器械系列', '耳科器械系列', '/uploads/Otologie/Otologie.jpg', 'Germany', 'ebh', '2016-07-13 21:15:30', '2016-08-22 16:54:12', NULL),
(58, '鼻科器械系列', '鼻科器械系列', '/uploads/Rhinologie/Rhinologie.jpg', 'Germany', 'ebh', '2016-07-13 21:15:44', '2016-08-22 16:58:31', NULL),
(59, '剪器械系列', '剪器械系列', '/uploads/Scheren(耳鼻喉)/Scheren(耳鼻喉).jpg', 'Germany', 'ebh', '2016-07-13 21:15:58', '2016-08-22 16:56:08', NULL),
(60, '气管切开及甲状腺肿器械系列', '气管切开及甲状腺肿器械系列', '/uploads/Tracheotomie/Tracheotomie.jpg', 'Germany', 'ebh', '2016-07-13 21:16:12', '2016-08-22 16:57:03', NULL),
(61, '巾钳管道钳及分离钳系列', '巾钳管道钳及分离钳系列', '/uploads/Tuchklemmen(耳鼻喉)/Tuchklemmen(耳鼻喉).jpg', 'Germany', 'ebh', '2016-07-13 21:16:25', '2016-08-22 16:56:22', NULL),
(62, '牵开器系列(耳鼻喉)', '牵开器系列(耳鼻喉)', '/uploads/Wundhaken(耳鼻喉)/Wundhaken(耳鼻喉).jpg', 'Germany', 'ebh', '2016-07-13 21:16:37', '2016-08-22 16:59:05', NULL),
(63, '骨外科系列', '骨外科系列', '/uploads/Knochenchirurgie/Knochenchirurgie.jpg', 'Germany', 'gkxw', '2016-07-13 21:24:38', '2016-08-22 17:47:37', NULL),
(64, '显微外科系列', '显微外科系列', '/uploads/Mikrochirurgie/Mikrochirurgie.jpg', 'Germany', 'gkxw', '2016-07-13 21:24:51', '2016-08-22 17:48:10', NULL),
(65, '显微血管外科系列', '显微血管外科系列', '/uploads/MikroGefaesschirurgie/MikroGefaesschirurgie.jpg', 'Germany', 'gkxw', '2016-07-13 21:25:05', '2016-08-22 17:48:26', NULL),
(66, '神经外科系列', '神经外科系列', '/uploads/Neurochirurgie/Neurochirurgie.jpg', 'Germany', 'gkxw', '2016-07-13 21:25:19', '2016-08-22 17:47:53', NULL),
(67, '创伤外科系列', '创伤外科系列', '/uploads/Traumatologie/Traumatologie.jpg', 'Germany', 'gkxw', '2016-07-13 21:25:32', '2016-08-22 17:47:21', NULL),
(68, '备皮器械系列(骨科)', '备皮器械系列(骨科)', '/uploads/Vorbereitung Dermatologie(骨科)/Vorbereitung Dermatologie(骨科).jpg', 'Germany', 'gkxw', '2016-07-13 21:25:50', '2016-08-22 17:47:04', NULL),
(72, '镜前式flak-jacket框Micro250手术放大镜', '镜前式flak-jacket框Micro250手术放大镜', '/uploads/镜前式flak-jacket框Micro250手术放大镜/镜前式flak-jacket框Micro250手术放大镜.', 'USA', 'ssfdj', '2016-07-13 21:44:11', '2016-08-25 18:45:10', NULL),
(73, '镶嵌式flak-jacket框Micro250手术放大镜', '镶嵌式flak-jacket框Micro250手术放大镜', '/uploads/镶嵌式flak-jacket框Micro250手术放大镜/镶嵌式flak-jacket框Micro250手术放大镜.jpg', 'USA', 'ssfdj', '2016-07-13 21:44:25', '2016-08-25 18:45:43', NULL),
(80, '节育配套器械系列', '节育配套器械系列', '/uploads/节育配套器械系列/节育配套器械系列.jpg', 'Germany', 'pw', '2016-08-22 18:08:43', '2016-08-22 18:08:43', NULL),
(81, '测量用器械系列', '测量用器械系列', '/uploads/测量用器械系列/测量用器械系列.jpg', 'Germany', 'jc', '2016-08-22 18:09:09', '2016-08-22 18:09:09', NULL),
(82, '高强度Mini头灯', '高强度Mini头灯', '/uploads/高强度Mini头灯/高强度Mini头灯.jpg', 'USA', 'sstd', '2016-08-22 18:34:56', '2016-08-22 19:16:34', NULL),
(83, 'Micro头灯', 'Micro头灯', '/uploads/Micro头灯/Micro头灯.jpg', 'USA', 'sstd', '2016-08-22 18:38:12', '2016-08-22 19:16:23', NULL),
(84, 'ERGO-XLS300头灯', 'ERGO-XLS300头灯', '/uploads/ERGO-XLS300头灯/ERGO-XLS300头灯.jpg', 'USA', 'sstd', '2016-08-22 18:43:16', '2016-08-22 19:16:08', NULL),
(85, '带头灯手术放大镜套装', '带头灯手术放大镜套装', '/uploads/带头灯手术放大镜套装/带头灯手术放大镜套装.jpg', 'USA', 'sstd', '2016-08-22 18:43:32', '2016-08-22 19:15:37', NULL),
(86, '可滤过破坏性激光波段的镜前式手术放大镜', '可滤过破坏性激光波段的镜前式手术放大镜', '/uploads/可滤过破坏性激光波段的镜前式手术放大镜/可滤过破坏性激光波段的镜前式手术放大镜.jpg', 'USA', 'yjdbh', '2016-08-22 19:40:34', '2016-08-25 18:45:55', NULL),
(87, '过滤X射线手术放大镜ERO框', '过滤X射线手术放大镜ERO框', '/uploads/过滤X射线手术放大镜ERO框/过滤X射线手术放大镜ERO框.jpg', 'USA', 'yjdbh', '2016-08-22 19:40:52', '2016-08-22 19:40:52', NULL),
(88, '与手术放大镜及头灯共轴的外科摄像系统', '与手术放大镜及头灯共轴的外科摄像系统', '/uploads/与手术放大镜及头灯共轴的外科摄像系统/与手术放大镜及头灯共轴的外科摄像系统.jpg', 'USA', 'sssxxt', '2016-08-22 20:05:01', '2016-08-25 18:46:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'O',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `phone`, `email`, `message`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 'wei fang', '2016213504', 'wei@ralphandco.com', '作者：曦月<br />\r\n链接：https://www.zhihu.com/question/38107759/answer/97103076<br />\r\n来源：知乎<br />\r\n著作权归作者所有，转载请联系作者获得授权。<br />\r\n<br />\r\n目录<br />\r\n一.挑战性带来成就感<br />\r\n二.在开放世界探索<br />\r\n一二段小结<br />\r\n三.契约和入侵<br />\r\n补充：角色扮演与仪式感<br />\r\n四.故事的拼图，世界观的拼图<br />\r\n五.黑暗中的火，人性之火（注意，本段剧透）<br />\r\n全文完<br />\r\n<br />\r\n<br />\r\n一.挑战性带来成就感<br />\r\n有人说黑暗之魂很难，很虐。 是的，黑暗之魂很难，很虐。 可难和虐，并不能创造出一个让玩家着迷的游戏，并不能让玩家反复的去受苦去挑战，我们愿意受苦，是因为我们觉得受苦有意义，而这个意义不在于受苦本身，而在于受苦后，挑战成功带来的成就感。黑暗之魂的难，是恰到好处的难。 在视线的死角被阴了？那下一次，我就能注意到吧。 敌人的攻势太猛了招架不住？多观察几次，它的出招破绽在哪里，附近有没有悬崖，我可不可以换一种武器和魔法来试试看，我可不可以把它们引出来逐个击破。 不是刻意的刁难玩家，而是设置合理的难度，并引导玩家，让玩家用自己的努力，去完成艰难的挑战，获取成就感，这才是黑暗之魂高难度的本质。在黑暗之魂中，没有战胜不了的敌人，只有不够努力的玩家。用经验，用智慧，用技巧面对接踵而来的困难，赢得挑战，这既是黑暗之魂的乐趣。亦是我们，自我实现与自我超越的乐趣。<br />\r\n<br />\r\n<br />\r\n二.在开放世界探索<br />\r\n开放世界这里指，玩家一开始就能够去这个世界的各个场景，每个场景都能够自由的探索与挑战。黑暗之魂创造了一个有探索价值的开放世界，何为有探索价值呢？ 我在这个世界探索，是有收获的。一个开放世界游戏，地图可以很大，可我必须跟着流程走才会慢慢开放，或者我只能观光，费尽心思爬到山顶，跋山涉水进了洞穴，结果一些不痛不痒的彩蛋，无关紧要的装备道具就把我打发了。无价值的行为，是劳作，有价值的行为，带来意义与可能性。 在黑暗之魂的世界里，我永远不知道下一个角落会有什么，独一无二的武器和魔法？触发剧情的稀有道具?一个老朋友和一段支线剧情？一个让人绝望的陷阱？探索是有回报的，正是这种回报，给我们期待和惊喜。我们可能迈过一道又一道难关，来到某处，期待着宝物，却迎来强敌，而往往人迹罕至之处的强敌，携带着稀有的道具或装备，瞧，就算探索中遇到了强敌，依然会有惊喜感，我期待着它掉落的道具或是它身后的宝物', '2016-08-23 19:06:14', '2016-08-23 19:06:14', NULL, 'C'),
(2, 'wei fang', '2016213504', 'wei@ralphandco.com', '作者：曦月<br />\r\n链接：https://www.zhihu.com/question/38107759/answer/97103076<br />\r\n来源：知乎<br />\r\n著作权归作者所有，转载请联系作者获得授权。<br />\r\n<br />\r\n目录<br />\r\n一.挑战性带来成就感<br />\r\n二.在开放世界探索<br />\r\n一二段小结<br />\r\n三.契约和入侵<br />\r\n补充：角色扮演与仪式感<br />\r\n四.故事的拼图，世界观的拼图<br />\r\n五.黑暗中的火，人性之火（注意，本段剧透）<br />\r\n全文完<br />\r\n<br />\r\n<br />\r\n一.挑战性带来成就感<br />\r\n有人说黑暗之魂很难，很虐。 是的，黑暗之魂很难，很虐。 可难和虐，并不能创造出一个让玩家着迷的游戏，并不能让玩家反复的去受苦去挑战，我们愿意受苦，是因为我们觉得受苦有意义，而这个意义不在于受苦本身，而在于受苦后，挑战成功带来的成就感。黑暗之魂的难，是恰到好处的难。 在视线的死角被阴了？那下一次，我就能注意到吧。 敌人的攻势太猛了招架不住？多观察几次，它的出招破绽在哪里，附近有没有悬崖，我可不可以换一种武器和魔法来试试看，我可不可以把它们引出来逐个击破。 不是刻意的刁难玩家，而是设置合理的难度，并引导玩家，让玩家用自己的努力，去完成艰难的挑战，获取成就感，这才是黑暗之魂高难度的本质。在黑暗之魂中，没有战胜不了的敌人，只有不够努力的玩家。用经验，用智慧，用技巧面对接踵而来的困难，赢得挑战，这既是黑暗之魂的乐趣。亦是我们，自我实现与自我超越的乐趣。<br />\r\n<br />\r\n<br />\r\n二.在开放世界探索<br />\r\n开放世界这里指，玩家一开始就能够去这个世界的各个场景，每个场景都能够自由的探索与挑战。黑暗之魂创造了一个有探索价值的开放世界，何为有探索价值呢？ 我在这个世界探索，是有收获的。一个开放世界游戏，地图可以很大，可我必须跟着流程走才会慢慢开放，或者我只能观光，费尽心思爬到山顶，跋山涉水进了洞穴，结果一些不痛不痒的彩蛋，无关紧要的装备道具就把我打发了。无价值的行为，是劳作，有价值的行为，带来意义与可能性。 在黑暗之魂的世界里，我永远不知道下一个角落会有什么，独一无二的武器和魔法？触发剧情的稀有道具?一个老朋友和一段支线剧情？一个让人绝望的陷阱？探索是有回报的，正是这种回报，给我们期待和惊喜。我们可能迈过一道又一道难关，来到某处，期待着宝物，却迎来强敌，而往往人迹罕至之处的强敌，携带着稀有的道具或装备，瞧，就算探索中遇到了强敌，依然会有惊喜感，我期待着它掉落的道具或是它身后的宝物', '2016-08-23 18:50:20', '2016-08-23 18:50:20', NULL, 'C'),
(3, '孙海宾', '13676999326', '963666988@qq.com', '请尽快与我联系需要，谢谢。', '2016-11-15 05:41:08', '2016-11-15 05:41:08', NULL, 'O'),
(4, 'Ed Miller', '8775551111', 'data4ceos04182017@gmail.com', 'We are offering our 13 Million U.S. BUSINESS Database for only $299 - limited time only.<br />\nThis is our 2017 Edition and is available for 72 hours!<br />\n<br />\nBuy this database and download it instantly here: http://bit.do/dnYmW<br />\n<br />\nThis list includes <br />\n<br />\n> Business Name<br />\n> Contact<br />\n> Address<br />\n> Phone<br />\n> Fax<br />\n> E-mail<br />\n> Address<br />\n> SIC<br />\n<br />\nPurchase This Database and Download Your File Instantly here: <br />\nhttp://bit.do/dnYmW<br />\n<br />\nVisit our website for a FREE sample: http://bit.do/dnYmW<br />\n<br />\nCheers,<br />\n<br />\n--<br />\nEdward Miller | Database Specialist<br />\nMass Marketing, Inc.<br />\nDirect Toll : 1 (888) 406-8880 Ext 303<br />\nSkype: massmarketing1<br />\nhttp://bit.do/dnYmW<br />\n<br />\n<br />\n<br />\nTo Stop future offers - go here:<br />\nhttp://www.optout.ga/index.html#url=http://www.sunnytechs.com', '2017-04-19 12:42:47', '2017-04-19 12:42:47', NULL, 'O'),
(5, 'Ed Miller', '8775551111', 'data4ceos07052017@gmail.com', 'We are offering our 13 Million U.S. BUSINESS Database for only $299 - limited time only.<br />\nThis is our 2017 Edition and is available for 72 hours!<br />\n<br />\nBuy this database and download it instantly here: http://bit.do/dnYmW<br />\n<br />\nThis list includes <br />\n<br />\n> Business Name<br />\n> Contact<br />\n> Address<br />\n> Phone<br />\n> Fax<br />\n> E-mail<br />\n> Address<br />\n> SIC<br />\n<br />\nPurchase This Database and Download Your File Instantly here: <br />\nhttp://bit.do/dnYmW<br />\n<br />\nVisit our website for a FREE sample: http://bit.do/dnYmW<br />\n<br />\nCheers,<br />\n<br />\n--<br />\nEdward Miller | Database Specialist<br />\nMass Marketing, Inc.<br />\nDirect Toll : 1 (888) 406-8880 Ext 303<br />\nSkype: massmarketing1<br />\nhttp://bit.do/dnYmW<br />\n<br />\n<br />\n<br />\nTo Stop future offers - go here:<br />\nhttp://www.optout.ga/index.html#url=http://www.sunnytechs.com', '2017-07-06 17:47:00', '2017-07-06 17:47:00', NULL, 'O'),
(6, 'Ed Miller', '8775551111', 'data4ceos07102017@gmail.com', 'We are offering our 13 Million U.S. BUSINESS Database for only $299 - limited time only.<br />\nThis is our 2017 Edition and is available for 72 hours!<br />\n<br />\nBuy this database and download it instantly here: http://bit.do/dnYmW<br />\n<br />\nThis list includes <br />\n<br />\n> Business Name<br />\n> Contact<br />\n> Address<br />\n> Phone<br />\n> Fax<br />\n> E-mail<br />\n> Address<br />\n> SIC<br />\n<br />\nPurchase This Database and Download Your File Instantly here: <br />\nhttp://bit.do/dnYmW<br />\n<br />\nVisit our website for a FREE sample: http://bit.do/dnYmW<br />\n<br />\nCheers,<br />\n<br />\n--<br />\nEdward Miller | Database Specialist<br />\nMass Marketing, Inc.<br />\nDirect Toll : 1 (888) 406-8880 Ext 303<br />\nSkype: massmarketing1<br />\nhttp://bit.do/dnYmW<br />\n<br />\n<br />\n<br />\nTo Stop future offers - go here:<br />\nhttp://www.optout.ga/index.html#url=http://www.sunnytechs.com', '2017-07-11 16:21:11', '2017-07-11 16:21:11', NULL, 'O'),
(7, '梁钰梅', '13729850154', '1142006033@qq.com', '您好，我于6月10在广工招聘会上面试贵公司胡产品专员（实习生）这个岗位。面试官小姐建议伙考完试打电话联系您。现已考完试，想咨询一下我面试是否通过？如果通过可否回复电话或者邮箱？', '2017-07-16 15:49:34', '2017-07-16 15:49:34', NULL, 'O'),
(8, '梁钰梅', '13729850154', '1142006033@qq.com', '您好，我于6月10在广工招聘会上面试贵公司胡产品专员（实习生）这个岗位。面试官小姐建议伙考完试打电话联系您。现已考完试，想咨询一下我面试是否通过？如果通过可否回复电话或者邮箱？', '2017-07-16 15:49:36', '2017-07-16 15:49:36', NULL, 'O');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 'admin@test.com', '5b05765b8830a239a6d26d51f0599be5cabc60db39445a6d9d82ed7c9e30e22f', '2016-08-24 20:34:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'wei', 'admin@test.com', '$2y$10$RfPSmWZZDXULOMO/kAlzcu5OCDzfzQl3C0.Xoe0jxFYsXe31ODYWS', 'V', 'xK0kFciBYLYPNXL7TVYB993APA9AqzQcLpR1wecjCTtCGAIKMdmSztKpKocx', '2016-06-08 23:24:26', '2016-12-03 23:22:45', NULL),
(2, 'user', 'test@test.com', '$2y$10$LcvpOt0ccRMFz8EwdffLxOCP6cyZew37DoxMFlpzAqadr6j9aCh96', 'A', 'APkR1lkx2PaDC2Qzau0fJJbsJumALOSz3y2LRLUcMczuZ2Onsi88YOUWcsm3', '2016-06-09 00:06:27', '2016-08-25 15:36:03', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
