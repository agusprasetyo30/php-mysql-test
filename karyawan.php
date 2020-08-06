<?php
   ini_set('display_errors', 1);

   include "./class/helpers.php";
   $helper = new helpers();

   $post_input = json_decode(file_get_contents("php://input"), true);

   // Berstatus TRUE jika kosong, dan FALSE jika ada keadaan POST
   $status_post = $post_input == NULL ? true : false;

   if ($status_post) {
      // memanggil helper untuk menampilkan semua data karyawan
      $show_karyawan = $helper->showAllKaryawan();
      echo json_encode($show_karyawan);

   } else {
      // Menambahkan data karyawan berdasarkan parameter nama dan tanggal lahir
      $add_karyawan = $helper->addKaryawan($post_input['nama'], $post_input['tgl_lahir']);
      
      // Jika penambahan sukses
      if ($add_karyawan > 0) {
         echo(json_encode(["status" => 200, "message" => 'success']));   
      
      } else {
         echo(json_encode(["status" => 422, "message" => 'failed']));
      }
   }
?>