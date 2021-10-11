<?php

require_once '../app/models/Auth.php';
require_once '../app/models/User.php';
require_once '../app/helpers/session_helper.php';

class Home extends Controller {
    private $authModel;
    private $userModel;

    public function __construct(){
        $this->authModel = new Auth;
        $this->userModel = new User;
    }

    public function index() {
        if (isset($_SESSION['id'])) {
            $data['profile'] = $this->userModel->getProfileById($_SESSION['id']);
            return $this->view('index', $data);
        } else {
            return $this->view('index');
        }
    }

    public function signIn() {
        $this->view('login');
    }

    public function signUp() {
        $this->view('signup');
    }

    public function login() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
            'name/email'    => trim($_POST['name/email']),
            'password'      => trim($_POST['password']),
            'captcha'       => trim($_POST['captcha'])
        ];

        if (empty($data['name/email']) || empty($data['password']) || empty($data['captcha'])) {
            flash("login", "Please fill out all inputs");
            header("location: ".BASEURL.'/home/signin');
            exit();
        }

        if ($data['captcha'] == $_SESSION['captcha']) {
            if ($this->authModel->findUserByEmailOrUsername($data['name/email'], $data['name/email'])){
                $loggedInUser = $this->authModel->login($data['name/email'], $data['password']);
                if ($loggedInUser){
                    $data['profile'] = $loggedInUser;
                    $this->createUserSession($loggedInUser);
                } else {
                    flash("login", "Password Incorrect");
                    redirect(BASEURL.'/home/signin');
                }
            } else {
                flash("login", "No user found");
                redirect(BASEURL.'/home/signin');
            }
        } else {
            flash("login", "Captcha wrong. Please try again.");
            redirect(BASEURL.'/home/signin');
        }
    }

    public function createUserSession($user) {
        $_SESSION['id'] = $user['id'];
        redirect(BASEURL);
    }

    public function logout() {
        unset($_SESSION['id']);
        session_destroy();
        return redirect(BASEURL);
    }

    public function avatar_upload() {
        if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
            $info               = getimagesize($_FILES['avatar']['tmp_name']);
            $allowedTypes       = [IMAGETYPE_JPEG => '.jpg', IMAGETYPE_PNG => '.png']; //accept jpg, png
            if ($info === false) {
                flash("register", "Bad avatar file format");
                redirect(BASEURL."/signup.php");
            } else if (!array_key_exists($info[2], $allowedTypes)) {
                flash("register", "Not an accepted file type");
                redirect(BASEURL."/signup.php");
            } else {
                //save the picture in the images folder
                $path = '../public/assets/avatars/';
                $filename = uniqid().$allowedTypes[$info[2]];
                move_uploaded_file($_FILES['avatar']['tmp_name'], $path.$filename);

                return $filename;
            }
        }
    }

    public function register() {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'avatar'    => $this->avatar_upload() ? $this->avatar_upload() : null,
            'firstname' => trim($_POST['firstname']),
            'lastname'  => ($_POST['lastname']),
            'email'     => trim($_POST['email']),
            'birthdate' => trim($_POST['birthdate']),
            'sex'       => trim($_POST['sex']),
            'username'  => trim($_POST['username']),
            'password'  => trim($_POST['password']),
            'pwdRepeat' => trim($_POST['pwdRepeat'])
        ];

        if(empty($data['firstname']) || empty($data['email']) || empty($data['username']) || 
        empty($data['password']) || empty($data['pwdRepeat']) || empty($data['sex']) || empty($data['birthdate'])) {
            flash("register", 'Please fill out all input');
            redirect(BASEURL."/home/signup");
        }

        if(!preg_match("/^[a-zA-Z0-9]*$/", $data['username'])) {
            flash("register", "Invalid username");
            redirect(BASEURL."/home/signup");
        }

        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            flash("register", "Invalid email");
            redirect(BASEURL."/home/signup");
        }

        if (strlen($data['password']) < 6) {
            flash("register", "Invalid password");
            redirect(BASEURL."/home/signup");
        } else if ($data['password'] !== $data['pwdRepeat']) {
            flash("register", "Passwords don't match");
            redirect(BASEURL."/home/signup");
        }

        if ($this->authModel->findUserByEmailOrUsername($data['email'], $data['username'])) {
            flash("register", "Username or email already taken");
            redirect(BASEURL."/home/signup");
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        if($this->authModel->register($data)) {
            redirect(BASEURL."/home/signin");
        } else {
            die("Something went wrong");
        }
    }
}