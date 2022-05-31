<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

DEBUG - 2020-06-29 09:17:19 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:17:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:17:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 09:17:19 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:17:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:17:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 09:17:19 --> Total execution time: 0.0367
DEBUG - 2020-06-29 09:17:23 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:17:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:17:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 09:17:23 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:17:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:17:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 09:17:23 --> Total execution time: 0.0147
DEBUG - 2020-06-29 09:17:28 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:17:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:17:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 09:17:29 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:17:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:17:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 09:17:29 --> Could not find the language line "general_summary"
DEBUG - 2020-06-29 09:17:29 --> Total execution time: 0.1220
DEBUG - 2020-06-29 09:17:31 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:17:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:17:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 09:17:31 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:17:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:17:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 09:17:31 --> Could not find the language line "general_summary"
DEBUG - 2020-06-29 09:17:31 --> Total execution time: 0.0312
DEBUG - 2020-06-29 09:17:32 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:17:32 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 09:17:32 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 09:17:35 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:17:35 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 09:17:35 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 09:22:26 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:22:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:22:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 09:22:26 --> Total execution time: 0.0680
DEBUG - 2020-06-29 09:22:27 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:22:27 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 09:22:27 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 09:22:27 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:22:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:22:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 09:22:27 --> Total execution time: 0.0374
DEBUG - 2020-06-29 09:22:33 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:22:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:22:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 09:22:33 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `id` ASC
			 LIMIT 0, 10
DEBUG - 2020-06-29 09:22:52 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:22:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:22:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 09:22:52 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `id` ASC
			 LIMIT 10, 10
DEBUG - 2020-06-29 09:22:56 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:22:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:22:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 09:22:56 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `id` ASC
			 LIMIT 10, 10
DEBUG - 2020-06-29 09:23:01 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:23:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:23:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 09:23:01 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `id` ASC
			 LIMIT 10, 10
DEBUG - 2020-06-29 09:24:45 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:24:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:24:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 09:24:45 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `id` ASC
			 LIMIT 20, 10
DEBUG - 2020-06-29 09:24:50 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:24:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:24:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 09:24:50 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `id` ASC
			 LIMIT 10, 10
DEBUG - 2020-06-29 09:24:52 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:24:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:24:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 09:24:52 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `id` ASC
			 LIMIT 10, 10
DEBUG - 2020-06-29 09:24:52 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:24:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:24:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 09:24:52 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `id` ASC
			 LIMIT 10, 10
DEBUG - 2020-06-29 09:24:52 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 09:24:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 09:24:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 09:24:52 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `id` ASC
			 LIMIT 10, 10
DEBUG - 2020-06-29 10:07:19 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:07:19 --> No URI present. Default controller set.
DEBUG - 2020-06-29 10:07:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:07:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:07:19 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:07:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:07:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:07:19 --> Total execution time: 0.0249
DEBUG - 2020-06-29 10:07:26 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:07:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:07:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:07:27 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:07:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:07:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 10:07:27 --> Could not find the language line "general_summary"
DEBUG - 2020-06-29 10:07:27 --> Total execution time: 0.0292
DEBUG - 2020-06-29 10:07:29 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:07:29 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 10:07:29 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 10:07:31 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:07:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:07:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:07:31 --> Total execution time: 0.0303
DEBUG - 2020-06-29 10:07:38 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:07:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:07:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:07:38 --> Total execution time: 0.0384
DEBUG - 2020-06-29 10:07:43 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:07:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:07:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:07:43 --> Total execution time: 0.1082
DEBUG - 2020-06-29 10:07:45 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:07:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:07:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:07:45 --> Total execution time: 0.0461
DEBUG - 2020-06-29 10:08:07 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:08:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:08:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:08:07 --> Total execution time: 0.0383
DEBUG - 2020-06-29 10:08:08 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:08:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:08:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:08:08 --> Total execution time: 0.0321
DEBUG - 2020-06-29 10:08:10 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:08:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:08:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:08:10 --> Total execution time: 0.0375
DEBUG - 2020-06-29 10:08:13 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:08:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:08:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:08:13 --> Total execution time: 0.0344
DEBUG - 2020-06-29 10:08:15 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:08:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:08:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:08:15 --> Total execution time: 0.0378
DEBUG - 2020-06-29 10:08:17 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:08:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:08:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:08:17 --> Total execution time: 0.0356
DEBUG - 2020-06-29 10:08:21 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:08:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:08:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 10:08:21 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%a%' OR p.`post_image_thumbs` LIKE '%a%' OR t.`post_title` LIKE '%a%' OR p.`price` LIKE '%a%' OR `post_status` LIKE '%a%')
			 ORDER BY `post_image_thumbs` DESC
			 LIMIT 0, 10
DEBUG - 2020-06-29 10:08:22 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:08:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:08:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 10:08:22 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%as%' OR p.`post_image_thumbs` LIKE '%as%' OR t.`post_title` LIKE '%as%' OR p.`price` LIKE '%as%' OR `post_status` LIKE '%as%')
			 ORDER BY `post_image_thumbs` DESC
			 LIMIT 0, 10
DEBUG - 2020-06-29 10:08:33 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:08:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:08:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:08:33 --> Total execution time: 0.0352
DEBUG - 2020-06-29 10:08:34 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:08:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:08:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 10:08:34 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `post_image_thumbs` DESC
			 LIMIT 0, 10
DEBUG - 2020-06-29 10:08:39 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:08:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:08:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 10:08:39 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `post_image_thumbs` DESC
			 LIMIT 0, 10
