<?php
/**
 * Select class
 *
 * PHP version 5
 *
 * This file is part Harmony-Form
 *
 * Select class is responsible for service form select field elements.
 *
 * @category  Harmony
 * @package   Harmony-Form
 * @author    ViewOne Sp. z o.o. <support@viewone.pl>
 * @copyright 2014 ViewOne Sp. z o.o.
 * @license   http://opensource.org/licenses/MIT MIT
 * @link      https://github.com/viewone
 */

namespace Harmony\Fields;

use Harmony\Field;
use Exception;

class Select extends Field
{

    /**
     * Select option array
     *
     * @var array
     */
    public $values = array();

    /**
     * Default select value
     *
     * @var string
     */
    public $emptyValue = null;


    /**
     * Form constructor
     *
     * @param array $fieldData Field attributes
     *
     * @access public
     * @since Method available since Release 1.0.0
     */
    public function __construct($fieldData)
    {
        parent::__construct($fieldData);

        $this->partial  = "select";
        $this->helper   = 'html';
    }

    /**
     * Set select options
     *
     * @param array $attributes Field attributes
     * @throws
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return array
     */
    public function setValues(array $attributes)
    {
        if (is_array($attributes)) {
            if (array_key_exists('values', $attributes)) {
                $this->values = $attributes['values'];
            } else {
                $this->values = $attributes;
            }
        } else {
            throw new Exception('No options for select field');
        }
    }

    /**
     * Get select values
     *
     * @param string $value Field attributes
     * @throws
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return array
     */
    public function getValues($value)
    {
        return $this->values[$value];
    }

    /**
     * Set select empty options
     *
     * @param string|array $emptyValue Field attributes
     * @throws
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */
    public function setEmptyValue($emptyValue)
    {
        if (is_array($emptyValue)) {
            if (array_key_exists('emptyValue', $emptyValue)) {
                $this->emptyValue = $emptyValue['emptyValue'];
            }
        } elseif (is_string($emptyValue)) {

            $this->emptyValue = $emptyValue;
        }
    }

    /**
     * Get select empty options
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return string
     */
    public function getEmptyValue()
    {
        return $this->emptyValue;
    }

    /**
     * Form field validate
     *
     * @param array $value Value for validation
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */
    public function validate($value)
    {
        if (array_key_exists('validator', $this->attributes)) {
            if (is_array($this->attributes['validator'])) {
                foreach ($this->attributes['validator'] as $key => $value) {
                    var_dump($value);
                    // abstarct class ?
                }
            }
            if (is_string($this->attributes['validator'])) {

            }
        }

    }
}
