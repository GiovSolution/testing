<?php
/* 	
	GIOV Solution - Keep IT Simple -
	
*/

//class of bank
class c_kas extends Controller {

	//constructor
	function c_kas(){
		parent::Controller();
		session_start();
		$this->load->model('m_kas', '', TRUE);
		$this->load->plugin('to_excel');
	}
	
	//set index
	function index(){
		$this->load->helper('asset');
		$this->load->view('main/v_kas');
	}
	
	function get_mbank_list(){
		$result=$this->m_public_function->get_mbank_list();
		echo $result;
	}
	
	function get_akun_list(){
		$result=$this->m_kas->get_akun_list();
		echo $result;
	}

	function saldo_akhir_list(){
		$query = isset($_POST['query']) ? $_POST['query'] : "";
		$start = (integer) (isset($_POST['start']) ? $_POST['start'] : $_GET['start']);
		$end = (integer) (isset($_POST['limit']) ? $_POST['limit'] : $_GET['limit']);
		// $master_id = (integer) (isset($_POST['master_id']) ? $_POST['master_id'] : $_GET['master_id']);
		$result=$this->m_kas->saldo_akhir_list($query,$start,$end);
		echo $result;
	}
	
	//event handler action
	function get_action(){
		$task = $_POST['task'];
		switch($task){
			case "LIST":
				$this->kas_list();
				break;
			case "UPDATE":
				$this->kas_update();
				break;
			case "CREATE":
				$this->kas_create();
				break;
			case "DELETE":
				$this->bank_delete();
				break;
			case "SEARCH":
				$this->bank_search();
				break;
			case "PRINT":
				$this->bank_print();
				break;
			case "EXCEL":
				$this->bank_export_excel();
				break;
			default:
				echo "{failure:true}";
				break;
		}
	}
	
	//function fot list record
	function kas_list(){
		
		$query = isset($_POST['query']) ? $_POST['query'] : "";
		$start = (integer) (isset($_POST['start']) ? $_POST['start'] : $_GET['start']);
		$end = (integer) (isset($_POST['limit']) ? $_POST['limit'] : $_GET['limit']);

		$result=$this->m_kas->kas_list($query,$start,$end);
		echo $result;
	}

	//function for update record
	function kas_update(){
		//POST variable here
		$kas_id=trim(@$_POST["kas_id"]);
		$kas_tanggal=trim(@$_POST["kas_tanggal"]);
		
		$kas_jumlah=trim($_POST["kas_jumlah"]);
		
		$kas_keterangan=trim(@$_POST["kas_keterangan"]);
		$kas_keterangan=str_replace("/(<\/?)(p)([^>]*>)", "",$kas_keterangan);
		$kas_keterangan=str_replace("'", '"',$kas_keterangan);
		$kas_tipe=trim(@$_POST["kas_tipe"]);
		$kas_tipe=str_replace("/(<\/?)(p)([^>]*>)", "",$kas_tipe);
		$kas_tipe=str_replace("'", '"',$kas_tipe);
		
		$result = $this->m_kas->kas_update($kas_id , $kas_tanggal, $kas_jumlah , $kas_keterangan, $kas_tipe);
		echo $result;
	}
	
	//function for create new record
	function kas_create(){
		//POST varible here
		$kas_tanggal=trim(@$_POST["kas_tanggal"]);

		$kas_keterangan=trim(@$_POST["kas_keterangan"]);
		$kas_keterangan=str_replace("/(<\/?)(p)([^>]*>)", "",$kas_keterangan);
		$kas_keterangan=str_replace("'", '"',$kas_keterangan);
		
		$kas_jumlah=trim($_POST["kas_jumlah"]);
		
		$kas_tipe=trim(@$_POST["kas_tipe"]);
		$kas_tipe=str_replace("/(<\/?)(p)([^>]*>)", "",$kas_tipe);
		$kas_tipe=str_replace("'", '"',$kas_tipe);
		
		$kas_date_create=trim(@$_POST["kas_date_create"]);

		$kas_date_update=trim(@$_POST["kas_date_update"]);

		$result=$this->m_kas->kas_create($kas_tanggal, $kas_jumlah , $kas_keterangan ,$kas_tipe ,$kas_date_create ,$kas_date_update );
		echo $result;
	}

	//function for delete selected record
	function bank_delete(){
		$ids = $_POST['ids']; // Get our array back and translate it :
		$pkid = json_decode(stripslashes($ids));
		$result=$this->m_kas->bank_delete($pkid);
		echo $result;
	}

