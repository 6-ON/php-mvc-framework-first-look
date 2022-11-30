<?php

namespace app\core;

abstract class Model
{
    public function loadData($data)
    {
        foreach ($data as $item => $value) {
            if (property_exists($this, $item)) {
                $this->{$item} = $value;
            }
        }
    }

    public function validate()
    {

    }
}
