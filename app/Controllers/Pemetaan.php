<?php

namespace App\Controllers;
use App\Models\PendudukModel;
class Pemetaan extends BaseController
{
    public $title = 'Pemetaan';
    public $url = 'pemetaan';

   
    
  
   
    
    public function index()
    {
        
        
        $data['title'] = $this->title;
        $PendudukModel = new \App\Models\PendudukModel();
        $data['getData'] = $PendudukModel->findAll();
        $data['url'] = $this->url;
        return view('Pemetaan/IndexView', $data);
    }
}