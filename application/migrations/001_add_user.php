<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'user_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'email' => array(
				'type' => 'VARCHAR',
			),
			'phone_no' => array(
				'type' => 'INT',
			),
		));

		$this->dbforge->create_table('blog');
		
	}

	public function down()
	{
		$this->dbforge->drop_table('user');
	}
}
    ?>