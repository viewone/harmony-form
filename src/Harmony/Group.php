<?php
/**
 * Created by PhpStorm.
 * User: Michal
 * Date: 15.09.14
 * Time: 17:31
 */

namespace Harmony;


class Group
{

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
     * Sub Fields
     *
     * @var string
     */
    protected $subFields = array();

    /**
     * Add sub fields
     *
     * @param object $field Subfield object
     * @param string $name Subfield name
     *
     * @access public
     * @since Method available since Release 1.0.0
     * @return void
     */
    public function pushField($name, $field)
    {
        $subFields[$name] = $field;
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

} 