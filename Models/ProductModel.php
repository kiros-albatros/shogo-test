<?php

class ProductModel
{
    private Db $db;

    public function __construct()
    {
        $this->db = new Db;
    }

    public function findAllProducts()
    {
//        $this->db->query('SELECT * FROM `product`');
//        return $this->db->resultSet();
        $this->db->query('SELECT p.id, p.position, p.url, p.name, 
        p.articul, p.price, p.price_old, p.content, pt.name AS type_name,
        ps.name as section_name FROM product AS p
        INNER JOIN product_assignment AS pa ON p.id = pa.product_id
        INNER JOIN product_section AS ps ON  ps.id = pa.section_id
        INNER JOIN product_type AS pt ON pt.id = pa.type_id
       ');
        return $this->db->resultSet();
    }

    public function findProductParams($id)
    {
        $this->db->query('SELECT ppv.name AS variant_name, ppn.name AS param_name FROM product AS p
        INNER JOIN pivot_product_param_variant AS pivot_pp ON p.id = pivot_pp.product_id
        INNER JOIN product_param_variant AS ppv ON pivot_pp.param_variant_id = ppv.id
        INNER JOIN product_param_name AS ppn ON ppv.param_id = ppn.id 
        WHERE p.id = :id
       ');
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    public function findProduct($id)
    {
        // return $this->db->getById($id, 'product');
        $this->db->query('SELECT p.id, p.position, p.url, p.name, 
        p.articul, p.price, p.price_old, p.content, pt.name AS type_name FROM product AS p
        INNER JOIN product_assignment AS pa ON p.id = pa.product_id
        INNER JOIN product_type AS pt ON  pt.id = pa.type_id
        WHERE p.visible = 1 AND p.id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function findProductsBySection($sectionId)
    {
        $this->db->query('SELECT p.id, p.position, p.url, p.name, 
        p.articul, p.price, p.price_old, p.content, pt.name AS type_name FROM product AS p
        INNER JOIN product_assignment AS pa ON p.id = pa.product_id
        INNER JOIN product_section AS ps ON  ps.id = pa.section_id
        INNER JOIN product_type AS pt ON  pt.id = pa.type_id
        WHERE pa.section_id = :section_id AND p.visible = 1');
        $this->db->bind(':section_id', $sectionId);
        return $this->db->resultSet();
    }

    public function findFilteredProductsBySection($sectionId, $startPrice, $endPrice, $filters)
    {
        if ($startPrice == '') {
            $startPrice = 0;
        };
        if ($endPrice == '') {
            $endPrice = 1000000;
        };
        $filter = implode(',', $filters);
        var_dump($filter);
//        var_dump($startPrice);
//        var_dump($endPrice);
        var_dump($filters);
        $this->db->query('SELECT p.id, p.position, p.url, p.name, 
        p.articul, p.price, p.price_old, p.content FROM product AS p
        INNER JOIN pivot_product_param_variant AS pppv ON p.id = pppv.product_id 
        INNER JOIN product_assignment AS pa ON p.id = pa.product_id
        INNER JOIN product_section AS ps ON  ps.id = pa.section_id
        WHERE pa.section_id = :section_id AND p.visible = 1 
        AND p.price > :start_price AND p.price < :end_price AND pppv.param_variant_id IN (:filter) GROUP BY p.id');
        $this->db->bind(':section_id', $sectionId);
        $this->db->bind(':start_price', $startPrice);
        $this->db->bind(':end_price', $endPrice);
        $this->db->bind(':filter', $filter);
        return $this->db->resultSet();
    }

    public function getTypes()
    {
        $this->db->query('SELECT * FROM product_type');
        return $this->db->resultSet();
    }

    public function addProduct($data)
    {
        $this->db->query('INSERT INTO `product` 
        (name, articul, position, price, price_old, notice, content, currency_id, url, visible) 
        VALUES(:name, :articul, :position, :price, :price_old, :notice, :content, :currency_id, :url, :visible)');
        $this->db->bind(":name", $data['name']);
        $this->db->bind(":articul", $data['articul']);
        $this->db->bind(":position", $data['position']);
        $this->db->bind(":price", $data['price']);
        $this->db->bind(":price_old", $data['price_old']);
        $this->db->bind(":notice", $data['notice']);
        $this->db->bind(":content", $data['content']);
        $this->db->bind(":currency_id", 1);
        $this->db->bind(":url", $data['url']);
        $this->db->bind(":visible", $data['visible']);
        if ($this->db->execute()) {
            $productId = $this->db->pdo->lastInsertId();

            $this->db->query('INSERT INTO `product_assignment` (product_id, section_id, type_id, visible)
            VALUES(:product_id, :section_id, :type_id, :visible)');
            $this->db->bind(":product_id", $productId);
            $this->db->bind(":section_id", $data['section']);
            $this->db->bind(":type_id", $data['type']);
            $this->db->bind(":visible", $data['visible']);
            $this->db->execute();
            return $productId;
        }
    }

    public function addProductVariants($productId, $variantId)
    {
        $this->db->query('INSERT INTO `pivot_product_param_variant` (product_id, param_variant_id)
        VALUES(:product_id, :param_variant_id)');
        $this->db->bind(":product_id", $productId);
        $this->db->bind(":param_variant_id", $variantId);
        $this->db->execute();
    }
}