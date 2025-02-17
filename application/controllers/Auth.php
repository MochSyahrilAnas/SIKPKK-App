<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Auth_model', '', TRUE);
    $this->load->model('Users_model', '', TRUE);

    require APPPATH . 'libraries/phpmailer/src/Exception.php';
    require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
    require APPPATH . 'libraries/phpmailer/src/SMTP.php';
  }
  public function index()
  {
    if ($this->session->userdata('email')) {
      redirect('users/profile');
    }
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false) {
      $data['judul'] = 'Login Page | SIKPKK';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      //validasi success
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

    //jika usernya ada
    if ($user) {
      // jika usernya aktif
      if ($user['is_active'] == 1) {
        // cek password
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          redirect('dashboard');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered</div>');
      redirect('auth');
    }
  }

  public function registration()
  {
    if ($this->session->userdata('email')) {
      redirect('users/profile');
    }

    $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]', [
      'is_unique' => 'This email has already registered!'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
      'matches' => 'Password dont matches!',
      'min_length' => 'Password too short!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['judul'] = 'Registration Page | SIKPKK';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registration');
      $this->load->view('templates/auth_footer');
    } else {
      $this->Auth_model->register();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
    redirect('auth');
  }

  public function forgotPassword()
  {
    $data['judul'] = 'Forgot Password Page | SIKPKK';
    $this->load->view('templates/auth_header', $data);
    $this->load->view('auth/forgot_password');
    $this->load->view('templates/auth_footer');
  }

  public function respass()
  {
    // PHPMailer object

    // Form Validation

    $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('required' => 'Email tidak boleh kosong !'));
    $this->form_validation->set_rules('password1', 'New Password', 'required', array('required' => 'Password tidak boleh kosong !'));
    $this->form_validation->set_rules('password2', 'Repeat Password', 'required|matches[password1]', array('required' => 'Konfirmasi Password tidak boleh kosong !', 'matches[password1]' => 'Konfirmasi Password tidak sesuai !'));

    if ($this->form_validation->run() == true) {
      $email = $this->input->post('email');
      $data = $this->Users_model->getuser($email);
      $new_password = $this->input->post('password1');
      if ($data->email != null) {
        $response = false;
        $mail = new PHPMailer();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'syahrilanas09@gmail.com'; // user email anda
        $mail->Password = 'fcqoxpcrcxurroxj'; // diisi dengan App Password yang sudah di generate
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->isHTML(true);
        $mail->setFrom('syahrilanas09@gmail.com', 'SIKPKK'); // user email anda
        $mail->addReplyTo('syahrilanas09@gmail.com', ''); //user email anda

        // Email subject
        $mail->Subject = 'New Password | SIKPKK'; //subject email

        // Add a recipient
        $mail->addAddress($data->email); //email tujuan pengiriman email

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "<p><b>Password berhasil diubah!</b><br>Jangan beri tahu kepada siapapun Password Anda!. <br> Silahkan Login Kembali dengan Password baru Anda!</p> 
        <br> 
        <p>Terimakasih. <b>"; // isi email
        $mail->Body = $mailContent;

        // Send email
        if (!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
          $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                    Reset Password Berhasil!
                  </div>');
          $email = $data->email;
          $this->Users_model->newpass($new_password, $email);
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
                masukan email dengan benar!
              </div>');
        redirect('auth/forgotpassword');
      }
    } else {
      $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">
            ada kesalahan pengisian!
          </div>');
      redirect('auth/forgotpassword');
    }

    redirect('auth/forgotpassword');
  }
}
