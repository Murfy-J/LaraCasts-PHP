<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="mt-5 md:col-span-3 md:mt-0">
        <form method="POST" action="/note">
          <input type="hidden" name="_method" value="PATCH">
          <input type="hidden" name="noteId" value="<?= $note['id']; ?>">
          <div class="shadow sm:overflow-hidden sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
              <div>
                <label for="body" class="block text-sm font-medium text-gray-700">EDit Body</label>
                <div class="mt-1">
                  <textarea id="body" name="body" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            placeholder="Here's an idea for a note..."><?= $note['body'] ?></textarea>
                </div>
                <div id="charCount"></div>

                  <?php foreach ($errors as $error) : ?>
                      <?php foreach ($error as $err) : ?>
                      <p class="text-red-500 text-xs mt-2"> <?= $err ?> </p>
                      <?php endforeach; ?>
                  <?php endforeach; ?>


              </div>
            </div>

            <div class="bg-white px-4 py-3 text-right sm:px-6 flex gap-x-4  justify-between flex-row-reverse">
              <div class="">
                <a
                  href="/notes"
                  class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                  Cancel
                </a>
                <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                  Update
                </button>

              </div>
        </form>
        <form action="/note" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="noteID" value="<?= $note['id'] ?>">
          <button type="submit"
                  class=" border-solid border-2 border-red-500 rounded py-1 px-2 hover:bg-red-700 hover:text-white">
            Delete
          </button>
        </form>

      </div>
    </div>
  </div>

  </div>
  </div>
  </div>
</main>


<?php require base_path('views/partials/footer.php'); ?>


<script>
  const textArea = document.getElementById('body');
  const charCount = document.getElementById('charCount');

  // Update character count on every input
  textArea.addEventListener('input', function() {
    charCount.innerText = `CharacterCount: ${textArea.value.length}`;
  });
</script>