<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_First extends CI_Migration {
        public function up(){
                $this->dbforge->add_field(array(
                        'id' => array('type' => 'INT','constraint' => 5,'unsigned' => TRUE,'auto_increment' => TRUE),
                        'name' => array('type' => 'VARCHAR','constraint' => '255',),
                        'email' => array('type' => 'VARCHAR','constraint' => '255',),
                        'password' => array('type' => 'VARCHAR','constraint' => "255",),
                        'register_date' => array('type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP', 'default_string' => false,),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('usersM');
                //////////////////////////////////////////////
                $this->dbforge->add_field(array(
                        'yazi_id' => array('type' => 'INT','constraint' => 5,'unsigned' => TRUE,'auto_increment' => TRUE),
                        'yazi_baslik' => array('type' => 'VARCHAR','constraint' => '255',),
                        'yazi_url' => array('type' => 'VARCHAR','constraint' => '255',),
                        'yazi_icerik' => array('type' => 'TEXT','null' => TRUE,),
                        'yazi_created_at' => array('type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP', 'default_string' => false,),
                ));
                $this->dbforge->add_key('yazi_id', TRUE);
                $this->dbforge->create_table('yazilarM');
                //////////////////////////////////////////////
                $this->dbforge->add_field(array(
                        'kategori_id' => array('type' => 'INT','constraint' => 5,'unsigned' => TRUE,'auto_increment' => TRUE),
                        'kategori_baslik' => array('type' => 'VARCHAR','constraint' => '255',),
                        'kategori_url' => array('type' => 'VARCHAR','constraint' => '255',),
                        'kategori_resim' => array('type' => 'VARCHAR','constraint' => "255",),
                        'kategori_created_at' => array('type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP', 'default_string' => false,),
                        'kategori_sira' => array('type' => 'INT','constraint' => 255),
                ));
                $this->dbforge->add_key('kategori_id', TRUE);
                $this->dbforge->create_table('kategorilerM');
        }
        public function down(){
                $this->dbforge->drop_table('usersM');
                $this->dbforge->drop_table('yazilarM');
                $this->dbforge->drop_table('kategorilerM');
        }
}