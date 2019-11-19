<?php

$app->on('cockpit.rest.init', function ($routes) {
  $routes['venues'] = 'Foursquare\\Controller\\VenuesApi';
});