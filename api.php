<?php

$app->on('cockpit.rest.init', function ($routes) {
  $routes['venues'] = 'Rezdy\\Controller\\VenuesApi';
});