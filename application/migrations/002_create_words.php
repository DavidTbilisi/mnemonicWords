<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 8/28/2018
 * Time: 10:24 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_words extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'new_word' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'connection' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'meaning' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'assoc' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'language' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'user_id' => array(
				'type' => 'INT',
				'constraint' => '10',
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('words');
	}

	public function down()
	{
		$this->dbforge->drop_table('words');
	}
}