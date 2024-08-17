<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Winner;
use Illuminate\Http\Request;
use App\Jobs\GenerateQRCodeJob;

class LeaderboardController extends Controller
{
    public function index()
    {
        $users = User::orderBy('points', 'desc')->get();
        return response()->json($users);
    }

    public function addUser(Request $request)
    {   
        $user = User::create($request->all());
        GenerateQRCodeJob::dispatch($user);
        // Generate QR code job dispatch
        return response()->json(['status'=>200,'data'=>$user]);
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();
        return response()->json(['status'=>200,'msg'=>'User deleted successfully']);
    }

    public function updateScore(Request $request, $id)
    {
        $user = User::find($id);
        $user->points += $request->input('points');
        $user->save();

        return $this->index();
    }

    public function getUser($id)
    {
        $user = User::find($id);
        return response()->json(['status'=>200,'data'=>$user]);
    }

    public function groupedByScore()
    {
        $users = User::selectRaw('points, AVG(age) as average_age, GROUP_CONCAT(name) as names')
            ->groupBy('points')
            ->get();
            return response()->json(['status'=>200,'data'=>$users]);
        }
}
