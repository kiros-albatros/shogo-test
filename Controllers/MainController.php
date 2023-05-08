<?php

class MainController extends Controller
{
    protected $sectionModel;

    public function __construct()
    {
        $this->sectionModel = $this->model('SectionModel');
    }
    public function main()
    {
        $sections = $this->sectionModel->findAllSections();
        $data['sections'] = $sections;
        $this->view('main', $data);
    }

    public function notFound()
    {
        $this->view('404');
    }
}