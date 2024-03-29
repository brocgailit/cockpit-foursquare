<?php

namespace Foursquare\Controller;

use \LimeExtra\Controller;
use Foursquare\Controller\FoursquareEndpoint;

class VenuesApi extends Controller {
	private $foursquare;

	public function __construct($options) {
		parent::__construct($options);
        $this->foursquare = new FoursquareEndpoint(
			'https://api.foursquare.com/v2/venues/',
			$this->app['config']['foursquare']
		);
	}

    public function index() {

		$res = $this->foursquare->query('search', [
			'limit' => $this->app->param('limit') ?: 100,
			'query' => $this->app->param('query') ?: '',
			'near' => $this->app->param('near') ?: 'San Francisco, CA',
			'intent' => 'checkin'
		]);

		return $this->foursquare->renderResponse($res, function($res) {
			return $res->response;
		});
	}
	
	public function venue($id) {
		if (empty($id)) {
			return ['error' => 'You must provide a product code.'];
		}

		$res = $this->foursquare->query($id);

		return $this->foursquare->renderResponse($res, function($res) {
			return $res->response;
		});
	}

}

?>