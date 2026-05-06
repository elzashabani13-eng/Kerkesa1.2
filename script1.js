document.addEventListener('DOMContentLoaded', function() {
    
    const slides = document.querySelectorAll('.slide');
    const nextBtn = document.querySelector('.next-slide');
    const prevBtn = document.querySelector('.prev-slide');
    let currentIndex = 0;

    if (slides.length > 0) {
        slides[0].classList.add('active');

        function showSlide(index) {
            // Largojmë klasën active nga të gjitha fotot
            slides.forEach(slide => slide.classList.remove('active'));
            
            if (index >= slides.length) currentIndex = 0;
            else if (index < 0) currentIndex = slides.length - 1;
            else currentIndex = index;

            slides[currentIndex].classList.add('active');
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', function() {
                showSlide(currentIndex + 1);
            });
        }
        
        if (prevBtn) {
            prevBtn.addEventListener('click', function() {
                showSlide(currentIndex - 1);
            });
        }

        setInterval(() => {
            showSlide(currentIndex + 1);
        }, 5000);
    }

    const loginForm = document.querySelector("#loginForm");
    const regForm = document.querySelector("#registerForm");

    if (loginForm) {
        loginForm.addEventListener("submit", function(e) {
            if (!validateLogin()) {
                e.preventDefault(); // Ndalon dërgimin nëse ka gabime
            }
        });
    }

    if (regForm) {
        regForm.addEventListener("submit", function(e) {
            if (!validateRegister()) {
                e.preventDefault(); // Ndalon dërgimin nëse ka gabime
            }
        });
    }
});


function validateLogin() {
    let email = document.querySelector("#loginEmail");
    let password = document.querySelector("#loginPassword");
    let valid = true;

    if (!email || !email.value.includes("@")) {
        showError(email, "Email invalid");
        valid = false;
    } else {
        clearError(email);
    }

    if (!password || password.value.length < 6) {
        showError(password, "Password must be at least 6 characters");
        valid = false;
    } else {
        clearError(password);
    }

    return valid;
}

function validateRegister() {
    let name = document.querySelector("#regName");
    let email = document.querySelector("#regEmail");
    let password = document.querySelector("#regPassword");
    let valid = true;

    if (!name || name.value.length < 3) {
        showError(name, "Name too short");
        valid = false;
    } else {
        clearError(name);
    }

    if (!email || !email.value.includes("@")) {
        showError(email, "Invalid email");
        valid = false;
    } else {
        clearError(email);
    }

    if (!password || password.value.length < 6) {
        showError(password, "Password min 6 characters");
        valid = false;
    } else {
        clearError(password);
    }

    return valid;
}

function showError(input, message) {
    if (!input) return;
    clearError(input);
    let error = document.createElement("small");
    error.classList.add("error");
    error.innerText = message;
    input.parentNode.appendChild(error);
}

function clearError(input) {
    if (!input) return;
    let parent = input.parentNode;
    let error = parent.querySelector(".error");
    if (error) {
        error.remove();
    }
}