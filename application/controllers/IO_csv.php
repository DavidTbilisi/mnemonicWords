<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 11/12/2018
 * Time: 11:53 PM
 */
class IO_csv extends Back_Controller {

	public function import() {
		$ui = $this->ion_auth->get_user_id();
		$this->load->view( 'incs/header', [ "data" => $this->data ] );


		$this->load->helper( [ 'file', 'form' ] );
		$path = './assets/Phrasebook_ui' . $ui . '.csv';

		if ( file_exists( $path ) )
		{
			// echo '<br>file exists';
			$hasFile = true;
		}
		else
		{
			// echo '<br>file not exists';
			$hasFile = false;
		}




		if ( ! $hasFile ):
			// save to assets
			$this->uploadFile( 'import', $ui );
		else:
			// save to SQL
			$this->csvToSql($path,$ui);
		endif;


		$this->load->view( 'incs/footer' );

	}

	private function uploadFile( $view, $user_id ) {
		$config['upload_path']   = './assets/';
		$config['allowed_types'] = 'csv';
		$config['file_name']     = 'Phrasebook_ui' . $user_id;


		$this->load->library( 'upload', $config );

		if ( ! $this->upload->do_upload( 'file' ) )
		{
			$this->load->view( $view, ['error' => $this->upload->display_errors() ] );
		} else {
			$this->load->view( $view, ['datas' => $this->upload->data() ]);
		}
	}

	private function csvToSql($path,$ui) {
		$filename = base_url( $path );
		$handle   = fopen( $filename, "r" );

		while ( fgetcsv( $handle, 1000, "," ) !== false )
		{
			$data = fgetcsv( $handle, 1000, "," );

			$import = "INSERT into words (language,newWord,meaning,user_id)";
			$import .= "values('$data[0]','$data[2]','$data[3]','$ui' );";
			echo $import;
			// $this->db->query($import);
		}

		unlink( $path );
	}

	public function export( $format =  'csv') {
		$this->load->dbutil();
		$this->load->helper('download');
		$sel = 'words.newWord, words.connection, words.assoc, words.meaning, ';
		$sel.= 'details.text';
		$this->db->from( 'words' );
		$this->db->select( $sel );
		$this->db->where( 'words.user_id = ' . $this->ion_auth->get_user_id() );
		$this->db->join('details', 'details.words_id = words.id','left');
		$this->db->order_by( 'words.id desc' );

		if ($format == 'csv'){
			$data = $this->dbutil->csv_from_result( $this->db->get() );
		} else if ($format == 'xml'){
			$data = $this->dbutil->xml_from_result( $this->db->get() );
		}


		else {
			echo 'xml or csv only';
		}


		$path = 'assets/Phrasebook_'.date("Y_m_d_H_i_s").".{$format}";

		file_put_contents($path,$data);
		force_download($path,"\xEF\xBB\xBF".$data,'csv');
	}

}