DEBUG - 2020-06-29 10:09:29 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:09:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:09:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:09:29 --> Total execution time: 0.0314
DEBUG - 2020-06-29 10:09:30 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:09:30 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 10:09:30 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 10:09:30 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:09:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:09:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:09:30 --> Total execution time: 0.0294
DEBUG - 2020-06-29 10:09:35 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:09:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:09:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:09:35 --> Total execution time: 0.0380
DEBUG - 2020-06-29 10:09:36 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:09:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:09:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:09:36 --> Total execution time: 0.0331
DEBUG - 2020-06-29 10:09:36 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:09:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:09:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:09:36 --> Total execution time: 0.0248
DEBUG - 2020-06-29 10:09:37 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:09:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:09:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:09:37 --> Total execution time: 0.0283
DEBUG - 2020-06-29 10:09:38 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:09:38 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 10:09:38 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 10:09:38 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:09:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:09:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:09:38 --> Total execution time: 0.0354
DEBUG - 2020-06-29 10:09:40 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:09:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:09:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:09:40 --> Total execution time: 0.0360
DEBUG - 2020-06-29 10:09:42 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:09:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:09:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:09:42 --> Total execution time: 0.0347
DEBUG - 2020-06-29 10:09:46 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:09:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:09:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:09:46 --> Total execution time: 0.0303
DEBUG - 2020-06-29 10:09:47 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:09:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:09:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:09:47 --> Total execution time: 0.0359
DEBUG - 2020-06-29 10:21:35 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:21:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:21:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:21:35 --> Total execution time: 0.0259
DEBUG - 2020-06-29 10:21:35 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:21:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:21:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:21:35 --> Total execution time: 0.0377
DEBUG - 2020-06-29 10:21:40 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:21:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:21:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:21:40 --> Total execution time: 0.0357
DEBUG - 2020-06-29 10:21:47 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:21:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:21:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:21:47 --> Total execution time: 0.0297
DEBUG - 2020-06-29 10:21:48 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:21:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:21:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:21:48 --> Total execution time: 0.0307
DEBUG - 2020-06-29 10:57:23 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:57:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:57:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 10:57:23 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `post_image_thumbs` DESC
			 LIMIT 0, 10
DEBUG - 2020-06-29 10:57:26 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:57:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:57:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 10:57:26 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `post_image_thumbs` DESC
			 LIMIT 0, 10
DEBUG - 2020-06-29 10:57:43 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:57:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:57:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 10:57:43 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `post_image_thumbs` DESC
			 LIMIT 0, 10
DEBUG - 2020-06-29 10:57:47 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:57:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:57:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 10:57:47 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `post_image_thumbs` DESC
			 LIMIT 0, 10
DEBUG - 2020-06-29 10:58:29 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:58:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:58:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:58:29 --> Total execution time: 0.0333
DEBUG - 2020-06-29 10:58:37 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:58:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:58:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 10:58:37 --> Total execution time: 0.0356
DEBUG - 2020-06-29 10:58:39 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:58:39 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 10:58:39 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 10:58:44 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:58:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:58:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 10:58:44 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `post_image_thumbs` DESC
			 LIMIT 0, 10
DEBUG - 2020-06-29 10:58:50 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 10:58:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 10:58:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 10:58:50 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `post_image_thumbs` DESC
			 LIMIT 0, 10
DEBUG - 2020-06-29 11:00:13 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:00:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:00:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:00:34 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:00:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:00:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 11:00:34 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id,t.price,t.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product t LEFT JOIN tbl_post p ON p.id = t.post_id LEFT JOIN tbl_category c ON c.id = t.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%H%' OR p.`post_image_thumbs` LIKE '%H%' OR t.`post_title` LIKE '%H%' OR p.`price` LIKE '%H%' OR `post_status` LIKE '%H%')
			 ORDER BY `post_image_thumbs` DESC
			 LIMIT 0, 10
DEBUG - 2020-06-29 11:06:52 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:06:52 --> No URI present. Default controller set.
DEBUG - 2020-06-29 11:06:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:06:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 11:06:52 --> Could not find the language line "general_summary"
DEBUG - 2020-06-29 11:06:52 --> Total execution time: 0.0331
DEBUG - 2020-06-29 11:06:57 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:06:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:06:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:06:57 --> Total execution time: 0.0365
DEBUG - 2020-06-29 11:06:58 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:06:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:06:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:06:58 --> Total execution time: 0.0373
DEBUG - 2020-06-29 11:06:58 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:06:58 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 11:06:58 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 11:07:00 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:00 --> Total execution time: 0.0380
DEBUG - 2020-06-29 11:07:01 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:01 --> Total execution time: 0.0342
DEBUG - 2020-06-29 11:07:02 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:02 --> Total execution time: 0.0365
DEBUG - 2020-06-29 11:07:02 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:02 --> Total execution time: 0.0363
DEBUG - 2020-06-29 11:07:03 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:03 --> Total execution time: 0.0352
DEBUG - 2020-06-29 11:07:05 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:05 --> Total execution time: 0.0344
DEBUG - 2020-06-29 11:07:06 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:06 --> Total execution time: 0.0357
DEBUG - 2020-06-29 11:07:06 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:06 --> Total execution time: 0.0313
DEBUG - 2020-06-29 11:07:07 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:07 --> Total execution time: 0.0376
DEBUG - 2020-06-29 11:07:07 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:07 --> Total execution time: 0.0349
DEBUG - 2020-06-29 11:07:11 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:11 --> Total execution time: 0.0287
DEBUG - 2020-06-29 11:07:11 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:11 --> Total execution time: 0.0356
DEBUG - 2020-06-29 11:07:13 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:13 --> Total execution time: 0.0499
DEBUG - 2020-06-29 11:07:13 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:13 --> Total execution time: 0.0293
DEBUG - 2020-06-29 11:07:15 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:15 --> Total execution time: 0.0295
DEBUG - 2020-06-29 11:07:15 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:15 --> Total execution time: 0.0295
DEBUG - 2020-06-29 11:07:16 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:16 --> Total execution time: 0.0307
DEBUG - 2020-06-29 11:07:17 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:17 --> Total execution time: 0.0276
DEBUG - 2020-06-29 11:07:17 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:18 --> Total execution time: 0.0278
DEBUG - 2020-06-29 11:07:19 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:20 --> Total execution time: 0.1596
DEBUG - 2020-06-29 11:07:20 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:07:20 --> Total execution time: 0.0331
DEBUG - 2020-06-29 11:07:22 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 11:07:22 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id, pd.price, pd.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.product_id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product_featured t LEFT JOIN tbl_product pd ON pd.id= t.product_id LEFT JOIN tbl_post p ON p.id = pd.post_id LEFT JOIN tbl_category c ON c.id = pd.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%A%' OR p.`post_image_thumbs` LIKE '%A%' OR t.`post_title` LIKE '%A%' OR p.`price` LIKE '%A%' OR `post_status` LIKE '%A%')
			 ORDER BY `id` ASC
			 LIMIT 0, 10
