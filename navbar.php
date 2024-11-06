<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" aria-controls="navbarNav" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="home.php">Home</a>
                </li>
                
                <?php if (!isset($_SESSION['email'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="SignUp.php">SignUp</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <form action="logout.php" style="display:inline;">
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                <?php endif; ?>
            </ul>
            
            <?php if (isset($_SESSION['email'])): ?>
                <span class="navbar-text">
                    <?php echo htmlspecialchars($_SESSION['email']); ?>
                </span>
            <?php endif; ?>
        </div>
    </div>
</nav>