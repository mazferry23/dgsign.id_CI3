<?php

include 'conn.php';
    // session_start();
    //  if (!isset($_SESSION['username']) && !isset($_SESSION['id_role']) && !isset($_SESSION['id_event'])){
    //      header("Location: login.php");
    //  }
    //if ($_SESSION['id_role'] == '2'){
    //    header("Location: login.html");
    //}
$request = $_POST['request'];   // request

// Get username list

if($request == 1){
    $search = $_POST['search'];

    if($_SESSION['id_role']==1){
        $query = "SELECT * FROM tb_rsvp WHERE (nama like'%".$search."%' or alamat like'%".$search."%') and (date_cekin ='0000-00-00 00:00:00' or date_cekout ='0000-00-00 00:00:00') and status_data='show'";
    }else{
        //$query = "SELECT * FROM tb_rsvp WHERE (nama like'%".$search."%' or alamat like'%".$search."%') and (date_cekin ='0000-00-00 00:00:00' or date_cekout ='0000-00-00 00:00:00') and id_event=$_SESSION[id_event] and status_data='show'";
        $query = "SELECT * FROM tb_rsvp WHERE (nama like'%".$search."%' or alamat like'%".$search."%') and id_event=$_SESSION[id_event] and status_data='show'";
    }
    
    $result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0 ){
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['id'],"label"=>$row['nama']." ".$row['alamat']);
    }
}else{
    $response[] = 'No Data';
}
    // encoding array to json format
    echo json_encode($response);
    exit;
}


// Get details
if($request == 2){
    $userid = $_POST['userid'];
    $sql = "SELECT * FROM tb_rsvp WHERE id='$userid'";
    $result = mysqli_query($conn,$sql);
    $users_arr = array();

    while( $row = mysqli_fetch_array($result) ){
        $userid = $row['id'];
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $telepon = $row['telepon'];
        $tamu = $row['tamu'];
        $seat = $row['seat'];
        $kategori = $row['kategori'];
        $status_sovenir = $row['status_sovenir'];
        $cekin = $row['date_cekin'];
        $cekout = $row['date_cekout'];
        $users_arr[] = array("id" => $userid, "nama" => $nama,"alamat" => $alamat, "telepon" =>$telepon, "tamu" =>$tamu,"seat" =>$seat, "kategori" =>$kategori, "status_sovenir" =>$status_sovenir, "date_cekin" =>$cekin, "date_cekout" =>$cekout);
    }

    // encoding array to json format
    echo json_encode($users_arr);
    exit;

}

