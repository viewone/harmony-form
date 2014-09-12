<?php
/**
 * Checkbox class
 *
 * PHP version 5
 *
 * This file is part Harmony-Form
 *
 * Checkbox class is responsible for service form checkbox field elements.
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

class Select extends Field
{
    /**
     * Select option array
     *
     * @var string
     */
    public $options = array();

    /**
     * Form constructor
     *
     * @param array $attributes Field attributes
     *
     * @access public
     * @since Method available since Release 1.0.0
     */
    public function __construct($attributes)
    {
        $this->name = $attributes['name'];
        $this->attributes = $attributes;

        $this->validate($this->value);
        $this->setOptions($this->attributes);
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
    public function setOptions($attributes){

        if(array_key_exists('options', $attributes)){
            $this->options = $attributes['options'];
        } else {
            throw new Exception('No options for select field');
        }
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
