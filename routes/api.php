<?php

$app->get('/', function () use ($app) {
    return response()->json([
        'err' => 403,
        'msg' => 'Forbidden',
    ], 403);
});

$app->get('/test_i18n', 'TestController@test_i18n');