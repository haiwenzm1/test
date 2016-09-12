<?php
return array(

	/* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'ecshop',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123456',          // 密码
    'DB_PORT'               =>  '',        // 端口
    'DB_PREFIX'             =>  'ec_',    // 数据库表前缀

    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__IMG__'    => __ROOT__ . '/Public/Images/' . MODULE_NAME,
        '__CSS__'    => __ROOT__ . '/Public/Stylesheet/' . MODULE_NAME,
        '__JS__'     => __ROOT__ . '/Public/Javascript/' . MODULE_NAME
    ),

    'SHOW_PAGE_TRACE' => false
);