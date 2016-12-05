<?php
App::uses('AppModel', 'Model');
/**
 * Site Model
 *
 */
class Site extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'site';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

}
