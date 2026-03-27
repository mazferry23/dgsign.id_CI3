<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Da\QrCode\QrCode;

use GDText\Box;

use GDText\Color;

use Ramsey\Uuid\Uuid;

class Home extends CI_Controller{

    function __construct(){

        parent::__construct();

        $this->load->model('Client_model');

        $this->load->model('Prokes_model');

        $this->load->model('Prodet_model');

        $this->load->model('Invitations_model');

        $this->load->model('Clientprop_model');

        $this->load->model('Caption_model');

        $this->load->model('Qrtemplate_model');

    }

    public function index(){

        echo "Coming soon...";

    }

    public function submit_whises($client_id,$client_slug){

        $referer = $_SERVER['HTTP_REFERER'];
      	//print_r($_SERVER);
        //die();
        //die($referer);
        $this->Client_model->join('templates','templates.tpl_Id=clients.client_Tpl_Id');
        $client = $this->Client_model->findByID($client_id);
        if(empty($client)){
            //redirect(site_url('invitations/'.$client_id.'\/-\/'.$client_slug));
          	redirect($referer);
        }
        $id_ivt = $this->input->post('ivtsId');
        $undangan = $this->Invitations_model->findFirst(['ivts_Id'=>$id_ivt]);
        //print_r($undangan);
        //print_r($client);
        $insert = [];
        //if(isset($_POST['isPresent']) && $_POST['isPresent']=='on'){
        //$insert['rsvp_IsPresent'] = $this->input->post('isPresent');
        //}else{
        //$insert['rsvp_IsPresent'] = 0;
        //}
        if(!isset($_POST['ivtsId'])){
        //    if(empty($_POST['phoneNo'])){
        //    }else{
                $insert['ivts_NoHp'] = $this->input->post('form_fields[phone]');
        //    }
        //    if(empty($_POST['numberPerson'])){
        //    }else{
                $insert['ivts_RsvpGuest'] = $this->input->post('form_fields[guests]');
        //    }
            $insert['ivts_Uuid'] = Uuid::uuid4();
            $insert['ivts_Name'] = $this->input->post('form_fields[name]');
            $insert['ivts_RsvpRespond'] = $this->input->post('form_fields[confirmation]');
            $insert['ivts_RsvpTime'] = date('Y-m-d H:i:s');
            $insert['ivts_Created'] = date('Y-m-d H:i:s');
            $insert['ivts_RsvpMessage'] = $this->input->post('form_fields[message]');
            $insert['ivts_Address'] = $this->input->post('form_fields[angkatan]');
            $insert['ivts_Client_Id'] = $client_id;
            $insert['ivts_RsvpStatus'] = 'RSVP';
            // if(empty($insert['ivts_RsvpMessage']) || $insert['ivts_RsvpMessage'] == ''){
            //     $insert['ivts_RsvpMessage'] = 'Selamat atas pernikahannya, semoga lancar sampai hari H.';
            // }
            $this->db->insert('invitations',$insert);
            $redir_to = site_url('invitations/'.$client_id.'/'.strtolower(url_title($client->client_Name,'-')).'/'.$insert['ivts_Uuid'] ) ;
        //echo $redir_to;
        //die();
        if(!empty($client->client_CustomDomain)){
          //$referer2 = $client->client_CustomDomain.(isset($undangan->ivts_Uuid ) ? '?uuid='.$insert['ivts_Uuid']:'');
          $referer = $client->client_CustomDomain.'/?uuid='.$insert['ivts_Uuid'];
          //$referer2 = site_url('invitations/'.$client_id.'/'.strtolower(url_title($client->client_Name,'-')).'/'.$insert['ivts_Uuid'] ) ;
        }else{
          $referer = $redir_to;
        }
        //redirect($referer);
        //echo $referer2;
        $qrCode = (new QrCode($insert['ivts_Uuid']))
                ->setSize(250)
                ->setMargin(15);
            $qrCode->writeFile(FCPATH.'public'.DS.'qrcodes' .DS.$insert['ivts_Uuid'].'.png');
            $qr = imagecreatefrompng(FCPATH.'public'.DS.'qrcodes'.DS.$insert['ivts_Uuid'].'.png');
        //}
        header('Content-type: image/png');
        imagejpeg($qr);
        redirect($referer);
        }else{
            //$insert['rsvp_Ivts_Id'] = $this->input->post('ivtsId');
        //    if(empty($_POST['phoneNo'])){
        //    }else{
                $insert['ivts_NoHp'] = $this->input->post('form_fields[phone]');
        //    }
        //    if(empty($_POST['numberPerson'])){
        //    }else{
                $insert['ivts_RsvpGuest'] = $this->input->post('form_fields[guests]');
        //    }
            $insert['ivts_RsvpRespond'] = $this->input->post('form_fields[confirmation]');
            $insert['ivts_RsvpTime'] = date('Y-m-d H:i:s');
            //$insert['ivts_Created'] = date('Y-m-d H:i:s');
            $insert['ivts_Address'] = $this->input->post('ivtsAddress');
            $insert['ivts_RsvpMessage'] = $this->input->post('form_fields[message]');
            $insert['ivts_RsvpStatus'] = 'Undangan';
            //$insert['ivts_Client_Id'] = $client_id;
            // if(empty($insert['ivts_RsvpMessage']) || $insert['ivts_RsvpMessage'] == ''){
            //     $insert['ivts_RsvpMessage'] = 'Selamat atas pernikahannya, semoga lancar sampai hari H.';
            // }
            $this->db->where('ivts_Id',$id_ivt);
            $this->db->update('invitations',$insert);
            $redir_to = site_url('invitations/'.$client_id.'/'.strtolower(url_title($client->client_Name,'-')).'/'.(isset($undangan->ivts_Uuid ) ? $undangan->ivts_Uuid : '') ) ;
            //echo $redir_to;
            //die();
            if(!empty($client->client_CustomDomain)){
              $referer = $client->client_CustomDomain.(isset($undangan->ivts_Uuid ) ? '?uuid='.$undangan->ivts_Uuid : '');
            }else{
              $referer = $redir_to;
            }
            redirect($referer);
        }
    }

