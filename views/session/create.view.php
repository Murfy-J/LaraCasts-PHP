<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php if (isset($heading)): ?>
    <?php require base_path('views/partials/banner.php'); ?>
<?php endif; ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 min-h-full">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="mt-5 md:col-span-3 md:mt-0">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <!--            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600"-->
            <!--                 alt="Your Company">-->
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login</h2>
          </div>

          <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="session" method="POST">
              <span class="text-sm text-red-700"><?= $errors['csrfFailed'] ?? ''; ?></span>

              <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
              <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                  <input id="email" name="email" type="email" value="<?= old('email'); ?>" autocomplete="email"
                         class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <span class="text-sm text-red-700"><?= $errors['email'] ?? ''; ?></span>
              </div>

              <div>
                <div class="mt-2">
                  <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                  <input id="password" name="password" type="password" autocomplete="current-password"
                         class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <span class="text-sm text-red-700"><?= $errors['password'] ?? ''; ?></span>
                <div class="flex items-center justify-between">

                  <div class="text-sm mt-5">
                    <a href="#" class=" font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                  </div>

                </div>

              </div>

              <div>
                <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                  Sign in
                </button>
              </div>
            </form>

            <!--            <p class="mt-10 text-center text-sm text-gray-500">-->
            <!--              Not a member?-->
            <!--              <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Start a 14 day free-->
            <!--                trial</a>-->
            <!--            </p>-->
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