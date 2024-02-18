-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2023 at 05:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `user_id` int(11) DEFAULT 0,
  `student_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `thumbnail` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `user_id`, `student_id`, `content`, `thumbnail`, `status`, `create_at`, `update_at`) VALUES
(90, '7 kỹ năng mềm lập trình viên nên có để thành công', 0, 3, '', '/education/uploads/images/7-ky-nang.jpg', 1, '2023-12-24 14:35:50', '2023-12-24 14:36:12'),
(99, 'Learn JavaScript while Playing Games — Gamify Your Learning', 0, 3, '&#60;p&#62;Hihi&#60;/p&#62;&#13;&#10;', '/education/uploads/images/6422afa5a62f8.jpg', 1, '2023-12-24 14:56:27', '2023-12-24 14:56:41'),
(100, 'Ngành gì đang hot hiện nay? Top ngành nghề dự báo trở thành xu thế', 0, 3, '&#60;p&#62;hi&#60;/p&#62;&#13;&#10;', '/education/uploads/images/63fd6b46601a3.jpg', 1, '2023-12-24 15:00:57', '2023-12-24 15:01:39'),
(102, 'Lập trình web là gì? Kỹ năng nào lập trình viên web cần có?', 0, 3, '&#60;p&#62;hi&#60;/p&#62;&#13;&#10;', '/education/uploads/images/63ec92953fb9b.jpg', 1, '2023-12-24 15:02:32', '2023-12-24 15:03:32'),
(103, 'Một số cẩm nang hay khi làm việc với HTML/CSS', 0, 30, '&#60;p&#62;hi&#60;/p&#62;&#13;&#10;', '/education/uploads/images/64a2487459fe5.jpg', 1, '2023-12-24 15:07:46', '2023-12-24 15:08:01'),
(104, 'Bạn đã biết cách đưa trang web của mình lên github', 0, 30, '&#60;p&#62;Chắc hẳn nhiều bạn sau khi đ&#38;atilde; th&#38;agrave;nh c&#38;ocirc;ng tạo một website từ những kiến thức học được từ kh&#38;oacute;a học lập tr&#38;igrave;nh tại F8 v&#38;agrave; cảm thấy đ&#38;oacute; l&#38;agrave; một bước khởi đầu khởi sắc của bản th&#38;acirc;n v&#38;agrave; điều đ&#38;oacute; thật tuyệt v&#38;agrave; bạn muốn chia sẻ điều đ&#38;oacute; để mọi người c&#38;ugrave;ng tham khảo v&#38;agrave; đ&#38;aacute;nh gi&#38;aacute; sản phẩm đầu tay của bạn. Để l&#38;agrave;m điều đ&#38;oacute; th&#38;igrave; c&#38;oacute; rất nhiều c&#38;aacute;ch để bạn c&#38;oacute; thể đẩy c&#38;oacute; thể tạo ra đường link li&#38;ecirc;n kết tới trang web của bạn. Nhưng để dễ d&#38;agrave;ng với mục đ&#38;iacute;ch lưu trữ code v&#38;agrave; tạo link cho web bạn th&#38;igrave; m&#38;igrave;nh lựa chọn github để thực hiện.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;- Để c&#38;oacute; thể l&#38;agrave;m được điều đ&#38;oacute; ch&#38;uacute;ng ta cần tải phần mềm git pash để thực hiện c&#38;aacute;c c&#38;acirc;u lệnh đẩy code l&#38;ecirc;n github&#60;img alt=&#34;image.png&#34; src=&#34;https://files.fullstack.edu.vn/f8-prod/blog_posts/5917/63a4a88fd5931.png&#34; /&#62;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;v&#38;agrave; n&#38;oacute; sẽ c&#38;oacute; giao diện như thế n&#38;agrave;y! -Để c&#38;oacute; thể lưu trữ code th&#38;igrave; ch&#38;uacute;ng ta cần tạo một new project mới tr&#38;ecirc;n github (tại new button)&#60;img alt=&#34;image.png&#34; src=&#34;https://files.fullstack.edu.vn/f8-prod/blog_posts/5917/63a4a99e2849e.png&#34; /&#62;v&#38;agrave; sau đ&#38;oacute; nhập t&#38;ecirc;n dự &#38;aacute;n của bạn v&#38;agrave; nhấn ** Create repository** để tạo v&#38;agrave; bạn sẽ nhận được một li&#38;ecirc;n kết http c&#38;oacute; dạng &#38;quot;&#60;a href=&#34;https://github.com/yourAccount/projectName.git&#34; rel=&#34;noreferrer&#34; target=&#34;_blank&#34;&#62;https://github.com/yourAccount/projectName.git&#60;/a&#62;&#38;quot; vd&#38;quot; &#38;quot;&#60;a href=&#34;https://github.com/cuongTran/shopping.git&#34; rel=&#34;noreferrer&#34; target=&#34;_blank&#34;&#62;https://github.com/cuongTran/shopping.git&#60;/a&#62;&#38;quot;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;-Bạn sẽ mở git pash v&#38;agrave; thực hiện c&#38;acirc;u lệnh: git clone li&#38;ecirc;n kết bạn nhận được vd: $ git clone&#38;nbsp;&#60;a href=&#34;https://github.com/cuongTran/shopping.git&#34; rel=&#34;noreferrer&#34; target=&#34;_blank&#34;&#62;https://github.com/cuongTran/shopping.git&#60;/a&#62;&#38;nbsp;th&#38;agrave;nh c&#38;ocirc;ng n&#38;oacute; sẽ hiện l&#38;ecirc;n cảnh b&#38;aacute;o bạn đ&#38;atilde; được tạo 1 folder&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;warning: You appear to have cloned an empty repository.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;-Sau đ&#38;oacute; một folder sẽ được tạo trong m&#38;aacute;y t&#38;iacute;nh của bạn v&#38;agrave; n&#38;oacute; sẽ c&#38;oacute; một file .git trong m&#38;aacute;y của bạn&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;-Bạn sẽ đưa tất cả c&#38;aacute;c file li&#38;ecirc;n quan tới code của bạn như index.html, css.style, app.js v&#38;agrave;o trong folder n&#38;agrave;y&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;-Bạn sẽ copy đường dẫn tới folder đ&#38;oacute; v&#38;agrave; paste vao git pash v&#38;agrave; đổi dấu \\ th&#38;agrave;nh dấu &#38;#39;/&#38;#39; v&#38;agrave; ENTER&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;-Tiếp theo bạn nhập c&#38;acirc;u lệnh (c&#38;oacute; dấu c&#38;aacute;ch giữa add v&#38;agrave; dấu chấm) : git add .&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;-Tiếp theo l&#38;agrave; c&#38;acirc;u lệnh cuối để đẩy code l&#38;ecirc;n: git push&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;-Bạn sẽ chờ n&#38;oacute; load 100% để ho&#38;agrave;n th&#38;agrave;nh Sau đ&#38;oacute; bạn chờ trong v&#38;agrave;i gi&#38;acirc;y v&#38;agrave; load lại trang github hiện tại v&#38;agrave; thấy c&#38;aacute;c file của bạn đ&#38;atilde; hiện th&#38;igrave; tr&#38;ecirc;n dự &#38;aacute;n bạn tạo *Để c&#38;oacute; được đường link li&#38;ecirc;n kết tới web của bạn:&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;-nhấn v&#38;agrave;o biều tượng setting (h&#38;igrave;nh răng cưa)&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;-nhấn v&#38;agrave;o mục &#38;quot;Page&#38;quot; b&#38;ecirc;n thanh nav tr&#38;aacute;i&#60;img alt=&#34;image.png&#34; src=&#34;https://files.fullstack.edu.vn/f8-prod/blog_posts/5917/63a4aec4442e9.png&#34; /&#62;V&#38;agrave; chuyển &#38;quot;Branch&#38;quot; sang main folder/(root) v&#38;agrave; Save chờ khoảng tầm 1 ph&#38;uacute;t th&#38;igrave; bạn load lại trang v&#38;agrave; đường link của bạn sẽ được li&#38;ecirc;n kết th&#38;agrave;nh c&#38;ocirc;ng! video c&#38;aacute;c bước thực hiện:&#38;nbsp;&#60;a href=&#34;https://fullstack.edu.vn/external-url?continue=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DyUNGk-uP1Lk&#34; rel=&#34;noreferrer&#34; target=&#34;_blank&#34;&#62;https://www.youtube.com/watch?v=yUNGk-uP1Lk&#60;/a&#62;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Bạn sẽ gửi th&#38;agrave;nh quả của m&#38;igrave;nh đến mọi người v&#38;agrave; chia sẻ n&#38;oacute;, đ&#38;oacute; l&#38;agrave; qu&#38;aacute; tr&#38;igrave;nh học tập v&#38;agrave; l&#38;agrave;m việc của bạn. Ch&#38;uacute;c c&#38;aacute;c bạn th&#38;agrave;nh c&#38;ocirc;ng!&#60;/p&#62;&#13;&#10;', '/education/uploads/images/63a4b3ff73341.jpg', 1, '2023-12-24 15:08:36', '2023-12-24 23:01:27'),
(105, 'Cấu trúc HTML cơ bản', 0, 30, '&#60;p&#62;&#60;img alt=&#34;cac-the-html-co-ban-5.jpg&#34; src=&#34;https://files.fullstack.edu.vn/f8-prod/blog_posts/1637/61b174eac43f3.jpg&#34; /&#62;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Chắc hẳn ai cũng biết một trang web th&#38;igrave; kh&#38;ocirc;ng thể n&#38;agrave;o thiếu đi HTML v&#38;agrave; HTML l&#38;agrave;m n&#38;ecirc;n cấu tr&#38;uacute;c của một trang web, như b&#38;agrave;i viết c&#38;aacute;c bạn đang đọc b&#38;agrave;i viết n&#38;agrave;y th&#38;igrave; cũng được viết bằng html.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#60;strong&#62;HTML l&#38;agrave; g&#38;igrave; ???&#60;/strong&#62;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;HTML l&#38;agrave; chữ viết tắt của cụm từ Hyper Text Markup Language ( Ng&#38;ocirc;n ngữ đ&#38;aacute;nh dấu si&#38;ecirc;u văn bản) được sử dụng để tạo một trang web, tr&#38;ecirc;n một website c&#38;oacute; thể sẽ chứa nhiều trang v&#38;agrave; mỗi trang được quy ra l&#38;agrave; một t&#38;agrave;i liệu HTML. HTML l&#38;agrave; một trong những ng&#38;ocirc;n ngữ quan trọng trong lĩnh vực thiết kế website. HTML đ&#38;atilde; trở th&#38;agrave;nh một chuẩn mực của Internet do tổ chức World Wide Web Consortium (W3C) duy tr&#38;igrave;.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Tại sao phải sử dụng html trong thiết kế website ??? n&#38;oacute;i n&#38;ocirc;m na cho dẽ hiểu th&#38;igrave; html l&#38;agrave; một si&#38;ecirc;u văn bản cấu tạo n&#38;ecirc;n một cấu của website ( được xem l&#38;agrave; bộ khung của website ), đ&#38;acirc;y l&#38;agrave; ng&#38;ocirc;n ngữ duy nhất m&#38;agrave; c&#38;aacute;c tr&#38;igrave;nh duyệt cốc cốc , chrome, opera .... c&#38;oacute; thể hiểu v&#38;agrave; thực hiện được,&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#38;lt;html&#38;gt; &#38;lt;head&#38;gt; ﻿ &#38;lt;title&#38;gt;Đ&#38;acirc;y l&#38;agrave; nhan đề của một b&#38;agrave;i viết&#38;lt;/title&#38;gt; &#38;lt;/head&#38;gt;﻿ &#38;lt;body&#38;gt; &#38;lt;h1&#38;gt;Đ&#38;acirc;y l&#38;agrave; ti&#38;ecirc;u đề ch&#38;iacute;nh&#38;lt;/h1&#38;gt; &#38;lt;p&#38;gt;Đ&#38;acirc;y l&#38;agrave; đoạn văn để giới thiệu nội dung phần c&#38;ograve;n lại của trang, nếu nội dung d&#38;agrave;i th&#38;igrave; c&#38;oacute; thể chia th&#38;agrave;nh nhiều ti&#38;ecirc;u đề phụ.&#38;lt;p&#38;gt; ﻿ &#38;lt;h2&#38;gt;Đ&#38;acirc;y l&#38;agrave; ti&#38;ecirc;u đề phụ&#38;lt;/h2&#38;gt; &#38;lt;p&#38;gt;Một b&#38;agrave;i viết n&#38;ecirc;n c&#38;oacute; 1 v&#38;agrave;i ti&#38;ecirc;u đề phụ, điều đ&#38;oacute; gi&#38;uacute;p co cấu tr&#38;uacute;c b&#38;agrave;i viết được r&#38;otilde; r&#38;agrave;ng, người đọc dễ hiểu hơn.&#38;lt;/p&#38;gt; ﻿ &#38;lt;h2&#38;gt;Đ&#38;acirc;y l&#38;agrave; một ti&#38;ecirc;u đề phục kh&#38;aacute;c c&#38;ugrave;ng cấp với ti&#38;ecirc;u đề phụ b&#38;ecirc;n tr&#38;ecirc;n&#38;lt;/h2&#38;gt; &#38;lt;/body&#38;gt; ﻿&#38;lt;/html&#38;gt;.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;đ&#38;acirc;y l&#38;agrave; cấu tr&#38;uacute;c cơ bản của một trang HTML, ch&#38;uacute;ng được cấu tạo từ c&#38;aacute;c k&#38;iacute; tự nằm b&#38;ecirc;n trong dấu &#38;lt; &#38;gt; , ch&#38;uacute;ng được gọi l&#38;agrave; element ( HTML element ), c&#38;aacute;c phần tử n&#38;agrave;y được tạo th&#38;agrave;nh từ 2 thẻ đ&#38;oacute; l&#38;agrave; thẻ đ&#38;oacute;ng v&#38;agrave; mở. v&#38;iacute; dụ: m&#38;igrave;nh c&#38;oacute; thẻ mở l&#38;agrave; : &#38;lt;html&#38;gt; thẻ đ&#38;oacute;ng l&#38;agrave; : &#38;lt;/ html &#38;gt; th&#38;ecirc;m một v&#38;agrave;i v&#38;iacute; vụ nữa: &#38;lt;p&#38;gt;&#38;lt;/p&#38;gt;; &#38;lt;span&#38;gt; &#38;lt;/span&#38;gt;.... tuy nhi&#38;ecirc;n trong nhiều trường hợp th&#38;igrave; sẽ c&#38;oacute; những element bị thiếu cả thẻ đ&#38;oacute;ng v&#38;agrave; mở. v&#38;iacute; dụ: &#38;lt;img&#38;gt; : thẻ n&#38;agrave;y th&#38;igrave; kh&#38;ocirc;ng c&#38;oacute; thẻ đ&#38;oacute;ng nhưng để kết th&#38;uacute;c thẻ &#38;lt;img&#38;gt; th&#38;igrave; ch&#38;uacute;ng ta th&#38;ecirc;m dấu / v&#38;agrave;o ở cưới th&#38;igrave; ch&#38;uacute;ng sẽ trong như n&#38;agrave;y: &#38;lt;img/&#38;gt; th&#38;igrave; l&#38;uacute;c n&#38;agrave;y thẻ img vừa l&#38;agrave; thẻ đ&#38;oacute;ng v&#38;agrave; vừa l&#38;agrave; thẻ mở đ&#38;oacute; nha. một v&#38;agrave;i v&#38;iacute; vụ; &#38;lt;/meta&#38;gt; ; &#38;lt;/br&#38;gt;; &#38;lt;/hr&#38;gt; ...&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;h2&#62;&#60;strong&#62;Element Trong HTML&#60;/strong&#62;&#60;/h2&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Ở tr&#38;ecirc;n ta đ&#38;atilde; biết đến kh&#38;aacute;i niệm HTML element. B&#38;acirc;y giờ ch&#38;uacute;ng ta sẽ t&#38;igrave;m hiểu s&#38;acirc;u hơn về n&#38;oacute;.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;C&#38;aacute;c thẻ ở đ&#38;acirc;y hoạt động giống như c&#38;aacute;c v&#38;ugrave;ng chứa, n&#38;oacute; chứa th&#38;ocirc;ng tin nằm giữa 2 thẻ mở v&#38;agrave; đ&#38;oacute;ng. C&#38;aacute;c k&#38;yacute; tự trong ngoặc cho ta biết loại thẻ, mục đ&#38;iacute;ch của thẻ. V&#38;iacute; dụ: trong c&#38;aacute;c thẻ ở tr&#38;ecirc;n p l&#38;agrave; viết tắt của đoạn văn (paragraph). Thẻ mở &#38;lt;p&#38;gt; được cấu tạo bởi dấu nhỏ hơn nằm b&#38;ecirc;n tr&#38;aacute;i, tiếp đến l&#38;agrave; k&#38;iacute; tự &#38;quot;p&#38;quot; v&#38;agrave; cuối c&#38;ugrave;ng l&#38;agrave; dấu lớn hơn. Thẻ đ&#38;oacute;ng &#38;lt;/p&#38;gt; được cấu tạo cơ bản giống thẻ mở của n&#38;oacute; nhưng n&#38;oacute; th&#38;ecirc;m &#38;quot;/&#38;quot; v&#38;agrave;o trước k&#38;iacute; tự &#38;quot;p&#38;quot;. Body, Head &#38;amp; Title &#38;lt;!DOCTYPE html&#38;gt; &#38;lt;html&#38;gt; &#38;lt;head&#38;gt; &#38;lt;meta charset=&#38;quot;UTF-8&#38;quot;&#38;gt; &#38;lt;title&#38;gt;Ti&#38;ecirc;u đề/Nhan đề b&#38;agrave;i viết &#38;lt;/title&#38;gt; &#38;lt;/head&#38;gt; &#38;lt;body&#38;gt; Nội dung của trang sẽ nằm ở đ&#38;acirc;y &#38;lt;/body&#38;gt; &#38;lt;/html&#38;gt;.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#38;lt;!DOCTYPE html&#38;gt; Khai b&#38;aacute;o đ&#38;acirc;y l&#38;agrave; một file c&#38;oacute; định dạng l&#38;agrave; HTML5 để gi&#38;uacute;p tr&#38;igrave;nh duyệt biết bạn đang d&#38;ugrave;ng phi&#38;ecirc;n bản html bao nhi&#38;ecirc;u, c&#38;oacute; cũng được, kh&#38;ocirc;ng c&#38;oacute; cũng được nhưng sẽ bị hạn chế nhiều thẻ mới, thuộc t&#38;iacute;nh trong thẻ m&#38;agrave; tr&#38;igrave;nh duyệt kh&#38;ocirc;ng ph&#38;aacute;t hiện được. Thẻ &#38;lt;html&#38;gt; Cấu tr&#38;uacute;c file html Thẻ &#38;lt;body&#38;gt; Nằm sau thẻ &#38;lt;head&#38;gt;, c&#38;oacute; thẻ đ&#38;oacute;ng &#38;lt;/body&#38;gt; nằm trước &#38;lt;/html&#38;gt;. Body l&#38;agrave; nơi chứa những g&#38;igrave; m&#38;agrave; mọi người sẽ thấy tr&#38;ecirc;n trang như thanh menu, banner, quảng c&#38;aacute;o. Thẻ &#38;lt;head&#38;gt; Nằm sau thẻ &#38;lt;html&#38;gt;, c&#38;oacute; thẻ đ&#38;oacute;ng &#38;lt;/head&#38;gt;, n&#38;oacute; chứa những thẻ khai b&#38;aacute;o th&#38;ocirc;ng tin cho trang như ti&#38;ecirc;u đề, m&#38;ocirc; tả, bảng m&#38;atilde; k&#38;yacute; tự. head kh&#38;ocirc;ng hiển thị nội dung những g&#38;igrave; n&#38;oacute; chứa đựng ra ngo&#38;agrave;i. Thuộc t&#38;iacute;nh (attribute) charset nằm trong thẻ meta c&#38;oacute; nhiệm vụ khai b&#38;aacute;o bảng m&#38;atilde;, ng&#38;ocirc;n ngữ tiếng việt n&#38;ecirc;n d&#38;ugrave;ng UTF-8 Thẻ &#38;lt;title&#38;gt; d&#38;ugrave;ng để khai b&#38;aacute;o ti&#38;ecirc;u đề của trang, v&#38;agrave; gần như đ&#38;acirc;y l&#38;agrave; bắt buộc phải c&#38;oacute; trong một file html.&#60;/p&#62;&#13;&#10;', '/education/uploads/images/cau-truc-html-co-ban.jpg', 1, '2023-12-24 15:09:05', '2023-12-24 22:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`id`, `name`, `course_id`, `create_at`, `update_at`) VALUES
(23, '1. Làm quen với HTML', 20, '2023-11-01 22:19:01', '2023-12-08 11:22:48'),
(25, '2. Các thẻ tiêu đề', 20, '2023-11-01 22:20:15', NULL),
(26, '3. Các thẻ đoạn văn', 20, '2023-11-01 22:21:08', NULL),
(27, '4. HTML semantic', 20, '2023-11-01 22:21:38', NULL),
(28, '5. Thẻ danh sách', 20, '2023-11-01 22:22:07', NULL),
(29, '6. Sử dụng liên kết', 20, '2023-11-01 22:22:21', NULL),
(32, '7. Sử dụng hình ảnh', 20, '2023-11-02 13:36:43', NULL),
(33, '8. Làm quen với CSS', 20, '2023-11-02 13:37:03', NULL),
(34, '9. CSS selectors cơ bản', 20, '2023-11-02 13:37:31', NULL),
(35, '10. Đệm, viền, khoảng lề', 20, '2023-11-02 13:37:58', NULL),
(36, '11. Làm việc với màu sắc', 20, '2023-11-02 15:40:20', NULL),
(38, '13. Thuộc tính vị trí (position)', 20, '2023-11-02 15:40:50', NULL),
(39, '1. Tìm hiểu và cài đặt Sass', 21, '2023-11-04 00:08:40', NULL),
(40, '2. Sử dụng Sass trong dự án', 21, '2023-11-04 00:09:13', NULL),
(41, '3. Nested rules và variables', 21, '2023-11-04 00:09:24', NULL),
(42, '4. Extend, Placeholder selector', 21, '2023-11-04 00:09:35', '2023-11-04 00:15:39'),
(43, '5. Sử dụng mixins trong Sass', 21, '2023-11-04 00:09:54', '2023-11-04 00:16:05'),
(44, '6. @if, @media và @content', 21, '2023-11-04 00:10:05', '2023-11-04 00:16:29'),
(45, '7. Partial, @import trong Sass', 21, '2023-11-04 00:10:16', '2023-11-04 00:16:46'),
(46, '1. Giới thiệu', 22, '2023-11-04 00:21:23', NULL),
(47, '2. Biến, comments, built-in', 22, '2023-11-04 00:22:01', NULL),
(48, '8. Tìm hiểu về 7-1 pattern', 21, '2023-11-12 09:52:36', NULL),
(49, '9. Xây dựng Grid system với Sass', 21, '2023-11-12 09:52:58', NULL),
(50, '10. Xây dựng row-cols và offset', 21, '2023-11-12 09:53:08', NULL),
(51, '11. Hoàn thiện grid system với Sass', 21, '2023-11-12 09:53:22', NULL),
(52, '3. Toán tử, kiểu dữ liệu', 22, '2023-11-14 00:51:04', NULL),
(53, '4. Làm việc với hàm', 22, '2023-11-14 00:51:23', NULL),
(54, '5. Làm việc với chuỗi', 22, '2023-11-14 00:51:41', NULL),
(55, '6. Làm việc với Object', 22, '2023-11-14 00:51:58', NULL),
(56, '7. Lệnh rẽ nhánh, toán tử 3 ngôi', 22, '2023-11-14 00:52:34', NULL),
(57, '8. Tìm hiểu về vòng lặp', 22, '2023-11-14 00:52:55', NULL),
(58, '9. HTML DOM', 22, '2023-11-14 00:53:30', NULL),
(59, '10. JSON, Fetch, Postman', 22, '2023-11-14 00:53:55', NULL),
(60, '1. Bắt đầu', 24, '2023-11-25 16:56:28', NULL),
(61, '2. Viewport, @media', 24, '2023-11-25 16:57:21', NULL),
(62, '3. Thực hành nhỏ', 24, '2023-11-25 16:57:33', NULL),
(63, '1. IIFE, Scope, Clouse', 23, '2023-11-25 16:59:42', NULL),
(64, '2. Hoisting, Strict Mode, Data Types', 23, '2023-11-25 17:00:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `thumbnail` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `parent_id` int(11) DEFAULT 0,
  `blog_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0 COMMENT '0: Chưa duyệt 1: Đã duyệt',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `thumbnail`, `website`, `content`, `parent_id`, `blog_id`, `user_id`, `status`, `create_at`, `update_at`) VALUES
