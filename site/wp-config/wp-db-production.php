<?php
// Prevent file from being accessed directly
if (!defined('ABSPATH')) exit();

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_wordpresstemplatelocalhost');

/** MySQL database username */
define('DB_USER', 'wp_wordpresstemplatelocalhost');

/** MySQL database password */
define('DB_PASSWORD', 'wp_wordpresstemplatelocalhost');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


define('AUTH_KEY',         'QD]31~(t.-(mk(IU|k}yd+]E{k(odo<)ur~89r5*Ckb/)AD(1`4jSygn-R8.<4?H');
define('SECURE_AUTH_KEY',  'w|aXJU>]9g}{I{hos1T~5sxwd81[X^Df6q<!Vy_@sIzo[[z/Jw)ZYIST;<MMT2Lq');
define('LOGGED_IN_KEY',    'Gk6Qq2`CH/]1-v)()=9rIU)HGD&$8eYXDsglt.zNsCd<>HFI[@m%0sD8X9T:WW`j');
define('NONCE_KEY',        '(9.ZM(sUm)Y;HjZz3ieG[A82]?Opi/fOB<$H{hykM-08hG^e7Y&0h(LXy@]HBkQ^');
define('AUTH_SALT',        'vaJ3{>%szUVy55ZHp;0{x~UO ?{A+Z.`FZPXrzYsnauDc-%eM]N^>v;PdoB@[V2I');
define('SECURE_AUTH_SALT', '|n S)KM(c&:$`ctJ/9x?zb%!MjuV]Hz]0.@M2&>LjWZ9_1XIM74lPTG2||zFVCqQ');
define('LOGGED_IN_SALT',   '.u[J(hj*<wy(v.J56:s4oy}jUs?{lJ`p`(t&d>xu/Me&,]Nz*J/jhN>LM!l$a90{');
define('NONCE_SALT',       'TX]^#zqj2t]G]H_+Cto4&jrx@~UBDQUK[4A.r0wi=k|&IR>O_t4SoR?LOW}%[jW?');

$table_prefix = 'wp_nonstandard_';

define('WPLANG',   '');
define('WP_DEBUG', true);