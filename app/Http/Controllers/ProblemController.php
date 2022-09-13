<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Resources\BranchResource;
use App\Models\Agent;
use App\Models\ProblemApp;
use App\Models\ProblemProduct;
use Illuminate\Support\Facades\Validator;
use App\Models\BranchList;
use App\Models\ProblemService;
use App\Models\ProblemTimeStep;

class ProblemController extends Controller
{
    public function createProblem(Request $request)
    {
        $uuid = Str::uuid()->toString();
        $user = Auth::user();
        $data_order = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $request[0]['DataOrder']);

        $validator = Validator::make($request->all(), [
            $request[0]['AGENTID'] => 'required',
            $request[0]['AGENT'] => 'required',
            $request[0]['DokumentId'] => 'required',
            $request[0]['PRAVODKA'] => 'required',
            $request[0]['DataOrder'] => 'required',
            $request[0]['Content'] => 'required',
            $request[0]['status'] => 'required',
            $request[0]['Dokumentfoundations'] => 'required',
            $request[0]['Dokumentfoundationsid'] => 'required',
            $request[0]['Sklad'] => 'required',
            $request[0]['SkladID'] => 'required',
            $request[0]['NakNumber'] => 'required',
            $request[0]['NakData'] => 'required',
            $request[0]['diffekt'] => 'required',
            $request[0]['complekt'] => 'required',
            $request[0]['NamerOrder'] => 'required',
            $request[0]['GUID'] => 'required',
            $request[0]['GUIDID'] => 'required',
            $request[0]['sales'] => 'required',
            $request[0]['salesid'] => 'required',
            $request[0]['Id1C'] => 'required',
        ]);
        $branches = [
            'branch_id' => []
        ];

        $branch = BranchList::where('token', $request[0]['SkladID'])->get();

        if ($branch->isEmpty()) {
            $branchList = new BranchList();

            $branchList->title = $request[0]['Sklad'];
            $branchList->token = $request[0]['SkladID'];

            if ($branchList->save()) {
                echo "BranchList saved  ";
            };
            $branch = BranchList::where('token', $request[0]['SkladID'])->get();
            array_push($branches['branch_id'], $branch[0]['id']);
        } else {
            array_push($branches['branch_id'], $branch[0]['id']);
        }

        $problem = new ProblemApp();
        $problem->uuid = $uuid;
        $problem->user_id = $user->id;
        $problem->document_id = $request[0]['DokumentId'];
        $problem->agent_id = $request[0]['AGENTID'];
        $problem->provodka = $request[0]['PRAVODKA'];
        $problem->date_order = $data_order;
        $problem->complect = $request[0]['complekt'];
        $problem->content = $request[0]['Content'];
        $problem->document_foundations = $request[0]['Dokumentfoundations'];
        $problem->document_foundations_id = $request[0]['Dokumentfoundationsid'];
        $problem->nak_number = $request[0]['NakNumber'];
        $problem->nak_data = $request[0]['NakData'];
        $problem->defect = $request[0]['diffekt'];
        $problem->branch_id = $branches['branch_id'][0];
        $problem->namer_order = $request[0]['NamerOrder'];
        $problem->guid = $request[0]['GUID'];
        $problem->guid_id = $request[0]['GUIDID'];
        $problem->sales = $request[0]['sales'];
        $problem->sales_id = $request[0]['salesid'];
        $problem->id_1c = $request[0]['Id1C'];
        $problem->status_app = $request[0]['status'];
        $problem->status = 1;
        if ($problem->save()) {
            echo "problem app saved ";
        }

        $agent = Agent::where('agent_id', $request[0]['AGENTID'])->get();

        if ($agent->isEmpty()) {
            $agent = new Agent();
            $agent->agent_id = $request[0]['AGENTID'];
            $agent->agent = $request[0]['AGENT'];

            if ($agent->save()) {
                echo "agent app saved";
            }
        }

        foreach ($request[0]['goods'] as $good) {
            $problem_product = new ProblemProduct();
            $problem_product->problem_uuid = $uuid;
            $problem_product->product_name = $good['Good'];
            $problem_product->product_id = $good['GoodId'];
            $problem_product->imel = $good['IMEI'];
            $problem_product->imel_id = $good['IMEIId'];
            $problem_product->product_amount = $good['amount'];
            $problem_product->product_code = $good['code'];
            if ($problem_product->save()) {
                echo " problem_product saved  ";
            };
        };

