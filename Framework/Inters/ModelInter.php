<?php
namespace Framework\Inters;

interface ModelInter
{

    const DEFAULT_LIMIT = 10;

    /**
     * save the model to storage
     *
     * @access public
     * @return bool
     */
    public function save();

    /**
     * remove the model
     *
     * @access public
     * @return bool
     */
    public function remove();

    /**
     * get this model primary key, it's will return one column, but if this model have multi primary key,that will return array
     *
     * @access public
     * @return mixed
     */
    public function getPrimaryKey();

    /**
     * get this model primary key value.
     * if this model don't have attributes that will return null
     * if this model have one primary that will return string or int.
     * if this model have multi primary key that will return array like [primary_key1 => primary_key1_value, primary_key2 => primary_key2_value]
     *
     * @access public
     * @return mixed
     */
    public function getPrimaryKeyValue();

    /**
     * get this model all row count in storage.
     *
     * @access public
     * @return int
     */
    public function count();

    /**
     * use iterator get models
     * the iterator every return element is instance of ModelInter
     *
     * @access public
     * @param int $limit
     *            the max iteration number. default this parameter is 10
     * @param int $offset
     *            the offset of begin return. default this parameter is 0
     * @return \Generator
     */
    public function getModelByIterator(int $limit = self::DEFAULT_LIMIT, int $offset = 0);

    /**
     * use magic method to realize $model->attrname = 3 to set attribute attrname = 3;
     *
     * @access public
     * @example $model->attrname = 3
     */
    public function __set($attribute, $values);

    /**
     * use magic method to realize $model->attrname to get value of attrname
     *
     * @access public
     * @example $a = $model->attrname
     * @return mixed
     */
    public function __get($attribute);

    /**
     * use magic method to realize isset($model->attrname) to find whether the attribute attrname exists.
     *
     * @access public
     * @example isset($model->attrname)
     * @return bool
     */
    public function __isset($attribute);

    /**
     * get this model attribute name and value.
     * return like [attribute1 => value1, attribute2 => value2]
     *
     * @access public
     * @return array
     */
    public function getAttributeValues();

    /**
     * get this model attributes name
     * return like [attribute1, attribute2]
     * 
     * @access public
     * @return array
     */
    public function getAttributeKeys();
}