<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - StudentMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100" style="font-family: 'Plus Jakarta Sans', sans-serif;">
    <div class="card shadow-lg border-0 p-4 rounded-4" style="width: 100%; max-width: 420px;">
        <div class="text-center mb-4">
            <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 60px; height: 60px;">
                <i class="fa-solid fa-user-plus fs-3"></i>
            </div>
            <h3 class="fw-bold text-dark">Create Account</h3>
            <p class="text-muted small">Register a new membership</p>
        </div>
        
        <form action="{{ route('students.index') }}" method="GET">
            <div class="mb-3">
                <label class="form-label fw-semibold small text-uppercase text-muted">Full Name</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0"><i class="fa-solid fa-user text-muted"></i></span>
                    <input type="text" name="name" class="form-control bg-light border-0 py-2" placeholder="Enter your name" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold small text-uppercase text-muted">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0"><i class="fa-solid fa-envelope text-muted"></i></span>
                    <input type="email" name="email" class="form-control bg-light border-0 py-2" placeholder="name@example.com" required>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold small text-uppercase text-muted">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0"><i class="fa-solid fa-lock text-muted"></i></span>
                    <input type="password" name="password" class="form-control bg-light border-0 py-2" placeholder="********" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success w-100 py-2 fw-semibold shadow-sm">Register</button>
        </form>
        
        <div class="text-center mt-4">
            <p class="small text-muted">Already have an account? <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">Login here</a></p>
        </div>
    </div>
</body>
</html>