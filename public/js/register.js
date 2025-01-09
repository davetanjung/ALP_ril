document.querySelectorAll('.role-select').forEach(button => {
    button.addEventListener('click', () => {
        const role = button.dataset.role;
        document.getElementById('role').value = role;

        // Show "NIM" field only if role is "student"
        const studentFields = document.getElementById('student-fields');
        if (role === 'student') {
            studentFields.classList.remove('hidden');
        } else {
            studentFields.classList.add('hidden');
        }

        // Optional: Highlight the selected role button
        document.querySelectorAll('.role-select').forEach(btn => btn.classList.remove('bg-blue-500', 'text-white'));
        button.classList.add('bg-blue-500', 'text-white');
    });
});
