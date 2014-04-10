<?php

 ini_set('display_error', 1);

class PropertyTest
{
    /**  Location for overloaded data.  */
    private $data = array();

    /**  Overloading not used on declared properties.  */
    public $declared = 1;

    /**  Overloading only used on this when accessed outside the class.  */
    private $hidden = 'hidden';

    public function __set($name, $value)
    {
        echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        echo "Getting '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        
        return null;
    }

    /**  As of PHP 5.1.0  */
    public function __isset($name)
    {
        echo "Is '$name' set?\n";
        return isset($this->data[$name]);
    }

    /**  As of PHP 5.1.0  */
    public function __unset($name)
    {
        echo "Unsetting '$name'\n";
        unset($this->data[$name]);
    }

    /**  Not a magic method, just here for example.  */
    public function getHidden()
    {
        return $this->hidden;
    }
}

echo "<pre>\n";

$obj = new PropertyTest;

$obj->a = 1;
echo $obj->a . "\n\n";

var_dump(isset($obj->a));
unset($obj->a);
var_dump(isset($obj->a));
echo "\n";

echo $obj->declared . "\n\n";

echo "Let's experiment with the private property named 'hidden':\n";
echo "Privates are visible inside the class, so __get() not used...\n<br>";
echo $obj->getHidden() .  " is a variable value"."\n<br>";
echo "Privates not visible outside of class, so __get() is used...\n";
echo $obj->hidden . "\n\n";
 /* method overloading using call and a call_static*/
 echo "method overloading\n<br><br>";
 

class MethodTest
{
    public function __call($name, $arguments)
    {
        // Note: value of $name is case sensitive.
        echo "Calling object method '$name' "
             . implode(', ', $arguments). "\n";
    }

    /**  As of PHP 5.3.0  */
    public static function __callStatic($name, $arguments)
    {
        // Note: value of $name is case sensitive.
        echo "Calling static method '$name' "
             . implode(', ', $arguments). "\n";
    }
}

$obj = new MethodTest;
$obj->runTest('12345','in object context');

MethodTest::runTest('kfjgs','in static context');  // As of PHP 5.3.0

 
 
 
 
/*function overloading is not possible but ic an be done through call and call_static
 * */class Overloading{
  public function method1($name,$value)
   {
$name = $value;
echo "HELLO";
echo $name;
       echo "enterd into method<br>";
       
   }
   
}
$overload1=new Overloading();
$overload1->method1();
$overload1->method1('name','dale'); 


?>