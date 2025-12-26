<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(trans('breadcrumbs.home'), route('home'));
});

Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('home');
    if ($category->parent_id) {
        $trail->push($category->parentCategory->title, $category->parentCategory->slug_url);
    }
    $trail->push($category->title, $category->slug_url);
});

Breadcrumbs::for('404', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('breadcrumbs.404'));
});