	//function for advanced search
	function bank_search(){
		//POST varibale here
		$bank_id=trim(@$_POST["bank_id"]);
		$bank_kode=trim(@$_POST["bank_kode"]);
		$bank_kode=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_kode);
		$bank_kode=str_replace("'", '"',$bank_kode);
		$bank_nama=trim(@$_POST["bank_nama"]);
		$bank_nama=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_nama);
		$bank_nama=str_replace("'", '"',$bank_nama);
		$bank_norek=trim(@$_POST["bank_norek"]);
		$bank_norek=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_norek);
		$bank_norek=str_replace("'", '"',$bank_norek);
		$bank_atasnama=trim(@$_POST["bank_atasnama"]);
		$bank_atasnama=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_atasnama);
		$bank_atasnama=str_replace("'", '"',$bank_atasnama);
		$bank_saldo=trim(@$_POST["bank_saldo"]);
		$bank_keterangan=trim(@$_POST["bank_keterangan"]);
		$bank_keterangan=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_keterangan);
		$bank_keterangan=str_replace("'", '"',$bank_keterangan);
		$bank_aktif=trim(@$_POST["bank_aktif"]);
		$bank_aktif=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_aktif);
		$bank_aktif=str_replace("'", '"',$bank_aktif);
		$bank_creator=trim(@$_POST["bank_creator"]);
		$bank_creator=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_creator);
		$bank_creator=str_replace("'", '"',$bank_creator);
		$bank_date_create=trim(@$_POST["bank_date_create"]);
		$bank_update=trim(@$_POST["bank_update"]);
		$bank_update=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_update);
		$bank_update=str_replace("'", '"',$bank_update);
		$bank_date_update=trim(@$_POST["bank_date_update"]);
		$bank_revised=trim(@$_POST["bank_revised"]);
		
		$start = (integer) (isset($_POST['start']) ? $_POST['start'] : $_GET['start']);
		$end = (integer) (isset($_POST['limit']) ? $_POST['limit'] : $_GET['limit']);
		$result = $this->m_kas->bank_search($bank_id ,$bank_kode ,$bank_nama ,$bank_norek ,$bank_atasnama ,$bank_saldo ,$bank_keterangan ,$bank_aktif ,$bank_creator ,$bank_date_create ,$bank_update ,$bank_date_update ,$bank_revised ,$start,$end);
		echo $result;
	}


	function bank_print(){
  		//POST varibale here
		$bank_id=trim(@$_POST["bank_id"]);
		$bank_kode=trim(@$_POST["bank_kode"]);
		$bank_kode=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_kode);
		$bank_kode=str_replace("'", '"',$bank_kode);
		$bank_nama=trim(@$_POST["bank_nama"]);
		$bank_nama=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_nama);
		$bank_nama=str_replace("'", '"',$bank_nama);
		$bank_norek=trim(@$_POST["bank_norek"]);
		$bank_norek=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_norek);
		$bank_norek=str_replace("'", '"',$bank_norek);
		$bank_atasnama=trim(@$_POST["bank_atasnama"]);
		$bank_atasnama=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_atasnama);
		$bank_atasnama=str_replace("'", '"',$bank_atasnama);
		$bank_saldo=trim(@$_POST["bank_saldo"]);
		$bank_keterangan=trim(@$_POST["bank_keterangan"]);
		$bank_keterangan=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_keterangan);
		$bank_keterangan=str_replace("'", '"',$bank_keterangan);
		$bank_aktif=trim(@$_POST["bank_aktif"]);
		$bank_aktif=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_aktif);
		$bank_aktif=str_replace("'", '"',$bank_aktif);
		$bank_creator=trim(@$_POST["bank_creator"]);
		$bank_creator=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_creator);
		$bank_creator=str_replace("'", '"',$bank_creator);
		$bank_date_create=trim(@$_POST["bank_date_create"]);
		$bank_update=trim(@$_POST["bank_update"]);
		$bank_update=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_update);
		$bank_update=str_replace("'", '"',$bank_update);
		$bank_date_update=trim(@$_POST["bank_date_update"]);
		$bank_revised=trim(@$_POST["bank_revised"]);
		$option=$_POST['currentlisting'];
		$filter=$_POST["query"];
		
		$result = $this->m_kas->bank_print($bank_id ,$bank_kode ,$bank_nama ,$bank_norek ,$bank_atasnama ,$bank_saldo ,$bank_keterangan ,$bank_aktif ,$bank_creator ,$bank_date_create ,$bank_update ,$bank_date_update ,$bank_revised ,$option,$filter);
		$nbrows=$result->num_rows();
		$totcolumn=13;
   		/* We now have our array, let's build our HTML file */
		$file = fopen("banklist.html",'w');
		fwrite($file, "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' /><title>Printing the Rekening Grid</title><link rel='stylesheet' type='text/css' href='assets/modules/main/css/printstyle.css'/></head>");
		fwrite($file, "<body onload='window.print()'><table summary='Bank List'><caption>DAFTAR REKENING</caption><thead><tr><th scope='col'>No</th><th scope='col'>Kode</th><th scope='col'>Nama</th><th scope='col'>No.Rekening</th><th scope='col'>Atas Nama</th><th scope='col'>Saldo</th><th scope='col'>Keterangan</th><th scope='col'>Aktif</th></tr></thead><tfoot><tr><th scope='row'>Total</th><td colspan='$totcolumn'>");
		fwrite($file, $nbrows);
		fwrite($file, " Bank</td></tr></tfoot><tbody>");
		$i=0;
		if($nbrows>0){
			foreach($result->result_array() as $data){
				$i++;
				fwrite($file,'<tr');
				if($i%1==0){
					fwrite($file," class='odd'");
				}
			
				fwrite($file, "><th scope='row' id='r97'>");
				fwrite($file, $i);
				fwrite($file,"</th><td>");
				fwrite($file, $data['bank_kode']);
				fwrite($file,"</td><td>");
				fwrite($file, $data['mbank_nama']);
				fwrite($file,"</td><td>");
				fwrite($file, $data['bank_norek']);
				fwrite($file,"</td><td>");
				fwrite($file, $data['bank_atasnama']);
				fwrite($file,"</td><td>");
				fwrite($file, $data['bank_saldo']);
				fwrite($file,"</td><td>");
				fwrite($file, $data['bank_keterangan']);
				fwrite($file,"</td><td>");
				fwrite($file, $data['bank_aktif']);
				// fwrite($file,"</td><td>");
				// fwrite($file, $data['bank_creator']);
				// fwrite($file,"</td><td>");
				// fwrite($file, $data['bank_date_create']);
				// fwrite($file,"</td><td>");
				// fwrite($file, $data['bank_update']);
				// fwrite($file,"</td><td>");
				// fwrite($file, $data['bank_date_update']);
				// fwrite($file,"</td><td>");
				// fwrite($file, $data['bank_revised']);
				fwrite($file, "</td></tr>");
			}
		}
		fwrite($file, "</tbody></table></body></html>");	
		fclose($file);
		echo '1';        
	}
	/* End Of Function */

	/* Function to Export Excel document */
	function bank_export_excel(){
		//POST varibale here
		$bank_id=trim(@$_POST["bank_id"]);
		$bank_kode=trim(@$_POST["bank_kode"]);
		$bank_kode=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_kode);
		$bank_kode=str_replace("'", '"',$bank_kode);
		$bank_nama=trim(@$_POST["bank_nama"]);
		$bank_nama=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_nama);
		$bank_nama=str_replace("'", '"',$bank_nama);
		$bank_norek=trim(@$_POST["bank_norek"]);
		$bank_norek=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_norek);
		$bank_norek=str_replace("'", '"',$bank_norek);
		$bank_atasnama=trim(@$_POST["bank_atasnama"]);
		$bank_atasnama=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_atasnama);
		$bank_atasnama=str_replace("'", '"',$bank_atasnama);
		$bank_saldo=trim(@$_POST["bank_saldo"]);
		$bank_keterangan=trim(@$_POST["bank_keterangan"]);
		$bank_keterangan=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_keterangan);
		$bank_keterangan=str_replace("'", '"',$bank_keterangan);
		$bank_aktif=trim(@$_POST["bank_aktif"]);
		$bank_aktif=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_aktif);
		$bank_aktif=str_replace("'", '"',$bank_aktif);
		$bank_creator=trim(@$_POST["bank_creator"]);
		$bank_creator=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_creator);
		$bank_creator=str_replace("'", '"',$bank_creator);
		$bank_date_create=trim(@$_POST["bank_date_create"]);
		$bank_update=trim(@$_POST["bank_update"]);
		$bank_update=str_replace("/(<\/?)(p)([^>]*>)", "",$bank_update);
		$bank_update=str_replace("'", '"',$bank_update);
		$bank_date_update=trim(@$_POST["bank_date_update"]);
		$bank_revised=trim(@$_POST["bank_revised"]);
		$option=$_POST['currentlisting'];
		$filter=$_POST["query"];
		
		$query = $this->m_kas->bank_export_excel($bank_id ,$bank_kode ,$bank_nama ,$bank_norek ,$bank_atasnama ,$bank_saldo ,$bank_keterangan ,$bank_aktif ,$bank_creator ,$bank_date_create ,$bank_update ,$bank_date_update ,$bank_revised ,$option,$filter);
		
		to_excel($query,"bank"); 
		echo '1';
			
	}
	
	// Encodes a SQL array into a JSON formated string
	function JEncode($arr){
		if (version_compare(PHP_VERSION,"5.2","<"))
		{    
			require_once("./JSON.php"); //if php<5.2 need JSON class
			$json = new Services_JSON();//instantiate new json object
			$data=$json->encode($arr);  //encode the data in json format
		} else {
			$data = json_encode($arr);  //encode the data in json format
		}
		return $data;
	}
	
	// Encodes a YYYY-MM-DD into a MM-DD-YYYY string
	function codeDate ($date) {
	  $tab = explode ("-", $date);
	  $r = $tab[1]."/".$tab[2]."/".$tab[0];
	  return $r;
	}
	
}
?>