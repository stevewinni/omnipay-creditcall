<?php

namespace Omnipay\Creditcall;

use Omnipay\Common\AbstractGateway;

/**
 * Creditcall Gateway
 */
class Gateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Creditcall';
    }

    /**
     * @return array
     */
    public function getDefaultParameters()
    {
        return array(
            'terminalId'     => '',
            'transactionKey' => '',
            'testMode'       => false,
            'verifyCvv'      => true,
            'verifyAddress'  => false,
            'verifyZip'      => false,
        );
    }

    /**
     * @return string
     */
    public function getTerminalId()
    {
        return $this->getParameter('terminalId');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setTerminalId($value)
    {
        return $this->setParameter('terminalId', $value);
    }

    /**
     * @return string
     */
    public function getTransactionKey()
    {
        return $this->getParameter('transactionKey');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setTransactionKey($value)
    {
        return $this->setParameter('transactionKey', $value);
    }

    /**
     * @return bool
     */
    public function getVerifyCvv()
    {
        return $this->getParameter('verifyCvv');
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function setVerifyCvv($value)
    {
        return $this->setParameter('verifyCvv', $value);
    }

    /**
     * @return string
     */
    public function getVerifyAddress()
    {
        return $this->getParameter('verifyAddress');
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function setVerifyAddress($value)
    {
        return $this->setParameter('verifyAddress', $value);
    }

    /**
     * @return bool
     */
    public function getVerifyZip()
    {
        return $this->getParameter('verifyZip');
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function setVerifyZip($value)
    {
        return $this->setParameter('verifyZip', $value);
    }

    /**
     * @param array $parameters
     * @return Message\AuthorizeRequest
     */
    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Creditcall\Message\AuthorizeRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return Message\CaptureRequest
     */
    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Creditcall\Message\CaptureRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return Message\PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Creditcall\Message\PurchaseRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return Message\VoidRequest
     */
    public function void(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Creditcall\Message\VoidRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return Message\RefundRequest
     */
    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Creditcall\Message\RefundRequest', $parameters);
    }


    /**
     * Create Card.
     *
     * This call can be used to create a new customer or add a card
     * to an existing customer.  If a customerReference is passed in then
     * a card is added to an existing customer.  If there is no
     * customerReference passed in then a new customer is created.  The
     * response in that case will then contain both a customer token
     * and a card token, and is essentially the same as CreateCustomerRequest
     *
     * @param array $parameters
     *
     * @return \Omnipay\Creditcall\Message\CreateCardRequest
     */
    public function createCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Creditcall\Message\CreateCardRequest', $parameters);
    }

    /**
     * Update Card.
     *
     * If you need to update only some card details, like the billing
     * address or expiration date, you can do so without having to re-enter
     * the full card details. Creditcall also works directly with card networks
     * so that your customers can continue using your service without
     * interruption.
     *
     * When you update a card, Creditcall will automatically validate the card.
     *
     * This requires both a customerReference and a cardReference.
     * @param array $parameters
     *
     * @return \Omnipay\Creditcall\Message\UpdateCardRequest
     */
    public function updateCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Creditcall\Message\UpdateCardRequest', $parameters);
    }

    /**
     * Delete a card.
     *
     * This is normally used to delete a credit card from an existing
     * customer.
     *
     * You can delete cards from a customer or recipient. If you delete a
     * card that is currently the default card on a customer or recipient,
     * the most recently added card will be used as the new default. If you
     * delete the last remaining card on a customer or recipient, the
     * default_card attribute on the card's owner will become null.
     *
     * Note that for cards belonging to customers, you may want to prevent
     * customers on paid subscriptions from deleting all cards on file so
     * that there is at least one default card for the next invoice payment
     * attempt.
     *
     * In deference to the previous incarnation of this gateway, where
     * all CreateCard requests added a new customer and the customer ID
     * was used as the card ID, if a cardReference is passed in but no
     * customerReference then we assume that the cardReference is in fact
     * a customerReference and delete the customer.  This might be
     * dangerous but it's the best way to ensure backwards compatibility.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Creditcall\Message\DeleteCardRequest
     */
    public function deleteCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Creditcall\Message\DeleteCardRequest', $parameters);
    }

}
