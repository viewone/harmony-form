<?php
/**
 * Form class
 *
 * PHP version 5
 *
 * This file is part Harmony-Form
 *
 * Form class is responsible for initialize new form.
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

class Form
{
    /**
     * Form attributes
     *
     * @var array
     */
    protected $attributes = array();

    /**
     * Form fields
     *
     * Array of fields objects
     *
     * @var array
     */
    protected $fields = array();

    /**
     * Form constructor
     *
     * @access public
     * @since Method available since Release 1.0.0
     */
    public function __construct()
    {

    }

    /**
     * Set form attribute
     *
     * @param string $attribute Attribute name
     * @param string $value     Attribute value
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */
    public function setAttribute($attribute, $value)
    {
        $this->attributes[$attribute] = $value;
    }

    /**
     * Get form attribute
     *
     * @param string $name Attribute name
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return Attribute value
     */
    public function getAttribute($name)
    {
        return $this->attributes[$name];
    }

    /**
     * Add field
     *
     * @param array|object $params Field parameters
     *
     * @throws Exception
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */
    public function addField($params = array())
    {
        if (is_array($params) || (is_object($params) && $params instanceof Field)) {
            if (array_key_exists('type', $params) && (!empty($params['type']) && strlen($params['type']) > 1)) {
                $location = "\\Harmony\\Fields\\" . ucfirst($params['type']);
                if (class_exists($location)) {
                    $this->fields[$params['name']] = new $location($params);
                } else {
                    throw new Exception('Class ' . ucfirst($params['type']) . ' doesn`t exists');
                }
            } else {
                throw new Exception('Parameter "type" is empty or doesn`t exists');
            }
        } else {
            throw new Exception('Field parameters type should be array or object');
        }
    }


    public function getField($name){

        return $this->fields[$name];

    }
}
