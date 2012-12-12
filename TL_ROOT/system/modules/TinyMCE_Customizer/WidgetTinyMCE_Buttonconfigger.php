<?php

/**
 * @copyright 4ward.media 2012 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */

namespace Psi\TinyMCE_Customizer;

class WidgetTinyMCE_Buttonconfigger extends \Widget
{
	/**
	 * Submit user input
	 * @var boolean
	 */
	protected $blnSubmitInput = true;

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'be_widget_TinyMCE_Buttonconfigger';

	/**
	 * Options
	 * @var array
	 */
	protected $arrOptions = array();


	/**
	 * Add specific attributes
	 * @param string
	 * @param mixed
	 */
	public function __set($strKey, $varValue)
	{
		switch ($strKey)
		{
			case 'options':
				$this->arrOptions = $this->generateOptions($varValue);
				break;

			case 'value':
				$this->varValue = deserialize($varValue);
				break;

			default:
				parent::__set($strKey, $varValue);
				break;
		}
	}


	/**
	 * Generate the widget and return it as string
	 * @return string
	 */
	public function generate()
	{
		// split comma-list into arrays
		$varValue = array();
		for($i=1; $i<=3; $i++)
		{
			$varValue[$i] = explode(',',$this->varValue[$i]);
			if(!is_array($varValue[$i]))
			{
				$varValue[$i] = array();
			}
		}

		// separate unusedButtons, ButtonBar1..3
		$arrUnusedButtons = $this->arrOptions;
		$arrButtonBars = array(array(),array(),array(),array());

		foreach($varValue as $i=>$row)
		{
			foreach($row as $buttonKey)
			{
				if(!array_key_exists($buttonKey,$this->arrOptions) || empty($buttonKey))
				{
					// button is invalid
					continue;
				}

				$arrButtonBars[$i][] = $this->arrOptions[$buttonKey];

				if($this->arrOptions[$buttonKey]['value'] != 'separator')
				{
					unset($arrUnusedButtons[$buttonKey]);
				}
			}
		}


		$this->unusedButtons = $arrUnusedButtons;
		$this->buttonBar1 = $arrButtonBars[1];
		$this->buttonBar2 = $arrButtonBars[2];
		$this->buttonBar3 = $arrButtonBars[3];
	}


	protected function validator($varInput)
	{
		if(!is_array($varInput))
		{
			$this->addError('Error 702: Invalid input');
		}

		foreach($varInput as $k => $row)
		{
			// trim input and remove trailing ","
			$varInput[$k] = trim($row);
			if(substr($varInput[$k],-1) == ',')
			{
				$varInput[$k] = substr($varInput[$k],0,-1);
			}

			$arrButtons = explode(',',$varInput[$k]);

			//validate each button
			foreach($arrButtons as $button)
			{
				if(!empty($button) && !array_key_exists($button,$this->arrOptions))
				{
					$this->addError('Button '.$button.' is not valid within your current config.');
				}
			}
		}

		return $varInput;
	}


	protected function generateOptions($varValue)
	{
		$varValue = deserialize($varValue);

		// force an default-value
		if(!is_array($varValue))
		{
			$varValue = array(1=>'',2=>'',3=>'');
		}

		// fetch custom images
		$arrImages = array();
		foreach($GLOBALS['TinyMCE_Customizer']['plugins'] as $arrCfg)
		{
			if(is_array($arrCfg['buttonImages']))
			{
				$arrImages = array_merge($arrImages,$arrCfg['buttonImages']);
			}
		}

		// populate options with images
		foreach($varValue as $k => $button)
		{
			if(array_key_exists($button['value'],$arrImages))
			{
				$button['image'] = $arrImages[$button['value']];
			}
			else
			{
				$button['image'] = 'system/modules/TinyMCE_Customizer/html/buttons/'.$button['value'].'.gif';
			}

			// display error-image if theres no image-file
			if(!is_file(TL_ROOT.'/'.$button['image']))
			{
				$button['image'] = 'system/modules/TinyMCE_Customizer/html/buttons/imageNotFound.gif';
				$button['label'] = 'ERROR: image for button '.$button['label'].' ['.$button['value'].'] not found!';
				$button['size'] = 'width:20px;height:20px;';
			}
			else
			{
				$size = getimagesize(TL_ROOT.'/'.$button['image']);
				$button['size'] = 'width:'.$size[0].'px;height:'.$size[1].'px;';
			}

			// set an named key for better finding this button
			$varValue[$button['value']] = $button;
			unset($varValue[$k]);
		}

		return $varValue;
	}
}