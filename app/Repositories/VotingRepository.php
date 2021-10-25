<?php

namespace App\Repositories;

use App\Models\Voting;
use App\Repositories\BaseRepository;

/**
 * Class VotingRepository
 * @package App\Repositories
 * @version October 24, 2021, 9:07 pm UTC
*/

class VotingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'begin_at',
        'end_at'
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
        return Voting::class;
    }
}
