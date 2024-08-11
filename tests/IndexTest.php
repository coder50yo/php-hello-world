<?php

use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    public function testHelloWorld()
    {
        ob_start();
        include 'src/index.php';
        $output = ob_get_clean();
        $this->assertEquals('Hello, World!', $output);
    }
}