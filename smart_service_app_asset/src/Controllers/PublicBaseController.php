<?php
namespace Controllers;

use Closure;
use Helpers\Func;

class PublicBaseController extends BaseController
{
    public function __construct()
    {

    }

    /**
     * For pages that require pagination
     * @param $modelClass
     * @param $viewFile
     * @param array $additionalData
     * @param string $orderByColumn
     * @param int $perPage
     * @param null $queryCallback
     * @return void
     */
    public function manage_items($modelClass, $viewFile, $additionalData = [], $orderByColumn = 'created', $perPage = 10, $queryCallback = null): void
    {
        // Get the current page number, default to 1 if not provided
        $currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

        // Calculate the offset
        $offset = ($currentPage - 1) * $perPage;

        // Start building the query
        $query = $modelClass::query();

        // Apply additional modifications to the query if callback function is provided
        if ($queryCallback instanceof Closure) {
            $queryCallback($query);
        }

        // Total number of items after applying the callback
        $totalItems = $query->count();

        // Fetch items for the current page ordered by the specified column
        $items = $query->orderBy($orderByColumn, 'desc')
            ->limit($perPage)
            ->offset($offset)
            ->get();

        // Get the current URL with existing parameters
        $url = $_SERVER["REQUEST_URI"];
        $urlParts = parse_url($url);
        $url = $urlParts['path'];
        if (!empty($urlParts['query'])) {
            parse_str($urlParts['query'], $params);
            unset($params['page']); // Remove 'page' parameter to avoid duplication
            if (!empty($params)) {
                $url .= '?' . http_build_query($params) . '&';
            } else {
                $url .= '?';
            }
        } else {
            $url .= '?';
        }

        // Generate pagination links
        $paginationLinks = Func::pagination_links_public($totalItems, $perPage, $currentPage, $url);

        $view_data = [
            'items' => $items,
            'paginationLinks' => $paginationLinks,
            'offset' => $offset,
            'total' => $totalItems
        ];

        // Merge additional data with view data
        $view_data = array_merge($view_data, $additionalData);

        $this->loadView($viewFile, $view_data);
    }
}