(48, 'Đào Thu ', 'thu86065@st.vimaru.edu.vn', '/education/uploads/images/user8-128x128.jpg', NULL, 'Ủa zì zạ', 0, 99, NULL, 0, '2023-12-24 14:57:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0: Chưa xử lý 1: Đang xử lý 2: Đã xử lý',
  `content` text DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fullname`, `email`, `title`, `status`, `content`, `create_at`, `update_at`) VALUES
(48, 'Phương Thảo', 'thaonguyen021401@gmail.com', 'Khóa học MOS 2016', 0, 'Khóa học MOS 2016 khi nào sẽ hoàn thiện full bài giảng?', '2023-09-10 21:17:24', NULL),
(49, 'Nguyễn Hoàng Nam', 'namnguyen@gmail.com', 'Thời gian ra mắt', 1, 'Khóa MOS Excel 2016 sắp ra mắt chưa ạ!!', '2023-09-13 14:56:49', '2023-09-26 20:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `thumbnail` varchar(200) DEFAULT NULL,
  `nameCourse` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `active_code` varchar(50) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `thumbnail`, `nameCourse`, `description`, `price`, `active_code`, `create_at`, `update_at`) VALUES
(20, '/education/uploads/images/html-css-pro.png', 'HTML CSS Pro', 'Khóa học HTML CSS dành cho người mới bắt đầu từ cơ bản đến nâng cao, nội dung đầy đủ và chuyên sâu, bạn không cần biết gì hơn nữa, trong khóa học tôi ', 1290000, 'HTML2023', '2023-11-01 21:16:45', '2023-12-17 22:45:30'),
(21, '/education/uploads/images/sass.png', 'Ngôn ngữ tiền xử lý Sass', 'Xây dựng Grid system 12 columns với Sass, học cách sử dụng 7-1 pattern cho dự án lớn, được thiết kế và hướng dẫn bởi Đào Thu.', 299000, 'SASS2023', '2023-11-01 21:19:01', '2023-12-17 22:45:45'),
(22, '/education/uploads/images/javascript-co-ban.png', 'Lập trình JavaScript cơ bản', 'Khóa học JavaScript dành cho người mới bắt đầu từ cơ bản đến nâng cao, nội dung đầy đủ và chuyên sâu, bạn không cần biết gì hơn nữa, trong khóa học tôi sẽ chỉ bạn', 890000, 'JSCB2023', '2023-11-01 21:21:56', '2023-12-17 22:46:01'),
(23, '/education/uploads/images/javascript-nang-cao.png', 'Lập trình JavaScript nâng cao', 'Khóa học JavaScript  dành cho người mới bắt đầu từ cơ bản đến nâng cao, nội dung đầy đủ và chuyên sâu, bạn không cần biết gì hơn nữa, trong khóa học tôi sẽ chỉ bạn.&#13;&#10;', 850000, 'JSNC2023', '2023-11-01 21:22:24', '2023-12-17 22:46:19'),
(24, '/education/uploads/images/responsive.png', 'Responsive với Grid System', 'Khóa học Responsive dành cho người mới bắt đầu từ cơ bản đến nâng cao, nội dung đầy đủ và chuyên sâu, bạn không cần biết gì hơn nữa, trong khóa học tôi sẽ chỉ bạn.', 249000, 'RESPON2023', '2023-11-01 21:23:18', '2023-12-17 22:46:35'),
(25, '/education/uploads/images/dung-cham-tay-len-mat.png', 'App &#34;Đừng chạm tay lên mặt&#34;', 'Khóa học App &#34;Đừng chạm tay lên mặt&#34; dành cho người mới bắt đầu từ cơ bản đến nâng cao, nội dung đầy đủ và chuyên sâu, bạn không cần biết gì hơn nữa, trong khóa học tôi sẽ chỉ bạn.', 299000, 'APPFACE2023', '2023-11-01 21:24:07', '2023-12-17 22:46:45'),
(26, '/education/uploads/images/C%2B%2B.png', 'Lập trình C++ cơ bản, nâng cao', 'Khóa học Lập trình C++ dành cho người mới bắt đầu từ cơ bản đến nâng cao, nội dung đầy đủ và chuyên sâu, bạn không cần biết gì hơn nữa, trong khóa học tôi sẽ chỉ bạn.', 399000, 'CPLUS2023', '2023-11-01 21:24:38', '2023-12-17 23:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `permission` text DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permission`, `create_at`, `update_at`) VALUES
(1, 'Trợ giảng', '{\"course\":[\"lists\"],\"chapter\":[\"lists\"],\"lesson\":[\"lists\"],\"blog\":[\"lists\"]}', '2023-07-11 14:40:32', '2023-11-18 15:08:26'),
(19, 'Giảng viên', '{\"course\":[\"lists\"],\"chapter\":[\"lists\"],\"lesson\":[\"lists\"],\"blog\":[\"lists\"],\"orderCourse\":[\"lists\"],\"student\":[\"lists\"],\"groups\":[\"lists\"],\"users\":[\"lists\"]}', '2023-09-07 21:12:06', '2023-12-08 11:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `video` varchar(200) DEFAULT NULL,
  `document` text DEFAULT NULL,
  `chapter_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `name`, `video`, `document`, `chapter_id`, `course_id`, `create_at`, `update_at`) VALUES
(101, 'Vai trò của HTML, CSS, Javascript', '/education/uploads/files/html-css-pro.mp4', '&#60;h3&#62;HTML, CSS v&#38;agrave; JavaScript&#60;/h3&#62;&#13;&#10;&#13;&#10;&#60;p&#62;HTML (HyperText Markup Language - Ng&#38;ocirc;n ngữ đ&#38;aacute;nh dấu si&#38;ecirc;u văn bản), CSS (Cascading Style Sheets - C&#38;aacute;c tập tin định kiểu theo tầng) v&#38;agrave; JavaScript l&#38;agrave; 3 ng&#38;ocirc;n ngữ để ph&#38;aacute;t triển web m&#38;agrave; tr&#38;igrave;nh duyệt c&#38;oacute; thể hiểu. Ch&#38;uacute;ng l&#38;agrave; c&#38;aacute;c ng&#38;ocirc;n ngữ kh&#38;aacute;c nhau nhưng c&#38;oacute; quan hệ mật thiết với nhau, mỗi ng&#38;ocirc;n ngữ được thiết kế cho những nhiệm vụ cụ thể. Việc hiểu r&#38;otilde; được c&#38;aacute;ch ch&#38;uacute;ng l&#38;agrave;m việc với nhau sẽ gi&#38;uacute;p bạn sớm trở th&#38;agrave;nh một nh&#38;agrave; ph&#38;aacute;t triển web chuy&#38;ecirc;n nghiệp.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;H&#38;atilde;y tưởng tượng HTML l&#38;agrave; phần khung xương của một trang web, CSS l&#38;agrave; những g&#38;igrave; bạn nh&#38;igrave;n thấy tr&#38;ecirc;n trang web v&#38;agrave; JavaScript l&#38;agrave; c&#38;aacute;c h&#38;agrave;nh vi c&#38;oacute; thể thao t&#38;aacute;c tr&#38;ecirc;n trang web.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#60;img alt=&#34;&#34; src=&#34;/education/uploads/images/html-css-pro.png&#34; style=&#34;height:258px; width:460px&#34; /&#62;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Bạn muốn học lập tr&#38;igrave;nh hiệu quả hơn kh&#38;ocirc;ng? H&#38;atilde;y học tại trang web&#38;nbsp;&#60;a href=&#34;http://fullstack.edu.vn/&#34;&#62;http://fullstack.edu.vn&#60;/a&#62;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Ch&#38;uacute;c bạn học b&#38;agrave;i thật tốt !!!&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;div class=&#34;ddict_btn&#34; style=&#34;left:1097.99px; text-align:justify; top:184px&#34;&#62;&#38;nbsp;&#60;/div&#62;&#13;&#10;&#13;&#10;&#60;div class=&#34;ddict_btn&#34; style=&#34;left:1192px; text-align:justify; top:740.4px&#34;&#62;&#38;nbsp;&#60;/div&#62;&#13;&#10;&#13;&#10;&#60;div class=&#34;ddict_btn&#34; style=&#34;left:1152px; top:598.6px&#34;&#62;&#38;nbsp;&#60;/div&#62;&#13;&#10;', 23, 20, '2023-11-02 13:48:05', '2023-11-14 01:02:50'),
(102, 'Ngôn ngữ trình duyệt có thể hiểu?', '/education/uploads/files/html-css-pro.mp4', '&#60;h3&#62;HTML, CSS v&#38;agrave; JavaScript&#60;/h3&#62;&#13;&#10;&#13;&#10;&#60;p&#62;HTML (HyperText Markup Language - Ng&#38;ocirc;n ngữ đ&#38;aacute;nh dấu si&#38;ecirc;u văn bản), CSS (Cascading Style Sheets - C&#38;aacute;c tập tin định kiểu theo tầng) v&#38;agrave; JavaScript l&#38;agrave; 3 ng&#38;ocirc;n ngữ để ph&#38;aacute;t triển web m&#38;agrave; tr&#38;igrave;nh duyệt c&#38;oacute; thể hiểu. Ch&#38;uacute;ng l&#38;agrave; c&#38;aacute;c ng&#38;ocirc;n ngữ kh&#38;aacute;c nhau nhưng c&#38;oacute; quan hệ mật thiết với nhau, mỗi ng&#38;ocirc;n ngữ được thiết kế cho những nhiệm vụ cụ thể. Việc hiểu r&#38;otilde; được c&#38;aacute;ch ch&#38;uacute;ng l&#38;agrave;m việc với nhau sẽ gi&#38;uacute;p bạn sớm trở th&#38;agrave;nh một nh&#38;agrave; ph&#38;aacute;t triển web chuy&#38;ecirc;n nghiệp.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;H&#38;atilde;y tưởng tượng HTML l&#38;agrave; phần khung xương của một trang web, CSS l&#38;agrave; những g&#38;igrave; bạn nh&#38;igrave;n thấy tr&#38;ecirc;n trang web v&#38;agrave; JavaScript l&#38;agrave; c&#38;aacute;c h&#38;agrave;nh vi c&#38;oacute; thể thao t&#38;aacute;c tr&#38;ecirc;n trang web.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#60;img alt=&#34;&#34; src=&#34;/data_video/uploads/images/64a2487459fe5.jpg&#34; style=&#34;height:270px; width:480px&#34; /&#62;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Bạn muốn học lập tr&#38;igrave;nh hiệu quả hơn kh&#38;ocirc;ng? H&#38;atilde;y học tại trang web&#38;nbsp;&#60;a href=&#34;http://fullstack.edu.vn/&#34;&#62;http://fullstack.edu.vn&#60;/a&#62;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Ch&#38;uacute;c bạn học b&#38;agrave;i thật tốt !!!&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#13;&#10;', 23, 20, '2023-11-02 13:48:34', '2023-11-14 00:57:07'),
(103, 'Chi tiết về ngôn ngữ HTML', '/education/uploads/files/html-css-pro.mp4', '', 23, 20, '2023-11-02 13:48:55', '2023-11-14 00:57:22'),
(104, 'HTML có ý nghĩa là gì?', '/education/uploads/files/html-css-pro.mp4', '', 23, 20, '2023-11-02 13:49:15', '2023-11-14 00:57:30'),
(105, 'Siêu văn bản là gì?', '/education/uploads/files/html-css-pro.mp4', '', 23, 20, '2023-11-02 13:49:35', '2023-11-14 00:57:39'),
(106, 'Sử dụng thẻ i đánh dấu đoạn văn', '/education/uploads/files/html-css-pro.mp4', '', 23, 20, '2023-11-02 16:28:33', '2023-11-14 00:57:46'),
(107, 'Cấu trúc tiêu chuẩn của file HTML', '/education/uploads/files/html-css-pro.mp4', '', 23, 20, '2023-11-02 16:28:59', '2023-11-14 00:57:53'),
(108, 'Tóm tắt chương làm quen với HTML', '/education/uploads/files/html-css-pro.mp4', '', 23, 20, '2023-11-02 16:29:28', '2023-11-14 00:57:59'),
(109, 'Thẻ tiêu đề h1', '/education/uploads/files/html-css-pro.mp4', '', 25, 20, '2023-11-02 16:30:34', '2023-11-14 00:58:05'),
(110, 'Thẻ tiêu đề h2', '/education/uploads/files/html-css-pro.mp4', '', 25, 20, '2023-11-02 16:30:57', '2023-11-14 00:58:11'),
(111, 'Thẻ tiêu đề h3, h4, h5, h6', '/education/uploads/files/html-css-pro.mp4', '', 25, 20, '2023-11-02 16:31:22', '2023-11-14 00:58:22'),
(112, 'Những sai lầm thường gặp', '/education/uploads/files/html-css-pro.mp4', '', 25, 20, '2023-11-02 16:31:47', '2023-11-14 00:58:31'),
(113, 'Tóm tắt chương các thẻ tiêu đề', '/education/uploads/files/html-css-pro.mp4', '', 25, 20, '2023-11-02 16:32:53', '2023-11-14 00:58:38'),
(114, 'Thẻ p', '/education/uploads/files/html-css-pro.mp4', '', 26, 20, '2023-11-02 16:33:36', '2023-11-14 00:58:45'),
(115, 'Thẻ br', '/education/uploads/files/html-css-pro.mp4', '', 26, 20, '2023-11-02 16:33:58', '2023-11-14 00:58:54'),
(116, 'Những sai lầm thường gặp', '/education_file/uploads/files/video_html_css.mp4', '', 26, 20, '2023-11-02 16:34:17', '2023-11-03 11:21:13'),
(117, 'Tóm tắt chương', '', '', 26, 20, '2023-11-02 16:34:33', NULL),
(118, 'Install SASS để dùng SCSS?', '/education/uploads/files/sass.mp4', '', 39, 21, '2023-11-04 00:13:13', '2023-11-14 01:00:28'),
(119, 'Lời khuyên trước khóa học', '/education/uploads/files/javascriot-co-ban.mp4', '', 46, 22, '2023-11-04 00:22:42', '2023-11-14 01:01:41'),
(120, 'Responsive là gì?', '/education/uploads/files/sass.mp4', '', 60, 24, '2023-11-25 16:58:21', NULL),
(121, 'Giới thiệu', '/education/uploads/files/javascriot-co-ban.mp4', '', 63, 23, '2023-11-25 17:00:59', '2023-12-17 16:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `login_token`
--

CREATE TABLE `login_token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `token` varchar(100) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login_token`
--

INSERT INTO `login_token` (`id`, `user_id`, `token`, `create_at`) VALUES
(376, 11, '4c0fc00b8e4ccf51d30df40be7debe2faeff000b', '2023-12-24 22:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `actions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `title`, `actions`) VALUES
(1, 'course', 'Quản lý khóa học', '{\"add\":\"Thêm\",\"edit\":\"Sửa\",\"delete\":\"Xóa\",\"lists\":\"Xem\"}'),
(2, 'chapter', 'Quản lý học phần', '{\"add\":\"Thêm\",\"edit\":\"Sửa\",\"delete\":\"Xóa\",\"lists\":\"Xem\"}'),
(3, 'lesson', 'Quản lý bài học', '{\"add\":\"Thêm\",\"edit\":\"Sửa\",\"delete\":\"Xóa\",\"lists\":\"Xem\"}'),
(4, 'blog', 'Quản lý bài viết', '{\"add\":\"Thêm\",\"edit\":\"Sửa\",\"delete\":\"Xóa\",\"lists\":\"Xem\"}'),
(5, 'orderCourse', 'Quản lý đơn hàng', '{\"add\":\"Thêm\",\"edit\":\"Sửa\",\"delete\":\"Xóa\",\"lists\":\"Xem\"}'),
(6, 'student', 'Quản lý học viên', '{\"add\":\"Thêm\",\"edit\":\"Sửa\",\"delete\":\"Xóa\",\"lists\":\"Xem\"}'),
(7, 'groups', 'Quản lý nhóm người dùng', '{\"add\":\"Thêm\",\"edit\":\"Sửa\",\"delete\":\"Xóa\",\"lists\":\"Xem\"}'),
(8, 'users', 'Quản lý người dùng hệ thống', '{\"add\":\"Thêm\",\"edit\":\"Sửa\",\"delete\":\"Xóa\",\"lists\":\"Xem\"}');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `opt_key` varchar(100) DEFAULT NULL,
  `opt_value` text DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `opt_key`, `opt_value`, `name`) VALUES
