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
        if (btn) {
            btn.innerText = "Submit Application";
            btn.disabled = false;
        }
    }, 1500);
}

// --- PROFILE & UPLOADS ---

// 1. Update Profile Picture
window.updateProfilePic = function(event) {
    const file = event.target.files[0];
    const imgPreview = document.getElementById('profileImg'); // The big one in profile
    const navPreview = document.querySelector('.btn-profile img'); // The small one in nav

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
                    const newPath = data.split('|')[1];
                    // Update both images immediately without reload
                    if (imgPreview) imgPreview.src = newPath;
                    if (navPreview) navPreview.src = newPath;
                    alert("Profile picture updated!");
                } else {
                    alert("Error: " + data);
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
                alert('Asset uploaded successfully! It will now appear in the Community section.');
                window.location.reload();
            } else {
                alert('Error: ' + data);
                btn.innerText = "Upload Asset";
                btn.disabled = false;
            }
        });
}

// Community search functionality
window.searchCommunity = function() {
    const searchInput = document.querySelector('#community .search-bar input');
    const searchTerm = searchInput.value.toLowerCase();
    const assetCards = document.querySelectorAll('.community-asset-card');

    assetCards.forEach(card => {
        const title = card.querySelector('strong').textContent.toLowerCase();
        const creator = card.querySelector('.asset-creator-info span').textContent.toLowerCase();

        if (title.includes(searchTerm) || creator.includes(searchTerm)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
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

    // Add event listener for community search
    const communitySearchInput = document.querySelector('#community .search-bar input');
    const communitySearchButton = document.querySelector('#community .search-bar button');

    if (communitySearchInput && communitySearchButton) {
        communitySearchButton.addEventListener('click', searchCommunity);
        communitySearchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchCommunity();
            }
        });
    }

    // Add filtering for community assets
    const filterCheckboxes = document.querySelectorAll('#community .filter-options input[type="checkbox"]');
    filterCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Filter logic would go here
            console.log('Filter changed:', this.value);
        });
    });
});