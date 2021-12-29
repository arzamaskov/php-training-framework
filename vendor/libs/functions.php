<?php

/**
 * Debug function, prints element.
 *
 * @param mixed $param
 *
 * @return void
 */
function debug($param)
{
    echo '<pre>' . print_r($param, true) . '</pre>';
}
