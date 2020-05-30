<?php
require_once('vendor/autoload.php');
if (!session_id()) {
    session_start();
}
$facebook = new \Facebook\Facebook([
    'app_id' => '610126246246207',
    'app_sercet' => '2bf86cd37c19e1f60e38b40ff672059c',
    'default_graph_version' => 'v2.10'
]);
