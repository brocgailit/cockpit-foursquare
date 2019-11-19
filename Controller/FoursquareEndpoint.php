<?php

namespace Foursquare\Controller;

use GuzzleHttp\Client;

class FoursquareEndpoint {
	public $client_id;
	public $client_secret;
	private $client;

	public function __construct($base_uri, $options) {
		$this->client_id = $options->client_id;
		$this->client_secret = $options->client_secret;
		$this->client = new Client([
			'base_uri' => $base_uri
		]);
	}

	public function query($endpoint = '', $options = []) {
		$res = $this->client->request('GET', $endpoint, [
			'query' => array_merge([
				'v' => '20190112',
				'client_id' => $this->client_id,
				'client_secret' => $this->client_secret
			], $options)
		]);
		return json_decode($res->getBody());
	}

	public function renderResponse($res, $return_fn) {

		$this->client_id;

		$status = $res->requestStatus;

		if ( !$status->success ) {
			return $status;		
		}

		return $return_fn($res);
	}

}

?>