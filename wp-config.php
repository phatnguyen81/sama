<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'sama' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '123456' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'W*4zyg>5QdvYv^E~7_5Z%7 6sPYV]$1bs<kf:*Gt~&?VO-IDV]]^&w:Re&$XvOI@' );
define( 'SECURE_AUTH_KEY',  'Dzf!gSh4&*MA6ss^iLnnE[hlwuzk@8my8+IM2viGm1C=]m=t?wV9 c1T%$(Dx6-^' );
define( 'LOGGED_IN_KEY',    'xkV]1>c>wI[C#GXmA^dCg2L Eu?$9kOz$APPC,*(Yi{+<Ik8JAL=qgUA$&w4e=Rw' );
define( 'NONCE_KEY',        '<`cBg3rEmPwo5VB/1f~el?p+*Z%,o&u0/C7M[,m#.hqHcXMh%v$00ELfB=dGetOu' );
define( 'AUTH_SALT',        '$/-6(t:b~uVIXW~l6LTY1~W~FNx:D&xVyu(5J.Mp:R7)|7;^Zq M*Sy/(Uw.W-+:' );
define( 'SECURE_AUTH_SALT', 'z,)P0Wla,k3MK-a]6iIn1Q(jim}!Pa#qJ5+zY&fN24`D{IHRWrV.knPE9JA`R0r9' );
define( 'LOGGED_IN_SALT',   '~zTL3Gh9M;}PMt#M.8|V?B)[?bc#W9=@w,Y-f[.Cwz@Z-<j!([N2`7MWZJ78O`r[' );
define( 'NONCE_SALT',       '9lKDN:+7dioUYPB$X||n:htvtBy3,-7DC6v*=DK88p%c9q`HhNpI:(lj$r,S.MQ0' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'fE3PDj_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
