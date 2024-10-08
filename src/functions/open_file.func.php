<?php
function __openFile($file, $op = null) {
    if (__not_empty($file)):
        # $result_file = __array_filter_unique(explode("\n", file_get_contents($file)));
        $data = __extract_url(file_get_contents($file));
        $data = __validate_trash($data);
        $data = __array_filter_unique($data[0]);
        if (is_array($data)):
            $data = array_map("__add_scheme", $data);
            return $op == 1 ? $data : __process($data);
        endif;
    endif;
}