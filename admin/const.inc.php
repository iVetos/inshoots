<?php

/**
 * Constants
 * @package UPcms\Constants
 * @author UP Studio <info@up-studio.net>
 * @date 28/01/2016
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

// Data base
define ('__DB_HOST', 'localhost');
define ('__DB_USER', 'inshoots_up');
define ('__DB_PASS', 'CSDiKN$dEv6d');
define ('__DB_NAME', 'inshoots');

// Lang
define('__DEF_LANG', 'ru');

// Dirs
define('__DIR_CLASSES', 'classes/');
define('__DIR_INCLUDES', 'includes/');
define('__DIR_LOGS', 'logs/');

// Metatags
define('__SITE_TITLE', 'UPcms - Control panel');
define('__SITE_DESCRIPTION', 'UPcms');
define('__SITE_KEYWORDS', 'UPcms, UP Studio');

// Info
define('__SITE_NAME', 'UPcms');              // Project
define('__SITE_COMPANY', 'UP Studio');       // Company
define('__SITE_ADDR', 'cms.up-studio.net');  // Info site
define('__ORDER_MAIL', 'cms@up-studio.net'); // Info mail

// Modules
define('__MOD_EDIT', 1);        // Page and menu editor
define('__MOD_ARTICLES', 1);    // Articles
define('__MOD_NEWS', 0);        // News
define('__MOD_SHOP', 1);        // Catalog
define('__MOD_SHOP_ORDERS', 1); // Orders
define('__MOD_SHOP_USERS', 1);  // Зарегистрированные покупатели
define('__MOD_USERS', 0);       // Редактирование пользователей и их прав
define('__MOD_SLIDER', 0);      // Слайдер
define('__MOD_FILES', 0);       // Менеджер файлов
define('__MOD_GALLERY', 0);     // Галерея
define('__MOD_MAILER', 0);      // Рассылка
define('__MOD_OPTIONS', 0);     // Настройки
define('__MOD_ADMIN', 0);       // Администрирование

/**
 * Variables
 */
// All images
define('__CONST_IMG_WIDTH', 768);
define('__CONST_IMG_HEIGHT', 768);
define('__CONST_IMG_SMALL_WIDTH', 240);
define('__CONST_IMG_SMALL_HEIGHT', 190);

// Products
define('__CONST_CATEGORIES_DIR', 'img/categories/'); // Folder for category images
define('__CONST_PRODUCTS_DIR', 'img/products/');     // Folder for product images
define('__CONST_SHOP_TM', 0);                        // Trade marks
define('__CONST_SHOP_PARAMS', 0);                    // Parameters for categories
define('__CONST_SHOP_PRICE', 1);                     // Prices
define('__CONST_SHOP_PPRICE', 1);                    // Purchase price
define('__CONST_SHOP_OLD_PRICE', 0);                 // Old price
define('__CONST_SHOP_ARTICLE', 0);                   // Vendor code
define('__CONST_SHOP_PROVIDER', 0);                  // Provider
define('__CONST_CATEGORY_COVER_WIDTH', 500);         // Width for category cover
define('__CONST_CATEGORY_COVER_HEIGHT', 500);        // Height for category cover
define('__CONST_PRODUCT_MED_IMG_WIDTH', 975);        // Width for medium horizontal photo
define('__CONST_PRODUCT_MED_VERT_IMG_WIDTH', 488);   // Width for medium vertical photo
define('__CONST_PRODUCT_MED_IMG_HEIGHT', 975);       // Height for medium horizontal photo
define('__CONST_PRODUCT_MED_VERT_IMG_HEIGHT', 975);  // Height for medium vertical photo
define('__CONST_PRODUCT_IMG_WIDTH', 500);            // Width for small photo
define('__CONST_PRODUCT_IMG_HEIGHT', 311);           // Height for small photo
define('__CONST_PRODUCT_IMG_VERT_WIDTH', 333);       // Width for small photo
define('__CONST_PRODUCT_IMG_VERT_HEIGHT', 500);      // Height for small photo

define('__CONST_CANVAS_DIR', 'img/canvas/');         // Canvases path

// Gallery
define('__CONST_GALLERY_DIR', 'img/gallery/');       // Путь папке галереи
define('__CONST_GALLERY_IMG_WIDTH', 240);            // Ширина миниатюры
define('__CONST_GALLERY_IMG_HEIGHT', 190);           // Высота миниатюры
define('__CONST_GALLERY_COVER_WIDTH', 500);          // Ширина обложки
define('__CONST_GALLERY_COVER_HEIGHT', 400);         // Высота обложки

// Новости
define('__CONST_NEWS_DIR', 'img/news/');             // Папка для изображений
define('__CONST_NEWS_COVER', 1);                     // Обложка
define('__CONST_NEWS_TAGS', 1);                      // Теги
define('__CONST_NEWS_COVER_WIDTH', 500);             // Ширина обложки
define('__CONST_NEWS_COVER_HEIGHT', 400);            // Высота обложки

// Статьи
define('__CONST_ARTICLES_DIR', 'img/articles/');     // Folder for images
define('__CONST_ARTICLES_COVER', 0);                 // Cover
define('__CONST_ARTICLES_TAGS', 1);                  // Tags
define('__CONST_ARTICLES_COVER_WIDTH', 550);         // Width for cover
define('__CONST_ARTICLES_COVER_HEIGHT', 550);        // Height for cover

// Slider
define('__CONST_SLIDER_DIR', 'img/sliders/');
define('__CONST_SLIDER_WIDTH', 1920);
define('__CONST_SLIDER_HEIGHT', 1920);