# Employee-managment---Advanced-Web-Technologies
<!-- PROJECT LOGO -->
<br />
<div align="center">
  <img src=https://user-images.githubusercontent.com/98308845/230165831-efe7294c-a4fc-4cec-8297-58839a791e76.png>

  <h3 align="center">Employee Managment </h3>
</div>

<!-- introduction -->
## About The Project
An employee management system is a web-based application designed to streamline the HR department's daily operations. 
This system was developed using HTML/CSS, JavaScript, and PHP programming languages, and it offers a simple and efficient way to manage employee data, performance, and payroll.
<!-- Features -->
## Features

<strong> 1- Front & Back-ends Pages: </strong> <br>
<ul>
<li>Home Page: Provides links to log in as an employee or a manager. It also gives the option for new employees to sign up.</li>
<li>Employee Sign Up Page: Enables new employees to create a new account. The page should ask for the employee's ID, first name, last name, job title, and password. The form redirects the user to the employee’s home page.</li>
<li>Employee Login Page: Asks for the employee’s ID and password then redirects to the employee’s home page.</li>
<li>Manager Login Page: Asks for the manager's username and password then redirects to the manager’s home page.</li>
<li>Employee Home Page: Contains their information (first name, last name, ID, and job title), a list of their requests, the ability to edit each request, the ability to add a new request, and a sign-out link that redirects to the system’s home page. Each request is displayed as a combination of request ID and service type, and it links to a request information page.</li>
<li>Add New Request Page: A form for adding a new request that asks for the service type, description, and allows uploading up to 2 attachments. The form redirects to the request information page.</li>
<li>Manager Home Page: Contains the manager’s name, a list of requests, and a sign-out link that redirects to the system’s home page. The requests should be categorized based on the service type. The status of each request (in progress, approved, or declined) is shown, and approve and decline links/buttons should be presented beside each request. Each request is displayed as a combination of request ID and employee’s name, and it links to the request information page. The in-progress requests should be at the top of the list for each service with the options to approve or decline. Other requests only have an option to reverse their status.</li>
<li>Request Information Page: The requests in the request list displayed in the manager’s and the employee’s home pages should link to the request information page. The request page should display the request’s information (service, status, employee’s name, description, and attachments; the attachments are displayed if they were images, otherwise, they appear as links). The page also displays an option to approve or decline the request and an edit link.</li>
<li>Edit Request Page: Displays the request information (service, description, and attachments) in Add log-in functionality to the manager and employees login pages. When filling the login form, the form should call a PHP page that checks if the username/employee number and password are correct. If so, session variables are created, and the user is redirected to the appropriate home page. Otherwise, they are redirected back to the login page with an error message. Please note that passwords are never stored as plain text into the database. Hash passwords before storing them in the database using the PHP function password_hash.</li>
<li>Sign-Up Page:The sign-up page has a form that, when submitted, calls a PHP page that will add the new employee to the database then redirect to the employee home page if they signed up correctly. If not, redirect to the sign-up page with an error message.</li> <br>
</ul>
<strong> 2- Security: </strong>
Add security to the rest of your project pages such that all pages check that the user has logged in. If not, redirect the user to the home page. (using session variables).<br><br>


<!-- technology -->
## Built With
The employee management system was developed using the following technologies:

 * [![My Skills](https://skills.thijs.gg/icons?i=bootstrap,html,css)](https://skills.thijs.gg)
 <br> HTML/CSS: The front-end of the system was built using HTML/CSS, providing a clean and user-friendly interface.

* [![My Skills](https://skills.thijs.gg/icons?i=js,jquery)](https://skills.thijs.gg)
<br> JavaScript: JavaScript was used to add interactivity and dynamic features to the system, such as form validation and AJAX requests.

* [![php][php.com]][php-url]  PHP: PHP was used for the back-end development, allowing for efficient database management and server-side processing.
&nbsp<li>MySQL: MySQL was used as the database management system to store and manage employee data.</li>

[php.com]: https://www.php.net/images/logos/php-power-micro.png 
[php-url]:https://php.net
