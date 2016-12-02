<nav>
      <ul>
        <li><a href="list_categories.php">Categories</a></li>
        <?php if (!isset($_SESSION['username'])) { ?>
          <li><a href="register.php">Register</a></li>
        <?php } ?>
      </ul>
</nav>