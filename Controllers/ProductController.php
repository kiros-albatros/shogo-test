<?php

class ProductController extends Controller
{
    protected $productModel;
    protected $sectionModel;

    public function __construct()
    {
        $this->productModel = $this->model('ProductModel');
        $this->sectionModel = $this->model('SectionModel');
    }

    public function getPopular()
    {
        $products = $this->productModel->findAllProducts();
        // var_dump($products);
        $this->view('popular', $products);
    }

    public function addForm()
    {
        $sections = $this->sectionModel->findAllSections();
        $types = $this->productModel->getTypes();
        $data['sections'] = $sections;
        $data['types'] = $types;
        $this->view('product-add', $data);
    }

    public function saveProductImage($file){
        if (!move_uploaded_file($file['tmp_name'], 'images/' . $file['name'])) {
            var_dump('Не удалось сохранить файл');
        }
    }

    public function addProduct()
    {
        if (isset($_POST['name']) && isset($_POST['articul']) && !empty($_FILES['url'])) {
            $data['name'] = trim(htmlspecialchars($_POST['name']));
            $data['articul'] = trim(htmlspecialchars($_POST['articul']));
            $data['position'] = trim(htmlspecialchars($_POST['position']));
            $data['price'] = trim(htmlspecialchars($_POST['price']));
            $data['price_old'] = trim(htmlspecialchars($_POST['price_old']));
            $data['notice'] = trim(htmlspecialchars($_POST['notice']));
            $data['content'] = trim(htmlspecialchars($_POST['content']));
            $data['visible'] = trim(htmlspecialchars($_POST['visible']));
            $data['section'] = trim(htmlspecialchars($_POST['section']));
            $data['type'] = trim(htmlspecialchars($_POST['type']));
            $data['url'] = trim(htmlspecialchars($_FILES['url']['name']));
            $id = $this->productModel->addProduct($data);

            if ($id) {
                foreach ($_POST['variants'] as $variant) {
                    $this->productModel->addProductVariants($id, $variant);
                }
                $this->saveProductImage($_FILES['url']);
                $path = 'Location:' . URLROOT . '/table';
                header($path);
            }
        }
        //   $path = 'Location:' . URLROOT . '/table';
        //    header($path);
    }

    public function getTable()
    {
        $products = $this->productModel->findAllProducts();
        $tableColumns = ["id", "позиция", "изображение", "название", "артикул", "цена", "старая цена", "описание", "тип", "раздел", "параметры"];
        $data['products'] = $products;
        $data['columns'] = $tableColumns;
        $sections = $this->sectionModel->findAllSections();
        $data['sections'] = $sections;
        for ($i = 0; $i < count($data['products']); $i++) {
            count($data['products'][$i]['params'] = $this->productModel->findProductParams($data['products'][$i]['id']));
        }
        $this->view('products-table', $data);
    }

    public function getSectionParams($sectionId)
    {
        $sectionParams = $this->sectionModel->getSectionParams($sectionId);
        for ($i = 0; $i < count($sectionParams); $i++) {
            $sectionParams[$i]['variants'] = $this->sectionModel->getSectionVariants($sectionParams[$i]['param_id']);
        }
        $f = $this->view('section-params', $sectionParams);
        echo $f;
    }

    public function getProduct($id)
    {
        $product = $this->productModel->findProduct($id);
        $sections = $this->sectionModel->findAllSections();
        $data['product'] = $product;
        $data['sections'] = $sections;
        $data['product']['params'] = $this->productModel->findProductParams($id);
        $this->view('product-item', $data);
    }

    public function getProductsBySection($sectionId)
    {
        if (isset($_GET['filter'])) {
            $startPrice = $_GET['start-price'];
            $endPrice = $_GET['end-price'];
            $filters = [];
            foreach ($_GET as $key => $value) {
                if (gettype($key) == 'integer') {
                    $filters[] = $value;
                }
            }
            var_dump($filters);
            $products = $this->productModel->findFilteredProductsBySection($sectionId, $startPrice, $endPrice, $filters);
        } else {
            $products = $this->productModel->findProductsBySection($sectionId);
        }
        $sections = $this->sectionModel->findAllSections();
        $section = $this->sectionModel->findSection($sectionId);
        $sectionParams = $this->sectionModel->getSectionParams($sectionId);
        for ($i = 0; $i < count($sectionParams); $i++) {
            $sectionParams[$i]['variants'] = $this->sectionModel->getSectionVariants($sectionParams[$i]['param_id']);
        }
        $data['products'] = $products;
        $data['sections'] = $sections;
        $data['section'] = $section;
        $data['section_params'] = $sectionParams;
        $this->view('products-list', $data);
    }
}