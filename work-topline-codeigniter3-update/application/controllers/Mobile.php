<?php

// ==================================
// Mobile API
// ==================================

defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Mobile extends RestController {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}

	// Menampilkan data game
	// [GET] Demo : https://hecollab.my.id/adr/topline/Mobile/games
	function games_get() {
		$data = $this->db->get('tbl_games')->result();
		$this->response([
			"status" => true,
			"message" => "Berhasil meminta data",
			"data" => $data
		], 200);
	}

	// Menampilkan data pembayaran
	// [GET] Demo : https://hecollab.my.id/adr/topline/Mobile/payments
	function payments_get() {
		$data = $this->db->get('tbl_pembayaran')->result();
		$this->response([
			"status" => true,
			"message" => "Berhasil meminta data",
			"data" => $data
		], 200);
	}

	// Menampilkan data nominal top up
	// [GET] Demo : https://hecollab.my.id/adr/topline/Mobile/nominal
	function nominal_get() {
		$id = $this->get('id');
		if ($id == '') {
			$this->response([
				"status" => false,
				"error" => "id tidak boleh kosong"
			], 403);
		} else {
			$this->db->where('game_id', $id);
			$data = $this->db->get('tbl_topup_nominal')->result();
			$this->response([
				"status" => true,
				"message" => "Berhasil meminta data",
				"data" => $data
			], 200);
		}
	}

	// =======================
	// Auth API
	// =======================

	// API untuk login user
	// [POST] Demo : https://hecollab.my.id/adr/topline/Mobile/login
	function login_post() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$get_user = $this->db->get_where('user', ['username' => $username]);

		// Verifikasi username
		if ($get_user->num_rows() == 0) {
			$this->response([
				"status" => false,
				"error" => "User tidak ditemukan!"
			], 403);
		}
		$user = $get_user->row();
		
		// Verifikasi password
		if (password_verify($password, $user->password)) {
			// Generate JWT
			$token = array(
				"iss" => 'apprestservice',
				"aud" => 'mobile-user',
				"iat" => time(),
				"nbf" => time(),
				"exp" => time() + 604800, // 7 Hari
				"data" => $username
			);       
		
			$jwt = JWT::encode($token, $this->configToken()['secretkey'], 'HS256');
			$this->response([
				"status" => true,
				"message" => "Login berhasil!",
				"data" => ["token" => $jwt]
			], 200);
		} else {
			$this->response([
				"status" => false,
				"error" => "Password tidak valid!"
			], 403);
		}
	}

	// API untuk daftar user
	// [POST] Demo : https://hecollab.my.id/adr/topline/Mobile/register
	function register_post() {
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$get_user = $this->db->get_where('user', ['username' => $username]);

		// Verifikasi username
		if ($get_user->num_rows() > 0) {
			$this->response([
				"status" => false,
				"message" => "username telah digunakan!"
			], 403);
		}

		// Verifikasi password
		if($password == "") {
			$this->response([
				"status" => false,
				"error" => "Password tidak boleh kosong!"
			], 403);	
		}

		$data = [
			'nama' => $name,
			'username' => $username,
			'password' => password_hash($password, PASSWORD_DEFAULT)
		];
		$insert = $this->db->insert('user', $data);

		// Generate JWT
		$token = array(
			"iss" => 'apprestservice',
			"aud" => 'mobile-user',
			"iat" => time(),
			"nbf" => time(),
			"exp" => time() + 604800, // 7 Hari
			"data" => $username
		);       
	
		$jwt = JWT::encode($token, $this->configToken()['secretkey'], 'HS256');
		$this->response([
			"status" => true,
			"message" => "Daftar berhasil!",
			"data" => ["token" => $jwt]
		], 200);
	}

	// API untuk ganti password user
	// [POST] Demo : https://hecollab.my.id/adr/topline/Mobile/changepassword
	function changepassword_post() {
		// Verifikasi token
		$token = $this->authtoken();
		if (!$token){
			$this->response([
				"status" => false,
				"error" => "Token tidak valid!"
			], 403);
			die();
		}

		$username = $token->data;
		$new_password = $this->input->post('new_password');
		$current_password = $this->input->post('password');

		if ($new_password == "") {
			$this->response([
				"status" => false,
				"error" => "Masukkan password baru!"
			], 403);
		}
		
		$get_user = $this->db->get_where('user', ['username' => $username]);

		// Verifikasi username
		if ($get_user->num_rows() == 0) {
			$this->response([
				"status" => false,
				"error" => "User tidak ditemukan!"
			], 403);
		}
		$user = $get_user->row();
		
		// Verifikasi password
		if (password_verify($current_password, $user->password)) {
			$user->password = password_hash($new_password, PASSWORD_DEFAULT);
			$this->db->update('user', $user, ['id' => $user->id]);

			$this->response([
				"status" => true,
				"message" => "Berhasil ganti password!",
				"data" => null
			], 200);
		} else {
			$this->response([
				"status" => false,
				"error" => "Password tidak valid!"
			], 403);
		}
	}

	// API untuk hapus user
	// [GET] Demo : https://hecollab.my.id/adr/topline/Mobile/deleteaccount
	function deleteaccount_get() {
		// Verifikasi token
		$token = $this->authtoken();
		if (!$token){
			$this->response([
				"status" => false,
				"error" => "Token tidak valid!"
			], 403);
			die();
		}
		$username = $token->data;
		$this->db->where('username', $username);
		$this->db->delete('user');
		
		$this->response([
			"status" => true,
			"message" => "Berhasil hapus akun!",
			"data" => null
		], 200);
	}

	// API untuk detail user
	// [GET] Demo : https://hecollab.my.id/adr/topline/Mobile/account
	function account_get() {
		// Verifikasi token
		$token = $this->authtoken();
		if (!$token){
			$this->response([
				"status" => false,
				"error" => "Token tidak valid!"
			], 403);
			die();
		}

		$username = $token->data;
		$this->db->where('username', $username);
		$get_users = $this->db->get('tbl_user')->result();
		try{
			$user = $get_users[0];
			$this->response([
				"status" => true,
				"message" => "Berhasil meminta data!",
				"data" => [
					"id" => $user->id,
					"username" => $user->username,
					"name" => $user->nama
				]
			], 200);
		} catch (\Exception $e) {
			$this->response([
				"status" => false,
				"error" => "User tidak valid!"
			], 403);
		}
	}

	// =======================
	// Transactions API
	// =======================

	// API untuk mendapatkan riwayat transaksi user
	// [GET] Demo : https://hecollab.my.id/adr/topline/Mobile/transactions
	function transactions_get() {
		// Verifikasi token
		$token = $this->authtoken();
		if (!$token){
			$this->response([
				"status" => false,
				"error" => "Token tidak valid!"
			], 403);
			die();
		}

		$username = $token->data;
		$this->db->where('username', $username);
		$data = $this->db->get('tbl_riwayat')->result();
		
		$this->response([
			"status" => true,
			"message" => "Berhasil meminta data",
			"data" => $data
		], 200);
	}

	// API untuk membuat transaksi
	// [POST] Demo : https://hecollab.my.id/adr/topline/Mobile/transaction
	function transaction_post() {
		// Verifikasi token
		$token = $this->authtoken();
		if (!$token){
			$this->response([
				"status" => false,
				"error" => "Token tidak valid!"
			], 403);
			die();
		}

		$game_id = $this->input->post('game_id');
		$game_name = $this->input->post('game_name');
		$jumlah_uang = $this->input->post('order_value');
		$satuan = $this->input->post('currency');

		if ($game_id == "") {
			$this->response([
				"status" => false,
				"error" => "game_id tidak boleh kosong!"
			], 403);
		}

		if ($game_name == "") {
			$this->response([
				"status" => false,
				"error" => "game_name tidak boleh kosong!"
			], 403);
		}

		if ($jumlah_uang == "") {
			$this->response([
				"status" => false,
				"error" => "order_value tidak boleh kosong!"
			], 403);
		}

		if ($satuan == "") {
			$this->response([
				"status" => false,
				"error" => "currency tidak boleh kosong!"
			], 403);
		}

		$now = date("Y-m-d h:i:s");
		$username = $token->data;

		$data = [
			'username' => $username,
			'id_game' => $game_id,
			'game' => $game_name,
			'tgl_pembelian' => $now,
			'jumlah_uang' => $jumlah_uang,
			'satuan' => $satuan,
		];
		$insert = $this->db->insert('tbl_riwayat', $data);
		
		$this->response([
			"status" => true,
			"message" => "Berhasil membuat transaksi",
			"data" => null
		], 200);
	}

	// =======================
	// JWT Function
	// =======================
	function configToken() {
		$cnf['exp'] = 604800; // 7 Hari
		$cnf['secretkey'] = 'Topline';
		return $cnf;
	}

	public function authtoken(){
		$secret_key = $this->configToken()['secretkey'];
		$token = null;
		$header = $this->input->request_headers();

		if (!array_key_exists("Authorization", $header)) {
			return false;
		}
		try{
			$arr = explode(" ", $header['Authorization']);
			$token = $arr[1];
		} catch (\Exception $e) {
			// Token tidak Sesuai
			return false;
		}

		if ($token){
			try{
				$decoded = JWT::decode($token, new Key($this->configToken()['secretkey'], 'HS256'));          
				return $decoded;
			} catch (\Exception $e) {
				// Token tidak Sesuai
				return false;
			}
		}
	}

}