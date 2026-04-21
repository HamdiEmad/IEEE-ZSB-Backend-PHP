# PHP Concepts Summary

## 1. Traits
- Traits are a way to reuse code from multiple sources.
- Traits let you use functions from different places because PHP can’t inherit from more than one class.
- Traits are like a toolbox you can plug in anywhere.

---

## 2. Namespaces
- A Namespace is like a folder for your classes.
- It helps avoid conflicts when two classes have the same name.

**Example:**
- `App\Models\User`
- `App\Controllers\User`

---

## 3. Autoloading
- Autoloading means PHP automatically loads files when needed.
- Without it, you must write `require` for every file manually.
- PHP loads the file automatically when you use a class.

---

## 4. __get and __set
- These are special (magic) methods.
- They run automatically:
  - `__set` → when assigning a value to a property (mutator)
  - `__get` → when accessing a value of a property (accessor)

---

## 5. Static Methods & Properties
- `static` means the method or property belongs to the class itself, not an instance.
