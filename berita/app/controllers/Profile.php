<?php

require_once '../app/models/User.php';
require_once '../app/helpers/session_helper.php';

class Profile extends Controller {
    private $userModel;

    public function __construct(){
        $this->userModel = new User;
    }

    public function index() {
        $data['profile'] = $this->userModel->getProfileById($_SESSION['id']);
        return $this->view('profile', $data);
    }

    public function avatar_update($id) {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($_POST['submit'])) {
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
                $info               = getimagesize($_FILES['avatar']['tmp_name']);
                $allowedTypes       = [IMAGETYPE_JPEG => '.jpg', IMAGETYPE_PNG => '.png']; //accept jpg, png
                if ($info === false) {
                    flash("profile", "Bad avatar file format");
                    redirect(BASEURL."/profile");
                } else if (!array_key_exists($info[2], $allowedTypes)) {
                    flash("profile", "Not an accepted file type");
                    redirect(BASEURL."/profile");
                } else {
                    //save the picture in the images folder
                    $path = '../public/assets/avatars/';
                    $filename = uniqid().$allowedTypes[$info[2]];
    
                    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $path.$filename)) {
                        $data['form'] = [
                            'id'        => $id,
                            'avatar'    => $filename,
                        ];
    
                        $data['profile'] = $this->userModel->getProfileById($data['form']['id']);
    
                        if (is_file($path.$data['profile']['avatar'])) {
                            unlink($path.$data['profile']['avatar']);
                        } 
    
                        $row = $this->userModel->updateAvatarProfile($data['form']);
    
                        if ($row) {
                            redirect(BASEURL.'/profile');
                        } else {
                            flash("profile", "Something went wrong.");
                            redirect(BASEURL.'/profile');
                        }
                    }
                }
            } else {
                flash("profile", "File cannot be empty");
                redirect(BASEURL.'/profile');
            }
        } else {
            $data['profile'] = $this->userModel->getProfileById($id);
            $path = '../public/assets/avatars/';
            $row = $this->userModel->deleteAvatarProfile($data['profile']['id']);
            if ($row) {
                if (is_file($path.$data['profile']['avatar'])) {
                    unlink($path.$data['profile']['avatar']);
                }
                redirect(BASEURL.'/profile');
            } else {
                flash("profile", "Something went wrong.");
                redirect(BASEURL.'/profile');
            }
        }
    }
}