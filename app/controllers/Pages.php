<?php
    class Pages extends Controller
    {
        public function index($data = [])
        {
            if (!islogged())
                redirect('user/login');
            $this->view('pages/index');
        }

        public function about($data = [])
        {
            echo 'about' . $data[0];
        }

        public function mail($data = [])
        {
            echo 'mail' . $data[0];
            ?>
            <form action="<?=URLROOT?>pages/send" POST="GET">
                <button>
                    Send
                </button>
            </form>

            <?php
        }
        public function send()
        {
           // use PHPMailer\PHPMailer\PHPMailer;
            //use PHPMailer\PHPMailer\Exception;
            echo APPROOT.'helpers/'.'PHPMailer/src/Exception.php';
            require_once APPROOT.'helpers/'.'PHPMailer/src/Exception.php';
            require_once APPROOT.'helpers/'.'PHPMailer/src/PHPMailer.php';
            require_once APPROOT.'helpers/'.'PHPMailer/src/SMTP.php';

            $email = new PHPMailer(true);
            echo "send";

        }
    }
    