<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - Home</title>
    <link rel="stylesheet" href="./css/style.css"> 
    <link rel="stylesheet" href="./css/main_page.css"> 
</head>
<body class="index-body">

    <header class="navbar">
        <img src="./foto/logokecil.png" alt="Logo Dapur Rasa" class="logo">

        <div class="right-side">
            <form action="./search.html" method="get" class="search-form">
                <input type="text" name="q" placeholder="Cari Resep...">
                <button type="submit">
                    <img src="./foto/search.png" alt="Search Icon">
                </button>
            </form>

            <button class="profile-btn" onclick="window.location.href='./profile'">
                <img src="./foto/logoprofile.png" alt="Profile Icon">
            </button>
        </div>
    </header>

    <div class="secondary-nav-bar">
        <nav class="main-nav">
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </div>
    
    <main class="main-content-area">
        
        <h2 class="section-banner trending-banner">Trending Now:</h2>
        <section class="trending-now-section">
            <div class="trending-cards-container">
                
                <a href="detailresep.html" class="recipe-card">
                    <img src="foto/soy_fried_chicken.jpg" alt="Soy Fried Chicken" class="card-image">
                    <div class="card-details">
                        <div class="recipe-duration">🕒 30 Minutes</div>
                        <h3>Soy Fried Chicken</h3>
                        <p class="recipe-snippet">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla mollis lectus in, lobortis qui.</p>
                        <div class="card-meta">
                            <div class="author-info">
                                <span class="author-avatar">👤</span>
                                <span>Aurelia Subantono</span>
                                <span class="date">May 18, 2024</span>
                            </div>
                            <div class="stats">
                                <span class="views"></span>
                                <span class="likes"></span>
                            </div>
                        </div>
                    </div>
                    <div class="save-button" aria-label="Save Recipe">bookmark</div> 
                </a>
                
                <a href="detailresep.html" class="recipe-card">
                    <img src="foto/pepperoni_pizza.jpeg" alt="Pepperoni Pizza" class="card-image">
                    <div class="card-details">
                        <div class="recipe-duration">🕒 30 Minutes</div>
                        <h3>Pepperoni Pizza</h3>
                        <p class="recipe-snippet">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla mollis lectus in, lobortis qui.</p>
                        <div class="card-meta">
                            <div class="author-info">
                                <span class="author-avatar">👤</span>
                                <span>Aurelia Subantono</span>
                                <span class="date">May 18, 2024</span>
                            </div>
                            <div class="stats">
                                <span class="views"></span>
                                <span class="likes"></span>
                            </div>
                        </div>
                    </div>
                    <div class="save-button" aria-label="Save Recipe">bookmark</div>
                </a>

                <a href="detailresep.html" class="recipe-card">
                    <img src="foto/fried_chicken.jpg" alt="Fried Chicken" class="card-image">
                    <div class="card-details">
                        <div class="recipe-duration">🕒 30 Minutes</div>
                        <h3>Fried Chicken</h3>
                        <p class="recipe-snippet">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla mollis lectus in, lobortis qui.</p>
                        <div class="card-meta">
                            <div class="author-info">
                                <span class="author-avatar">👤</span>
                                <span>Aurelia Subantono</span>
                                <span class="date">May 18, 2024</span>
                            </div>
                            <div class="stats">
                                <span class="views"></span>
                                <span class="likes"></span>
                            </div>
                        </div>
                    </div>
                    <div class="save-button" aria-label="Save Recipe">bookmark</div>
                </a>
                
                <a href="createpage.html" class="add-recipe-card">
                    <div class="plus-icon">➕</div>
                    <p>Add your own recipe</p>
                </a>
                
            </div>
        </section>
        
        <div class="recipe-of-the-week-separator">
            <h2 class="separator-title">Recipe of the Week</h2> 
            <span class="date-indicator">18/09</span>
        </div>

        <section class="recipe-of-the-week">
            <div class="recipe-row">
                
                <div class="recipe-highlight">
                    <img src="foto/double_bacon_cheeseburger.png" alt="Double Bacon Cheeseburger" class="highlight-image">
                    <div class="highlight-info">
                        <h3>Double Bacon Cheeseburger</h3>
                        <p class="recipe-snippet">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla mollis lectus in, lobortis qui.</p>
                        <a href="recipe_cheeseburger.html" class="read-more-button">Read More</a>
                    </div>
                </div>

                <div class="recipe-highlight">
                    <img src="foto/mango_shaved_ice_cream.png" alt="Mango Shaved Ice Cream" class="highlight-image">
                    <div class="highlight-info">
                        <h3>Mango Shaved Ice Cream</h3>
                        <p class="recipe-snippet">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla mollis lectus in, lobortis qui.</p>
                        <a href="recipe_mango_ice_cream.html" class="read-more-button">Read More</a>
                    </div>
                </div>

            </div>
        </section>

    </main>

</body>
</html>