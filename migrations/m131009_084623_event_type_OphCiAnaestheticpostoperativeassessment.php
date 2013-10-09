<?php 
class m131009_084623_event_type_OphCiAnaestheticpostoperativeassessment extends CDbMigration
{
	public function up()
	{
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiAnaestheticpostoperativeassessment'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Clinical events'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphCiAnaestheticpostoperativeassessment', 'name' => 'Anaesthetic post-operative assessment','event_group_id' => $group['id']));
		}
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiAnaestheticpostoperativeassessment'))->queryRow();

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Discharge criteria',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Discharge criteria','class_name' => 'Element_OphCiAnaestheticpostoperativeassessment_DischargeCriteria', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Discharge criteria'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Anaesthesia summary',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Anaesthesia summary','class_name' => 'Element_OphCiAnaestheticpostoperativeassessment_AnaesthesiaSummary', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Anaesthesia summary'))->queryRow();

		$this->createTable('et_ophcianaestheticpoassessment_dischargecriteria', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'pain_score' => 'tinyint(1) unsigned NULL',
				'apvu' => 'tinyint(1) unsigned NULL',
				'mews_score' => 'tinyint(1) unsigned NULL',
				'nausea_vomiting' => 'tinyint(1) unsigned NULL',
				'blood_loss' => 'tinyint(1) unsigned NULL',
				'blood_sugar' => 'tinyint(1) unsigned NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianaestheticpoassessment_dischargecriteria_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianaestheticpoassessment_dischargecriteria_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianaestheticpoassessment_dischargecriteria_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcianaestheticpoassessment_dischargecriteria_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianaestheticpoassessment_dischargecriteria_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianaestheticpoassessment_dischargecriteria_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophcianaestheticpoassessment_anaesthesiasummary', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'description' => 'text COLLATE utf8_bin DEFAULT \'\'', // Description
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianaestheticpoassessment_anaesthesiasummary_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianaestheticpoassessment_anaesthesiasummary_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianaestheticpoassessment_anaesthesiasummary_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcianaestheticpoassessment_anaesthesiasummary_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianaestheticpoassessment_anaesthesiasummary_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianaestheticpoassessment_anaesthesiasummary_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

	}

	public function down()
	{
		// --- drop any element related tables ---
		// --- drop element tables ---
		$this->dropTable('et_ophcianaestheticpoassessment_dischargecriteria');



		$this->dropTable('et_ophcianaestheticpoassessment_anaesthesiasummary');




		// --- delete event entries ---
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiAnaestheticpostoperativeassessment'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		// --- delete entries from element_type ---
		$this->delete('element_type', 'event_type_id='.$event_type['id']);

		// --- delete entries from event_type ---
		$this->delete('event_type', 'id='.$event_type['id']);

		// echo "m000000_000001_event_type_OphCiAnaestheticpostoperativeassessment does not support migration down.\n";
		// return false;
		echo "If you are removing this module you may also need to remove references to it in your configuration files\n";
		return true;
	}
}

