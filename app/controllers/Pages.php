<?php
    class Pages extends Controller
    {
        public function index($data = [])
        {
            $this->view('pages/index');
        }

        public function register()
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'email_err' => '',
                'username' => trim($_POST['username']),
                'username_err' => '',
                'password' => trim($_POST['password']),
                'password_err' => '',
                'rpassword' => trim($_POST['rpassword']),
                'rpassword_err' => ''
            ];
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if (empty($data['email']))
                    $data['email_err'] = 'Please enter your mail';
                else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
                    $data['email_err'] = 'Please enter valide mail';
                else if ($this->model("User")->findUserByEmail($data['email']))
                    $data['email_err'] = 'This mail already existe';
                
                if (empty($data['username']))
                    $data['username_err'] = 'Please enter your username';
                
                if (empty($data['password']))
                    $data['password_err'] = 'Please enter your password';
                else if (strlen($data['password']) < 6)
                    $data['password_err'] = 'Password should be at least 6';
                
                if (empty($data['rpassword']))
                    $data['rpassword_err'] = 'Please repeat your password';
                else if ($data['password'] !== $data['rpassword'] )
                    $data['rpassword_err'] = "Password doesn't match";
                if (empty($data['rpassword_err']) && empty($data['password_err']) && empty($data['email_err'])){
                    $data['password'] = hash('sha256', $data['password']);
                    $this->model("User")->insertUser($data);
                    header('location: ' . URLROOT . 'pages/login');
                }
                else
                    $this->view('pages/register', $data);
            }else        
                $this->view('pages/register');

        }

        public function login()
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'email_err' => '',
                'password' => trim($_POST['password']),
                'password_err' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if (empty($data['email']))
                    $data['email_err'] = 'Please enter your mail';
                else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
                    $data['email_err'] = 'Please enter valide mail';
                else if ($this->model("User")->findUserByEmail($data['email']) === false)
                    $data['email_err'] = 'User not found';
                
                if (empty($data['password']))
                    $data['password_err'] = 'Please enter your password';
                
                if (empty($data['password_err']) && empty($data['email_err']))
                {
                    if ($this->model("User")->checkUser($data['email'], hash('sha256', $data['password'])))
                        header('location: '. URLROOT);
                    else
                        $data['password_err'] = 'Incorrect password';
                    $this->view('pages/login', $data);
                }
                else
                    $this->view('pages/login', $data);
            }
            else
                $this->view('pages/login');
        }

        public function about($data = [])
        {
            echo 'about' . $data[0];
        }
    }
    