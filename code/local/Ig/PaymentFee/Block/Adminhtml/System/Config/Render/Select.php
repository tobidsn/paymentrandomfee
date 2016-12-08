<?php

class Ig_PaymentFee_Block_Adminhtml_System_Config_Render_Select extends Mage_Core_Block_Html_Select {
    public function _toHtml() {
        return trim(preg_replace('/\s+/', ' ', parent::_toHtml()));
    }
}
