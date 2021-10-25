<?php

namespace App\Http\Controllers;

use App\DataTables\OptionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Models\Voting;
use App\Models\VotingResult;
use App\Repositories\OptionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OptionController extends AppBaseController
{
    /** @var  OptionRepository */
    private $optionRepository;

    public function __construct(OptionRepository $optionRepo)
    {
        $this->optionRepository = $optionRepo;
    }

    /**
     * Display a listing of the Option.
     *
     * @param OptionDataTable $optionDataTable
     * @return Response
     */
    public function index($voting, OptionDataTable $optionDataTable)
    {
        $optionDataTable->setVotingId($voting);
        return $optionDataTable->render('options.index', compact('voting'));
    }

    /**
     * Show the form for creating a new Option.
     *
     * @return Response
     */
    public function create($voting)
    {
        return view('options.create')
            ->with('voting', $voting);
    }

    /**
     * Store a newly created Option in storage.
     *
     * @param CreateOptionRequest $request
     *
     * @return Response
     */
    public function store($voting, CreateOptionRequest $request)
    {
        $input = $request->all();

        $option = $this->optionRepository->create($input);

        VotingResult::create([
            'voting_id' => $voting,
            'option_id' => $option->id,
        ]);
        Flash::success('Option saved successfully.');

        return redirect(route('options.index', $voting));
    }


    /**
     * Show the form for editing the specified Option.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($voting, $id)
    {
        $option = $this->optionRepository->find($id);

        if (empty($option)) {
            Flash::error('Option not found');

            return redirect(route('options.index', $voting));
        }

        return view('options.edit')
            ->with('voting', $voting)
            ->with('option', $option);
    }

    /**
     * Update the specified Option in storage.
     *
     * @param int $id
     * @param UpdateOptionRequest $request
     *
     * @return Response
     */
    public function update($voting, $id, UpdateOptionRequest $request)
    {
        $option = $this->optionRepository->find($id);

        if (empty($option)) {
            Flash::error('Option not found');

            return redirect(route('options.index', $voting));
        }

        $option = $this->optionRepository->update($request->all(), $id);

        Flash::success('Option updated successfully.');

        return redirect(route('options.index', $voting));
    }

    /**
     * Remove the specified Option from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($voting, $id)
    {
        $option = $this->optionRepository->find($id);

        if (empty($option)) {
            Flash::error('Option not found');

            return redirect(route('options.index', $voting));
        }

        $this->optionRepository->delete($id);

        VotingResult::where('voting_id', $voting)
            ->where('option_id', $id)
            ->delete();

        Flash::success('Option deleted successfully.');

        return redirect(route('options.index', $voting));
    }

}
