Blood Bank Management System

The Blood Bank Management System is a web-based application developed using PHP and MySQL, designed to streamline the management of blood donations, donor information, and blood stock levels. This system aims to make it easier for healthcare staff to track blood availability, register new donors, and manage blood requirements efficiently.

Features
1. Login Page
Functionality: Allows users to log in with their username and password.
Security: Provides feedback on login success or failure to ensure access control.
2. Dashboard
Home: After logging in, users are greeted with a dashboard that offers quick access to all key functionalities like donor registration, blood stock management, and more.
3. Donor Management
Donor Registration (user_reg.php, user_registration.php): New donors can register their details, including name and contact information, through a secure form.
Donor List (donor_list.php): Displays all registered donors, with options to update or remove records as needed.
4. Blood Stock Management
Stock Blood List (Stock-Blood-List.php): Lists all available blood types and their respective quantities.
Out of Stock List (out_of_stock.php): Keeps track of blood types that are out of stock, serving as a reminder for restocking.
5. Blood Donation Requests
Required Blood Form (exchange-register.php): Allows users to request specific blood types by submitting a form with necessary details, such as urgency and blood type needed.
Required Completed List (requiredcompleted.php): Tracks blood requests that have been fulfilled, ensuring clear management of completed requirements.
6. User Management
Logout: Users can securely log out when their tasks are complete.
7. Error Handling and Validation
Input Validation: Ensures proper handling of user inputs to prevent errors and protect data integrity.
Error Management: Proper error handling measures are implemented to keep the system running smoothly.
Code Structure
PHP and MySQL: The application is built using PHP for server-side logic and MySQL for database management. Each file in the project is dedicated to a specific task, such as user authentication or displaying donor lists.
Challenges Faced
Data Security: Implementing measures to protect sensitive information such as donor data.
Input Validation: Ensuring proper handling of form inputs to avoid issues like SQL injection or malformed data.

The Blood Bank Management System simplifies the process of managing blood donations and blood stock levels. It aims to provide healthcare professionals with an efficient and reliable tool to meet their daily operational needs.

