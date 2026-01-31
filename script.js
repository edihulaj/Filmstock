// REMOVED: let isLoggedIn = false; 
// REMOVED: updateAuthState function (PHP handles this now)

const patterns = {
    email: /^[^ ]+@[^ ]+\.[a-z]{2,3}$/,
    password: /^.{6,}$/
};

// Standard Page Navigation
window.nav = function(pageId) {
    const pages = document.querySelectorAll('.page');
    pages.forEach(p => p.classList.remove('active'));

    const target = document.getElementById(pageId);
    if (target) {
        target.classList.add('active');
        window.scrollTo(0, 0);
    }

    // Close mobile menu if open
    const navMenu = document.getElementById('mainNav');
    if (navMenu) navMenu.classList.remove('active');
}

window.toggleMenu = function() {
    const nav = document.getElementById('mainNav');
    nav.classList.toggle('active');
}

window.toggleFilter = function(el) {
    const options = el.nextElementSibling;
    if (options) options.classList.toggle('active');
}

// --- LOGIN & SIGNUP (AJAX) ---

window.logIn = function() {
    const container = document.querySelector('#login .login-box');
    const inputs = container.querySelectorAll('input');
    const email = inputs[0].value.trim();
    const password = inputs[1].value.trim();

    let formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);

    fetch('login.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(data => {
            if (data.trim() === "success") {
                // RELOAD THE PAGE so PHP can show the Profile tab
                window.location.href = "index.php";
            } else {
                alert("Invalid email or password");
            }
        });
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
            }
        });
}

window.logOut = function() {
    fetch('logout.php').then(() => {
        window.location.href = "index.php"; // Reloads page as guest
    });
}

// --- ASSET & MODAL LOGIC ---

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
    if (modal) modal.classList.remove('active');
}

window.submitCreatorApplication = function() {
    const btn = document.getElementById('submitCreatorBtn');
    if (btn) {
        btn.innerText = "Sending...";
        btn.disabled = true;
    }
    setTimeout(() => {
        alert("Application submitted! If approved, an admin will grant you access via the database.");
        window.closeCreatorModal();
        if (btn) { btn.innerText = "Submit Application";
            btn.disabled = false; }
    }, 1500);
}

// --- PROFILE & UPLOADS ---

// 1. Update Profile Picture
window.updateProfilePic = function(event) {
    const file = event.target.files[0];
    const imgPreview = document.getElementById('profileImg');

    if (file) {
        let formData = new FormData();
        formData.append('avatar', file);

        fetch('update_profile.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.text())
            .then(data => {
                if (data.startsWith('success|')) {
                    const newSrc = data.split('|')[1];
                    if (imgPreview) imgPreview.src = newSrc;
                    // Reload to update navbar avatar too
                    setTimeout(() => location.reload(), 500);
                } else {
                    alert('Upload failed');
                }
            });
    }
}

// 2. Save Name Change
window.saveProfileName = function(el) {
    const newName = el.innerText.trim();
    let formData = new FormData();
    formData.append('new_name', newName);

    fetch('update_profile.php', {
        method: 'POST',
        body: formData
    }).then(res => res.text()).then(data => {
        if (data.trim() === 'success') {
            // Success - silent update
        } else {
            console.error('Failed to save name');
        }
    });
}

// 3. Creator Upload Asset
window.uploadCreatorAsset = function(e) {
    e.preventDefault();
    const form = document.getElementById('creatorUploadForm');
    const formData = new FormData(form);

    const btn = document.getElementById('uploadBtn');
    btn.innerText = "Uploading...";
    btn.disabled = true;

    fetch('upload_asset.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(data => {
            if (data.trim() === 'success') {
                alert('Asset uploaded successfully!');
                window.location.reload();
            } else {
                alert('Error: ' + data);
                btn.innerText = "Upload Asset";
                btn.disabled = false;
            }
        });
}

document.addEventListener('DOMContentLoaded', () => {
    // Listen for name edits on Enter key
    const nameField = document.querySelector('.editable-name');
    if (nameField) {
        nameField.addEventListener('blur', function() {
            saveProfileName(this);
        });
        nameField.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                this.blur();
            }
        });
    }
});