(1, 'ga_hotline', '0367012859', 'Hotline');

-- --------------------------------------------------------

--
-- Table structure for table `ordercourse`
--

CREATE TABLE `ordercourse` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordercourse`
--

INSERT INTO `ordercourse` (`id`, `student_id`, `course_id`, `status`, `create_at`) VALUES
(56, 3, 20, 1, '2023-12-24 02:15:38'),
(57, 3, 21, 1, '2023-12-24 22:14:03'),
(58, 3, 22, 1, '2023-12-24 22:14:13'),
(59, 3, 24, 1, '2023-12-24 22:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `thumbnail` varchar(200) DEFAULT '/education/uploads/images/avatar2.jpg',
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `forget_token` varchar(100) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `thumbnail`, `fullname`, `email`, `phone`, `password`, `forget_token`, `create_at`, `update_at`) VALUES
(3, '/education/uploads/images/user8-128x128.jpg', 'Đào Thu ', 'thu86065@st.vimaru.edu.vn', '0367012859', '273a0c7bd3c679ba9a6f5d99078e36e85d02b952', NULL, '2023-11-11 00:25:02', '2023-12-23 14:33:19'),
(28, '/education/uploads/images/avatar2.jpg', 'Phạm Bảo Ngọc', 'Ngoc87009@st.vimaru.edu.vn', '0366765438', '$2y$10$SJJPB/c6c3qhZdhNB8REjeObx3gGUvn/rRPB1SXqosXYKul2MIO4u', NULL, '2023-11-14 00:48:06', '2023-12-18 13:47:02'),
(30, '/education/uploads/images/ava.jpg', 'Nguyễn Phương Thảo', 'thao88144@st.vimaru.edu.vn', '0355906326', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, '2023-11-25 22:33:27', '2023-12-24 15:06:50'),
(33, '/education/uploads/images/avatar2.jpg', 'Hoàng Cương', 'cuong@gmail.com', '0367012859', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, '2023-12-18 14:00:50', '2023-12-18 14:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `student_logintoken`
--

CREATE TABLE `student_logintoken` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_logintoken`
--

