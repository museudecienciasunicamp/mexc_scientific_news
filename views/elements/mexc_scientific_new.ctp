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
		if ($type[1] == 'form')
			echo $this->element('mexc_scientific_new_form', array('plugin' => 'mexc_scientific_news'));
		
	break;
	
	case 'view':
		$link = $this->Bl->a(array('href' => $data['MexcScientificNew']['source_url']), array(), $data['MexcNewsSource']['name']);
		$date = date('d/m/y', strtotime($data['MexcScientificNew']['date']));
		$data['MexcScientificNew']['data'] = $date . ' &ndash; ' . $data['MexcScientificNew']['data'];
		echo $this->Bl->sdiv(array('class' => 'scientific_new'));
			echo $this->Bl->h4Dry($data['MexcScientificNew']['title']);
			echo $this->Bl->para(array('class' => 'small'), array(), explode("\n", $data['MexcScientificNew']['data']));
			echo $this->Bl->pDry('Fonte ' . $link);
		echo $this->Bl->ediv();
	break;
}