DEBUG - 2020-06-29 11:07:26 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 11:07:26 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id, pd.price, pd.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.product_id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product_featured t LEFT JOIN tbl_product pd ON pd.id= t.product_id LEFT JOIN tbl_post p ON p.id = pd.post_id LEFT JOIN tbl_category c ON c.id = pd.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%Ac%' OR p.`post_image_thumbs` LIKE '%Ac%' OR t.`post_title` LIKE '%Ac%' OR p.`price` LIKE '%Ac%' OR `post_status` LIKE '%Ac%')
			 ORDER BY `id` ASC
			 LIMIT 0, 10
DEBUG - 2020-06-29 11:07:32 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:07:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:07:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 11:07:32 --> Query error: Unknown column 't.post_title' in 'where clause' - Invalid query: SELECT t.id, pd.price, pd.sku, p.post_title,p.post_image_thumbs,p.post_created_date,p.post_status,category.category_name,category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.product_id ORDER BY id DESC LIMIT 1 ) AS discount_price FROM tbl_product_featured t LEFT JOIN tbl_product pd ON pd.id= t.product_id LEFT JOIN tbl_post p ON p.id = pd.post_id LEFT JOIN tbl_category c ON c.id = pd.category_id LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id
			 WHERE (t.`id` LIKE '%Ac%' OR p.`post_image_thumbs` LIKE '%Ac%' OR t.`post_title` LIKE '%Ac%' OR p.`price` LIKE '%Ac%' OR `post_status` LIKE '%Ac%')
			 ORDER BY `id` ASC
			 LIMIT 0, 10
