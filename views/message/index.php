<?php
echo '<ul>';
foreach ($message as $item) {
    echo '<li>
    <a href="#">' . $item->content . '</a>
  </li>';
}
echo '</ul>';
?>