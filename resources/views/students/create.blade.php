<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student - StudentMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #eef2f7; }
        .form-card { border: none; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); background: #fff; }
        .form-control, .form-select { border: 1px solid #ced4da !important; background-color: #fff !important; color: #000 !important; }
        .form-control:focus, .form-select:focus { border-color: #0d6efd !important; box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15); }
    </style>
</head>
<body class="py-5">
    <div class="container" style="max-width: 650px;">
        <div class="mb-4">
            <a href="{{ route('students.index') }}" class="text-decoration-none text-dark fw-bold">
                <i class="fa-solid fa-arrow-left me-2"></i> Back to Dashboard
            </a>
        </div>
        <div class="form-card p-4 p-md-5">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 50px; height: 50px;">
                    <i class="fa-solid fa-user-plus fs-5"></i>
                </div>
                <div>
                    <h4 class="fw-bold text-dark mb-1">Register New Student</h4>
                    <p class="text-secondary small mb-0">Please fill in all required fields clearly</p>
                </div>
            </div>
            
            @if ($errors->any())
                <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4" role="alert">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i> Please fix the following errors:
                    <ul class="mb-0 mt-2 small">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Student Name</label>
                    <input type="text" name="student_name" class="form-control py-2" placeholder="e.g. Kong Sopheak" value="{{ old('student_name') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Email Address</label>
                    <input type="email" name="email" class="form-control py-2" placeholder="e.g. name@example.com" value="{{ old('email') }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-dark">Gender</label>
                        <select name="gender" class="form-select py-2" required>
                            <option value="">Select Gender</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-dark">Enrollment Date</label>
                        <input type="date" name="enrollment_date" class="form-control py-2" value="{{ old('enrollment_date') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Department</label>
                    <select name="dept_id" class="form-select py-2" required>
                        <option value="">Select Department</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept->dept_id }}" {{ old('dept_id') == $dept->dept_id ? 'selected' : '' }}>
                                {{ $dept->dept_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold text-dark">Description (Optional)</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Add notes or remarks...">{{ old('description') }}</textarea>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('students.index') }}" class="btn btn-secondary px-4 py-2 fw-semibold">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm">Save Record</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>