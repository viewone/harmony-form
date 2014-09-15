<?php

namespace spec\Harmony\Fields;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SelectSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Harmony\Fields\Select');
    }

//    function let() {
//        $this->beConstructedWith(
//            array(
//                'name' => 'selectTest',
//                'label' => 'Label',
//                'emptyValue'=>'default',
//                'values' => array(
//                    'first' => 'first',
//                    'second' => 'second'
//                )
//            )
//        );
//    }

//    function it_should_return_empty_value(){
//
//        $this->getEmptyValue()->shouldReturn('default');
//
//        $this->setEmptyvalue('test');
//        $this->getEmptyValue()->shouldReturn('test');
//
//        $this->emptyValue = 'test2';
//        $this->getEmptyValue()->shouldReturn('test2');
//    }
//
//    function it_should_return_specific_value(){
//        $this->getValues('first')->shouldReturn('first');
//    }
}
