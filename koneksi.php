<?php 
    class koneksi
    {
        public $host = "localhost";
        public $username = "root";
        public $password = "";
        public $database = "ourzakat";
        public $koneksi = "";

        function __construct(){
            $this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
            if (mysqli_connect_errno()){
                echo "Koneksi database gagal : ".mysqli_connect_error();
            }
        }    
        public function tampilData($query){
            $data = mysqli_query($this->koneksi,$query);
            while($row = mysqli_fetch_assoc($data)){
                $hasil[] = $row;
            }
            return $hasil;
        }     
        public function tambahberas($harga_ltr,$harga_jiwa){
            mysqli_query($this->koneksi, "INSERT INTO beras (harga_ltr, harga_jiwa) VALUES ('$harga_ltr', '$harga_jiwa')");
        }
        public function editberas($harga_ltr,$harga_jiwa,$id){
            mysqli_query($this->koneksi, "UPDATE beras SET harga_ltr='$harga_ltr', harga_jiwa='$harga_jiwa' WHERE id='$id' ");
        }
        public function hapusberas($id){            
            mysqli_query($this->koneksi, "DELETE FROM beras WHERE id = '$id'");
        }
        public function tambahmuzakki($nama,$alamat,$jml_jiwa,$id_beras){
            mysqli_query($this->koneksi, "INSERT INTO muzakki (nama, alamat, jml_jiwa, id_beras) VALUES ('$nama', '$alamat', '$jml_jiwa', '$id_beras')");
        }
        public function editmuzakki($nama,$alamat,$jml_jiwa,$id_beras,$id){
            mysqli_query($this->koneksi, "UPDATE muzakki SET nama='$nama', alamat='$alamat', jml_jiwa='$jml_jiwa', id_beras='$id_beras' WHERE id_muzakki='$id' ");
        }
        public function hapusmuzakki($id){
            mysqli_query($this->koneksi, "DELETE FROM muzakki WHERE id_muzakki = '$id'");
        }
        public function tambahtransaksi($id_muzakki,$tagihan,$status){
            mysqli_query($this->koneksi, "INSERT INTO transaksi (id_muzakki, tagihan, status) VALUES ('$id_muzakki', '$tagihan', '$status')");
        }
        public function edittransaksi($id_muzakki,$tagihan,$status,$id){
            mysqli_query($this->koneksi, "UPDATE transaksi SET id_muzakki='$id_muzakki', tagihan='$tagihan', status='$status' WHERE id='$id' ");
        }
        public function hapustransaksi($id){            
            mysqli_query($this->koneksi, "DELETE FROM transaksi WHERE id = '$id'");
        }
    }
    // $db = new koneksi;   
    // $query = "select * from fakultas";
    // $hasil = $db->tampilData($query);
    // var_dump($hasil);
?>