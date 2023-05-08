<?php

class SectionModel
{
    private Db $db;

    public function __construct()
    {
        $this->db = new Db;
    }

    public function findAllSections()
    {
        $this->db->query('SELECT * FROM `product_section` ORDER BY position');
        return $this->db->resultSet();
    }

    public function findSection($id)
    {
        return $this->db->getById($id, 'product_section');
    }

    public function getSectionParams($id)
    {
        $this->db->query('SELECT ppn.name as param_name, ppn.id as param_id FROM product_section AS ps
        INNER JOIN pivot_product_section_param_name AS pivot_pspn ON ps.id = pivot_pspn.section_id
        INNER JOIN product_param_name AS ppn ON pivot_pspn.param_name_id = ppn.id
        WHERE ps.id = :id
       ');
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    public function getSectionVariants($paramId)
    {
        $this->db->query('SELECT ppv.name as variant_name, ppv.id as variant_id FROM product_param_name as ppn 
        INNER JOIN product_param_variant AS ppv ON ppn.id = ppv.param_id
        WHERE ppn.id = :id');
        $this->db->bind(':id', $paramId);
     //   var_dump($this->db->resultSet());
        return $this->db->resultSet();
    }
}