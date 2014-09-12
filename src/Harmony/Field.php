<?php
/**
 * Field abstract class
 *
 * PHP version 5
 *
 * This file is part Harmony-Form
 *
 * Field class is responsible for service form field elements.
 *
 * @category  Harmony
 * @package   Harmony-Form
 * @author    ViewOne Sp. z o.o. <support@viewone.pl>
 * @copyright 2014 ViewOne Sp. z o.o.
 * @license   http://opensource.org/licenses/MIT MIT
 * @link      https://github.com/viewone
 */

namespace Harmony;

abstract class Field
{

    /**
     * Field name
     *
     * @var string
     */
    protected $name;

    /**
     * Field type
     *
     * @var string
     */
    protected $type;

    /**
     * Field value
     *
     * @var string
     */
    protected $value;

    /**
     * Field label
     *
     * @var string
     */
    protected $label;

    /**
     * Field attributes
     *
     * @var array|object|instace of Field
     */
    protected $attributes;

    /**
     * Field error messages
     *
     * @var array
     */
    protected $errorMessage = array();

    public function __construct(){

        $this->label = $this->setLabel($this->attributes);

    }

    /**
     * Set Error
     *
     * Adds an error message to an array of errors
     *
     * @param string $message The content for error message
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */

    public function setErrorMessage($message)
    {
        $this->custom_error[] = $message;
    }

    /**
     * Set label
     *
     * @param string $attributes The label for a field
     *
     * @throws Exception
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */

    public function setLabel($attributes)
    {
        if(array_key_exists('label', $attributes)){
            $this->label = $attributes['label'];
        } else {
            throw new Exception('Label property doesn`t exist');
        }

    }

    /**
     * Get label
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return string
     */
    public function getLabel(){

        return $this->label;
    }

    /**
     * Validate
     *
     * Abstract class for field falidation
     *
     * @param string $value The content for error message
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */
    abstract public function validate($value);
}
