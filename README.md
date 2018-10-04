# CSRF-Protection-Synchronizer-Token
Cross-site Request Forgery protection in web applications using synchronizer token pattern <br>
Login credentials : <br>
  username: admin <br>
  password: 1234qwerty <br>
  
 Upon login, session created and csrf token is generated and stored with session in serverside.<br>
 when a user is submitting the form, token value is too submitted in the url.<br>
 After submission submitted token is checked against the token stored in the server side to verify the submission is free from malicious CSRF attacks. 