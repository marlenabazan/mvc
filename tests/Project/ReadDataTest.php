<?php

namespace App\Project;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class ReadData.
 */
class ReadDataTest extends TestCase
{    
    /**
     * testCreateReadData
     * 
     * test create an empty ReadData object 
     *
     * @return void
     */
    public function testCreateReadData()
    {
        $data = new ReadData();

        $this->assertInstanceOf("\App\Project\ReadData", $data);
    }
    
    /**
     * testReadDataMothers
     * 
     * test read data from csv file 
     *
     * @return void
     */
    public function testReadDataMothers()
    {
        $data = new ReadData();
        $data->readData("data/maternal-mortality.csv");

        $this->assertInstanceOf("\App\Project\ReadData", $data);
    }
}
