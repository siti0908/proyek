<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class upload extends CI_Controller {

	public function index()
	$this->form_validation->set_rules('proposal','laporan','dpl','buku_bimbingan','required');

			$data['title']="belajar cara upload file lebih dari satu";
            $config['upload_path']   ='./assets/file/proposal';
            $config['allowed_types'] = 'jpg|jpeg|gif|pdf|docx';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload',$config);

            //proposal
            if(!empty($_FILES['proposal']['name'])){
               $this->upload->do_upload('proposal');
               $data=$this->upload->data();
               $proposal=$data['file_name'];
            }
            //laporan
            if(!empty($_FILES['laporan']['name'])){
               $this->upload->do_upload('laporan');
               $data=$this->upload->data();
               $laporan=$data['file_name'];
            }
            //dpl
            if(!empty($_FILES['dpl']['name'])){
               $this->upload->do_upload('dpl');
               $data=$this->upload->data();
               $dpl=$data['file_name'];
            }

             //buku_bimbingan
            if(!empty($_FILES['buku_bimbingan']['name'])){
               $this->upload->do_upload('buku_bimbingan');
               $data=$this->upload->data();
               $buku_bimbingan=$data['file_name'];
            }

            if ($this->form_validation->run())
            {
                $name=$this->input->post('name',TRUE);
                $data=['name'=>$name,'proposal'=>$proposal, 'laporan'=>$laporan, 'dpl'=>$dpl, 'buku_bimbingan'=>$buku_bimbingan];
                $insert=$this->db->insert('uplod',$data);
                if ($insert){
                    $this->session->set_flashdata('pesan','<div class="alert alert-seccess">Data Berhasil Disimpan</div>');
                    redirect('upload');
                }
            }