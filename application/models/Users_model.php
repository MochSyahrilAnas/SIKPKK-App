<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{

	public function read()
	{
		$query = $this->db->get('tbl_user');
		return $query->result();
	}

	public function read_by($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('tbl_user');
		return $query->row();
	}

	public function read_role($role_id)
	{
		$this->db->where('role_id', $role_id);
		$query = $this->db->get('tbl_user');
		return $query->result();
	}

	public function encrypt($id)
	{
		$data = $this->read_by($id);
		$this->db->where('id', $id);
		$this->db->set('password', password_hash($data->password, PASSWORD_DEFAULT));
		$this->db->update('tbl_user');
	}

	public function update($id)
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'type' => $this->input->post('type'),
			'fullname' => $this->input->post('fullname'),
			'no_identitas' => $this->input->post('no_identitas'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tmpt_tgl_lahir' => $this->input->post('tmpt_tgl_lahir'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email'),
		);
		$this->db->where('userid', $id);
		$this->db->update('user', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_user');
	}

	public function register()
	{
		$data = [
			'fullname' => htmlspecialchars($this->input->post('fullname', true)),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'image' => 'default.jpg',
			'address' => 'Bandung',
			'tlpn' => htmlspecialchars($this->input->post('tlpn', true)),
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'role_id' => 2,
			'is_active' => 1,
			'date_created' => time()
		];

		$this->db->insert('tbl_user', $data);
	}

	public function updateverify($id)
	{
		$this->db->set('is_active', '1');
		$this->db->where('id', $id);
		$this->db->update('tbl_user');
	}

	public function getuser($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('tbl_user');
		return $query->row();
	}

	public function getUserby($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('tbl_user');
		return $query->row();
	}

	public function newpass($new_password, $email)
	{
		$pasword_hash = password_hash($new_password, PASSWORD_DEFAULT);
		$this->db->set('password', $pasword_hash);
		$this->db->where('email', $email);
		return $this->db->update('tbl_user');
	}
}
