<?php

namespace App\Project;

use PHPUnit\Framework\TestCase;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Test cases for class ReadData.
 */
class ReadDataTest extends TestCase
{
    /**
     * Construct object
     *
     */
    public function testCreateReadData()
    {
        $data = new ReadData();

        $this->assertInstanceOf("\App\Project\ReadData", $data);
    }

    /**
     * Test readData method
     *
     */
    public function testReadDataMothers()
    {
        $data = new ReadData();
        $data->readData("data/maternal-mortality.csv");

        $this->assertInstanceOf("\App\Project\ReadData", $data);
    }

    // public function testRemoveEntity()
    // {
    //     $data = new ReadData();
    //     $data->readData("data/maternal-mortality.csv");

    //     $this->assertInstanceOf("\App\Project\ReadData", $data);
    // }
}
