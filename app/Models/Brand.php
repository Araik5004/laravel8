<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $id)
 */
class Brand extends Model
{
    private int $status;
    private int $sort;
    private string $name;

    public static function addBrands($request)
    {
        $brands = new Brand();
        $brands->status = $request->status === 'on' ? 1 : 0;
        $max_sort = Brand::max('sort');
        $brands->sort = $max_sort ? ++$max_sort : 1;
        $brands->name = $request->name;
        if ($brands->save()) {
            return true;
        }
        return false;
    }

    public static function updateBrands($request, Brand $brands): bool
    {
        $brands->status = $request->status === 'on' ? 1 : 0;
        $brands->name = $request->name;

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
