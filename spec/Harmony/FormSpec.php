<?php

namespace spec\Harmony;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FormSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Harmony\Form');
    }

    function it_should_set_and_get_attributes()
    {
        $this->setAttribute('name', 'test');
        $this->getAttribute('name')->shouldReturn('test');
    }

    function it_should_add_object_field_to_form_field_array()
    {
        $this->addField(array('type' => 'text', 'name' => 'test'));
        $this->getField('test')->shouldReturnAnInstanceOf('Harmony\Field');
        $this->getField('test')->shouldReturnAnInstanceOf('Harmony\Fields\Text');
    }

    function it_throw_exception_when_parameters_are_not_array_or_object()
    {
        $this->shouldThrow(new \Exception("Field parameters type should be array or object"))->during('addField', array('test' => 'test'));
    }

    function it_throw_exception_when_field_type_does_not_exist()
    {
        $this->shouldThrow(new \Exception("Parameter \"type\" is empty or doesn`t exists"))->during('addField', array(array('name' => 'test')));
    }

    function it_throw_exception_when_class_based_on_field_type_does_not_exist()
    {
        $this->shouldThrow(new \Exception("Class Text2 doesn`t exists"))->during('addField', array(array('type'=>'text2', 'name' => 'test')));
    }

    function it_throw_exception_when_field_name_does_not_exist()
    {
        $this->shouldThrow(new \Exception("Parameter \"name\" is empty or doesn`t exists"))->during('addField', array(array('type' => 'text')));
    }





}
