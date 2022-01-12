INSERT MANDATORY GIF

# Project Title

Text about the project and why it exists. This would also be a great place to link the project online.

# Installation

Add the installation instructions.

# Code Review

Code review written by Hanna Rosenberg](https://github.com/hanna-rosenberg).

1. `register.php:9-10`- Make sure you filter/sanitize the input from the user.
2. `config.php:6` - Change "titel" to "title", otherwise the title of your site won't show in the browser-bar!
3. `profile.php` - When updating profile, the user has to change both email and password to continue. Maybe use separate forms to avoid this. 
4. `update2.php` - When changing email and password and pressing "Update profile" you are redirected to update2.php and a long error-message is shown.
5. `tasks.php` - When the user tries to add a task with deadline today, an error-message with the text "The date has already past, choose a later date".
6. `tasks.php` - I can't complete or uncomplete the tasks, an error message is shown when pressing the ticks and the database doest seeem to register.
7. `tasks.php` - When trying to edit a task, the user needs to fill in all forms. I would recommend that you use different forms instead!
8. `tasks.php:86` - When saving the changes an error-message is shown under the title of the task.
9. `general` - The code would be easier to follow with more comments.
10. `general` - It's not possible to view all tasks with deadline today.
11. `README.md`- Update your README-file with instructions etc.

# Testers

Tested by the following people:

1. Jane Doe
2. John Doe
