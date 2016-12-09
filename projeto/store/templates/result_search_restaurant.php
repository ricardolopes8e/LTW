<?php
<div class="search-form">
        <form class="restaurante-div" action="" method="get">
          foreach($getRestaurant_by_name($GET["name"]) as $value)
          {
            <div class="restaurant-item">
              <h3>$value["name"]</h3>
              <img src="../resources/default.jpg" alt="300x200" width="300" height="200">
              <p class="introduction">$value["description"]</p>
              <ul>
                <li><a href="https://web.fe.up.pt/~arestivo/page/files/exercises/css/noticia1.html">see more</a></li>
              </ul>
            </div>
          }

        </form>
  </div>
