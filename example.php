<?php

use Andig\GrafanaSerializer\Model\Dashboard;
use Andig\GrafanaSerializer\Model\Dimensions;
use Andig\GrafanaSerializer\Model\Panel;
use Andig\GrafanaSerializer\Model\Target;

use Andig\GrafanaSerializer\Request\CreateUpdateDashboard;
use Andig\GrafanaSerializer\Response\SearchDashboardsAndFolders;
use Andig\GrafanaSerializer\Response\GetDashboard;

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/config.php');

const DEFAULT_API = 'http://localhost:3000/api';

/*
 * Build dashboard
 */
function createDashboard(): Dashboard
{
    // additional json data as understood by gravo datasource
    $jsonData = json_encode([
        'tuples' => 1000,
    ]);

    $db = new Dashboard('testing', ['volkszaehler']);
    $db->setTime(Dashboard::TIME_FROM, date_sub(date_create(), date_interval_create_from_date_string("1 year")));
    $db->setTime(Dashboard::TIME_TO, date_create());

    $panel = new Panel('Panel 1', Panel::TYPE_GRAPH);
    $panel->datasource = 'gravo';
    $panel->gridPos = new Dimensions(0, 0, 20, 10);

    $target = new Target("0f746430-d39e-11e7-9f92-2f38b410ecdc");
    $target->data = $jsonData;

    $target2 = new Target("f15103a0-ba14-11e6-a769-9308aecc2cf7");
    $target2->data = $jsonData;

    $db->panels = [$panel];
    $panel->targets = [$target, $target2];

    return $db;
}

/*
 * Create grafana dashboard
 */
function create(ClientInterface $client, string $apiUri = DEFAULT_API)
{
    $dashboard = createDashboard();
    $request = new CreateUpdateDashboard($dashboard);
    $request->overwrite = true;

    $serializer = SerializerBuilder::create()->build();
    $json = $serializer->serialize($request, 'json');
    echo $json;

    $url = sprintf('%s/dashboards/db', rtrim($apiUri, '/'));
    $resp = $client->request('POST', $url, ['body' => $json]);
    $json = (string)$resp->getBody();
    echo PHP_EOL. $json;
}

/*
 * Search grafana dashboard
 */
function search(ClientInterface $client, string $apiUri = DEFAULT_API)
{
    $url = sprintf('%s/search', rtrim($apiUri, '/'));
    $resp = $client->request('GET', $url);
    $json = (string)$resp->getBody();
    echo PHP_EOL. $json;
    
    $serializer = SerializerBuilder::create()->build();
    $res = $serializer->deserialize($json, sprintf('array<%s>', SearchDashboardsAndFolders::class), 'json');
    print_r($res);
}

/*
 * Show grafana dashboard
 */
function show(ClientInterface $client, string $apiUri = DEFAULT_API, string $uid)
{
    $url = sprintf('%s/dashboards/uid/%s', rtrim($apiUri, '/'), $uid);
    $resp = $client->request('GET', $url);
    $json = (string)$resp->getBody();
    echo PHP_EOL. $json;
    
    $serializer = SerializerBuilder::create()->build();
    $res = $serializer->deserialize($json, GetDashboard::class, 'json');
    print_r($res);
}

/*
 * Setup serializer
 */
AnnotationRegistry::registerLoader('class_exists');

$client = new Client(['headers' => [
    'Authorization' => 'Bearer ' . $apiKey,
    'Content-type' => 'application/json',
]]);

search($client, $apiUri);
create($client, $apiUri);
show($client, $apiUri, 'YesC1MFiz');
