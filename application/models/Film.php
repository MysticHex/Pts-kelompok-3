<?php
    class Film extends CI_Model{
        function tampil_data(){
            return $this->db->get('film');
        }
        function book($query){
            return $this->db->get_where('film',$query);
        }
        function jadwal($query){
            $this->db->where($query);
            $this->db->where('tanggal_main >=',date("Y-m-d"));
            return $this->db->get('jadwal_film');
        }
        function jadwal_lengkap($query){
            $this->db->where($query);
            $this->db->order_by("tanggal_main", "asc");
            return $this->db->get('jadwal_film');
        }
        function find_schedule($id_data){
            $this->db->where($id_data);
            return $this->db->get('jadwal_film');
        }
        function active_tickets($user){
            // date_default_timezone_set("Asia/Jakarta");
            $date=date("Y-m-d");
            $array = array('jadwal' => $date,'username' => $user);
            $this->db
            ->where('jadwal >=',$date)
            ->where('username',$user);
            return $this->db->get('book');
        }
        function tickets($user){
            $array = array('username' => $user);
            $this->db->order_by("jadwal", "asc");
            return $this->db->get_where('book',$array);
        }
        function insert_jadwal($data){
            $this->db->insert('jadwal_film',$data);
            redirect('home/admin');
        }
        function insert_film($data){
            $this->db->insert('film',$data);
            $this->session->set_flashdata('scs_msg',"Berhasil di input");
            redirect('home/admin');
        }
        function delete_film($data){
            $this->db->where($data);
            $this->db->delete('film');
            $this->session->set_flashdata('scs_msg','Data berhasil dihapus');
            redirect('home/admin');
        }
        function delete_schedule($slug,$data){
            $this->db->where($data);
            $this->db->where($data);
            $this->db->delete('jadwal_film');
            $this->session->set_flashdata('scs_msg','Data berhasil dihapus');
            redirect('home/list_jadwal/'.$slug);
        }
        function update_jadwal($id_data,$data,$slug){
            $this->db->where($id_data);
            $update=$this->db->update('jadwal_film',$data);

            if($update){
                $this->session->set_flashdata('scs_msg','Data berhasil diupdate');
                redirect('home/list_jadwal/'.$slug);
            }
            else{
                $this->session->set_flashdata('error_msg','Data tidak berhasil diupdate');
                redirect('home/list_jadwal/'.$slug);
            }
        }
    }
