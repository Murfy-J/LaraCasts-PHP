<?php  require base_path('views/partials/header.php'); ?>
<?php  require base_path('views/partials/nav.php'); ?>
<?php  require base_path('views/partials/banner.php'); ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <p class="mb-5"><a href="notes/create" class="border-double border-2 border-red-500 rounded py-2 px-2">Create Note</a></p>
      <ul>
  
  <?php foreach ($notes as $note) : ?>
    <li><a href="note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline"><?= htmlspecialchars($note['body']) ?></li>
  <?php endforeach; ?>
      </ul>
    </div>
  </main>

<?php require base_path('views/partials/footer.php'); ?>