<?php

namespace App\Http\Controllers;

use App\DataTables\VotingDataTable;
use App\Http\Requests;
use App\Http\Requests\ChoseRequest;
use App\Http\Requests\CreateVotingRequest;
use App\Http\Requests\UpdateVotingRequest;
use App\Models\Voting;
use App\Repositories\VotingRepository;
use Carbon\Carbon;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class VotingController extends AppBaseController
{
    /** @var  VotingRepository */
    private $votingRepository;

    public function __construct(VotingRepository $votingRepo)
    {
        $this->votingRepository = $votingRepo;
        /*
         $this->middleware('permission:roles.index')->only('index');
        $this->middleware('permission:roles.create')->only(['create', 'store']);
        $this->middleware('permission:roles.edit')->only(['edit', 'update']);
        $this->middleware('permission:roles.show')->only('show');
        $this->middleware('permission:roles.destroy')->only('destroy');
         */
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
     * @param int $id
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
     * @param int $id
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
     * @param int $id
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
     * @param int $id
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


    public function publish($id)
    {
        $voting = $this->votingRepository->find($id);

        if (empty($voting)) {
            Flash::error('Voting not found');

            return redirect(route('votings.index'));
        }

        $current_time = \Carbon\Carbon::now();


        if ($voting->public) {
            Flash::error('Esta votacón ya se encuentra publicada.');
            return redirect(route('votings.index'));
        }

        if ($voting->begin_at->gt($current_time) and $voting->end_at->gt($current_time)) {

            Voting::where('id', $id)->update(['public' => 1]);

            Flash::success('Votacón publicada correctamente.');
        } else {
            Flash::error('La fecha de publicación caducó');
        }

        return redirect(route('votings.index'));
    }

    public function result($voting)
    {
        return view('voting_result');
    }

    public function choice($id)
    {
        $voting = $this->votingRepository->find($id);

        if (empty($voting)) {
            Flash::error('Voting not found');

            return redirect(route('home'));
        }

        if ($voting->end_at->lt(Carbon::now())) {
            Flash::error('Esta votación ya se cerró');

            return redirect(route('home'));
        }

        if ($voting->end_at->lt(Carbon::now())) {
            Flash::error('Esta votación ya se cerró');

            return redirect(route('home'));
        }

        return view('chose')->with('voting', $voting);
    }

    /**
     * Update the specified Voting in storage.
     *
     * @param int $id
     * @param ChoseRequest $request
     *
     */
    public function chose($id, ChoseRequest $requests)
    {
        $voting = $this->votingRepository->find($id);

        $user = Auth::user();

        if ($user->vote($requests->all())) {

            return redirect(route('voting.result', $id));
        }

        Flash::error('Su voto no pude ser registrado');

        return redirect(route('voting.choice', $id));
    }
}
