<?php
class ModelToolImage extends Model {
	/**
	*	
	*	@param filename string
	*	@param width 
	*	@param height
	*	@param type char [default, w, h]
	*				default = scale with white space, 
	*				w = fill according to width, 
	*				h = fill according to height
	*	
	*/
	public function resize($filename, $width, $height, $type = "") {
		if (!file_exists(DIR_IMAGE . $filename) || !is_file(DIR_IMAGE . $filename)) {
			return;
		} 
		
		$info = pathinfo($filename);
		
		$extension = $info['extension'];
		
		$old_image = $filename;
		$new_image = 'cache/' . utf8_substr($filename, 0, utf8_strrpos($filename, '.')) . '-' . $width . 'x' . $height . $type .'.' . $extension;
		
		if (!file_exists(DIR_IMAGE . $new_image) || (filemtime(DIR_IMAGE . $old_image) > filemtime(DIR_IMAGE . $new_image))) {
			$path = '';
			
			$directories = explode('/', dirname(str_replace('../', '', $new_image)));
			
			foreach ($directories as $directory) {
				$path = $path . '/' . $directory;
				
				if (!file_exists(DIR_IMAGE . $path)) {
					@mkdir(DIR_IMAGE . $path, 0777);
				}		
			}

			list($width_orig, $height_orig) = getimagesize(DIR_IMAGE . $old_image);

			if ($width_orig != $width || $height_orig != $height) {
				$image = new Image(DIR_IMAGE . $old_image);
				$image->resize($width, $height, $type);
				$image->save(DIR_IMAGE . $new_image);
			} else {
				copy(DIR_IMAGE . $old_image, DIR_IMAGE . $new_image);
			}
		}

		return $this->getImageUrl($new_image);
		
	}

	protected function getImageUrl($new_image) {
		$parts = explode('/', $new_image);
		$new_url = implode('/', array_map('rawurlencode', $parts));
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			return $this->config->get('config_ssl') . 'image/' . $new_url;
		}
		else {
			return $this->config->get('config_url') . 'image/' . $new_url;
		}
	}
	
	
	public function resizenew($filename, $width, $height, $type = "") {
		if (!file_exists(DIR_IMAGENEW . $filename) || !is_file(DIR_IMAGENEW . $filename)) {
			return;
		} 
		
		$info = pathinfo($filename);
		
		$extension = $info['extension'];
		
		$old_image = $filename;
		
		$new_image = 'cache/' . utf8_substr($filename, 0, utf8_strrpos($filename, '.')) . '-' . $width . 'x' . $height . $type .'.' . $extension;
		//var_dump($new_image);
		if (!file_exists(DIR_IMAGENEW . $new_image) || (filemtime(DIR_IMAGENEW . $old_image) > filemtime(DIR_IMAGENEW . $new_image))) {
			$path = '';
			
			$directories = explode('/', dirname(str_replace('../', '', $new_image)));
			
			foreach ($directories as $directory) {
				$path = $path . '/' . $directory;
				
				if (!file_exists(DIR_IMAGENEW . $path)) {
					@mkdir(DIR_IMAGENEW . $path, 0777);
				}		
			}

			list($width_orig, $height_orig) = getimagesize(DIR_IMAGENEW . $old_image);

			if ($width_orig != $width || $height_orig != $height) {
				$image = new Image(DIR_IMAGENEW . $old_image);
				$image->resize($width, $height, $type);
				$image->save(DIR_IMAGENEW . $new_image);
			} else {
				copy(DIR_IMAGENEW . $old_image, DIR_IMAGENEW . $new_image);
			}
		}

		return $this->getImageUrlNew($new_image);
		
	}
	
	protected function getImageUrlNew($new_image) {
		$parts = explode('/', $new_image);
		$new_url = implode('/', array_map('rawurlencode', $parts));
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			return $this->config->get('config_ssl') . '/' . $new_url;
		}
		else {
			return $this->config->get('config_url') . '/' . $new_url;
		}
	}
}
