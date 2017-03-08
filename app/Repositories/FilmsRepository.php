<?php
/**
 * (c) author:roby <zdwroby@gmail.com>
 *
 * ===实现业务逻辑与数据访问分离：作用如下===
 * 集中数据访问逻辑使代码易于维护
 * 业务和数据访问逻辑完全分离
 * 减少重复代码
 * 使程序出错的几率降低
 */

namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class FilmsRepository extends Repository
{
    public function model() {
        return 'App\Models\Film';
    }
}
