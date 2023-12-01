<?php

use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase {

    public function testGetProductsInCategory(): void {
        global $data;
        
        $category = new Category('Mens', [new Product('Blue Shirt'), new Product('Red T-Shirt')]);
        $data[] = $category;

        $this->assertEquals([new Product('Blue Shirt'), new Product('Red T-Shirt')], getProductsInCategory('Mens'));
        $this->assertEquals([], getProductsInCategory('NonexistentCategory'));
    }

    public function testDoesProductExistInCategory(): void {
        global $data;

        $category = new Category('Mens', ['Blue Shirt', 'Red T-Shirt']);
        $data[] = $category;

        $this->assertTrue(doesProductExistInCategory('Mens', 'Blue Shirt'));
        $this->assertFalse(doesProductExistInCategory('Mens', 'NonexistentProduct'));
        $this->assertFalse(doesProductExistInCategory('NonexistentCategory', 'AnyProduct'));
    }
}
