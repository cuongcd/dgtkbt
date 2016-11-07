-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2016 at 11:29 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vtv`
--

-- --------------------------------------------------------

--
-- Table structure for table `bac`
--

CREATE TABLE `bac` (
  `_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bac`
--

INSERT INTO `bac` (`_id`, `name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'B?c 1', 'B?c 1 làm ?? m?i vi?c c?a b?c 1', 1, '2016-04-29 09:01:59', '2016-04-29 02:01:59', '2016-04-29 02:01:59'),
(3, 'Bậc 1', 'Bậc 1 làm việc của bậc 1', 1, '2016-04-29 02:02:12', '2016-04-29 02:02:12', NULL),
(4, 'Bậc 2', 'Bậc 2', 1, '2016-05-05 19:44:25', '2016-05-05 19:44:25', NULL),
(5, 'Bậc 3', 'Bậc 3', 1, '2016-05-05 19:44:33', '2016-05-05 19:44:33', NULL),
(6, 'Bậc 4', 'Bậc 4', 1, '2016-05-05 19:44:42', '2016-05-05 19:44:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chatluong`
--

CREATE TABLE `chatluong` (
  `_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `chucdanh_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `diemtru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chatluong`
--

INSERT INTO `chatluong` (`_id`, `name`, `level_id`, `room_id`, `chucdanh_id`, `created_at`, `updated_at`, `deleted_at`, `diemtru`) VALUES
(1, 'Công việc không đạt yêu cầu', 5, 2, 7, '2016-05-14 09:20:39', '2016-05-07 21:49:02', NULL, 5),
(2, 'Chất lượng nhân viên ', 5, 2, 9, '2016-05-14 19:46:38', '2016-05-14 19:46:38', NULL, 2),
(3, 'Sai sót khi ký văn ban ban hành dẫn đến phải  thu hồi (Văn bản cấp VTV NEWS: trừ 2 - 3 điểm)', 5, 3, 11, '2016-05-16 02:37:25', '2016-05-16 02:37:25', NULL, 2),
(4, 'Sai sót khi ký văn ban ban hành dẫn đến phải  thu hồi (Văn bản Đài: trừ 5 - 7 điểm)', 5, 3, 11, '2016-05-16 02:37:54', '2016-05-16 02:37:54', NULL, 5),
(5, 'Sai sót trong duyệt nội  dung từng tin, bài, ảnh (Lỗi trung bình trừ 3 - 5 điểm)', 5, 3, 11, '2016-05-16 02:38:53', '2016-05-16 02:38:53', NULL, 3),
(6, 'Sai sót trong duyệt nội  dung từng tin, bài, ảnh (Lỗi nặng trừ 8 - 10 điểm)', 5, 3, 11, '2016-05-16 02:39:33', '2016-05-16 02:39:33', NULL, 8),
(7, 'Sai sót trong duyệt nội  dung từng tin, bài, ảnh (Lỗi nghiêm trọng trừ 15 - 20 điểm )', 5, 3, 11, '2016-05-16 02:40:08', '2016-05-16 02:40:08', NULL, 15),
(8, 'Sai sót trong chỉ đạo điều hành, thực hiện nhiệm vụ bị Tổng giám đốc nhắc nhở, phê bình (Lỗi trung bình trừ 3 - 5 điểm/tin, bài)', 5, 3, 11, '2016-05-16 02:42:38', '2016-05-16 02:42:38', NULL, 3),
(9, 'Sai sót trong chỉ đạo điều hành, thực hiện nhiệm vụ bị Tổng giám đốc nhắc nhở, phê bình (Lỗi nặng trừ 8 - 10 điểm/tin, bài)', 5, 3, 11, '2016-05-16 02:43:03', '2016-05-16 02:43:03', NULL, 8),
(10, 'Sai sót trong chỉ đạo điều hành, thực hiện nhiệm vụ bị Tổng giám đốc nhắc nhở, phê bình (Lỗi nghiêm trọng trừ 15 - 20 điểm/tin, bài)', 5, 3, 11, '2016-05-16 02:44:05', '2016-05-16 02:44:05', NULL, 15),
(11, 'Không đảm bảo chất lượng kế hoạ ch tin bài theo tuần tháng cho báo điện tử VTVNews (Có kế hoạch tin bài chung nhưng thiếu các sự kiện nhỏ: trừ 1  điểm)', 5, 5, 17, '2016-05-16 19:02:25', '2016-05-16 19:02:25', NULL, 1),
(12, 'Không đảm bảo chất lượng kế hoạ ch tin bài theo tuần tháng cho báo điện tử VTVNews (Có kế hoạch tin bài chung nhưng thiếu các sự kiện nhỏ: trừ 1  điểm)', 5, 6, 21, '2016-05-16 19:02:40', '2016-05-16 19:02:40', NULL, 1),
(13, 'Không đảm bảo chất lượng kế hoạch tin bài theo tuần tháng cho báo điện tử VTVNews (Có kế hoạch tin bài chung nhưng thiếu những mảng chương trình, sự kiện lớn, ảnh hưởng tới định hướng tuyên truyền của cả Ban, Đài: trừ 2 điểm)', 5, 5, 17, '2016-05-16 19:04:28', '2016-05-16 19:04:28', NULL, 2),
(14, 'Không đảm bảo chất lượng kế hoạch tin bài theo tuần tháng cho báo điện tử VTVNews (Có kế hoạch tin bài chung nhưng thiếu những mảng chương trình, sự kiện lớn, ảnh hưởng tới định hướng tuyên truyền của cả Ban, Đài: trừ 2 điểm)', 5, 6, 21, '2016-05-16 19:05:29', '2016-05-16 19:05:29', NULL, 2),
(15, 'Phân công công việc bất hợp lý Mức độ trung bình: trừ 1 điểm/lần', 5, 5, 17, '2016-05-16 19:06:26', '2016-05-16 19:06:26', NULL, 1),
(16, 'Phân công công việc bất hợp lý  Mức độ trung bình: trừ 1 điểm/lần', 5, 6, 21, '2016-05-16 19:06:54', '2016-05-16 19:06:54', NULL, 1),
(17, 'Phân công công việc bất hợp lý  Mức độ nghiêm trọng trừ: 2điểm/lần', 5, 6, 21, '2016-05-16 19:08:35', '2016-05-16 19:08:35', NULL, 2),
(18, 'Phân công công việc bất hợp lý  Mức độ nghiêm trọng trừ: 2điểm/lần', 5, 5, 17, '2016-05-16 19:08:45', '2016-05-16 19:08:45', NULL, 2),
(19, 'Rà soát kế hoạch của các cá nhân, xây dựng kế hoạch tổng thể theo tuần, tháng cho báo điện tử (Có  rà soát  nhưng  thiếu  những  nhận  xét  cụthể, ảnh hưởng tới kế hoạch chung: trừ 1 điêm/lần)', 5, 5, 17, '2016-05-17 07:46:10', '2016-05-17 07:46:10', NULL, 1),
(20, 'Rà soát kế hoạch của các cá nhân, xây dựng kế hoạch tổng thể theo tuần, tháng cho báo điện tử (Có  rà soát  nhưng  thiếu  những  nhận  xét  cụthể, ảnh hưởng tới kế hoạch chung: trừ 1 điêm/lần)', 5, 6, 21, '2016-05-17 07:46:22', '2016-05-17 07:46:22', NULL, 1),
(21, 'Rà soát kế hoạch của các cá nhân, xây dựng kế hoạch tổng thể theo tuần, tháng cho báo điện tử (Không rà soát kế hoạch của cá nhân trong đơn vị, thiếu các m̫ảng tuyên truyền quan trọng, ảnh hưởng tới kế hoạch tuyên truyền của toàn đơn vị: trừ 2 điểm/lần)', 5, 5, 17, '2016-05-17 07:47:37', '2016-05-17 07:47:37', NULL, 2),
(22, 'Rà soát kế hoạch của các cá nhân, xây dựng kế hoạch tổng thể theo tuần, tháng cho báo điện tử (Không rà soát kế hoạch của cá nhân trong đơn vị, thiếu các m̫ảng tuyên truyền quan trọng, ảnh hưởng tới kế hoạch tuyên truyền của toàn đơn vị: trừ 2 điểm/lần)', 5, 6, 21, '2016-05-17 07:47:49', '2016-05-17 07:47:49', NULL, 2),
(23, 'Chủ trì họp phòng : Không đảm bảo lịch họp phòng nhưng không gây ảnh hưởng tới kế hoạch sản xuất của đơn vị: 0.5 điểm ', 5, 5, 17, '2016-05-17 07:49:22', '2016-05-17 07:49:22', NULL, 1),
(24, 'Chủ trì họp phòng : Không đảm bảo lịch họp phòng nhưng không gây ảnh hưởng tới kế hoạch sản xuất của đơn vị: 0.5 điểm ', 5, 6, 21, '2016-05-17 07:49:35', '2016-05-17 07:49:35', NULL, 1),
(25, 'Chủ trì họp phòng :Không đảm bảo lịch họp phòng thiếu lý do nhưng để gây ảnh hưởng tới kế hoạch sản xuất của đơn vị: 1 điểm/lần', 5, 5, 17, '2016-05-17 07:50:45', '2016-05-17 07:50:45', NULL, 1),
(26, 'Chủ trì họp phòng :Không đảm bảo lịch họp phòng thiếu lý do nhưng để gây ảnh hưởng tới kế hoạch sản xuất của đơn vị: 1 điểm/lần', 5, 6, 21, '2016-05-17 07:50:58', '2016-05-17 07:50:58', NULL, 1),
(27, 'Chủ trì họp chuyên môn theo định kỳ : không đảm  bảo  lịch  họp  chuyên  môn  nhưng  không gây ảnh hưởng tới công tác chuyên môn của đơn vị  Trừ 1 Điểm', 5, 5, 17, '2016-05-17 07:52:34', '2016-05-17 07:52:34', NULL, 1),
(28, 'Chủ trì họp chuyên môn theo định kỳ : không đảm  bảo  lịch  họp  chuyên  môn  nhưng  không gây ảnh hưởng tới công tác chuyên môn của đơn vị  Trừ 1 Điểm', 5, 6, 21, '2016-05-17 07:52:47', '2016-05-17 07:52:47', NULL, 1),
(29, 'Chủ trì họp chuyên môn theo định kỳ : Không đảm bảo lịch họp chuyên môn, thiếu lý do gây ảnh hưởng tới công tác chuyên môn của đơn vị: trừ 2 điểm', 5, 5, 17, '2016-05-17 07:53:52', '2016-05-17 07:53:52', NULL, 2),
(30, 'Chủ trì họp chuyên môn theo định kỳ : Không đảm bảo lịch họp chuyên môn, thiếu lý do gây ảnh hưởng tới công tác chuyên môn của đơn vị: trừ 2 điểm', 5, 6, 21, '2016-05-17 07:54:06', '2016-05-17 07:54:06', NULL, 2),
(31, 'Không đảm bảo lịch trực thư ký tòa soạn : Không đảm bảo số lượng ngày trực đã được phân công : 1 điểm/ngày ', 5, 5, 17, '2016-05-17 07:55:16', '2016-05-17 07:55:16', NULL, 1),
(32, 'Không đảm bảo lịch trực thư ký tòa soạn : Không đảm bảo số lượng ngày trực đã được phân công : 1 điểm/ngày ', 5, 6, 21, '2016-05-17 07:55:31', '2016-05-17 07:55:31', NULL, 1),
(33, 'Không đảm bảo lịch trực thư ký tòa soạn : Đ̫ảm bảo số lượng nhưng để lỗi thông tin, lỗi văn bản, lỗi chính tả, đẩy bài không kịp thời nhưng ở mức độ nhẹ (trừ điểm theo Tiêu chí trừ điểm của phòng Nội dung 2) ', 5, 5, 17, '2016-05-17 07:57:07', '2016-05-17 07:57:07', NULL, 1),
(34, 'Không đảm lịch trực thư ký tòa soạn : bảo đảm bảo số lượng nhưng để lỗi thông tin, lỗi văn bản, lỗi chính tả, đẩy bài không kịp thời nhưng ở mức độ nhẹ (trừ điểm theo Tiêu chí trừ điểm của phòng Nội dung 2) ', 5, 6, 21, '2016-05-17 07:58:12', '2016-05-17 07:58:12', NULL, 1),
(35, 'Không đảm bảo lịch trực thư ký tòa soạn : Đảm bẩo số lượng nhưng để lỗi thông tin, lỗi văn bản, lỗi chính t̫ở mức nặng, ảnh hưởng tới uy tín của báo (trừ điểm theo Tiêu chí trừ điểm của phòng Nội dung 2)', 5, 5, 17, '2016-05-17 07:59:45', '2016-05-17 07:59:45', NULL, 2),
(36, 'Không đảm bảo lịch trực thư ký tòa soạn : Đảm bẩo số lượng nhưng để lỗi thông tin, lỗi văn bản, lỗi chính t̫ở mức nặng, ảnh hưởng tới uy tín của báo (trừ điểm theo Tiêu chí trừ điểm của phòng Nội dung 2)', 5, 6, 21, '2016-05-17 07:59:57', '2016-05-17 07:59:57', NULL, 2),
(37, 'Ghi chép nhật ký thư ký tòa soạn theo ngày trực : Có ghi chép nhưng chưa đạt chất lượng, còn sơ sài: trừ 0.5 điểm/lần', 5, 5, 17, '2016-05-17 08:01:13', '2016-05-17 08:01:13', NULL, 1),
(38, 'Ghi chép nhật ký thư ký tòa soạn theo ngày trực : Có ghi chép nhưng chưa đạt chất lượng, còn sơ sài: trừ 0.5 điểm/lần', 5, 6, 21, '2016-05-17 08:01:26', '2016-05-17 08:01:26', NULL, 1),
(39, 'Ghi chép nhật ký thư ký tòa soạn theo ngày trực : Không ghi chép: trừ 1 điêm/lần', 5, 5, 17, '2016-05-17 08:02:07', '2016-05-17 08:02:07', NULL, 1),
(40, 'Ghi chép nhật ký thư ký tòa soạn theo ngày trực : Không ghi chép: trừ 1 điêm/lần', 5, 6, 21, '2016-05-17 08:02:21', '2016-05-17 08:02:21', NULL, 1),
(41, 'Tổng hợp nhật ký của thư ký theo tuần, tháng : Có họp nhưng mang tính hình thức, không đưa ra được  các  vấn đề  chuyên  môn  cần  rút  kinh  nghiệm: trừ 1 điểm', 5, 5, 17, '2016-05-17 08:03:40', '2016-05-17 08:03:40', NULL, 1),
(42, 'Tổng hợp nhật ký của thư ký theo tuần, tháng : Có họp nhưng mang tính hình thức, không đưa ra được  các  vấn đề  chuyên  môn  cần  rút  kinh  nghiệm: trừ 1 điểm', 5, 6, 21, '2016-05-17 08:03:55', '2016-05-17 08:03:55', NULL, 1),
(43, 'Tổng hợp nhật ký của thư ký theo tuần, tháng : Không tổchức họp, không có lý do: trừ 2 điểm', 5, 5, 17, '2016-05-17 08:04:35', '2016-05-17 08:04:35', NULL, 2),
(44, 'Tổng hợp nhật ký của thư ký theo tuần, tháng : Không tổchức họp, không có lý do: trừ 2 điểm', 5, 6, 21, '2016-05-17 08:04:49', '2016-05-17 08:04:49', NULL, 2),
(45, 'Rà soát, tổng hợp kế hoạch tin bài phối hợp của các đơn vị trong đơn vị : Có nhận được kế hoa̩ch nhưng không rà soát, tổng hợp kỹ, khiến kế hoa̩ch sản xuất bị chồng chéo: trừ1 - 2 điểm/lần ', 5, 5, 17, '2016-05-17 08:06:11', '2016-05-17 08:06:11', NULL, 1),
(46, 'Rà soát, tổng hợp kế hoạch tin bài phối hợp của các đơn vị trong đơn vị : Có nhận được kế hoa̩ch nhưng không rà soát, tổng hợp kỹ, khiến kế hoa̩ch sản xuất bị chồng chéo: trừ1 - 2 điểm/lần ', 5, 6, 21, '2016-05-17 08:06:24', '2016-05-17 08:06:24', NULL, 1),
(47, 'Rà soát, tổng hợp kế hoạch tin bài phối hợp của các đơn vị trong đơn vị : Không tổng hợp thành kế hoạch tin bài chung của đơn vị: trừ 2 điểm/lần', 5, 5, 17, '2016-05-17 08:07:13', '2016-05-17 08:07:13', NULL, 2),
(48, 'Rà soát, tổng hợp kế hoạch tin bài phối hợp của các đơn vị trong đơn vị : Không tổng hợp thành kế hoạch tin bài chung của đơn vị: trừ 2 điểm/lần', 5, 6, 21, '2016-05-17 08:07:24', '2016-05-17 08:07:24', NULL, 2),
(49, 'Không lên kế hoạch chung, ảnh hưởng tới việc phối hợp với các đơn vị khác trong Ban trong sản xuất tin bài, phóng sự : Thiếu sự chủ động, tích cực khi phối hợp khiến công việc bịchậm trễ nhưng chưa gây hậu quả nghiêm trọng: trừ 1 điểm/lần', 5, 5, 17, '2016-05-17 08:09:37', '2016-05-17 08:09:37', NULL, 1),
(50, 'Không lên kế hoạch chung, ảnh hưởng tới việc phối hợp với các đơn vị khác trong Ban trong sản xuất tin bài, phóng sự : Thiếu sự chủ động, tích cực khi phối hợp khiến công việc bịchậm trễ nhưng chưa gây hậu quả nghiêm trọng: trừ 1 điểm/lần', 5, 6, 21, '2016-05-17 08:09:51', '2016-05-17 08:09:51', NULL, 1),
(51, 'Không lên kế hoạch chung, ảnh hưởng tới việc phối hợp với các đơn vị khác trong Ban trong sản xuất tin bài, phóng sự :  Không phối hợp với các đơn vị khác trong Ban khiến công việc không hoàn thành, gây ảnh hưởng tới kế ho̩ch của toàn Ban: trừ 2điểm/lần', 5, 5, 17, '2016-05-17 08:11:20', '2016-05-17 08:11:20', NULL, 2),
(52, 'Không lên kế hoạch chung, ảnh hưởng tới việc phối hợp với các đơn vị khác trong Ban trong sản xuất tin bài, phóng sự :  Không phối hợp với các đơn vị khác trong Ban khiến công việc không hoàn thành, gây ảnh hưởng tới kế ho̩ch của toàn Ban: trừ 2điểm/lần', 5, 6, 21, '2016-05-17 08:11:31', '2016-05-17 08:11:31', NULL, 2),
(53, 'Tham gia xây dӵng các kế họach truyền thông trên các phương tiện của VTV NEWS :Có tham gia thực hiện nhưng kế ho̩ch không đảm bảo chất lượng, bị lãnh đạo VTV NEWS nhắc nhở: trừ 1 điểm/lần', 5, 5, 17, '2016-05-17 08:13:02', '2016-05-17 08:13:02', NULL, 1),
(54, 'Tham gia xây dӵng các kế họach truyền thông trên các phương tiện của VTV NEWS :Có tham gia thực hiện nhưng kế ho̩ch không đảm bảo chất lượng, bị lãnh đạo VTV NEWS nhắc nhở: trừ 1 điểm/lần', 5, 6, 21, '2016-05-17 08:13:14', '2016-05-17 08:13:14', NULL, 1),
(55, 'Tham gia xây dựng các kế họach truyền thông trên các phương tiện của VTV NEWS : Không tham gia mà không có lý do chính đáng: trừ 2 điểm/lần', 5, 6, 21, '2016-05-17 08:13:58', '2016-05-17 08:13:58', NULL, 2),
(56, 'Tham gia xây dựng các kế họach truyền thông trên các phương tiện của VTV NEWS : Không tham gia mà không có lý do chính đáng: trừ 2 điểm/lần', 5, 6, 21, '2016-05-17 08:14:10', '2016-05-17 08:14:10', NULL, 2),
(57, 'Theo dõi tiến độ của kếhoҥ ch được giao Không sát sao trong theo dõi khiến một số công việc trong kế ho̩ch bị chậm nhưng chưa gây hậu quả nghiêm trọng, không ảnh hưởng tới kết quả chung: trừ 1 điểm/lần', 5, 5, 17, '2016-05-17 08:16:44', '2016-05-17 08:16:44', NULL, 1),
(58, 'Theo dõi tiến độ của kếhoҥ ch được giao Không sát sao trong theo dõi khiến một số công việc trong kế ho̩ch bị chậm nhưng chưa gây hậu quả nghiêm trọng, không ảnh hưởng tới kết quả chung: trừ 1 điểm/lần', 5, 6, 21, '2016-05-17 08:16:55', '2016-05-17 08:16:55', NULL, 1),
(59, 'Theo dõi tiến độ của kế hoạch được giao Không theo dõi kịp thời, để công việc bịchậm, ̫nh hưởng tới tiến độ chung, gây mất uy tín cho đơn vị, bị đối tác phản ánh: trừ 2 điểm/lần', 5, 5, 17, '2016-05-17 08:18:00', '2016-05-17 08:18:00', NULL, 2),
(60, 'Theo dõi tiến độ của kế hoạch được giao Không theo dõi kịp thời, để công việc bịchậm, ảnh hưởng tới tiến độ chung, gây mất uy tín cho đơn vị, bị đối tác phản ánh: trừ 2 điểm/lần', 5, 6, 21, '2016-05-17 08:18:16', '2016-05-17 08:18:16', NULL, 2),
(61, 'Thực hiện tổng kết, đánh giá hiệu quả của các dự án sau khi đã hoàn thành: - Có thực hiện tổng kết, đánh giá nhưng sơ sài không sát với hiệu quả thực tế của dự án, bị lãnh đạo VTV NEWS nhắc nhở: trừ 1 điểm/lần', 5, 5, 17, '2016-05-17 08:22:44', '2016-05-17 08:22:44', NULL, 1),
(62, 'Thực hiện tổng kết, đánh giá hiệu quả của các dự án sau khi đã hoàn thành: - Có thực hiện tổng kết, đánh giá nhưng sơ sài không sát với hiệu quả thực tế của dự án, bị lãnh đạo VTV NEWS nhắc nhở: trừ 1 điểm/lần', 5, 6, 21, '2016-05-17 08:22:54', '2016-05-17 08:22:54', NULL, 1),
(63, 'Thực hiện tổng kết, đánh giá hiệu quả của các dự án sau khi đã hoàn thành: - Không thực hiện tổng kết, đánh giá, bị lãnh đạo VTV NEWS nhắc nhở: trừ 2 điểm/lần', 5, 5, 17, '2016-05-17 08:23:22', '2016-05-17 08:23:22', NULL, 2),
(64, ' Thực hiện tổng kết, đánh giá hiệu quả của các dự án sau khi đã hoàn thành: - Không thực hiện tổng kết, đánh giá, bị lãnh đạo VTV NEWS nhắc nhở: trừ 2 điểm/lần', 5, 6, 21, '2016-05-17 08:23:35', '2016-05-17 08:23:35', NULL, 2),
(65, 'Thực hiện báo cáo đánh giá về các CTV - Có thực hiện đánh giá về các CTV nhưng sơ sài, không đủ để tư vấn cho lãnh đạo Ban về chất lượng CTV, bị lãnh đạo VTV NEWS nhắc nhở: trừ 1-2 điểm/lần', 5, 5, 17, '2016-05-17 08:24:11', '2016-05-17 08:24:11', NULL, 1),
(66, 'Thực hiện báo cáo đánh giá về các CTV - Có thực hiện đánh giá về các CTV nhưng sơ sài, không đủ để tư vấn cho lãnh đạo Ban về chất lượng CTV, bị lãnh đạo VTV NEWS nhắc nhở: trừ 1-2 điểm/lần', 5, 6, 21, '2016-05-17 08:24:26', '2016-05-17 08:24:26', NULL, 2),
(67, 'Thực hiện báo cáo đánh giá về các CTV - Không thực hiện đánh giá về CTV mà không có lý do: trừ 2-4 điểm/lần', 5, 5, 17, '2016-05-17 08:24:56', '2016-05-17 08:24:56', NULL, 2),
(68, 'Thực hiện báo cáo đánh giá về các CTV - Không thực hiện đánh giá về CTV mà không có lý do: trừ 2-4 điểm/lần', 5, 6, 21, '2016-05-17 08:25:08', '2016-05-17 08:25:08', NULL, 2),
(69, 'Rà soát các văn bản quy chế, quy định của phòng - Có tiến hành rà soát nhưng bị chậm hoặc chưa đạt chất lượng, bị lãnh đạo VTV NEWS nhắc nhở: trừ 1 điểm/lần', 5, 5, 17, '2016-05-17 08:25:46', '2016-05-17 08:25:46', NULL, 1),
(70, 'Rà soát các văn bản quy chế, quy định của phòng - Có tiến hành rà soát nhưng bị chậm hoặc chưa đạt chất lượng, bị lãnh đạo VTV NEWS nhắc nhở: trừ 1 điểm/lần', 5, 6, 21, '2016-05-17 08:25:57', '2016-05-17 08:25:57', NULL, 1),
(71, 'Rà soát các văn bản quy chế, quy định của phòng - Không tiến hành rà soát, gửi các văn bản quy chế, quy định chậm hoặc chưa đạt chất lương, ảnh hưởng tới tiến độ của toàn đơn vị, bị lãnh đạo VTV NEWS nhắc nhở: trừ 2  điểm/lần', 5, 6, 21, '2016-05-17 08:26:35', '2016-05-17 08:26:35', NULL, 2),
(72, 'Rà soát các văn bản quy chế, quy định của phòng - Không tiến hành rà soát, gửi các văn bản quy chế, quy định chậm hoặc chưa đạt chất lương, ảnh hưởng tới tiến độ của toàn đơn vị, bị lãnh đạo VTV NEWS nhắc nhở: trừ 2  điểm/lần', 5, 6, 21, '2016-05-17 08:26:46', '2016-05-17 08:26:46', NULL, 2),
(73, 'Xây dựng, ra soát các văn bản hành chính của phòng- Có tiến hành rà soát nhưng bị chậm hoặc chưa đạt chất lượng, bị lãnh đạo VTV NEWS nhắc nhở: trừ 1 điểm/lần', 5, 5, 17, '2016-05-17 08:27:19', '2016-05-17 08:27:19', NULL, 1),
(74, 'Xây dựng, ra soát các văn bản hành chính của phòng- Có tiến hành rà soát nhưng bị chậm hoặc chưa đạt chất lượng, bị lãnh đạo VTV NEWS nhắc nhở: trừ 1 điểm/lần', 5, 6, 21, '2016-05-17 08:27:29', '2016-05-17 08:27:29', NULL, 1),
(75, 'Xây dựng, ra soát các văn bản hành chính của phòng - Không tiến hành rà soát, gửi các văn bản quy chế, quy định chậm hoặc chưa đạt chất lương, ảnh hưởng tới tiến độ của toàn đơn vị, bị lãnh đạo VTV NEWS nhắc nhở: trừ 2 điểm/lần', 5, 5, 17, '2016-05-17 08:27:58', '2016-05-17 08:27:58', NULL, 2),
(76, 'Xây dựng, ra soát các văn bản hành chính của phòng - Không tiến hành rà soát, gửi các văn bản quy chế, quy định chậm hoặc chưa đạt chất lương, ảnh hưởng tới tiến độ của toàn đơn vị, bị lãnh đạo VTV NEWS nhắc nhở: trừ 2 điểm/lần', 5, 6, 21, '2016-05-17 08:28:10', '2016-05-17 08:28:10', NULL, 2),
(77, 'Quản lý nhân sự không hiệu quả - Không phát huy được năng lực sở trường của các thành viên trong phòng: Trừ 5 điểm', 5, 5, 17, '2016-05-17 08:29:19', '2016-05-17 08:29:19', NULL, 5),
(78, 'Quản lý nhân sự không hiệu quả - Không phát huy được năng lực sở trường của các thành viên trong phòng: Trừ 5 điểm', 5, 6, 21, '2016-05-17 08:29:31', '2016-05-17 08:29:31', NULL, 5),
(79, 'Quản lý nhân sự không hiệu quả - Không sắp xếp bố trí công việc phù hợp: Trừ 5 điểm', 5, 5, 17, '2016-05-17 08:30:08', '2016-05-17 08:30:08', NULL, 5),
(80, 'Quản lý nhân sự không hiệu quả - Không sắp xếp bố trí công việc phù hợp: Trừ 5 điểm', 5, 6, 21, '2016-05-17 08:30:19', '2016-05-17 08:30:19', NULL, 5),
(81, 'Quản lý nhân sự không hiệu quả - Chế độ khen thưởng kỷ luật thiếu công bằng khách quan: Trừ 10 điểm', 5, 5, 17, '2016-05-17 08:30:52', '2016-05-17 08:30:52', NULL, 10),
(82, 'Quản lý nhân sự không hiệu quả - Chế độ khen thưởng kỷ luật thiếu công bằng khách quan: Trừ 10 điểm', 5, 6, 21, '2016-05-17 08:31:04', '2016-05-17 08:31:04', NULL, 10),
(83, 'Quản lý nhân sự không hiệu quả -Không chú trọng công tác đào tạo và phát triển năng lực chuyên môn và trình độ lý luận chính trị của thành viên ', 5, 5, 17, '2016-05-17 08:31:42', '2016-05-17 08:31:42', NULL, 10),
(84, 'Quản lý nhân sự không hiệu quả -Không chú trọng công tác đào tạo và phát triển năng lực chuyên môn và trình độ lý luận chính trị của thành viên ', 5, 6, 21, '2016-05-17 08:31:57', '2016-05-17 08:31:57', NULL, 10),
(85, 'Thực hiện các công việc đột xuất khác - Có thực hiện nhưng chất lượng không đảm bảo, bị lãnh đạo VTV NEWS nhắc nhở nhưng không gây hậu quả nghiêm trọng: trừ 1 - 2 điểm/lần', 5, 5, 17, '2016-05-17 08:32:34', '2016-05-17 08:32:34', NULL, 1),
(86, 'Thực hiện các công việc đột xuất khác - Có thực hiện nhưng chất lượng không đảm bảo, bị lãnh đạo VTV NEWS nhắc nhở nhưng không gây hậu quả nghiêm trọng: trừ 1 - 2 điểm/lần', 5, 6, 21, '2016-05-17 08:32:45', '2016-05-17 08:32:45', NULL, 1),
(87, 'Thực hiện các công việc đột xuất khác - Không thực hiện mà không có lý do: trừ 2 - 4 điểm/lần', 5, 5, 17, '2016-05-17 08:33:09', '2016-05-17 08:33:09', NULL, 2),
(88, 'Thực hiện các công việc đột xuất khác - Không thực hiện mà không có lý do: trừ 2 - 4 điểm/lần', 5, 6, 21, '2016-05-17 08:33:20', '2016-05-17 08:33:20', NULL, 2),
(89, 'Chậm hoàn thành các kế hoạch sản xuất tin, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi văn bản.', 5, 5, 17, '2016-05-17 08:34:18', '2016-05-17 08:34:18', NULL, 1),
(90, 'Không thực hiện tốt việc giám sát thực hiện các quy chế, quy trình về chuyên môn nghiệp vụ dẫn đến sai sót: Trừ 1 - 2 điểm', 5, 5, 18, '2016-05-17 18:44:40', '2016-05-17 18:44:40', NULL, 1),
(91, 'Không thực hiện tốt việc giám sát thực hiện các quy chế, quy trình về chuyên môn nghiệp vụ dẫn đến sai sót: Trừ 1 - 2 điểm', 5, 6, 29, '2016-05-17 18:44:52', '2016-05-17 18:44:52', NULL, 1),
(92, 'Giám sát nội dung tin bài : Lỗi trên trang nhưng chưa gây hậu quả nghiêm trọng: Từ 1 điểm/lần', 5, 5, 18, '2016-05-17 18:45:28', '2016-05-17 18:45:28', NULL, 1),
(93, 'Giám sát nội dung tin bài : Lỗi trên trang nhưng chưa gây hậu quả nghiêm trọng: Từ 1 điểm/lần', 5, 6, 29, '2016-05-17 18:45:38', '2016-05-17 18:45:38', NULL, 1),
(94, 'Giám sát nội dung tin bài : Lỗi trên trang được lãnh đạo Ban nhắc nhở: Trừ 2-4 điểm/lần', 5, 6, 29, '2016-05-17 18:46:08', '2016-05-17 18:46:08', NULL, 2),
(95, 'Giám sát nội dung tin bài : Lỗi trên trang được lãnh đạo Ban nhắc nhở: Trừ 2-4 điểm/lần', 5, 5, 18, '2016-05-17 18:46:18', '2016-05-17 18:46:18', NULL, 2),
(96, 'Ghi chép các điểm cần rút kinh nghiệm : Không ghi chép đầy đủ, ghi chép sơ sài: Trừ 1-2 điểm/lần', 5, 5, 18, '2016-05-17 18:46:43', '2016-05-17 18:46:43', NULL, 1),
(97, 'Ghi chép các điểm cần rút kinh nghiệm : Không ghi chép đầy đủ, ghi chép sơ sài: Trừ 1-2 điểm/lần', 5, 6, 29, '2016-05-17 18:47:23', '2016-05-17 18:47:23', NULL, 1),
(98, 'Ghi chép các điểm cần rút kinh nghiệm : Không ghi chép : Trừ 2-3 điểm/lần', 5, 5, 18, '2016-05-17 18:47:47', '2016-05-17 18:47:47', NULL, 2),
(99, 'Ghi chép các điểm cần rút kinh nghiệm : Không ghi chép : Trừ 2-3 điểm/lần', 5, 6, 29, '2016-05-17 18:47:59', '2016-05-17 18:47:59', NULL, 2),
(100, 'Thực hiện công việc chuyên môn theo lịch trực : Không đảm bảo số lượng ngày trực đã được phân công : Trừ 2 điểm/ngày', 5, 5, 18, '2016-05-17 18:48:24', '2016-05-17 18:48:24', NULL, 2),
(101, 'Thực hiện công việc chuyên môn theo lịch trực : Không đảm bảo số lượng ngày trực đã được phân công : Trừ 2 điểm/ngày', 5, 6, 29, '2016-05-17 18:48:34', '2016-05-17 18:48:34', NULL, 2),
(102, 'Thực hiện công việc chuyên môn theo lịch trực:  Đảm bảo số lượng nhưng để lỗi thông tin, lỗi văn bản, lỗi chính tả ở mức nhẹ, đẩy bài không đúng giờ', 5, 5, 18, '2016-05-17 18:50:13', '2016-05-17 18:50:13', NULL, 1),
(103, 'Thực hiện công việc chuyên môn theo lịch trực:  Đảm bảo số lượng nhưng để lỗi thông tin, lỗi văn bản, lỗi chính tả ở mức nhẹ, đẩy bài không đúng giờ', 5, 6, 29, '2016-05-17 18:50:22', '2016-05-17 18:50:22', NULL, 1),
(104, 'Thực hiện công việc chuyên môn theo lịch trực:  Đảm bảo số lượng nhưng để lỗi thông tin, lỗi văn bản, lỗi chính tả ở mức nặng, ảnh hưởng tới uy tín của báo', 5, 5, 18, '2016-05-17 18:50:49', '2016-05-17 18:50:49', NULL, 2),
(105, 'Thực hiện công việc chuyên môn theo lịch trực:  Đảm bảo số lượng nhưng để lỗi thông tin, lỗi văn bản, lỗi chính tả ở mức nặng, ảnh hưởng tới uy tín của báo', 5, 6, 29, '2016-05-17 18:51:00', '2016-05-17 18:51:00', NULL, 2),
(106, 'Đánh giá chất lượng lao động hàng tháng : Đánh giá chưa chính xác: Trừ 1 điểm/lần', 5, 5, 18, '2016-05-17 18:51:22', '2016-05-17 18:51:22', NULL, 1),
(107, 'Đánh giá chất lượng lao động hàng tháng  : Đánh giá chưa chính xác: Trừ 1 điểm/lần', 5, 6, 29, '2016-05-17 18:51:45', '2016-05-17 18:51:45', NULL, 1),
(108, 'Đánh giá chất lượng lao động hàng tháng : Đánh giá không chính xác ảnh hưởng đến tâm lý người lao động: Trừ 2 điểm/lần', 5, 5, 18, '2016-05-17 18:52:08', '2016-05-17 18:52:08', NULL, 2),
(109, 'Đánh giá chất lượng lao động hàng tháng : Đánh giá không chính xác ảnh hưởng đến tâm lý người lao động: Trừ 2 điểm/lần', 5, 6, 29, '2016-05-17 18:52:20', '2016-05-17 18:52:20', NULL, 2),
(110, 'Thực hiện báo cáo phòng theo tuần, tháng : Báo cáo bỏ sót các vấn đề quan trọng bị lãnh đạo Ban nhắc nhở: Trừ 1 điểm/lần', 5, 5, 18, '2016-05-17 18:53:12', '2016-05-17 18:53:12', NULL, 1),
(111, 'Thực hiện báo cáo phòng theo tuần, tháng : Báo cáo bỏ sót các vấn đề quan trọng bị lãnh đạo Ban nhắc nhở: Trừ 1 điểm/lần', 5, 6, 29, '2016-05-17 18:53:22', '2016-05-17 18:53:22', NULL, 1),
(112, 'Thực hiện báo cáo phòng theo tuần, tháng : Không có báo cáo: Trừ 2 điểm/lần', 5, 5, 18, '2016-05-17 18:53:40', '2016-05-17 18:53:40', NULL, 2),
(113, 'Thực hiện báo cáo phòng theo tuần, tháng : Không có báo cáo: Trừ 2 điểm/lần', 5, 6, 29, '2016-05-17 18:53:51', '2016-05-17 18:53:51', NULL, 2),
(114, 'Rà soát các văn bản quy chế, quy định của phòng : Có tiến hành rà soát nhưng bị chậm hoặc chưa đạt chất lượng, bị lãnh đạo Ban nhắc nhở: Trừ 1 điểm/lần', 5, 5, 18, '2016-05-17 18:54:26', '2016-05-17 18:54:26', NULL, 1),
(115, 'Rà soát các văn bản quy chế, quy định của phòng : Có tiến hành rà soát nhưng bị chậm hoặc chưa đạt chất lượng, bị lãnh đạo Ban nhắc nhở: Trừ 1 điểm/lần', 5, 6, 29, '2016-05-17 18:54:36', '2016-05-17 18:54:36', NULL, 1),
(116, 'Rà soát các văn bản quy chế, quy định của phòng : Không tiến hành rà soát, gửi các văn bản quy chế, quy định chậm hoặc chưa đạt chất lương, ảnh hưởng tới tiến độ của toàn Ban, bị lãnh đạo Ban nhắc nhở: Trừ 2-4 điểm/lần', 5, 5, 18, '2016-05-17 18:54:55', '2016-05-17 18:54:55', NULL, 2),
(117, 'Rà soát các văn bản quy chế, quy định của phòng : Không tiến hành rà soát, gửi các văn bản quy chế, quy định chậm hoặc chưa đạt chất lương, ảnh hưởng tới tiến độ của toàn Ban, bị lãnh đạo Ban nhắc nhở: Trừ 2-4 điểm/lần', 5, 6, 29, '2016-05-17 18:55:21', '2016-05-17 18:55:21', NULL, 2),
(118, 'Giúp Trưởng phòng rà soát các văn bản hành chính của phòng theo phân công : Có tiến hành rà soát nhưng bị chậm hoặc chưa đạt chất lượng, bị lãnh đạo Phòng nhắc nhở: Trừ 1 điểm/lần', 5, 5, 18, '2016-05-17 18:55:45', '2016-05-17 18:55:45', NULL, 1),
(119, 'Giúp Trưởng phòng rà soát các văn bản hành chính của phòng theo phân công : Có tiến hành rà soát nhưng bị chậm hoặc chưa đạt chất lượng, bị lãnh đạo Phòng nhắc nhở: Trừ 1 điểm/lần', 5, 6, 29, '2016-05-17 18:55:53', '2016-05-17 18:55:53', NULL, 1),
(120, 'Giúp Trưởng phòng rà soát các văn bản hành chính của phòng theo phân công : Không tiến hành rà soát, gửi các văn bản quy chế, quy định chậm hoặc chưa đạt chất lương, ảnh hưởng tới tiến độ: Trừ 2-4 điểm/lần', 5, 5, 18, '2016-05-17 18:56:14', '2016-05-17 18:56:14', NULL, 2),
(121, 'Giúp Trưởng phòng rà soát các văn bản hành chính của phòng theo phân công : Không tiến hành rà soát, gửi các văn bản quy chế, quy định chậm hoặc chưa đạt chất lương, ảnh hưởng tới tiến độ: Trừ 2-4 điểm/lần', 5, 6, 29, '2016-05-17 18:56:24', '2016-05-17 18:56:24', NULL, 2),
(122, 'Thực hiện các công việc đột xuất khác : Có thực hiện nhưng chất lượng không đảm bảo, bị lãnh đạo Ban nhắc nhở nhưng không gây hậu quả nghiêm trọng: Trừ 1-2 điểm/lần', 5, 5, 18, '2016-05-17 18:56:49', '2016-05-17 18:56:49', NULL, 1),
(123, 'Thực hiện các công việc đột xuất khác : Có thực hiện nhưng chất lượng không đảm bảo, bị lãnh đạo Ban nhắc nhở nhưng không gây hậu quả nghiêm trọng: Trừ 1-2 điểm/lần', 5, 6, 29, '2016-05-17 18:57:07', '2016-05-17 18:57:07', NULL, 1),
(124, 'Thực hiện các công việc đột xuất khác : Không thực hiện mà không có lý do: Trừ 2-4 điểm/lần', 5, 5, 18, '2016-05-17 18:57:27', '2016-05-17 18:57:27', NULL, 2),
(125, 'Thực hiện các công việc đột xuất khác : Không thực hiện mà không có lý do: Trừ 2-4 điểm/lần', 5, 6, 29, '2016-05-17 18:57:37', '2016-05-17 18:57:37', NULL, 2),
(126, 'Không đảm bảo chất lượng tin bài khi đưa lên trang : Hoàn thành số lượng được giao nhưng còn một số  tin bài có chất lượng không đảm bảo, sơ sài, thiếu sự hấp dẫn: trừ 3 - 5 điểm', 5, 5, 19, '2016-05-17 19:35:09', '2016-05-17 19:35:09', NULL, 3),
(127, 'Không đảm bảo chất lượng tin bài khi đưa lên trang : Hoàn thành số lượng được giao nhưng còn một số  tin bài có chất lượng không đảm bảo, sơ sài, thiếu sự hấp dẫn: trừ 3 - 5 điểm', 5, 5, 20, '2016-05-17 19:35:33', '2016-05-17 19:35:33', NULL, 3),
(128, 'Không đảm bảo chất lượng tin bài khi đưa lên trang : Hoàn thành số lượng được giao nhưng còn một số  tin bài có chất lượng không đảm bảo, sơ sài, thiếu sự hấp dẫn: trừ 3 - 5 điểm', 5, 6, 23, '2016-05-17 19:35:44', '2016-05-17 19:35:44', NULL, 3),
(129, 'Không đảm bảo chất lượng tin bài khi đưa lên trang : Hoàn thành số lượng được giao nhưng còn một số  tin bài có chất lượng không đảm bảo, sơ sài, thiếu sự hấp dẫn: trừ 3 - 5 điểm', 5, 6, 24, '2016-05-17 19:36:06', '2016-05-17 19:36:06', NULL, 3),
(130, 'Không đảm bảo chất lượng tin bài khi đưa lên trang : Hoàn thành số lượng được giao nhưng mắc lỗi hệ thống, chất lượng kém, bị Thư ký tòa soạn nhắc nhở nhiều lần: trừ 5 - 10 điểm', 5, 5, 19, '2016-05-17 19:41:23', '2016-05-17 19:41:23', NULL, 5),
(131, 'Không đảm bảo chất lượng tin bài khi đưa lên trang : Hoàn thành số lượng được giao nhưng mắc lỗi hệ thống, chất lượng kém, bị Thư ký tòa soạn nhắc nhở nhiều lần: trừ 5 - 10 điểm', 5, 5, 20, '2016-05-17 19:41:32', '2016-05-17 19:41:32', NULL, 5),
(132, 'Không đảm bảo chất lượng tin bài khi đưa lên trang : Hoàn thành số lượng được giao nhưng mắc lỗi hệ thống, chất lượng kém, bị Thư ký tòa soạn nhắc nhở nhiều lần: trừ 5 - 10 điểm', 5, 6, 23, '2016-05-17 19:41:45', '2016-05-17 19:41:45', NULL, 5),
(133, 'Không đảm bảo chất lượng tin bài khi đưa lên trang : Hoàn thành số lượng được giao nhưng mắc lỗi hệ thống, chất lượng kém, bị Thư ký tòa soạn nhắc nhở nhiều lần: trừ 5 - 10 điểm', 5, 6, 24, '2016-05-17 19:41:55', '2016-05-17 19:41:55', NULL, 5),
(134, 'Không đảm bảo chất lượng tin bài khi đưa lên trang : Hoàn thành số lượng nhưng ở mắc độ kém: trừ 10 - 15  điểm', 5, 5, 19, '2016-05-17 19:42:21', '2016-05-17 19:42:21', NULL, 10),
(135, 'Không đảm bảo chất lượng tin bài khi đưa lên trang : Hoàn thành số lượng nhưng ở mắc độ kém: trừ 10 - 15  điểm', 5, 5, 20, '2016-05-17 19:42:33', '2016-05-17 19:42:33', NULL, 10),
(136, 'Không đảm bảo chất lượng tin bài khi đưa lên trang : Hoàn thành số lượng nhưng ở mắc độ kém: trừ 10 - 15  điểm', 5, 6, 23, '2016-05-17 19:42:43', '2016-05-17 19:42:43', NULL, 10),
(137, 'Không đảm bảo chất lượng tin bài khi đưa lên trang : Hoàn thành số lượng nhưng ở mắc độ kém: trừ 10 - 15  điểm', 5, 6, 24, '2016-05-17 19:42:55', '2016-05-17 19:42:55', NULL, 10),
(138, 'Không đảm bảo việc đề xuất kế hoạch tin bài cho mục được phân công theo từng tuần/tháng (Không nắm được toàn bộ các sự kiện trong chuyên mục do mình phụ trách, không đề xuất được đề tài kịp thời nhưng được nhắc nhở kịp thời, chưa gây ảnh hưởng về mặt tuyê', 5, 5, 19, '2016-05-17 19:58:48', '2016-05-17 19:58:48', NULL, 1),
(139, 'Không đảm bảo việc đề xuất kế hoạch tin bài cho mục được phân công theo từng tuần/tháng (Không nắm được toàn bộ các sự kiện trong chuyên mục do mình phụ trách, không đề xuất được đề tài kịp thời nhưng được nhắc nhở kịp thời, chưa gây ảnh hưởng về mặt tuyê', 5, 5, 20, '2016-05-17 19:59:09', '2016-05-17 19:59:09', NULL, 1),
(140, 'Không đảm bảo việc đề xuất kế hoạch tin bài cho mục được phân công theo từng tuần/tháng (Không nắm được toàn bộ các sự kiện trong chuyên mục do mình phụ trách, không đề xuất được đề tài kịp thời nhưng được nhắc nhở kịp thời, chưa gây ảnh hưởng về mặt tuyê', 5, 6, 23, '2016-05-17 19:59:24', '2016-05-17 19:59:24', NULL, 1),
(141, 'Không đảm bảo việc đề xuất kế hoạch tin bài cho mục được phân công theo từng tuần/tháng (Không nắm được toàn bộ các sự kiện trong chuyên mục do mình phụ trách, không đề xuất được đề tài kịp thời nhưng được nhắc nhở kịp thời, chưa gây ảnh hưởng về mặt tuyê', 5, 6, 24, '2016-05-17 19:59:34', '2016-05-17 19:59:34', NULL, 1),
(142, 'Không đảm bảo việc đề xuất kế hoạch tin bài cho mục được phân công theo từng tuần/tháng ( Không nắm được toàn bộ các sự kiện trong chuyên mục do mình phụ trách, không đề xuất được đề tài kịp thời, bỏ sót các sự kiện quan trọng, ảnh hưởng đến việc đưa tin ', 5, 5, 19, '2016-05-17 20:00:00', '2016-05-17 20:00:00', NULL, 2),
(143, 'Không đảm bảo việc đề xuất kế hoạch tin bài cho mục được phân công theo từng tuần/tháng ( Không nắm được toàn bộ các sự kiện trong chuyên mục do mình phụ trách, không đề xuất được đề tài kịp thời, bỏ sót các sự kiện quan trọng, ảnh hưởng đến việc đưa tin ', 5, 6, 23, '2016-05-17 20:00:10', '2016-05-17 20:00:10', NULL, 2),
(144, 'Không đảm bảo việc đề xuất kế hoạch tin bài cho mục được phân công theo từng tuần/tháng ( Không nắm được toàn bộ các sự kiện trong chuyên mục do mình phụ trách, không đề xuất được đề tài kịp thời, bỏ sót các sự kiện quan trọng, ảnh hưởng đến việc đưa tin ', 5, 5, 20, '2016-05-17 20:00:23', '2016-05-17 20:00:23', NULL, 2),
(145, 'Không đảm bảo việc đề xuất kế hoạch tin bài cho mục được phân công theo từng tuần/tháng ( Không nắm được toàn bộ các sự kiện trong chuyên mục do mình phụ trách, không đề xuất được đề tài kịp thời, bỏ sót các sự kiện quan trọng, ảnh hưởng đến việc đưa tin ', 5, 6, 23, '2016-05-17 20:00:32', '2016-05-17 20:00:32', NULL, 2),
(146, 'Không đảm bảo việc đề xuất kế hoạch tin bài cho mục được phân công theo từng tuần/tháng ( Không nắm được toàn bộ các sự kiện trong chuyên mục do mình phụ trách, không đề xuất được đề tài kịp thời, bỏ sót các sự kiện quan trọng, ảnh hưởng đến việc đưa tin ', 5, 6, 24, '2016-05-17 20:00:42', '2016-05-17 20:00:42', NULL, 2),
(147, 'Không đảm bảo kế hoạch tin bài theo tuần, tháng : Kế hoạch sơ sài, thiếu tìm tòi : 1-2 điểm', 5, 5, 19, '2016-05-17 20:04:19', '2016-05-17 20:04:19', NULL, 1),
(148, 'Không đảm bảo kế hoạch tin bài theo tuần, tháng : Kế hoạch sơ sài, thiếu tìm tòi : 1-2 điểm', 5, 5, 20, '2016-05-17 20:04:29', '2016-05-17 20:04:29', NULL, 1),
(149, 'Không đảm bảo kế hoạch tin bài theo tuần, tháng : Kế hoạch sơ sài, thiếu tìm tòi : 1-2 điểm', 5, 6, 23, '2016-05-17 20:04:40', '2016-05-17 20:04:40', NULL, 1),
(150, 'Không đảm bảo kế hoạch tin bài theo tuần, tháng : Kế hoạch sơ sài, thiếu tìm tòi : 1-2 điểm', 5, 6, 24, '2016-05-17 20:04:52', '2016-05-17 20:04:52', NULL, 1),
(151, 'Không đảm bảo kế hoạch tin bài theo tuần, tháng : Kế hoạch thiếu sót những chương trình lớn, trọng điểm trong mảng công việc được phân công: 2-3  điểm/lần', 5, 5, 19, '2016-05-17 20:05:14', '2016-05-17 20:05:14', NULL, 2),
(152, 'Không đảm bảo kế hoạch tin bài theo tuần, tháng : Kế hoạch thiếu sót những chương trình lớn, trọng điểm trong mảng công việc được phân công: 2-3  điểm/lần', 5, 5, 20, '2016-05-17 20:05:29', '2016-05-17 20:05:29', NULL, 2),
(153, 'Không đảm bảo kế hoạch tin bài theo tuần, tháng : Kế hoạch thiếu sót những chương trình lớn, trọng điểm trong mảng công việc được phân công: 2-3  điểm/lần', 5, 6, 23, '2016-05-17 20:05:44', '2016-05-17 20:05:44', NULL, 2),
(154, 'Không đảm bảo kế hoạch tin bài theo tuần, tháng : Kế hoạch thiếu sót những chương trình lớn, trọng điểm trong mảng công việc được phân công: 2-3  điểm/lần', 5, 6, 24, '2016-05-17 20:05:58', '2016-05-17 20:05:58', NULL, 2),
(155, 'Không đảm bảo kế hoạch tin bài theo tuần, tháng : Không có kế hoạch : 3-5 điểm/lần.', 5, 5, 19, '2016-05-17 20:06:17', '2016-05-17 20:06:17', NULL, 3),
(156, 'Không đảm bảo kế hoạch tin bài theo tuần, tháng : Không có kế hoạch : 3-5 điểm/lần.', 5, 5, 20, '2016-05-17 20:06:28', '2016-05-17 20:06:28', NULL, 3),
(157, 'Không đảm bảo kế hoạch tin bài theo tuần, tháng : Không có kế hoạch : 3-5 điểm/lần.', 5, 6, 23, '2016-05-17 20:06:39', '2016-05-17 20:06:39', NULL, 3),
(158, 'Không đảm bảo kế hoạch tin bài theo tuần, tháng : Không có kế hoạch : 3-5 điểm/lần.', 5, 6, 23, '2016-05-17 20:06:51', '2016-05-17 20:06:51', NULL, 3),
(159, 'Không đảm bảo kế hoạch tin bài theo tuần, tháng : Không có kế hoạch : 3-5 điểm/lần.', 5, 6, 24, '2016-05-17 20:07:05', '2016-05-17 20:07:05', NULL, 3),
(160, 'Mắc lỗi trong quá trình tác nghiệp  : Viết không chính xác nhưng được Trưởng nhóm phát hiện ngay. Tác giả bị phạt: nhắc hở', 5, 5, 19, '2016-05-17 20:08:26', '2016-05-17 20:08:26', NULL, 0),
(161, 'Mắc lỗi trong quá trình tác nghiệp  : Viết không chính xác nhưng được Trưởng nhóm phát hiện ngay. Tác giả bị phạt: nhắc hở', 5, 5, 20, '2016-05-17 20:08:44', '2016-05-17 20:08:44', NULL, 0),
(162, 'Mắc lỗi trong quá trình tác nghiệp  : Viết không chính xác nhưng được Trưởng nhóm phát hiện ngay. Tác giả bị phạt: nhắc hở', 5, 6, 23, '2016-05-17 20:09:01', '2016-05-17 20:09:01', NULL, 0),
(163, 'Mắc lỗi trong quá trình tác nghiệp  : Viết không chính xác nhưng được Trưởng nhóm phát hiện ngay. Tác giả bị phạt: nhắc hở', 5, 6, 24, '2016-05-17 20:09:14', '2016-05-17 20:09:14', NULL, 0),
(164, 'Mắc lỗi trong quá trình tác nghiệp  : Viết không chính xác Sau khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện và chưa phải đăng cải chính: trừ 1 - 2 điểm', 5, 5, 19, '2016-05-17 20:09:58', '2016-05-17 20:09:58', NULL, 1),
(165, 'Mắc lỗi trong quá trình tác nghiệp  : Viết không chính xác Sau khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện và chưa phải đăng cải chính: trừ 1 - 2 điểm', 5, 5, 20, '2016-05-17 20:10:08', '2016-05-17 20:10:08', NULL, 1),
(166, 'Mắc lỗi trong quá trình tác nghiệp  : Viết không chính xác Sau khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện và chưa phải đăng cải chính: trừ 1 - 2 điểm', 5, 6, 23, '2016-05-17 20:10:18', '2016-05-17 20:10:18', NULL, 1),
(167, 'Mắc lỗi trong quá trình tác nghiệp  : Viết không chính xác Sau khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện và chưa phải đăng cải chính: trừ 1 - 2 điểm', 5, 6, 24, '2016-05-17 20:10:37', '2016-05-17 20:10:37', NULL, 1),
(168, 'Mắc lỗi trong quá trình tác nghiệp  : Viết không chính xác Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện, lỗi thuộc loại nghiêm trọng (tên tuổi, chức danh lãnh đạo cao cấp, các sai sót gây phản ứng của đơn vị hoặc cá nhân, bạn đọc): 3 - ', 5, 5, 19, '2016-05-17 20:11:42', '2016-05-17 20:11:42', NULL, 3),
(169, 'Mắc lỗi trong quá trình tác nghiệp  : Viết không chính xác Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện, lỗi thuộc loại nghiêm trọng (tên tuổi, chức danh lãnh đạo cao cấp, các sai sót gây phản ứng của đơn vị hoặc cá nhân, bạn đọc): 3 - ', 5, 5, 20, '2016-05-17 20:11:54', '2016-05-17 20:11:54', NULL, 3),
(170, 'Mắc lỗi trong quá trình tác nghiệp  : Viết không chính xác Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện, lỗi thuộc loại nghiêm trọng (tên tuổi, chức danh lãnh đạo cao cấp, các sai sót gây phản ứng của đơn vị hoặc cá nhân, bạn đọc): 3 - ', 5, 6, 23, '2016-05-17 20:12:04', '2016-05-17 20:12:04', NULL, 3),
(171, 'Mắc lỗi trong quá trình tác nghiệp  : Viết không chính xác Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện, lỗi thuộc loại nghiêm trọng (tên tuổi, chức danh lãnh đạo cao cấp, các sai sót gây phản ứng của đơn vị hoặc cá nhân, bạn đọc): 3 - ', 5, 6, 24, '2016-05-17 20:12:13', '2016-05-17 20:12:13', NULL, 3),
(172, 'Mắc lỗi trong quá trình tác nghiệp  :Viết sai chính tả  Sai trên tít, sapo, tít phụ, titre box, tên tác giả... đã xuất hiện trên mặt báo trừ 1 - 5 điểm hoặc tùy mức độ quan trọng và hậu quả gây ra có thế bị xử lý kỷ luật', 5, 5, 19, '2016-05-17 20:13:09', '2016-05-17 20:13:09', NULL, 1),
(173, 'Mắc lỗi trong quá trình tác nghiệp  :Viết sai chính tả  Sai trên tít, sapo, tít phụ, titre box, tên tác giả... đã xuất hiện trên mặt báo trừ 1 - 5 điểm hoặc tùy mức độ quan trọng và hậu quả gây ra có thế bị xử lý kỷ luật', 5, 5, 20, '2016-05-17 20:13:19', '2016-05-17 20:13:19', NULL, 1),
(174, 'Mắc lỗi trong quá trình tác nghiệp  :Viết sai chính tả  Sai trên tít, sapo, tít phụ, titre box, tên tác giả... đã xuất hiện trên mặt báo trừ 1 - 5 điểm hoặc tùy mức độ quan trọng và hậu quả gây ra có thế bị xử lý kỷ luật', 5, 6, 23, '2016-05-17 20:13:31', '2016-05-17 20:13:31', NULL, 1),
(175, 'Mắc lỗi trong quá trình tác nghiệp  :Viết sai chính tả  Sai trên tít, sapo, tít phụ, titre box, tên tác giả... đã xuất hiện trên mặt báo trừ 1 - 5 điểm hoặc tùy mức độ quan trọng và hậu quả gây ra có thế bị xử lý kỷ luật', 5, 6, 24, '2016-05-17 20:13:41', '2016-05-17 20:13:41', NULL, 1),
(176, 'Mắc lỗi trong quá trình tác nghiệp  :Sai chính tả không nghiêm trọng được Trưởng nhóm phát hiện: Nhắc nhở nếu dưới 3 lỗi, từ lỗi thứ 4 trở lên trừ 1 điểm/lỗi', 5, 5, 19, '2016-05-17 20:14:18', '2016-05-17 20:14:18', NULL, 1),
(177, 'Mắc lỗi trong quá trình tác nghiệp  :Sai chính tả không nghiêm trọng được Trưởng nhóm phát hiện: Nhắc nhở nếu dưới 3 lỗi, từ lỗi thứ 4 trở lên trừ 1 điểm/lỗi', 5, 5, 20, '2016-05-17 20:14:30', '2016-05-17 20:14:30', NULL, 1),
(178, 'Mắc lỗi trong quá trình tác nghiệp  :Sai chính tả không nghiêm trọng được Trưởng nhóm phát hiện: Nhắc nhở nếu dưới 3 lỗi, từ lỗi thứ 4 trở lên trừ 1 điểm/lỗi', 5, 6, 23, '2016-05-17 20:14:43', '2016-05-17 20:14:43', NULL, 1),
(179, 'Mắc lỗi trong quá trình tác nghiệp  :Sai chính tả không nghiêm trọng được Trưởng nhóm phát hiện: Nhắc nhở nếu dưới 3 lỗi, từ lỗi thứ 4 trở lên trừ 1 điểm/lỗi', 5, 6, 24, '2016-05-17 20:14:53', '2016-05-17 20:14:53', NULL, 1),
(180, 'Mắc lỗi trong quá trình tác nghiệp  :Sai chính tả Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện và chưa phải đăng đính chính: nhắc nhở nếu dưới ba lỗi. Từ lỗi thứ tư trở lên bị trừ 1 điểm/lỗi', 5, 5, 19, '2016-05-17 20:17:22', '2016-05-17 20:17:22', NULL, 1),
(181, 'Mắc lỗi trong quá trình tác nghiệp  :Sai chính tả Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện và chưa phải đăng đính chính: nhắc nhở nếu dưới ba lỗi. Từ lỗi thứ tư trở lên bị trừ 1 điểm/lỗi', 5, 5, 20, '2016-05-17 20:17:31', '2016-05-17 20:17:31', NULL, 1),
(182, 'Mắc lỗi trong quá trình tác nghiệp  :Sai chính tả Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện và chưa phải đăng đính chính: nhắc nhở nếu dưới ba lỗi. Từ lỗi thứ tư trở lên bị trừ 1 điểm/lỗi', 5, 6, 23, '2016-05-17 20:17:42', '2016-05-17 20:17:42', NULL, 1),
(183, 'Mắc lỗi trong quá trình tác nghiệp  :Sai chính tả Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện và chưa phải đăng đính chính: nhắc nhở nếu dưới ba lỗi. Từ lỗi thứ tư trở lên bị trừ 1 điểm/lỗi', 5, 6, 24, '2016-05-17 20:17:59', '2016-05-17 20:17:59', NULL, 1),
(184, 'Mắc lỗi trong quá trình tác nghiệp  :Sai chính tả Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện, là lỗi nghiêm trọng phải đăng cải chính: trừ 5 điểm', 5, 5, 19, '2016-05-17 20:19:28', '2016-05-17 20:19:28', NULL, 5),
(185, 'Mắc lỗi trong quá trình tác nghiệp  :Sai chính tả Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện, là lỗi nghiêm trọng phải đăng cải chính: trừ 5 điểm', 5, 5, 20, '2016-05-17 20:19:38', '2016-05-17 20:19:38', NULL, 5),
(186, 'Mắc lỗi trong quá trình tác nghiệp  :Sai chính tả Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện, là lỗi nghiêm trọng phải đăng cải chính: trừ 5 điểm', 5, 6, 23, '2016-05-17 20:19:56', '2016-05-17 20:19:56', NULL, 5),
(187, 'Mắc lỗi trong quá trình tác nghiệp  :Sai chính tả Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện, là lỗi nghiêm trọng phải đăng cải chính: trừ 5 điểm', 5, 6, 24, '2016-05-17 20:20:06', '2016-05-17 20:20:06', NULL, 5),
(188, 'Mắc lỗi trong quá trình tác nghiệp  : Sử dụng ảnh sai nhưng được Trưởng nhóm phát hiện trừ 1 điểm', 5, 5, 19, '2016-05-17 20:20:53', '2016-05-17 20:20:53', NULL, 1),
(189, 'Mắc lỗi trong quá trình tác nghiệp  : Sử dụng ảnh sai nhưng được Trưởng nhóm phát hiện trừ 1 điểm', 5, 5, 20, '2016-05-17 20:21:04', '2016-05-17 20:21:04', NULL, 1),
(190, 'Mắc lỗi trong quá trình tác nghiệp  : Sử dụng ảnh sai nhưng được Trưởng nhóm phát hiện trừ 1 điểm', 5, 6, 23, '2016-05-17 20:21:17', '2016-05-17 20:21:17', NULL, 1),
(191, 'Mắc lỗi trong quá trình tác nghiệp  : Sử dụng ảnh sai nhưng được Trưởng nhóm phát hiện trừ 1 điểm', 5, 6, 24, '2016-05-17 20:21:30', '2016-05-17 20:21:30', NULL, 1),
(192, 'Mắc lỗi trong quá trình tác nghiệp  : Dùng sai ảnh Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện và chưa gây hậu quả trừ 2 điểm', 5, 5, 19, '2016-05-17 20:22:12', '2016-05-17 20:22:12', NULL, 2),
(193, 'Mắc lỗi trong quá trình tác nghiệp  : Dùng sai ảnh Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện và chưa gây hậu quả trừ 2 điểm', 5, 5, 20, '2016-05-17 20:22:24', '2016-05-17 20:22:24', NULL, 2),
(194, 'Mắc lỗi trong quá trình tác nghiệp  : Dùng sai ảnh Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện và chưa gây hậu quả trừ 2 điểm', 5, 6, 23, '2016-05-17 20:22:49', '2016-05-17 20:22:49', NULL, 2),
(195, 'Mắc lỗi trong quá trình tác nghiệp  : Dùng sai ảnh Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện và chưa gây hậu quả trừ 2 điểm', 5, 6, 24, '2016-05-17 20:23:02', '2016-05-17 20:23:02', NULL, 2),
(196, 'Mắc lỗi trong quá trình tác nghiệp  : Dùng sai ảnh Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện, gây hậu quả dẫn đến việc tòa soạn phải giải quyết trừ 5 điểm, nếu nghiêm trọng xử lý kỷ luật theo quy chế', 5, 5, 19, '2016-05-17 20:23:29', '2016-05-17 20:23:29', NULL, 5),
(197, 'Mắc lỗi trong quá trình tác nghiệp  : Dùng sai ảnh Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện, gây hậu quả dẫn đến việc tòa soạn phải giải quyết trừ 5 điểm, nếu nghiêm trọng xử lý kỷ luật theo quy chế', 5, 5, 20, '2016-05-17 20:23:42', '2016-05-17 20:23:42', NULL, 5),
(198, 'Mắc lỗi trong quá trình tác nghiệp  : Dùng sai ảnh Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện, gây hậu quả dẫn đến việc tòa soạn phải giải quyết trừ 5 điểm, nếu nghiêm trọng xử lý kỷ luật theo quy chế', 5, 6, 23, '2016-05-17 20:23:52', '2016-05-17 20:23:52', NULL, 5),
(199, 'Mắc lỗi trong quá trình tác nghiệp  : Dùng sai ảnh Khi đã xuất hiện trên mặt báo, nhưng tác giả không tự phát hiện, gây hậu quả dẫn đến việc tòa soạn phải giải quyết trừ 5 điểm, nếu nghiêm trọng xử lý kỷ luật theo quy chế', 5, 6, 24, '2016-05-17 20:24:02', '2016-05-17 20:24:02', NULL, 5),
(200, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ  Tham dự các sự kiện về không viết tin ngay trong ngày hoặc đưa tin chậm so với yêu cầu của Trưởng nhóm hoặc Ban phụ trách/Lãnh đạo tòa soạn trừ 1-2 điểm', 5, 5, 19, '2016-05-17 20:25:14', '2016-05-17 20:25:14', NULL, 1),
(201, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ  Tham dự các sự kiện về không viết tin ngay trong ngày hoặc đưa tin chậm so với yêu cầu của Trưởng nhóm hoặc Ban phụ trách/Lãnh đạo tòa soạn trừ 1-2 điểm', 5, 5, 20, '2016-05-17 20:25:27', '2016-05-17 20:25:27', NULL, 1),
(202, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ  Tham dự các sự kiện về không viết tin ngay trong ngày hoặc đưa tin chậm so với yêu cầu của Trưởng nhóm hoặc Ban phụ trách/Lãnh đạo tòa soạn trừ 1-2 điểm', 5, 6, 23, '2016-05-17 20:25:44', '2016-05-17 20:25:44', NULL, 1),
(203, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ  Tham dự các sự kiện về không viết tin ngay trong ngày hoặc đưa tin chậm so với yêu cầu của Trưởng nhóm hoặc Ban phụ trách/Lãnh đạo tòa soạn trừ 1-2 điểm', 5, 6, 24, '2016-05-17 20:25:59', '2016-05-17 20:25:59', NULL, 1),
(204, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Phản ánh không chính xác hoặc sai một sự kiện có thật xảy ra trừ 5-15 điểm', 5, 5, 19, '2016-05-17 20:26:29', '2016-05-17 20:26:29', NULL, 5),
(205, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Phản ánh không chính xác hoặc sai một sự kiện có thật xảy ra trừ 5-15 điểm', 5, 5, 20, '2016-05-17 20:26:39', '2016-05-17 20:26:39', NULL, 5),
(206, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Phản ánh không chính xác hoặc sai một sự kiện có thật xảy ra trừ 5-15 điểm', 5, 6, 23, '2016-05-17 20:26:49', '2016-05-17 20:26:49', NULL, 5),
(207, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Phản ánh không chính xác hoặc sai một sự kiện có thật xảy ra trừ 5-15 điểm', 5, 6, 24, '2016-05-17 20:27:02', '2016-05-17 20:27:02', NULL, 5),
(208, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Viết sự kiện xảy ra không chính xác nhưng các khâu biên tập đã phát hiện, hoặc đã đăng nhưng mức độ chưa phải cải chính trừ: 1-5 điểm', 5, 5, 19, '2016-05-17 20:27:41', '2016-05-17 20:27:41', NULL, 1),
(209, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Viết sự kiện xảy ra không chính xác nhưng các khâu biên tập đã phát hiện, hoặc đã đăng nhưng mức độ chưa phải cải chính trừ: 1-5 điểm', 5, 5, 20, '2016-05-17 20:28:23', '2016-05-17 20:28:23', NULL, 1),
(210, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Viết sự kiện xảy ra không chính xác nhưng các khâu biên tập đã phát hiện, hoặc đã đăng nhưng mức độ chưa phải cải chính trừ: 1-5 điểm', 5, 6, 23, '2016-05-17 20:28:38', '2016-05-17 20:28:38', NULL, 1),
(211, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Viết sự kiện xảy ra không chính xác nhưng các khâu biên tập đã phát hiện, hoặc đã đăng nhưng mức độ chưa phải cải chính trừ: 1-5 điểm', 5, 6, 24, '2016-05-17 20:28:52', '2016-05-17 20:28:52', NULL, 1),
(212, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Viết sự kiện xảy ra không chính xác, bịa đặt chi tiết thông tin, hoặc bị khiếu nại mà không đủ chứng cứ, dẫn đến khiếu nại, phản ứng hoặc phải đăng lời xin lỗi, cải chính trừ 8-15 điểm', 5, 5, 19, '2016-05-17 20:29:25', '2016-05-17 20:29:25', NULL, 8),
(213, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Viết sự kiện xảy ra không chính xác, bịa đặt chi tiết thông tin, hoặc bị khiếu nại mà không đủ chứng cứ, dẫn đến khiếu nại, phản ứng hoặc phải đăng lời xin lỗi, cải chính trừ 8-15 điểm', 5, 5, 20, '2016-05-17 20:29:43', '2016-05-17 20:29:43', NULL, 8),
(214, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Viết sự kiện xảy ra không chính xác, bịa đặt chi tiết thông tin, hoặc bị khiếu nại mà không đủ chứng cứ, dẫn đến khiếu nại, phản ứng hoặc phải đăng lời xin lỗi, cải chính trừ 8-15 điểm', 5, 6, 23, '2016-05-17 20:29:55', '2016-05-17 20:29:55', NULL, 8),
(215, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Viết sự kiện xảy ra không chính xác, bịa đặt chi tiết thông tin, hoặc bị khiếu nại mà không đủ chứng cứ, dẫn đến khiếu nại, phản ứng hoặc phải đăng lời xin lỗi, cải chính trừ 8-15 điểm', 5, 6, 24, '2016-05-17 20:30:05', '2016-05-17 20:30:05', NULL, 8),
(216, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Đạo văn và xào nấu được Trưởng nhóm phát hiện. Không đăng và trừ 3-5 điểm', 5, 5, 19, '2016-05-17 20:31:15', '2016-05-17 20:31:15', NULL, 3),
(217, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Đạo văn và xào nấu được Trưởng nhóm phát hiện. Không đăng và trừ 3-5 điểm', 5, 5, 20, '2016-05-17 20:31:31', '2016-05-17 20:31:31', NULL, 3),
(218, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Đạo văn và xào nấu được Trưởng nhóm phát hiện. Không đăng và trừ 3-5 điểm', 5, 6, 23, '2016-05-17 20:31:42', '2016-05-17 20:31:42', NULL, 3);
INSERT INTO `chatluong` (`_id`, `name`, `level_id`, `room_id`, `chucdanh_id`, `created_at`, `updated_at`, `deleted_at`, `diemtru`) VALUES
(219, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Đạo văn và xào nấu được Trưởng nhóm phát hiện. Không đăng và trừ 3-5 điểm', 5, 6, 24, '2016-05-17 20:31:55', '2016-05-17 20:31:55', NULL, 3),
(220, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Đạo văn và xào nấu đã lên mặt báo dẫn đến dẫn đến khiếu nại, phản ứng, yêu cầu xử lý của dư luận hoặc cơ quan Nhà nước hoặc phải đăng lời xin lỗi, cải chính Không trả nhuận bút, trừ 10 - 15 điểm và  xem x', 5, 5, 19, '2016-05-17 20:32:22', '2016-05-17 20:32:22', NULL, 10),
(221, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Đạo văn và xào nấu đã lên mặt báo dẫn đến dẫn đến khiếu nại, phản ứng, yêu cầu xử lý của dư luận hoặc cơ quan Nhà nước hoặc phải đăng lời xin lỗi, cải chính Không trả nhuận bút, trừ 10 - 15 điểm và  xem x', 5, 5, 20, '2016-05-17 20:32:36', '2016-05-17 20:32:36', NULL, 10),
(222, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Đạo văn và xào nấu đã lên mặt báo dẫn đến dẫn đến khiếu nại, phản ứng, yêu cầu xử lý của dư luận hoặc cơ quan Nhà nước hoặc phải đăng lời xin lỗi, cải chính Không trả nhuận bút, trừ 10 - 15 điểm và  xem x', 5, 6, 23, '2016-05-17 20:32:50', '2016-05-17 20:32:50', NULL, 10),
(223, 'Mắc lỗi trong quá trình tác nghiệp : Lỗi nghiệp vụ Đạo văn và xào nấu đã lên mặt báo dẫn đến dẫn đến khiếu nại, phản ứng, yêu cầu xử lý của dư luận hoặc cơ quan Nhà nước hoặc phải đăng lời xin lỗi, cải chính Không trả nhuận bút, trừ 10 - 15 điểm và  xem x', 5, 6, 24, '2016-05-17 20:33:03', '2016-05-17 20:33:03', NULL, 10),
(224, 'Mắc lỗi trong quá trình tác nghiệp :  Lỗi nghiệp vụ Phản ánh hoặc phát ngôn sai quan điểm, đường lối, tôn chỉ mục đích  nhưng Trưởng nhóm đã phát hiện. Cảnh cáo', 5, 5, 19, '2016-05-17 20:33:50', '2016-05-17 20:33:50', NULL, 0),
(225, 'Mắc lỗi trong quá trình tác nghiệp :  Lỗi nghiệp vụ Phản ánh hoặc phát ngôn sai quan điểm, đường lối, tôn chỉ mục đích  nhưng Trưởng nhóm đã phát hiện. Cảnh cáo', 5, 5, 20, '2016-05-17 20:34:01', '2016-05-17 20:34:01', NULL, 0),
(226, 'Mắc lỗi trong quá trình tác nghiệp :  Lỗi nghiệp vụ Phản ánh hoặc phát ngôn sai quan điểm, đường lối, tôn chỉ mục đích  nhưng Trưởng nhóm đã phát hiện. Cảnh cáo', 5, 6, 23, '2016-05-17 20:34:14', '2016-05-17 20:34:14', NULL, 0),
(227, 'Mắc lỗi trong quá trình tác nghiệp :  Lỗi nghiệp vụ Phản ánh hoặc phát ngôn sai quan điểm, đường lối, tôn chỉ mục đích  nhưng Trưởng nhóm đã phát hiện. Cảnh cáo', 5, 6, 24, '2016-05-17 20:34:26', '2016-05-17 20:34:26', NULL, 0),
(228, 'Mắc lỗi trong quá trình tác nghiệp  : Lỗi nghiệp vụ Phản ánh hoặc phát ngôn sai quan điểm, đường lối, tôn chỉ mục đích, các khâu biên tập không phát hiện và đã xuất bản lên mặt báo nhưng  chưa gây hậu quả hoặc chưa phải đính chính  trừ 5 điểm', 5, 5, 19, '2016-05-17 20:35:09', '2016-05-17 20:35:09', NULL, 5),
(229, 'Mắc lỗi trong quá trình tác nghiệp  : Lỗi nghiệp vụ Phản ánh hoặc phát ngôn sai quan điểm, đường lối, tôn chỉ mục đích, các khâu biên tập không phát hiện và đã xuất bản lên mặt báo nhưng  chưa gây hậu quả hoặc chưa phải đính chính  trừ 5 điểm', 5, 5, 20, '2016-05-17 20:35:22', '2016-05-17 20:35:22', NULL, 5),
(230, 'Mắc lỗi trong quá trình tác nghiệp  : Lỗi nghiệp vụ Phản ánh hoặc phát ngôn sai quan điểm, đường lối, tôn chỉ mục đích, các khâu biên tập không phát hiện và đã xuất bản lên mặt báo nhưng  chưa gây hậu quả hoặc chưa phải đính chính  trừ 5 điểm', 5, 6, 23, '2016-05-17 20:35:49', '2016-05-17 20:35:49', NULL, 5),
(231, 'Mắc lỗi trong quá trình tác nghiệp  : Lỗi nghiệp vụ Phản ánh hoặc phát ngôn sai quan điểm, đường lối, tôn chỉ mục đích, các khâu biên tập không phát hiện và đã xuất bản lên mặt báo nhưng  chưa gây hậu quả hoặc chưa phải đính chính  trừ 5 điểm', 5, 6, 24, '2016-05-17 20:35:59', '2016-05-17 20:35:59', NULL, 5),
(232, 'Mắc lỗi trong quá trình tác nghiệp  : Lỗi nghiệp vụ Phản ánh hoặc phát ngôn sai quan điểm, đường lối, tôn chỉ mục đích và đã đăng trên mặt báo dẫn đến khiếu nại, phản ứng, yêu cầu xử lý của dư luận hoặc cơ quan Nhà nước trừ 20 điểm hoặc xem xét chấm dứt h', 5, 5, 19, '2016-05-17 20:36:33', '2016-05-17 20:36:33', NULL, 20),
(233, 'Mắc lỗi trong quá trình tác nghiệp  : Lỗi nghiệp vụ Phản ánh hoặc phát ngôn sai quan điểm, đường lối, tôn chỉ mục đích và đã đăng trên mặt báo dẫn đến khiếu nại, phản ứng, yêu cầu xử lý của dư luận hoặc cơ quan Nhà nước trừ 20 điểm hoặc xem xét chấm dứt h', 5, 5, 20, '2016-05-17 20:36:45', '2016-05-17 20:36:45', NULL, 20),
(234, 'Mắc lỗi trong quá trình tác nghiệp  : Lỗi nghiệp vụ Phản ánh hoặc phát ngôn sai quan điểm, đường lối, tôn chỉ mục đích và đã đăng trên mặt báo dẫn đến khiếu nại, phản ứng, yêu cầu xử lý của dư luận hoặc cơ quan Nhà nước trừ 20 điểm hoặc xem xét chấm dứt h', 5, 6, 24, '2016-05-17 20:36:59', '2016-05-17 20:36:59', NULL, 20),
(235, 'Mắc lỗi trong quá trình tác nghiệp  : Lỗi nghiệp vụ Phản ánh hoặc phát ngôn sai quan điểm, đường lối, tôn chỉ mục đích và đã đăng trên mặt báo dẫn đến khiếu nại, phản ứng, yêu cầu xử lý của dư luận hoặc cơ quan Nhà nước trừ 20 điểm hoặc xem xét chấm dứt h', 5, 5, 19, '2016-05-17 20:37:09', '2016-05-17 20:37:09', NULL, 20),
(236, 'Phối hợp với các chuyên mục khác để đảm bảo kế hoạch tin bài cho toàn trang: Có phối hợp nhưng chưa chặt chẽ, không đảm bảo kế hoạch tin bài cho toàn trang, bị lãnh đạo Phòng nhắc nhở: trừ 1 - 2 điểm/lần', 5, 5, 19, '2016-05-17 20:37:38', '2016-05-17 20:37:38', NULL, 1),
(237, 'Phối hợp với các chuyên mục khác để đảm bảo kế hoạch tin bài cho toàn trang: Có phối hợp nhưng chưa chặt chẽ, không đảm bảo kế hoạch tin bài cho toàn trang, bị lãnh đạo Phòng nhắc nhở: trừ 1 - 2 điểm/lần', 5, 5, 20, '2016-05-17 20:37:48', '2016-05-17 20:37:48', NULL, 1),
(238, 'Phối hợp với các chuyên mục khác để đảm bảo kế hoạch tin bài cho toàn trang: Có phối hợp nhưng chưa chặt chẽ, không đảm bảo kế hoạch tin bài cho toàn trang, bị lãnh đạo Phòng nhắc nhở: trừ 1 - 2 điểm/lần', 5, 6, 23, '2016-05-17 20:37:57', '2016-05-17 20:37:57', NULL, 1),
(239, 'Phối hợp với các chuyên mục khác để đảm bảo kế hoạch tin bài cho toàn trang: Có phối hợp nhưng chưa chặt chẽ, không đảm bảo kế hoạch tin bài cho toàn trang, bị lãnh đạo Phòng nhắc nhở: trừ 1 - 2 điểm/lần', 5, 6, 24, '2016-05-17 20:38:06', '2016-05-17 20:38:06', NULL, 1),
(240, 'Phối hợp với các chuyên mục khác để đảm bảo kế hoạch tin bài cho toàn trang: Không có ý thức phối hợp: trừ 2 - 3 điểm/lần', 5, 5, 19, '2016-05-17 20:38:31', '2016-05-17 20:38:31', NULL, 2),
(241, 'Phối hợp với các chuyên mục khác để đảm bảo kế hoạch tin bài cho toàn trang: Không có ý thức phối hợp: trừ 2 - 3 điểm/lần', 5, 5, 20, '2016-05-17 20:38:45', '2016-05-17 20:38:45', NULL, 2),
(242, 'Phối hợp với các chuyên mục khác để đảm bảo kế hoạch tin bài cho toàn trang: Không có ý thức phối hợp: trừ 2 - 3 điểm/lần', 5, 6, 23, '2016-05-17 20:39:08', '2016-05-17 20:39:08', NULL, 2),
(243, 'Phối hợp với các chuyên mục khác để đảm bảo kế hoạch tin bài cho toàn trang: Không có ý thức phối hợp: trừ 2 - 3 điểm/lần', 5, 6, 24, '2016-05-17 20:39:19', '2016-05-17 20:39:19', NULL, 2),
(244, 'Phối hợp với các đơn vị  khác trong đơn vị để đảm bảo kế hoạch tin bài cho toàn trang :  Có phối hợp nhưng chưa chặt chẽ, không đảm bảo kế hoạch tin bài cho toàn trang, bị lãnh đạo Ban nhắc nhở: trừ 1 - 2 điểm', 5, 5, 19, '2016-05-17 20:39:46', '2016-05-17 20:39:46', NULL, 1),
(245, 'Phối hợp với các đơn vị  khác trong đơn vị để đảm bảo kế hoạch tin bài cho toàn trang :  Có phối hợp nhưng chưa chặt chẽ, không đảm bảo kế hoạch tin bài cho toàn trang, bị lãnh đạo Ban nhắc nhở: trừ 1 - 2 điểm', 5, 5, 20, '2016-05-17 20:39:58', '2016-05-17 20:39:58', NULL, 1),
(246, 'Phối hợp với các đơn vị  khác trong đơn vị để đảm bảo kế hoạch tin bài cho toàn trang :  Có phối hợp nhưng chưa chặt chẽ, không đảm bảo kế hoạch tin bài cho toàn trang, bị lãnh đạo Ban nhắc nhở: trừ 1 - 2 điểm', 5, 6, 23, '2016-05-17 20:40:11', '2016-05-17 20:40:11', NULL, 1),
(247, 'Phối hợp với các đơn vị  khác trong đơn vị để đảm bảo kế hoạch tin bài cho toàn trang :  Có phối hợp nhưng chưa chặt chẽ, không đảm bảo kế hoạch tin bài cho toàn trang, bị lãnh đạo Ban nhắc nhở: trừ 1 - 2 điểm', 5, 5, 20, '2016-05-17 20:41:18', '2016-05-17 20:41:18', NULL, 1),
(248, 'Phối hợp với các đơn vị  khác trong đơn vị để đảm bảo kế hoạch tin bài cho toàn trang :  Có phối hợp nhưng chưa chặt chẽ, không đảm bảo kế hoạch tin bài cho toàn trang, bị lãnh đạo Ban nhắc nhở: trừ 1 - 2 điểm', 5, 6, 24, '2016-05-17 20:41:26', '2016-05-17 20:41:26', NULL, 1),
(249, 'Phối hợp với các đơn vị  khác trong đơn vị để đảm bảo kế hoạch tin bài cho toàn trang :  Có phối hợp nhưng chưa chặt chẽ, không đảm bảo kế hoạch tin bài cho toàn trang, bị lãnh đạo Ban nhắc nhở: trừ 1 - 2 điểm', 5, 6, 23, '2016-05-17 20:41:37', '2016-05-17 20:41:37', NULL, 1),
(250, 'Phối hợp với các đơn vị  khác trong đơn vị để đảm bảo kế hoạch tin bài cho toàn trang :  Không có ý thức phối hợp: trừ 2-4 điểm', 5, 5, 19, '2016-05-17 20:42:17', '2016-05-17 20:42:17', NULL, 2),
(251, 'Phối hợp với các đơn vị  khác trong đơn vị để đảm bảo kế hoạch tin bài cho toàn trang :  Không có ý thức phối hợp: trừ 2-4 điểm', 5, 5, 20, '2016-05-17 20:42:28', '2016-05-17 20:42:28', NULL, 2),
(252, 'Phối hợp với các đơn vị  khác trong đơn vị để đảm bảo kế hoạch tin bài cho toàn trang :  Không có ý thức phối hợp: trừ 2-4 điểm', 5, 6, 23, '2016-05-17 20:42:37', '2016-05-17 20:42:37', NULL, 2),
(253, 'Phối hợp với các đơn vị  khác trong đơn vị để đảm bảo kế hoạch tin bài cho toàn trang :  Không có ý thức phối hợp: trừ 2-4 điểm', 5, 6, 24, '2016-05-17 20:42:46', '2016-05-17 20:42:46', NULL, 2),
(254, 'Tham gia xây dựng kế hoạch tuyên truyền cho các sự kiện cụ thể trên báo điện tử VTV News theo định hướng của Ban biên tập : Có xây dựng kế hoạch nhưng còn sơ sài, không đảm bảo chất lượng, thiếu sự tìm tòi, bị lãnh đạo Phòng nhắc nhở: trừ 1 - 2 điểm/lần', 5, 5, 19, '2016-05-17 20:43:17', '2016-05-17 20:43:17', NULL, 1),
(255, 'Tham gia xây dựng kế hoạch tuyên truyền cho các sự kiện cụ thể trên báo điện tử VTV News theo định hướng của Ban biên tập : Có xây dựng kế hoạch nhưng còn sơ sài, không đảm bảo chất lượng, thiếu sự tìm tòi, bị lãnh đạo Phòng nhắc nhở: trừ 1 - 2 điểm/lần', 5, 5, 20, '2016-05-17 20:43:26', '2016-05-17 20:43:26', NULL, 1),
(256, 'Tham gia xây dựng kế hoạch tuyên truyền cho các sự kiện cụ thể trên báo điện tử VTV News theo định hướng của Ban biên tập : Có xây dựng kế hoạch nhưng còn sơ sài, không đảm bảo chất lượng, thiếu sự tìm tòi, bị lãnh đạo Phòng nhắc nhở: trừ 1 - 2 điểm/lần', 5, 6, 23, '2016-05-17 20:43:36', '2016-05-17 20:43:36', NULL, 1),
(257, 'Tham gia xây dựng kế hoạch tuyên truyền cho các sự kiện cụ thể trên báo điện tử VTV News theo định hướng của Ban biên tập : Có xây dựng kế hoạch nhưng còn sơ sài, không đảm bảo chất lượng, thiếu sự tìm tòi, bị lãnh đạo Phòng nhắc nhở: trừ 1 - 2 điểm/lần', 5, 6, 24, '2016-05-17 20:43:46', '2016-05-17 20:43:46', NULL, 1),
(258, 'Tham gia xây dựng kế hoạch tuyên truyền cho các sự kiện cụ thể trên báo điện tử VTV News theo định hướng của Ban biên tập :Không có kế hoạch theo hạn mà không có lý do: trừ 2 - 4 điểm/lần', 5, 5, 19, '2016-05-17 20:44:11', '2016-05-17 20:44:11', NULL, 2),
(259, 'Tham gia xây dựng kế hoạch tuyên truyền cho các sự kiện cụ thể trên báo điện tử VTV News theo định hướng của Ban biên tập :Không có kế hoạch theo hạn mà không có lý do: trừ 2 - 4 điểm/lần', 5, 5, 20, '2016-05-17 20:44:26', '2016-05-17 20:44:26', NULL, 2),
(260, 'Tham gia xây dựng kế hoạch tuyên truyền cho các sự kiện cụ thể trên báo điện tử VTV News theo định hướng của Ban biên tập :Không có kế hoạch theo hạn mà không có lý do: trừ 2 - 4 điểm/lần', 5, 6, 23, '2016-05-17 20:44:40', '2016-05-17 20:44:40', NULL, 2),
(261, 'Tham gia xây dựng kế hoạch tuyên truyền cho các sự kiện cụ thể trên báo điện tử VTV News theo định hướng của Ban biên tập :Không có kế hoạch theo hạn mà không có lý do: trừ 2 - 4 điểm/lần', 5, 6, 23, '2016-05-17 20:44:55', '2016-05-17 20:44:55', NULL, 2),
(262, 'Tham gia xây dựng kế hoạch tuyên truyền cho các sự kiện cụ thể trên báo điện tử VTV News theo định hướng của Ban biên tập :Không có kế hoạch theo hạn mà không có lý do: trừ 2 - 4 điểm/lần', 5, 6, 24, '2016-05-17 20:45:06', '2016-05-17 20:45:06', NULL, 2),
(263, 'Dự thảo các quy chế, quy định theo yêu cầu của Ban phụ trách : Có dự thảo nhưng không đảm bảo chất lượng nhiều lần, bị lãnh đạo phòng nhắc nhở: trừ 1 - 3 điểm/lần', 5, 5, 19, '2016-05-17 20:46:29', '2016-05-17 20:46:29', NULL, 1),
(264, 'Dự thảo các quy chế, quy định theo yêu cầu của Ban phụ trách : Có dự thảo nhưng không đảm bảo chất lượng nhiều lần, bị lãnh đạo phòng nhắc nhở: trừ 1 - 3 điểm/lần', 5, 5, 19, '2016-05-17 20:46:39', '2016-05-17 20:46:39', NULL, 1),
(265, 'Dự thảo các quy chế, quy định theo yêu cầu của Ban phụ trách : Có dự thảo nhưng không đảm bảo chất lượng nhiều lần, bị lãnh đạo phòng nhắc nhở: trừ 1 - 3 điểm/lần', 5, 5, 20, '2016-05-17 20:46:53', '2016-05-17 20:46:53', NULL, 1),
(266, 'Dự thảo các quy chế, quy định theo yêu cầu của Ban phụ trách : Có dự thảo nhưng không đảm bảo chất lượng nhiều lần, bị lãnh đạo phòng nhắc nhở: trừ 1 - 3 điểm/lần', 5, 6, 23, '2016-05-17 20:47:07', '2016-05-17 20:47:07', NULL, 1),
(267, 'Dự thảo các quy chế, quy định theo yêu cầu của Ban phụ trách : Có dự thảo nhưng không đảm bảo chất lượng nhiều lần, bị lãnh đạo phòng nhắc nhở: trừ 1 - 3 điểm/lần', 5, 6, 24, '2016-05-17 20:47:17', '2016-05-17 20:47:17', NULL, 1),
(268, 'Dự thảo các quy chế, quy định theo yêu cầu của Ban phụ trách: Không hoàn thành công việc: trừ 3 - 4 điểm/lần', 5, 5, 19, '2016-05-17 20:51:58', '2016-05-17 20:51:58', NULL, 3),
(269, 'Dự thảo các quy chế, quy định theo yêu cầu của Ban phụ trách: Không hoàn thành công việc: trừ 3 - 4 điểm/lần', 5, 5, 20, '2016-05-17 20:52:14', '2016-05-17 20:52:14', NULL, 3),
(270, 'Dự thảo các quy chế, quy định theo yêu cầu của Ban phụ trách: Không hoàn thành công việc: trừ 3 - 4 điểm/lần', 5, 6, 23, '2016-05-17 20:52:28', '2016-05-17 20:52:28', NULL, 3),
(271, 'Dự thảo các quy chế, quy định theo yêu cầu của Ban phụ trách: Không hoàn thành công việc: trừ 3 - 4 điểm/lần', 5, 6, 24, '2016-05-17 20:52:40', '2016-05-17 20:52:40', NULL, 3),
(272, 'Dự thảo các quy chế, quy định theo yêu cầu của Ban phụ trách: Không hoàn thành công việc: trừ 3 - 4 điểm/lần', 5, 6, 23, '2016-05-17 20:53:10', '2016-05-17 20:53:10', NULL, 3),
(273, 'Dự thảo các quy chế, quy định theo yêu cầu của Ban phụ trách: Không hoàn thành công việc: trừ 3 - 4 điểm/lần', 5, 6, 24, '2016-05-17 20:53:21', '2016-05-17 20:53:21', NULL, 3),
(274, 'Tham gia hướng dẫn các CTV theo yêu cầu của Ban phụ trách : Có hướng dẫn nhưng sát sao, nên không đánh giá được về CTV: trừ 1-2 điểm/lần', 5, 5, 19, '2016-05-17 20:53:48', '2016-05-17 20:53:48', NULL, 1),
(275, 'Tham gia hướng dẫn các CTV theo yêu cầu của Ban phụ trách Có hướng dẫn nhưng sát sao, nên không đánh giá được về CTV: trừ 1-2 điểm/lần', 5, 5, 20, '2016-05-17 20:53:58', '2016-05-17 20:53:58', NULL, 1),
(276, 'Tham gia hướng dẫn các CTV theo yêu cầu của Ban phụ trách Có hướng dẫn nhưng sát sao, nên không đánh giá được về CTV: trừ 1-2 điểm/lần', 5, 6, 23, '2016-05-17 20:54:14', '2016-05-17 20:54:14', NULL, 1),
(277, 'Tham gia hướng dẫn các CTV theo yêu cầu của Ban phụ trách Có hướng dẫn nhưng sát sao, nên không đánh giá được về CTV: trừ 1-2 điểm/lần', 5, 6, 24, '2016-05-17 20:54:25', '2016-05-17 20:54:25', NULL, 1),
(278, 'Tham gia hướng dẫn các CTV theo yêu cầu của Ban phụ trách : Hướng dẫn cho qua, không có kết quả gửi về lãnh đạo phòng, không đánh giá được CTV: trừ 2-3 điểm/lần', 5, 5, 19, '2016-05-17 20:54:50', '2016-05-17 20:54:50', NULL, 2),
(279, 'Tham gia hướng dẫn các CTV theo yêu cầu của Ban phụ trách : Hướng dẫn cho qua, không có kết quả gửi về lãnh đạo phòng, không đánh giá được CTV: trừ 2-3 điểm/lần', 5, 5, 20, '2016-05-17 20:55:22', '2016-05-17 20:55:22', NULL, 2),
(280, 'Tham gia hướng dẫn các CTV theo yêu cầu của Ban phụ trách : Hướng dẫn cho qua, không có kết quả gửi về lãnh đạo phòng, không đánh giá được CTV: trừ 2-3 điểm/lần', 5, 6, 23, '2016-05-17 20:55:34', '2016-05-17 20:55:34', NULL, 2),
(281, 'Tham gia hướng dẫn các CTV theo yêu cầu của Ban phụ trách : Hướng dẫn cho qua, không có kết quả gửi về lãnh đạo phòng, không đánh giá được CTV: trừ 2-3 điểm/lần', 5, 6, 24, '2016-05-17 20:55:43', '2016-05-17 20:55:43', NULL, 2),
(282, 'Thực hiện các công việc đột xuất khác: Có thực hiện nhưng chất lượng không đảm bảo, bị lãnh đạo phòng nhắc nhở nhưng không gây hậu quả nghiêm trọng: trừ 1 - 2 điểm/lần', 5, 5, 19, '2016-05-17 21:01:20', '2016-05-17 21:01:20', NULL, 1),
(283, 'Thực hiện các công việc đột xuất khác: Có thực hiện nhưng chất lượng không đảm bảo, bị lãnh đạo phòng nhắc nhở nhưng không gây hậu quả nghiêm trọng: trừ 1 - 2 điểm/lần', 5, 5, 20, '2016-05-17 21:01:32', '2016-05-17 21:01:32', NULL, 1),
(284, 'Thực hiện các công việc đột xuất khác: Có thực hiện nhưng chất lượng không đảm bảo, bị lãnh đạo phòng nhắc nhở nhưng không gây hậu quả nghiêm trọng: trừ 1 - 2 điểm/lần', 5, 6, 23, '2016-05-17 21:01:43', '2016-05-17 21:01:43', NULL, 1),
(285, 'Thực hiện các công việc đột xuất khác: Có thực hiện nhưng chất lượng không đảm bảo, bị lãnh đạo phòng nhắc nhở nhưng không gây hậu quả nghiêm trọng: trừ 1 - 2 điểm/lần', 5, 6, 23, '2016-05-17 21:01:57', '2016-05-17 21:01:57', NULL, 1),
(286, 'Thực hiện các công việc đột xuất khác: Có thực hiện nhưng chất lượng không đảm bảo, bị lãnh đạo phòng nhắc nhở nhưng không gây hậu quả nghiêm trọng: trừ 1 - 2 điểm/lần', 5, 6, 24, '2016-05-17 21:02:07', '2016-05-17 21:02:07', NULL, 1),
(287, 'Thực hiện các công việc đột xuất khác:Không thực hiện mà không có lý do: trừ 2 - 4 điểm/lần', 5, 5, 19, '2016-05-17 21:02:28', '2016-05-17 21:02:28', NULL, 2),
(288, 'Thực hiện các công việc đột xuất khác:Không thực hiện mà không có lý do: trừ 2 - 4 điểm/lần', 5, 5, 20, '2016-05-17 21:02:40', '2016-05-17 21:02:40', NULL, 2),
(289, 'Thực hiện các công việc đột xuất khác:Không thực hiện mà không có lý do: trừ 2 - 4 điểm/lần', 5, 6, 23, '2016-05-17 21:02:56', '2016-05-17 21:02:56', NULL, 2),
(290, 'Thực hiện các công việc đột xuất khác:Không thực hiện mà không có lý do: trừ 2 - 4 điểm/lần', 5, 5, 20, '2016-05-17 21:03:06', '2016-05-17 21:03:06', NULL, 2),
(291, 'Sai sót khi làm thủ tục tổ chức, cán bộ, thi đua khen thưởng; Vi phạm quy trình, quy định chuyên môn: Không gây hậu quả: trừ 1 - 3 điểm', 5, 7, 25, '2016-05-17 23:17:32', '2016-05-17 23:17:32', NULL, 1),
(292, 'Sai sót khi làm thủ tục tổ chức, cán bộ, thi đua khen thưởng; Vi phạm quy trình, quy định chuyên môn: Gây hậu quả, ảnh hưởng đến tập thể, cá nhân: trừ 4 - 7 điểm', 5, 7, 25, '2016-05-18 06:14:50', '2016-05-17 23:19:05', NULL, 4),
(293, 'Soạn thảo văn bản phát hiện ra sai sót khi Lãnh đạo đã ký, ban hành: Gây hậu quả trong VTV NEWS: Trừ 2 – 4 điểm', 5, 7, 25, '2016-05-17 23:19:23', '2016-05-17 23:19:23', NULL, 2),
(294, 'Soạn thảo văn bản phát hiện ra sai sót khi Lãnh đạo đã ký, ban hành: Gây hậu quả trong Đài: Trừ 4 – 6 điểm', 5, 7, 25, '2016-05-17 23:19:44', '2016-05-17 23:19:44', NULL, 4),
(295, 'Soạn thảo văn bản phát hiện ra sai sót khi Lãnh đạo đã ký, ban hành: Gây hậu quả nghiêm trọng: trừ 7-11 điểm', 5, 7, 25, '2016-05-17 23:20:04', '2016-05-17 23:20:04', NULL, 7),
(296, 'Sai sót trong chỉ đạo điều hành, thực hiện nhiệm vụ  bị Tổng biên tập nhắc nhở, phê bình: Lỗi trung bình trừ 3 - 5 điểm/chương trình', 5, 7, 25, '2016-05-17 23:20:26', '2016-05-17 23:20:26', NULL, 3),
(297, 'Sai sót trong chỉ đạo điều hành, thực hiện nhiệm vụ  bị Tổng biên tập nhắc nhở, phê bình: Lỗi nặng trừ 8 - 10 điểm/chương trình', 5, 7, 25, '2016-05-17 23:20:45', '2016-05-17 23:20:45', NULL, 8),
(298, 'Sai sót trong chỉ đạo điều hành, thực hiện nhiệm vụ  bị Tổng biên tập nhắc nhở, phê bình: Lỗi nghiêm trọng trừ 15 - 20 điểm/chương trình', 5, 7, 25, '2016-05-17 23:21:05', '2016-05-17 23:21:05', NULL, 15),
(299, 'Phân công công việc bất hợp lý : Mức độ trung bình: trừ 5 điểm', 5, 7, 25, '2016-05-17 23:21:32', '2016-05-17 23:21:32', NULL, 5),
(300, 'Phân công công việc bất hợp lý: Mức độ nghiêm trọng: trừ 10 điểm', 5, 7, 25, '2016-05-17 23:21:54', '2016-05-17 23:21:54', NULL, 10),
(301, 'Thất lạc hồ sơ quản lý tài sản của VTV NEWS : trừ 2 điểm/hồ sơ', 5, 7, 28, '2016-05-18 00:01:20', '2016-05-18 00:01:20', NULL, 2),
(302, 'Thất lạc hồ sơ viên chức, người lao động : trừ 12 điểm/hồ sơ', 5, 7, 28, '2016-05-18 00:01:32', '2016-05-18 00:01:32', NULL, 12),
(303, 'Điều độ sản xuất không đúng, chậm làm ảnh hưởng sản xuất: Mức độ nhẹ : trừ 2 điểm', 5, 7, 28, '2016-05-18 00:01:55', '2016-05-18 00:01:55', NULL, 2),
(304, 'Điều độ sản xuất không đúng, chậm làm ảnh hưởng sản xuất:Mức độ trung bình : trừ 3 điểm', 5, 7, 28, '2016-05-18 00:02:18', '2016-05-18 00:02:18', NULL, 3),
(305, 'Điều độ sản xuất không đúng, chậm làm ảnh hưởng sản xuất: Mức độ nghiêm trọng : trừ 4-5 điểm.', 5, 7, 28, '2016-05-18 00:02:37', '2016-05-18 00:02:37', NULL, 4),
(306, 'Chậm đối chiếu lịch sản xuất làm ảnh hưởng tiến độ thanh toán lương sản phẩm : Trừ 3 điểm/lần.', 5, 7, 28, '2016-05-18 00:02:50', '2016-05-18 00:02:50', NULL, 3),
(307, 'Làm thất lạc văn bản đi, đến :Mức độ nhẹ : trừ 1 điểm/lần. ', 5, 7, 28, '2016-05-18 00:03:10', '2016-05-18 00:03:10', NULL, 1),
(308, 'Làm thất lạc văn bản đi, đến : Mức độ trung bình: 2 điểm/lần', 5, 7, 28, '2016-05-18 00:03:30', '2016-05-18 00:03:30', NULL, 2),
(309, 'Làm thất lạc văn bản đi, đến : Mức độ nghiêm trọng : 10 điểm/lần ', 5, 7, 28, '2016-05-18 00:03:54', '2016-05-18 00:03:54', NULL, 10),
(310, 'Không vào sổ, làm thất lạc công văn đi, đến ảnh hưởng đến công việc của đơn vị : Không vào sổ công văn đi, đến sau một buổi làm việc trừ 1 – 4 điểm', 5, 7, 28, '2016-05-18 00:04:26', '2016-05-18 00:04:26', NULL, 1),
(311, 'Không vào sổ, làm thất lạc công văn đi, đến ảnh hưởng đến công việc của đơn vị : Làm thất lạc công văn đi, đến ảnh hưởng đến công việc của chỉ đạo của lãnh đạo Ban trừ 5 – 10 điểm', 5, 7, 28, '2016-05-18 00:05:04', '2016-05-18 00:05:04', NULL, 5),
(312, 'Không gửi công văn đi, không sao gửi công văn đến kịp thời theo chỉ đạo của lãnh đạo đơn vị 10 điểm Lỗi nhẹ trừ 2 – 5 điểm', 5, 7, 28, '2016-05-18 00:05:25', '2016-05-18 00:05:25', NULL, 2),
(313, 'Không gửi công văn đi, không sao gửi công văn đến kịp thời theo chỉ đạo của lãnh đạo đơn vị 10 điểm Lỗi nặng trừ 6 – 10 điểm', 5, 7, 28, '2016-05-18 00:05:45', '2016-05-18 00:05:45', NULL, 6),
(314, 'Quản lý và sử dụng con dấu không đúng quy định Đóng dấu văn  bản khi chưa có chữ ký nháy của chuyên viên rà soát trừ 1 – 3 điểm', 5, 7, 28, '2016-05-18 00:06:15', '2016-05-18 00:06:15', NULL, 1),
(315, 'Quản lý và sử dụng con dấu không đúng quy định Sai sót trong quản lý con dấu làm ảnh hưởng đến Ban trừ 4 -10 điểm', 5, 7, 28, '2016-05-18 00:06:35', '2016-05-18 00:06:35', NULL, 4),
(316, 'Không hoàn thành nhiệm vụ giúp việc hành chính để Lãnh đạo nhắc nhở : trừ 2 điểm/việc.', 5, 7, 28, '2016-05-18 00:06:50', '2016-05-18 00:06:50', NULL, 2),
(317, 'Chậm đôn đốc các phòng thực hiện chỉ đạo của Lãnh đạo VTV NEWS: trừ 0,5 điểm/việc; không thực hiện: trừ 1 điểm/việc.', 5, 7, 28, '2016-05-18 00:07:03', '2016-05-18 00:07:03', NULL, 1),
(318, 'Sai số liệu chi tiết: Trừ từ 1-3 đểm', 5, 7, 27, '2016-05-18 00:41:57', '2016-05-18 00:41:57', NULL, 1),
(319, 'Sai số liệu tổng hợp: Trừ từ 2-5 điểm', 5, 7, 27, '2016-05-18 00:42:10', '2016-05-18 00:42:10', NULL, 2),
(320, 'Sai quy trình thực hiện: Trừ 2 điểm', 5, 7, 27, '2016-05-18 00:42:22', '2016-05-18 00:42:22', NULL, 2),
(321, 'Sai quy trình làm việc ảnh hưởng đến chất lượng công việc của người thực hiện tiếp theo: Trừ 2 - 5 điểm', 5, 7, 27, '2016-05-18 00:42:39', '2016-05-18 00:42:39', NULL, 2),
(322, 'Không đôn đốc các phòng gửi số liệu dẫn đến không có dữ liệu để làm việc: Trừ 5 điểm', 5, 7, 27, '2016-05-18 00:43:05', '2016-05-18 00:43:05', NULL, 5),
(323, 'Không thực hiện đúng chế độ báo cáo: Trừ từ 1-3 điểm', 5, 7, 27, '2016-05-18 00:43:23', '2016-05-18 00:43:23', NULL, 1),
(324, 'Phát nhầm tiền bị khiếu nại: Trừ từ 1-3 đểm', 5, 7, 30, '2016-05-18 00:51:28', '2016-05-18 00:51:28', NULL, 1),
(325, 'Để lẫn chứng từ khi phải đưa cho nhiều người ký nhận: Trừ từ 2-5 điểm', 5, 7, 30, '2016-05-18 00:51:44', '2016-05-18 00:51:44', NULL, 2),
(326, 'Sai quy trình thực hiện: Trừ 2 điểm', 5, 7, 30, '2016-05-18 00:52:18', '2016-05-18 00:52:18', NULL, 2),
(327, 'Sai quy trình làm việc ảnh hưởng đến chất lượng công việc của người thực hiện tiếp theo: Trừ 2 - 5 điểm', 5, 7, 30, '2016-05-18 00:52:32', '2016-05-18 00:52:32', NULL, 2),
(328, ' Không đôn đốc các phòng gửi số liệu dẫn đến không có dữ liệu để làm việc: Trừ 5 điểm', 5, 7, 30, '2016-05-18 00:52:48', '2016-05-18 00:52:48', NULL, 5),
(329, 'Không thực hiện đúng chế độ báo cáo: Trừ từ 1-3 điểm', 5, 7, 30, '2016-05-18 00:53:01', '2016-05-18 00:53:01', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chatluong_taikhoan_thang`
--

CREATE TABLE `chatluong_taikhoan_thang` (
  `_id` int(11) NOT NULL,
  `chatluong_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diemtru` int(11) NOT NULL,
  `thang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nguoigiao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `cl_tutru` int(11) DEFAULT NULL,
  `cl_phongtru` int(11) DEFAULT NULL,
  `cl_bantru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chatluong_taikhoan_thang`
--

INSERT INTO `chatluong_taikhoan_thang` (`_id`, `chatluong_id`, `name`, `diemtru`, `thang_id`, `user_id`, `nguoigiao`, `ghichu`, `created_at`, `updated_at`, `deleted_at`, `cl_tutru`, `cl_phongtru`, `cl_bantru`) VALUES
(1, 1, 'Chất lượng 1', 2, 4, 4, '', 'ghi chú chất lượng 1', '2016-05-14 09:14:05', '2016-05-14 02:14:05', '2016-05-14 02:14:05', 1, 1, 1),
(2, 1, 'Công việc không đạt yêu cầu', 5, 4, 4, '', 'ghi chú chất lượng 1', '2016-05-14 15:59:17', '2016-05-14 08:59:17', '2016-05-14 08:59:17', 4, 4, 4),
(3, 1, 'Công việc không đạt yêu cầu', 5, 4, 4, '', 'sai sót trong quá trình phát sóng', '2016-05-14 08:59:11', '2016-05-14 08:59:11', NULL, 3, 3, 3),
(4, 2, 'Chất lượng nhân viên ', 2, 4, 28, '', 'Chất Lượng Trừ 2 Điểm', '2016-05-15 03:34:53', '2016-05-14 20:34:53', '2016-05-14 20:34:53', 1, 3, 3),
(5, 2, 'Chất lượng nhân viên ', 2, 4, 28, '', 'Chat Luong Cong Viec', '2016-05-15 03:57:51', '2016-05-14 20:57:51', NULL, NULL, 2, 2),
(6, 14, 'Không đảm bảo chất lượng kế hoạch tin bài theo tuần tháng cho báo điện tử VTVNews (Có kế hoạch tin bài chung nhưng thiếu những mảng chương trình, sự kiện lớn, ảnh hưởng tới định hướng tuyên truyền của cả Ban, Đài: trừ 2 điểm)', 2, 0, 56, '', '', '2016-05-16 19:15:21', '2016-05-16 19:15:21', NULL, NULL, NULL, 1),
(7, 14, 'Không đảm bảo chất lượng kế hoạch tin bài theo tuần tháng cho báo điện tử VTVNews (Có kế hoạch tin bài chung nhưng thiếu những mảng chương trình, sự kiện lớn, ảnh hưởng tới định hướng tuyên truyền của cả Ban, Đài: trừ 2 điểm)', 2, 4, 56, '', '', '2016-05-17 02:21:04', '2016-05-16 19:25:18', NULL, NULL, NULL, 5),
(8, 293, 'Soạn thảo văn bản phát hiện ra sai sót khi Lãnh đạo đã ký, ban hành: Gây hậu quả trong VTV NEWS: Trừ 2 – 4 điểm', 2, 0, 65, '', '', '2016-05-23 20:37:40', '2016-05-23 20:37:40', NULL, 2, 2, 2),
(9, 319, 'Sai số liệu tổng hợp: Trừ từ 2-5 điểm', 2, 5, 71, '', 'vad', '2016-05-26 07:48:57', '2016-05-26 00:48:57', NULL, 2, 0, 0),
(10, 293, 'Soạn thảo văn bản phát hiện ra sai sót khi Lãnh đạo đã ký, ban hành: Gây hậu quả trong VTV NEWS: Trừ 2 – 4 điểm', 2, 5, 65, '', '', '2016-05-26 07:48:02', '2016-05-26 00:48:02', NULL, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `chucdanh`
--

CREATE TABLE `chucdanh` (
  `_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `room_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chucdanh`
--

INSERT INTO `chucdanh` (`_id`, `name`, `description`, `room_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Trưởng Ban', 'Trưởng Ban', 1, '2016-05-05 18:38:29', '2016-05-05 18:38:29', NULL),
(7, 'Trưởng Phòng', 'Trưởng Phòng', 2, '2016-05-06 02:02:37', '2016-05-05 19:06:00', NULL),
(8, 'Phó Phòng', 'Phó Phòng', 2, '2016-05-05 20:36:44', '2016-05-05 20:36:44', NULL),
(9, 'Nhân Viên', 'Nhân Viên', 2, '2016-05-05 20:36:54', '2016-05-05 20:36:54', NULL),
(10, 'Phó Trưởng Ban', 'Phó Trưởng Ban', 1, '2016-05-05 20:37:06', '2016-05-05 20:37:06', NULL),
(11, 'Tổng biên tập', 'Tổng biên tập', 3, '2016-05-16 01:15:01', '2016-05-16 01:15:01', NULL),
(12, 'Phó trưởng phòng', 'Phó trưởng phòng', 4, '2016-05-16 01:20:52', '2016-05-16 01:20:52', NULL),
(13, 'Kỹ sư cao đẳng', 'Kỹ sư cao đẳng', 4, '2016-05-16 01:21:06', '2016-05-16 01:21:06', NULL),
(14, 'Kỹ sư', 'Kỹ sư', 4, '2016-05-16 01:21:15', '2016-05-16 01:21:15', NULL),
(15, 'Biên tập viên', 'Biên tập viên', 4, '2016-05-16 01:21:27', '2016-05-16 01:21:27', NULL),
(16, 'Chuyên viên', 'Chuyên viên', 4, '2016-05-16 01:21:48', '2016-05-16 01:21:48', NULL),
(17, 'Trưởng phòng', 'Trưởng phòng', 5, '2016-05-16 01:22:50', '2016-05-16 01:22:50', NULL),
(18, 'Phó trưởng phòng', 'Phó trưởng phòng', 5, '2016-05-16 01:23:03', '2016-05-16 01:23:03', NULL),
(19, 'Biên tập viên', 'Biên tập viên', 5, '2016-05-16 01:23:18', '2016-05-16 01:23:18', NULL),
(20, 'Phóng viên', 'Phóng viên', 5, '2016-05-16 01:23:40', '2016-05-16 01:23:40', NULL),
(21, 'Trưởng phòng', 'Trưởng phòng', 6, '2016-05-16 01:23:59', '2016-05-16 01:23:59', NULL),
(22, 'Biên tập viên chính', 'Biên tập viên chính', 6, '2016-05-16 01:24:23', '2016-05-16 01:24:23', NULL),
(23, 'Biên tập viên', 'Biên tập viên', 6, '2016-05-16 01:24:36', '2016-05-16 01:24:36', NULL),
(24, 'Phóng viên', 'Phóng viên', 6, '2016-05-16 01:25:00', '2016-05-16 01:25:00', NULL),
(25, 'Trưởng phòng', 'Trưởng phòng', 7, '2016-05-16 01:25:19', '2016-05-16 01:25:19', NULL),
(26, 'Phó trưởng phòng ( Kế toán trưởng)', 'Phó trưởng phòng ( Kế toán trưởng)', 7, '2016-05-16 01:25:47', '2016-05-16 01:25:47', NULL),
(27, 'Kế toán viên', 'Kế toán viên', 7, '2016-05-16 01:26:00', '2016-05-16 01:26:00', NULL),
(28, 'Chuyên viên', 'Chuyên viên', 7, '2016-05-16 01:26:13', '2016-05-16 01:26:13', NULL),
(29, 'Phó Trưởng Phòng', 'Phó Trưởng Phòng', 6, '2016-05-17 18:33:48', '2016-05-17 18:33:48', NULL),
(30, 'Thủ Quỹ', 'Thủ Quỹ', 7, '2016-05-18 00:48:32', '2016-05-18 00:48:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chuyenmon`
--

CREATE TABLE `chuyenmon` (
  `_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `chucdanh_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `heso` int(11) NOT NULL,
  `macdinh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chuyenmon`
--

INSERT INTO `chuyenmon` (`_id`, `name`, `level_id`, `room_id`, `chucdanh_id`, `created_at`, `updated_at`, `deleted_at`, `heso`, `macdinh`) VALUES
(1, 'Chức phát sóng các chương trình đặc biệt trong dịp tết nguyên đán', 5, 1, 6, '2016-05-25 10:34:17', '2016-05-06 22:21:30', NULL, 5, 0),
(2, 'Chức phát sóng các chương trình đặc biệt trong dịp tết nguyên đán', 3, 1, 1, '2016-05-25 10:34:17', '0000-00-00 00:00:00', NULL, 5, 0),
(3, 'Công Việc Chuyên Môn 1', 6, 2, 7, '2016-05-25 10:34:17', '2016-05-06 07:37:22', NULL, 9, 0),
(4, 'CV1', 5, 1, 6, '2016-05-25 10:34:17', '2016-05-06 22:40:45', NULL, 1, 0),
(5, 'cv2', 5, 1, 6, '2016-05-25 10:34:17', '2016-05-06 22:41:23', NULL, 1, 0),
(6, 'cv1', 5, 1, 6, '2016-05-25 10:34:17', '0000-00-00 00:00:00', NULL, 1, 0),
(7, 'cv1', 5, 1, 6, '2016-05-25 10:34:17', '0000-00-00 00:00:00', NULL, 1, 0),
(8, 'cv1', 5, 1, 6, '2016-05-25 10:34:17', '0000-00-00 00:00:00', NULL, 1, 0),
(9, 'cv1', 5, 1, 6, '2016-05-25 10:34:17', '0000-00-00 00:00:00', NULL, 1, 0),
(10, 'cv1', 5, 1, 6, '2016-05-25 10:34:17', '0000-00-00 00:00:00', NULL, 1, 0),
(11, 'cv1', 5, 1, 6, '2016-05-25 10:34:17', '0000-00-00 00:00:00', NULL, 1, 0),
(12, 'cv1', 5, 1, 6, '2016-05-25 10:34:17', '0000-00-00 00:00:00', NULL, 1, 0),
(13, 'cv1', 5, 1, 6, '2016-05-25 10:34:17', '0000-00-00 00:00:00', NULL, 1, 0),
(14, 'cv1', 5, 1, 6, '2016-05-25 10:34:17', '0000-00-00 00:00:00', NULL, 1, 0),
(15, 'cv1', 5, 1, 6, '2016-05-25 10:34:17', '0000-00-00 00:00:00', NULL, 1, 0),
(16, 'cv1', 5, 1, 6, '2016-05-25 10:34:17', '0000-00-00 00:00:00', NULL, 1, 0),
(17, 'Công Việc dành cho nhân viên', 5, 2, 9, '2016-05-25 10:34:17', '2016-05-09 01:21:42', NULL, 1, 0),
(18, 'Công việc cho nhân viên bậc 3', 5, 2, 9, '2016-05-25 10:34:17', '2016-05-09 18:30:11', NULL, 3, 0),
(19, 'Công việc 3 cho nhân viên bậc 3', 5, 2, 9, '2016-05-25 10:34:17', '2016-05-09 18:30:32', NULL, 3, 0),
(20, 'Công việc 4 cho nhân viên bậc 3', 5, 2, 9, '2016-05-25 10:34:17', '2016-05-09 18:30:58', NULL, 3, 0),
(21, 'Duyệt nội dung tin, bài, ảnh, chương trình của VTV NEWS sản xuất', 5, 3, 11, '2016-05-25 10:34:17', '2016-05-16 02:20:28', NULL, 10, 0),
(22, 'Duyệt nội dung các chương trình cấp Đài', 5, 3, 11, '2016-05-25 10:34:17', '2016-05-16 02:21:18', NULL, 15, 0),
(23, 'Định hướng nội dung tuyên truyền của VTV NEWS', 5, 3, 11, '2016-05-25 10:34:17', '2016-05-16 02:21:57', NULL, 5, 0),
(24, 'Xây dựng kế hoạch sản xuất của VTV NEWS hàng tháng', 5, 3, 11, '2016-05-25 10:34:17', '2016-05-16 02:22:53', NULL, 5, 0),
(25, 'Thẩm định tin, bài, ảnh trên các ấn phẩm của VTV NEWS', 5, 3, 11, '2016-05-25 10:34:17', '2016-05-16 02:23:51', NULL, 5, 0),
(26, 'Trực sóng', 5, 3, 11, '2016-05-25 10:34:17', '2016-05-16 02:27:15', NULL, 5, 0),
(27, 'Đàm phán với các đối tác trong và ngoài Đài về việc mở rộng kinh doanh, quảng cáo ', 5, 3, 11, '2016-05-25 10:34:17', '2016-05-16 02:23:51', NULL, 10, 0),
(28, 'Đánh giá hiệu quả  kinh doanh phát hành theo từng tháng, quý, năm', 5, 3, 11, '2016-05-25 10:34:17', '2016-05-16 02:29:59', NULL, 5, 0),
(29, 'Đánh giá hiệu quả quy trình kinh doanh, kế hoạch định hướng và mục tiêu trung và dài hạn', 5, 3, 11, '2016-05-25 10:34:17', '2016-05-16 02:30:42', NULL, 5, 0),
(30, 'Chỉ đạo kiểm soát phát triển hoạt động kinh doanh của đơn vị', 5, 3, 11, '2016-05-25 10:34:17', '2016-05-16 02:31:32', NULL, 5, 0),
(31, 'Xây dựng Quy chế làm việc và các quy định nội bộ của VTV NEWS', 5, 3, 11, '2016-05-25 10:34:17', '2016-05-16 02:32:05', NULL, 1, 0),
(32, 'Tham gia xây dựng quy chế, quy định, quy trình của Đài', 5, 3, 11, '2016-05-25 10:34:17', '2016-05-16 02:32:34', NULL, 1, 0),
(33, 'Chủ trì xây dựng kế hoạch sản xuất của VTV NEWS', 5, 3, 11, '2016-05-25 10:34:17', '2016-05-16 02:34:57', NULL, 2, 0),
(34, 'Tổng kết, đánh giá hàng năm công việc của toàn VTV NEWS', 5, 3, 11, '2016-05-25 10:34:17', '2016-05-16 02:35:18', NULL, 2, 0),
(35, 'Xây dựng quy hoạch, chiến lược phát triển của VTV NEWS', 5, 3, 11, '2016-05-25 10:34:17', '2016-05-16 02:35:59', NULL, 2, 0),
(36, 'Tổ chức sản xuất tin bài theo tuần, tháng cho báo điện tử VTVNews', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:28:35', NULL, 10, 0),
(37, 'Tổ chức sản xuất tin bài theo tuần, tháng cho báo điện tử VTVNews', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:31:11', NULL, 10, 0),
(38, 'Phân công công việc cụ thể trong quy trình sản xuất tin bài đối với các thành viên trong phòng', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:32:00', NULL, 5, 0),
(39, 'Phân công công việc cụ thể trong quy trình sản xuất tin bài đối với các thành viên trong phòng', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:32:12', NULL, 5, 0),
(40, 'Rà soát kế hoạch của các cá nhân,  xây dựng kế hoạch tổng thể theo tuần, tháng cho báo điện tử', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:33:14', NULL, 10, 0),
(41, 'Chủ trì họp phòng', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:34:24', NULL, 1, 0),
(42, 'Chủ trì họp phòng', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:34:42', NULL, 1, 0),
(43, 'Rà soát kế hoạch của các cá nhân,  xây dựng kế hoạch tổng thể theo tuần, tháng cho báo điện tử', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:35:30', NULL, 10, 0),
(44, 'Chủ trì họp chuyên môn theo định kỳ', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:36:10', NULL, 2, 0),
(45, 'Chủ trì họp chuyên môn theo định kỳ', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:36:21', NULL, 2, 0),
(46, 'Sơ kết và tổng kết công công tác tháng và năm cấp phòng', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:37:15', NULL, 2, 0),
(47, 'Sơ kết và tổng kết công công tác tháng và năm cấp phòng', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:37:31', NULL, 2, 0),
(48, 'Tham gia trực Thư ký tòa soạn', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:38:20', NULL, 10, 0),
(49, 'Tham gia trực Thư ký tòa soạn', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:38:41', NULL, 10, 0),
(50, 'Ghi chép, nhận xét nhật ký Thư ký tòa soạ n theo ngày trực', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:39:23', NULL, 5, 0),
(51, 'Ghi chép, nhận xét nhật ký Thư ký tòa soạ n theo ngày trực', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:39:36', NULL, 5, 0),
(52, 'Tổng  hợp  nhật  ký  của  các  Thư  ký  tòa  soạ n  theo  tuần, tháng, phục vụ cho công tác đánh giá chuyên môn', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:40:17', NULL, 3, 0),
(53, 'Tổng  hợp  nhật  ký  của  các  Thư  ký  tòa  soạ n  theo  tuần, tháng, phục vụ cho công tác đánh giá chuyên môn', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:40:27', NULL, 3, 0),
(54, 'Làm báo cáo phòng theo tuần, tháng', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:40:47', NULL, 2, 0),
(55, 'Làm báo cáo phòng theo tuần, tháng', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:40:58', NULL, 2, 0),
(56, 'Rà soát, tổng hợp kế hoạch tin bài phối hợp của các đơn vị trong VTV NEWS', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:41:38', NULL, 5, 0),
(57, 'Rà soát, tổng hợp kế hoạch tin bài phối hợp của các đơn vị trong VTV NEWS', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:41:48', NULL, 5, 0),
(58, 'Tham gia xây dӵng các kế hoạch truyền thông trên các phương tiện của VTV NEWS theo chỉ đạo của lãnh đạo đơn vị', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:42:36', NULL, 10, 0),
(59, 'Tham gia xây dựng các kế hoạ ch truyền thông trên các phương tiện của VTV NEWS theo chỉ đạo của lãnh đạo đơn vị', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:43:13', NULL, 10, 0),
(60, 'Theo dõi tiến độ, tổng  kết, đánh  giá  hiệu  qủa  của  các kế hoạch được giao', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:44:15', NULL, 10, 0),
(61, 'Theo dõi tiến độ, tổng  kết, đánh  giá  hiệu  qủa  của  các kế hoạch được giao', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:44:31', NULL, 10, 0),
(62, 'Thực hiện báo cáo đánh giá  về chất lượng các CTV', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:53:58', NULL, 5, 0),
(63, 'Thực hiện báo cáo đánh giá  về chất lượng các CTV', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:59:14', NULL, 5, 0),
(64, 'Tham  gia  xây  dựng  các  quy  chế,  quy  trình, đề  án  cấp Ban', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:46:12', NULL, 5, 0),
(65, 'Tham  gia  xây  dựng  các  quy  chế,  quy  trình, đề  án  cấp Ban', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:59:47', '2016-05-16 18:59:47', 5, 0),
(66, 'Xây  dựng,  rà soát  các  văn  bản  quy  chế,  quy định  của phòng ', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:47:01', NULL, 5, 0),
(67, 'Xây  dựng,  rà soát  các  văn  bản  quy  chế,  quy định  của phòng ', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:49:06', NULL, 5, 0),
(68, 'Tham  gia  xây  dựng  các  quy  chế,  quy  trình, đề  án  cấp Ban', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:49:52', NULL, 5, 0),
(69, 'Xây  dựng,  rà soát  các  văn  bản  quy  chế,  quy định  của phòng', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:56:30', '2016-05-16 18:56:30', 5, 0),
(70, 'Xây dựng, ra soát các văn bản hành chính của phòng', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:50:48', NULL, 5, 0),
(71, 'Xây dựng, ra soát các văn bản hành chính của phòng', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:51:08', NULL, 5, 0),
(72, 'Thực hiện các công việc đột xuất khác', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-16 18:53:44', NULL, 10, 0),
(73, 'Thực hiện các công việc đột xuất khác', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-16 18:58:33', NULL, 10, 0),
(74, 'Đôn đốc, giám sát thực hiện các quy chế, quy định, quy trình chuyên môn nghiệp vụ', 5, 5, 18, '2016-05-25 10:34:17', '2016-05-17 18:32:26', NULL, 25, 0),
(75, 'Đôn đốc, giám sát thực hiện các quy chế, quy định, quy trình chuyên môn nghiệp vụ', 5, 6, 21, '2016-05-25 10:34:17', '2016-05-17 18:36:47', '2016-05-17 18:36:47', 25, 0),
(76, 'Giám sát toàn bộ nội dung tin bài trên trang', 5, 5, 18, '2016-05-25 10:34:17', '2016-05-17 18:33:09', NULL, 25, 0),
(77, 'Đôn đốc, giám sát thực hiện các quy chế, quy định, quy trình chuyên môn nghiệp vụ', 5, 6, 29, '2016-05-25 10:34:17', '2016-05-17 18:37:13', NULL, 25, 0),
(78, 'Giám sát toàn bộ nội dung tin bài trên trang', 5, 6, 29, '2016-05-25 10:34:17', '2016-05-17 18:37:30', NULL, 25, 0),
(79, 'Ghi chép các điểm cần rút kinh nghiệm theo ngày', 5, 5, 18, '2016-05-25 10:34:17', '2016-05-17 18:40:35', NULL, 15, 0),
(80, 'Ghi chép các điểm cần rút kinh nghiệm theo ngày', 5, 6, 29, '2016-05-25 10:34:17', '2016-05-17 18:40:53', NULL, 15, 0),
(81, 'Trực tiếp thực hiện các công việc chuyên môn của phòng theo lịch trực, lịch sản xuất', 5, 5, 18, '2016-05-25 10:34:17', '2016-05-17 18:41:10', NULL, 5, 0),
(82, 'Trực tiếp thực hiện các công việc chuyên môn của phòng theo lịch trực, lịch sản xuất', 5, 6, 29, '2016-05-25 10:34:17', '2016-05-17 18:41:27', NULL, 5, 0),
(83, 'Giúp Trưởng phòng tham gia đánh giá chất lượng lao động trong phòng hàng tháng theo quy chế', 5, 5, 18, '2016-05-25 10:34:17', '2016-05-17 18:41:44', NULL, 5, 0),
(84, 'Giúp Trưởng phòng tham gia đánh giá chất lượng lao động trong phòng hàng tháng theo quy chế', 5, 6, 29, '2016-05-25 10:34:17', '2016-05-17 18:41:58', NULL, 5, 0),
(85, 'Thực hiện báo cáo giám sát theo tuần, tháng', 5, 5, 18, '2016-05-25 10:34:17', '2016-05-17 18:42:12', NULL, 10, 0),
(86, 'Thực hiện báo cáo giám sát theo tuần, tháng', 5, 6, 29, '2016-05-25 10:34:17', '2016-05-17 18:42:28', NULL, 10, 0),
(87, 'Giúp Trưởng phòng rà soát các văn bản quy chế, quy định của phòng theo phân công', 5, 6, 29, '2016-05-25 10:34:17', '2016-05-17 18:42:44', NULL, 5, 0),
(88, 'Giúp Trưởng phòng rà soát các văn bản quy chế, quy định của phòng theo phân công', 5, 5, 18, '2016-05-25 10:34:17', '2016-05-17 18:42:58', NULL, 5, 0),
(89, 'Giúp Trưởng phòng rà soát các văn bản hành chính của phòng theo phân công', 5, 5, 18, '2016-05-25 10:34:17', '2016-05-17 18:43:10', NULL, 5, 0),
(90, 'Giúp Trưởng phòng rà soát các văn bản hành chính của phòng theo phân công', 5, 6, 29, '2016-05-25 10:34:17', '2016-05-17 18:43:23', NULL, 5, 0),
(91, 'Thực hiện các công việc đột xuất khác', 5, 6, 29, '2016-05-25 10:34:17', '2016-05-17 18:43:40', NULL, 5, 0),
(92, 'Thực hiện các công việc đột xuất khác', 5, 5, 18, '2016-05-25 10:34:17', '2016-05-17 18:43:54', NULL, 5, 0),
(93, 'Thực hiện viết, biên tập tin bài theo phân công của lãnh đạo Phòng với số lượng (quota) hàng tháng', 5, 5, 19, '2016-05-25 10:34:17', '2016-05-17 19:24:54', NULL, 50, 0),
(94, 'Thực hiện viết, biên tập tin bài theo phân công của lãnh đạo Phòng với số lượng (quota) hàng tháng', 5, 6, 23, '2016-05-25 10:34:17', '2016-05-17 19:25:21', NULL, 50, 0),
(95, 'Thực hiện viết, biên tập tin bài theo phân công của lãnh đạo Phòng với số lượng (quota) hàng tháng', 5, 5, 20, '2016-05-25 10:34:17', '2016-05-17 19:25:43', NULL, 50, 0),
(96, 'Thực hiện viết, biên tập tin bài theo phân công của lãnh đạo Phòng với số lượng (quota) hàng tháng', 5, 6, 24, '2016-05-25 10:34:17', '2016-05-17 19:25:58', NULL, 50, 0),
(97, 'Xây dựng kế hoạch tin bài cho chuyên mục được phân công theo từng tuần/tháng', 5, 5, 19, '2016-05-25 10:34:17', '2016-05-17 19:26:32', NULL, 15, 0),
(98, 'Xây dựng kế hoạch tin bài cho chuyên mục được phân công theo từng tuần/tháng', 5, 5, 20, '2016-05-25 10:34:17', '2016-05-17 19:26:44', NULL, 15, 0),
(99, 'Xây dựng kế hoạch tin bài cho chuyên mục được phân công theo từng tuần/tháng', 5, 6, 23, '2016-05-25 10:34:17', '2016-05-17 19:26:56', NULL, 15, 0),
(100, 'Xây dựng kế hoạch tin bài cho chuyên mục được phân công theo từng tuần/tháng', 5, 6, 24, '2016-05-25 10:34:17', '2016-05-17 19:27:08', NULL, 15, 0),
(101, 'Phối hợp với các chuyên mục khác để đảm bảo kế hoạch tin bài cho báo điện tử', 5, 5, 19, '2016-05-25 10:34:17', '2016-05-17 19:28:34', NULL, 10, 0),
(102, 'Phối hợp với các chuyên mục khác để đảm bảo kế hoạch tin bài cho báo điện tử', 5, 5, 20, '2016-05-25 10:34:17', '2016-05-17 19:28:47', NULL, 10, 0),
(103, 'Phối hợp với các chuyên mục khác để đảm bảo kế hoạch tin bài cho báo điện tử', 5, 6, 23, '2016-05-25 10:34:17', '2016-05-17 19:29:02', NULL, 10, 0),
(104, 'Phối hợp với các chuyên mục khác để đảm bảo kế hoạch tin bài cho báo điện tử', 5, 6, 24, '2016-05-25 10:34:17', '2016-05-17 19:29:14', NULL, 10, 0),
(105, 'Phối hợp với các phòng liên quan để sản xuất tin bài cho báo in', 5, 5, 19, '2016-05-25 10:34:17', '2016-05-17 19:29:34', NULL, 10, 0),
(106, 'Phối hợp với các phòng liên quan để sản xuất tin bài cho báo in', 5, 5, 20, '2016-05-25 10:34:17', '2016-05-17 19:29:48', NULL, 10, 0),
(107, 'Phối hợp với các phòng liên quan để sản xuất tin bài cho báo in', 5, 6, 23, '2016-05-25 10:34:17', '2016-05-17 19:29:59', NULL, 10, 0),
(108, 'Phối hợp với các phòng liên quan để sản xuất tin bài cho báo in', 5, 6, 24, '2016-05-25 10:34:17', '2016-05-17 19:30:11', NULL, 10, 0),
(109, 'Tham gia xây dựng kế hoạch tuyên truyền cho các sự kiện cụ thể trên báo điện tử VTVNews theo định hướng của Ban lãnh đạo', 5, 5, 19, '2016-05-25 10:34:17', '2016-05-17 19:30:27', NULL, 5, 0),
(110, 'Tham gia xây dựng kế hoạch tuyên truyền cho các sự kiện cụ thể trên báo điện tử VTVNews theo định hướng của Ban lãnh đạo', 5, 5, 20, '2016-05-25 10:34:17', '2016-05-17 19:30:40', NULL, 5, 0),
(111, 'Tham gia xây dựng kế hoạch tuyên truyền cho các sự kiện cụ thể trên báo điện tử VTVNews theo định hướng của Ban lãnh đạo', 5, 6, 23, '2016-05-25 10:34:17', '2016-05-17 19:30:51', NULL, 5, 0),
(112, 'Tham gia xây dựng kế hoạch tuyên truyền cho các sự kiện cụ thể trên báo điện tử VTVNews theo định hướng của Ban lãnh đạo', 5, 6, 24, '2016-05-25 10:34:17', '2016-05-17 19:31:03', NULL, 5, 0),
(113, 'Tham gia hướng dẫn các CTV khác theo yêu cầu của Ban phụ trách', 5, 5, 19, '2016-05-25 10:34:17', '2016-05-17 19:31:18', NULL, 5, 0),
(114, 'Tham gia hướng dẫn các CTV khác theo yêu cầu của Ban phụ trách', 5, 5, 20, '2016-05-25 10:34:17', '2016-05-17 19:31:31', NULL, 5, 0),
(115, 'Tham gia hướng dẫn các CTV khác theo yêu cầu của Ban phụ trách', 5, 6, 23, '2016-05-25 10:34:17', '2016-05-17 19:32:00', NULL, 5, 0),
(116, 'Tham gia hướng dẫn các CTV khác theo yêu cầu của Ban phụ trách', 5, 6, 24, '2016-05-25 10:34:17', '2016-05-17 19:32:11', NULL, 5, 0),
(117, 'Thực hiện các công việc đột xuất khác', 5, 5, 19, '2016-05-25 10:34:17', '2016-05-17 19:32:28', NULL, 5, 0),
(118, 'Thực hiện các công việc đột xuất khác', 5, 5, 20, '2016-05-25 10:34:17', '2016-05-17 19:32:39', NULL, 5, 0),
(119, 'Thực hiện các công việc đột xuất khác', 5, 5, 20, '2016-05-25 10:34:17', '2016-05-17 19:32:58', NULL, 5, 0),
(120, 'Thực hiện các công việc đột xuất khác', 5, 6, 23, '2016-05-25 10:34:17', '2016-05-17 19:33:10', NULL, 5, 0),
(121, 'Thực hiện các công việc đột xuất khác', 5, 6, 24, '2016-05-25 10:34:17', '2016-05-17 19:33:21', NULL, 5, 0),
(122, 'Xây dựng kế hoạch công tác tuần của Phòng', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:10:08', NULL, 1, 0),
(123, 'Báo cáo tuần', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:10:20', NULL, 1, 0),
(124, 'Sơ kết công tác tháng của Phòng', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:10:37', NULL, 2, 0),
(125, 'Chủ trì họp Phòng', 5, 5, 17, '2016-05-25 10:34:17', '2016-05-17 23:10:52', NULL, 1, 0),
(126, 'Dự thảo văn bản hành chính cấp VTV NEWS, Đài', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:11:08', NULL, 2, 0),
(127, 'Thư ký giao ban biên tập của VTV NEWS', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:11:27', NULL, 2, 0),
(128, 'Giải quyết thủ tục hành chính cấp Phòng', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:11:42', NULL, 10, 0),
(129, 'Họp các cuộc họp của VTV NEWS', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:12:03', NULL, 1, 0),
(130, 'Phân công công tác; xây dựng nội quy, quy định, quy trình của Phòng', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:12:17', NULL, 5, 0),
(131, 'Xây dựng mục tiêu, chức năng của Phòng trong từng giai đoạn cụ thể', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:12:33', NULL, 8, 0),
(132, 'Đôn đốc, giám sát các Phòng thực hiện chỉ đạo của Lãnh đạo VTV NEWS', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:12:53', NULL, 5, 0),
(133, 'Tổng kết thực hiện Quy chế đánh giá lao động hàng tháng, năm của VTV NEWS', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:13:11', NULL, 5, 0),
(134, 'Tham mưu, giúp việc cho Tổng biên tập về công tác thi đua khen thưởng', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:13:24', NULL, 10, 0),
(135, 'Tham mưu, giúp việc cho Tổng biên tập về công tác cán bộ và quản lý nguồn nhân lực của VTV NEWS', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:13:48', NULL, 10, 0),
(136, 'Xây dựng dự thảo quy chế, quy định, quy trình của VTV NEWS', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:14:06', NULL, 15, 0),
(137, 'Xây dựng dự thảo quy chế, quy định, quy trình của Đài', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:14:26', NULL, 20, 0),
(138, 'Tham gia xây dựng dự thảo quy chế, quy định, quy trình của VTV NEWS', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:14:47', NULL, 5, 0),
(139, 'Tham gia xây dựng dự thảo quy chế, quy định, quy trình của Đài', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:14:58', NULL, 10, 0),
(140, 'Hướng dẫn, đào tạo nhân sự bậc 1, 2, 3', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:15:16', NULL, 15, 0),
(141, 'Tổng kết, đánh giá hàng năm công việc của Phòng', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:15:28', NULL, 10, 0),
(142, 'Xây dựng dự thảo tổng kết và chương trình công tác năm của VTV NEWS', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:16:04', NULL, 20, 0),
(143, 'Tham mưu, giúp việc cho Tổng biên tập về công tác tổ chức bộ máy', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:16:29', NULL, 20, 0),
(144, 'Tham mưu, giúp việc cho Tổng biên tập về công tác quy hoạch cán bộ', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:16:46', NULL, 30, 0),
(145, 'Thực hiện các công việc đột xuất', 5, 7, 25, '2016-05-25 10:34:17', '2016-05-17 23:17:00', NULL, 5, 0),
(146, 'Thực hiện kế hoạch giao nhận văn phòng phẩm, thiết bị hàng năm, tháng cho các Phòng', 5, 7, 28, '2016-05-25 10:34:17', '2016-05-17 23:54:35', NULL, 3, 0),
(147, 'Tham gia quản lý tài sản của VTV NEWS', 5, 7, 28, '2016-05-25 10:34:17', '2016-05-17 23:54:49', NULL, 2, 0),
(148, 'Điều độ sản xuất hàng tuần', 5, 7, 28, '2016-05-25 10:34:17', '2016-05-17 23:55:05', NULL, 5, 0),
(149, 'Đối chiếu, xác nhận sản xuất thực tế hàng tháng', 5, 7, 28, '2016-05-25 10:34:17', '2016-05-17 23:55:19', NULL, 15, 0),
(150, 'Giúp việc hành chính cho Lãnh đạo VTV NEWS', 5, 7, 28, '2016-05-25 10:34:17', '2016-05-17 23:55:42', NULL, 6, 0),
(151, 'Đề xuất các phương án sử dụng thiết bị SXCT trong VTV NEWS', 5, 7, 28, '2016-05-25 10:34:17', '2016-05-17 23:56:01', NULL, 5, 0),
(152, 'Tham gia xây dựng các báo cáo', 5, 7, 28, '2016-05-25 10:34:17', '2016-05-17 23:56:29', NULL, 3, 0),
(153, 'Giải quyết thủ tục hành chính cấp Phòng trong lĩnh vực văn thư, điều độ sản xuất và quản trị văn phòng', 5, 7, 28, '2016-05-25 10:34:17', '2016-05-17 23:59:31', NULL, 10, 0),
(154, 'Quản lý hồ sơ CBVC và người lao động', 5, 7, 28, '2016-05-25 10:34:17', '2016-05-17 23:59:47', NULL, 1, 0),
(155, 'Quản lý và sử dụng con dấu của đơn vị', 5, 7, 28, '2016-05-25 10:34:17', '2016-05-18 00:00:00', NULL, 2, 0),
(156, 'Thực hiện công tác văn thư của đơn vị', 5, 7, 28, '2016-05-25 10:34:17', '2016-05-18 00:00:14', NULL, 2, 0),
(157, 'Tổng hợp, báo cáo về công tác văn thư', 5, 7, 28, '2016-05-25 10:34:17', '2016-05-18 00:00:31', NULL, 3, 0),
(158, 'Giúp việc hành chính cho Lãnh đạo đơn vị', 5, 7, 28, '2016-05-25 10:34:17', '2016-05-18 00:00:54', NULL, 2, 0),
(159, 'Kế toán thanh toán.', 5, 7, 27, '2016-05-25 10:34:17', '2016-05-18 00:38:27', NULL, 5, 0),
(160, 'Kế toán ngân hàng.', 5, 7, 27, '2016-05-25 10:34:17', '2016-05-18 00:38:42', NULL, 4, 0),
(161, 'Kế toán công nợ.', 5, 7, 27, '2016-05-25 10:34:17', '2016-05-18 00:39:05', NULL, 5, 0),
(162, 'Thanh toán lương sản phẩm Báo điện tử', 5, 7, 27, '2016-05-25 10:34:17', '2016-05-18 00:39:22', NULL, 5, 0),
(163, 'Kế toán theo dõi tài sản.', 5, 7, 27, '2016-05-25 10:34:17', '2016-05-18 00:39:43', NULL, 10, 0),
(164, 'Kế toán lương cơ bản, lương chức danh, ăn ca và lương khác, chế độ BHXH.', 5, 7, 27, '2016-05-25 10:34:17', '2016-05-18 00:39:57', NULL, 5, 0),
(165, 'Quyết toán lương sản phẩm.', 5, 7, 28, '2016-05-25 10:34:17', '2016-05-18 00:40:08', NULL, 10, 0),
(166, 'Theo dõi tình hình thực hiện và báo cáo thuế GTGT', 5, 7, 27, '2016-05-25 10:34:17', '2016-05-18 00:40:22', NULL, 5, 0),
(167, 'Kế toán tổng hợp.', 5, 7, 27, '2016-05-25 10:34:17', '2016-05-18 00:40:38', NULL, 10, 0),
(168, 'Kiểm tra tính chính xác của sổ kế toán chi tiết và tổng hợp', 5, 7, 27, '2016-05-25 10:34:17', '2016-05-18 00:40:55', NULL, 10, 0),
(169, 'Quyết toán thuế thu nhập cá nhân của toàn đơn vị.', 5, 7, 27, '2016-05-25 10:34:17', '2016-05-18 00:41:13', NULL, 15, 0),
(170, 'Lập báo cáo tài chính.', 5, 7, 27, '2016-05-25 10:34:17', '2016-05-18 00:41:30', NULL, 15, 0),
(171, 'Chịu trách nhiệm thu, chi tiền mặt theo chứng từ thu, chi tiền mặt đã được phê duyệt.', 5, 7, 30, '2016-05-25 10:34:17', '2016-05-18 00:50:22', NULL, 5, 0),
(172, 'Đảm bảo an toàn kho quỹ', 5, 7, 30, '2016-05-25 10:34:17', '2016-05-18 00:50:38', NULL, 5, 0),
(173, 'Thực hiện chế độ báo cáo quỹ tiền mặt theo quy định và lưu trữ chứng từ thu, chi tiền mặt', 5, 7, 30, '2016-05-25 10:34:17', '2016-05-18 00:50:50', NULL, 10, 0),
(174, 'Hỗ trợ kế toán trong việc chuẩn bị hồ sơ, chứng từ, số liệu phục vụ cho việc lập báo cáo tài chính và kiểm toán, thanh quyết toán.', 5, 7, 30, '2016-05-25 10:34:17', '2016-05-18 00:51:06', NULL, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `congviec_taikhoan_thang`
--

CREATE TABLE `congviec_taikhoan_thang` (
  `_id` int(11) NOT NULL,
  `congviec_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `heso` int(11) NOT NULL,
  `macdinh` int(11) NOT NULL,
  `khoiluong` int(11) NOT NULL,
  `thang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nguoigiao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `cv_tudanhgia` int(11) DEFAULT NULL,
  `cv_phongdanhgia` int(11) DEFAULT NULL,
  `cv_bandanhgia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `congviec_taikhoan_thang`
--

INSERT INTO `congviec_taikhoan_thang` (`_id`, `congviec_id`, `name`, `heso`, `macdinh`, `khoiluong`, `thang_id`, `user_id`, `nguoigiao`, `ghichu`, `created_at`, `updated_at`, `deleted_at`, `cv_tudanhgia`, `cv_phongdanhgia`, `cv_bandanhgia`) VALUES
(1, 1, 'https://docs.google.com/spreadsheets', 1, 1, 3, 4, 4, '1', 'ghi chú ', '2016-05-14 07:18:09', '2016-05-12 20:03:11', NULL, 3, 3, 3),
(2, 1, 'Công Việc dành cho nhân viên Công', 1, 1, 5, 4, 4, '1', 'công việc làm tốt', '2016-05-14 06:47:22', '2016-05-12 21:37:58', NULL, 5, 5, 5),
(3, 3, 'Công Việc Chuyên Môn 1', 9, 1, 15, 4, 26, 'kenshin@gmail.com', 'abccs asfacf cac dâcca', '2016-05-13 07:47:38', '2016-05-13 00:47:38', NULL, 0, 0, 0),
(4, 3, 'Công Việc Chuyên Môn 1', 9, 1, 10, 4, 4, 'kenshin@gmail.com', '', '2016-05-16 04:48:32', '2016-05-14 00:15:27', NULL, 10, 10, 10),
(5, 3, 'Công Việc Chuyên Môn 1', 9, 1, 5, 4, 4, 'kenshin@gmail.com', 'Hoàn thành tốt công việc', '2016-05-15 06:30:43', '2016-05-14 23:30:43', NULL, 5, 5, 5),
(6, 17, 'Công Việc dành cho nhân viên', 1, 2, 2, 4, 27, 'kenshin@gmail.com', '', '2016-05-15 01:34:47', '2016-05-14 18:34:47', NULL, 0, 0, 0),
(7, 0, 'Công việc đột xuất 1', 2, 0, 4, 4, 27, 'kenshin@gmail.com', '', '2016-05-12 04:27:31', '2016-05-11 21:27:31', NULL, 0, 0, 0),
(8, 17, 'Công Việc dành cho nhân viên', 1, 2, 0, 5, 27, 'kenshin@gmail.com', '', '2016-05-11 04:12:15', '2016-05-10 21:12:15', NULL, 0, 0, 0),
(9, 18, 'Công việc cho nhân viên bậc 3', 3, 3, 3, 5, 27, 'kenshin@gmail.com', '', '2016-05-09 18:52:36', '2016-05-09 18:52:36', NULL, 0, 0, 0),
(10, 19, 'Công việc 3 cho nhân viên bậc 3', 3, 3, 0, 5, 27, 'kenshin@gmail.com', 'Công việc 3 cho nhân viên bậc 3 ,Công việc 3 cho nhân viên bậc 3 Công việc 3 cho nhân viên bậc 3 Công việc 3 cho nhân viên bậc 3 Công việc 3 cho nhân viên bậc 3 Công việc 3 cho nhân viên bậc 3', '2016-05-11 04:11:45', '2016-05-10 21:11:45', NULL, 0, 0, 0),
(11, 20, 'Công việc 4 cho nhân viên bậc 3', 3, 3, 3, 5, 27, 'kenshin@gmail.com', '', '2016-05-09 18:52:36', '2016-05-09 18:52:36', NULL, 0, 0, 0),
(12, 17, 'Công Việc dành cho nhân viên', 1, 2, 18, 6, 27, 'kenshin@gmail.com', '', '2016-05-10 04:55:13', '2016-05-09 21:58:37', NULL, 0, 0, 0),
(13, 18, 'Công việc cho nhân viên bậc 3', 3, 3, 15, 6, 27, 'kenshin@gmail.com', '', '2016-05-10 04:55:10', '2016-05-09 21:58:34', NULL, 0, 0, 0),
(14, 19, 'Công việc 3 cho nhân viên bậc 3', 3, 3, 10, 6, 27, 'kenshin@gmail.com', '', '2016-05-10 04:55:03', '2016-05-09 21:58:27', NULL, 0, 0, 0),
(15, 20, 'Công việc 4 cho nhân viên bậc 3', 3, 3, 12, 6, 27, 'kenshin@gmail.com', '', '2016-05-10 04:55:07', '2016-05-09 21:58:31', NULL, 0, 0, 0),
(16, 0, 'Đột xuất 1', 1, 0, 4, 4, 27, 'kenshin@gmail.com', '', '2016-05-12 04:27:32', '2016-05-11 21:27:33', NULL, 0, 0, 0),
(17, 18, 'Công việc cho nhân viên bậc 3', 3, 3, 3, 4, 28, 'kenshin@gmail.com', '', '2016-05-15 02:26:29', '2016-05-14 19:26:29', NULL, 3, 3, 3),
(18, 19, 'Công việc 3 cho nhân viên bậc 3', 3, 3, 3, 4, 28, 'kenshin@gmail.com', '', '2016-05-15 02:28:04', '2016-05-14 19:28:04', NULL, 3, 2, 3),
(19, 20, 'Công việc 4 cho nhân viên bậc 3', 3, 3, 3, 4, 28, 'kenshin@gmail.com', 'hoàn thành tốt công việc, hoàn thành sớm trong khi được giao', '2016-05-15 02:36:26', '2016-05-14 19:36:26', NULL, 3, 2, 3),
(20, 37, 'Tổ chức sản xuất tin bài theo tuần, tháng cho báo điện tử VTVNews', 10, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:20', '2016-05-16 19:10:20', NULL, NULL, NULL, NULL),
(21, 39, 'Phân công công việc cụ thể trong quy trình sản xuất tin bài đối với các thành viên trong phòng', 5, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:20', '2016-05-16 19:10:20', NULL, NULL, NULL, NULL),
(22, 41, 'Chủ trì họp phòng', 1, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:20', '2016-05-16 19:10:20', NULL, NULL, NULL, NULL),
(23, 43, 'Rà soát kế hoạch của các cá nhân,  xây dựng kế hoạch tổng thể theo tuần, tháng cho báo điện tử', 10, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:20', '2016-05-16 19:10:20', NULL, NULL, NULL, NULL),
(24, 45, 'Chủ trì họp chuyên môn theo định kỳ', 2, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:20', '2016-05-16 19:10:20', NULL, NULL, NULL, NULL),
(25, 47, 'Sơ kết và tổng kết công công tác tháng và năm cấp phòng', 2, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:20', '2016-05-16 19:10:20', NULL, NULL, NULL, NULL),
(26, 49, 'Tham gia trực Thư ký tòa soạn', 10, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:20', '2016-05-16 19:10:20', NULL, NULL, NULL, NULL),
(27, 51, 'Ghi chép, nhận xét nhật ký Thư ký tòa soạ n theo ngày trực', 5, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:20', '2016-05-16 19:10:20', NULL, NULL, NULL, NULL),
(28, 53, 'Tổng  hợp  nhật  ký  của  các  Thư  ký  tòa  soạ n  theo  tuần, tháng, phục vụ cho công tác đánh giá chuyên môn', 3, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:20', '2016-05-16 19:10:20', NULL, NULL, NULL, NULL),
(29, 55, 'Làm báo cáo phòng theo tuần, tháng', 2, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:20', '2016-05-16 19:10:20', NULL, NULL, NULL, NULL),
(30, 57, 'Rà soát, tổng hợp kế hoạch tin bài phối hợp của các đơn vị trong VTV NEWS', 5, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:20', '2016-05-16 19:10:20', NULL, NULL, NULL, NULL),
(31, 59, 'Tham gia xây dựng các kế hoạ ch truyền thông trên các phương tiện của VTV NEWS theo chỉ đạo của lãnh đạo đơn vị', 10, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:20', '2016-05-16 19:10:20', NULL, NULL, NULL, NULL),
(32, 61, 'Theo dõi tiến độ, tổng  kết, đánh  giá  hiệu  qủa  của  các kế hoạch được giao', 10, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:21', '2016-05-16 19:10:21', NULL, NULL, NULL, NULL),
(33, 63, 'Thực hiện báo cáo đánh giá  về chất lượng các CTV', 5, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:21', '2016-05-16 19:10:21', NULL, NULL, NULL, NULL),
(34, 67, 'Xây  dựng,  rà soát  các  văn  bản  quy  chế,  quy định  của phòng ', 5, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:21', '2016-05-16 19:10:21', NULL, NULL, NULL, NULL),
(35, 68, 'Tham  gia  xây  dựng  các  quy  chế,  quy  trình, đề  án  cấp Ban', 5, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:21', '2016-05-16 19:10:21', NULL, NULL, NULL, NULL),
(36, 71, 'Xây dựng, ra soát các văn bản hành chính của phòng', 5, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:21', '2016-05-16 19:10:21', NULL, NULL, NULL, NULL),
(37, 73, 'Thực hiện các công việc đột xuất khác', 10, 1, 1, 4, 56, 'admin@gmail.com', '', '2016-05-16 19:10:21', '2016-05-16 19:10:21', NULL, NULL, NULL, NULL),
(38, 37, 'Tổ chức sản xuất tin bài theo tuần, tháng cho báo điện tử VTVNews', 10, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-16 19:11:14', '2016-05-16 19:11:14', NULL, NULL, NULL, NULL),
(39, 39, 'Phân công công việc cụ thể trong quy trình sản xuất tin bài đối với các thành viên trong phòng', 5, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-16 19:11:14', '2016-05-16 19:11:14', NULL, NULL, NULL, NULL),
(40, 41, 'Chủ trì họp phòng', 1, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-16 19:11:14', '2016-05-16 19:11:14', NULL, NULL, NULL, NULL),
(41, 43, 'Rà soát kế hoạch của các cá nhân,  xây dựng kế hoạch tổng thể theo tuần, tháng cho báo điện tử', 10, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-16 19:11:14', '2016-05-16 19:11:14', NULL, NULL, NULL, NULL),
(42, 45, 'Chủ trì họp chuyên môn theo định kỳ', 2, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-16 19:11:14', '2016-05-16 19:11:14', NULL, NULL, NULL, NULL),
(43, 47, 'Sơ kết và tổng kết công công tác tháng và năm cấp phòng', 2, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-16 19:11:14', '2016-05-16 19:11:14', NULL, NULL, NULL, NULL),
(44, 49, 'Tham gia trực Thư ký tòa soạn', 10, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-16 19:11:14', '2016-05-16 19:11:14', NULL, NULL, NULL, NULL),
(45, 51, 'Ghi chép, nhận xét nhật ký Thư ký tòa soạ n theo ngày trực', 5, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-16 19:11:14', '2016-05-16 19:11:14', NULL, NULL, NULL, NULL),
(46, 53, 'Tổng  hợp  nhật  ký  của  các  Thư  ký  tòa  soạ n  theo  tuần, tháng, phục vụ cho công tác đánh giá chuyên môn', 3, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-16 19:11:14', '2016-05-16 19:11:14', NULL, NULL, NULL, NULL),
(47, 55, 'Làm báo cáo phòng theo tuần, tháng', 2, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-16 19:11:14', '2016-05-16 19:11:14', NULL, NULL, NULL, NULL),
(48, 57, 'Rà soát, tổng hợp kế hoạch tin bài phối hợp của các đơn vị trong VTV NEWS', 5, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-16 19:11:14', '2016-05-16 19:11:14', NULL, NULL, NULL, NULL),
(49, 59, 'Tham gia xây dựng các kế hoạ ch truyền thông trên các phương tiện của VTV NEWS theo chỉ đạo của lãnh đạo đơn vị', 10, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-16 19:11:14', '2016-05-16 19:11:14', NULL, NULL, NULL, NULL),
(50, 61, 'Theo dõi tiến độ, tổng  kết, đánh  giá  hiệu  qủa  của  các kế hoạch được giao', 10, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-16 19:11:14', '2016-05-16 19:11:14', NULL, NULL, NULL, NULL),
(51, 63, 'Thực hiện báo cáo đánh giá  về chất lượng các CTV', 5, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-16 19:11:14', '2016-05-16 19:11:14', NULL, NULL, NULL, NULL),
(52, 67, 'Xây  dựng,  rà soát  các  văn  bản  quy  chế,  quy định  của phòng ', 5, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-17 06:04:39', '2016-05-16 23:08:54', NULL, NULL, NULL, 1),
(53, 68, 'Tham  gia  xây  dựng  các  quy  chế,  quy  trình, đề  án  cấp Ban', 5, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-17 06:04:37', '2016-05-16 23:08:52', NULL, NULL, NULL, 1),
(54, 71, 'Xây dựng, ra soát các văn bản hành chính của phòng', 5, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-17 06:04:36', '2016-05-16 23:08:50', NULL, NULL, NULL, 1),
(55, 73, 'Thực hiện các công việc đột xuất khác', 10, 1, 1, 5, 56, 'admin@gmail.com', '', '2016-05-17 06:04:29', '2016-05-16 23:08:44', NULL, NULL, NULL, 1),
(56, 21, 'Duyệt nội dung tin, bài, ảnh, chương trình của VTV NEWS sản xuất', 10, 1, 1, 4, 30, 'thuyvt@vtv.com', '', '2016-05-17 04:14:12', '2016-05-16 21:18:26', NULL, NULL, NULL, 2),
(57, 22, 'Duyệt nội dung các chương trình cấp Đài', 15, 1, 1, 4, 30, 'thuyvt@vtv.com', '', '2016-05-17 04:14:11', '2016-05-16 21:18:25', NULL, NULL, NULL, 2),
(58, 23, 'Định hướng nội dung tuyên truyền của VTV NEWS', 5, 1, 1, 4, 30, 'thuyvt@vtv.com', '', '2016-05-17 04:14:09', '2016-05-16 21:18:24', NULL, NULL, NULL, 2),
(59, 24, 'Xây dựng kế hoạch sản xuất của VTV NEWS hàng tháng', 5, 1, 1, 4, 30, 'thuyvt@vtv.com', '', '2016-05-17 04:14:08', '2016-05-16 21:18:23', NULL, NULL, NULL, 2),
(60, 25, 'Thẩm định tin, bài, ảnh trên các ấn phẩm của VTV NEWS', 5, 1, 1, 4, 30, 'thuyvt@vtv.com', '', '2016-05-17 04:14:07', '2016-05-16 21:18:22', NULL, NULL, NULL, 2),
(61, 26, 'Trực sóng', 5, 1, 1, 4, 30, 'thuyvt@vtv.com', '', '2016-05-17 04:14:03', '2016-05-16 21:18:18', NULL, NULL, NULL, 2),
(62, 27, 'Đàm phán với các đối tác trong và ngoài Đài về việc mở rộng kinh doanh, quảng cáo ', 10, 1, 1, 4, 30, 'thuyvt@vtv.com', '', '2016-05-17 04:14:00', '2016-05-16 21:18:14', NULL, NULL, NULL, 2),
(63, 28, 'Đánh giá hiệu quả  kinh doanh phát hành theo từng tháng, quý, năm', 5, 1, 1, 4, 30, 'thuyvt@vtv.com', '', '2016-05-17 04:15:47', '2016-05-16 21:20:02', NULL, 1, 1, 1),
(64, 29, 'Đánh giá hiệu quả quy trình kinh doanh, kế hoạch định hướng và mục tiêu trung và dài hạn', 5, 1, 1, 4, 30, 'thuyvt@vtv.com', '', '2016-05-17 04:13:12', '2016-05-16 21:17:26', NULL, 1, 1, 1),
(65, 30, 'Chỉ đạo kiểm soát phát triển hoạt động kinh doanh của đơn vị', 5, 1, 1, 4, 30, 'thuyvt@vtv.com', '', '2016-05-17 04:13:10', '2016-05-16 21:17:25', NULL, 1, 1, 1),
(66, 31, 'Xây dựng Quy chế làm việc và các quy định nội bộ của VTV NEWS', 1, 1, 1, 4, 30, 'thuyvt@vtv.com', '', '2016-05-17 04:13:08', '2016-05-16 21:17:23', NULL, 1, 1, 1),
(67, 32, 'Tham gia xây dựng quy chế, quy định, quy trình của Đài', 1, 1, 1, 4, 30, 'thuyvt@vtv.com', '', '2016-05-17 04:13:07', '2016-05-16 21:17:21', NULL, 1, 1, 1),
(68, 33, 'Chủ trì xây dựng kế hoạch sản xuất của VTV NEWS', 2, 1, 1, 4, 30, 'thuyvt@vtv.com', '', '2016-05-17 04:13:05', '2016-05-16 21:17:19', NULL, 1, 1, 1),
(69, 34, 'Tổng kết, đánh giá hàng năm công việc của toàn VTV NEWS', 2, 1, 1, 4, 30, 'thuyvt@vtv.com', '', '2016-05-17 04:13:02', '2016-05-16 21:17:17', NULL, 1, 1, 1),
(70, 35, 'Xây dựng quy hoạch, chiến lược phát triển của VTV NEWS', 2, 1, 1, 4, 30, 'thuyvt@vtv.com', '', '2016-05-17 04:13:00', '2016-05-16 21:17:15', NULL, 1, 1, 1),
(71, 21, 'Duyệt nội dung tin, bài, ảnh, chương trình của VTV NEWS sản xuất', 10, 1, 1, 5, 30, 'thuyvt@vtv.com', '', '2016-05-17 00:18:12', '2016-05-17 00:18:12', NULL, NULL, NULL, NULL),
(72, 22, 'Duyệt nội dung các chương trình cấp Đài', 15, 1, 1, 5, 30, 'thuyvt@vtv.com', '', '2016-05-17 00:18:12', '2016-05-17 00:18:12', NULL, NULL, NULL, NULL),
(73, 23, 'Định hướng nội dung tuyên truyền của VTV NEWS', 5, 1, 1, 5, 30, 'thuyvt@vtv.com', '', '2016-05-17 00:18:12', '2016-05-17 00:18:12', NULL, NULL, NULL, NULL),
(74, 24, 'Xây dựng kế hoạch sản xuất của VTV NEWS hàng tháng', 5, 1, 1, 5, 30, 'thuyvt@vtv.com', '', '2016-05-17 00:18:12', '2016-05-17 00:18:12', NULL, NULL, NULL, NULL),
(75, 25, 'Thẩm định tin, bài, ảnh trên các ấn phẩm của VTV NEWS', 5, 1, 1, 5, 30, 'thuyvt@vtv.com', '', '2016-05-17 00:18:12', '2016-05-17 00:18:12', NULL, NULL, NULL, NULL),
(76, 26, 'Trực sóng', 5, 1, 1, 5, 30, 'thuyvt@vtv.com', '', '2016-05-17 00:18:12', '2016-05-17 00:18:12', NULL, NULL, NULL, NULL),
(77, 27, 'Đàm phán với các đối tác trong và ngoài Đài về việc mở rộng kinh doanh, quảng cáo ', 10, 1, 1, 5, 30, 'thuyvt@vtv.com', '', '2016-05-17 00:18:12', '2016-05-17 00:18:12', NULL, NULL, NULL, NULL),
(78, 28, 'Đánh giá hiệu quả  kinh doanh phát hành theo từng tháng, quý, năm', 5, 1, 1, 5, 30, 'thuyvt@vtv.com', '', '2016-05-17 00:18:12', '2016-05-17 00:18:12', NULL, NULL, NULL, NULL),
(79, 29, 'Đánh giá hiệu quả quy trình kinh doanh, kế hoạch định hướng và mục tiêu trung và dài hạn', 5, 1, 1, 5, 30, 'thuyvt@vtv.com', '', '2016-05-17 00:18:12', '2016-05-17 00:18:12', NULL, NULL, NULL, NULL),
(80, 30, 'Chỉ đạo kiểm soát phát triển hoạt động kinh doanh của đơn vị', 5, 1, 1, 5, 30, 'thuyvt@vtv.com', '', '2016-05-17 00:18:12', '2016-05-17 00:18:12', NULL, NULL, NULL, NULL),
(81, 31, 'Xây dựng Quy chế làm việc và các quy định nội bộ của VTV NEWS', 1, 1, 1, 5, 30, 'thuyvt@vtv.com', '', '2016-05-17 00:18:12', '2016-05-17 00:18:12', NULL, NULL, NULL, NULL),
(82, 32, 'Tham gia xây dựng quy chế, quy định, quy trình của Đài', 1, 1, 1, 5, 30, 'thuyvt@vtv.com', '', '2016-05-17 00:18:13', '2016-05-17 00:18:13', NULL, NULL, NULL, NULL),
(83, 33, 'Chủ trì xây dựng kế hoạch sản xuất của VTV NEWS', 2, 1, 1, 5, 30, 'thuyvt@vtv.com', '', '2016-05-17 00:18:13', '2016-05-17 00:18:13', NULL, NULL, NULL, NULL),
(84, 34, 'Tổng kết, đánh giá hàng năm công việc của toàn VTV NEWS', 2, 1, 1, 5, 30, 'thuyvt@vtv.com', '', '2016-05-17 00:18:13', '2016-05-17 00:18:13', NULL, NULL, NULL, NULL),
(85, 35, 'Xây dựng quy hoạch, chiến lược phát triển của VTV NEWS', 2, 1, 1, 5, 30, 'thuyvt@vtv.com', '', '2016-05-17 00:18:13', '2016-05-17 00:18:13', NULL, NULL, NULL, NULL),
(86, 146, 'Thực hiện kế hoạch giao nhận văn phòng phẩm, thiết bị hàng năm, tháng cho các Phòng', 3, 1, 1, 5, 72, '', '', '2016-05-23 20:30:24', '2016-05-23 20:30:24', NULL, NULL, NULL, NULL),
(87, 147, 'Tham gia quản lý tài sản của VTV NEWS', 2, 1, 1, 5, 72, '', '', '2016-05-23 20:30:24', '2016-05-23 20:30:24', NULL, NULL, NULL, NULL),
(88, 148, 'Điều độ sản xuất hàng tuần', 5, 1, 1, 5, 72, '', '', '2016-05-23 20:30:24', '2016-05-23 20:30:24', NULL, NULL, NULL, NULL),
(89, 149, 'Đối chiếu, xác nhận sản xuất thực tế hàng tháng', 15, 1, 1, 5, 72, '', '', '2016-05-23 20:30:24', '2016-05-23 20:30:24', NULL, NULL, NULL, NULL),
(90, 150, 'Giúp việc hành chính cho Lãnh đạo VTV NEWS', 6, 1, 1, 5, 72, '', '', '2016-05-23 20:30:24', '2016-05-23 20:30:24', NULL, NULL, NULL, NULL),
(91, 151, 'Đề xuất các phương án sử dụng thiết bị SXCT trong VTV NEWS', 5, 1, 1, 5, 72, '', '', '2016-05-23 20:30:24', '2016-05-23 20:30:24', NULL, NULL, NULL, NULL),
(92, 152, 'Tham gia xây dựng các báo cáo', 3, 1, 1, 5, 72, '', '', '2016-05-23 20:30:24', '2016-05-23 20:30:24', NULL, NULL, NULL, NULL),
(93, 153, 'Giải quyết thủ tục hành chính cấp Phòng trong lĩnh vực văn thư, điều độ sản xuất và quản trị văn phòng', 10, 1, 1, 5, 72, '', '', '2016-05-23 20:30:24', '2016-05-23 20:30:24', NULL, NULL, NULL, NULL),
(94, 154, 'Quản lý hồ sơ CBVC và người lao động', 1, 1, 1, 5, 72, '', '', '2016-05-23 20:30:24', '2016-05-23 20:30:24', NULL, NULL, NULL, NULL),
(95, 155, 'Quản lý và sử dụng con dấu của đơn vị', 2, 1, 1, 5, 72, '', '', '2016-05-23 20:30:24', '2016-05-23 20:30:24', NULL, NULL, NULL, NULL),
(96, 156, 'Thực hiện công tác văn thư của đơn vị', 2, 1, 1, 5, 72, '', '', '2016-05-23 20:30:24', '2016-05-23 20:30:24', NULL, NULL, NULL, NULL),
(97, 157, 'Tổng hợp, báo cáo về công tác văn thư', 3, 1, 1, 5, 72, '', '', '2016-05-23 20:30:24', '2016-05-23 20:30:24', NULL, NULL, NULL, NULL),
(98, 158, 'Giúp việc hành chính cho Lãnh đạo đơn vị', 2, 1, 1, 5, 72, '', '', '2016-05-23 20:30:24', '2016-05-23 20:30:24', NULL, NULL, NULL, NULL),
(99, 165, 'Quyết toán lương sản phẩm.', 10, 1, 1, 5, 72, '', '', '2016-05-23 20:30:24', '2016-05-23 20:30:24', NULL, NULL, NULL, NULL),
(100, 122, 'Xây dựng kế hoạch công tác tuần của Phòng', 1, 1, 1, 5, 65, '', '', '2016-05-23 20:31:05', '2016-05-23 20:31:05', NULL, NULL, NULL, NULL),
(101, 123, 'Báo cáo tuần', 1, 1, 1, 5, 65, '', '', '2016-05-23 20:31:05', '2016-05-23 20:31:05', NULL, NULL, NULL, NULL),
(102, 124, 'Sơ kết công tác tháng của Phòng', 2, 1, 1, 5, 65, '', '', '2016-05-23 20:31:05', '2016-05-23 20:31:05', NULL, NULL, NULL, NULL),
(103, 126, 'Dự thảo văn bản hành chính cấp VTV NEWS, Đài', 2, 1, 1, 5, 65, '', '', '2016-05-24 03:38:48', '2016-05-23 20:38:48', NULL, 2, 2, 2),
(104, 127, 'Thư ký giao ban biên tập của VTV NEWS', 2, 1, 1, 5, 65, '', '', '2016-05-25 10:51:03', '2016-05-25 03:51:03', NULL, 1, 1, 1),
(105, 128, 'Giải quyết thủ tục hành chính cấp Phòng', 10, 1, 1, 5, 65, '', '', '2016-05-25 10:51:00', '2016-05-25 03:51:00', NULL, 1, 1, 1),
(106, 129, 'Họp các cuộc họp của VTV NEWS', 1, 1, 1, 5, 65, '', '', '2016-05-24 03:38:44', '2016-05-23 20:38:44', NULL, 4, 4, 4),
(107, 130, 'Phân công công tác; xây dựng nội quy, quy định, quy trình của Phòng', 5, 1, 1, 5, 65, '', '', '2016-05-25 10:50:48', '2016-05-25 03:50:48', NULL, 1, 1, 1),
(108, 131, 'Xây dựng mục tiêu, chức năng của Phòng trong từng giai đoạn cụ thể', 8, 1, 1, 5, 65, '', '', '2016-05-25 10:50:44', '2016-05-25 03:50:44', NULL, 1, 1, 1),
(109, 132, 'Đôn đốc, giám sát các Phòng thực hiện chỉ đạo của Lãnh đạo VTV NEWS', 5, 1, 1, 5, 65, '', '', '2016-05-25 10:50:41', '2016-05-25 03:50:41', NULL, 1, 1, 1),
(110, 133, 'Tổng kết thực hiện Quy chế đánh giá lao động hàng tháng, năm của VTV NEWS', 5, 1, 1, 5, 65, '', '', '2016-05-25 10:50:36', '2016-05-25 03:50:36', NULL, 1, 1, 1),
(111, 134, 'Tham mưu, giúp việc cho Tổng biên tập về công tác thi đua khen thưởng', 10, 1, 1, 5, 65, '', '', '2016-05-25 10:50:28', '2016-05-25 03:50:28', NULL, 1, 1, 1),
(112, 135, 'Tham mưu, giúp việc cho Tổng biên tập về công tác cán bộ và quản lý nguồn nhân lực của VTV NEWS', 10, 1, 1, 5, 65, '', '', '2016-05-25 10:50:19', '2016-05-25 03:50:19', NULL, 1, 1, 1),
(113, 136, 'Xây dựng dự thảo quy chế, quy định, quy trình của VTV NEWS', 15, 1, 1, 5, 65, '', '', '2016-05-25 10:50:11', '2016-05-25 03:50:11', NULL, 1, 1, 1),
(114, 137, 'Xây dựng dự thảo quy chế, quy định, quy trình của Đài', 20, 1, 1, 5, 65, '', '', '2016-05-25 10:50:07', '2016-05-25 03:50:07', NULL, 1, 1, 1),
(115, 138, 'Tham gia xây dựng dự thảo quy chế, quy định, quy trình của VTV NEWS', 5, 1, 1, 5, 65, '', '', '2016-05-25 10:50:02', '2016-05-25 03:50:02', NULL, 1, 1, 1),
(116, 139, 'Tham gia xây dựng dự thảo quy chế, quy định, quy trình của Đài', 10, 1, 1, 5, 65, '', '', '2016-05-25 10:36:27', '2016-05-25 03:36:27', NULL, 1, 1, 1),
(117, 140, 'Hướng dẫn, đào tạo nhân sự bậc 1, 2, 3', 15, 1, 6, 5, 65, '', '', '2016-05-25 10:53:23', '2016-05-25 03:53:23', NULL, 6, 6, 6),
(118, 141, 'Tổng kết, đánh giá hàng năm công việc của Phòng', 10, 1, 12, 5, 65, '', '', '2016-05-25 10:53:19', '2016-05-25 03:53:19', NULL, 12, 12, 12),
(119, 142, 'Xây dựng dự thảo tổng kết và chương trình công tác năm của VTV NEWS', 20, 1, 1, 5, 65, '', '', '2016-05-25 10:51:23', '2016-05-25 03:51:23', NULL, 1, 1, 1),
(120, 143, 'Tham mưu, giúp việc cho Tổng biên tập về công tác tổ chức bộ máy', 20, 1, 6, 5, 65, '', '', '2016-05-25 10:51:13', '2016-05-25 03:51:13', NULL, 6, 6, 6),
(121, 144, 'Tham mưu, giúp việc cho Tổng biên tập về công tác quy hoạch cán bộ', 30, 1, 1, 5, 65, '', '', '2016-05-24 03:37:16', '2016-05-23 20:37:16', NULL, 4, 4, 4),
(122, 145, 'Thực hiện các công việc đột xuất', 5, 1, 5, 5, 65, '', '', '2016-05-25 10:53:14', '2016-05-25 03:53:14', NULL, 5, 5, 5),
(123, 159, 'Kế toán thanh toán.', 5, 1, 1, 5, 71, '', '', '2016-05-24 04:06:06', '2016-05-23 21:06:06', NULL, 1, 1, 1),
(124, 160, 'Kế toán ngân hàng.', 4, 1, 1, 5, 71, '', '', '2016-05-24 04:06:03', '2016-05-23 21:06:03', NULL, 1, 1, 1),
(125, 161, 'Kế toán công nợ.', 5, 1, 1, 5, 71, '', '', '2016-05-24 04:06:02', '2016-05-23 21:06:02', NULL, 1, 1, 1),
(126, 162, 'Thanh toán lương sản phẩm Báo điện tử', 5, 1, 1, 5, 71, '', '', '2016-05-24 03:59:02', '2016-05-23 20:59:02', NULL, 2, 2, 2),
(127, 163, 'Kế toán theo dõi tài sản.', 10, 1, 1, 5, 71, '', '', '2016-05-24 03:58:59', '2016-05-23 20:58:59', NULL, 3, 3, 3),
(128, 164, 'Kế toán lương cơ bản, lương chức danh, ăn ca và lương khác, chế độ BHXH.', 5, 1, 1, 5, 71, '', '', '2016-05-24 04:06:11', '2016-05-23 21:06:11', NULL, 1, 1, 1),
(129, 166, 'Theo dõi tình hình thực hiện và báo cáo thuế GTGT', 5, 1, 5, 5, 71, '', '', '2016-05-24 03:58:57', '2016-05-23 20:58:57', NULL, 3, 3, 3),
(130, 167, 'Kế toán tổng hợp.', 10, 1, 4, 5, 71, '', '', '2016-05-24 04:06:09', '2016-05-23 21:06:09', NULL, 4, 4, 4),
(131, 168, 'Kiểm tra tính chính xác của sổ kế toán chi tiết và tổng hợp', 10, 1, 2, 5, 71, '', '', '2016-05-24 03:58:53', '2016-05-23 20:58:53', NULL, 4, 4, 4),
(132, 169, 'Quyết toán thuế thu nhập cá nhân của toàn đơn vị.', 15, 1, 2, 5, 71, '', '', '2016-05-24 04:07:07', '2016-05-23 21:07:07', NULL, NULL, 2, 2),
(133, 170, 'Lập báo cáo tài chính.', 15, 1, 4, 5, 71, '', '', '2016-05-24 03:58:49', '2016-05-23 20:58:49', NULL, 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `_id` int(11) NOT NULL,
  `thang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tudanhgia` int(11) NOT NULL,
  `phongdanhgia` int(11) NOT NULL,
  `bandanhgia` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `banxeploai` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`_id`, `thang_id`, `user_id`, `tudanhgia`, `phongdanhgia`, `bandanhgia`, `created_at`, `updated_at`, `deleted_at`, `banxeploai`) VALUES
(1, 4, 26, 0, 0, 0, '2016-05-14 22:37:03', '2016-05-14 22:37:03', NULL, NULL),
(2, 4, 4, 0, 0, 0, '2016-05-14 22:37:19', '2016-05-14 22:37:19', NULL, NULL),
(3, 4, 27, 0, 0, 0, '2016-05-14 22:37:19', '2016-05-14 22:37:19', NULL, NULL),
(4, 4, 28, 0, 0, 0, '2016-05-14 22:37:19', '2016-05-14 22:37:19', NULL, NULL),
(5, 0, 4, 0, 0, 0, '2016-05-14 23:32:02', '2016-05-14 23:32:02', NULL, NULL),
(6, 0, 27, 0, 0, 0, '2016-05-14 23:32:02', '2016-05-14 23:32:02', NULL, NULL),
(7, 0, 28, 0, 0, 0, '2016-05-14 23:32:02', '2016-05-14 23:32:02', NULL, NULL),
(8, 0, 26, 0, 0, 0, '2016-05-14 23:32:04', '2016-05-14 23:32:04', NULL, NULL),
(9, 6, 26, 0, 0, 0, '2016-05-15 05:17:58', '2016-05-15 05:17:58', NULL, NULL),
(10, 1, 4, 0, 0, 0, '2016-05-15 21:45:04', '2016-05-15 21:45:04', NULL, NULL),
(11, 1, 27, 0, 0, 0, '2016-05-15 21:45:04', '2016-05-15 21:45:04', NULL, NULL),
(12, 1, 28, 0, 0, 0, '2016-05-15 21:45:05', '2016-05-15 21:45:05', NULL, NULL),
(13, 5, 4, 0, 0, 0, '2016-05-15 21:47:46', '2016-05-15 21:47:46', NULL, NULL),
(14, 5, 27, 0, 0, 0, '2016-05-15 21:47:46', '2016-05-15 21:47:46', NULL, NULL),
(15, 5, 28, 0, 0, 0, '2016-05-15 21:47:46', '2016-05-15 21:47:46', NULL, NULL),
(16, 6, 4, 0, 0, 0, '2016-05-15 21:47:48', '2016-05-15 21:47:48', NULL, NULL),
(17, 6, 27, 0, 0, 0, '2016-05-15 21:47:48', '2016-05-15 21:47:48', NULL, NULL),
(18, 6, 28, 0, 0, 0, '2016-05-15 21:47:48', '2016-05-15 21:47:48', NULL, NULL),
(19, 0, 44, 0, 0, 0, '2016-05-16 19:13:32', '2016-05-16 19:13:32', NULL, NULL),
(20, 0, 45, 0, 0, 0, '2016-05-16 19:13:32', '2016-05-16 19:13:32', NULL, NULL),
(21, 0, 46, 0, 0, 0, '2016-05-16 19:13:32', '2016-05-16 19:13:32', NULL, NULL),
(22, 0, 47, 0, 0, 0, '2016-05-16 19:13:32', '2016-05-16 19:13:32', NULL, NULL),
(23, 0, 48, 0, 0, 0, '2016-05-16 19:13:32', '2016-05-16 19:13:32', NULL, NULL),
(24, 0, 49, 0, 0, 0, '2016-05-16 19:13:32', '2016-05-16 19:13:32', NULL, NULL),
(25, 0, 50, 0, 0, 0, '2016-05-16 19:13:32', '2016-05-16 19:13:32', NULL, NULL),
(26, 0, 51, 0, 0, 0, '2016-05-16 19:13:32', '2016-05-16 19:13:32', NULL, NULL),
(27, 0, 52, 0, 0, 0, '2016-05-16 19:13:32', '2016-05-16 19:13:32', NULL, NULL),
(28, 0, 53, 0, 0, 0, '2016-05-16 19:13:32', '2016-05-16 19:13:32', NULL, NULL),
(29, 0, 54, 0, 0, 0, '2016-05-16 19:13:32', '2016-05-16 19:13:32', NULL, NULL),
(30, 0, 55, 0, 0, 0, '2016-05-16 19:13:32', '2016-05-16 19:13:32', NULL, NULL),
(31, 4, 44, 0, 0, 0, '2016-05-16 19:13:49', '2016-05-16 19:13:49', NULL, NULL),
(32, 4, 45, 0, 0, 0, '2016-05-16 19:13:49', '2016-05-16 19:13:49', NULL, NULL),
(33, 4, 46, 0, 0, 0, '2016-05-16 19:13:49', '2016-05-16 19:13:49', NULL, NULL),
(34, 4, 47, 0, 0, 0, '2016-05-16 19:13:49', '2016-05-16 19:13:49', NULL, NULL),
(35, 4, 48, 0, 0, 0, '2016-05-16 19:13:49', '2016-05-16 19:13:49', NULL, NULL),
(36, 4, 49, 0, 0, 0, '2016-05-16 19:13:49', '2016-05-16 19:13:49', NULL, NULL),
(37, 4, 50, 0, 0, 0, '2016-05-16 19:13:49', '2016-05-16 19:13:49', NULL, NULL),
(38, 4, 51, 0, 0, 0, '2016-05-16 19:13:49', '2016-05-16 19:13:49', NULL, NULL),
(39, 4, 52, 0, 0, 0, '2016-05-16 19:13:49', '2016-05-16 19:13:49', NULL, NULL),
(40, 4, 53, 0, 0, 0, '2016-05-16 19:13:49', '2016-05-16 19:13:49', NULL, NULL),
(41, 4, 54, 0, 0, 0, '2016-05-16 19:13:49', '2016-05-16 19:13:49', NULL, NULL),
(42, 4, 55, 0, 0, 0, '2016-05-16 19:13:49', '2016-05-16 19:13:49', NULL, NULL),
(43, 4, 56, 0, 0, 0, '2016-05-16 19:14:20', '2016-05-16 19:14:20', NULL, NULL),
(44, 4, 57, 0, 0, 0, '2016-05-16 19:14:20', '2016-05-16 19:14:20', NULL, NULL),
(45, 4, 58, 0, 0, 0, '2016-05-16 19:14:20', '2016-05-16 19:14:20', NULL, NULL),
(46, 4, 59, 0, 0, 0, '2016-05-16 19:14:20', '2016-05-16 19:14:20', NULL, NULL),
(47, 4, 60, 0, 0, 0, '2016-05-16 19:14:20', '2016-05-16 19:14:20', NULL, NULL),
(48, 4, 61, 0, 0, 0, '2016-05-16 19:14:20', '2016-05-16 19:14:20', NULL, NULL),
(49, 4, 62, 0, 0, 0, '2016-05-16 19:14:20', '2016-05-16 19:14:20', NULL, NULL),
(50, 4, 63, 0, 0, 0, '2016-05-16 19:14:20', '2016-05-16 19:14:20', NULL, NULL),
(51, 4, 64, 0, 0, 0, '2016-05-16 19:14:20', '2016-05-16 19:14:20', NULL, NULL),
(52, 0, 30, 1, 0, 0, '2016-05-17 03:43:50', '2016-05-16 20:48:05', NULL, NULL),
(53, 5, 30, 0, 0, 0, '2016-05-17 03:44:11', '2016-05-16 20:48:25', NULL, NULL),
(54, 6, 30, 1, 0, 0, '2016-05-17 03:24:10', '2016-05-16 20:28:24', NULL, NULL),
(55, 4, 30, 1, 0, 0, '2016-05-17 07:07:43', '2016-05-17 00:11:57', NULL, 'A1'),
(56, 0, 65, 1, 0, 0, '2016-05-24 03:47:21', '2016-05-23 20:47:21', NULL, NULL),
(57, 5, 65, 0, 0, 0, '2016-05-23 20:35:41', '2016-05-23 20:35:41', NULL, NULL),
(58, 0, 71, 1, 0, 0, '2016-05-26 07:46:04', '2016-05-26 00:46:04', NULL, NULL),
(59, 4, 71, 0, 0, 0, '2016-05-23 20:58:41', '2016-05-23 20:58:41', NULL, NULL),
(60, 6, 71, 0, 0, 0, '2016-05-23 20:58:45', '2016-05-23 20:58:45', NULL, NULL),
(61, 5, 71, 1, 0, 0, '2016-05-24 04:00:25', '2016-05-23 21:00:25', NULL, NULL),
(62, 0, 66, 0, 0, 0, '2016-05-23 21:06:47', '2016-05-23 21:06:47', NULL, NULL),
(63, 0, 67, 0, 0, 0, '2016-05-23 21:06:47', '2016-05-23 21:06:47', NULL, NULL),
(64, 0, 68, 0, 0, 0, '2016-05-23 21:06:47', '2016-05-23 21:06:47', NULL, NULL),
(65, 0, 69, 0, 0, 0, '2016-05-23 21:06:47', '2016-05-23 21:06:47', NULL, NULL),
(66, 0, 70, 0, 0, 0, '2016-05-23 21:06:47', '2016-05-23 21:06:47', NULL, NULL),
(67, 0, 72, 0, 0, 0, '2016-05-23 21:06:47', '2016-05-23 21:06:47', NULL, NULL),
(68, 5, 66, 0, 0, 0, '2016-05-23 21:06:49', '2016-05-23 21:06:49', NULL, NULL),
(69, 5, 67, 0, 0, 0, '2016-05-23 21:06:49', '2016-05-23 21:06:49', NULL, NULL),
(70, 5, 68, 0, 0, 0, '2016-05-23 21:06:49', '2016-05-23 21:06:49', NULL, NULL),
(71, 5, 69, 0, 0, 0, '2016-05-23 21:06:49', '2016-05-23 21:06:49', NULL, NULL),
(72, 5, 70, 0, 0, 0, '2016-05-23 21:06:50', '2016-05-23 21:06:50', NULL, NULL),
(73, 5, 72, 0, 0, 0, '2016-05-23 21:06:50', '2016-05-23 21:06:50', NULL, NULL),
(74, 4, 65, 0, 0, 0, '2016-05-25 03:36:15', '2016-05-25 03:36:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donggop`
--

CREATE TABLE `donggop` (
  `_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `chucdanh_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `diemcong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donggop`
--

INSERT INTO `donggop` (`_id`, `name`, `level_id`, `room_id`, `chucdanh_id`, `created_at`, `updated_at`, `deleted_at`, `diemcong`) VALUES
(1, 'Dong ghop trong hoat dong cap dai', 5, 2, 7, '2016-05-14 11:05:16', '2016-05-07 22:17:07', NULL, 1),
(2, 'Đóng Ghóp cấp đài', 5, 2, 9, '2016-05-14 19:47:09', '2016-05-14 19:47:09', NULL, 2),
(3, 'Sáng kiến cải tiến Cấp VTV NEWS : cộng 2- 5 điểm', 5, 3, 11, '2016-05-16 18:22:41', '2016-05-16 18:22:41', NULL, 2),
(4, 'Sáng kiến cải tiến Cấp Đài  cộng 5- 10 điểm ', 5, 3, 11, '2016-05-16 18:23:08', '2016-05-16 18:23:08', NULL, 5),
(5, 'Hoạ t động chung đạt thành tích cao Cấp VTV NEWS: cộng 1 - 2 điểm', 5, 3, 11, '2016-05-16 18:23:43', '2016-05-16 18:23:43', NULL, 1),
(6, 'Hoạ t động chung đạt thành tích cao  Cấp Đài:cộng 2 - 5 điểm', 5, 3, 11, '2016-05-16 18:24:20', '2016-05-16 18:24:20', NULL, 2),
(7, 'Tham gia các công việc đột xuất đạt kết quả cao (Cấp VTV NEWS: cộng 2 - 3 điểm )', 5, 3, 11, '2016-05-16 18:25:04', '2016-05-16 18:25:04', NULL, 2),
(8, 'Tham gia các công việc đột xuất đạt kết quả cao (Cấp Đài: cộng 4 - 6 điểm )', 5, 3, 11, '2016-05-16 18:25:29', '2016-05-16 18:25:29', NULL, 4),
(9, 'Sáng kiến cải tiến  Cấp Ban : cộng 2 - 5 điểm', 5, 5, 17, '2016-05-17 18:28:06', '2016-05-17 18:28:06', NULL, 2),
(10, 'Sáng kiến cải tiến  Cấp Ban : cộng 2 - 5 điểm', 5, 6, 21, '2016-05-17 18:28:16', '2016-05-17 18:28:16', NULL, 2),
(11, 'Sáng kiến cải tiến  Cấp Đài  cộng 5 - 10 điểm', 5, 5, 17, '2016-05-17 18:28:37', '2016-05-17 18:28:37', NULL, 5),
(12, 'Sáng kiến cải tiến Cấp Đài  cộng 5 - 10 điểm', 5, 6, 21, '2016-05-17 18:28:56', '2016-05-17 18:28:56', NULL, 5),
(13, 'Hoạt động chung đạt thành tích cao  Cấp Ban : cộng 1 - 2 điểm', 5, 5, 17, '2016-05-17 18:29:18', '2016-05-17 18:29:18', NULL, 1),
(14, 'Hoạt động chung đạt thành tích cao :  Cấp Ban : cộng 1 - 2 điểm', 5, 6, 21, '2016-05-17 18:29:32', '2016-05-17 18:29:32', NULL, 1),
(15, 'Hoạt động chung đạt thành tích cao: Cấp Đài  cộng 2 - 5 điểm', 5, 5, 17, '2016-05-17 18:30:00', '2016-05-17 18:30:00', NULL, 2),
(16, 'Hoạt động chung đạt thành tích cao: Cấp Đài  cộng 2 - 5 điểm', 5, 6, 21, '2016-05-17 18:30:10', '2016-05-17 18:30:10', NULL, 2),
(17, 'Tham gia các công việc đột xuất đạt kết quả cao  (Cấp Ban : cộng 2 - 3 điểm)', 5, 5, 17, '2016-05-17 18:30:50', '2016-05-17 18:30:50', NULL, 2),
(18, 'Tham gia các công việc đột xuất đạt kết quả cao  (Cấp Ban : cộng 2 - 3 điểm)', 5, 6, 21, '2016-05-17 18:31:00', '2016-05-17 18:31:00', NULL, 2),
(19, 'Tham gia các công việc đột xuất đạt kết quả cao (Cấp Đài  cộng 4 - 6 điểm)', 5, 5, 17, '2016-05-17 18:31:31', '2016-05-17 18:31:31', NULL, 4),
(20, 'Tham gia các công việc đột xuất đạt kết quả cao (Cấp Đài  cộng 4 - 6 điểm)', 5, 6, 21, '2016-05-17 18:31:49', '2016-05-17 18:31:49', NULL, 4),
(21, 'Sáng kiến cải tiến: Cấp Ban cộng 2 - 5 điểm', 5, 5, 18, '2016-05-18 02:16:53', '2016-05-17 19:21:08', NULL, 2),
(22, 'Sáng kiến cải tiến: Cấp Ban cộng 2 - 5 điểm', 5, 6, 29, '2016-05-18 02:16:33', '2016-05-17 19:20:48', NULL, 2),
(23, 'Sáng kiến cải tiến cấp Đài: Cộng 5 - 10 điểm', 5, 5, 18, '2016-05-18 02:17:05', '2016-05-17 19:21:20', NULL, 5),
(24, 'Sáng kiến cải tiến Cấp Đài: Cộng 5- 10 điểm', 5, 6, 29, '2016-05-18 02:15:58', '2016-05-17 19:20:13', NULL, 5),
(25, 'Hoạt động chung đạt thành tích cao Cấp Ban: Cộng 1 - 2 điểm', 5, 5, 18, '2016-05-17 19:21:56', '2016-05-17 19:21:56', NULL, 1),
(26, 'Hoạt động chung đạt thành tích cao Cấp Ban: Cộng 1 - 2 điểm', 5, 6, 29, '2016-05-17 19:22:09', '2016-05-17 19:22:09', NULL, 1),
(27, 'Hoạt động chung đạt thành tích cao Cấp Đài: Cộng 2 - 5 điểm', 5, 5, 18, '2016-05-17 19:22:35', '2016-05-17 19:22:35', NULL, 2),
(28, 'Hoạt động chung đạt thành tích cao Cấp Đài: Cộng 2 - 5 điểm', 5, 6, 29, '2016-05-17 19:22:47', '2016-05-17 19:22:47', NULL, 2),
(29, 'Tham gia các công việc đột xuất đạt kết quả cao : Cấp Ban: Cộng 2 - 3 điểm', 5, 5, 18, '2016-05-17 19:23:11', '2016-05-17 19:23:11', NULL, 2),
(30, 'Tham gia các công việc đột xuất đạt kết quả cao : Cấp Ban: Cộng 2 - 3 điểm', 5, 6, 29, '2016-05-17 19:23:21', '2016-05-17 19:23:21', NULL, 2),
(31, 'Tham gia các công việc đột xuất đạt kết quả cao : Cấp Đài: Cộng 4 - 6 điểm', 5, 5, 18, '2016-05-17 19:23:45', '2016-05-17 19:23:45', NULL, 4),
(32, 'Tham gia các công việc đột xuất đạt kết quả cao : Cấp Đài: Cộng 4 - 6 điểm', 5, 6, 29, '2016-05-17 19:24:00', '2016-05-17 19:24:00', NULL, 4),
(33, 'Sáng kiến cải tiến Cấp Ban : cộng 2 - 5 điểm', 5, 5, 19, '2016-05-17 23:03:49', '2016-05-17 23:03:49', NULL, 2),
(34, 'Sáng kiến cải tiến Cấp Ban : cộng 2 - 5 điểm', 5, 5, 20, '2016-05-17 23:04:28', '2016-05-17 23:04:28', NULL, 2),
(35, 'Sáng kiến cải tiến Cấp Ban : cộng 2 - 5 điểm', 5, 6, 23, '2016-05-17 23:04:55', '2016-05-17 23:04:55', NULL, 2),
(36, 'Sáng kiến cải tiến Cấp Ban : cộng 2 - 5 điểm', 5, 6, 24, '2016-05-17 23:05:07', '2016-05-17 23:05:07', NULL, 2),
(37, 'Sáng kiến cải tiến Cấp Đài:  cộng 5 - 10 điểm', 5, 5, 19, '2016-05-17 23:05:28', '2016-05-17 23:05:28', NULL, 5),
(38, 'Sáng kiến cải tiến Cấp Đài:  cộng 5 - 10 điểm', 5, 5, 20, '2016-05-17 23:05:41', '2016-05-17 23:05:41', NULL, 5),
(39, 'Sáng kiến cải tiến Cấp Đài:  cộng 5 - 10 điểm', 5, 6, 23, '2016-05-17 23:05:50', '2016-05-17 23:05:50', NULL, 5),
(40, 'Sáng kiến cải tiến Cấp Đài:  cộng 5 - 10 điểm', 5, 6, 24, '2016-05-17 23:06:01', '2016-05-17 23:06:01', NULL, 5),
(41, 'Hoạt động chung đạt thành tích cao  Cấp Ban : cộng 1 - 2 điểm', 5, 5, 19, '2016-05-17 23:06:21', '2016-05-17 23:06:21', NULL, 1),
(42, 'Hoạt động chung đạt thành tích cao  Cấp Ban : cộng 1 - 2 điểm', 5, 5, 20, '2016-05-17 23:06:32', '2016-05-17 23:06:32', NULL, 1),
(43, 'Hoạt động chung đạt thành tích cao  Cấp Ban : cộng 1 - 2 điểm', 5, 6, 23, '2016-05-17 23:06:41', '2016-05-17 23:06:41', NULL, 1),
(44, 'Hoạt động chung đạt thành tích cao  Cấp Ban : cộng 1 - 2 điểm', 5, 6, 24, '2016-05-17 23:06:51', '2016-05-17 23:06:51', NULL, 1),
(45, 'Hoạt động chung đạt thành tích cao   Cấp Đài:  cộng 2 - 5 điểm', 5, 5, 19, '2016-05-17 23:07:16', '2016-05-17 23:07:16', NULL, 2),
(46, 'Hoạt động chung đạt thành tích cao   Cấp Đài:  cộng 2 - 5 điểm', 5, 5, 20, '2016-05-17 23:07:28', '2016-05-17 23:07:28', NULL, 2),
(47, 'Hoạt động chung đạt thành tích cao   Cấp Đài:  cộng 2 - 5 điểm', 5, 6, 24, '2016-05-17 23:07:38', '2016-05-17 23:07:38', NULL, 2),
(48, 'Hoạt động chung đạt thành tích cao   Cấp Đài:  cộng 2 - 5 điểm', 5, 6, 23, '2016-05-17 23:07:48', '2016-05-17 23:07:48', NULL, 2),
(49, 'Tham gia các công việc đột xuất đạt kết quả cao  Cấp Ban : cộng 2 - 3 điểm', 5, 5, 19, '2016-05-17 23:08:08', '2016-05-17 23:08:08', NULL, 2),
(50, 'Tham gia các công việc đột xuất đạt kết quả cao  Cấp Ban : cộng 2 - 3 điểm', 5, 5, 20, '2016-05-17 23:08:17', '2016-05-17 23:08:17', NULL, 2),
(51, 'Tham gia các công việc đột xuất đạt kết quả cao  Cấp Ban : cộng 2 - 3 điểm', 5, 6, 23, '2016-05-17 23:08:30', '2016-05-17 23:08:30', NULL, 2),
(52, 'Tham gia các công việc đột xuất đạt kết quả cao  Cấp Ban : cộng 2 - 3 điểm', 5, 6, 24, '2016-05-17 23:08:39', '2016-05-17 23:08:39', NULL, 2),
(53, 'Tham gia các công việc đột xuất đạt kết quả cao  Cấp Đài:  cộng 4 - 6 điểm', 5, 5, 19, '2016-05-17 23:08:59', '2016-05-17 23:08:59', NULL, 4),
(54, 'Tham gia các công việc đột xuất đạt kết quả cao  Cấp Đài:  cộng 4 - 6 điểm', 5, 5, 20, '2016-05-17 23:09:11', '2016-05-17 23:09:11', NULL, 4),
(55, 'Tham gia các công việc đột xuất đạt kết quả cao  Cấp Đài:  cộng 4 - 6 điểm', 5, 6, 23, '2016-05-17 23:09:23', '2016-05-17 23:09:23', NULL, 4),
(56, 'Tham gia các công việc đột xuất đạt kết quả cao  Cấp Đài:  cộng 4 - 6 điểm', 5, 6, 24, '2016-05-17 23:09:32', '2016-05-17 23:09:32', NULL, 4),
(57, 'Sáng kiến cải tiến Cấp VTV NEWS :cộng 2- 5 điểm', 5, 7, 25, '2016-05-17 23:36:07', '2016-05-17 23:36:07', NULL, 2),
(58, 'Sáng kiến cải tiến Cấp Đài  cộng 5- 10 điểm', 5, 7, 25, '2016-05-17 23:36:29', '2016-05-17 23:36:29', NULL, 5),
(59, 'Hoạt động chung đạt thành tích cao Cấp VTV NEWS : cộng 1 - 2 điểm', 5, 7, 25, '2016-05-17 23:36:57', '2016-05-17 23:36:57', NULL, 1),
(60, 'Hoạt động chung đạt thành tích cao Cấp Đài  cộng 2 - 5 điểm', 5, 7, 25, '2016-05-17 23:37:26', '2016-05-17 23:37:26', NULL, 2),
(61, 'Tham gia các công việc đột xuất đạt kết quả cao  Cấp VTV NEWS : cộng 2 – 3 điểm', 5, 7, 25, '2016-05-17 23:37:50', '2016-05-17 23:37:50', NULL, 3),
(62, 'Tham gia các công việc đột xuất đạt kết quả cao Cấp Đài:  cộng 4 – 6 điểm', 5, 7, 25, '2016-05-17 23:38:06', '2016-05-17 23:38:06', NULL, 4),
(63, 'Sáng kiến cải tiến: Cấp Ban cộng 2 - 5 điểm', 5, 7, 28, '2016-05-18 00:35:24', '2016-05-18 00:35:24', NULL, 2),
(64, 'Sáng kiến cải tiến cấp Đài: Cộng 5 - 10 điểm', 5, 7, 28, '2016-05-18 00:35:24', '2016-05-18 00:35:24', NULL, 5),
(65, 'Hoạt động chung đạt thành tích cao Cấp Ban: Cộng 1 - 2 điểm', 5, 7, 28, '2016-05-18 00:35:24', '2016-05-18 00:35:24', NULL, 1),
(66, 'Hoạt động chung đạt thành tích cao Cấp Đài: Cộng 2 - 5 điểm', 5, 7, 28, '2016-05-18 00:35:24', '2016-05-18 00:35:24', NULL, 2),
(67, 'Tham gia các công việc đột xuất đạt kết quả cao : Cấp Ban: Cộng 2 - 3 điểm', 5, 7, 28, '2016-05-18 00:35:24', '2016-05-18 00:35:24', NULL, 2),
(68, 'Tham gia các công việc đột xuất đạt kết quả cao : Cấp Đài: Cộng 4 - 6 điểm', 5, 7, 28, '2016-05-18 00:35:24', '2016-05-18 00:35:24', NULL, 4),
(69, 'Sáng kiến cải tiến: Cấp Ban cộng 2 - 5 điểm', 5, 7, 27, '2016-05-18 00:35:36', '2016-05-18 00:35:36', NULL, 2),
(70, 'Sáng kiến cải tiến cấp Đài: Cộng 5 - 10 điểm', 5, 7, 27, '2016-05-18 00:35:36', '2016-05-18 00:35:36', NULL, 5),
(71, 'Hoạt động chung đạt thành tích cao Cấp Ban: Cộng 1 - 2 điểm', 5, 7, 27, '2016-05-18 00:35:36', '2016-05-18 00:35:36', NULL, 1),
(72, 'Hoạt động chung đạt thành tích cao Cấp Đài: Cộng 2 - 5 điểm', 5, 7, 27, '2016-05-18 00:35:36', '2016-05-18 00:35:36', NULL, 2),
(73, 'Tham gia các công việc đột xuất đạt kết quả cao : Cấp Ban: Cộng 2 - 3 điểm', 5, 7, 27, '2016-05-18 00:35:37', '2016-05-18 00:35:37', NULL, 2),
(74, 'Tham gia các công việc đột xuất đạt kết quả cao : Cấp Đài: Cộng 4 - 6 điểm', 5, 7, 27, '2016-05-18 00:35:37', '2016-05-18 00:35:37', NULL, 4),
(75, 'Sáng kiến cải tiến: Cấp Ban cộng 2 - 5 điểm', 5, 7, 26, '2016-05-18 00:35:52', '2016-05-18 00:35:52', NULL, 2),
(76, 'Sáng kiến cải tiến cấp Đài: Cộng 5 - 10 điểm', 5, 7, 26, '2016-05-18 00:35:52', '2016-05-18 00:35:52', NULL, 5),
(77, 'Hoạt động chung đạt thành tích cao Cấp Ban: Cộng 1 - 2 điểm', 5, 7, 26, '2016-05-18 00:35:52', '2016-05-18 00:35:52', NULL, 1),
(78, 'Hoạt động chung đạt thành tích cao Cấp Đài: Cộng 2 - 5 điểm', 5, 7, 26, '2016-05-18 00:35:52', '2016-05-18 00:35:52', NULL, 2),
(79, 'Tham gia các công việc đột xuất đạt kết quả cao : Cấp Ban: Cộng 2 - 3 điểm', 5, 7, 26, '2016-05-18 00:35:52', '2016-05-18 00:35:52', NULL, 2),
(80, 'Tham gia các công việc đột xuất đạt kết quả cao : Cấp Đài: Cộng 4 - 6 điểm', 5, 7, 26, '2016-05-18 00:35:52', '2016-05-18 00:35:52', NULL, 4),
(81, 'Sáng kiến cải tiến: Cấp Ban cộng 2 - 5 điểm', 5, 7, 30, '2016-05-18 00:48:49', '2016-05-18 00:48:49', NULL, 2),
(82, 'Sáng kiến cải tiến cấp Đài: Cộng 5 - 10 điểm', 5, 7, 30, '2016-05-18 00:48:49', '2016-05-18 00:48:49', NULL, 5),
(83, 'Hoạt động chung đạt thành tích cao Cấp Ban: Cộng 1 - 2 điểm', 5, 7, 30, '2016-05-18 00:48:49', '2016-05-18 00:48:49', NULL, 1),
(84, 'Hoạt động chung đạt thành tích cao Cấp Đài: Cộng 2 - 5 điểm', 5, 7, 30, '2016-05-18 00:48:49', '2016-05-18 00:48:49', NULL, 2),
(85, 'Tham gia các công việc đột xuất đạt kết quả cao : Cấp Ban: Cộng 2 - 3 điểm', 5, 7, 30, '2016-05-18 00:48:49', '2016-05-18 00:48:49', NULL, 2),
(86, 'Tham gia các công việc đột xuất đạt kết quả cao : Cấp Đài: Cộng 4 - 6 điểm', 5, 7, 30, '2016-05-18 00:48:49', '2016-05-18 00:48:49', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `donggop_taikhoan_thang`
--

CREATE TABLE `donggop_taikhoan_thang` (
  `_id` int(11) NOT NULL,
  `donggop_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diemcong` int(11) NOT NULL,
  `thang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nguoigiao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `dg_tucong` int(11) DEFAULT NULL,
  `dg_phongcong` int(11) DEFAULT NULL,
  `dg_bancong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donggop_taikhoan_thang`
--

INSERT INTO `donggop_taikhoan_thang` (`_id`, `donggop_id`, `name`, `diemcong`, `thang_id`, `user_id`, `nguoigiao`, `ghichu`, `created_at`, `updated_at`, `deleted_at`, `dg_tucong`, `dg_phongcong`, `dg_bancong`) VALUES
(1, 1, 'đóng góp cấp ban', 2, 4, 4, '', 'update ghi chú đóng góp', '2016-05-14 16:00:08', '2016-05-14 09:00:08', '2016-05-14 09:00:08', 2, 2, 2),
(2, 1, 'Dong ghop trong hoat dong cap dai', 1, 4, 4, '', 'ghi chú để được đi ăn cơm', '2016-05-14 11:12:03', '2016-05-14 04:12:03', '2016-05-14 04:12:03', 3, 3, 3),
(3, 1, 'Dong ghop trong hoat dong cap dai', 1, 4, 4, '', 'ghi chú ', '2016-05-14 04:12:13', '2016-05-14 04:12:13', NULL, 2, 2, 2),
(4, 2, 'Đóng Ghóp cấp đài', 2, 4, 28, '', 'Đóng Ghóp cộng 1 điểm', '2016-05-15 04:00:40', '2016-05-14 21:00:40', NULL, 2, 2, 2),
(5, 2, 'Đóng Ghóp cấp đài', 2, 4, 28, '', '2', '2016-05-15 04:00:45', '2016-05-14 21:00:45', '2016-05-14 21:00:45', NULL, 2, 2),
(6, 70, 'Sáng kiến cải tiến cấp Đài: Cộng 5 - 10 điểm', 5, 5, 71, '', 'dfsa', '2016-05-24 04:07:28', '2016-05-23 21:07:28', NULL, 2, 5, 5),
(7, 57, 'Sáng kiến cải tiến Cấp VTV NEWS :cộng 2- 5 điểm', 2, 5, 65, '', '', '2016-05-25 03:49:36', '2016-05-25 03:49:36', NULL, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kyluat`
--

CREATE TABLE `kyluat` (
  `_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `chucdanh_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `diemtru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kyluat`
--

INSERT INTO `kyluat` (`_id`, `name`, `level_id`, `room_id`, `chucdanh_id`, `created_at`, `updated_at`, `deleted_at`, `diemtru`) VALUES
(1, 'Kỷ Luật Lao Động 1', 5, 2, 7, '2016-05-14 09:34:35', '2016-05-07 22:48:43', NULL, 2),
(2, 'Kỷ Luật Nhân Viên Bậc 3', 5, 2, 9, '2016-05-14 19:48:11', '2016-05-14 19:48:11', NULL, 2),
(3, 'Đến giao ban biên tập Đài  muộn 5  phút: trừ 1 điểm/ lần.', 5, 3, 11, '2016-05-16 18:18:08', '2016-05-16 18:18:08', NULL, 1),
(4, 'Đến dự họp VTV NEWS, Đài muộn 15 phút  trở lên: trừ 2 - 3 điểm/ lần. ', 5, 3, 11, '2016-05-16 18:18:29', '2016-05-16 18:18:29', NULL, 2),
(5, 'Bỏtrực sóng:  trừ 5 điểm/ buổi ', 5, 3, 11, '2016-05-16 18:18:45', '2016-05-16 18:18:45', NULL, 5),
(6, 'Không báo cáo sự cố, nội dung kịp thời  trong giao ban Đài và lãnh đạo  Đài khi xảy ra (Sự cố trung bình : trừ 2-4 điểm / lần   )', 5, 3, 11, '2016-05-16 18:19:40', '2016-05-16 18:19:40', NULL, 2),
(7, 'Không báo cáo sự cố, nội dung kịp thời  trong giao ban Đài và lãnh đạo  Đài khi xảy ra (Sự cố lớn, nghiêm trọng : trừ 5- 7  điểm / lần)', 5, 3, 11, '2016-05-16 18:20:04', '2016-05-16 18:20:04', NULL, 5),
(8, 'Không bảo đảm giờ giấc họp:- Đến họp muộn 5  phút: trừ 1 điểm / lần', 5, 5, 17, '2016-05-17 08:38:19', '2016-05-17 08:38:19', NULL, 1),
(9, 'Không bảo đảm giờ giấc họp:- Đến họp muộn 5  phút: trừ 1 điểm / lần', 5, 6, 21, '2016-05-17 08:38:29', '2016-05-17 08:38:29', NULL, 1),
(10, 'Không bảo đảm giờ giấc họp:- Đến họp muộn 15 phút  trở lên: trừ 2-3 điểm/lần  ', 5, 5, 17, '2016-05-17 08:39:08', '2016-05-17 08:39:08', NULL, 2),
(11, 'Không bảo đảm giờ giấc họp:- Đến họp muộn 15 phút  trở lên: trừ 2-3 điểm/lần  ', 5, 6, 21, '2016-05-17 08:39:20', '2016-05-17 08:39:20', NULL, 2),
(12, 'Không bảo đảm ngày công, giờ công: - Đạt 90 - 95% thời gian lao động: trừ 4 điểm.', 5, 5, 17, '2016-05-17 08:40:37', '2016-05-17 08:40:37', NULL, 4),
(13, 'Không bảo đảm ngày công, giờ công: - Đạt 90 - 95% thời gian lao động: trừ 4 điểm.', 5, 6, 21, '2016-05-17 08:40:48', '2016-05-17 08:40:48', NULL, 4),
(14, 'Không bảo đảm ngày công, giờ công: -Đạt 80 - 89% thời gian lao động: trừ 6 điểm.', 5, 5, 17, '2016-05-17 08:41:16', '2016-05-17 08:41:16', NULL, 6),
(15, 'Không bảo đảm ngày công, giờ công: -Đạt 80 - 89% thời gian lao động: trừ 6 điểm.', 5, 6, 21, '2016-05-17 08:41:33', '2016-05-17 08:41:33', NULL, 6),
(16, 'Không bảo đảm ngày công, giờ công: - Đạt 70 - 79% thời gian lao động: trừ 8 điểm.', 5, 5, 17, '2016-05-17 08:42:00', '2016-05-17 08:42:00', NULL, 8),
(17, 'Không bảo đảm ngày công, giờ công: - Đạt 70 - 79% thời gian lao động: trừ 8 điểm.', 5, 6, 21, '2016-05-17 08:42:15', '2016-05-17 08:42:15', NULL, 8),
(18, 'Không bảo đảm ngày công, giờ công: - Đạt dưới 70% thời gian lao động: trừ 15 điểm.', 5, 6, 21, '2016-05-17 08:42:44', '2016-05-17 08:42:44', NULL, 15),
(19, 'Không bảo đảm ngày công, giờ công: - Đạt dưới 70% thời gian lao động: trừ 15 điểm.', 5, 5, 17, '2016-05-17 08:42:57', '2016-05-17 08:42:57', NULL, 15),
(20, 'Chậm trể trong thực hiện công tác quản lý, điều hành - Mức độ trung bình: trừ 2 điểm/việc', 5, 5, 17, '2016-05-17 18:21:38', '2016-05-17 18:21:38', NULL, 2),
(21, 'Chậm trể trong thực hiện công tác quản lý, điều hành - Mức độ trung bình: trừ 2 điểm/việc', 5, 6, 21, '2016-05-17 18:21:48', '2016-05-17 18:21:48', NULL, 2),
(22, 'Chậm trể trong thực hiện công tác quản lý, điều hành : Mức độ nghiêm trọng: trừ 4 điểm/việc', 5, 5, 17, '2016-05-17 18:24:29', '2016-05-17 18:24:29', NULL, 4),
(23, 'Chậm trể trong thực hiện công tác quản lý, điều hành : Mức độ nghiêm trọng: trừ 4 điểm/việc', 5, 6, 21, '2016-05-17 18:24:38', '2016-05-17 18:24:38', NULL, 4),
(24, 'Không bảo đảm giờ giấc họp: Đến họp muộn 5  phút: Trừ 1 điểm/lần', 5, 5, 18, '2016-05-17 19:01:32', '2016-05-17 19:01:32', NULL, 1),
(25, 'Không bảo đảm giờ giấc họp: Đến họp muộn 5  phút: Trừ 1 điểm/lần', 5, 6, 29, '2016-05-17 19:01:42', '2016-05-17 19:01:42', NULL, 1),
(26, 'Không bảo đảm giờ giấc họp: Đến họp muộn 15 phút trở lên: Trừ 2-3 điểm/lần', 5, 5, 18, '2016-05-17 19:02:35', '2016-05-17 19:02:35', NULL, 2),
(27, 'Không bảo đảm giờ giấc họp: Đến họp muộn 15 phút trở lên: Trừ 2-3 điểm/lần', 5, 6, 29, '2016-05-17 19:02:48', '2016-05-17 19:02:48', NULL, 2),
(28, 'Không bảo đảm ngày công, giờ công: Đạt 90 - 95% thời gian lao động: Trừ 4 điểm.', 5, 5, 18, '2016-05-17 19:03:09', '2016-05-17 19:03:09', NULL, 4),
(29, 'Không bảo đảm ngày công, giờ công: Đạt 90 - 95% thời gian lao động: Trừ 4 điểm.', 5, 6, 29, '2016-05-17 19:03:21', '2016-05-17 19:03:21', NULL, 4),
(30, 'Không bảo đảm ngày công, giờ công: Đạt 80 - 89% thời gian lao động: Trừ 6 điểm.', 5, 5, 18, '2016-05-17 19:03:38', '2016-05-17 19:03:38', NULL, 6),
(31, 'Không bảo đảm ngày công, giờ công: Đạt 80 - 89% thời gian lao động: Trừ 6 điểm.', 5, 6, 29, '2016-05-17 19:04:13', '2016-05-17 19:04:13', NULL, 6),
(32, 'Không bảo đảm ngày công, giờ công:  Đạt 70 - 79% thời gian lao động: Trừ 8 điểm', 5, 5, 18, '2016-05-17 19:04:34', '2016-05-17 19:04:34', NULL, 8),
(33, ' Không bảo đảm ngày công, giờ công: Đạt 70 - 79% thời gian lao động: Trừ 8 điểm', 5, 6, 29, '2016-05-17 19:04:53', '2016-05-17 19:04:53', NULL, 8),
(34, 'Không bảo đảm ngày công, giờ công: Đạt dưới 70% thời gian lao động: Trừ 15 điểm', 5, 5, 18, '2016-05-17 19:05:24', '2016-05-17 19:05:24', NULL, 15),
(35, 'Không bảo đảm ngày công, giờ công: Đạt dưới 70% thời gian lao động: Trừ 15 điểm', 5, 6, 29, '2016-05-17 19:05:37', '2016-05-17 19:05:37', NULL, 15),
(36, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi trung bình: Trừ 3 - 5 điểm/lỗi', 5, 5, 18, '2016-05-17 19:06:11', '2016-05-17 19:06:11', NULL, 3),
(37, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi trung bình: Trừ 3 - 5 điểm/lỗi', 5, 6, 29, '2016-05-17 19:06:36', '2016-05-17 19:06:36', NULL, 3),
(38, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan:  Lỗi nặng: Trừ 8 - 10 điểm/lỗi', 5, 5, 18, '2016-05-17 19:06:52', '2016-05-17 19:06:52', NULL, 8),
(39, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan:  Lỗi nặng: Trừ 8 - 10 điểm/lỗi', 5, 6, 29, '2016-05-17 19:07:04', '2016-05-17 19:07:04', NULL, 8),
(40, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan:   Lỗi nghiêm trọng: Trừ 15 - 20 điểm/lỗi', 5, 5, 18, '2016-05-17 19:07:31', '2016-05-17 19:07:31', NULL, 15),
(41, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan:   Lỗi nghiêm trọng: Trừ 15 - 20 điểm/lỗi', 5, 6, 29, '2016-05-17 19:07:42', '2016-05-17 19:07:42', NULL, 15),
(42, 'Chậm trễ trong thực hiện công tác quản lý, điều hành Mức độ trung bình: Trừ 2 điểm/việc', 5, 5, 18, '2016-05-17 19:08:04', '2016-05-17 19:08:04', NULL, 2),
(43, 'Chậm trễ trong thực hiện công tác quản lý, điều hành Mức độ trung bình: Trừ 2 điểm/việc', 5, 6, 29, '2016-05-17 19:08:18', '2016-05-17 19:08:18', NULL, 2),
(44, 'Chậm trễ trong thực hiện công tác quản lý, điều hành Mức độ nghiêm trọng: Trừ 4 điểm/việc', 5, 6, 29, '2016-05-17 19:08:42', '2016-05-17 19:08:42', NULL, 4),
(45, 'Chậm trễ trong thực hiện công tác quản lý, điều hành Mức độ nghiêm trọng: Trừ 4 điểm/việc', 5, 5, 18, '2016-05-17 19:08:52', '2016-05-17 19:08:52', NULL, 4),
(46, 'Thiếu tinh thần hợp tác trong Ban: Trừ 2 điểm.', 5, 5, 18, '2016-05-18 02:09:31', '2016-05-17 19:13:46', '2016-05-17 19:13:46', 2),
(47, 'Thiếu tinh thần hợp tác trong Ban: Trừ 2 điểm.', 5, 6, 29, '2016-05-18 02:10:09', '2016-05-17 19:14:24', '2016-05-17 19:14:24', 2),
(48, 'Thiếu tinh thần hợp tác trong Đài: Trừ 3 điểm.', 5, 5, 18, '2016-05-18 02:09:57', '2016-05-17 19:14:12', '2016-05-17 19:14:12', 3),
(49, 'Thiếu tinh thần hợp tác trong Đài: Trừ 3 điểm.', 5, 6, 29, '2016-05-18 02:10:17', '2016-05-17 19:14:32', '2016-05-17 19:14:32', 3),
(50, 'Thiếu dân chủ, có lời nói, hành động làm ảnh hưởng đến đoàn kết nội bộ: Trừ 5 điểm.', 5, 5, 18, '2016-05-18 02:10:24', '2016-05-17 19:14:39', '2016-05-17 19:14:39', 5),
(51, 'Thiếu dân chủ, có lời nói, hành động làm ảnh hưởng đến đoàn kết nội bộ: Trừ 5 điểm.', 5, 6, 29, '2016-05-18 02:10:30', '2016-05-17 19:14:45', '2016-05-17 19:14:45', 5),
(52, 'Vi phạm quy định về văn hoá công sở: Trừ 1- 3  điểm.', 5, 5, 18, '2016-05-18 02:10:40', '2016-05-17 19:14:55', '2016-05-17 19:14:55', 1),
(53, 'Vi phạm quy định về văn hoá công sở: Trừ 1- 3  điểm.', 5, 6, 29, '2016-05-18 02:10:48', '2016-05-17 19:15:03', '2016-05-17 19:15:03', 1),
(54, 'Không bảo đảm giờ giấc họp: Đến họp muộn 5  phút: trừ 1 điểm/lần', 5, 5, 19, '2016-05-17 21:11:25', '2016-05-17 21:11:25', NULL, 1),
(55, 'Không bảo đảm giờ giấc họp: Đến họp muộn 5  phút: trừ 1 điểm/lần', 5, 5, 20, '2016-05-17 21:12:04', '2016-05-17 21:12:04', NULL, 1),
(56, 'Không bảo đảm giờ giấc họp: Đến họp muộn 5  phút: trừ 1 điểm/lần', 5, 6, 23, '2016-05-17 21:12:16', '2016-05-17 21:12:16', NULL, 1),
(57, 'Không bảo đảm giờ giấc họp: Đến họp muộn 5  phút: trừ 1 điểm/lần', 5, 6, 24, '2016-05-17 21:12:32', '2016-05-17 21:12:32', NULL, 1),
(58, 'Không bảo đảm giờ giấc họp: Đến họp muộn 5  phút: trừ 1 điểm/lần', 5, 6, 23, '2016-05-17 21:12:42', '2016-05-17 21:12:42', NULL, 1),
(59, 'Không bảo đảm giờ giấc họp: Đến họp muộn 15 phút  trở lên: trừ 2 - 3 điểm/lần ', 5, 5, 19, '2016-05-17 21:13:08', '2016-05-17 21:13:08', NULL, 2),
(60, 'Không bảo đảm giờ giấc họp: Đến họp muộn 15 phút  trở lên: trừ 2 - 3 điểm/lần ', 5, 5, 20, '2016-05-17 21:13:25', '2016-05-17 21:13:25', NULL, 2),
(61, 'Không bảo đảm ngày công, giờ công:  Đạt 90 - 95% thời gian lao động: trừ 4 điểm.', 5, 5, 19, '2016-05-17 21:20:51', '2016-05-17 21:20:51', NULL, 4),
(62, 'Không bảo đảm ngày công, giờ công:  Đạt 90 - 95% thời gian lao động: trừ 4 điểm.', 5, 5, 20, '2016-05-17 21:21:02', '2016-05-17 21:21:02', NULL, 4),
(63, 'Không bảo đảm ngày công, giờ công:  Đạt 90 - 95% thời gian lao động: trừ 4 điểm.', 5, 6, 23, '2016-05-17 21:21:20', '2016-05-17 21:21:20', NULL, 4),
(64, 'Không bảo đảm ngày công, giờ công:  Đạt 90 - 95% thời gian lao động: trừ 4 điểm.', 5, 6, 24, '2016-05-17 21:21:30', '2016-05-17 21:21:30', NULL, 4),
(65, 'Không bảo đảm ngày công, giờ công:   Đạt 80 - 89% thời gian lao động: trừ 6 điểm.', 5, 5, 19, '2016-05-17 21:21:49', '2016-05-17 21:21:49', NULL, 6),
(66, ' Không bảo đảm ngày công, giờ công:  Đạt 80 - 89% thời gian lao động: trừ 6 điểm.', 5, 5, 20, '2016-05-17 21:22:08', '2016-05-17 21:22:08', NULL, 6),
(67, ' Không bảo đảm ngày công, giờ công:  Đạt 80 - 89% thời gian lao động: trừ 6 điểm.', 5, 6, 23, '2016-05-17 21:22:18', '2016-05-17 21:22:18', NULL, 6),
(68, ' Không bảo đảm ngày công, giờ công:  Đạt 80 - 89% thời gian lao động: trừ 6 điểm.', 5, 6, 24, '2016-05-17 21:22:29', '2016-05-17 21:22:29', NULL, 6),
(69, ' Không bảo đảm ngày công, giờ công:  Đạt 70 - 79% thời gian lao động: trừ 8 điểm', 5, 5, 19, '2016-05-17 21:23:05', '2016-05-17 21:23:05', NULL, 8),
(70, ' Không bảo đảm ngày công, giờ công:  Đạt 70 - 79% thời gian lao động: trừ 8 điểm', 5, 5, 20, '2016-05-17 21:23:17', '2016-05-17 21:23:17', NULL, 8),
(71, ' Không bảo đảm ngày công, giờ công:  Đạt 70 - 79% thời gian lao động: trừ 8 điểm', 5, 6, 23, '2016-05-17 21:23:30', '2016-05-17 21:23:30', NULL, 8),
(72, ' Không bảo đảm ngày công, giờ công:  Đạt 70 - 79% thời gian lao động: trừ 8 điểm', 5, 6, 24, '2016-05-17 21:23:39', '2016-05-17 21:23:39', NULL, 8),
(73, ' Không bảo đảm ngày công, giờ công: Đạt dưới 70% thời gian lao động: trừ 15 điểm.', 5, 5, 19, '2016-05-17 21:24:03', '2016-05-17 21:24:03', NULL, 15),
(74, ' Không bảo đảm ngày công, giờ công: Đạt dưới 70% thời gian lao động: trừ 15 điểm.', 5, 5, 20, '2016-05-17 21:24:21', '2016-05-17 21:24:21', NULL, 15),
(75, ' Không bảo đảm ngày công, giờ công: Đạt dưới 70% thời gian lao động: trừ 15 điểm.', 5, 6, 23, '2016-05-17 21:24:34', '2016-05-17 21:24:34', NULL, 15),
(76, ' Không bảo đảm ngày công, giờ công: Đạt dưới 70% thời gian lao động: trừ 15 điểm.', 5, 6, 24, '2016-05-17 21:24:45', '2016-05-17 21:24:45', NULL, 15),
(77, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi trung bình trừ 3 - 5 điểm/lỗi', 5, 5, 19, '2016-05-17 21:42:12', '2016-05-17 21:42:12', NULL, 3),
(78, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi trung bình trừ 3 - 5 điểm/lỗi', 5, 5, 20, '2016-05-17 21:42:22', '2016-05-17 21:42:22', NULL, 3),
(79, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi trung bình trừ 3 - 5 điểm/lỗi', 5, 6, 23, '2016-05-17 21:42:34', '2016-05-17 21:42:34', NULL, 3),
(80, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi trung bình trừ 3 - 5 điểm/lỗi', 5, 6, 24, '2016-05-17 21:42:44', '2016-05-17 21:42:44', NULL, 3),
(81, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi nặng trừ 8 - 10 điểm/lỗi', 5, 5, 19, '2016-05-17 21:43:11', '2016-05-17 21:43:11', NULL, 8),
(82, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi nặng trừ 8 - 10 điểm/lỗi', 5, 6, 23, '2016-05-17 21:43:27', '2016-05-17 21:43:27', NULL, 8),
(83, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi nặng trừ 8 - 10 điểm/lỗi', 5, 6, 24, '2016-05-17 21:43:41', '2016-05-17 21:43:41', NULL, 8),
(84, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi nghiêm trọng trừ 15 - 20 điểm/lỗi', 5, 5, 19, '2016-05-17 21:44:09', '2016-05-17 21:44:09', NULL, 15),
(85, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi nghiêm trọng trừ 15 - 20 điểm/lỗi', 5, 5, 20, '2016-05-17 21:44:24', '2016-05-17 21:44:24', NULL, 15),
(86, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi nghiêm trọng trừ 15 - 20 điểm/lỗi', 5, 6, 23, '2016-05-17 21:44:37', '2016-05-17 21:44:37', NULL, 15),
(87, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi nghiêm trọng trừ 15 - 20 điểm/lỗi', 5, 6, 24, '2016-05-17 21:44:49', '2016-05-17 21:44:49', NULL, 15),
(88, 'Chậm trể trong thực hiện công tác quản lý, điều hành : Mức độ trung bình: trừ 2 điểm/việc', 5, 5, 19, '2016-05-17 21:45:22', '2016-05-17 21:45:22', NULL, 2),
(89, 'Chậm trể trong thực hiện công tác quản lý, điều hành : Mức độ trung bình: trừ 2 điểm/việc', 5, 5, 20, '2016-05-17 21:45:38', '2016-05-17 21:45:38', NULL, 2),
(90, 'Chậm trể trong thực hiện công tác quản lý, điều hành : Mức độ trung bình: trừ 2 điểm/việc', 5, 6, 23, '2016-05-17 21:45:51', '2016-05-17 21:45:51', NULL, 2),
(91, 'Chậm trể trong thực hiện công tác quản lý, điều hành : Mức độ trung bình: trừ 2 điểm/việc', 5, 6, 24, '2016-05-17 21:46:00', '2016-05-17 21:46:00', NULL, 2),
(92, 'Chậm trể trong thực hiện công tác quản lý, điều hành :  Mức độ nghiêm trọng: trừ 4 điểm/việc', 5, 5, 19, '2016-05-17 21:46:19', '2016-05-17 21:46:19', NULL, 4),
(93, 'Chậm trể trong thực hiện công tác quản lý, điều hành :  Mức độ nghiêm trọng: trừ 4 điểm/việc', 5, 5, 20, '2016-05-17 21:46:31', '2016-05-17 21:46:31', NULL, 4),
(94, 'Chậm trể trong thực hiện công tác quản lý, điều hành :  Mức độ nghiêm trọng: trừ 4 điểm/việc', 5, 6, 23, '2016-05-17 21:46:42', '2016-05-17 21:46:42', NULL, 4),
(95, 'Chậm trể trong thực hiện công tác quản lý, điều hành :  Mức độ nghiêm trọng: trừ 4 điểm/việc', 5, 6, 24, '2016-05-17 21:46:56', '2016-05-17 21:46:56', NULL, 4),
(96, 'Không bảo đảm giờ giấc họp: Đến họp muộn 5  phút: trừ 1 điểm / lần', 5, 7, 25, '2016-05-17 23:26:49', '2016-05-17 23:26:49', NULL, 1),
(97, 'Không bảo đảm giờ giấc họp: Đến họp muộn 15 phút  trở lên: trừ 2-3điểm/lần  ', 5, 7, 25, '2016-05-17 23:28:26', '2016-05-17 23:28:26', NULL, 2),
(98, 'Không bảo đảm ngày công, giờ công : Đạt 90 – 95% thời gian lao động: trừ 4 điểm.', 5, 7, 25, '2016-05-17 23:29:08', '2016-05-17 23:29:08', NULL, 4),
(99, 'Không bảo đảm ngày công, giờ công: Đạt 80 – 89% thời gian lao động: trừ 6 điểm.', 5, 7, 25, '2016-05-17 23:29:28', '2016-05-17 23:29:28', NULL, 6),
(100, 'Không bảo đảm ngày công, giờ công: Đạt 70 – 79% thời gian lao động: trừ 8 điểm.', 5, 7, 25, '2016-05-17 23:29:48', '2016-05-17 23:29:48', NULL, 8),
(101, 'Không bảo đảm ngày công, giờ công: Đạt dưới 70% thời gian lao động: trừ 15 điểm.', 5, 7, 25, '2016-05-17 23:30:07', '2016-05-17 23:30:07', NULL, 15),
(102, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi trung bình trừ 3 - 5 điểm/lỗi', 5, 7, 25, '2016-05-17 23:30:26', '2016-05-17 23:30:26', NULL, 3),
(103, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi nặng trừ 8 - 10 điểm/lỗi', 5, 7, 25, '2016-05-17 23:30:50', '2016-05-17 23:30:50', NULL, 8),
(104, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan:  Lỗi nghiêm trọng trừ 15 - 20 điểm/lỗi', 5, 7, 25, '2016-05-17 23:31:06', '2016-05-17 23:31:06', NULL, 15),
(105, 'Chậm trể trong thực hiện công tác quản lý, điều hành: Mức độ trung bình: trừ 2 điểm/việc', 5, 7, 25, '2016-05-17 23:31:29', '2016-05-17 23:31:29', NULL, 2),
(106, 'Chậm trể trong thực hiện công tác quản lý, điều hành: Mức độ nghiêm trọng: trừ 4 điểm/việc', 5, 7, 25, '2016-05-17 23:31:48', '2016-05-17 23:31:48', NULL, 4),
(107, 'Không bảo đảm giờ giấc họp:- Đến họp muộn 5  phút: trừ 1 điểm / lần', 5, 7, 28, '2016-05-18 00:26:11', '2016-05-18 00:26:11', NULL, 1),
(108, 'Không bảo đảm giờ giấc họp:- Đến họp muộn 15 phút  trở lên: trừ 2-3 điểm/lần  ', 5, 7, 28, '2016-05-18 00:26:11', '2016-05-18 00:26:11', NULL, 2),
(109, 'Không bảo đảm ngày công, giờ công: - Đạt 90 - 95% thời gian lao động: trừ 4 điểm.', 5, 7, 28, '2016-05-18 00:26:11', '2016-05-18 00:26:11', NULL, 4),
(110, 'Không bảo đảm ngày công, giờ công: -Đạt 80 - 89% thời gian lao động: trừ 6 điểm.', 5, 7, 28, '2016-05-18 00:26:11', '2016-05-18 00:26:11', NULL, 6),
(111, 'Không bảo đảm ngày công, giờ công: - Đạt 70 - 79% thời gian lao động: trừ 8 điểm.', 5, 7, 28, '2016-05-18 00:26:11', '2016-05-18 00:26:11', NULL, 8),
(112, 'Không bảo đảm ngày công, giờ công: - Đạt dưới 70% thời gian lao động: trừ 15 điểm.', 5, 7, 28, '2016-05-18 00:26:11', '2016-05-18 00:26:11', NULL, 15),
(113, 'Chậm trể trong thực hiện công tác quản lý, điều hành - Mức độ trung bình: trừ 2 điểm/việc', 5, 7, 28, '2016-05-18 07:23:01', '2016-05-18 00:27:16', '2016-05-18 00:27:16', 2),
(114, 'Chậm trể trong thực hiện công tác quản lý, điều hành : Mức độ nghiêm trọng: trừ 4 điểm/việc', 5, 7, 28, '2016-05-18 07:22:52', '2016-05-18 00:27:07', '2016-05-18 00:27:07', 4),
(115, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi trung bình trừ 3 - 5 điểm/lỗi', 5, 7, 28, '2016-05-18 00:29:28', '2016-05-18 00:29:28', NULL, 3),
(116, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi nặng trừ 8 - 10 điểm/lỗi', 5, 7, 28, '2016-05-18 00:29:47', '2016-05-18 00:29:47', NULL, 8),
(117, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi nghiêm trọng trừ 15 - 20 điểm/lỗi', 5, 7, 28, '2016-05-18 00:30:11', '2016-05-18 00:30:11', NULL, 15),
(118, 'Không bảo đảm giờ giấc họp: Đến họp muộn 5  phút: Trừ 1 điểm/lần', 5, 7, 27, '2016-05-18 00:36:32', '2016-05-18 00:36:32', NULL, 1),
(119, 'Không bảo đảm giờ giấc họp: Đến họp muộn 15 phút trở lên: Trừ 2-3 điểm/lần', 5, 7, 27, '2016-05-18 00:36:32', '2016-05-18 00:36:32', NULL, 2),
(120, 'Không bảo đảm ngày công, giờ công: Đạt 90 - 95% thời gian lao động: Trừ 4 điểm.', 5, 7, 27, '2016-05-18 00:36:32', '2016-05-18 00:36:32', NULL, 4),
(121, 'Không bảo đảm ngày công, giờ công: Đạt 80 - 89% thời gian lao động: Trừ 6 điểm.', 5, 7, 27, '2016-05-18 00:36:32', '2016-05-18 00:36:32', NULL, 6),
(122, 'Không bảo đảm ngày công, giờ công:  Đạt 70 - 79% thời gian lao động: Trừ 8 điểm', 5, 7, 27, '2016-05-18 00:36:32', '2016-05-18 00:36:32', NULL, 8),
(123, 'Không bảo đảm ngày công, giờ công: Đạt dưới 70% thời gian lao động: Trừ 15 điểm', 5, 7, 27, '2016-05-18 00:36:32', '2016-05-18 00:36:32', NULL, 15),
(124, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi trung bình: Trừ 3 - 5 điểm/lỗi', 5, 7, 27, '2016-05-18 00:36:33', '2016-05-18 00:36:33', NULL, 3),
(125, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan:  Lỗi nặng: Trừ 8 - 10 điểm/lỗi', 5, 7, 27, '2016-05-18 00:36:33', '2016-05-18 00:36:33', NULL, 8),
(126, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan:   Lỗi nghiêm trọng: Trừ 15 - 20 điểm/lỗi', 5, 7, 27, '2016-05-18 00:36:33', '2016-05-18 00:36:33', NULL, 15),
(127, 'Chậm trễ trong thực hiện công tác quản lý, điều hành Mức độ trung bình: Trừ 2 điểm/việc', 5, 7, 27, '2016-05-18 00:36:33', '2016-05-18 00:36:33', NULL, 2),
(128, 'Chậm trễ trong thực hiện công tác quản lý, điều hành Mức độ nghiêm trọng: Trừ 4 điểm/việc', 5, 7, 27, '2016-05-18 00:36:33', '2016-05-18 00:36:33', NULL, 4),
(129, 'Không bảo đảm giờ giấc họp: Đến họp muộn 5  phút: Trừ 1 điểm/lần', 5, 7, 26, '2016-05-18 00:37:02', '2016-05-18 00:37:02', NULL, 1),
(130, 'Không bảo đảm giờ giấc họp: Đến họp muộn 15 phút trở lên: Trừ 2-3 điểm/lần', 5, 7, 26, '2016-05-18 00:37:02', '2016-05-18 00:37:02', NULL, 2),
(131, 'Không bảo đảm ngày công, giờ công: Đạt 90 - 95% thời gian lao động: Trừ 4 điểm.', 5, 7, 26, '2016-05-18 00:37:02', '2016-05-18 00:37:02', NULL, 4),
(132, 'Không bảo đảm ngày công, giờ công: Đạt 80 - 89% thời gian lao động: Trừ 6 điểm.', 5, 7, 26, '2016-05-18 00:37:03', '2016-05-18 00:37:03', NULL, 6),
(133, 'Không bảo đảm ngày công, giờ công:  Đạt 70 - 79% thời gian lao động: Trừ 8 điểm', 5, 7, 26, '2016-05-18 00:37:03', '2016-05-18 00:37:03', NULL, 8),
(134, 'Không bảo đảm ngày công, giờ công: Đạt dưới 70% thời gian lao động: Trừ 15 điểm', 5, 7, 26, '2016-05-18 00:37:03', '2016-05-18 00:37:03', NULL, 15),
(135, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan: Lỗi trung bình: Trừ 3 - 5 điểm/lỗi', 5, 7, 26, '2016-05-18 00:37:03', '2016-05-18 00:37:03', NULL, 3),
(136, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan:  Lỗi nặng: Trừ 8 - 10 điểm/lỗi', 5, 7, 26, '2016-05-18 00:37:03', '2016-05-18 00:37:03', NULL, 8),
(137, 'Vi phạm quy định an ninh-bảo mật, PCCC, tiết kiệm, quản lý tài sản cơ quan:   Lỗi nghiêm trọng: Trừ 15 - 20 điểm/lỗi', 5, 7, 26, '2016-05-18 00:37:03', '2016-05-18 00:37:03', NULL, 15),
(138, 'Chậm trễ trong thực hiện công tác quản lý, điều hành Mức độ trung bình: Trừ 2 điểm/việc', 5, 7, 26, '2016-05-18 00:37:03', '2016-05-18 00:37:03', NULL, 2),
(139, 'Chậm trễ trong thực hiện công tác quản lý, điều hành Mức độ nghiêm trọng: Trừ 4 điểm/việc', 5, 7, 26, '2016-05-18 00:37:03', '2016-05-18 00:37:03', NULL, 4),
(140, 'Đến làm muộn từ 30'' trở lên và từ lần thứ 2 trở đi: Trừ 2 điểm', 5, 7, 27, '2016-05-18 00:46:17', '2016-05-18 00:46:17', NULL, 2),
(141, 'Nghỉ họp không có lý do: Trừ 3 điểm', 5, 7, 27, '2016-05-18 00:46:39', '2016-05-18 00:46:39', NULL, 3),
(142, 'Nghỉ làm không có lý do: Trừ 2 điểm/ngày', 5, 7, 27, '2016-05-18 00:46:53', '2016-05-18 00:46:53', NULL, 2),
(143, 'Vi phạm nội quy, quy định của đơn vị: Trừ 2 điểm/lần', 5, 7, 27, '2016-05-18 00:47:09', '2016-05-18 00:47:09', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kyluat_taikhoan_thang`
--

CREATE TABLE `kyluat_taikhoan_thang` (
  `_id` int(11) NOT NULL,
  `kyluat_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diemtru` int(11) NOT NULL,
  `thang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nguoigiao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `kl_tutru` int(11) DEFAULT NULL,
  `kl_phongtru` int(11) DEFAULT NULL,
  `kl_bantru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kyluat_taikhoan_thang`
--

INSERT INTO `kyluat_taikhoan_thang` (`_id`, `kyluat_id`, `name`, `diemtru`, `thang_id`, `user_id`, `nguoigiao`, `ghichu`, `created_at`, `updated_at`, `deleted_at`, `kl_tutru`, `kl_phongtru`, `kl_bantru`) VALUES
(1, 1, 'ky luat lao dong 1', 1, 4, 4, '', 'ghi chú kỷ luật lao động', '2016-05-14 10:03:15', '2016-05-14 03:03:15', '2016-05-14 03:03:15', 5, 5, 5),
(2, 1, 'Kỷ Luật Lao Động 1', 2, 4, 4, '', 'ghi chú kỷ luật lao động', '2016-05-14 03:03:46', '2016-05-14 03:03:46', NULL, 2, 2, 2),
(3, 2, 'Kỷ Luật Nhân Viên Bậc 3', 2, 4, 28, '', 'ghi chú', '2016-05-15 03:44:48', '2016-05-14 20:44:48', '2016-05-14 20:44:48', 2, 3, 3),
(4, 2, 'Kỷ Luật Nhân Viên Bậc 3', 2, 4, 28, '', 'ghi chú', '2016-05-14 20:44:55', '2016-05-14 20:44:55', NULL, NULL, 2, 2),
(5, 96, 'Không bảo đảm giờ giấc họp: Đến họp muộn 5  phút: trừ 1 điểm / lần', 1, 0, 65, '', 'đến muộn ngày 15/4', '2016-05-23 20:38:19', '2016-05-23 20:38:19', NULL, 2, 2, 2),
(6, 96, 'Không bảo đảm giờ giấc họp: Đến họp muộn 5  phút: trừ 1 điểm / lần', 1, 0, 65, '', 'cas', '2016-05-23 20:43:19', '2016-05-23 20:43:19', NULL, 2, 2, 2),
(7, 120, 'Không bảo đảm ngày công, giờ công: Đạt 90 - 95% thời gian lao động: Trừ 4 điểm.', 4, 5, 71, '', 'd', '2016-05-26 07:49:01', '2016-05-26 00:49:01', NULL, 2, 2, 2),
(8, 98, 'Không bảo đảm ngày công, giờ công : Đạt 90 – 95% thời gian lao động: trừ 4 điểm.', 4, 5, 65, '', '', '2016-05-25 03:49:02', '2016-05-25 03:49:02', NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `langs`
--

CREATE TABLE `langs` (
  `_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `langs`
--

INSERT INTO `langs` (`_id`, `user_id`, `name`, `code`, `url`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'VI', 'vi', '/images/languages/2y109UNLKe59ozTioS3Q2L06Oj58FZaPhePUlFC04ljYqQppy5zAJrxe.png', 1, '2015-08-22 02:30:22', '2015-08-21 19:30:22', NULL),
(2, 4, 'EN', 'en', '/images/languages/2y10b3Z67zZ4DWJCZxL08H7wO7XRSSJwpTXO0ij60k2Cbje8OStqcmC.png', 1, '2015-08-22 02:30:14', '2015-08-21 19:30:14', NULL),
(3, 4, 'kenshin', 'ke', '', 1, '2015-08-14 19:31:57', '2015-08-14 12:31:57', '2015-08-14 12:31:57'),
(4, 4, 'ok', 'o', '', 1, '2015-08-14 19:32:19', '2015-08-14 12:32:19', '2015-08-14 12:32:19'),
(5, 4, 'Wr', 'wrwr', '', 1, '2015-08-14 19:32:19', '2015-08-14 12:32:19', '2015-08-14 12:32:19'),
(6, 4, 'kenshin 1', 'uy', '', 2, '2015-08-23 01:45:40', '2015-08-22 18:45:40', '2015-08-22 18:45:40'),
(7, 4, 'Black Berry', 'bb', '', 2, '2015-08-23 01:45:40', '2015-08-22 18:45:40', '2015-08-22 18:45:40'),
(8, 4, 'OK 1', 'ok', '/images/languages/2y10BnQDb7FpW3tBUflNYQdgyEYsKQTSxOeUHJuyw5YVQkpzOXZBK.png', 2, '2015-08-23 01:45:40', '2015-08-22 18:45:40', '2015-08-22 18:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `_id` int(11) NOT NULL,
  `mac` varchar(255) DEFAULT NULL,
  `agent` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `app_version_name` varchar(255) DEFAULT NULL,
  `app_version_code` int(11) DEFAULT NULL,
  `db_version` int(11) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `song_id` int(11) DEFAULT NULL,
  `action_type` varchar(255) DEFAULT NULL,
  `action_value` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`_id`, `mac`, `agent`, `ip`, `app_version_name`, `app_version_code`, `db_version`, `language`, `song_id`, `action_type`, `action_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(766, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 782918, 's_play', NULL, '2016-04-19 09:58:58', '2016-04-19 09:58:58', NULL),
(767, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 784600, 's_play', NULL, '2016-04-19 09:58:58', '2016-04-19 09:58:58', NULL),
(768, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 622614, 's_play', NULL, '2016-04-19 09:58:58', '2016-04-19 10:04:45', '2016-04-19 10:04:45'),
(769, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 623141, 's_play', NULL, '2016-04-19 09:58:58', '2016-04-19 09:58:58', NULL),
(770, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 620348, 's_play', NULL, '2016-04-19 09:58:58', '2016-04-19 09:58:58', NULL),
(771, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 786668, 's_play', NULL, '2016-04-19 09:58:58', '2016-04-19 09:58:58', NULL),
(772, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 777744, 's_play', NULL, '2016-04-19 09:58:58', '2016-04-19 09:58:58', NULL),
(773, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 777744, 's_play', NULL, '2016-04-19 09:58:58', '2016-04-19 09:58:58', NULL),
(774, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 620948, 's_play', NULL, '2016-04-19 09:58:58', '2016-04-19 09:58:58', NULL),
(775, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 791347, 's_play', NULL, '2016-04-19 09:58:58', '2016-04-19 09:58:58', NULL),
(776, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 626512, 's_play', NULL, '2016-04-19 09:58:58', '2016-04-19 09:58:58', NULL),
(777, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 626564, 's_play', NULL, '2016-04-19 09:58:58', '2016-04-19 09:58:58', NULL),
(778, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 782017, 's_play', NULL, '2016-04-19 09:58:58', '2016-04-19 09:58:58', NULL),
(779, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 774806, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(780, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(781, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 627633, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(782, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 781520, 's_download', 1, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(783, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 795016, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(784, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 776415, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(785, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 795000, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(786, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 771003, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(787, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 771002, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(788, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 660001, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(789, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 17; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 771002, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(790, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 17; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 771003, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(791, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 17; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 780015, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(792, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 771002, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(793, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 780015, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(794, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 771004, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(795, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 780086, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(796, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 781035, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(797, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 781021, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(798, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 785177, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(799, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 781993, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(800, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 780870, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(801, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 771002, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(802, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 780015, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(803, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 771002, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(804, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 660001, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(805, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 781063, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(806, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 775948, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(807, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786574, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(808, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 792522, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(809, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 792522, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(810, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 771886, 's_play', NULL, '2016-04-19 09:58:59', '2016-04-19 09:58:59', NULL),
(811, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786543, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(812, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 773890, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(813, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786565, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(814, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786565, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(815, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786565, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(816, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(817, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(818, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(819, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786565, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(820, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(821, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(822, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(823, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 628782, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(824, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 628782, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(825, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780786, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(826, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 777907, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(827, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 660386, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(828, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 660386, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(829, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 627739, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(830, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 794138, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(831, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 795016, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(832, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 791382, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(833, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 794740, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(834, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780908, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(835, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 781038, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(836, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 781001, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(837, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 781046, 's_play', NULL, '2016-04-19 09:59:00', '2016-04-19 09:59:00', NULL),
(838, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 786620, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(839, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 786617, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(840, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 620770, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(841, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 772221, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(842, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 628869, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(843, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 628248, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(844, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 786651, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(845, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 628479, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(846, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 775841, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(847, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 789611, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(848, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 784858, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(849, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 623146, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(850, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 786745, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(851, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 794526, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(852, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 794526, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(853, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 628006, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(854, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 782146, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(855, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 787167, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(856, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 787167, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(857, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 783662, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(858, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 789429, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(859, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 787004, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(860, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 787004, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(861, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 787004, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(862, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 782918, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(863, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 784600, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(864, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 17; vn)', '180.93.240.226', '1.0.2', 1, 17, 'vn', 795059, 's_download', 1, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(865, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 17; vn)', '180.93.240.226', '1.0.2', 1, 17, 'vn', 795059, 's_download', 1, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(866, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 771003, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(867, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 771004, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(868, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 780086, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(869, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 626806, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(870, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786558, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(871, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 626563, 's_play', NULL, '2016-04-19 09:59:01', '2016-04-19 09:59:01', NULL),
(872, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 784532, 's_play', NULL, '2016-04-19 09:59:02', '2016-04-19 09:59:02', NULL),
(873, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 773140, 's_play', NULL, '2016-04-19 09:59:02', '2016-04-19 09:59:02', NULL),
(874, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 782388, 's_play', NULL, '2016-04-19 09:59:02', '2016-04-19 09:59:02', NULL),
(875, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 774488, 's_play', NULL, '2016-04-19 09:59:02', '2016-04-19 09:59:02', NULL),
(876, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 782338, 's_play', NULL, '2016-04-19 09:59:02', '2016-04-19 09:59:02', NULL),
(877, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 773140, 's_play', NULL, '2016-04-19 09:59:02', '2016-04-19 09:59:02', NULL),
(878, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 626524, 's_play', NULL, '2016-04-19 09:59:02', '2016-04-19 09:59:02', NULL),
(879, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 792325, 's_play', NULL, '2016-04-19 09:59:02', '2016-04-19 09:59:02', NULL),
(880, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 626536, 's_play', NULL, '2016-04-19 09:59:02', '2016-04-19 09:59:02', NULL),
(881, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 790407, 's_play', NULL, '2016-04-19 09:59:02', '2016-04-19 09:59:02', NULL),
(882, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 784532, 's_play', NULL, '2016-04-19 09:59:02', '2016-04-19 09:59:02', NULL),
(883, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771001, 's_play', NULL, '2016-04-19 09:59:02', '2016-04-19 09:59:02', NULL),
(884, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 627633, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(885, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 621136, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(886, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 621136, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(887, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771008, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(888, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 629375, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(889, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771002, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(890, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771003, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(891, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771002, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(892, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771003, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(893, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 780015, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(894, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 660001, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(895, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771002, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(896, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 780015, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(897, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771004, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(898, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 780086, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(899, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 660001, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(900, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771001, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(901, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771001, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(902, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 780015, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(903, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 629322, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(904, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(905, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(906, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 795037, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(907, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 795063, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(908, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 795057, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(909, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 10000001, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(910, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 10000001, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(911, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 771001, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(912, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 771002, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(913, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 09:59:03', '2016-04-19 09:59:03', NULL),
(914, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(915, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(916, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 795064, 's_download', 1, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(917, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 660006, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(918, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 786772, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(919, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 777742, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(920, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 777743, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(921, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 795064, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(922, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 780889, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(923, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 777819, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(924, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 780816, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(925, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791347, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(926, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791347, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(927, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791347, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(928, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791344, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(929, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795064, 's_download', 1, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(930, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795064, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(931, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795064, 's_download', 1, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(932, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795071, 's_download', 1, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(933, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795082, 's_download', 1, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(934, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795083, 's_download', 1, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(935, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795084, 's_download', 1, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(936, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795059, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(937, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795061, 's_download', 1, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(938, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795064, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(939, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791347, 's_download', 1, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(940, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795064, 's_download', 1, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(941, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795082, 's_play', NULL, '2016-04-19 09:59:04', '2016-04-19 09:59:04', NULL),
(942, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795012, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(943, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795016, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(944, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 771030, 's_download', 1, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(945, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795084, 's_download', 1, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(946, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795058, 's_download', 1, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(947, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795085, 's_download', 1, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(948, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795057, 's_download', 1, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(949, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626567, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(950, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 786558, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(951, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626524, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(952, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 773896, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(953, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626563, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(954, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626536, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(955, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 788147, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(956, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 772584, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(957, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 774641, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(958, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 621492, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(959, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 786962, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(960, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 628869, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(961, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 771030, 's_download', 1, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(962, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 440073472, 's_download', 1, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(963, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 771030, 's_download', 1, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(964, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 782190, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(965, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626513, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(966, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 782388, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(967, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 772427, 's_play', NULL, '2016-04-19 09:59:05', '2016-04-19 09:59:05', NULL),
(968, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 773140, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(969, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 786558, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(970, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626524, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(971, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626527, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(972, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 789156, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(973, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 784090, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(974, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 774505, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(975, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 789156, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(976, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 789545, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(977, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626543, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(978, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626544, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(979, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 790407, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(980, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 784532, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(981, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626557, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(982, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 777690, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(983, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626560, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(984, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 777624, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(985, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 782918, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(986, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 784600, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(987, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795084, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(988, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795082, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(989, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 620217, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(990, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 792935, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(991, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791349, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(992, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 787167, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(993, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 772454, 's_play', NULL, '2016-04-19 09:59:06', '2016-04-19 09:59:06', NULL),
(994, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 771030, 's_download', 1, '2016-04-19 09:59:07', '2016-04-19 09:59:07', NULL),
(995, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 810072695, 's_download', 1, '2016-04-19 09:59:07', '2016-04-19 09:59:07', NULL),
(996, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 810072772, 's_download', 1, '2016-04-19 09:59:07', '2016-04-19 09:59:07', NULL),
(997, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 810072769, 's_download', 1, '2016-04-19 09:59:07', '2016-04-19 09:59:07', NULL),
(998, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 771002, 's_play', NULL, '2016-04-19 09:59:07', '2016-04-19 09:59:07', NULL),
(999, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 787167, 's_play', NULL, '2016-04-19 09:59:07', '2016-04-19 09:59:07', NULL),
(1000, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 772454, 's_play', NULL, '2016-04-19 09:59:07', '2016-04-19 09:59:07', NULL),
(1001, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 780206, 's_play', NULL, '2016-04-19 09:59:07', '2016-04-19 09:59:07', NULL),
(1002, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 792492, 's_play', NULL, '2016-04-19 09:59:07', '2016-04-19 09:59:07', NULL),
(1003, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 793200, 's_play', NULL, '2016-04-19 09:59:07', '2016-04-19 09:59:07', NULL),
(1004, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795035, 's_play', NULL, '2016-04-19 09:59:07', '2016-04-19 09:59:07', NULL),
(1005, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 782918, 's_play', NULL, '2016-04-19 09:59:37', '2016-04-19 09:59:37', NULL),
(1006, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 784600, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1007, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 622614, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1008, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 623141, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1009, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 620348, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1010, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 786668, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1011, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 777744, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1012, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 777744, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1013, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 620948, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1014, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 791347, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1015, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 626512, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1016, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 626564, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1017, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 782017, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1018, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 774806, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1019, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1020, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 627633, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1021, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 781520, 's_download', 1, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1022, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 795016, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1023, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 776415, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1024, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 795000, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1025, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 771003, 's_play', NULL, '2016-04-19 09:59:38', '2016-04-19 09:59:38', NULL),
(1026, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 771002, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL);
INSERT INTO `log` (`_id`, `mac`, `agent`, `ip`, `app_version_name`, `app_version_code`, `db_version`, `language`, `song_id`, `action_type`, `action_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1027, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 660001, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1028, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 17; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 771002, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1029, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 17; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 771003, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1030, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 17; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 780015, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1031, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 771002, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1032, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 780015, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1033, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 771004, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1034, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 780086, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1035, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 781035, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1036, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 781021, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1037, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 785177, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1038, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 781993, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1039, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 780870, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1040, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 771002, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1041, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 780015, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1042, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 771002, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1043, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 660001, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1044, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 781063, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1045, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 775948, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1046, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786574, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1047, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 792522, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1048, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 792522, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1049, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 771886, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1050, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786543, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1051, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 773890, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1052, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786565, 's_play', NULL, '2016-04-19 09:59:39', '2016-04-19 09:59:39', NULL),
(1053, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786565, 's_play', NULL, '2016-04-19 09:59:40', '2016-04-19 09:59:40', NULL),
(1054, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786565, 's_play', NULL, '2016-04-19 09:59:40', '2016-04-19 09:59:40', NULL),
(1055, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 09:59:40', '2016-04-19 09:59:40', NULL),
(1056, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 09:59:40', '2016-04-19 09:59:40', NULL),
(1057, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 09:59:40', '2016-04-19 09:59:40', NULL),
(1058, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786565, 's_play', NULL, '2016-04-19 09:59:40', '2016-04-19 09:59:40', NULL),
(1059, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 09:59:40', '2016-04-19 09:59:40', NULL),
(1060, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 09:59:40', '2016-04-19 09:59:40', NULL),
(1061, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 09:59:40', '2016-04-19 09:59:40', NULL),
(1062, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 628782, 's_play', NULL, '2016-04-19 09:59:40', '2016-04-19 09:59:40', NULL),
(1063, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 628782, 's_play', NULL, '2016-04-19 09:59:40', '2016-04-19 09:59:40', NULL),
(1064, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780786, 's_play', NULL, '2016-04-19 09:59:40', '2016-04-19 09:59:40', NULL),
(1065, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 777907, 's_play', NULL, '2016-04-19 09:59:41', '2016-04-19 09:59:41', NULL),
(1066, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 660386, 's_play', NULL, '2016-04-19 09:59:42', '2016-04-19 09:59:42', NULL),
(1067, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 660386, 's_play', NULL, '2016-04-19 09:59:43', '2016-04-19 09:59:43', NULL),
(1068, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 627739, 's_play', NULL, '2016-04-19 09:59:43', '2016-04-19 09:59:43', NULL),
(1069, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 794138, 's_play', NULL, '2016-04-19 09:59:43', '2016-04-19 09:59:43', NULL),
(1070, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 795016, 's_play', NULL, '2016-04-19 09:59:43', '2016-04-19 09:59:43', NULL),
(1071, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 791382, 's_play', NULL, '2016-04-19 09:59:43', '2016-04-19 09:59:43', NULL),
(1072, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 794740, 's_play', NULL, '2016-04-19 09:59:43', '2016-04-19 09:59:43', NULL),
(1073, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780908, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1074, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 781038, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1075, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 781001, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1076, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 781046, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1077, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 786620, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1078, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 786617, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1079, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 620770, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1080, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 772221, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1081, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 628869, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1082, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 628248, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1083, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 786651, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1084, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 628479, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1085, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 775841, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1086, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 789611, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1087, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 784858, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1088, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 623146, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1089, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 786745, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1090, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 794526, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1091, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 794526, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1092, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 628006, 's_play', NULL, '2016-04-19 09:59:44', '2016-04-19 09:59:44', NULL),
(1093, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 782146, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1094, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 787167, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1095, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 787167, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1096, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 783662, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1097, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 789429, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1098, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 787004, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1099, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 787004, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1100, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 787004, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1101, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 782918, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1102, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 784600, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1103, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 17; vn)', '180.93.240.226', '1.0.2', 1, 17, 'vn', 795059, 's_download', 1, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1104, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 17; vn)', '180.93.240.226', '1.0.2', 1, 17, 'vn', 795059, 's_download', 1, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1105, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 771003, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1106, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 771004, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1107, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 780086, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1108, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 626806, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1109, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786558, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1110, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 626563, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1111, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 784532, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1112, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 773140, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1113, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 782388, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1114, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 774488, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1115, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 782338, 's_play', NULL, '2016-04-19 09:59:45', '2016-04-19 09:59:45', NULL),
(1116, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 773140, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1117, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 626524, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1118, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 792325, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1119, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 626536, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1120, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 790407, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1121, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 784532, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1122, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771001, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1123, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 627633, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1124, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 621136, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1125, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 621136, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1126, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771008, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1127, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 629375, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1128, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771002, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1129, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771003, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1130, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771002, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1131, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771003, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1132, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 780015, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1133, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 660001, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1134, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771002, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1135, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 780015, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1136, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771004, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1137, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 780086, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1138, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 660001, 's_play', NULL, '2016-04-19 09:59:46', '2016-04-19 09:59:46', NULL),
(1139, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771001, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1140, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771001, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1141, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 780015, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1142, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 629322, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1143, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1144, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1145, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 795037, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1146, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 795063, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1147, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 795057, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1148, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 10000001, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1149, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 10000001, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1150, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 771001, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1151, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 771002, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1152, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1153, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1154, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1155, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 795064, 's_download', 1, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1156, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 660006, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1157, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 786772, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1158, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 777742, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1159, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 777743, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1160, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 795064, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1161, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 780889, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1162, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 777819, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1163, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 780816, 's_play', NULL, '2016-04-19 09:59:47', '2016-04-19 09:59:47', NULL),
(1164, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791347, 's_play', NULL, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1165, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791347, 's_play', NULL, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1166, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791347, 's_play', NULL, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1167, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791344, 's_play', NULL, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1168, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795064, 's_download', 1, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1169, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795064, 's_play', NULL, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1170, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795064, 's_download', 1, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1171, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795071, 's_download', 1, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1172, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795082, 's_download', 1, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1173, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795083, 's_download', 1, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1174, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795084, 's_download', 1, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1175, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795059, 's_play', NULL, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1176, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795061, 's_download', 1, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1177, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795064, 's_play', NULL, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1178, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791347, 's_download', 1, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1179, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795064, 's_download', 1, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1180, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795082, 's_play', NULL, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1181, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795012, 's_play', NULL, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1182, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795016, 's_play', NULL, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1183, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 771030, 's_download', 1, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1184, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795084, 's_download', 1, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1185, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795058, 's_download', 1, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1186, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795085, 's_download', 1, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1187, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795057, 's_download', 1, '2016-04-19 09:59:48', '2016-04-19 09:59:48', NULL),
(1188, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626567, 's_play', NULL, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1189, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 786558, 's_play', NULL, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1190, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626524, 's_play', NULL, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1191, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 773896, 's_play', NULL, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1192, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626563, 's_play', NULL, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1193, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626536, 's_play', NULL, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1194, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 788147, 's_play', NULL, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1195, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 772584, 's_play', NULL, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1196, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 774641, 's_play', NULL, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1197, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 621492, 's_play', NULL, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1198, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 786962, 's_play', NULL, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1199, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 628869, 's_play', NULL, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1200, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 771030, 's_download', 1, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1201, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 440073472, 's_download', 1, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1202, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 771030, 's_download', 1, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1203, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 782190, 's_play', NULL, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1204, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626513, 's_play', NULL, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1205, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 782388, 's_play', NULL, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1206, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 772427, 's_play', NULL, '2016-04-19 09:59:49', '2016-04-19 09:59:49', NULL),
(1207, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 773140, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1208, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 786558, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1209, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626524, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1210, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626527, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1211, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 789156, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1212, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 784090, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1213, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 774505, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1214, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 789156, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1215, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 789545, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1216, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626543, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1217, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626544, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1218, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 790407, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1219, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 784532, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1220, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626557, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1221, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 777690, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1222, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626560, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1223, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 777624, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1224, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 782918, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1225, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 784600, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1226, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795084, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1227, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795082, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1228, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 620217, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1229, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 792935, 's_play', NULL, '2016-04-19 09:59:50', '2016-04-19 09:59:50', NULL),
(1230, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791349, 's_play', NULL, '2016-04-19 09:59:51', '2016-04-19 09:59:51', NULL),
(1231, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 787167, 's_play', NULL, '2016-04-19 09:59:51', '2016-04-19 09:59:51', NULL),
(1232, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 772454, 's_play', NULL, '2016-04-19 09:59:51', '2016-04-19 09:59:51', NULL),
(1233, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 771030, 's_download', 1, '2016-04-19 09:59:51', '2016-04-19 09:59:51', NULL),
(1234, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 810072695, 's_download', 1, '2016-04-19 09:59:51', '2016-04-19 09:59:51', NULL),
(1235, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 810072772, 's_download', 1, '2016-04-19 09:59:51', '2016-04-19 09:59:51', NULL),
(1236, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 810072769, 's_download', 1, '2016-04-19 09:59:51', '2016-04-19 09:59:51', NULL),
(1237, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 771002, 's_play', NULL, '2016-04-19 09:59:51', '2016-04-19 09:59:51', NULL),
(1238, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 787167, 's_play', NULL, '2016-04-19 09:59:51', '2016-04-19 09:59:51', NULL),
(1239, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 772454, 's_play', NULL, '2016-04-19 09:59:51', '2016-04-19 09:59:51', NULL),
(1240, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 780206, 's_play', NULL, '2016-04-19 09:59:51', '2016-04-19 09:59:51', NULL),
(1241, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 792492, 's_play', NULL, '2016-04-19 09:59:51', '2016-04-19 09:59:51', NULL),
(1242, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 793200, 's_play', NULL, '2016-04-19 09:59:51', '2016-04-19 09:59:51', NULL),
(1243, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795035, 's_play', NULL, '2016-04-19 09:59:51', '2016-04-19 09:59:51', NULL),
(1244, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 782918, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1245, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 784600, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1246, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 622614, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1247, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 623141, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1248, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 620348, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1249, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 786668, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1250, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 777744, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1251, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 777744, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1252, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 620948, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1253, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 791347, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1254, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 626512, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1255, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 626564, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1256, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 782017, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1257, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 774806, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1258, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1259, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 627633, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1260, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 781520, 's_download', 1, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1261, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 795016, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1262, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 776415, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1263, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 795000, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1264, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 771003, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1265, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 771002, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1266, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 660001, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1267, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 17; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 771002, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1268, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 17; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 771003, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1269, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 17; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 780015, 's_play', NULL, '2016-04-19 10:01:43', '2016-04-19 10:01:43', NULL),
(1270, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 771002, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1271, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 780015, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1272, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 771004, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1273, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.88', '1.0.2', 1, 17, 'vn', 780086, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1274, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 781035, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1275, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 781021, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1276, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 785177, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1277, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 781993, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1278, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 780870, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1279, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 771002, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1280, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 780015, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1281, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 771002, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1282, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.138', '1.0.2', 1, 1, 'vn', 660001, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1283, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 781063, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1284, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 775948, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1285, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786574, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1286, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 792522, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL);
INSERT INTO `log` (`_id`, `mac`, `agent`, `ip`, `app_version_name`, `app_version_code`, `db_version`, `language`, `song_id`, `action_type`, `action_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1287, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 792522, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1288, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 771886, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1289, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786543, 's_play', NULL, '2016-04-19 10:01:44', '2016-04-19 10:01:44', NULL),
(1290, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 773890, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1291, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786565, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1292, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786565, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1293, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786565, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1294, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1295, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1296, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1297, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786565, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1298, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1299, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1300, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780666, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1301, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 628782, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1302, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 628782, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1303, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780786, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1304, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 777907, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1305, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 660386, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1306, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 660386, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1307, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 627739, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1308, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 794138, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1309, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 795016, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1310, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 791382, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1311, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 794740, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1312, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 780908, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1313, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 781038, 's_play', NULL, '2016-04-19 10:01:45', '2016-04-19 10:01:45', NULL),
(1314, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 781001, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1315, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 781046, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1316, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 786620, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1317, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 786617, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1318, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 620770, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1319, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 772221, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1320, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 628869, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1321, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 628248, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1322, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 786651, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1323, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 628479, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1324, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 775841, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1325, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 789611, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1326, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 784858, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1327, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 623146, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1328, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 786745, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1329, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 794526, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1330, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 794526, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1331, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 628006, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1332, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 782146, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1333, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 787167, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1334, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 787167, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1335, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 783662, 's_play', NULL, '2016-04-19 10:01:46', '2016-04-19 10:01:46', NULL),
(1336, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 789429, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1337, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 787004, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1338, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 787004, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1339, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 787004, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1340, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 782918, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1341, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 784600, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1342, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 17; vn)', '180.93.240.226', '1.0.2', 1, 17, 'vn', 795059, 's_download', 1, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1343, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 17; vn)', '180.93.240.226', '1.0.2', 1, 17, 'vn', 795059, 's_download', 1, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1344, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 771003, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1345, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 771004, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1346, '00:0c:29:e5:0d:3e', 'OSKTV/1.5.1 (Linux; OSKTV 20; 17; vn)', '117.5.198.71', '1.5.1', 20, 17, 'vn', 780086, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1347, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 626806, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1348, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 786558, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1349, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 626563, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1350, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 784532, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1351, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 773140, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1352, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 782388, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1353, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 774488, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1354, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 782338, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1355, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 773140, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1356, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 626524, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1357, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 792325, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1358, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 626536, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1359, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 790407, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1360, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 784532, 's_play', NULL, '2016-04-19 10:01:47', '2016-04-19 10:01:47', NULL),
(1361, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771001, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1362, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 627633, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1363, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 621136, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1364, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 621136, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1365, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771008, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1366, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 629375, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1367, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771002, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1368, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771003, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1369, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771002, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1370, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771003, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1371, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 780015, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1372, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 660001, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1373, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771002, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1374, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 780015, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1375, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771004, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1376, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 780086, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1377, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 660001, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1378, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771001, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1379, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771001, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1380, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 780015, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1381, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 629322, 's_play', NULL, '2016-04-19 10:01:48', '2016-04-19 10:01:48', NULL),
(1382, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1383, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1384, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 795037, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1385, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 795063, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1386, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 795057, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1387, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 10000001, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1388, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 10000001, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1389, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 771001, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1390, 'F0:F6:44:A0:8E:66', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 17; vn)', '117.5.198.71', '2.0 (beta)', 25, 17, 'vn', 771002, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1391, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1392, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1393, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 1, 'vn', 771030, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1394, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 795064, 's_download', 1, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1395, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 660006, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1396, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 786772, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1397, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 777742, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1398, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 777743, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1399, 'F0:F6:44:A0:80:C9', 'OSKTV/1.0.2 (Linux; OSKTV 1; 1; vn)', '180.93.240.226', '1.0.2', 1, 18, 'vn', 795064, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1400, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 780889, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1401, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 777819, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1402, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 17, 'vn', 780816, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1403, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791347, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1404, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791347, 's_play', NULL, '2016-04-19 10:01:49', '2016-04-19 10:01:49', NULL),
(1405, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791347, 's_play', NULL, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1406, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791344, 's_play', NULL, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1407, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795064, 's_download', 1, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1408, 'F0:F6:44:A0:8E:4F', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795064, 's_play', NULL, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1409, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795064, 's_download', 1, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1410, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795071, 's_download', 1, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1411, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795082, 's_download', 1, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1412, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795083, 's_download', 1, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1413, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795084, 's_download', 1, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1414, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795059, 's_play', NULL, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1415, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795061, 's_download', 1, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1416, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795064, 's_play', NULL, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1417, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791347, 's_download', 1, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1418, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795064, 's_download', 1, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1419, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795082, 's_play', NULL, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1420, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795012, 's_play', NULL, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1421, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 18; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795016, 's_play', NULL, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1422, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 771030, 's_download', 1, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1423, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795084, 's_download', 1, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1424, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795058, 's_download', 1, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1425, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795085, 's_download', 1, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1426, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795057, 's_download', 1, '2016-04-19 10:01:50', '2016-04-19 10:01:50', NULL),
(1427, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626567, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1428, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 786558, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1429, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626524, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1430, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 773896, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1431, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626563, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1432, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626536, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1433, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 788147, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1434, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 772584, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1435, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 774641, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1436, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 621492, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1437, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 786962, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1438, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 628869, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1439, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 771030, 's_download', 1, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1440, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 440073472, 's_download', 1, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1441, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 16, 'vn', 771030, 's_download', 1, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1442, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 782190, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1443, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626513, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1444, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 782388, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1445, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 772427, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1446, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 773140, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1447, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 786558, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1448, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626524, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1449, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626527, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1450, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 789156, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-19 10:01:51', NULL),
(1451, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 784090, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-21 21:47:06', '2016-04-21 21:47:06'),
(1452, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 774505, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-21 21:47:06', '2016-04-21 21:47:06'),
(1453, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 789156, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-21 21:47:06', '2016-04-21 21:47:06'),
(1454, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 789545, 's_play', NULL, '2016-04-19 10:01:51', '2016-04-21 21:47:06', '2016-04-21 21:47:06'),
(1455, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626543, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-21 21:47:06', '2016-04-21 21:47:06'),
(1456, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626544, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-21 21:47:06', '2016-04-21 21:47:06'),
(1457, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 790407, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-21 21:47:06', '2016-04-21 21:47:06'),
(1458, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 784532, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-21 21:47:06', '2016-04-21 21:47:06'),
(1459, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626557, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-21 21:47:06', '2016-04-21 21:47:06'),
(1460, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 777690, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-21 21:47:06', '2016-04-21 21:47:06'),
(1461, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 626560, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-21 21:46:57', '2016-04-21 21:46:57'),
(1462, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 777624, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-20 20:54:03', '2016-04-20 20:54:03'),
(1463, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 782918, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-20 20:54:03', '2016-04-20 20:54:03'),
(1464, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 784600, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-20 20:54:03', '2016-04-20 20:54:03'),
(1465, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795084, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-20 20:54:03', '2016-04-20 20:54:03'),
(1466, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795082, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-20 20:54:03', '2016-04-20 20:54:03'),
(1467, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 620217, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-20 20:54:03', '2016-04-20 20:54:03'),
(1468, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 792935, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-20 20:54:03', '2016-04-20 20:54:03'),
(1469, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 791349, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-20 20:54:03', '2016-04-20 20:54:03'),
(1470, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 787167, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-20 20:54:03', '2016-04-20 20:54:03'),
(1471, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 772454, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-20 20:54:02', '2016-04-20 20:54:02'),
(1472, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 771030, 's_download', 1, '2016-04-19 10:01:52', '2016-04-20 20:53:54', '2016-04-20 20:53:54'),
(1473, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 810072695, 's_download', 1, '2016-04-19 10:01:52', '2016-04-20 20:53:54', '2016-04-20 20:53:54'),
(1474, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 810072772, 's_download', 1, '2016-04-19 10:01:52', '2016-04-20 20:53:54', '2016-04-20 20:53:54'),
(1475, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 810072769, 's_download', 1, '2016-04-19 10:01:52', '2016-04-20 20:53:53', '2016-04-20 20:53:53'),
(1476, '00:0c:29:39:05:5b', 'OSKTV/1.5.1 (Linux; OSKTV 20; 18; vn)', '171.248.53.227', '1.5.1', 20, 18, 'vn', 771002, 's_play', NULL, '2016-04-19 10:01:52', '2016-04-20 20:53:53', '2016-04-20 20:53:53'),
(1477, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 787167, 's_play', NULL, '2016-04-19 10:01:53', '2016-04-20 20:53:53', '2016-04-20 20:53:53'),
(1478, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 772454, 's_play', NULL, '2016-04-19 10:01:53', '2016-04-20 20:53:53', '2016-04-20 20:53:53'),
(1479, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 780206, 's_play', NULL, '2016-04-19 10:01:53', '2016-04-20 20:53:53', '2016-04-20 20:53:53'),
(1480, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 792492, 's_play', NULL, '2016-04-19 10:01:53', '2016-04-20 20:53:53', '2016-04-20 20:53:53'),
(1481, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 793200, 's_play', NULL, '2016-04-19 10:01:53', '2016-04-20 20:53:53', '2016-04-20 20:53:53'),
(1482, 'F0:F6:44:A0:90:55', 'OSKTV/2.0 (beta) (Linux; OSKTV 25; 16; vn)', '42.116.177.243', '2.0 (beta)', 25, 18, 'vn', 795035, 's_play', NULL, '2016-04-19 10:01:53', '2016-04-20 20:53:46', '2016-04-20 20:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`_id`, `name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dashboard', 'dashboard', 1, '2016-04-21 07:55:12', '2016-04-21 00:58:32', NULL),
(2, 'permission', 'access permission', 1, '2016-04-21 07:54:15', '2016-04-21 00:57:34', NULL),
(3, 'users', 'access user', 1, '2016-04-21 07:53:56', '2016-04-21 00:57:15', NULL),
(4, 'logs', 'access logs', 1, '2016-04-21 07:53:44', '2016-04-21 00:57:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phamchat`
--

CREATE TABLE `phamchat` (
  `_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `chucdanh_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `diemtru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phamchat`
--

INSERT INTO `phamchat` (`_id`, `name`, `level_id`, `room_id`, `chucdanh_id`, `created_at`, `updated_at`, `deleted_at`, `diemtru`) VALUES
(1, 'Phẩm Chất Cá Nhân', 5, 2, 7, '2016-05-14 10:30:54', '2016-05-07 22:31:36', NULL, 1),
(2, 'Phẩm Chất Nhân Viên ', 5, 2, 9, '2016-05-14 19:47:40', '2016-05-14 19:47:40', NULL, 3),
(3, 'Thiếu tinh thần hợp tác trong VTV NEWS:  trừ 2 điểm', 5, 3, 11, '2016-05-16 18:20:32', '2016-05-16 18:20:32', NULL, 2),
(4, 'Thiếu tinh thần hợp tác trong Đài:  trừ 3 điểm', 5, 3, 11, '2016-05-16 18:20:50', '2016-05-16 18:20:50', NULL, 3),
(5, 'Thiếu dân chủ, có lời nói, hành động làm ảnh hưởng đến đoàn kết nội bộ: trừ 5 diểm', 5, 3, 11, '2016-05-16 18:21:16', '2016-05-16 18:21:16', NULL, 5),
(6, 'Vi phạm quy định về văn hoá công sở trừ 1- 3  điểm.', 5, 3, 11, '2016-05-16 18:22:00', '2016-05-16 18:22:00', NULL, 1),
(7, 'Thiếu tinh thần hợp tác, giúp đỡ nhau (Thiếu tinh thần hợp tác trong VTV NEWS:  trừ 2 điểm).', 5, 5, 17, '2016-05-17 18:26:27', '2016-05-17 18:26:27', NULL, 3),
(8, 'Thiếu tinh thần hợp tác, giúp đỡ nhau (Thiếu tinh thần hợp tác trong VTV NEWS:  trừ 2 điểm).', 5, 6, 21, '2016-05-17 18:26:36', '2016-05-17 18:26:36', NULL, 2),
(9, 'Thiếu tinh thần hợp tác, giúp đỡ nhau (Thiếu dân chủ, có lời nói, hành động làm ảnh hưởng đến đoàn kết nội bộ : trừ 5 điểm).', 5, 5, 17, '2016-05-17 18:27:04', '2016-05-17 18:27:04', NULL, 5),
(10, 'Thiếu tinh thần hợp tác, giúp đỡ nhau (Thiếu dân chủ, có lời nói, hành động làm ảnh hưởng đến đoàn kết nội bộ : trừ 5 điểm).', 5, 6, 21, '2016-05-17 18:27:12', '2016-05-17 18:27:12', NULL, 5),
(11, 'Vi phạm quy định về văn hoá công sở: Trừ 1- 3  điểm.', 5, 5, 17, '2016-05-17 18:27:27', '2016-05-17 18:27:27', NULL, 1),
(12, 'Vi phạm quy định về văn hoá công sở: Trừ 1- 3  điểm.', 5, 6, 21, '2016-05-17 18:27:37', '2016-05-17 18:27:37', NULL, 1),
(13, 'Thiếu tinh thần hợp tác trong Ban: Trừ 2 điểm.', 5, 5, 18, '2016-05-17 19:15:37', '2016-05-17 19:15:37', NULL, 2),
(14, 'Thiếu tinh thần hợp tác trong Ban: Trừ 2 điểm.', 5, 6, 29, '2016-05-17 19:15:47', '2016-05-17 19:15:47', NULL, 2),
(15, 'Thiếu tinh thần hợp tác trong Đài: Trừ 3 điểm.', 5, 5, 18, '2016-05-17 19:16:12', '2016-05-17 19:16:12', NULL, 3),
(16, ' Thiếu tinh thần hợp tác trong Đài: Trừ 3 điểm.', 5, 6, 29, '2016-05-17 19:16:24', '2016-05-17 19:16:24', NULL, 3),
(17, 'Thiếu dân chủ, có lời nói, hành động làm ảnh hưởng đến đoàn kết nội bộ: Trừ 5 điểm', 5, 5, 18, '2016-05-17 19:16:41', '2016-05-17 19:16:41', NULL, 5),
(18, 'Thiếu dân chủ, có lời nói, hành động làm ảnh hưởng đến đoàn kết nội bộ: Trừ 5 điểm', 5, 6, 29, '2016-05-17 19:16:51', '2016-05-17 19:16:51', NULL, 5),
(19, 'Vi phạm quy định về văn hoá công sở: Trừ 1- 3  điểm.', 5, 5, 18, '2016-05-17 19:17:04', '2016-05-17 19:17:04', NULL, 1),
(20, 'Vi phạm quy định về văn hoá công sở: Trừ 1- 3  điểm.', 5, 6, 29, '2016-05-17 19:17:17', '2016-05-17 19:17:17', NULL, 1),
(21, 'Thiếu tinh thần hợp tác trong đơn vị:  trừ 2 điểm.', 5, 5, 19, '2016-05-17 21:47:20', '2016-05-17 21:47:20', NULL, 2),
(22, 'Thiếu tinh thần hợp tác trong đơn vị:  trừ 2 điểm.', 5, 5, 20, '2016-05-17 21:47:32', '2016-05-17 21:47:32', NULL, 2),
(23, 'Thiếu tinh thần hợp tác trong đơn vị:  trừ 2 điểm.', 5, 6, 23, '2016-05-17 21:47:43', '2016-05-17 21:47:43', NULL, 2),
(24, 'Thiếu tinh thần hợp tác trong đơn vị:  trừ 2 điểm.', 5, 6, 24, '2016-05-17 21:47:54', '2016-05-17 21:47:54', NULL, 2),
(25, 'Thiếu tinh thần hợp tác trong đơn vị:  trừ 3 điểm.', 5, 5, 19, '2016-05-17 21:50:00', '2016-05-17 21:50:00', NULL, 3),
(26, 'Thiếu tinh thần hợp tác trong đơn vị:  trừ 3 điểm.', 5, 5, 20, '2016-05-17 21:50:10', '2016-05-17 21:50:10', NULL, 3),
(27, 'Thiếu tinh thần hợp tác trong đơn vị:  trừ 3 điểm.', 5, 6, 23, '2016-05-17 21:50:20', '2016-05-17 21:50:20', NULL, 3),
(28, 'Thiếu tinh thần hợp tác trong đơn vị:  trừ 3 điểm.', 5, 6, 24, '2016-05-17 21:50:29', '2016-05-17 21:50:29', NULL, 3),
(29, 'Thiếu dân chủ, có lời nói, hành động làm ảnh hưởng đến đoàn kết nội bộ : trừ 5 điểm.', 5, 5, 19, '2016-05-17 21:50:42', '2016-05-17 21:50:42', NULL, 5),
(30, 'Thiếu dân chủ, có lời nói, hành động làm ảnh hưởng đến đoàn kết nội bộ : trừ 5 điểm.', 5, 5, 20, '2016-05-17 21:50:52', '2016-05-17 21:50:52', NULL, 5),
(31, 'Thiếu dân chủ, có lời nói, hành động làm ảnh hưởng đến đoàn kết nội bộ : trừ 5 điểm.', 5, 6, 24, '2016-05-17 21:51:02', '2016-05-17 21:51:02', NULL, 5),
(32, 'Thiếu dân chủ, có lời nói, hành động làm ảnh hưởng đến đoàn kết nội bộ : trừ 5 điểm.', 5, 6, 24, '2016-05-17 21:51:14', '2016-05-17 21:51:14', NULL, 3),
(33, 'Vi phạm quy định về văn hoá công sở: Trừ 1- 3  điểm.', 5, 5, 19, '2016-05-17 21:51:39', '2016-05-17 21:51:39', NULL, 1),
(34, 'Vi phạm quy định về văn hoá công sở: Trừ 1- 3  điểm.', 5, 5, 20, '2016-05-17 21:51:50', '2016-05-17 21:51:50', NULL, 1),
(35, 'Vi phạm quy định về văn hoá công sở: Trừ 1- 3  điểm.', 5, 6, 23, '2016-05-17 21:51:59', '2016-05-17 21:51:59', NULL, 1),
(36, 'Vi phạm quy định về văn hoá công sở: Trừ 1- 3  điểm.', 5, 6, 24, '2016-05-17 21:52:09', '2016-05-17 21:52:09', NULL, 1),
(37, 'Sáng kiến cải tiến cấp Ban : cộng 2 - 5 điểm', 5, 5, 19, '2016-05-18 04:51:19', '2016-05-17 21:55:34', '2016-05-17 21:55:34', 2),
(38, 'Sáng kiến cải tiến cấp Ban : cộng 2 - 5 điểm', 5, 5, 20, '2016-05-18 04:51:30', '2016-05-17 21:55:45', '2016-05-17 21:55:45', 2),
(39, 'Sáng kiến cải tiến cấp Ban : cộng 2 - 5 điểm', 5, 6, 23, '2016-05-18 04:51:39', '2016-05-17 21:55:54', '2016-05-17 21:55:54', 2),
(40, 'Sáng kiến cải tiến cấp Ban : cộng 2 - 5 điểm', 5, 6, 24, '2016-05-18 04:51:47', '2016-05-17 21:56:02', '2016-05-17 21:56:02', 2),
(41, 'Sáng kiến cải tiến Cấp Đài:  cộng 5 - 10 điểm', 5, 5, 19, '2016-05-18 04:51:58', '2016-05-17 21:56:13', '2016-05-17 21:56:13', 5),
(42, 'Sáng kiến cải tiến Cấp Đài:  cộng 5 - 10 điểm', 5, 5, 20, '2016-05-18 04:52:06', '2016-05-17 21:56:21', '2016-05-17 21:56:21', 5),
(43, 'Sáng kiến cải tiến Cấp Đài:  cộng 5 - 10 điểm', 5, 6, 24, '2016-05-18 04:52:16', '2016-05-17 21:56:31', '2016-05-17 21:56:31', 5),
(44, 'Sáng kiến cải tiến Cấp Đài:  cộng 5 - 10 điểm', 5, 6, 23, '2016-05-18 04:52:27', '2016-05-17 21:56:42', '2016-05-17 21:56:42', 5),
(45, 'Thiếu tinh thần hợp tác trong đơn vị :  trừ 2 điểm.', 5, 7, 25, '2016-05-17 23:34:58', '2016-05-17 23:34:58', NULL, 2),
(46, 'Thiếu tinh thần hợp tác trong Đài :  trừ 3 điểm', 5, 7, 25, '2016-05-17 23:35:11', '2016-05-17 23:35:11', NULL, 3),
(47, 'Thiếu dân chủ, có lời nói, hành động làm ảnh hưởng đến đoàn kết nội bộ: trừ 5 diểm.', 5, 7, 25, '2016-05-17 23:35:24', '2016-05-17 23:35:24', NULL, 5),
(48, 'Vi phạm quy định về văn hoá công sở: Trừ 1- 3  điểm.', 5, 7, 25, '2016-05-17 23:35:37', '2016-05-17 23:35:37', NULL, 1),
(49, 'Thiếu tinh thần hợp tác trong Ban: Trừ 2 điểm.', 5, 7, 28, '2016-05-18 00:32:31', '2016-05-18 00:32:31', NULL, 2),
(50, 'Thiếu tinh thần hợp tác trong Đài: Trừ 3 điểm.', 5, 7, 28, '2016-05-18 00:32:31', '2016-05-18 00:32:31', NULL, 3),
(51, 'Thiếu dân chủ, có lời nói, hành động làm ảnh hưởng đến đoàn kết nội bộ: Trừ 5 điểm', 5, 7, 28, '2016-05-18 00:32:31', '2016-05-18 00:32:31', NULL, 5),
(52, 'Vi phạm quy định về văn hoá công sở: Trừ 1- 3  điểm.', 5, 7, 28, '2016-05-18 00:32:31', '2016-05-18 00:32:31', NULL, 1),
(53, 'Thiếu tinh thần hợp tác trong Ban: Trừ 2 điểm.', 5, 7, 27, '2016-05-18 00:36:05', '2016-05-18 00:36:05', NULL, 2),
(54, 'Thiếu tinh thần hợp tác trong Đài: Trừ 3 điểm.', 5, 7, 27, '2016-05-18 00:36:05', '2016-05-18 00:36:05', NULL, 3),
(55, 'Thiếu dân chủ, có lời nói, hành động làm ảnh hưởng đến đoàn kết nội bộ: Trừ 5 điểm', 5, 7, 27, '2016-05-18 00:36:05', '2016-05-18 00:36:05', NULL, 5),
(56, 'Vi phạm quy định về văn hoá công sở: Trừ 1- 3  điểm.', 5, 7, 27, '2016-05-18 00:36:05', '2016-05-18 00:36:05', NULL, 1),
(57, 'Thiếu tinh thần hợp tác trong Ban: Trừ 2 điểm.', 5, 7, 26, '2016-05-18 00:36:18', '2016-05-18 00:36:18', NULL, 2),
(58, 'Thiếu tinh thần hợp tác trong Đài: Trừ 3 điểm.', 5, 7, 26, '2016-05-18 00:36:18', '2016-05-18 00:36:18', NULL, 3),
(59, 'Thiếu dân chủ, có lời nói, hành động làm ảnh hưởng đến đoàn kết nội bộ: Trừ 5 điểm', 5, 7, 26, '2016-05-18 00:36:18', '2016-05-18 00:36:18', NULL, 5),
(60, 'Vi phạm quy định về văn hoá công sở: Trừ 1- 3  điểm.', 5, 7, 26, '2016-05-18 00:36:18', '2016-05-18 00:36:18', NULL, 1),
(61, 'Thiếu tinh thần hợp tác trong Ban: Trừ 2 điểm.', 5, 7, 30, '2016-05-18 00:49:33', '2016-05-18 00:49:33', NULL, 2),
(62, 'Thiếu tinh thần hợp tác trong Đài: Trừ 3 điểm.', 5, 7, 30, '2016-05-18 00:49:33', '2016-05-18 00:49:33', NULL, 3),
(63, 'Thiếu dân chủ, có lời nói, hành động làm ảnh hưởng đến đoàn kết nội bộ: Trừ 5 điểm', 5, 7, 30, '2016-05-18 00:49:33', '2016-05-18 00:49:33', NULL, 5),
(64, 'Vi phạm quy định về văn hoá công sở: Trừ 1- 3  điểm.', 5, 7, 30, '2016-05-18 00:49:33', '2016-05-18 00:49:33', NULL, 1),
(65, 'Thiếu tinh thần hợp tác trong Ban: Trừ 2 điểm.', 5, 7, 30, '2016-05-18 00:50:01', '2016-05-18 00:50:01', NULL, 2),
(66, 'Thiếu tinh thần hợp tác trong Đài: Trừ 3 điểm.', 5, 7, 30, '2016-05-18 00:50:01', '2016-05-18 00:50:01', NULL, 3),
(67, 'Thiếu dân chủ, có lời nói, hành động làm ảnh hưởng đến đoàn kết nội bộ: Trừ 5 điểm', 5, 7, 30, '2016-05-18 00:50:01', '2016-05-18 00:50:01', NULL, 5),
(68, 'Vi phạm quy định về văn hoá công sở: Trừ 1- 3  điểm.', 5, 7, 30, '2016-05-18 00:50:01', '2016-05-18 00:50:01', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phamchat_taikhoan_thang`
--

CREATE TABLE `phamchat_taikhoan_thang` (
  `_id` int(11) NOT NULL,
  `phamchat_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diemtru` int(11) NOT NULL,
  `thang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nguoigiao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `pc_tutru` int(11) DEFAULT NULL,
  `pc_phongtru` int(11) DEFAULT NULL,
  `pc_bantru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phamchat_taikhoan_thang`
--

INSERT INTO `phamchat_taikhoan_thang` (`_id`, `phamchat_id`, `name`, `diemtru`, `thang_id`, `user_id`, `nguoigiao`, `ghichu`, `created_at`, `updated_at`, `deleted_at`, `pc_tutru`, `pc_phongtru`, `pc_bantru`) VALUES
(1, 1, 'Pham Chat tai khoan thang', 1, 4, 4, '', 'Phâm chất ghi chú', '2016-05-14 10:24:49', '2016-05-14 03:24:49', '2016-05-14 03:24:49', 5, 5, 5),
(2, 1, 'Phẩm Chất Cá Nhân', 1, 4, 4, '', 'ghi chú phẩm chất', '2016-05-14 10:33:07', '2016-05-14 03:33:07', '2016-05-14 03:33:07', 2, 2, 2),
(3, 1, 'Phẩm Chất Cá Nhân', 1, 4, 4, '', 'ghi chú phẩm chất 2 3 4', '2016-05-14 15:59:37', '2016-05-14 08:59:37', '2016-05-14 08:59:37', 2, 2, 2),
(4, 1, 'Phẩm Chất Cá Nhân', 1, 4, 4, '', 'Phẩm Chất Cá Nhân 1', '2016-05-14 08:59:56', '2016-05-14 08:59:56', NULL, 1, 1, 1),
(5, 2, 'Phẩm Chất Nhân Viên ', 3, 4, 28, '', 'Phẩm Chất Trừ  Điểm 1', '2016-05-15 03:52:15', '2016-05-14 20:52:15', '2016-05-14 20:52:15', 1, 1, 1),
(6, 2, 'Phẩm Chất Nhân Viên ', 3, 4, 28, '', 'Chán Nhỉ', '2016-05-15 03:52:30', '2016-05-14 20:52:30', NULL, NULL, 2, 2),
(7, 54, 'Thiếu tinh thần hợp tác trong Đài: Trừ 3 điểm.', 3, 5, 71, '', 'sd', '2016-05-23 20:59:52', '2016-05-23 20:59:52', NULL, 2, 2, 2),
(8, 45, 'Thiếu tinh thần hợp tác trong đơn vị :  trừ 2 điểm.', 2, 5, 65, '', '', '2016-05-25 03:49:17', '2016-05-25 03:49:17', NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seq_no` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`_id`, `name`, `description`, `seq_no`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Lãnh đạo đơn vị', 'Lãnh đạo đơn vị', 1, 1, '2016-05-16 01:01:46', '2016-05-16 01:01:46', NULL),
(4, 'Phòng Công nghệ và Dịch vụ', 'Phòng Công nghệ và Dịch vụ', 2, 1, '2016-05-16 01:02:02', '2016-05-16 01:02:02', NULL),
(5, 'Phòng Nội dung', 'Phòng Nội dung', 3, 1, '2016-05-16 01:02:19', '2016-05-16 01:02:19', NULL),
(6, 'Phòng Thư ký - Biên tập', 'Phòng Thư ký - Biên tập', 4, 1, '2016-05-16 01:02:35', '2016-05-16 01:02:35', NULL),
(7, 'Phòng Hành chính -  Tổng hợp', 'Phòng Hành chính -  Tổng hợp', 5, 1, '2016-05-16 01:02:55', '2016-05-16 01:02:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`_id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 'admin', 'admin', '2016-04-21 07:53:27', '2016-04-21 00:56:46', NULL, NULL),
(2, 'users', 'access users', '2016-04-21 07:42:20', '2016-04-21 00:45:39', NULL, NULL),
(3, 'permission', 'access permission', '2016-04-21 07:44:47', '2016-04-21 00:48:06', '2016-04-21 00:48:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role1`
--

CREATE TABLE `role1` (
  `_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role1`
--

INSERT INTO `role1` (`_id`, `name`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '', 0, '2015-08-25 14:54:21', '2015-08-25 14:54:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 3, 4, NULL, NULL, NULL),
(3, 3, 2, NULL, NULL, NULL),
(5, 3, 3, NULL, NULL, NULL),
(6, 3, 1, NULL, NULL, NULL),
(8, 1, 3, NULL, NULL, NULL),
(9, 1, 2, NULL, NULL, NULL),
(10, 1, 1, NULL, NULL, NULL),
(11, 1, 4, NULL, NULL, NULL),
(13, 2, 4, NULL, NULL, NULL),
(14, 2, 3, NULL, NULL, NULL),
(15, 2, 2, NULL, NULL, NULL),
(16, 2, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thang`
--

CREATE TABLE `thang` (
  `_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `thanghientai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thang`
--

INSERT INTO `thang` (`_id`, `name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`, `thanghientai`) VALUES
(4, 'Thang 1/ 2014', '1', 1, '2016-05-12 08:31:11', '2016-04-29 02:15:39', NULL, 0),
(5, 'Tháng 4 /2016', 'Tháng 4 /2016', 1, '2016-05-12 08:31:08', '2016-05-08 21:06:32', NULL, 1),
(6, 'Tháng 5/2016', 'Tháng 5/2016', 1, '2016-05-09 18:53:41', '2016-05-09 18:53:41', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tiendo`
--

CREATE TABLE `tiendo` (
  `_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `chucdanh_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `diemtru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tiendo`
--

INSERT INTO `tiendo` (`_id`, `name`, `level_id`, `room_id`, `chucdanh_id`, `created_at`, `updated_at`, `deleted_at`, `diemtru`) VALUES
(1, 'Chức phát sóng các chương trình đặc biệt trong dịp tết nguyên đán', 5, 1, 6, '2016-05-12 03:44:07', '2016-05-11 20:44:07', NULL, 1),
(2, 'Tiến độ Nhân Viên Bậc 1', 5, 2, 9, '2016-05-11 20:44:59', '2016-05-11 20:44:59', NULL, 2),
(3, 'Tiến Độ Trưởng Phòng', 5, 2, 7, '2016-05-13 00:31:55', '2016-05-13 00:31:55', NULL, 2),
(4, 'Tiến Độ Nhân Viên 1', 5, 2, 9, '2016-05-14 19:45:51', '2016-05-14 19:45:51', NULL, 1),
(5, 'Chậm ban hành văn bản, báo cáo do thiếu kiểm tra, đôn đốc (Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi văn bản )', 5, 3, 11, '2016-05-16 18:15:13', '2016-05-16 18:15:13', NULL, 1),
(6, 'Chậm ban hành văn bản, báo cáo do thiếu kiểm tra, đôn đốc (Chậm 30% trở lên so với thời gian quy định: trừ 2 – 3 điểm cho mỗi văn bản )', 5, 3, 11, '2016-05-16 18:16:09', '2016-05-16 18:16:09', NULL, 2),
(7, 'Chậm hoàn thành công việc đề ra (Chậm 20% so với thời gian quy định: trừ 2 –3 điểm cho mỗi công việc)', 5, 3, 11, '2016-05-16 18:16:45', '2016-05-16 18:16:45', NULL, 2),
(8, 'Chậm hoàn thành công việc đề ra (Chậm 30% trở lên so với thời gian quy định: trừ 4 –6 điểm cho mỗi công việc)', 5, 3, 11, '2016-05-16 18:17:18', '2016-05-16 18:17:18', NULL, 4),
(9, 'Chậm hoàn thành các kế hoạch sản xuất tin, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi văn bản.', 5, 5, 17, '2016-05-17 08:34:48', '2016-05-17 08:34:48', NULL, 1),
(10, 'Chậm hoàn thành các kế hoạch sản xuất tin, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi văn bản.', 5, 6, 21, '2016-05-17 08:35:00', '2016-05-17 08:35:00', NULL, 1),
(11, 'Chậm hoàn thành các kế hoạch sản xuất tin, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành Chậm 30% trở lên so với thời gian quy định: trừ 2 - 3 điểm cho mỗi văn bản', 5, 5, 17, '2016-05-17 08:35:37', '2016-05-17 08:35:37', NULL, 2),
(12, 'Chậm hoàn thành các kế hoạch sản xuất tin, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành Chậm 30% trở lên so với thời gian quy định: trừ 2 - 3 điểm cho mỗi văn bản', 5, 6, 21, '2016-05-17 08:35:53', '2016-05-17 08:35:53', NULL, 2),
(13, 'hậm hoàn thành công việc do lãnh đạo phòng, lãnh đạo VTV NEWS giao 5 điểm hậm 20% so với thời gian quy định: trừ 1 - 2 điểm cho mỗi công việc.', 5, 5, 17, '2016-05-17 08:36:34', '2016-05-17 08:36:34', NULL, 2),
(14, 'hậm hoàn thành công việc do lãnh đạo phòng, lãnh đạo VTV NEWS giao 5 điểm hậm 20% so với thời gian quy định: trừ 1 - 2 điểm cho mỗi công việc.', 5, 6, 21, '2016-05-17 08:36:44', '2016-05-17 08:36:44', NULL, 2),
(15, 'Chậm hoàn thành công việc do lãnh đạo phòng, lãnh đạo VTV NEWS giao 5 điểm Chậm 30% trở lên so với thời gian quy định: trừ 3 - 5 điểm cho mỗi công việc', 5, 5, 17, '2016-05-17 08:37:20', '2016-05-17 08:37:20', NULL, 3),
(16, 'Chậm hoàn thành công việc do lãnh đạo phòng, lãnh đạo VTV NEWS giao 5 điểm Chậm 30% trở lên so với thời gian quy định: trừ 3 - 5 điểm cho mỗi công việc', 5, 6, 21, '2016-05-17 08:37:33', '2016-05-17 08:37:33', NULL, 3),
(17, 'Chậm hoàn thành các kế hoạch sản xuất tin, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành ( Chậm 20% so với thời gian quy định: Trừ 1 điểm cho mỗi văn bản.)', 5, 5, 18, '2016-05-17 18:58:23', '2016-05-17 18:58:23', NULL, 1),
(18, 'Chậm hoàn thành các kế hoạch sản xuất tin, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành ( Chậm 20% so với thời gian quy định: Trừ 1 điểm cho mỗi văn bản.)', 5, 6, 29, '2016-05-17 18:58:34', '2016-05-17 18:58:34', NULL, 1),
(19, 'Chậm hoàn thành các kế hoạch sản xuất tin, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành ( Chậm 30% trở lên so với thời gian quy định: Trừ 3 - 5 điểm cho mỗi công việc)', 5, 5, 18, '2016-05-17 18:58:56', '2016-05-17 18:58:56', NULL, 3),
(20, 'Chậm hoàn thành các kế hoạch sản xuất tin, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành ( Chậm 30% trở lên so với thời gian quy định: Trừ 3 - 5 điểm cho mỗi công việc)', 5, 6, 29, '2016-05-17 18:59:05', '2016-05-17 18:59:05', NULL, 3),
(21, 'Chậm hoàn thành công việc do lãnh đạo phòng, Lãnh đạo Ban giao (Chậm 20% so với thời gian quy định: Trừ 1 - 2 điểm cho mỗi công việc.)', 5, 5, 18, '2016-05-17 18:59:45', '2016-05-17 18:59:45', NULL, 1),
(22, 'Chậm hoàn thành công việc do lãnh đạo phòng, Lãnh đạo Ban giao (Chậm 20% so với thời gian quy định: Trừ 1 - 2 điểm cho mỗi công việc.)', 5, 6, 29, '2016-05-17 19:00:08', '2016-05-17 19:00:08', NULL, 1),
(23, 'Chậm hoàn thành công việc do lãnh đạo phòng, Lãnh đạo Ban giao (Chậm 30% trở lên so với thời gian quy định: Trừ 3 - 5 điểm cho mỗi công việc)', 5, 5, 18, '2016-05-17 19:00:27', '2016-05-17 19:00:27', NULL, 3),
(24, 'Chậm hoàn thành công việc do lãnh đạo phòng, Lãnh đạo Ban giao 5 điểm (Chậm 30% trở lên so với thời gian quy định: Trừ 3 - 5 điểm cho mỗi công việc)', 5, 6, 29, '2016-05-17 19:00:51', '2016-05-17 19:00:51', NULL, 3),
(25, 'Chậm hoàn thành tin bài, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành : Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi tin bài, văn bản.', 5, 5, 19, '2016-05-17 21:04:27', '2016-05-17 21:04:27', NULL, 1),
(26, 'Chậm hoàn thành tin bài, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành : Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi tin bài, văn bản.', 5, 5, 20, '2016-05-17 21:04:37', '2016-05-17 21:04:37', NULL, 1),
(27, 'Chậm hoàn thành tin bài, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành : Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi tin bài, văn bản.', 5, 6, 23, '2016-05-17 21:04:48', '2016-05-17 21:04:48', NULL, 1),
(28, 'Chậm hoàn thành tin bài, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành : Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi tin bài, văn bản.', 5, 6, 23, '2016-05-17 21:05:00', '2016-05-17 21:05:00', NULL, 1),
(29, 'Chậm hoàn thành tin bài, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành : Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi tin bài, văn bản.', 5, 6, 24, '2016-05-17 21:05:11', '2016-05-17 21:05:11', NULL, 1),
(30, 'Chậm hoàn thành tin bài, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành : Chậm 30% trở lên so với thời gian quy định: trừ 2 - 3 điểm cho mỗi tin bài, văn bản', 5, 5, 19, '2016-05-17 21:05:42', '2016-05-17 21:05:42', NULL, 2),
(31, 'Chậm hoàn thành tin bài, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành : Chậm 30% trở lên so với thời gian quy định: trừ 2 - 3 điểm cho mỗi tin bài, văn bản', 5, 5, 20, '2016-05-17 21:05:53', '2016-05-17 21:05:53', NULL, 2),
(32, 'Chậm hoàn thành tin bài, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành : Chậm 30% trở lên so với thời gian quy định: trừ 2 - 3 điểm cho mỗi tin bài, văn bản', 5, 6, 23, '2016-05-17 21:06:48', '2016-05-17 21:06:48', NULL, 2),
(33, 'Chậm hoàn thành tin bài, các văn bản mà chức năng nhiệm vụ phải hoàn hoàn thành : Chậm 30% trở lên so với thời gian quy định: trừ 2 - 3 điểm cho mỗi tin bài, văn bản', 5, 6, 24, '2016-05-17 21:07:00', '2016-05-17 21:07:00', NULL, 2),
(34, 'Chậm hoàn thành công việc do lãnh đạo phòng, Lãnh đạo VTV NEWS giao Chậm 20% so với thời gian quy định: trừ 1 - 2 điểm cho mỗi công việc.', 5, 5, 19, '2016-05-17 21:07:30', '2016-05-17 21:07:30', NULL, 1),
(35, 'Chậm hoàn thành công việc do lãnh đạo phòng, Lãnh đạo VTV NEWS giao Chậm 20% so với thời gian quy định: trừ 1 - 2 điểm cho mỗi công việc.', 5, 5, 20, '2016-05-17 21:07:44', '2016-05-17 21:07:44', NULL, 1),
(36, 'Chậm hoàn thành công việc do lãnh đạo phòng, Lãnh đạo VTV NEWS giao Chậm 20% so với thời gian quy định: trừ 1 - 2 điểm cho mỗi công việc.', 5, 6, 23, '2016-05-17 21:08:02', '2016-05-17 21:08:02', NULL, 1),
(37, 'Chậm hoàn thành công việc do lãnh đạo phòng, Lãnh đạo VTV NEWS giao Chậm 20% so với thời gian quy định: trừ 1 - 2 điểm cho mỗi công việc.', 5, 5, 20, '2016-05-17 21:08:12', '2016-05-17 21:08:12', NULL, 1),
(38, 'Chậm hoàn thành công việc do lãnh đạo phòng, Lãnh đạo VTV NEWS giao Chậm 30% trở lên so với thời gian quy định: trừ 3 - 5 điểm cho mỗi công việc', 5, 5, 19, '2016-05-17 21:08:37', '2016-05-17 21:08:37', NULL, 3),
(39, 'Chậm hoàn thành công việc do lãnh đạo phòng, Lãnh đạo VTV NEWS giao Chậm 30% trở lên so với thời gian quy định: trừ 3 - 5 điểm cho mỗi công việc', 5, 5, 20, '2016-05-17 21:08:46', '2016-05-17 21:08:46', NULL, 3),
(40, 'Chậm hoàn thành công việc do lãnh đạo phòng, Lãnh đạo VTV NEWS giao Chậm 30% trở lên so với thời gian quy định: trừ 3 - 5 điểm cho mỗi công việc', 5, 6, 23, '2016-05-17 21:09:01', '2016-05-17 21:09:01', NULL, 3),
(41, 'Chậm hoàn thành công việc do lãnh đạo phòng, Lãnh đạo VTV NEWS giao Chậm 30% trở lên so với thời gian quy định: trừ 3 - 5 điểm cho mỗi công việc', 5, 6, 24, '2016-05-17 21:09:12', '2016-05-17 21:09:12', NULL, 3),
(42, 'Chậm dự thảo văn bản, báo cáo: Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi văn bản.', 5, 7, 25, '2016-05-17 23:22:54', '2016-05-17 23:22:54', NULL, 1),
(43, 'Chậm dự thảo văn bản, báo cáo : Chậm 20% trở lên so với thời gian quy định: trừ 2 – 3 điểm cho mỗi văn bản', 5, 7, 25, '2016-05-17 23:23:20', '2016-05-17 23:23:20', NULL, 2),
(44, 'Chậm hoàn thành công việc đề ra: Chậm 20% so với thời gian quy định: trừ 1 – 2 điểm cho mỗi công việc', 5, 7, 25, '2016-05-17 23:23:43', '2016-05-17 23:23:43', NULL, 1),
(45, 'Chậm hoàn thành công việc đề ra: Chậm 20% trở lên so với thời gian quy định: trừ 3 - 5 điểm cho mỗi công việc', 5, 7, 25, '2016-05-17 23:24:06', '2016-05-17 23:24:06', NULL, 3),
(46, 'Chậm dự thảo văn bản, báo cáo:Ban hành chậm ảnh hưởng đến công việc của Đài trừ 2 – 4 điểm', 5, 7, 28, '2016-05-18 07:05:08', '2016-05-18 00:09:23', NULL, 2),
(47, 'Chậm dự thảo văn bản, báo cáo: Ban hành chậm ảnh hưởng đến công việc của đơn vị trừ 1 điểm/ văn bản.', 5, 7, 28, '2016-05-18 07:04:51', '2016-05-18 00:09:06', NULL, 1),
(48, 'Chậm dự thảo văn bản, báo cáo: Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi văn bản.', 5, 7, 28, '2016-05-18 00:09:43', '2016-05-18 00:09:43', NULL, 1),
(49, 'Chậm dự thảo văn bản, báo cáo: Chậm 20% trở lên so với thời gian quy định: trừ 2 – 3 điểm cho mỗi văn bản', 5, 7, 28, '2016-05-18 00:10:00', '2016-05-18 00:10:00', NULL, 2),
(50, 'Chậm hoàn thành công việc được giao: Chậm 20% so với thời gian quy định: trừ 1 – 2 điểm/việc.', 5, 7, 28, '2016-05-18 00:10:35', '2016-05-18 00:10:35', NULL, 1),
(51, 'Chậm hoàn thành công việc được giao: Chậm 20% trở lên so với thời gian quy định: trừ 3 - 5 điểm/ việc', 5, 7, 28, '2016-05-18 00:10:53', '2016-05-18 00:10:53', NULL, 3),
(52, 'Không tích cực đôn đốc các phòng liên quan nộp số liệu dẫn đến chậm tiến độ: Trừ 1-3 điểm', 5, 7, 27, '2016-05-18 00:44:15', '2016-05-18 00:44:15', NULL, 1),
(53, 'Làm ảnh hưởng đến tiến độ của người khác: Trừ từ 1-2 điểm', 5, 7, 27, '2016-05-18 00:44:27', '2016-05-18 00:44:27', NULL, 1),
(54, 'Chậm 30%-40% t hời gian so với quy định: Trừ 1 điểm', 5, 7, 27, '2016-05-18 00:44:43', '2016-05-18 00:44:43', NULL, 1),
(55, 'Chậm 50% - 60% thời gian so với quy định: Trừ 2 điểm', 5, 7, 27, '2016-05-18 00:44:58', '2016-05-18 00:44:58', NULL, 2),
(56, 'Chậm từ 70% thời gian so với quy định trở lên: Trừ 3 điểm', 5, 7, 27, '2016-05-18 00:45:13', '2016-05-18 00:45:13', NULL, 3),
(57, ' Không tích cực đôn đốc các đơn vị liên quan nộp số liệu dẫn đến chậm tiến độ: Trừ 1-3 điểm', 5, 7, 30, '2016-05-18 00:53:27', '2016-05-18 00:53:27', NULL, 1),
(58, 'Làm ảnh hưởng đến tiến độ của người khác: Trừ từ 1-2 điểm', 5, 7, 30, '2016-05-18 00:53:38', '2016-05-18 00:53:38', NULL, 1),
(59, ' Chậm 30%-40% t hời gian so với quy định: Trừ 1 điểm', 5, 7, 30, '2016-05-18 00:53:59', '2016-05-18 00:53:59', NULL, 1),
(60, ' Chậm 50% - 60% thời gian so với quy định: Trừ 2 điểm', 5, 7, 30, '2016-05-18 00:54:15', '2016-05-18 00:54:15', NULL, 2),
(61, 'Chậm từ 70% thời gian so với quy định trở lên: Trừ 3 điểm', 5, 7, 30, '2016-05-18 00:54:29', '2016-05-18 00:54:29', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tiendo_taikhoan_thang`
--

CREATE TABLE `tiendo_taikhoan_thang` (
  `_id` int(11) NOT NULL,
  `tiendo_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diemtru` int(11) NOT NULL,
  `thang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nguoigiao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `td_tutru` int(11) DEFAULT NULL,
  `td_phongtru` int(11) DEFAULT NULL,
  `td_bantru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tiendo_taikhoan_thang`
--

INSERT INTO `tiendo_taikhoan_thang` (`_id`, `tiendo_id`, `name`, `diemtru`, `thang_id`, `user_id`, `nguoigiao`, `ghichu`, `created_at`, `updated_at`, `deleted_at`, `td_tutru`, `td_phongtru`, `td_bantru`) VALUES
(1, 1, 'tien do 1', 1, 5, 4, '', 'ghi chu 12', '2016-05-14 07:13:01', '2016-05-14 00:13:01', '2016-05-14 00:13:01', 1, 1, 1),
(2, 3, 'Tiến Độ Trưởng Phòng', 0, 0, 0, '', '', '2016-05-13 00:53:36', '2016-05-13 00:53:36', NULL, NULL, NULL, NULL),
(3, 3, 'Tiến Độ Trưởng Phòng', 2, 4, 4, '', 'abccs asfacf cac dâcca', '2016-05-14 07:13:19', '2016-05-14 00:13:19', '2016-05-14 00:13:19', 2, 2, 2),
(4, 3, 'Tiến Độ Trưởng Phòng', 2, 4, 4, '', '', '2016-05-14 07:14:41', '2016-05-14 00:14:41', NULL, 5, 5, 5),
(5, 3, 'Tiến Độ Trưởng Phòng', 2, 0, 4, '', '12  314 fff', '2016-05-14 00:06:37', '2016-05-14 00:06:37', NULL, 1, 1, 1),
(6, 1, 'Chức phát sóng các chương trình đặc biệt trong dịp tết nguyên đán', 1, 4, 4, '', 'ghi chú chât lương 1', '2016-05-14 15:58:21', '2016-05-14 08:58:21', '2016-05-14 08:58:21', 3, 3, 3),
(7, 1, 'Chức phát sóng các chương trình đặc biệt trong dịp tết nguyên đán', 1, 4, 4, '', 'ghi chú chât lương 1', '2016-05-14 15:58:40', '2016-05-14 08:58:40', '2016-05-14 08:58:40', 3, 3, 3),
(8, 2, 'Tiến độ Nhân Viên Bậc 1', 2, 4, 28, '', 'Ghi Chú Tiến Độ 1, ghi chú 2', '2016-05-15 03:57:48', '2016-05-14 20:57:48', NULL, 4, 2, 2),
(9, 4, 'Tiến Độ Nhân Viên 1', 1, 4, 28, '', 'trừ 1 điểm tiến độ', '2016-05-14 20:12:41', '2016-05-14 20:12:41', NULL, NULL, 1, 1),
(10, 42, 'Chậm dự thảo văn bản, báo cáo: Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi văn bản.', 1, 0, 65, '', 'trừ', '2016-05-23 20:39:08', '2016-05-23 20:39:08', NULL, 2, 2, 2),
(11, 52, 'Không tích cực đôn đốc các phòng liên quan nộp số liệu dẫn đến chậm tiến độ: Trừ 1-3 điểm', 1, 5, 71, '', '', '2016-05-26 07:48:44', '2016-05-26 00:48:44', NULL, 2, 11, 11),
(12, 42, 'Chậm dự thảo văn bản, báo cáo: Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi văn bản.', 1, 0, 65, '', '', '2016-05-25 03:47:02', '2016-05-25 03:47:02', NULL, 1, 1, 1),
(13, 42, 'Chậm dự thảo văn bản, báo cáo: Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi văn bản.', 1, 0, 65, '', '', '2016-05-25 03:47:17', '2016-05-25 03:47:17', NULL, 1, 1, 1),
(14, 42, 'Chậm dự thảo văn bản, báo cáo: Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi văn bản.', 1, 0, 65, '', '', '2016-05-25 03:47:53', '2016-05-25 03:47:53', NULL, 1, 1, 1),
(15, 42, 'Chậm dự thảo văn bản, báo cáo: Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi văn bản.', 1, 0, 65, '', '', '2016-05-25 03:48:00', '2016-05-25 03:48:00', NULL, 1, 1, 1),
(16, 42, 'Chậm dự thảo văn bản, báo cáo: Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi văn bản.', 1, 5, 65, '', '', '2016-05-25 03:48:37', '2016-05-25 03:48:37', NULL, 1, 1, 1),
(17, 42, 'Chậm dự thảo văn bản, báo cáo: Chậm 20% so với thời gian quy định: trừ 1 điểm cho mỗi văn bản.', 1, 0, 65, '', '', '2016-05-26 01:32:15', '2016-05-26 01:32:15', NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT '0',
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) NOT NULL,
  `note` mediumtext,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `room_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `chucdanh_id` int(11) NOT NULL,
  `vaitro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`_id`, `email`, `password`, `isAdmin`, `remember_token`, `created_at`, `updated_at`, `first_name`, `last_name`, `phone`, `note`, `deleted_at`, `status`, `username`, `room_id`, `level_id`, `chucdanh_id`, `vaitro_id`) VALUES
(4, 'kenshin@gmail.com', '$2y$10$.k/a9uc981JmqoxrFfmnqeDUF5S2rJuFGRa6ZEgQLl1zHy4tqR4p.', 1, 'HG6tJJXsn4oHl1J8hwNokgOfnfCMlvvLvZVWXuCxDrDBwhsCsKn7w9INKpTR', '2016-05-26 08:33:32', '2016-05-16 01:01:01', 'nguyen', 'duong', '123456', 'note test', NULL, 1, 'kenshin@gmail.com', 0, 5, 7, 5),
(26, 'hanam@vtv.vn', '$2y$10$7wQlefNxf0OepJw01V/TJeKCiky1WhazlNNGGoHoJoc3.3MKHTHay', 0, '0rwrHhL2ABPX0FY5omwSdk29OPSxOY59vH9cFWsuplUKAvUAdioTnFd9F4dA', '2016-05-26 08:33:32', '2016-05-16 01:03:08', NULL, NULL, '', NULL, '2016-05-16 01:03:08', 0, 'HaNam', 0, 5, 6, 3),
(27, 'nhanvien@gmail.com', '$2y$10$Pfg8cOm8v5ab/Sh1kv8JR.f2HGsPlnnn.uxaI4pwypoN.XhD92XOS', 0, NULL, '2016-05-26 08:33:32', '2016-05-09 00:09:20', NULL, NULL, '', NULL, NULL, 0, 'Nhanvien', 0, 5, 9, 7),
(28, 'nhanvien1@gmail.com', '$2y$10$TgblNY/SXbNyzoyw20SNH.e.NZVJXdJbYl9qbikJw.QbPrPx8L3V.', 0, 'ntxY6mynxW67PmM4QpVg2J56YcDxJckzV5Rc9CERERrHetVl9EDlDKsEuyEg', '2016-05-26 08:33:32', '2016-05-16 00:58:33', NULL, NULL, '', NULL, NULL, 0, 'NhanVien1', 0, 5, 9, 7),
(29, 'admin@gmail.com', '$2y$10$uAQO2wJ8UT/p4EnZ5L4Ph.ZYFpx8F9uFYEoVFvXkUKNCvAJdtoepu', 0, '326K2J7o0XVpkf4a8saqbTXcIjOGubn3nXpNeeUdOxL2MRWzAQActrgjyTJY', '2016-05-26 08:33:32', '2016-05-25 03:42:32', NULL, NULL, '', NULL, NULL, 0, 'admin@gmail.com', 0, 5, 6, 1),
(30, 'thuyvt@vtv.com', '$2y$10$y0ZGxaxxnB1KUeERQJv.m.IvJuF6KvvpybjDpj0RCo97sBEpyL.3i', 0, 'qA7IHsDrNAnSCEV0QXQp7Pk3eoXf1M0ErU5JaRaDAuQjznu5C3lLh83kWXtZ', '2016-05-17 06:12:03', '2016-05-16 23:16:17', 'Vũ Thanh Thủy', NULL, '', NULL, NULL, 0, 'thuyvt@vtv.com', 3, 5, 11, 3),
(31, 'dungnv@vtv.com', '$2y$10$i1q/C9TaCwFn1Mz8AvsEBOWe/x9VSxZeUFKtru0AuX0/qH82BTHOm', 0, NULL, '2016-05-16 01:35:41', '2016-05-16 01:35:41', 'Nguyễn Văn Dũng', NULL, '', NULL, NULL, 0, '', 4, 5, 12, 5),
(32, 'hiennm@vtv.com', '$2y$10$RUpWoq/QsPpe2M3P6W.a/uYGG78c6A5KBxXrNfUlQz6Iw.rf7Rrcm', 0, NULL, '2016-05-16 01:37:24', '2016-05-16 01:37:24', 'Nguyễn Minh Hiển', NULL, '', NULL, NULL, 0, '', 4, 5, 12, 6),
(33, 'phuonghc@vtv.com', '$2y$10$Wik8ifJ71lSKW2V2uJIBsenyKOKyfOHJ2pkc2831PwwnI.AsXHiT6', 0, NULL, '2016-05-16 01:38:13', '2016-05-16 01:38:13', 'Hồ Chí Phương', NULL, '', NULL, NULL, 0, '', 4, 5, 13, 7),
(34, 'hanghth@vtv.com', '$2y$10$8FQTqPft1AVVPxEpZlvI4.FAiITxJMj9Mg5FV5kftuYnjdTKoy9vm', 0, NULL, '2016-05-16 01:40:43', '2016-05-16 01:40:43', 'Hồ Thị Thu Hằng ', NULL, '', NULL, NULL, 0, '', 4, 5, 13, 7),
(35, 'vanntt@vtv.com', '$2y$10$bCwxHeJr.wes4JQU.5hhzeZg277QBQL1o2hg2SlRRMJJXdOaiKG6S', 0, NULL, '2016-05-16 01:41:13', '2016-05-16 01:41:13', 'Ngô Thị Thu Vân', NULL, '', NULL, NULL, 0, '', 4, 5, 14, 7),
(36, 'anhpt@vtv.com', '$2y$10$erYYZqblpwXFUCTKE0fTzeTidd1j8SMqnmj9Bhs1b4ylIVrX7FGPy', 0, NULL, '2016-05-16 01:41:45', '2016-05-16 01:41:45', 'Phạm Thị Ánh', NULL, '', NULL, NULL, 0, '', 4, 5, 14, 7),
(37, 'cuongvd@vtv.com', '$2y$10$YVLmeYz5u/CUac/j/QJ.YeJwu4sbcXWKN.eVZA.2X0gfHrdOi3XhK', 0, NULL, '2016-05-16 01:42:13', '2016-05-16 01:42:13', 'Vũ  Duy Cường', NULL, '', NULL, NULL, 0, '', 4, 5, 15, 7),
(38, 'huent@vtv.com', '$2y$10$X.LllGJ/CZdJPRUZDhIaYO/1.PkCEsepEF15dVUkxTR8x.EsqtGXC', 0, NULL, '2016-05-16 01:42:57', '2016-05-16 01:42:57', 'Nguyễn Thu Huệ', NULL, '', NULL, NULL, 0, '', 4, 5, 16, 7),
(39, 'hieunv@vtv.com', '$2y$10$rjE.Rck2oisKI7WVoYN6LeVjr7gDnf77gTnVYtIR3Y1FFAqq.n0iW', 0, NULL, '2016-05-16 01:43:23', '2016-05-16 01:43:23', 'Nguyễn Văn Hiệu', NULL, '', NULL, NULL, 0, '', 4, 5, 15, 7),
(40, 'thuynt@vtv.com', '$2y$10$QwfhzunBlEl7Dc60P.huuePyNYlgL62SCQwCtv.GwkCCbauN5efze', 0, NULL, '2016-05-16 01:44:04', '2016-05-16 01:44:04', 'Nguyễn Thu Thủy', NULL, '', NULL, NULL, 0, '', 4, 5, 15, 7),
(41, 'hangnt@vtv.com', '$2y$10$m8CQDyT4TcXHapjG8rhtuee3vqJ98hGupT9M9W4n4Y9aWOKyh/SdK', 0, NULL, '2016-05-16 01:44:41', '2016-05-16 01:44:41', 'Nguyễn Thanh Hằng', NULL, '', NULL, NULL, 0, '', 4, 5, 15, 7),
(42, 'anhdv@vtv.com', '$2y$10$AdirK6mr.Itk7a2588XsDOeg/vwYWzWgEVqQWP7ELgWfeo6gY8jJW', 0, NULL, '2016-05-16 01:45:14', '2016-05-16 01:45:14', 'Đặng Vân Anh', NULL, '', NULL, NULL, 0, '', 4, 5, 15, 7),
(43, 'giangdp@vtv.com', '$2y$10$m8M7blN18GEbwFghTU6M2uokAbh9KPfrmvgZK0aXuRmzizEQK6dWi', 0, NULL, '2016-05-16 01:45:42', '2016-05-16 01:45:42', 'Đỗ Phương Giang', NULL, '', NULL, NULL, 0, '', 4, 5, 13, 7),
(44, 'bichnt@vtv.com', '$2y$10$Eb/PlFMEvFSCcX.QT/xZl.hi.nawefDYm0g8HPrpJJxHUG.fqzCY6', 0, NULL, '2016-05-16 01:46:22', '2016-05-16 01:46:22', 'Nguyễn Thị Bích', NULL, '', NULL, NULL, 0, '', 5, 5, 17, 5),
(45, 'huelt@vtv.com', '$2y$10$1fUb36ogWfLxR/C/ZkWSrutgoeNALxOXxzs6eKYUoORX9ZNKATzeu', 0, NULL, '2016-05-16 01:46:48', '2016-05-16 01:46:48', 'Lương Thị Huệ', NULL, '', NULL, NULL, 0, '', 5, 5, 18, 6),
(46, 'maintn@vtv.com', '$2y$10$0an.wM8ThiDzpn54NeAkJeiFivh5DZp4bn388lp4yW5/2E9qVWt0G', 0, NULL, '2016-05-16 01:47:20', '2016-05-16 01:47:20', 'Nguyễn Thị Nguyệt Mai', NULL, '', NULL, NULL, 0, '', 5, 5, 19, 7),
(47, 'khanhnt@vtv.com', '$2y$10$pIcVOFZCUOPyMd.0wYndYOWDg32jCY5EBsSmB2ARSpjrIO9AK4fUe', 0, 'oSshYJhWroeCWuEj740wSTLtm5qdfMQmHNjBFPNhHkPS5O53jIAxuuZ06n2T', '2016-05-17 06:22:13', '2016-05-16 23:26:27', 'Nguyễn Trung Khánh', NULL, '', NULL, NULL, 0, '', 5, 5, 19, 7),
(48, 'trangnth@vtv.com', '$2y$10$fjhaMXGa489QHUEsvShqx.X4NnMlvT5VhIxpnXjqbTaDEUzdpjxdq', 0, NULL, '2016-05-16 01:48:26', '2016-05-16 01:48:26', 'Nguyễn Thị Huyền Trang', NULL, '', NULL, NULL, 0, '', 5, 5, 19, 7),
(49, 'phuongdd@vtv.com', '$2y$10$WjZWhZWxhofi8A64v1HQZOxyuZvSQhQkFUS.io5voNeuvSb60C4Cy', 0, NULL, '2016-05-16 01:49:11', '2016-05-16 01:49:11', 'Đinh Duy Phương', NULL, '', NULL, NULL, 0, '', 5, 5, 19, 7),
(50, 'lintlt@vtv.com', '$2y$10$stjxM4Edj9xcC8lQBt8YheGSiso8ViXJuTIhPkoEmO8II30BsHHGy', 0, NULL, '2016-05-16 01:49:52', '2016-05-16 01:49:52', 'Lê Thuỳ Linh', NULL, '', NULL, NULL, 0, '', 5, 5, 19, 7),
(51, 'chingl@vtv.com', '$2y$10$tRL/8mJvX/npKUgfW3nV3uL0jKx2OuVVo0p2Fdm6erljldi2Vmlmi', 0, NULL, '2016-05-16 01:50:29', '2016-05-16 01:50:29', 'Nguyễn Hoàng Lan Chi', NULL, '', NULL, NULL, 0, '', 5, 5, 20, 7),
(52, 'huongdth@vtv.com', '$2y$10$MHFQ7/Jh6ucIl/GOKoS5QO80G1ZffXe7PLvO6jAGKfbNRDps./MLK', 0, NULL, '2016-05-16 01:51:07', '2016-05-16 01:51:07', 'Đinh Thị Thu Hương', NULL, '', NULL, NULL, 0, '', 5, 5, 19, 7),
(53, 'huyennt@vtv.com', '$2y$10$AyfWWm1Y7vmthmXSbfZjx.UV4Q5FfM8n.6jl08PD2smuf4SJO1vF2', 0, NULL, '2016-05-16 01:51:40', '2016-05-16 01:51:40', 'Nguyễn Thanh Huyền', NULL, '', NULL, NULL, 0, '', 5, 5, 19, 7),
(54, 'hientc@vtv.com', '$2y$10$xiFjl/qh.ZDUbEJAEJoHgeHkMcFwhhkHJoaRnCQrv5I610nWW.wsi', 0, NULL, '2016-05-16 01:52:03', '2016-05-16 01:52:03', 'Tạ Chí Hiển', NULL, '', NULL, NULL, 0, '', 5, 5, 19, 7),
(55, 'nganpq@vtv.com', '$2y$10$hkhfQSylBsUvHeRKEURFv.FmST3o4mbbfkvufh.Na2AuuT/DQerqS', 0, NULL, '2016-05-16 01:52:34', '2016-05-16 01:52:34', 'Phạm Quỳnh Ngân', NULL, '', NULL, NULL, 0, '', 5, 5, 19, 7),
(56, 'thuocct@vtv.com', '$2y$10$nCfuFfH1Tcei4IaJkGRfA.399ukcALG1IH9iQ7Lpb26YByNmCLF/S', 0, NULL, '2016-05-16 01:57:37', '2016-05-16 01:57:37', 'Vũ Thị Thược', NULL, '', NULL, NULL, 0, '', 6, 5, 21, 5),
(57, 'lanntt@vtv.com', '$2y$10$mf9s3S3oXtXBJUdiWjr.CuZW4T78KvgpuHIArA1hvN7dHPyngXUGe', 0, NULL, '2016-05-16 01:58:27', '2016-05-16 01:58:27', 'Nguyễn Thị Tuyết Lan', NULL, '', NULL, NULL, 0, '', 6, 5, 22, 7),
(58, 'aidln@vtv.com', '$2y$10$xNa3R6c10YOfbkqNgBJvtuGkVDx0LQDU7CrF.pqJXHFzTXhB3.G0C', 0, NULL, '2016-05-16 01:59:01', '2016-05-16 01:59:01', 'Đào Lưu Nhân Ái ', NULL, '', NULL, NULL, 0, '', 6, 5, 23, 7),
(59, 'minhnth@vtv.com', '$2y$10$/bzK00f3Me.vvgJZEHh7genl.s2MworNyonsFTQRR3Mx0wKJ5Xy/O', 0, NULL, '2016-05-16 01:59:31', '2016-05-16 01:59:31', 'Nguyễn Triệu Hải Minh ', NULL, '', NULL, NULL, 0, '', 6, 5, 23, 7),
(60, 'anhcv@vtv.com', '$2y$10$wx6FbmlwOPZ.TR.rcwBM/OrONGEBi0xZ5dMxrchWgXjbHJme2Jb5C', 0, NULL, '2016-05-16 01:59:58', '2016-05-16 01:59:58', 'Chu Vân Anh', NULL, '', NULL, NULL, 0, '', 6, 5, 24, 7),
(61, 'huongnt@vtv.com', '$2y$10$DxrvjBQcBi8mkRhhKtkEDOGK01WHCGwJSovlg9euS5QVNwJpJYvUO', 0, NULL, '2016-05-16 02:00:26', '2016-05-16 02:00:26', 'Nguyễn Thùy Hương', NULL, '', NULL, NULL, 0, '', 6, 5, 23, 7),
(62, 'longtd@vtv.com', '$2y$10$ZZMinAXO9zhGsz/yQOtYrOIfGGJmbwBFuvuGspG65lIVeDFbxDnuK', 0, NULL, '2016-05-16 02:00:51', '2016-05-16 02:00:51', 'Trần Đức Long', NULL, '', NULL, NULL, 0, '', 6, 5, 23, 7),
(63, 'thuybtt@vtv.com', '$2y$10$y.cZOyE3v9NvmWqkmUW5UeUJuk1MSmR6t7hENO1tjGfgVrNxagOoq', 0, NULL, '2016-05-16 02:02:46', '2016-05-16 02:02:46', 'Bùi Thị Thanh Thuỷ', NULL, '', NULL, NULL, 0, '', 6, 5, 23, 7),
(64, 'linhqt@vtv.com', '$2y$10$0WbOybdP0ZXI/K/aTZNhLelQ.Pk4.IGgyIOJ2bLCdzNu/qMRRTOO2', 0, NULL, '2016-05-16 02:03:16', '2016-05-16 02:03:16', 'Quách Thu Linh', NULL, '', NULL, NULL, 0, '', 6, 5, 23, 7),
(65, 'tuyettl@vtv.com', '$2y$10$h.UMBHZDeJT2BHpYjBOeROSP/32ufW2gxo0Eth0PNpt7rvZtAU/SW', 0, 'BvitPyolWDFo9X6WTCcD0nRUx3kki92VHvSFHF8c83liamgqW0hTcQGGWzJZ', '2016-05-24 03:58:18', '2016-05-23 20:58:18', 'Trần Liên Tuyết', NULL, '', NULL, NULL, 0, '', 7, 5, 25, 5),
(66, 'tamlv@vtv.com', '$2y$10$/ZubhFPUHCIahl1fXUmeTeOqo.7doF6MQxy8YIPWrjftDVbjfZAUW', 0, NULL, '2016-05-16 02:04:20', '2016-05-16 02:04:20', 'Lê Văn Tám', NULL, '', NULL, NULL, 0, '', 7, 5, 26, 6),
(67, 'kienpg@vtv.com', '$2y$10$HXkUHNqO3XEnBio38UQhLuB026joZOLYvL2j/Ds7aY2fKUPJFOD8u', 0, NULL, '2016-05-16 02:04:48', '2016-05-16 02:04:48', 'Phùng Gia Kiên', NULL, '', NULL, NULL, 0, '', 7, 5, 27, 7),
(68, 'ngochb@vtv.com', '$2y$10$KYBr8wQFzkKNqQTfvFlXPuSQy3c7vjFtKaA/8Lh3W9VzFhpG3mZ6y', 0, NULL, '2016-05-16 02:05:11', '2016-05-16 02:05:11', 'Hoàng Bích Ngọc', NULL, '', NULL, NULL, 0, '', 7, 5, 28, 7),
(69, 'maittt@vtv.com', '$2y$10$PAHlauyhgYUqHiHErs6g7uXp6on68VezWR8QPuYU7BZOc1qy/Y5ka', 0, NULL, '2016-05-16 02:05:49', '2016-05-16 02:05:49', 'Trần Thị Thanh Mai', NULL, '', NULL, NULL, 0, '', 7, 5, 28, 7),
(70, 'thuynp@vtv.com', '$2y$10$DisyO3muoMw/PtBEIIrYquX/zMU3i8shvEQyEyFkFFbcfKV5hfOxe', 0, NULL, '2016-05-16 02:06:20', '2016-05-16 02:06:20', 'Nguyễn Phương Thúy', NULL, '', NULL, NULL, 0, '', 7, 5, 28, 7),
(71, 'caivt@vtv.com', '$2y$10$IMOO72r/0K464l8LN0d5seGbHGksrbuoZ2rhfHg1uvWYR2/2zxNs2', 0, 'b3UwghcQYOmXZNf8rhP0Smiptn7kpJzEPthGUrPxXY4LNxoVsL6E53I8AnzR', '2016-05-24 04:06:26', '2016-05-23 21:06:26', 'Vũ Thị Cài', NULL, '', NULL, NULL, 0, '', 7, 5, 27, 7),
(72, '01bdt@vtv.com', '$2y$10$pMLYBWVqwAcSWjCAVF/s6.29qm5TTAvrhXUzxYlXV3zFIe9mvpnSG', 0, NULL, '2016-05-23 20:18:01', '2016-05-23 20:18:01', 'Test 001', NULL, '', NULL, NULL, 0, '', 7, 5, 28, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `deleted-at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`_id`, `user_id`, `role_id`, `created_at`, `updated_at`, `deleted-at`) VALUES
(8, 23, 1, '2016-04-21 07:08:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 4, 1, '2016-04-22 04:09:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 4, 2, '2016-04-22 04:09:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 22, 2, '2016-04-28 16:22:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 22, 1, '2016-04-28 16:22:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vaitro`
--

CREATE TABLE `vaitro` (
  `_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vaitro`
--

INSERT INTO `vaitro` (`_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', '2016-05-06 04:00:01', '0000-00-00 00:00:00', NULL),
(2, 'Administrator', '2016-05-06 04:00:01', '0000-00-00 00:00:00', NULL),
(3, 'Trưởng Ban ', '2016-05-06 04:00:01', '0000-00-00 00:00:00', NULL),
(4, 'Phó Trưởng Ban', '2016-05-06 04:00:01', '0000-00-00 00:00:00', NULL),
(5, 'Trưởng Phòng', '2016-05-06 04:00:01', '0000-00-00 00:00:00', NULL),
(6, 'Phó Trưởng Phòng', '2016-05-06 04:00:01', '0000-00-00 00:00:00', NULL),
(7, 'Nhân Viên', '2016-05-06 04:00:01', '0000-00-00 00:00:00', NULL),
(8, 'Mặc Định', '2016-05-06 04:00:01', '0000-00-00 00:00:00', NULL),
(9, 'Giám Sát Hệ Thống', '2016-05-06 04:00:01', '0000-00-00 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bac`
--
ALTER TABLE `bac`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `chatluong`
--
ALTER TABLE `chatluong`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `chatluong_taikhoan_thang`
--
ALTER TABLE `chatluong_taikhoan_thang`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `chucdanh`
--
ALTER TABLE `chucdanh`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `chuyenmon`
--
ALTER TABLE `chuyenmon`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `congviec_taikhoan_thang`
--
ALTER TABLE `congviec_taikhoan_thang`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `donggop`
--
ALTER TABLE `donggop`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `donggop_taikhoan_thang`
--
ALTER TABLE `donggop_taikhoan_thang`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `kyluat`
--
ALTER TABLE `kyluat`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `kyluat_taikhoan_thang`
--
ALTER TABLE `kyluat_taikhoan_thang`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `langs`
--
ALTER TABLE `langs`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `phamchat`
--
ALTER TABLE `phamchat`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `phamchat_taikhoan_thang`
--
ALTER TABLE `phamchat_taikhoan_thang`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `role1`
--
ALTER TABLE `role1`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thang`
--
ALTER TABLE `thang`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tiendo`
--
ALTER TABLE `tiendo`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tiendo_taikhoan_thang`
--
ALTER TABLE `tiendo_taikhoan_thang`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bac`
--
ALTER TABLE `bac`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `chatluong`
--
ALTER TABLE `chatluong`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;
--
-- AUTO_INCREMENT for table `chatluong_taikhoan_thang`
--
ALTER TABLE `chatluong_taikhoan_thang`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `chucdanh`
--
ALTER TABLE `chucdanh`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `chuyenmon`
--
ALTER TABLE `chuyenmon`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;
--
-- AUTO_INCREMENT for table `congviec_taikhoan_thang`
--
ALTER TABLE `congviec_taikhoan_thang`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `donggop`
--
ALTER TABLE `donggop`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `donggop_taikhoan_thang`
--
ALTER TABLE `donggop_taikhoan_thang`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kyluat`
--
ALTER TABLE `kyluat`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `kyluat_taikhoan_thang`
--
ALTER TABLE `kyluat_taikhoan_thang`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `langs`
--
ALTER TABLE `langs`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1483;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `phamchat`
--
ALTER TABLE `phamchat`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `phamchat_taikhoan_thang`
--
ALTER TABLE `phamchat_taikhoan_thang`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role1`
--
ALTER TABLE `role1`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `thang`
--
ALTER TABLE `thang`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tiendo`
--
ALTER TABLE `tiendo`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `tiendo_taikhoan_thang`
--
ALTER TABLE `tiendo_taikhoan_thang`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
