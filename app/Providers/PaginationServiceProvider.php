<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\PaginationServiceProvider as BasePagination;

/**
 * Class PaginationServiceProvider
 * @package App\Providers
 */
class PaginationServiceProvider extends BasePagination
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Paginator::viewFactoryResolver(function () {
            return $this->app['view'];
        });

        Paginator::currentPathResolver(function () {
            return $this->app['request']->url();
        });

        Paginator::currentPageResolver(function ($pageName = 'page') {

            $currentRoute = $this->app->router->current() != null ? $this->app->router->current()->getAction() : [];

            $paginate = $this->app['request']->input($pageName);

            $currentPage = $paginate;

            if (is_array($paginate) && isset($currentRoute['middleware']) && $currentRoute['middleware'] == 'api') {
                $currentPage['limit'] = defaultValue($paginate, 'limit', 10);
                $currentPage['offset'] = defaultValue($paginate, 'offset', 0);
                $currentPage['number'] = defaultValue($paginate, 'number', 1);
                $currentPage['size'] = defaultValue($paginate, 'size', 10);

                if (array_key_exists('offset', $paginate) || array_key_exists('limit', $paginate)) {
                    $currentPage = ceil($currentPage['offset'] / $currentPage['limit']);
                } elseif (array_key_exists('number', $paginate) || array_key_exists('size', $paginate)) {
                    $currentPage = defaultValue($currentPage, 'number', 0);
                }
            }

            return $currentPage;
        });
    }
}
