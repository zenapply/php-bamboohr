<?php

namespace Zenapply\HRIS\BambooHR;

use BambooHR\API\BambooCurlHTTP as BaseBambooCurlHTTP;
use BambooHR\API\BambooHTTPRequest;
use Exceptions\BambooHRException;

/**
 * BambooCurlHTTP
 * @package BambooHR
 */
class BambooCurlHTTP extends BaseBambooCurlHTTP {


	/**
	 * Perform the request described by the BambooHTTPRequest. Return a
	 * BambooHTTPResponse describing the response.
	 *
	 * @param \BambooHR\API\BambooHTTPRequest $request the object representing the request
	 * @return \BambooHR\API\BambooHTTPResponse
	 */
	function sendRequest(BambooHTTPRequest $request) {
        $response = parent::sendRequest($request);

        if ($response->isError()) {
            $error = [];
            $error[] = $response->statusCode;
            $error[] = "BambooHR Error";
            $error[] = $response->getErrorMessage();
            throw new BambooHRException(implode(" - ", $error), 1);
        }

        return $response;
	}
}
