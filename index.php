<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmstock - VFX & Stock Assets</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <div class="logo clickable" onclick="nav('home')">Film<span>stock</span></div>
        <button class="mobile-menu-btn clickable" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i></button>
        <nav id="mainNav">
            <a class="clickable" onclick="nav('home')">Home</a>
            <a class="clickable" onclick="nav('images')">Images</a>
            <a class="clickable" onclick="nav('video')">Video</a>
            <a class="clickable" onclick="nav('music')">Music</a>
            <a class="clickable" onclick="nav('vfx')">VFX Packs</a>
            <a class="clickable" onclick="nav('pricing')">Pricing</a>

            <a id="nav-login" class="clickable" onclick="nav('login')">Log in</a>
            <a id="nav-signup" class="btn-fill clickable" onclick="nav('signup')">Sign Up</a>

            <a id="nav-profile" class="btn-profile clickable hidden" onclick="nav('profile')"><i class="fa-solid fa-user"></i></a>
            <a id="nav-logout" class="clickable hidden" onclick="logOut()">Log Out</a>
        </nav>
    </header>

    <div id="home" class="page active">
        <div class="hero main-hero">
            <h1>The Filmmaker's Asset Library</h1>
            <p>Unlimited downloads of VFX, Stock Footage, Music, and Images.</p>
            <div class="search-bar">
                <input type="text" placeholder="Search the entire library...">
                <button class="clickable"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>

        <div class="home-categories">
            <div class="cat-card clickable" onclick="nav('images')"><i class="fa-solid fa-image"></i><span>Stock Images</span></div>
            <div class="cat-card clickable" onclick="nav('video')"><i class="fa-solid fa-film"></i><span>Video Footage</span></div>
            <div class="cat-card clickable" onclick="nav('music')"><i class="fa-solid fa-music"></i><span>Music & SFX</span></div>
            <div class="cat-card clickable" onclick="nav('vfx')"><i class="fa-solid fa-wand-magic-sparkles"></i><span>VFX Packs</span></div>
        </div>

        <div class="brand-strip">
            <i class="fa-brands fa-apple"></i>
            <i class="fa-brands fa-google"></i>
            <i class="fa-brands fa-amazon"></i>
            <i class="fa-brands fa-spotify"></i>
            <i class="fa-brands fa-youtube"></i>
        </div>

        <div class="section" style="text-align:center; margin-top:60px; padding: 0 20px;">
            <h2>Fresh from the studio</h2>
            <div class="grid-3" style="margin-top:20px; max-width: 1200px; margin-left: auto; margin-right: auto;">
                <div class="card clickable" onclick="openModal('fotot/m5.jpg', 'B&W Shot', 'paid')">
                    <img src="fotot/m5.jpg"><span class="license-badge paid">Featured</span></div>
                <div class="card clickable" onclick="openModal('fotot/m4.jpg', 'Arrival Scene', 'free')">
                    <img src="fotot/m4.jpg"><span class="license-badge free">New Video</span></div>
                <div class="card clickable" onclick="openModal('fotot/m3.jpg', 'Jake Gyllenhaal, Nightcrawler', 'paid')">
                    <img src="fotot/m3.jpg"><span class="license-badge paid">New VFX</span></div>
            </div>
        </div>

        <div class="features-section">
            <h2>Why Creators Choose Filmstock</h2>
            <div class="features-grid">
                <div class="feature-box">
                    <i class="fa-solid fa-infinity"></i>
                    <h3>Unlimited Downloads</h3>
                    <p>Pay once, download as much as you want. No credits, no hidden fees.</p>
                </div>
                <div class="feature-box">
                    <i class="fa-solid fa-scale-balanced"></i>
                    <h3>Simple Licensing</h3>
                    <p>Use our assets in YouTube videos, commercials, and films worldwide.</p>
                </div>
                <div class="feature-box">
                    <i class="fa-solid fa-bolt"></i>
                    <h3>Daily Updates</h3>
                    <p>Our library grows every single day with high-quality 4K content.</p>
                </div>
            </div>
        </div>

        <div class="section" style="text-align:center; padding: 60px 20px;">
            <h2>Curated Collections</h2>
            <div class="grid-4" style="margin-top:20px; max-width: 1200px; margin-left: auto; margin-right: auto;">
                <div class="card clickable" onclick="nav('video')"><img src="fotot/pexels-minhle17vn-3062541.jpg"></div>
                <div class="card clickable" onclick="nav('images')"><img src="fotot/pexels-midtrack-3924709.jpg"></div>
                <div class="card clickable" onclick="nav('vfx')"><img src="fotot/bts1.jpg"></div>
                <div class="card clickable" onclick="nav('music')"><img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=600"></div>
            </div>
        </div>

        <div class="newsletter-section">
            <h2>Stay in the loop</h2>
            <p>Get free assets delivered to your inbox weekly.</p>
            <div class="newsletter-input">
                <input type="email" placeholder="Enter your email">
                <button class="btn-fill clickable">Subscribe</button>
            </div>
        </div>
    </div>

    <div id="images" class="page">
        <div class="hero images-hero">
            <h1>Stock Photography</h1>
            <div class="search-bar">
                <input type="text" placeholder="Search Cinematic Shots...">
                <button class="clickable"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>

        <div class="main-layout">
            <div class="sidebar">
                <h3>Image Filters</h3>
                <div class="filter-group">
                    <strong class="clickable" onclick="toggleFilter(this)">Orientation <i class="fa-solid fa-chevron-down"></i></strong>
                    <div class="filter-options active">
                        <label><input type="checkbox"> Landscape</label>
                        <label><input type="checkbox"> Portrait</label>
                    </div>
                </div>
                <div class="filter-group">
                    <strong class="clickable" onclick="toggleFilter(this)">Style <i class="fa-solid fa-chevron-down"></i></strong>
                    <div class="filter-options">
                        <label><input type="checkbox"> Cinematic</label>
                        <label><input type="checkbox"> Vintage</label>
                        <label><input type="checkbox"> Black & White</label>
                    </div>
                </div>
            </div>


            <div class="content-area">
                <div class="section-header">
                    <h2>Trending Now</h2><a class="clickable">View All</a></div>
                <div class="grid-3">
                    <div class="card clickable" onclick="openModal('fotot/m16.jpg', 'Stairs B&W', 'paid')"><img src="fotot/m16.jpg"><span class="license-badge paid">Editor's Choice</span></div>
                    <div class="card clickable" onclick="openModal('fotot/m11.jpg', 'Foggy Forest', 'free')"><img src="fotot/m11.jpg"><span class="license-badge free">Free</span></div>
                    <div class="card clickable" onclick="openModal('fotot/m12.jpg', 'Whale', 'paid')"><img src="fotot/m12.jpg"><span class="license-badge paid">Standard</span></div>
                    <div class="card clickable" onclick="openModal('fotot/m13.jpg', 'COOL Swimmer', 'paid')"><img src="fotot/m13.jpg"><span class="license-badge paid">Editor's Choice</span></div>
                    <div class="card clickable" onclick="openModal('fotot/m14.jpg', 'Dark Forest', 'paid')"><img src="fotot/m14.jpg"><span class="license-badge paid">Editor's Choice</span></div>
                    <div class="card clickable" onclick="openModal('fotot/m15.jpg', 'Neon Concert', 'free')"><img src="fotot/m15.jpg"><span class="license-badge free">Free</span></div>
                    <div class="card clickable" onclick="openModal('fotot/m17.jpg', 'B&W River', 'paid')"><img src="fotot/m17.jpg"><span class="license-badge paid">Editor's Choice</span></div>
                    <div class="card clickable" onclick="openModal('fotot/m10.jpg', 'Old Building', 'paid')"><img src="fotot/m10.jpg"><span class="license-badge paid">Editor's Choice</span></div>
                    <div class="card clickable" onclick="openModal('fotot/m9.jpg', 'Modern Picture ', 'paid')"><img src="fotot/m9.jpg"><span class="license-badge paid">Editor's Choice</span></div>
                </div>

                <div class="section-header">
                    <h2>Full Catalog</h2>
                </div>
                <div class="grid-4">
                    <div class="card clickable" onclick="openModal('https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=600', 'Traveler', 'paid')"><img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=600"></div>
                    <div class="card clickable" onclick="openModal('https://images.unsplash.com/photo-1517685633466-403d6955aeab?w=600', 'City Lights', 'paid')"><img src="https://images.unsplash.com/photo-1517685633466-403d6955aeab?w=600"></div>
                    <div class="card clickable" onclick="openModal('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=600', 'Mountains', 'free')"><img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=600"></div>
                    <div class="card clickable" onclick="openModal('fotot/m2.jpg', 'Rain Drops', 'paid')"><img src="fotot/m2.jpg"></div>
                </div>

                <div class="explore-nav">
                    <a class="explore-card clickable" onclick="nav('video')">Explore Video</a>
                    <a class="explore-card clickable" onclick="nav('vfx')">Explore VFX</a>
                </div>
            </div>
        </div>
    </div>

    <div id="video" class="page">
        <div class="hero video-hero">
            <h1>Stock Footage</h1>
            <div class="search-bar">
                <input type="text" placeholder="Search 4K, Drone, Slow Motion...">
                <button class="clickable"><i class="fa-solid fa-video"></i></button>
            </div>
        </div>

        <div class="main-layout">
            <div class="sidebar">
                <h3>Video Filters</h3>
                <div class="filter-group">
                    <strong class="clickable" onclick="toggleFilter(this)">Resolution <i class="fa-solid fa-chevron-down"></i></strong>
                    <div class="filter-options active">
                        <label><input type="checkbox"> 4K Ultra HD</label>
                        <label><input type="checkbox"> 1080p HD</label>
                    </div>
                </div>
                <div class="filter-group">
                    <strong class="clickable" onclick="toggleFilter(this)">Frame Rate <i class="fa-solid fa-chevron-down"></i></strong>
                    <div class="filter-options active">
                        <label><input type="checkbox"> 24 FPS (Film)</label>
                        <label><input type="checkbox"> 60 FPS (Slow Mo)</label>
                    </div>
                </div>
            </div>

            <div class="content-area">
                <div class="section-header">
                    <h2>Trending Clips</h2>
                </div>
                <div class="grid-3">
                    <div class="vid-card clickable" onclick="openModal('fotot/m3.jpg', ' Nightcrawler. Mirror shot', 'paid')"><img src="fotot/m3.jpg"><span class="license-badge paid">4K</span></div>
                    <div class="vid-card clickable" onclick="openModal('fotot/m7.jpg', 'Hallway with outdoor light comming through', 'paid')"><img src="fotot/m7.jpg"><span class="license-badge paid">HD</span></div>
                    <div class="vid-card clickable" onclick="openModal('fotot/m8.jpg', 'Blade Runner 2049 Ambience', 'free')"><img src="fotot/m8.jpg"><span class="license-badge paid">4K</span></div>
                    <div class="vid-card clickable" onclick="openModal('fotot/m4.jpg', 'Arrival Scene', 'free')"><img src="fotot/m4.jpg"><span class="license-badge paid">4K</span></div>
                    <div class="vid-card clickable" onclick="openModal('fotot/m6.jpg', 'Dune: Part One', 'free')"><img src="fotot/m6.jpg"><span class="license-badge free">Free</span></div>
                    <div class="vid-card clickable" onclick="openModal('fotot/m2.jpg', 'Oppenheimer - Rain Drops', 'free')"><img src="fotot/m2.jpg"><span class="license-badge paid">Premium </span></div>
                    <div class="vid-card clickable" onclick="openModal('fotot/movie1.jpg', 'Lady Crying Scene', 'free')"><img src="fotot/movie1.jpg"><span class="license-badge paid">4K</span></div>
                    <div class="vid-card clickable" onclick="openModal('fotot/m5.jpg', 'B&W Scene', 'free')"><img src="fotot/m5.jpg"><span class="license-badge free">Free</span></div>



                </div>

                <div class="section-header">
                    <h2>Action & Sports</h2>
                </div>
                <div class="grid-4">
                    <div class="vid-card clickable" onclick="openModal('https://images.unsplash.com/photo-1551632811-561732d1e306?w=600', 'Running', 'paid')"><img src="https://images.unsplash.com/photo-1551632811-561732d1e306?w=600"></div>
                    <div class="vid-card clickable" onclick="openModal('https://images.unsplash.com/photo-1478720568477-152d9b164e63?w=600', 'MotoX', 'paid')"><img src="fotot/pexels-jonatas-tinoco-2777521-4318822.jpg"></div>
                    <div class="vid-card clickable" onclick="openModal('https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=600', 'Singing', 'paid')"><img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=600"></div>
                    <div class="vid-card clickable" onclick="openModal('https://images.unsplash.com/photo-1444703686981-a3abbc4d4fe3?w=600', 'Galaxy Belt', 'free')"><img src="https://images.unsplash.com/photo-1444703686981-a3abbc4d4fe3?w=600"></div>
                </div>

                <div class="explore-nav">
                    <a class="explore-card clickable" onclick="nav('music')">Explore Music</a>
                    <a class="explore-card clickable" onclick="nav('images')">Explore Images</a>
                </div>
            </div>
        </div>
    </div>

    <div id="music" class="page">
        <div class="hero music-hero">
            <h1>Music & SFX</h1>
            <div class="search-bar">
                <input type="text" placeholder="Search Genre, Mood, BPM...">
                <button class="clickable"><i class="fa-solid fa-music"></i></button>
            </div>
        </div>

        <div class="main-layout">
            <div class="sidebar">
                <h3>Music Filters</h3>
                <div class="filter-group">
                    <strong class="clickable" onclick="toggleFilter(this)">Genre <i class="fa-solid fa-chevron-down"></i></strong>
                    <div class="filter-options active">
                        <label><input type="checkbox"> Cinematic</label>
                        <label><input type="checkbox"> Corporate</label>
                        <label><input type="checkbox"> Lo-Fi</label>
                    </div>
                </div>
            </div>

            <div class="content-area">
                <div class="section-header">
                    <h2>Top Charts</h2>
                </div>

                <div class="track-row clickable" onclick="alert('Playing Epic Rise')">
                    <div class="track-info">
                        <h4>Epic Rise</h4>
                        <p>Trailer Music</p>
                    </div>
                    <div class="waveform-visual">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </div>
                    <i class="fa-solid fa-play-circle" style="font-size:24px; color:#ff3333;"></i>
                </div>

                <div class="track-row clickable" onclick="alert('Playing Corporate Day')">
                    <div class="track-info">
                        <h4>Corporate Day</h4>
                        <p>Background</p>
                    </div>
                    <div class="waveform-visual">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </div>
                    <i class="fa-solid fa-play-circle" style="font-size:24px; color:#ff3333;"></i>
                </div>

                <div class="track-row clickable" onclick="alert('Playing Night Drive')">
                    <div class="track-info">
                        <h4>Night Drive</h4>
                        <p>Synthwave</p>
                    </div>
                    <div class="waveform-visual">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </div>
                    <i class="fa-solid fa-play-circle" style="font-size:24px; color:#ff3333;"></i>
                </div>

                <div class="explore-nav">
                    <a class="explore-card clickable" onclick="nav('vfx')">Explore VFX</a>
                </div>
            </div>
        </div>
    </div>

    <div id="vfx" class="page">
        <div class="hero vfx-hero">
            <h1>VFX Packs & Assets</h1>
            <button class="btn-fill clickable">Download Starter Pack</button>
        </div>

        <div class="main-layout">
            <div class="sidebar">
                <h3>VFX Filters</h3>
                <div class="filter-group">
                    <strong class="clickable" onclick="toggleFilter(this)">Asset Type <i class="fa-solid fa-chevron-down"></i></strong>
                    <div class="filter-options active">
                        <label><input type="checkbox"> Explosions</label>
                        <label><input type="checkbox"> Muzzle Flashes</label>
                        <label><input type="checkbox"> Particles</label>
                    </div>
                </div>
            </div>

            <div class="content-area">
                <div class="section-header">
                    <h2>Popular Packs</h2>
                </div>
                <div class="grid-3">
                    <div class="obj-card clickable" onclick="openModal('fotot/exp1.jpg', 'Smoke Pack', 'paid')">
                        <img src="fotot/exp1.jpg">
                        <span style="display:block; padding:10px;">Smoke pack</span><span class="license-badge paid">Bundle</span>
                    </div>
                    <div class="obj-card clickable" onclick="openModal('fotot/exp2.jpg', 'Jellyfish Pack', 'free')">
                        <img src="fotot/exp2.jpg">
                        <span style="display:block; padding:10px;">Jellyfish Pack</span><span class="license-badge free">Free</span>
                    </div>
                    <div class="obj-card clickable" onclick="openModal('fotot/exp3.jpg', 'Pirate Ship Pack', 'paid')">
                        <img src="fotot/exp3.jpg">
                        <span style="display:block; padding:10px;">Pirate Ship</span><span class="license-badge paid">Pro</span>
                    </div>
                    <div class="obj-card clickable" onclick="openModal('fotot/exp4.jpg', 'Flame Pack', 'paid')">
                        <img src="fotot/exp4.jpg">
                        <span style="display:block; padding:10px;">Flame Pack</span><span class="license-badge paid">Pro</span>
                    </div>
                    <div class="obj-card clickable" onclick="openModal('fotot/exp5.jpg', 'F-16 Jet Pack', 'paid')">
                        <img src="fotot/exp5.jpg">
                        <span style="display:block; padding:10px;">F-16 Jet Pack</span><span class="license-badge paid">Pro</span>
                    </div>
                    <div class="obj-card clickable" onclick="openModal('fotot/exp6.jpg', 'Fog Elements', 'paid')">
                        <img src="fotot/exp6.jpg">
                        <span style="display:block; padding:10px;">Realistic Fog</span><span class="license-badge paid">Pro</span>
                    </div>
                </div>

                <div class="section-header">
                    <h2>Explosions & Fire</h2>
                </div>
                <div class="grid-4">
                    <div class="obj-card clickable" onclick="openModal('fotot/exp7.jpg', 'Explosion 1', 'paid')"><img src="fotot/exp7.jpg"></div>
                    <div class="obj-card clickable" onclick="openModal('fotot/exp8.jpg', 'Fire', 'paid')"><img src="fotot/exp8.jpg"></div>
                    <div class="obj-card clickable" onclick="openModal('fotot/exp9.jpg', 'Flame', 'paid')"><img src="fotot/ecp9.jpg"></div>
                    <div class="obj-card clickable" onclick="openModal('fotot/exp1.jpg', 'Smoke', 'paid')"><img src="fotot/exp1.jpg"></div>
                </div>

                <div class="explore-nav">
                    <a class="explore-card clickable" onclick="nav('video')">Explore Video</a>
                    <a class="explore-card clickable" onclick="nav('pricing')">Get All Access</a>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="page">
        <div class="hero about-hero">
            <h1>Our Story: For Filmmakers, By Filmmakers</h1>
            <p>We are a passionate team dedicated to building the most authentic and high-quality asset library for the film industry.</p>
        </div>
        <div class="section" style="max-width: 1000px; margin: 40px auto; padding: 0 20px;">
            <h2>Our Mission</h2>
            <p style="color:#aaa; line-height: 1.6; margin-top:15px;">Filmstock was founded on the belief that professional-grade cinematic assets should be accessible to all creators, regardless of budget. We hand-curate every piece of footage, music track, and VFX element to ensure it meets the demanding standards
                of modern filmmaking. We prioritize quality, simplicity, and unlimited access over confusing credits and restrictive licenses. Our goal is to empower your vision.</p>
            <div class="features-grid" style="margin-top: 50px;">
                <div class="feature-box">
                    <i class="fa-solid fa-camera-movie"></i>
                    <h3>Cinematic Quality</h3>
                    <p>Assets are captured or designed by industry professionals.</p>
                </div>
                <div class="feature-box">
                    <i class="fa-solid fa-earth-americas"></i>
                    <h3>Global Community</h3>
                    <p>Serving millions of creators in over 150 countries.</p>
                </div>
                <div class="feature-box">
                    <i class="fa-solid fa-award"></i>
                    <h3>Curated Excellence</h3>
                    <p>Only the best assets make it into the Filmstock library.</p>
                </div>
            </div>
        </div>
    </div>
    <div id="profile" class="page">
        <div class="section-profile">
            <div class="profile-header-card">
                <input type="file" id="pfpInput" style="display:none;" accept="image/*" onchange="updateProfilePic(event)">
                <div class="profile-avatar-wrapper" onclick="document.getElementById('pfpInput').click()">
                    <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?w=400" alt="Profile" class="profile-avatar" id="profileImg">
                    <div class="edit-overlay"><i class="fa-solid fa-pen"></i></div>
                </div>

                <div class="profile-info">
                    <h1 class="editable-name" contenteditable="true">Alex Director</h1>
                    <span class="handle">@alex_shoots_film</span>
                    <div class="profile-stats">
                        <div class="stat-box"><span>12</span><small>Downloads</small></div>
                        <div class="stat-box"><span>4</span><small>Collections</small></div>
                        <div class="stat-box"><span>Pro</span><small>Plan</small></div>
                    </div>
                    <p style="color:#aaa; font-size:14px;">Indie filmmaker based in Berlin. Obsessed with neon lighting and synthwave.</p>
                    <div class="interests-list">
                        <span class="interest-tag">Sci-Fi</span>
                        <span class="interest-tag">Color Grading</span>
                        <span class="interest-tag">VFX</span>
                    </div>
                </div>
                <div style="margin-left:auto;">
                    <button class="btn-outline clickable">Edit Profile</button>
                </div>
            </div>

            <div class="creator-cta">
                <h2>Become a Filmstock Creator</h2>
                <p style="margin: 10px 0 20px 0; color:#999;">Sell your footage and VFX packs to millions of creators worldwide.</p>
                <button class="btn-fill clickable" onclick="openCreatorModal()">Apply Now</button>
            </div>

            <div class="section-header">
                <h2>Recent Downloads</h2>
            </div>
            <div class="grid-4">
                <div class="card clickable" onclick="openModal('https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=600', 'VFX', 'paid')"><img src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=600"><span class="license-badge paid">VFX</span></div>
                <div class="card clickable" onclick="openModal('https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=600', 'IMG', 'paid')"><img src="https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=600"><span class="license-badge paid">IMG</span></div>
            </div>
        </div>
    </div>

    <div id="pricing" class="page">
        <div class="hero pricing-hero">
            <h1>Simple Pricing</h1>
            <p>One subscription. Unlimited possibilities.</p>
        </div>

        <div class="pricing-container">
            <div class="pricing-card">
                <h3>Starter</h3>
                <div class="price">$0<span>/mo</span></div>
                <ul class="features-list">
                    <li><i class="fa-solid fa-check"></i> Standard License</li>
                    <li><i class="fa-solid fa-check"></i> 5 Downloads/mo</li>
                    <li><i class="fa-solid fa-check"></i> HD Quality</li>
                </ul>
                <button class="btn-outline clickable" onclick="nav('signup')">Sign Up Free</button>
            </div>

            <div class="pricing-card popular">
                <div class="pop-badge">BEST VALUE</div>
                <h3>Pro Creator</h3>
                <div class="price">$29<span>/mo</span></div>
                <ul class="features-list">
                    <li><i class="fa-solid fa-check"></i> Commercial License</li>
                    <li><i class="fa-solid fa-check"></i> Unlimited Downloads</li>
                    <li><i class="fa-solid fa-check"></i> 4K & ProRes</li>
                    <li><i class="fa-solid fa-check"></i> VFX Source Files</li>
                </ul>
                <button class="btn-fill full-width clickable" onclick="nav('signup')">Start Free Trial</button>
            </div>

            <div class="pricing-card">
                <h3>Studio</h3>
                <div class="price">$99<span>/mo</span></div>
                <ul class="features-list">
                    <li><i class="fa-solid fa-check"></i> Broadcast License</li>
                    <li><i class="fa-solid fa-check"></i> 5 Team Seats</li>
                    <li><i class="fa-solid fa-check"></i> Dedicated Support</li>
                    <li><i class="fa-solid fa-check"></i> API Access</li>
                </ul>
                <button class="btn-outline clickable" onclick="nav('signup')">Contact Sales</button>
            </div>
        </div>
    </div>

    <div id="login" class="page">
        <div class="split-screen">
            <div class="split-left"></div>
            <div class="split-right">
                <div class="login-box">
                    <h2>Log in</h2>
                    <input type="text" placeholder="Email">
                    <input type="password" placeholder="Password">
                    <button class="btn-fill full-width clickable" onclick="logIn()">Log in</button>
                    <p class="bottom-text" style="color:#666; margin-top:10px;">No account? <a onclick="nav('signup')" class="clickable" style="color:#ff3333;">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>
    <div id="signup" class="page">
        <div class="split-screen">
            <div class="split-left"></div>
            <div class="split-right">
                <div class="login-box">
                    <h2>Sign Up</h2>
                    <input type="text" placeholder="Name">
                    <input type="email" placeholder="Email">
                    <input type="password" placeholder="Password">
                    <button class="btn-fill full-width clickable" onclick="signUp()">Create Account</button>
                    <p class="bottom-text" style="color:#666; margin-top:10px;">Have account? <a onclick="nav('login')" class="clickable" style="color:#ff3333;">Log in</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="assetModal">
        <div class="modal-window">
            <button class="modal-close clickable" onclick="closeModal()">&times;</button>
            <div class="modal-image-col"><img id="modalImg" src=""></div>
            <div class="modal-info-col">
                <h2 id="modalTitle">Title</h2>
                <p style="color:#666; margin-bottom:20px;">Standard License • High Res</p>
                <ul style="color:#aaa; list-style:none; line-height:2; margin-bottom:30px;">
                    <li><i class="fa-solid fa-check" style="color:#ff3333; margin-right:10px;"></i> Commercial Use</li>
                    <li><i class="fa-solid fa-check" style="color:#ff3333; margin-right:10px;"></i> Royalty Free</li>
                    <li><i class="fa-solid fa-check" style="color:#ff3333; margin-right:10px;"></i> High Quality</li>
                </ul>
                <div style="margin-top:auto">
                    <button class="btn-fill full-width clickable">Download / Buy</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="creatorModal">
        <div class="modal-window" style="max-width: 550px; flex-direction: column;">
            <button class="modal-close clickable" onclick="closeCreatorModal()">&times;</button>
            <div class="modal-info-col" style="padding: 30px;">
                <h2 style="margin-bottom: 20px;">Creator Application</h2>
                <p style="color:#999; margin-bottom: 20px;">Join our exclusive network and earn royalties on your assets.</p>

                <form onsubmit="event.preventDefault(); submitCreatorApplication();">
                    <input type="text" id="creatorName" placeholder="Full Name" required style="width: 100%; padding: 12px; margin-bottom: 15px; background: #222; border: 1px solid #333; color: white; border-radius: 4px;">
                    <input type="email" id="creatorEmail" placeholder="Email Address" required style="width: 100%; padding: 12px; margin-bottom: 15px; background: #222; border: 1px solid #333; color: white; border-radius: 4px;">
                    <input type="url" id="creatorPortfolio" placeholder="Portfolio/Website Link (Required)" required style="width: 100%; padding: 12px; margin-bottom: 15px; background: #222; border: 1px solid #333; color: white; border-radius: 4px;">
                    <textarea id="creatorMessage" placeholder="Why do you want to be a Filmstock Creator?" required rows="5" style="width: 100%; padding: 12px; margin-bottom: 25px; background: #222; border: 1px solid #333; color: white; border-radius: 4px; resize: vertical;"></textarea>
                    <button class="btn-fill full-width clickable" type="submit" id="submitCreatorBtn">Submit Application</button>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-links">
            <div class="footer-col">
                <strong>Filmstock</strong>
                <a class="clickable" onclick="nav('about')">About Us</a>
                <a class="clickable">Careers</a>
                <a class="clickable">Blog</a>
            </div>
            <div class="footer-col">
                <strong>Browse</strong>
                <a class="clickable" onclick="nav('vfx')">VFX Packs</a>
                <a class="clickable" onclick="nav('video')">Stock Video</a>
                <a class="clickable" onclick="nav('music')">Music</a>
            </div>
            <div class="footer-col">
                <strong>Support</strong>
                <a class="clickable">Help Center</a>
                <a class="clickable">Licensing</a>
                <a class="clickable">Contact</a>
            </div>
        </div>
        <div style="text-align:center; color:#555; margin-top:40px; font-size:12px;">&copy; 2023 Filmstock Assets. All rights reserved.</div>
    </footer>

    <script src="script.js"></script>
</body>

</html>