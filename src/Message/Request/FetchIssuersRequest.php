<?php
/**
 * Created by PhpStorm.
 * User: andypieters
 * Date: 25/09/2018
 * Time: 15:40
 */

namespace Omnipay\Paynl\Message\Request;

use Omnipay\Paynl\Message\Response\FetchIssuersResponse;

/**
 * Class FetchIssuersRequest
 * @package Omnipay\Paynl\Message\Request
 *
 * @method FetchIssuersResponse send()
 */
class FetchIssuersRequest extends AbstractPaynlRequest
{
    public function getData()
    {
        $this->validate('tokenCode', 'apiToken');
    }

    public function sendData($data)
    {
        $responseData = $this->sendRequest('getBanks');

        return $this->response = new FetchIssuersResponse($this, $responseData);
    }
}