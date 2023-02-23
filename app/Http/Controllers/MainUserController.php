<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;

class MainUserController extends Controller
{
    protected $slider;
    protected $menu;
    public function __construct(SliderService $slider, MenuService $menu)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        
    }

    public function index()
    {
        return view('user.main', [
            'title' => 'Shop Nước Hoa ',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
            
        ]);
    }

    
}
