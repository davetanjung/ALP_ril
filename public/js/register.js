document.addEventListener('DOMContentLoaded', () => {
    // Add event listeners to all role selection buttons
    document.querySelectorAll('.role-select').forEach(button => {
        button.addEventListener('click', () => {
            const role = button.dataset.role;

            // Set the role input value dynamically based on selected button
            document.getElementById('role').value = role;

            // Show or hide the "NIM" field based on the selected role
            const studentFields = document.getElementById('student-fields');
            const lecturerFields = document.getElementById('lecturer-fields');

            if (role === 'student') {
                studentFields.classList.remove('hidden');
                lecturerFields.classList.add('hidden');
                document.getElementById('uniqueCode').removeAttribute('required');
                document.getElementById('nim').setAttribute('required', 'required');
            } else if (role === 'lecturer') {
                studentFields.classList.add('hidden');
                lecturerFields.classList.remove('hidden');
                document.getElementById('uniqueCode').setAttribute('required', 'required');
                document.getElementById('nim').removeAttribute('required');
            }

            // Optional: Highlight the selected role button (add and remove active classes)
            document.querySelectorAll('.role-select').forEach(btn => {
                btn.classList.remove('bg-blue-500', 'text-white');
            });
            button.classList.add('bg-blue-500', 'text-white');
        });
    });
});

