<?php

namespace App\Repositories;

use App\Models\Option;
use App\Repositories\BaseRepository;

/**
 * Class OptionRepository
 * @package App\Repositories
 * @version October 24, 2021, 11:31 pm UTC
*/

class OptionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'voting_id',
        'description'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Option::class;
    }
}
