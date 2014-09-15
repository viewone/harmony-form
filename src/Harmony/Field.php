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

use Exception;

abstract class Field
{

    /**
     * Field name
     *
     * @var string
     */
    protected $name;

    /**
     * Field value
     *
     * @var string
     */
    protected $value;

    /**
     * Field data
     *
     * @var string
     */
    protected $fieldData = array();

    /**
     * Field options
     *
     * @var string
     */
    protected $fieldOptions = array();

    /**
     * Field partial
     *
     * @var string
     */
    protected $partial;

    /**
     * Field helper
     *
     * @var string
     */
    protected $helper;

    /**
     * Field attributes
     *
     * @var array|object|instace of Field
     */
    protected $fieldAttributes = array();

    /**
     * Field error messages
     *
     * @var array
     */
    protected $errorMessages = array();


    public function __construct($fieldData)
    {
        $this->fieldData = $fieldData;

        if (isset($this->fieldData['options'])) {
            $this->setFieldOptions($this->fieldData['options']);
        }

        if (isset($this->fieldData['options'])) {
            $tempData = $this->fieldData;
            unset($tempData['options']);
            $this->setFieldAttributes($tempData);
        }

    }

    /**
     * Set Option
     *
     * @param array $optionKey Field option key
     * @param array $optionValue Field option value
     *
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */

    public function setFieldOption($optionKey, $optionValue)
    {

            $this->fieldOptions[$optionKey] = $optionValue;


        return $this;
    }

    /**
     * Get Options
     *
     * @param string $name Option name
     *
     * @throws Exception
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */

    public function getFieldOption($name)
    {
        return $this->fieldOptions[$name];
    }


    /**
     * Set Options
     *
     * @param array $options Field options
     *
     * @throws Exception
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */

    public function setFieldOptions($options)
    {
        if (is_array($options)) {
            $this->fieldOptions = $options;
        } else {
            throw new Exception('Options must be an array');
        }

        return $this;
    }

    /**
     * Get Options
     *
     * @throws Exception
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */

    public function getFieldOptions()
    {
        return $this->fieldOptions;
    }

    /**
     * Set Attributes
     *
     * @param array $attributes Field attributes
     *
     * @throws Exception
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */

    public function setFieldAttributes($attributes)
    {

        if (is_array($attributes)) {
                $this->fieldAttributes = $attributes;

                foreach ($attributes as $key => $value) {
                    $normalized = ucfirst($key);

                    $method = 'set' . $normalized;
                    if (method_exists($this, $method)) {
                        $this->$method($value);
                    }
                }

        } else {
            throw new Exception('Attributes must be an array');
        }

        return $this;
    }

    /**
     * Get Attributes
     *
     * @throws Exception
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */

    public function getFieldAttributes()
    {
        return $this->fieldAttributes;
    }

    /**
     * Set Error
     *
     * Adds an error message to an array of errors
     *
     * @param string $errorName The error name
     * @param string $messageContent The content for error message
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */

    public function setErrorMessage($errorName, $messageContent)
    {
        $this->errorMessages[$errorName] = $messageContent;

        return $this;
    }

    /**
     * Get Error
     *
     * Adds an error message to an array of errors
     *
     * @param string $messageName Error name
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return string
     */

    public function getErrorMessage($messageName)
    {
        return $this->errorMessages[$messageName];
    }

    /**
     * Set partial
     *
     * @param string $partial The partial name
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */

    public function setPartial($partial)
    {
        $this->partial = $partial;

        return $this;
    }

    /**
     * Get partial
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return string
     */

    public function getPartial()
    {
        return $this->partial;
    }

    /**
     * Set partial
     *
     * @param string $name The helper name
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */

    public function setHelper($name)
    {
        $this->helper = $name;

        return $this;
    }

    /**
     * Get helper
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return string
     */

    public function getHelper()
    {
        return $this->helper;
    }

    /**
     * Set field name
     *
     * @param string $name The field name
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get field name
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return string
     */

    public function getName()
    {
        return $this->name;
    }

    /**
     * Set field value
     *
     *
     * @param string $value The field name
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get field value
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return string
     */

    public function getValue()
    {
        return $this->value;
    }

    /**
     * Validate
     *
     * Abstract class for field validation
     *
     * @param string $value The content for error message
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */
    abstract public function validate($value);
}
