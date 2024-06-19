<?php
/*
Plugin Name: WooCommerce Sort by Last Modified
Description: Sort WooCommerce products by last modified date on shop and category/tag pages.
Version: 1.0
Author: ProSaqib
*/

// Modify the main WooCommerce query to sort products by last modified date
add_action('woocommerce_product_query', 'sort_products_by_last_modified');
function sort_products_by_last_modified($query) {
    if (!is_admin() && $query->is_main_query() && is_shop()) {
        $query->set('orderby', 'modified');
        $query->set('order', 'DESC');
    }
}

// Ensure this works on product category and tag pages as well
add_action('pre_get_posts', 'sort_products_by_last_modified_category_tag');
function sort_products_by_last_modified_category_tag($query) {
    if (!is_admin() && $query->is_main_query() && (is_product_category() || is_product_tag())) {
        $query->set('orderby', 'modified');
        $query->set('order', 'DESC');
    }
}
