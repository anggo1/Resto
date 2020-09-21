<?php
class Pengguna extends AUTH_Controller {
	function __construct(){
		parent::__construct();
		
		$this->load->model('M_pengguna');
		$this->load->library('upload');
	}


	function index(){
		$kode=$this->session->userdata('idadmin');
        
		$data['userdata'] 	= $this->userdata;
		$data['user']=$this->M_pengguna->get_pengguna_login($kode);
		$data['data']=$this->M_pengguna->get_all_pengguna();
		$data['level']=$this->M_pengguna->get_level();
        
		$data['page'] 			= "Pengguna";
		$data['judul'] 			= "Daftar Pengguna";
		$data['deskripsi'] 		= "Manage Data Pengguna";
        
		$this->template->views('admin/v_pengguna',$data);
	}

	function simpan_pengguna(){
				$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['max_size'] = '2024'; //maksimum besar file 1M
	            $config['max_width']  = '1280'; //lebar maksimum 1288 px
	            $config['max_height']  = '1024'; //tinggi maksimu 1000 px
	            $config['file_name'] = $nmfile; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        $gambar=$gbr['file_name'];
	                        $nama=str_replace("'", "", $this->input->post('nama'));
	                        $jenkel=str_replace("'", "", $this->input->post('jenkel'));
	                        $username=str_replace("'", "", $this->input->post('username'));
	                        $password=str_replace("'", "", $this->input->post('password'));
                            $konfirm_password=str_replace("'", "", $this->input->post('password2'));
                            $email=str_replace("'", "", $this->input->post('email'));
                            $nohp=str_replace("'", "", $this->input->post('kontak'));
     						if ($password <> $konfirm_password) {
     							echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Password dan Ulangi Password yang Anda masukan tidak sama.</div>');
	               				redirect('Pengguna');
     						}else{
	               				$this->M_pengguna->simpan_pengguna($nama,$jenkel,$username,$password,$email,$nohp,$gambar);
	                    		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna <b>'.$nama.'</b> Berhasil ditambahkan ke database.</div>');
	               				redirect('Pengguna');
	               			}
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna tidak dapat ditambahkan, file gambar yang Anda masukkan terlalu besar.</div>');
	                    redirect('Pengguna');
	                }
	                 redirect('Pengguna');
	            }else{
	            	$nama=str_replace("'", "", $this->input->post('nama'));
	                $jenkel=str_replace("'", "", $this->input->post('jenkel'));
	                $username=str_replace("'", "", $this->input->post('username'));
	                $password=str_replace("'", "", $this->input->post('password'));
                    $konfirm_password=str_replace("'", "", $this->input->post('password2'));
                    $email=str_replace("'", "", $this->input->post('email'));
                    $nohp=str_replace("'", "", $this->input->post('kontak'));
	            	if ($password <> $konfirm_password) {
     					echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Password dan Ulangi Password yang Anda masukan tidak sama.</div>');
	               		redirect('Pengguna');
     				}else{
	               		$this->M_pengguna->simpan_pengguna_tanpa_gambar($nama,$jenkel,$username,$password,$email,$nohp);
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna <b>'.$nama.'</b> Berhasil ditambahkan ke database.</div>');
	               		redirect('Pengguna');
	               	}
	            } 

	}

	function update_pengguna(){
				$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['max_size'] = '2024'; //maksimum besar file 2M
	            $config['max_width']  = '1280'; //lebar maksimum 1288 px
	            $config['max_height']  = '1024'; //tinggi maksimu 1000 px
	            $config['file_name'] = $nmfile; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        $gambar=$gbr['file_name'];
	                        $kode=str_replace("'", "", $this->input->post('kode'));
	                        $nama=str_replace("'", "", $this->input->post('nama'));
	                        $jenkel=str_replace("'", "", $this->input->post('jenkel'));
	                        $username=str_replace("'", "", $this->input->post('username'));
	                        $password=str_replace("'", "", $this->input->post('password'));
                            $konfirm_password=str_replace("'", "", $this->input->post('password2'));
                            $email=str_replace("'", "", $this->input->post('email'));
                            $nohp=str_replace("'", "", $this->input->post('kontak'));

                            if (empty($password) && empty($konfirm_password)) {
                            	$this->M_pengguna->update_pengguna_tanpa_pass($kode,$nama,$jenkel,$username,$password,$email,$nohp,$gambar);
	                    		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna <b>'.$nama.'</b> Berhasil diupdate.</div>');
	               				redirect('Pengguna');
     						}elseif ($password <> $konfirm_password) {
     							echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Password dan Ulangi Password yang Anda masukan tidak sama.</div>');
	               				redirect('Pengguna');
     						}else{
	               				$this->M_pengguna->update_pengguna($kode,$nama,$jenkel,$username,$password,$email,$nohp,$gambar);
	                    		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna <b>'.$nama.'</b> Berhasil diupdate.</div>');
	               				redirect('Pengguna');
	               			}
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna tidak dapat diupdate, file gambar yang Anda masukkan terlalu besar.</div>');
	                    redirect('Pengguna');
	                }
	                 redirect('Pengguna');
	            }else{
	            	$kode=str_replace("'", "", $this->input->post('kode'));
	            	$nama=str_replace("'", "", $this->input->post('nama'));
	                $jenkel=str_replace("'", "", $this->input->post('jenkel'));
	                $username=str_replace("'", "", $this->input->post('username'));
	                $password=str_replace("'", "", $this->input->post('password'));
                    $konfirm_password=str_replace("'", "", $this->input->post('password2'));
                    $email=str_replace("'", "", $this->input->post('email'));
                    $nohp=str_replace("'", "", $this->input->post('kontak'));
	            	if (empty($password) && empty($konfirm_password)) {
                       	$this->M_pengguna->update_pengguna_tanpa_pass_dan_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp);
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna <b>'.$nama.'</b> Berhasil diupdate.</div>');
	               		redirect('Pengguna');
     				}elseif ($password <> $konfirm_password) {
     					echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Password dan Ulangi Password yang Anda masukan tidak sama.</div>');
	               		redirect('Pengguna');
     				}else{
	               		$this->M_pengguna->update_pengguna_tanpa_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp);
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna <b>'.$nama.'</b> Berhasil diupdate.</div>');
	               		redirect('Pengguna');
	               	}
	            } 

	}

	function hapus_pengguna(){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$this->M_pengguna->hapus_pengguna($kode);
	    echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna <b>'.$nama.'</b> Berhasil dihapus dari database.</div>');
	    redirect('Pengguna');
	}

	function reset_password(){
   
        $id=$this->uri->segment(4);
        $get=$this->M_pengguna->getusername($id);
        if($get->num_rows()>0){
            $a=$get->row_array();
            $b=$a['pengguna_username'];
        }
        $pass=rand(123456,999999);
        $this->M_pengguna->resetpass($id,$pass);
        echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Username : <b>'.$b.'</b> <br/> Password baru : <b>'.$pass.'</b></div>');
	    redirect('Pengguna');
   
    }


}