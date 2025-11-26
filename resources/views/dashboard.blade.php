<x-app-layout>
    <div class="mt-4"> 

        @php
            $firstName = $user->first_name ?? ($user->name ? explode(' ', $user->name)[0] : 'User');
            $lastName = $user->last_name ?? (isset($user->name) ? implode(' ', array_slice(explode(' ', $user->name), 1)) : '');
            
            if (!empty($user->photo)) {
                if (strpos($user->photo, 'http') === 0) {
                    $photo = $user->photo;
                } elseif (strpos($user->photo, 'storage/') === 0) {
                    $photo = asset($user->photo);
                } else {
                    $photo = asset('storage/' . ltrim($user->photo, '/'));
                }
            } else {
                $photo = asset('assets/img/profiles/avatar-31.jpg');
            }
        @endphp

        
        <!-- Welcome Card -->
        <div class="card border-0">
            <div class="card-body d-flex align-items-center justify-content-between flex-wrap pb-1">
                
                <!-- User Info -->
                <div class="d-flex align-items-center mb-3">
                    <span class="avatar avatar-xl flex-shrink-0 position-relative">
                        <img src="{{ $photo }}" class="rounded-circle" alt="user avatar">
                        <span class="status-dot bg-success position-absolute" 
                            style="right:4px;bottom:4px;width:10px;height:10px;border-radius:50%;border:2px solid #fff;" 
                            title="Active"></span>
                    </span>
                    <div class="ms-3">
                        <h3 class="mb-2">
                            Welcome Back, {{ $firstName }}{{ $lastName ? ' ' . $lastName : '' }}
                            <a href="javascript:void(0);" class="edit-icon"><i class="ti ti-edit fs-14"></i></a>
                        </h3>
                        <p>Manage your services and activities easily from your dashboard.</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex align-items-center flex-wrap mb-2">
                    <a href="{{ route('services.index') }}" class="btn btn-secondary btn-md me-2 mb-2">
                        <i class="ti ti-square-rounded-plus me-1"></i>Add Service
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-md me-2 mb-2">
                        <i class="ti ti-user-plus me-1"></i>Users
                    </a>

                     <a href="{{route ('enrollments.index')}}" class="btn btn-success btn-md me-2 mb-2">
                        <i class="ti ti-user-rounded-plus me-1"></i>Add Bvn Report
                    </a>

                    <form action="{{ route('variations.refresh') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-info btn-md me-2 mb-2">
                            🔄 Variations
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if (session('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
        @endif
    </div>
</x-app-layout>
