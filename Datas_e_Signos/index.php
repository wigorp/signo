<?php include('layouts/header.php'); ?>

<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="card p-4 shadow" style="width: 400px;">
    
    <h2 class="text-center mb-4">🔮 Descubra seu signo</h2>

    <form method="POST" action="show_zodiac_sign.php">
      <div class="mb-3">
        <label class="form-label">Data de nascimento:</label>
        <input type="date" name="data_nascimento" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Descobrir</button>
    </form>

  </div>
</div>

</body>
</html>