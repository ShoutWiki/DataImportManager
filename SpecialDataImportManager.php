<?php

class SpecialDataImportManager extends FormSpecialPage {
	public function __construct() {
		parent::__construct( 'DataImport', 'manage-dataimport' );
	}

	protected function getFormFields() {
		return array(
			'wiki' => array(
				'type' => 'text',
				'label-message' => 'dataimport-label-wiki',
				'required' => true,
				'validation-callback' => null // @TODO: Replace w/ API check.
			),
			'file-assignment' => array(
				'type' => 'checkbox',
				'label-message' => 'dataimport-label-assignment',
				'required' => true,
				'validation-callback' => null // @TODO: Replace w/ check to see file exists. AJAX check.
			),
			'file-path' => array(
				'type' => 'text',
				'label-message' => 'dataimport-label-filepath',
				'required' = true,
				'disabled' => true,
				'validation-callback' => null // @TODO: Some sort of validation.
				
		);
	}
	
	protected function onSubmit( array $data ) {
		$dbw = wfGetDB( DB_MASTER );
		$record = $dbw->insert(
			'importmanager',
			array(
				'wiki' => $data['wiki'],
				'file' => $data['file'],
				'complete' => false
			)
		};
		$job = new DataImportJob( $data['wiki'], $record );
		$record->update( 'job' => $record );
	}
}