DEBUG - 2020-06-29 11:19:17 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:19:17 --> No URI present. Default controller set.
DEBUG - 2020-06-29 11:19:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:19:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 11:19:17 --> Could not find the language line "general_summary"
DEBUG - 2020-06-29 11:19:17 --> Total execution time: 0.0285
DEBUG - 2020-06-29 11:19:17 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:19:17 --> No URI present. Default controller set.
DEBUG - 2020-06-29 11:19:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:19:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 11:19:17 --> Could not find the language line "general_summary"
DEBUG - 2020-06-29 11:19:17 --> Total execution time: 0.0310
DEBUG - 2020-06-29 11:50:45 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:50:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:50:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:50:45 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:50:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:50:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:50:45 --> Total execution time: 0.0267
DEBUG - 2020-06-29 11:50:59 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:50:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:50:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:51:00 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:51:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:51:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 11:51:00 --> Could not find the language line "general_summary"
DEBUG - 2020-06-29 11:51:00 --> Total execution time: 0.0262
DEBUG - 2020-06-29 11:51:04 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:51:04 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 11:51:04 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 11:51:11 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:51:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:51:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:51:11 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:51:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:51:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:51:11 --> Total execution time: 0.0265
DEBUG - 2020-06-29 11:51:16 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:51:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:51:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:51:16 --> Total execution time: 0.0194
DEBUG - 2020-06-29 11:51:55 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:51:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:51:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 11:51:55 --> Could not find the language line "general_summary"
DEBUG - 2020-06-29 11:51:55 --> Total execution time: 0.0324
DEBUG - 2020-06-29 11:53:57 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:53:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:53:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:53:57 --> Total execution time: 0.0272
DEBUG - 2020-06-29 11:53:58 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 11:53:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 11:53:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 11:53:58 --> Total execution time: 0.0366
DEBUG - 2020-06-29 12:16:19 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 12:16:19 --> No URI present. Default controller set.
DEBUG - 2020-06-29 12:16:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 12:16:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 12:16:19 --> Could not find the language line "general_summary"
DEBUG - 2020-06-29 12:16:19 --> Total execution time: 0.0337
DEBUG - 2020-06-29 12:16:19 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 12:16:19 --> No URI present. Default controller set.
DEBUG - 2020-06-29 12:16:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 12:16:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 12:16:19 --> Could not find the language line "general_summary"
DEBUG - 2020-06-29 12:16:19 --> Total execution time: 0.0325
DEBUG - 2020-06-29 12:16:23 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 12:16:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 12:16:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 12:16:23 --> Total execution time: 0.0238
DEBUG - 2020-06-29 12:16:26 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 12:16:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 12:16:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 12:16:26 --> Total execution time: 0.0354
DEBUG - 2020-06-29 12:16:26 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 12:16:26 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 12:16:26 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 12:16:28 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 12:16:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 12:16:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 12:16:28 --> Total execution time: 0.0334
DEBUG - 2020-06-29 12:16:32 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 12:16:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 12:16:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 12:16:32 --> Total execution time: 0.0308
DEBUG - 2020-06-29 12:16:36 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 12:16:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 12:16:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 12:16:36 --> Total execution time: 0.0353
DEBUG - 2020-06-29 16:39:43 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 16:39:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 16:39:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 16:39:43 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 16:39:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 16:39:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 16:39:43 --> Total execution time: 0.0266
DEBUG - 2020-06-29 16:39:43 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 16:39:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 16:39:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 16:39:44 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 16:39:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 16:39:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 16:39:44 --> Total execution time: 0.0267
DEBUG - 2020-06-29 16:41:02 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 16:41:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 16:41:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 16:41:02 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 16:41:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 16:41:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 16:41:02 --> Could not find the language line "general_summary"
DEBUG - 2020-06-29 16:41:02 --> Total execution time: 0.0302
DEBUG - 2020-06-29 16:41:02 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 16:41:02 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 16:41:02 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 16:41:15 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 16:41:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 16:41:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 16:41:15 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 16:41:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 16:41:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 16:41:15 --> Could not find the language line "general_summary"
DEBUG - 2020-06-29 16:41:15 --> Total execution time: 0.0310
DEBUG - 2020-06-29 17:51:31 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 17:51:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 17:51:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 17:51:31 --> Total execution time: 0.0294
DEBUG - 2020-06-29 17:51:31 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 17:51:31 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 17:51:31 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 17:51:32 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 17:51:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 17:51:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 17:51:32 --> Total execution time: 0.0361
DEBUG - 2020-06-29 17:51:41 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 17:51:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 17:51:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 17:51:41 --> Total execution time: 0.0306
DEBUG - 2020-06-29 17:51:42 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 17:51:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 17:51:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 17:51:42 --> Total execution time: 0.0351
DEBUG - 2020-06-29 17:51:55 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 17:51:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 17:51:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 17:51:55 --> Total execution time: 0.0368
DEBUG - 2020-06-29 17:51:57 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 17:51:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 17:51:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 17:51:57 --> Total execution time: 0.0291
DEBUG - 2020-06-29 17:52:02 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 17:52:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 17:52:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 17:52:02 --> Total execution time: 0.0267
DEBUG - 2020-06-29 17:52:12 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 17:52:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 17:52:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 17:52:12 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 17:52:12 --> Total execution time: 0.0433
DEBUG - 2020-06-29 17:52:13 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 17:52:13 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 17:52:13 --> 404 Page Not Found: Product/favicon.ico
DEBUG - 2020-06-29 17:53:02 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 17:53:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 17:53:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 17:53:02 --> Total execution time: 0.0389
DEBUG - 2020-06-29 17:53:02 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 17:53:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 17:53:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 17:53:02 --> Total execution time: 0.0339
DEBUG - 2020-06-29 17:53:03 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 17:53:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 17:53:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 17:53:03 --> Total execution time: 0.0380
DEBUG - 2020-06-29 18:03:19 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:03:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:03:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:03:20 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:03:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:03:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:03:20 --> Total execution time: 0.0269
DEBUG - 2020-06-29 18:03:20 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:03:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 18:03:20 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 18:03:21 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:03:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:03:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:03:21 --> Total execution time: 0.0362
DEBUG - 2020-06-29 18:06:11 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:06:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:06:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:06:11 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:06:11 --> Total execution time: 0.0363
DEBUG - 2020-06-29 18:06:11 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:06:11 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 18:06:11 --> 404 Page Not Found: Product/favicon.ico
DEBUG - 2020-06-29 18:06:48 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:06:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:06:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:06:48 --> Total execution time: 0.0319
DEBUG - 2020-06-29 18:06:49 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:06:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:06:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:06:49 --> Total execution time: 0.0357
DEBUG - 2020-06-29 18:06:54 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:06:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:06:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:06:54 --> Total execution time: 0.0384
DEBUG - 2020-06-29 18:06:54 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:06:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:06:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:06:54 --> Total execution time: 0.0318
DEBUG - 2020-06-29 18:06:58 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:06:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:06:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:06:58 --> Total execution time: 0.0287
DEBUG - 2020-06-29 18:06:58 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:06:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:06:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:06:58 --> Total execution time: 0.0371
DEBUG - 2020-06-29 18:07:06 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:07:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:07:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:07:06 --> Total execution time: 0.0304
DEBUG - 2020-06-29 18:07:06 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:07:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:07:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:07:07 --> Total execution time: 0.0355
DEBUG - 2020-06-29 18:07:11 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:07:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:07:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:07:11 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:07:11 --> Total execution time: 0.0328
DEBUG - 2020-06-29 18:07:15 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:07:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:07:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:07:15 --> Total execution time: 0.0276
DEBUG - 2020-06-29 18:07:15 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:07:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:07:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:07:15 --> Total execution time: 0.0324
DEBUG - 2020-06-29 18:07:30 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:07:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:07:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:07:30 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:07:30 --> Total execution time: 0.0363
DEBUG - 2020-06-29 18:07:37 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:07:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:07:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:07:37 --> Total execution time: 0.0298
DEBUG - 2020-06-29 18:07:37 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:07:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:07:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:07:37 --> Total execution time: 0.0369
DEBUG - 2020-06-29 18:07:46 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:07:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:07:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:07:46 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:07:46 --> Total execution time: 0.0344
DEBUG - 2020-06-29 18:07:47 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:07:47 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 18:07:47 --> 404 Page Not Found: Product/favicon.ico
DEBUG - 2020-06-29 18:07:47 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:07:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:07:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:07:47 --> Total execution time: 0.0278
DEBUG - 2020-06-29 18:07:48 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:07:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:07:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:07:48 --> Total execution time: 0.0300
DEBUG - 2020-06-29 18:07:58 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:07:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:07:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:07:58 --> Total execution time: 0.0292
DEBUG - 2020-06-29 18:07:58 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:07:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:07:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:07:58 --> Total execution time: 0.0338
DEBUG - 2020-06-29 18:08:01 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:08:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:08:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:08:02 --> Total execution time: 0.0818
DEBUG - 2020-06-29 18:08:02 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:08:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:08:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:08:02 --> Total execution time: 0.0335
DEBUG - 2020-06-29 18:08:03 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:08:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:08:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:08:03 --> Total execution time: 0.0521
DEBUG - 2020-06-29 18:08:04 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:08:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:08:04 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:08:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:08:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:08:04 --> Total execution time: 0.0300
DEBUG - 2020-06-29 18:08:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:08:04 --> Could not find the language line "bestseller_product"
ERROR - 2020-06-29 18:08:04 --> Could not find the language line "bestseller_product"
DEBUG - 2020-06-29 18:08:04 --> Total execution time: 0.0773
DEBUG - 2020-06-29 18:08:05 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:08:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:08:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:08:05 --> Total execution time: 0.0331
DEBUG - 2020-06-29 18:08:10 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:08:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:08:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:08:10 --> Total execution time: 0.0305
DEBUG - 2020-06-29 18:08:10 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:08:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:08:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:08:10 --> Total execution time: 0.0355
DEBUG - 2020-06-29 18:08:24 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:08:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:08:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:08:24 --> Total execution time: 0.0353
DEBUG - 2020-06-29 18:08:25 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:08:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:08:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:08:25 --> Total execution time: 0.0357
DEBUG - 2020-06-29 18:08:26 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:08:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:08:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:08:26 --> Total execution time: 0.0331
DEBUG - 2020-06-29 18:08:31 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:08:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:08:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:08:31 --> Total execution time: 0.0359
DEBUG - 2020-06-29 18:09:13 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:09:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:09:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:09:13 --> Total execution time: 0.0287
DEBUG - 2020-06-29 18:09:15 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:09:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:09:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:09:15 --> Total execution time: 0.0276
DEBUG - 2020-06-29 18:09:18 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:09:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:09:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:09:18 --> Total execution time: 0.0284
DEBUG - 2020-06-29 18:09:18 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:09:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:09:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:09:18 --> Total execution time: 0.0311
DEBUG - 2020-06-29 18:09:19 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:09:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:09:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:09:19 --> Total execution time: 0.0180
DEBUG - 2020-06-29 18:09:19 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:09:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:09:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:09:19 --> Total execution time: 0.0323
DEBUG - 2020-06-29 18:09:24 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:09:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:09:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:09:24 --> Total execution time: 0.0252
DEBUG - 2020-06-29 18:09:25 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:09:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:09:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:09:25 --> Total execution time: 0.0263
DEBUG - 2020-06-29 18:12:41 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:12:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:12:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:12:41 --> Total execution time: 0.0754
DEBUG - 2020-06-29 18:12:42 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:12:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:12:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:12:42 --> Total execution time: 0.0295
DEBUG - 2020-06-29 18:12:45 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:12:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:12:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:12:45 --> Total execution time: 0.0237
DEBUG - 2020-06-29 18:12:47 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:12:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:12:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:12:47 --> Total execution time: 0.0272
DEBUG - 2020-06-29 18:12:49 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:12:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:12:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:12:49 --> Total execution time: 0.0288
DEBUG - 2020-06-29 18:12:53 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:12:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:12:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:12:53 --> Total execution time: 0.0350
DEBUG - 2020-06-29 18:13:09 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:13:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:13:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:13:09 --> Total execution time: 0.0364
DEBUG - 2020-06-29 18:13:13 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:13:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:13:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:13:13 --> Total execution time: 0.0345
DEBUG - 2020-06-29 18:19:07 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:19:07 --> No URI present. Default controller set.
DEBUG - 2020-06-29 18:19:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:19:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:19:07 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:19:07 --> No URI present. Default controller set.
DEBUG - 2020-06-29 18:19:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:19:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:19:07 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:19:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:19:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:19:07 --> Total execution time: 0.0171
DEBUG - 2020-06-29 18:19:07 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:19:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:19:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:19:07 --> Total execution time: 0.0165
DEBUG - 2020-06-29 18:19:13 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:19:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:19:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:19:13 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:19:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:19:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:19:13 --> Could not find the language line "general_summary"
DEBUG - 2020-06-29 18:19:13 --> Total execution time: 0.0297
DEBUG - 2020-06-29 18:19:16 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:19:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:19:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:19:16 --> Total execution time: 0.0301
DEBUG - 2020-06-29 18:19:18 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:19:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:19:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:19:18 --> Total execution time: 0.0349
DEBUG - 2020-06-29 18:19:21 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:19:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:19:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:19:21 --> Total execution time: 0.0407
DEBUG - 2020-06-29 18:19:25 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:19:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:19:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:19:25 --> Total execution time: 0.0275
DEBUG - 2020-06-29 18:19:31 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:19:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:19:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:19:31 --> Total execution time: 0.0369
DEBUG - 2020-06-29 18:20:06 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:20:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:20:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:20:06 --> Total execution time: 0.0322
DEBUG - 2020-06-29 18:20:07 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:20:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:20:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:20:07 --> Total execution time: 0.0380
DEBUG - 2020-06-29 18:20:09 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:20:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:20:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:20:09 --> Total execution time: 0.0375
DEBUG - 2020-06-29 18:20:09 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:20:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:20:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:20:09 --> Total execution time: 0.0366
DEBUG - 2020-06-29 18:20:10 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:20:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:20:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:20:10 --> Total execution time: 0.0362
DEBUG - 2020-06-29 18:20:13 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:20:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:20:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:20:13 --> Total execution time: 0.0356
DEBUG - 2020-06-29 18:20:14 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:20:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:20:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:20:14 --> Total execution time: 0.0282
DEBUG - 2020-06-29 18:20:18 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:20:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:20:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:20:18 --> Total execution time: 0.0349
DEBUG - 2020-06-29 18:20:21 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:20:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:20:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:20:21 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:20:21 --> Total execution time: 0.0304
DEBUG - 2020-06-29 18:20:21 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:20:21 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 18:20:21 --> 404 Page Not Found: Product/favicon.ico
DEBUG - 2020-06-29 18:20:41 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:20:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:20:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:20:41 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:20:41 --> Total execution time: 0.0338
DEBUG - 2020-06-29 18:21:41 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:21:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:21:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:21:41 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:21:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:21:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:21:41 --> Total execution time: 0.0268
DEBUG - 2020-06-29 18:21:41 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:21:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:21:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:21:42 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:21:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:21:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:21:42 --> Total execution time: 0.0199
DEBUG - 2020-06-29 18:22:07 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:22:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:22:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:22:07 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:22:07 --> Total execution time: 0.0350
DEBUG - 2020-06-29 18:22:11 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:22:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:22:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:22:11 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:22:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:22:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:22:11 --> Could not find the language line "general_summary"
DEBUG - 2020-06-29 18:22:11 --> Total execution time: 0.0252
DEBUG - 2020-06-29 18:22:12 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:22:12 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 18:22:12 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 18:22:31 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:22:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:22:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:22:31 --> Total execution time: 0.0319
DEBUG - 2020-06-29 18:22:32 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:22:32 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 18:22:32 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 18:22:32 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:22:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:22:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:22:32 --> Total execution time: 0.0365
DEBUG - 2020-06-29 18:23:31 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:23:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:23:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:23:31 --> Total execution time: 0.0330
DEBUG - 2020-06-29 18:23:32 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:23:32 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 18:23:32 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 18:23:32 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:23:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:23:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:23:32 --> Total execution time: 0.0360
DEBUG - 2020-06-29 18:24:24 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:24:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:24:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:24:24 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:24:24 --> Total execution time: 0.0359
DEBUG - 2020-06-29 18:25:49 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:25:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:25:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:25:49 --> Total execution time: 0.0318
DEBUG - 2020-06-29 18:25:50 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:25:50 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 18:25:50 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 18:25:50 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:25:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:25:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:25:50 --> Total execution time: 0.0340
DEBUG - 2020-06-29 18:26:06 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:26:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:26:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:26:06 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:26:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:26:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:26:06 --> Total execution time: 0.0253
DEBUG - 2020-06-29 18:26:13 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:26:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:26:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:26:13 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:26:13 --> Total execution time: 0.0378
DEBUG - 2020-06-29 18:26:24 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:26:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:26:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:26:24 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:26:24 --> Total execution time: 0.0356
DEBUG - 2020-06-29 18:29:51 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:29:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:29:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:29:51 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:29:51 --> Total execution time: 0.0335
DEBUG - 2020-06-29 18:29:54 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:29:54 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 18:29:54 --> 404 Page Not Found: Product/favicon.ico
DEBUG - 2020-06-29 18:30:07 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:30:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:30:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:30:07 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:30:07 --> Total execution time: 0.0345
DEBUG - 2020-06-29 18:30:25 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:30:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:30:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:30:25 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:30:25 --> Total execution time: 0.0354
DEBUG - 2020-06-29 18:30:41 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:30:41 --> No URI present. Default controller set.
DEBUG - 2020-06-29 18:30:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:30:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:30:41 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:30:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:30:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:30:41 --> Total execution time: 0.0215
DEBUG - 2020-06-29 18:30:42 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:30:42 --> No URI present. Default controller set.
DEBUG - 2020-06-29 18:30:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:30:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:30:42 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:30:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:30:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:30:42 --> Total execution time: 0.0267
DEBUG - 2020-06-29 18:30:46 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:30:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:30:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:30:46 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:30:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:30:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:30:46 --> Could not find the language line "general_summary"
DEBUG - 2020-06-29 18:30:46 --> Total execution time: 0.0263
DEBUG - 2020-06-29 18:30:47 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:30:47 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 18:30:47 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 18:30:51 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:30:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:30:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:30:51 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:30:51 --> Total execution time: 0.0351
DEBUG - 2020-06-29 18:31:02 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:31:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:31:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:31:02 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:31:02 --> Total execution time: 0.0363
DEBUG - 2020-06-29 18:35:06 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:35:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:35:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:35:06 --> Total execution time: 0.0323
DEBUG - 2020-06-29 18:35:06 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:35:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:35:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:35:07 --> Total execution time: 0.0353
DEBUG - 2020-06-29 18:35:07 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:35:07 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 18:35:07 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 18:35:08 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:35:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:35:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:35:08 --> Total execution time: 0.0297
DEBUG - 2020-06-29 18:35:08 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:35:08 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 18:35:08 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 18:35:08 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:35:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:35:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:35:08 --> Total execution time: 0.0301
DEBUG - 2020-06-29 18:40:39 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:40:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:40:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:40:39 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:40:39 --> Total execution time: 0.0366
DEBUG - 2020-06-29 18:40:42 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:40:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:40:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:40:42 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:40:42 --> Total execution time: 0.0201
DEBUG - 2020-06-29 18:40:43 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:40:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:40:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:40:43 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:40:43 --> Total execution time: 0.0261
DEBUG - 2020-06-29 18:40:43 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:40:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:40:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:40:43 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:40:43 --> Total execution time: 0.0348
DEBUG - 2020-06-29 18:40:43 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:40:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:40:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:40:43 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:40:43 --> Total execution time: 0.0340
DEBUG - 2020-06-29 18:40:44 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:40:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:40:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:40:44 --> Severity: Notice --> Trying to get property 'post_id' of non-object /home/excellen/public_html/admin/application/views/pages/product/js.php 381
DEBUG - 2020-06-29 18:40:44 --> Total execution time: 0.0334
DEBUG - 2020-06-29 18:41:14 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:41:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:41:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:41:14 --> Total execution time: 0.0339
DEBUG - 2020-06-29 18:41:17 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:41:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:41:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:41:17 --> Total execution time: 0.0341
DEBUG - 2020-06-29 18:42:31 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:42:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:42:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:42:31 --> Total execution time: 0.0327
DEBUG - 2020-06-29 18:42:31 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:42:31 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 18:42:31 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 18:42:31 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:42:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:42:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:42:31 --> Total execution time: 0.0336
DEBUG - 2020-06-29 18:42:33 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:42:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:42:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:42:33 --> Total execution time: 0.0351
DEBUG - 2020-06-29 18:42:33 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:42:33 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 18:42:33 --> 404 Page Not Found: Product/favicon.ico
DEBUG - 2020-06-29 18:42:34 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:42:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:42:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:42:34 --> Total execution time: 0.0298
DEBUG - 2020-06-29 18:42:35 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:42:35 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 18:42:35 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 18:42:35 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:42:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:42:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:42:35 --> Total execution time: 0.0370
DEBUG - 2020-06-29 18:42:42 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:42:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:42:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:42:42 --> Total execution time: 0.0366
DEBUG - 2020-06-29 18:43:09 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:43:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:43:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:43:09 --> Total execution time: 0.0381
DEBUG - 2020-06-29 18:43:09 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:43:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:43:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:43:09 --> Total execution time: 0.0315
DEBUG - 2020-06-29 18:47:07 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:47:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:47:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:47:08 --> Total execution time: 0.0365
DEBUG - 2020-06-29 18:47:08 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:47:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:47:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:47:08 --> Total execution time: 0.0339
DEBUG - 2020-06-29 18:49:45 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:49:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:49:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:49:46 --> Total execution time: 0.7569
DEBUG - 2020-06-29 18:49:50 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:49:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:49:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:49:51 --> Total execution time: 0.7756
DEBUG - 2020-06-29 18:49:54 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:49:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:49:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:49:55 --> Total execution time: 0.6668
DEBUG - 2020-06-29 18:49:57 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:49:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:49:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:49:58 --> Total execution time: 0.5364
DEBUG - 2020-06-29 18:50:14 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:50:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:50:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:50:14 --> Total execution time: 0.5949
DEBUG - 2020-06-29 18:50:19 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:50:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:50:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:50:19 --> Total execution time: 0.0329
DEBUG - 2020-06-29 18:58:23 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:58:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:58:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:58:23 --> Total execution time: 0.0318
DEBUG - 2020-06-29 18:58:25 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:58:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:58:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 18:58:25 --> Total execution time: 0.0327
DEBUG - 2020-06-29 18:58:28 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:58:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:58:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:58:28 --> Severity: Notice --> Undefined variable: imgb /home/excellen/public_html/admin/application/core/MY_Controller.php 41
ERROR - 2020-06-29 18:58:28 --> Severity: Notice --> Undefined variable: imgt /home/excellen/public_html/admin/application/core/MY_Controller.php 42
ERROR - 2020-06-29 18:58:28 --> Severity: Warning --> unlink(/home/excellen/public_html/): Is a directory /home/excellen/public_html/admin/application/core/MY_Controller.php 52
ERROR - 2020-06-29 18:58:28 --> Severity: Warning --> unlink(/home/excellen/public_html/): Is a directory /home/excellen/public_html/admin/application/core/MY_Controller.php 56
DEBUG - 2020-06-29 18:58:28 --> Total execution time: 0.0526
DEBUG - 2020-06-29 18:58:30 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 18:58:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 18:58:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 18:58:30 --> Severity: Notice --> Undefined variable: imgb /home/excellen/public_html/admin/application/core/MY_Controller.php 41
ERROR - 2020-06-29 18:58:30 --> Severity: Notice --> Undefined variable: imgt /home/excellen/public_html/admin/application/core/MY_Controller.php 42
ERROR - 2020-06-29 18:58:30 --> Severity: Warning --> unlink(/home/excellen/public_html/): Is a directory /home/excellen/public_html/admin/application/core/MY_Controller.php 52
ERROR - 2020-06-29 18:58:30 --> Severity: Warning --> unlink(/home/excellen/public_html/): Is a directory /home/excellen/public_html/admin/application/core/MY_Controller.php 56
DEBUG - 2020-06-29 18:58:30 --> Total execution time: 0.0314
DEBUG - 2020-06-29 19:00:22 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:00:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:00:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:00:22 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:00:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:00:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:00:22 --> Total execution time: 0.0303
DEBUG - 2020-06-29 19:00:22 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:00:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:00:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:00:22 --> Total execution time: 0.0367
DEBUG - 2020-06-29 19:01:28 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:01:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:01:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:01:28 --> Total execution time: 0.0376
DEBUG - 2020-06-29 19:01:31 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:01:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:01:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:01:32 --> Total execution time: 0.0355
DEBUG - 2020-06-29 19:01:32 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:01:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:01:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:01:32 --> Total execution time: 0.0320
DEBUG - 2020-06-29 19:02:17 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:02:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:02:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:02:18 --> Total execution time: 0.3825
DEBUG - 2020-06-29 19:03:20 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:03:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:03:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:03:20 --> Total execution time: 0.3252
DEBUG - 2020-06-29 19:44:35 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:44:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:44:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:44:35 --> Total execution time: 0.0365
DEBUG - 2020-06-29 19:44:37 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:44:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:44:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:44:37 --> Total execution time: 0.0376
DEBUG - 2020-06-29 19:44:37 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:44:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:44:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:44:37 --> Total execution time: 0.0315
DEBUG - 2020-06-29 19:44:47 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:44:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:44:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:44:47 --> Total execution time: 0.0310
DEBUG - 2020-06-29 19:44:47 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:44:47 --> Global POST, GET and COOKIE data sanitized
ERROR - 2020-06-29 19:44:47 --> 404 Page Not Found: Faviconico/index
DEBUG - 2020-06-29 19:44:47 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:44:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:44:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:44:47 --> Total execution time: 0.0370
DEBUG - 2020-06-29 19:45:26 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:45:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:45:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 19:45:26 --> Severity: Notice --> Undefined index: image_path /home/excellen/public_html/admin/application/controllers/Product.php 680
DEBUG - 2020-06-29 19:45:26 --> Total execution time: 0.0502
DEBUG - 2020-06-29 19:46:47 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:46:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:46:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:46:47 --> Total execution time: 0.0337
DEBUG - 2020-06-29 19:46:53 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:46:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:46:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 19:46:53 --> Severity: Notice --> Undefined variable: imgb /home/excellen/public_html/admin/application/core/MY_Controller.php 41
ERROR - 2020-06-29 19:46:53 --> Severity: Notice --> Undefined variable: imgt /home/excellen/public_html/admin/application/core/MY_Controller.php 42
ERROR - 2020-06-29 19:46:53 --> Severity: Warning --> unlink(/home/excellen/public_html/): Is a directory /home/excellen/public_html/admin/application/core/MY_Controller.php 52
ERROR - 2020-06-29 19:46:53 --> Severity: Warning --> unlink(/home/excellen/public_html/): Is a directory /home/excellen/public_html/admin/application/core/MY_Controller.php 56
DEBUG - 2020-06-29 19:46:53 --> Total execution time: 0.0327
DEBUG - 2020-06-29 19:46:56 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:46:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:46:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 19:46:56 --> Severity: Notice --> Undefined index: image_path /home/excellen/public_html/admin/application/controllers/Product.php 680
DEBUG - 2020-06-29 19:46:56 --> Total execution time: 0.0309
DEBUG - 2020-06-29 19:47:18 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:47:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:47:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:47:18 --> Total execution time: 0.0320
DEBUG - 2020-06-29 19:47:19 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:47:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:47:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:47:19 --> Total execution time: 0.0372
DEBUG - 2020-06-29 19:47:25 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:47:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:47:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:47:25 --> Total execution time: 0.0346
DEBUG - 2020-06-29 19:47:37 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:47:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:47:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:47:37 --> Total execution time: 0.0378
DEBUG - 2020-06-29 19:47:42 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:47:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:47:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:47:42 --> Total execution time: 0.0379
DEBUG - 2020-06-29 19:47:42 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:47:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:47:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:47:42 --> Total execution time: 0.0316
DEBUG - 2020-06-29 19:48:03 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:48:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:48:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 19:48:03 --> Severity: Notice --> Undefined index: image_path /home/excellen/public_html/admin/application/controllers/Product.php 680
DEBUG - 2020-06-29 19:48:03 --> Total execution time: 0.0397
DEBUG - 2020-06-29 19:48:12 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:48:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:48:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:48:12 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:48:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:48:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:48:12 --> Total execution time: 0.0289
DEBUG - 2020-06-29 19:48:12 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:48:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:48:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:48:12 --> Total execution time: 0.0368
DEBUG - 2020-06-29 19:48:35 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:48:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:48:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:48:35 --> Total execution time: 0.0370
DEBUG - 2020-06-29 19:48:35 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:48:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:48:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:48:35 --> Total execution time: 0.0313
DEBUG - 2020-06-29 19:48:58 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:48:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:48:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 19:48:58 --> Severity: Notice --> Undefined index: image_path /home/excellen/public_html/admin/application/controllers/Product.php 680
DEBUG - 2020-06-29 19:48:58 --> Total execution time: 0.0374
DEBUG - 2020-06-29 19:49:04 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:49:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:49:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:49:04 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:49:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:49:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:49:04 --> Total execution time: 0.0244
DEBUG - 2020-06-29 19:49:04 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:49:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:49:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:49:04 --> Total execution time: 0.0358
DEBUG - 2020-06-29 19:49:21 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:49:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:49:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:49:21 --> Total execution time: 0.0348
DEBUG - 2020-06-29 19:49:22 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:49:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:49:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:49:22 --> Total execution time: 0.0310
DEBUG - 2020-06-29 19:49:38 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:49:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:49:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2020-06-29 19:49:38 --> Severity: Notice --> Undefined index: image_path /home/excellen/public_html/admin/application/controllers/Product.php 680
DEBUG - 2020-06-29 19:49:38 --> Total execution time: 0.0350
DEBUG - 2020-06-29 19:53:53 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 19:53:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 19:53:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 19:53:53 --> Total execution time: 0.0394
DEBUG - 2020-06-29 20:05:48 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 20:05:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 20:05:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 20:05:48 --> Total execution time: 0.0268
DEBUG - 2020-06-29 20:06:12 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 20:06:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 20:06:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 20:06:12 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 20:06:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 20:06:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 20:06:12 --> Total execution time: 0.0274
DEBUG - 2020-06-29 20:06:12 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 20:06:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 20:06:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 20:06:12 --> Total execution time: 0.0372
DEBUG - 2020-06-29 20:07:05 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 20:07:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 20:07:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 20:07:05 --> Total execution time: 0.0362
DEBUG - 2020-06-29 20:07:06 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 20:07:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 20:07:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 20:07:06 --> Total execution time: 0.0314
DEBUG - 2020-06-29 20:07:29 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 20:07:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 20:07:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 20:07:30 --> Total execution time: 0.3086
DEBUG - 2020-06-29 20:07:48 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 20:07:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 20:07:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 20:07:49 --> Total execution time: 0.2902
DEBUG - 2020-06-29 20:10:32 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 20:10:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 20:10:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 20:10:32 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 20:10:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 20:10:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 20:10:32 --> Total execution time: 0.0307
DEBUG - 2020-06-29 20:10:32 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 20:10:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 20:10:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 20:10:32 --> Total execution time: 0.0307
DEBUG - 2020-06-29 21:03:30 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:03:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:03:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:03:30 --> Total execution time: 0.0324
DEBUG - 2020-06-29 21:03:31 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:03:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:03:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:03:31 --> Total execution time: 0.0366
DEBUG - 2020-06-29 21:03:44 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:03:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:03:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:03:44 --> Total execution time: 0.0330
DEBUG - 2020-06-29 21:03:44 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:03:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:03:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:03:44 --> Total execution time: 0.0356
DEBUG - 2020-06-29 21:03:48 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:03:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:03:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:03:48 --> Total execution time: 0.0293
DEBUG - 2020-06-29 21:03:48 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:03:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:03:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:03:48 --> Total execution time: 0.0353
DEBUG - 2020-06-29 21:03:58 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:03:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:03:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:03:58 --> Total execution time: 0.0290
DEBUG - 2020-06-29 21:03:59 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:03:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:03:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:03:59 --> Total execution time: 0.0362
DEBUG - 2020-06-29 21:07:57 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:07:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:07:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:07:57 --> Total execution time: 0.0318
DEBUG - 2020-06-29 21:07:57 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:07:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:07:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:07:57 --> Total execution time: 0.0318
DEBUG - 2020-06-29 21:08:01 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:08:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:08:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:08:01 --> Total execution time: 0.0385
DEBUG - 2020-06-29 21:08:01 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:08:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:08:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:08:01 --> Total execution time: 0.0316
DEBUG - 2020-06-29 21:08:05 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:08:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:08:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:08:05 --> Total execution time: 0.0304
DEBUG - 2020-06-29 21:08:05 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:08:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:08:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:08:05 --> Total execution time: 0.0356
DEBUG - 2020-06-29 21:08:24 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:08:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:08:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:08:24 --> Total execution time: 0.0387
DEBUG - 2020-06-29 21:08:24 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:08:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:08:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:08:24 --> Total execution time: 0.0307
DEBUG - 2020-06-29 21:08:45 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:08:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:08:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:08:45 --> Total execution time: 0.0467
DEBUG - 2020-06-29 21:09:05 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:09:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:09:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:09:05 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:09:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:09:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:09:05 --> Total execution time: 0.0305
DEBUG - 2020-06-29 21:09:05 --> UTF-8 Support Enabled
DEBUG - 2020-06-29 21:09:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2020-06-29 21:09:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2020-06-29 21:09:05 --> Total execution time: 0.0367
