<?php

define('PUBLIC_DIR',str_replace("\\","/",dirname(__FILE__)));

/* Sample Config Settings */
$config = [
    'environments' => [
        'local'=>[
            'error_reporting' =>E_ALL,
            'http_hosts' => [],
            'public_paths'=>[]
        ],
        'development'=>[
            'error_reporting' =>E_ALL,
            'http_hosts' => [],
            'public_paths'=>[]
        ],
        'staging'=>[
            'error_reporting' =>0,
            'http_hosts' => [],
            'public_paths'=>[]
        ],
        'production'=>[
            'error_reporting' =>0,
            'http_hosts' => [],
            'public_paths'=>[]
        ]
    ]
];

$wp_settings_file = str_replace("\\","/",realpath(PUBLIC_DIR."/../wp-config.settings"));

if(!@file_exists($wp_settings_file)) {
    exit('The application environment settings file is missing or unreadable.');
}

require_once($wp_settings_file);

if(!isset($config['environments'])) {
    exit('The application environment settings are in an unexpected format.');
}

if(!defined('IS_CLI'))
{
    define("IS_CLI",(php_sapi_name()==="cli"||defined('STDIN'))?true:false);
}

define('VENDOR_DIR',str_replace("\\","/",realpath(PUBLIC_DIR."/../vendor")));

if(IS_CLI)
{
    foreach($config['environments'] as $e) {

        if(!isset($p['public_paths'])||!isset($p['http_hosts'])||!is_array($p['public_paths'])||!is_array($p['http_hosts'])) {
            continue;
        }

        foreach($e['public_paths'] as $p) {
            if(strtolower(PUBLIC_DIR)===strtolower($p)) {
                $_SERVER['HTTP_HOST'] = ($e['http_hosts']) ? $e['http_hosts'][0] : "";
                break 2;
            }
        }

    }

    if(!isset($_SERVER['HTTP_HOST'])||!$_SERVER['HTTP_HOST']) {
        exit('The application environment is not set correctly.');
    }
}

if(!defined('ENVIRONMENT'))
{
    foreach($config['environments'] as $environment => $e) {

        if(!isset($e['http_hosts'])) {
            continue;
        }

        foreach($e['http_hosts'] as $h) {
            if(strtolower($h)===strtolower($_SERVER['HTTP_HOST'])) {
                define('ENVIRONMENT',$environment);
                break 2;
            }
        }

    }

    if(!defined('ENVIRONMENT')) {
        exit('The application environment is not set correctly.');
    }

}

error_reporting($config['environments'][ENVIRONMENT]['error_reporting']);

$wp_config_file = str_replace("\\","/",realpath(PUBLIC_DIR."/../wp-config.".ENVIRONMENT));

if(!@file_exists($wp_config_file)) {
    exit('The application environment configuration file is missing or unreadable.');
}

require_once($wp_config_file);