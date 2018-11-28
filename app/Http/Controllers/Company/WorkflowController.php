<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\WorkflowCreateRequest;
use App\Http\Requests\WorkflowUpdateRequest;
use App\Repositories\WorkflowRepository;
use App\Validators\WorkflowValidator;
use Illuminate\Support\Facades\Storage;

/**
 * Class WorkflowsController.
 *
 * @package namespace App\Http\Controllers;
 */
class WorkflowController extends Controller
{
    /**
     * @var WorkflowRepository
     */
    protected $repository;

    /**
     * @var WorkflowValidator
     */
    protected $validator;

    /**
     * WorkflowsController constructor.
     *
     * @param WorkflowRepository $repository
     * @param WorkflowValidator $validator
     */
    public function __construct(WorkflowRepository $repository, WorkflowValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $workflows = $this->repository->all(); 

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $workflows,
            ]);
        }

        return view('workflows.index', compact('workflows'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  WorkflowCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            //upload file
            if ($request->file('diagram') != null) {
                $path = $request->file('diagram')->store('files');
                $tmp = explode('/', $path);
                $diagram = end($tmp);
            }
             
            $arItems = array(
                            'name' => $request->name,
                            'description' => $request->description,
                            'diagram' => $diagram,
                            'explanation' => $request->explanation,
                        );
            
            $workflow = $this->repository->create($arItems);

            $response = [
                'message' => 'Workflow created.',
                'data'    => $workflow->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workflow = $this->repository->getDetail($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $workflow,
            ]);
        }

        return view('workflows.show', compact('workflow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workflow = $this->repository->find($id);

        return view('workflows.edit', compact('workflow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  WorkflowUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {
        try {

            //$this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $oldWorkflow = $this->repository->find($id);
            //upload new file
            if ($request->file('diagram') != null) {
                $path = $request->file('diagram')->store('files');
                $tmp = explode('/', $path);
                $diagram = end($tmp);

                //delete old file
                $oldDiagram = $oldWorkflow->diagram;
                if ($oldDiagram != '') {
                    Storage::delete('files/'.$oldDiagram);
                }
            } else {
                $diagram = $oldWorkflow->diagram;
            }
            $arItem = array(
                            'name' => $request->name,
                            'description' => $request->description,
                            'diagram' => $diagram,
                            'explanation' => $request->explanation,
                        );
            $workflow = $this->repository->update($arItem, $id);

            $response = [
                'message' => 'Workflow updated.',
                'data'    => $workflow->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workflow = $this->repository->find($id);
        $diagram = $workflow->diagram;
        if ($diagram != '') {
            Storage::delete('files/'.$diagram);
        }

        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Workflow deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Workflow deleted.');
    }
}
