<?php
$useApi = import('nexit/useApi');

$export = function () use ($useApi) {
    // for api 
    if ($useApi()) return json_encode([
        'status' => 404,
        'message' => 'not found'
    ]);

    return <<<HTML
    <div>
        <h1>Not found this page</h1>
    </div>
    HTML;
};
