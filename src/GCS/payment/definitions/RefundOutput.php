<?php
class GCS_payment_definitions_RefundOutput extends GCS_payment_definitions_OrderOutput
{
    /**
     * @var int
     */
    public $amountPaid = null;

    /**
     * @var GCS_payment_definitions_RefundBankMethodSpecificOutput
     */
    public $bankRefundMethodSpecificOutput = null;

    /**
     * @var GCS_payment_definitions_RefundCardMethodSpecificOutput
     */
    public $cardRefundMethodSpecificOutput = null;

    /**
     * @var GCS_payment_definitions_RefundEWalletMethodSpecificOutput
     */
    public $eWalletRefundMethodSpecificOutput = null;

    /**
     * @var string
     */
    public $paymentMethod = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'amountPaid')) {
            $this->amountPaid = $object->amountPaid;
        }
        if (property_exists($object, 'bankRefundMethodSpecificOutput')) {
            if (!is_object($object->bankRefundMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankRefundMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_RefundBankMethodSpecificOutput();
            $this->bankRefundMethodSpecificOutput = $value->fromObject($object->bankRefundMethodSpecificOutput);
        }
        if (property_exists($object, 'cardRefundMethodSpecificOutput')) {
            if (!is_object($object->cardRefundMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cardRefundMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_RefundCardMethodSpecificOutput();
            $this->cardRefundMethodSpecificOutput = $value->fromObject($object->cardRefundMethodSpecificOutput);
        }
        if (property_exists($object, 'eWalletRefundMethodSpecificOutput')) {
            if (!is_object($object->eWalletRefundMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->eWalletRefundMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_RefundEWalletMethodSpecificOutput();
            $this->eWalletRefundMethodSpecificOutput = $value->fromObject($object->eWalletRefundMethodSpecificOutput);
        }
        if (property_exists($object, 'paymentMethod')) {
            $this->paymentMethod = $object->paymentMethod;
        }
        return $this;
    }
}
