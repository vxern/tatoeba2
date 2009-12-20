<?php
/*
    Tatoeba Project, free collaborative creation of multilingual corpuses project
    Copyright (C) 2009  HO Ngoc Phuong Trang <tranglich@gmail.com>

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
class LogsHelper extends AppHelper {

	var $helpers = array('Date', 'Html');
	
	function entry($contribution, $user = null){
		$type = '';
		$status = '';
		
		if($contribution['translation_id'] == ''){
			$type = 'sentence';
		}else{
			$type = 'link';
		}
		
		switch($contribution['action']){
			case 'suggest' : 
				$type = 'correction';
				$status = 'Suggested'; 
				break;
			case 'insert' :
				$status = 'Added';
				break;
			case 'update' :
				$status = 'Modified';
				break;
			case 'delete' :
				$status = 'Deleted';
				break;
		}
		
		echo '<tr class="'.$type.$status.'">';
			// language flag
			echo '<td class="lang">';
			if($type == 'link'){
				echo '&raquo;';
			} else {
				if ($contribution['sentence_lang'] == '') {
					echo '?';
				} else {
					echo $this->Html->image(
						$contribution['sentence_lang'].".png", 
						array("alt" => $contribution['sentence_lang'],
							"class" => "flag"));
				}
				
			}
			echo '</td>';
			
			// sentence text
			echo '<td class="text">';
			echo $this->Html->link(
				$contribution['text'],
				array(
					"controller" => "sentences",
					"action" => "show",
					$contribution['sentence_id']
				)
			);
			echo '</td>';
			
			// contributor
			echo '<td class="username">';
			echo $this->Html->link($user['username'], array("controller" => "users", "action" => "show", $user['id']));
			echo '</td>';
			
			// date of contribution
			echo '<td class="date">';
			echo $this->Date->ago($contribution['datetime']);
			echo '</td>';
		echo '</tr>';
	}
	
	function annexeEntry($contribution, $user = null){
		$type = '';
		$status = '';
		
		if($contribution['translation_id'] == null OR  $contribution['translation_id'] == '' ){
			$type = 'sentence';
		}else{
			$type = 'link';
		}
		
		switch($contribution['action']){
			case 'suggest' : 
				$type = 'correction';
				$status = 'Suggested'; 
				break;
			case 'insert' :
				$status = 'Added';
				break;
			case 'update' :
				$status = 'Modified';
				break;
			case 'delete' :
				$status = 'Deleted';
				break;
		}
		
		echo '<div class="annexeLogEntry '.$type.$status.'">';
			echo '<div>';
				if(isset($user['username'])){
					echo $this->Html->link($user['username'], array("controller" => "users", "action" => "show", $user['id']));
					echo ' - ';
				}
				echo $this->Date->ago($contribution['datetime']);
			echo '</div>';
			
			echo '<div>';
			if($type == 'link'){
				__('linked to');
				echo ' &raquo; ';
				
				echo $this->Html->link(
				$contribution['translation_id'],
				array(
					"controller" => "sentences",
					"action" => "show",
					$contribution['translation_id']
				));
				
			} else {
				echo ' <span class="text">' . $contribution['text'] . '</span>';
			}
			echo '</div>';
		echo '</div>';
	}
}
?>
