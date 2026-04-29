# Task 18 Research Questions

## (1) The Controller's Job
- When clicking the button, the Controller handles the whole request before viewing the final page to the user:
  1. It receives the request from the user.
  2. It understands the user's purpose.
  3. It communicates with the Model to fetch the user data from the database and the Model processes this request and returns the data.
  4. It passes the data to the View.
  5. Finally, the View renders the wanted page.

## (2) Dynamic Views
- A static HTML file is fixed as the content is written once and never changes and every user sees the same static page. Also, there is no logic, no database or personalization.
- A Dynamic PHP View is generated at runtime (Dynamic) and it changes its contents based on the data and each user might see different content and of course, there is logic.

## (3) Data Passing
- The Controller sends data to the View as variables to display them.
- The Controller gets the data from the Model and prepares it for passing to the View.
- There are different methods for passing data such as extract() method or as an array.

## (4) Templating (Headers & Footers)
- MVC helps avoiding repeating things like nav bars, footers, banner and head by using shared files (layouts).
- You can create separate files like head.php and banner.php and include them inside your views.
- It makes maintenance easier since every partial is written once instead of repeating.

## (5) Logic in Views
- It is considered bad practice to put logic inside the views as it breaks the main idea of the MVC architecture (Separation of Concerns).
- A View should only display data and the logic is handled by the Controller/Model.
- It makes the code harder and confusing for maintenance.
