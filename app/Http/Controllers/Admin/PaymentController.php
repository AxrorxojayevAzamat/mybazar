<?php


namespace App\Http\Controllers\Admin;


use App\Entity\Payment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Payments\CreateRequest;
use App\Http\Requests\Admin\Payments\UpdateRequest;
use App\Services\Manage\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $service;

    public function __construct(PaymentService $service)
    {
        $this->middleware('can:manage-payments');
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = Payment::orderByDesc('updated_at');

        if (!empty($value = $request->get('name'))) {
            $query->where(function ($query) use ($value) {
                $query->where('name_uz', 'like', '%' . $value . '%')
                    ->orWhere('name_ru', 'like', '%' . $value . '%')
                    ->orWhere('name_en', 'like', '%' . $value . '%');
            });
        }

        $payments = $query->paginate(20);

        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        return view('admin.payments.create');
    }

    public function store(CreateRequest $request)
    {
        $payment = $this->service->create($request);

        return redirect()->route('admin.payments.show', $payment);
    }

    public function show(Payment $payment)
    {
        return view('admin.payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        return view('admin.payments.edit', compact('payment'));
    }

    public function update(UpdateRequest $request, Payment $payment)
    {
        $payment = $this->service->update($payment->id, $request);

        return redirect()->route('admin.payments.show', $payment);
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('admin.payments.index');
    }

    public function removeLogo(Payment $payment)
    {
        if ($this->service->removeLogo($payment->id)) {
            return response()->json('The logo is successfully deleted!');
        }
        return response()->json('The logo is not deleted!', 400);
    }
}
