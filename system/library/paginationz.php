<?php
class Paginationz {
	public $total = 0;
	public $page = 1;
	public $limit = 20;
	public $num_links = 10;
	public $url = '';
	public $text = 'Showing {start} to {end} of {total} ({pages} Pages)';
    public $text_last = '<span class="icon icon-caret icon-end">
    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.721069 0.882813L4.65039 4.81213L0.721069 8.74146" stroke="#006A86"/>
<path d="M4.65076 0.882813L8.58008 4.81213L4.65076 8.74146" stroke="#006A86"/>
</svg>
</span>';
    public $text_first = '<span class="icon icon-caret icon-start">
   <svg width="9" height="10" viewBox="0 0 9 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.57971 8.91333L4.65039 4.98401L8.57971 1.05469" stroke="#006A86"/>
<path d="M4.65002 8.91333L0.720703 4.98401L4.65003 1.05469" stroke="#006A86"/>
</svg>
</span>';
	public $text_next = '<span class="pagination__link"><span class="icon icon-caret"><svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.06384 0.770508L4.99316 4.69983L1.06384 8.62915" stroke="#006A86"/>
</svg></span></span>';
	public $text_prev = ' <span class="pagination__link">
                                                <span class="icon icon-caret">
                                                    <svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.24377 8.42517L1.31445 4.49585L5.24377 0.566528" stroke="#C4C4C4"/>
</svg></span></span> ';
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

        $this->url = str_replace('%7Bpage%7D', '{page}', $this->url);

        $output = '<ul class="pagination">';

        if ($page > 1) {
            $output .= '<li class="pagination__item" ><a class="pagination__link" href="' . str_replace(array('&amp;page={page}', '?page={page}', '&page={page}'), '', $this->url) . '">' . $this->text_first . '</a></li>';

            if ($page - 1 === 1) {
                $output .= '<li class="pagination__item" ><a class="pagination__link" href="' . str_replace(array('&amp;page={page}', '?page={page}', '&page={page}'), '', $this->url) . '">' . $this->text_prev . '</a></li>';
            } else {
                $output .= '<li class="pagination__item" ><a class="pagination__link" href="' . str_replace('{page}', $page - 1, $this->url) . '">' . $this->text_prev . '</a></li>';
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

            for ($i = $start; $i <= $end; $i++) {
                if ($page == $i) {
                    $output .= '<li class="pagination__item is-active" ><span class="pagination__link">' . $i . '</span></li>';
                } else {
                    if ($i === 1) {
                        $output .= '<li class="pagination__item" ><a class="pagination__link" href="' . str_replace(array('&amp;page={page}', '?page={page}', '&page={page}'), '', $this->url) . '">' . $i . '</a></li>';
                    } else {
                        $output .= '<li class="pagination__item" ><a class="pagination__link" href="' . str_replace('{page}', $i, $this->url) . '">' . $i . '</a></li>';
                    }
                }
            }
        }

        if ($page < $num_pages) {
            $output .= '<li class="pagination__item" ><a class="pagination__link" href="' . str_replace('{page}', $page + 1, $this->url) . '">' . $this->text_next . '</a></li>';
            $output .= '<li class="pagination__item" ><a class="pagination__link" href="' . str_replace('{page}', $num_pages, $this->url) . '">' . $this->text_last . '</a></li>';
        }

        $output .= '</ul>';

        if ($num_pages > 1) {
            return $output;
        } else {
            return '';
        }
    }
}
?>