    public function submit_whises2($client_id,$client_slug){

        $referer = $_SERVER['HTTP_REFERER'];
      	//print_r($_SERVER);
        //die();
        //die($referer);

        $this->Client_model->join('templates','templates.tpl_Id=clients.client_Tpl_Id');
        $client = $this->Client_model->findByID($client_id);
        if(empty($client)){
            //redirect(site_url('invitations/'.$client_id.'\/-\/'.$client_slug));
          	redirect($referer);
        }
        $id_ivt = $this->input->post('ivtsId');
        $undangan = $this->Invitations_model->findFirst(['ivts_Id'=>$id_ivt]);
        //print_r($undangan);
        //print_r($client);
        $insert = [];
        //if(isset($_POST['isPresent']) && $_POST['isPresent']=='on'){
     //   $insert['rsvp_IsPresent'] = $this->input->post('isPresent');
        //}else{
        //    $insert['rsvp_IsPresent'] = 0;
        //}
        if(!isset($_POST['ivtsId'])){
        //    if(empty($_POST['phoneNo'])){
        //    }else{
                
        //    }
        //    if(empty($_POST['numberPerson'])){
        //    }else{

        //    }
            $insert['ivts_Uuid'] = Uuid::uuid4();
            $insert['ivts_Name'] = $this->input->post('ivts_Name');
            $insert['ivts_Guest'] = $this->input->post('ivts_Guest');
            $insert['ivts_Category'] = $this->input->post('ivts_Category');
            $insert['ivts_Address'] = $this->input->post('ivts_Address');
            $insert['ivts_NoHp'] = $this->input->post('ivts_NoHp');
            $insert['ivts_Seat'] = $this->input->post('ivts_Seat');
            $insert['ivts_GroupFam'] = $this->input->post('form_fields[rencana]');
            $insert['ivts_GroupSub'] = $this->input->post('ivts_GroupSub');
            $insert['ivts_Group'] = $this->input->post('ivts_Group');
            $insert['ivts_Anggota'] = $this->input->post('ivts_Anggota');
            $insert['ivts_RsvpMessage'] = $this->input->post('ivts_RsvpMessage');

            $insert['ivts_RsvpTime'] = date('Y-m-d H:i:s');
            $insert['ivts_Created'] = date('Y-m-d H:i:s');
            ;
            $insert['ivts_Client_Id'] = $client_id;
            $insert['ivts_RsvpStatus'] = 'RSVP';
            // if(empty($insert['ivts_RsvpMessage']) || $insert['ivts_RsvpMessage'] == ''){
            //     $insert['ivts_RsvpMessage'] = 'Selamat atas pernikahannya, semoga lancar sampai hari H.';
            // }

            $this->db->insert('invitations',$insert);
            $redir_to = site_url('invitations/'.$client_id.'/'.strtolower(url_title($client->client_Name,'-')).'/'.$insert['ivts_Uuid'] ) ;

        //echo $redir_to;
        //die();

        if(!empty($client->client_CustomDomain)){
          //$referer2 = $client->client_CustomDomain.(isset($undangan->ivts_Uuid ) ? '?uuid='.$insert['ivts_Uuid']:'');
          $referer = $client->client_CustomDomain.'/?uuid='.$insert['ivts_Uuid'];
          //$referer2 = site_url('invitations/'.$client_id.'/'.strtolower(url_title($client->client_Name,'-')).'/'.$insert['ivts_Uuid'] ) ;
        }else{
          $referer = $redir_to;
        }

        //redirect($referer);
        //echo $referer2;
        $qrCode = (new QrCode($insert['ivts_Uuid']))
                ->setSize(250)
                ->setMargin(15);
            $qrCode->writeFile(FCPATH.'public'.DS.'qrcodes' .DS.$insert['ivts_Uuid'].'.png');
            $qr = imagecreatefrompng(FCPATH.'public'.DS.'qrcodes'.DS.$insert['ivts_Uuid'].'.png');
        //}
        header('Content-type: image/png');
        imagejpeg($qr);
        redirect($referer);

        }else{
            //$insert['rsvp_Ivts_Id'] = $this->input->post('ivtsId');
        //    if(empty($_POST['phoneNo'])){
        //    }else{
                $insert['ivts_NoHp'] = $this->input->post('phoneNo');
        //    }
        //    if(empty($_POST['numberPerson'])){
        //    }else{
                $insert['ivts_RsvpGuest'] = $this->input->post('numberPerson');
        //    }
            $insert['ivts_RsvpRespond'] = $this->input->post('isPresent');
            $insert['ivts_RsvpTime'] = date('Y-m-d H:i:s');
            //$insert['ivts_Created'] = date('Y-m-d H:i:s');
            $insert['ivts_Address'] = $this->input->post('ivtsAddress');
            $insert['ivts_RsvpMessage'] = $this->input->post('message');
            $insert['ivts_RsvpStatus'] = 'Undangan';
            //$insert['ivts_Client_Id'] = $client_id;

            // if(empty($insert['ivts_RsvpMessage']) || $insert['ivts_RsvpMessage'] == ''){
            //     $insert['ivts_RsvpMessage'] = 'Selamat atas pernikahannya, semoga lancar sampai hari H.';
            // }
            $this->db->where('ivts_Id',$id_ivt);
            $this->db->update('invitations',$insert);
            $redir_to = site_url('invitations/'.$client_id.'/'.strtolower(url_title($client->client_Name,'-')).'/'.(isset($undangan->ivts_Uuid ) ? $undangan->ivts_Uuid : '') ) ;
            //echo $redir_to;
            //die();
            if(!empty($client->client_CustomDomain)){
              $referer = $client->client_CustomDomain.(isset($undangan->ivts_Uuid ) ? '?uuid='.$undangan->ivts_Uuid : '');
            }else{
              $referer = $redir_to;
            }
            redirect($referer);
        }
    }

