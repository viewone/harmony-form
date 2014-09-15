<?php

namespace spec\Harmony\Fields;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TextSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Harmony\Fields\Text');
    }

    function let()
    {
        $this->beConstructedWith(
            array('type' => 'text',
                'name' => 'test',
                'label' => 'Label',
                'options' => array(
                    'validators' => array('isEmpty'),
                    'required' => 'true'
                )
            ));
    }

    function it_should_return_field_options()
    {
        $this->getFieldOptions()->shouldReturn(
            array(
                'validators' => array('isEmpty'),
                'required' => 'true'
            )
        );
    }

    function it_should_return_field_attributes()
    {
        $this->getFieldAttributes()->shouldReturn(
            array(
                'type' => 'text',
                'name' => 'test',
                'label' => 'Label',
            )
        );
    }


    function it_should_set_error_message()
    {
        $this->setErrorMessage('isEmpty', 'This field can not be empty');
        $this->getErrorMessage('isEmpty')->shouldReturn('This field can not be empty');
    }

}
