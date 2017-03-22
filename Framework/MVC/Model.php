<?php
namespace Framework\MVC;

use Framework\Inters\ModelInter;

abstract class Model implements ModelInter
{

    /**
     * save all attributes.
     * struct like [attribute1 => value1, attribute2 => value2]
     *
     * @access protected
     * @var array
     */
    protected $attributes = [];

    /**
     * save all columns name.
     *
     * @access protected
     * @var array
     */
    protected $columns = [];

    /**
     * save primary key.
     * if this model have one primary key then type is string.
     * if this model have multi primary key then type is array.
     *
     * @access protected
     * @var mixed
     */
    protected $primary_key;

    /**
     * save all columns info like : type、default、if null、comment and so on.
     *
     * @access protected
     * @var array
     */
    protected $columns_info = [];

    /**
     * whether segment the tables.
     * default is false.
     *
     * @access protected
     * @var bool
     */
    protected $whether_segment_table = false;

    /**
     *
     * {@inheritDoc}
     *
     * @access public
     * @example $a = $model->attrname
     * @see \Framework\Inters\ModelInter::__get()
     * @return mixed
     */
    public function __get($attribute)
    {
        return $this->attributes[$attribute];
    }

    /**
     *
     * {@inheritDoc}
     *
     * @access public
     * @example isset($model->attrname)
     * @see \Framework\Inters\ModelInter::__isset()
     * @return bool
     */
    public function __isset($attribute)
    {
        return isset($this->attributes[$attribute]);
    }

    /**
     *
     * {@inheritDoc}
     *
     * @access public
     * @example $model->attrname = 3
     * @see \Framework\Inters\ModelInter::__set()
     */
    public function __set($attribute, $values)
    {
        $this->attributes[$attribute] = $values;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @access public
     * @see \Framework\Inters\ModelInter::count()
     */
    public function count()
    {
        // TODO 自动生成的方法存根
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Framework\Inters\ModelInter::getAttributeKeys()
     */
    public function getAttributeKeys()
    {
        return $this->columns;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Framework\Inters\ModelInter::getAttributeValues()
     */
    public function getAttributeValues()
    {
        return $this->attributes;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Framework\Inters\ModelInter::getModelByIterator()
     */
    public function getModelByIterator(int $limit = self::DEFAULT_LIMIT, int $offset = 0)
    {
        // TODO 自动生成的方法存根
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Framework\Inters\ModelInter::getPrimaryKey()
     */
    public function getPrimaryKey()
    {
        return $this->primary_key;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Framework\Inters\ModelInter::getPrimaryKeyValue()
     */
    public function getPrimaryKeyValue()
    {
        if (is_array($this->primary_key)) {
            $return = [];
            foreach ($this->primary_key as $primary_key) {
                $return[$primary_key] = $this->attributes[$primary_key];
            }
            return $return;
        }
        return $this->attributes[$this->primary_key];
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Framework\Inters\ModelInter::remove()
     */
    public function remove()
    {
        // TODO 自动生成的方法存根
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Framework\Inters\ModelInter::save()
     */
    public function save()
    {
        // TODO 自动生成的方法存根
    }
}