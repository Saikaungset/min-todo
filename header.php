    <div>
        <nav class="main_nav">
            <div class="nav-container">
                <div>
                    <h2>LOCALHOST</h2>
                </div>
                <div>
                    <ul class="nav-li">
                        <li><a href="/">Home</a></li>
                        <li><a href="./notes">Nodes</a></li>
                        <li><a href="./createnotes">CreateNotes</a></li>
                        <li><a href="./todo">MY TODO</a></li>
                    </ul>
                </div>
                <div>
                    <?php if(isset($_SESSION['id'])) :?>
                        <span><a href="./register"><?php echo ($_SESSION['name']) ?></a>/ <a href="./logout">Logout</a></span>
                    <?php else : ?>
                        <span><a href="./register">Register</a>/ <a href="./login">Login</a></span>
                    <?php endif ; ?>
                </div>

            </div>
        </nav>
    </div>
