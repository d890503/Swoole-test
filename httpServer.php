<?php

    $http = new swoole_http_server("0.0.0.0", 9501);

    $http->on('request', function (\Swoole\Http\Request $request, \Swoole\Http\Response $response) {
        list($controller, $action) = explode('/', trim($request->server['request_uri'], '/'));
        (new $controller)->$action($request, $response);
//        $response->end("<pre>".print_r($request->server)."</pre>");
    });

    $http->start();
