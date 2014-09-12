<?php
/**
 * Textarea class
 *
 * PHP version 5
 *
 * This file is part Harmony-Form
 *
 * Text class is responsible for service form text field elements.
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

class Textarea extends Field
{

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
    }

    /**
     * Form field validate
     *
     * @param array $value Value for validation
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return TO DO
     */
    public function validate($value)
    {
        if (array_key_exists('validator', $this->attributes)) {
            if (is_array($this->attributes['validator'])) {
                foreach ($this->attributes['validator'] as $key => $value) {
                    var_dump($value);

                }
            }
            if (is_string($this->attributes['validator'])) {

            }
        }
        return;
    }
}
