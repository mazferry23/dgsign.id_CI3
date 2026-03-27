<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_export extends CI_Model {
    // public function data_tamua($id_event)
	// {
    //     $this->db->where('id_event',$id_event);	
        
    //     return $this->db->get('tb_rsvp')->result();
    // }
    public function data_tamu($id_event,$id_role)
	{
       //versi CI 
        //     $this->db->select('*');
    //      $this->db->join('tb_user', 'tb_user.id_event = tb_rsvp.id_event');
    //  $this->db->from('tb_rsvp');
    // $this->db->where('tb_rsvp.id_event',$id_event);
    // return $this->db->get()->result();

    //versi query
        if($id_role == 1){
            //return $this->db->query("SELECT * FROM `tb_rsvp` JOIN `tb_user` ON `tb_user`.`id_event` = `tb_rsvp`.`id_event` WHERE `tb_rsvp`.`status_data` = 'show' ")->result();
            //return $this->db->query("SELECT * FROM `tb_rsvp` JOIN `tb_user` ON `tb_user`.`id_event` = `tb_rsvp`.`id_event` WHERE `tb_rsvp`.`status_data` = 'show' ")->result();
            return $this->db->query("SELECT * FROM `tb_rsvp` WHERE `status_data` = 'show' ")->result();
        }else{
            //return $this->db->query("SELECT * FROM `tb_rsvp` JOIN `tb_user` ON `tb_user`.`id_event` = `tb_rsvp`.`id_event` WHERE `tb_rsvp`.`id_event` = '$id_event' and `tb_rsvp`.`status_data` = 'show' ")->result();

            return $this->db->query("SELECT * FROM `tb_rsvp` WHERE `id_event` = '$id_event' and `status_data` = 'show' ")->result();
        }
    
    }

    public function data_event($id_event,$id_role)
	{
        if($id_role == 1){
            return $this->db->query("SELECT * FROM `tb_event` where `status_data`='show'")->result();
        }else{
            return $this->db->query("SELECT * FROM `tb_event` where `id_event`='$id_event' and `status_data`='show'")->result();
        }
        
    }

    public function calc_undangan_hadir($id_event,$id_role)
	{
        if($id_role == 1){
            return $this->db->query("SELECT COUNT(date_cekin) as undangan_hadir FROM `tb_rsvp` where date_cekin !='0000-00-00 00:00:00' and `status_data`='show'")->row();
        }else{
            return $this->db->query("SELECT COUNT(date_cekin) as undangan_hadir FROM `tb_rsvp` where date_cekin !='0000-00-00 00:00:00' and `id_event`='$id_event' and `status_data`='show'")->row();
        }
        
    }
    public function calc_jml_undangan($id_event,$id_role)
	{
        if($id_role == 1){
            return $this->db->query("SELECT COUNT(date_cekin) as total_undangan FROM `tb_rsvp` where `status_data`='show'")->row();
        }else{
            return $this->db->query("SELECT COUNT(date_cekin) as total_undangan FROM `tb_rsvp` where `id_event`='$id_event' and `status_data`='show'")->row();
        }
        
    }
    public function calc_tamu_hadir($id_event,$id_role)
	{
        if($id_role == 1){
            return $this->db->query("SELECT SUM(status_cekin) as tamu_hadir FROM `tb_rsvp` where date_cekin !='0000-00-00 00:00:00' and `status_data`='show'")->row();
        }else{
            return $this->db->query("SELECT SUM(status_cekin) as tamu_hadir FROM `tb_rsvp` where date_cekin !='0000-00-00 00:00:00' and `id_event`='$id_event' and `status_data`='show'")->row();
        }
        
    }
    public function calc_jml_tamu($id_event,$id_role)
	{
        if($id_role == 1){
            return $this->db->query("SELECT SUM(tamu) as total_tamu FROM `tb_rsvp` where `status_data`='show'")->row();
        }else{
            return $this->db->query("SELECT SUM(tamu) as total_tamu FROM `tb_rsvp` where `id_event`='$id_event' and `status_data`='show'")->row();
        }
        
    }
    public function calc_jml_sovenir($id_event,$id_role)
	{
        if($id_role == 1){
            return $this->db->query("SELECT SUM(status_sovenir) as jml_sovenir FROM `tb_rsvp` where date_cekout !='0000-00-00 00:00:00' and `status_data`='show'")->row();
        }else{
            return $this->db->query("SELECT SUM(status_sovenir) as jml_sovenir FROM `tb_rsvp` where date_cekout !='0000-00-00 00:00:00' and `id_event`='$id_event' and `status_data`='show'")->row();
        }
        
    } 
    public function tambah_tamu($data,$rand)
	{
        $this->db->insert('tb_rsvp',$data);	
    }

    public function edit_tamu($data,$rand)
	{
        $this->db->where('id', $rand);
        $this->db->update('tb_rsvp', $data);        
        //return $this->db->get('tb_rsvp')->result();
    }

    public function delete_tamu($data,$id)
	{
        $this->db->where('id', $id);
        $this->db->update('tb_rsvp', $data);        
        //return $this->db->get('tb_rsvp')->result();
    }

    public function reset_data($data,$event)
	{
        $this->db->where('id_event', $event);
        $this->db->where('status_data', 'show');
        $this->db->update('tb_rsvp', $data);        
        //return $this->db->get('tb_rsvp')->result();
    }

    public function update_file_status($data,$rand)
	{
        $this->db->where('id', $rand);
        $this->db->update('tb_rsvp', $data);        
        //return $this->db->get('tb_rsvp')->result();
    }

    public function data_tamu_row($id_event,$id_role)
	{
        if($id_role == 1){
            //return $this->db->query("SELECT * FROM `tb_rsvp` JOIN `tb_user` ON `tb_user`.`id_event` = `tb_rsvp`.`id_event` WHERE `tb_rsvp`.`status_data` = 'show' ")->row();
            return $this->db->query("SELECT * FROM `tb_user` WHERE `status_data` = 'show' ")->row();
          }else{
            return $this->db->query("SELECT * FROM `tb_user` WHERE `id_event` = '$id_event' and `status_data` = 'show' ")->row();        
        }
        
    }

    public function import_tamu($data)
	{
        $this->db->insert_batch('tb_rsvp', $data);
    }

    function get_row_tamu($id)
    {
        return $this->db->query("SELECT 
        a.id, a.nama, a.alamat, a.telepon, a.id_event, a.file_einvit, a.file_qrcode, a.name_selfie, b.id_event, b.nama_event, b.lokasi_event, b.alamat_event, b.tanggal_event, b.tanggal_event_end, b.lokasi_akad, b.alamat_akad, b.tanggal_akad, b.tanggal_akad_end FROM tb_rsvp a, tb_event b WHERE a.id_event=b.id_event AND a.id='$id'")->row();
    }

    function get_row_pesan($caption)
    {
        return $this->db->query("SELECT * FROM `tb_template_pesan` WHERE `id_template` = '$caption'")->row();
    }

    function data_pesan($id_event,$id_role)
    {
        if($id_role == 1){
            return $this->db->query("SELECT * FROM `tb_template_pesan`")->result();
        }else{
            return $this->db->query("SELECT * FROM `tb_template_pesan` WHERE `id_event` = '8'")->result();
        }

    }

    function multiple_delete_tamu($id)
    {
        //$this->db->where('id', $id);
        //$this->db->delete('tb_rsvp');
        $this->db->query("UPDATE `tb_rsvp` SET `status_data` = 'deleted' WHERE `id` = '$id'");
    }

    function send_wa($id)
    {
        //$this->db->where('id', $id);
        //$this->db->delete('tb_rsvp');
        $this->db->query("UPDATE `tb_rsvp` SET `status_data` = 'deleted' WHERE `id` = '$id'");
    }
    
}

?>