INSERT INTO `student_logintoken` (`id`, `student_id`, `token`, `create_at`) VALUES
(20, 3, '02f8a4eb57dadcf437339b8c7de9c8a5c531edad', '2023-11-11 16:50:31'),
(34, 3, 'd733c2cfc5593129e17b8bbd02e85edee66329eb', '2023-11-12 10:17:09'),
(35, 3, 'edd1d3995fd470e8c965e2f3bae525046aa77225', '2023-11-13 16:20:25'),
(36, 3, 'b68a4a5a69bfc846b46d4b3dad374e2696b16f48', '2023-11-13 17:50:57'),
(37, 3, '9703e3aef461f262c224c2dedcb71eb6879c186a', '2023-11-14 00:49:18'),
(39, 3, '7dd75ad24c5cad320aa7d8a743c20d1ebb4b2319', '2023-11-17 22:17:08'),
(41, 3, 'e5b11899688df6902865d45df307870e22537cc7', '2023-11-18 15:32:51'),
(42, 3, 'd10b2a8f50fd566bee18732089cb8a0da885e11d', '2023-11-19 22:49:07'),
(43, 3, '278aa69248c0733a44e1c1e6c44926c17cdfd082', '2023-11-21 23:13:28'),
(46, 3, '0ec09be27300f145ea87503c133e777633da8d90', '2023-11-25 16:35:41'),
(58, 3, '1eed8d70e580667c7ff1408a64173a27972088f1', '2023-12-07 01:29:36'),
(59, 3, '6fcbee4db775a2e589896f7a97ee66c4af98d73a', '2023-12-08 11:21:32'),
(66, 3, '067f7e15737c30596a711cfa97e013769ea4991e', '2023-12-09 22:56:58'),
(67, 3, '2c6d418e909e7d04b3f2d47210cf3cee71238c55', '2023-12-10 21:52:56'),
(68, 3, '41180174edeb5f10fa5ce8ef47e3cbddd777a6e4', '2023-12-14 22:58:28'),
(69, 3, '564311cdd1d784ad29aec7d0721dbf38b46301b8', '2023-12-16 00:56:30'),
(70, 3, '6bad3c813bbba47c74443d7a65121dae09a684ca', '2023-12-17 01:22:24'),
(72, 3, 'e82667badcda54208130e3fde61f00e517a843ca', '2023-12-17 17:23:46'),
(74, 3, '2f7e879dd64eaf5fa6ed4538211485c37f8b5f39', '2023-12-17 23:12:54'),
(75, 3, 'd3700b9189269bd60916320546a6c25d4a40b9e9', '2023-12-18 11:31:19'),
(93, 3, '5acb5a63a7c3a7e294e1cbe4b479295bdb18c20b', '2023-12-20 19:57:04'),
(96, 3, 'f73240f4eac229fbef7fd4c1f10543cf7ebc4adb', '2023-12-22 01:19:17'),
(100, 3, 'bf5d98bff481f5c35fab5c75ad814c29c8be64d5', '2023-12-24 02:25:03'),
(104, 33, '2be74dd2752e2e3d19bded0e9badb2749969a100', '2023-12-24 12:16:44'),
(108, 3, '81e242ecc2319a5311da24e946ad3193186b1a8b', '2023-12-24 15:19:01'),
(111, 3, '8da72d3972690d13a7f24e15cb0352f1f74db088', '2023-12-24 23:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `thumbnail` varchar(150) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `about_content` text DEFAULT NULL,
  `contact_facebook` varchar(100) DEFAULT NULL,
  `contact_twitter` varchar(100) DEFAULT NULL,
  `contact_linkedin` varchar(100) DEFAULT NULL,
  `contact_pinterest` varchar(100) DEFAULT NULL,
  `forget_token` varchar(100) DEFAULT NULL,
  `group_id` int(11) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0 COMMENT '0: Chưa kích hoạt - 1: Đã kích hoạt',
  `last_activity` datetime DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `thumbnail`, `fullname`, `email`, `phone`, `password`, `about_content`, `contact_facebook`, `contact_twitter`, `contact_linkedin`, `contact_pinterest`, `forget_token`, `group_id`, `status`, `last_activity`, `create_at`, `update_at`) VALUES
