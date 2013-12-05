<?php

class m131205_130923_table_versioning extends CDbMigration
{
	public function up()
	{
		$this->execute("
CREATE TABLE `et_ophcianaestheticpoassessment_anaesthesiasummary_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_bin,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophcianaestheticpoassessment_anaesthesiasummary_lmui_fk` (`last_modified_user_id`),
  KEY `acv_et_ophcianaestheticpoassessment_anaesthesiasummary_cui_fk` (`created_user_id`),
  KEY `acv_et_ophcianaestheticpoassessment_anaesthesiasummary_ev_fk` (`event_id`),
  CONSTRAINT `acv_et_ophcianaestheticpoassessment_anaesthesiasummary_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcianaestheticpoassessment_anaesthesiasummary_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcianaestheticpoassessment_anaesthesiasummary_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcianaestheticpoassessment_anaesthesiasummary_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcianaestheticpoassessment_anaesthesiasummary_version');

		$this->createIndex('et_ophcianaestheticpoassessment_anaesthesiasummary_aid_fk','et_ophcianaestheticpoassessment_anaesthesiasummary_version','id');
		$this->addForeignKey('et_ophcianaestheticpoassessment_anaesthesiasummary_aid_fk','et_ophcianaestheticpoassessment_anaesthesiasummary_version','id','et_ophcianaestheticpoassessment_anaesthesiasummary','id');

		$this->addColumn('et_ophcianaestheticpoassessment_anaesthesiasummary_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcianaestheticpoassessment_anaesthesiasummary_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcianaestheticpoassessment_anaesthesiasummary_version','version_id');
		$this->alterColumn('et_ophcianaestheticpoassessment_anaesthesiasummary_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcianaestheticpoassessment_dischargecriteria_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `pain_score` tinyint(1) unsigned DEFAULT NULL,
  `apvu` tinyint(1) unsigned DEFAULT NULL,
  `mews_score` tinyint(1) unsigned DEFAULT NULL,
  `nausea_vomiting` tinyint(1) unsigned DEFAULT NULL,
  `blood_loss` tinyint(1) unsigned DEFAULT NULL,
  `blood_sugar` tinyint(1) unsigned DEFAULT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophcianaestheticpoassessment_dischargecriteria_lmui_fk` (`last_modified_user_id`),
  KEY `acv_et_ophcianaestheticpoassessment_dischargecriteria_cui_fk` (`created_user_id`),
  KEY `acv_et_ophcianaestheticpoassessment_dischargecriteria_ev_fk` (`event_id`),
  CONSTRAINT `acv_et_ophcianaestheticpoassessment_dischargecriteria_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcianaestheticpoassessment_dischargecriteria_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcianaestheticpoassessment_dischargecriteria_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcianaestheticpoassessment_dischargecriteria_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcianaestheticpoassessment_dischargecriteria_version');

		$this->createIndex('et_ophcianaestheticpoassessment_dischargecriteria_aid_fk','et_ophcianaestheticpoassessment_dischargecriteria_version','id');
		$this->addForeignKey('et_ophcianaestheticpoassessment_dischargecriteria_aid_fk','et_ophcianaestheticpoassessment_dischargecriteria_version','id','et_ophcianaestheticpoassessment_dischargecriteria','id');

		$this->addColumn('et_ophcianaestheticpoassessment_dischargecriteria_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcianaestheticpoassessment_dischargecriteria_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcianaestheticpoassessment_dischargecriteria_version','version_id');
		$this->alterColumn('et_ophcianaestheticpoassessment_dischargecriteria_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');
	}

	public function down()
	{
		$this->dropTable('et_ophcianaestheticpoassessment_anaesthesiasummary_version');
		$this->dropTable('et_ophcianaestheticpoassessment_dischargecriteria_version');
	}
}
