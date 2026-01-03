let isLoggedIn = false;

const patterns = {
    email: /^[^ ]+@[^ ]+\.[a-z]{2,3}$/,
    password: /^.{6,}$/
};

function updateAuthState() {
    const loginLink = document.getElementById('nav-login');
    const signupLink = document.getElementById('nav-signup');
    const profileLink = document.getElementById('nav-profile');
    const logoutLink = document.getElementById('nav-logout');

    if (isLoggedIn) {
        if (loginLink) loginLink.classList.add('hidden');
        if (signupLink) signupLink.classList.add('hidden');
        if (profileLink) profileLink.classList.remove('hidden');
        if (logoutLink) logoutLink.classList.remove('hidden');
    } else {
        if (loginLink) loginLink.classList.remove('hidden');
        if (signupLink) loginLink.classList.remove('hidden');
        if (profileLink) profileLink.classList.add('hidden');
        if (logoutLink) logoutLink.classList.add('hidden');
    }
}

window.nav = function(pageId) {
    const pages = document.querySelectorAll('.page');
    pages.forEach(p => p.classList.remove('active'));

    const target = document.getElementById(pageId);
    if (target) {
        target.classList.add('active');
        window.scrollTo(0, 0);
    }

    const navMenu = document.getElementById('mainNav');
    if (navMenu) navMenu.classList.remove('active');

    updateAuthState();
}

window.toggleMenu = function() {
    const nav = document.getElementById('mainNav');
    nav.classList.toggle('active');
}

window.toggleFilter = function(el) {
    const options = el.nextElementSibling;
    if (options) options.classList.toggle('active');
}

window.logIn = function() {
    const container = document.querySelector('#login .login-box');
    const inputs = container.querySelectorAll('input');
    const email = inputs[0].value.trim();
    const password = inputs[1].value.trim();

    if (!email || !password) {
        alert('Please fill in all fields.');
        return;
    }

    if (!patterns.email.test(email)) {
        alert('Please enter a valid email address.');
        return;
    }

    if (!patterns.password.test(password)) {
        alert('Password must be at least 6 characters.');
        return;
    }

    isLoggedIn = true;
    updateAuthState();
    window.nav('profile');

    inputs.forEach(i => i.value = '');
}

window.signUp = function() {
        const container = document.querySelector('#signup .login-box');
        const inputs = container.querySelectorAll('input');
        const name = inputs[0].value.trim();
        const email = inputs[1].value.trim();
        const password = inputs[2].value.trim();


        let formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('password', password);

        fetch('signup.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.text())
            .then(data => {
                    if (data.trim() === "success") {
                        alert("Account created! Now please log in.");
                        window.nav('login');
                    } else {
                        alert(data);
                    });
            }

        window.logOut = function() {
            isLoggedIn = false;
            updateAuthState();
            window.nav('home');
            alert('You have been logged out.');
        }

        window.openModal = function(src, title, type) {
            const modal = document.getElementById('assetModal');
            const modalImg = document.getElementById('modalImg');
            const modalTitle = document.getElementById('modalTitle');

            if (modal && modalImg && modalTitle) {
                modalImg.src = src;
                modalTitle.innerText = title || 'Untitled Asset';
                modal.classList.add('active');
            }
        }

        window.closeModal = function() {
            const modal = document.getElementById('assetModal');
            if (modal) modal.classList.remove('active');
        }

        window.openCreatorModal = function() {
            const modal = document.getElementById('creatorModal');
            if (modal) modal.classList.add('active');
        }

        window.closeCreatorModal = function() {
            const modal = document.getElementById('creatorModal');
            const inputs = modal.querySelectorAll('input, textarea');
            const btn = document.getElementById('submitCreatorBtn');

            if (modal) {
                modal.classList.remove('active');
                inputs.forEach(i => i.value = '');
                if (btn) {
                    btn.innerText = "Submit Application";
                    btn.disabled = false;
                }
            }
        }

        window.submitCreatorApplication = function() {
            const name = document.getElementById('creatorName').value.trim();
            const email = document.getElementById('creatorEmail').value.trim();
            const portfolio = document.getElementById('creatorPortfolio').value.trim();
            const message = document.getElementById('creatorMessage').value.trim();
            const btn = document.getElementById('submitCreatorBtn');

            if (!name || !email || !portfolio || !message) {
                alert('Please complete all required fields.');
                return;
            }

            if (!patterns.email.test(email)) {
                alert('Please enter a valid email address.');
                return;
            }

            if (message.length < 10) {
                alert('Please provide a clearer description in your message.');
                return;
            }

            if (btn) {
                btn.innerText = "Sending...";
                btn.disabled = true;
            }

            setTimeout(() => {
                alert("Application submitted successfully! We will review your portfolio and be in touch.");
                window.closeCreatorModal();
            }, 1500);
        }

        window.updateProfilePic = function(event) {
            const file = event.target.files[0];
            const imgPreview = document.getElementById('profileImg');

            if (file && imgPreview) {
                if (!file.type.match('image.*')) {
                    alert("Please select a valid image file.");
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            updateAuthState();

            const assetModal = document.getElementById('assetModal');
            if (assetModal) {
                assetModal.addEventListener('click', (e) => {
                    if (e.target === assetModal) window.closeModal();
                });
            }

            const creatorModal = document.getElementById('creatorModal');
            if (creatorModal) {
                creatorModal.addEventListener('click', (e) => {
                    if (e.target === creatorModal) window.closeCreatorModal();
                });
            }
        });