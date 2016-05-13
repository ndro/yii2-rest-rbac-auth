<?php
/**
 * Created by IntelliJ IDEA.
 * User: ndro
 * Date: 13/05/16
 * Time: 9:58
 */

$params = require (__DIR__ . '/params.php');

$config = [
    'id' => 'api',
    'basePath' => dirname(__DIR__).'/..',
    'bootstrap' => ['log'],
    'components' => [
        // URL Configuration for our API
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'v1/user'
                    ],
                ]
            ],
        ],
        'request' => [
            // Set Parser to JsonParser to accept Json in request
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // Set this enable authentication in our API
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false, //Don't forget to set Auto
        ],
        // Enable logging for API in a api Directory different than web directory
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning' ],
                    // maintain api logs in api directory
                    'logFile' => '@api/runtime/logs/error.log'
                ],
            ],
        ],
        'db' => require (__DIR__. '/../../config/db.php'),
    ],
    'modules' => [
        'v1' => [
            'basePath' => '@app/api/modules/v1',    // base path for our module class
            'class' => 'app\api\modules\v1\Api',    // Path to module class
        ]
    ],
    'params' => $params,
];

return $config;
