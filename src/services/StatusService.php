<?php

/**
 * @copyright Copyright (c) Roman Korolov, 2015
 * @link https://github.com/rokorolov
 * @license http://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 */

namespace rokorolov\statusaction\services;

/**
 * StatusService is a abstract class for Status implementation.
 *
 * @author Roman Korolov <rokorolov@gmail.com>
 */
abstract class  StatusService 
{
    
    abstract static function getStatusActions($statuses);
    
    /**
     * Get the statuses.
     * 
     * @param array|string $value
     * @param array $options
     * @param mixed $default
     * @return array.
     */
    public static function getStatuses($value, $options, $default = '')
    {
        if (!is_null($value) && !is_array($value)) {
            if (array_key_exists($value, $options)) {
                return $options[$value];
            }
            return $default;
        } elseif (!is_null($value) && is_array($value) && !empty($value)) {
            $newOptions = [];
            foreach ($value as $v) {
                $newOptions[$v] = $options[$v];
            }
            return $newOptions;
        }
        return $options;
    }
}
