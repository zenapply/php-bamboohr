<?php

namespace Zenapply\HRIS\BambooHR;

use Exceptions\BambooHRException;
use BambooHR\API\BambooAPI as BambooHrClient;

class BambooHR extends BambooHrClient
{
	/**
	 *
	 *
	 * @param string     $companyDomain Either the subdomain of a BambooHR account ("example.bamboohr.com" => "example") or the full domain ("example.bamboohr.com")
	 * @param BambooHTTP $http          The underlying object used for communicating with the API, defaults to an instance of BambooCurlHTTP
	 * @param string     $baseUrl       The base API url, defaults to https://api.bamboohr.com/api/gateway.php
	 */
	function __construct($companyDomain, BambooHTTP $http=null, $baseUrl=null) {
        $this->httpHandler = $http ?: new BambooCurlHTTP();
        parent::__construct($companyDomain, $http, $baseUrl);
	}
}