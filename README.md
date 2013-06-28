**PHP DESIGN PATTERNS**

After implementing various sorting algorithms in PHP , I've planned to implement the necessary design patterns in PHP.


**Decorator Pattern**

A `decorator` class allows you to add more capacity to an existing class while leaving the original class untouched. It has certain advantages over inheritance.

The `Decorator pattern` is also the best way to implement Open Close principle. Which is one of the most important design principle to architect large scale application.


For more detail about `decorator pattern` check this [http://en.wikipedia.org/wiki/Decorator_pattern](http://en.wikipedia.org/wiki/Decorator_pattern "Decorator Pattern")


**Abstract Factory Pattern**

In the `abstract factory pattern` an abstract factory defines what objects the non-abstract or concrete factory will need to be able to create. It's kind of a wrapper around the other factories or a super factory which creates other factories.


The concrete factory must create the correct objects for it's context, insuring that all objects created by the concrete factory have been chosen to be able to work correctly for a given circumstances.

In a simple sense, The `Abstract Factory` requires all sub-classes(you can treat the sub classes are an individual concrete factory) to implement their own version of the factory methods. 

For more details about `abstract factory pattern` check the wikipedia reference at [http://en.wikipedia.org/wiki/Abstract_factory_pattern](http://en.wikipedia.org/wiki/Abstract_factory_pattern "Abstract Factory Pattern")