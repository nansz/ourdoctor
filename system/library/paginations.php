<?php
class Paginations {
	public $total = 0;
	public $page = 1;
	public $limit = 20;
	public $num_links = 10;
	public $url = '';
	public $text = 'Showing {start} to {end} of {total} ({pages} Pages)';
	public $text_first = '|&lt;';
	public $text_last = '&gt;|';
	public $text_next = '<span class="pagination__link"><span class="icon icon-caret"><svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.06384 0.770508L4.99316 4.69983L1.06384 8.62915" stroke="#006A86"/>
</svg></span></span>';
	public $text_prev = ' <span class="pagination__link">
                                                <span class="icon icon-caret">
                                                    <svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.24377 8.42517L1.31445 4.49585L5.24377 0.566528" stroke="#C4C4C4"/>
</svg></span></span> ';
	public $style_links = 'links-pagination';
	public $style_results = 'results';
	 
	public function render() {
		$total = $this->total;
		
		if ($this->page < 1) {
			$page = 1;
		} else {
			$page = $this->page;
		}
		
		if (!(int)$this->limit) {
			$limit = 10;
		} else {
			$limit = $this->limit;
		}
		
		$num_links = $this->num_links;
		$num_pages = ceil($total / $limit);
		
		$output = '';
		
		if ($page >= 1) {
			$tmp_url = str_replace('&amp;', '&', $this->url);
			//$output .= ' <a href="' . str_replace('&', '&amp;', rtrim( str_replace('page={page}', '', $tmp_url), '?&')) . '">' . $this->text_first . '</a>';
			if($page == 1) {
				if($num_pages>1) {
					$output .= '<li>' . $this->text_prev . '</li> ';
				}
			}
			else if ($page == 2){
				$output .= '<li class="pagination__item"  ><a class="pagination__link" href="' . str_replace('&', '&amp;', rtrim( str_replace('page={page}', '', $tmp_url), '?&')) . '">' . $this->text_prev . '</a></li> ';
			}else{
				$output .= '<li class="pagination__item" ><a class="pagination__link" href="' . str_replace('{page}', $page - 1, $this->url) . '">' . $this->text_prev . '</a></li> ';
			}
		}

		if ($num_pages > 1) {
			if ($num_pages <= $num_links) {
				$start = 1;
				$end = $num_pages;
			} else {
				$start = $page - floor($num_links / 2);
				$end = $page + floor($num_links / 2);
			
				if ($start < 1) {
					$end += abs($start) + 1;
					$start = 1;
				}
						
				if ($end > $num_pages) {
					$start -= ($end - $num_pages);
					$end = $num_pages;
				}
			}

			if ($start > 1) {
				$output .= ' .... ';
			}

			for ($i = $start; $i <= $end; $i++) {
				if ($page == $i) {
					$output .= ' <li class="pagination__item is-active"><span class="pagination__link">' . $i . '</span></li> ';
				} elseif($i == 1) {
					$output .= ' <li class="pagination__item" ><a class="pagination__link" href="' . str_replace('&', '&amp;', rtrim( str_replace('page={page}', '', $tmp_url), '?&')) . '">' . $i . '</a></li> ';
				} else {
					$output .= ' <li class="pagination__item" ><a class="pagination__link" href="' . str_replace('{page}', $i, $this->url) . '">' . $i . '</a></li> ';
				}
			}
							
			if ($end < $num_pages) {
				$output .= ' .... ';
			}
		}
		
   		if ($page < $num_pages) {
			$output .= ' <li class="pagination__item" ><a class="pagination__link"  href="' . str_replace('{page}', $page + 1, $this->url) . '">' . $this->text_next . '</a></li>';
		}
		
		$find = array(
			'{start}',
			'{end}',
			'{total}',
			'{pages}'
		);
		
		$replace = array(
			($total) ? (($page - 1) * $limit) + 1 : 0,
			((($page - 1) * $limit) > ($total - $limit)) ? $total : ((($page - 1) * $limit) + $limit),
			$total, 
			$num_pages
		);
		
			return ($output ? '<ul class="pagination">' . $output . '</ul>' : '');
	}
}
?>