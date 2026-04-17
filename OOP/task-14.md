# Task 14 Research Questions

## 1. Class vs Object

- A **class** is a template (blueprint) used to create objects (instances). It defines attributes (data/properties) and methods (actions).
- An **object** is an instance created from a class.
- Example classes: `Human`, `Car`, `Phone`.
- Example objects: `Abbas`, `KIA`, `OPPO`.

### Example

```php
class User {
    public $username;
    public $password;
}

$guest = new User();
```

## 2. `$this` vs `self`

- `$this` is a pseudo-variable that refers to the current object and is used inside non-static methods.
- `self` refers to class-level members (constants, static properties, static methods) and is accessed with the scope resolution operator `::`.

### Example (`$this`)

```php
class Phone {
    private $model;

    public function getModel() {
        return $this->model;
    }
}
```

### Example (`self`)

```php
class Car {
    const WHEELS = 4;

    public function getCarWheels() {
        return self::WHEELS;
    }
}
```

## 3. Access Modifiers (Encapsulation)

- Access modifiers (visibility markers) are: `public`, `private`, `protected`.
- `public`: can be accessed from anywhere (inside or outside the class).
- `protected`: can be accessed inside the class and in subclasses (inherited classes).
- `private`: can be accessed only inside the same class.

### Example

```php
class Employee {
    private $salary;
    public $username;
    protected $hourlyOrMonthly;
}
```

## 4. Typed Properties

- Typed properties define the data type of a property, such as `int`, `string`, `float`, and `bool`.
- They help catch type-related bugs earlier.

## 5. Constructor Methods

- `__construct()` is a method called automatically when an object is created.
- It is used to initialize object values.

### Example

```php
class Person {
    public string $name;
    public int $age;

    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }
}

$admin = new Person("Eldemery", 57);
```