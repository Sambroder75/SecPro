<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body class="edit-page">
  <div class="edit-container">
    <div class="card">
    
      <div class="profile-pic">
        <img src="./foto/curry.png" alt="Foto Profile">
        <button class="change-btn" onclick="window.location.href='./profile.html'">Change</button>
      </div>
      <input type="text" class="input-text" placeholder="Nama" required>

      <textarea class="input-bio" rows="4" placeholder="Enter your bio"></textarea>
      <div class="action-buttons">
        <button class="back-btn" onclick="window.location.href='./profile.html'">Back</button>
        <button class="save-btn" onclick="window.location.href='./profile.html'">Save</button>
      </div>

    </div>
  </div>
</div>

</body>
</html>
