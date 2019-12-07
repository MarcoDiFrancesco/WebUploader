<?php
$input = $_POST["searchInput"];

$files = glob("../file/*{$input}*");

usort($files, function($a, $b) {
  return filemtime($a) < filemtime($b);
});

foreach($files as $file){
  echo "<tr>";
  echo "<td>";
  echo "<a href='{$file}'>";
  echo basename($file);
  echo "</a>";
  echo "</td>";
  echo "<td>";
  echo date('d/m/Y - H:i', filemtime($file));
  echo "</td>";
  echo "<td>";
  $bytes = filesize($file);
  if (filesize($file) >= 1073741824) {
    $bytes = number_format($bytes / 1073741824, 2) . ' GB';
  } elseif ($bytes >= 1048576) {
      $bytes = number_format($bytes / 1048576, 2) . ' MB';
  } elseif ($bytes >= 1024) {
      $bytes = number_format($bytes / 1024, 2) . ' KB';
  } elseif ($bytes > 1) {
      $bytes = $bytes . ' B';
  } elseif ($bytes == 1) {
      $bytes = $bytes . ' B';
  } else {
      $bytes = '0 B';
  }
  echo $bytes;
  echo "</td>";
  echo "</tr>";
}
?>
