# Task 22 Research

## (1) Blade Templates in Laravel

- Blade Templates in Laravel are basically used to separate the application logic (written in PHP) from the GUI (HTML, CSS, etc.) in an organized and easy way.
- Example of an old version of code before using Blade Templates:

```php
<?php if ($isAdmin): ?>
    <p>Welcome, Admin!</p>
<?php endif; ?>
```

- After using Blade Templates:

```blade
@if($isAdmin)
    <p>Welcome, Admin!</p>
@endif
```

- Blade can also be used to prevent code repetition by writing reusable partials and passing variables from controllers to views easily.

### Most Used Blade Directives

- `{{ $variable }}` → Echoes a variable and automatically escapes it.
- `{!! $variable !!}` → Echoes a variable without escaping it. Use only when you trust the source.
- `@if / @elseif / @else / @endif` → Standard conditional statement.
- `@unless / @endunless` → Inverse of `@if`. Executes if the condition is false.
- `@isset / @endisset` → Shorthand for `isset($variable)`.
- `@empty / @endempty` → Shorthand for `empty($variable)`.
- `@foreach / @endforeach` → Loops through arrays or collections. Inside the loop, you can use the `$loop` variable.
- `@forelse / @empty / @endforelse` → Loops through a collection and automatically displays the `@empty` block if the collection is empty.
- `@extends('layout.name')` → Specifies that the current view inherits a master layout.
- `@yield('section_name')` → Defines a placeholder inside the master layout.
- `@section('section_name') / @endsection` → Defines content to be injected into a `@yield` section.
- `@include('view.name')` → Includes another Blade view (useful for reusable components like navbars and footers).
- `@csrf` → Generates a hidden CSRF token field for HTML forms.
- `@auth / @endauth` → Displays content only for authenticated users.
- `@guest / @endguest` → Displays content only for guests.

---

## (2) Object-Relational Mapping (ORM)

- ORM is a concept that allows developers to interact with databases using objects instead of writing raw SQL queries.
- Instead of writing:

```sql
SELECT * FROM users;
```

you can write:

```php
$users = User::all();
```

The ORM automatically translates this PHP code into the appropriate SQL query.

### Why is it called Object-Relational Mapping?

- **Object** → Works with objects/classes.
- **Relational** → Works with relational databases such as MySQL and PostgreSQL.
- **Mapping** → Maps classes to database tables.

### Advantages

- Easier to read.
- Reduces SQL code.
- Fewer errors.
- Simplifies relationships between tables.
- Easier to maintain.

### Disadvantages

- May be slower than optimized raw SQL for complex queries.

---

## (3) Facade Design Pattern

- The Facade Pattern is a structural design pattern that provides a simplified interface to a complex subsystem.
- Instead of interacting with multiple objects individually, the client communicates with a single facade object.

### Example

```php
class RAM {
    public function load(string $data) {
        // ...
    }
}

class CPU {
    public function process(string $data) {
        // ...
    }
}

class Computer {
    private CPU $cpu;
    private RAM $ram;

    public function __construct() {
        $this->cpu = new CPU();
        $this->ram = new RAM();
    }

    public function run(string $input) {
        $this->ram->load($input);
        $this->cpu->process($input);
    }
}
```

---

## (4) Factory Design Pattern

- The Factory Pattern is a creational design pattern that provides an interface for creating objects without exposing the object creation logic to the client.
- Instead of calling `new ClassName()` directly, a factory method creates the appropriate object.

### Example

```php
interface Transport {
    public function deliver(): string;
}

class Truck implements Transport {
    public function deliver(): string {
        return "Delivering by land in a box.";
    }
}

class Ship implements Transport {
    public function deliver(): string {
        return "Delivering by sea in a container.";
    }
}

class LogisticsFactory {
    public static function createTransport(string $type): Transport {
        return match (strtolower($type)) {
            'road' => new Truck(),
            'sea'  => new Ship(),
            default => throw new Exception("Unknown transport type: $type"),
        };
    }
}
```

### Advantages

- Follows the **Single Responsibility Principle (SRP)**.
- Supports the **Open/Closed Principle (OCP)**.
- Centralizes object creation logic.

### Disadvantages

- May increase code complexity because of additional classes and abstractions.

---

## (5) SOLID Principles

The **SOLID** principles are five software design principles that make code easier to understand, extend, and maintain.

### S — Single Responsibility Principle (SRP)

A class should have only one reason to change.

#### Example

```php
class User {
    public string $name;
    public string $email;
}

class UserRepository {
    public function save(User $user): void {
        echo "Saving {$user->name} to the database.";
    }
}
```

---

### O — Open/Closed Principle (OCP)

Software entities should be open for extension but closed for modification.

#### Example

```php
interface PaymentMethod {
    public function process(float $amount): void;
}

class StripePayment implements PaymentMethod {
    public function process(float $amount): void {
        // Stripe logic
    }
}

class PayPalPayment implements PaymentMethod {
    public function process(float $amount): void {
        // PayPal logic
    }
}

class OrderProcessor {
    public function processOrder(float $amount, PaymentMethod $method) {
        $method->process($amount);
    }
}
```

---

### L — Liskov Substitution Principle (LSP)

Subclasses should be substitutable for their parent classes without breaking the application.

#### Example

```php
interface Walkable {
    public function walk(): void;
}

interface Flyable {
    public function fly(): void;
}

class Sparrow implements Walkable, Flyable {
    public function walk(): void {
        echo "Walking...";
    }

    public function fly(): void {
        echo "Flying...";
    }
}

class Ostrich implements Walkable {
    public function walk(): void {
        echo "Walking...";
    }
}
```

---

### I — Interface Segregation Principle (ISP)

Clients should not be forced to depend on interfaces they do not use.

#### Example

```php
interface Workable {
    public function work(): void;
}

interface Feedable {
    public function eat(): void;
}

class HumanWorker implements Workable, Feedable {
    public function work(): void {}

    public function eat(): void {}
}

class RobotWorker implements Workable {
    public function work(): void {}
}
```

---

### D — Dependency Inversion Principle (DIP)

High-level modules should depend on abstractions rather than concrete implementations.

#### Example

```php
interface DatabaseConnection {
    public function connect(): void;
}

class MySQLConnection implements DatabaseConnection {
    public function connect(): void {
        // ...
    }
}

class PasswordReminder {
    private DatabaseConnection $dbConnection;

    public function __construct(DatabaseConnection $dbConnection) {
        $this->dbConnection = $dbConnection;
    }
}
```