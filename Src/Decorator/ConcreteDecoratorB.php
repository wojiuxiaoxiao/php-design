<?php

namespace CjwPhpDesign\Src\Decorator;

/** 具体的装饰类
 * Class ConcreteDecoratorA
 * @package CjwPhpDesign\Src\Decorator
 */
class ConcreteDecoratorB extends DecoratorGeneral
{
    public function operation()
    {
        parent::operation(); // TODO: Change the autogenerated stub
        $this->addOperation();
    }

    public function addOperation()
    {
        echo "在装饰器后面进行修饰<br>";
    }
}