<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Notify;
use App\Http\Traits\Upload;
use App\Models\Language;
use App\Models\PayoutLog;
use App\Models\Transaction;
use App\Models\User;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    use Upload, Notify;

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(config('basic.paginate'));
        return view('admin.users.list', compact('users'));
    }

    public function search(Request $request)
    {
        $search = $request->all();
        $dateSearch = $request->date_time;
        $date = preg_match("/^[0-9]{2,4}\-[0-9]{1,2}\-[0-9]{1,2}$/", $dateSearch);
        $users = User::when(isset($search['search']), function ($query) use ($search) {
            return $query->where('email', 'LIKE', "%{$search['search']}%")
                ->orWhere('username', 'LIKE', "%{$search['search']}%");
        })
            ->when($date == 1, function ($query) use ($dateSearch) {
                return $query->whereDate("created_at", $dateSearch);
            })
            ->when(isset($search['status']), function ($query) use ($search) {
                return $query->where('status', $search['status']);
            })
            ->paginate(config('basic.paginate'));
        return view('admin.users.list', compact('users', 'search'));
    }


    public function activeMultiple(Request $request)
    {
        if ($request->strIds == null) {
            session()->flash('error', 'You do not select User.');
            return response()->json(['error' => 1]);
        } else {
            User::whereIn('id', $request->strIds)->update([
                'status' => 1,
            ]);
            session()->flash('success', 'User Status Has Been Active');
            return response()->json(['success' => 1]);
        }
    }

    public function inactiveMultiple(Request $request)
    {

        if ($request->strIds == null) {
            session()->flash('error', 'You do not select User.');
            return response()->json(['error' => 1]);
        } else {
            User::whereIn('id', $request->strIds)->update([
                'status' => 0,
            ]);

            session()->flash('success', 'User Status Has Been Deactive');
            return response()->json(['success' => 1]);

        }
    }


    public function userEdit($id)
    {
        $user = User::findOrFail($id);
        $languages = Language::all();
        return view('admin.users.edit-user', compact('user','languages'));
    }

    public function userUpdate(Request $request, $id)
    {
        $languages = Language::all()->map(function ($item){
            return $item->id;
        });
        $userData = Purify::clean($request->except('_token', '_method'));
        $user = User::findOrFail($id);
        $rules = [
            'firstname' => 'sometimes|required',
            'lastname' => 'sometimes|required',
            'username' => 'sometimes|required|unique:users,username,' . $user->id,
            'email' => 'sometimes|required|email|unique:users,email,' . $user->id,
            'phone' => 'sometimes|required',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpeg', 'jpg', 'png'])],
        ];
        $message = [
            'firstname.required' => 'First Name is required',
            'lastname.required' => 'Last Name is required',
        ];

        $Validator = Validator::make($userData, $rules, $message);

        if ($Validator->fails()) {
            return back()->withErrors($Validator)->withInput();
        }

        if ($request->hasFile('image')) {
            try {
                $old = $user->image ?: null;
                $user->image = $this->uploadImage($request->image, config('location.user.path'), config('location.user.size'), $old);
            } catch (\Exception $exp) {
                return back()->with('error', 'Image could not be uploaded.');
            }
        }
        $user->firstname = $userData['firstname'];
        $user->lastname = $userData['lastname'];
        $user->username = $userData['username'];
        $user->email = $userData['email'];
        $user->phone = $userData['phone'];
        $user->address = $userData['address'];
        $user->status = ($userData['status'] == 'on') ? 0 : 1;
        $user->email_verification = ($userData['email_verification'] == 'on') ? 0 : 1;
        $user->sms_verification = ($userData['sms_verification'] == 'on') ? 0 : 1;
        $user->two_fa_verify = ($userData['two_fa_verify'] == 'on') ? 1 : 0;
        $user->save();

        return back()->with('success', 'Updated Successfully.');
    }

    public function passwordUpdate(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:5|same:password_confirmation',
        ]);
        $user = User::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->save();

        $this->sendMailSms($user, 'PASSWORD_CHANGED', [
            'password' => $request->password
        ]);
        return back()->with('success', 'Updated Successfully.');
    }


    public function userBalanceUpdate(Request $request, $id)
    {
        $userData = Purify::clean($request->all());
        if ($userData['balance'] == null) {
            return back()->with('error', 'Balance Value Empty!');
        } else {
            $control = (object)config('basic');
            $user = User::findOrFail($id);


            if ($userData['add_status'] == "1") {
                $user->balance += $userData['balance'];
                $user->save();

                $transaction = new Transaction();
                $transaction->user_id = $user->id;
                $transaction->trx_type = '+';
                $transaction->amount = $userData['balance'];
                $transaction->charge = 0;
                $transaction->remarks = 'Add Balance';
                $transaction->trx_id = strRandom();
                $transaction->save();


                $msg = [
                    'amount' => getAmount($userData['balance']),
                    'currency' => $control->currency,
                    'main_balance' => $user->balance,
                    'transaction' => $transaction->trx_id
                ];
                $action = [
                    "link" => '#',
                    "icon" => "fa fa-money-bill-alt text-white"
                ];

                $this->userPushNotification($user, 'ADD_BALANCE', $msg, $action);


                $this->sendMailSms($user, 'ADD_BALANCE', [
                    'amount' => getAmount($userData['balance']),
                    'currency' => $control->currency,
                    'main_balance' => $user->balance,
                    'transaction' => $transaction->trx_id
                ]);

                return back()->with('success', 'Balance Add Successfully.');

            } else {

                if ($userData['balance'] > $user->balance) {
                    return back()->with('error', 'Insufficient Balance to deducted.');
                }
                $user->balance -= $userData['balance'];
                $user->save();


                $transaction = new Transaction();
                $transaction->user_id = $user->id;
                $transaction->trx_type = '-';
                $transaction->amount = $userData['balance'];
                $transaction->charge = 0;
                $transaction->remarks = 'Add Balance';
                $transaction->trx_id = strRandom();
                $transaction->save();


                $msg = [
                    'amount' => getAmount($userData['balance']),
                    'currency' => $control->currency,
                    'main_balance' => $user->balance,
                    'transaction' => $transaction->trx_id
                ];
                $action = [
                    "link" => '#',
                    "icon" => "fa fa-money-bill-alt text-white"
                ];

                $this->userPushNotification($user, 'DEDUCTED_BALANCE', $msg, $action);

                $this->sendMailSms($user, 'DEDUCTED_BALANCE', [
                    'amount' => getAmount($userData['balance']),
                    'currency' => $control->currency,
                    'main_balance' => $user->balance,
                    'transaction' => $transaction->trx_id,
                ]);
                return back()->with('success', 'Balance deducted Successfully.');
            }
        }


    }


    public function emailToUsers()
    {
        return view('admin.users.mail-form');
    }

    public function sendEmailToUsers(Request $request)
    {
        $req = Purify::clean($request->except('_token', '_method'));
        $rules = [
            'subject' => 'sometimes|required',
            'message' => 'sometimes|required'
        ];
        $validator = Validator::make($req, $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $allUsers = User::where('status', 1)->get();
        foreach ($allUsers as $user) {
            $this->mail($user, null, [], $req['subject'], $req['message']);
        }


        return back()->with('success', 'Mail Send Successfully');
    }


    public function sendEmail($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.single-mail-form', compact('user'));
    }

    public function sendMailUser(Request $request, $id)
    {
        $req = Purify::clean($request->except('_token', '_method'));
        $rules = [
            'subject' => 'sometimes|required',
            'message' => 'sometimes|required'
        ];
        $validator = Validator::make($req, $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = User::findOrFail($id);
        $this->mail($user, null, [], $req['subject'], $req['message']);

        return back()->with('success', 'Mail Send Successfully');
    }


    public function transaction($id)
    {
        $user = User::findOrFail($id);
        $userid = $user->id;
        $transaction = $user->transaction()->paginate(config('basic.paginate'));
        return view('admin.users.transactions', compact('user', 'userid', 'transaction'));
    }

    public function funds($id)
    {
        $user = User::findOrFail($id);
        $userid = $user->id;
        $funds = $user->funds()->paginate(config('basic.paginate'));
        return view('admin.users.fund-log', compact('user', 'userid', 'funds'));
    }

    public function investments($id)
    {
        $user = User::findOrFail($id);
        $userid = $user->id;
        $investments =  $user->invests()->paginate(config('basic.paginate'));
        return view('admin.users.investments', compact('user', 'userid', 'investments'));
    }
    public function payoutLog($id)
    {
        $user = User::findOrFail($id);
        $userid = $user->id;
        $records = PayoutLog::whereUser_id($user->id)->where('status', '!=', 0)->latest()->with('user', 'method')->paginate(config('basic.paginate'));
        return view('admin.users.payout-log', compact('user', 'userid', 'records'));
    }
    public function commissionLog($id)
    {
        $user = User::findOrFail($id);
        $userid = $user->id;
        $transactions = $user->referralBonusLog()->latest()->with('user','bonusBy:id,firstname,lastname')->paginate(config('basic.paginate'));
        return view('admin.users.commissionLog', compact('user', 'userid', 'transactions'));
    }

    public function referralMember($id)
    {
        $user = User::findOrFail($id);
        $referrals = getLevelUser($user->id);
        return view('admin.users.referral', compact('user', 'referrals'));
    }



}