    public function image($client_id,$ivts_uuid){

        $this->Client_model->join('templates','templates.tpl_Id=clients.client_Tpl_Id');

        $client = $this->Client_model->findByID($client_id);

        if(empty($client)){

            redirect(site_url('public/template.jpg'));

        }

        if($ivts_uuid!=null){

            $undangan = $this->Invitations_model->findFirst(['ivts_Uuid'=>$ivts_uuid]);

        }else{

            redirect(site_url('public/template.jpg'));

        }

        if(is_file(FCPATH.'public'.DS.'qrcodes'.DS.$ivts_uuid.'.png')){

            $qr = imagecreatefrompng(FCPATH.'public'.DS.'qrcodes'.DS.$ivts_uuid.'.png');

        }else{

            $qrCode = (new QrCode($ivts_uuid))

                ->setSize(250)

                ->setMargin(15);

            $qrCode->writeFile(FCPATH.'public'.DS.'qrcodes' .DS.$ivts_uuid.'.png');

            $qr = imagecreatefrompng(FCPATH.'public'.DS.'qrcodes'.DS.$ivts_uuid.'.png');

        }

        $properties = [];

        $propQ = $this->db->get_where('client_properties',['clprop_Client_Id'=>$client_id]);

        //echo $this->db->last_query();

        if($propQ->num_rows()>0){

        $prop_db = $propQ->result_array();

        //print_r($prop_db);

        foreach($prop_db as $p){

            $properties[$p['clprop_Field']] = $p['clprop_Value'];

        }

        }

        $colsQ = $this->db->get_where('template_properties',['tplprop_Tpl_Id'=>$client->client_Tpl_Id]);

        //print_r($properties);

        //print_r($colsQ->result_array());

        foreach($colsQ->result_array() as $col){

            if(isset($properties[$col['tplprop_Key']])){

                $data_view[$col['tplprop_Key']] = $properties[$col['tplprop_Key']];

            }else{

                $data_view[$col['tplprop_Key']] = $col['tplprop_Default'];

            }

        }

        

        

        $img 			= imagecreatefromjpeg(FCPATH.'public'.DIRECTORY_SEPARATOR.'template.jpg');

        $black 			= imagecolorallocate($img, 0, 0, 0);

        $white 			= imagecolorallocate($img, 255, 255, 255);

        list($width, $height) = getimagesize(FCPATH.'public'.DIRECTORY_SEPARATOR.'template.jpg');

        

        //$qr = imagecreatefromjpeg( __DIR__ .DIRECTORY_SEPARATOR.'code.jpeg');

        

        list($bottom_width, $bottom_height) = getimagesize(FCPATH.'public'.DS.'qrcodes' .DS.$ivts_uuid.'.png');

        imagecopy($img, $qr, 230, 600, 0, 0, $bottom_width, $bottom_height);

        

        

        //putenv('GDFONTPATH=' . realpath('.'));

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'GreatVibes-Regular.ttf');

        $box->setFontColor(new Color(250, 236, 175));

        $box->setFontSize(54);

        $box->setBox(0,325,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($data_view['groom']);

        

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'GreatVibes-Regular.ttf');

        $box->setFontColor(new Color(250, 236, 175));

        $box->setFontSize(54);

        $box->setBox(0,469,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($data_view['bride']);

        

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'lato.ttf');

        $box->setFontColor(new Color(250, 236, 175));

        $box->setFontSize(25);

        $box->setBox(0,550,$width, 20);

        $box->setTextAlign('center', 'center');

        $tanggal = strtotime($data_view['tanggalacara']);

        $box->draw(date('l, j F Y',$tanggal));

        

        header('Content-type: image/jpeg');

        imagejpeg($img);

