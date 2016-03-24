<?php
namespace GCS\Refund;

use GCS\DataObject;
use GCS\Errors\Definitions\APIError;

/**
 * Class RefundErrorResponse
 *
 * @package GCS\Refund
 */
class RefundErrorResponse extends DataObject
{
    /**
     * @var string
     */
    public $errorId = null;

    /**
     * @var APIError[]
     */
    public $errors = null;

    /**
     * @var Definitions\RefundResult
     */
    public $refundResult = null;

    /**
     * @param object $object
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'errorId')) {
            $this->errorId = $object->errorId;
        }
        if (property_exists($object, 'errors')) {
            if (!is_array($object->errors) && !is_object($object->errors)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->errors, true) . '\' is not an array or object'
                );
            }
            $this->errors = [];
            foreach ($object->errors as $errorsElementObject) {
                $errorsElement = new APIError();
                $this->errors[] = $errorsElement->fromObject($errorsElementObject);
            }
        }
        if (property_exists($object, 'refundResult')) {
            if (!is_object($object->refundResult)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->refundResult, true) . '\' is not an object'
                );
            }
            $value = new Definitions\RefundResult();
            $this->refundResult = $value->fromObject($object->refundResult);
        }
        return $this;
    }
}