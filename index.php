<?php
require_once 'config.php';
?>
<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BilCELL İş Planı</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
<h1 class="mb-4">İş Planı</h1>
<form id="jobForm" class="mb-3">
  <div class="mb-2">
    <label for="description" class="form-label">Açıklama</label>
    <input type="text" class="form-control" name="description" required>
  </div>
  <div class="mb-2">
    <label class="form-label">Başlangıç Tarihi</label>
    <input type="date" class="form-control" name="start_date">
  </div>
  <div class="mb-2">
    <label class="form-label">Bitiş Tarihi</label>
    <input type="date" class="form-control" name="end_date">
  </div>
  <div class="mb-2">
    <label class="form-label">Durum</label>
    <select class="form-select" name="status">
      <option value="beklemede">Beklemede</option>
      <option value="devam">Devam</option>
      <option value="tamam">Tamam</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Ekle</button>
</form>
<table class="table table-bordered" id="jobTable">
  <thead><tr><th>Açıklama</th><th>Başlangıç</th><th>Bitiş</th><th>Durum</th></tr></thead>
  <tbody></tbody>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="ajax/script.js"></script>
</body>
</html>
