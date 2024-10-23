<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

  <main>
    <div class="mx-auto max-w-7xl px-5 py-4 sm:px-6 lg:px-8">


      <p class="mt-6"><a href="notes" class="text-green-500 hover:underline">Back to notes</a></p>

      <div class="px-6">Note: <?= $note['body']; ?></div>

      <footer>
        <p class="mt-6">
          <a href="/note/edit?id=<?= $note['id'] ?>"
             class=" hover:underline rounded border border-1 py-2 px-4 bg-gray-300">Edit</a>
        </p>
      </footer>
    </div>


  </main>

<?php require base_path('views/partials/footer.php'); ?>