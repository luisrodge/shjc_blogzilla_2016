<?php  

$GLOBALS['page'] = 'register';

$title = 'Become a user';

$banner = false;

$content = <<<EOD

<div id="register_form">
	<form class="contact_form" action="users/register.php" method="post" name="contact_form">
        <ul>
            <li>
                 <h2 class="sign_up">Sign up now and start publishing</h2>
            </li>
            <li>
                <label for="name">First Name:</label>
                <input type="text"  name="first_name" placeholder="Your first name" required />
            </li>
             <li>
                <label for="name">Last Name:</label>
                <input type="text" name="last_name" placeholder="Your last name" required />
            </li>
            <li>
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Enter your email address" required />
            </li>
            <li>
                <label for="name">Username:</label>
                <input type="text" name="username" placeholder="Enter your desired username" required />
            </li>
            <li>
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Enter password" required />
            </li>
            <li>
                <label for="website">Confirm:</label>
                <input type="password" name="confirm_password" placeholder="Re-type password"/>
            </li>
            <li>
            	<button class="submit" type="submit" name="register">Submit Form</button>
            </li>
        </ul>
    </form>
</div>


EOD;

require_once 'app.php';

?>