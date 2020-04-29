<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Hitung_model extends CI_Model{
  public function __construct(){
      $this->load->database();
  }

  

  public function getListParameter()
  {
    $query = $this->db->query("SELECT a.kriteria, b.nama_parameter FROM kriteria as a INNER JOIN parameter as b ON a.kriteria_id = b.kriteria_id");
    return $query->result();
  }

  public function getAlternatif(){
    $this->db->order_by("alternatif_id", "ASC");
    $query = $this->db->get("alternatif");

    return $query->result();
  }

  public function getCountKriteria(){
    $query = $this->db->query("SELECT COUNT(*) as jumlah FROM kriteria");
    return $query->row();
  }

  public function getCountAlternatif(){
    $query = $this->db->query("SELECT COUNT(*) as jumlah FROM alternatif");
    return $query->row();
  }

  public function getKriteria()
  {
    $this->db->order_by("kriteria_id", "ASC");
    $query = $this->db->get("kriteria");

    return $query->result();
    // $query = json_decode($query,true);
  }

  public function updateNilai($id, $kriteria, $value)
  {
    //var_dump($id.' == '.$kriteria.'===='.$value);die;


    $where = array('nilai_alternatif_id' => $id, 'nilai_kriteria_id' => $kriteria );
    $data = array(
        'nilai' => $value,
    );
    $this->db->where($where);
    $this->db->update('nilai_tbl',$data);
  }

  public function getNilai(){
    $query = $this->db->query("SELECT a.alternatif_id, k.kriteria_id, n.nilai
        FROM nilai_tbl n
        INNER JOIN alternatif a
          ON n.nilai_alternatif_id=a.alternatif_id
        INNER JOIN kriteria k
          ON k.kriteria_id=n.nilai_kriteria_id
        ORDER BY a.alternatif_id, k.kriteria_id");
    $rows = $query->result();
    
    $data = array();
    foreach($rows as $row){
 //       $data[$row->alternatif_id][$row->kriteria_id] = $row->nilai;
       $data[$row->kriteria_id][$row->alternatif_id] = $row->nilai;

    }

    return $data;
}

public function getNilaifull(){
  $query = $this->db->query("SELECT a.alternatif_id, k.kriteria_id, n.nilai
      FROM nilai_tbl n
      INNER JOIN alternatif a
        ON n.nilai_alternatif_id=a.alternatif_id
      INNER JOIN kriteria k
        ON k.kriteria_id=n.nilai_kriteria_id
      ORDER BY a.alternatif_id, k.kriteria_id");
  $rows = $query->result();
  
  $data = array();
  foreach($rows as $row){
      $data[$row->alternatif_id][$row->kriteria_id] = $row->nilai;
      // $data[$row->kriteria_id][$row->alternatif_id] = $row->nilai;

  }

  return $data;
}

public function getNilaiMinimum()
{

    $query = $this->db->query("SELECT DISTINCT a.nilai, a.nilai_kriteria_id  FROM nilai_tbl a
      INNER JOIN(
        SELECT DISTINCT b.nilai_kriteria_id, MIN(b.nilai) MinNilai
        FROM nilai_tbl b
          GROUP BY b.nilai_kriteria_id
        ) NewT   
        ON a.nilai_kriteria_id = NewT.nilai_kriteria_id AND a.nilai = NewT.MinNilai
      ORDER BY a.nilai_kriteria_id;");

        $datamin = $query->result();

        $data=array();
        
        
          foreach($datamin as $row){
            $data[$row->nilai_kriteria_id] = $row->nilai;
          }
        

    return $data;
}

public function getTren()
{

    $query = $this->db->query("SELECT k.tren, a.nilai_kriteria_id  FROM kriteria k
      INNER JOIN nilai_tbl a   
        ON k.kriteria_id = a.nilai_kriteria_id
      ORDER BY a.nilai_kriteria_id;");

        $tren = $query->result();

        $data=array();
        foreach($tren as $row){
          $data[$row->nilai_kriteria_id] = $row->tren;
        }

    return $data;
}

// public function getNilaiTren()
// {

//     $query = $this->db->query("SELECT a.alternatif_id, k.kriteria_id, n.nilai/(SELECT DISTINCT a.nilai FROM nilai_tbl a
//           INNER JOIN(
//           SELECT DISTINCT b.nilai_kriteria_id, MIN(b.nilai) MinNilai
//           FROM nilai_tbl b
//             GROUP BY b.nilai_kriteria_id
//           ) NewT   
//           ON a.nilai_kriteria_id = NewT.nilai_kriteria_id AND a.nilai = NewT.MinNilai
//         ORDER BY a.nilai_kriteria_id) as nilaimin
//       FROM nilai_tbl n
//       INNER JOIN alternatif a
//             ON n.nilai_alternatif_id=a.alternatif_id
//           INNER JOIN kriteria k
//             ON k.kriteria_id=n.nilai_kriteria_id
//           ORDER BY a.alternatif_id, k.kriteria_id");
//       $rows = $query->result();
      
//       $data = array();
//       foreach($rows as $row){
//           $data[$row->alternatif_id][$row->kriteria_id] = $row->nilai;
//       }

//       return $data;
// }

public function getTransform()
{
  $query = $this->db->query("SELECT a.alternatif_id, k.kriteria_id, n.nilai
  FROM nilai_tbl n
  INNER JOIN alternatif a
    ON n.nilai_alternatif_id=a.alternatif_id
  INNER JOIN kriteria k
    ON k.kriteria_id=n.nilai_kriteria_id
  ORDER BY a.alternatif_id, k.kriteria_id
  ");
$rows = $query->result();

$data = array();
foreach($rows as $row){
  $data[$row->alternatif_id][$row->kriteria_id] = $row->nilai;
}

return $data;

}

public function getTransformnegatif()
{
  $query = $this->db->query("SELECT a.alternatif_id, k.tren, k.kriteria_id, n.nilai
  FROM nilai_tbl n
  INNER JOIN alternatif a
    ON n.nilai_alternatif_id=a.alternatif_id
  INNER JOIN kriteria k
    ON k.kriteria_id=n.nilai_kriteria_id
  WHERE k.tren='negatif'
  ORDER BY a.alternatif_id, k.kriteria_id
  ");
$rows = $query->result();

$data = array();
foreach($rows as $row){
  $data[$row->alternatif_id][$row->kriteria_id] = $row->nilai;
}

return $data;

}


public function getListForm($id){
  //    $query = $this->db->query("SELECT ra.ID, k.kode_kriteria, k.nama_kriteria,ra.nilai FROM tbl_relasi ra INNER JOIN tbl_kriteria k ON k.kode_kriteria=ra.kode_kriteria  WHERE kode_alternatif='$id' ORDER BY kode_kriteria");
      
  return $this->db->query('SELECT a.nilai_id, a.nilai_kriteria_id, a.nilai_alternatif_id, a.nilai, c.kriteria FROM nilai_tbl as a INNER JOIN kriteria as c  ON a.nilai_kriteria_id=c.kriteria_id WHERE nilai_alternatif_id= "'.$id.'" and c.kriteria_id = a.nilai_kriteria_id ORDER BY nilai_kriteria_id')->result();
    }

    public function getSelectedAlternatif($id)
    {
      $query = $this->db->query("SELECT * FROM alternatif WHERE alternatif_id='$id'");
      return $query->row();
    }

    public function getNilaialternatif($id)
    {
      $query = $this->db->query("SELECT * FROM nilai_tbl WHERE nilai_alternatif_id='$id'");
      return $query->result();
    }

    public function getNilaitabel()
  {
    return $this->db->get('nilai_tbl')->result();
  }
  

}

