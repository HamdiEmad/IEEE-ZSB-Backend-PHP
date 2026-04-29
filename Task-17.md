# Task 17 – Research Questions

## (1) The MVC Pattern
- MVC stands for **Model-View-Controller**, which is a high-level design pattern.
- **Model**:
  - Responsible for managing databases and handling logic.
- **View**:
  - Displays the data to the user.
  - Handles the user interface.
- **Controller**:
  - Handles requests and forms.
  - Acts as a communication layer between Model and View.
  - Communicates with the Model for processing data.
  - Chooses which View to display.

---

## (2) Routing
- A **Router** is responsible for deciding which code should handle a specific request.
- Analogy:
  - Each URL = a road  
  - Controller = a destination  
  - Router = a traffic officer directing requests  

---

## (3) The Front Controller
- Acts as a **single entry point** (like the front door of a building).
- All requests go through `index.php`.
- `index.php`:
  - Uses a router to determine the correct action.
  - Forwards the request to the appropriate controller.

### Why it’s better:
- Centralized request handling.
- Easier to manage security.
- More organized compared to multiple scattered `.php` files.

---

## (4) Clean URLs
- Clean URLs are easier to understand for both users and machines.
- Benefits:
  - Improve readability.
  - Help search engines (SEO).
  - Reflect page content clearly.

**Example:**
example.com/users/profile

Instead of:
example.com/index.php?page=users&action=profile

---

## (5) Separation of Concerns
- Mixing SQL queries inside HTML breaks the **Separation of Concerns** principle.
- Each part of the system should have a **single responsibility**.

### Problems:
- Harder to maintain.
- Poor code organization.
- Increased risk of SQL injection.

### Best Practice:
- Keep:
  - Database logic → Model  
  - UI → View  
  - Control flow → Controller  
