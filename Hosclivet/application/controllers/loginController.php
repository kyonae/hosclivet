<?php

/**
 * Login Controller
 * Controls the login processes
 */

class LoginController extends Controller
{
	/**
	 * Construct this object by extending the basic Controller class
	 */
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Index, default action (shows the login form), when you do login/index
	 */
	function index()
	{
		// show the view
		$this->view->render('login/index');
	}

	/**
	 * The login action, when you do login/login
	 */
	function login()
	{
		// run the login() method in the login-model, put the result in $login_successful (true or false)
		$login_model = $this->loadModel('Login');
		// perform the login method, put result (true or false) into $login_successful
		$login_successful = $login_model->login();

		// check login status
		if ($login_successful) {
			// if YES, then move user to dashboard/index (btw this is a browser-redirection, not a rendered view!)
			header('location: ' . URL . 'dashboard');
		} else {
			// if NO, then move user to login/index (login form) again
			header('location: ' . URL . 'login');
		}
	}

	/**
	 * The logout action, login/logout
	 */
	function logout()
	{
		$login_model = $this->loadModel('Login');
		$login_model->logout();
		// redirect user to base URL
		header('location: ' . URL);
	}

	/**
	 * Show user's profile
	 */
	function showProfile()
	{
		// Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
		Auth::handleLogin();
		$this->view->render('login/showprofile');
	}

	/**
	 * Edit user name (show the view with the form)
	 */
	function editUsername()
	{
		// Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
		Auth::handleLogin();
		$this->view->render('login/editusername');
	}

	/**
	 * Edit user name (perform the real action after form has been submitted)
	 */
	function editUsername_action()
	{
		// Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
		// Note: This line was missing in early version of the script, but it was never a real security issue as
		// it was not possible to read or edit anything in the database unless the user is really logged in and
		// has a valid session.
		Auth::handleLogin();
		$login_model = $this->loadModel('Login');
		$login_model->editUserName();
		$this->view->render('login/editusername');
	}

	/**
	 * Edit user email (show the view with the form)
	 */
	function editUserEmail()
	{
		// Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
		Auth::handleLogin();
		$this->view->render('login/edituseremail');
	}

	/**
	 * Edit user email (perform the real action after form has been submitted)
	 */
	function editUserEmail_action()
	{
		// Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
		// Note: This line was missing in early version of the script, but it was never a real security issue as
		// it was not possible to read or edit anything in the database unless the user is really logged in and
		// has a valid session.
		Auth::handleLogin();
		$login_model = $this->loadModel('Login');
		$login_model->editUserEmail();
		$this->view->render('login/edituseremail');
	}

	/**
	 *
	 */
	function changeAccountType()
	{
		// Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
		Auth::handleLogin();
		$this->view->render('login/changeaccounttype');
	}

	/**
	 *
	 */
	function changeAccountType_action()
	{
		// Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
		// Note: This line was missing in early version of the script, but it was never a real security issue as
		// it was not possible to read or edit anything in the database unless the user is really logged in and
		// has a valid session.
		Auth::handleLogin();
		$login_model = $this->loadModel('Login');
		$login_model->changeAccountType();
		$this->view->render('login/changeaccounttype');
	}

	/**
	 * Register page
	 * Show the register form (with the register-with-facebook button). We need the facebook-register-URL for that.
	 */
	function register()
	{
		$login_model = $this->loadModel('Login');

		// if we use Facebook: this is necessary as we need the facebook_register_url in the login form (in the view)
		if (FACEBOOK_LOGIN == true) {
			$this->view->facebook_register_url = $login_model->getFacebookRegisterUrl();
		}

		$this->view->render('login/register');
	}

	/**
	 * Register page action (after form submit)
	 */
	function register_action()
	{
		$login_model = $this->loadModel('Login');
		$registration_successful = $login_model->registerNewUser();

		if ($registration_successful == true) {
			header('location: ' . URL . 'login/index');
		} else {
			header('location: ' . URL . 'login/register');
		}
	}

	/**
	 * Verify user after activation mail link opened
	 * @param int $user_id user's id
	 * @param string $user_activation_verification_code sser's verification token
	 */
	function verify($user_id, $user_activation_verification_code)
	{
		if (isset($user_id) && isset($user_activation_verification_code)) {
			$login_model = $this->loadModel('Login');
			$login_model->verifyNewUser($user_id, $user_activation_verification_code);
			$this->view->render('login/verify');
		} else {
			header('location: ' . URL . 'login/index');
		}
	}

	/**
	 * Request password reset page
	 */
	function requestPasswordReset()
	{
		$this->view->render('login/requestpasswordreset');
	}

	/**
	 * Request password reset action (after form submit)
	 */
	function requestPasswordReset_action()
	{
		$login_model = $this->loadModel('Login');
		$login_model->requestPasswordReset();
		$this->view->render('login/requestpasswordreset');
	}

	/**
	 * Verify the verification token of that user (to show the user the password editing view or not)
	 * @param string $user_name username
	 * @param string $verification_code password reset verification token
	 */
	function verifyPasswordReset($user_name, $verification_code)
	{
		$login_model = $this->loadModel('Login');
		if ($login_model->verifyPasswordReset($user_name, $verification_code)) {
			// get variables for the view
			$this->view->user_name = $user_name;
			$this->view->user_password_reset_hash = $verification_code;
			$this->view->render('login/changepassword');
		} 
		else {
			header('location: ' . URL . 'login/index');
		}
	}

	/**
	 * Set the new password
	 * Please note that this happens while the user is not logged in.
	 * The user identifies via the data provided by the password reset link from the email.
	 */
	function setNewPassword()
	{
		$login_model = $this->loadModel('Login');
		// try the password reset (user identified via hidden form inputs ($user_name, $verification_code)), see
		// verifyPasswordReset() for more
		$login_model->setNewPassword();
		// regardless of result: go to index page (user will get success/error result via feedback message)
		header('location: ' . URL . 'login/index');
	}
}
