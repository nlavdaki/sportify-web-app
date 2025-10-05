document.addEventListener('DOMContentLoaded', () => {
const f = document.getElementById('regForm');
if (!f) return;
f.addEventListener('submit', (e) => {
let ok = true;
const fullname = f.fullname.value.trim();
const email = f.email.value.trim();
const pass = f.password.value;


document.getElementById('e_fullname').textContent = '';
document.getElementById('e_email').textContent = '';
document.getElementById('e_password').textContent = '';


if (fullname.length < 3) {
ok = false; document.getElementById('e_fullname').textContent = 'Submit a valid name.';
}
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
if (!emailRegex.test(email)) {
ok = false; document.getElementById('e_email').textContent = 'Invalid email.';
}
if (pass.length < 6) {
ok = false; document.getElementById('e_password').textContent = 'Password must  have ≥ 6 characters.';
}
if (!ok) e.preventDefault();
});
});