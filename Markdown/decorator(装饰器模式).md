# php设计模块式——decorator(装饰器模式)
## 第一部分 概念
装饰模式以对客户端透明的方式扩展对象的功能，是继承关系的一个替代方案，提供比继承更多的灵活性。动态给一个对象增加功能，这些功能可以再动态的撤消。增加由一些基本功能的排列组合而产生的非常大量的功能。

相比于适配器来说，适配器是对某些类进行重组，而装饰器是对类的某些方法进行动态添加新的功能模块。
## 第二部分 代码实现
### 1.查看笔者已经做好的demo；
> 直接在控制器中实例化下对象即可；

```
 new DecoratorPractice();
```
### 2.demo中具体的实现方式如下所示：
```
class DecoratorPractice{
    public function __construct(){
        echo "装饰器模式：有两种修饰方法，一种是前置修饰，一种是后置修饰<br>";
        $component = new Component();
        //前置修饰
        $fontDecorator = new ConcreteDecoratorA($component);
        $fontDecorator->operation();
        echo "<br>";
        //后置修饰
        $backDecorator = new ConcreteDecoratorB($component);
        $backDecorator->operation();
    }
}
```
## 第三部分 原理介绍
### 1. 首先，创建需要被修饰的目标类；
```
// 需要被装饰的类
class Component{
    // 需要被装饰的方法
    public function operation(){
        echo "需要被装饰的类<br>";
    }
}
```
### 2. 抽离出需要被装饰的基类；
```
// 装饰器的基类
abstract class DecoratorGeneral{
    private $_component;
    public function __construct(Component $component){
        $this->_component = $component;
    }
    // 重写方法：(不破坏其原类的基础上)
    public function operation(){
        $this->_component->operation();
    }
}
```
### 3. 前置装饰；
```
// 具体的装饰类
class ConcreteDecoratorA extends DecoratorGeneral{
    public function operation(){
        $this->addOperation();
        parent::operation();
    }
    public function addOperation(){
        echo "在装饰器前面进行修饰<br>";
    }
}
```
### 4. 后置装饰；
```
// 具体的装饰类
class ConcreteDecoratorB extends DecoratorGeneral{
    public function operation(){
        parent::operation(); 
        $this->addOperation();
    }
    public function addOperation(){
        echo "在装饰器后面进行修饰<br>";
    }
}
```
