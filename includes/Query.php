<?php

// namespace Query;

class Queries {
    public static function latest_query_array() {
        return array (
            'limit' => -1,
            'orderby'=> 'date',
            'order'=> 'DESC'
        );
    }

    public static function popular_query_array() {
        return array (
            'limit' => -1,
            'meta_key' => 'total_sales',
            'orderby' => array( 
                'meta_value_num' => 'DESC',
                'title' => 'ASC'
            )
        );
    }
}
