<?php
class GCS_product_definitions_FixedListValidator extends GCS_DataObject
{
    /**
     * @var string[]
     */
    public $allowedValues = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'allowedValues')) {
            if (!is_array($object->allowedValues) && !is_object($object->allowedValues)) {
                throw new UnexpectedValueException('value \'' . print_r($object->allowedValues, true) . '\' is not an array or object');
            }
            $this->allowedValues = [];
            foreach ($object->allowedValues as $allowedValuesElementObject) {
                $this->allowedValues[] = $allowedValuesElementObject;
            }
        }
        return $this;
    }
}
