<?php

if ($environment == "dev") {
  echo "
  <script src='dist/js/vue.js'></script>

  ";
} else {
  echo "
  <script src='dist/js/vue.min.js'></script>

  ";
}
