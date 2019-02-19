<?php

namespace Omnipay\Paynl\Message\Response;


use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Paynl\Message\Request\AbstractPaynlRequest;

abstract class AbstractPaynlResponse extends AbstractResponse
{
    /**
     * @var AbstractPaynlRequest
     */
    protected $request;

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        if($this->data['request']['result'] == 1){
            if($this->data['paymentDetails']['state'] == 100){
                return true;
            }
        }
        return false;
    }

    /**
     * @return null|string The error message
     */
    public function getMessage()
    {
        return isset($this->data['request']['errorMessage']) && !empty($this->data['request']['errorMessage']) ? $this->data['request']['errorMessage'] : null;
    }

}
