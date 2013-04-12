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

switch ($type[0])
{
	case 'buro':
		switch ($type[1])
		{
			case 'view':
			case 'belongsto_preview':
				echo $this->Bl->pDry($data['MexcNewsSource']['name']);
			break;
			
			case 'form':
			case 'belongsto_form':
				echo $this->Buro->sform(array(), array('model' => 'MexcScientificNews.MexcNewsSource'));
					
					echo $this->Buro->input(array(), array('fieldName' => 'id','type' => 'hidden'));
					echo $this->Buro->input(
						array(), 
						array(
							'fieldName' => 'name',
							'label' => __d('mexc_news_source', 'form - name label', true),
							'instructions' => __d('mexc_news_source', 'form - name instructions', true),
							'error' => __d('mexc_news_source', 'form - name error', true)
						));
					echo $this->Buro->submit(
						array(), 
						array(
							'label' => __d('mexc_news_source', 'form save', true),
							'cancel' => array('label' => __d('mexc_news_source', 'form cancel', true))
						));
					
				echo $this->Buro->eform();
			break;
		}
	break;
}
