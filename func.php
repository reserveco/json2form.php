function makeForm($json){
	
	$json = json_decode( $json, JSON_UNESCAPED_UNICODE );
	

	$randID = 'GENERATEDFORM'.rand(0,99999);

	$form_action 	= strlen($json['action']) > 0 ? 'action="'.$json['action'].'"' : '';
	$form_name 		= strlen($json['name']) > 0 ? 'name="'.$json['name'].'"' : '';
	$form_method 	= strlen($json['method']) > 0 ? 'method="'.$json['method'].'"' : '';
	$form_id 		= strlen($json['id']) > 0 ? 'id="'.$json['id'].'"' : '';
	$form_class		= strlen($json['class']) > 0 ? 'class="'.$json['class'].'"' : '';
	$form_target 	= strlen($json['target']) > 0 ? 'target="'.$json['target'].'"' : '';
	$form_autocomplete 	= strlen($json['autocomplete']) > 0 ? 'autocomplete="'.$json['autocomplete'].'"' : '';
	$form 			= '<form '.$form_autocomplete.' '.$form_class.' '.$form_target.' '.$form_action.' '.$form_name.' '.$form_method.' '.$form_id.'>';

	# стиль формы
	echo '
		<style type="text/css">
			#'.$randID.' { margin: 30px; }
			#'.$randID.' .form-caption-info { color: #006699; padding-left: 10px; }
			#'.$randID.' .form-caption-info i { font-size: 30px; display: inline-block; padding-right: 10px; }
			#'.$randID.' .form-caption-info p { margin-left: 52px; margin-right: 41px; margin-bottom: 30px !important; color: #777; text-align: justify; padding-left: 15px; border-left: 2px solid #B9EFFF; }
			#'.$randID.' .block-white { width: 600px; background: #FFF; padding: 10px; border: 1px solid #CCC; border-radius: 4px; box-shadow: 10px 10px 30px -5px #000; margin-bottom: 50px; }
			#'.$randID.' .block-white .blc { margin: 20px 10px; }
			#'.$randID.' .block-white .blc .FC { display: inline-block; width: 350px; margin: 5px 0px; }
			#'.$randID.' .block-white .blc .FCA { position: relative; left: 0px; width: 350px !important; }
			#'.$randID.' .block-white .blc .label-form { display: inline-block; width: 150px; margin-left: 30px; font-weight: normal; }
			#'.$randID.' .block-white .blc .FC-BDATE { display: inline-block; width: 350px; margin-left: 0px; border-radius: 3px 0px 0px 3px !important; } 
			#'.$randID.' .block-white .blc .FC-BDATE input { border-radius: 3px 0px 0px 3px !important; } 
			#'.$randID.' .FC-BDATE-LABEL { float: left; margin-top: 5px; }
			#'.$randID.' .FC-BDATE label.error { display: none !important; }

			#'.$randID.' .block-white .submit-data { text-align: right; }
			#'.$randID.' .block-white .blc input[type="submit"], 
			#'.$randID.' .block-white .blc input[type="button"], 
			#'.$randID.' .block-white .blc input[type="reset"] { margin: 25px 25px 25px 0px; }
			#'.$randID.' label.error { display: block; margin-left: 190px; color: red; font-size: 13px; font-weight: normal;  }
			#'.$randID.' input[type="text"].error, 
			#'.$randID.' input[type="password"].error, 
			#'.$randID.' select.error,
			#'.$randID.' textarea.error {border: 1px solid red; outline-color: red; }
			#'.$randID.' .flt-left { float: left; margin-top: 10px; }
			#'.$randID.' .required-label-mark { position: absolute; margin-left: -8px; float: left; color: #999; font-size: 12px; }
		</style>
	';

	echo '<div id="'.$randID.'">';
	echo '<div class="block-white">';
	//echo '<dl class=""><dt>'.'<i class="'.$json['icon'].'"></i> '.$json['caption'].'</dt></dl>';
	
	echo
	'<div class="form-caption-info">'.
		'<h3>'.'<i class="'.$json['icon'].'"></i>'.$json['caption'].'</h3>'.
		'<p>'.$json['description'].'</p>'.
	'</div>';


'<span class="label-form FC-BDATE-LABEL">Дата рождения</span>
<div class="FC-BDATE">
	<div class="input-group date">
		<input class="form-control bdate required" name="bdate" type="text" value=""/>
		<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
	</div>
</div>';

	echo $form;
	echo '<div class="blc">';

	foreach ($json['info'] as $jsonKey) {
		# code...
		foreach ($jsonKey as $key => $val) {
			# LABEL
			if 		($key == 'label')	{ echo '<span class="label-form">'.$val.'</span>'; }
			# TYPE INPUT
			elseif 	($key == 'input')	{ 
				foreach ($val as $k => $v) {
					echo '<input class="'.$v['class'].'" value="'.$v['value'].'" name="'.$v['name'].'" type="'.$v['type'].'">';
				}
			}
			# TEXTAREA
			elseif 	($key == 'textarea')	{ 
				foreach ($val as $k => $v) {
					echo '<textarea class="'.$v['class'].'" name="'.$v['name'].'" type="'.$v['type'].'">'.$v['value'].'</textarea>';
				}
			}
			# DATE
			elseif 	($key == 'date')	{ 
				foreach ($val as $k => $v) {
					echo '<div class="FC-BDATE">';
						echo '<div class="input-group date">';
							echo '<input class="'.$v['class'].'" value="'.$v['value'].'" name="'.$v['name'].'" type="'.$v['type'].'">';
							echo '<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>';


						echo '</div>';
					echo '</div>';
				}
			}

		}
		
	}



	
	# кнопки
	$BTN = '';
	$BTN = $BTN . '<p class="submit-data">';
	foreach ($json['submit'] as $key_submit => $val_submit) {
		$BTN = $BTN . '<input ';
		foreach ($val_submit as $SUBKEY => $SUBVAL) {
			$BTN = $BTN . $SUBKEY . '="' . $SUBVAL .'"';
		}
		$BTN = $BTN . ' />';
	}
	$BTN = $BTN . '</p>';
	echo $BTN;





	echo '</div>';
	echo '</form>';
	echo '</div>';
	echo '</div>';

}
