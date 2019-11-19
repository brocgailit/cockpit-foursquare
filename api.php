<?php

$app->on('cockpit.rest.init', function ($routes) {
  $routes['foursquare'] = 'Foursquare\\Controller\\VenuesApi';
});