        imagedestroy($img);

    }

    public function undangan($client_id,$client_slug,$ivts_uuid=null){

        //echo $client_id.' '.$client_slug.' '.$client_uuid;

        $this->Client_model->join('templates','templates.tpl_Id=clients.client_Tpl_Id');

        

       

       

        $client = $this->Client_model->findByID($client_id);

        if(!$client){

            show_404();

        }

        //print_r($client);

        //echo "Undangan punya ".$client->client_Name;

        if($ivts_uuid!=null){

            $undangan = $this->Invitations_model->findFirst(['ivts_Uuid'=>$ivts_uuid]);

        }else{

            $undangan = null;

        }

        

        $data_view = [];

        $data_view['client'] = $client;

        $data_view['title'] = $client->client_Name;

        $data_view['undangan'] = $undangan;
	
	    $data_view['detail'] = [];

	    if($client_id!=null){

            $this->db->order_by('ivts_RsvpTime','desc');

            $message = $this->db->get_where('invitations',['ivts_Client_Id'=>$client_id]);

        }else{

            $message = null;

        }

        if($message->num_rows()>0){

            $res = $message->result_array();

            //print_r($prop_db);

            foreach($res as $r){

                $name = $r['ivts_Name'];

                $wishes = $r['ivts_RsvpMessage'];

    	        $data_view['detail'][] = array('name' => $name,
                                               'wishes' => $wishes);

            }

        }
        
	  //  $detail1[] = array('name' => 'dgsign.id',
      //                     'wishes' => 'Terima kasih telah menggunakan jasa undangan & buku tamu digital dari dgsign.id, lancar sampai hari H.');
	
	  //  $data_view['detail'] = array_merge($detail1, $data_view['detail']);

        foreach($data_view['detail'] as $key=>$value){
            if(empty($value['name']) || empty($value['wishes'])){
                unset($data_view['detail'][$key]);
            } 
        }

	    $properties = [];

	    $propQ = $this->db->get_where('client_properties',['clprop_Client_Id'=>$client_id]);

        //echo $this->db->last_query();

        if($propQ->num_rows()>0){

        $prop_db = $propQ->result_array();

        //print_r($prop_db);

        foreach($prop_db as $p){

            $properties[$p['clprop_Field']] = $p['clprop_Value'];

        }

        }

        $colsQ = $this->db->get_where('template_properties',['tplprop_Tpl_Id'=>$client->client_Tpl_Id]);

        //print_r($properties);

        //print_r($colsQ->result_array());

        foreach($colsQ->result_array() as $col){

            if(isset($properties[$col['tplprop_Key']])){

                $data_view[$col['tplprop_Key']] = $properties[$col['tplprop_Key']];

            }else{

                $data_view[$col['tplprop_Key']] = $col['tplprop_Default'];

            }

        }

        if(isset($data_view['idprokes']) && $data_view['idprokes']!=0){

            $id_prokes = $data_view['idprokes'];

            $prokes_q = $this->Prokes_model->findByID($id_prokes);

            if($prokes_q){

                $data_view['prokes'] = (array) $prokes_q;

                $detailq = $this->Prodet_model->find(['prodet_Prokes_Id'=>$id_prokes]);

                if($detailq){

                    $data_view['prokes_detail'] = (array)$detailq;

                    //print_r($detailq);

                }

            }

        }

        //print_r($data_view);

        //die();

        //echo "<br>Kepada : ".$undangan->ivts_Name.'<br>'.$undangan->ivts_Address;

        $this->load->view('home/'.$client->tpl_Directory.'/templates',$data_view);



        if ($undangan->ivts_RsvpRespond == null){

            $this->db->where('ivts_Uuid',$ivts_uuid);

		    $this->db->update('invitations',['ivts_RsvpRespond'=>'2']);

        }

        

    }

    public function createqrrsvp($qr){

       // if(is_file(FCPATH.'public'.DS.'qrcodes'.DS.$qr.'.png')){

       //     $qr = imagecreatefrompng(FCPATH.'public'.DS.'qrcodes'.DS.$qr.'.png');

       // }else{

            $qrCode = (new QrCode($qr))

                ->setSize(250)

                ->setMargin(15);

            $qrCode->writeFile(FCPATH.'public'.DS.'qrcodes' .DS.$qr.'.png');

            $qr = imagecreatefrompng(FCPATH.'public'.DS.'qrcodes'.DS.$qr.'.png');

        //}

        header('Content-type: image/png');

        imagejpeg($qr);

        /*

        $this->load->library('ciqrcode');

        QRcode::png($qr,FCPATH.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'qrcodes'.DIRECTORY_SEPARATOR.$qr.'.png',QR_ECLEVEL_L, 4);

        $fp = fopen(FCPATH.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'qrcodes'.DIRECTORY_SEPARATOR.$qr.'.png','rb');

        header('Content-type: image/png');

        header('Content-length: '.filesize(FCPATH.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'qrcodes'.DIRECTORY_SEPARATOR.$qr.'.png'));

        fpassthru($fp);

        exit;

        */

    }

    public function createqr($client_id,$ivts_uuid){

        $client = $this->Client_model->findByID($client_id);

        $undangan = $this->Invitations_model->findFirst(['ivts_Uuid'=>$ivts_uuid]);

        $propQ = $this->Qrtemplate_model->findFirst(['tplqr_Id'=>$undangan->ivts_tplqr_Id]);

        $properties = [];

        $propQ2 = $this->db->get_where('client_properties',['clprop_Client_Id'=>$client_id]);

        if($propQ2->num_rows()>0){
            foreach($propQ2->result_array() as $p){
                $properties[$p['clprop_Field']] = $p['clprop_Value'];
            }
        }

        $colsQ = $this->db->get_where('template_properties',['tplprop_Tpl_Id'=>$client->client_Tpl_Id]);

        $link_invt = !empty($client->client_CustomDomain) ? $client->client_CustomDomain.'?uuid='.$undangan->ivts_Uuid : site_url('invitations/'.$client_id.'/'.strtolower(url_title($client->client_Name,'-')).'/'.$undangan->ivts_Uuid);

        $data_view = [];

        foreach($colsQ->result_array() as $col){

            if(isset($properties[$col['tplprop_Key']])){

                $data_view[$col['tplprop_Key']] = $properties[$col['tplprop_Key']];

            }else{

                $data_view[$col['tplprop_Key']] = $col['tplprop_Default'];

            }

        }



        //if(is_file(FCPATH.'public'.DS.'qrcodes'.DS.$ivts_uuid.'.png')){

        //    $qr = imagecreatefrompng(FCPATH.'public'.DS.'qrcodes'.DS.$ivts_uuid.'.png');

        //}else{

            $qrCode = (new QrCode($ivts_uuid))

                ->setSize(400)

                ->setMargin(15);

            $qrCode->writeFile(FCPATH.'public'.DS.'qrcodes' .DS.$ivts_uuid.'.png');

            $qr = imagecreatefrompng(FCPATH.'public'.DS.'qrcodes'.DS.$ivts_uuid.'.png');

        //}

        $img 			= imagecreatefromjpeg(FCPATH.'public'.DIRECTORY_SEPARATOR.'qrtemplate'.DS.$propQ->tplqr_File);

        $black 			= imagecolorallocate($img, 0, 0, 0);

        $white 			= imagecolorallocate($img, 255, 255, 255);

        list($width, $height) = getimagesize(FCPATH.'public'.DIRECTORY_SEPARATOR.'qrtemplate'.DS.$propQ->tplqr_File);

        

        //$qr = imagecreatefromjpeg( __DIR__ .DIRECTORY_SEPARATOR.'code.jpeg');

        

        list($bottom_width, $bottom_height) = getimagesize(FCPATH.'public'.DS.'qrcodes' .DS.$ivts_uuid.'.png');

        imagecopy($img, $qr, 175, 295, 0, 0, $bottom_width, $bottom_height);

        

        

        //putenv('GDFONTPATH=' . realpath('.'));



        //Judul

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'Cinzel-Regular.otf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(20);

        $box->setBox(0,31,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_Judul);

        // $box->draw($data_view['groom']);

        

        //pengantin

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'GreatVibes-Regular.ttf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(45);

        $box->setBox(0,75,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_Cpp);



        //Tempat

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'Cinzel-Regular.otf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(20);

        $box->setBox(0,125,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_FieldSatu);



        //Alamat

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'Cinzel-Regular.otf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(18);

        $box->setBox(0,145,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_FieldDua);



        //VIP

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'Cinzel-Regular.otf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(90);

        $box->setBox(0,205,$width, 20);

        $box->setTextAlign('center', 'center');

        if($propQ->tplqr_VIP == '1'){

            $box->draw('VIP');

        }



        //himbauan

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'QuestaSansRegular.ttf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(18);

        $box->setBox(0,590,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_FieldTiga);

        

        //himbauan 2

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'QuestaSansRegular.ttf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(18);

        $box->setBox(0,615,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_FieldEmpat);



        //sapaan

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'QuestaSansRegular.ttf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(15);

        $box->setBox(0,673,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_FieldLima);

        

        //nama tamu

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'texb.ttf');

        $box->setFontColor(new Color(0, 0, 0));
        //$box->setFontColor(new Color($propQ->tplqr_TamuColor));

        $box->setFontSize($propQ->tplqr_TamuSize);

        if($propQ->tplqr_Mode == '5' || $propQ->tplqr_Mode == '6'){

            $box->setBox(0,100,$width, 20);

        }else{

            $box->setBox(0,840,$width, 20);

            $box->setTextAlign('center', 'center');

        }

        //$box->setTextAlign('center', 'center');

        $box->draw($undangan->ivts_Name);

        

        



        //alamat tamu

        $box = new Box($img);

        // $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'lato.ttf');
        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'texb.ttf');

        // $box->setFontColor(new Color($propQ->tplqr_TamuColor));
        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize($propQ->tplqr_AlamatSize);

        if($propQ->tplqr_Mode == '5' || $propQ->tplqr_Mode == '6'){

            $box->setBox(0,150,$width, 300);

        }else{

            $box->setBox(0,730,$width, 300);

            $box->setTextAlign('center', 'center');

        }

        if($propQ->tplqr_Mode == '2' || $propQ->tplqr_Mode == '4' || $propQ->tplqr_Mode == '6'){

            $box->draw($undangan->ivts_Address);

        }



        //Kursi

        $box = new Box($img);

        // $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'lato.ttf');
        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'texb.ttf');

        // $box->setFontColor(new Color($propQ->tplqr_TamuColor));
        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize($propQ->tplqr_MejaSize); 

        $box->setBox(0,900,$width, 15);

        $box->setTextAlign('center', 'center');

        if($propQ->tplqr_Mode == '3' || $propQ->tplqr_Mode == '4'){

           // $box->draw('Seat : '.$undangan->ivts_Seat);
           $box->draw($undangan->ivts_Seat);
        }



        //Guest

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'lato.ttf');

        $box->setFontColor(new Color($propQ->tplqr_TamuColor));

        $box->setFontSize($propQ->tplqr_MejaSize); 

        $box->setBox(0,$propQ->tplqr_GuestPosX,$width, 20);

        $box->setTextAlign('center', 'center');

        if($propQ->tplqr_GuestSet == '1'){

            $box->draw('Satu Undangan Berlaku Untuk '.$undangan->ivts_Guest.' Orang');

        }



        //tanggal

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'QuestaSansRegular.ttf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(20);

        $box->setBox(0,816,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_FieldEnam);

        //$tanggal = strtotime($data_view['tanggalacara']);

        //$box->draw(date('l, j F Y',$tanggal));

        

        //jam

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'QuestaSansRegular.ttf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(20);

        $box->setBox(0,850,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_FieldTujuh);



        //jam2

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'QuestaSansRegular.ttf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(20);

        $box->setBox(0,870,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_FieldDelapan);



        //link

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'QuestaSansRegular.ttf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(15);

        $box->setBox(20,885,$width, 20);

        //$box->setTextAlign('center', 'center');

        if($propQ->tplqr_Link == '1'){

            $box->draw('Link RSVP :'."\n".$link_invt);

        }

        



        header('Content-type: image/jpeg');

        imagejpeg($img);



        // if($undangan->ivts_tplivts_Id == '1'){

        //    imagejpeg($img, FCPATH.'public'.DIRECTORY_SEPARATOR.'invitation_ivt'.DS.$undangan->ivts_Client_Id.'_'.str_replace(' ', '_',$undangan->ivts_Name).'-'.$ivts_uuid.'.jpg');

       // }

            imagejpeg($img, FCPATH.'public'.DIRECTORY_SEPARATOR.'invitation_qr'.DS.$undangan->ivts_Client_Id.'_'.str_replace(' ', '_',$undangan->ivts_Name).'-'.$ivts_uuid.'.jpg');

            $insert = [];

            $insert['ivts_Files'] = $undangan->ivts_Client_Id.'_'.str_replace(' ', '_',$undangan->ivts_Name).'-'.$ivts_uuid.'.jpg';



            $this->db->where('ivts_Uuid',$ivts_uuid);

            $this->db->update('invitations',$insert);

   





        imagedestroy($img);



       // header('Content-type: image/png');

        //imagejpeg($qr);

        /*

        $this->load->library('ciqrcode');

        QRcode::png($qr,FCPATH.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'qrcodes'.DIRECTORY_SEPARATOR.$qr.'.png',QR_ECLEVEL_L, 4);

        $fp = fopen(FCPATH.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'qrcodes'.DIRECTORY_SEPARATOR.$qr.'.png','rb');

        header('Content-type: image/png');

        header('Content-length: '.filesize(FCPATH.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'qrcodes'.DIRECTORY_SEPARATOR.$qr.'.png'));

        fpassthru($fp);

        exit;

        */

    }

    public function downloadqr($client_id, $ivts_uuid){

        $data = $this->db->get_where('invitations',['ivts_Client_Id'=>$client_id, 'ivts_Uuid'=>$ivts_uuid])->result_array();
        
        $file = $data[0]['ivts_Files'];
        $filepath = "public/invitation_qr/" . $file;

        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            readfile($filepath);
            }
        }

    public function createivt($client_id,$ivts_uuid){

        $client = $this->Client_model->findByID($client_id);

        $undangan = $this->Invitations_model->findFirst(['ivts_Uuid'=>$ivts_uuid]);

        $propQ = $this->Qrtemplate_model->findFirst(['tplqr_Id'=>$undangan->ivts_tplivts_Id]);

        $properties = [];

        $propQ2 = $this->db->get_where('client_properties',['clprop_Client_Id'=>$client_id]);

        if($propQ2->num_rows()>0){
            foreach($propQ2->result_array() as $p){
                $properties[$p['clprop_Field']] = $p['clprop_Value'];
            }
        }

        $colsQ = $this->db->get_where('template_properties',['tplprop_Tpl_Id'=>$client->client_Tpl_Id]);

        $link_invt = !empty($client->client_CustomDomain) ? $client->client_CustomDomain.'?uuid='.$undangan->ivts_Uuid : site_url('invitations/'.$client_id.'/'.strtolower(url_title($client->client_Name,'-')).'/'.$undangan->ivts_Uuid);

        $data_view = [];

        foreach($colsQ->result_array() as $col){

            if(isset($properties[$col['tplprop_Key']])){

                $data_view[$col['tplprop_Key']] = $properties[$col['tplprop_Key']];

            }else{

                $data_view[$col['tplprop_Key']] = $col['tplprop_Default'];

            }

        }



        //if(is_file(FCPATH.'public'.DS.'qrcodes'.DS.$ivts_uuid.'.png')){

        //    $qr = imagecreatefrompng(FCPATH.'public'.DS.'qrcodes'.DS.$ivts_uuid.'.png');

        //}else{

            $qrCode = (new QrCode($ivts_uuid))

                ->setSize(300)

                ->setMargin(15);

            $qrCode->writeFile(FCPATH.'public'.DS.'qrcodes' .DS.$ivts_uuid.'.png');

            $qr = imagecreatefrompng(FCPATH.'public'.DS.'qrcodes'.DS.$ivts_uuid.'.png');

        //}

        $img 			= imagecreatefromjpeg(FCPATH.'public'.DIRECTORY_SEPARATOR.'ivttemplate'.DS.$propQ->tplqr_File);

        $black 			= imagecolorallocate($img, 0, 0, 0);

        $white 			= imagecolorallocate($img, 255, 255, 255);

        list($width, $height) = getimagesize(FCPATH.'public'.DIRECTORY_SEPARATOR.'ivttemplate'.DS.$propQ->tplqr_File);

        

        //$qr = imagecreatefromjpeg( __DIR__ .DIRECTORY_SEPARATOR.'code.jpeg');

        

        list($bottom_width, $bottom_height) = getimagesize(FCPATH.'public'.DS.'qrcodes' .DS.$ivts_uuid.'.png');

        imagecopy($img, $qr, 230, 260, 0, 0, $bottom_width, $bottom_height);

        

        

        //putenv('GDFONTPATH=' . realpath('.'));



        //Judul

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'Cinzel-Regular.otf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(20);

        $box->setBox(0,31,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_Judul);

        // $box->draw($data_view['groom']);

        

        //pengantin

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'GreatVibes-Regular.ttf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(45);

        $box->setBox(0,75,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_Cpp);



        //Tempat

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'Cinzel-Regular.otf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(20);

        $box->setBox(0,125,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_FieldSatu);



        //Alamat

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'Cinzel-Regular.otf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(18);

        $box->setBox(0,145,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_FieldDua);



        //VIP

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'Cinzel-Regular.otf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(90);

        $box->setBox(0,205,$width, 20);

        $box->setTextAlign('center', 'center');

        if($propQ->tplqr_VIP == '1'){

            $box->draw('VIP');

        }



        //himbauan

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'QuestaSansRegular.ttf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(18);

        $box->setBox(0,590,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_FieldTiga);

        

        //himbauan 2

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'QuestaSansRegular.ttf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(18);

        $box->setBox(0,615,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_FieldEmpat);



        //sapaan

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'QuestaSansRegular.ttf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(15);

        $box->setBox(0,673,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_FieldLima);

        

        //nama tamu

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'lato.ttf');

        $box->setFontColor(new Color($propQ->tplqr_TamuColor));

        $box->setFontSize($propQ->tplqr_TamuSize);

        if($propQ->tplqr_Mode == '5' || $propQ->tplqr_Mode == '6'){

            $box->setBox(0,100,$width, 20);

        }else{

            $box->setBox(0,700,$width, 20);

            $box->setTextAlign('center', 'center');

        }

        //$box->setTextAlign('center', 'center');

        $box->draw($undangan->ivts_Name);

        

        



        //alamat tamu

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'lato.ttf');

        $box->setFontColor(new Color($propQ->tplqr_TamuColor));

        $box->setFontSize($propQ->tplqr_AlamatSize);

        if($propQ->tplqr_Mode == '5' || $propQ->tplqr_Mode == '6'){

            $box->setBox(0,150,$width, 20);

        }else{

            $box->setBox(0,730,$width, 20);

            $box->setTextAlign('center', 'center');

        }

        if($propQ->tplqr_Mode == '2' || $propQ->tplqr_Mode == '4' || $propQ->tplqr_Mode == '6'){

            $box->draw($undangan->ivts_Address);

        }



        //Kursi

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'lato.ttf');

        $box->setFontColor(new Color($propQ->tplqr_TamuColor));

        $box->setFontSize($propQ->tplqr_MejaSize); 

        $box->setBox(0,760,$width, 20);

        $box->setTextAlign('center', 'center');

        if($propQ->tplqr_Mode == '3' || $propQ->tplqr_Mode == '4'){

           // $box->draw('Meja : '.$undangan->ivts_Seat);
            $box->draw($undangan->ivts_Seat);

        }



        //Guest

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'lato.ttf');

        $box->setFontColor(new Color($propQ->tplqr_TamuColor));

        $box->setFontSize($propQ->tplqr_MejaSize); 

        $box->setBox(0,$propQ->tplqr_GuestPosX,$width, 20);

        $box->setTextAlign('center', 'center');

        if($propQ->tplqr_GuestSet == '1'){

            $box->draw('Satu Undangan Berlaku Untuk '.$undangan->ivts_Guest.'Orang');

        }



        //tanggal

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'QuestaSansRegular.ttf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(20);

        $box->setBox(0,816,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_FieldEnam);

        //$tanggal = strtotime($data_view['tanggalacara']);

        //$box->draw(date('l, j F Y',$tanggal));

        

        //jam

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'QuestaSansRegular.ttf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(20);

        $box->setBox(0,850,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_FieldTujuh);



        //jam2

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'QuestaSansRegular.ttf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(20);

        $box->setBox(0,870,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw($propQ->tplqr_FieldDelapan);



        //link

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'QuestaSansRegular.ttf');

        $box->setFontColor(new Color(0, 0, 0));

        $box->setFontSize(15);

        $box->setBox(20,885,$width, 20);

        //$box->setTextAlign('center', 'center');

        if($propQ->tplqr_Link == '1'){

            $box->draw('Link RSVP :'."\n".$link_invt);

        }

        



        header('Content-type: image/jpeg');

        imagejpeg($img);



        // if($undangan->ivts_tplivts_Id == '1'){

        //    imagejpeg($img, FCPATH.'public'.DIRECTORY_SEPARATOR.'invitation_ivt'.DS.$undangan->ivts_Client_Id.'_'.str_replace(' ', '_',$undangan->ivts_Name).'-'.$ivts_uuid.'.jpg');

       // }

            imagejpeg($img, FCPATH.'public'.DIRECTORY_SEPARATOR.'invitation_ivt'.DS.$undangan->ivts_Client_Id.'_'.str_replace(' ', '_',$undangan->ivts_Name).'-'.$ivts_uuid.'.jpg');

            $insert = [];

            $insert['ivts_FilesIvts'] = $undangan->ivts_Client_Id.'_'.str_replace(' ', '_',$undangan->ivts_Name).'-'.$ivts_uuid.'.jpg';



            $this->db->where('ivts_Uuid',$ivts_uuid);

            $this->db->update('invitations',$insert);

   





        imagedestroy($img);



       // header('Content-type: image/png');

        //imagejpeg($qr);

        /*

        $this->load->library('ciqrcode');

        QRcode::png($qr,FCPATH.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'qrcodes'.DIRECTORY_SEPARATOR.$qr.'.png',QR_ECLEVEL_L, 4);

        $fp = fopen(FCPATH.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'qrcodes'.DIRECTORY_SEPARATOR.$qr.'.png','rb');

        header('Content-type: image/png');

        header('Content-length: '.filesize(FCPATH.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'qrcodes'.DIRECTORY_SEPARATOR.$qr.'.png'));

        fpassthru($fp);

        exit;

        */

    }



    public function createqr2($ivts_uuid){

        if(is_file(FCPATH.'public'.DS.'qrcodes'.DS.$ivts_uuid.'.png')){

            $qr = imagecreatefrompng(FCPATH.'public'.DS.'qrcodes'.DS.$ivts_uuid.'.png');

        }else{

            $qrCode = (new QrCode($ivts_uuid))

                ->setSize(250)

                ->setMargin(15);

            $qrCode->writeFile(FCPATH.'public'.DS.'qrcodes' .DS.$ivts_uuid.'.png');

            $qr = imagecreatefrompng(FCPATH.'public'.DS.'qrcodes'.DS.$ivts_uuid.'.png');

        }

        $img 			= imagecreatefromjpeg(FCPATH.'public'.DIRECTORY_SEPARATOR.'template.jpg');

        $black 			= imagecolorallocate($img, 0, 0, 0);

        $white 			= imagecolorallocate($img, 255, 255, 255);

        list($width, $height) = getimagesize(FCPATH.'public'.DIRECTORY_SEPARATOR.'template.jpg');

        

        //$qr = imagecreatefromjpeg( __DIR__ .DIRECTORY_SEPARATOR.'code.jpeg');

        

        list($bottom_width, $bottom_height) = getimagesize(FCPATH.'public'.DS.'qrcodes' .DS.$ivts_uuid.'.png');

        imagecopy($img, $qr, 230, 600, 0, 0, $bottom_width, $bottom_height);

        

        

        //putenv('GDFONTPATH=' . realpath('.'));

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'GreatVibes-Regular.ttf');

        $box->setFontColor(new Color(250, 236, 175));

        $box->setFontSize(54);

        $box->setBox(0,325,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw('groo0000m');

        

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'GreatVibes-Regular.ttf');

        $box->setFontColor(new Color(250, 236, 175));

        $box->setFontSize(54);

        $box->setBox(0,469,$width, 20);

        $box->setTextAlign('center', 'center');

        $box->draw('bridaaae');

        

        $box = new Box($img);

        $box->setFontFace(FCPATH.'public'.DS.'fonts'.DS.'lato.ttf');

        $box->setFontColor(new Color(250, 236, 175));

        $box->setFontSize(25);

        $box->setBox(0,550,$width, 20);

        $box->setTextAlign('center', 'center');

        $tanggal = strtotime('tanggalacara');

        $box->draw(date('l, j F Y',$tanggal));

        

        header('Content-type: image/jpeg');

        imagejpeg($img);

       // imagedestroy($img);



       // header('Content-type: image/png');

        //imagejpeg($qr);

        /*

        $this->load->library('ciqrcode');

        QRcode::png($qr,FCPATH.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'qrcodes'.DIRECTORY_SEPARATOR.$qr.'.png',QR_ECLEVEL_L, 4);

        $fp = fopen(FCPATH.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'qrcodes'.DIRECTORY_SEPARATOR.$qr.'.png','rb');

        header('Content-type: image/png');

        header('Content-length: '.filesize(FCPATH.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'qrcodes'.DIRECTORY_SEPARATOR.$qr.'.png'));

        fpassthru($fp);

        exit;

        */

    }

  

}

