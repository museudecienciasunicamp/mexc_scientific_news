<?php

/**
 *
 * Copyright 2011-2013, Museu Exploratório de Ciências da Unicamp (http://www.museudeciencias.com.br)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2011-2013, Museu Exploratório de Ciências da Unicamp (http://www.museudeciencias.com.br)
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link          https://github.com/museudecienciasunicamp/mexc_scientific_news.git Mexc Scientifc News public repository
 */

class MexcScientificNew extends MexcScientificNewsAppModel
{
	var $name = 'MexcScientificNew';
	
	var $order = array('MexcScientificNew.date' => 'desc', 'MexcScientificNew.created' => 'desc');
	
	var $actsAs = array(
		'Containable', 
		'Dashboard.DashDashboardable', 
		'Status.Status' => array('publishing_status')
	);

	var $belongsTo = array(
		'MexcNewsSource' => array(
			'className' => 'MexcScientificNew.MexcNewsSource'
		)
	);
	
	var $validate = array(
		'title' => array(
			'rule' => array('maxLength', 250),
			'required' => true,
			'allowEmpty' => false
		),
		'date' => array(
			'rule' => array('date', 'ymd'),
			'required' => true,
			'allowEmpty' => false
		),
		'source_url' => array(
			'rule' => 'url',
			'required' => true,
			'allowEmpty' => false
		),
		'data' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'required' => true
			),
			'length' => array(
				'rule' => array('maxLength', 500)
			)
		),
		
	);

/**
 * Creates a blank row in the table. It is part of the backstage contract.
 *
 * @access public
 * @return mixed Return the saved data if successful, or false, if fails.
 */
	function createEmpty()
	{
		$data = array();
		$data[$this->alias]['date'] = date('Y-m-d');
		$data[$this->alias]['publishing_status'] = 'draft';
		return $this->save($data, false);
	}

/**
 * The data that must be saved into the dashboard. Part of the Dashboard contract.
 *
 * @access public
 * @return 
 */
	function getDashboardInfo($id)
	{
		$this->contain();
		$data = $this->findById($id);
		
		if (empty($data))
			return null;
		
		$dashdata = array(
			'dashable_id' => $data['MexcScientificNew']['id'],
			'dashable_model' => $this->name,
			'type' => 'scientific_news',
			'status' => $data['MexcScientificNew']['publishing_status'],
			'created' => $data['MexcScientificNew']['created'],
			'modified' => $data['MexcScientificNew']['modified'],
			'name' => mb_substr($data['MexcScientificNew']['title'],0,30) . (mb_strlen($data['MexcScientificNew']['title']) > 30 ? '...' : ''),
			'info' => $data['MexcScientificNew']['source_url'],
			'idiom' => array()
		);
		
		return $dashdata;
	}
	
	/** When data is deleted from the Dashboard. Part of the Dashboard contract.
	 *  @todo Maybe we should study how to do it from Backstage contract.
	 */
	
	function dashDelete($id)
	{
		return $this->delete($id);
	}
}
