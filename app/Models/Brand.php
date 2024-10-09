<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * @method static find(int $id)
 */
class Brand extends Model
{
    private int $status;
    private int $sort;
    private string $name;

    public static function addBrands(Request $request): bool
    {
        $brands = new Brand();

        $status = $request->get('status') === 'on' ? 1 : 0;
        $brands->setStatus($status);

        $maxSort = Brand::max('sort');
        $sort = $maxSort ? ++$maxSort : 1;
        $brands->setSort($sort);

        $brands->setName($request->get('name'));

        if ($brands->save()) {
            return true;
        }
        return false;
    }

    public static function updateBrands(Request $request, Brand $brands): bool
    {
        $status = $request->get('status') === 'on' ? 1 : 0;
        $brands->setStatus($status);
        $brands->setName($request->get('name'));

        if ($brands->update()) {
            return true;
        }

        return false;
    }

    public static function getAll(
        int $paginate = 10,
        string $order_field = 'sort',
        string $ord_dir = 'asc'
    ): mixed {
        return Brand::
        select('brands.id', 'brands.name', 'brands.status', 'brands.sort')
            ->orderBy($order_field, $ord_dir)
            ->paginate($paginate);
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getSort(): int
    {
        return $this->sort;
    }

    public function setSort(int $sort): void
    {
        $this->sort = $sort;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
