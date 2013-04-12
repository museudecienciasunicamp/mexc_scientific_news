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

	echo $this->Buro->sform(array(), array(
		'model' => $fullModelName,
		'callbacks' => array(
			'onStart'	=> array('lockForm', 'js' => 'form.setLoading()'),
			'onComplete'=> array('unlockForm', 'js' => 'form.unsetLoading()'),
			'onReject' => array('js' => '$("content").scrollTo(); showPopup("error");', 'contentUpdate' => 'replace'),
			'onSave' => array('js' => '$("content").scrollTo(); showPopup("notice");'),
		)
	));
		
		echo $this->Buro->input(
			array(), 
			array(
				'fieldName' => 'id', 
				'type' => 'hidden'
			)
		);
		
		echo $this->Buro->input(
			array(),
			array(
				'fieldName' => 'title',
				'label' => __d('mexc_scientific_news', 'form - title label', true),
				'instructions' => __d('mexc_scientific_news', 'form - title instructions', true),
				'error' => __d('mexc_scientific_news', 'form - title error: required and 250 chars', true)
			)
		);
		
		echo $this->Buro->input(
			array(),
			array(
				'fieldName' => 'date',
				'type' => 'datetime',
				'options' => array(
					'dateFormat' => 'DMY',
					'timeFormat' => null,
					'minYear' => date('Y')-50,
					'maxYear' => date('Y')
				),
				'label' => __d('mexc_scientific_news', 'form - date label', true),
				'instructions' => __d('mexc_scientific_news', 'form - date instructions', true),
				'error' => __d('mexc_scientific_news', 'form - date error: valid date', true)
			)
		);
		
		
		echo $this->Buro->input(
			array(),
			array(
				'fieldName' => 'data',
				'type' => 'textarea',
				'label' => __d('mexc_scientific_news', 'form - data label', true),
				'instructions' => __d('mexc_scientific_news', 'form - data instructions', true),
				'error' => array(
					'notEmpty' => __d('mexc_scientific_news', 'form - data error: notEmpty', true),
					'length' => __d('mexc_scientific_news', 'form - data error: maxLength 500 chars', true)
				)
			)
		);
		
		echo $this->Buro->sinput(array(), array('type' => 'super_field', 'label' => __d('mexc_scientific_news', 'form - source superfield label', true)));
			echo $this->Buro->input(
				array(),
				array(
					'type' => 'relational',
					'label' => __d('mexc_scientific_news', 'form - agency (relational) label', true),
					'instructions' => __d('mexc_scientific_news', 'form - agency (relational) instructions', true),
					'options' => array(
						'type' => 'unitaryAutocomplete',
						'model' => 'MexcScientificNews.MexcNewsSource',
						'texts' => array(
							'new_item' 		=> __d('mexc_scientific_news', 'form - autocomplete new_item', true),
							'edit_item'		=> __d('mexc_scientific_news', 'form - autocomplete edit_item', true),
							'nothing_found'	=> __d('mexc_scientific_news', 'form - autocomplete nothing_found', true),
							'reset_item'	=> __d('mexc_scientific_news', 'form - autocomplete reset_item', true),
							'undo_reset'	=> __d('mexc_scientific_news', 'form - autocomplete undo_reset', true),
						)
					)
				)
			);
			echo $this->Buro->input(
				array(),
				array(
					'fieldName' => 'source_url',
					'label' => __d('mexc_scientific_news', 'form - source_url label', true),
					'instructions' => __d('mexc_scientific_news', 'form - source_url instructions', true),
					'error' => __d('mexc_scientific_news', 'form - source_url error: valid URL (must begin with protocol://)', true),
					'options' => array(
						'default' => 'http://'
					)
				)
			);
		echo $this->Buro->einput();
		
		echo $this->Buro->submitBox(array(),array('publishControls' => false));
		
	echo $this->Buro->eform();
