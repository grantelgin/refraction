<?php

namespace Fuel\Migrations;

class Create_postentries
{
	public function up()
	{
		\DBUtil::create_table('postentries', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'entryId' => array('constraint' => 11, 'type' => 'int'),
			'postId' => array('constraint' => 11, 'type' => 'int'),
			'seq' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('postentries');
	}
}