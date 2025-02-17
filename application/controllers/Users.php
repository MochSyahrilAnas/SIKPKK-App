<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		require APPPATH . 'libraries/phpmailer/src/Exception.php';
		require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH . 'libraries/phpmailer/src/SMTP.php';

		$this->load->library('form_validation');
		$this->load->model('Users_model');
	}

	public function index()
	{
		$role_id = '2';
		$data['tbl_user'] = $this->Users_model->read_role($role_id);
		$data['judul'] = 'USERS | SIKPKK';
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer');
	}

	public function profile()
	{
		$data['judul'] = 'Profile | SIKPKK';
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/profile', $data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$data['judul'] = 'Edit Profile | SIKPKK';
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('fullname', 'Full Name', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/editProfile', $data);
			$this->load->view('templates/footer');
		} else {
			$email = $this->input->post('email');
			$fullname = $this->input->post('fullname');
			$address = $this->input->post('address');

			// cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/profile/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('fullname', $fullname);
			$this->db->set('address', $address);
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_user');

			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
			Your profile has been updated!</div>');
			redirect('users/profile');
		}
	}

	public function changePassword()
	{
		$role_id = '2';
		$data['tbl_user'] = $this->Users_model->read_role($role_id);
		$data['judul'] = 'Change Password | SIKPKK';
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/changepassword', $data);
			$this->load->view('templates/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');

			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				Wrong current password!</div>');
				redirect('users/changepassword');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
					New password cannot be the same as current password!</div>');
					redirect('users/changepassword');
				} else {
					//password sudah ok
					$pasword_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $pasword_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('tbl_user');

					$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
					Password Berhasil Diubah!</div>');
					redirect('users/changepassword');
				}
			}
		}
	}

	public function delete($id)
	{
		$this->Users_model->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto">User successfully Deleted ! </p>');
		} else {
			$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto">User Delete failed ! </p>');
		}
		redirect('users');
	}
	public function verify($id)
	{
		$data = $this->Users_model->read_by($id);
		// $toMail = $this->input->get('email');

		$this->Users_model->updateverify($id);
		$this->sendmail($data);

		// $this->Users_model->encrypt($id);
		$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:600px; padding:10px; margin: auto">You have successfully verified one of the users ! </p>');
		redirect('users');
		// var_dump($data);
	}

	public function sendmail($data)
	{
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

		$mail->Subject = 'Verifikasi Akun';
		$mailContent = 'Akun Anda Telah Terverifikasi <br> Silahkan Login';

		// Email subject
		// $mail->Subject = 'test'; //subject email

		// Add a recipient
		$mail->addAddress($data->email); //email tujuan pengiriman email

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mail->Body = $mailContent;

		// Send email
		if (!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			$this->session->set_flashdata('msg', 'Verifikasi Akun Berhasil!');
			// $toMail = $data->toMail;
		}
	}
}
