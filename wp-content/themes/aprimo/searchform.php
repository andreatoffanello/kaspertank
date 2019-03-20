<?php
add_filter('get_search_form', function($form) {
    $form = '<form class="search-form" action="'.esc_url(home_url("/")).'">
                <input type="text" name="s" placeholder="'.esc_attr__('Search..', 'aprimo').'">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>';
    return $form;
});