# PHP MVC User System
Simple system to manage users.
* CRUD (create, read, update, delete) operations on users and notes
* Admins can change usernames, emails and passwords
## Demo
https://burmov.eu/demos/mvc-user-system/ (use 'admin' and 'Admin123' for admin access)
## Setup
1. Create a database in MySQL called *mvc_user_system* with *utf8mb4_unicode_ci* collation and import **mvc-user-system.sql**
2. Change database settings in **index.php** to match yours
3. Start using it
## Changelog
#### 11.10.2018
* Added **.htaccess** file
* Updated database file
* Updated demo URL
#### 15.06.2017
* Added notes
* Added validation
* Added multiple messages
* Added small enhancements like autofocus on fields etc.
* Fixed case-insensitive user and email check
* Replaced dashboard controller with dashboard method in account controller
#### 11.06.2017
* Initial release
