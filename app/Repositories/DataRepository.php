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

namespace GrahamCampbell\BootstrapCMS\Repositories;

use GrahamCampbell\Credentials\Repositories\AbstractRepository;

/**
 * Class Repository
 * @package Bosnadev\Repositories\Eloquent
 */
abstract class Repository implements RepositoryInterface {

    /**
     * @var App
     */
    private $app;

    /**
     * @var
     */
    protected $model;

    /**
     * @param App $app
     * @throws \Bosnadev\Repositories\Exceptions\RepositoryException
     */
    public function __construct(App $app) {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract function model();

    /**
     * @return Model
     * @throws RepositoryException
     */
    public function makeModel() {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model;
    }
}