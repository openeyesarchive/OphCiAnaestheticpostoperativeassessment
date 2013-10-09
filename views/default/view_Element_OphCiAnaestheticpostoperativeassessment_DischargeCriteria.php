<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>

<h4 class="elementTypeName"><?php echo $element->elementType->name?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('pain_score'))?>:</td>
			<td><span class="big"><?php echo $element->pain_score === null ? 'Not recorded' : ($element->pain_score ? 'Yes' : 'No')?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('apvu'))?>:</td>
			<td><span class="big"><?php echo $element->apvu === null ? 'Not recorded' : ($element->apvu ? 'Yes' : 'No')?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('mews_score'))?>:</td>
			<td><span class="big"><?php echo $element->mews_score === null ? 'Not recorded' : ($element->mews_score ? 'Yes' : 'No')?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('nausea_vomiting'))?>:</td>
			<td><span class="big"><?php echo $element->nausea_vomiting === null ? 'Not recorded' : ($element->nausea_vomiting ? 'Yes' : 'No')?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('blood_loss'))?>:</td>
			<td><span class="big"><?php echo $element->blood_loss === null ? 'Not recorded' : ($element->blood_loss ? 'Yes' : 'No')?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('blood_sugar'))?>:</td>
			<td><span class="big"><?php echo $element->blood_loss === null ? 'Not recorded' : ($element->blood_sugar ? 'Yes' : 'No')?></span></td>
		</tr>
	</tbody>
</table>
