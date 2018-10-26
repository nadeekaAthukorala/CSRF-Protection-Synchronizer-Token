# CSRF-Protection-Synchronizer-Token
Cross-site Request Forgery protection in web applications using synchronizer token pattern
Login credentials :
  username: admin
  password: 1234qwerty
  
 enter any value to the text field in welcome.php and submit.
 form will be submitted along with the csrf token and session cookie.
 if the submitted token is available and matched with the generated token you will see the Demo.php
 click logout to logout from demo.
 
 Known issues: had an error in fetching csrf token from welcome.php to demo.php
