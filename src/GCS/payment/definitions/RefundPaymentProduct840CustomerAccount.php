<?php
class GCS_payment_definitions_RefundPaymentProduct840CustomerAccount extends GCS_DataObject
{
    /**
     * @var string
     */
    public $customerAccountStatus = null;

    /**
     * @var string
     */
    public $customerAddressStatus = null;

    /**
     * @var string
     */
    public $payerId = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'customerAccountStatus')) {
            $this->customerAccountStatus = $object->customerAccountStatus;
        }
        if (property_exists($object, 'customerAddressStatus')) {
            $this->customerAddressStatus = $object->customerAddressStatus;
        }
        if (property_exists($object, 'payerId')) {
            $this->payerId = $object->payerId;
        }
        return $this;
    }
}
