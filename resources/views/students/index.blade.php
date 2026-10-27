<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Directory - StudentMS Pro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f4f7f6; }
        .sidebar { width: 260px; min-height: 100vh; background: #1e293b; color: #fff; position: fixed; top: 0; left: 0; z-index: 100; }
        .sidebar .brand { font-size: 1.2rem; font-weight: 700; padding: 24px 20px; border-bottom: 1px solid rgba(255,255,255,0.08); }
        .sidebar .nav-link { color: rgba(255,255,255,0.7); padding: 12px 20px; font-weight: 500; border-radius: 10px; margin: 6px 14px; transition: all 0.2s ease; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: #fff; background: rgba(255,255,255,0.1); }
        .main-content { margin-left: 260px; padding: 35px; }
        @media (max-width: 768px) { .sidebar { width: 100%; position: relative; min-height: auto; } .main-content { margin-left: 0; padding: 20px; } }
        .card-stat { border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); background: #ffffff; }
        .custom-card { border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); background: #fff; }
    </style>
</head>
<body>

    <div class="sidebar d-flex flex-column justify-content-between">
        <div>
            <div class="brand d-flex align-items-center gap-2">
                <i class="fa-solid fa-graduation-cap text-primary fs-4"></i>
                <span>StudentMS Pro</span>
            </div>
            <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a href="{{ route('students.index') }}" class="nav-link active">
                        <i class="fa-solid fa-chart-line me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('students.create') }}" class="nav-link">
                        <i class="fa-solid fa-user-plus me-2"></i> Register Student
                    </a>
                </li>
            </ul>
        </div>
        <div class="p-3 border-top border-secondary opacity-75">
            <a href="{{ route('login') }}" class="btn btn-outline-light w-100 btn-sm py-2 fw-semibold">
                <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1 text-dark">Student Directory</h3>
                <p class="text-muted small mb-0">Complete overview of registered students and academic departments</p>
            </div>
            <a href="{{ route('students.create') }}" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm fw-semibold">
                <i class="fa-solid fa-plus me-2"></i> Register New Student
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4 py-3" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card card-stat p-4">
                    <div class="text-muted small fw-bold text-uppercase mb-1">Total Enrolled Students</div>
                    <div class="fs-2 fw-bold text-primary">{{ $students->total() }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-stat p-4">
                    <div class="text-muted small fw-bold text-uppercase mb-1">Total Departments</div>
                    <div class="fs-2 fw-bold text-success">{{ $departments->count() }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-stat p-4">
                    <div class="text-muted small fw-bold text-uppercase mb-1">System Status</div>
                    <div class="fs-5 fw-bold text-success mt-1"><i class="fa-solid fa-circle-dot fs-6 me-1 text-success"></i> Fully Operational</div>
                </div>
            </div>
        </div>

        <div class="card custom-card p-4 mb-4">
            <form action="{{ route('students.index') }}" method="GET" class="row g-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0"><i class="fa-solid fa-search text-muted"></i></span>
                        <input type="text" name="search" class="form-control bg-light border-0 py-2" placeholder="Search by student name or email..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <select name="dept_id" class="form-select bg-light border-0 py-2">
                        <option value="">All Departments</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept->dept_id }}" {{ request('dept_id') == $dept->dept_id ? 'selected' : '' }}>
                                {{ $dept->dept_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-dark w-100 fw-semibold py-2">Filter</button>
                    <a href="{{ route('students.index') }}" class="btn btn-light border d-flex align-items-center justify-content-center px-3" title="Reset Filters">
                        <i class="fa-solid fa-rotate"></i>
                    </a>
                </div>
            </form>
        </div>

        <div class="card custom-card overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase fs-7 text-secondary">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Student Name</th>
                            <th>Email Address</th>
                            <th>Gender</th>
                            <th>Enrollment Date</th>
                            <th>Department</th>
                            <th>Description</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td class="ps-4 fw-semibold text-secondary">#{{ $student->student_id }}</td>
                                <td><div class="fw-bold text-dark">{{ $student->student_name }}</div></td>
                                <td class="text-muted">{{ $student->email }}</td>
                                <td>
                                    <span class="badge {{ $student->gender == 'Male' ? 'bg-info-subtle text-info border border-info-subtle' : 'bg-danger-subtle text-danger border border-danger-subtle' }} px-3 py-1 rounded-pill fw-semibold">
                                        {{ $student->gender }}
                                    </span>
                                </td>
                                <td class="text-muted small">{{ $student->enrollment_date }}</td>
                                <td><span class="badge bg-secondary-subtle text-secondary px-3 py-1 rounded-pill fw-semibold">{{ $student->department->dept_name ?? 'N/A' }}</span></td>
                                <td>
                                    <span class="text-muted small text-truncate d-inline-block" style="max-width: 150px;" title="{{ $student->description }}">
                                        {{ $student->description ?: '-' }}
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="{{ route('students.edit', $student->student_id) }}" class="btn btn-sm btn-light border text-primary me-1 shadow-sm" title="Edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('students.destroy', $student->student_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this student record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger shadow-sm" title="Delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="fa-solid fa-folder-open fs-1 mb-3 text-secondary opacity-50 d-block"></i>
                                    No student records found in the system.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($students->hasPages())
                <div class="card-footer bg-white border-0 py-3 px-4">
                    {{ $students->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>