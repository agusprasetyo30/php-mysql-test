<?php
   include "connect.php";

   class helpers extends connect
   {
      /**
       * Fungsi yang digunakan untuk menghitung umur pengguna
       *
       * @param [type] $date_input
       * @return integer
       */
      private function getAge($date_input) : int
      {
         $birth_date = new DateTime($date_input);

         $today = new DateTime('today');

         $age = $today->diff($birth_date)->y;

         return $age;
      }

      /**
       * Fungsi yang digunakan untuk mengambil tanggal dari tanggal lahir yang diinputkan
       *
       * @param [type] $date_input
       * @return integer
       */
      private function getDay($date_input) : int
      {
         $day = date('d', strtotime($date_input));
         
         return $day;
      }

      /**
       * Fungsi yang digunakan untuk mengambil bulan dari tanggal lahir yang diinputkan
       *
       * @param [type] $date_input
       * @return integer
       */
      private function getMonth($date_input) : int
      {
         $month = date('m', strtotime($date_input));
         
         return $month;
      }

      /**
       * Fungsi yang digunakan untuk mengambil tahun dari tanggal lahir yang diinputkan
       *
       * @param [type] $date_input
       * @return integer
       */
      private function getYear($date_input) : int
      {
         $year = date('Y', strtotime($date_input));
         
         return $year;
      }

      /**
       * Fungsi yang digunakan untuk menentukan zodiak dari user
       *
       * @param [type] $date_input
       * @return string
       */
      private function getZodiac($date_input) : string
      {
         $get_day = date('d', strtotime($date_input));
         $get_month = date('m', strtotime($date_input));

         // Aries
         if (($get_month == 3 && $get_day > 20) || ($get_month == 4 && $get_day < 20)) {
            return "Aries";
         
         // Taurus
         } else if (($get_month == 4 && $get_day > 19) || ($get_month == 5 && $get_day < 21)) {
            return "Taurus";
         
         // Gemini
         } else if (($get_month == 5 && $get_day > 20) || ($get_month == 6 && $get_day < 22)) {
            return "Gemini";
         
         // Cancer
         } else if (($get_month == 6 && $get_day > 21) || ($get_month == 7 && $get_day < 23)) {
            return "Cancer";
         
         // Leo
         } else if (($get_month == 7 && $get_day > 22) || ($get_month == 8 && $get_day < 23)) {
            return "Leo";
         
         // Virgo
         } else if (($get_month == 8 && $get_day > 22) || ($get_month == 9 && $get_day < 23)) {
            return "Virgo";
            
         // Libra
         } else if (($get_month == 9 && $get_day > 22) || ($get_month == 10 && $get_day < 23)) {
            return "Libra";

         // Scorpio
         } else if (($get_month == 10 && $get_day > 22) || ($get_month == 11 && $get_day < 22)) {
            return "Scorpio";
         
         // Sagittarius
         } else if (($get_month == 11 && $get_day > 21) || ($get_month == 12 && $get_day < 22)) {
            return "Sagittarius";

         // Capricorn
         } else if (($get_month == 12 && $get_day > 21) || ($get_month == 1 && $get_day < 20)) {
            return "Capricorn";

         // Aquarius
         } else if (($get_month == 1 && $get_day > 19) || ($get_month == 2 && $get_day < 19)) {
            return "Aquarius";
         
         // Pisces
         } else if (($get_month == 2 && $get_day > 18) || ($get_month == 3 && $get_day < 21)) {
            return "Pisces";
         }
      }

      /**
       * fungsi yang digunakan untuk menampilkan semua data karyawan
       *
       * @return array
       */
      function showAllKaryawan() : array
      {
         $karyawan = $this->query("SELECT * FROM karyawan");

         return $karyawan;
      }

      /**
       * Fungsi yang digunakan untuk menambahkan data karyawan berdasarkan nama dan tanggal lahir 
       *
       * @param [type] $name
       * @param [type] $birth_date
       * @return integer
       */
      function addKaryawan($name, $birth_date) : int
      {
         $day = $this->getDay($birth_date);
         $month = $this->getMonth($birth_date);
         $year = $this->getYear($birth_date);
         $zodiac = $this->getZodiac($birth_date);
         $age = $this->getAge($birth_date);

         $query = "INSERT into karyawan VALUES(NULL, '$name', '$day', '$month', '$year', '$zodiac', '$age')";
         mysqli_query($this->koneksi, $query);
         
         return mysqli_affected_rows($this->koneksi);
      }
   }
?>