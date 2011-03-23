<?php
/**
 * Main dispatch page
 */
require_once dirname(__FILE__) . '/app/lib/base.php';

$request = $GLOBALS['injector']->getInstance('Horde_Controller_Request');
$runner = $injector->getInstance('Horde_Controller_Runner');

$_root = ltrim(dirname($_SERVER['PHP_SELF']), '/');
$mapper = $GLOBALS['injector']->getInstance('Horde_Routes_Mapper');

/* Routes */
$mapper->connect('home', $_root . '/', array('controller' => 'home'));

/* Community */
$mapper->connect('community', $_root . '/community/:action', array('controller' => 'community', 'action' => 'index'));
$mapper->connect('localization', $_root . '/community/localization', array('controller' => 'community', 'action' => 'localization'));
$mapper->connect('team', $_root . '/community/team', array('controller' => 'community', 'action' => 'team'));

/* Support */
$mapper->connect('support', $_root . '/support/:action', array('controller' => 'support', 'action' => 'index'));

/* Apps */
$mapper->connect('apps', $_root . '/apps', array('controller' => 'app'));
$mapper->connect('app', $_root . '/apps/:app/:action', array('controller' => 'app', 'action' => 'app'));
$mapper->connect($_root . '/apps/:app/screenshot', array('controller' => 'app', 'action' => 'screenshot'));

/* Development */
$mapper->connect('development', $_root . '/development/:action', array('controller' => 'development', 'action' => 'index'));

/* Services */
$mapper->connect('services', $_root . '/services/:action', array('controller' => 'services', 'action' => 'index'));

/* Downloads */
$mapper->connect(
    'download', $_root . '/download', array('controller' => 'download', 'action' => 'index'));
$mapper->connect(
    $_root . '/download/:app', array('controller' => 'download', 'action' => 'app'));

/* Contact */
$mapper->connect(
    $_root . '/contact/:action', array('controller' => 'contact', 'action' => 'index'));

$path = $request->getPath();
if (($pos = strpos($path, '?')) !== false) {
    $path = substr($path, 0, $pos);
}
if (!$path) $path = '/';
$match = $mapper->match($path);
$config = new Horde_Core_Controller_RequestConfiguration();
if (empty($match['controller']) || !class_exists('HordeWeb_' . ucfirst($match['controller']) . '_Controller')) {
    $match['controller'] = 'home';
}
$config->setControllerName('HordeWeb_' . ucfirst($match['controller']) . '_Controller');
$response = $runner->execute($injector, $request, $config);
$responseWriter = $injector->getInstance('Horde_Controller_ResponseWriter');
$responseWriter->writeResponse($response);
