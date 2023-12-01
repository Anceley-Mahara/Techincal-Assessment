<?php
class CategoryController {

    public function getData(): array {
        $json_data = file_get_contents('../data.json');
        $data = json_decode($json_data);
    
        return $data;
    }
    
    public function getProductsInCategory(string $selectedCategory): array {
        // Get data from the data source
        $data = $this->getData();
        // Time complexity: O(n)
        // Get all products in the selected category
        $selectedCategoryData = null;
        foreach ($data as $categoryData) {
            if ($categoryData->name === $selectedCategory) {
                $selectedCategoryData = $categoryData;
                break;
            }
        }
          // If the selected category is found, return its products
          if ($selectedCategoryData) {
            return $selectedCategoryData->products;
        }
        // If the selected category is not found, return an empty array
        return [];
    }

    public function doesProductExistInCategory(string $selectedCategory, string $productName): bool {
    // Get data from the data source
    $data = $this->getData();
     
    // Search for the product in the selected category
    $productFound = [];
    foreach ($data as $category) {
        // Time complexity: O(n)
        if ($category->name == $selectedCategory) {
            foreach ($category->products as $product) {
                if (strpos(strtolower($product->name), strtolower($productName)) !== false) {
                    //product found
                    return true;
                }
            }
        }
    }
     // Product not found in the specified category
     return false;
}

}
