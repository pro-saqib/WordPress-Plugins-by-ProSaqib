function sort_products_by_last_modified($query) {
    if (!is_admin() && $query->is_main_query() && (is_shop() || is_product_category() || is_product_tag() || is_post_type_archive('product'))) {
        $query->set('orderby', 'modified');
        $query->set('order', 'DESC');
    }
}

add_action('pre_get_posts', 'sort_products_by_last_modified');
add_action('elementor/query/woocommerce-products', 'sort_products_by_last_modified');
