<?php
    class pts_model extends CI_Model{
        function rows($username){
            $this->db->where(array('username'=>$username)); 
        }
        function login($data){
            $user=$this->db->get_where('user',['username'=>$data['usn']])->row_array();

            if($user){
                if(password_verify($data['pw'],$user['password'])){
                    if($user['role']==1){
                        $this->session->set_userdata('username',$data['usn']);
                        $this->session->set_userdata('role',$user['role']);
                        $this->session->set_userdata('is_login',true);

                        redirect(base_url('index.php/home'));
                        return TRUE;
                    }
                    else if($user['role']==0){
                        $this->session->set_userdata('username',$data['usn']);
                        $this->session->set_userdata('role',$user['role']);
                        $this->session->set_userdata('is_login',true);

                        redirect(base_url('index.php/home/admin'));
                        return TRUE;
                    }
                    else{
                        return FALSE;
                    }
                }
                else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center fs-6 w-100">Password incorrect</div>');
                    redirect('pts/login');
                    return FALSE;
                }
            }
            else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center fs-6 w-100">User is not registered</div>');
                redirect('pts/login');
            }
        }
        function register($data){
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center fs-6">Register Succes</div>');
            redirect('pts/login');
        }
        
        function cek_login(){
            if (empty($this->session->userdata('is_login'))||$this->session->userdata('is_login')==false) {
                redirect('pts/login');
            }
        }
        function book($data,$key){
            $query=$this->db->get_where('book',['kursi'=>$data['kursi'],'jadwal'=>$data['jadwal'],'waktu'=>$data['waktu']]);

            if($query->num_rows()==0){
                $this->db->insert('book',$data);
                $this->session->set_flashdata('scs_msg','Pesanan anda berhasil');
                redirect('home/index');
            }else{
                $this->session->set_flashdata('error_msg','Kursi di waktu yang sama sudah dipesan');
                redirect('home/book/'.$key['slug']);
            }
        }
    }