(8, '/education/uploads/images/ava.jpg', 'Phương Thảo', 'thao88144@st.vimaru.edu.vn', '03274732743', '$2y$10$T1EolSdgLWuGRPWK61q4O..0BhHwSlM/sPzXMDqNjUC0cXMM8r0nq', NULL, '', '', '', '', '63383138599cd71d674aad8000763eae6997b865', 1, 1, '2023-11-18 15:09:24', '2023-07-24 10:37:37', '2023-12-20 17:39:18'),
(11, '/education/uploads/images/avt_fb.jpg', 'Dao Van Thu', 'thu86065@st.vimaru.edu.vn', '04394934934', '$2y$10$FQDgsr5AFs/GWxeAkBoPZ.OxSiw1.u6b1tVOeGp0y/Y4nCwEi.1RO', NULL, '', '', '', '', NULL, 19, 1, '2023-12-24 23:02:49', '2023-10-31 14:21:51', '2023-12-20 17:39:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `chapter_id` (`chapter_id`);

--
-- Indexes for table `login_token`
--
ALTER TABLE `login_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordercourse`
--
ALTER TABLE `ordercourse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_logintoken`
--
ALTER TABLE `student_logintoken`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `login_token`
--
ALTER TABLE `login_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordercourse`
--
ALTER TABLE `ordercourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `student_logintoken`
--
ALTER TABLE `student_logintoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `lesson_ibfk_2` FOREIGN KEY (`chapter_id`) REFERENCES `chapter` (`id`);

--
-- Constraints for table `login_token`
--
ALTER TABLE `login_token`
  ADD CONSTRAINT `login_token_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ordercourse`
--
ALTER TABLE `ordercourse`
  ADD CONSTRAINT `ordercourse_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `ordercourse_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `student_logintoken`
--
ALTER TABLE `student_logintoken`
  ADD CONSTRAINT `student_logintoken_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
