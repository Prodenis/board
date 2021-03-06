<?php

use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as Crumbs;
//use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;



Breadcrumbs::register('home', function (Crumbs $crumbs){
    $crumbs->push('Home', route('home'));
});

Breadcrumbs::register('login', function (Crumbs $crumbs){
    $crumbs->parent('home');
    $crumbs->push('Login', route('login'));
});

Breadcrumbs::register('register', function (Crumbs $crumbs){
    $crumbs->parent('home');
    $crumbs->push('Register', route('register'));
});

Breadcrumbs::register('password.reset', function (Crumbs $crumbs){
    $crumbs->parent('password.request');
    $crumbs->push('Change', route('password.reset'));
});

Breadcrumbs::register('cabinet', function (Crumbs $crumbs){
    $crumbs->parent('home');
    $crumbs->push('Cabinet', route('cabinet'));
});

Breadcrumbs::register('category', function (Crumbs $crumbs, $category){
    if ($category->parent) {
        $crumbs->parent('category', $category->parent);
    }
    $crumbs->push($category->name, route('cabinet'));
});

Breadcrumbs::register('advert', function (Crumbs $crumbs, $advert){
    $crumbs->parent('region', $advert->region);
    $crumbs->parent('category', $advert->category);
    $crumbs->push($advert->name, route('cabinet'));
});