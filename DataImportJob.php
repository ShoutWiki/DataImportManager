<?php
class DataImportJob extends Job {
	public function __construct( $wiki, $dbRecord ) {
		parent::__construct( 'dataImport' );
	}

	/**
	 * Execute the job
	 *
	 * @return bool
	 */
	public function run() {
		// Do some stuff.

		return true;
	}
}