<?php

/**
 * ArtistsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ArtistsTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ArtistsTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Artists');
    }
}