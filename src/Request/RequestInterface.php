<?php
namespace Junipeer\Request;

interface RequestInterface
{
    public function toJSON();
    public function toArray();
}
