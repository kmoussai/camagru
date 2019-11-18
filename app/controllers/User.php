<?php 
    class User extends Controller
    {
        public function index()
        {
            $this->login();
        }

        public function register()
        {
            if (islogged())
                redirect('');
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
                else if ($this->model("m_user")->findUserByEmail($data['email']))
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
                    $this->model("m_user")->insertUser($data);
                    redirect('user/login');
                }
                else
                    $this->view('user/register', $data);
            }else        
                $this->view('user/register');

        }

        public function login()
        {
            if (islogged()){
                redirect('');
            }
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
                else if ($this->model("m_user")->findUserByEmail($data['email']) === false)
                    $data['email_err'] = 'User not found';
                
                if (empty($data['password']))
                    $data['password_err'] = 'Please enter your password';
                
                if (empty($data['password_err']) && empty($data['email_err']))
                {
                    if ($this->model("m_user")->checkUser($data['email'], hash('sha256', $data['password'])))
                    {
                        $this->createUserSession($this->model("m_user")->findUserByEmail($data['email']));
                        redirect("");
                    }
                    else
                        $data['password_err'] = 'Incorrect password';
                    $this->view('user/login', $data);
                }
                else
                    $this->view('user/login', $data);
            }
            else
                $this->view('user/login');
        }

        public function edit()
        {
            if (!islogged()){
                redirect('');
            }
            $this->view('user/edit');
        }

        public function logout()
        {
            unset($_SESSION['user_id']);
            session_destroy();
            redirect('user/login');
        }

        public function createUserSession($user)
        {
          //  session_start();
            $_SESSION["user_id"] = $user->id;
        }
       
    }