        return response()->json([
            'status_code' => 201,
            'message' => 'all data saved'
        ], 201);
    }

    public function getAllProblems(Request $request)
    {
        $search = $request['search'] ?? "";
        $pageCount = $request['page'] ?? "10";
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $problems = ProblemApp::with(['problem_time_step', 'problem_product',
            'problem_time_step.user', 'problem_time_step.branch','problem_time_step.comment.user', 'agents', 'branch', 'files','problem_service'])
            ->whereHas('agents', function ($q) use ($search) {
                $q->where('agent', 'LIKE', "%$search%");
            })
            ->whereIn('status', $request->status ?? [1, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 99]);

        if ($start_date) {
            $problems->where('date_order', '>=', $start_date);
        }
        if ($end_date) {
            $problems->where('date_order', '<=', $end_date);
        }
        if ($start_date && $end_date) {
            $problems->whereBetween('date_order', [$start_date, $end_date]);
        }
        if ($request->user_id) {
            $problems->whereIn('user_id', $request->user_id);
        }

        return BranchResource::collection($problems->paginate($request->perPage));
    }

    public function updateProblem(Request $request, $id)
    {
        $user = Auth::user();

        $problem = ProblemApp::findOrFail($id);
        if ($request->user_id) {
            $problem->user_id = $request->user_id;
        };
        if ($request->is_problem) {
            $problem->is_problem = $request->is_problem;
        };
        if ($request->service_id) {
            $problem->service_id = $request->service_id;
        }
        $problem->status = $request->status;

        $time_step = new ProblemTimeStep();
        $time_step->problem_uuid = $problem->uuid;
        $time_step->step = $request->step;
        $time_step->user_id = $user->id;
        $time_step->active = $request->active;
        if ($request->branch_id) {
            $time_step->branch_id = $request->branch_id;
        }

        if ($request->comment){
            $time_step->comment = $request->comment;
        }

        if ($request->new_product) {
            $problem = ProblemProduct::findOrFail($id);
            $problem->active = 0;
            if ($problem->save()) {
                echo "problem saved  ";
            };
            $problem_product = new ProblemProduct();
            $problem_product->problem_uuid = $problem->uuid;
            $problem_product->product_name = $request->product_name;
            $problem_product->product_id = $request->product_id;
            $problem_product->imel = $request->imel;
            $problem_product->imel_id = $request->imel_id;
            $problem_product->product_amount = $request->product_amount;
            $problem_product->product_code = $request->product_code;
            $problem_product->code = 1;
            if ($problem_product->save()) {
                echo " problem_product saved  ";
            };

        }
        if ($time_step->save()) {
            echo "time_step saved  ";
        };
        if ($problem->save()) {
            return "updated problem app";
        }

        }

    public function getProblem(Request $request, $id)
    {
        $search = $request['search'] ?? "";
        $pageCount = $request['page'] ?? "10";
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $branchs = BranchList::get();
        $send_branches = array();
        $recieve_branches = array();
        foreach ($branchs as $branch) {
            array_push($send_branches, $branch->id);
        }
        foreach ($branchs as $branch) {
            array_push($recieve_branches, $branch->token);
        }
        $problem = ProblemApp::where('user_id', $id)
            ->where('step', 'LIKE', "%$search%")
            ->whereIn('status', $request->status ?? [1, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 99]);

        if ($start_date) {
            $problem->where('date_order', '>=', $start_date);
        }
        if ($end_date) {
            $problem->where('date_order', '<=', $end_date);
        }
        if ($start_date && $end_date) {
            $problem->whereBetween('date_order', [$start_date, $end_date]);
        }
        if ($request->branch_id) {
            $problem->whereIn('branch_id', $request->branch_id);
        }
        return BranchResource::collection($problem->paginate($request->perPage));
    }

    public function getProblemItem(Request $request, $id)
    {
        $problem = ProblemApp::with(['problem_time_step', 'problem_product',
            'problem_time_step.user', 'problem_time_step.branch','problem_time_step.comment.user', 'agents', 'branch', 'files'])->findOrFail($id);
        return $problem;
    }

    //problem service
    public function createProblemService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);
        $problem_service = new ProblemService();
        $problem_service->title = $request->title;
        $problem_service->address = $request->address;
        $problem_service->phone = $request->phone;
        $problem_service->status = $request->status;

        if ($problem_service->save()) {
            echo " problem service created";
        }
    }

    public function getProblemService(Request $request, $id)
    {
        $problem_service = ProblemService::findOrFail($id);
        return $problem_service;
    }

    public function getAllProblemServices(Request $request)
    {
        $search = $request['search'] ?? "";
        $pageCount = $request['page'] ?? "10";

        $problem_services = ProblemService::where('title', 'LIKE', "%$search%")->paginate($request->perPage);
        return $problem_services;
    }

    public function updateProblemService(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);
        $problem_service = ProblemService::findOrFail($id);
        $problem_service->title = $request->title;
        $problem_service->address = $request->address;
        $problem_service->phone = $request->phone;
        $problem_service->status = $request->status;


        if ($problem_service->save()) {
            echo " problem service updated";
        }
    }

    public function deleteProblemService(Request $request, $id)
    {
        $problem_service = ProblemService::findOrFail($id);
        if ($problem_service->delete()) {
            return "deleted problem service";
        }
    }

    public function addCommentToTimeStep(Request $request)
    {
        $comment = new Comment();
        $comment->step_id = $request->step_id;
        $comment->message = $request->message;
        $comment->user_id = $request->user_id;
        if ($comment->save()) {
            return response()->json([
                'status_code' => 201,
                'message' => 'comment created'
            ], 201);
        }
    }
}
