<div class="profile-card password-card-modern">
    <div class="card-header">
        <i class="fas fa-key card-icon"></i>
        <h3 class="card-title">Changer le mot de passe</h3>
    </div>
    <div class="card-body">
        @if (session()->has('success_password'))
            <div class="alert alert-success alert-modern">
                <i class="fas fa-check-circle"></i> {{ session()->get('success_password') }}
            </div>
        @endif
        <form action="{{ route('change.user.password') }}" method="POST" class="profile-form">
            @csrf
            <div class="form-group">
                <label class="form-label">Ancien mot de passe</label>
                <div class="password-input-group">
                    <input type="password" class="form-input" placeholder="••••••••" name="old_password" id="oldPassword">
                    <button type="button" class="toggle-password" data-target="oldPassword">
                        <i class="far fa-eye"></i>
                    </button>
                </div>
                @error('old_password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Nouveau mot de passe</label>
                <div class="password-input-group">
                    <input type="password" class="form-input" placeholder="••••••••" name="password" id="newPassword">
                    <button type="button" class="toggle-password" data-target="newPassword">
                        <i class="far fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
                <div class="password-strength-meter">
                    <div class="strength-bar"></div>
                    <div class="strength-bar"></div>
                    <div class="strength-bar"></div>
                    <span class="strength-text"></span>
                </div>
            </div>
            <button type="submit" class="btn-primary btn-change-password">
                <i class="fas fa-key"></i> Changer le mot de passe
            </button>
        </form>
    </div>
</div>

<style>
    .password-card-modern {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        transition: transform 0.3s ease;
        margin-bottom: 2rem;
    }
    .password-card-modern:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
    }
    .profile-form {
        margin-top: 1rem;
    }
    .password-input-group {
        position: relative;
    }
    .toggle-password {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #95a5a6;
        cursor: pointer;
        font-size: 1rem;
        transition: color 0.3s ease;
    }
    .toggle-password:hover {
        color: #3498db;
    }
    .password-strength-meter {
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .strength-bar {
        height: 4px;
        width: 25%;
        background: #ecf0f1;
        border-radius: 2px;
        transition: all 0.3s ease;
    }
    .strength-text {
        margin-left: 8px;
        font-size: 0.8rem;
        color: #7f8c8d;
    }
    .btn-change-password {
        width: 100%;
        margin-top: 1.5rem;
    }
    [data-strength="weak"] .strength-bar:nth-child(1) {
        background: #e74c3c;
    }
    [data-strength="medium"] .strength-bar:nth-child(-n+2) {
        background: #f39c12;
    }
    [data-strength="strong"] .strength-bar:nth-child(-n+3) {
        background: #2ecc71;
    }
    [data-strength="very-strong"] .strength-bar {
        background: #27ae60;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const icon = this.querySelector('i');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });
        // Password strength meter
        const newPasswordInput = document.getElementById('newPassword');
        if (newPasswordInput) {
            newPasswordInput.addEventListener('input', function() {
                const password = this.value;
                const meter = this.closest('.form-group').querySelector('.password-strength-meter');
                meter.removeAttribute('data-strength');
                meter.querySelector('.strength-text').textContent = '';
                if (password.length === 0) return;
                let strength = 0;
                if (password.length > 7) strength++;
                if (/\d/.test(password)) strength++;
                if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength++;
                if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
                let strengthLevel = '';
                let strengthText = '';
                if (strength <= 1) {
                    strengthLevel = 'weak';
                    strengthText = 'Faible';
                } else if (strength === 2) {
                    strengthLevel = 'medium';
                    strengthText = 'Moyen';
                } else if (strength === 3) {
                    strengthLevel = 'strong';
                    strengthText = 'Fort';
                } else {
                    strengthLevel = 'very-strong';
                    strengthText = 'Très fort';
                }
                meter.setAttribute('data-strength', strengthLevel);
                meter.querySelector('.strength-text').textContent = strengthText;
            });
        }
    });
</script>