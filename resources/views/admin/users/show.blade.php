<x-app-layout>
    <title>Arewa Smart - User Details</title>

    <div class="container-fluid px-4 mt-4">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="page-title text-primary mb-1 fw-bold">User Details</h3>
                    <ul class="breadcrumb bg-transparent p-0 mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.users.index') }}" class="text-muted text-decoration-none">Users</a>
                        </li>
                        <li class="breadcrumb-item active text-muted" aria-current="page">
                            {{ $user->first_name }} {{ $user->last_name }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <div class="d-flex gap-2 justify-content-md-end">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-light border shadow-sm">
                            <i class="ti ti-arrow-left me-2"></i>Back
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle shadow-sm" type="button" data-bs-toggle="dropdown">
                                <i class="ti ti-settings me-2"></i>Actions
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                <li>
                                    <form action="{{ route('admin.users.update-status', $user) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="{{ $user->status === 'active' ? 'suspended' : 'active' }}">
                                        <button class="dropdown-item {{ $user->status === 'active' ? 'text-danger' : 'text-success' }}">
                                            <i class="ti {{ $user->status === 'active' ? 'ti-ban' : 'ti-check' }} me-2"></i>
                                            {{ $user->status === 'active' ? 'Suspend User' : 'Activate User' }}
                                        </button>
                                    </form>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure? This action cannot be undone.')">
                                            <i class="ti ti-trash me-2"></i>Delete User
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- User Profile Card -->
            <div class="col-xl-4 col-lg-5">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center pt-5 pb-4">
                        <div class="avatar avatar-xl rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 100px; height: 100px; font-size: 2.5rem;">
                            {{ strtoupper(substr($user->first_name, 0, 1)) }}
                        </div>
                        <h4 class="mb-1 fw-bold text-dark">{{ $user->first_name }} {{ $user->last_name }} {{ $user->middle_name }}</h4>
                        <p class="text-muted mb-3">{{ $user->email }}</p>
                        
                        <div class="d-flex justify-content-center gap-2 mb-4">
                            <span class="badge bg-soft-primary text-primary px-3 py-2 rounded-pill">
                                {{ ucfirst($user->role) }}
                            </span>
                            @php
                                $statusClass = match($user->status) {
                                    'active' => 'bg-soft-success text-success',
                                    'inactive' => 'bg-soft-secondary text-secondary',
                                    'suspended' => 'bg-soft-danger text-danger',
                                    'pending' => 'bg-soft-warning text-warning',
                                    default => 'bg-soft-dark text-dark'
                                };
                            @endphp
                            <span class="badge {{ $statusClass }} px-3 py-2 rounded-pill">
                                {{ ucfirst($user->status) }}
                            </span>
                        </div>

                        <!-- Wallet Balance Section -->
                        <div class="bg-light rounded-3 p-3 mb-4 text-start border">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-muted small fw-bold text-uppercase">Wallet Balance</span>
                                <i class="ti ti-wallet text-primary fs-4"></i>
                            </div>
                            <h3 class="fw-bold text-dark mb-0">₦{{ number_format($user->wallet->balance ?? 0, 2) }}</h3>
                            <div class="small text-muted mt-1">
                                Available: <span class="fw-medium text-dark">₦{{ number_format($user->wallet->available_balance ?? 0, 2) }}</span>
                            </div>
                        </div>

                        <div class="border-top pt-4 text-start">
                            <h6 class="text-uppercase text-muted fs-12 fw-bold mb-3">Contact Information</h6>
                            
                            <div class="mb-3">
                                <label class="small text-muted d-block">Phone Number</label>
                                <span class="text-dark fw-medium">{{ $user->phone_no }}</span>
                            </div>
                            
                            <div class="mb-3">
                                <label class="small text-muted d-block">Address</label>
                                <span class="text-dark fw-medium">{{ $user->address ?: 'N/A' }}</span>
                            </div>

                            <div class="mb-3">
                                <label class="small text-muted d-block">BVN</label>
                                <span class="text-dark fw-medium font-monospace">{{ $user->bvn ?: 'N/A' }}</span>
                            </div>
                        </div>

                        <div class="border-top pt-4 text-start">
                            <h6 class="text-uppercase text-muted fs-12 fw-bold mb-3">Account Details</h6>
                            
                            <div class="mb-3">
                                <label class="small text-muted d-block">Transaction Limit</label>
                                <span class="text-dark fw-bold fs-5">₦{{ number_format($user->limit, 2) }}</span>
                            </div>
                            
                            <div class="mb-3">
                                <label class="small text-muted d-block">Joined On</label>
                                <span class="text-dark fw-medium">{{ $user->created_at->format('d M Y, h:i A') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transactions Card -->
            <div class="col-xl-8 col-lg-7">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 fw-bold">Transaction History</h5>
                        <span class="badge bg-light text-dark border">Total: {{ $transactions->total() }}</span>
                    </div>
                    <div class="card-body p-0">
                        @if($transactions->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover text-nowrap align-middle mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-4">Reference</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transactions as $transaction)
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex flex-column">
                                                        <span class="font-monospace text-primary fw-medium">{{ $transaction->reference }}</span>
                                                        <span class="text-muted small text-wrap" style="max-width: 200px;">{{ Str::limit($transaction->description, 30) }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-soft-info text-info rounded-pill px-2">
                                                        {{ ucfirst($transaction->type) }}
                                                    </span>
                                                </td>
                                                <td class="fw-bold text-dark">₦{{ number_format($transaction->amount, 2) }}</td>
                                                <td>
                                                    @php
                                                        $statusClass = match($transaction->status) {
                                                            'success', 'successful' => 'bg-soft-success text-success',
                                                            'failed' => 'bg-soft-danger text-danger',
                                                            'pending' => 'bg-soft-warning text-warning',
                                                            default => 'bg-soft-secondary text-secondary'
                                                        };
                                                    @endphp
                                                    <span class="badge {{ $statusClass }} rounded-pill px-2">
                                                        {{ ucfirst($transaction->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <span class="text-dark fs-13">{{ $transaction->created_at->format('d M Y') }}</span>
                                                        <span class="text-muted fs-12">{{ $transaction->created_at->format('h:i A') }}</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-3 border-top">
                                {{ $transactions->links('pagination::bootstrap-5') }}
                            </div>
                        @else
                            <div class="text-center py-5">
                                <div class="mb-3">
                                    <i class="ti ti-receipt-off fs-1 text-muted opacity-50"></i>
                                </div>
                                <h6 class="text-muted fw-bold">No transactions found</h6>
                                <p class="text-muted small mb-0">This user hasn't performed any transactions yet.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
