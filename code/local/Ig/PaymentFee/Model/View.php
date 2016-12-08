<?php
class Ig_PaymentFee_Model_View 
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 0, 'label' => Mage::helper('adminhtml')->__('Addition (+)')),
            array('value' => 1, 'label' => Mage::helper('adminhtml')->__('Subtraction (-)')),
        );
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            0 => Mage::helper('adminhtml')->__('Addition (+)'),
            1 => Mage::helper('adminhtml')->__('Subtraction (-)'), 
        );
    }
}