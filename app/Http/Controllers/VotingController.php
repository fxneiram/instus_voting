<?php

namespace App\Http\Controllers;

use App\DataTables\VotingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVotingRequest;
use App\Http\Requests\UpdateVotingRequest;
use App\Repositories\VotingRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VotingController extends AppBaseController
{
    /** @var  VotingRepository */
    private $votingRepository;

    public function __construct(VotingRepository $votingRepo)
    {
        $this->votingRepository = $votingRepo;
    }

    /**
     * Display a listing of the Voting.
     *
     * @param VotingDataTable $votingDataTable
     * @return Response
     */
    public function index(VotingDataTable $votingDataTable)
    {
        return $votingDataTable->render('votings.index');
    }

    /**
     * Show the form for creating a new Voting.
     *
     * @return Response
     */
    public function create()
    {
        return view('votings.create');
    }

    /**
     * Store a newly created Voting in storage.
     *
     * @param CreateVotingRequest $request
     *
     * @return Response
     */
    public function store(CreateVotingRequest $request)
    {
        $input = $request->all();

        $voting = $this->votingRepository->create($input);

        Flash::success('Voting saved successfully.');

        return redirect(route('votings.index'));
    }

    /**
     * Display the specified Voting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $voting = $this->votingRepository->find($id);

        if (empty($voting)) {
            Flash::error('Voting not found');

            return redirect(route('votings.index'));
        }

        return view('votings.show')->with('voting', $voting);
    }

    /**
     * Show the form for editing the specified Voting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $voting = $this->votingRepository->find($id);

        if (empty($voting)) {
            Flash::error('Voting not found');

            return redirect(route('votings.index'));
        }

        return view('votings.edit')->with('voting', $voting);
    }

    /**
     * Update the specified Voting in storage.
     *
     * @param  int              $id
     * @param UpdateVotingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVotingRequest $request)
    {
        $voting = $this->votingRepository->find($id);

        if (empty($voting)) {
            Flash::error('Voting not found');

            return redirect(route('votings.index'));
        }

        $voting = $this->votingRepository->update($request->all(), $id);

        Flash::success('Voting updated successfully.');

        return redirect(route('votings.index'));
    }

    /**
     * Remove the specified Voting from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $voting = $this->votingRepository->find($id);

        if (empty($voting)) {
            Flash::error('Voting not found');

            return redirect(route('votings.index'));
        }

        $this->votingRepository->delete($id);

        Flash::success('Voting deleted successfully.');

        return redirect(route('votings.index'));
    }

    /*OPTIONS*/

    /**
     * Show the form for editing the specified Voting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function config($id)
    {
        $voting = $this->votingRepository->find($id);

        if (empty($voting)) {
            Flash::error('Voting not found');

            return redirect(route('votings.index'));
        }

        return view('votings.config.index')->with('voting', $voting);
    }

    public function addOption($id)
    {
        $voting = $this->votingRepository->find($id);

        if (empty($voting)) {
            Flash::error('Voting not found');

            return redirect(route('votings.index'));
        }

        return view('votings.config.create')->with('voting', $voting);
    }


    public function storeOption($id, $request)
    {
        $voting = $this->votingRepository->find($id);

        if (empty($voting)) {
            Flash::error('Voting not found');

            return redirect(route('votings.index'));
        }

        return view('votings.config.create')->with('voting', $voting);
    }
}
