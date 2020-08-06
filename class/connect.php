<?php
   ini_set('display_errors', 1);

   /**
    * Class untuk menampung kebutuhan koneksi dan query
    */
   class connect 
   {
      /**
       * Konstruktor koneksi
       */
      function __construct()
      {
         $hostname = "localhost";
         $username = "root";
         $password = "";
         $database = "toko";

         $this->koneksi = mysqli_connect($hostname, $username, $password, $database) or trigger_error(mysqli_error($this->koneksi), E_USER_NOTICE);
      }

      /**
       * fungsi untuk menampilkan data select dengan cara memasukan query ke dalam parameter
       *
       * @param [String] $query
       * @return array
       */
      protected function query($query) : array
      {
         $result = mysqli_query($this->koneksi, $query);
         $rows = [];
         while ($data = mysqli_fetch_assoc($result)) {
            $rows[] = $data;
         }
         return $rows;
      }
   }
?>