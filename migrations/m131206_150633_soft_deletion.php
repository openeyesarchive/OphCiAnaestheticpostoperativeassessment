<?php

class m131206_150633_soft_deletion extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophcianaestheticpoassessment_anaesthesiasummary','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcianaestheticpoassessment_anaesthesiasummary_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcianaestheticpoassessment_dischargecriteria','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcianaestheticpoassessment_dischargecriteria_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophcianaestheticpoassessment_anaesthesiasummary','deleted');
		$this->dropColumn('et_ophcianaestheticpoassessment_anaesthesiasummary_version','deleted');
		$this->dropColumn('et_ophcianaestheticpoassessment_dischargecriteria','deleted');
		$this->dropColumn('et_ophcianaestheticpoassessment_dischargecriteria_version','deleted');
	}
}
